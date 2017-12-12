<div id="nyProduktContainer">
        <form method="POST" action="./php/produkt/nyprodukt.php" enctype="multipart/form-data">
            <label for="produktname">Produkt namn.</label>
            <input type="text" name="produktname" value="">
            
            

            <label for="typ">Produkt typ.</label>
            <select name="typ">
                <option value="Standard">Standard</option>
                <option value="Premium">Premium</option>
                <option value="Superior">Superior</option>
            </select>    
            <label for="vikt">Produktens vikt.</label>
            <input type="text" name="vikt" value="">
            <label for="pris">Produktens pris.</label>
            <input type="text" name="pris" value="">
            <label for="info">Produktens information.</label>
            <textarea name="info" rows="6"></textarea>
            <div class="nyProdBTN">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <label for="fileToUpload" id="fileText">Välj bild...</label>
                <input type="submit" name="submit" value="Lägg till" class="shopBTN">
            </div>
        </form>
</div>