<?php

    include_once('/config/connection.php');

    try{
    
    $sql = 'SELECT * FROM produkt ORDER BY typ;';
        
    $sth = $conn->prepare($sql);

    $sth->execute();
    $result = $sth->fetchAll();
    

    } catch (PDOexception $e) {
        echo "Någoting gick fel";
    }

    echo "<div id='produktContainer'>";
    foreach($result as $item){
        echo "<div class='produkt'>";
        echo "<img class='produktImg' src='./".$item['img']."'/>";
        echo "<div class='produkt_info'><p>".$item['typ']."</p>";
        echo "<h4>".$item['namn']. " " .round($item['vikt'])." gram.</h4>";
        
        echo "<p>".$item['info']."</p></div>";
        echo "<p class='pris'>".$item['pris']." kr.</p>";
        echo "<div class='produkt_int'><a href='".$url."shopping=add&barcode=".$item['varu_id']."'><button class='shopBTN'>Lägg till i varukorgen</button></a></div>";
        echo "</div>";
    }
    echo "</div>";

?>

