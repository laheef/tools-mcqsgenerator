<?php
/**
 * The status line under the heading: what is being shown, out of what.
 *
 * Rendered by the page and again by the `?partial=1` response, so a filter applied
 * without a reload shows exactly the sentence the server would have printed.
 *
 * @var array  $state
 * @var string $catName
 */

declare(strict_types=1);

use Omni\Format;
use Omni\View;

$from = $state['total'] === 0 ? 0 : ($state['page'] - 1) * $state['per'] + 1;
$to = min($state['total'], $state['page'] * $state['per']);
?>
<p class="page-meta" id="browse-status" data-browse-status>
    <?php if ($state['total'] === 0): ?>
        No calculator matches these filters.
    <?php else: ?>
        Showing <strong data-browse-range><?= (int) $from ?>–<?= (int) $to ?></strong>
        of <strong data-browse-total><?= View::escape(Format::count((int) $state['total'])) ?></strong>
        calculator<?= $state['total'] === 1 ? '' : 's' ?>
        <?php if ($state['cat'] !== ''): ?>in <?= View::escape($catName) ?><?php endif; ?>
        <?php if ($state['letter'] !== ''): ?>
            <?= $state['letter'] === '#' ? 'starting with a digit or symbol' : 'starting with ' . View::escape($state['letter']) ?>
        <?php endif; ?>
        <?php if ($state['q'] !== ''): ?>
            matching “<?= View::escape($state['q']) ?>”
        <?php endif; ?>
        — out of <?= View::escape(Format::count((int) $state['catalogue'])) ?> in the catalogue.
    <?php endif; ?>
</p>
