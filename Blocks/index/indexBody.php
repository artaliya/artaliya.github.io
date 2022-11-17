<?php

// echo date('Y-m-d');
?>

<div class="indexBody">
    <div class="ibInner cont">
        <div class="ibiHeader header">Jazz Hotel Vienna</div>
        <div class="ibiDesc text">We provide best hotel services for business meetings and family trips</div>
        <form class="ibiRes" action='Sql/dbReservations' method='post'>
            <div class="ibirItem">
                <div class="ibiriTop">
                    <img src="Images/calendar.png" alt="" class="ibiritImg">
                    <div class="ibiritText text">Check in - Check out </div>
                </div>
                <div class="ibiriDrop ibiriDrop0">
                    <div class="ibiridText text">Check In</div>
                    <input type="date" name="checkIn" id='checkIn' value="<?=date('Y-m-d')?>" min="<?=date('Y-m-d')?>" max="<?=date('Y-m-d', strtotime("+5 month"))?>">
                    <div class="ibiridText text">Check Out</div>
                    <input type="date" name="checkOut" id='checkOut' value="<?=date('Y-m-d', strtotime("+3 day"))?>" min="<?=date('Y-m-d', strtotime("+1 day"))?>" max="<?=date('Y-m-d', strtotime("+6 month"))?>">
                </div>
            </div>
            <div class="ibirItem">
                <div class="ibiriTop">
                    <img src="Images/plate.png" alt="" class="ibiritImg">
                    <div class="ibiritText text">Additional Services </div>
                </div>
                <div class="ibiriDrop ibiriDrop1">
                    <div class="addPack">
                        <div class="addpName">Breakfast ($15)</div>
                        <input type="checkbox" name='add0' class="addpCheckbox">
                    </div>
                    <div class="addPack">
                        <div class="addpName">Parking lot ($30)</div>
                        <input type="checkbox" name='add1' class="addpCheckbox">
                    </div>
                    <div class="addPack">
                        <div class="addpName">Bringing pets ($20)</div>
                        <input type="checkbox" name='add2' class="addpCheckbox">
                    </div>
                </div>
            </div>
            <div class="ibirItem">
                <div class="ibiriTop">
                    <img src="Images/preson.png" alt="" class="ibiritImg">
                    <div class="ibiritText text">1 Adult - 0 Children - 1 Room </div>
                </div>
                <div class="ibiriDrop ibiriDrop2">
                <div class="addPack">
                        <div class="addpName">Adult ($200)</div>
                        <div class="addpIcons">
                            <img src="Images/minus.png" alt="" class="addpiIcon addpiMinus">
                            <input class="addpiNum" type='text' name='adultCount' value='1' readonly>
                            <img src="Images/plus.png" alt="" class="addpiIcon addpiPlus">
                        </div>
                    </div>
                    <div class="addPack">
                        <div class="addpName">Children ($150)</div>
                        <div class="addpIcons">
                            <img src="Images/minus.png" alt="" class="addpiIcon addpiMinus">
                            <input class="addpiNum" type='text' name='childrenCount' value='0' readonly>
                            <img src="Images/plus.png" alt="" class="addpiIcon addpiPlus">
                        </div>
                    </div>
                    <div class="addPack">
                        <div class="addpName">Room ($500)</div>
                        <div class="addpIcons">
                            <img src="Images/minus.png" alt="" class="addpiIcon addpiMinus">
                            <input class="addpiNum" type='text' name='roomCount' value='1' readonly>
                            <img src="Images/plus.png" alt="" class="addpiIcon addpiPlus">
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibirSearch cursor">
                <?php if(isset($_SESSION['user'])): ?>
                <input type='submit' class="ibirsText textBig" value='Reserve' id='submit'>
                <div class="ibirsHolder" id='priceForClick'>
                <input class="ibirsCost textSmall" id="ibirsCost" value='0' type='text' readonly name='price'>
                    <div class="ibirsSign textSmall" id='ibrisSign'>$</div>
                </div>
                <script>
                    document.getElementById('ibirsCost').onclick = function(){
                        document.getElementById('submit').click()
                    }
                    document.getElementById('ibrisSign').onclick = function(){
                        document.getElementById('submit').click()
                    }
                </script>
                <?php else: ?>
                <a href='login' class="ibirsText textBig" id='login'>Log In</a>
                <a class="ibirsHolder" herf='login'>
                    <input class="ibirsCost textSmall" id="ibirsCost" value='0' type='text' readonly name='price'>
                    <div class="ibirsSign textSmall" id='ibrisSign'>$</div>
                </a>
                <script>
                    document.getElementById('ibirsCost').onclick = function(){
                        document.getElementById('login').click()
                    }
                    document.getElementById('ibrisSign').onclick = function(){
                        document.getElementById('login').click()
                    }
                </script>
                <?php endif; ?>
                
            </div>
        </form>
    </div>
</div>