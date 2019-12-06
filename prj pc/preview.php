<html>

<head> <meta charset="utf-8">

<title>پیش نمایش</title>

</head>
<body dir="rtl">
	<?php
	session_start();
	$uploadedpic=true;
	if ((isset($_SESSION["admin"])) || (isset($_SESSION["logedin"]))) {
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
		// pic functions
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
	//	&& ($_FILES["file"]["size"] < 100000)
		&& in_array($extension, $allowedExts)){
		    if ($_FILES["file"]["error"] > 0){
		        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		    }
		    else{
		        if (file_exists("upload/" . $_FILES["file"]["name"])){
		            echo $_FILES["file"]["name"] . " از قبل روی سرور وجود دارد لطفا با نامی دیگر امتحان کنید . ";
		        }
		        else{
		            move_uploaded_file($_FILES["file"]["tmp_name"],
		            "upload/" . $_FILES["file"]["name"]);
		        }
		    }
		}
		else{
			    echo "عکس انتخاب شده ، فاقد شرایط است .";
			    $uploadedpic=false;
			}
		}
	else
		echo "لطفا ابتدا از صفحه ی ورود ، وارد سایت شوید";

	if ($uploadedpic!=false) {
		$title=$_POST["title"];
		$summary=$_POST["summary"];
		$full=$_POST["full"];
		$pic_src=$_FILES["file"]["name"];
		$_SESSION["pic_src"]=$pic_src;
		$_SESSION["title"]=$title;
		$_SESSION["summary"]=$summary;
		$_SESSION["full"]=$full;

		echo "<table align='center' bgcolor='#AACCBB' width='75%'>";
		echo "<tr><td><h1>$title</h1></td><td  rowspan='2' width='40%'><img width='100%' height='100%' src='upload/";
		echo $pic_src;
		echo "'></td></tr>";
		echo "<tr><td ><h3>".$summary."</h3></td></tr>";
		echo "<tr><td colspan='2'>" . $full . "</td> </tr>";
		echo "<tr> <td colspan='2' align='center'> <a href='insertstory.php'><button>تایید</button></a> <a href='edit.php'><button>اصلاح</button></a> <a href='cancle.php'><button>انصراف</button></a> </td> </tr>  ";
		echo "</table>";
	}
	?>
</body>
	
</table>
</html>