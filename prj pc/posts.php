<html>
<?php
		$c=mysql_connect('localhost','root','');
		mysql_query("SET CHARACTER SET utf8",$c);
		mysql_query("SET NAMES 'utf8'",$c);
		if(!$c)
		{
		    die("متاسفانه امکان اتصال به سرور وجود ندار . ");
		}
		if(!mysql_select_db('news',$c))
		{
		    mysql_close($c);
		    die("امکان اتصال به پایگاه داده (database) وجود ندارد .");
		}
		if (isset($_GET['id'])) {
				$flag=true;
				$id = mysql_real_escape_string($_GET['id']);
				$q = "SELECT * FROM ne WHERE ID = '$id'";
				$select=mysql_query($q,$c);
				if ($select!=false) {
					$row = mysql_fetch_array($select);
					$pic_src=$row['pic'];
					$summary=$row['summary'];
					$title=$row['title'];
					$full=$row['full'];
					}
			}
		else{
    			echo "ابتدا از صفحه ی اصلی ، خبری را جهت نمایش انتخاب نمایید . <br>";
    			echo "<a href='index.php'> صفحه ی اصلی </a>";
    			$flag=false;
			}
?>
<head> <meta charset="utf-8">

<title><?php echo $title; ?></title>

</head>

<body dir="rtl">
	<?php
		if ($flag==true) {
		echo "<table align='center' bgcolor='#AACCBB' width='75%'>";
		echo "<tr><td><h1>$title</h1></td><td  rowspan='2' width='40%'><img width='100%' height='100%' src='upload/";
		echo $pic_src;
		echo "'></td></tr>";
		echo "<tr><td ><h3>".$summary."</h3></td></tr>";
		echo "<tr><td colspan='2'>" . $full . "</td> </tr>";
		echo "</table>";
		}
	?>
</body>
	
</table>
</html>