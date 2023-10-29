<?php  
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_POST["btn_submit"]))
{
	$subcat=$_POST["txt_subcategory"];
	$category=$_POST["txt_category"];
	$insQry="insert into tbl_subcategory(subcategory_name,category_id)value('".$subcat."','".$category."')";
	$con->query($insQry);
	header("location: Subcategory.php");
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_subcategory where subcategory_id=".$_GET['did'];
	$con->query($delQry);
	header("location: Subcategory.php");
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td width="90">Category</td>
      <td width="94"><label for="txt_category"></label>
        <select name="txt_category" id="txt_category">
        <option>---Select----</option>
        <?php
		$selQry= "select * from tbl_category";
		$result=$con->query($selQry);
		while($data=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $data['category_id']?>"><?php echo $data['category_name']?></option>
            <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Sub Category</td>
      <td><label for="txt_subcategory"></label>
      <input type="text" name="txt_subcategory" id="txt_subcategory" /></td>
    </tr>
    <tr>
      <td colspan="2">
      <input type="submit" name="btn_submit" id="btn_submit" /></td>
    </tr>
  </table>
  <?php
  $i=0;
  $selQry= "select * from tbl_subcategory s inner join tbl_category c on s.category_id = c.category_id";
  $result=$con->query($selQry);
  if($result->num_rows>0)
  {
  ?>
  <table  border="1">
    <tr>
      <td>Sl No</td>
      <td>Category</td>
      <td>SubCategory</td>
      <td>Action</td>
    </tr>
    <?php
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['category_name']  ?></td>
      <td><?php echo $row['subcategory_name']  ?></td>
      <td><a href="Subcategory.php?did= <?php echo $row['subcategory_id'] ?>">delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <?php
  }
  ?>
</form>
</body>
</html>