<?php
session_start();
include '../config/config.php';

class controller extends Connection {

    public function managecontroller() {
        if (isset($_POST['edit'])) {

            $task_id = $_POST['task_id'];
            $status = $_POST['status'];
            $setdeadline_id = $_POST['setdeadline_id'];
            $title = $_POST['title'];
        
            $sql = "UPDATE task SET title = ?, status = ? WHERE task_id = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$title, $status, $task_id]);


            echo "<script type='text/javascript'>alert('Successfully edit status!');</script>";
            echo "<script>window.location.href='../admin/viewdifferenttask.php?setdeadline_id=".$setdeadline_id."';</script>";
        }
    }
}

$controllerrun = new controller();
$controllerrun->managecontroller();

?>
