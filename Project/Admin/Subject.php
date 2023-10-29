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
<h1 align="center">Subjects</h1>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$subject=$_POST["txt_subject"];
	$semester=$_POST["txt_semester"];
	$course=$_POST["txt_course"];
	$insQry="insert into tbl_subject(subject_name,semester_id,course_id)value('".$subject."','".$semester."','".$course."')";
	$con->query($insQry);
	header("location:Subject.php");
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_subject where subject_id=".$_GET['did'];
	$con->query($delQry);
	header("location:Subject.php");
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Course</td>
      <td><label for="txt_course"></label>
        <select required name="txt_course" id="txt_course">
        <option>--SELECT COURSE--</option>
        <?php
		$selQry="select * from tbl_course ";
		$result=$con->query($selQry);
		while($data=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $data['course_id']?>"><?php echo $data['course_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Semester</td>
      <td><label for="txt_semester"></label>
        <select required name="txt_semester" id="txt_semester">
         <option>--SELECT SEMESTER--</option>
        <?php
		$selQry="select * from tbl_semester ";
		$result=$con->query($selQry);
		while($data=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $data['semester_id']?>"><?php echo $data['semester_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Subject</td>
      <td><label for="txt_subject"></label>
      <input type="text" name="txt_subject" id="txt_subject" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>SL.NO</td>
      <td>Course</td>
      <td>Semester</td>
      <td>Subject</td>
      <td>Action</td>
    </tr>
     <?php
  $i=0;
  $selQry= "select * from tbl_subject s inner join tbl_course  c on c.course_id = s.course_id inner join tbl_semester b on b.semester_id = s.semester_id";
  $result=$con->query($selQry);
  
  
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ;?></td>
      <td><?php echo $row['course_name'];  ?></td>
      <td><?php echo $row['semester_name'];  ?></td>
      
      <td><?php echo $row['subject_name']; ?></td>
      
      <td><a href="Subject.php?did= <?php echo $row['subject_id'] ?>">DELETE</a></td>
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