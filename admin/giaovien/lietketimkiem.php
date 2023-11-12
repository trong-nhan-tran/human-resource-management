<?php include("../components/header.php") ?>

<body>
    <?php include("../components/navbar.php") ?>
    <div class="">
        <?php
            include("../../config/config.php");

            // Chuỗi tìm kiếm
            $search = $_GET['search'];

            // Tạo chuỗi sql chứa lệnh gọi stored procedure
            $sql = "CALL TimGiaoVien('$search')";

            // Kết nối chuỗi sql vào CSDL
            $result = mysqli_query($connect, $sql);

            // Kiểm tra kết quả
            if (!$result) {
                die("Query failed: " . mysqli_error($connect));
        }
        ?>
        <div>

            <div>
                <h1>Danh Sách Giáo Viên</h1>
                <div class="d-flex mb-20">
                    <form class="main-search-box mr-20" action="./lietketimkiem.php">
                        <div class="input-group">
                            <input type="text" class="form-control h-46" placeholder="Search" name="search">
                            <div class="input-group-btn">
                                <button class="btn btn-default h-46" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-them-gv">Thêm Giáo Viên</button>

                </div>
                <h2>Kết quả kiểm kiểm cho "<?php echo $search ?>"</h2>

                <table class="table table-bordered mt-24">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Giáo Viên</th>
                            <th>Tên Giáo Viên</th>
                            <th>Chức Vụ</th>
                            <th>Ngày Sinh</th>
                            <th>Giới Tính</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                            <th>CCCD</th>
                            <th>Email</th>
                            <th>Bộ Môn</th>
                            <th>Học Vấn</th>
                            <th>Giáo Viên Hạng</th>
                            <th>Bậc</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['MAGV'] ?></td>
                                <td><?php echo $row['TENGV'] ?></td>
                                <td><?php echo $row['TENCV'] ?></td>
                                <td><?php echo $row['NGAYSINHGV'] ?></td>
                                <td><?php echo $row['GIOITINHGV'] == 0 ? 'Nam' : 'Nữ'; ?></td>
                                <td><?php echo $row['DIACHIGV'] ?></td>
                                <td><?php echo $row['SDTGV'] ?></td>
                                <td><?php echo $row['CCCDGV'] ?></td>
                                <td><?php echo $row['EMAILGV'] ?></td>
                                <td><?php echo $row['TENMONHOC'] ?></td>
                                <td><?php echo $row['TRINHDO'] ?></td>
                                <td><?php echo $row['TENHANGGV'] ?></td>
                                <td><?php echo $row['TENBAC'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="./xoa.php?magiaovien=<?php echo $row['MAGV'] ?>">Xóa</a>
                                    <a class="btn btn-danger" href="./capnhatgiaovien.php?magiaovien=<?php echo $row['MAGV'] ?>">Sửa</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>



            <!-- Modal Them GV -->
            <div class="modal fade" id="modal-them-gv" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Giáo Viên</h4>
                        </div>
                        <div class="modal-body">
                            <form action="./them.php" method="POST">
                                <div class="form-group">
                                    <label>Mã Giáo Viên:</label>
                                    <input class="form-control" type="text" name="MAGV">
                                </div>
                                <div class="form-group">
                                    <label>Tên Giáo Viên:</label>
                                    <input class="form-control" type="text" name="TENGV">
                                </div>

                                <div class="form-group">
                                    <label>Chức Vụ: </label>
                                    <select class="form-control" name="MACV" id="">
                                        <?php
                                            include("../../config/config.php");
                                        $sql_cv = "SELECT *FROM chuc_vu";
                                        $query_cv = mysqli_query($connect, $sql_cv);
                                        while ($row_bh = mysqli_fetch_array($query_cv)) {
                                        ?>
                                            <option value="<?php echo $row_bh['MACV'] ?>">
                                                <?php echo $row_bh['TENCV'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Ngày Sinh:</label>
                                    <input class="form-control" type="date" name="NGAYSINHGV">
                                </div>
                                <div class="check-box">
                                    <label>Giới Tính:</label>
                                    <input type="radio" name="GIOITINHGV" value="nam" checked>Nam
                                    &emsp;
                                    <input type="radio" name="GIOITINHGV" value="nu" checked>Nữ
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ:</label>
                                    <input class="form-control" type="text" name="DIACHIGV">
                                </div>
                                <div class="form-group">
                                    <label>Số Điện Thoại:</label>
                                    <input class="form-control" type="text" name="SDTGV">
                                </div>
                                <div class="form-group">
                                    <label>CCCD:</label>
                                    <input class="form-control" type="text" name="CCCDGV">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input class="form-control" type="text" name="EMAILGV">
                                </div>
                                <div class="form-group">
                                    <label>Tên Tài Khoản:</label>
                                    <input class="form-control" type="text" name="TENTK">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu:</label>
                                    <input class="form-control" type="password" name="MATKHAU">
                                </div>
                                <div class="form-group">
                                    <label>Bảo Hiểm: </label>
                                    <select class="form-control" name="MABH" id="">
                                        <?php
                                            include("../../config/config.php");
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
                                            include("../../config/config.php");
                                        $sql_monhoc = "SELECT *FROM mon_hoc";
                                        $query_monhoc = mysqli_query($connect, $sql_monhoc);
                                        while ($row_monhoc = mysqli_fetch_array($query_monhoc)) {
                                        ?>
                                            <option value="<?php echo $row_monhoc['MAMONHOC'] ?>">
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
                                            include("../../config/config.php");
                                        $sql_tdhv = "SELECT *FROM trinh_do_hoc_van";
                                        $query_tdhv = mysqli_query($connect, $sql_tdhv);
                                        while ($row_tdhv = mysqli_fetch_array($query_tdhv)) {
                                        ?>
                                            <option value="<?php echo $row_tdhv['MATDHV'] ?>">
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
                                            include("../../config/config.php");
                                        $sql_hanggv = "SELECT *FROM hang_gv";
                                        $query_hanggv = mysqli_query($connect, $sql_hanggv);
                                        while ($row_hanggv = mysqli_fetch_array($query_hanggv)) {
                                        ?>
                                            <option value="<?php echo $row_hanggv['MAHANGGV'] ?>">
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
                                            include("../../config/config.php");
                                        $sql_bacluong = "SELECT *FROM bac_luong";
                                        $query_bacluong = mysqli_query($connect, $sql_bacluong);
                                        while ($row_bacluong = mysqli_fetch_array($query_bacluong)) {
                                        ?>
                                            <option value="<?php echo $row_bacluong['MABAC'] ?>">
                                                <?php echo $row_bacluong['TENBAC'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm Giáo Viên</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

</body>

</html>