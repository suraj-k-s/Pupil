<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
ob_start();
  include("Head.php");
  if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$admno=$_POST["txt_admno"];
	$year=$_POST["txt_year"];
	$contact=$_POST["txt_contact"];
	$address=$_POST["txt_address"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	$photo = $_FILES['img_photo']['name'];
	$tempphoto = $_FILES['img_photo']['tmp_name'];
	move_uploaded_file($tempphoto,"../Assets/Files/Student_file/Photo/".$photo);
	
	$proof = $_FILES['img_proof']['name'];
	$tempproof = $_FILES['img_proof']['tmp_name'];
	move_uploaded_file($tempproof,"../Assets/Files/Student_file/Proof/".$proof);
	
	$course=$_POST["txt_course"];
	$semester=$_POST["txt_semester"];
	$place=$_POST["txt_place"];
	$insQry="insert into tbl_student(student_name,student_contact,student_address,student_photo,student_email,student_password,course_id,place_id,student_admno,student_proof,student_year,semester_id)value('".$name."','".$contact."','".$address."','".$photo."','".$email."','".$password."','".$course."','".$place."','".$admno."','".$proof."','".$year."','".$semester."')";
	$con->query($insQry);
	header("location:Student.php");
}


?>
<h2>New Student</h2>
<br>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" /></td>
    </tr>
     <tr>
      <td>Admission No</td>
      <td><label for="txt_admno"></label>
      <input type="text" name="txt_admno" id="txt_admno" required="required" /></td>
    </tr>
    <td>Year Of Admission</td>
      <td><label for="txt_year"></label>
      <input type="text" name="txt_year" id="txt_year" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required="required" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="img_photo"></label>
      <input type="file" name="img_photo" id="img_photo" /></td>
    </tr>
     <td>Proof</td>
      <td><label for="img_proof"></label>
      <input type="file" name="img_proof" id="img_proof" /></td>
    </tr>
     <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required="required" /></td>
    </tr>
     <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
     <td>Course</td>
      <td><label for="txt_course"></label>
        <select name="txt_course" id="txt_course">
        <option>--SELECT COURSE--</option>
        <?php
		$selQry="select * from tbl_course";
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
        <select name="txt_semester" id="txt_semester">
        <option>--SELECT SEMESTER--</option>
        <?php
		$selQry="select * from tbl_semester";
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
      <td>District</td>
      <td><label for="txt_district"></label>
        <select name="txt_district" id="txt_district" onchange="getPlace(this.value)">
        <option>--SELECT DISTRICT--</option>
        <?php
		$selQry="select * from tbl_district";
		$result=$con->query($selQry);
		while($data=$result->fetch_assoc())
		{
		?>
			<option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
		<?php
        }
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
        <select name="txt_place" id="txt_place">
        <option>--SELECT PLACE--</option>
      </select></td>
    </tr>
    <tr>
    <tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#txt_place").html(html);
		}
	});
}
</script>
</form>
</body>

<?php 

include("Foot.php");
ob_flush();

?>
</html>