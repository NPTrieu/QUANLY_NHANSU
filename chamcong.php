<?php $servername = "localhost";
$username = "root";
$password = "";
$dbname = "ql_ns"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['tendangnhap'])) {
	 header('Location: signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chấm Công</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


    <?php include "sidebar.php" ?>


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
          <?php include "view-head-foot/header.php" ?>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Danh Sách Chấm Công</h6>
                        <a href="add/addbcc.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm mới
        </a>
                    </div>
          

                    <div class="table-responsive">
          
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
              
                                <tr class="text-dark">
                          
                                
                                    <th scope="col">Mã chấm công</th>
									 <th scope="col">Mã nhân viên</th>
                                    <th scope="col">Tháng - năm</th>
                                    <th scope="col">Công chuẩn</th>
                                    <th scope="col">Số ngày làm</th>
                                    <th scope="col">Số ngày nghỉ có phép</th>
                                    <th scope="col">Số ngày nghỉ không phép</th>
                                    <th scope="col">Lí do nghỉ (nếu có)</th>
                                    <th scope="col">Hành động</th>
				
                                </tr>
                            </thead>
                            <tbody>
								<?php 
							
									
								$sql = "SELECT * FROM bangchamcong";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									
									// output dữ liệu trên trang
									while($row = $result->fetch_assoc()) { ?>
                             <tr>
                               
                                   
                                    <td><?php echo "C".$row["maChamCong"] ?></td>
                                    <td><?php echo "NV".$row["maNV"] ?></td>
                                    <td><?php echo $row["Thang_Nam"] ?></td>
                                    <td><?php echo $row["ngayCongChuan"] ?></td>
                                    <td><?php echo $row["soNgayLam"] ?></td>
                                    <td><?php echo $row["soNgayNghiCoPhep"] ?></td>
                                    <td><?php echo $row["soNgayNghiKhongPhep"] ?></td>
                                    <td><?php echo $row["liDoNghi"] ?></td>
                                    <td>
                            <!-- Button Sửa -->
                            <a href="edit/editbcc.php?id=<?php echo $row['maChamCong']; ?>" id="btnUpdate" class="btn btn-primary">
                            <i class="fas fa-edit">Sửa</i>
                        </a>

                            <!-- Button Xóa -->
                            <a href="delete/deletebcc.php?id=<?php echo $row['maChamCong']; ?>" id="btnDelete" class="btn btn-danger">
                            <i class="fas fa-trash-alt">Xoá</i>
                        </a>
                        </td>
                                </tr>
                             
                                <tr>
                             <?php 
								 } 
								}
								
									?>
                           </tr>
                     
                     
                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <!-- Footer Start -->
            <?php include "view-head-foot/footer.php" ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>