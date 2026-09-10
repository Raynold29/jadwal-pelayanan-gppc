<?php

try {
    // Buat direktori sementara di /tmp yang diizinkan Vercel
    $directories = [
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/logs',
        '/tmp/bootstrap/cache',
    ];

    foreach ($directories as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
    }

    // Set environment variables untuk Vercel
    $_ENV['APP_STORAGE'] = '/tmp/storage';
    $_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
    
    // Muat file index.php asli dari folder public
    require __DIR__ . '/../public/index.php';

} catch (\Throwable $e) {
    // Tampilkan pesan error secara langsung di browser untuk diagnosa
    http_response_code(500);
    echo "<h1>Laravel Startup Error</h1>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "\n\n" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}