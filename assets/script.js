//doing search bar


// wait for the DOM to be fully loaded; JavaScript code inside the event listener is executed only when the HTML document has been fully loaded
document.addEventListener('DOMContentLoaded',function () {
        // so the code inside this function will only run when the DOM is fully loaded
//  select the search input by id 
var searchInput = document.getElementById('searchInput');
// I will  event listener for the enput event on the search input
searchInput.addEventListener('input',function(){
    var searchTerm = searchInput.value.toLowerCase();
    // Log or use the search term as needed
    console.log("Search term:", searchTerm);

})
})