
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
$sqlSelect = "SELECT * FROM chucvu WHERE maChucVu=$id;";
$resultSelect = mysqli_query($conn, $sqlSelect);
 $chucvuRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($chucvuRow)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }   

    ?>
    <!-- Main content -->
    <div class="container">
        <h1>Sửa</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã Chức Vụ</td>
                    <td><input  type="text" name="maChucVu" id="maChucVu" class="form-control" value="<?php echo $chucvuRow['maChucVu'] ?>"/></td>
                </tr>
                <tr>
                    <td>Tên Chức Vụ</td>
                    <td><input type="text" name="tenChucVu" id="tenChucVu" class="form-control"value="<?php echo $chucvuRow['tenChucVu'] ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                  
                     <button name="btnSaveCV" class="btn btn-primary" ><i class="fas fa-save"></i>   Lưu dữ liệu  </button> </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
<?php
if ( isset($_POST['btnSaveCV']) ) {
        
   
    $maChucVu = $_POST['maChucVu'];
    $tenChucVu = $_POST['tenChucVu'];

    $sql = "UPDATE chucvu SET maChucVu='$maChucVu', tenChucVu='$tenChucVu' WHERE maChucVu=$id; ";
   
mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn);
        ob_start();
        header('location:http://localhost:8080/aaa/chucvu.php');
        ob_end_flush();
}

?>