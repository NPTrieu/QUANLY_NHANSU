
<!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="nhanvien.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Hiragi</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/Last_Day.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php if (isset($_SESSION['tendangnhap'])) {
	 echo $_SESSION['tendangnhap']; } ?></h6>
                  
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <div class="nav-item dropdown">
                        <a href="nhanvien.php" class="nav-item nav-link"><i class="bi bi-people-fill"></i>Nhân Viên</a>
      
          
              
                    </div>
                    <a href="bophan.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Bộ phận</a>
                    <a href="chamcong.php" class="nav-item nav-link"><i class="bi bi-calendar-check"></i>Chấm công</a>
                    <a href="baohiem.php" class="nav-item nav-link"><i class="fa fa-heartbeat" aria-hidden="true"></i>Bảo hiểm</a>
                    <a href="taikhoan.php"  class="nav-item nav-link"><i class="fa fa-universal-access" aria-hidden="true"></i>Tài khoản</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Thêm</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="luong.php" class="dropdown-item">Bảng lương</a>
                            <a href="chucvu.php" class="dropdown-item">Bảng chức vụ</a>
                            <a href="phucap.php" class="dropdown-item">Danh Sách Phụ Cấp</a>
                            <a href="tinhluong.php" class="dropdown-item">Tính Lương</a>
                           
                        </div>
                 
                    </div>
                </div>
            </nav>
        </div>
