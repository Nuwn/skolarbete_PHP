<?php
 include_once('php/url.php');
 if(isset($_GET['logout'])){
    session_destroy();
    header('location: '.$costumURL );
 }