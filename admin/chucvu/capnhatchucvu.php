<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MACV = $_POST['MACV'];
    $TENCV = $_POST['TENCV'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=quanli_nhansu", "root", "");
        $stmt = $pdo->prepare("UPDATE `chuc_vu` SET `TENCV` = :TENCV WHERE `MACV` = :MACV");

        // Bind parameters
        $stmt->bindParam(':MACV', $MACV, PDO::PARAM_STR);
        $stmt->bindParam(':TENCV', $TENCV, PDO::PARAM_STR);

        $stmt->execute();
        echo "Chức vụ đã được cập nhật thành công.";
    } catch (PDOException $e) {
        echo "Lỗi khi cập nhật chức vụ: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
    // Điều hướng sau khi cập nhật thành công
    header("Location: ./hienthichucvu.php");
}
