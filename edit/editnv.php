
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
$sqlSelect = "SELECT * FROM nhanvien WHERE maNV=$id;";
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
        <h1>Sửa Nhân Viên</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã Nhân viên</td>
                    <td><input  type="text" name="maNV" id="maNV" class="form-control" value="<?php echo $nhanvienRow['maNV'] ?>"   /></td>
                </tr>
                <tr>
                    <td>Tên bộ phận</td>
                    <td><input type="text" name="tenBoPhan" id="tenBoPhan" class="form-control"value="<?php echo $nhanvienRow['tenBoPhan'] ?>" /></td>
                </tr>
                <tr>
                    <td>Mã bảo hiểm </td>
                    <td><input type="text" name="maBH" id="maBH" class="form-control" value="<?php echo $nhanvienRow['maBH'] ?>"/></td>
                </tr>
                <tr>
                    <td>Chức vụ</td>
                    <td><input type="text" name="tenChucVu" id="tenChucVu" class="form-control" value="<?php echo $nhanvienRow['tenChucVu'] ?>"/></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>
                    <td><input type="text" name="HovaTen" id="HovaTen" class="form-control"value="<?php echo $nhanvienRow['HovaTen'] ?>" /></td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td><input type="text" name="Gioitinh" id="Gioitinh" class="form-control" value="<?php echo $nhanvienRow['Gioitinh'] ?>"/></td>
                </tr>
                <tr>
                    <td>SĐT</td>
                    <td><input type="text" name="SDT" id="SDT" class="form-control"value="<?php echo $nhanvienRow['SDT'] ?>" /></td>
                </tr>
                <tr>
                    <td>Địa Chỉ</td>
                    <td><input type="text" name="DiaChi" id="DiaChi" class="form-control"value="<?php echo $nhanvienRow['DiaChi'] ?>" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="Email" id="Email" class="form-control" value="<?php echo $nhanvienRow['Email'] ?>"/></td>
                </tr>
                <tr>
                    <td>CMND/CCCD</td>
                    <td><input type="text" name="CCCD" id="CCCD" class="form-control"value="<?php echo $nhanvienRow['CCCD'] ?>" /></td>
                </tr>
                <tr>
                    <td>Ngày cấp</td>
                    <td><input type="date" name="ngayCap" id="ngayCap" class="form-control"value="<?php echo $nhanvienRow['ngayCap'] ?>" /></td>
                </tr>
                <tr>
                    <td>Nơi cấp</td>
                    <td><input type="text" name="noiCap" id="noiCap" class="form-control"value="<?php echo $nhanvienRow['noiCap'] ?>" /></td>
                </tr>
                <tr>
                    <td>Tình trạng hôn nhân</td>
                    <td><input type="text" name="tinhTrangHonNhan" id="tinhTrangHonNhan" class="form-control"value="<?php echo $nhanvienRow['tinhTrangHonNhan'] ?>" /></td>
                </tr>
                <tr>
                    <td>Ngày vào làm</td>
                    <td><input type="date" name="ngayVaoLam" id="ngayVaoLam" class="form-control"value="<?php echo $nhanvienRow['ngayVaoLam'] ?>" /></td>
                </tr>
                <tr>
                    <td>Tình trạng</td>
                    <td><input type="text" name="tinhTrang" id="tinhTrang" class="form-control"value="<?php echo $nhanvienRow['tinhTrang'] ?>" /></td>
                </tr>
                <tr>
                    <td>Trình độ học vấn</td>
                    <td><input type="text" name="trinhDoHocVan" id="trinhDoHocVan" class="form-control" value="<?php ob_start(); echo $nhanvienRow['trinhDoHocVan']?>"/></td>
                </tr>
                <tr>
                    <td>Trình độ chuyên môn</td>
                    <td><input type="text" name="trinhDoChuyenMon" id="trinhDoChuyenMon" class="form-control" value="<?php  echo  $nhanvienRow['trinhDoChuyenMon']  ?>"/></td>
                </tr>
                <tr>
                    <td>Phụ cấp</td>
                    <td><input type="text" name="tenLoaiPhuCap" id="tenLoaiPhuCap" class="form-control" value="<?php  echo  $nhanvienRow['trinhDoChuyenMon']  ?>"/></td>
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
   
    $maNV = $_POST['maNV'];
    $tenBoPhan = $_POST['tenBoPhan'];
    $maBH = $_POST['maBH'];
    $tenChucVu = $_POST['tenChucVu'];
    $HovaTen = $_POST['HovaTen'];
    $Gioitinh = $_POST['Gioitinh'];
    $SDT = $_POST['SDT'];
    $DiaChi = $_POST['DiaChi'];
    $Email = $_POST['Email'];
    $CCCD = $_POST['CCCD'];
    $ngayCap = $_POST['ngayCap'];
    $noiCap = $_POST['noiCap'];
    $tinhTrangHonNhan = $_POST['tinhTrangHonNhan'];
    $ngayVaoLam = $_POST['ngayVaoLam'];
    $tinhTrang = $_POST['tinhTrang'];
    $trinhDoHocVan = $_POST['trinhDoHocVan'];
    $trinhDoChuyenMon = $_POST['trinhDoChuyenMon'];
    $tenLoaiPhuCap = $_POST['tenLoaiPhuCap'];
    
    
   $sql = "UPDATE nhanvien SET maNV='$maNV', tenBoPhan='$tenBoPhan', maBH='$maBH'
   , tenChucVu='$tenChucVu', HovaTen='$HovaTen', Gioitinh='$Gioitinh', SDT='$SDT', DiaChi='$DiaChi', Email='$Email', CCCD='$CCCD', ngayCap='$ngayCap', noiCap='$noiCap', tinhTrangHonNhan='$tinhTrangHonNhan',
    ngayVaoLam='$ngayVaoLam', tinhTrang='$tinhTrang', trinhDoHocVan='$trinhDoHocVan', trinhDoChuyenMon='$trinhDoChuyenMon' ,tenLoaiPhuCap='$tenLoaiPhuCap' WHERE maNV=$id; ";
   
        mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn); 
        ob_start();
        header('location:http://localhost:8080/aaa/nhanvien.php');
        ob_end_flush();
} 
?>
