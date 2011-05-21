<?php
function check_email_address($emailcheck) {
	//首先，我们检查这里的@符号，然后看其长度是否正确。
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $emailcheck)) {
		// email无效，因为某个小段中的字符数量错误或@符号的数量错误
		return false;
	}
	//将其分割成小段
	$email_array = explode("@", $emailcheck);
	$local_array = explode(".", $email_array[0]);
	for ($i = 0; $i < sizeof($local_array); $i++) {
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
				↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
			return false;
		}
	}
	//检查域是否是一个IP地址，如果不是，它应该是一个有效的域
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
		$domain_array = explode(".", $email_array[1]);
		if (sizeof($domain_array) < 2) {
			return false; // 域长度不够
		}
		for ($i = 0; $i < sizeof($domain_array); $i++) {
			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
						↪([A-Za-z0-9]+))$", $domain_array[$i])) {
				return false;
			}
		}
	}
	return true;
}
function add_comment($name,$emailStr,$homepage,$commenttext,$id){
 $con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_query("SET NAMES 'utf8'");
mysql_select_db("mysql", $con);


$sql="INSERT INTO COMMENT (name,email, site,comment,add_date,comment_item_id) 
VALUES ('$name','$emailStr','$homepage', '$commenttext',now(),'$id')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_close($con);
	
}
$authorName = $_POST["author"];
$authorNameLen = strlen($authorName);
$email = $_POST["email"];
$emailLen = strlen($email);
$url = $_POST["url"];
$urlLen = strlen($url);
$comment = $_POST["comment"];
$commentLen = strlen($comment);
$commentItemId=$_POST["id"];
if ($authorNameLen > 0 && $authorNameLen <= 20 && check_email_address($email) && $urlLen < 40 &&$commentLen < 1600) {
	add_comment($authorName,$email,$url,$comment,$commentItemId);
	header('Location: /comment.php');
} else {
	header('Location: /comment.php?t=1');
}
?>