reservationsSelecting()
userDataChange()
news()





function reservationsSelecting(){
    let t0CHeckables = document.getElementsByClassName('t0Tr')
    let checkboxes = document.getElementsByClassName('sCheck')
    let t1ItemsNo = []

    let res1 = document.getElementById('cbiReservations1')
    let table1 = document.getElementById('cbir1Table')

    for(let i = 0; i < t0CHeckables.length; i++){
        t1ItemsNo[i] = false
        checkboxes[i].onclick = function(){
            if(checkboxes[i].checked == true){
                t1ItemsNo[i] = true
                res1.style.display = 'flex'
            }else{
                t1ItemsNo[i] = false
            }


            table1.innerHTML = ''
            for(let k = 0; k < t1ItemsNo.length; k++){
                if(t1ItemsNo[k] == true){
                    t0CHeckables[k].innerHTML.split('<span><input type="checkbox" class="sCheck"></span>')
                    // <span><input type="checkbox" class="sCheck"></span>
                    table1.innerHTML += `
                        <tr>
                        ${t0CHeckables[k].innerHTML.split('<span><input type="checkbox" class="sCheck"></span>')[0]} ${t0CHeckables[k].innerHTML.split('<span><input type="checkbox" class="sCheck"></span>')[1]}
                        </tr>
                    `
                }
            }
        }
    }
}



function userDataChange(){
    let allData = document.getElementsByClassName('userData')
    let dataInArrDefault = []
    let dataInArr = []
    let reset = document.getElementById('reset')
    let save = document.getElementById('save')

    for(let i = 0; i < allData.length; i++){
        dataInArrDefault[i] = allData[i].value
        dataInArr[i] = allData[i].value
        
        allData[i].onchange = function(){
            //If changed field contains more than it's limit on database, code will warn admin and undo change
            if(allData[i].classList.contains('username') || allData[i].classList.contains('email') || allData[i].classList.contains('salutation') || allData[i].classList.contains('fName') || allData[i].classList.contains('lName') || allData[i].classList.contains('role')){
                if(allData[i].value.length > 50){
                    allData[i].value = dataInArr[i]
                    alert("This field can't contain more than 50 characters")
                    return
                }
            }else if(allData[i].classList.contains('status')){
                if(allData[i].value.length > 20){
                    allData[i].value = dataInArr[i]
                    alert("This field can't contain more than 20 characters")
                    return
                }
            }
            dataInArr[i] = allData[i].value
        }
    }
    reset.onclick = function(){
        for(let i = 0; i < allData.length; i++){
            allData[i].value = dataInArrDefault[i]
        }
    }
    save.onclick = function(){
        for(let i = 0; i < allData.length; i++){
            if(dataInArrDefault[i] != allData[i].value){
                //If something was changed, breaking loop and leting input to submit
                break;
            }
            if(i == allData.length - 1){
                //If nothing was changed, not submiting input by returning false
                alert('Nothing was changed')
                return false
            }
        }
    }
    
}



function news(){
    let fileInput = document.getElementById('inputFile')
    let image = document.getElementById('image')
    let title = document.getElementById('titleInput')
    let textarea = document.getElementById('textarea')

    image.onclick = function(){
        fileInput.click()
    }
	fileInput.addEventListener('change', function(e) {
        //Checking max size
        // 1MB = 1,048,576 Bytes
        if(this.files[0].size > 1048576){
            alert("Image size can't be more than 1mb");
            this.value = "";
            return false
            }

		let file = fileInput.files[0];

		if (file.type.match('\.png') || file.type.match('\.webp') || file.type.match('\.jpg') || file.type.match('\.jpeg') || file.type.match('\.jfif')) {
			let reader = new FileReader();

			reader.onload = function(e) {
				image.src = reader.result;
			}
			reader.readAsDataURL(file);	
		}else{
            alert('Please select other image')
        }
	});

    //Reducing news text size
    let text = document.getElementsByClassName('newsText')

    for(let i = 0; i < text.length; i++){
        text[i].innerHTML = text[i].innerHTML.substring(0, 100)
    }
}