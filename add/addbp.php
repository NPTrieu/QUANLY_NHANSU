
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
        <h1>Thêm Bộ Phận</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>Mã Bộ Phận</td>
                    <td><input readonly type="text" name="maBP" id="maBP" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Tên Bộ Phận</td>
                    <td><input type="text" name="tenBoPhan" id="tenBoPhan" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Số Điện Thoại </td>
                    <td><input type="text" name="BP_SDT" id="BP_SDT" class="form-control" /></td>
                </tr>
              
                <tr>
                    <td colspan="2">
                  
                     <button name="btnSaveBP" class="btn btn-primary" ><i class="fas fa-save"></i>   Lưu dữ liệu  </button> </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
<?php
if ( isset($_POST['btnSaveBP']) ) {
        
   
    $maBP = $_POST['maBP'];
    $tenBoPhan = $_POST['tenBoPhan'];
    $BP_SDT = $_POST['BP_SDT'];
   
    $sqlInsert = <<<EOT
    INSERT INTO bophan (maBP, tenBoPhan, BP_SDT) 
    VALUES ('$maBP','$tenBoPhan','$BP_SDT')
EOT;
mysqli_query($conn, $sqlInsert);

        // Đóng kết nối
        mysqli_close($conn);
        ob_start();
        header('location:http://localhost:8080/aaa/bophan.php');
        ob_end_flush();
}

?>