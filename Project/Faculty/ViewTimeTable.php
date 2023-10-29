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

function createSubjectOptions($con, $semester,$hour,$day) {
   
      $selQry1 = "SELECT * FROM `tbl_timetable` t inner join tbl_subject s on t.subject_id=s.subject_id where timetable_day='$day' and timetable_hour='$hour' and s.semester_id='$semester'";
      $data1 = $con->query($selQry1);
      if($row1 = $data1->fetch_assoc()) {
        echo $row1['subject_name'];
      } else {
        echo "Not Decide";
      }
    
  }
?>
<body>
<div id="tab" align="center">
<h1 align="center">Time Table</h1>
    <form id="form1" name="form1" action="">
    <table border="1">
        <tr>
          <td colspan="2">Time Table</td>
          <td colspan="3">
            <select name="sel_semester">
              <option value="">-----Select-----</option>
              <?php
              $selQry = "select * from tbl_semester ";
              $result = $con->query($selQry);
              while ($data = $result->fetch_assoc()) {
                echo '<option value="' . $data['semester_id'] . '">' . $data['semester_name'] . '</option>';
              }
              ?>
            </select>
          </td>
          <td colspan="1">
            <input type="submit" name="btn_submit" value="Submit" />
          </td>
          <td colspan="1">
            <input type="submit" name="btn_reset" value="Reset" />
          </td>
        </tr>
        <?php
        if (isset($_GET['btn_submit'])) {
          $semester = $_GET["sel_semester"];
          if ($semester != "") {
            ?>
            <tr>
              <td>Day</td>
              <td>9:30-10:30</td>
              <td>10:30-11:30</td>
              <td>11:45-12:45</td>
              <td>12:45-1:45</td>
              <td>1:45-2:30</td>
              <td>2:30-3:30</td>
            </tr>
            <?php
            $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
            foreach ($days as $day) {
              echo '<tr>';
              echo '<td height="38">' . $day . '</td>';
              for ($i = 1; $i <= 5; $i++) {
                if ($day == 'Monday' && $i == '4') {
                  echo '<td rowspan="6"><div id="lunch"><p>L</p><p>U</p><p>N</p><p>C</p><p>H</p></div></td>';
                } 
                echo '<td>';
                createSubjectOptions($con, $semester,$i,$day);
                echo '</td>';
              
            }
              echo '</tr>';
            }
          } else {
            ?>
            <script>
              alert("Select Semester");
              window.location = "Timetable.php";
            </script>
          <?php
          }
        }
        ?>
      </table>
    </form>
  </div>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>