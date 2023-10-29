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
<h1 align="center">View Feedbacks</h1>
<form id="form1" name="form1" method="post" action="">
<?php
$selQry="select * from tbl_feedback where feedback_status=0";
$res=$con->query($selQry);
if($res->num_rows>0)
{
?>
  <table width="200" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Title</td>
      <td>Feedback Content</td>
      <td>Date</td>
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
      <td><?php echo $data['feedback_title']; ?></td>
      <td><?php echo $data['feedback_content']; ?></td>
      <td><?php echo $data['feedback_date']; ?></td>
      <td><a href="FeedbackReply.php?rid=<?php echo $data['feedback_id'] ?>">Replay</a></td>
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
</div>
</html>
<?php
        include('Foot.php');
        ob_flush();
        ?>