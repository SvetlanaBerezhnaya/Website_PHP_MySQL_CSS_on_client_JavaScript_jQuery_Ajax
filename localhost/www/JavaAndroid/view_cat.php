<? include ("blocks/bd.php");
if (isset($_GET['lang'])) {$lang = $_GET['lang']; }
if (!isset($lang)) {$lang = "rus";}

if (isset($_GET['cat'])) {$cat = $_GET['cat']; }
if (!isset($cat)) {$cat = 1;}

/* ���������, �������� �� ���������� ������ */
if (!preg_match("|^[\d]+$|", $cat)) {
exit ("<p>�������� ������ �������! ��������� URL!");
}

$result = mysql_query("SELECT * FROM categories WHERE id='$cat' and lang='$lang' order by id",$db);

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


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo "������� ��������� - $myrow[title]"; ?></title>
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
        <td valign='top'>
		 <? $n=0; include ("blocks/nav.php"); ?>
		<? 
		
		echo $myrow["text"]; 
		
$result77 = mysql_query("SELECT str FROM options", $db);
$myrow77 = mysql_fetch_array($result77);
$num = $myrow77["str"];
// ��������� �� URL ������� ��������
@$page = $_GET['page'];
// ���������� ����� ����� ��������� � ���� ������
$result00 = mysql_query("SELECT COUNT(*) FROM data WHERE secret=0 AND cat='$cat' and lang='$lang'",$db);
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
// ������� ����� ����� �������
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
// ���������� ������ ��������� ��� ������� ��������
$page = intval($page);
// ���� �������� $page ������ ������� ��� ������������
// ��������� �� ������ ��������
// � ���� ������� �������, �� ��������� �� ���������
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// ��������� ������� � ������ ������
// ������� �������� ���������
$start = $page * $num - $num;
// �������� $num ��������� ������� � ������ $start			
		
		
$result = mysql_query("SELECT id,title,description,date,author,mini_img,view,rating,q_vote FROM data WHERE secret=0 AND cat='$cat' and lang='$lang' ORDER BY id LIMIT $start, $num",$db);

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

$r = round($myrow["rating"]/$myrow["q_vote"],1);

printf ("<table align='center' class='post'>
         
		 <tr>
         <td class='post_title'>
		 <p class='post_name'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
		 <p class='post_adds'>���� ����������: %s</p>
		 <p class='post_adds'>����� �����: %s</p></td>
         </tr>
         
		 <tr>
         <td>%s 
		 
		 
		 

<div class='raiting'>
<div class='raiting_blank'></div>
<div class='raiting_hover'></div>
<div class='raiting_votes' style='width:%spx'></div>

</div>

	 
	 <p class='post_view'>&nbsp;&nbsp; �������: %s &nbsp;&nbsp; ����������: %s</p>
		 
		
		 
		 
		 



		 
		 

		 
		 
		 











		 
		 
		 </td>
         </tr>
         
		 </table><br><br>",$myrow["mini_img"],$myrow["id"],$myrow["title"], $myrow["date"],$myrow["author"],$myrow["description"], $r*17, $r, $myrow["view"]);



}
while ($myrow = mysql_fetch_array($result));


// ��������� ����� �� ������� �����
if ($page != 1) $pervpage = '<a href=view_cat.php?cat='.$cat.'&page=1>������</a> | <a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>����������</a> | ';
// ��������� ����� �� ������� ������
if ($page != $total) $nextpage = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>���������</a> | <a href=view_cat.php?cat='.$cat.'&page=' .$total. '>���������</a>';

// ������� ��� ��������� ������� � ����� �����, ���� ��� ����
if($page - 5 > 0) $page5left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// ����� ���� ���� ������� ������ �����

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
}




}

else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
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
