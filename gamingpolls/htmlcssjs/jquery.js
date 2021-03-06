


$(document).ready(function() { 
    $( "#submitreg" ).on( "click", function() {
     
     var username = $('#regusername').val();
     var email = $('#regemail').val();
     var password = $('#regpassword').val();
     var repeatpassword = $('#regrepeatpassword').val();
     var botquestion = $('#regbotquestion').val();
        // Hiding error messages 
     $('.errorMsg').hide();
     
     if(checkUsername(username) == false){    
           $('#errorusername').show();    
           return false;    
     }else if(checkEmail(email) == false){    
        $('#erroremail').show(); 
           return false;       
     }else if(checkPassword(password) == false){    
           $('#errorpassword').show();     
           return false;       
     }else if(checkRepeatPassword(repeatpassword, password) == false){    
        $('#errorrepeatpassword').show(); 
           return false;       
     }else if(checkBotQuestion(botquestion) == false){    
        $('#errorbotquestion').show();     
           return false;       
     }else{
      alert("You have successfully registered an account on Voteem!");
     }
      
    });
    });
    //function used to check valid email
    function checkEmail(email)
    {
        //regular expression for email
        var pattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(pattern.test(email)){
            return true;
        } else {
            return false;
        }
    }
    
    //function used to validate website URL
    function checkBotQuestion(botquestion)
    {
        //regular expression for URL
        if(botquestion == "voteem" || botquestion == "Voteem"){
            return true;
        } else {
            return false;
        }
    } 
    
    //function used to validate username
    function checkUsername(username){
     //regular expression for username
        var pattern = /^[a-z0-9_-]{5,15}$/;
        if(pattern.test(username)){
            return true;
        }else{
            return false;
        }
    }
    
    //function used to validate password
    function checkPassword(password){
     //regular expression for password
     var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
        if(pattern.test(password)){
            return true;
        }else{
            return false;
        }
    }
    //function used to validate mobile number
    function checkRepeatPassword(repeatpassword, password){
     //regular expression for mobile number

        if(repeatpassword == password){
            return true;
        }else{
            return false;
        }
    }

    

  //when to register an account and tell if user already exists  
 $(document).ready(function(){

    $("#regusername").keyup(function(){
 
       var username = $(this).val().trim();
 
       if(username != ''){
 
          $.ajax({
             url: 'includes/userExist.php',
             type: 'post',
             data: {username: username},
             success: function(response){
 
                 $('#uname_response').html(response);
 
              }
          });
       }else{
          $("#uname_response").html("");
       }
 
     });
 
  });

  //when to register an account and tell if email already exists
  $(document).ready(function(){

    $("#regemail").keyup(function(){
 
       var email = $(this).val().trim();
 
       if(email != ''){
 
          $.ajax({
             url: 'includes/userExist.php',
             type: 'post',
             data: {email: email},
             success: function(response){
 
                 $('#uname_responsed').html(response);
 
              }
          });
       }else{
          $("#uname_responsed").html("");
       }
 
     });
 
  });


    //if user cannot login because user exists or doesnt
    $(document).ready(function() { 
        $( "#loginForm" ).on( "change", function(e) {
            
          
            $.ajax({
               url: 'includes/userExist.php',
               type: 'post',
               data: $('#loginForm').serialize(),
               success: function(data){
                $('#loginUWU').html(data);            
                $("#loginUWU").show().delay(4000).fadeOut();
                
                }
            });
    
       });
    
    });



//UPDATE FOR GENDER AND COUNTRY IN ACCOUNT SETTINGS

$(document).ready(function() { 
    $( "#genderform" ).on( "change", function(e) {
        e.preventDefault();
      
        $.ajax({
           url: 'includes/updatingData.inc.php',
           type: 'post',
           data: $('#genderform').serialize(),
           success: function(data){
            $('#genderMessage').html(data);            
            $("#genderMessage").show().delay(4000).fadeOut();
            
            }
        });

   });

});


//UPDATE FOR ABOUT DESCRIPTION IN USER PROFILE
$(document).ready(function() { 
    $( "#aboutform" ).on( "change", function(e) {
        e.preventDefault();
      
        $.ajax({
           url: 'includes/updatingData.inc.php',
           type: 'post',
           data: $('#aboutform').serialize(),
           success: function(data){
            $('#aboutMessage').html(data);            
            $("#aboutMessage").show().delay(4000).fadeOut();
            
            }
        });

   });

});

$(document).ready(function() { 
    $( "#deletetheprof" ).on( "change", function(e) {
        e.preventDefault();
      
        $.ajax({
           url: 'includes/deleteaccount.inc.php',
           type: 'post',
           data: $('#deletetheprof').serialize(),
           success: function(data){
            $('#pictureMessage').html(data);            
            $("#pictureMessage").show().delay(4000).fadeOut();
            
            }
        });

   });

});


$(document).ready(function(){

    $("#thefile").on("change", function(e){
        e.preventDefault();
           $.ajax({
              url: '../upload.php',
              type: 'post',
              data:  new FormData(this.form),
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
                $('#pictureMessage').html(data);  

              },
           });
    });
});

