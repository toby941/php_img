<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>每日订饭</title>
</head>
<?php


//error_reporting(E_ALL^E_NOTICE^E_WARNING);
$type = $_GET["type"];

if ($type == 'add') {
	//$name= trim($_GET["name"]);
	$name = str_ireplace(" ", "", trim($_GET["name"]));
	echo "trim  :" . $name;
	if (!empty ($name)) {
		$filepath = gmdate("Ymd");
		$file = fopen($filepath, "a+");
		//fseek($file,0);
		$str = file_get_contents($filepath);
		if (!stristr($str, $name)) {
			fwrite($file, "  " . $name);

		}
		fclose($file);
	}
}

if ($type == 'del') {
	$name = str_ireplace(" ", "", trim($_GET["name"]));
	echo "del name " . $name;
	if (!empty ($name)) {
		$filepath = gmdate("Ymd");
		//$file = fopen($filepath,"a+");
		$str = file_get_contents($filepath);
		$str = str_ireplace($name, "", $str);

		file_put_contents($filepath, $str);

	}

}
?>
<body>
 <form action="df.php" method="get">
   <table>
     <tbody>
       <tr>
         <th>姓名:</th>
       <td><input type="text" name="name" />   </td>
       </tr>
         <tr>
         <th><input type="hidden" value="add" name="type" />     </th>
       <td><input type="submit" value="预定今日晚饭" /> </td>
       </tr>
     </tbody>
   </table>
 </form>
  <table>
    <thead>当前预定人数</thead>
     <tbody>
	 <?php


$filepath = gmdate("Ymd");
$file = fopen($filepath, "r");
?>
	 
       <tr>
         <th>鲍军</th>
       <td><a href="df.php?type=del&name=鲍军" >取消预定</a>  </td>
       </tr>
     </tbody>
   </table>
 
</body>
</html>