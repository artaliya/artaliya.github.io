<script src="../Js/config.js"></script>
<?php
if($_SERVER['HTTP_HOST'] == 'testdomain004.online'){
    $data = ['localhost','u847747079_db_username','$5zBHMefuQ6','u847747079_db_name']; //Hostinger (Localhost)
}else{
    $data = ['localhost','root','','hotel_db']; //XAMPP (Localhost)
}
$link = mysqli_connect($data[0] , $data[1] , $data[2] , $data[3]);















//INSERT
// $sql = "INSERT INTO `users` (`CustomerName`, `ContactName`, `City`, `PostalCode`, `Country`) VALUES ('Cardinal', 1, 'Stavanger', 4006, '$country')";
// $result = mysqli_query($link, $sql);
//INSERT END


//SELECT
// $sql = "SELECT `CustomerName`,`City` FROM `users` WHERE `Country`='$Mexico'";
// $result = mysqli_query($link, $sql);
// while ($r = mysqli_fetch_assoc($result)){
//     $testMail = $r['mail'];
// }
//SELECT END


// UPDATE
// $sql = "UPDATE `users` SET `ContactName`='Alfred', `City`='Frankfurt' WHERE `CustomerID`=1";
// $result = mysqli_query($link, $sql);
// UPDATE END



// setcookie('name', 'text', time() + (86400), "/"); // 86400 = 1 day



// header('Location: ../index');
// mysqli_close($link);
// exit();