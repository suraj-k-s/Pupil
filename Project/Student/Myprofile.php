<?php
ob_start();
include('Head.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<style>
  /* Add your custom styles here */
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
  }
  .profile-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
  .profile-image {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    margin: 0 auto;
    display: block;
  }
  .profile-name {
    text-align: center;
    margin: 10px 0;
    font-size: 24px;
  }
  .profile-location {
    text-align: center;
    color: #777;
  }
  .profile-info {
    padding: 20px;
    border-top: 1px solid #eee;
  }
  .profile-info p {
    margin: 10px 0;
  }
  .edit-profile-button {
    text-align: center;
  }
  .edit-profile-button a {
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
  }
  .edit-profile-button a:hover {
    background-color: #0056b3;
  }
</style>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");

$selQry = "select * from tbl_student s inner join tbl_place p on p.place_id=s.place_id where student_id = " . $_SESSION['sid'];
$result = $con->query($selQry);
$row = $result->fetch_assoc();
?>
<br><br><br><br>
<div class="profile-container">
  <img src="../Assets/Files/Student_file/Photo/<?php echo $row['student_photo']; ?>" alt="Profile Picture" class="profile-image">
  <h2 class="profile-name"><?php echo $row['student_name']; ?></h2>
  <p class="profile-location"><?php echo $row['place_name']; ?></p>
  <div class="profile-info">
    <p><strong>Contact:</strong> <?php echo $row['student_contact']; ?></p>
    <p><strong>Email:</strong> <?php echo $row['student_email']; ?></p>
    <p><strong>Address:</strong> <?php echo $row['student_address']; ?></p>
  </div>
  <div class="edit-profile-button">
    <a href="Editprofile.php">Edit Profile</a>
  </div>
</div>
</body>
</html>

<?php
include('Foot.php');
ob_flush();
?>
