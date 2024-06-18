<!-- Modal For Add Course -->
<div class="modal fade" id="modalForAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addCourseFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Mata Pelajaran</label>
              <input type="" name="course_name" id="course_name" class="form-control" placeholder="Input Course"
                required="" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Modal For Update Course -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <form class="refreshFrm" id="addCourseFrm" method="post">
      <div class="modal-content myModal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update ( <?php echo $selCourseRow['cou_name']; ?> )</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Mata Pelajaran</label>
              <input type="" name="course_name" id="course_name" class="form-control"
                value="<?php echo $selCourseRow['cou_name']; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addExamFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Ujian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Pilih Mata Pelajaran</label>
              <select class="form-control" name="courseSelected">
                <option value="0">Pilih Mata Pelajaran</option>
                <?php
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                if ($selCourse->rowCount() > 0) {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                        <?php }
                } else { ?>
                        <option value="0">Mata Pelajaran Tidak Ditemukan</option>
                <?php }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Waktu Ujian</label>
              <select class="form-control" name="timeLimit" required="">
                <option value="0">Pilih Waktu</option>
                <option value="30">30 Menit</option>
                <option value="60">1 Jam</option>
                <option value="90">1 Jam 30 Menit</option>
                <option value="120">2 Jam</option>
                <option value="150">2 Jam 30 Menit</option>
                <option value="180">3 Jam</option>
              </select>
            </div>

            <div class="form-group">
              <label>Batas Banyak Soal</label>
              <input type="number" name="examQuestDipLimit" id="" class="form-control"
                placeholder="Input question limit to display">
            </div>

            <div class="form-group">
              <label>Judul Ujian</label>
              <input type="" name="examTitle" class="form-control" placeholder="Input Exam Title" required="">
            </div>

            <div class="form-group">
              <label>Deskripsi Ujian</label>
              <textarea name="examDesc" class="form-control" rows="4" placeholder="Input Exam Description"
                required=""></textarea>
            </div>


          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Modal For Add Examinee -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addExamineeFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="" name="fullname" id="fullname" class="form-control" placeholder="Input Fullname"
                autocomplete="off" required="">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Input Birhdate"
                autocomplete="off">
            </div>
            <div class="form-group">
              <label>Asal Sekolah</label>
              <input type="" name="sekolah" id="sekolah" class="form-control" placeholder="Input Asal Sekolah"
                autocomplete="off" required="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="gender" id="gender">
                <option value="0">Pilih Jenis Kelamin</option>
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Mata Pelajaran</label><br>
              <select class="form-control" name="course[]" id="course" multiple>
                <?php
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                <?php }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Ujian</label>
              <div id="exam-container"></div>
              <!-- Exams will be loaded here via AJAX -->
            </div>

            <script>
              $(document).ready(function () {
                $('#course').SumoSelect({
                  placeholder: 'Pilih Mata Pelajaran',
                  selectAll: true,
                  captionFormat: '{0} Selected',
                  captionFormatAllSelected: 'All Selected',
                  okCancelInMulti: true,
                  selectAllText: 'Select All',
                  csvDispCount: 2
                });

                $('#course').change(function () {
                  var selectedCourses = $(this).val();

                  $.ajax({
                    url: 'query/get_exams.php',
                    type: 'POST',
                    data: {
                      course_ids: selectedCourses
                    },
                    success: function (response) {
                      $('#exam-container').html(response);
                    }
                  });
                });
              });
            </script>

            <div class="form-group">
              <label>Tingkat Pendidikan</label>
              <select class="form-control" name="year_level" id="year_level">
                <option value="0">Pilih Tingkat Pendidikan</option>
                <option value="sd">SD</option>
                <option value="smp">SMP</option>
                <option value="sma">SMA</option>
                <option value="kuliah">Kuliah</option>
              </select>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Input Email"
                autocomplete="off" required="">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Input Password"
                autocomplete="off" required="">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
    </form>
  </div>
</div>



<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addQuestionFrm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Soal<br>
            <?php echo $selExamRow['ex_title']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="refreshFrm" method="post" id="addQuestionFrm">
          <div class="modal-body">
            <div class="col-md-12">
              <div class="form-group">
                <label>Pertanyaan</label>
                <textarea name="question" id="course_name" class="form-control" placeholder="Input question"
                  autocomplete="off"></textarea>
                <input type="hidden" name="examId" value="<?php echo $exId; ?>">
              </div>

              <fieldset>
                <legend>Masukkan Pilihan Jawaban</legend>
                <div class="form-group">
                  <label>Pilihan A</label>
                  <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Input choice A"
                    autocomplete="off">
                </div>

                <div class="form-group">
                  <label>Pilihan B</label>
                  <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Input choice B"
                    autocomplete="off">
                </div>

                <div class="form-group">
                  <label>Pilihan C</label>
                  <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Input choice C"
                    autocomplete="off">
                </div>

                <div class="form-group">
                  <label>Pilihan D</label>
                  <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Input choice D"
                    autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="correctAnswer">Jawaban yang Benar</label>
                  <select name="correctAnswer" id="correctAnswer" class="form-control">
                    <option value="">Pilihan Jawaban yang Benar</option>
                  </select>
                </div>

                <script>
                  // Mengambil elemen-elemen input
                  const choiceA = document.getElementById('choice_A');
                  const choiceB = document.getElementById('choice_B');
                  const choiceC = document.getElementById('choice_C');
                  const choiceD = document.getElementById('choice_D');
                  const correctAnswerSelect = document.getElementById('correctAnswer');

                  // Menambahkan event listener ke setiap elemen input choice
                  [choiceA, choiceB, choiceC, choiceD].forEach(choice => {
                    choice.addEventListener('input', updateCorrectAnswerOptions);
                  });

                  // Fungsi untuk memperbarui pilihan "Correct Answer" saat nilai Choice berubah
                  function updateCorrectAnswerOptions() {
                    correctAnswerSelect.innerHTML = ''; // Menghapus semua opsi sebelum menambahkan yang baru

                    // Menambahkan opsi baru berdasarkan nilai dari setiap choice
                    [choiceA, choiceB, choiceC, choiceD].forEach(choice => {
                      if (choice.value.trim() !== '') {
                        const option = document.createElement('option');
                        option.value = choice.value;
                        option.textContent = choice.id;
                        correctAnswerSelect.appendChild(option);
                      }
                    });

                    // Menambahkan opsi default
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Select correct answer';
                    correctAnswerSelect.insertBefore(defaultOption, correctAnswerSelect.firstChild);
                  }
                </script>
              </fieldset>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </form>
  </div>
</div>