<?php
include ("../../../conn.php");

extract($_POST);

// Memeriksa apakah course adalah array dan memprosesnya
if (is_array($course)) {
	// Konversi array course ke JSON
	$courseJson = json_encode($course);
} else {
	$courseJson = json_encode([$course]); // Jika hanya satu course, buat array dengan satu elemen
}

// Memeriksa apakah exam adalah array dan memprosesnya
if (isset($_POST['exam']) && is_array($_POST['exam'])) {
	$examJson = json_encode($_POST['exam']);
} else {
	$examJson = json_encode([]); // Jika tidak ada exam yang dipilih, buat array kosong
}

// $selExamineeFullname = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_fullname='$fullname' ");
// $selExamineeEmail = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$email' ");

if ($gender == "0") {
	$res = array("res" => "noGender");
} else if (empty($course)) {
	$res = array("res" => "noCourse");
} else if (empty($_POST['exam'])) {
	$res = array("res" => "noExam");
} else if ($year_level == "0") {
	$res = array("res" => "noLevel");
} else if (empty($fullname)) {
	$res = array("res" => "noFullname");
} else if (empty($email)) {
	$res = array("res" => "noEmail");
} else if (empty($_POST['sekolah'])) {
	$res = array("res" => "noSchool");
} else {
	// Ambil data dari form
	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$bdate = $_POST['bdate'];
	$sekolah = $_POST['sekolah'];
	$year_level = $_POST['year_level'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Siapkan kueri SQL
	$stmt = $conn->prepare("INSERT INTO examinee_tbl (exmne_fullname, exmne_course, exam, exmne_gender, exmne_birthdate, exmne_school, exmne_year_level, exmne_email, exmne_password) 
                            VALUES (:fullname, :course, :exam, :gender, :bdate, :sekolah, :year_level, :email, :password)");
	$stmt->bindParam(':fullname', $fullname);
	$stmt->bindParam(':course', $courseJson);
	$stmt->bindParam(':exam', $examJson);
	$stmt->bindParam(':gender', $gender);
	$stmt->bindParam(':bdate', $bdate);
	$stmt->bindParam(':sekolah', $sekolah);
	$stmt->bindParam(':year_level', $year_level);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);

	// Eksekusi kueri dan cek hasil
	if ($stmt->execute()) {
		$res = array("res" => "success", "msg" => $email);
	} else {
		$res = array("res" => "failed");
	}
}

echo json_encode($res);
?>
