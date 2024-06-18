<?php
include ("../../../conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Periksa apakah examat_id telah diterima dari POST
    if (isset($_POST['examat_id'])) {
        $examat_id = $_POST['examat_id'];

        // Output debugging
        error_log("Received POST examat_id: " . $examat_id);

        try {
            // Siapkan query penghapusan
            $deleteQuery = $conn->prepare("DELETE FROM exam_attempt WHERE examat_id = :examat_id");
            $deleteQuery->bindParam(':examat_id', $examat_id, PDO::PARAM_INT);

            // Eksekusi query
            if ($deleteQuery->execute()) {
                // Jika penghapusan berhasil, kirim respons JSON sukses
                $response = array("status" => "success", "message" => "Record deleted successfully");
                error_log("Record deleted successfully for examat_id: " . $examat_id);
            } else {
                // Jika penghapusan gagal, kirim respons JSON error
                $errorInfo = $deleteQuery->errorInfo();
                $response = array("status" => "error", "message" => "Error deleting record: " . implode(" - ", $errorInfo));
                error_log("Error deleting record: " . implode(" - ", $errorInfo));
            }
        } catch (Exception $e) {
            // Tangani kesalahan dan kirim respons JSON error
            $response = array("status" => "error", "message" => "Exception: " . $e->getMessage());
            error_log("Exception: " . $e->getMessage());
        }
    } else {
        $response = array("status" => "error", "message" => "examat_id not received");
        error_log("examat_id not received");
    }

    // Kembalikan respons dalam format JSON
    echo json_encode($response);
    exit();
}
?>
