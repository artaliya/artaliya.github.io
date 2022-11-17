<script src="../Js/config.js"></script>
<?php
session_start();
include 'sql.php';




$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];
if(isset($_POST['add0'])){
    $breakfast = 'true';
}else{
    $breakfast = 'false';
}
if(isset($_POST['add1'])){
    $parking = 'true';
}else{
    $parking = 'false';
}
if(isset($_POST['add2'])){
    $pets = 'true';
}else{
    $pets = 'false';
}
$adults = $_POST['adultCount'];
$children = $_POST['childrenCount'];
$rooms = $_POST['roomCount'];
$price = $_POST['price'];
$user = $_SESSION['user'];

$sql = "INSERT INTO `reservations` (`user`, `checkIn`, `checkOut`, `breakfast`, `parkingLot`, `pets`, `adults`, `children`, `rooms`, `status`, `price`) VALUES ('$user', '$checkIn', '$checkOut', '$breakfast', '$parking', '$pets', '$adults', '$children', '$rooms', 'new', '$price')";
$result = mysqli_query($link, $sql);


// echo $checkIn . ' -- checkIn<br>';
// echo $checkOut . ' -- checkOut<br>';
// echo $breakfast . ' -- breakfast<br>';
// echo $parking . ' -- parking<br>';
// echo $pets . ' -- pets<br>';
// echo $adults . ' -- adults<br>';
// echo $children . ' -- children<br>';
// echo $rooms . ' -- rooms<br>';




header('Location: ../cabinet');
mysqli_close($link);
exit();