<?php
    function connect() {
        try {
            $host="localhost";
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
    connect();
?>