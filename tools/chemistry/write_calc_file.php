<?php

declare(strict_types=1);

/**
 * Write one calculator file from a JSON definition.
 *
 *   php tools/chemistry/write_calc_file.php /tmp/def.json
 *
 * The JSON holds the same array the file will return. It is validated first
 * and rendered through CalcFile::render(), so a generated file is byte-for-byte
 * the shape a hand-written one is.
 */

require_once __DIR__ . '/../../config.php';

use Onim\CalcFile;

$file = $argv[1] ?? '';
if ($file === '' || !is_file($file)) {
    fwrite(STDERR, "usage: write_calc_file.php <definition.json>\n");
    exit(2);
}
$def = json_decode((string) file_get_contents($file), true);
if (!is_array($def)) {
    fwrite(STDERR, "not a JSON object: $file\n");
    exit(2);
}
$cat  = (string) ($def['_cat'] ?? 'chemistry');
$slug = (string) ($def['_slug'] ?? '');
unset($def['_cat'], $def['_slug']);
if ($slug === '') {
    fwrite(STDERR, "no _slug\n");
    exit(2);
}
$path = '/' . $cat . '/' . $slug;
$check = CalcFile::validate($def, $path);
if (!$check['ok']) {
    fwrite(STDERR, "invalid: " . $check['error'] . "\n");
    exit(1);
}
$target = CalcFile::absolute('plugins/calc/' . $cat . '/qm-calc-' . $slug . '.php');
@mkdir(dirname($target), 0775, true);
file_put_contents($target, CalcFile::render($def, $path));
echo $target, "\n";
