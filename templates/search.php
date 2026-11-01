<?php
/**
 * Search results page.
 *
 * @var \Omni\Seo $seo
 * @var string $query
 * @var array  $results
 */

declare(strict_types=1);

use Omni\Icons;
use Omni\View;
?>
<div class="shell page-shell">
    <?= View::breadcrumbs([['name' => 'Home', 'url' => '/'], ['name' => 'Search', 'url' => '/search']]) ?>

    <header class="page-head">
        <div class="page-head-icon"><?= View::icon('search', 36) ?></div>
        <div>
            <h1 class="page-title">
                <?= $query !== '' ? 'Results for “' . View::escape($query) . '”' : 'Search calculators' ?>
            </h1>
            <p class="page-lede">
                <?= $query !== ''
                    ? View::escape((string) count($results)) . ' calculator' . (count($results) === 1 ? '' : 's') . ' matched your search.'
                    : 'Type a topic or a number you need to work out.' ?>
            </p>
        </div>
    </header>

    <?php if ($query !== ''): ?>
        <?php /* This page stops at 30 results; the catalogue page scores the same way but
                 keeps going, and can be filtered. Say so instead of letting the cut look
                 like the whole answer. */ ?>
        <p class="search-more">
            <a href="<?= View::escape(View::url('/calculators?q=' . rawurlencode($query))) ?>">
                See every match for “<?= View::escape($query) ?>” in the catalogue</a>
            — filter it by category or letter.
        </p>
    <?php endif; ?>

    <?php if ($query === '' || $results === []): ?>
        <div class="empty-state">
            <p><?= $query === '' ? 'Nothing searched yet.' : 'No calculator matched that phrase.' ?></p>
            <p>Try one of these categories:</p>
            <div class="chip-row">
                <?php foreach (\Omni\Data::categories() as $cat): ?>
                    <?php if ($cat['slug'] === 'discover') { continue; } ?>
                    <a class="chip" href="<?= View::escape(View::url('/' . $cat['slug'])) ?>"><?= View::escape($cat['name']) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <ul class="result-list">
            <?php foreach ($results as $row): ?>
                <li class="result-item">
                    <a class="result-link" href="<?= View::escape(View::url($row['path'])) ?>">
                        <?= Icons::forCalculator($row, 20, 'calc-glyph') ?>
                        <span class="result-cat"><?= View::escape(\Omni\Data::category($row['cat'])['name'] ?? $row['cat']) ?></span>
                        <span class="result-name"><?= View::escape($row['name']) ?></span>
                        <span class="result-desc"><?= View::escape(View::excerpt((string) $row['description'], 160)) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
