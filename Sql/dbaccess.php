<script src="../Js/config.js"></script>
<?php
session_start();
include 'sql.php';





// Checking if user is register or login
if(isset($_POST['email'])){
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $salutation = $_POST['salut'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $passRep = md5($_POST['passRep']);

    //Checking if username or email exists
    $sql = "SELECT `username`,`email` FROM `users` WHERE `username`='$user' OR `email`='$email'";
    $result = mysqli_query($link, $sql);
    while ($r = mysqli_fetch_assoc($result)){
        $checkMail = $r['email'];
        $checkUsernames = $r['username'];
        if(isset($checkMail)){
            if($checkMail == $email){
                $_SESSION['regError'] = 'This email is already registered';
                header('Location: ../registration');
                mysqli_close($link);
                exit();
            }
            if($checkUsernames == $user){
                $_SESSION['regError'] = 'This username is already registered';
                header('Location: ../registration');
                mysqli_close($link);
                exit();
            }
        }
    }
    //Checking if password matches
    if($pass !== $passRep){
        $_SESSION['regError'] = "Passwords didn't macth";
        header('Location: ../registration');
        mysqli_close($link);
        exit(); 
    }


    //Registering if there is no problems
    $sql = "INSERT INTO `users` (`username`, `password`, `email`, `salutation`, `fName`, `lName`, `role`, `status`) VALUES ('$user', '$pass', '$email', '$salutation', '$fName', '$lName', 'user')";
    $result = mysqli_query($link, $sql);
    $_SESSION['logSuccess'] = 'Successfully registered';
    header('Location: ../login');
    mysqli_close($link);
    exit();

}else{
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    //Checking login and password on database
    $sql = "SELECT `username`,`password`, `email`, `salutation`, `fName`, `lName`, `role`, `status` FROM `users` WHERE `username`='$user'";
    $result = mysqli_query($link, $sql);
    while ($r = mysqli_fetch_assoc($result)){
        $checkUser = $r['username'];
        $checkPass = $r['password'];
        $checkFName = $r['fName'];
        $checkLName = $r['lName'];
        $checkRole = $r['role'];
        $checkEmail = $r['email'];
        $checkSalutation = $r['salutation'];
        $checkStatus = $r['status'];

        //If login and password is correct, making sessions
        if($checkUser == $user && $checkPass == $pass){
            //If status is inactive, leaving page and warning
            if($checkStatus == 'inactive'){
                $_SESSION['logError'] = 'Your account is inactive';
                header('Location: ../login');
                mysqli_close($link);
                exit();
            }
            $_SESSION['user'] = $user;
            $_SESSION['fName'] = $checkFName;
            $_SESSION['lName'] = $checkLName;
            $_SESSION['role'] = $checkRole;
            $_SESSION['email'] = $checkEmail;
            $_SESSION['salutation'] = $checkSalutation;
            $_SESSION['status'] = $checkStatus;
            header('Location: ../cabinet');
            mysqli_close($link);
            exit();
        }else{
            //If login and password is incorrect, returning
            $_SESSION['logError'] = 'Wromg username or password';
            header('Location: ../login');
            mysqli_close($link);
            exit();
        }
    }
}



































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



header('Location: ../login');
mysqli_close($link);
exit();