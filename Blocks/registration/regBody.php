<?php
if(isset($_SESSION['regError'])){
    $regMessage = $_SESSION['regError'];
    $regColor = '#FC100D';
}elseif(isset($_SESSION['regSuccess'])){
    $regMessage = $_SESSION['regSuccess'];
    $regColor = '#4BB543';
}else{
    $regMessage = '';
    $regColor = '#ffffff';
}
?>







<div class="registration">
    <div class="regInner cont">
        <div class="riHeader headerSmall">Registration</div>
        <form action="Sql/dbaccess" method='post' class="riForm">
            <div class="rifMessage text" style="color: <?=$regColor?>"><?=$regMessage?></div>
            <div class="rifPart">
                <label for="salutation" class='text rifpLabel'>Salutation</label>
                <select id="salutation" class='rifpInput' name='salut'>
                    <option value="Sir">Sir</option>
                    <option value="Madam">Madam</option>
                </select>
            </div>
            <div class="rifPart">
                <label for="firstName" class='text rifpLabel'>First name</label>
                <input type="text" placeholder='First name' id='firstName' class='rifpInput' name='fName' required maxlength="50">
            </div>
            <div class="rifPart">
                <label for="lastName" class='text rifpLabel'>Last name</label>
                <input type="text" placeholder='Last name' id='lastName' class='rifpInput' name='lName' required maxlength="50">
            </div>
            <div class="rifPart">
                <label for="formEmail" class='text rifpLabel'>E-mail</label>
                <input type="email" placeholder='myemail@gmail.com' id='formEmail' class='rifpInput' name='email' required maxlength="50">
            </div>
            <div class="rifPart">
                <label for="username" class='text rifpLabel'>Username</label>
                <input type="text" placeholder='Username' id='username' class='rifpInput' name='user' required maxlength="50">
            </div>
            <div class="rifPart">
                <label for="password" class='text rifpLabel'>Password</label>
                <input type="password" placeholder='Password' id='password' class='rifpInput' name='pass' required maxlength="50">
            </div>
            <div class="rifPart">
                <label for="password" class='text rifpLabel'>Repeat password</label>
                <input type="password" placeholder='Repeat password' id='password' class='rifpInput' name='passRep' required maxlength="50">
            </div>
            <div class="rifPart">
                <input type="submit" id='submit' class='rifpSubmit' value='Register'>
            </div>
            <div class="rifLink">Already have account? <a href="login">Log in</a> </div>
        </form>
    </div>
</div>





<?php
if(isset($_SESSION['regError'])){
    // echo $_SESSION['regError'] . '<br>';
    unset($_SESSION['regError']);
}
if(isset($_SESSION['regSuccess'])){
    // echo $_SESSION['regSuccess'] . '<br>';
    unset($_SESSION['regSuccess']);
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