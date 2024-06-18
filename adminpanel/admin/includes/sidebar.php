   <div class="app-sidebar sidebar-shadow">
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
       <div class="scrollbar-sidebar" style="background:#343a3f;">
           <div class="app-sidebar__inner">
               <ul class="vertical-nav-menu">
                   <li class="app-sidebar__heading"><a href="home.php">Dashboards</a></li>

                   <li class="app-sidebar__heading">Kelola Mata Pelajaran</li>
                   <li>
                       <a href="#">
                           <i class="metismenu-icon pe-7s-display2"></i>
                           Mata Pelajaran
                           <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                       </a>
                       <ul>
                           <li>
                               <a href="#" data-toggle="modal" data-target="#modalForAddCourse">
                                   <i class="metismenu-icon"></i>
                                   Tambah Mata Pelajaran
                               </a>
                           </li>
                           <li>
                               <a href="home.php?page=manage-course">
                                   <i class="metismenu-icon">
                                   </i>Kelola Mata Pelajaran
                               </a>
                           </li>

                       </ul>
                   </li>

                   <li class="app-sidebar__heading">Kelola Ujian</li>
                   <li>
                       <a href="#">
                           <i class="metismenu-icon pe-7s-display2"></i>
                           Ujian
                           <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                       </a>
                       <ul>
                           <li>
                               <a href="#" data-toggle="modal" data-target="#modalForExam">
                                   <i class="metismenu-icon"></i>
                                   Tambah Ujian
                               </a>
                           </li>
                           <li>
                               <a href="home.php?page=manage-exam">
                                   <i class="metismenu-icon">
                                   </i>Kelola Ujian
                               </a>
                           </li>
                       </ul>
                   </li>


                   <li class="app-sidebar__heading">Kelola Siswa</li>
                   <li>
                       <a href="#">
                           <i class="metismenu-icon pe-7s-display2"></i>
                           Siswa
                           <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                       </a>
                       <ul>
                           <li>
                               <a href="" data-toggle="modal" data-target="#modalForAddExaminee">
                                   <i class="metismenu-icon pe-7s-add-user">
                                   </i>Tambah Siswa
                               </a>
                           </li>
                           <li>
                               <a href="home.php?page=manage-examinee">
                                   <i class="metismenu-icon pe-7s-users">
                                   </i>Kelola Siswa
                               </a>
                           </li>
                       </ul>
                   </li>

                   <li class="app-sidebar__heading">Laporan</li>
                   <li>
                       <a href="home.php?page=examinee-result">
                           <i class="metismenu-icon pe-7s-cup">
                           </i>Hasil Ujian
                       </a>
                   </li>

               </ul>
           </div>
       </div>
   </div>