<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
?>

<body><div id="tab" align="center">
<h1 align="center">Edit Profile</h1>

<?php
$selQry="select * from tbl_faculty where faculty_id=".$_SESSION['fid'];
$result=$con->query($selQry);
$row=$result->fetch_assoc();
if(isset($_POST["btn_update"]))
{
	$name=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	$address=$_POST["txt_address"];
	$upQry="update tbl_faculty set faculty_name='$name' ,faculty_contact='$contact',faculty_email='$email',faculty_address='$address'";
	$res=$con->query($upQry);
	header("location: Myprofile.php");
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" required name="txt_name" id="txt_name" value="<?php echo $row['faculty_name']; ?>" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" required name="txt_contact" id="txt_contact" value="<?php echo $row['faculty_contact']; ?>" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" required name="txt_email" id="txt_email" value="<?php echo $row['faculty_email']; ?>"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" value="<?php echo $row['faculty_address']; ?>"/></td>
    </tr>
    <tr> 
      <td colspan="2" align="center"><input type="submit" name="btn_update" id="btn_update" value="Update" /></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>