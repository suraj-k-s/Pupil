<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>
<?php
ob_start();
include('Head.php');
?>

<body>
<div id="tab" align="center">
<h1 align="center">Districts</h1>
<?php  
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_save"]))
{
	$dis=$_POST["txt_district"];
	$insQry="insert into tbl_district(district_name)value('".$dis."')";
	$con->query($insQry);
	header("location:District.php");
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_district where district_id=".$_GET['did'];
	$con->query($delQry);
	header("location:District.php");
}
?> 
<form id="form1" name="form1" method="post" action="">
  <table width="378" height="85" border="1">
    <tr>
      <td>District Name</td>
      <td><label for="txt_district"></label>
      <input type="text" name="txt_district" id="txt_district" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Submit" />
      <input type="reset" name="btn_can" id="btn_can" value="cancel" /></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>Sl.No</td>
      <td>District Name</td>
      <td>Action</td>
    </tr>
    <?php
	$selQry="select * from tbl_district";
	$res=$con->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['district_name'] ?></td>
      <td><a href="District.php?did=<?php echo $row['district_id'] ?>">DELETE</a></td>
    </tr>
    <?php
	}
	?>
  </table>
   
</form>
</div>
</body>
</html>
<?php
        include('Foot.php');
        ob_flush();
        ?>