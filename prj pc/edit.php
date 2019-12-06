<html>
<?php
session_start();
?>
<head> <meta charset="utf-8">

<title>اصلاح خبر</title>
<script type="text/javascript">
document.getElementById("title").value= <?php echo $_SESSION["title"]; ?> ;
	function h( ) 
{
	var temp="";

	if (document.getElementById("title").value.length==0)

		temp+="عنوان خبر را وارد نمائید. \r\n"; 

	if (temp.length!=0)
	{
		alert(temp);
		return false;
	}
	else if (temp.length==0)
		return true;
}

	function t(){
		<?php
		$table=array(0,0,3,3,6,1,4,6,2,5,0,3,5);
		$sh_table=array(
			array(11,10,10,9,9,9,8,9,9,10,11,9),
			array(20,20,21,21,22,22,22,22,21,21,20,19),
			array(11,10,10,9,9,9,8,9,9,10,11,10),
			array(20,20,21,21,22,22,22,22,21,21,20,19),
			array(12,11,11,10,10,10,9,10,10,11,12,10),
			array(19,19,20,20,21,21,21,21,20,20,19,18));
		$mi_table=array(
		array(20,19,19,19,20,20,21,21,21,21,20,20),
		array(10,11,10,12,11,11,10,10,10,9,10,10),
		array(19,18,20,20,21,21,22,22,22,22,21,21),
		array(11,12,10,11,10,10,9,9,9,8,9,9),
		array(20,19,20,20,21,21,22,22,22,22,21,21),
		array(10,11,9,11,10,10,9,9,9,8,9,9));

		date_default_timezone_set ('Iran');
		$clock=date("H:i");
		$ym=date("y");
		$YM=date("Y");
		$mm=date("m");
		$dm=date("d");
		// mi to sh                                                      
		$k=$ym%4;
		if($k==3) $k=2;
		$k*=2;
		$t1=$mi_table[$k][$mm-1];
		$t2=$mi_table[$k+1][$mm-1];
		if($mm<3 || ($mm==3 && $dm<=$mi_table[$k][$mm-1]))
			$year=$ym+78;
		else               
		    $year=$ym+79;
		if ($dm<=$t1)
		    {
		       $day=$dm+$t2;
		       $month=($mm+8)%12+1;
		    }                           
		else
		    { 
		       $day=$dm-$t1;
		       $month=($mm+9)%12+1; 
		    } 
		    $year+=1300;

		function isleapyear($y)
		  {
		    $y=$y&0x0003;
		    if ($y==0)
		       return 1;
		    else
		       return 0;   
		  }

		function checkvalidinput($input)
		  {
		    if($input>=1990 && $input<=2099)
		      return 1;
		    else
		      return 0;  
		       
		  } 
		  
		 $currentyear=$YM;
		 $cmonth=date("n");
		 $cday=date("j");         

		    if(checkvalidinput($currentyear)!=1)
		      echo "error";
		    $tempyear=1990;
		    $accvalue=0;
		    while($tempyear!= ($currentyear))
		      {
		         $accvalue++;
		         if(isleapyear($tempyear))
		           $accvalue++;
		         $tempyear++;  
		      } 
		     if ($cmonth>2)
		        {
		          if(isleapyear($tempyear)==1)
		           $accvalue++;
		        } 
		     $accvalue+=$table[$cmonth];
		     $accvalue+=$cday;
		     $accvalue=$accvalue%7;   
		  
		  $ttt=$accvalue;
		     // day of week
		  
		  switch ($ttt) {
		  	case '0':
		  		$hn="یک شنبه";
		  		break;
		  	case '1':
		  		$hn="دو شنبه";
		  		break;
		    case '2':
		  		$hn="سه شنبه";
		  		break;
		  	case '3':
		  		$hn="چهار شنبه";
		  		break;
		  	case '4':
		  		$hn="پنج شنبه";
		  		break;
		  	case '5':
		  		$hn="جمعه";
		  		break;
		  	case '6':
		  		$hn="شنبه";
		  		break;
		  	default:
		  		$hn="ER";
		  		break;
		  }

		  switch ($month) {
		  	case '1':
		  		$shm="فروردین";
		  		break;
		  	case '7':
		  		$shm="مهر";
		  		break;
		    case '2':
		  		$shm="اردیبهشت";
		  		break;
		  	case '3':
		  		$shm="خرداد";
		  		break;
		  	case '4':
		  		$shm="تیر";
		  		break;
		  	case '5':
		  		$shm="مرداد";
		  		break;
		  	case '6':
		  		$shm="شهریور";
		  		break;
		  	case '8':
		  		$shm="آبان";
		  		break;
		  	case '9':
		  		$shm="آذر";
		  		break;
		    case '10':
		  		$shm="دی";
		  		break;
		  	case '11':
		  		$shm="بهمن";
		  		break;  
		  	case '12':
		  		$shm="اسفند";
		  		break;
		  	default:
		  		$shm="ER";
		  		break;
		  }

		  switch (date("n")) {
		  	case '1':
		  		$MM="January";
		  		break;
		  	case '7':
		  		$MM="July";
		  		break;
		    case '2':
		  		$MM="February";
		  		break;
		  	case '3':
		  		$MM="March";
		  		break;
		  	case '4':
		  		$MM="April";
		  		break;
		  	case '5':
		  		$MM="May";
		  		break;
		  	case '6':
		  		$MM="June";
		  		break;
		  	case '8':
		  		$MM="August";
		  		break;
		  	case '9':
		  		$MM="September";
		  		break;
		    case '10':
		  		$MM="October";
		  		break;
		  	case '11':
		  		$MM="November";
		  		break;  
		  	case '12':
		  		$MM="December";
		  		break;
		  	default:
		  		$MM="ER";
		  		break;
		  } 
			?>
		setInterval('t();',1000);
	}
</script>
</head>
<?php
mysql_query("SET CHARACTER SET utf8", $news);
mysql_query("SET NAMES 'utf8'", $news);
?>
<body dir="rtl">
	<link rel="stylesheet" type="text/css" href="style.css">
	<div class="header">
		<div class="logo"></div>
		<div class="hh">
		
			<table style="width : 100%;" align="center">
				<tr>
					<td id="shamsiDate" dir="rtl" align="center"><?php echo "$hn $day $shm $year"; ?></td>
					<td id="clock" dir="rtl" align="center"><?php echo "تهران - $clock"; ?></td>
					<td id="miladiDate" dir="ltr" align="center"><?php echo "$dm $MM $YM"; ?></td>
				</tr>
				</table>
		</div>
	</div>
	<div class="menuright">
		<p align="center"><a href="index.php"> صفحه اصلی </p>
		<p align="center"><a href="login.php"> ورود </p>
	</div>
	<div class="menuleft">
		<div style="width : 100%; display: block; height: 50%; background-color: #FFCCAA;">
			<p align="center"><b>پیوندها</b></p>
			<p><a href="http://behesht.info/" target="_blank"><img src="behesht.png" width="100%" height="38%"></a></p>
			<p><a href="http://www.varzesh3.com/" target="_blank"><img src="varzesh3-logo.png" width="100%" height="38%"></a></p> 
		</div>
		<div style="width : 100%; display: block; height: 50%; background-color: #FFBBAA;">
			<p align="center"><b>عکس برگزیده</b></p>
			<p><a href="chosen.html" target="_blank"><img src="zarih.jpg" width="90%" height="80%"></a></p>
		</div>
	</div>
<div class="center">
	
		<div align="center">

		<table>

		<form action="preview.php" method="post" onsubmit="return h();" enctype="multipart/form-data">
		<tr>
		<td>عنوان خبر</td> 
		<td><input type="text" name="title" id="title" maxlength="100"></td>
		</tr><tr>
		<td>عکس خبر</td>
		<td><label for="file"></label><input name="file" type="file" accept="image/*" /></td>
		</tr><tr>
		<td> خلاصه خبر </td>
		<td><textarea rows="4" cols="50" name="summary" maxlength="2000" required> <?php echo $_SESSION["summary"];  ?></textarea></td>
		</tr><tr>
		<td>متن کامل خبر</td>
		<td><textarea rows="10" cols="50" name="full" maxlength="200000" required> <?php echo $_SESSION["full"];  ?> </textarea></td>
		</tr><tr>
		<td colspan="2" align="center">
		<input type="submit" value="ثبت تغییرات و پیش نمایش"> 
		<input type="reset" value="از نو">

		</td></tr>
		</form>

		</table>
		</div>		
</div>
<div class="footer">
<h5> کلیه حقوق محفوظ است 1394 <h5>
</div>
</body>

</html>
