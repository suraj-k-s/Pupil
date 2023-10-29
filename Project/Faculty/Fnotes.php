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
<section class="content" style="min-width:700px;">
<body>
<div id="tab" align="center">
<h1 align="center">Note Upload</h1>
<?php
if(isset($_POST["btn_submit"]))
{
	$caption=$_POST["txt_caption"];
	
	$file = $_FILES['txt_file']['name'];
	$tempfile = $_FILES['txt_file']['tmp_name'];
	move_uploaded_file($tempfile,"../Assets/Files/Faculty_file/Notes/".$file);
	
	$course=$_POST["txt_course"];
	$semester=$_POST["txt_semester"];
	$subject=$_POST["txt_subject"];
	
	$insQry="insert into tbl_note(note_date,note_caption,note_file,subject_id,faculty_id)value(curdate(),'".$caption."','".$file."','".$subject."','".$_SESSION['fid']."')";
	$con->query($insQry);
	header("location:Fnotes.php");
	
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_note where note_id=".$_GET['did'];
	$res=$con->query($delQry);
}
	
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td width="80">Caption</td>
      <td width="104"><label for="txt_caption"></label>
      <input type="text" required name="txt_caption" id="txt_caption" /></td>
    </tr>
    <tr>
      <td>File</td>
      <td><label for="txt_file"></label>
      <input type="file" required name="txt_file" id="txt_file" /></td>
    </tr>
    <tr>
      <td>Course</td>
      <td><label for="txt_course"></label>
        <select required name="txt_course" id="txt_course">
        <option>--Select Course--</option>
        <?php
		$selQry="select * from tbl_course";
		$res=$con->query($selQry);
		while($data=$res->fetch_assoc())
		{
		?>
          <option value="<?php echo $data['course_id']; ?>"><?php echo $data['course_name']; ?></option>
        <?php
		}
		?>
      </select></td>
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
   <p>&nbsp;</p>
    <table width="500" border="1">
    <tr>
      <td>SL.NO</td>
      <td>Subject</td>
      <td>Caption</td>
      <td>File</td>
      <td>Action</td>
    </tr>
     <?php
  $i=0;
  $selQry= "select * from tbl_note n  inner join tbl_subject su on su.subject_id = n.subject_id";
  $result=$con->query($selQry);
  
  
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ;?></td>
      <td><?php echo $row['subject_name'];  ?></td>
      <td><?php echo $row['note_caption']; ?></td>
      <td><img src="../Assets/Files/Faculty_file/Notes/<?php echo $row['note_file']?>" width="75" height="75" /></td>
      <td><a href="Fnotes.php?did= <?php echo $row['note_id'] ?>"><div class="tools" align="center">
                        <i class="fa fa-trash-o"></i>
                      </div></a></td>
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
</body>
</div>
</html>
</section>
<?php
include('Foot.php');
ob_flush();
?>