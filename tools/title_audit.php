<?php
/**
 * title_audit.php — check every page title against what a search result shows.
 *
 * Google renders roughly 60 characters of a title. The brand suffix costs 17 of
 * them, so the title itself has to land between about 45 and 62 characters
 * overall: shorter wastes the most valuable line on the page, longer is cut off
 * mid-phrase. This walks the whole catalogue through the same `Seo::tuneTitle()`
 * the templates use, so it audits the real output and not a copy of the rules.
 *
 * Usage: php tools/title_audit.php [--verbose]
 */

declare(strict_types=1);

require __DIR__ . '/../php-clone/config.php';

use Onim\Data;
use Onim\Seo;

$verbose = in_array('--verbose', $argv, true);
$min = 45;      // rendered, brand suffix included
$max = 62;

$seen   = [];
$short  = [];
$long   = [];
$dupes  = [];
$total  = 0;

foreach (Data::all() as $row) {
    $total++;
    // exactly what the calculator controller feeds the template: the article's
    // own SEO title when it has one, otherwise the display name
    $content  = Data::content((string) ($row['cat'] ?? ''), (string) ($row['slug'] ?? ''));
    $fallback = (string) ($row['name'] ?? '') . ' Calculator';
    $raw      = trim((string) ($content['seoTitle'] ?? '')) ?: $fallback;
    $title    = Seo::tuneTitle($raw, (string) ($row['cat'] ?? ''));
    $full  = $title . ' | ' . SITE_NAME;
    $len   = mb_strlen($full);

    if ($len < $min) {
        $short[$row['path']] = $full;
    }
    if ($len > $max) {
        $long[$row['path']] = $full;
    }
    if (isset($seen[$title])) {
        $dupes[] = $title . '  (' . $seen[$title] . ' / ' . $row['path'] . ')';
    }
    $seen[$title] = $row['path'];
}

printf("pages                 : %d\n", $total);
printf("rendered title range  : %d-%d characters\n", $min, $max);
printf("under %d characters   : %d\n", $min, count($short));
printf("over  %d characters   : %d\n", $max, count($long));
printf("duplicate titles      : %d\n", count($dupes));

if ($verbose) {
    foreach (array_slice($short, 0, 10, true) as $path => $t) {
        echo "  short  $path :: $t\n";
    }
    foreach (array_slice($long, 0, 10, true) as $path => $t) {
        echo "  long   $path :: $t\n";
    }
    foreach (array_slice($dupes, 0, 10) as $t) {
        echo "  dup    $t\n";
    }
}

$problems = count($short) + count($long) + count($dupes);
echo $problems === 0 ? "\nNo problems found.\n" : "\n$problems problem(s).\n";

exit($problems === 0 ? 0 : 1);
