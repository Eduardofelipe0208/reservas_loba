<?php
require_once "modelos/conexion.php";

try {
    $link = Conexion::conectar();
    
    $table = 'usuarios1';
    $rows = $link->query("SELECT id_u, nombre, email, password FROM $table LIMIT 2")->fetchAll(PDO::FETCH_ASSOC);
    echo "User sample with hashes:\n";
    foreach ($rows as $row) {
        echo "ID: " . $row['id_u'] . "\n";
        echo "Email: " . $row['email'] . "\n";
        echo "Hash: " . $row['password'] . "\n\n";
    }

    // Check a test password
    $testPass = "123456"; // common test password
    $salt = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';
    $hashed = crypt($testPass, $salt);
    echo "Hashed '123456' with salt: $hashed\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
