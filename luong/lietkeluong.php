<?php include("../components/header.php") ?>

<body>
    <?php include("../components/navbar.php") ?>
    <?php
    include("../config/config.php");
    ?>

    <div>
        <h1>Thống Kê Lương</h1>
        <em>
            <h4 > Lương = Lương cơ bản * (Hệ số lương + Hệ số phụ cấp - Phí bảo hiểm )</h4>
        </em>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã Giáo Viên</th>
                    <th>Tên Giáo Viên</th>
                    <th>Chức Vụ</th>
                    <th>Lương Cơ Bản (VND)</th>
                    <th>Hệ Số Lương</th>
                    <th>Phụ Cấp (% LCB)</th>
                    <th>Phí Bảo Hiểm (% LCB)</th>
                    <th>Lương Nhận Được (VND)</th>

                </tr>

            </thead>

            <tbody>
                <?php
                $i = 0;
                $pdo = new PDO("mysql:host=localhost;dbname=qlns_truong_hoc", "root", "");
                $stmt = $pdo->prepare("CALL TinhLuongTatCaGiaoVien()");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $i++;
                ?>
                    <tr class="">
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['MAGV'] ?></td>
                        <td><?php echo $row['TENGV'] ?></td>
                        <td><?php echo $row['TENCV'] ?></td>
                        <td>1.800.000</td>
                        <td><?php echo $row['HESOLUONG'] ?></td>
                        <td><?php echo $row['HESOPHUCAP'] ?></td>
                        <td><?php echo $row['PHIBH'] ?></td>
                        <td><?php echo number_format($row['Luong'], 2, ',', '.') ?></td>


                    </tr>
                <?php
                }
                ?>

            </tbody>

        </table>
    </div>
</body>
