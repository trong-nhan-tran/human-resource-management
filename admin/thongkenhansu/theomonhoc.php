<?php include("../components/header.php") ?>

<body>
    <?php include("../components/navbar.php") ?>
    <?php
    include("../../config/config.php");

    $pdo = new PDO("mysql:host=localhost;dbname=qlns_truong_hoc", "root", "");
    $stmt = $pdo->prepare("CALL SoLuongGV_MonHoc()");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div>
        <h1>Thống Kê Số Lượng Giáo Viên Theo Môn Học</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Môn Học</th>
                    <th>Số Lượng Giáo Viên</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 0;
                foreach ($result as $row) {
                    $i++;
                ?>
                    <tr class="">
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['TENMONHOC'] ?></td>
                        <td><?php echo $row['SoLuongGiaoVien'] ?></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>

        </table>
    </div>
</body>