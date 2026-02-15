<?php
$ok = [];
$fail = [];
try {
    $ok[] = 'php_version: '.PHP_VERSION;
    $autoload = __DIR__.'/../vendor/autoload.php';
    if (!file_exists($autoload)) {
        $fail[] = 'vendor_autoload_missing';
    } else {
        require $autoload;
        $ok[] = 'vendor_autoload_loaded';
    }
    $storage = __DIR__.'/../storage';
    if (!is_dir($storage)) {
        $fail[] = 'storage_missing';
    } else {
        if (is_writable($storage)) {
            $ok[] = 'storage_writable';
        } else {
            $fail[] = 'storage_not_writable';
        }
    }
} catch (\Throwable $e) {
    $fail[] = 'exception: '.$e->getMessage();
}
header('Content-Type: application/json');
echo json_encode(['ok'=>$ok,'fail'=>$fail]);
