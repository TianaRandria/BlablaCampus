if (filename === "searchItinerary.php" || filename === "newItinerary.php" || filename === "modifyItinerary.php"){
    let searching = new SearchItinerary();
    searching.blockSearchSwitchChange();
    searching.blockSearchSwitchClick();
}
if ( url.includes('pages') == true && filename != "index.php") {
    fetchTextHeader();
    switch (filename) {
        case "searchItinerary.php":
            autocomplete('#startingPointSearch');
            break;
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
            autocomplete('#createItineraryDepart');
            autocomplete('#step1New');
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
                case "reservation.php":
                    redirectTimed("/myReservations.php");
                    break;
                case "editAccount.php":
                    redirectTimed("/searchitinerary.php");
                    break;
            }
            break;
        case "modifyItinerary.php":
            switchCheckboxCreateItinerary(checkboxForth, checkboxBackAndForth);
            switchCheckboxCreateItinerary(checkboxBackAndForth, checkboxForth);
            if (!document.querySelector('#step2New')) {
                step1Adding.addEventListener("click", function(){
                    if (step1New.value !=="") {
                        newStepItinerary();
                    }
                });
            }else{
                document.querySelector('#step2Adding').addEventListener('click', function(){
                    if(document.querySelector('#step2New').value !==""){
                        document.querySelector('#step2Adding').classList.add('hidden');
                        for (let i = 0; i < rowStep3.length; i++) {
                            createElement(rowStep3[i].type, rowStep3[i].ID, rowStep3[i].location, rowStep3[i].class, rowStep3[i].inputType, rowStep3[i].placeholder,rowStep3[i].src, rowStep3[i].alt,rowStep3[i].name)
                        }
                        autocomplete('#step3New');
                    }
                })
            }
            autocomplete('#modifyItineraryDepart');
            break;
        default:
            break;
    }
}
