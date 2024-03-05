
<?php        ob_start();
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "ql_ns"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Liên kết CSS Bootstrap bằng CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<?php 
$id = $_GET['id'];
$sqlSelect = "SELECT * FROM taikhoan WHERE maTK=$id;";
$resultSelect = mysqli_query($conn, $sqlSelect);
 $taikhoanRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($taikhoanRow)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }   

    ?>
    <!-- Main content -->
    <div class="container">
        <h1>Sửa Tài Khoản</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>ID Tài Khoản</td>
                    <td><input type="text" name="maTK" id="maTK" class="form-control" value="<?php echo $taikhoanRow['maTK'] ?>"/></td>
                </tr>
                <tr>
                    <td>Họ và Tên Nhân Viên</td>
                    <td><input type="text" name="HovaTen" id="HovaTen" class="form-control" value="<?php echo $taikhoanRow['HovaTen'] ?>"/></td>
                </tr>
                <tr>
                    <td>Tên Tài Khoản </td>
                    <td><input type="text" name="tenTaiKhoan" id="tenTaiKhoan" class="form-control" value="<?php echo $taikhoanRow['tenTaiKhoan'] ?>"/></td>
                </tr>
                <tr>
                    <td>Mật Khẩu </td>
                    <td><input type="text" name="MatKhau" id="MatKhau" class="form-control"value="<?php echo $taikhoanRow['MatKhau'] ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                  
                     <button name="btnSaveTK" class="btn btn-primary" ><i class="fas fa-save"></i>   Lưu dữ liệu  </button> </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    

    <?php 
if ( isset($_POST['btnSaveTK']) ) { 
   
    $maTK = $_POST['maTK'];
    $HovaTen = $_POST['HovaTen'];
    $tenTaiKhoan = $_POST['tenTaiKhoan'];
    $MatKhau = $_POST['MatKhau'];
   
   $sql = "UPDATE taikhoan SET maTK='$maTK', HovaTen='$HovaTen', tenTaiKhoan='$tenTaiKhoan'
   , MatKhau='$MatKhau' WHERE maTK=$id; ";
   
        mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn); 
        ob_start();
        header('location:http://localhost:8080/aaa/taikhoan.php');
        ob_end_flush();
} 
?>