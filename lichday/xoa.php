<?php
include("../config/config.php");
$id = $_GET['malgd'];
$slq_xoa = "DELETE FROM `lich_giang_day` WHERE `lich_giang_day`.`MALGD`='" . $id . "'";
mysqli_query($connect, $slq_xoa);
header('Location: ./lietkelichday.php');
