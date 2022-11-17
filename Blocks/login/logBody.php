<?php
if(isset($_SESSION['logError'])){
    $logMessage = $_SESSION['logError'];
    $logColor = '#FC100D';
}elseif(isset($_SESSION['logSuccess'])){
    $logMessage = $_SESSION['logSuccess'];
    $logColor = '#4BB543';
}else{
    $logMessage = '';
    $logColor = '#ffffff';
}
?>




<div class="registration">
    <div class="regInner cont">
        <div class="riHeader headerSmall">Log in</div>
        <form action="Sql/dbaccess" method='post' class="riForm">
            <div class="rifMessage text" style="color: <?=$logColor?>"><?=$logMessage?></div>
            <div class="rifPart">
                <label for="username" class='text rifpLabel'>Username</label>
                <input type="text" placeholder='Username' id='username' class='rifpInput' name='user' required>
            </div>
            <div class="rifPart">
                <label for="password" class='text rifpLabel'>Password</label>
                <input type="password" placeholder='Password' id='password' class='rifpInput' name='pass' required>
            </div>
            <div class="rifPart">
                <input type="submit" id='submit' class='rifpSubmit' value='Log in'>
            </div>
            <div class="rifLink">Don't have account? <a href="registration">Sign up</a> </div>
        </form>
    </div>
</div>



<?php
if(isset($_SESSION['logError'])){
    // echo $_SESSION['logError'] . '<br>';
    unset($_SESSION['logError']);
}
if(isset($_SESSION['logSuccess'])){
    // echo $_SESSION['logSuccess'] . '<br>';
    unset($_SESSION['logSuccess']);
}
?>

<!-- 
Salutation
ii. First name
iii. Last name
iv. E-mail address
v. Username
vi. Password (must be entered 2x) 
-->