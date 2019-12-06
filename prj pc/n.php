<html>
<head>
<meta charset="utf-8">
<title></title>
<script type="text/javascript">
function e( ) 
{

	var temp="";

	if (document.getElementById("N").value.length==0)

		temp+="لطفا برای تغییر تعداد اخبار نمایشی ، عددی را وارد نمایید. \r\n"; 
	
	if (temp.length!=0)
	{
		alert(temp);
		return false;
	}
	else if (temp.length==0)
		return true;}
	   function isNum(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if ((charCode >= 48 && charCode <= 57) || charCode==8) {
                    return true;
                }
                else
                {
                alert('شما مجاز به وارد کردن عدد میباشید');
                return false;
                }
            };
</script>
</head>
<body dir="rtl">
<?php
	$str=file("n.txt");
?>
<script type="text/javascript">
	document.getElementById('N').value= <?php echo $str[0]; ?> ;
</script>
<div align="center">

<table>

<form action="n_pr.php" method="get" onsubmit="return e();">
<tr>
<td>تعداد خبرها در هر صفحه</td> 
<td><input type="text" name="N" id="N" size="1" maxlength="2" onkeypress="return isNum(event)"></td>
<td align="center">
<input type="submit" value="ثبت تغییرات"> 
</td></tr>
</form>
</table>
</div>
</body>
</html>
