<?php
if(isset($_SESSION['user'])){
    $text = 'Cabinet';
    $link = 'cabinet';
}else{
    $text = 'Login';
    $link = 'login';
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="index" class="navbar-brand"><img src="Images/logo.png" alt="" class='header-logo'></a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="<?=$mainUrl?>" class="nav-item nav-link active">Home</a>
                <a href="imprint" class="nav-item nav-link active">Imprint</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Messages</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Inbox</a>
                        <a href="#" class="dropdown-item">Sent</a>
                        <a href="#" class="dropdown-item">Drafts</a>
                    </div>
                </div> -->
                <a href="news" class="nav-item nav-link active" tabindex="-1">News</a>
                <a href="help" class="nav-item nav-link active" tabindex="-1">Help/FAQs</a>
                <!-- <a href="#" class="nav-item nav-link disabled" tabindex="-1">Reports</a> -->
            </div>
            <div class="navbar-nav ms-auto">
                <a href="<?=$link?>" class="nav-item nav-link active"><?=$text?></a>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <a href="admin" class="nav-item nav-link active">Admin</a>
                <?php endif; ?>
                <?php if(isset($_SESSION['user'])): ?>
                    <a href="logout" class="nav-item nav-link active">Log out</a>
                <?php endif; ?>
                <!-- <a href="#" class="nav-item nav-link active">Login</a> -->
            </div>
        </div>
    </div>
</nav>




<?php
unset($text);
unset($link);
?>