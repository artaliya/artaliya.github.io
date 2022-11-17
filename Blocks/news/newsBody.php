<!-- https://www.hotelnewsresource.com/HNR-index.html -->
<div class="news">
    <div class="newsInner cont">
        <div class="niHeader headerSmall">News</div>

        <?php
        if($_SERVER['HTTP_HOST'] == 'testdomain004.online'){
            $data = ['localhost','u847747079_db_username','$5zBHMefuQ6','u847747079_db_name']; //Hostinger (Localhost)
        }else{
            $data = ['localhost','root','','hotel_db']; //XAMPP (Localhost)
        }
        $link = mysqli_connect($data[0] , $data[1] , $data[2] , $data[3]);

        
        $sql = "SELECT `title`,`text`, `image`, `postDate` FROM `news` ORDER BY `postDate`";
        $result = mysqli_query($link, $sql);
        while ($r = mysqli_fetch_assoc($result)){
            $title = $r['title'];
            $text = $r['text'];
            $image = $r['image'];
            $postDate = $r['postDate'];

            if($image == 'null'){
                $image = '';
            }else{
                $image = "<img src='Images/News/$image' alt='' class='niiImg'>";
            }
    
            echo "
                <div class='niItem'>
                    $image
                    <div class='niiTexts'>
                        <div class='niitHeader'>$title</div>
                        <div class='niitText text'>$text</div>
                    </div>
                </div>
            ";
        }

        
        ?>

        <!-- <div class="niItem">
            <img src="Images/news0.jpg" alt="" class="niiImg">
            <div class="niiTexts">
                <div class="niitHeader">IHG Signs Voco Paris Porte De Clichy Hotel</div>
                <div class="niitText text">Located in the immediate vicinity of the 17th arrondissement (district), voco Paris Porte de Clichy will be a 264-key conversion property and has recently been signed in conjunction with Catella Hospitality, a company renowned for its strategic partnerships in Europe's gateway cities such as Berlin. This is the second voco property in the city of lights after the 102-key voco Paris Montparnasse opened in 2020.</div>
            </div>
        </div> -->
        
    </div>
</div>
