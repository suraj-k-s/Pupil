<?php
if(!(isset($_SESSION['sid']) && !empty($_SESSION['sid']))) {
    header("location:../index.php");
}
?>