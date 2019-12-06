<html>

<head> <meta charset="utf-8">

<title>H5 News</title>

</head>

<body dir="rtl">
	<link rel="stylesheet" type="text/css" href="style.css">
	<div class="header">
		<div class="logo"></div>
		<div class="hh">
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
			<table style="width : 100%;">
				<tr>
					<td dir="rtl"><?php echo "$hn $day $shm $year"; ?></td>
					<td dir="rtl"><?php echo "تهران - $clock"; ?></td>
					<td dir="ltr"><?php echo "$dm $MM $YM"; ?></td>
				</tr>
				</table>
		</div>
	</div>
	<div class="menuright">
		<p>منوی 1</p><p>منوی 2</p> <p>منوی 3</p>
	</div>
	<div class="ml">
	</div>
<div class="center">
			<p> خبر 1 <p> <p>  خبر 2 </p> <p> خبر 3 </p>
</div>
<div class="footer">
<h4> کلیه حقوق محفوظ است 1394 <h4>
</div>
>

</body>

</html>