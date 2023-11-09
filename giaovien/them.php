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
        $stmt = $pdo->prepare("INSERT INTO `giao_vien`(`MAGV`, `TENGV`, `MACV`, `NGAYSINHGV`, `GIOITINHGV`,
        `DIACHIGV`, `SDTGV`, `CCCDGV`, `EMAILGV`, `TENTK`, `MATKHAU`, `MABH`, `MAMONHOC`,
        `MATDHV`, `MAHANGGV`, `MABAC`) VALUES (:MAGV, :TENGV, :MACV ,:NGAYSINHGV, :GIOITINHGV, :DIACHIGV, :SDTGV,
        :CCCDGV, :EMAILGV, :TENTK, :MATKHAU, :MABH, :MAMONHOC, :MATDHV, :MAHANGGV, :MABAC)");

        // Bind parameters
        $stmt->bindParam(':MAGV', $MAGV);
        $stmt->bindParam(':TENGV', $TENGV);
        $stmt->bindParam(':MACV', $MACV);
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
    header("location: ./lietkegiaovien.php");
}
