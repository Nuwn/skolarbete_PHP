<?php
    define("host", "localhost");
    define("username", "root");
    define("password", "");
    define("dbname", "marmelad");
    define("dns", "mysql:host=".host.";dbname=".dbname.";");

    $conn = new PDO(dns, username, password);
    $conn->exec("SET CHARACTER SET utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>