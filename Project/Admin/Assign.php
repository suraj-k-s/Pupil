<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AssignFaculty::pupil</title>
</head>
<?php
ob_start();
include('Head.php');
?>


<body>
<div id="tab" align="center">
<h1 align="center">Assign Faculties</h1><?php

include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$semester=$_POST["txt_semester"];
	$subject=$_POST["txt_subject"];
	$faculty=$_POST["txt_faculty"];
	$insQry="insert into tbl_assign(assign_date,faculty_id,subject_id,semester_id)value(curdate(),'".$faculty."','".$subject."','".$semester."')";
	$con->query($insQry);
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_assign where assign_id=".$_GET['did'];
	$con->query($delQry);
	header("location: Assign.php");
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Semester</td>
      <td><label for="txt_semester" ></label>
        <select required name="txt_semester" id="txt_semester" onchange="getSubject(this.value)">
        <option>--Select Semester--</option>
        <?php
		$selQry="select * from tbl_semester";
		$res=$con->query($selQry);
		while($data=$res->fetch_assoc())
		{
		?>
        	<option value="<?php echo $data['semester_id'];?>"><?php echo $data['semester_name'];?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Subject</td>
      <td><label  for="txt_subject"></label>
        <select required name="txt_subject" id="txt_subject">
         <option>--Select Subject--</option>
      </select></td>
    </tr>
    <tr>
      <td>Faculty</td>
      <td><label for="txt_faculty"></label>
        <select required name="txt_faculty" id="txt_faculty">
         <option>--Select Faculty--</option>
        <?php
		$selQry="select * from tbl_faculty";
		$res=$con->query($selQry);
		while($data=$res->fetch_assoc())
		{
		?>
        	<option value="<?php echo $data['faculty_id'];?>"><?php echo $data['faculty_name'];?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?php
  $i=0;
  $selQry="select * from tbl_assign a inner join tbl_semester s on s.semester_id = a.semester_id inner join tbl_subject b on b.subject_id = a.subject_id inner join tbl_faculty f on f.faculty_id=a.faculty_id";
  $res=$con->query($selQry);
  if($res->num_rows>0)
  {
  ?>
  <table width="200" border="1">
    <tr>
      <td>SL.NO</td>
      <td>Semester</td>
      <td>Subject</td>
      <td>Faculty</td>
      <td>Action</td>
    </tr>
    <?php
	while($data=$res->fetch_assoc())
	{
		$i++;
	?>
    
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['semester_name']; ?></td>
      <td><?php echo $data['subject_name']; ?></td>
      <td><?php echo $data['faculty_name']; ?></td>
      <td><a href="Assign.php?did=<?php echo $data['assign_id']; ?>">DELETE</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <?php
  }
  ?>
   <script src="../Assets/JQ/jQuery.js"></script>
<script>
function getSubject(sid)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxSubject.php?sid="+sid,
		success: function(html){
			$("#txt_subject").html(html);
		}
	});
}
</script>
</form>
</div>
</body>
</html>
<?php
        include('Foot.php');
        ob_flush();
        ?>