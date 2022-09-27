if (filename === "searchItinerary.php" || filename === "newItinerary.php"){
    let searching = new SearchItinerary();
    searching.blockSearchSwitchChange();
    searching.blockSearchSwitchClick();
}
if ( url.includes('pages') == true && filename != "index.php") {
    fetchTextHeader();
    switch (filename) {
        case "register.php":
            profilePictureRegister.addEventListener('change', function(e){
                fileChecker(e);
            })
            break;
        case "newItinerary.php":
            switchCheckboxCreateItinerary(checkboxForth, checkboxBackAndForth);
            switchCheckboxCreateItinerary(checkboxBackAndForth, checkboxForth);
            step1Adding.addEventListener("click", function(){
                if (step1New.value !=="") {
                    newStepItinerary();
                }
            });
            break; 
        case "myItinerary.php":
            for (let i = 0; i < cardTraject.length; i++) {
                cardTraject[i].addEventListener("click", function(){
                    modalMyItinerary(i);
                });
            };
            break;
        case "myReservations.php":
            for (let i = 0; i < cardReservation.length; i++) {
                cardReservation[i].addEventListener("click", function(){
                    modalMyReservation(i);
                });
            };
            break;
        case "confirmation.php":
            switch(fileReferrer){
                case "login.php":
                    redirectTimed("/searchitinerary.php");
                    break;
                case "register.php":
                    redirectTimed("/searchitinerary.php");
                    break;
                case "changeItinerary.php":
                    redirectTimed("/myItinerary.php");
                    break;
                case "reservation.php":
                    redirectTimed("/searchitinerary.php");
                    break;
                case "validation.php":
                    redirectTimed("/searchitinerary.php");
                    break;
                case "deleteItinerary.php":
                    redirectTimed("/myItinerary.php");
                    break;
                case "reservationCancel.php":
                    redirectTimed("/myReservations.php");
                    break;
                case "editAccount.php":
                    redirectTimed("/searchitinerary.php");
                    break;
            }
            break;
        default:
            break;
    }
}
