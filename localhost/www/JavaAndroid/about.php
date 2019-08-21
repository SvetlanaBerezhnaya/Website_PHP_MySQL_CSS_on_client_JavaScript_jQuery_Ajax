<? include ("blocks/bd.php");
if (isset($_GET['lang'])) {$lang = $_GET['lang']; }
if (!isset($lang)) {$lang = "rus";}

$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='about' and lang='$lang'",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 
}

else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo $myrow["title"]; ?></title>
<script type="text/javascript" language="javascript" src="jquery.js"></script>
<link href="style.css" rel="stylesheet" type="text/css">
<meta name="description" content="<? echo $myrow["meta_d"]; ?>">
<meta name="keywords" content="<? echo $myrow["meta_k"]; ?>">
</head>

<body>

<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
  <? include ("blocks/header.php"); ?>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <? include ("blocks/lefttd.php"); ?>
        <td valign="top">
        <? $n=6; include ("blocks/nav.php"); ?>
		<? echo $myrow["text"]; ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
  <? include ("blocks/footer.php"); ?>
</table>
</body>
</html>
