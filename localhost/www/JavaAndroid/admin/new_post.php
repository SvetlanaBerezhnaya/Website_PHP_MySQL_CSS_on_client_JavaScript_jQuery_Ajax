<? include ("lock.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница добавления новой заметки</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--Подключаем шапку сайта-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--Подключаем левый блок сайта-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
       <form name="form1" method="post" action="add_post.php">
         <p>
           <label>Введите название заметки<br>
             <input type="text" name="title" id="title">
             </label>
         </p>
         <p>
           <label>Введите краткое описание заметки<br>
           <input type="text" name="meta_d" id="meta_d">
           </label>
         </p>
         <p>
           <label>Введите ключевые слова для заметки<br>
           <input type="text" name="meta_k" id="meta_k">
           </label>
         </p>
         <p>
           <label>Введите дату добавления заметки<br>
           <input name="date" type="text" id="date" value="<?php $date = date("Y-m-d"); echo $date; ?>">
           </label>
         </p>
         <p>
           <label>Ведите краткое описание заметки с тэгами абзацев
           <textarea name="description" id="description" cols="40" rows="5"></textarea>
           </label>
         </p>
         <p>
           <label>Введите полный текст заметки с тэгами
           <textarea name="text" id="text" cols="40" rows="20"></textarea>
           </label>
         </p>
         <p>
           <label>Введите автора заметки<br>
           <input type="text" name="author" id="author">
           </label>
         </p>
         
         <p>
           <label>Введите где лежит миниатюра<br>
           <input type="text" name="img" id="img">
           </label>
         </p>
         
         <p>
           <label>Выберите категорию заметки<br>
           
           <select name="cat">
           
           <?
		   
       $result = mysql_query("SELECT title,id FROM categories",$db);

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
printf ("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);



}
while ($myrow = mysql_fetch_array($result));



}

else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}

?>
       
       
       
           </select>
           
           </label>
         </p>
         
         
         <p>Добавлять в секретный раздел?<br>
           <label><strong>Да</strong>
           <input type="radio" name="secret" id="secret" value="1">
           </label>
           
            <label><strong>Нет</strong>
           <input type="radio" checked name="secret" id="secret" value="0">
           </label>
         </p>
         
         
         
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Занести заметку в базу">
           </label>
         </p>
       </form>
       <p>&nbsp;</p>        </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
