<script src="../Js/config.js"></script>
<?php
session_start();
include 'sql.php';

$oldUser = $_SESSION['user'];

//If new username or/and new email exists and there is problems with password, going back and warning
if(isset($_POST['email']) && $_POST['email'] != ''){
    $email = $_POST['email'];

        //Checking if email exists
        $sql = "SELECT `email`, `username` FROM `users` WHERE `email`='$email'";
        $result = mysqli_query($link, $sql);
        while ($r = mysqli_fetch_assoc($result)){
            $checkEmails = $r['email'];
            $checkUsers = $r['email'];
            if(isset($checkEmails)){
                if($checkEmails == $email){
                    if($checkEmails == $_SESSION['email']){
                        unset($_POST['email']);
                    }else{
                        $_SESSION['changeError'] = 'This email already exists';
                        header('Location: ../cabinet');
                        mysqli_close($link);
                        exit();
                    }
                }
            }
        }
}
if(isset($_POST['user']) && $_POST['user'] != ''){
    $user = $_POST['user'];

        //Checking if username exists
        $sql = "SELECT `username` FROM `users` WHERE `username`='$user'";
        $result = mysqli_query($link, $sql);
        while ($r = mysqli_fetch_assoc($result)){
            $checkUsernames = $r['username'];
            if(isset($checkUsernames)){
                if($checkUsernames == $user){
                    if($checkUsernames == $oldUser){
                        unset($_POST['user']);
                    }else{
                        $_SESSION['changeError'] = 'This username is already registeresd';
                        header('Location: ../cabinet');
                        mysqli_close($link);
                        exit();
                    }
                }
            }
        }
}
//Checking if there is problem with passwords
if(isset($_POST['passOld']) && isset($_POST['pass']) && isset($_POST['passRep'])  && $_POST['passOld'] != '' && $_POST['pass'] != '' && $_POST['passRep'] != ''){
    $passOld = md5($_POST['passOld']);
    $pass = md5($_POST['pass']);
    $passRep = md5($_POST['passRep']);

        //Checking if password maches old password
        $sql = "SELECT `password` FROM `users` WHERE `username`='$oldUser'";
        $result = mysqli_query($link, $sql);
        while ($r = mysqli_fetch_assoc($result)){
            $checkPassword = $r['password'];
            if(isset($checkPassword)){
                if($checkPassword != $passOld){
                    $_SESSION['changeError'] = "Password didn't mach old password";
                    header('Location: ../cabinet');
                    mysqli_close($link);
                    exit();
                }
            }
        }

        //Returning if new passwords didn't mach
        if($pass != $passRep){
            $_SESSION['changeError'] = "New passwords didn't mach";
            header('Location: ../cabinet');
            mysqli_close($link);
            exit();
        }

        //Changing password if everything ok
        $sql = "UPDATE `users` SET `password`='$pass' WHERE `username`='$oldUser'";
        $result = mysqli_query($link, $sql);
}

//If new username or/and new email is free, changing all set values

if(isset($_POST['email']) && $_POST['email'] != ''){
    $sql = "UPDATE `users` SET `email`='$email' WHERE `username`='$oldUser'";
    $result = mysqli_query($link, $sql);

    $_SESSION['email'] = $email;
}
if(isset($_POST['fName']) && $_POST['fName'] != ''){
    $fName = $_POST['fName'];

    $sql = "UPDATE `users` SET `fName`='$fName' WHERE `username`='$oldUser'";
    $result = mysqli_query($link, $sql);

    $_SESSION['fName'] = $fName;
}
if(isset($_POST['lName']) && $_POST['lName'] != ''){
    $lName = $_POST['lName'];

    $sql = "UPDATE `users` SET `lName`='$lName' WHERE `username`='$oldUser'";
    $result = mysqli_query($link, $sql);

    $_SESSION['lName'] = $lName;
}
if(isset($_POST['salutation']) && $_POST['salutation'] != ''){
    $salutation = $_POST['salutation'];

    $sql = "UPDATE `users` SET `salutation`='$salutation' WHERE `username`='$oldUser'";
    $result = mysqli_query($link, $sql);

    $_SESSION['salutation'] = $salutation;
}
if(isset($_POST['user']) && $_POST['user'] != ''){
    $sql = "UPDATE `users` SET `username`='$user' WHERE `username`='$oldUser'";
    $result = mysqli_query($link, $sql);

    $_SESSION['user'] = $user;
}









$_SESSION['changeSuccess'] = 'Changes succesfuly saved';
header('Location: ../cabinet');
mysqli_close($link);
exit();