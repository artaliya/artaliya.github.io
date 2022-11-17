<script src="../Js/config.js"></script>
<?php
session_start();
if($_SESSION['role'] != 'admin'){
    header('Location: ../');
    mysqli_close($link);
    exit();
}
include 'Sql/sql.php';


$checkIn = $_GET['checkIn'];
$checkOut = $_GET['checkOut'];
$user = $_GET['user'];
$rooms = $_GET['rooms'];
$adults = $_GET['adults'];
$children = $_GET['children'];
$breakfast = $_GET['breakfast'];
$parkingLot = $_GET['parkingLot'];
$pets = $_GET['pets'];
$id = $_GET['id'];



$sql = "UPDATE `reservations` SET `status`='confirmed' WHERE `checkIn`='$checkIn' AND `checkOut`='$checkOut' AND `user`='$user' AND `rooms`='$rooms' AND `adults`='$adults' AND `children`='$children' AND `breakfast`='$breakfast' AND `parkingLot`='$parkingLot' AND `pets`='$pets' AND `id`='$id' LIMIT 1";
$result = mysqli_query($link, $sql);














header('Location: ../admin');
mysqli_close($link);
exit();