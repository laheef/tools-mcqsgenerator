<?php

declare(strict_types=1);

/**
 * Solve a calculator file with given inputs, one JSON request per line on stdin.
 *
 *   {"path":"/chemistry/mole","inputs":{"mass":36.46,"molar_mass":36.46}}
 *   -> {"ok":true,"values":{...},"placeholder":{...}}
 *
 * Used by tools/chemistry/qa.py to check the page's own engine against an
 * independent implementation of every formula.
 */

require_once __DIR__ . '/../../config.php';

use Onim\Data;
use Onim\Solver;

$units = Data::units();
while (($line = fgets(STDIN)) !== false) {
    $line = trim($line);
    if ($line === '') {
        continue;
    }
    $req = json_decode($line, true);
    $out = ['ok' => false, 'error' => 'bad request'];
    if (is_array($req) && isset($req['path'])) {
        $calc = Data::calculator((string) $req['path']);
        if ($calc === null) {
            $out = ['ok' => false, 'error' => 'no calculator'];
        } else {
            $inputs = [];
            foreach ((array) ($req['inputs'] ?? []) as $k => $v) {
                $inputs[(string) $k] = (float) $v;
            }
            try {
                $run = Solver::solve($calc, $inputs, $units);
                $values = [];
                foreach ($run->values as $k => $v) {
                    $values[$k] = $v === null ? null : (float) $v;
                }
                $out = ['ok' => true, 'values' => $values, 'placeholder' => (object) $run->placeholder];
            } catch (\Throwable $e) {
                $out = ['ok' => false, 'error' => $e->getMessage()];
            }
        }
    }
    echo json_encode($out, JSON_UNESCAPED_UNICODE), "\n";
}
