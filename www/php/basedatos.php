<?php
    function connect() {
        try {
            $host="db";
            $dbname="mydb";
            $user="root";
            $pass="test";
            $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            return $dbh;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    function close($dbh) {
        $dbh = null;
    }
    
?>