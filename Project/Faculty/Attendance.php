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
$date = date('Y-m-d');
$semester = 0;
if(isset($_POST["btn_search"]))
{
  $date = $_POST["txt_date"];
  $semester = $_POST["txt_semester"];
  $i=0;
  $selQry="select * from tbl_student s inner join tbl_semester se on se.semester_id=s.semester_id where student_vstatus=1 and s.semester_id='".$_POST["txt_semester"]."'";
  $res=$con->query($selQry);
}

if(isset($_POST["btn_reset"]))
{
  $date = date('Y-m-d');
  $semester = 0;
}
?> 

<body>
<div id="tab" align="center">
<h1 align="center">Attendance</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>
        <label for="txt_semester">Semester</label>
        <select required name="txt_semester" id="txt_semester">
        <option>--select--</option>
        <?php
          $selQry="select * from tbl_semester";
          $result=$con->query($selQry);
          while($row=$result->fetch_assoc())
          {
          ?>
                <option <?php if($row['semester_id']==$semester){echo "selected";} ?> value="<?php echo $row['semester_id']; ?>"><?php echo $row['semester_name']; ?>
              <?php
          }
		    ?>
      </select>
      </td>
      <td>
          Date
          <input name='txt_date' id='txt_date' type="date" value="<?php echo $date ?>" max="<?php echo date('Y-m-d') ?>"/>
      </td>
  
      <td align="center">
      		<input type="submit" name="btn_search" id="btn_search" value="Search" />
          <input type="submit" name="btn_reset" id="btn_reset" value="Reset" />
      </td>
    </tr>
  </table>
  <br />
  <br />
  <table width="200" border="1">
   <tr>
      <td>Sl.No</td>
      <td>Name</td>
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td>5</td>
      <td>6</td>
    </tr>
  <?php
  if(isset($_POST["btn_search"]))
  {
    
  while($data=$res->fetch_assoc())
  {
   
	  $i++;
  ?>
    <tr>	
      <td><?php echo $i ?></td>
      <td><?php echo $data["student_name"] ?></td>
      <?php 
        for($j=1;$j<=6;$j++)
        {
          $selQry1 = "SELECT * FROM `tbl_attendance` where student_id='".$data["student_id"]."' and attendance_date='".$_POST["txt_date"]."' and attendance_hour='".$j."'";
          $data1 = $con->query($selQry1);
          if($data1->num_rows>0)
          {
            
          ?>
            <td><input type="checkbox" checked onchange="markAttendance(<?php echo $j ?>,<?php echo $data["student_id"] ?>)"/></td>
          <?php
          }
          else{
            ?>
              <td><input type="checkbox"  onchange="markAttendance(<?php echo $j ?>,<?php echo $data["student_id"] ?>)"/></td>
            <?php
          }
        }
      ?>
    </tr>
 
<?php
  }
}
?>
 </table>
</form>
</div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function markAttendance(hour,studid)
{

  var date = document.getElementById("txt_date").value;
	$.ajax({
		url:"../Assets/AjaxPages/AjaxAttendance.php?hour="+hour+"&studid="+studid+"&date="+date,
		success: function(html){
			// alert(html)
		}
	});
}
</script>
</html>
<?php
include('Foot.php');
ob_flush();
?>