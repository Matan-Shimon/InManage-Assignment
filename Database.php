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

 ?>