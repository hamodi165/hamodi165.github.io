//Comment

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function commentFunction() {
    var x = document.getElementById("comment-area");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

  function replyFunction() {
    var x = document.getElementById("reply-area");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
    
  function openFormLogin() {
    document.getElementById("myForm").style.display = "block";
  }

  function openFormRegister() {
    document.getElementById("myForm-2").style.display = "block";
  }
  
  function closeFormLogin() {
    document.getElementById("myForm").style.display = "none";
  }

  function closeFormRegister() {
    document.getElementById("myForm-2").style.display = "none";
  }