<?php
require_once "modelos/conexion.php";

try {
    $link = Conexion::conectar();
    
    // Update categoria table
    $sql1 = "UPDATE categoria SET img = REPLACE(img, 'pequeñas.jpg', 'pequenas.jpg') WHERE img LIKE '%pequeñas.jpg%'";
    $stmt1 = $link->prepare($sql1);
    $stmt1->execute();
    echo "Updated " . $stmt1->rowCount() . " rows in categoria table.\n";

    // Just in case, update any other table that might have it
    $tables = ['banner', 'embarcaciones', 'reservas'];
    foreach ($tables as $table) {
        $sql = "UPDATE $table SET img = REPLACE(img, 'pequeñas.jpg', 'pequenas.jpg') WHERE img LIKE '%pequeñas.jpg%'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        echo "Updated " . $stmt->rowCount() . " rows in $table table.\n";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
