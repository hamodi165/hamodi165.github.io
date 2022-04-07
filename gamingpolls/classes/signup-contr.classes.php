<?php

class SignupContr extends Signup {

    private $username;
    private $password;
    private $repeatpassword;
    private $botquestion;

    public function _construct($username, $email, $password, $repeatpassword){
        $this->username = $username;
        $this->password = $email;
        $this->password = $password;
        $this->repeatpassword = $repeatpassword;
    }

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
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername(){
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch(){
        $result;
        if ($this->password !== $this->repeatpassword){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function usernameTakenCheck(){
        $result;
        if (!$this->checkUser($this->username, $this->email)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}
?>