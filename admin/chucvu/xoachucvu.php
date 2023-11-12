<?php
include("../../config/config.php");
$id = $_GET['idchucvu'];
$slq_xoa = "DELETE FROM `chuc_vu` WHERE `chuc_vu`.`MACV`='" . $id . "'";
mysqli_query($connect, $slq_xoa);
header('Location: ./hienthichucvu.php');
