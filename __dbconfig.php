<?php
    require_once("__appconfig.php");

    class Database
    {   

        private $host = "localhost";
        private $dbname = __DBNAME__;
        private $username = __DBUSERNAME__;
        private $password = __DBPASSWORD__;

        public $conn;
         
        public function dbConnection()
    	{
         
    	    $this->conn = null;    
            try
    		{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
    			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
            }
    		catch(PDOException $exception)
    		{
                echo "Connection error: " . $exception->getMessage();
            }
             
            return $this->conn;
        }
    }
?>