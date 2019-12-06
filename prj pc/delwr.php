<html>
<head>
    <title>حذف کاربر</title>
</head>
<?php
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES 'utf8'");
?>
<body dir="rtl">

<?php
    $c=mysql_connect('localhost','root','');
    mysql_query("SET CHARACTER SET utf8"$c);
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
    $username=trim($_GET["username"]);
    $q = " SELECT username FROM writers WHERE username='$username';";
$select=mysql_query($q,$c);
if($select!=false)
{
    if($row=mysql_fetch_row($select))
    {
        $q = " DELETE FROM writers WHERE username='$username';"; 
        $sent=mysql_query($q,$c);
        if ($sent!=false) {
            echo "کاربر مورد نظر با موفقیت حذف گردید . ";
        }
    }
    else
    {
        echo "کاربری با نام کاربری ".trim($_GET["username"])." یافت نشد . <br> <a href='formProcessor.php'>صفحه ی کاربری</a>";
    }
}
else
{
  die("cannot read the 'ne' table...! ");
}
?>



</body>
</html>
