<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");
?>
<body>
<div id="tab" align="center">
<h1 align="center">Attendance</h1>
<?php
$date= date('Y-m-d');
$selecteddate="";
if(isset($_POST["btn_reset"]))
{
	$date= date('Y-m-d');
}

if(isset($_POST["btn_search"]))
  	{
		$selecteddate=$_POST["txt_date"];
	}
?>
<form name="form1" method="post" action="">
  <table width="375" border="1">
    <tr>
      <td width="227">Date
      <input name='txt_date' id='txt_date' type="date" value="<?php echo $date ?>" max="<?php echo date('Y-m-d') ?>"/>
      </td>
      <td width="157"><input type="submit" name="btn_search" id="btn_search" value="Search">
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td colspan="6">Date:<?php echo $selecteddate ?></td>
      </tr>
      <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td>5</td>
      <td>6</td>
    </tr>
    <?php
  	if(isset($_POST["btn_search"]))
  	{
			
 	 ?>
    <tr>
      
      <?php
	  $i=0;
		for($i=1;$i<7;$i++)
		{
			$selQry="select * from tbl_attendance where attendance_date ='".$_POST["txt_date"]."' and attendance_hour='".$i."' and student_id=".$_SESSION['sid'];
			$res=$con->query($selQry);
			if($res->num_rows>0)
			{
			?>
            	<td>Present</td>
            <?php
			}
			else
			{
				?>
            	<td>Absent</td>
            <?php
			}
			
		}
	  
	  ?>
    </tr>
    <?php
	
	}
		?>
  </table>
  <p>&nbsp;</p>
</form>
</div>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>