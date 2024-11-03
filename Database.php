<?php


	class Database
	{
	    private $conn;

	    // constructor
	    public function __construct($host, $username, $password, $dbname) {
	        $this->conn = mysqli_connect($host, $username, $password, $dbname);
	        
	        if (!$this->conn) {
	            echo "Connection failed: " . mysqli_connect_error();
	        }
	    }

	    // select from db
	    public function select($query) {
	        $result = mysqli_query($this->conn, $query);
	        if ($result) {
	        	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	        }
	        else {
	        	echo "Select query failed: " . mysqli_error($this->conn);
	        }	        
	    }

	    // insert to db
		public function insert($query) {
			if (!mysqli_query($this->conn, $query)) {
				echo "Insert query failed: " . mysqli_error($this->conn);
				return false;
			}
			else {
				return true;
			}
		}

		// delete from db
		public function delete($query) {
			if (!mysqli_query($this->conn, $query)) {
				echo "Delete query failed: " . mysqli_error($this->conn);
				return false;
			}
			else {
				return true;
			}
		}

		// update the db
		public function update($query) {
			if (!mysqli_query($this->conn, $query)) {
				echo "Update query failed: " . mysqli_error($this->conn);
				return false;
			}
			else {
				return true;
			}
		}

		// close db connection
	    public function close() {
	        mysqli_close($this->conn);
	    }
	}

	// DATA INSERTION

	// connect to DB
	$db = new Database('localhost', 'matan', '1234', 'inmanage_db');

	// user data last insertion
	// $id = 6;
	// $name = "Mrs. Dennis Schulist";
	// $email = "Karley_Dach@jasper.info";

	// // sql insert query
	// $query = "INSERT INTO users VALUES('$id', '$name', '$email')";

	// // Database class insert
	// if ($db->insert($query)) {
	// 	echo "$name data has been inserted successfully";
	// }

	// post data last insertion
	$user_id = 7;
	$title = "soluta aliquam aperiam consequatur illo quis voluptas";
	$content = "sunt dolores aut doloribus\ndolore doloribus voluptates tempora et\ndoloremque et quo\ncum asperiores sit consectetur dolorem";

	// sql insert query
	$query = "INSERT INTO posts(user_id, title, content) VALUES('$user_id', '$title', '$content')";

	// Database class insert
	if ($db->insert($query)) {
		echo "post by $user_id has been inserted successfully";
	}

 ?>