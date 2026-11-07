<?php

declare(strict_types=1);

/**
 * Calculator-file tests.
 *
 * Every calculator that lives in plugins/calc is checked three ways:
 *
 *   1. the file is valid — it returns an array, names the page, and every
 *      formula reads a box that is actually on the form;
 *   2. it builds — the record compiles and the solver produces at least one
 *      finite number from the page's own inputs;
 *   3. it is a page — the path routes, the metadata is in the window the SEO
 *      rules set, and no two pages share a title.
 *
 * Run:  php tests/calc_files.php [category]
 */

require_once __DIR__ . '/../config.php';

use Onim\CalcFile;
use Onim\Data;
use Onim\Solver;

$only = $argv[1] ?? '';
$pass = 0;
$fail = 0;

$say = static function (bool $ok, string $what, string $detail = '') use (&$pass, &$fail): void {
    if ($ok) {
        $pass++;
        return;
    }
    $fail++;
    echo 'FAIL  ' . $what . ($detail !== '' ? '  — ' . $detail : '') . "\n";
};

$units = Data::units();
$files = CalcFile::manifest(true);
if ($only !== '') {
    $files = array_filter($files, static fn (array $f): bool => $f['cat'] === $only);
}
echo 'calculator files: ' . count($files) . "\n";

$titles  = [];
$words   = [];
$inRange = ['title' => 0, 'desc' => 0];
$solved  = 0;

foreach ($files as $path => $file) {
    $say($file['error'] === '', 'valid: ' . $path, $file['error']);
    if ($file['error'] !== '') {
        continue;
    }

    $record = CalcFile::record($path);
    $say($record !== null, 'builds: ' . $path);
    if ($record === null) {
        continue;
    }

    $calc = Data::calculator($path);
    $say($calc !== null, 'page: ' . $path);
    if ($calc === null) {
        continue;
    }

    /* The form has to be usable: at least one box to type in and one result. */
    $visible = Solver::visibleInputs($calc);
    $say($visible !== [], 'has fields: ' . $path);

    /* Sample inputs, then the solver. A page whose formulas never produce a
       finite number is a page that answers nothing. */
    $inputs = [];
    foreach ($visible as $name => $_) {
        $type = (string) ($calc['variables'][$name]['type'] ?? 'numerical');
        if ($type === 'numerical') {
            $inputs[$name] = 2.0;
        } elseif ($type === 'valueSelect') {
            $value = Solver::selectValue($calc, $name, $calc['variables'][$name], null);
            if ($value !== null) {
                $inputs[$name] = $value;
            }
        }
    }
    if ($inputs !== []) {
        $run = Solver::solve($calc, $inputs, $units);
        $finite = 0;
        foreach ($calc['variables'] as $name => $var) {
            $value = $run->values[$name] ?? null;
            if ($value !== null && is_finite((float) $value) && empty($run->placeholder[$name])) {
                $finite++;
            }
        }
        if ($finite > 0) {
            $solved++;
        }
        $say($finite > 0, 'computes: ' . $path, 'no finite result from ' . count($inputs) . ' inputs');
    }

    /* Metadata. */
    $titleLen = mb_strlen((string) $calc['seoTitle'], 'UTF-8') + 7;
    $descLen  = mb_strlen((string) $calc['description'], 'UTF-8');
    if ($titleLen >= 50 && $titleLen <= 60) {
        $inRange['title']++;
    }
    if ($descLen >= 150 && $descLen <= 160) {
        $inRange['desc']++;
    }
    $lower = mb_strtolower((string) $calc['seoTitle'], 'UTF-8');
    $say(!isset($titles[$lower]), 'unique title: ' . $path, 'same as ' . ($titles[$lower] ?? ''));
    $titles[$lower] = $path;

    $say($descLen > 0, 'has description: ' . $path);
    $say(count($calc['faq']) >= 3, 'has FAQ: ' . $path, count($calc['faq']) . ' questions');
    $say(count($calc['article']) >= 2, 'has article: ' . $path, count($calc['article']) . ' blocks');

    $text = '';
    foreach ($calc['article'] as $block) {
        $text .= ' ' . strip_tags((string) ($block['html'] ?? ''));
    }
    $words[$path] = str_word_count($text);
}

$total = max(1, count($files));
echo "\ntitles in window: {$inRange['title']}/{$total}"
    . " | descriptions in window: {$inRange['desc']}/{$total}"
    . " | computing: {$solved}/{$total}\n";
if ($words !== []) {
    $sorted = array_values($words);
    sort($sorted);
    echo 'words: min ' . $sorted[0]
        . ' median ' . $sorted[(int) (count($sorted) / 2)]
        . ' mean ' . (int) (array_sum($sorted) / count($sorted))
        . ' | thin (<300): ' . count(array_filter($sorted, static fn (int $w): bool => $w < 300)) . "\n";
}

echo "\n{$pass} passed, {$fail} failed\n";
exit($fail === 0 ? 0 : 1);
