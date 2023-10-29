<?php
    include("../Connection/Connection.php");
    session_start();
    $hour = $_GET["hour"];
    $studid = $_GET["studid"];
    $date = $_GET["date"];
    $fid = $_SESSION["fid"];


    $selQry = "SELECT * FROM `tbl_attendance` where student_id='$studid' and attendance_hour='$hour' and attendance_date='$date'";
    $data = $con->query($selQry);
    if($data->num_rows>0)
    {
        $delQry = "DELETE FROM `tbl_attendance` where student_id='$studid' and attendance_hour='$hour' and attendance_date='$date'";

        if($con->query($delQry))
        {
            echo "deleted";
        }
    }
    else
    {
        $insQry = "INSERT INTO `tbl_attendance`(`attendance_date`, `attendance_hour`, `student_id`, `faculty_id`) 
               VALUES ('$date','$hour','$studid','$fid')";

        if($con->query($insQry))
        {
            echo "inserted";
        }
    }


    
?>