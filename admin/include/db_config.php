<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'mysite');
class Database{
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			exit;
			}
		}
}
?>