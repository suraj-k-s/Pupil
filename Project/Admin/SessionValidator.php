<?php
if(!(isset($_SESSION['aid']) && !empty($_SESSION['aid']))) {
    header("location:../index.php");
}
?>