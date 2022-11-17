<?php
include 'Blocks/head.php';
// unset($_SESSION['user']);
// unset($_SESSION['fName']);
// unset($_SESSION['lName']);
// unset($_SESSION['role']);
// unset($_SESSION['email']);
// unset($_SESSION['salutation']);
session_start();
session_destroy();
header('Location:../');