<?php
session_start();
if(!isset($_SESSION["session_username"])) {
    header("location:login.php");
} else {
require_once("includes/connection.php");
include("includes/menu.php"); 
include("includes/header.php"); 

$id = $_POST['id'];
$query = "SELECT * FROM `domain_user` WHERE id = '$id'";
//php5
//$res = mysql_query($query);
//while($row = mysql_fetch_array($res))
//php7
$res = mysqli_query($con, $query);
while($row = mysqli_fetch_array($res))
{
	$id=$row['id'];
	$family=$row['family'];
	$email=$row['email'];
	$login=$row['login'];
	$pass=$row['pass'];
        $name=$row['name'];
	$middle_name=$row['middle_name'];
	$pin_code=$row['pin_code'];
	$phone=$row['phone'];
	$position=$row['position'];
	$department=$row['department'];
	$notation=$row['notation'];
}

if(isset($_POST["register"])){
if( !empty($_POST['family']) && !empty($_POST['login']) && !empty($_POST['pass'])) {
	$family=$_POST['family'];
        $email=$_POST['email'];
        $login=$_POST['login'];
        $pass=$_POST['pass'];
        $name=$_POST['name'];
        $middle_name=$_POST['middle_name'];
        $pin_code=$_POST['pin_code'];
        $phone=$_POST['phone'];
        $position=$_POST['position'];
        $department=$_POST['department'];
        $notation=$_POST['notation'];
	if($numrows==0)
	{
	$sql="UPDATE domain_user SET family='$family', name='$name', middle_name='$middle_name', login='$login', pin_code='$pin_code', pass='$pass', phone='$phone', email='$email', position='$position', department='$department', notation='$notation' WHERE id = '$id'";
//php5
//	$result=mysql_query($sql);
//php7
	$result=mysqli_query($con, $sql);

  if($result){
	 $message = "Данные пользователя успешно обновлены";
	} else {
	 $message = "Failed to insert data information!";
	}

	} else {
	 $message = "Пользователь с таким Login`ом уже существует. Попробуйте другой! ";
	}

} else {
	 $message = "Все поля обязательны для заполнения!";
}
}
?>
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Внимание: ". $message . "</p>";} ?>
<center> <div align="center" id="welcome" class="container uregister">
<style>
   textarea {
    resize: none; /* Запрещаем изменять размер */
   } 
 label { display: block; float: left; width: 291px; text-align: left; margin: 2;} 
  </style>

<h1 align="center">Изменить данные пользователя</h1></td>
<?php
//echo "<hr>\n";
echo "<form name='registerform' id='registerform' action='edit_user.php' method='post'>\n";
echo "<label for='user_family'>Фамилия*<br /><input type='text' name='family' id='family' class='input' size='32' value='".$family."'  /></label>\n";
echo "<label for='user_name'>Имя<br />       <input type='name' name='name' id='name' class='input' value='".$name."' size='32' /></label>\n";
echo "<label for='user_middle_name'>Отчество<br /></label> <input type='text' name='middle_name' id='middle_name' class='input' value='".$middle_name."' size='32' />\n";
echo "<label for='user_login'>Логин*<br /> <input type='text' name='login' id='user_login' class='input' value='".$login."' size='32' /></label>\n";
echo "<label for='user_pass'>Пароль*<br /> <input type='text' name='pass' id='pass' class='input' value='".$pass."' size='22' /></label>\n";
echo "<label for='user_pin_code'>ПИН код<br /> <input type='text' name='pin_code' id='pin_code' class='input' value='".$pin_code."' size='22' /></label>\n";
echo "<label for='user_phone'>Телефон<br /> <input type='text' name='phone' id='phone' class='input' value='".$phone."' size='20' /></label>\n";
echo "<label for='user_email'>Электронная почта<br /> <input type='email' name='email' id='email' class='input' value='".$email."' size='32' /></label>\n";
echo "<label for='user_position'>Должность<br /> <input type='text' name='position' id='position' class='input' size='32' value='".$position."' /></label>\n";
echo "<label for='user_department'>Отдел<br /> </label> <input type='text' name='department' id='department' class='input' value='".$department."' size='32' />\n";
echo "<label for='user_notation'>Примечание<br /></label> <textarea name='notation' id='notation' class='input' rows='3' cols='64' maxlength='500' size='180'>".$notation."</textarea>\n";
echo "<input type='hidden' name='id' id='id' class='input' size='32' value='".$id."'  /></label>\n";
?>
        <table align="right" border=0>
            <tr>
            <td class="prim">Поля отмеченные * обязательны для заполнения</td>
            <td><input type="submit" name="register" id="register" class="button" value="Обновить" /></form></td>
            <td><input type="reset" name="register" id="register" class="button" value="Сбросить" /></form></td>
            <td><form name="registerform" id="registerform" action="index.php" method="post"><input type="submit" name="register" id="register" class="button" value="Отмена" formaction="index.php" /></form></td>
            </tr>
        </table>

	</div>

<?php 
include('includes/footer.php');
}
?>
