<option value="">Select Subject</option>
<?php
include('../Connection/Connection.php');
$selQry="select * from tbl_subject where semester_id=".$_GET['sid'];
$result=$con->query($selQry);
while($row=$result->fetch_assoc())
{
?>
<option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
<?php
}
?>