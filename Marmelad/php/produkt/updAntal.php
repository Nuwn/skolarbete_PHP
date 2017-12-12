<?php
    include_once("../../config/connection.php");

    $Lantal =(int) htmlspecialchars($_POST['lagerantal']);
    $Lid = (int) htmlspecialchars($_POST['lagerid']);
    
    try {
        
    $sql = "UPDATE antal SET antal = ".$Lantal." WHERE varu_id = ".$Lid.";";
    $sth = $conn->prepare($sql);
    $sth->execute();
    header('Location: /marmelad/?view=admin&work=lager');

    } catch (PDOexception $e){
        echo $e;
        echo "Fel. försök igen"; 
    }


?>