function fetchTextHeader(){
    fetch('../assets/json/textHeader.json').then(response => response.json().then(data => {
        var controle = 0;
        for (let i = 0; i < data.textes.length; i++) {
            if (data.textes[i].file === filename){
                changingZone.insertAdjacentHTML('afterbegin', data.textes[i].toWrite);
                changingZone.classList.add('disablingA');
                break;
            }
            controle++;
        }
        if(controle === 4){
            changingZone.insertAdjacentHTML('afterbegin', '<img src="../assets/img/humanLogo.png" alt="humain stylisé">');
        }
        if (filename === "confirmation.php"){
            for (let i = 0; i < data.referant.length; i++) {
                if (fileReferrer === data.referant[i].file) {
                    textToChangeConfirmation.textContent = data.referant[i].toWrite;
                }
            }
        }
        if ( filename ==="account.php"){
            changingZone.href = "";
        }
    }));
}
function switchCheckboxCreateItinerary(targetListener, targetEvent){
    targetListener.addEventListener("click",function(){
        if (targetEvent.checked == true) {
            targetEvent.checked = false;
        }
    })
}
function createElement(typeElement, elementID, elementIDLocation, elementClass, inputType, placeholder, elementSRC, elementAlt, elementName){
    let createElement = document.createElement(typeElement);
    createElement.id = elementID;
    createElement.classList = elementClass;
    createElement.type = inputType;
    createElement.placeholder = placeholder;
    createElement.src = elementSRC;
    createElement.alt = elementAlt;
    createElement.name = elementName;
    document.getElementById(elementIDLocation).append(createElement);
}
function newStepItinerary(){
    step1Adding.classList.add('hidden');
    for (let i = 0; i < rowStep2.length; i++) {
        createElement(rowStep2[i].type, rowStep2[i].ID, rowStep2[i].location, rowStep2[i].class, rowStep2[i].inputType, rowStep2[i].placeholder,rowStep2[i].src, rowStep2[i].alt,rowStep2[i].name)
    }
    document.querySelector('#step2Adding').addEventListener('click', function(){
        if(document.querySelector('#step2New').value !==""){
            document.querySelector('#step2Adding').classList.add('hidden');
            for (let i = 0; i < rowStep3.length; i++) {
                createElement(rowStep3[i].type, rowStep3[i].ID, rowStep3[i].location, rowStep3[i].class, rowStep3[i].inputType, rowStep3[i].placeholder,rowStep3[i].src, rowStep3[i].alt,rowStep3[i].name)
            }
        }
    })
}
function modalMyItinerary(index){
    let arraySplice = Array.prototype.slice.call(modalTraject);
    arraySplice.splice(index , 1);
    for (let i = 0; i < arraySplice.length; i++) {
        if (!arraySplice[i].classList.contains('hidden')) {
            arraySplice[i].classList.add('hidden');
        }        
    }
    modalTraject[index].classList.remove('hidden');
}