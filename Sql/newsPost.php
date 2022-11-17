<script src="../Js/config.js"></script>
<?php
session_start();
if($_SESSION['role'] != 'admin'){
    header('Location: ../');
    mysqli_close($link);
    exit();
}
include 'sql.php';

//Replacing ' with '' to avoid errors in database
$title = $_POST['title'];
$title = str_replace("'", "''", $title);
// echo $title . '<br>';
$text = $_POST['text'];
$text = str_replace("'", "''", $text);
// echo $text . '<br>';



if($_FILES['inputFile']['name'] != ''){
    //Stores the filename as it was on the client computer.
        //Protection from name matching
        $randNum = rand(0,10) . rand(0,10) . rand(0,10) . rand(0,10) . rand(0,10) . rand(0,10) . rand(0,10) . rand(0,10) . rand(0,10) . rand(0,10) . rand(0,10);
    
        $imagename = $_FILES['inputFile']['name'];
        if(str_contains($imagename, '.png')){
            $imagename = str_replace(".png",($randNum.'.png'),$_FILES['inputFile']['name']);
        }
        if(str_contains($imagename, '.webp')){
            $imagename = str_replace(".webp",($randNum.'.webp'),$_FILES['inputFile']['name']);
        }
        if(str_contains($imagename, '.jpg')){
            $imagename = str_replace(".jpg",($randNum.'.jpg'),$_FILES['inputFile']['name']);
        }
        if(str_contains($imagename, '.jpeg')){
            $imagename = str_replace(".jpeg",($randNum.'.jpeg'),$_FILES['inputFile']['name']);
        }
        if(str_contains($imagename, '.jfif')){
            $imagename = str_replace(".jfif",($randNum.'.jfif'),$_FILES['inputFile']['name']);
        }
    
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES['inputFile']['type'];
    //Stores any error codes from the upload.
    $imageerror = $_FILES['inputFile']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['inputFile']['tmp_name'];
    
    //The path you wish to upload the image to
    $imagePath = "../Images/News/";
    
    if(is_uploaded_file($imagetemp)) {
        if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
            echo "Sussecfully uploaded your image.";
        }
        else {
            echo "Failed to move your image.";
        }
    }
    else {
        echo "Failed to upload your image.";
    }
    $sql = "INSERT INTO `news` (`title`, `text`, `image`) VALUES ('$title', '$text', '$imagename')";
    $result = mysqli_query($link, $sql);
}else{
    $sql = "INSERT INTO `news` (`title`, `text`, `image`) VALUES ('$title', '$text', 'null')";
    $result = mysqli_query($link, $sql);
}



// echo $title . ' --title<br>';
// echo $text . ' --text<br>';







$_SESSION['adminNewsSuccess'] = 'Succesfuly uploaded';
header('Location: ../admin');
mysqli_close($link);
exit();