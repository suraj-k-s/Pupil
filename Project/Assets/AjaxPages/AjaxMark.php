<?php
    include("../Connection/Connection.php");
    $mark =$_GET["mark"];
    $sub = $_GET["sub"];
    $stud = $_GET["stud"];

    $selQry = "SELECT * FROM tbl_internalmark where student_id='$stud' and subject_id='$sub'";
    $data = $con->query($selQry);
    if($data->num_rows>0)
    {
        $Qry = "UPDATE `tbl_internalmark` SET `internalmark_mark`='$mark',`internalmark_date`=curdate() where student_id='$stud' and subject_id='$sub'";

    }
    else
    {
        $Qry = "INSERT INTO `tbl_internalmark`(`internalmark_date`, `internalmark_mark`, `subject_id`, `student_id`)
               VALUES (curdate(),'$mark','$sub','$stud')";
    }

    if($mark>=0 && $mark<=20)
    {
        if($con->query($Qry))
        {
            
        }
    }
    else{
        echo "Mark Between 0 to 20";
    }


    
?>