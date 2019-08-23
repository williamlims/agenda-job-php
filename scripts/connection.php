<?php
class Connection {
	
	// declaring atributes
	private $servername;
	private $username;
	private $password;
	private $db;
	private $conn;
	
	// constroctor method
	function __construct() {
       $this->setServername("localhost");
       $this->setUsername("root");
       $this->setPassword("");
	   $this->setDb("agenda");
    }

	// setting server name
	public function setServername($servername){
		$this->servername = $servername;
	}
	
	// getting server name
	public function getServername(){
		return $this->servername;
	}
	
	// setting user name
	public function setUsername($username){
		$this->username = $username;
	}
	
	// getting user name
	public function getUsername(){
		return $this->username;
	}
	
	// setting password
	public function setPassword($password){
		$this->password = $password;
	}
	
	// getting password
	public function getPassword(){
		return $this->password;
	}
	
	// setting db
	public function setDb($db){
		$this->db = $db;
	}
	
	// getting db
	public function getDb(){
		return $this->db;
	}
	
	// function to connect the database
	public function connect(){
	   $this->conn = new mysqli($this->getServername(), $this->getUsername(), $this->getPassword(), $this->getDb());
	}
	
	// function to disconnect the database
	public function disconnect(){
	   $this->conn->close();
	}
	
	// getting the conn
	public function getConn(){
	   return $this->conn;
	}

}

?>