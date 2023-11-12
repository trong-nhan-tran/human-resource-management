<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Giáo Viên</title>
    <link rel="stylesheet" href="../css_style/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Trường THCS - Giáo Viên </a>
            </div>
            <ul class="nav navbar-nav">
                <li class=""><a href="./trangcanhan.php">Thông Tin Cá Nhân</a></li>
                <li><a href="./lichday.php">Lịch Dạy</a></li>
                <li><a href="/qlnhansu/dangxuat.php">Đăng Xuất</a></li>
            </ul>
        </div>
    </nav>


    <div>
        <?php
        session_start();
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $magv = $user['MAGV'];
            // Kết nối với cơ sở dữ liệu
            include("../config/config.php");

            // Gọi thủ tục
            $sql = "CALL TimLichDayTheoMAGV(?)";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("s", $magv);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            echo "Bạn chưa đăng nhập!";
        }
        ?>


        <div class="container">
            <h1>Lịch dạy</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày Dạy</th>
                        <th>Tên Giáo Viên</th>
                        <th>Môn Học</th>
                        <th>Lớp</th>
                        <th>Tiết Học</th>
                        <th>Giờ Bắt Đầu</th>
                        <th>Giờ Kết Thúc</th>
                    </tr>

                </thead>

                <tbody>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $i++;
                    ?>
                        <tr class="">
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['NGAYDAY'] ?></td>
                            <td><?php echo $row['TENGV'] ?></td>
                            <td><?php echo $row['TENMONHOC'] ?></td>
                            <td><?php echo $row['TENLOP'] ?></td>
                            <td><?php echo $row['TENTIETHOC'] ?></td>
                            <td><?php echo $row['GIOBATDAU'] ?></td>
                            <td><?php echo $row['GIOKETTHUC'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>

            </table>
        </div>
    </div>
</body>