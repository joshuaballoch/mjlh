<?
$link = mysql_connect('localhost','lsa','me7aes4ahH');
if (!$link) {
   die('Could not connect: ' . mysql_error());
}
mysql_select_db("lsa");
?>