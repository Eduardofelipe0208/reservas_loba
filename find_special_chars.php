<?php
function scanDirRecursive($dir) {
    $it = new RecursiveDirectoryIterator($dir);
    foreach (new RecursiveIteratorIterator($it) as $file) {
        if ($file->isFile()) {
            $filename = $file->getFilename();
            if (preg_match('/[^A-Za-z0-9\._-]/', $filename)) {
                echo "Special chars found: " . $file->getPathname() . "\n";
            }
        }
    }
}

echo "Scanning frontend images...\n";
scanDirRecursive("vistas/img");
echo "Scanning backend images...\n";
scanDirRecursive("backend/vistas/img");
echo "Scanning backend imagenes...\n";
scanDirRecursive("backend/vistas/imagenes");
echo "Scan complete.\n";
