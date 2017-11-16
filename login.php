<?php
session_start();

require_once("includes/connection.php"); 
include("includes/header.php");

if(isset($_SESSION["session_username"])){
header("Location: index.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
// php5
//    $query =mysqli_query ("SELECT * FROM adm_usertbl WHERE username='".$username."' AND password='".$password."'");
// php7
    $query =mysqli_query ($con, "SELECT * FROM adm_usertbl WHERE username='".$username."' AND password='".$password."'");
// php5
//    $numrows=mysql_num_rows($query);
// php7
    $numrows=mysqli_num_rows($query);
    if($numrows!=0)

    {
// php5
//    while($row=mysql_fetch_assoc($query))
// php7
    while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['username'];
    $dbpassword=$row['password'];
    }

    if($username == $dbusername && $password == $dbpassword)

    {


    $_SESSION['session_username']=$username;

    /* Redirect browser */
    header("Location: index.php");
    }
    } else {

 $message =  "неправильный логин или пароль!";
    }

} else {
    $message = "Не все поля заполнены!";
}
}
?>



    <div class="container mlogin">
            <div id="login">
    <h1>Вход</h1>
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label for="user_login">Username<br />
        <input type="text" name="username" id="username" class="input" value="" size="20" autofocus /></label>
    </p>
    <p>
        <label for="user_pass">Password<br />
        <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
    </p>
    <p class="submit">
        <input type="submit" name="login" class="button" value="Log In" />
    </p>
</form>
           </div>
    </div>

	
<?php 
include("includes/footer.php");

  if (!empty($message)) {
    echo "<p class=\"error\">" . "Ошибка: ". $message . "</p>";
  } 
?>
	