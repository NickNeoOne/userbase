<?php
session_start();
if(!isset($_SESSION["session_username"])) {
    header("location:login.php");
} else {
require_once("includes/connection.php");
include("includes/menu.php");
include("includes/header.php"); 

if(isset($_POST["register"])){

if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
//	$password=$_POST['password'];
//хешируем пароль
	$password=md5($_POST['password']);
//php5		
//	$query=mysql_query("SELECT * FROM adm_usertbl WHERE username='".$username."'");
//	$numrows=mysql_num_rows($query);
//php7
	$query=mysqli_query($con, "SELECT * FROM adm_usertbl WHERE username='".$username."'");
	$numrows=mysqli_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO adm_usertbl
			(full_name, email, username,password) 
			VALUES('$full_name','$email', '$username', '$password')";
//php5
//	$result=mysql_query($sql);
//php7
	$result=mysqli_query($con, $sql);

	if($result){
	 $message = "Администратор успешно зарегистрирован";
	} else {
	 $message = "Failed to insert data information!";
	}

	} else {
	 $message = "Администратор с таким Login`ом уже существует. Попробуйте другой! ";
	}

} else {
	 $message = "Все поля обязательны для заполнения!";
}
}

if (!empty($message)) {echo "<p class=\"error\">" . "Внимание: ". $message . "</p>";} ?>
	
<div class="container mregister">
			<div id="login">
	<h1>Регистрация</h1>
<form name="registerform" id="registerform" action="register_adm.php" method="post">
	<p>
		<label for="user_login">Полное Имя<br />
		<input type="text" name="full_name" id="full_name" class="input" size="32" value=""  /></label>
	</p>
	
	<p>
		<label for="user_pass">Email<br />
		<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
	</p>
	
	<p>
		<label for="user_pass">Login<br />
		<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
	</p>
	
	<p>
		<label for="user_pass">Password<br />
		<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
	</p>	
	
<table align="right" border=0>
    <tr>
    <td><input type="submit" name="register" id="register" class="button" value="Зарегистрировать" />
</form>
</td>
    <td><form name="registerform" id="registerform" action="index.php" method="post">
		<input type="submit" name="register" id="register" class="button" value="Отмена" formaction="index.php" />
</form>
</td>
    </tr>
</table>
	</div>
	</div>

<?php 
include("includes/footer.php");
}
?>