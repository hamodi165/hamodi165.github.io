document.getElementById('loginButton').addEventListener("click", function() {
	document.querySelector('.bg-modal').style.display = "flex";
});

document.querySelector('.close').addEventListener("click", function() {
	document.querySelector('.bg-modal').style.display = "none";
});

document.getElementById('shoppingButton').addEventListener("click", function() {
	document.querySelector('.shopping-cart').style.display = "flex";
});

document.querySelector('.close-shopping').addEventListener("click", function() {
	document.querySelector('.shopping-cart').style.display = "none";
});

$(document).ready(function(){
  $("#hide").click(function(){
    $("#sneakers").hide();
  });
  $("#show").click(function(){
    $("#sneakers").show();
  });
});

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}