
<?php $servername = "localhost";
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
$sqlSelect = "SELECT * FROM bangchamcong WHERE maChamCong=$id;";
$resultSelect = mysqli_query($conn, $sqlSelect);
 $nhanvienRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($nhanvienRow)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }   

    ?>

    <!-- Main content -->
    <div class="container">
        <h1>Sửa Chấm Công</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã chấm công</td>
                    <td><input  type="text" name="maChamCong" id="maChamCong" class="form-control" value="<?php echo $nhanvienRow['maChamCong'] ?>"   /></td>
                </tr>
                <tr>
                    <td>Mã nhân viên</td>
                    <td><input type="text" name="maNV" id="maNV" class="form-control"value="<?php echo $nhanvienRow['maNV'] ?>" /></td>
                </tr>
                <tr>
                    <td>Tháng - năm </td>
                    <td><input type="text" name="Thang_Nam" id="Thang_Nam" class="form-control" value="<?php echo $nhanvienRow['Thang_Nam'] ?>"/></td>
                </tr>
                <tr>
                    <td>Ngày công</td>
                    <td><input type="text" name="ngayCongChuan" id="ngayCongChuan" class="form-control" value="<?php echo $nhanvienRow['ngayCongChuan'] ?>"/></td>
                </tr>
                <tr>
                    <td>Số ngày làm</td>
                    <td><input type="text" name="soNgayLam" id="soNgayLam" class="form-control"value="<?php echo $nhanvienRow['soNgayLam'] ?>" /></td>
                </tr>
                <tr>
                    <td>Số ngày nghỉ có phép</td>
                    <td><input type="text" name="soNgayNghiCoPhep" id="soNgayNghiCoPhep" class="form-control" value="<?php echo $nhanvienRow['soNgayNghiCoPhep'] ?>"/></td>
                </tr>
                <tr>
                    <td>Số ngày nghỉ không phép</td>
                    <td><input type="text" name="soNgayNghiKhongPhep" id="soNgayNghiKhongPhep" class="form-control"value="<?php echo $nhanvienRow['soNgayNghiKhongPhep'] ?>" /></td>
                </tr>
                <tr>
                    <td>Lí do (nếu có)</td>
                    <td><input type="text" name="liDoNghi" id="liDoNghi" class="form-control"value="<?php echo $nhanvienRow['liDoNghi'] ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button  name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                    </td>
                    </a>        
                </tr>
            </table>
        </form>
    </div>
    
<?php 
if ( isset($_POST['btnSave']) ) { 
   
    $maChamCong = $_POST['maChamCong'];
    $maNV = $_POST['maNV'];
    $Thang_Nam = $_POST['Thang_Nam'];
    $ngayCongChuan = $_POST['ngayCongChuan'];
    $soNgayLam = $_POST['soNgayLam'];
    $soNgayNghiCoPhep = $_POST['soNgayNghiCoPhep'];
    $soNgayNghiKhongPhep = $_POST['soNgayNghiKhongPhep'];
    $liDoNghi = $_POST['liDoNghi'];
   
    
    
   $sql = "UPDATE bangchamcong SET maChamCong='$maChamCong', maNV='$maNV', Thang_Nam='$Thang_Nam'
   , ngayCongChuan='$ngayCongChuan', soNgayLam='$soNgayLam', soNgayNghiCoPhep='$soNgayNghiCoPhep', soNgayNghiKhongPhep='$soNgayNghiKhongPhep', liDoNghi='$liDoNghi' WHERE maChamCong=$id; ";
   
        mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn); 
        ob_start();
        header('location:http://localhost:8080/aaa/chamcong.php');
        ob_end_flush();
} 
?>
