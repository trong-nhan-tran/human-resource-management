<?php
include("../config/config.php");
$id = $_GET['magiaovien'];

$slq_gv_lich_day = "DELETE FROM `lich_giang_day` WHERE `lich_giang_day`.`MAGV`='" . $id . "'";
$slq_gv = "DELETE FROM `giao_vien` WHERE `giao_vien`.`MAGV`='" . $id . "'";
mysqli_query($connect, $slq_gv_lich_day);
mysqli_query($connect, $slq_gv);
header('Location: ./lietkegiaovien.php');
