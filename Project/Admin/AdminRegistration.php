<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminRegistration::Pupil</title>
</head>
<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
?>

<body>
<?php
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	$insQry="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)value('".$name."','".$contact."','".$email."','".$password."')";
	$con->query($insQry);
	header("location:AdminRegistration.php");
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_admin where admin_id=".$_GET['did'];
	$result=$con->query($delQry);
	header("location:AdminRegistration.php");
}
?>
<div id="tab" align="center">
<h1 align="center">Admin Signup</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required="required" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9"/></td>
    </tr>
    <tr> 
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required="required" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?php
  $selQry="select * from tbl_admin";
  $res=$con->query($selQry);
  if($res->num_rows>0)
  {
  ?>
  <table width="200" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Action</td>
    </tr>
     <?php
	 while($data=$res->fetch_assoc())
	 {
		 $i=0;
		 $i++;
		 
  		?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['admin_name']; ?></td>
      <td><?php echo $data['admin_contact']; ?></td>
      <td><?php echo $data['admin_email']; ?></td>
      <td><a href="AdminRegistration.php?did=<?php echo $data['admin_id']; ?>">Delete</a></td>
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