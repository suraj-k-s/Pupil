<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PostFeedback::Pupil</title>
</head>
<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");
?>
<body>
<div id="tab" align="center">
<h1 align="center">Upload Feedbacks</h1>
<?php
if(isset($_POST["btn_submit"]))
{
	$title=$_POST["txt_title"];
	$content=$_POST["txt_content"];
	$studentid=$_SESSION['sid'];
	
	$insQry="insert into tbl_feedback(feedback_date,feedback_title,feedback_content,student_id)value(curdate(),'".$title."','".$content."','".$studentid."')";
	$con->query($insQry);
	header("location:PostFeedback.php");
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Title</td>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" required="required" /></td>
    </tr>
    <tr>
      <td width="100" height="75">Content</td>
      <td width="100" height="75"><label for="txt_content"></label>
      <input type="text" name="txt_content" id="txt_content" required="required" width="165" height="75" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <label>
          <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?php
  $selQry="select * from tbl_feedback where student_id=".$_SESSION['sid'];
  $res=$con->query($selQry);
  if($res->num_rows>0)
  {
  ?>
  <table width="200" border="1">
    <tr>
      <td>Sl.NO</td>
      <td>Title</td>
      <td>Content</td>
      <td>Date</td>
      <td>Reply</td>
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
      <td><?php echo $data['feedback_reply']; ?></td>
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