<? include ("blocks/bd.php");
if (isset($_GET['lang'])) {$lang = $_GET['lang']; }
if (!isset($lang)) {$lang = "rus";}

if (isset($_POST['submit_s']))
{
$submit_s = $_POST['submit_s'];
}

if (isset($_POST['search']))
{
$search = $_POST['search'];
}

if (isset($submit_s))
{

if (empty($search) or strlen($search) < 4)
{
exit ("<p>Поисковый запрос не введен, либо он менее 4-х символов.</p>");
}

$search = trim($search);
$search = stripslashes($search);
$search = htmlspecialchars($search);

}

else 
{
exit("<p>Вы обратились к файлу без необходимых параметров.</p>");
}




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo "Заметки по запросу - $search "; ?></title>
<script type="text/javascript" language="javascript" src="jquery.js"></script>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
  <? include ("blocks/header.php"); ?>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <? include ("blocks/lefttd.php"); ?>
        <td valign='top'>
        <? $n=0; include ("blocks/nav.php"); ?>
        
<? 
		
			
        
        $result = mysql_query("SELECT id,title,description,date,author,mini_img,view,rating,q_vote FROM data WHERE secret=0 and lang='$lang' AND text like '%$search%'",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{

$r = $myrow["rating"]/$myrow["q_vote"];
$r = intval($r);

printf ("<br><table align='center' class='post'>
         
		 <tr>
         <td class='post_title'>
		 <p class='post_name'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
		 <p class='post_adds'>Дата добавления: %s</p>
		 <p class='post_adds'>Автор урока: %s</p></td>
         </tr>
         
		 <tr>
         <td>%s 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
<div class='raiting'>
<div class='raiting_blank'></div>
<div class='raiting_hover'></div>
<div class='raiting_votes' style='width:%spx'></div>

</div>

	 
	 <p class='post_view'>&nbsp;&nbsp; Рейтинг: %s &nbsp;&nbsp; Просмотров: %s</p>		 
		 
		 
		 
		 
		 
		 </td>
		 
		 
         </tr>
         
		 </table><br><br>",$myrow["mini_img"],$myrow["id"],$myrow["title"], $myrow["date"],$myrow["author"],$myrow["description"], $r*17, $r, $myrow["view"]);



}
while ($myrow = mysql_fetch_array($result));



}

else
{
echo "<p>Информация по Вашему запросу на блоге не найдена.</p>";
exit();
}

?>
        
        </td>
      </tr>
    </table></td>
  </tr>
  <? include ("blocks/footer.php"); ?>
</table>
</body>
</html>
