
//mobile navigation menu

function mobileFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

//comment area
  function replyFunction() {
    var x = document.getElementById("commentarea");
    var y = document.getElementById("replyButton");
    if (x.style.display && y.style.display === "none") {
      x.style.display = "block";
      y.style.display = "block";
    } else {
      x.style.display = "none";
      y.style.display = "none";
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
  function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";

  }
  window.onload = function(e){ 
    document.getElementById("default").click();
 }  

 //switching tabs in homepage, hot poll review etc
 function openTopic(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("hotcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("hotlinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";

}


//switching tabs to make a post such a review, poll etc in makeapost.php
function openPost(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("postcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("makinglinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";

}


//for recaptcha registering bot
  var onloadCallback = function() {
        grecaptcha.enterprise.render('html_element', {
          'sitekey' : ' 6LfPeRMgAAAAABc9QUnfXNGyrRbSBc-gdsBl8GQH',
        });
      };

   