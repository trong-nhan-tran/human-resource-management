<?php
session_start();
include("../config/config.php");
?>
<?php
$temp = 0;
if (isset($_POST['dangky'])) {
    $MAGV = rand(1, 1000);
    $TENGV = $_POST['TENGV'];
    $NGAYSINHGV = $_POST['NGAYSINHGV'];
    $GIOITINHGV = $_POST['GIOITINHGV'];
    $DIACHIGV = $_POST['DIACHIGV'];
    $SDTGV = $_POST['SDTGV'];
    $CCCDGV = $_POST['CCCDGV'];
    $EMAILGV = $_POST['EMAILGV'];
    $TENTK = $_POST['TENTK'];
    $MATKHAU = $_POST['MATKHAU'];
    $MABH = $_POST['MABH'];
    $MAMONHOC = $_POST['MAMONHOC'];
    $MATDHV = $_POST['MATDHV'];
    $MAHANGGV = $_POST['MAHANGGV'];
    $MABAC = $_POST['MABAC'];

    try {
        //Biến kết nối/giao tiếp với CSDL
        $pdo = new PDO("mysql:host=localhost;dbname=qlns1", "root", "");
        $stmt = $pdo->prepare("INSERT INTO `giao_vien`(`MAGV`, `TENGV`, `NGAYSINHGV`, `GIOITINHGV`,
        `DIACHIGV`, `SDTGV`, `CCCDGV`, `EMAILGV`, `TENTK`, `MATKHAU`, `MABH`, `MAMONHOC`,
        `MATDHV`, `MAHANGGV`, `MABAC`) VALUES (:MAGV, :TENGV, :NGAYSINHGV, :GIOITINHGV, :DIACHIGV, :SDTGV,
        :CCCDGV, :EMAILGV, :TENTK, :MATKHAU, :MABH, :MAMONHOC, :MATDHV, :MAHANGGV, :MABAC)");

        // Bind parameters
        $stmt->bindParam(':MAGV', $MAGV);
        $stmt->bindParam(':TENGV', $TENGV);
        $stmt->bindParam(':NGAYSINHGV', $NGAYSINHGV);
        $stmt->bindParam(':GIOITINHGV', $GIOITINHGV);
        $stmt->bindParam(':DIACHIGV', $DIACHIGV);
        $stmt->bindParam(':SDTGV', $SDTGV);
        $stmt->bindParam(':CCCDGV', $CCCDGV);
        $stmt->bindParam(':EMAILGV', $EMAILGV);
        $stmt->bindParam(':TENTK', $TENTK);
        $stmt->bindParam(':MATKHAU', $MATKHAU);
        $stmt->bindParam(':MABH', $MABH);
        $stmt->bindParam(':MAMONHOC', $MAMONHOC);
        $stmt->bindParam(':MATDHV', $MATDHV);
        $stmt->bindParam(':MAHANGGV', $MAHANGGV);
        $stmt->bindParam(':MABAC', $MABAC);

        $stmt->execute();
        // echo '<script>alert("Chức vụ đã được thêm thành công.");</script>';
    } catch (PDOException $e) {
        // Xử lý lỗi cơ sở dữ liệu
        echo "Lỗi: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
    $temp = 1;
}

if ($temp == 1) {
    $sql = "SELECT * FROM `giao_vien` WHERE `TENTK`='" . $TENTK . "' AND `MATKHAU`='" . $MATKHAU . "' LIMIT 1";
    $row = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($row);
    $row_data = mysqli_fetch_array($row);
    if ($count == 1) {
        $_SESSION['dangnhap'] = $row_data['TENGV'];
        $_SESSION['TENGV'] = $row_data['TENGV'];
        $_SESSION['MAGV'] = $row_data['MAGV'];
        echo "<script> window.location.href='./thongtindangnhap.php';</script>";
        die();
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    p {
        text-align: center;
        font-size: 24px;
        color: #333;
    }

    .table-responsive-sm {
        width: 50%;
        margin: 50px auto;
        padding: 24px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        border-radius: 10px;
    }

    .div_label_center {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    label {
        flex: 1;
        max-width: 45%;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input,
    select {
        flex: 1;
        /* max-width: 45%; */
        padding: 8px;
        /* margin-bottom: 10px; */
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .radio-group {
        display: flex;
        align-items: center;
    }

    .radio-group label {
        margin-right: 15px;
    }

    .div_label_center {
        display: flex;
        align-items: center;
    }

    .div_label_center label {
        flex: 1;
        max-width: 20%;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .radio-group {
        flex: 1;
        display: flex;
    }

    .radio-group label {
        margin-right: 20px;
    }

    .radio-group input {
        margin-right: 5px;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <p>Đăng ký thành viên</p>
    <div class="table-responsive-sm " style="    width: 40%;
    border: 1px solid #000;
    padding: 24px;
    margin: 20px 25%;
    box-shadow: 10px 10px 12px 12px lightblue;">

        <table class="table" border="1px" style="border-collapse: collapse">
            <form action="" method="POST">
                <!-- <div class="div_label_center">
                    <label>Mã Giáo Viên:</label>
                    <input type="text" name="MAGV">
                </div> -->
                <div class="div_label_center">
                    <label>Tên Giáo Viên:</label>
                    <input type="text" name="TENGV">
                </div>
                <div class="div_label_center">
                    <label>Ngày Sinh:</label>
                    <input type="date" name="NGAYSINHGV">
                </div>
                <div class="div_label_center">
                    <label>Giới Tính:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="GIOITINHGV" value="nam" checked> Nam
                        </label>
                        <label>
                            <input type="radio" name="GIOITINHGV" value="nu"> Nữ
                        </label>
                    </div>
                </div>
                <div class="div_label_center">
                    <label>Địa chỉ:</label>
                    <input type="text" name="DIACHIGV">
                </div>
                <div class="div_label_center">
                    <label>Số Điện Thoại:</label>
                    <input type="text" name="SDTGV">
                </div>
                <div class="div_label_center">
                    <label>Căn cước công dân:</label>
                    <input type="text" name="CCCDGV">
                </div>
                <div class="div_label_center">
                    <label>Email:</label>
                    <input type="text" name="EMAILGV">
                </div>
                <div class="div_label_center">
                    <label>Tên Tài Khoản:</label>
                    <input type="text" name="TENTK">
                </div>
                <div class="div_label_center">
                    <label>Mật khẩu:</label>
                    <input type="password" name="MATKHAU">
                </div>
                <div class="div_label_center">
                    <label>Bảo Hiểm: </label>
                    <select name="MABH" id="">
                        <?php
                        include("../config/config.php");
                        $sql_bh = "SELECT *FROM bao_hiem";
                        $query_bh = mysqli_query($connect, $sql_bh);
                        while ($row_bh = mysqli_fetch_array($query_bh)) {
                        ?>
                            <option value="<?php echo $row_bh['MABH'] ?>">
                                <?php echo $row_bh['TENBH'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="div_label_center">
                    <label>Môn Giảng Dạy: </label>
                    <select name="MAMONHOC" id="">
                        <?php
                        include("../config/config.php");
                        $sql_monhoc = "SELECT *FROM mon_hoc";
                        $query_monhoc = mysqli_query($connect, $sql_monhoc);
                        while ($row_monhoc = mysqli_fetch_array($query_monhoc)) {
                        ?>
                            <option value="<?php echo $row_monhoc['MAMONHOC'] ?>">
                                <?php echo $row_monhoc['TENMONHOC'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="div_label_center">
                    <label>Trình Độ Học Vấn: </label>
                    <select name="MATDHV" id="">
                        <?php
                        include("../config/config.php");
                        $sql_tdhv = "SELECT *FROM trinh_do_hoc_van";
                        $query_tdhv = mysqli_query($connect, $sql_tdhv);
                        while ($row_tdhv = mysqli_fetch_array($query_tdhv)) {
                        ?>
                            <option value="<?php echo $row_tdhv['MATDHV'] ?>">
                                <?php echo $row_tdhv['TRINHDO'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="div_label_center">
                    <label>Hạng Giáo Viên: </label>
                    <select name="MAHANGGV" id="">
                        <?php
                        include("../config/config.php");
                        $sql_hanggv = "SELECT *FROM hang_gv";
                        $query_hanggv = mysqli_query($connect, $sql_hanggv);
                        while ($row_hanggv = mysqli_fetch_array($query_hanggv)) {
                        ?>
                            <option value="<?php echo $row_hanggv['MAHANGGV'] ?>">
                                <?php echo $row_hanggv['TENHANGGV'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="div_label_center">
                    <label>Bậc Lương: </label>
                    <select name="MABAC" id="">
                        <?php
                        include("../config/config.php");
                        $sql_bacluong = "SELECT *FROM bac_luong";
                        $query_bacluong = mysqli_query($connect, $sql_bacluong);
                        while ($row_bacluong = mysqli_fetch_array($query_bacluong)) {
                        ?>
                            <option value="<?php echo $row_bacluong['MABAC'] ?>">
                                <?php echo $row_bacluong['TENBAC'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" value="Thêm Giáo Viên" name="dangky">
            </form>
        </table>
    </div>
</body>

</html>