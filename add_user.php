<?php
session_start();
if(!isset($_SESSION["session_username"])) {
    header("location:login.php");
} else {
require_once("includes/connection.php");
include("includes/menu.php"); 
include("includes/header.php"); 
?>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/translite.js"></script>
<?php
// $query_num_id= mysql_query("SELECT COUNT(*) FROM domain_user");
// $row = mysql_fetch_row($query_num_id);
// $id = $row[0] + 1;
// echo "numer id " .$id. "<br>\n";

if(isset($_POST["register"])){

if(!empty($_POST['family'])  && !empty($_POST['login']) && !empty($_POST['pass'])) {
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
//хешируем пароль
//	$password=md5($_POST['password']);
// php5		
//	$query=mysql_query("SELECT * FROM domain_user WHERE login='".$login."'");
//	$numrows=mysql_num_rows($query);
// php7
	$query=mysqli_query($con, "SELECT * FROM domain_user WHERE login='".$login."'");
	$numrows=mysqli_num_rows($query);

	if($numrows==0)
	{
	$sql="INSERT INTO domain_user
			(family, name, middle_name, login, pin_code, pass, phone, email, position, department, notation ) 
			VALUES('$family', '$name', '$middle_name', '$login', '$pin_code', '$pass', '$phone', '$email', '$position', '$department', '$notation')";
// php5		
//	$result=mysql_query($sql);
// php7		
	$result=mysqli_query($con, $sql);

	if($result){
	 $message = "Пользователь: <br><b>".$family." ".$name." ".$middle_name."</b> <br> успешно зарегистрирован  ";
	 $message1 = "<p class=prim><br> Cоздать почту: <br>
		    <br>/root/mailserver/mailuseradd '".$login."' '".$pass."' '".$family."' '".$name." ".$middle_name."' '".$phone."'<br> <br>
<!-- Переделать -->
		    Создать в AD: <br>
		    <br> dsadd user \"cn=".$family." ".$name." ".$middle_name.",cn=Users,DC=spz,DC=local\" -samid ".$login." -upn ".$login."@spz.local -fn ".$name." -ln ".$family." -display \"".$family." ".$name." ".$middle_name."\" -pwd ".$pass." -canchpwd no -pwdneverexpires yes -tel \"".$phone. "\" -email ".$email."
		    ";
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
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Внимание: ". $message . "</p>".$message1."</p>";} ?>
<?php 
// Генерируем пароль!!
// Символы, которые будут использоваться в пароле.
$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";

// Количество символов в пароле.
$max=8;

// Определяем количество символов в $chars
$size=StrLen($chars)-1;

// Определяем пустую переменную, в которую и будем записывать символы.
$password_gen=null;

// Создаём пароль.
while($max--)
$password_gen.=$chars[rand(0,$size)];
?> 
<?php 
// Генерируем PIN!!
// Символы, которые будут использоваться в pin.
$chars_pin="1234567890";

// Количество символов в pin.
$max_pin=4;

// Определяем количество символов в $chars
$size_pin=StrLen($chars_pin)-1;

// Определяем пустую переменную, в которую и будем записывать символы.
$pin_gen=null;

// Создаём pin.
    while($max_pin--)
    $pin_gen.=$chars_pin[rand(0,$size_pin)];
?> 
<center> 
	<div align="center" id="welcome" class="container uregister">
  <style>
   textarea {
    resize: none; /* Запрещаем изменять размер */
   } 
    label { display: block; float: left; width: 291px; text-align: left; margin: 2;}
  </style>
	
<h1 align="center">Добавить пользователя</h1></td>
    
<form name="registerform" id="registerform" action="add_user.php" method="post">

		<label for="user_family">Фамилия*<br />
    		<input type="text" name="family" id="family" class="input" size="32" value="" onkeyup="translit()" /></label>
		<label for="user_name">Имя<br />
		<input type="name" name="name" id="name" class="input" value="" size="32" /></label>
	<p>
		<label for="user_middle_name">Отчество<br /></label>
		<input type="text" name="middle_name" id="middle_name" class="input" value="" size="32" />
	</p>
	<p>
		<label for="user_login">Логин*<br />
		<input type="text" name="login" id="user_login" class="input" value="" size="32" /></label>
	</p>
	<p>
		<label for="user_pass">Пароль*<br />
		<input type="text" name="pass" id="pass" class="input" value=<?php echo "$password_gen";?> size="22" /></label>
	</p>
	<p>
		<label for="user_pin_code">ПИН код<br />
		<input type="text" name="pin_code" id="pin_code" class="input" value=<?php echo "$pin_gen";?> size="22" /></label>
	</p>
	<p>
		<label for="user_phone">Телефон<br />
		<input type="text" name="phone" id="phone" class="input" value="00-00" size="20" /></label>
	</p>
        <p>
		<label for="user_email">Электронная почта<br />
		<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
	</p>
	<p>
		<label for="user_position">Должность<br />
    		<input type="text" name="position" id="position" class="input" size="32" value=""  /></label>
	</p>
	<p>
		<label for="user_department">Отдел<br /> </label>
		<input type="text" name="department" id="department" class="input" value="" size="32" />
	</p>
	<p>
		<label  for="user_notation">Примечание<br />
		</label>
		<textarea name="notation" id="notation" class="input" rows="3" cols="64" maxlength="500" size="180"></textarea>
	</p>

	<table align="right" border=0>
	    <tr>
    		<td class="prim">Поля отмеченные * обязательны для заполнения</td>
    		<td><input type="submit" name="register" id="register" class="button" value="Зарегистрировать" /></form></td>
    		<td><form name="registerform" id="registerform" action="index.php" method="post"><input type="submit" name="register" id="register" class="button" value="Отмена" formaction="index.php" /></form></td>
	    </tr>
	</table>
	</div>
<?php include("includes/footer.php"); ?>
<?php
}
?>
