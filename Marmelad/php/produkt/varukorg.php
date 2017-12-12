<?php
/**
    * Collect the get data to prossess.
    * add: first check that the item isnt in the list, if it is, add up on it, if not make a new one.
    * remove: if the keyword is all, we remove all, or we remove depending on key sent
*/



include_once('/config/connection.php');
if(!empty($_GET['shopping'])){
    switch ($_GET['shopping']){
        case "add": 
            if(!empty($_GET['barcode'])){
                
                $produkt = "SELECT varu_id, namn, img, pris  FROM produkt WHERE varu_id = ".$_GET['barcode'].";";
                $sthShop = $conn->prepare($produkt);
                $sthShop->execute();
                $result = $sthShop->fetchAll();
                foreach($result as $vara){
                    if(!empty($_SESSION["VARUKORG"])){
                        
                        $item = null;
                        $pris = 0;
                        foreach($_SESSION["VARUKORG"] as $key=>$struct) {
                            if((int)$vara['varu_id'] === (int)$struct['varu_id']) {
                                $item = $key;
                                $pris = $struct['pris'];
                                break;
                            }
                        }
                        echo $item;
                        if($item === null){
                            $key = array('antal');
                            $antal = array_fill_keys($key, 1);
                            $_SESSION["VARUKORG"][] = array_merge($vara,$antal); 
                        } else {
                            $_SESSION["VARUKORG"][$item]['antal'] += 1; 
                            $_SESSION["VARUKORG"][$item]['pris'] += $pris; 
                        }
                        
                    } else {
                        $key = array('antal');
                        $antal = array_fill_keys($key, 1);
                        $_SESSION["VARUKORG"][] = array_merge($vara,$antal); 
                       
                    } 
                }
                if (!empty($_SERVER['HTTP_REFERER']))
                    header("Location: ".$_SERVER['HTTP_REFERER']);
                else
                    header("Location: /marmelad/");
            }

        break;
        case "remove":
        //vi tar bort med index från varukorgen som vi genererar.
            if(!empty($_GET['Itemindex']) || $_GET['Itemindex'] === "0"){
                if($_GET['Itemindex'] === "all"){
                    unset ( $_SESSION["VARUKORG"]);

                    if (!empty($_SERVER['HTTP_REFERER'])){
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                    }else{
                        header("Location: /marmelad/");
                    }  
                } else {
                    unset ( $_SESSION["VARUKORG"][$_GET['Itemindex']]);

                    if (!empty($_SERVER['HTTP_REFERER'])){
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                    }else{
                        header("Location: /marmelad/");
                    }    
                }
            }
        break;
    }

}
?>          