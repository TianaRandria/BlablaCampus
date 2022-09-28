let url = window.location.pathname;
let filename = url.split('/').pop();
let referrerUrl = document.referrer;
let fileReferrer = referrerUrl.split('/').pop();
let changingZone = document.querySelector('#changingZone');
let textToChangeConfirmation = document.querySelector('#textToChangeConfirmation');
let dateSearch = document.querySelector('#dateSearch');
let blockSearch = document.querySelector('#blocDateSearch');
let FirstRowInBlockSearch = document.querySelector('#blocDateSearch > #firstRow');
let PInBlocDateSearch = document.querySelector('#blocDateSearch > #firstRow > p');
let checkboxForth = document.querySelector('#forthOnly');
let checkboxBackAndForth = document.querySelector('#backForth');
let step1Adding = document.querySelector('#step1Adding');
let rowStep1 = document.querySelector('#rowStep1');
let step1New = document.querySelector('#step1New');
let cardTraject = document.querySelectorAll('.cardTraject');
let modalTraject = document.querySelectorAll('.modalTraject');
let mainMyItinerary = document.querySelector('.mainMyItinerary');
let cardReservation = document.querySelectorAll('.cardReservation');
let modalReservations = document.querySelectorAll('.modalReservations');
let baseUrlSplit = referrerUrl.split('/');
baseUrlSplit.pop();
let baseUrl = baseUrlSplit.join('/');
let profilePictureRegister = document.querySelector('#profilePictureRegister');
let profilePictureRegisterLabel = document.querySelector('#profilePictureRegisterLabel');
const rowStep2 = [
    {"type":"div","ID":"rowStep2", "location":"allStepCreateItinerary","class":"flex w-full","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"div","ID":"step2", "location":"rowStep2","class":"flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"img","ID":"", "location":"step2","class":"","inputType":"","placeholder":"","src":"../assets/img/pinPoint.png","alt":"point pour les étapes","name":""},
    {"type":"input","ID":"step2New", "location":"step2","class":"bg-transparent","inputType":"text","placeholder":"Etape","src":"","alt":"","name":"step2Adding"},
    {"type":"div","ID":"addStep2", "location":"rowStep2","class":"w-1/6 flex justify-center items-center","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"img","ID":"step2Adding", "location":"addStep2","class":"","inputType":"","placeholder":"","src":"../assets/img/plus.png","alt":"Ajout d'une étape","name":""}
]
const rowStep3 = [
    {"type":"div","ID":"rowStep3", "location":"allStepCreateItinerary","class":"flex w-full","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"div","ID":"step3", "location":"rowStep3","class":"flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"img","ID":"", "location":"step3","class":"","inputType":"","placeholder":"","src":"../assets/img/pinPoint.png","alt":"point pour les étapes","name":""},
    {"type":"input","ID":"step3New", "location":"step3","class":"bg-transparent","inputType":"text","placeholder":"Etape","src":"","alt":"","name":"step3Adding"},
]