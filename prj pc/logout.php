<html>

<head> <meta charset="utf-8">
<?php
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES 'utf8'");
?>
<title>خروج</title>
</head>
<body dir="rtl">
	<?php
	session_start();
	if (isset($_SESSION["admin"])) {
		unset($_SESSION["admin"]);
		echo "با موفقیت خارج شدید .";
		echo "<a href='login.php'>صفحه ی ورود</a>";
	}
	elseif (isset($_SESSION["logedin"])) {
		unset($_SESSION["logedin"]);
		echo "با موفقیت خارج شدید .";
		echo "<a href='login.php'>صفحه ی ورود</a>";
	}
	else{
		echo "از قبل وارد سایت نشده بودید .";
	}

	?>
</body>

</html>