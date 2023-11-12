<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sách</title>
    <link rel="stylesheet" href="../css_style/style.css">
</head>

<body>
    <?php
    include("../../config/config.php");
    $sql_lietke_danhmucsp = "SELECT * FROM `chuc_vu`WHERE MACV='$_GET[idchucvu]' LIMIT 1";
    $query_lietke_danhmucsp = mysqli_query($connect, $sql_lietke_danhmucsp);
    ?>
    <h1 class="h1_content">Sửa chức vụ</h1>
    <form method="post" action="./capnhatchucvu.php">
        <?php
        while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
        ?>
            <div class="div_label_center">
                <label>Mã chức vụ:</label>
                <input type="text" name="MACV" value="<?php echo $row["MACV"] ?>" required>
            </div>

            <div class="div_label_center">
                <label>Tên chức vụ:</label>
                <input type="text" name="TENCV" value="<?php echo $row["TENCV"] ?>" required>
            </div>
            <input type="submit" value="Sửa sách">

            
        <?php } ?>
    </form>
</body>

</html>