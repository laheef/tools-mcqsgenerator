<?php
/**
 * Trig functions with the exact radical forms (see _trig.php).
 */
require_once __DIR__ . '/_trig.php';

return trig_supplement([
    'exact' => true,
    'title' => 'Trigonometric functions, decimals beside exact forms',
    'note'  => 'the reference shows the radical form at 30°, 45°, 60° and their images',
]);
