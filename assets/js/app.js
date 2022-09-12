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

    }));
}
if (filename === "searchItinerary.php"){
    let searching = new SearchItinerary();
    searching.blockSearchSwitchChange();
    searching.blockSearchSwitchClick();
}

if ( url.includes('pages') == true && filename != "index.php") {
    fetchTextHeader();
}