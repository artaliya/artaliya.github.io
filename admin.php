<!DOCTYPE html>
<html lang="en">

    
<?php
$title = "Admin";
$keywords = 'keyword, keyword1, keyword2';
$describtion = 'Jazz Hotel Vienna';
require 'Blocks/head.php';
    //Protection from non-admins
    if(isset($_SESSION['role'])){
        if($_SESSION['role'] != 'admin'){
            header('Location:index');
            exit;
        }
    }else{
        header('Location:index');
        exit;
    }
    //Protection END
require 'Blocks/header.php';
require 'Blocks/admin/adminResBody.php';
require 'Blocks/admin/adminUsers.php';
require 'Blocks/admin/adminNews.php';
require 'Blocks/admin/adminSeeNews.php';
?>

<link rel="stylesheet" href="Css/cabinet/cabinetList.css">
<link rel="stylesheet" href="Css/news/newsBody.css">
<link rel="stylesheet" href="Css/admin/adminResBody.css">
<link rel="stylesheet" href="Css/admin/adminUsers.css">
<link rel="stylesheet" href="Css/admin/adminNews.css">
<link rel="stylesheet" href="Css/admin/adminSeeNews.css">

<?php
// require "Blocks/"
?>

















<script src='Js/config.js'></script>
<script src='Js/admin.js'></script>

</body>
</html>