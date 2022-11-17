<div class="adminSeeNews">
    <div class="asnInner cont">
    <table>
                        <tr>
                            <th class='textBig'>Title</th>
                            <th class='textBig'>Text</th>
                            <th class='textBig'>Image link</th>
                            <th class='textBig'>Posted date</th>
                            <th class='textBig'>Delete</th>
                        </tr>
                        <?php
                        //Filling table if there is reservations 
                        if($_SERVER['HTTP_HOST'] == 'testdomain004.online'){
                            $data = ['localhost','u847747079_db_username','$5zBHMefuQ6','u847747079_db_name']; //Hostinger (Localhost)
                        }else{
                            $data = ['localhost','root','','hotel_db']; //XAMPP (Localhost)
                        }
                        $link = mysqli_connect($data[0] , $data[1] , $data[2] , $data[3]);
                        $sql = "SELECT `id`, `title`,`text`, `image`, `postDate` FROM `news` ORDER BY `postDate`";
                        $result = mysqli_query($link, $sql);
                        
                        while ($r = mysqli_fetch_assoc($result)){
                            $id = $r['id'];
                            $title = $r['title'];
                            $text = $r['text'];
                            $image = $r['image'];
                            $postDate = $r['postDate'];

                            //Showing users in inputs
                            echo "                
                            <tr class='usersTr'>
                                <td>$title</td>
                                <td class='newsText'>$text</td>
                                <td>$image</td>
                                <td>$postDate</td>
                                <td><a class='newsDelete' href='Sql/newsDelete?id=$id'>Delete</a></td>
                            </tr>
                            ";
                        }
                        
                        
                        
                        mysqli_close($link);
                        ?>
                    </table>
    </div>
</div>