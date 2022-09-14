function SearchItinerary()  {
    this.blockSearchSwitchClick= function(){
        blockSearch.addEventListener('click', function(){
            FirstRowInBlockSearch.classList.add('dsn');
            dateSearch.classList.remove('dsn');
        })
    },
    this.blockSearchSwitchChange= function(){
        document.querySelector('#dateSearch').addEventListener('change', function(){
            FirstRowInBlockSearch.classList.remove('dsn');
            dateSearch.classList.add('dsn');
            PInBlocDateSearch.textContent = document.querySelector('#dateSearch').value
        });
    }
}