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
<h1 align="center">Places</h1>
<?php
if(isset($_POST["btn_submit"]))
{
	$place=$_POST["txt_place"];
	$district=$_POST["txt_district"];
	$insQry="insert into tbl_place(place_name,district_id)value('".$place."','".$district."')";
	$con->query($insQry);
	header("location: Place.php");
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_place where place_id=".$_GET['did'];
	$con->query($delQry);
	header("location: Place.php");
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td width="90">District</td>
      <td width="94"><label for="txt_district"></label>
        <select required name="txt_district" id="txt_district">
        <option>---Select----</option>
        <?php
		$selQry= "select * from tbl_district";
		$result=$con->query($selQry);
		while($data=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $data['district_id']?>"><?php echo $data['district_name']?></option>
            <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" required name="txt_place" id="txt_place" /></td>
    </tr>
    <tr>
      <td colspan="2">
      <input type="submit" name="btn_submit" id="btn_submit" /></td>
    </tr>
  </table>
  <?php
  $i=0;
  $selQry= "select * from tbl_place s inner join tbl_district c on s.district_id = c.district_id";
  $result=$con->query($selQry);
  if($result->num_rows>0)
  {
  ?>
  <table  border="1">
    <tr>
      <td>Sl No</td>
      <td>District</td>
      <td>Place</td>
      <td>Action</td>
    </tr>
    <?php
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['district_name']  ?></td>
      <td><?php echo $row['place_name']  ?></td>
      <td><a href="Place.php?did= <?php echo $row['place_id'] ?>">DELETE</a></td>
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