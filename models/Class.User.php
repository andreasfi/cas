<?php
class User{
	private $id;
	private $firstname;
	private $lastname;
	private $username;
	private $password;
	
	public function __construct($id=null, $firstname, $lastname, $username, $password){
		$this->setId($id);
		$this->setFirstname($firstname);
		$this->setLastname($lastname);
		$this->setUsername($username);
		$this->setPassword($password);
	}	
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getFirstname(){
		return $this->firstname;
	}
	
	public function setFirstname($firstname){
		$this->firstname = $firstname;
	}
	
	public function getLastname(){
		return $this->lastname;
	}
	
	public function setLastname($lastname){
		$this->lastname = $lastname;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function setUsername($username){
		$this->username = $username;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password){
		$this->password = $password;
	}
	
	public function save(){
		$pwd = sha1($this->password);
		$query = "INSERT into user(firstname, lastname, username, password)
		VALUES('$this->firstname', '$this->lastname', '$this->username', '$pwd');";
			
		return  MySqlConn::getInstance()->executeQuery($query);
	}
	
	public static function connect($uname, $pwd){
		$pwd = sha1($pwd);
		$query = "SELECT * FROM user WHERE username='$uname' AND password='$pwd'";
		$result = MySqlConn::getInstance()->selectDB($query);
		$row = $result->fetch();
		if(!$row) return false;
		
		return new User($row['id'], $row['firstname'], $row['lastname'],
				$row['username'], $row['password']);
	}
	
}