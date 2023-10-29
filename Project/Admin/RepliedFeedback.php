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
<h1 align="center">Replied Feedbacks</h1>
<?php
include("../Assets/Connection/Connection.php");
?>
<form id="form1" name="form1" method="post" action="">
<?php
$selQry="select * from tbl_feedback where feedback_status=1";
$res=$con->query($selQry);
if($res->num_rows>0)
{
?>
  <table width="200" border="1">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Date</th>
      <th scope="col">Title</th>
      <th scope="col">Reply</th>
      <th scope="col">Action</th>
    </tr>
    <?php
	while($data=$res->fetch_assoc())
	{
		$i=0;
		$i++;
		
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['feedback_date']; ?></td>
      <td><?php echo $data['feedback_title']; ?></td>
      <td><?php echo $data['feeback_reply']; ?></td>
      <td><a href="RepliedFeedback?did=<?php $data['feedback_id']; ?>">Delete</a></td>
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
