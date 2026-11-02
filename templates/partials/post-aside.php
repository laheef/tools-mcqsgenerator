<?php
/**
 * The sidebar beside a blog post: what else to read, what to calculate.
 *
 * Three blocks, in the order a reader actually moves through them:
 *
 *   1. Latest calculators — the catalogue's newest entries. "Newest" means the
 *      end of the catalogue (the harvest appends), falling back to the panel's
 *      own custom calculators, which carry a real created_at.
 *   2. Popular calculators — the most-visited paths when the view counter has
 *      data, otherwise the curated featured set. Never a random slice.
 *   3. Categories — the fourteen indexes, each with its live count.
 *
 * Everything here is server-rendered; nothing depends on JavaScript or on a
 * database being reachable (blocks 1–3 fall back to file data).
 *
 * @var array $categories
 * @var string $headingLevel  h2 inside the sidebar
 */

declare(strict_types=1);

use Onim\Cms;
use Onim\Data;
use Onim\Format;
use Onim\View;

$categories = $categories ?? Data::categories();
$level = $headingLevel ?? 'h2';

/* ---------------------------------------------------- 1. latest calculators */
$latest = [];
$seenCat = [];
foreach (array_reverse(Data::all()) as $row) {
    if (($row['status'] ?? 'published') !== 'published') {
        continue;
    }
    /* The tail of the catalogue is one category at a time (the harvest appends
       a niche at a time), so taking five in a row would list five ecology
       tools. One per category reads as a catalogue, not as a shard. */
    if (isset($seenCat[$row['cat']])) {
        continue;
    }
    $seenCat[$row['cat']] = true;
    $latest[] = $row;
    if (count($latest) >= 5) {
        break;
    }
}

/* --------------------------------------------------- 2. popular calculators */
$popular = [];
foreach (Cms::topPaths(12) as $path => $hits) {
    $row = Data::row($path);
    if ($row !== null && ($row['status'] ?? 'published') === 'published') {
        $popular[] = $row;
    }
    if (count($popular) >= 5) {
        break;
    }
}
if (count($popular) < 5) {
    foreach (Data::featured(12) as $row) {
        foreach ($popular as $already) {
            if ($already['path'] === $row['path']) {
                continue 2;
            }
        }
        $popular[] = $row;
        if (count($popular) >= 5) {
            break;
        }
    }
}
?>
<aside class="post-aside" aria-label="More from Onim">
    <section class="aside-card">
        <<?= $level ?> class="aside-title">Latest calculators</<?= $level ?>>
        <ul class="aside-list">
            <?php foreach ($latest as $row): ?>
                <li>
                    <a href="<?= View::escape(View::url($row['path'])) ?>">
                        <span class="aside-name"><?= View::escape((string) $row['name']) ?></span>
                        <span class="aside-meta"><?= View::escape(ucfirst(str_replace('-', ' ', (string) $row['cat']))) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a class="aside-more" href="<?= View::escape(View::url('/all-calculators')) ?>">All <?= View::escape(Format::count(Data::total())) ?> calculators</a>
    </section>

    <section class="aside-card">
        <<?= $level ?> class="aside-title">Popular calculators</<?= $level ?>>
        <ul class="aside-list">
            <?php foreach ($popular as $row): ?>
                <li>
                    <a href="<?= View::escape(View::url($row['path'])) ?>">
                        <span class="aside-name"><?= View::escape((string) $row['name']) ?></span>
                        <span class="aside-meta"><?= View::escape(ucfirst(str_replace('-', ' ', (string) $row['cat']))) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="aside-card">
        <<?= $level ?> class="aside-title">Browse by category</<?= $level ?>>
        <ul class="aside-cats">
            <?php foreach ($categories as $cat): ?>
                <?php $count = Data::countByCategory((string) $cat['slug']); ?>
                <?php if ($count === 0) { continue; } ?>
                <li>
                    <a href="<?= View::escape(View::url('/' . $cat['slug'])) ?>">
                        <span><?= View::escape((string) $cat['name']) ?></span>
                        <span class="aside-count"><?= View::escape(Format::count($count)) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</aside>
