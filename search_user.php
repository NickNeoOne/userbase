<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>

<?php require_once("includes/connection.php"); ?>

<!-- <?php 
// include("includes/header.php"); 
?>
-->
<?php 
//$_POST['login'] = "kasa";
//$query = "SELECT * FROM `domain_user` WHERE name LIKE 'Алек%' OR middle_name LIKE 'Алек%'  ";
//$query = "SELECT * FROM domain_user WHERE login LIKE '%".($_POST['login'])."%' OR family LIKE '%".($_POST['login'])."%'";
$query = "SELECT * FROM domain_pc  RIGHT OUTER JOIN domain_user  using(login) WHERE login LIKE '%".($_POST['login'])."%' OR family LIKE '%".($_POST['login'])."%' OR pc_name LIKE '%".($_POST['login'])."%'";
//$query = "SELECT * FROM domain_pc WHERE pc_name LIKE '%".strtoupper($_POST['login'])."%'  ";
//php5
//$res = mysql_query($query);
//while($row = mysql_fetch_array($res))
// php7
$res = mysqli_query($con, $query);
while($row = mysqli_fetch_array($res))

{

echo "<hr >\n";
echo "<div style='display:inline-block;  width:100%' align=right  class='prim'>Номер: ".$row['id']. "</div>\n";
echo "<table><tr><td width='155'><b>Имя Компьютера:</b> </td><td width='80'>".$row['pc_name']."</td><td> Обновлено ".$row['last_update']."<br></td>\n";
echo "<tr><td width='100'><b>Местоположение:</b> </td><td colspan=2>".$row['location_pc']."</td><br>\n";
echo "</table><br>\n";
echo "<table width='100%' border=0><tr><td width='155'><b>ФИО:</b> </td><td colspan=2>".$row['family']." ".$row['name']." ".$row['middle_name']."<br></td>\n";
echo "<tr><td width=100><b>Логин:</b> </td><td  colspan=2>".$row['login']."<br></td>\n";
// показываем и скрываем пароль по кнопке один вариант
//echo "<script>function Show_HidePassword(id) {element = document.getElementById(id); if (element.type == 'password') {var inp = document.createElement('input'); inp.id = id; inp.type = 'text'; inp.readonly=readonly; inp.value = element.value; element.parentNode.replaceChild(inp, element);} else { var inp = document.createElement('input'); inp.id = id; inp.readonly=readonly; inp.type = 'password'; inp.value = element.value; element.parentNode.replaceChild(inp, element); } } </script>";
//echo "<tr><td width=100><b>Пароль: </b></td>
//    <td width=90><input id=".$row['id']." type=password readonly=readonly value=".$row['pass']." /><input type=submit value=Показать class=button_float_none onclick=Show_HidePassword('".$row['id']."')  /><br></td></tr>\n";
// показываем и скрываем пароль по кнопке второй  вариант 
 echo "<tr><td width=100><b>Пароль: </b></td>
      <td width=90><div id=".$row['id']." style='display:none; text-align:justify;'>".$row['pass']."</div></td> <td width=180><a href=javascript:look('".$row['id']."'); id=a-".$row['id']."><IMG SRC=img/unlocked.ico width=18 height=18 BORDER=0></a></td>
      </tr>";
echo "<tr><td width='100'><b>PIN код:</b> </td><td colspan=2>".$row['pin_code']."<br></td>\n";
echo "<tr><td width='100'><b>E-mail:</b> </td><td colspan=2>".$row['email']."<br></td>\n";
//echo "Имя PC: ".$row['pc_name']."<br>\n";
//echo "<b>Пароль: </b><input id=pid type=text disabled=disabled value=".$row['pass']." /><a href=# onclick=Show_HidePassword('pid')><font color=blue>Показать</font></a><br>\n";
echo "<tr><td width='100'><b>Телефон:</b> </td><td colspan=2>".$row['phone']."<br></td>\n";
echo "<tr><td width='100'><b>Отдел:</b> </td><td colspan=2>".$row['department']."<br></td>\n";
echo "<tr><td width='100'><b>Должность:</b> </td><td colspan=2>".$row['position']."<br></td>\n";
echo "<tr><td width='100'><b>Примечание:</b> </td><td colspan=2>".$row['notation']."<br></td>\n";
echo "</table>";
echo "<br>\n";
echo "<form method=post action='edit_user.php' ><input name='id' value=".$row['id']." type='hidden' > <input type=submit value=Изменить class='button'  /></form> <form method=post action='slacker.php' ><input type=submit value='Еще что нибудь сделать' ) class='button'  /></form><br>\n";
echo "<br>\n";
echo "<script type=text/javascript> function look(t){ p=document.getElementById(t); l=document.getElementById('a-'+t); if(p.style.display=='none'){ l.innerHTML='<IMG SRC=img/locked.ico width=18 height=18 BORDER=0>'; p.style.display='block';} else{ l.innerHTML='<IMG SRC=img/unlocked.ico width=18 height=18 BORDER=0>'; p.style.display='none';}}</script>";

//echo "Имя: ".$row['name']."<br>\n";
//echo "Отчество: ".$row['middle_name']."<br>\n";
//echo "<b>Пароль: </b>".$row['pass']."<br>\n";

}
 ?>

<?php
}
?>
