/*document.getElementById('buttons').addEventListener("click", function() {
	document.getElementById('pop_up').style.display = 'flex';
});

document.getElementById('close').addEventListener("click", function() {
	document.getElementById('pop_up').style.display = 'none';
});*/
// Get the modal
var modal = document.getElementById("pop_up");

var modal1 = document.getElementById("pop_up_ex");

// Get the button that opens the modal
var btn = document.getElementById("buttons");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
  modal.style.display = "flex";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it


// Get the button that opens the modal
var btn1 = document.getElementById("buttons1");

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
  else if (event.target == modal) {
    modal.style.display = "none";
  }
}
