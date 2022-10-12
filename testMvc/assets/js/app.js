if (filenameToCheck.includes(filename)) {
    let searching = new SearchItinerary();
    searching.blockSearchSwitchChange();
    searching.blockSearchSwitchClick();
}
if (filename != "") {
    fetchTextHeader();
    switch (filename) {
        case "searchItinerary":
            autocomplete('#startingPointSearch');
            break;
        case "register":
            profilePictureRegister.addEventListener('change', function(e){
                fileChecker(e , profilePictureRegisterLabel);
            })
            break;
        case "editAccount":
            profilePictureEditAccount.addEventListener('change', function(e){
                fileChecker(e, profilePictureEditAccountLabel);
                })
            break;
        case "newItinerary":
            switchCheckboxCreateItinerary(checkboxForth, checkboxBackAndForth);
            switchCheckboxCreateItinerary(checkboxBackAndForth, checkboxForth);
            step1Adding.addEventListener("click", function(){
                if (step1New.value !=="") {
                    newStepItinerary();
                }
            });
            autocomplete('#createItineraryDepart');
            autocomplete('#step1New');
            hiddingSubmitButton('#step1New');
            itineraryFinalCreate.addEventListener('change',function () {
                if(itineraryFinalCreate.value !=="") {
                    addNewItinerary.classList.remove("hidden");
                }else{addNewItinerary.classList.add("hidden");}
                calculTimeTravel();
            })
            break;
        case "myItinerary":
            for (let i = 0; i < cardTraject.length; i++) {
                cardTraject[i].addEventListener("click", function(){
                    modalMyItinerary(i);
                });
            };
            break;
        case "myReservations":
            for (let i = 0; i < cardReservation.length; i++) {
                cardReservation[i].addEventListener("click", function(){
                    modalMyReservation(i);
                });
            };
            break;
        case "confirmation":
            switch(fileReferrer){
                case "login":
                    redirectTimed("/searchItinerary");
                    break;
                case "register":
                    redirectTimed("/searchItinerary");
                    break;
                case "changeItinerary":
                    redirectTimed("/myItinerary");
                    break;
                case "reservation":
                    redirectTimed("/searchItinerary");
                    break;
                case "validation":
                    redirectTimed("/searchItinerary");
                    break;
                case "deleteItinerary":
                    redirectTimed("/myItinerary");
                    break;
                case "reservationCancel":
                    redirectTimed("/myReservations");
                    break;
                case "editAccount":
                    redirectTimed("/searchItinerary");
                    break;
            }
            break;
        case "modifyItinerary":
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
