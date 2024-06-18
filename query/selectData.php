<?php 
$exmneId = $_SESSION['examineeSession']['exmne_id'];

// Select Data from the logged in examinee
$selExmneeData = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneExam =  $selExmneeData['exam'];

// Uraikan JSON menjadi array
$exmneExamArray = json_decode($exmneExam, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die("Error decoding JSON: " . json_last_error_msg());
}

// Pastikan array tidak kosong
if (!empty($exmneExamArray)) {
    // Buat string untuk klausa IN pada query SQL
    $examIds = implode(',', array_map('intval', $exmneExamArray));

    // Select and start the exam depending on the Exam you login
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id IN ($examIds) ORDER BY ex_id DESC");

    if ($selExam->rowCount() > 0) {
        while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) {
            // Proses data ujian di sini
            echo "Exam Title: " . htmlspecialchars($selExamRow['ex_title']) . "<br>";
        }
    } else {
        echo "No exams found.";
    }
} else {
    echo "No exams assigned.";
}
?>