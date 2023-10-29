<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
ob_start();
include('Head.php');
?>

<body>
<div id="tab" align="center">
<h1 align="center">Semesters</h1>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$semester=$_POST["txt_semester"];
	$insQry="insert into tbl_semester(semester_name)value('".$semester."')";
	$con->query($insQry);
	header("location:Semester.php");
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_semester where semester_id=".$_GET['did'];
	$con->query($delQry);
	header("location:Semester.php");
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Semester</td>
      <td><label for="txt_semester"></label>
      <input type="text" required  name="txt_semester" id="txt_semester" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>SL.NO</td>
      <td>Semester</td>
      <td>Action</td>
    </tr>
    <?php
	$selQry="select * from tbl_semester";
	$res=$con->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["semester_name"] ?></td>
      <td><a href="Semester.php?did=<?php echo $row['semester_id'] ?>">DELETE</a></td>
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