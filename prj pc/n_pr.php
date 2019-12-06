<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body dir="rtl">
<?php
$n=$_GET["N"];
$x=file_put_contents("n.txt",$n);
if ($x!=false) {
	echo "با موفقیت انجام شد .";
	echo "<a href='formProcessor.php'>صفحه ی کاربری</a>";
}
else
	echo "مشکلی هنگام تغییر اطلاعات رخ داد .";
?>
</body>
</html>
