<div class="app-sidebar sidebar-shadow" style="background:#343a3f;">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Ujian yang tersedia</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Daftar Ujian
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <?php
                    // Uraikan JSON menjadi array
                    $exmneExamArray = json_decode($exmneExam, true);

                    if (json_last_error() !== JSON_ERROR_NONE) {
                        die("Error decoding JSON: " . json_last_error_msg());
                    }

                    // Pastikan array tidak kosong
                    if (!empty($exmneExamArray)) {
                        // Buat string untuk klausa IN pada query SQL
                        $examIds = implode(',', array_map('intval', $exmneExamArray));

                        // Ambil ID ujian yang sudah diambil oleh pengguna
                        $takenExamIds = [];
                        $selTakenExam = $conn->query("SELECT exam_id FROM exam_attempt WHERE exmne_id='$exmneId'");
                        if ($selTakenExam->rowCount() > 0) {
                            while ($row = $selTakenExam->fetch(PDO::FETCH_ASSOC)) {
                                $takenExamIds[] = $row['exam_id'];
                            }
                        }

                        // Filter ujian yang belum diambil
                        $examIdsToQuery = array_diff(explode(',', $examIds), $takenExamIds);
                        if (!empty($examIdsToQuery)) {
                            $examIdsToQueryString = implode(',', $examIdsToQuery);

                            // Select and start the exam depending on the Exam you login
                            $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id IN ($examIdsToQueryString) ORDER BY ex_id DESC");
                            ?>
                            <ul>
                                <?php
                                if ($selExam->rowCount() > 0) {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <li>
                                            <a href="#" id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>">
                                                <?php
                                                $lengthOfTxt = strlen($selExamRow['ex_title']);
                                                if ($lengthOfTxt >= 23) { ?>
                                                    <?php echo htmlspecialchars(substr($selExamRow['ex_title'], 0, 20)); ?>.....
                                                <?php } else {
                                                    echo htmlspecialchars($selExamRow['ex_title']);
                                                } ?>
                                            </a>
                                        </li>
                                    <?php }
                                } else { ?>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i>Tidak Ada Ujian Saat ini
                                        </a>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                            <?php
                        } else { ?>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon"></i>Tidak ada ujian
                                    </a>
                                </li>
                            </ul>
                        <?php }
                    } else { ?>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon"></i>Tidak ada ujian
                                </a>
                            </li>
                        </ul>
                    <?php }
                    ?>

                <li class="app-sidebar__heading">Daftar ujian yang telah di ikuti</li>
                <li>
                    <?php
                    $selTakenExam = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE exmne_id='$exmneId' ORDER BY ea.examat_id");

                    if ($selTakenExam->rowCount() > 0) {
                        while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) { ?>
                            <a href="home.php?page=result&id=<?php echo $selTakenExamRow['ex_id']; ?>">
                                <?php echo $selTakenExamRow['ex_title']; ?>
                            </a>
                        <?php }
                    } else { ?>
                        <a href="#" class="pl-3">Anda belum mengikuti ujian</a>
                    <?php }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</div>