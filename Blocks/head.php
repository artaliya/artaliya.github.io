<?php
    session_start();
    $siteName = "Hotel";
    $siteUrl = '';
    date_default_timezone_set('Asia/Yerevan');
?>
<head>
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?=$siteName?>">
    <meta property="og:title" content="<?=$title?>">
    <meta property="og:description" content="<?=$describtion?>">
    <meta property="og:url" content="<?=$siteUrl?>">
    <meta property="og:locale" content="">
    <meta property="og:image" content="">

    <meta charset="UTF-8">
    <meta name="description" content="<?=$describtion?>">
    <meta name="keywords" content="<?=$keywords?>">
    <title><?=$title?></title>
    <link rel="shortcut icon" href="">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/header.css">

    <!-- <script src="Js/header.js"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate" />


</head>
<body>




<?php
$ip = isset($_SERVER['HTTP_CLIENT_IP']) 
    ? $_SERVER['HTTP_CLIENT_IP'] 
    : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) 
      ? $_SERVER['HTTP_X_FORWARDED_FOR'] 
      : $_SERVER['REMOTE_ADDR']);

function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}
$mainUrl = url();

?>