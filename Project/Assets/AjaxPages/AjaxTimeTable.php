<?php
    include("../Connection/Connection.php");
    session_start();
    $hour = $_GET["hour"];
    $subject = $_GET["subject"];
    $semester = $_GET["semester"];
    $day = $_GET["day"];


    $selQry = "SELECT * FROM `tbl_timetable` where timetable_day='$day' and timetable_hour='$hour' and semester_id='$semester'";
    $data = $con->query($selQry);
    if($data->num_rows>0)
    {
        $upQry = "Update  `tbl_timetable` set subject_id='$subject' where timetable_day='$day' and timetable_hour='$hour' and semester_id='$semester'";

        if($con->query($upQry))
        {
            echo "Updated";
        }
    }
    else
    {
        $insQry = "INSERT INTO `tbl_timetable`(`timetable_day`, `timetable_hour`, `semester_id`, `subject_id`) 
               VALUES ('$day','$hour','$semester','$subject')";

        if($con->query($insQry))
        {
            echo "inserted";
        }
    }


    
?>