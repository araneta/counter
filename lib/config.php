<?
include_once "functions.php";
$database=connect();

mysql_connect('localhost',$database['user'] , $database['pass']) or die ('can\'t connect mysql');
mysql_select_db($database['db']);
?>