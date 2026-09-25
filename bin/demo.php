<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use FileFlow\Config\AppSettings;

// Two separate calls, from two "different" parts of the program.
$first  = AppSettings::getInstance(__DIR__ . '/../config/app.ini');
$second = AppSettings::getInstance(__DIR__ . '/../config/app.ini');

echo "First call  object id: " . spl_object_id($first) . PHP_EOL;
echo "Second call object id: " . spl_object_id($second) . PHP_EOL;

if ($first === $second) {
    echo "PASS: both calls returned the exact same AppSettings instance." . PHP_EOL;
} else {
    echo "FAIL: two different instances were created." . PHP_EOL;
}

echo PHP_EOL . "Sample values read from config/app.ini:" . PHP_EOL;
echo "  app_name    = " . $first->get('app_name') . PHP_EOL;
echo "  output_dir  = " . $first->get('output_dir') . PHP_EOL;
echo "  missing_key = " . ($first->get('missing_key', 'default-fallback')) . PHP_EOL;
