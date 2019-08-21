<? include ("lock.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница добавления нового сайта друга</title>
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
        <p><strong>Страница добавления сайта друга</strong></p>
       <form name="form1" method="post" action="add_friend.php">
         <p>
           <label>Введите название сайта друга<br>
             <input type="text" name="title" id="title">
             </label>
         </p>
         <p>
           <label>Введите ссылку на сайт друга<br>
           <input type="text" name="link" id="link">
           </label>
         </p>
           
        
         
         
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Занести сайт в базу">
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
