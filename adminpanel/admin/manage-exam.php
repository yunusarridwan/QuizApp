<?php
session_start();

if (!isset($_SESSION['admin']['adminnakalogin']) == true)
  header("location:index.php");


?>
<?php include ("../../conn.php"); ?>
<!-- header-->
<?php include ("includes/header.php"); ?>

<div class="app-main">
  <!-- sidebar -->
  <?php include ("includes/sidebar.php"); ?>


  <?php
  $exId = $_GET['id'];

  $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exId' ");
  $selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);

  $courseId = $selExamRow['cou_id'];
  $selCourse = $conn->query("SELECT cou_name as courseName FROM course_tbl WHERE cou_id='$courseId' ")->fetch(PDO::FETCH_ASSOC);
  ?>


  <div class="app-main__outer">
    <div class="app-main__inner">
      <div class="app-page-title">
        <div class="page-title-wrapper">
          <div class="page-title-heading">
            <div> Kelola Ujian
              <div class="page-title-subheading">
                Tambahkan Soal <?php echo $selExamRow['ex_title']; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div id="refreshData">
          <div class="row">
            <div class="col-md-6">
              <div class="main-card mb-3 card">
                <div class="card-header">
                  <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Informasi Ujian
                </div>
                <div class="card-body">
                  <form method="post" id="updateExamFrm">
                    <div class="form-group">
                      <label>Ujian</label>
                      <select class="form-control" name="courseId" required="">
                        <option value="<?php echo $selExamRow['cou_id']; ?>"><?php echo $selCourse['courseName']; ?>
                        </option>
                        <?php
                        $selAllCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                        while ($selAllCourseRow = $selAllCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $selAllCourseRow['cou_id']; ?>">
                                      <?php echo $selAllCourseRow['cou_name']; ?></option>
                        <?php }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Judul Ujian</label>
                      <input type="hidden" name="examId" value="<?php echo $selExamRow['ex_id']; ?>">
                      <input type="" name="examTitle" class="form-control" required=""
                        value="<?php echo $selExamRow['ex_title']; ?>">
                    </div>

                    <div class="form-group">
                      <label>Dekripsi Ujian</label>
                      <input type="" name="examDesc" class="form-control" required=""
                        value="<?php echo $selExamRow['ex_description']; ?>">
                    </div>

                    <div class="form-group">
                      <label>Waktu Ujian</label>
                      <select class="form-control" name="examLimit" required="">
                        <option value="<?php echo $selExamRow['ex_time_limit']; ?>">
                          <?php echo $selExamRow['ex_time_limit']; ?> Menit</option>
                        <option value="30">30 Menit</option>
                        <option value="60">1 Jam</option>
                        <option value="90">1 Jam 30 Menit</option>
                        <option value="120">2 Jam</option>
                        <option value="150">2 Jam 30 Menit</option>
                        <option value="180">3 Jam</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Batas Soal</label>
                      <input type="number" name="examQuestDipLimit" class="form-control"
                        value="<?php echo $selExamRow['ex_questlimit_display']; ?>">
                    </div>

                    <div class="form-group" align="right">
                      <button type="submit" class="btn btn-primary btn-lg">Update</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
            <div class="col-md-6">
              <?php
              $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$exId' ORDER BY eqt_id desc");
              ?>
              <div class="main-card mb-3 card">
                <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Soal-Soal
                  Ujian
                  <span class="badge badge-pill badge-primary ml-2">
                    <?php echo $selQuest->rowCount(); ?>
                  </span>
                  <div class="btn-actions-pane-right">
                    <button class="btn btn-sm btn-primary " data-toggle="modal"
                      data-target="#modalForAddQuestion">Tambah Soal</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="scroll-area-sm" style="min-height: 400px;">
                    <div class="scrollbar-container">

                      <?php

                      if ($selQuest->rowCount() > 0) { ?>
                                  <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover"
                                      id="tableList">
                                      <thead>
                                        <tr>
                                          <th class="text-left pl-1">Nama Mata Pelajaran</th>
                                          <th class="text-center" width="20%">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        if ($selQuest->rowCount() > 0) {
                                          $i = 1;
                                          while ($selQuestionRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <tr>
                                                                  <td>
                                                                    <b><?php echo $i++; ?>                                     <?php echo $selQuestionRow['exam_question']; ?></b><br>
                                                                    <?php
                                                                    // Choice A
                                                                    if ($selQuestionRow['exam_ch1'] == $selQuestionRow['exam_answer']) { ?>
                                                                                <span class="pl-4 text-success">A -
                                                                                  <?php echo $selQuestionRow['exam_ch1']; ?></span><br>
                                                                    <?php } else { ?>
                                                                                <span class="pl-4">A - <?php echo $selQuestionRow['exam_ch1']; ?></span><br>
                                                                    <?php }

                                                                    // Choice B
                                                                    if ($selQuestionRow['exam_ch2'] == $selQuestionRow['exam_answer']) { ?>
                                                                                <span class="pl-4 text-success">B -
                                                                                  <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                                    <?php } else { ?>
                                                                                <span class="pl-4">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                                    <?php }

                                                                    // Choice C
                                                                    if ($selQuestionRow['exam_ch3'] == $selQuestionRow['exam_answer']) { ?>
                                                                                <span class="pl-4 text-success">C -
                                                                                  <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                                    <?php } else { ?>
                                                                                <span class="pl-4">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                                    <?php }

                                                                    // Choice D
                                                                    if ($selQuestionRow['exam_ch4'] == $selQuestionRow['exam_answer']) { ?>
                                                                                <span class="pl-4 text-success">D -
                                                                                  <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                                    <?php } else { ?>
                                                                                <span class="pl-4">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                                    <?php } ?>
                                                                  </td>
                                                                  <td class="text-center">
                                                                    <a rel="facebox"
                                                                      href="facebox_modal/updateQuestion.php?id=<?php echo $selQuestionRow['eqt_id']; ?>"
                                                                      class="btn btn-sm btn-primary">Update</a>
                                                                    <button type="button" id="deleteQuestion"
                                                                      data-id='<?php echo $selQuestionRow['eqt_id']; ?>'
                                                                      class="btn btn-danger btn-sm">Delete</button>
                                                                  </td>
                                                                </tr>
                                                    <?php }
                                        } else { ?>
                                                    <tr>
                                                      <td colspan="2">
                                                        <h3 class="p-3">Mata Pelajaran tidak ditemukan</h3>
                                                      </td>
                                                    </tr>
                                        <?php }
                                        ?>
                                      </tbody>
                                    </table>
                                  </div>
                      <?php } else { ?>
                                  <h4 class="text-primary">Soal tidak ditemukan...</h4>
                                  <?php
                      }
                      ?>
                    </div>
                  </div>


                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>



    <!-- FOOTER -->
    <?php include ("includes/footer.php"); ?>

    <?php include ("includes/modals.php"); ?>