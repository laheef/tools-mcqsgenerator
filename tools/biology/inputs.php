<?php

declare(strict_types=1);

/**
 * The boxes a page asks for, per calculator: name => variable type.
 *
 *   php tools/biology/inputs.php pet-age dog-bmi …
 *
 * The browser QA fills only what this says is an input: a page's results are
 * stepped over, not typed into.
 */

require_once __DIR__ . '/../../config.php';

use Onim\Data;
use Onim\Solver;

$slugs = array_slice($argv, 1);
$out = [];
foreach ($slugs as $slug) {
    $calc = Data::calculator('/biology/' . $slug);
    if ($calc === null) {
        $out[$slug] = [];
        continue;
    }
    $rows = [];
    foreach (Solver::visibleInputs($calc) as $name => $_) {
        $rows[$name] = (string) ($calc['variables'][$name]['type'] ?? 'numerical');
    }
    $out[$slug] = $rows;
}
file_put_contents(sys_get_temp_dir() . '/inputs.json', json_encode($out, JSON_PRETTY_PRINT));
echo count($out), " pages\n";
