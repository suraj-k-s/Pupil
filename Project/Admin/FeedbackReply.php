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
<h2>Reply:</h2>
<?php
if(isset($_POST["btn_submit"]))
{
	$reply=$_POST["txt_reply"];
	$upQry="update tbl_feedback set reply='".$reply."',status=1 where feedback_id=".$_GET['rid'];
	$con->query($upQry);
	header("location:ViewFeedback.php");
}
?>
<div id="tab" align="center">
<h1 align="center">Feedback Replay</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td width="200" height="200"><label>
        <input type="text" name="txt_reply" id="txt_reply" width="200" height="200" />
      </label></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
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