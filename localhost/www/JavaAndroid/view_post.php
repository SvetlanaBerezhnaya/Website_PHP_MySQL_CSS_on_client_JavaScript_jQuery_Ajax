<? include ("blocks/bd.php");
if (isset($_GET['lang'])) {$lang = $_GET['lang']; }
if (!isset($lang)) {$lang = "rus";}

if (isset($_GET['id'])) {$id = $_GET['id']; }
if (!isset($id)) {$id = 1;}

/* Проверяем, является ли переменная числом */
if (!preg_match("|^[\d]+$|", $id)) {
exit ("<p>Неверный формат запроса! Проверьте URL!");
}

$result = mysql_query("SELECT * FROM data WHERE id='$id' and lang='$lang'",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 
$new_view = $myrow["view"] + 1;
$update = mysql_query ("UPDATE data SET view='$new_view' WHERE id='$id' and lang='$lang'",$db);


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
<script type="text/javascript" language="javascript" src="jquery_raiting.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.cookies.js"></script>
<script type="text/javascript">
$(document).ready(function(){
total_reiting = <? echo round($myrow["rating"]/$myrow["q_vote"],1); ?> // итоговый рейтинг
id_arc = <? echo $myrow["id"]; ?>; // id проекта 
var star_widht = total_reiting*17 ;
$('#raiting_votes').width(star_widht);
$('#raiting_info h5').append(total_reiting);
he_voted = $.cookies.get('article'+id_arc); // проверяем есть ли кука?
if(he_voted == null){
$('#raiting').hover(function() {
      $('#raiting_votes, #raiting_hover').toggle();
	  },
	  function() {
      $('#raiting_votes, #raiting_hover').toggle();
});
var margin_doc = $("#raiting").offset();
$("#raiting").mousemove(function(e){
var widht_votes = e.pageX - margin_doc.left;
if (widht_votes == 0) widht_votes =1 ;
user_votes = Math.ceil(widht_votes/17);  
// обратите внимание переменная  user_votes должна задаваться без var, т.к. в этом случае она будет глобальной и мы сможем к ней обратиться из другой ф-ции (нужна будет при клике на оценке.
$('#raiting_hover').width(user_votes*17);
});
// отправка
$('#raiting').click(function(){
$('#raiting_info h5, #raiting_info img').toggle();
$.get(
"raiting.php",
{id_arc: id_arc, user_votes: user_votes}, 
function(data){
	$("#raiting_info h5").html(data);
	$('#raiting_votes').width((total_reiting + user_votes)*17/2);
	$('#raiting_info h5, #raiting_info img').toggle();
	
	$('#raiting_info h5').append(<? echo intval($myrow["rating"]/$myrow["q_vote"]); ?>);
	
	
	
	$.cookies.set('article'+id_arc, 123, {hoursToLive: 1}); // создаем куку 
	$("#raiting").unbind();
	$('#raiting_hover').hide();
	}
	   )
								   });
}
						   });
</script>


<link href="style.css" rel="stylesheet" type="text/css">
<meta name="description" content="<? echo $myrow["meta_d"]; ?>">
<meta name="keywords" content="<? echo $myrow["meta_k"]; ?>">





<script async src="./CSS3 Accordion demo - RedTeamDesign_files/adpacks-demo.js"></script><style type="text/css">				#adpacks-wrapper{font-family: Arial, Helvetica;width:280px;position: fixed;_position:absolute;bottom: 0;right: 20px;z-index: 9999;background: #eaeaea;padding: 10px;-moz-box-shadow: 0 0 15px #444;-webkit-box-shadow: 0 0 15px #444;box-shadow: 0 0 15px #444;-moz-border-radius: 5px 5px 0 0;-webkit-border-radius: 5px 5px 0 0;border-radius: 5px 5px 0 0;}				body .adpacks{background:#fff;padding:15px;margin:15px 0 0;border:3px solid #eee;}				body .one .bsa_it_ad{background:transparent;border:none;font-family:inherit;padding:0;margin:0;}/				body .one .bsa_it_ad .bsa_it_i{display:block;padding:0;float:left;margin:0 10px 0 0;}				body .one .bsa_it_ad .bsa_it_i img{padding:0;border:none;}				body .one .bsa_it_ad .bsa_it_t{padding: 0 0 6px 0; font-size: 11px;}				body .one .bsa_it_p{display:none;}				body #bsap_aplink,body #bsap_aplink:hover{display:block;font-size:9px;margin: -15px 0 0 0;text-align:right;}				body .one .bsa_it_ad .bsa_it_d{font-size: 11px;}				body .one{overflow: hidden}				</style><script type="text/javascript" async src="./CSS3 Accordion demo - RedTeamDesign_files/bsa.js"></script><script type="text/javascript" id="_bsap_js_a5f348233fceef06ba365ab392938d10" src="./CSS3 Accordion demo - RedTeamDesign_files/s_a5f348233fceef06ba365ab392938d10.js" async></script><style type="text/css" id="bsa_css">.one{position:relative}.one .bsa_it_ad{display:block;padding:15px;border:1px solid #e1e1e1;background:#f9f9f9;font-family:helvetica,arial,sans-serif;line-height:100%;position:relative}.one .bsa_it_ad a{text-decoration:none}.one .bsa_it_ad a:hover{text-decoration:none}.one .bsa_it_ad .bsa_it_t{display:block;font-size:12px;font-weight:bold;color:#212121;line-height:125%;padding:0 0 5px 0}.one .bsa_it_ad .bsa_it_d{display:block;font-size:11px;color:#434343;font-size:12px;line-height:135%}.one .bsa_it_ad .bsa_it_i{float:left;margin:0 15px 10px 0}.one .bsa_it_p{display:block;text-align:right;position:absolute;bottom:10px;right:15px}.one .bsa_it_p a{font-size:10px;color:#666;text-decoration:none}.one .bsa_it_ad .bsa_it_p a:hover{font-style:italic}</style>

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
				
printf ("<p class='post_title2'>%s</p><p class='post_add'>Автор: %s</p><p class='post_add'>Дата: %s</p>",$myrow["title"],$myrow["author"],$myrow["date"]);
?>         
         
         
         
         

         


                        

         
         
         
         
         
       
			<? 


$r = $myrow["rating"]/$myrow["q_vote"];
$r = intval($r);

				
printf ("%s










<div id='raiting_star'>
<div id='raiting'>
<div id='raiting_blank'></div>
<div id='raiting_hover'></div>
<div id='raiting_votes'></div>
</div>
<p class='post_view'><div id='raiting_info'>  <img src='load.gif' /> <h5> Рейтинг:  &nbsp;&nbsp;</h5></div> Просмотров: %s</p>
</div>

	 

 	 
	 
	 


",$myrow["text"], $myrow["view"]);



printf("<p align='center'><a href='/JavaAndroid/files/231116/f1/f1.rar'><img src='img/download_%s.jpg' alt='Скачать исходники'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='/JavaAndroid/files/231116/f1/f1.rar'><img src='img/GitHub_%s.jpg' alt='Ссылка на GitHub'></a></p>",$lang,$lang);

        

?>

















<?
echo "<p class='post_comment'>Комментарии к этой заметке:</p>";	

$result3 = mysql_query ("SELECT * FROM comments WHERE post='$id'",$db);
if (mysql_num_rows($result3) > 0)
{
$myrow3 = mysql_fetch_array($result3);

do 
{
printf ("<div class='post_div'><p class='post_comment_add'>Комментарий добавил(а): <strong>%s</strong> <br> Дата: <strong>%s</strong></p>
<p>%s</p></div>",$myrow3["author"], $myrow3["date"], $myrow3["text"]);

}
while ($myrow3 = mysql_fetch_array($result3));


}

$result4 = mysql_query ("SELECT img FROM comments_setting",$db);
$myrow4 = mysql_fetch_array($result4);

?>

<p class='post_comment'>Добавить Ваш комментарий:</p>
<form action="comment.php" method="post" name="form_com">
<p><label>Ваше имя: </label><input name="author" type="text" size="30" maxlength="30"></p>
<p><label>Текст комментария: <br> <textarea name="text" cols="32" rows="4"></textarea></label></p><p>Введите сумму чисел с картинки<br><img style='margin-top:17px;' src="<? echo $myrow4["img"]; ?>" width="80" height="40">
  <input style='margin-bottom:16px;' name="pr" type="text" size="5" maxlength="5"></p>
  <input name="id" type="hidden" value="<? echo $id; ?>">
<p><input class="sbutton" name="sub_com" type="submit" value="Комментировать"></p> 


</form>




 
 
 

        
        </td>
      </tr>
    </table></td>
  </tr>
  <? include ("blocks/footer.php"); ?>
</table>
</body>
</html>
