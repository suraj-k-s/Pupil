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

<body>
<div id="tab" align="center">
<h1 align="center">Internal Marks</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
  <?php
$selQry="select * from tbl_internalmark i inner join tbl_student s on s.student_id = i.student_id inner join tbl_subject su on su.subject_id = i.subject_id where i.student_id=".$_SESSION['sid'];
$res=$con->query($selQry);
if($res->num_rows>0)
{
?>
    <tr>
      <td colspan="2">Name:<?php echo $_SESSION['sname']; ?> </td>
    </tr>
    <tr>
      <td align="center">Subject</td>
      <td align="center">Mark</td>
    </tr>
    <?php
	while($row=$res->fetch_assoc())
	{
	?>
    <tr>
      <td><?php echo $row['subject_name']; ?></td>
      <td><?php echo $row['internalmark_mark']; ?></td>
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