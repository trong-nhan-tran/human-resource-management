<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SA_MA = $_POST['MACV'];
    $DS_MA = $_POST['TENCV'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=quanli_nhansu", "root", "");
        $stmt = $pdo->prepare("INSERT INTO `chuc_vu` (`MACV`, `TENCV`) VALUES (:SA_MA, :DS_MA);");

        // Bind parameters
        $stmt->bindParam(':SA_MA', $SA_MA);
        $stmt->bindParam(':DS_MA', $DS_MA);

        $stmt->execute();
        // echo '<script>alert("Chức vụ đã được thêm thành công.");</script>';
    } catch (PDOException $e) {
        // Xử lý lỗi cơ sở dữ liệu
        echo "Lỗi: " . $e->getMessage();
    } finally {
        $pdo = null;
    }

    header("Location: ./hienthichucvu.php");
}
