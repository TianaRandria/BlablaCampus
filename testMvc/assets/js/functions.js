function fetchTextHeader(){
    fetch('./assets/js/textHeader.json').then(response => response.json().then(data => {
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
            changingZone.insertAdjacentHTML('afterbegin', '<img src="./assets/img/humanLogo.png" alt="humain stylisé">');
        }
        if (filename === "confirmation"){
            for (let i = 0; i < data.referant.length; i++) {
                if (fileReferrer === data.referant[i].file) {
                    textToChangeConfirmation.textContent = data.referant[i].toWrite;
                }
            }
        }
        if ( filename ==="account" || filename ==="confirmation"){
            changingZone.href = "";
        }
    }));
}
function switchCheckboxCreateItinerary(targetListener, targetEvent){
    targetListener.addEventListener("change",function(){
        if (targetEvent.checked == true) {
            targetEvent.checked = false;
        }else{
            targetListener.checked = true;
        }
    })
}
function createElement(typeElement, elementID, elementIDLocation, elementClass, inputType, placeholder, elementSRC, elementAlt, elementName, textContent){
    let createElement = document.createElement(typeElement);
    createElement.id = elementID;
    createElement.classList = elementClass;
    createElement.type = inputType;
    createElement.placeholder = placeholder;
    createElement.src = elementSRC;
    createElement.alt = elementAlt;
    createElement.name = elementName;
    createElement.textContent = textContent;
    document.getElementById(elementIDLocation).append(createElement);
}
function newStepItinerary(){
    step1Adding.classList.add('hidden');
    for (let i = 0; i < rowStep2.length; i++) {
        createElement(rowStep2[i].type, rowStep2[i].ID, rowStep2[i].location, rowStep2[i].class, rowStep2[i].inputType, rowStep2[i].placeholder,rowStep2[i].src, rowStep2[i].alt,rowStep2[i].name)
    }
    changeAutocompleteMode('#step2New');
    autocomplete('#step2New');
    hiddingSubmitButton('#step2New');
    document.querySelector('#step2Adding').addEventListener('click', function(){
        if(document.querySelector('#step2New').value !==""){
            document.querySelector('#step2Adding').classList.add('hidden');
            for (let i = 0; i < rowStep3.length; i++) {
                createElement(rowStep3[i].type, rowStep3[i].ID, rowStep3[i].location, rowStep3[i].class, rowStep3[i].inputType, rowStep3[i].placeholder,rowStep3[i].src, rowStep3[i].alt,rowStep3[i].name)
            }
            changeAutocompleteMode('#step3New');
            autocomplete('#step3New');
            hiddingSubmitButton('#step3New');
        }
    })
}
function modalMyItinerary(index){
    clearTimeout();
    let arraySplice = Array.prototype.slice.call(modalTraject);
    arraySplice.splice(index , 1);
    for (let i = 0; i < arraySplice.length; i++) {
        if (!arraySplice[i].classList.contains('hidden')) {
            arraySplice[i].classList.add('hidden');
        }        
    }
    modalTraject[index].classList.remove('hidden');
    setTimeout(() => {
        modalTraject[index].classList.add('hidden')
    }, 5000);
}
function modalMyReservation(index){
    let arraySplice = Array.prototype.slice.call(modalReservations);
    arraySplice.splice(index , 1);
    for (let i = 0; i < arraySplice.length; i++) {
        if (!arraySplice[i].classList.contains('hidden')) {
            arraySplice[i].classList.add('hidden');
        }        
    }
    modalReservations[index].classList.remove('hidden');
    setTimeout(() => {
        modalReservations[index].classList.add('hidden')
    }, 5000);
}
function redirectTimed(e){
    setTimeout(() => {
        window.location.replace(baseUrl+e);
    }, 800);
}
function childRemove(target) {
    while(target.firstChild){
        target.removeChild(target.firstChild);
    }
}
function fileChecker(e, f){
    let fileType;
    const files = e.target.files;
    for (const file of files) {
        fileType = file.type;
        fileType = fileType.split('/');                    
    }
    if(fileType[0] != 'image'){
        profilePictureRegister.value ="";
        childRemove(f);
        f.textContent = "Mauvais type de fichier , veuillez choisir un autre fichier";
    }
    if(files[0].size > 1048576){
        profilePictureRegister.value ="";
        childRemove(f);
        f.textContent = "Fichier trop lourd , veuillez choisir un autre fichier";
    }
    else{
        childRemove(f);
        f.textContent = files[0].name;
    }
}
function autocomplete(target){
    document.querySelector(target).addEventListener('keyup', function(e){
        if(document.querySelector(target).value != ''){
            let content = encodeURIComponent(document.querySelector(target).value);
            fetch('https://api.geoapify.com/v1/geocode/autocomplete?text='+content+'&filter=countrycode:fr&format=json&apiKey=af3f6cef19954a839ffa0379b6264d9d').then(response => response.json().then(data => {
                if (!document.querySelector('#boxResults'+e.target.id)) {
                    createElement('div','boxResults'+e.target.id,e.target.parentNode.id,'absolute bottom-0 right-0 translate-y-full bg-redOnline w-4/5 z-10','','','','',''); 
                }
                while (document.querySelector('#boxResults'+e.target.id).firstChild){
                    document.querySelector('#boxResults'+e.target.id).removeChild(document.querySelector('#boxResults'+e.target.id).firstChild);
                }
                for (let i = 0; i < data.results.length; i++) {
                    createElement('p',"result"+i,"boxResults"+e.target.id, "text-white cursor-pointer","","","","","",data.results[i].formatted)
                    document.querySelector('#result'+i).addEventListener('click', function() {
                        document.querySelector(target).value = document.querySelector('#result'+i).textContent;
                        e.target.parentNode.removeChild(e.target.parentNode.lastChild);
                        let transfertName = target.replace('#','');
                        document.querySelector('#LatLon'+transfertName).value = data.results[i].lat+','+data.results[i].lon;
                        calculTimeTravel();
                        if (document.querySelector('.toChange').classList.contains('hidden')) {
                            document.querySelector('.toChange').classList.remove('hidden');
                        }
                        if (document.querySelector(target) != document.querySelector('#createItineraryDepart')) {
                            addNewItinerary.classList.remove('hidden');
                        }
                    });
                }
            }));
        }else{
            addNewItinerary.classList.remove('hidden');
        }
    })
}
function hiddingSubmitButton(target){
    document.querySelector(target).addEventListener('keyup', function(){
        if (!addNewItinerary.classList.contains('hidden')&&document.querySelector(target).value != '') {
            addNewItinerary.classList.add('hidden');
        }
    })
}
function calculTimeTravel(){
    if (document.querySelector('#LatLoncreateItineraryDepart').value != "" && document.querySelector('#itineraryFinalCreate').value != ""){
        $textQuery = document.querySelector('#LatLoncreateItineraryDepart').value+"|";
        if (document.querySelector('#LatLonstep1New').value != "") {
            $textQuery += document.querySelector('#LatLonstep1New').value;
            if (document.querySelector('#LatLonstep2New') !== null){
                if (document.querySelector('#LatLonstep2New').value !="") {
                    $textQuery += '|'+document.querySelector('#LatLonstep2New').value;
                if (document.querySelector('#LatLonstep3New') !== null) {
                    if (document.querySelector('#LatLonstep3New').value != "") {
                        $textQuery += '|'+document.querySelector('#LatLonstep3New').value+'|';
                    }
                }
                else{
                    $textQuery += '|'
                }
                }
            }else{
                $textQuery += '|'
            }
        }
        $textQuery += document.querySelector('#itineraryFinalCreate').value
        fetch('https://api.geoapify.com/v1/routing?waypoints='+$textQuery+'&mode=drive&apiKey=af3f6cef19954a839ffa0379b6264d9d').then(response => response.json()).then(data => {
            let resultHour = Math.floor(data.features[0].properties.time);
            resultHour = (resultHour - (resultHour % 60))/60;
            console.log(resultHour);
            if(resultHour >= 60 ){
                resultMin = (resultHour % 60);
                resultHour = (resultHour - resultMin) / 60;
                if (resultHour < 10) {
                    resultHour = '0'+resultHour;
                }
                inputTimeToTravel.value = resultHour+':'+resultMin+':00';
            }else{
                if(resultHour < 10){
                    inputTimeToTravel.value = '00:0'+resultHour+':00 ';
                }else{
                    inputTimeToTravel.value = '00:'+resultHour+':00 ';
                }
            }
        })
    }
}
function changeAutocompleteMode(target){
    document.querySelector(target).autocomplete = 'off';
}
// TODO: modifié le tout pour enregistrer les durée d'étapes retourner dans le JSON ( merci Julien)