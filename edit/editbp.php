
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
$sqlSelect = "SELECT * FROM bophan WHERE maBP=$id;";
$resultSelect = mysqli_query($conn, $sqlSelect);
 $bophanRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($bophanRow)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }   

    ?>

    <!-- Main content -->
    <div class="container">
        <h1>Sửa Bộ Phận</h1>

        <form name="frmCreate" method="post" action="" class="form">
            <table class="table">
              
                <tr>
                    <td>Mã bộ phận</td>
                    <td><input type="text" name="maBP" id="maBP" class="form-control"value="<?php echo $bophanRow['maBP'] ?>" /></td>
                </tr>
               
               
                    <td>Tên bộ phận</td>
                    <td><input type="text" name="tenBoPhan" id="tenBoPhan" class="form-control"value="<?php echo $bophanRow['tenBoPhan'] ?>" /></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" name="BP_SDT" id="BP_SDT" class="form-control"value="<?php echo $bophanRow['BP_SDT'] ?>" /></td>
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
   
    $maBP = $_POST['maBP'];
    $tenBoPhan = $_POST['tenBoPhan'];
    $BP_SDT = $_POST['BP_SDT'];
    
   $sql = "UPDATE bophan SET  maBP='$maBP', tenBoPhan='$tenBoPhan',BP_SDT='$BP_SDT' WHERE maBP=$id; ";
   
        mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn); 
        ob_start();
        header('location:http://localhost:8080/aaa/bophan.php');
        ob_end_flush();
} 
?>
