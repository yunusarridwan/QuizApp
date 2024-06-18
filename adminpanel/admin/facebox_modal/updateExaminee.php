<?php
include ("../../../conn.php");
$id = $_GET['id'];

$selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$id' ")->fetch(PDO::FETCH_ASSOC);

?>

<fieldset style="width:543px;">
   <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update <b>(
            <?php echo strtoupper($selExmne['exmne_fullname']); ?> )</b></i></legend>
   <div class="col-md-12 mt-4">
      <form method="post" id="updateExamineeFrm">
         <div class="form-group">
            <legend>Nama Lengkap</legend>
            <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
            <input type="" name="exFullname" class="form-control" required=""
               value="<?php echo $selExmne['exmne_fullname']; ?>">
         </div>

         <div class="form-group">
            <legend>Jenis Kelamin</legend>
            <select class="form-control" name="exGender">
               <option value="<?php echo $selExmne['exmne_gender']; ?>"><?php echo $selExmne['exmne_gender']; ?>
               </option>
               <option value="male">Male</option>
               <option value="female">Female</option>
            </select>
         </div>

         <div class="form-group">
            <legend>Tanggal Lahir</legend>
            <input type="date" name="exBdate" class="form-control" required=""
               value="<?php echo date('Y-m-d', strtotime($selExmne["exmne_birthdate"])) ?>" />
         </div>

         <div class="form-group">
            <legend>Asal Sekolah</legend>
            <input type="" name="sekolah" class="form-control" required=""
               value="<?php echo $selExmne['exmne_school']; ?>">
         </div>

         <div class="form-group">
            <legend>Mata Pelajaran(s)</legend>
            <select class="form-control" name="exCourse[]" id="exCourse" multiple required="">
               <?php
               $selCourse = $conn->query("SELECT * FROM course_tbl");
               while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                       <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
               <?php } ?>
            </select>
         </div>

         <div class="form-group" id="examContainer" style="display: none;">
            <legend>Ujian</legend>
            <div id="examList">
               <!-- Exam checkboxes will be loaded here -->
            </div>
         </div>

         <script>
    $(document).ready(function () {
        $('#exCourse').SumoSelect({
            placeholder: 'Select Courses',
            selectAll: true,
            captionFormat: '{0} Courses Selected',
            captionFormatAllSelected: 'All Courses Selected',
            okCancelInMulti: true,
            search: true,
            triggerChangeCombined: false
        });

        $('#exCourse').on('change', function () {
            var courseIds = $(this).val();
            if (courseIds.length > 0) {
                loadExams(courseIds);
            } else {
                $('#examContainer').hide();
            }
        });

        function loadExams(courseIds) {
            $.ajax({
                url: 'query/get_exams.php',
                type: 'POST',
                data: {course_ids: courseIds},
                success: function (response) {
                    $('#examList').html(response);
                    $('#examContainer').show();
                },
                error: function () {
                    console.log('Error occurred while fetching exams.');
                }
            });
        }
    });
</script>


         <div class="form-group">
            <legend>Tingkat Pendidikan</legend>
            <select class="form-control" name="exYrlvl" id="year_level">
               <option value="<?php echo $selExmne['exmne_year_level']; ?>"><?php echo $selExmne['exmne_year_level']; ?>
               </option>
               <option value="sd">SD</option>
               <option value="smp">SMP</option>
               <option value="sma">SMA</option>
               <option value="kuliah">Kuliah</option>
            </select>
         </div>

         <div class="form-group">
            <legend>Email</legend>
            <input type="" name="exEmail" class="form-control" required=""
               value="<?php echo $selExmne['exmne_email']; ?>">
         </div>

         <div class="form-group">
            <legend>Password</legend>
            <input type="" name="exPass" class="form-control" required=""
               value="<?php echo $selExmne['exmne_password']; ?>">
         </div>

         <div class="form-group">
            <legend>Status</legend>
            <input type="hidden" name="course_id" value="<?php echo $id; ?>">
            <select class="form-control" name="newCourseName" id="year_level">
               <option value="active">Active</option>
               <option value="deactive">Deactive</option>
            </select>
         </div>

         <div class="form-group" align="right">
            <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
         </div>
      </form>
   </div>
</fieldset>