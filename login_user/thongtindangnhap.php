<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        .container {
            text-align: center;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        .user-info {
            color: #333;
            font-size: 18px;
            margin-top: 10px;
        }

        .logout-link {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .login-link {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
            unset($_SESSION['dangnhap']);
        }
        ?>
        <?php
        if (isset($_SESSION['dangnhap']) || isset($_SESSION['dangky'])) {
        ?>
            <div class="user-info">
                Xin Chào: <?php echo $_SESSION['TENGV']; ?><br>
                Mã giáo viên: <?php echo $_SESSION['MAGV']; ?>
            </div>
            <a class="logout-link" href="./dangxuatgiaovien.php?dangxuat=1">
                Đăng xuất
            </a>
        <?php
        } else {
        ?>
            <a class="login-link" href="./dangnhapgiaovien.php">
                Đăng nhập
            </a>
        <?php
        }
        ?>
    </div>
</body>

</html>