<script src="../Js/config.js"></script>
<?php
session_start();
if($_SESSION['role'] != 'admin'){
    header('Location: ../');
    mysqli_close($link);
    exit();
}
include 'sql.php';

$usersCount = $_POST['usersCount'];



for($i = 0; $i < $usersCount; $i++){
    echo $_POST['username-' . $i] . '<br>';
    $usernameOld = $_POST['usernameOld-' . $i];
    $username = $_POST['username-' . $i];
    $email = $_POST['email-' . $i];
    $salutation = $_POST['salutation-' . $i];
    $fName = $_POST['fName-' . $i];
    $lName = $_POST['lName-' . $i];
    $role = $_POST['role-' . $i];
    $status = $_POST['status-' . $i];
    $password = $_POST['password-' . $i];
    if($password != ''){
        $password = md5($password);
        $sql = "UPDATE `users` SET `username`='$username', `email`='$email', `salutation`='$salutation', `fName`='$fName', `lName`='$lName', `role`='$role', `status`='$status', `password`='$password' WHERE `username`='$usernameOld'";
        $result = mysqli_query($link, $sql);
    }else{
        $sql = "UPDATE `users` SET `username`='$username', `email`='$email', `salutation`='$salutation', `fName`='$fName', `lName`='$lName', `role`='$role', `status`='$status' WHERE `username`='$usernameOld'";
        $result = mysqli_query($link, $sql);
    }


    if($usernameOld == $_SESSION['user']){
        $_SESSION['user'] = $username;
        $_SESSION['fName'] = $fName;
        $_SESSION['lName'] = $lName;
        $_SESSION['role'] = $role;
        $_SESSION['email'] = $email;
        $_SESSION['salutation'] = $salutation;
        $_SESSION['status'] = $status;
    }
}




header('Location: ../admin');
mysqli_close($link);
exit();