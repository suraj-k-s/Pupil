<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php
$num1="";
$num2="";
$sum="";
$sub="";
$dev="";
$mult="";

if(isset($_POST["btn_add"]))
{
	$num1=$_POST["txt_num1"];
	$num2=$_POST["txt_num2"];
	$sum=$num1+$num2;

}
if(isset($_POST["btn_sub"]))
{
	$num1=$_POST["txt_num1"];
	$num2=$_POST["txt_num2"];
	$sub=$num1-$num2;
}
if(isset($_POST["btn_dev"]))
{
	$num1=$_POST["txt_num1"];
	$num2=$_POST["txt_num2"];
	$dev=$num1/$num2;
}
if(isset($_POST["btn_mult"]))
{
	$num1=$_POST["txt_num1"];
	$num2=$_POST["txt_num2"];
	$mult=$num1*$num2;
}


?>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="300" border="1" align="center">
    <tr>
      <td width="106">Number 1</td>
      <td width="183"><label for="txt_num1"></label>
      <input type="text" name="txt_num1" id="txt_num1" value="<?php echo $num1 ?>" /></td>
    </tr>
    <tr>
      <td>Number 2</td>
      <td><label for="txt_num2"></label>
      <input type="text" name="txt_num2" id="txt_num2" value="<?php echo $num2 ?>"/></td>
    </tr>
    <tr>
      	<td colspan="2"><input type="submit" name="btn_add" id="btn_add" value="Add" />
   	    <input type="submit" name="btn_sub" id="btn_sub" value="Substract" />
   	    <input type="submit" name="btn_dev" id="btn_dev" value="Devide" />
   	    <input type="submit" name="btn_mult" id="btn_mult" value="Multiply" /></td>
      </tr>
    <tr>
      <td>Result</td>
      <td>	
	  		<?php 
					echo $sum;
      			 	echo $sub;
            		echo $dev;
         	 		echo $mult;
			 ?>
      </td>
    </tr>
  </table>
</form>
</body>
</html>