<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MALGD = $_POST['MALGD'];
    $NGAYDAY = $_POST['NGAYDAY'];
    $MAGV = $_POST['MAGV'];
    $MAMONHOC = $_POST['MAMONHOC'];
    $MALOP = $_POST['MALOP'];
    $MATIETHOC = $_POST['MATIETHOC'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=qlns_truong_hoc", "root", "");
        $stmt = $pdo->prepare("INSERT INTO `lich_giang_day` (`MALGD`,`NGAYDAY`, `MAGV`, `MAMONHOC`, `MALOP`, `MATIETHOC`) 
        VALUES (:MALGD, :NGAYDAY, :MAGV, :MAMONHOC, :MALOP, :MATIETHOC);");
        // Bind parameters
        $stmt->bindParam(':MALGD', $MALGD);
        $stmt->bindParam(':NGAYDAY', $NGAYDAY);
        $stmt->bindParam(':MAGV', $MAGV);
        $stmt->bindParam(':MAMONHOC', $MAMONHOC);
        $stmt->bindParam(':MALOP', $MALOP);
        $stmt->bindParam(':MATIETHOC', $MATIETHOC);

        $stmt->execute();
        // echo '<script>alert("Chức vụ đã được thêm thành công.");</script>';
    } catch (PDOException $e) {
        // Xử lý lỗi cơ sở dữ liệu
        echo "Lỗi: " . $e->getMessage();
    } finally {
        $pdo = null;
    }

    header("Location: ./lietkelichday.php");
}
