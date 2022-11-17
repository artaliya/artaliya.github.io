dateChange()
index_Adult_Children_Room_Count()
indexAdditionalOnClick()
getAndDisplayPrice()



    /*Copyed from https://code.tutsplus.com/tutorials/how-to-change-the-date-format-in-javascript--cms-39400 */

    function dateFormat(inputDate, format) {
        //parse the input date
        const date = new Date(inputDate);
    
        //extract the parts of the date
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();    
    
        //replace the month
        format = format.replace("MM", month.toString().padStart(2,"0"));        
    
        //replace the year
        if (format.indexOf("yyyy") > -1) {
            format = format.replace("yyyy", year.toString());
        } else if (format.indexOf("yy") > -1) {
            format = format.replace("yy", year.toString().substr(2,2));
        }
    
        //replace the day
        format = format.replace("dd", day.toString().padStart(2,"0"));
    
        return format;
    }

    /* Copy end */







function dateChange(){
    let checkIn = document.getElementById('checkIn')
    let checkOut = document.getElementById('checkOut')
    let newCheckOut




    checkIn.onchange = function(){
        if(new Date(checkIn.value) > new Date(checkOut.value) || checkIn.value == checkOut.value){
            console.log(checkOut.value)
            newCheckOut = new Date(checkIn.value)
            newCheckOut.setDate(newCheckOut.getDate() + 1)
            // newCheckOut = dateFormat(new Date(checkIn.value), 'yyyy-MM-dd').split('-')

            checkOut.value = dateFormat(newCheckOut, 'yyyy-MM-dd')
        }
        getAndDisplayPrice()
    }
    checkOut.onchange = function(){
        getAndDisplayPrice()
    }
}






function index_Adult_Children_Room_Count(){
    let numbers = document.getElementsByClassName('addpiNum')
    let minuses = document.getElementsByClassName('addpiMinus')
    let pluses = document.getElementsByClassName('addpiPlus')
    let costPublic = document.getElementById('ibirsCost')

    for(let i = 0; i < numbers.length; i++){
        minuses[i].onclick = function(){
            if(i == 0 || i == 2){
                if(numbers[i].value !== '1'){
                    numbers[i].value = parseInt(numbers[i].value) - 1;
                }
            }else{
                if(numbers[i].value !== '0'){
                    numbers[i].value = parseInt(numbers[i].value) - 1;
                }
            }
            getAndDisplayPrice()
        }
        pluses[i].onclick = function(){
            if(numbers[i].value !== '5'){
                numbers[i].value = parseInt(numbers[i].value) + 1;
            }
            getAndDisplayPrice()
        }

    }
}



function indexAdditionalOnClick(){
    let checkboxes = document.getElementsByClassName('addpCheckbox')

    for(let i = 0; i < checkboxes.length; i++){
        checkboxes[i].onclick = function(){
            getAndDisplayPrice()
        }
    }
}




function getAndDisplayPrice(){
    let price = 0
    let priceDisplay = document.getElementById('ibirsCost')

    //Price change by reservation days
    //1 night = $200
    let date1 = new Date(document.getElementById('checkOut').value);
    let date2 = new Date(document.getElementById('checkIn').value);
    let diffTime = Math.abs(date2 - date1);
    let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    price += (diffDays * 200)

    //Price change by additional services
    let checkboxes = document.getElementsByClassName('addpCheckbox')
    if(checkboxes[0].checked == true){
        price += 15
    }
    if(checkboxes[1].checked == true){
        price += 30
    }
    if(checkboxes[2].checked == true){
        price += 20
    }

    //Price change by room-children-adult count
    let numbers = document.getElementsByClassName('addpiNum')
    price += parseInt(numbers[0].value) * 200
    price += parseInt(numbers[1].value) * 150
    price += parseInt(numbers[2].value) * 500
    
    priceDisplay.value = price

    //Changing input size which also displays price
    priceDisplay.style.width = ((priceDisplay.value.length + 0.5) * 8) + 'px'
}