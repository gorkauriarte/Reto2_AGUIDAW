<?php
    include_once "basedatos.php";
    function select() {
        $dbh = connect();

        $stmt = $dbh->prepare("SELECT id, nombre, apellido FROM usuarios");
        $stmt -> execute();

        echo "<table>";
        while($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["apellido"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        close($dbh);
    } 
?>