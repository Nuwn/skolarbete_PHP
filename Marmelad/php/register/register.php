<?php
/**
  * $_SESSION storage so the user dont have to input same if errors. removed upon completion.
  * small amout of validation, can be extended. check that the emails and password is same.
  * we hash a new password with a new unique random salt. to add function, check that salt doesnt exist in DB.
*/

      

if(count($_POST) > 0){
        $_SESSION['fnamn'] = $_POST['fnamn'];
        $_SESSION['enamn'] = $_POST['enamn'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['email_check'] = $_POST['email_check'];
        $_SESSION['addr1'] = $_POST['addr1'];
        $_SESSION['addr2'] = $_POST['addr2'];
        $_SESSION['postnr'] = $_POST['postnr'];
        $_SESSION['ort'] = $_POST['ort'];
        $_SESSION['ftele'] = $_POST['ftele'];
        $_SESSION['mtele'] = $_POST['mtele'];



        $fnamn = htmlspecialchars($_POST['fnamn']);
        $enamn = htmlspecialchars($_POST['enamn']);
        $password = htmlspecialchars($_POST['password']);
        $cpassword = htmlspecialchars($_POST['password_check']);
        $email = htmlspecialchars($_POST['email']);
        $cemail = htmlspecialchars($_POST['email_check']);
        $addr1 = htmlspecialchars($_POST['addr1']);
        $addr2 = htmlspecialchars($_POST['addr2']);
        $postnr = htmlspecialchars($_POST['postnr']);
        $ort = htmlspecialchars($_POST['ort']);
        $ftele = htmlspecialchars($_POST['ftele']);
        $mtele = htmlspecialchars($_POST['mtele']);

        //validation
        if($email !== $cemail){
            $_SESSION['emailError'] = "E-posten matchade inte."; 
            $_SESSION['email'] = "";
            $_SESSION['email_check'] ="";
        } else {
            $_SESSION['emailError'] = " ";

            if($password !== $cpassword){
                $_SESSION['pwdError'] = "Lösenordet matchade inte.";
            } else {
                unset($_SESSION['pwdError']);
                // send in data to server

                include_once("/config/connection.php");
            
                try {
                    //salt and hash the password
                    $salt = base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM));
                    $pwd = hash('sha256', ($password . $salt));
                
                    $sqlKund = 'INSERT INTO kund(Fnamn, Enamn, addr1, addr2, postnr, ort, Ftele, Mtele, Epost) 
                            VALUES ("'.$fnamn.'","'.$enamn.'","'.$addr1.'","'.$addr2.'",'.$postnr.',"'.$ort.'","'.$ftele.'","'.$mtele.'","'.$email.'");';
                    $sqlUser = 'INSERT INTO user(Uname, Pword, salt) VALUES ("'.$email.'","'.$pwd.'", "'.$salt.'");';
                    
                    $sthKund = $conn->prepare($sqlKund);
                    $sthUser = $conn->prepare($sqlUser);

                    $sthKund->execute();
                    $sthUser->execute();

                    unset($_SESSION['fnamn']);
                    unset($_SESSION['enamn']);
                    unset($_SESSION['email']);
                    unset($_SESSION['email_check']);
                    unset($_SESSION['addr1']);
                    unset($_SESSION['addr2']);
                    unset($_SESSION['postnr']);
                    unset($_SESSION['ort']);
                    unset($_SESSION['ftele']);
                    unset($_SESSION['mtele']);


                    //omdirigera 
                    include_once('url.php');
                    header('location: '.$costumURL.'?view=tack' );
                    exit();
               
                }
                catch (PDOexception $e){
                    if ($e->errorInfo[1]){
                        $emailError = "<p class='form_error'>E-post adressen är redan registrerad.</p>";
                    } else {
                        die("anslutning misslyckades");
                    }
                }

            }
        }   
    }
     ?>