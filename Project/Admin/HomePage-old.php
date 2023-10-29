<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
</head>

<body>
<?php include("../Assets/Connection/Connection.php");
?>
<h1 align="center">Welcome Admin</h1>
<h2 align="center"><?php echo $_SESSION['aname']?></h2>
<form action="" method="post"  name="form1" id="form1">
<table width="200" border="1">
  <tr>
    <td><a href="Assign.php">Assign Teacher</a></td>
  </tr>
  <tr>
    <td><a href="Faculty.php">Faculty Registration</a></td>
  </tr>
  <tr>
    <td><a href="FacultyList.php">Faculty List</a></td>
  </tr>
  <tr>
    <td><a href="Semester.php">Semester</a></td>
  </tr>
  <tr>
    <td><a href="Subject.php">Subject</a></td>
  </tr>
  <tr>
    <td><a href="ViewFeedback.php">View Feedback</a></td>
  </tr>
  <tr>
    <td><a href="FeedbackReplay.php">Feedback Replay</a></td>
  </tr>
  <tr>
    <td><a href="RepliedFeedback.php">Replied Feedback</a></td>
  </tr>
  <tr>
    <td><a href="Changepassword.php">Change Password</a></td>
  </tr>
  <tr>
    <td><a href="Course.php">Course</a></td>
  </tr>
  <tr>
    <td><a href="District.php">District</a></td>
  </tr>
  <tr>
    <td><a href="Place.php">Place</a></td>
  </tr>
</table>
</form>
</body>
</html>