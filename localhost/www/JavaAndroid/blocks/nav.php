<? include ("blocks/bd.php");
if (isset($_GET['n'])) {$n = $_GET['n']; }	
if (isset($_GET['lang'])) {$lang = $_GET['lang']; }
if (!isset($lang)) {$lang = "rus";}
if (!isset($n)) {$n = 1;}

$result = mysql_query("SELECT id, title, page FROM navigation WHERE lang='$lang' order by id",$db);

 if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow1 = mysql_fetch_array($result); 
echo("<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>");
do 
{
    echo("<td width='17%' ");
	if (isset($n)) {if ($n==$myrow1["id"]) echo "class='nav_a'"; else echo "class='nav_t'"; }
	printf("><p><strong><a href='%s.php'>%s</a></strong></p></td>",$myrow1["page"],$myrow1["title"]);
}
while ($myrow1 = mysql_fetch_array($result));	
}

else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
} 
	?> 
  </tr>
</table>