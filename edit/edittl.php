
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
$sqlSelect = "SELECT * FROM tinhluong WHERE maTL=$id;";
$resultSelect = mysqli_query($conn, $sqlSelect);
 $tinhluongRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($tinhluongRow)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }   

    ?>
    <!-- Main content -->
    <div class="container">
        <h1>Sửa Kết Lương</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã Tính Lương</td>
                    <td><input readonly type="text" name="maTL" id="maTL" class="form-control"value="<?php echo $tinhluongRow['maTL'] ?>" /></td>
                </tr>
                <tr>
                    <td>Mã nhân viên</td>
                    <td><input type="text" name="maNV" id="maNV" class="form-control" value="<?php echo $tinhluongRow['maNV'] ?>"/></td>
                </tr>
                <tr>
                    <td>Tên bộ phận	 </td>
                    <td><input type="text" name="tenBoPhan" id="tenBoPhan" class="form-control"value="<?php echo $tinhluongRow['tenBoPhan'] ?>" /></td>
                </tr>
                <tr>
                    <td>Tên chức vụ	 </td>
                    <td><input type="text" name="tenChucVu" id="tenChucVu" class="form-control"value="<?php echo $tinhluongRow['tenChucVu'] ?>" /></td>
                </tr>
                <tr>
                    <td>Lương </td>
                    <td><input type="text" name="soLuong" id="soLuong" class="form-control" value="<?php echo $tinhluongRow['soLuong'] ?>"/></td>
                </tr>
                <tr>
                    <td>Phụ cấp	 </td>
                    <td><input type="text" name="soTien" id="soTien" class="form-control" value="<?php echo $tinhluongRow['soTien'] ?>"/></td>
                </tr>
                <tr>
                    <td>Công chuẩn </td>
                    <td><input type="text" name="ngayCongChuan" id="ngayCongChuan" class="form-control" value="<?php echo $tinhluongRow['ngayCongChuan'] ?>"/></td>
                </tr>
                <tr>
                    <td>Số ngày làm </td>
                    <td><input type="text" name="soNgayLam" id="soNgayLam" class="form-control" value="<?php echo $tinhluongRow['soNgayLam'] ?>"/></td>
                </tr>
                <tr>
                    <td>Số ngày nghỉ không phép </td>
                    <td><input type="text" name="soNgayNghiKhongPhep" id="soNgayNghiKhongPhep" class="form-control"value="<?php echo $tinhluongRow['soNgayNghiKhongPhep'] ?>" /></td>
                </tr>
             
                <tr>
                    <td colspan="2">
                     <button name="btnSaveTL" class="btn btn-primary" ><i class="fas fa-save"></i>   Lưu dữ liệu  </button> </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
<?php
if ( isset($_POST['btnSaveTL']) ) {
        
   
    $maTL = $_POST['maTL'];
    $maNV = $_POST['maNV'];
    $tenBoPhan = $_POST['tenBoPhan'];
    $tenChucVu = $_POST['tenChucVu'];
    $soLuong = $_POST['soLuong'];
    $soTien = $_POST['soTien'];
    $ngayCongChuan = $_POST['ngayCongChuan'];
    $soNgayLam = $_POST['soNgayLam'];
    $soNgayNghiKhongPhep = $_POST['soNgayNghiKhongPhep'];
   
   $sql = "UPDATE tinhluong SET maTL='$maTL', maNV='$maNV', tenBoPhan='$tenBoPhan'
    , tenChucVu='$tenChucVu', soLuong='$soLuong', soTien='$soTien', ngayCongChuan='$ngayCongChuan', soNgayLam='$soNgayLam',
    soNgayNghiKhongPhep='$soNgayNghiKhongPhep' WHERE maTL=$id; ";
    
        mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn);
        ob_start();
        header('location:http://localhost:8080/aaa/tinhluong.php');
        ob_end_flush();
}

?>