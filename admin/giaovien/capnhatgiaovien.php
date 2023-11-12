<?php include("../components/header.php")  ?>

<body>
    <?php include("../components/navbar.php")  ?>

    <?php
    include("../../config/config.php");
    $sql_giaovien = "SELECT *FROM `giao_vien` where `giao_vien`.`MAGV`='$_GET[magiaovien]'";
    $query_giaovien = mysqli_query($connect, $sql_giaovien);
    while ($row_giaovien = mysqli_fetch_array($query_giaovien)) {
    ?>

        <div class="container">
            <form action="./sua.php?magiaovien=<?php echo $row_giaovien['MAGV'] ?>" method="POST">
                <h1>Cập Nhật Giáo Viên</h1>
                <div class="form-group">
                    <label>Mã Giáo Viên:</label>
                    <input class="form-control" type="text" name="MAGV" value="<?php echo $row_giaovien['MAGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Tên Giáo Viên:</label>
                    <input class="form-control" type="text" name="TENGV" value="<?php echo $row_giaovien['TENGV'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Chức Vụ: </label>
                    <select class="form-control" name="MACV" id="">
                        <?php
                        include("../config/config.php");
                        $sql_cv = "SELECT *FROM chuc_vu";
                        $query_cv = mysqli_query($connect, $sql_cv);
                        while ($row_bh = mysqli_fetch_array($query_cv)) {
                            $selected = '';
                            if ($row_giaovien['MACV'] == $row_bh['MACV']) {
                                $selected = 'selected';
                            }
                        ?>
                            <option value="<?php echo $row_bh['MACV'] ?>" <?php echo $selected ?>>
                                <?php echo $row_bh['TENCV'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Ngày Sinh:</label>
                    <input class="form-control" type="date" name="NGAYSINHGV" value="<?php echo $row_giaovien['NGAYSINHGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Giới Tính:</label>
                    <input type="radio" name="GIOITINHGV" value="<?php echo $row_giaovien['GIOITINHGV'] ?>" required checked>0 - Nam
                    &emsp;
                    <input type="radio" name="GIOITINHGV" value="<?php echo $row_giaovien['GIOITINHGV'] ?>" required checked>1 - Nữ
                </div>
                <div class="form-group">
                    <label>Địa chỉ:</label>
                    <input class="form-control" type="text" name="DIACHIGV" value="<?php echo $row_giaovien['DIACHIGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Số Điện Thoại:</label>
                    <input class="form-control" type="text" name="SDTGV" value="<?php echo $row_giaovien['SDTGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Căn cước công dân:</label>
                    <input class="form-control" type="text" name="CCCDGV" value="<?php echo $row_giaovien['CCCDGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input class="form-control" type="text" name="EMAILGV" value="<?php echo $row_giaovien['EMAILGV'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Tên Tài Khoản:</label>
                    <input class="form-control" type="text" name="TENTK" value="<?php echo $row_giaovien['TENTK'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu:</label>
                    <input class="form-control" type="password" name="MATKHAU" value="<?php echo $row_giaovien['MATKHAU'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Bảo Hiểm: </label>
                    <select class="form-control" name="MABH" id="">
                        <?php
                        include("../config/config.php");
                        $sql_bh = "SELECT *FROM bao_hiem";
                        $query_bh = mysqli_query($connect, $sql_bh);
                        while ($row_bh = mysqli_fetch_array($query_bh)) {
                        ?>
                            <option value="<?php echo $row_bh['MABH'] ?>">
                                <?php echo $row_bh['TENBH'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Môn Giảng Dạy: </label>
                    <select class="form-control" name="MAMONHOC" id="">
                        <?php
                        include("../config/config.php");
                        $sql_monhoc = "SELECT *FROM mon_hoc";
                        $query_monhoc = mysqli_query($connect, $sql_monhoc);
                        while ($row_monhoc = mysqli_fetch_array($query_monhoc)) {
                            $selected = '';
                            if ($row_giaovien['MAMONHOC'] == $row_monhoc['MAMONHOC']) {
                                $selected = 'selected';
                            }
                        ?>
                            <option value="<?php echo $row_monhoc['MAMONHOC'] ?>" <?php echo $selected ?>>
                                <?php echo $row_monhoc['TENMONHOC'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Trình Độ Học Vấn: </label>
                    <select class="form-control" name="MATDHV" id="">
                        <?php
                        include("../config/config.php");
                        $sql_tdhv = "SELECT *FROM trinh_do_hoc_van";
                        $query_tdhv = mysqli_query($connect, $sql_tdhv);
                        while ($row_tdhv = mysqli_fetch_array($query_tdhv)) {
                            $selected = '';
                            if ($row_giaovien['MATDHV'] == $row_tdhv['MATDHV']) {
                                $selected = 'selected';
                            }
                        ?>
                            <option value="<?php echo $row_tdhv['MATDHV'] ?>" <?php echo $selected ?>>
                                <?php echo $row_tdhv['TRINHDO'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hạng Giáo Viên: </label>
                    <select class="form-control" name="MAHANGGV" id="">
                        <?php
                        include("../config/config.php");
                        $sql_hanggv = "SELECT *FROM hang_gv";
                        $query_hanggv = mysqli_query($connect, $sql_hanggv);
                        while ($row_hanggv = mysqli_fetch_array($query_hanggv)) {
                            $selected = '';
                            if ($row_giaovien['MAHANGGV'] == $row_hanggv['MAHANGGV']) {
                                $selected = 'selected';
                            }
                        ?>
                            <option value="<?php echo $row_hanggv['MAHANGGV'] ?>" <?php echo $selected ?>>
                                <?php echo $row_hanggv['TENHANGGV'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bậc Giáo Viên: </label>
                    <select class="form-control" name="MABAC" id="">
                        <?php
                        include("../config/config.php");
                        $sql_bacluong = "SELECT *FROM bac_luong";
                        $query_bacluong = mysqli_query($connect, $sql_bacluong);
                        while ($row_bacluong = mysqli_fetch_array($query_bacluong)) {
                            $selected = '';
                            if ($row_giaovien['MABAC'] == $row_bacluong['MABAC']) {
                                $selected = 'selected';
                            }
                        ?>
                            <option value="<?php echo $row_bacluong['MABAC'] ?>" <?php echo $selected ?>>
                                <?php echo $row_bacluong['TENBAC'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật Giáo Viên</button>
            </form>

        </div>
    <?php
    }
    ?>
</body>

</html>