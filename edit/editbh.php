
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
$sqlSelect = "SELECT * FROM baohiem WHERE maBH=$id;";
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
        <h1>Sửa Bảo Hiểm</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã bảo hiểm	</td>
                    <td><input  type="text" name="maBH" id="maBH" class="form-control"value="<?php echo $nhanvienRow['maBH'] ?>" /></td>
                </tr>
                <tr>
                    <td>Bảo hiểm y tế</td>
                    <td><input type="text" name="BHYT" id="BHYT" class="form-control"value="<?php echo $nhanvienRow['BHYT'] ?>" /></td>
                </tr>
                <tr>
                    <td>Bảo hiểm nhân thọ</td>
                    <td><input type="text" name="BHNT" id="BHNT" class="form-control" value="<?php echo $nhanvienRow['BHNT'] ?>"/></td>
                </tr>
                <tr>
                    <td>Bảo hiểm xã hội</td>
                    <td><input type="text" name="BHXH" id="BHXH" class="form-control" value="<?php echo $nhanvienRow['BHXH'] ?>"/></td>
                </tr>
                <tr>
                    <td>Ngày đóng</td>
                    <td><input type="date" name="Ngaydong" id="Ngaydong" class="form-control"value="<?php echo $nhanvienRow['Ngaydong'] ?>" /></td>
                </tr>
                <tr>
                    <td>Hạn hết</td>
                    <td><input type="date" name="Hanhet" id="Hanhet" class="form-control" value="<?php echo $nhanvienRow['Hanhet'] ?>"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                  
                     <button name="btnSaveBH" class="btn btn-primary" ><i class="fas fa-save"></i>   Lưu dữ liệu  </button> </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
<?php
if ( isset($_POST['btnSaveBH']) ) {
        
    $maBH = $_POST['maBH'];
    $BHYT = $_POST['BHYT'];
    $BHNT = $_POST['BHNT'];
    $BHXH = $_POST['BHXH'];
    $Ngaydong = $_POST['Ngaydong'];
    $Hanhet = $_POST['Hanhet'];

    
   $sql = "UPDATE baohiem SET maBH='$maBH', BHYT='$BHYT', BHNT='$BHNT'
   , BHXH='$BHXH', Ngaydong='$Ngaydong', Hanhet='$Hanhet' WHERE maBH=$id; ";
   
mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn);
        ob_start();
        header('location:http://localhost:8080/aaa/baohiem.php');
        ob_end_flush();
}

?>