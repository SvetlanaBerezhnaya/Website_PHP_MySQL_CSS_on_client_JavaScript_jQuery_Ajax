<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_POST['title']))       
{
$title = $_POST['title']; 

if ($title == '') 
{
unset($title);
}  

}

if (isset($_POST['link']))      {$link = $_POST['link']; if ($link == '') {unset($link);}}



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Обработчик</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--Подключаем шапку сайта-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--Подключаем левый блок сайта-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
      
         <?php 
if (isset($title) && isset($link))
{
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("INSERT INTO friends (title,link) VALUES ('$title', '$link')");

if ($result == 'true') {echo "<p>Ваш друг успешно добавлен!</p>";}
else {echo "<p>Ваш друг не добавлен!</p>";}


}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому друг в базу не может быть добавлен.</p>";
}
		 
		 
		 
		 ?>
         
         
             </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
