<?php  include ("blocks/bd.php");

if (isset($_POST['author']))
{
$author = $_POST['author'];
}

if (isset($_POST['text']))
{
$text = $_POST['text'];
}

if (isset($_POST['pr']))
{
$pr = $_POST['pr'];
}

if (isset($_POST['sub_com']))
{
$sub_com = $_POST['sub_com'];
}

if (isset($_POST['id']))
{
$id = $_POST['id'];
}

if (isset($sub_com))
{
if (isset($author)) {trim($author);   }
else {$author = "";}

if (isset($text)) {trim($text);   }
else {$text = "";}

if (empty($author) or empty($text))
{
exit ("<p>�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����. <br> <input name='back' type='button' value='��������� �����' onclick='javascript:self.back();'>");
}

$author = stripslashes($author);
$text = stripslashes($text);
$author = htmlspecialchars($author);
$text = htmlspecialchars($text);

$result = mysql_query ("SELECT sum FROM comments_setting",$db);
$myrow = mysql_fetch_array($result);

if ($pr == $myrow["sum"])
{
$date = date("Y-m-d");
$result2 = mysql_query ("INSERT INTO comments (post,author,text,date) VALUES ('$id','$author','$text','$date')",$db);
$address = "admin@ruseller.com";
$subject = "����� ����������� �� �����";
$result3 = mysql_query ("SELECT title FROM data WHERE id='$id'",$db);
$myrow3 = mysql_fetch_array ($result3);
$post_title = $myrow3["title"];
$message = "�������� ����������� � ������� - ".$post_title."\n����������� �������(�): ".$author."\n����� �����������: ".$text."\n������ �� �������: http://localhost/phpblog/view_post.php?id=".$id."";
mail($address,$subject,$message,"Content-type:text/plain; Charset=windows-1251\r\n");

echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
</head></html>";
exit();



}
else 
{
exit ("<p>�� ����� �������� ����� ���� � �������� �� ���������� ��������. <br> <input name='back' type='button' value='��������� �����' onclick='javascript:self.back();'>");
}










}

?>