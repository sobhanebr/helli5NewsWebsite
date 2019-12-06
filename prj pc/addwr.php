<html>
<body dir="rtl">

<?php
session_start();
$username=trim($_POST["username"]);
$pass=trim($_POST["password"]);
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
$q = " SELECT username FROM writers WHERE username='$username';";
$select=mysql_query($q,$c);
if($select!=false)
{
    if($row=mysql_fetch_row($select))
    {
         echo "کاربری با نام کابری وارد شده از قبل ثبت شده است . <br> ";
         echo "<a href='formProcessor.php'>صفحه ی کاربری</a>";
    }
    else
    {
        $q="INSERT INTO writers(username,password) VALUES('$username','$pass');";
        $sent=mysql_query($q,$c);
        if ($sent!=false){
            echo "کاربری با  نام کاربری  =  '<font color='blue'>".trim($_POST["username"]). "</font>'  و رمز عبور  =  '<font color='blue'>" . trim($_POST["password"])."</font>' ثبت شد!";
            echo "<a href='formProcessor.php'>صفحه ی کاربری</a>";
        }
    }
}
else
{
  die("cannot read the 'Register' table...! ");
}

?>



</body>
</html>
