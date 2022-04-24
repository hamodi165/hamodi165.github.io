<?php
class SignupContr extends Signup{

    private $username;
    private $email;
    private $password;
    private $repeatpassword;


    public function _construct($username, $email, $password, $repeatpassword){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->repeatpassword = $repeatpassword;
    }


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

        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;

        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(){
        $result;
        if($this->password !== $this->repeatpassword){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck(){
        $result;
        if(!$this->checkUser($this->username, $this->email)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}
