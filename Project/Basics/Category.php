<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php  
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_save"]))
{
	$cat=$_POST["txt_name"];
	$insQry="insert into tbl_category(category_name)value('".$cat."')";
	$con->query($insQry);
	header("location: Category.php");
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_category where category_id=".$_GET['did'];
	$con->query($delQry);
	header("location: Category.php");
}
?> 
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td width="104">Category Name</td>
      <td width="80"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="save" />
      <input type="reverse" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
   </table>
  <table width="200" border="1">
    <tr>
      <td>Sl.No</td>
      <td>District Name</td>
      <td>Action</td>
    </tr>
    <?php
	$selQry="select * from tbl_category";
	$res=$con->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['category_name'] ?></td>
      <td><a href="Category.php?did=<?php echo $row['category_id'] ?>">Delete</a>
</td>
</tr>
<?php
	}
	?>
</table>
<p>&nbsp;</p>
<p>
  <label for="txt_name"></label>
</p>
</form>
</body>
</html>