<?php 
/**
    * page only for logins with access 1.
    * nested views to display admin tools.
*/
    if (  isset($_SESSION['USER_ID']) && isset($_SESSION['USER_NAME']) && $_SESSION['USER_ACCESS'] > 0 ): 
?>
<div id="admContainer">
    

    <div id="admin_nav">
        <a href="?view=admin&work=nyprod">Ny Produkt</a>        
        <a href="?view=admin&work=lager">Lagerstatus</a>        
        <a href="?view=admin&work=user">Användare</a>        
    </div>

   
    <?php
        if(isset($_GET['work'])){
            include('php/admin/' . $_GET['work'] . '.php'); 
        }
    ?>




    <?php
        else:
        header('Location: /marmelad/');
        endif;
    ?>

</div>