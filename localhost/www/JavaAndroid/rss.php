<?php
 header("Content-Type: text/xml");
 echo "<?xml version=\"1.0\" encoding=\"windows-1251\"?>";
?>

<rss version="2.0">
<channel>
<title>Канал новостей блога ruseller.info</title>
<link>http://www.ruseller.info/</link>
<description>Блог странного дизайнера, лента новостей.</description>
<language>ru</language>
<?php 
include "blocks/bd.php";
$result = mysql_query("SELECT id,title,description FROM data WHERE secret='0' order by 'id' ");
if ($myrow = mysql_fetch_array($result)) 
{
do
{
printf ("<item>
<title>%s</title>
 <link>http://ruseller.info/view_post.php?id=%s</link>
<description>%s</description>
<author>admin@ruseller.info</author>
<guid>http://ruseller.info/view_post.php?id=%s</guid>
</item>", $myrow["title"],$myrow["id"],$myrow["description"],$myrow["id"]);
}
while ($myrow = mysql_fetch_array($result));
}
?>
</channel>
</rss>
