<?php
require_once "modelos/conexion.php";
try {
    $link = Conexion::conectar();
    $stmt = $link->query("SELECT usuario, password FROM administradores");
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($admins as $admin) {
        $pass = $admin['password'];
        $isHash = (strpos($pass, '$2a$') === 0);
        echo "User: " . $admin['usuario'] . " | Pass: " . substr($pass, 0, 10) . "... | IsHash: " . ($isHash ? "YES" : "NO") . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
