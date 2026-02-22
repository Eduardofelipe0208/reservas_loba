<?php
require_once "modelos/conexion.php";

try {
    $link = Conexion::conectar();
    
    $table = 'usuarios1';
    $stmt = $link->query("DESCRIBE $table");
    $schema = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "Schema for $table:\n";
    print_r($schema);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
