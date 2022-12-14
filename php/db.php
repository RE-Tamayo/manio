<?php 

	class Database {
	    //DB PARAMS
	    private $host = 'localhost';
	    private $db_name = 'sahs_db';
	    private $username = 'root';
	    private $password = '';
	    private $conn;

	    //DB CONNECT
	    public function connect() {
	        $this->conn = null;

	        try {
	            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,
	            $this->username, $this->password);
	            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        } catch (PDOException $e) {
	            echo 'Connection Error: ' . $e->getMessage();        
	        }
	        return $this->conn;
	    }

	    //DB DISCONNECT
	    public function disconnect() {
	        $this->conn = null;
	    }

	}
