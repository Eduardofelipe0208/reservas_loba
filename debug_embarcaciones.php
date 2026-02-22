<?php
require_once "modelos/conexion.php";

try {
    $link = Conexion::conectar();
    
    $table = 'embarcaciones';
    $rows = $link->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
    echo "Embarcaciones table content:\n";
    print_r($rows);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
