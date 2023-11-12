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
            $sql = "CALL TimGiaoVienTheoMAGV(?)";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("s", $magv);
            $stmt->execute();
            $result = $stmt->get_result();

            // Hiển thị thông tin giáo viên
            $tt_giaovien = $result->fetch_assoc();
            
        } else {
            echo "Bạn chưa đăng nhập!";
        }
        ?>


        <div class="container">
            <h1>Thông tin cá nhân</h1>
            <table class="table table-bordered mt-24">
                    <tbody>
                        <tr>
                            <td>Mã giáo viên</td>
                            <td> <?php echo $tt_giaovien["MAGV"]?></td>
                        </tr>
                        <tr>
                            <td>Tên Giáo Viên</td>
                            <td> <?php echo $tt_giaovien["TENGV"]?></td>
                        </tr>
                        <tr>
                            <td>Chức Vụ</td>
                            <td> <?php echo $tt_giaovien["TENCV"]?></td>
                        </tr>
                        <tr>
                            <td>Giới Tính</td>
                            <td> <?php echo $tt_giaovien["GIOITINHGV"]?></td>
                        </tr>
                        <tr>
                            <td>Ngày Sinh</td>
                            <td> <?php echo $tt_giaovien["NGAYSINHGV"]?></td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ</td>
                            <td> <?php echo $tt_giaovien["DIACHIGV"]?></td>
                        </tr>

                        <tr>
                            <td>Số Căn Cước Công Dân</td>
                            <td> <?php echo $tt_giaovien["CCCDGV"]?></td>
                        </tr>
                        <tr>
                            <td>Trình Độ Học Vấn</td>
                            <td> <?php echo $tt_giaovien["TRINHDO"]?></td>
                        </tr>
                        <tr>
                            <td>Chuyên Môn</td>
                            <td> <?php echo $tt_giaovien["TENMONHOC"]?></td>
                        </tr>
                        <tr>
                            <td>Giáo Viên Hạng</td>
                            <td> <?php echo $tt_giaovien["TENHANGGV"]?></td>
                        </tr>
                        <tr>
                            <td>Giáo Viên Bậc</td>
                            <td> <?php echo $tt_giaovien["TENBAC"]?></td>
                        </tr>
                        <tr>
                            <td>Tài Khoản</td>
                            <td> <?php echo $tt_giaovien["TENTK"]?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td> <?php echo $tt_giaovien["EMAILGV"]?></td>
                        </tr>
                        <tr>
                            <td>Số Điện Thoại</td>
                            <td> <?php echo $tt_giaovien["SDTGV"]?></td>
                        </tr>


                    </tbody>
                </table>
        </div>
    </div>
</body>