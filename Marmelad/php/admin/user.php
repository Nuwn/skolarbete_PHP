  <?php 
        $kundsql = "SELECT kund_id,Fnamn, Enamn, addr1, addr2, postnr, ort, Ftele, Mtele, Epost FROM kund WHERE Epost NOT LIKE '%admin%';";
        $sthkund = $conn->prepare($kundsql);
        $sthkund->execute();
        $kundResult = $sthkund->fetchAll();
    ?>  
    <table id="anvLista">
        <tr>
            <th>Förnamn</th>
            <th>Efternamn</th>
            <th>Adress</th>
            <th>c.o Adress</th>
            <th>Postnummer</th>
            <th>Ort</th>
            <th>Hemtelefon</th>
            <th>Mobiltelefon</th>
            <th>E-post</th>
        </tr>
    <?php foreach($kundResult as $kund){ ?>
        <tr>
            <td><?php echo $kund['Fnamn']; ?></td>
            <td><?php echo $kund['Enamn']; ?></td>
            <td><?php echo $kund['addr1']; ?></td>
            <td><?php echo $kund['addr2']; ?></td>
            <td><?php echo $kund['postnr']; ?></td>
            <td><?php echo $kund['ort']; ?></td>
            <td><?php echo $kund['Ftele']; ?></td>
            <td><?php echo $kund['Mtele']; ?></td>
            <td><?php echo $kund['Epost']; ?></td>
            
           
        </tr>
    <?php } ?>
    </table>