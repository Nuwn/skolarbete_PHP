<?php 
    include('php/register/register.php');
    if ( !isset($_SESSION['USER_ID']) && !isset($_SESSION['USER_NAME'])  ) :
        
?>
<div id="formContainer">
    <form method="POST">
        <div>
        <label for="fnamn">Förnamn.</label>
        <input type="text" name="fnamn" value="<?php if( isset ($_SESSION['fnamn'])){ echo $_SESSION['fnamn'];} ?>" required>
        <label for="enamn">Efternamn.</label>
        <input type="text" name="enamn" value="<?php if( isset ($_SESSION['enamn'])){ echo $_SESSION['enamn'];} ?>" required>
        <label for="email">E-post.</label>
        <input type="email" name="email" value="<?php if( isset ($_SESSION['email'])){ echo $_SESSION['email'];} ?>" required>
        <label for="email_check">Vänligen skriv in E-post igen.</label>
        <input type="email" name="email_check" value="<?php if( isset ($_SESSION['email_check'])){ echo $_SESSION['email_check'];} ?>" required>
        <p class='form_error'><?php if(isset($_SESSION['emailError'])){ echo $_SESSION['emailError']; } ?></p>
        <label for="password">Lösenord.</label>
        <input type="password" name="password"  required>
        <label for="password_check">Vänligen skriv in lösenordet igen.</label>
        <input type="password" name="password_check"  required>
        <p class='form_error'><?php if(isset($_SESSION['pwdError'])){ echo $_SESSION['pwdError']; } ?></p>
        </div>
        <div>
        <label for="addr1">Adress.</label>
        <input type="text" name="addr1" value="<?php if( isset ($_SESSION['addr1'])){ echo $_SESSION['addr1'];} ?>" required>
        <label for="addr2">c.o Adress.</label>
        <input type="text" name="addr2" value="<?php if( isset ($_SESSION['addr2'])){ echo $_SESSION['addr2'];} ?>" >
        <label for="postnr">Postnummer.</label>
        <input type="text" name="postnr" value="<?php if( isset ($_SESSION['postnr'])){ echo $_SESSION['postnr'];} ?>" required>
        <label for="ort">Ort.</label>
        <input type="text" name="ort" value="<?php if( isset ($_SESSION['ort'])){ echo $_SESSION['ort'];} ?>" required>
        <label for="ftele">Hemtelefon.</label>
        <input type="text" name="ftele" value="<?php if( isset ($_SESSION['ftele'])){ echo $_SESSION['ftele'];} ?>">
        <label for="mtele">Mobiltelefon.</label>
        <input type="text" name="mtele" value="<?php if( isset ($_SESSION['mtele'])){ echo $_SESSION['mtele'];} ?>" required>
        <input type="submit" value="Registrera">
        </div>
    </form>
</div>

<?php
    endif;
?>