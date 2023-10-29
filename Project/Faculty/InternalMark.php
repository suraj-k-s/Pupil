<!DOCTYPE html>
<html lang="en">
<head>
<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");
?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
    </style>
</head>
<?php
$semester = "";
$subject = "";
$selQry = "select * from tbl_subject sub inner join tbl_semester sem on sem.semester_id=sub.semester_id inner join tbl_student stu on stu.semester_id=sem.semester_id where student_vstatus=1 and sub.subject_id='".$_GET["sid"]."'";
$result1 = $con->query($selQry);
$result2 = $con->query($selQry);
if($data = $result1->fetch_assoc())
{
  $semester = $data["semester_name"];
  $subject = $data["subject_name"];
}
?>
<body>
<div id="tab" align="center">
<h1 align="center">Internal Marks</h1>
  <form>
      <table border="1">
          <tr> 
            <td>Semester</td>
            <td colspan="2"><?php echo $semester ?></td>
          </tr>
          <tr> 
            <td>Subject</td>
            <td colspan="2"><?php echo $subject ?></td>
          </tr>
          <tr> 
            <td>SL NO</td>
            <td>Student</td>
            <td>Mark</td>
          </tr>
          <?php 
            $i=0;
            while($row = $result2->fetch_assoc())
            {
              $mark="0";

              $selQry1 = "SELECT * FROM tbl_internalmark where student_id='".$row['student_id']."' and subject_id='".$row['subject_id']."'";
              $data1 = $con->query($selQry1);
              if($row1=$data1->fetch_array())
              {
                $mark = $row1["internalmark_mark"];
              }

                $i++;
              ?>
                <tr> 
                  <td><?php echo $i ?></td>
                  <td><?php echo $row["student_name"] ?></td>
                  <td><input type="number" name="txt_mark" id="txt_mark" value="<?php echo $mark ?>" placeholder="Enter Mark" onkeyup="updateMark(this.value,<?php echo $row['subject_id'] ?>,<?php echo $row['student_id'] ?>)" min="0" /></td>
                </tr>
              <?php

            }

          ?>
      </table>
  </form>
  </div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function updateMark(mark,sub,stud)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxMark.php?mark="+mark+"&sub="+sub+"&stud="+stud,
		success: function(html){
			if(html.trim()!="")
      {
        alert(html.trim())
      }
		}
	});
}
</script>
</html>
<?php
include('Foot.php');
ob_flush();
?>