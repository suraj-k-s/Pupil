<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
$name="";
$contact="";
$email="";
$mark1="";
$mark2="";
$mark3="";
$total="";
$per="";
$grade="";
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	$mark1=$_POST["txt_m1"];
	$mark2=$_POST["txt_m2"];
	$mark3=$_POST["txt_m3"];
	$total=$mark1+$mark2+$mark3;
	$per=(($total/300)*100);
	if($total >=  270)
	{
		 $grade= "A+";
	}
	elseif($total >=240&&$total <=269)
	{
		$grade="A";
	}
	elseif($total >=210&&$total <=239)
	{
		$grade="B+";
	}
	elseif($total >=180&&$total <=209)
	{
		$grade="B";
	}
	elseif($total >=150&&$total <=179)
	{
		$grade="C+";
	}
	elseif($total >=120&&$total <=149)
	{
		$grade="c";
	}
	elseif($total >=90&&$total <=119)
	{
		$grade="D+";
	}
	else
	{
		$grade= "failed";
	}
}
?>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="240" border="1">
    <tr>
      <td width="60">Name</td>
      <td width="168"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Mark1</td>
      <td><label for="txt_m1"></label>
      <input type="text" name="txt_m1" id="txt_m1" /></td>
    </tr>
    <tr>
      <td>Mark2</td>
      <td><label for="txt_m2"></label>
      <input type="text" name="txt_m2" id="txt_m2" /></td>
    </tr>
    <tr>
      <td>Mark3</td>
      <td><label for="txt_m3"></label>
      <input type="text" name="txt_m3" id="txt_m3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td width="58">Name</td>
      <td width="126"><?php echo $name ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $contact ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $email ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo $total ?></td>
    </tr>
    <tr>
      <td>Percentage</td>
      <td><?php echo $per ?></td>
    </tr>
    <tr>
      <td>Grade</td>
      <td><?php echo $grade ?></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
