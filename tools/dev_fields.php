<?php
/**
 * dev_fields.php — a quick look at one calculator's definition, for writing a repair.
 *
 *   bash tools/php.sh tools/dev_fields.php /health/tylenol-dosage [js|ds]
 *
 * Prints the variables with their types and labels, optionally the option lists
 * of every drop-down / radio field, and optionally the page script.
 */
require_once '/home/user/php-clone/config.php';

use Onim\Data;

$path = $argv[1] ?? '';
$what = $argv[2] ?? '';
$calc = Data::calculator($path);
if ($calc === null) {
    fwrite(STDERR, "no calculator at $path\n");
    exit(1);
}

echo 'NAME: ', $calc['name'] ?? '?', "\n";

$labels = [];
foreach (($calc['groups'] ?? []) as $g) {
    foreach (($g['m'] ?? []) as $m) {
        foreach ($m[1] as $col) {
            foreach ($col as $f) {
                if (($f['t'] ?? '') === 'v') {
                    $labels[$f['n']] = (string) ($f['l'] ?? '');
                }
            }
        }
    }
}

foreach (($calc['variables'] ?? []) as $n => $v) {
    printf("  %-28s %-14s %s\n", $n, $v['type'] ?? '?', $labels[$n] ?? '');
    if ($what === 'ds' && !empty($v['datasetUid'])) {
        $ds = $calc['datasets'][$v['datasetUid']] ?? [];
        $opts = $ds['options'] ?? [];
        echo '      uiType=', $ds['uiType'] ?? '?', '  n=', count($opts), "\n";
        foreach ($opts as $i => $o) {
            printf("      %2d uid=%-10s value=%-8s %s\n", $i, substr((string) $o['uid'], 0, 10),
                   $o['value'] ?? '', $o['label'] ?? '');
        }
    }
}

echo 'GROUPS ', count($calc['groups'] ?? []), '  EQ ', count($calc['eq'] ?? []),
     '  JS ', strlen((string) ($calc['js'] ?? '')), "\n";
if ($what === 'js') {
    echo $calc['js'] ?? '', "\n";
}
