<?php
require_once "modelos/conexion.php";
try {
    $link = Conexion::conectar();
    $stmt = $link->query("DESCRIBE administradores");
    $schema = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($schema);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
