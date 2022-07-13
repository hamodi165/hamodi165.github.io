<?php
    include 'session.php';
    include 'homeheader.php';  
    require_once 'includes/dbh.inc.php';
?>
<body>

<!-- for outputing save message -->

<!-- All the tabs! -->
<h3 id="profilesettings">Profile settings</h3>
<div class="tab">
  <button class="tablinks" onclick="openTab(event, 'User Profile')" id="default">User Profile</button>
  <button class="tablinks" onclick="openTab(event, 'Account')">Account</button>
  <button class="tablinks" href="home.php" value="home.php">Preview profile</button>
</div>

<hr id="lineinprofile">

<!-- User profile! -->
<div id="User Profile" class="tabcontent">
<?php  
        $id = $_SESSION["userid"];
        $stmt = $conn->prepare('SELECT * FROM users WHERE users_id = ?');
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
          echo"<div class ='user-container'>";
          if($row['status'] == 0){
            $filename = "uploads/profile".$id."*";
            $fileinfo = glob($filename);
            $fileext = explode(".", $fileinfo[0]);
            $fileactualext = $fileext[1];
            ?>
            <h4>Avatar image</h4>          
            <hr id="avatarimage">
            <p style="font-size:12px;">Images must be .png, .jpg or .jpeg format</p>
            <form method="post" action="<?php echo htmlspecialchars("upload.php");?>" enctype="multipart/form-data" id="profileform">
            <?php
            echo "<img src='uploads/profile".$id.".".$fileactualext."?".mt_rand()."' id='theimgsource'>";
            ?>
              <label for="thefile" id="labelprofile">
                <i class="fa fa-2x fa-camera"></i>
                <input type="file" name="file" id="thefile">         
              </label>
              <div id="pictureMessage" ></div>
              </form>
            
              <form method="post" id="deletetheprof" action="<?php echo htmlspecialchars("deleteprofile.php");?>">
              <label for="resetimage" id="labelfordelete">
              <button type="submit" name="deleteprof" id="deleteprof">Reset Image</button>
              
              </label>
              <div id="pictureMessage" ></div> 
              </form>

             <?php
          } else {
            ?>
            <h4>Avatar image</h4>
            <hr id="avatarimage">
            <p style="font-size:12px;">Images must be .png, .jpg or .jpeg format</p>
            <form method="post" action="<?php echo htmlspecialchars("upload.php");?>" enctype="multipart/form-data" id="profileform">
            <?php
            echo "<img src='uploads/profiledefault.jpg'>";
            ?>
              <label for="thefile" id="labelprofile">
              <i class="fa fa-plus-square"></i>
                <input type="file" name="file" id="thefile" onchange="javascript:this.form.submit();">
              </label>
              <div id="pictureMessage" ></div>
              </form>
              <?php
          }
          echo "</div>";
        } 
        $stmt->close();
    ?>

<br> <br>
<h4>About</h4>
<hr id="lineinabout">

<div class="aboutyou">
<form action="<?php echo htmlspecialchars("includes/updatingData.inc.php");?>" id="aboutform" method="post">
<input type="hidden" name="users_id" value="<?php echo  $_SESSION["userid"] ?>">
<p style="font-size:12px;">This description will be displayed whenever someone is visiting your profile.</p>
    <?php
$id = $_SESSION["userid"];
        $stmt = $conn->prepare('SELECT users_about FROM users WHERE users_id = ?');
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
          $about = $row['users_about'];
          echo "<textarea id='description' name='users_about' placeholder='Write a brief description of yourself!'>";
          echo $about;
          echo "</textarea>";
        }
?>

  <div id="aboutMessage" ></div> 
  </form> <br> <br> <br>
  </div>


  <h4>Connect accounts</h4>
<hr id="lineinabout">    

<div class="connectaccount">
<form action="<?php echo htmlspecialchars("includes/posts.inc.php");?>"method="post">
<a href="#" id="connectsteam"> <i class="fa fa-steam"></i> Connect to Steam</a> 
<p style="font-size:12px;">You can connect your steam account to show the amount of hours you've played a game.</p>


  </form>
  </div>


</div>




<!-- Account settings! -->
<div id="Account" class="tabcontent">
<div class="countryclass">  
    <h4>Account preferences</h4>
    
    <hr> </hr>

    <form action="<?php echo htmlspecialchars("includes/updatingData.inc.php");?>" id ="genderform" method="post">
    <input type="hidden" name="users_id" value="<?php echo  $_SESSION["userid"] ?>">
    <label for="genderid">Gender</label> <br>
    <select name="gender" id="genderid">
    <?php 
       $id = $_SESSION["userid"];
       mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
       $sql = "SELECT gender FROM users WHERE users_id=?;";

       $stmt = mysqli_stmt_init($conn);

       if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../home.php?error=sqlerror");
       exit();
       }

     mysqli_stmt_bind_param($stmt, "s", $id);
     mysqli_stmt_execute($stmt);
     $resultData = mysqli_stmt_get_result($stmt);

     if(mysqli_num_rows($resultData)){
      while($row = mysqli_fetch_array($resultData)){
        $realGender = $row['gender'];
          echo "<option selected>$realGender</option>";
      }
    }
    mysqli_stmt_close($stmt); 

      ?>    
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
      <option value="Unknown">Unknown</option>

      </select>
       <br> <br>

    <label for="country">Country</label> <br>
    <select id="country" name="country">
    <?php 
       $id = $_SESSION["userid"];
       mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
       $sql = "SELECT users_country FROM users WHERE users_id=?;";

       $stmt = mysqli_stmt_init($conn);

       if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../home.php?error=sqlerror");
       exit();
       }

     mysqli_stmt_bind_param($stmt, "s", $id);
     mysqli_stmt_execute($stmt);
     $resultData = mysqli_stmt_get_result($stmt);

     if(mysqli_num_rows($resultData)){
      while($row = mysqli_fetch_array($resultData)){
        $realCountry = $row['users_country'];
          echo "<option selected>$realCountry</option>";
      }
    }
    mysqli_stmt_close($stmt); 

      ?> 

    <option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
   <option value="Argentina">Argentina</option>
   <option value="Armenia">Armenia</option>
   <option value="Aruba">Aruba</option>
   <option value="Australia">Australia</option>
   <option value="Austria">Austria</option>
   <option value="Azerbaijan">Azerbaijan</option>
   <option value="Bahamas">Bahamas</option>
   <option value="Bahrain">Bahrain</option>
   <option value="Bangladesh">Bangladesh</option>
   <option value="Barbados">Barbados</option>
   <option value="Belarus">Belarus</option>
   <option value="Belgium">Belgium</option>
   <option value="Belize">Belize</option>
   <option value="Benin">Benin</option>
   <option value="Bermuda">Bermuda</option>
   <option value="Bhutan">Bhutan</option>
   <option value="Bolivia">Bolivia</option>
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
    </select>
    <div id="genderMessage" ></div> 
      </form> <br> <br>

    
    <h4>Account settings</h4>
    <hr> </hr>
     
    <?php
    $id = $_SESSION["userid"];   
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $stmt = $conn->prepare('SELECT * FROM users where users_id = ?;');
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_array()){
          echo "<div class='userinfo'>";
          ?>
          <label for="username">Username: </label> <br>
          <input type="text"  name="username" id="username" value="<?php echo  $row["users_username"] ?>" disabled> <br> <br> 
          
          <label for="registration">Registration date: </label> <br>
          <input type="text"  name="registration" id="registration" value="<?php echo  $row["create_datetime"] ?>" disabled> <br> <br> 

          <?php   
        echo "</div>";
    
        }
        $stmt->close();
    ?>
    <label for="regemail">Email adress</label> <br>
    <input type="text"  name="email" id="regemail" value="<?php echo  $_SESSION["email"] ?>" disabled>
    <button type="button" class="btn cancel" value="submit" name="submit" id="changeemail">Change</button> <br> <br>


    <label for="regpassword">Change password</label> <br>
    <input type="password"  name="regpassword" id="regpassword" value="owpakdpokadkopa" disabled>
    <button type="button" class="btn cancel" value="submit" name="submit" id="changepassword">Change</button> <br> <br> <br>

</div>

<!-- delete account button -->
<h4> <i class="fa fa-trash" aria-hidden="true"></i> Delete account</h4>
<hr> </hr>
<button onclick="document.getElementById('deleteAccount').style.display='block'" class="btn cancel" id="deleteaccount">Delete account</button>

<!-- form for delete account -->
<div id="deleteAccount" class="modalDelete">
<form action="<?php echo htmlspecialchars("includes/deleteaccount.inc.php");?>" method="post">
<div class="delete-container">
  
<div class="imgcontainer">
<span onclick="document.getElementById('deleteAccount').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img alt="Voteem" src="pictures/logo-transparent.png">
    </div>   

    <p>Are you really sure that you want to delete your account?</p>
    <input type="hidden" name="users_id" value="<?php echo  $_SESSION["userid"] ?>"> <br>
    <p>Your account will be completely terminated from our platform and you will not be able to recover anything if you decide to delete your account.</p>
    <p>Type in 'DELETE' if you wish to continue with this process.</p>
    <input type="text" name ="deleteAccountField" id="deleteAccountField" placeholder="DELETE">
    <button type="submit" class="btn cancel" name="submitdelete" id="deleteaccountbutton">Delete account</button> <br>
    <span class="errorAccountMsg" id="deleteSpan" >You must type DELETE in order to continue.</span>
    </div>
  </div>
</form>

</div>


<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

</body>
