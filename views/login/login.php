
<?php
$msg = $this->vars['msg'];
$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
include_once ROOT_DIR.'views/header.inc';

//Collect data from controller


?>


<br><br>
<form action="<?php echo URL_DIR.'login/connection';?>" method="post">
	<table align="center">		
		<tr>
			<td>
				<?php echo $msg;?>
				<h1>Login</h1>				
				Username:<br><input type="text" name="username" size="25"/><br>
				Password:<br><input type="password" name="password" size="25"/><br><br>			
				<input class="btn btn-primary" type="submit" name="Submit" value="  OK  "/>
				<br/><br/>							
				<a href="<?php echo 'login/newuser';?>">Register</a>
			</td>
		</tr>
	</table>
</form>
<br/><br/><br/><br/>

<?php 
unset($_SESSION['msg']);
include_once ROOT_DIR.'views/footer.inc';

?>