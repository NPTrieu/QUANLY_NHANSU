
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
$sqlSelect = "SELECT * FROM luong WHERE maLuong=$id;";
$resultSelect = mysqli_query($conn, $sqlSelect);
 $luongRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($luongRow)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }   

    ?>
    <!-- Main content -->
    <div class="container">
        <h1>Thêm Bảng Lương</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã Lương</td>
                    <td><input type="text" name="maLuong" id="maLuong" class="form-control"  value="<?php echo $luongRow['maLuong'] ?>"/></td>
                </tr>
                <tr>
                    <td>Tên Bộ Phận</td>
                    <td><input type="text" name="tenBoPhan" id="tenBoPhan" class="form-control"  value="<?php echo $luongRow['tenBoPhan'] ?>"/></td>
                </tr>
                <tr>
                    <td>Tên Chức vụ </td>
                    <td><input type="text" name="tenChucVu" id="tenChucVu" class="form-control" value="<?php echo $luongRow['tenChucVu'] ?>" /></td>
                </tr>
                <tr>
                    <td>Số Lương </td>
                    <td><input type="text" name="soLuong" id="soLuong" class="form-control" value="<?php echo $luongRow['soLuong'] ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                  
                     <button name="btnSaveBL" class="btn btn-primary" ><i class="fas fa-save"></i>   Lưu dữ liệu  </button> </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
<?php
if ( isset($_POST['btnSaveBL']) ) {
        
   
    $maLuong = $_POST['maLuong'];
    $tenBoPhan = $_POST['tenBoPhan'];
    $tenChucVu = $_POST['tenChucVu'];
    $soLuong = $_POST['soLuong'];
    
    $sql = "UPDATE luong SET maLuong='$maLuong', tenBoPhan='$tenBoPhan', tenChucVu='$tenChucVu'
    , soLuong='$soLuong' WHERE maLuong=$id; ";
    
mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn);
        ob_start();
        header('location:http://localhost:8080/aaa/luong.php');
        ob_end_flush();
}

?>