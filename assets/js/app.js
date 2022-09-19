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
            step1Adding.addEventListener("click", function(e){
                newStepItinerary(e.target.id);
            });
            break;
    
        default:
            break;
    }
}
