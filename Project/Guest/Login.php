<?php
include("../Assets/Connection/Connection.php");
 session_start();
if(isset($_POST["btn_login"]))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$resAdmin=$con->query($selAdmin);
	
	$selStudent="select * from tbl_student where student_email='".$email."' and student_password='".$password."' and student_vstatus='1'";
	$resStudent=$con->query($selStudent);
	
	$selFaculty="select * from tbl_faculty where faculty_email='".$email."' and faculty_password='".$password."'";
	$resFaculty=$con->query($selFaculty);
	
	if($rowAdmin=$resAdmin->fetch_assoc())
	{
		$_SESSION['aid']=$rowAdmin['admin_id'];
		$_SESSION['aname']=$rowAdmin['admin_name'];
		header('location:../Admin/HomePage.php');
	}
	else if($rowStudent=$resStudent->fetch_assoc())
	{
		$_SESSION['sid']=$rowStudent['student_id'];
		$_SESSION['sname']=$rowStudent['student_name'];
    $_SESSION['semid']=$rowStudent['semester_id'];
		header('location:../Student/HomePage.php'); 
	}
	else if($rowFaculty=$resFaculty->fetch_assoc())
	{
		$_SESSION['fid']=$rowFaculty['faculty_id'];
		$_SESSION['fname']=$rowFaculty['faculty_name'];
		header('location:../Faculty/HomePage.php'); 
	}
	else
	{
  ?>
  <script>
		alert( "INVALID USER-ID OR PASSWORD");
	</script>
  <?php
	}
}

?>



<style>
	body {
  background-color:rgba(69, 105, 144, 0.15);
  font-family: "Asap", sans-serif;
}

.login {
  overflow: hidden;
  background-color: white;
  padding: 40px 30px 30px 30px;
  border-radius: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
  -moz-transition: -moz-transform 300ms, box-shadow 300ms;
  transition: transform 300ms, box-shadow 300ms;
  box-shadow: 5px 10px 10px rgba(2, 128, 144, 0.2);
}
.login::before, .login::after {
  content: "";
  position: absolute;
  width: 600px;
  height: 600px;
  border-top-left-radius: 40%;
  border-top-right-radius: 45%;
  border-bottom-left-radius: 35%;
  border-bottom-right-radius: 40%;
  z-index: -1;
}
.login::before {
  left: 40%;
  bottom: -130%;
  background-color: rgb(0, 255, 255);
  -webkit-animation: wawes 6s infinite linear;
  -moz-animation: wawes 6s infinite linear;
  animation: wawes 6s infinite linear;
}
.login::after {
  left: 35%;
  bottom: -125%;
  background-color: rgba(2, 128, 144, 0.2);
  -webkit-animation: wawes 7s infinite;
  -moz-animation: wawes 7s infinite;
  animation: wawes 7s infinite;
}
.login > input {
  font-family: "Asap", sans-serif;
  display: block;
  border-radius: 5px;
  font-size: 16px;
  background: white;
  width: 100%;
  border: 0;
  padding: 10px 10px;
  margin: 15px -10px;
}
.login > button {
  font-family: "Asap", sans-serif;
  cursor: pointer;
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  width: 80px;
  border: 0;
  padding: 10px 0;
  margin-top: 10px;
  margin-left: -5px;
  border-radius: 5px;
  background-color:rgb(0, 255, 255);
  -webkit-transition: background-color 300ms;
  -moz-transition: background-color 300ms;
  transition: background-color 300ms;
}
.login > button:hover {
  background-color: rgba(2, 128, 144, 0.2);
}

@-webkit-keyframes wawes {
  from {
    -webkit-transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
@-moz-keyframes wawes {
  from {
    -moz-transform: rotate(0);
  }
  to {
    -moz-transform: rotate(360deg);
  }
}
@keyframes wawes {
  from {
    -webkit-transform: rotate(0);
    -moz-transform: rotate(0);
    -ms-transform: rotate(0);
    -o-transform: rotate(0);
    transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
a {
  text-decoration: none;
  color: rgba(255, 255, 255, 0.6);
  position: absolute;
  right: 10px;
  bottom: 10px;
  font-size: 12px;
}
	</style>









<form class="login" method="post">
  <input type="email" placeholder="Email" name="txt_email" required>
  <input type="password" placeholder="Password" required name="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
  <button type="submit" name="btn_login">Login</button>
</form>

