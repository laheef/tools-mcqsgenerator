<?php
/**
 * Exact value of the trigonometric functions (see _trig.php).
 *
 * Same six functions; this page printed them to seven decimals.
 */
require_once __DIR__ . '/_trig.php';

return trig_supplement([
    'precision' => '7',
    'exact'     => true,
    'title'     => 'Exact values of the trigonometric functions',
]);
