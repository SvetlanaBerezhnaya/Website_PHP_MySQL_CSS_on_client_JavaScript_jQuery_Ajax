<? include ("blocks/bd.php");
if (isset($_GET['lang'])) {$lang = $_GET['lang']; }
if (!isset($lang)) {$lang = "rus";}
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='secret' and lang='$lang'",$db);

if (!$result)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� admin@ruseller.com. <br> <strong>��� ������:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 
}

else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
exit();
}

if (isset($_POST['code']))
{
$code = $_POST['code'];
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
       
<? $n=4; include ("blocks/nav.php"); ?>
        
        <? echo $myrow["text"]; 

$result0 = mysql_query ("SELECT prcode FROM options",$db);
if ($result0)
{
$myrow = mysql_fetch_array($result0);
$prcode = $myrow["prcode"];		
}		
else
{
exit ("<p>�� ������� �������� ��� ���������� �������. ��������� ������� ������.");
}

if (!isset($code) or $code != $prcode)

{
		
echo "<form name='sec' action='secret.php' method='post'>
<p align='center'><strong>������� ��� ����������</strong></p>
<p align='center'><input class='sinput' type='text' name='code'></p>
<p align='center'><input class='sbutton' type='submit' name='submit' value='�������� ������'></p>
</form>
<p align='center'><img src='img/zam.jpg' width='120' height='116'></p>";

$result = mysql_query("SELECT id,title,description,date,author,mini_img,view FROM data WHERE secret=1",$db);

if (!$result)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� admin@ruseller.com. <br> <strong>��� ������:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{
printf ("<table align='center' class='post'>
         
		 <tr>
         <td class='post_title'>
		 <p class='post_secret'><img class='mini' align='left' src='%s'><a href='#'>%s (������ ������)</a></p>
		 <p class='post_adds'>���� ����������: %s</p>
		 <p class='post_adds'>����� �����: %s</p></td>
         </tr>
         
		 <tr>
         <td>%s <p class='post_view'>����������: %s</p></td>
         </tr>
         
		 </table><br><br>",$myrow["mini_img"],$myrow["title"], $myrow["date"],$myrow["author"],$myrow["description"], $myrow["view"]);



}
while ($myrow = mysql_fetch_array($result));
		
}

}

else

{


$result = mysql_query("SELECT id,title,description,date,author,mini_img,view FROM data WHERE secret=1",$db);

if (!$result)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� admin@ruseller.com. <br> <strong>��� ������:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{
printf ("<table align='center' class='post'>
         
		 <tr>
         <td class='post_title'>
		 <p class='post_name'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
		 <p class='post_adds'>���� ����������: %s</p>
		 <p class='post_adds'>����� �����: %s</p></td>
         </tr>
         
		 <tr>
         <td>%s <p class='post_view'>����������: %s</p></td>
         </tr>
         
		 </table><br><br>",$myrow["mini_img"],$myrow["id"],$myrow["title"], $myrow["date"],$myrow["author"],$myrow["description"], $myrow["view"]);



}
while ($myrow = mysql_fetch_array($result));

}	
		
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
