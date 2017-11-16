<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
require_once("includes/connection.php");
include("includes/header.php");  
include("includes/menu.php"); 
?>
<div id="welcome">	
	<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
    <form method="post" action="index.php" >
Поиск: <input type="text" pattern="^[A-Za-zА-Я0-9а-яЁё]+$" name="login" class="input_form"  value="" autofocus  placeholder="login, фамилия или PC name " width="400px">
<!-- <p>или <input type="text" pattern="^[A-Za-z0-9]+$" name="pc_name" class="input_form"  value="" autofocus placeholder="PC name"> -->
      <input type="submit" value="Найти" class="button"  />
    </form><br>
</div>
<?php
if(isset($_POST['login'])& strlen($_POST['login'])>=3)
{
    include 'search_user.php';
}

if(isset($_POST['pc_name'])& strlen($_POST['pc_name'])>=3)
{
    include 'search_pc.php';
}
echo "<p class='error'>" . "Дорогой: ". $_SESSION['session_username'] ." <br> <br>Тебе что заняться больше нечем? <br> иди новости почитай или чаю выпей! <br> <br></p>";

include("includes/footer.php");
}
?>
