<?php
session_start();

if (!isset($_SESSION['admin']['adminnakalogin']) == true)
  header("location:index.php");


?>
<?php include ("../../conn.php"); ?>
<!-- header -->
<?php include ("includes/header.php"); ?>      

<div class="app-main">
<!-- sidebar  -->
<?php include ("includes/sidebar.php"); ?>



<!-- Condition if page click -->
<?php
@$page = $_GET['page'];


if ($page != '') {
  if ($page == "add-course") {
    include ("pages/add-course.php");
  } else if ($page == "manage-course") {
    include ("pages/manage-course.php");
  } else if ($page == "manage-exam") {
    include ("pages/manage-exam.php");
  } else if ($page == "manage-examinee") {
    include ("pages/manage-examinee.php");
  } else if ($page == "examinee-result") {
    include ("pages/examinee-result.php");
  }


}
// if no page to click
else {
  include ("pages/home.php");
}


?> 


<!-- MAO NI IYA FOOTER -->
<?php include ("includes/footer.php"); ?>

<?php include ("includes/modals.php"); ?>
