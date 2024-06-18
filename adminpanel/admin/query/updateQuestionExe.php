<?php
 include("../../../conn.php");
 extract($_POST);


$updCourse = $conn->query("UPDATE exam_question_tbl SET exam_question='$question', exam_ch1='$choice_A', exam_ch2='$choice_B', exam_ch3='$choice_C', exam_ch4='$choice_D', exam_answer='$correctAnswer' WHERE eqt_id='$question_id' ");
if($updCourse)
{
	   $res = array("res" => "success");
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>