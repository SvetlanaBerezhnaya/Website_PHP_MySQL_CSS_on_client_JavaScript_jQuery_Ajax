 <td width="182" valign="top" class="left">
 


<div style="float:left" > 
 
  <div id="firstpane" class="menu_list">
  
		<p class="menu_head">Категории</p>
		<div class="menu_body">
        
        
        
 <?
 $result2 = mysql_query("SELECT * FROM categories order by id",$db);
if (!$result2)
{
	echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору 	admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
	exit(mysql_error());
}
if (mysql_num_rows($result2) > 0)
{
	$myrow2 = mysql_fetch_array($result2);
	do 
	{
		printf ("<a href='view_cat.php?cat=%s'>%s</a>",$myrow2["id"],$myrow2["title"]);
	}
	while ($myrow2 = mysql_fetch_array($result2));
}
else
{
	echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
	exit();
}
 ?>
        
		</div>
        
        
		<p class="menu_head">Последние проекты</p>
		<div class="menu_body">
        
        
        
        
<?php 
	$result3 = mysql_query("SELECT id,title FROM data WHERE secret=0 ORDER BY id DESC LIMIT 5",$db);
	if (!$result3)
	{
		echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору 		admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
		exit(mysql_error());
	}
	if (mysql_num_rows($result3) > 0)
	{
		$myrow3 = mysql_fetch_array($result3);
		do 
		{
			printf("<a href='view_post.php?id=%s'>%s</a>",$myrow3["id"],$myrow3["title"]);
		}
		while ($myrow3 = mysql_fetch_array($result3));
	}
	else
	{
		echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
		exit();
	}
?>
        
        
        
        
        
			
        	
		</div>
		<p class="menu_head">Архив</p>
		<div class="menu_body">
        
        
        
        
        
        

<? 
	$result4 = mysql_query("SELECT DISTINCT left(date,7) AS month FROM data WHERE secret=0 ORDER BY month DESC",$db);
	if (!$result4)
	{
		echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
		exit(mysql_error());
	}
	if (mysql_num_rows($result4) > 0)
	{
		$myrow4 = mysql_fetch_array($result4); 
		do 
		{
			printf ("<a href='view_date.php?date=%s'>%s</a>",$myrow4["month"],$myrow4["month"]);
		}
		while ($myrow4 = mysql_fetch_array($result4));
	}
	else
	{
		echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
		exit();
	}
?> 
	
       </div>
       
       
       
       
       
       
		<p class="menu_head">Полезные ссылки</p>
		<div class="menu_body">
        
        
        



<?
	$result7 = mysql_query("SELECT title,link FROM friends",$db);
	if (!$result7)
	{
		echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
		exit(mysql_error());
	}
	if (mysql_num_rows($result7) > 0)
	{
		$myrow7 = mysql_fetch_array($result7);
		do 
		{
			printf ("<a href='%s' target='_blank'>%s</a>",$myrow7["link"],$myrow7["title"]);
		}
		while ($myrow7 = mysql_fetch_array($result7)); 
	}
	else
	{
		echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
		exit();
	}
?>
        
        
        
        
			
        	
		</div>



<script type="text/javascript">

$(document).ready(function()
{

	$("#firstpane p.menu_head").click(function()
    {
		$(this).css({backgroundImage:"url(images/down.png)"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
       	$(this).siblings().css({backgroundImage:"url(images/left.png)"});
	});
	
});
</script>



       
  </div>  
</div>



 
 


















 

 







  
 
 
 
 <br> 
   <div class="nav_title">Курсы валют</div>

 <!--Kurs.com.ua main-ukraine 300x130 blue-->
<div id='kurs-com-ua-informer-main-ukraine-300x130-blue-container'><a href="//kurs.com.ua/informer" id="kurs-com-ua-informer-main-ukraine-300x130-blue" title="Курс валют информер Украина" rel="nofollow" target="_blank">Информер курса валют</a></div>
<script type='text/javascript'>
(function() {var iframe = '<ifr'+'ame src="//kurs.com.ua/informer/inf2?color=blue" width="300" height="130" frameborder="0" vspace="0" scrolling="no" hspace="0"></ifr'+'ame>';var container = document.getElementById('kurs-com-ua-informer-main-ukraine-300x130-blue');container.parentNode.innerHTML = iframe;})();
</script>
<noscript><img src='//kurs.com.ua/static/images/informer/kurs.png' width='52' height='26' alt='kurs.com.ua: курс валют в Украине!' title='Курс валют' border='0' /></noscript>
<!--//Kurs.com.ua main-ukraine 300x130 blue-->

 

 
 
 
  <div class="nav_title">Опрос</div>
 <br>
 <?php

/* path */ 
$poll_path = dirname(__FILE__);

require_once "poll/include/config.inc.php";
require_once "poll/include/$POLLDB[class]";
require_once "poll/include/class_poll.php";
$CLASS["db"] = new polldb_sql;
$CLASS["db"]->connect(); 

$php_poll = new poll();

/* the first poll */ 
echo $php_poll->poll_process(1);
?>

 
 
 


 <div class="nav_title">Статистика</div>
 
 <?php 
 
$result10 = mysql_query ("SELECT COUNT(*) FROM data",$db);
$sum = mysql_fetch_array($result10);

$result11 = mysql_query ("SELECT COUNT(*) FROM comments",$db);
$sum2 = mysql_fetch_array($result11);

function online () {
$ip=getenv("HTTP_X_FORWARDED_FOR");
if (empty($ip) || $ip=='unknown') { $ip=getenv("REMOTE_ADDR"); }
# уд. старые сессии
mysql_query ("DELETE FROM online WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(time) > 300") or die ("Can't delete old sess");

# проверка на присутстаие или занесение нового пользователя
$select = mysql_query ("SELECT ip FROM online WHERE ip='$ip'") or die ("Can't select duble");
$tmp = mysql_fetch_row ($select);
if ($ip == $tmp[0]) {
mysql_query ("UPDATE online SET time=NOW() WHERE ip='$ip'") or die ("Can't update");
} else {
mysql_query ("INSERT INTO online (ip,time) VALUES ('$ip',NOW())") or die ("Can't insert");
}
# считывание результатов
$select = mysql_query ("SELECT COUNT(*) FROM online") or die ("Can't select result");
$tmp = mysql_fetch_row ($select);
$result = $tmp[0];

return $result;
}

echo "<p class='comments'>Заметок в базе: $sum[0]<br> Комментариев: $sum2[0]<br> Человек на сайте: ".online()."</p>"; 
 
 ?> 
 
 
 
 
 
   <div class="nav_title">Поиск</div>
 
 <form action="view_search.php" method="post" name="form_s">
 
 <p class="search_t">Поисковый запрос должен быть не менее 4-х символов.</p>
 <p align='center'><input class='sinput' name="search" type="text" size="25" maxlength="40"></p>
 <p align='center'><input class="sbutton" name="submit_s" type="submit" value="Искать">
 </p>
 
 
 </form>
 
 




 </td>
