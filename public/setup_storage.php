<?php
header('Content-Type: application/json');
$base = realpath(__DIR__.'/..');
$created = [];
$exists = [];
$errors = [];

function ensureDir($path, &$created, &$exists, &$errors) {
    if (is_dir($path)) {
        $exists[] = $path;
        return;
    }
    if (@mkdir($path, 0755, true)) {
        $created[] = $path;
    } else {
        $errors[] = "mkdir_failed:$path";
    }
}

$paths = [
    $base.'/storage',
    $base.'/storage/framework',
    $base.'/storage/framework/cache',
    $base.'/storage/framework/sessions',
    $base.'/storage/framework/views',
    $base.'/storage/framework/testing',
    $base.'/storage/app',
    $base.'/storage/app/public',
    $base.'/storage/app/private',
    $base.'/bootstrap/cache',
];

foreach ($paths as $p) {
    ensureDir($p, $created, $exists, $errors);
}

echo json_encode([
    'created' => $created,
    'exists' => $exists,
    'errors' => $errors,
]);
