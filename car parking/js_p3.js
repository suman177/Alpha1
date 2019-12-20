var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 50);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}
/*document.getElementById('buttons').addEventListener("click", function() {
  document.getElementById('pop_up').style.display = 'flex';
});

document.getElementById('close').addEventListener("click", function() {
  document.getElementById('pop_up').style.display = 'none';
});*/
// Get the modal
var modal = document.getElementById("pop_up");

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
window.onclick = function(event) {
if (event.target == modal) {
    modal.style.display = "none";
  }
}
