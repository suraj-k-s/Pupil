<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");

$selqry = "select count(student_id) as num from tbl_student where student_vstatus=1";
$result = $con->query($selqry);
$row = $result->fetch_assoc();

$selQry = "select count(student_id) as num1 from tbl_student where student_vstatus=0";
$res = $con->query($selQry);
$data = $res->fetch_assoc();
?>


<!-- Main content -->
<section class="content" style="min-width:700px;">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-dark" style="
    background-color: #2c3b41;
">
        <div class="inner">
          <h3>
            <?php echo $row['num'] ?>
          </h3>
          <h4>VERIFIED STUDENTS</h4>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
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
            <?php echo $data['num1']; ?>
          </h3>
          <h4>PENDING VERIFICATION</h4>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
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
          $sselQry = "select count(semester_id) as num3 from tbl_assign where faculty_id=" . $_SESSION['fid'];
          $sres = $con->query($sselQry);
          $sdata = $sres->fetch_assoc();
          ?>
          <h3>
            <?php echo $sdata['num3']; ?>
          </h3>
          <h4>NO.OF ASSIGNED SEMESTERS</h4>
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
          <i class="fa fa-envelope"></i>
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
    <div class="box-header with-border" style="background:#2c3b41;color:white; width:100%; border-radius: 13px;display: flex; justify-content: center;  ">
    <div>
      <h3 class="box-title">Assigned Subjects</h3>
      <form id="form1" name="form1" method="post" action="">
        <?php
        $selqry = "select * from tbl_assign a inner join tbl_semester s on s.semester_id=a.semester_id inner join tbl_subject su on su.subject_id=a.subject_id where faculty_id='" . $_SESSION['fid'] . "'";
        $res = $con->query($selqry);
        if ($res->num_rows > 0) {
          ?>
          </br>
          <table border="1">
            <tr>
              <td>Sl.No</td>
              <td>Semester</td>
              <td>Subject</td>
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