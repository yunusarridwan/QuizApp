<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Kelola Siswa</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 p-3 card">
                <div class="card-header">Daftar Siswa
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 p-2 table table-borderless table-striped table-hover"
                        id="tableList">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal lahir</th>
                                <th>Asal Sekolah</th>
                                <th>Mata Pelajaran</th>
                                <th>Ujian</th>
                                <th>Tingkat Pendidikan</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selExmne = $conn->query("SELECT * FROM examinee_tbl ORDER BY exmne_id DESC ");
                            if ($selExmne->rowCount() > 0) {
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($selExmneRow['exmne_fullname']); ?></td>
                                                <td><?php echo htmlspecialchars($selExmneRow['exmne_gender']); ?></td>
                                                <td><?php echo htmlspecialchars($selExmneRow['exmne_birthdate']); ?></td>
                                                <td><?php echo htmlspecialchars($selExmneRow['exmne_school']); ?></td>
                                                <td>
                                                    <?php
                                                    $exmneCourses = json_decode($selExmneRow['exmne_course'], true); // Uraikan JSON menjadi array
                                                    if (json_last_error() === JSON_ERROR_NONE && is_array($exmneCourses)) {
                                                        if (!empty($exmneCourses)) {
                                                            foreach ($exmneCourses as $courseId) {
                                                                $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$courseId'")->fetch(PDO::FETCH_ASSOC);
                                                                if ($selCourse) {
                                                                    echo htmlspecialchars($selCourse['cou_name']) . "<br>";
                                                                } else {
                                                                    echo "Course ID $courseId tidak ditemukan.<br>";
                                                                }
                                                            }
                                                        } else {
                                                            echo "Tidak ada mata pelajaran yang dipilih.";
                                                        }
                                                    } else {
                                                        echo "Data mata pelajaran tidak valid atau tidak ditemukan.";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $exmneExam = json_decode($selExmneRow['exam'], true); // Uraikan JSON menjadi array
                                                    if (json_last_error() === JSON_ERROR_NONE && is_array($exmneExam)) {
                                                        if (!empty($exmneExam)) {
                                                            foreach ($exmneExam as $examId) {
                                                                $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId'")->fetch(PDO::FETCH_ASSOC);
                                                                if ($selExam) {
                                                                    echo htmlspecialchars($selExam['ex_title']) . "<br>";
                                                                } else {
                                                                    echo "Exam ID $examId tidak ditemukan.<br>";
                                                                }
                                                            }
                                                        } else {
                                                            echo "Tidak ada ujian yang dipilih.";
                                                        }
                                                    } else {
                                                        echo "Data ujian tidak valid atau tidak ditemukan.";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo htmlspecialchars($selExmneRow['exmne_year_level']); ?></td>
                                                <td><?php echo htmlspecialchars($selExmneRow['exmne_email']); ?></td>
                                                <td><?php echo htmlspecialchars($selExmneRow['exmne_password']); ?></td>
                                                <td><?php echo htmlspecialchars($selExmneRow['exmne_status']); ?></td>
                                                <td>
                                                    <a rel="facebox"
                                                        href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['exmne_id']; ?>"
                                                        class="btn btn-sm btn-primary">Update</a>
                                                </td>
                                            </tr>
                                    <?php }
                            } else { ?>
                                    <tr>
                                        <td colspan="10">
                                            <h3 class="p-3">Data Siswa Tidak Ditemukan</h3>
                                        </td>
                                    </tr>
                            <?php }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


    </div>