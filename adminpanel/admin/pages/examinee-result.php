<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Hasil Ujian</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 p-3 card">
                <div class="card-header">Daftar Hasil Ujian</div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Nama Ujian</th>
                                <th>Benar</th>
                                <th>Nilai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selExmne = $conn->query("SELECT et.exmne_fullname, et.exmne_id, ex.ex_title, ex.ex_questlimit_display, ea.exam_id, ea.examat_id
                                                          FROM examinee_tbl et
                                                          INNER JOIN exam_attempt ea ON et.exmne_id = ea.exmne_id
                                                          INNER JOIN exam_tbl ex ON ex.ex_id = ea.exam_id
                                                          ORDER BY ea.examat_id DESC");
                            if ($selExmne->rowCount() > 0) {
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) {
                                    $eid = $selExmneRow['exmne_id'];
                                    $exam_id = $selExmneRow['exam_id'];
                                    $examat_id = $selExmneRow['examat_id'];
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($selExmneRow['exmne_fullname']); ?></td>
                                        <td><?php echo htmlspecialchars($selExmneRow['ex_title']); ?></td>
                                        <td>
                                            <?php
                                            $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt 
                                                                  INNER JOIN exam_answers ea 
                                                                  ON eqt.eqt_id = ea.quest_id 
                                                                  AND eqt.exam_answer = ea.exans_answer  
                                                                  WHERE ea.axmne_id='$eid' 
                                                                  AND ea.exam_id='$exam_id' 
                                                                  AND ea.exans_status='new'");
                                            $scoreCount = $selScore->rowCount();
                                            $over = $selExmneRow['ex_questlimit_display'];
                                            ?>
                                            <span><?php echo $scoreCount; ?> / <?php echo $over; ?></span>
                                        </td>
                                        <td>
                                            <span>
                                                <?php
                                                $score = $scoreCount;
                                                $ans = $score / $over * 100;
                                                echo number_format($ans, 2);
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <button type="button" onclick="confirmDelete(<?php echo $examat_id; ?>)"
                                                class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="5">
                                        <h3 class="p-3">Hasil Ujian Tidak Ditemukan</h3>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(examat_id) {
        // Menampilkan dialog konfirmasi menggunakan SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Tindakan ini tidak bisa dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika dikonfirmasi, kirim permintaan AJAX untuk menghapus data
                deleteExamAttempt(examat_id);
            }
        });
    }

    function deleteExamAttempt(examat_id) {
        console.log("Sending AJAX request to delete examat_id:", examat_id); // Debug sebelum mengirim permintaan

        $.ajax({
            url: 'query/deleteResultExe.php', // URL ke skrip PHP yang akan menangani penghapusan
            type: 'POST',
            data: {
                examat_id: examat_id
            }, // Kirim ID ke server
            dataType: 'json',
            success: function (response) {
                console.log("AJAX response received:", response); // Debug respons
                if (response.status === 'success') {
                    // Menampilkan pesan sukses dan reload halaman
                    Swal.fire(
                        'Dihapus!',
                        'Hasil ujian berhasil dihapus.',
                        'success'
                    ).then(() => {
                        window.location
                    .reload(); // Memuat ulang halaman setelah penghapusan berhasil
                    });
                } else {
                    // Menampilkan pesan kesalahan jika penghapusan gagal
                    Swal.fire(
                        'Gagal!',
                        response.message || 'Gagal menghapus hasil ujian.',
                        'error'
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", xhr.responseText); // Debug kesalahan AJAX
                Swal.fire(
                    'Error!',
                    'Terjadi kesalahan saat menghapus data.',
                    'error'
                );
            }
        });
    }
</script>