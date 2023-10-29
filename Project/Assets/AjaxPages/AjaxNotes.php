<option value="">Select Subject</option>
<?php
include('../Connection/Connection.php');
$selQry="select * from tbl_assign a INNER JOIN tbl_subject s on s.subject_id=a.subject_id INNER join tbl_semester se on se.semester_id=s.semester_id where s.semester_id=".$_GET['sid'];
$res=$con->query($selQry);
while($row=$res->fetch_assoc())
{
	
	
		?>
		<option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
<?php
	}
	?>
