<?php include("../components/header.php")  ?>

<body>
    <?php include("../components/navbar.php")  ?>
    <?php
    include("../config/config.php");
    $sql_lichgd = "SELECT *FROM `lich_giang_day` where `lich_giang_day`.`MALGD`='$_GET[malgd]'";
    $query_lichgd = mysqli_query($connect, $sql_lichgd);
    while ($row_lichgd = mysqli_fetch_array($query_lichgd)) {
    ?>

    <div class="container">
        <form action="./sua.php?malgd=<?php echo $row_lichgd['MALGD'] ?>" method="POST" >
            <h1>Cập Nhật Lịch Giảng Dạy</h1>
            <div class="form-group">
                <label>Mã Giảng Dạy:</label>
                <input class="form-control" type="text" name="MALGD" value="<?php echo $row_lichgd['MALGD'] ?>">
            </div>
            <div class="form-group">
                <label>Ngày Giảng Dạy:</label>
                <input class="form-control" type="date" name="NGAYDAY" value="<?php echo $row_lichgd['NGAYDAY'] ?>">
            </div>
            <div class="form-group">
                <label>Giáo Viên: </label>
                <select class="form-control" name="MAGV" id="">
                    <?php
                    include("../config/config.php");
                    $sql_gv = "SELECT *FROM giao_vien";
                    $query_gv = mysqli_query($connect, $sql_gv);
                    while ($row_gv = mysqli_fetch_array($query_gv)) {
                    ?>
                        <option value="<?php echo $row_gv['MAGV'] ?>">
                            <?php echo $row_gv['TENGV'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Môn Học: </label>
                <select class="form-control" name="MAMONHOC" id="">
                    <?php
                    include("../config/config.php");
                    $sql_mh = "SELECT *FROM mon_hoc";
                    $query_mh = mysqli_query($connect, $sql_mh);
                    while ($row_mh = mysqli_fetch_array($query_mh)) {
                        $selected = '';
                        if ($row_lichgd['MAMONHOC'] == $row_mh['MAMONHOC']) {
                            $selected = 'selected';
                        }
                    ?>
                        <option value="<?php echo $row_mh['MAMONHOC'] ?>" <?php echo $selected ?>>
                            <?php echo $row_mh['TENMONHOC'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Lớp: </label>
                <select class="form-control" name="MALOP" id="">
                    <?php
                    include("../config/config.php");
                    $sql_lop = "SELECT *FROM lop_hoc";
                    $query_lop = mysqli_query($connect, $sql_lop);
                    while ($row_lop = mysqli_fetch_array($query_lop)) {
                        $selected = '';
                        if ($row_lichgd['MALOP'] == $row_lop['MALOP']) {
                            $selected = 'selected';
                        }
                    ?>
                        <option value="<?php echo $row_lop['MALOP'] ?>" <?php echo $selected ?>>
                            <?php echo $row_lop['TENLOP'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tiết học: </label>
                <select class="form-control" name="MATIETHOC" id="" values="">
                    <?php
                    include("../config/config.php");
                    $sql_th = "SELECT *FROM tiet_hoc ";
                    $query_th = mysqli_query($connect, $sql_th);
                    while ($row_th = mysqli_fetch_array($query_th)) {
                        $selected = '';
                        if ($row_lichgd['MATIETHOC'] == $row_th['MATIETHOC']) {
                            $selected = 'selected';
                        }
                    ?>
                        <option value="<?php echo $row_th['MATIETHOC'] ?>" <?php echo $selected ?>>
                            <?php echo $row_th['TENTIETHOC'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật Lịch Dạy</button>
        </form>

    </div>
    <?php
    }
    ?>
</body>

</html>