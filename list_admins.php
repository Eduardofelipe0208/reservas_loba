<?php
require_once "modelos/conexion.php";
try {
    $link = Conexion::conectar();
    $stmt = $link->query("SELECT nombre, email FROM administradores");
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($admins as $admin) {
        echo "Admin: " . $admin['nombre'] . " | Email/User: " . $admin['email'] . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
