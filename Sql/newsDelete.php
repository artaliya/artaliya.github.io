<script src="../Js/config.js"></script>
<?php
session_start();
if($_SESSION['role'] != 'admin'){
    header('Location: ../');
    mysqli_close($link);
    exit();
}
include 'sql.php';

$id = $_GET['id'];

//Geting image name if exists and deleting
$sql = "SELECT `image` FROM `news` WHERE `id`='$id'";
$result = mysqli_query($link, $sql);
while ($r = mysqli_fetch_assoc($result)){
    $imageName = $r['image'];

    if($imageName == 'null'){
        
    }else{
        unlink('../Images/News/'.$imageName);
    }
}


//Deleting news from database
$sql = "DELETE FROM `news` WHERE `id`='$id'";
$result = mysqli_query($link, $sql);





header('Location: ../admin');
mysqli_close($link);
exit();