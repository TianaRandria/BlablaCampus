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
        default:
            break;
    }
}
