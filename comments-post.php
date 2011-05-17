<?php
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("mysql", $con);
// some code
$result = mysql_query("SELECT * FROM COMMENT");

while($row = mysql_fetch_array($result))
  {
  echo $row['email'] . " " . $row['name'];
  echo "<br />";
  }

mysql_close($con);
?>