<html>
<head>
    <title>حذف خبر</title>
</head>
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
    $title=trim($_GET["title"]);
    $q = " SELECT title FROM ne WHERE title='$title';";
$select=mysql_query($q,$c);
if($select!=false)
{
    if($row=mysql_fetch_row($select))
    {
        $q = " DELETE FROM ne WHERE title='$title';"; 
        $sent=mysql_query($q,$c);
        if ($sent!=false) {
            echo "خبر مورد نظر با موفقیت حذف گردید . ";
        }
    }
    else
    {
        echo "خبری با عنوان ".trim($_POST["title"])." یافت نشد . <br> <a href='formProcessor.php'>صفحه ی کاربری</a>";
    }
}
else
{
  die("cannot read the 'ne' table...! ");
}
?>



</body>
</html>
