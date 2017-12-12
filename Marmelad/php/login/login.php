<?php
/**
    * if logged in, script wont do much.
    * first collect the salt from the input username
    * when we check for brute force, if more then 3 tryes, they cannot continue to try for 15 min.$_COOKIE
    * when we collent the account data of the user
    * compare the password
    * add to the session as logged in
*/

    
      include_once('config/connection.php');
      include_once('php/url.php');

      $user = htmlspecialchars($_POST['username']);
      

      
    
      if ( !isset($_SESSION['USER_ID']) && !isset($_SESSION['USER_NAME']) ){

            $sqlSalt = 'SELECT salt FROM user WHERE Uname = "'.$user.'" LIMIT 1; ';
            $sthSalt = $conn->prepare($sqlSalt);
            $sthSalt->execute();
            $salt = $sthSalt->fetchAll();
            
            if(count($salt) !== 0){
            $pwd = hash('sha256', (htmlspecialchars($_POST['userpwd']) . $salt[0]['salt']));
            
           
            $datestart = date("Y-m-d H:i:s");
            $time = strtotime($datestart);
            $time = $time - (15 * 60);
            $date = date("Y-m-d H:i:s", $time);
            
            $sqlAttempts = "SELECT COUNT('user_email') FROM loginattempt WHERE user_email = '".$user."' AND time BETWEEN '".$date."' AND '".$datestart."';";

            $sthAttempts = $conn->prepare($sqlAttempts);
            $sthAttempts->execute();

            $attempts = $sthAttempts->fetchAll();
            
            if( $attempts[0][0] < 3){
                
                $sql = 'SELECT user_id, Uname, Pword, typ FROM user WHERE Uname = "'.$user.'" LIMIT 1;';
                $sth = $conn->prepare($sql);

                $sth->execute();

                $result = $sth->fetchAll();
                
                if (count($result) > 0){

                    if ( $pwd === $result[0]['Pword'] ){
                        $_SESSION["USER_ID"] = $result[0]['user_id'];
                        $_SESSION["USER_NAME"] = $result[0]['Uname'];
                        $_SESSION["USER_ACCESS"] = (int)$result[0]['typ'];
                        
                        header('location: '.$costumURL );
                        exit();

                    } else {

                        $sqlBrute = "INSERT INTO loginattempt (user_email) VALUES ('".$user."');";
                        $sthBrute = $conn->prepare($sqlBrute);
                        $sthBrute->execute();

                        echo "<div class='errorPage'><p>Fel Kontonamn eller lösenord. </p>";
                        echo "<a href='?view=login'>Försök igen</a> ";
                        echo "<a href='?view=register'>Jag har inget konto</a></div>";
                    }

                } else {
                    $sqlBrute = "INSERT INTO loginattempt (user_email) VALUES ('".$user."');";
                    $sthBrute = $conn->prepare($sqlBrute);
                    $sthBrute->execute();

                    echo "<div class='errorPage'><p>Fel Kontonamn eller lösenord. </p>";
                    echo "<a href='?view=login'>Försök igen</a> ";
                    echo "<a href='?view=register'>Jag har inget konto</a></div>";
                }


            } else {
                echo "<div class='errorPage'><p>För många försök.</p>";
                echo "<a href=''>Återställ Lösenord</a></div>";
            }   


            } else {
                echo "<div class='errorPage'><p>Fel Kontonamn eller lösenord. </p>";
                echo "<a href='?view=login'>Försök igen</a> ";
                echo "<a href='?view=register'>Jag har inget konto</a></div>";
            }
      } else {
        
        header('location: '.$costumURL );
        exit();
      }

     
        
   





?>