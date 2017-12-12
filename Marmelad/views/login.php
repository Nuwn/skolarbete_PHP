<?php 
if (  !isset($_SESSION['USER_ID']) && !isset($_SESSION['USER_NAME'])  ){ 

    echo '<div id="loginContainer">';
    echo '<form method="POST" action="?view=loginstart">';
    echo '<label for="username">E-post:</label>';
    echo '<input type="text" name="username" required >';
    echo '<label for="userpwd">Lösenord:</label>';
    echo '<input type="password" name="userpwd" required>';
    echo '<input type="submit" name="submit" value="Logga in">';
    echo '</form>';
    echo '</div>';

} else {

    echo "Du är redan inloggad";
    echo "<a href='?view=home'>Återgå</a>";
    exit();
}
?>