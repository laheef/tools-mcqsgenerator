<?php
/**
 * export_custom_calcs.php — copy panel-made calculators into the file catalogue.
 *
 * The panel stores "custom" calculators in MySQL (`custom_calculators`). That is
 * fine while a database is present, but the public site is deliberately built to
 * serve from `data/` alone: Hostinger's Git deploy pushes files, and a fresh
 * checkout answers every page with no database at all. A calculator that exists
 * only as a database row therefore disappears the moment the site is deployed
 * without one — which is exactly what happened to the 210 biology calculators:
 * they were live in the panel, and 404 on the deployed site.
 *
 * This script closes that gap. For every published custom calculator it writes:
 *
 *   data/calc/batch-NNNN.ndjson        one compiled definition per line
 *   data/content/<cat>/<slug>.json     the article (summary, sections, FAQ)
 *
 * The definition is copied verbatim from the `definition` column, which already
 * holds the engine record in the same shape the harvester produces — nothing is
 * recompiled here, so the exported page renders byte-for-byte what the panel
 * rendered. Any path that is already in the catalogue is skipped, so the script
 * is safe to re-run and cannot create duplicates.
 *
 * Afterwards rebuild the offset map the front controller reads:
 *
 *   php tools/export_custom_calcs.php [--cat=biology] [--dry-run]
 *   python3 tools/build_manifest.py
 *
 * The rows stay in the database. `Data::all()` gives the catalogue priority, so
 * an install that does import the SQL shows 4 041 calculators once, not twice.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';

$root   = dirname(__DIR__);
$cat    = null;
$dryRun = false;

foreach (array_slice($argv, 1) as $arg) {
    if (str_starts_with($arg, '--cat=')) {
        $cat = substr($arg, 6);
    } elseif ($arg === '--dry-run') {
        $dryRun = true;
    } else {
        fwrite(STDERR, "unknown option: {$arg}\n");
        exit(2);
    }
}

$pdo = Omni\Db::pdo();
if ($pdo === null) {
    fwrite(STDERR, "No database: " . Omni\Db::error() . "\n");
    exit(1);
}

/* ---------------------------------------------------------------- catalogue */

$manifestFile = $root . '/data/calc/manifest.json';
$manifest     = json_decode((string) file_get_contents($manifestFile), true);
if (!is_array($manifest)) {
    fwrite(STDERR, "Cannot read data/calc/manifest.json\n");
    exit(1);
}

$known = [];
foreach ($manifest['calcs'] as $calc) {
    $known[(string) $calc[0]] = true;
}

/* --------------------------------------------------------------- the rows */

$sql    = 'SELECT * FROM custom_calculators WHERE status = :status';
$params = ['status' => 'published'];
if ($cat !== null) {
    $sql .= ' AND category_slug = :cat';
    $params['cat'] = $cat;
}
$sql .= ' ORDER BY category_slug, slug';

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* ------------------------------------------------------------------ output */

$shardIndex = count($manifest['shards']);
$shardName  = sprintf('batch-%04d.ndjson', $shardIndex);
$shardPath  = $root . '/data/calc/' . $shardName;

$lines   = [];
$written = 0;
$skipped = [];

/**
 * Two-space pretty print. PHP's JSON_PRETTY_PRINT indents by four and the
 * article corpus is indented by two, so a plain json_encode() would make every
 * exported file stand out in every diff for no reason.
 */
function pretty_json(array $value): string
{
    $raw = (string) json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    return (string) preg_replace_callback(
        '~^( {4,})~m',
        static fn (array $m): string => str_repeat(' ', intdiv(strlen($m[1]), 2)),
        $raw
    );
}

/** Strip the tags, count the words — same measure the article files carry. */
function word_count(string $text): int
{
    return str_word_count((string) preg_replace('~\s+~u', ' ', strip_tags($text)));
}

$offset = 0;
foreach ($rows as $row) {
    $path = '/' . $row['category_slug'] . '/' . $row['slug'];
    if (isset($known[$path])) {
        $skipped[] = $path;
        continue;
    }

    $definition = json_decode((string) ($row['definition'] ?? ''), true);
    if (!is_array($definition) || $definition === []) {
        fwrite(STDERR, "no compiled definition: {$path}\n");
        exit(1);
    }

    $line     = (string) json_encode($definition, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    $lines[]  = $line;

    $sections = json_decode((string) ($row['sections'] ?? ''), true);
    $faq      = json_decode((string) ($row['faq'] ?? ''), true);
    $sections = is_array($sections) ? $sections : [];
    $faq      = is_array($faq) ? $faq : [];

    $summary = (string) ($row['summary'] ?? '');
    $words   = word_count($summary);
    foreach ($sections as $section) {
        $words += word_count((string) ($section['html'] ?? ''));
    }
    foreach ($faq as $pair) {
        $words += word_count((string) ($pair['q'] ?? '') . ' ' . (string) ($pair['a'] ?? ''));
    }

    $article = [
        'path'     => $path,
        'slug'     => (string) $row['slug'],
        'cat'      => (string) $row['category_slug'],
        'name'     => (string) $row['name'],
        'seoTitle' => (string) ($row['meta_title'] !== '' ? $row['meta_title'] : $row['name']),
        'seoDesc'  => (string) ($row['meta_description'] !== '' ? $row['meta_description'] : $summary),
        'h1'       => (string) ($row['h1'] !== '' ? $row['h1'] : $row['name']),
        'summary'  => $summary,
        'sections' => $sections,
        'faq'      => $faq,
        /* Left empty on purpose: the grid is built by Data::related(), which
           scores real neighbours. A pinned list here would only push a stale
           alphabetical trio above better matches. */
        'related'  => [],
        'words'    => $words,
    ];

    if (!$dryRun) {
        $dir = $root . '/data/content/' . $row['category_slug'];
        if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
            fwrite(STDERR, "cannot create {$dir}\n");
            exit(1);
        }
        file_put_contents($dir . '/' . $row['slug'] . '.json', pretty_json($article) . "\n");
    }

    $offset += strlen($line) + 1;
    $written++;
}

if (!$dryRun && $lines !== []) {
    if (is_file($shardPath)) {
        fwrite(STDERR, "{$shardName} already exists — run build_manifest.py instead of re-exporting\n");
        exit(1);
    }
    file_put_contents($shardPath, implode("\n", $lines) . "\n");
}

printf(
    "%s %d calculator%s into %s (%d already in the catalogue)%s\n",
    $dryRun ? 'would write' : 'wrote',
    $written,
    $written === 1 ? '' : 's',
    $shardName,
    count($skipped),
    $dryRun ? ' — dry run, nothing touched' : ''
);
echo $written > 0 ? "next: python3 tools/build_manifest.py\n" : '';
