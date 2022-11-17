<script src="../Js/config.js"></script>
<?php
session_start();
include 'Sql/sql.php';


$checkIn = $_GET['checkIn'];
$checkOut = $_GET['checkOut'];
if($_SESSION['role'] == 'admin'){
    $user = $_GET['user'];
}else{
    $user = $_SESSION['user'];
}
$rooms = $_GET['rooms'];
$adults = $_GET['adults'];
$children = $_GET['children'];
$breakfast = $_GET['breakfast'];
$parkingLot = $_GET['parkingLot'];
$pets = $_GET['pets'];
$id = $_GET['id'];



$sql = "UPDATE `reservations` SET `status`='canceled' WHERE `checkIn`='$checkIn' AND `checkOut`='$checkOut' AND `user`='$user' AND `rooms`='$rooms' AND `adults`='$adults' AND `children`='$children' AND `breakfast`='$breakfast' AND `parkingLot`='$parkingLot' AND `pets`='$pets' AND `id`='$id' LIMIT 1";
$result = mysqli_query($link, $sql);













if(isset($_GET['to'])){
    if($_GET['to'] == 'admin'){
        header('Location: ../admin');
    }
}else{
    header('Location: ../cabinet');
}
mysqli_close($link);
exit();