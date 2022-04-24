<?php

class Dbh {
<<<<<<< HEAD
<<<<<<< HEAD
    protected function connect(){
      $servername = "localhost";
      $username = "root";
      $password = "";
      
      try {
        $dbh = new PDO("mysql:host=$servername;port=3307;dbname=userdatabase", $username, $password);
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    }
}
=======
=======
>>>>>>> parent of 70d99ae (har fixat registrering och login system)

    protected function connect() {
        /* Database credentials. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        define('DB_SERVER', 'localhost:3307');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'userdatabase');
 
/* Attempt to connect to MySQL database */
    try{
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
    }
    
        }

  }
<<<<<<< HEAD
?>
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
=======
?>
>>>>>>> parent of 70d99ae (har fixat registrering och login system)
