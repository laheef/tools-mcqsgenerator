<?php
/**
 * 404 page.
 *
 * @var \Omni\Seo $seo
 */

declare(strict_types=1);

use Omni\Data;
use Omni\View;
?>
<div class="shell page-shell">
    <header class="page-head">
        <div class="page-head-icon"><?= View::icon('info', 36) ?></div>
        <div>
            <h1 class="page-title">That page does not exist</h1>
            <p class="page-lede">The calculator you followed may have moved. Here is everything this build covers.</p>
        </div>
    </header>

    <div class="chip-row">
        <?php foreach (Data::categories() as $cat): ?>
            <?php if ($cat['slug'] === 'discover') { continue; } ?>
            <a class="chip" href="<?= View::escape(View::url('/' . $cat['slug'])) ?>">
                <?= View::escape($cat['name']) ?>
                <span class="chip-count"><?= View::escape((string) Data::countByCategory($cat['slug'])) ?></span>
            </a>
        <?php endforeach; ?>
    </div>

    <p class="empty-state"><a class="btn btn-primary" href="<?= View::escape(View::url('/')) ?>">Back to all calculators</a></p>
</div>
