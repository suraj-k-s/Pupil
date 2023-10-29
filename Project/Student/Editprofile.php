<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>

<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");
$selQry = "select * from tbl_student s inner join tbl_semester se on se.semester_id=s.semester_id where student_id=" . $_SESSION['sid'];
$result = $con->query($selQry);
$row = $result->fetch_assoc();
if(isset($_POST["btn_update"])) {
    $name = $_POST["txt_name"];
    $contact = $_POST["txt_contact"];
    $email = $_POST["txt_email"];
    $address = $_POST["txt_address"];
    $upQry = "update tbl_student set semester_id='".$_POST["txt_semester"]."',student_name='$name',student_contact='$contact',student_email='$email',student_address='$address'";
    $res = $con->query($upQry);
    header("location: Myprofile.php");
}
?>
<div id="tab" align="center">
<h1 align="center">Edit Profile</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="400" border="1" style="margin: 0 auto; border-collapse: collapse;">
    <tr>
      <td>Name</td>
      <td>
        <input type="text" required name="txt_name" id="txt_name" value="<?php echo $row['student_name']; ?>" 
          style="width: 100%; padding: 5px;" 
          title="Name Allows Only Alphabets, Spaces, and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/>
      </td>
    </tr>
     <tr>
     <td>Semester</td>
      <td><label for="txt_semester"></label>
        <select name="txt_semester" id="txt_semester">
        <option>--SELECT SEMESTER--</option>
        <?php
		$selQry="select * from tbl_semester";
		$result=$con->query($selQry);
		while($data=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $data['semester_id']?>" <?php if($data["semester_id"]==$row['semester_id']){echo "selected";} ?>><?php echo $data['semester_name']?></option>
            <?php
		}
		?>
		
      </select></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td>
        <input type="text" required name="txt_contact" id="txt_contact" value="<?php echo $row['student_contact']; ?>" 
          style="width: 100%; padding: 5px;" 
          pattern="[7-9]{1}[0-9]{9}" 
          title="Phone number with 7-9 and remaining 9 digits with 0-9" />
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <input type="email" required name="txt_email" id="txt_email" value="<?php echo $row['student_email']; ?>" 
          style="width: 100%; padding: 5px;" />
      </td>
    </tr>
    <tr>
      <td>Address</td>
      <td>
        <input type="text" required name="txt_address" id="txt_address" value="<?php echo $row['student_address']; ?>" 
          style="width: 100%; padding: 5px;" />
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btn_update" id="btn_update" value="Update" style="padding: 5px 20px; background-color: #007bff; color: #fff; border: none; cursor: pointer;">
      </td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
