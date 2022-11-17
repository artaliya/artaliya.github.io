<?php
if(isset($_SESSION['changeError'])){
    $colorCode = '#d32f2f';
    $message = $_SESSION['changeError'];
    $display = 'block';
}elseif(isset($_SESSION['changeSuccess'])){
    $colorCode = '#4bb543';
    $message = $_SESSION['changeSuccess'];
    $display = 'block';
}else{
    $colorCode = '#ffffff';
    $message = '';
    $display = 'none';
}

?>





<div class="cData">
    <div class="cdInner cont">
        <div class="cdiHeader headerSmall">Profile</div>
        <div class="cdiText text" style='color: <?=$colorCode?>; display: <?=$display?>'><?=$message?></div>
        <form class="cdiData" method='post' action='Sql/changeData'>
            <div class="cdidItem">
                <div class="cdidiName text">Login: <?=$_SESSION['user']?><span class='textSmall cdidinSpan'>Change</span></div>
                <input type="text" class="cdidiChange" placeholder='New username' maxlength="50" name='user' autocomplete="off" value=''>
            </div>
            <div class="cdidItem">
                <div class="cdidiName text">First name: <?=$_SESSION['fName']?><span class='textSmall cdidinSpan'>Change</span></div>
                <input type="text" class="cdidiChange" placeholder='New first name' maxlength="50" name='fName'>
            </div>
            <div class="cdidItem">
                <div class="cdidiName text">Last name: <?=$_SESSION['lName']?><span class='textSmall cdidinSpan'>Change</span></div>
                <input type="text" class="cdidiChange" placeholder='New last name' maxlength="50" name='lName'>
            </div>
            <div class="cdidItem">
                <div class="cdidiName text">Salutation: <?=$_SESSION['salutation']?><span class='textSmall cdidinSpan'>Change</span></div>
                <input type="text" class="cdidiChange" placeholder='New salutation' maxlength="50" name='salutation'>
            </div>
            <div class="cdidItem">
                <div class="cdidiName text">Email: <?=$_SESSION['email']?><span class='textSmall cdidinSpan'>Change</span></div>
                <input type="email" class="cdidiChange" placeholder='New email' maxlength="50" name='email'>
            </div>
            <div class="cdidItemPassword">
                <div class="cdidiName text"><span class='textSmall cdidinSpan cdidinSpanPassword' id='cdidinSpanPassword'>Change password</span></div>
                <input type="password" class="cdidiPass" placeholder='Old password' maxlength="50" name='passOld'>
                <input type="password" class="cdidiPass" placeholder='New password' maxlength="50" name='pass'>
                <input type="password" class="cdidiPass" placeholder='Repeat new password' maxlength="50" name='passRep'>
            </div>
            <input type="submit" class='cdidSubmit' id='cdidSubmit' value='Save all changes'>
        </form>
    </div>
</div>



<?php
unset($colorCode);
unset($message);
unset($display);
unset($_SESSION['changeError']);
unset($_SESSION['changeSuccess']);
?>