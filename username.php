<?php 
class user {
	private $connection;
	public function __construct($host, $user, $pass, $dbname) {
        $this->connection = new mysqli($host, $user, $pass, $dbname);
        if ($this->connection->connect_error) { //kills connection for safety and immediately outputs - could be unsafe (?)
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

	public function addUser($username) {
		$sql = $this->connection->prepare("SELECT id FROM users WHERE username = ?");
		$sql ->bind_param("s", $username);
		$sql ->execute();
		$check = $sql->get_result();
		if ($check->num_rows == 0) {
			$sql->close();
			$sql = $this->connection->prepare("INSERT INTO users (username) VALUES (?)"); 
			$sql->bind_param("s", $username);
			//execute and check for success
			
			if ($sql->execute()) {
				echo "New user created successfully."; 
			} else {
				die("Error: " . $sql->error);
			}
		}
        $sql->close(); // end
    }

	public function readUser($username) {
		$sql = $this->connection->prepare("SELECT id, username FROM users WHERE username = ?");
		$sql->bind_param("s", $username); 
		$sql->execute();
		//grab result 
		$result = $sql->get_result();
    
		//check output
		if ($result->num_rows > 0) {
			return $result->fetch_assoc();
		} else {
			return null;
		}

		$sql->close(); //end 
    }
	
	public function __destruct() {
        $this->connection->close();
    }
?>
