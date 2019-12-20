// Get the button that opens the modal
var btn1 = document.getElementById("buttons1");

// Get the modal to be opeaned
var modal1 = document.getElementById("pop_up");

// Get the <span> element that closes the modal
var span1 = document.getElementById("close1");

// When the user clicks on the button, open the modal 
btn1.onclick = function() {
  modal1.style.display = "flex";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
