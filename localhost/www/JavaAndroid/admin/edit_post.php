<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>�������� �������������� �������</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--���������� ����� �����-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--���������� ����� ���� �����-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
      
<? 

if (!isset($id))

{
$result = mysql_query("SELECT title,id FROM data");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_post.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{

$result = mysql_query("SELECT * FROM data WHERE id=$id");      
$myrow = mysql_fetch_array($result);

$result2 = mysql_query("SELECT id,title FROM categories");      
$myrow2 = mysql_fetch_array($result2);

$count = mysql_num_rows($result2);

echo "<h3 align='center'>�������������� �������</h3>";

echo "<form name='form1' method='post' action='update_post.php'>
 <p>�������� ��������� ��� �������<br><select name='cat' size='$count'>";

do 
{

if ($myrow['cat'] == $myrow2['id'])
{
printf ("<option value='%s' selected>%s</option>",$myrow2["id"],$myrow2["title"]);
}

else
{
printf ("<option value='%s'>%s</option>",$myrow2["id"],$myrow2["title"]);
}

}
while ($myrow2 = mysql_fetch_array($result2));
 
echo "</select></p>"; 
 
echo "<p>��������� � ��������� ������?<br>
           <label><strong>��</strong><input type='radio'";
		   if ($myrow['secret'] == 1) { echo " checked ";}
echo "name='secret' id='secret' value='1'></label><label><strong>���</strong>
<input type='radio'";
          if ($myrow['secret'] == 0) { echo " checked ";} 

echo "name='secret' id='secret' value='0'></label></p> ";
 

print <<<HERE

         <p>
           <label>������� �������� �����<br>
             <input value="$myrow[title]" type="text" name="title" id="title">
             </label>
         </p>
         <p>
           <label>������� ������� �������� �����<br>
           <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d">
           </label>
         </p>
         <p>
           <label>������� �������� ����� ��� �����<br>
           <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k">
           </label>
         </p>
         <p>
           <label>������� ���� ���������� �����<br>
           <input value="$myrow[date]" name="date" type="text" id="date" value="2007-01-27">
           </label>
         </p>
         <p>
           <label>������ ������� �������� ����� � ������ �������
           <textarea name="description" id="description" cols="40" rows="5">$myrow[description]</textarea>
           </label>
         </p>
         <p>
           <label>������� ������ ����� ����� � ������
           <textarea name="text" id="text" cols="40" rows="20">$myrow[text]</textarea>
           </label>
         </p>
         <p>
           <label>������� ������ �����<br>
           <input value="$myrow[author]" type="text" name="author" id="author">
           </label>
         </p>
		 
		 <p>
           <label>������� ��� ����� ���������<br>
           <input value="$myrow[mini_img]" type="text" name="img" id="img">
           </label>
         </p>
		 
		 
		 <input name="id" type="hidden" value="$myrow[id]">
		 
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="��������� ���������">
           </label>
         </p>
       </form>



HERE;
}


?>
       
       
       </td>
      </tr>
    </table></td>
  </tr>
<!--���������� ������ ����������� �������-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
