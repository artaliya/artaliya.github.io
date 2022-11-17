<?php
if(isset($_SESSION['adminNewsSuccess'])){
    $text = $_SESSION['adminNewsSuccess'];
}else{
    $text = '';
}
?>








<div class="adminNews">
    <div class="anInner cont">
        <div class="aniHeader headerSmall">Add news</div>
        <form action="Sql/newsPost" method='post' class='aniForm' enctype="multipart/form-data">
            <div class="text" style='color: #4bb543'><?=$text?></div>
            <input type="file" style='display: none' id='inputFile' name='inputFile'>
            <div class="niItem">
                <img src="Images/img-def.png" alt="" class="niiImg" id='image'>
                <div class="niiTexts">
                    <input class="niitHeader" value="Title" id='titleInput' name='title'>
                    <textarea class="niitText text" id='textArea' name='text'>Text</textarea>
                </div>
            </div>
            <!-- <textarea name="" id="" cols="30" rows="10" class='anifTextarea taTitle'></textarea>
            <textarea name="" id="" cols="30" rows="10" class='anifTextarea taText'></textarea> -->
            <input type="submit" class='anifSubmit' value='Publish'>
        </form>
    </div>
</div>






<?php
unset($_SESSION['adminNewsSuccess']);
?>