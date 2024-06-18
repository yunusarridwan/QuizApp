<?php
include ("../../../conn.php");

extract($_POST);

try {
    // Cek apakah pertanyaan sudah ada
    $selQuest = $conn->prepare("SELECT * FROM exam_question_tbl WHERE exam_id = :examId AND exam_question = :question");
    $selQuest->execute([':examId' => $examId, ':question' => $question]);

    if ($selQuest->rowCount() > 0) {
        $res = array("res" => "exist", "msg" => $question);
    } else {
        // Menambahkan pertanyaan baru
        $insQuest = $conn->prepare("INSERT INTO exam_question_tbl (exam_id, exam_question, exam_ch1, exam_ch2, exam_ch3, exam_ch4, exam_answer) VALUES (:examId, :question, :choiceA, :choiceB, :choiceC, :choiceD, :correctAnswer)");

        $insQuest->execute([
            ':examId' => $examId,
            ':question' => $question,
            ':choiceA' => $choice_A,
            ':choiceB' => $choice_B,
            ':choiceC' => $choice_C,
            ':choiceD' => $choice_D,
            ':correctAnswer' => $correctAnswer
        ]);

        if ($insQuest->rowCount() > 0) {
            $res = array("res" => "success", "msg" => $question);
        } else {
            $res = array("res" => "failed");
        }
    }
} catch (PDOException $e) {
    $res = array("res" => "error", "msg" => $e->getMessage());
}

echo json_encode($res);
?>