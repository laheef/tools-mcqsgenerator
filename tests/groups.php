<?php
/**
 * Unit tests for the wording a section lends to a sentence — lib/Groups.php.
 *
 *   php tests/groups.php
 *
 * The browse buttons are fifteen sentences in a row on the home page, so they
 * are the place where a naming bug is most visible: "Browse all 1 converters
 * tool", "Browse all 1 audio loudnes tool". Everything here is pure string
 * logic — no HTTP, no database — and every case is a real section name, a name
 * the panel could produce, or the word that broke the previous version.
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/config.php';

use Onim\Groups;

$GLOBALS['passed'] = 0;
$GLOBALS['failed'] = 0;

function check(string $name, bool $ok, string $detail = ''): void
{
    if ($ok) {
        $GLOBALS['passed']++;
        echo "PASS  {$name}\n";
        return;
    }
    $GLOBALS['failed']++;
    echo "FAIL  {$name}" . ($detail !== '' ? "   [{$detail}]" : '') . "\n";
}

/** @return array<string,string> */
function labels(): array
{
    $out = [];
    foreach (Groups::all() as $group) {
        $out[(string) $group['slug']] = (string) $group['name'];
    }
    return $out;
}
$labels = labels();

/* ---------------------------------------------------------------- shortName */

/* The panel's "Short name" exists to fit the header bar ("Social" for "Social &
   Community"). A browse button that said "Browse all 1 social tool" would name
   the section wrongly, so the button reads the heading instead. */
check('a section keeps its heading, not its header-bar short name',
    Groups::shortName('social-community') === 'social & community',
    Groups::shortName('social-community'));

check('" Tools" comes off the heading',
    Groups::shortName('audio') === 'audio', Groups::shortName('audio'));

check('an acronym keeps its capitals',
    Groups::shortName('pdf') === 'PDF', Groups::shortName('pdf'));

check('an acronym mid-name keeps its capitals, the rest reads as a sentence',
    Groups::shortName('design-css') === 'design & CSS', Groups::shortName('design-css'));

check('a two-word heading reads as a sentence',
    Groups::shortName('text-writing') === 'text & writing', Groups::shortName('text-writing'));

check('a plain single word is untouched',
    Groups::shortName('gaming') === 'gaming', Groups::shortName('gaming'));

check('a word with a capital in the middle is untouched',
    Groups::shortName('productivity') === 'productivity', Groups::shortName('productivity'));

/* --------------------------------------------------------------- singular */

$singular = [
    /* the word that caught the first version: ends in -ss, is singular */
    'loudness'   => 'loudness',
    'business'   => 'business',
    'status'     => 'status',
    'analysis'   => 'analysis',
    /* -ics is a subject, never a plural noun */
    'analytics'  => 'analytics',
    'physics'    => 'physics',
    'statistics' => 'statistics',
    /* ordinary plurals */
    'converters'  => 'converter',
    'compressors' => 'compressor',
    'optimizers'  => 'optimizer',
    'tools'       => 'tool',
    /* -ies and -es */
    'utilities' => 'utility',
    'binaries'  => 'binary',
    'classes'   => 'class',
    'boxes'     => 'box',
    'watches'   => 'watch',
    /* not a plural at all */
    'image'  => 'image',
    'audio'  => 'audio',
    'CSS'    => 'CSS',
    'Gaming' => 'Gaming',
];
foreach ($singular as $word => $want) {
    $got = Groups::singular($word);
    check("singular: {$word} -> {$want}", $got === $want, "got {$got}");
}

/* ----------------------------------------------------------------- toolNoun */

$nouns = [
    ['audio', 1, 'audio tool'],
    ['audio', 2, 'audio tools'],
    ['image', 4, 'image tools'],
    ['converters', 1, 'converter tool'],
    /* Already plural: the noun is not repeated ("converters tools"). */
    ['converters', 3, 'converters'],
    ['compressors', 1, 'compressor tool'],
    ['design-css', 1, 'design & CSS tool'],
    ['text-writing', 2, 'text & writing tools'],
    ['calculators', 5, 'calculators'],
    ['security', 1, 'security tool'],
    ['productivity', 1, 'productivity tool'],
];
foreach ($nouns as [$slug, $count, $want]) {
    $got = Groups::toolNoun($slug, $count);
    check("noun: {$slug} × {$count} -> {$want}", $got === $want, "got {$got}");
}

/* Every live section, both counts: the button must never print a doubled word
   ("tools tools"), a stray "Tools", or an empty noun. */
foreach ($labels as $slug => $name) {
    foreach ([1, 5] as $count) {
        $got = Groups::toolNoun($slug, $count);
        $plural = Groups::singular((string) preg_replace('~^.*\s~', '', Groups::shortName($slug))) !== (string) preg_replace('~^.*\s~', '', Groups::shortName($slug));
        $ok = $got !== ''
            && !str_contains(mb_strtolower($got), 'tools tools')
            && !str_contains(mb_strtolower($got), 'converters tools')
            && !str_contains($got, 'Tools')
            && ($count === 1
                ? str_ends_with($got, ' tool')
                : ($plural || str_ends_with($got, ' tools')));
        check("live section: {$slug} × {$count} -> {$got}", $ok, $got);
    }
}

/* A section named after something that is not a plural noun must not lose a
   letter. This is the exact regression that shipped and was caught in review:
   "Audio Loudness" read "Browse all 1 audio loudnes tool". */
$word = 'loudness';
check('a singular -ss word survives whole', Groups::singular($word) === $word, Groups::singular($word));

echo "\n==========================================================================\n";
echo $GLOBALS['passed'] . ' passed, ' . $GLOBALS['failed'] . " failed\n";
exit($GLOBALS['failed'] === 0 ? 0 : 1);
