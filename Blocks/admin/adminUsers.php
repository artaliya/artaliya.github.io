<div class="adminUsers">
    <div class="auInner cont">
        <!-- Copy from cabinet -->
        <div class="cbInner cont">
                <div class="cbiHeader headerSmall">List of users</div>
                <div class="cbiReservations">
                    <form action="Sql/adminChange" method='post'>
                    <table>
                        <tr>
                            <th class='textBig'>Id</th>
                            <th class='textBig'>Username</th>
                            <th class='textBig'>Email</th>
                            <th class='textBig'>Salutation</th>
                            <th class='textBig'>First name</th>
                            <th class='textBig'>Last name</th>
                            <th class='textBig'>Role</th>
                            <th class='textBig'>Status</th>
                            <th class='textBig'>Registration date</th>
                            <th class='textBig'>Password</th>
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
                        $sql = "SELECT `id`,`username`, `email`, `salutation`, `fName`, `lName`, `role`, `status`, `regDate` FROM `users` ORDER BY `regDate`";
                        $result = mysqli_query($link, $sql);
                        $usersCount = 0;
                        
                        while ($r = mysqli_fetch_assoc($result)){
                            $id = $r['id'];
                            $username = $r['username'];
                            $email = $r['email'];
                            $salutation = $r['salutation'];
                            $fName = $r['fName'];
                            $lName = $r['lName'];
                            $role = $r['role'];
                            $status = $r['status'];
                            $regDate = $r['regDate'];

                            //Showing users in inputs
                            echo "                
                            <tr class='usersTr'>
                                <td>". $id ."</td>
                                <td><input type='text' class='userData username' name='username-". $usersCount ."' value='". $username ."'></td>
                                <td><input type='email' class='userData email' name='email-". $usersCount ."' value='". $email ."'></td>
                                <td><input type='text' class='userData salutation' name='salutation-". $usersCount ."' value='". $salutation ."'></td>
                                <td><input type='text' class='userData fName' name='fName-". $usersCount ."' value='". $fName ."'></td>
                                <td><input type='text' class='userData lName' name='lName-". $usersCount ."' value='". $lName ."'></td>
                                <td><input type='text' class='userData role' name='role-". $usersCount ."' value='". $role ."'></td>
                                <td><input type='text' class='userData status' name='status-". $usersCount ."' value='". $status ."'></td>
                                <td><input type='text' class='userData regDate' name='regDate-". $usersCount ."' value='". $regDate ."'></td>
                                <td><input type='text' class='userData password' name='password-". $usersCount ."' value='' placeholder='Type to change'></td>
                            </tr>
                            <input type='text' class='userData usernameOld' style='display:none' name='usernameOld-". $usersCount ."' value='". $username ."'>
                            ";
                            $usersCount ++;
                        }
                        
                        
                        
                        mysqli_close($link);
                        ?>
                    </table>
                    <input type='text' name='usersCount' style='display:none' value='<?=$usersCount?>'>
                    <div class="cbirButtons">
                        <div class="cbirbReset text" id='reset'>Reset settings</div>
                        <input type='submit' class="cbirbSave text" id='save' value='Save changes'>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Copy from cabinet END-->
    </div>
</div>