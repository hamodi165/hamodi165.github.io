<?php
<<<<<<< HEAD
<<<<<<< HEAD
class SignupContr extends Signup{

    private $username;
    private $email;
    private $password;
    private $repeatpassword;


    public function _construct($username, $email, $password, $repeatpassword){
        $this->username = $username;
        $this->email = $email;
=======
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)

class SignupContr extends Signup {

    private $username;
    private $password;
    private $repeatpassword;
    private $botquestion;

    public function _construct($username, $email, $password, $repeatpassword){
        $this->username = $username;
        $this->password = $email;
<<<<<<< HEAD
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
        $this->password = $password;
        $this->repeatpassword = $repeatpassword;
    }

<<<<<<< HEAD
<<<<<<< HEAD

    public function signupUser(){
        if($this->emptyInput() === false){
            // echo empty input
            header("location: ../register.php?error=emptyinput");
            exit();
        }

        if($this->invalidUid() == false){
            // echo empty input
            header("location: ../register.php?error=username");
            exit();
        }

        if($this->invalidEmail() == false){
            // echo empty input
            header("location: ../register.php?error=email");
            exit();
        }

        if($this->pwdMatch() == false){
            // echo empty input
            header("location: ../register.php?error=passwordmatch");
            exit();
        }

        if($this->uidTakenCheck() == false){
            // echo empty input
            header("location: ../register.php?error=usernameoremailtaken");
            exit();
        }

        $this->setUser($this->username, $this->email, $this->password);
    }


    private function emptyInput(){
        $result;
        if(empty($this->username) or empty($this->email) or empty($this->password) or empty($this->repeatpassword)){
            $result = false;

=======
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
    public function signupUser() {
       if($this->emptyInput() == false){
        //echo "empty input!";
        header("location: ../register.php?error=emptyinput");
        exit();
       }

       if($this->invalidUsername() == false){
        //echo "invalid username";
        header("location: ../register.php?error=username");
        exit();
       }

       if($this->invalidEmail() == false){
        //echo "invalid email";
        header("location: ../register.php?error=email");
        exit();
       }

       if($this->passwordMatch() == false){
        //echo "passwords dont match";
        header("location: ../register.php?error=password");
        exit();
       }
       if($this->usernameTakenCheck() == false){
        //echo "username or email taken";
        header("location: ../register.php?error=useroremailtaken");
        exit();
       }

       $this->setUser($this->username, $this->email, $this->password);

    }



    private function emptyInput() {
        $result;

        if(empty($this->username ) || empty($this->email) || ($this->password) || empty($this->repeatpassword)){
            $result = false;
<<<<<<< HEAD
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
        } else {
            $result = true;
        }
        return $result;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    private function invalidUid(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;

=======
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
    private function invalidUsername(){
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;
<<<<<<< HEAD
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result;
<<<<<<< HEAD
<<<<<<< HEAD
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
=======
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    private function pwdMatch(){
        $result;
        if($this->password !== $this->repeatpassword){
=======
    private function passwordMatch(){
        $result;
        if ($this->password !== $this->repeatpassword){
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
    private function passwordMatch(){
        $result;
        if ($this->password !== $this->repeatpassword){
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    private function uidTakenCheck(){
        $result;
        if(!$this->checkUser($this->username, $this->email)){
=======
    private function usernameTakenCheck(){
        $result;
        if (!$this->checkUser($this->username, $this->email)){
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
    private function usernameTakenCheck(){
        $result;
        if (!$this->checkUser($this->username, $this->email)){
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}
<<<<<<< HEAD
<<<<<<< HEAD
=======
?>
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
?>
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
