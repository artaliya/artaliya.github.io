dataChange()

















function dataChange(){
    let cButtons = document.getElementsByClassName('cdidinSpan')
    let inputs = document.getElementsByClassName('cdidiChange')
    let submit = document.getElementById('cdidSubmit')



    for(let i = 0; i < cButtons.length; i++){
        cButtons[i].onclick = function(){
            if(cButtons[i].innerHTML == 'Change'){
                cButtons[i].innerHTML = 'Hide'
                inputs[i].style.display = 'block'
                submit.style.display = 'block'
            }else{
                cButtons[i].innerHTML = 'Change'
                inputs[i].style.display = 'none'
                submit.style.display = 'none'
            }
        }
    }

    let passButton = document.getElementById('cdidinSpanPassword')
    let passInputs = document.getElementsByClassName('cdidiPass')

    passButton.onclick = function(){
        if(passButton.innerHTML == 'Change password'){
            passButton.innerHTML = 'Hide'
            passInputs[0].style.display = 'flex'
            passInputs[1].style.display = 'flex'
            passInputs[2].style.display = 'flex'
            submit.style.display = 'block'
        }else{
            passButton.innerHTML = 'Change password'
            passInputs[0].style.display = 'none'
            passInputs[1].style.display = 'none'
            passInputs[2].style.display = 'none'
            submit.style.display = 'none'
        }
    }
}