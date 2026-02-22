<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = ltrim($uri, '/');

// Si el archivo o directorio existe físicamente, dejar que el servidor lo maneje
if ($uri !== '' && file_exists(__DIR__ . '/' . $uri)) {
    return false;
}

// Si es exactamente la raíz
if ($uri === '') {
    require_once 'index.php';
    exit;
}

// Si la ruta comienza con 'backend'
if (strpos($uri, 'backend') === 0) {
    if ($uri !== 'backend' && file_exists(__DIR__ . '/' . $uri)) {
        return false;
    }
    
    $backendUri = substr($uri, 7); // quitar 'backend'
    $backendUri = ltrim($backendUri, '/');
    
    if ($backendUri !== '') {
        $_GET['pagina'] = $backendUri;
    }
    
    chdir(__DIR__ . '/backend');
    require_once 'index.php';
    exit;
}

// De lo contrario, pasar la ruta al parámetro 'pagina' de index.php raíz
$_GET['pagina'] = $uri;
require_once 'index.php';
