<?php
require_once "modelos/conexion.php";
$link = Conexion::conectar();
$stmt = $link->query("DESCRIBE usuarios1");
$schema = $stmt->fetchAll(PDO::FETCH_ASSOC);
file_put_contents("schema_usuarios1.json", json_encode($schema, JSON_PRETTY_PRINT));
echo "Schema written to schema_usuarios1.json\n";
