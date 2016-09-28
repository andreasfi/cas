<?php
class User{
	private $id;
	private $firstname;
	private $lastname;
	private $mail;
    private $phone;
    private $memberType;
    private $password;

	public function __construct($id=null, $firstname, $lastname, $mail, $phone, $memberType, $password){
		$this->setId($id);
		$this->setFirstname($firstname);
		$this->setLastname($lastname);
		$this->setMail($mail);
        $this->setPhone($phone);
        $this->setMemberType($memberType);
		$this->setPassword($password);
	}

	public static function empty_construct() {
		return new self(null, null, null, null, null, null, null);
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
	
	public function getMail(){
		return $this->mail;
	}
	
	public function setMail($mail){
		$this->mail = $mail;
	}

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getMemberType()
    {
        return $this->memberType;
    }

    public function setMemberType($memberType)
    {
        $this->memberType = $memberType;
    }
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password){
		$this->password = $password;
	}
	
	public function save(){
		$pwd = sha1($this->password);
		$query = "INSERT into users( firstname, lastname, mail, tel, fk_idUserTypes, pwd)
		VALUES('$this->firstname', '$this->lastname', '$this->mail', '$this->phone','$this->memberType','$pwd');";
			
		return  MySqlConn::getInstance()->executeQuery($query);
	}
	public function changePwd($newPwd){
	    $newPwd = sha1($newPwd);
        $query = "UPDATE users set pwd='$newPwd' WHERE idUser='$this->id'";
        return MySqlConn::getInstance()->executeQuery($query);
    }
	
	public static function connect($mail, $pwd){
		$pwd = sha1($pwd);
		$query = "SELECT * FROM users WHERE mail='$mail' AND pwd='$pwd'";
		$result = MySqlConn::getInstance()->selectDB($query);
		$row = $result->fetch();
		if(!$row) return false;
		
		return new User($row['idUser'], $row['firstname'], $row['lastname'],
				$row['mail'], $row['tel'],$row['fk_idUserTypes'], $row['pwd']);
	}
	
}