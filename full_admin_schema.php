<?php
require_once "modelos/conexion.php";
try {
    $link = Conexion::conectar();
    $stmt = $link->query("DESCRIBE administradores");
    $schema = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($schema as $col) {
        echo $col['Field'] . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
