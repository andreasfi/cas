<?php
class loginController extends Controller{
	/**
	 * Method called by the form of the page login.php
	 */
	function connection(){
		//Get data posted by the form
		$uname = $_POST['username'];
		$pwd = $_POST['password'];
		
		//Check if data valid
		if(empty($uname) or empty($pwd)){
			$_SESSION['msg'] = '<span class="error">A required field is empty!</span>';
			$this->redirect('login', 'login');
		}
		else{		
			//Load user from DB if exists
			$result = User::connect($uname, $pwd);
			
			//Put user in session if exists or return error msg
			if(!$result){			
				$_SESSION['msg'] = '<span class="error">Username or password incorrect!</span>';	
				$this->redirect('login', 'login');
			}
			else{
				$_SESSION['msg'] = '<span class="success">Welcome '. $result->getFirstname(). ' '.$result->getLastname().'!</span>';
				$_SESSION['user'] = $result;
				$this->redirect('login', 'welcome');
			}
		}
		
	}
	
	/**
	 * Method that controls the page 'login.php'
	 */
	function login(){
		//if a user is active he cannot re-login
		if($this->getActiveUser()){
			$this->redirect('login', 'welcome');
			exit;
		}
		
		$this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
	}
	
	/**
	 * Method called by the logout hyperlink
	 */
	function logout(){
		session_destroy();
    	$this->redirect('login', 'login');
	}
	
	/**
	 * Method that controls the page 'newuser.php'
	 */
	function newuser(){
		//if a user is active he cannot re-register
		if($this->getActiveUser()){
			$this->redirect('login', 'welcome');
			exit;
		}
		
		//Get message and data from registration process
		$this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
		$this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','');		
	}
	
	/** 
	 * Method called by the form of the page newuser.php
	 */
	function register(){
		//Get data posted by the form
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$uname = $_POST['username'];
		$pwd = $_POST['password'];		
		
		//Check if data valid
		if(empty($fname) or empty($lname) or empty($uname) or empty($pwd)){
			$_SESSION['msg'] = '<span class="error">A required field is empty!</span>';
			$_SESSION['persistence'] = array($fname, $lname, $uname, $pwd);
		}
		else{
			//Save new user into the db
			$user = new User(null, $fname, $lname, $uname, $pwd);
			$result = $user->save();
			if(is_string($result)){
				$_SESSION['msg'] = '<span class="error">'.$result.'</span>';
				$_SESSION['persistence'] = array($fname, $lname, $uname, $pwd);
			}
			else{
				$_SESSION['msg'] = '<span class="success">Registration successful!</span>';	
				unset($_SESSION['persistence']);
			}
		}
		
		$this->redirect('login', 'newuser');
	}
	

	/**
	 * Method that controls the page 'welcome.php'
	 */
	function welcome(){
		//The page cannot be displayed if no user connected
		if(!$this->getActiveUser()){
			$this->redirect('login', 'login');
			exit;
		}
	
		//Get message from connection process
		$this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
		
	}
	
}