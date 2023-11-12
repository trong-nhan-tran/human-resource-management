<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí chức vụ</title>
    <link rel="stylesheet" href="../css_style/style.css">
</head>

<body>
    <h1 class="h1_content">Chức vụ</h1>
    <form action="./themchucvu.php" method="POST" style="display: flex; flex-direction: column;">
        <div class="div_label_center">
            <label>Mã chức vụ:</label>
            <input type="text" name="MACV">
        </div>
        <div class="div_label_center">
            <label for="DS_MA">Tên chức vụ:</label>
            <input type="text" name="TENCV">
        </div>

        <input type="submit" value="Thêm chức vụ">
    </form>

    <?php
    include("../../config/config.php");
    $sql = "SELECT * FROM `chuc_vu` ORDER BY `chuc_vu`.`MACV` ASC";
    $query_chucvu = mysqli_query($connect, $sql);
    ?>
    <br><br>
    <div class="table-responsive-sm" style="display:block; width:50%; float:left; margin: 0 30px; border:1px solid #000; padding: 15px; box-shadow: 10px 10px 12px 12px lightblue; ">
        <p class="title-p">Liệt kê chức vụ</p>

        <table class="table" border="1px" width="75%" style="border-collapse: collapse">
            <tr class="table-primary">
                <th>ID</th>
                <th>Mã chức vụ</th>
                <th>Tên chức vụ</th>
                <th>Quản lý</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_chucvu)) {
                $i++;
            ?>
                <tr class="">
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['MACV'] ?></td>
                    <td><?php echo $row['TENCV'] ?></td>
                    <td>
                        <a href="./xoachucvu.php?idchucvu=<?php echo $row['MACV'] ?>">Xóa</a> |
                        <a href="./suachucvu.php?idchucvu=<?php echo $row['MACV'] ?>">Sửa</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </table>
    </div>
</body>

</html>