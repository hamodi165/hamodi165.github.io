
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

  function registerBox() {
    document.getElementById("registerForm").style.display = "block";
    if(document.getElementById("loginForm").style.display = "block"){
      document.getElementById("loginForm").style.display = "none";
    }
  }

  function loginBox() {
    document.getElementById("loginForm").style.display = "block";
    if(document.getElementById("registerForm").style.display = "block"){
      document.getElementById("registerForm").style.display = "none";
    }
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

      let input = document.getElementById("inputTag");
      let imageName = document.getElementById("imageName")

      input.addEventListener("change", ()=>{
          let inputImage = document.querySelector("input[type=file]").files[0];

          imageName.innerText = inputImage.name;
      })

   
      var mybutton = document.getElementById("scrollbutton");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


