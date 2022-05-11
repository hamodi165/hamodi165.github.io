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
    

  //opening the register and login forms in home page
  function openFormLogin() {
    document.getElementById("myForm").style.display = "block";

    if(document.getElementById("myForm-2").style.display = "block"){
      document.getElementById("myForm-2").style.display = "none";
    }
  }

  function openFormRegister() {
    document.getElementById("myForm-2").style.display = "block";
    if(document.getElementById("myForm").style.display = "block"){
      document.getElementById("myForm").style.display = "none";
    }
  }
  
  function closeFormLogin() {
    document.getElementById("myForm").style.display = "none";
  }

  function closeFormRegister() {
    document.getElementById("myForm-2").style.display = "none";
  }


  //switching tabs in profile page
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";

  }
  window.onload = function(e){ 
    document.getElementById("default").click();
 }  
