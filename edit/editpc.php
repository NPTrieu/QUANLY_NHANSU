
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
$sqlSelect = "SELECT * FROM phucap WHERE maPhuCap=$id;";
$resultSelect = mysqli_query($conn, $sqlSelect);
 $phucapRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($phucapRow)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }   

    ?>
    <!-- Main content -->
    <div class="container">
        <h1>Sửa Phụ Cấp</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã phụ cấp</td>
                    <td><input  type="text" name="maPhuCap" id="maPhuCap" class="form-control" value="<?php echo $phucapRow['maPhuCap'] ?>"/></td>
                </tr>
                <tr>
                    <td>Tên phụ cấp</td>
                    <td><input type="text" name="tenLoaiPhuCap" id="tenLoaiPhuCap" class="form-control" value="<?php echo $phucapRow['tenLoaiPhuCap'] ?>"/></td>
                </tr>
                <tr>
                    <td>Số tiền </td>
                    <td><input type="text" name="soTien" id="soTien" class="form-control" value="<?php echo $phucapRow['soTien'] ?>"/></td>
                </tr>
              
                <tr>
                    <td colspan="2">
                  
                     <button name="btnSavePC" class="btn btn-primary" ><i class="fas fa-save"></i>   Lưu dữ liệu  </button> </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
<?php
if ( isset($_POST['btnSavePC']) ) {
        
   
    $maPhuCap = $_POST['maPhuCap'];
    $tenLoaiPhuCap = $_POST['tenLoaiPhuCap'];
    $soTien = $_POST['soTien'];
    $sql = "UPDATE phucap SET  maPhuCap='$maPhuCap', tenLoaiPhuCap='$tenLoaiPhuCap',soTien='$soTien' WHERE maPhuCap=$id; ";
   
mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn);
        ob_start();
        header('location:http://localhost:8080/aaa/phucap.php');
        ob_end_flush();
}

?>