<?php
<<<<<<< HEAD
=======

>>>>>>> second-repo/main
// Set the default timezone to Manila, Philippines
date_default_timezone_set('Asia/Manila');

/***** Database Connection *****/
<<<<<<< HEAD
class Connection {
    private $servername = "localhost"; // Your server
    private $username = "root"; // Your MySQL username
    private $password = ""; // Your MySQL password (empty by default in XAMPP)
    private $dbname = "dlsu"; // Your database name
    private $port = 3306; // The port MySQL is running on
    private $dsn;
    private $pdo;

    public function conn() {
        try {
            // Define DSN with port
            $this->dsn = "mysql:host=".$this->servername.";port=".$this->port.";dbname=".$this->dbname;
            
            // Create PDO connection
            $this->pdo = new PDO($this->dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            return $this->pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage()); // Exit script with error message
        }
    }
}
?>
=======
class Connection{
	private $servername = "localhost";
	private $username = "u449432509_dlsu";
	private $password = "h@O=J++BD1M/";
	private $dbname = "u449432509_dlsu";
	private $dsn;
	private $pdo;

	public function conn(){
		try {
		$this->dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname;
		$this->pdo = new PDO($this->dsn, $this->username, $this->password);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $this->pdo;			
		} catch (Exception $e) {
			echo 'error'. $e->getmessage();
		}

	}
}

?>
>>>>>>> second-repo/main
