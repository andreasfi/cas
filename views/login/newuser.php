<?php include_once ROOT_DIR.'views/header.inc'; 

//Collect data from controller
$msg = $this->vars['msg'];
$persistence = $this->vars['persistence'];

?>
<?php echo $msg;?>
<br><br>
<form method="post" action="<?php echo URL_DIR.'login/register';?>">
	<table align="center">		
		<tr>
			<td>
			<h1>Register</h1>
			First name:<br><input type="text" name="firstname" value="<?php echo $persistence[0];?>"><br>
			Last name:<br><input type="text" name="lastname" value="<?php echo $persistence[1];?>"><br>
			User name:<br><input type="text" name="username" value="<?php echo $persistence[2];?>"><br>
			Password:<br><input type="password" name="password" value="<?php echo $persistence[3];?>"><br><br>
			<input type="submit" name="action" value="Register"><br><br>
			<a href="<?php echo URL_DIR.'login/login';?>">Login</a>
			</td>
		</tr>
	</table>
</form>

<?php 
unset($_SESSION['msg']);
include_once ROOT_DIR.'views/footer.inc';?>