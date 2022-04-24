<?php
<<<<<<< HEAD
<<<<<<< HEAD
class Signup extends Dbh {

    protected function setUser($username, $password, $email){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_username, users_password, users_email) VALUES (?,?,?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $hashedPwd, $email))){
=======
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)

class Signup extends dbh {

    protected function setUser($username, $email, $password){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_username, users_email, users_password) VALUES (?,?,?);');
        
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);


        if(!$stmt->execute(array($username, $email, $hashedpassword))){
<<<<<<< HEAD
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();
        }
<<<<<<< HEAD
<<<<<<< HEAD
        
        $stmt = null;
    }

    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare('SELECT users_username FROM users WHERE users_username = ? OR users_email = ?;');

=======
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)

        $stmt = null;
    }


    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare('SELECT users_username FROM users WHERE users_username = ? OR users_email = ?;');
        
<<<<<<< HEAD
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
        if(!$stmt->execute(array($username, $email))){
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======

>>>>>>> parent of 70d99ae (har fixat registrering och login system)
        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

<<<<<<< HEAD
<<<<<<< HEAD

}
=======
}
?>
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
}
?>
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
