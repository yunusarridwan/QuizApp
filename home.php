<?php
session_start();

if (!isset($_SESSION['examineeSession']['examineenakalogin']) == true)
  header("location:index.php");


?>
<!doctype html>
<?php include ("conn.php"); ?>
<!--  HEADER -->
<?php include ("includes/header.php"); ?>      

<div class="app-main">
<!-- sidebar -->
<?php include ("includes/sidebar.php"); ?>



<!-- Condition If unza nga page gi click -->
<?php
@$page = $_GET['page'];


if ($page != '') {
  if ($page == "exam") {
    include ("pages/exam.php");
  } else if ($page == "result") {
    include ("pages/result.php");
  }
}
// Else ang home nga page mo display
else {
  include ("pages/home.php");
}


?> 


<!-- FOOTER -->
<?php include ("includes/footer.php"); ?>



