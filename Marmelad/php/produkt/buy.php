<?php

        
        session_start();

        $varukorg = $_SESSION['VARUKORG'];
  
     
        

        $xml = new DomDocument("1.0","UTF-8");

        $rss = $xml->createElement("rss");
        $rss = $xml->appendChild($rss);
        


        $channel = $xml->createElement("channel");
        $channel = $rss->appendChild($channel);

        $title = $xml->createElement("title", "Kvitto");
        $title = $channel->appendChild($title);

        $description = $xml->createElement("description", "Tack för att du handlat.");
        $description = $channel->appendChild($description);

        foreach ($varukorg as $row) {
            $item = $xml->createElement("item");
            $title = $channel->appendChild($item);
            
            $itemTitle = $xml->createElement("namn", htmlspecialchars($row["namn"]));
            $itemTitle = $item->appendChild($itemTitle);

            $itemLink = $xml->createElement("antal", htmlspecialchars($row["antal"]));
            $itemLink = $item->appendChild($itemLink);

            $itemDesc = $xml->createElement("pris", htmlspecialchars($row["pris"]));
            $itemDesc = $item->appendChild($itemDesc);
        }
        $rss = $rss->setAttribute("version", "2.0");
        $xml->FormatOutput = true;
        $output = $xml->saveXML();

        $files = glob('../../xml/*.xml');
        $filecount = 0;
        if ( $files !== false ){
            $filecount = count( $files );   
        }
        $filecount ++;



        $xml->save("../../xml/kvitto$filecount.xml");
    
        header('Content-disposition: attachment; filename="kvitto.xml"');
        header('Content-type: "text/xml"; charset="utf8"');
        readfile("../../xml/kvitto$filecount.xml");

   
?>