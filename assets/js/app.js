if (filename === "searchItinerary.php" || filename === "newItinerary.php"){
    let searching = new SearchItinerary();
    searching.blockSearchSwitchChange();
    searching.blockSearchSwitchClick();
}
if ( url.includes('pages') == true && filename != "index.php") {
    fetchTextHeader();
    switch (filename) {
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
                    setTimeout(() => {
                        window.location.replace(baseUrl+"/searchitinerary.php");
                    }, 800);
                    break;
                case "changeItinerary.php":
                    setTimeout(() => {
                        window.location.replace(baseUrl+"/myItinerary.php");
                    }, 800);
                    break;
                case "reservation.php":
                    setTimeout(() => {
                        window.location.replace(baseUrl+"/searchitinerary.php");
                    }, 800);
                    break;
                default:
                    break;
            }
            break;
        default:
            break;
    }
}
