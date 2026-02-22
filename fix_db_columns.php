<?php
require_once "modelos/conexion.php";

try {
    $link = Conexion::conectar();
    
    // Fix usuarios1 password column
    $sql1 = "ALTER TABLE usuarios1 MODIFY COLUMN password VARCHAR(255) NOT NULL";
    $link->exec($sql1);
    echo "Altered usuarios1 table.\n";

    // Fix administradores password column if needed
    $sql2 = "ALTER TABLE administradores MODIFY COLUMN password VARCHAR(255) NOT NULL";
    try {
        $link->exec($sql2);
        echo "Altered administradores table.\n";
    } catch (Exception $e) {
        echo "Could not alter administradores (maybe column name is different or table doesn't exist): " . $e->getMessage() . "\n";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
