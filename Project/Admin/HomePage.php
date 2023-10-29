<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");
$selQry="select count(faculty_id) as num from tbl_faculty";
$res=$con->query($selQry);
$data=$res->fetch_assoc();

$selqry="select count(student_id) as num1 from tbl_student";
$result=$con->query($selqry);
$row=$result->fetch_assoc();
?>


        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-dark" style="
    background-color: #2c3b41;
">
                <div class="inner">
                  <h3><?php echo $data['num'] ?></h3>
                  <h4>Faculties</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green"style="
    background-color: #2c3b41;
">
                <div class="inner">
                  <h3><?php echo $row['num1']; ?></h3>
                  <h4>Students</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow"style="
    background-color: #2c3b41;
">
              <div class="inner">
                  <h3>3</h3>
                  <h4>Add-On Courses</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-pie-chart"></i>
                </div> 
              </div> 
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box"style="
    background-color: #2c3b41;
">
<?php
$fsel="select count(feedback_id) as num2 from tbl_feedback where feedback_status=0";
$fres=$con->query($fsel);
$fback=$fres->fetch_assoc();
?>
              <div class="inner">
                  <h3><?php echo $fback['num2']; ?></h3>
                  <h4>New Feedbacks</h4>
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
  tr, td, th {
    padding:10px;
  }

 
</style>

<body>

<!-- <div class="box box-danger"> -->
                <div class="box-header with-border" style="background:#2c3b41;color:white">
                  <h3 class="box-title">Faculty Members</h3>
                  <div class="box-tools pull-right">
                    <!-- <span class="label label-danger">8 New Members</span>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="background:#2c3b41;">
                  <ul class="users-list clearfix" style="
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
">
                    <?php
                      $selQry= "select * from tbl_faculty ";
                      $result=$con->query($selQry);
                      while($row=$result->fetch_assoc())
                      {
                        ?>
                        <li>
                          <img src="../Assets/Files/Faculty_file/Photo/<?php echo $row['faculty_photo']?>" width="100"  height: 180px; alt="User Image"/>
                          <a class="users-list-name" href="#" style="color:white"><?php echo $row['faculty_name']  ?></a>
                          <span class="users-list-date" style="color:white"><?php echo $row['faculty_contact']  ?></span>
                        </li>
                        <?php
                      }
                    ?>                 
                  </ul><!-- /.users-list -->
                </div><!-- /.box-body -->
                <div class="box-footer text-center" style="background:#2c3b41;">
                  <a href="FacultyList.php" class="uppercase">View All Details</a>
                </div><!-- /.box-footer -->
              </div><!--/.box -->


                    </form>
</body>
</html>
        </section
        <?php
        include('Foot.php');
        ob_flush();
        ?>
        