<?php
echo '<script type="text/javascript">
    window.onload = function () { 
        var confirmation = confirm("Bạn có muốn đăng xuất không?");
        if (confirmation) {
            window.location.href = "./dangnhapgiaovien.php";
        } else {
            window.location.href = "./thongtindangnhap.php";
        }
    }
</script>';
