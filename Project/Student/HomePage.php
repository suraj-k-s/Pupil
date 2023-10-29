<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");
$L =0;
$P=0;
$H=0;
$A=0;

$selQrys= "SELECT DISTINCT attendance_date  FROM tbl_attendance";
$results = $con->query($selQrys);

while ($datas = $results->fetch_assoc()) {

         
           $selQs = "SELECT * FROM tbl_attendance WHERE attendance_date = '".$datas["attendance_date"]."' AND student_id = '" . $_SESSION["sid"] . "'";
            $resultQs = $con->query($selQs);

            if ($resultQs->num_rows == 6) {
                $P++;
            } elseif ($resultQs->num_rows == 5) {
                $H++;
            } else {
                $A++;
            }
}
         
    
$Data = $H/2;
$attandance = (($P+$Data)/($P+$A+$H))*100;  

function createSubjectOptions($con, $semester,$hour,$day) {
   
  $selQry1 = "SELECT * FROM `tbl_timetable` t inner join tbl_subject s on t.subject_id=s.subject_id where timetable_day='$day' and timetable_hour='$hour' and s.semester_id='$semester'";
  $data1 = $con->query($selQry1);
  if($row1 = $data1->fetch_assoc()) {
    echo $row1['subject_name'];
  } else {
    echo "Not Decide";
  }

}

$selQry = "select * from tbl_student s inner join tbl_semester se on se.semester_id=s.semester_id where student_id=".$_SESSION['sid'];
$res = $con->query($selQry);
$data = $res->fetch_assoc();
?>


<!-- Main content -->
<section class="content" style="min-width:700px;">
  <!-- Small boxes (Stat box) -->
  <div class="row">
  <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green" style="
    background-color: #2c3b41;
">
        <div class="inner">
          <h3>
            <?php echo $attandance."%" ?>
          </h3>
          <h4>Attandance</h4>
        </div>
        <div class="icon">
          <i class="fa fa-pie-chart"></i>
        </div>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green" style="
    background-color: #2c3b41;
">
        <div class="inner">
          <h3>
            <?php echo $data['semester_name']; ?>
          </h3>
          <h4>SEMESTER</h4>
        </div>
        <div class="icon">
          <i class="fa fa-pie-chart"></i>
        </div>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow" style="
    background-color: #2c3b41;
">
        <div class="inner">
          <?php
          $cselQry = "select * from tbl_student s inner join tbl_course c on c.course_id=s.course_id where student_id=".$_SESSION['sid'];
          $cres = $con->query($cselQry);
          $cdata = $cres->fetch_assoc();
          ?>
          <h3>
            <?php echo $cdata['course_name']; ?>
          </h3>
          <h4>ADD-ON COURSE</h4>
        </div>
        <div class="icon">
          <i class="fa fa-pie-chart"></i>
        </div>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box" style="
    background-color: #2c3b41;
">
        <?php
        $fsel = "select count(feedback_id) as num2 from tbl_feedback where feedback_status=0";
        $fres = $con->query($fsel);
        $fback = $fres->fetch_assoc();


        ?>
        <div class="inner">
          <h3><span id="time"></span></h3>
          <h4><span id="date"></span></h4>
        </div>
        <div class="icon">
          <i class="fa fa-dashboard"></i>
        </div>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
  <!--FACULTY MEMBERS-->
  <?php
  include("../Assets/Connection/Connection.php");
  ?>

  <!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
  </head>
  <style>
    tr,
    td,
    th {
      padding: 10px;
    }
  </style>

  <body>
<div style="display: flex;">







    <!-- <div class="box box-danger"> -->
    <div class="box-header with-border" style="background:#2c3b41;color:white; width:35%; border-radius: 13px;display: flex; justify-content: center;  ">
    <div>
      <h3 class="box-title">SEMESTER SUBJECTS</h3>
      <form id="form1" name="form1" method="post" action="">
        <?php
        $selqry = "select * from tbl_semester s inner join tbl_subject su on su.semester_id=s.semester_id where s.semester_id='" . $_SESSION['semid'] . "'";
        $res = $con->query($selqry);
        if ($res->num_rows > 0) {
          ?>
          </br>
          <table border="1">
            <tr>
              <td>SL.NO</td>
              <td>SEMESTER</td>
              <td>SUBJECT</td>
            </tr>
            <?php
            $i = 0;
            while ($data = $res->fetch_assoc()) {
              $i++;
              ?>
              <tr>
                <td>
                  <?php echo $i; ?>
                </td>
                <td>
                  <?php echo $data['semester_name']; ?>
                </td>
                <td>
                  <?php echo $data['subject_name']; ?>
                </td>
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
    </div>



    <div class="box-header with-border" style="background:#2c3b41;color:white; width:60%;  padding:15px; margin-left: 20px; border-radius: 13px;display: flex; justify-content: center;">
    <div>
      <h3 class="box-title">TIME TABLE</h3>
      <form id="form1" name="form1" method="post" action="">
      <table border="1">
        <?php
          $semester = $_SESSION["semid"];
        
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
        
    
        ?>
      </table>
      </form>
    </div>
    </div>








</div>
  </body>
  <script>
    // Function to update the time
    function updateTime() {
      const currentTime = new Date();
      const hours = currentTime.getHours();
      const minutes = currentTime.getMinutes();
      const seconds = currentTime.getSeconds();
      const ampm = hours >= 12 ? 'PM' : 'AM';

      // Convert to 12-hour format
      const formattedHours = (hours % 12) || 12; // 0 should be displayed as 12
      const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
      const formattedSeconds = seconds < 10 ? '0' + seconds : seconds;

      const formattedTime = `${formattedHours}:${formattedMinutes}:${formattedSeconds} ${ampm}`;

      // Update the content of the element with the id "time"
      document.getElementById("time").textContent = formattedTime;
    }

    // Call updateTime initially to display the time immediately
    updateTime();

    // Set up a timer to update the time every second
    setInterval(updateTime, 1000);

    const currentDate = new Date();

    // Get the elements by their IDs
    const dateElement = document.getElementById("date");

    // Format the date as needed (e.g., "MM/DD/YYYY")
    const formattedDate = (currentDate.getMonth() + 1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear();

    // Set the formatted date as the content of the <span> element
    dateElement.textContent = formattedDate;
  </script>

  </html>
</section>
<?php
include('Foot.php');
ob_flush();
?>