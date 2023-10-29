<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pupil::Course</title>
</head>
<?php
ob_start();
include('Head.php');
?>

<body>
<div id="tab" align="center">
<h1 align="center">Courses</h1><?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$course=$_POST["txt_course"];
	$insQry="insert into tbl_course(course_name)value('".$course."')";
	$con->query($insQry);
	header("location:Course.php");
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_course where course_id=".$_GET['did'];
	$con->query($delQry);
	header("location:Course.php");
}
?>

<a href="HomePage.php">Home</a>

<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Course</td>
      <td><label for="txt_course"></label>
      <input type="text" name="txt_course" id="txt_course" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="300" border="1">
    <tr>
      <td width="60">SL.NO</td>
      <td width="112">Course</td>
      <td width="111">Action</td>
    </tr>
    <?php
	$selQry="select * from tbl_course";
	$res=$con->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["course_name"] ?></td>
      <td><a href="Course.php?did=<?php echo $row['course_id'] ?>">DELETE</a></td>
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