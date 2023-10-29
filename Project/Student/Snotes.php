<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notes::Pupill</title>
</head>
<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");

?>

<body>
<div id="tab" align="center">
<h1 align="center">Semester Notes</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    </tr>
    <tr>
      <td>Semester</td>
      <td><label for="txt_semester"></label>
        <select required name="txt_semester" id="txt_semester" onchange="getNotes(this.value)">
       <option>--Select Semester--</option>
        <?php
		$selQry="select * from tbl_semester";
		$res=$con->query($selQry);
		while($data=$res->fetch_assoc())
		{
		?>
        	<option value="<?php echo $data['semester_id'];?>"><?php echo $data['semester_name'];?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Subject</td>
      <td><label for="txt_subject"></label>
        <select required name="txt_subject" id="txt_subject">
        <option>--Select Subject--</option>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  </br>
    <table width="300" border="1">
    <tr>
      <td>SL.NO</td>
      <td>Subject</td>
      <td>Faculty Name</td>
      <td>Caption</td>
      <td>File</td>
      <td>Action</td>
    </tr>
     <?php
  $i=0;
  $selQry= "select * from tbl_note n inner join tbl_subject s on n.subject_id=s.subject_id inner join tbl_faculty f on f.faculty_id=n.faculty_id";
  
   if(isset($_POST['btn_submit']))
   {
	$subject=$_POST["txt_subject"];
	$selQry=$selQry." where s.subject_id = '$subject' ";
   }
  $result=$con->query($selQry);
 
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ;?></td>
      <td><?php echo $row['subject_name'];  ?></td>
      <td><?php echo $row['faculty_name'];  ?></td>
      <td><?php echo $row['note_caption']; ?></td>
      <td><a href="../Assets/Files/Faculty_file/Notes/<?php echo $row['note_file']?>" target="_blank">View Notes</a></td>
      <td><a href="../Assets/Files/Faculty_file/Notes/<?php echo $row['note_file']?>" download>Download</a></td>
    </tr>
    <?php
	}
	?>
  </table>
   <p>
     <script src="../Assets/JQ/jQuery.js"></script>
     <script>
function getNotes(sid)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxNotes.php?sid="+sid,
		success: function(html){
			$("#txt_subject").html(html);
		}
	});
}
     </script>
  </p>
</form>
</div>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>