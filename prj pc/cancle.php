<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body dir="rtl">
<?php
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES 'utf8'");
if (isset($_SESSION["pic_src"])) {

	$temp=$_SESSION["pic_src"];
	$FileName = "$temp";
	$FileHandle = fopen($FileName, 'w');
	fclose($FileHandle);
	unlink($FileName);
	unset($_SESSION["title"]);
    unset($_SESSION["summary"]);
    unset($_SESSION["full"]);
    unset($_SESSION["pic_src"]);
    echo "<script type='text/javascript'> window.open('formProcessor.php','_self'); </script>";
}
else
{
	echo "<script type='text/javascript'> window.open('formProcessor.php','_self'); </script>";
}
</body>
</html>
