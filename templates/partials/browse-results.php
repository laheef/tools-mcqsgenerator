<?php
/**
 * Everything on the catalogue page that changes when a filter changes: the active
 * filter pills, the list itself, and the pagination.
 *
 * The page includes it, and so does the `?partial=1` response that
 * `assets/js/browse.js` swaps in — which is why the two can never drift apart.
 *
 * @var array $state
 * @var array $params
 * @var array $categories
 * @var bool  $filtersActive
 * @var string $catName
 */

declare(strict_types=1);

use Onim\Browse;
use Onim\Data;
use Onim\Icons;
use Onim\View;
?>
<?php if ($filtersActive): ?>
    <p class="browse-active">
        <span>Filtered:</span>
        <?php if ($state['q'] !== ''): ?>
            <a class="browse-pill" href="<?= View::escape(Browse::url($params, ['q' => '', 'page' => 1])) ?>">
                “<?= View::escape($state['q']) ?>” <span aria-hidden="true">×</span><span class="sr-only">clear search</span>
            </a>
        <?php endif; ?>
        <?php if ($state['cat'] !== ''): ?>
            <a class="browse-pill" href="<?= View::escape(Browse::url($params, ['cat' => '', 'page' => 1])) ?>">
                <?= View::escape($catName) ?> <span aria-hidden="true">×</span><span class="sr-only">clear category</span>
            </a>
        <?php endif; ?>
        <?php if ($state['letter'] !== ''): ?>
            <a class="browse-pill" href="<?= View::escape(Browse::url($params, ['letter' => '', 'page' => 1])) ?>">
                <?= $state['letter'] === '#' ? 'Digits' : 'Letter ' . View::escape($state['letter']) ?>
                <span aria-hidden="true">×</span><span class="sr-only">clear letter</span>
            </a>
        <?php endif; ?>
        <a class="browse-reset" href="<?= View::escape(View::url('/all-calculators')) ?>">Clear all</a>
    </p>
<?php endif; ?>

<?php if ($state['rows'] === []): ?>
    <div class="empty-state">
        <p>Nothing matched <?= $filtersActive ? 'those filters' : 'the catalogue' ?>.</p>
        <p>Try a shorter phrase, or start from a category:</p>
        <div class="chip-row">
            <?php foreach (array_slice($categories, 0, 8) as $cat): ?>
                <a class="chip" href="<?= View::escape(Browse::url($params, ['cat' => (string) $cat['slug'], 'q' => '', 'letter' => '', 'page' => 1])) ?>"><?= View::escape($cat['name']) ?></a>
            <?php endforeach; ?>
            <a class="chip" href="<?= View::escape(View::url('/all-calculators')) ?>">All calculators</a>
        </div>
    </div>
<?php else: ?>
    <ul class="browse-list" data-browse-list>
        <?php foreach ($state['rows'] as $row): ?>
            <?php $cat = Data::category((string) $row['cat']); ?>
            <li class="browse-item">
                <a class="browse-link" href="<?= View::escape(View::url((string) $row['path'])) ?>">
                    <?= Icons::forCalculator($row, 20, 'calc-glyph') ?>
                    <span class="browse-text">
                        <span class="browse-name"><?= View::escape((string) $row['name']) ?></span>
                        <span class="browse-desc"><?= View::escape(View::excerpt((string) $row['description'], 150)) ?></span>
                    </span>
                    <span class="browse-cat-tag"><?= View::escape($cat['name'] ?? (string) $row['cat']) ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if ($state['pages'] > 1): ?>
        <?php
        /*
         * A hundred calculators a page still leaves forty-odd pages, so jumping
         * two at a time is not enough: the numbers themselves have to be
         * clickable, thinned out to a window around the current page so the row
         * never wraps into a wall of digits.
         */
        $pageNow = (int) $state['page'];
        $pageCount = (int) $state['pages'];
        $pageWindow = [];
        for ($p = 1; $p <= $pageCount; $p++) {
            $edge = $p === 1 || $p === $pageCount;
            $near = abs($p - $pageNow) <= 2;
            if ($edge || $near) {
                $pageWindow[] = $p;
            }
        }
        ?>
        <nav class="pagination browse-pagination" aria-label="Pages of the catalogue">
            <?php if ($pageNow > 1): ?>
                <a class="btn btn-soft" rel="prev" href="<?= View::escape(Browse::url($params, ['page' => $pageNow - 1])) ?>">← Previous</a>
            <?php endif; ?>

            <ol class="page-numbers" aria-label="Page numbers">
                <?php $prevShown = 0; ?>
                <?php foreach ($pageWindow as $p): ?>
                    <?php if ($prevShown !== 0 && $p - $prevShown > 1): ?>
                        <li class="page-gap" aria-hidden="true">…</li>
                    <?php endif; ?>
                    <li>
                        <a class="page-number<?= $p === $pageNow ? ' is-current' : '' ?>"
                           href="<?= View::escape(Browse::url($params, ['page' => $p])) ?>"
                           <?= $p === $pageNow ? 'aria-current="page"' : '' ?>
                           aria-label="Page <?= $p ?>"><?= $p ?></a>
                    </li>
                    <?php $prevShown = $p; ?>
                <?php endforeach; ?>
            </ol>

            <span class="pagination-info">
                Page <?= $pageNow ?> of <?= $pageCount ?>
            </span>
            <?php if ($pageNow < $pageCount): ?>
                <a class="btn btn-soft" rel="next" href="<?= View::escape(Browse::url($params, ['page' => $pageNow + 1])) ?>">Next →</a>
            <?php endif; ?>
            <form class="browse-jump" method="get" action="<?= View::escape(View::url('/all-calculators')) ?>">
                <?php foreach (['q', 'cat', 'letter', 'sort'] as $keep): ?>
                    <?php if (($state[$keep] ?? '') !== ''): ?>
                        <input type="hidden" name="<?= View::escape($keep) ?>" value="<?= View::escape((string) $state[$keep]) ?>">
                    <?php endif; ?>
                <?php endforeach; ?>
                <label class="sr-only" for="browse-page">Go to page</label>
                <input id="browse-page" class="browse-page-input" type="number" name="page"
                       min="1" max="<?= (int) $state['pages'] ?>" value="<?= (int) $state['page'] ?>">
                <button type="submit" class="btn btn-soft">Go</button>
            </form>
        </nav>
    <?php endif; ?>
<?php endif; ?>
