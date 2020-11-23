 <!-- Nav Bar Start -->
 <div class="nav">
     <div class="container-fluid">
         <nav class="navbar navbar-expand-lg navbar-light bg-info">
             <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                 <div class="navbar-nav mr-auto">
                     <a href="index.php" class="nav-item nav-link">หน้าแรก</a>
                     <a href="contact.php" class="nav-item nav-link active">ติดต่อ</a>
                 </div>
             </div>
             <?php
                if ($ID == '') {
                ?>
                 <div class="navbar-nav ml-auto">
                     <div class="nav-item dropdown">
                         <a href="login.php" class="nav-link">เข้าสู่ระบบ</a>
                     </div>
                 </div>
             <?php
                } else {
                ?>

                 <div class="navbar-nav ml-auto">
                     <div class="nav-item dropdown">
                         <a href="backend/admin.php" class="nav-link">จัดการหลังบ้าน</a>
                     </div>
                 </div>
                 <div class="navbar-nav ml-auto">
                     <div class="nav-item dropdown">
                         <a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?')" class="nav-link">ออกจากระบบ</a>
                     </div>
                 </div>
             <?php } ?>
     </div>
 </div>
 </nav>
 </div>
 </div>
 <!-- Nav Bar End -->