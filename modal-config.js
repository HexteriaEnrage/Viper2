function showCards()
{
	var items = document.getElementsByClassName("card-container hidden");
    for (var i = 0; i < items.length; i++) {
    	items[i].className = "card-container";
  	}
}
function hideCards()
{
	var items = document.getElementsByClassName("card-container");
	for (var i = 0; i < items.length; i++) {
    	items[i].className = "card-container hidden";
  	}
}

// Get the modal
var modal = document.getElementById("modal_1");

// Get the button that opens the modal
var btn = document.getElementById("moreBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
		modal.style.display = "inline-block";

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
