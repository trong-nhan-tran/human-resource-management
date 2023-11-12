<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MAGV = $_POST['MAGV'];
    $TENGV = $_POST['TENGV'];
    $MACV = $_POST['MACV'];
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
        $pdo = new PDO("mysql:host=localhost;dbname=qlns_truong_hoc", "root", "");
        $stmt = $pdo->prepare("UPDATE `giao_vien` SET 
                            `MABH`=:MABH,
                            `MAMONHOC`=:MAMONHOC,
                            `MATDHV`=:MATDHV,
                            `MAHANGGV`=:MAHANGGV,
                            `MABAC`=:MABAC,
                            `TENGV`=:TENGV,
                            `MACV`=:MACV,
                            `NGAYSINHGV`=:NGAYSINHGV,
                            `GIOITINHGV`=:GIOITINHGV,
                            `DIACHIGV`=:DIACHIGV,
                            `SDTGV`=:SDTGV,
                            `CCCDGV`=:CCCDGV,
                            `EMAILGV`=:EMAILGV,
                            `TENTK`=:TENTK,
                            `MATKHAU`=:MATKHAU WHERE `MAGV` = :MAGV");

        // Bind parameters
        $stmt->bindParam(':MAGV', $MAGV, PDO::PARAM_STR);
        $stmt->bindParam(':TENGV', $TENGV, PDO::PARAM_STR);
        $stmt->bindParam(':MACV', $MACV, PDO::PARAM_STR);
        $stmt->bindParam(':NGAYSINHGV', $NGAYSINHGV, PDO::PARAM_STR);
        $stmt->bindParam(':GIOITINHGV', $GIOITINHGV, PDO::PARAM_STR);
        $stmt->bindParam(':DIACHIGV', $DIACHIGV, PDO::PARAM_STR);
        $stmt->bindParam(':SDTGV', $SDTGV, PDO::PARAM_STR);
        $stmt->bindParam(':CCCDGV', $CCCDGV, PDO::PARAM_STR);
        $stmt->bindParam(':EMAILGV', $EMAILGV, PDO::PARAM_STR);
        $stmt->bindParam(':TENTK', $TENTK, PDO::PARAM_STR);
        $stmt->bindParam(':MATKHAU', $MATKHAU, PDO::PARAM_STR);
        $stmt->bindParam(':MABH', $MABH, PDO::PARAM_STR);
        $stmt->bindParam(':MAMONHOC', $MAMONHOC, PDO::PARAM_STR);
        $stmt->bindParam(':MATDHV', $MATDHV, PDO::PARAM_STR);
        $stmt->bindParam(':MAHANGGV', $MAHANGGV, PDO::PARAM_STR);
        $stmt->bindParam(':MABAC', $MABAC, PDO::PARAM_STR);

        $stmt->execute();
        // echo '<script>alert("Thông tin giáo viên đã được sửa thành công.");</script>';
    } catch (PDOException $e) {
        // Xử lý lỗi cơ sở dữ liệu
        echo "Lỗi: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
    header("location: ./lietkegiaovien.php");
}
