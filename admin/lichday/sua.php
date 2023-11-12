<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MALGD = $_POST["MALGD"];
    $NGAYDAY = $_POST['NGAYDAY'];
    $MAGV = $_POST['MAGV'];
    $MAMONHOC = $_POST['MAMONHOC'];
    $MALOP = $_POST['MALOP'];
    $MATIETHOC = $_POST['MATIETHOC'];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=qlns_truong_hoc", "root", "");
        $stmt = $pdo->prepare("UPDATE `lich_giang_day` SET 
        
        `NGAYDAY`=:NGAYDAY,
        `MAGV`=:MAGV ,
        `MAMONHOC`=:MAMONHOC,
        `MALOP`=:MALOP,
        `MATIETHOC`=:MATIETHOC WHERE `MALGD`=:MALGD");
        // Bind parameters
        $stmt->bindParam(':MALGD', $MALGD, PDO::PARAM_STR);
        $stmt->bindParam(':NGAYDAY', $NGAYDAY, PDO::PARAM_STR);
        $stmt->bindParam(':MAGV', $MAGV, PDO::PARAM_STR);
        $stmt->bindParam(':MAMONHOC', $MAMONHOC, PDO::PARAM_STR);
        $stmt->bindParam(':MALOP', $MALOP, PDO::PARAM_STR);
        $stmt->bindParam(':MATIETHOC', $MATIETHOC, PDO::PARAM_STR);

        $stmt->execute();
        // echo '<script>alert("Chức vụ đã được thêm thành công.");</script>';
    } catch (PDOException $e) {
        // Xử lý lỗi cơ sở dữ liệu
        echo "Lỗi: " . $e->getMessage();
    } finally {
        $pdo = null;
    }

    header("location: ./lietkelichday.php");
}
