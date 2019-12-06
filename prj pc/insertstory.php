<html>
<head>
    <title>ثبت خبر</title>
</head>
<body dir="rtl">
<?php
session_start();
if (isset($_SESSION["pic_src"]) && isset($_SESSION["title"]) && isset($_SESSION["summary"]) && isset($_SESSION["full"]) ) {
        $title=$_SESSION["title"];
        $summary=$_SESSION["summary"];
        $full=$_SESSION["full"];
        $pic_src=$_SESSION["pic_src"];
    $c=mysql_connect('localhost','root','');
    mysql_query("SET CHARACTER SET utf8",$c);
    mysql_query("SET NAMES 'utf8'",$c);
    if(!$c)
    {
        die("Could not connect to server...");
    }
    if(!mysql_select_db('news',$c))
    {
        mysql_close($c);
        die("Could not select proper DB...");
    }

            $q="INSERT INTO ne(pic,summary,title,full) VALUES('$pic_src','$summary','$title','$full');";
            $select=mysql_query($q,$c);
            echo "خبر شما با موفقیت ثبت گردید .";
            unset($_SESSION["title"]);
            unset($_SESSION["summary"]);
            unset($_SESSION["full"]);
            unset($_SESSION["pic_src"]);
            echo "<script type='text/javascript'> alert('خبر ، با موفقیت اضافه شد .');";
            echo "window.open('formProcessor.php','_self'); </script>";
}
else
{
  echo "ابتدا از صفحه ی کابری خود ، خبری را وارد نمایید .";
  echo "<a href='formProcessor.php'>صفحه ی کاربری</a>";
}
?>



</body>
</html>
