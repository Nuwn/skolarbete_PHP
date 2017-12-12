 <?php 
/**
    *Collects data we need in 'produkt' and 'antal'
    *create a table for display
    *form to update the data
*/

        $antalsql = "SELECT p.varu_id, a.antal, p.namn 
                    FROM antal a
                    RIGHT JOIN produkt p
                    ON a.varu_id = p.varu_id
                    ORDER BY p.varu_id;";
        $sthantal = $conn->prepare($antalsql);
        $sthantal->execute();
        $antalMarmelad = $sthantal->fetchAll();
       
    ?>
    <div id="lager">
        <table>
            <tr>
                <th>ID</th>
                <th>Namn</th>
                <th>Antal</th>
            </tr>
            <?php foreach($antalMarmelad as $marmelad){ ?>
            <tr>
                <td><?php echo $marmelad['varu_id']; ?></td>
                <td><?php echo $marmelad['namn']; ?></td>
                <td><?php echo $marmelad['antal']; ?></td>
            </tr>
            <?php } ?>
        </table>

        <div id="prodAntal">
            <form method="POST" action="./php/produkt/updAntal.php">
            <label for="lagerid">Id:</label>
            <input type="text" name="lagerid" value="">
            <label for="lagerantal">Antal:</label>
            <input type="text" name="lagerantal" value="">
            <input type="submit" name="submit" value="Uppdatera">
        </div>
    </div>