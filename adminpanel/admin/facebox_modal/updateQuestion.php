
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selCourse = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Soal Ujian</i></legend>
  
  <div class="col-md-12 mt-4">
    <form method="post" id="updateQuestionFrm">
      <div class="form-group">
        <legend>Pertanyaan</legend>
        <input type="hidden" name="question_id" value="<?php echo $id; ?>">
        <textarea name="question" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
      </div>

      <div class="form-group">
        <legend>Pilihan A</legend>
        <input type="" name="choice_A" id="choice_A" value="<?php echo $selCourse['exam_ch1']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Pilihan B</legend>
        <input type="" name="choice_B" id="choice_B" value="<?php echo $selCourse['exam_ch2']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Pilihan C</legend>
        <input type="" name="choice_C" id="choice_C" value="<?php echo $selCourse['exam_ch3']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Pilihan D</legend>
        <input type="" name="choice_D" id="choice_D" value="<?php echo $selCourse['exam_ch4']; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="correctAnswer">Jawaban yang Benar</label>
        <select name="correctAnswer" id="correctAnswer" class="form-control">
          <option value="<?php echo $selCourse['exam_ch1']; ?>">Choice_A</option>
          <option value="<?php echo $selCourse['exam_ch2']; ?>">Choice_B</option>
          <option value="<?php echo $selCourse['exam_ch3']; ?>">Choice_C</option>
          <option value="<?php echo $selCourse['exam_ch4']; ?>">Choice_D</option>
        </select>
      </div>
      
      <script>
          // Mengambil elemen-elemen input
          const choiceA = document.getElementById('choice_A');
          const choiceB = document.getElementById('choice_B');
          const choiceC = document.getElementById('choice_C');
          const choiceD = document.getElementById('choice_D');
          const correctAnswerSelect = document.getElementById('correctAnswer');

          // Fungsi untuk memperbarui nilai "Correct Answer" saat halaman dimuat
          window.addEventListener('DOMContentLoaded', updateCorrectAnswerOptions);

          // Fungsi untuk memperbarui nilai "Correct Answer" saat halaman dimuat atau nilai Choice berubah
          function updateCorrectAnswerOptions() {
              correctAnswerSelect.innerHTML = ''; // Menghapus semua opsi sebelum menambahkan yang baru

              // Menambahkan opsi baru berdasarkan nilai dari setiap choice
              const choices = [choiceA, choiceB, choiceC, choiceD];
              choices.forEach(choice => {
                  if (choice.value.trim() !== '') {
                      const option = document.createElement('option');
                      option.value = choice.value;
                      option.textContent = choice.id;
                      correctAnswerSelect.appendChild(option);
                  }
              });
          }
      </script>

      <div class="form-group" align="right">
        <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
      </div>
    </form>
  </div>
</fieldset>







