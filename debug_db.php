<?php
require_once "modelos/conexion.php";

try {
    $link = Conexion::conectar();
    echo "Connected successfully to " . $link->query('select database()')->fetchColumn() . "\n";
    
    $tables = $link->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    echo "Tables: " . implode(", ", $tables) . "\n";
    
    foreach ($tables as $table) {
        $count = $link->query("SELECT COUNT(*) FROM $table")->fetchColumn();
        echo "Table $table has $count rows.\n";
        if ($table == 'categoria') {
            $rows = $link->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
            print_r($rows);
        }
        if ($table == 'usuarios1') {
            $rows = $link->query("SELECT id_u, nombre, email FROM $table")->fetchAll(PDO::FETCH_ASSOC);
            print_r($rows);
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
