<?php 
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{
	include ("blocks/bd.php");
if (isset($_GET['user_votes'])) {$score = $_GET['user_votes']; }
if (isset($_GET['id_arc'])) {$id = $_GET['id_arc']; }

echo "Вы поставили оценку ".$score." за проект с id = ".$id;	
sleep(2); // для теста на локальном компе





 

$result = mysql_query("SELECT rating,q_vote FROM data WHERE id='$id'",$db);
if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}
if (mysql_num_rows($result) > 0)
{
$myrow = mysql_fetch_array($result); 

$new_rating = $myrow['rating'] + $score;
$new_q_vote = $myrow['q_vote'] + 1;
$update = mysql_query("UPDATE data SET rating = '$new_rating', q_vote = '$new_q_vote'  WHERE id='$id'",$db); 
if ($update)
{
echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
</head></html>";
exit();
}
}
else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}


echo "Вы поставили оценку ".$score." за проект с id = ".$id;
}
?>