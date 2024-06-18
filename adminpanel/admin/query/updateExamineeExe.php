<?php
include ("../../../conn.php");
extract($_POST);

// Jika exCourse belum dalam bentuk array, konversi menjadi array
if (!is_array($exCourse)) {
    $exCourse = array($exCourse);
}

// Konversi array exam ke JSON
$exCourseJson = json_encode($exCourse);
$examJson = json_encode($exam);

// Validasi apakah sekolah ada
if (empty($sekolah)) {
    $res = array("res" => "noSchool");
    echo json_encode($res);
    exit();
}

// Siapkan kueri SQL untuk pembaruan dengan prepared statement
$updCourse = $conn->prepare("UPDATE examinee_tbl 
                            SET exmne_fullname = :exFullname, 
                                exmne_course = :exCourse, 
                                exam = :exam, 
                                exmne_gender = :exGender, 
                                exmne_birthdate = :exBdate, 
                                exmne_school = :sekolah, 
                                exmne_year_level = :exYrlvl, 
                                exmne_email = :exEmail, 
                                exmne_password = :exPass, 
                                exmne_status = :exmneStatus 
                            WHERE exmne_id = :exmne_id");

$updCourse->bindParam(':exFullname', $exFullname);
// Bind exCourse sebagai JSON
$updCourse->bindParam(':exCourse', $exCourseJson);
$updCourse->bindParam(':exam', $examJson);
$updCourse->bindParam(':exGender', $exGender);
$updCourse->bindParam(':exBdate', $exBdate);
$updCourse->bindParam(':sekolah', $sekolah);
$updCourse->bindParam(':exYrlvl', $exYrlvl);
$updCourse->bindParam(':exEmail', $exEmail);
$updCourse->bindParam(':exPass', $exPass);
$updCourse->bindParam(':exmneStatus', $newCourseName);
$updCourse->bindParam(':exmne_id', $exmne_id);

if ($updCourse->execute()) {
    $res = array("res" => "success", "exFullname" => $exFullname);
} else {
    $res = array("res" => "failed");
}

echo json_encode($res);
?>
