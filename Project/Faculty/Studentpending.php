<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Students Pending::Pupil</title>
</head>


<body>
<div id="tab" align="center">
<h1 align="center">Student Pending List</h1><?php
if(isset($_GET['aid']))
{
	$upQry="update tbl_student set student_vstatus=1 where student_id=".$_GET['aid']; 
	$con->query($upQry);
	header("location: Studentpending.php");
}
if(isset($_GET['rid']))
{
	$upqry="update tbl_student set student_vstatus=2 where student_id=".$_GET['rid']; 
	$con->query($upqry);
	header("location: Studentpending.php");
}
?>
  <?php
  $i=0;
  $selQry= "select * from tbl_student s inner join tbl_place p on p.place_id=s.place_id inner join tbl_semester se on se.semester_id=s.semester_id where student_vstatus=0";
  $result=$con->query($selQry);
  if($result->num_rows>0)
  {
  ?>
  <table  border="1">
    <tr>
      <td>Sl No</td>
      <td>Name</td>
      <td>Adm.No</td>
      <td>Admission Year</td>
      <td>Semester</td>
      <td>Contact</td>
      <td>Address</td>
      <td>Email ID</td>
      <td>Place</td>
      <td>photo</td>
      <td>Proof</td>
      <td>Action</td>
    </tr>
    <?php
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
       <td><?php echo $row['student_name']  ?></td>
      <td><?php echo $row['student_admno']  ?></td>
      <td><?php echo $row['student_year']  ?></td>
      <td><?php echo $row['semester_name'] ?>;</td>
      <td><?php echo $row['student_contact']  ?></td>
       <td><?php echo $row['student_address']  ?></td>
      <td><?php echo $row['student_email']  ?></td>
      <td><?php echo $row['place_name']  ?></td>
       <td><img src="../Assets/Files/Student_file/Photo/<?php echo $row['student_photo']?>" width="75" height="75" /></td>
        <td><img src="../Assets/Files/Student_file/Proof/<?php echo $row['student_proof']?>" width="75" height="75" /></td>
      <td><a href="Studentpending.php?aid= <?php echo $row['student_id'] ?>">Accept</a>
      <br />
      <br />
      <a href="Studentpending.php?rid= <?php echo $row['student_id'] ?>">Reject</a>
      </td>
    </tr>
    <?php
	}
	?>
  </table>
  <?php
  }
  ?>
</form>
</div>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>