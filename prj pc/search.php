<html>
<head>
<meta charset="utf-8">
<title>نتایج جستوجو</title>
</head>
<body dir="rtl">
<?php
if(!isset($_GET["input"]))
 die("ابتدا چیزی را جست و جو کنید .");

$key = $_GET["input"];
if($key == "")
 die("متنی را جهت جستوجو وارد کنید .");
$DbConn = mysql_connect("localhost", "root", "" ) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");
mysql_select_db("news",$DbConn) or die("Can Not Select DataBase Because: ". mysql_error());
$sql = "SELECT * FROM ne WHERE title LIKE '%".$key ."%';";
$SearchResult = mysql_query($sql) or die(mysql_error(). "SQL: ". $sql);
$TotalResults = mysql_num_rows($SearchResult);
if($TotalResults <= 0)
 die("موردی یافت نشد !");
while ($row = mysql_fetch_array($SearchResult)) {
		$ID = $row['ID'];
		$title = $row['title'];
		$summary = $row['summary'];
		$pic_src = $row['pic'];
		echo "<div style='width: 100%; display: block;'>";
		echo "<table align='center' bgcolor='#AACCBB' width='100%'>";
		echo "<tr> <td align='center'> ";
		echo "<a href='posts.php?id=".$ID."'><img src='upload/".$pic_src."'></a> </td>";
		echo "<td align='right'> <a href='posts.php?id=".$ID."'> <h2> ".$title." </h2> </a> <br>";
		echo $summary;
		echo "</td> </tr> </table> </div>";
}
?>
</body>
</html>
