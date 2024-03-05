
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
        <h1>Thêm Danh Sách Bảo Hiểm</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã bảo hiểm	</td>
                    <td><input readonly type="text" name="maBH" id="maBH" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Bảo hiểm y tế</td>
                    <td><input type="text" name="BHYT" id="BHYT" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Bảo hiểm nhân thọ</td>
                    <td><input type="text" name="BHNT" id="BHNT" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Bảo hiểm xã hội</td>
                    <td><input type="text" name="BHXH" id="BHXH" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Ngày đóng</td>
                    <td><input type="date" name="Ngaydong" id="Ngaydong" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Hạn hết</td>
                    <td><input type="date" name="Hanhet" id="Hanhet" class="form-control" /></td>
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
   
    $sqlInsert = <<<EOT
    INSERT INTO baohiem (maBH, BHYT, BHNT, BHXH, Ngaydong, Hanhet) 
    VALUES ('$maBH','$BHYT','$BHNT', '$BHXH', '$Ngaydong', '$Hanhet')
EOT;
mysqli_query($conn, $sqlInsert);

        // Đóng kết nối
        mysqli_close($conn);
        ob_start();
        header('location:http://localhost:8080/aaa/baohiem.php');
        ob_end_flush();
}

?>