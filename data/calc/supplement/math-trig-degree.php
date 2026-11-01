<?php
/**
 * Trigonometric functions of an angle in degrees (see _trig.php).
 *
 * The page takes one angle and answers with sin, cos, tan, cot, sec and csc.
 * The numbers were derived and dropped: none of the six has a box, and the
 * sentence that should have carried them lost its values in the harvest.
 */
require_once __DIR__ . '/_trig.php';

return trig_supplement([
    'title' => 'Trigonometric functions of an angle',
    'note'  => 'decimals only on this page; the exact-form pages are trig-function and trigonometric-functions',
]);
