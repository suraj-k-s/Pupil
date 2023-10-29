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
<h1 align="center">Faculty Signup</h1>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$address=$_POST["txt_address"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	$photo = $_FILES['img_photo']['name'];
	$tempphoto = $_FILES['img_photo']['tmp_name'];
	move_uploaded_file($tempphoto,"../Assets/Files/Faculty_file/Photo/".$photo);
	$proof = $_FILES['img_proof']['name'];
	$tempproof = $_FILES['img_proof']['tmp_name'];
	move_uploaded_file($tempproof,"../Assets/Files/Faculty_file/Proof/".$proof);
	$place=$_POST["txt_place"];
	$insQry="insert into tbl_faculty(faculty_name,faculty_contact,faculty_address,faculty_photo,faculty_proof,faculty_email,faculty_password,place_id)value('".$name."','".$contact."','".$address."','".$photo."','".$proof."','".$email."','".$password."','".$place."')";
	$con->query($insQry);
	header("location: Faculty.php");
}

?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" required name="txt_name" id="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" required name="txt_contact" id="txt_contact" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" required/></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="img_photo"></label>
      <input type="file" name="img_photo" id="img_photo" required /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="img_proof"></label>
      <input type="file" name="img_proof" id="img_proof" required/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required /></td>
    </tr>
      <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" required name="txt_password" id="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="txt_district"></label>
        <select required name="txt_district" id="txt_district" onchange="getPlace(this.value)">
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
        <select required name="txt_place" id="txt_place">
        <option>--SELECT PLACE--</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</div>
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
</body>
</html>
<?php
        include('Foot.php');
        ob_flush();
        ?>