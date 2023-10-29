<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_pass"];
	$place=$_POST["txt_place"];
	$contact=$_POST["txt_contact"];
	$photo = $_FILES['user_img']['name'];
	$tempphoto = $_FILES['user_img']['tmp_name'];
	move_uploaded_file($tempphoto,"../Assets/Files/User/Photo/".$photo);
	$proof = $_FILES['user_proof']['name'];
	$tempproof = $_FILES['user_proof']['tmp_name'];
	move_uploaded_file($tempproof,"../Assets/Files/User/Photo/".$proof);
	$insQry="insert into tbl_user(user_name,user_email,user_pass,user_img,place_id,user_proof,user_contact)value('".$name."','".$email."','".$password."','".$photo."','".$place."','".$proof."','".$contact."')";
	$con->query($insQry);
	header("location: User.php");
}

?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="text" name="txt_pass" id="txt_pass" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="user_img"></label>
      <input type="file" name="user_img" id="txt_img" /></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="txt_district"></label>
        <select name="txt_district" id="txt_district" onchange="getPlace(this.value)">
        <option>--select district--</option>
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
        <option>--select place--</option>
        
      </select></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="txt_proof"></label>
      <input type="file" name="user_proof" id="user_proof" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
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