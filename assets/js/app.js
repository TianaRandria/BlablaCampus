let url = window.location.pathname;
let filename = url.split('/').pop();
let referrerUrl = document.referrer;
let fileReferrer = referrerUrl.split('/').pop();
let changingZone = document.querySelector('#changingZone');
let textToChangeConfirmation = document.querySelector('#textToChangeConfirmation');
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
            // TODO: ajouter le else pour le a redirigeant vers le profil
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
fetchTextHeader();