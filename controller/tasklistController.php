<?php
session_start();
include '../config/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class controller extends Connection
{

    public function managecontroller()
    {
        if (isset($_POST['add'])) {
            $current_user_id = $_SESSION['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $user_ids = $_POST['users_id'];
            $setdeadline_id = $_POST['setdeadline_id'];
            $status = $_POST['status'];

            if (empty($user_ids) || !is_array($user_ids)) {
                die("Error: Please select at least one member.");
            }

            $sql = "SELECT teams_id FROM teams_member WHERE users_id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$current_user_id]);
            $row = $stmt->fetch();

            if (!$row) {
                die("Error: No team associated with the logged-in user.");
            }

            $teams_id = $row['teams_id'];

            $sql = "INSERT INTO task (teams_id, setdeadline_id, title, description, status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$teams_id, $setdeadline_id, $title, $description, $status]);

            $sql = "SELECT task_id FROM task ORDER BY task_id DESC LIMIT 1";
            $stmt = $this->conn()->query($sql);
            $row = $stmt->fetch();

            if (!$row) {
                die("Error: Task creation failed.");
            }

            $task_id = $row['task_id'];

            foreach ($user_ids as $user_id) {
                $sql = "INSERT INTO task_member (task_id, teams_id, users_id) VALUES (?, ?, ?)";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$task_id, $teams_id, $user_id]);
            }

            echo "<script type='text/javascript'>alert('Successfully added task!');</script>";
            echo "<script>window.location.href='../admin/tasklist.php';</script>";
        }


        if (isset($_POST['delete'])) {
            // Get the task_id from the form submission
            $task_id = $_POST['task_id'];
            $setdeadline_id = $_POST['setdeadline_id'];

            // Validate the task_id
            if (empty($task_id)) {
                die("Error: Task ID is missing.");
            }

            // Check if the task exists
            $sql = "SELECT task_id FROM task WHERE task_id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$task_id]);
            $row = $stmt->fetch();

            if (!$row) {
                die("Error: Task not found.");
            }

            // Delete the task from the task_member table (if it's associated with any users)
            $sql = "DELETE FROM task_member WHERE task_id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$task_id]);

            // Delete the task from the task table
            $sql = "DELETE FROM task WHERE task_id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$task_id]);

            echo "<script type='text/javascript'>alert('Task deleted successfully!');</script>";
            echo "<script>window.location.href='../admin/viewdifferenttask.php?setdeadline_id=".$setdeadline_id."';</script>";
        }




        if (isset($_POST['uploadfile'])) {

            $setdeadline_id = $_POST['setdeadline_id'];

            $file = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/" . $file);

            $sql = "SELECT * FROM setdeadline WHERE setdeadline_id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$setdeadline_id]);
            $row = $stmt->fetch();
            $teams_id = $row['teams_id'];


            $sql = "INSERT INTO setdeadline_file (setdeadline_id, teams_id, file) VALUES (?, ?, ?)";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$setdeadline_id, $teams_id, $file]);

            //<adding notification>
            //selecting team users_id
            $sql = "SELECT * FROM teams_member WHERE users_id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$_SESSION['id']]);
            if ($stmt->rowcount() > 0) {
                $row = $stmt->fetch();
                $teams_id = $row['teams_id'];
            } else {
                $teams_id = 0;
            }
            //selecting team name
            $sql = "SELECT * FROM teams WHERE teams_id = '$teams_id'";
            $stmt = $this->conn()->query($sql);
            $row = $stmt->fetch();
            $groupname = $row['name'];
            $adviser_id = $row['adviser_id'];
            $users_id = $_SESSION['id'];
            $notes = "New file uploaded by the group ($groupname)";

            $sql = "INSERT INTO reminder_adviser (users_id,adviser_id,notes) VALUES (?,?,?)";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$users_id, $adviser_id, $notes]);

            $sql = "UPDATE setdeadline SET notif = 1 WHERE notif = 0 AND teams_id = ? AND setdeadline_id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$teams_id, $setdeadline_id]);
            //</adding notification>

            echo "<script type='text/javascript'>alert('Successfully added file!');</script>";
            echo "<script>window.location.href='../admin/tasklist.php';</script>";
        }
    }
}

$controllerrun = new controller();
$controllerrun->managecontroller();
