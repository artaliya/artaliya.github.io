<div class="cabinetBody">
    <div class="cbInner cont">
        <div class="cbiHeader headerSmall">List of reservations</div>
        <div class="cbiReservations">
            <table>
                <tr>
                    <th class='textBig'>Date</th>
                    <th class='textBig'>Additional Services</th>
                    <th class='textBig'>Rooms</th>
                    <th class='textBig'>Adults</th>
                    <th class='textBig'>Children</th>
                    <th class='textBig'>Price</th>
                    <th class='textBig'>Status</th>
                </tr>
                <?php
                //Filling table if there is reservations 
                if($_SERVER['HTTP_HOST'] == 'testdomain004.online'){
                    $data = ['localhost','u847747079_db_username','$5zBHMefuQ6','u847747079_db_name']; //Hostinger (Localhost)
                }else{
                    $data = ['localhost','root','','hotel_db']; //XAMPP (Localhost)
                }
                $user = $_SESSION['user'];
                $link = mysqli_connect($data[0] , $data[1] , $data[2] , $data[3]);
                $sql = "SELECT `checkIn`,`checkOut`, `breakfast`, `parkingLot`, `pets`, `adults`, `children`, `rooms`, `price`, `status`, `resDate`, `id` FROM `reservations` WHERE `user`='$user' ORDER BY `resDate`";
                $result = mysqli_query($link, $sql);
                
                while ($r = mysqli_fetch_assoc($result)){
                    $checkIn = $r['checkIn'];
                    $checkOut = $r['checkOut'];
                    $breakfast = $r['breakfast'];
                    if($breakfast == 'true'){
                        $breakfast = 'Breakfast';
                    }else{
                        $breakfast = 'No breakfast';
                    }
                    $parkingLot = $r['parkingLot'];
                    if($parkingLot == 'true'){
                        $parkingLot = 'Parking lot';
                    }else{
                        $parkingLot = 'No parking lot';
                    }
                    $pets = $r['pets'];
                    if($pets == 'true'){
                        $pets = 'With pets';
                    }else{
                        $pets = 'No pets';
                    }
                    $adults = $r['adults'];
                    $children = $r['children'];
                    $rooms = $r['rooms'];
                    $price = $r['price'];
                    $status = $r['status'];
                    $id = $r['id'];
                    if($status == 'new'){
                        $status = 'Reserved';
                        $cancel = "<a class='resCalcel' href='cancel?checkIn=" . $checkIn ."&checkOut=". $checkOut . "&rooms=" . $rooms . "&adults=" . $adults . "&children=" . $children . "&breakfast=" . $r['breakfast'] . "&parkingLot=" . $r['parkingLot'] . "&pets=" . $r['pets'] . "&id=" . $r['id'] . "'>Cancel</a>";
                    }elseif($status == 'canceled'){
                        $status = 'Canceled';
                        $cancel = '';
                    }else{
                        $status = 'Confirmed';
                        $cancel = '';
                    }
                    $resDate = $r['resDate'];

                    //Not showing reservation if status is confirmed and passed over 30 days
                    if($r['status'] == 'confirmed' || $r['status'] == 'canceled'){
                        $now = time();
                        $your_date = strtotime($resDate);
                        $datediff = $now - $your_date;
                        if(round($datediff / (60 * 60 * 24)) > 30){
                            continue;
                        }
                    }

                    echo "                
                    <tr>
                        <td>From ". $checkIn . " To " . "$checkOut" . $cancel ."</td>
                        <td>". $breakfast . ", " . $parkingLot . ", " . $pets ."</td>
                        <td>". $rooms ."</td>
                        <td>". $adults ."</td>
                        <td>". $children ."</td>
                        <td>$". $price ."</td>
                        <td>". $status ."</td>
                    </tr>
                ";
                }



                mysqli_close($link);
                ?>
            </table>
        </div>
    </div>
</div>