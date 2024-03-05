
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

    <!-- Main content -->
    <div class="container">
        <h1>Thêm Chấm Công</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã chấm công	</td>
                    <td><input readonly type="text" name="maChamCong" id="maChamCong" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Mã nhân viên</td>
                    <td><input type="text" name="maNV" id="maNV" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Tháng - năm </td>
                    <td><input type="text" name="Thang_Nam" id="Thang_Nam" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Công chuẩn </td>
                    <td><input type="text" name="ngayCongChuan" id="ngayCongChuan" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Số ngày làm </td>
                    <td><input type="text" name="soNgayLam" id="soNgayLam" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Số ngày nghỉ có phép </td>
                    <td><input type="text" name="soNgayNghiCoPhep" id="soNgayNghiCoPhep" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Số ngày nghỉ không phép </td>
                    <td><input type="text" name="soNgayNghiKhongPhep" id="soNgayNghiKhongPhep" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Lí do nghỉ (nếu có) </td>
                    <td><input type="text" name="liDoNghi" id="liDoNghi" class="form-control" /></td>
                </tr>
             
                <tr>
                    <td colspan="2">
                     <button name="btnSaveBCC" class="btn btn-primary" ><i class="fas fa-save"></i>   Lưu dữ liệu  </button> </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
<?php
if ( isset($_POST['btnSaveBCC']) ) {
        
   
    $maChamCong = $_POST['maChamCong'];
    $maNV = $_POST['maNV'];
    $Thang_Nam = $_POST['Thang_Nam'];
    $ngayCongChuan = $_POST['ngayCongChuan'];
    $soNgayLam = $_POST['soNgayLam'];
    $soNgayNghiCoPhep = $_POST['soNgayNghiCoPhep'];
    $soNgayNghiKhongPhep = $_POST['soNgayNghiKhongPhep'];
    $liDoNghi = $_POST['liDoNghi'];
    $sqlInsert = <<<EOT
    INSERT INTO bangchamcong (maChamCong, maNV, Thang_Nam, ngayCongChuan, soNgayLam, soNgayNghiCoPhep, 
    soNgayNghiKhongPhep, liDoNghi ) 
    VALUES ('$maChamCong','$maNV','$Thang_Nam','$ngayCongChuan','$soNgayLam','$soNgayNghiCoPhep',
    '$soNgayNghiKhongPhep','$liDoNghi')
EOT;
mysqli_query($conn, $sqlInsert);

        // Đóng kết nối
        mysqli_close($conn);
        ob_start();
        header('location:http://localhost:8080/aaa/chamcong.php');
        ob_end_flush();
}

?>