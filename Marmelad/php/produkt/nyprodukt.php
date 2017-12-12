<?php
/**
    * functions to upload image and move them to img folder
    * then we insert correct data to sql to tables it is ment to go, when function is called.$_COOKIE
*/

    include_once("../../config/connection.php");
    

    $produktname = htmlspecialchars($_POST['produktname']);
    $typ = htmlspecialchars($_POST['typ']);
    $vikt = floatval( htmlspecialchars($_POST['vikt']) );
    $pris = floatval( htmlspecialchars($_POST['pris']) );
    $info = htmlspecialchars($_POST['info']);

    //uploada fil och skapa $ för dir.
    $target_dir = "c:/xampp/htdocs/Marmelad/img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $imgSQLDir = "/img/".$_FILES["fileToUpload"]["name"];
    // Check if image file is a actual image or fake image
    
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        // vi skapar produkten även om bilden finns!
        insertData($conn);
        echo "Uppladdning Klar";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) { 
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            // allt är ok, ladda upp till sql!
            insertData($conn);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    
    

    function insertData($conn) {
        global $produktname;
        global $imgSQLDir;
        global $info;
        global $typ;
        global $vikt;
        global $pris;
        
        $sql = 'INSERT INTO produkt(namn, img, info, typ, vikt, pris) 
                VALUES ("'.$produktname.'","'.$imgSQLDir.'","'.$info.'","'.$typ.'","'.$vikt.'","'.$pris.'");';
        
        $sth = $conn->prepare($sql);

        $sth->execute();
        $sthres =(int) $conn->lastInsertId();
        
        $sql2 = 'INSERT INTO antal (varu_id, antal) VALUES ('.$sthres.',0);';
        $sth2 = $conn->prepare($sql2);
        $sth2->execute();
        

        header('Location: /marmelad/?view=admin');
    }


?>