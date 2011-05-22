<?PHP
if(!defined('ALLOW')){
	header('Location: /index.php');
}
function get_con(){
//	 $con = mysql_connect("localhost","root","root");
	 $con = mysql_connect("localhost","ftpbj","bj12345678");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_query("SET NAMES 'utf8'");
mysql_select_db("ftpbj", $con);
//mysql_select_db("mysql", $con);

	 return $con;
}
?>