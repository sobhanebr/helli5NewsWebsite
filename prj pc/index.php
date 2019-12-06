<html>
<head> <meta charset="utf-8">

<title>H5 News</title>
<script type="text/javascript">
function z( ) 
{

	var temp="";

	if (document.getElementById("input").value.length==0)

		temp+="متن جستوجو را وارد نمائید. \r\n"; 

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
<style type="text/css">
.paged-link{
    display:inline-block;
    line-height:14px;
    float:right;
    margin:2px;
}
.paged-link a{
    display:inline-block;
    border:#06C 1px solid;
    padding:2px;
    text-decoration:none;
}
.paged-link a:hover{
    border:#900 1px solid;
}
.paged-link-selected{
    display:inline-block;
    line-height:14px;
    float:right;
    margin:2px;
}
.paged-link-selected a{
    display:inline-block;
    border:#900 1px solid;
    padding:2px;
    text-decoration:none;
}
.paged-link-selected a:hover{
    border:#900 1px solid;
}
.paged-link-off{
    display:inline-block;
    border:#06C 1px solid;
    padding:2px;
    color:#CCC;
    line-height:14px;
    float:right;
    margin:2px;
}
.paged-link-info{
    display:inline-block;
    float:left;
    padding:2px;
    color:#666;
    line-height:14px;
    margin:2px;
    font-size:11px;
}
</style>
</head>

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
		<form action="search.php" method="get" onsubmit="return z();">
			<input type="text" name="input" size="10">
			<input type="submit" value="جستوجو">
		</form>
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
			<?php
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
			$str=file("n.txt");
			$setting = array(
			'paged_item' => $str[0]
			);
			if (isset($_GET['page'])) {
				$page = mysql_real_escape_string($_GET['page']);
			}
			else{
    			$page = 1;
				}
			$start = ($page - 1) * $setting['paged_item'];
			$query = mysql_query("SELECT ID, title, pic , summary FROM ne ORDER BY ID ASC LIMIT $start, ".$setting['paged_item']."")
			or die(mysql_error());
			//چاپ خروجی
		while($row = mysql_fetch_array($query)){
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
			$total = mysql_query("SELECT ID FROM ne")
			or die(mysql_error());
			$count = mysql_num_rows($total);
		if($count - $setting['paged_item'] > 0){
    		$paged_total = ceil($count / $setting['paged_item']);
   			$paged_last = $paged_total;
    		$paged_middle = $page + 4;
 		    $paged_start = $paged_middle - 4;
    		if($page > 1){
        	$paged_result = '<div class="paged-link"><a href="index.php?page=1" title="صفحه نخست">نخست</a></div>'."\n";                            
    		}
    		else{
        	$paged_result = '<div class="paged-link-off">نخست</div>'."\n";                                    
    		}
    		//ایجاد لینک صفحه قبلی
    		if($page > 1){
        	//محاسبه لینک صفحه قبلی        
        	$paged_perv = $page - 1;
        	//ایجاد لینک صفحه قبلی
        	$paged_result .= '<div class="paged-link"><a href="index.php?page='.$paged_perv.'" title="صفحه قبلی">قبلی</a></div>'."\n";
    		}
    		//غیر فعال کردن لینک صفحه قبلی اگر صفحه انتخابی برابر 1 بود
    		else{
        	$paged_result .= '<div class="paged-link-off">قبلی</div>'."\n";
    		}
    
    		//ایجاد لینک صفحات میانی، شروع از دو شماره قبل
    		for ($i=$paged_start-2; $i<=$paged_middle; $i++){
	        	//ایجاد لینک در صورتی که صفر، منفی یا از آخرین صفحه بیشتر نباشد
	        	if ($i > 0 && $i <= $paged_last){
		            //در حالت انتخاب شده
		            if($i == $page){
		                $paged_result .= '<div class="paged-link-selected"><a href="index.php?page='.$i.'" title="صفحه '.$i.'">'.$i.'</a></div>'."\n";
		            }
		            //در حالت عادی
		            else{
		                $paged_result .= '<div class="paged-link"><a href="index.php?page='.$i.'" title="صفحه '.$i.'">'.$i.'</a></div>'."\n";
		            }
	        	}
    		}
    
	    	//نمایش لینک صفحات بعدی
	    	if($page <= $paged_last - 1){
	        	//محاسبه لینک صفحه بعدی
	        	$paged_next = $page + 1;
	        	//ایجاد لینک صفحه بعدی        
	        	$paged_result .= '<div class="paged-link"><a href="index.php?page='.$paged_next.'" title="صفحه بعدی">بعدی</a></div>'."\n";
	    	}
	    	//غیر فعال کردن لینک صفحه بعدی اگر صفحه انتخابی برابر صفحه آخر بود 
	    	else{
	        	$paged_result .= '<div class="paged-link-off">بعدی</div>'."\n";
	    	}
	    
	    	//لینک صفحه آخر
	    	if($page <= $paged_last - 1){
	        	$paged_result .= '<div class="paged-link"><a href="index.php?page='.$paged_last.'" title="صفحه آخر">آخر</a></div>'."\n";
	    	}
	    	//غیر فعال کردن لینک صفحه آخر اگر صفحه انتخابی برابر صفحه آخر بود
	    	else{
	        	$paged_result .= '<div class="paged-link-off">آخر</div>'."\n";
	    	}
	    
	    	//اطلاعات صفحات
	    	$paged_result .= '<div class="paged-link-info">&raquo; صفحه: '.$page.' از '.$paged_total.'</div>'."\n";
	    	//خروجی  
	    	echo $paged_result;              
		}

		//پایان اتصال
		$close = mysql_close($c);

		?>
</div>
<div class="footer">
<h5> کلیه حقوق محفوظ است 1394 <h5>
</div>
</body>

</html>