<?php include("../components/header.php")  ?>

<body>
    <?php include("../components/navbar.php")  ?>

    <!-- Trigger the modal with a button -->
    <!-- Modal Them LGD -->
    <div class="modal fade" id="modal-them-gv" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1 class="modal-title">Thêm Lịch Giảng Dạy</h1>
                </div>
                <div class="modal-body">
                    <form action="./them.php" method="POST">
                        <div class="form-group">
                            <label>Mã Giảng Dạy:</label>
                            <input class="form-control" type="text" name="MALGD">
                        </div>
                        <div class="form-group">
                            <label>Ngày Giảng Dạy:</label>
                            <input class="form-control" type="date" name="NGAYDAY">
                        </div>
                        <div class="form-group">
                            <label>Giáo Viên: </label>
                            <select class="form-control" name="MAGV" id="">
                                <?php
                                    include("../../config/config.php");
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
                                    include("../../config/config.php");
                                $sql_mh = "SELECT *FROM mon_hoc";
                                $query_mh = mysqli_query($connect, $sql_mh);
                                while ($row_mh = mysqli_fetch_array($query_mh)) {
                                ?>
                                    <option value="<?php echo $row_mh['MAMONHOC'] ?>">
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
                                    include("../../config/config.php");
                                $sql_lop = "SELECT *FROM lop_hoc";
                                $query_lop = mysqli_query($connect, $sql_lop);
                                while ($row_lop = mysqli_fetch_array($query_lop)) {
                                ?>
                                    <option value="<?php echo $row_lop['MALOP'] ?>">
                                        <?php echo $row_lop['TENLOP'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiết học: </label>
                            <select class="form-control" name="MATIETHOC" id="">
                                <?php
                                    include("../../config/config.php");
                                $sql_th = "SELECT *FROM tiet_hoc";
                                $query_th = mysqli_query($connect, $sql_th);
                                while ($row_th = mysqli_fetch_array($query_th)) {
                                ?>
                                    <option value="<?php echo $row_th['MATIETHOC'] ?>">
                                        <?php echo $row_th['MATIETHOC'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm Lịch Dạy</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <?php
                include("../../config/config.php");

            $search = $_GET['search'];
            $sql = "CALL TimLichDay('$search')";

            // Kết nối chuỗi sql vào CSDL
            $result = mysqli_query($connect, $sql);

            // Kiểm tra kết quả
            if (!$result) {
                die("Query failed: " . mysqli_error($connect));
        }
    ?>
    <div>
        <h1>Lịch Giảng Dạy</h1>
        <div class="d-flex mb-20">
            <form class="main-search-box mr-20" action="./lietketimkiem.php">
                <div class="input-group">
                    <input type="text" class="form-control h-46" placeholder="Search" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default h-46" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-them-gv">Thêm Lịch Dạy</button>

        </div>
        <h2>Kết quả kiểm kiểm cho "<?php echo $search ?>"</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã Lịch Giảng Dạy</th>
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
                        <td><?php echo $row['MALGD'] ?></td>
                        <td><?php echo $row['NGAYDAY'] ?></td>
                        <td><?php echo $row['TENGV'] ?></td>
                        <td><?php echo $row['TENMONHOC'] ?></td>
                        <td><?php echo $row['TENLOP'] ?></td>
                        <td><?php echo $row['TENTIETHOC'] ?></td>
                        <td><?php echo $row['GIOBATDAU'] ?></td>
                        <td><?php echo $row['GIOKETTHUC'] ?></td>
                        <td>
                            <a class="btn btn-warning" href="./xoa.php?malgd=<?php echo $row['MALGD'] ?>">Xóa</a>
                            <a class="btn btn-danger" href="./capnhatlichday.php?malgd=<?php echo $row['MALGD'] ?>">Sửa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>

        </table>
    </div>
</body>

</html>