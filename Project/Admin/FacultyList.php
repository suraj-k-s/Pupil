<?php  
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body>
<div id="tab" align="center">
<h1 align="center">Faculty Details</h1>
<?php
if(isset($_GET['did']))
{
	$delQry="delete from tbl_faculty where faculty_id=".$_GET['did'];
	$con->query($delQry);
	header("location: FacultyList.php");
}
?>
  <?php
  $i=0;
  $selQry= "select * from tbl_faculty ";
  $result=$con->query($selQry);
  if($result->num_rows>0)
  {
  ?>
  <table  border="1">
    <tr>
      <td>Sl No</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Address</td>
      <td>Email ID</td>
      <td>photo</td>
      <td>Action</td>
    </tr>
    <?php
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
       <td><?php echo $row['faculty_name']  ?></td>
      <td><?php echo $row['faculty_contact']  ?></td>
       <td><?php echo $row['faculty_address']  ?></td>
      <td><?php echo $row['faculty_email']  ?></td>
       <td><img src="../Assets/Files/Faculty_file/Photo/<?php echo $row['faculty_photo']?>" width="75" height="75" /></td>
      <td><a href="FacultyList.php?did= <?php echo $row['faculty_id'] ?>">DELETE</a></td>
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