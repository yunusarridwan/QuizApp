<?php
include ("../../../conn.php");

if (isset($_POST['course_ids']) && is_array($_POST['course_ids'])) {
    $courseIds = $_POST['course_ids'];

    // Create a string of placeholders for the query
    $placeholders = implode(',', array_fill(0, count($courseIds), '?'));

    // Prepare the SQL statement with the placeholders
    $selExam = $conn->prepare("SELECT * FROM exam_tbl WHERE cou_id IN ($placeholders) ORDER BY ex_id ASC");

    // Execute the statement with the actual course IDs
    $selExam->execute($courseIds);

    if ($selExam->rowCount() > 0) {
        // If exams are found
        while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="form-check" required="">
                    <input class="form-check-input" type="checkbox" name="exam[]" id="exam' . $selExamRow['ex_id'] . '" value="' . $selExamRow['ex_id'] . '">
                    <label class="form-check-label" for="exam' . $selExamRow['ex_id'] . '">' . $selExamRow['ex_title'] . '</label>
                  </div>';
        }
    } else {
        // If no exams are found
        echo '<p>No exams found for selected courses.</p>';
    }
}
?>
