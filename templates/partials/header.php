<?php
/**
 * Site header: logo row (logo · search · action) + navigation row.
 *
 * When the admin panel is installed the navigation row is whatever the Header &
 * menu screen says it is, including one level of dropdown and a call to action.
 * Without a database it falls back to the category links the site shipped with,
 * so the header never depends on MySQL being reachable.
 *
 * @var array  $navCategories
 * @var string $active  active category slug
 * @var string $siteName
 */

declare(strict_types=1);

use Onim\Cms;
use Onim\Data;
use Onim\Format;
use Onim\View;

$active = $active ?? '';
$siteName = $siteName ?? SITE_NAME;
$q = (string) ($_GET['q'] ?? '');
$sticky = Cms::settingBool('header_sticky', true);
$showSearch = Cms::settingBool('header_search_enabled', true);
$showCount = Cms::settingBool('header_show_count', true);
$ctaLabel = (string) Cms::setting('header_cta_label', '');
$ctaUrl = (string) Cms::setting('header_cta_url', '');
$logo = Cms::logoUrl();

$menu = Cms::menuTree('header');
$actions = Cms::menu('header_actions');
if ($menu === []) {
    foreach ($navCategories as $cat) {
        $menu[] = [
            'label' => (string) $cat['name'],
            'url' => '/' . $cat['slug'],
            'target' => '_self',
            'children' => [],
            'is_active' => $active === $cat['slug'],
        ];
    }
}
$isActive = static function (array $item) use ($active): bool {
    if (isset($item['is_active'])) {
        return (bool) $item['is_active'];
    }
    return $active !== '' && trim((string) $item['url'], '/') === $active;
};
?>
<header class="site-header<?= $sticky ? ' is-sticky' : '' ?>">
    <div class="header-top">
        <div class="shell header-top-inner">
            <a class="logo" href="<?= View::escape(View::url('/')) ?>" aria-label="<?= View::escape($siteName) ?> — home">
                <img src="<?= View::escape($logo) ?>" width="132" height="40" alt="<?= View::escape($siteName) ?>"
                     fetchpriority="high" decoding="async">
            </a>

            <?php if ($showSearch): ?>
                <form class="search" role="search" action="<?= View::escape(View::url('/search')) ?>" method="get" autocomplete="off">
                    <label class="sr-only" for="site-search">Search calculator</label>
                    <input id="site-search" type="search" name="q" value="<?= View::escape($q) ?>"
                           placeholder="Search calculator…" data-search-input
                           aria-describedby="search-hint" aria-autocomplete="list" aria-controls="search-suggestions">
                    <span id="search-hint" class="sr-only">Type to see matching calculators</span>
                    <button type="submit" class="search-submit" aria-label="Search">
                        <?= View::icon('search', 22) ?>
                    </button>
                    <div class="search-suggestions" id="search-suggestions" role="listbox" hidden></div>
                </form>
            <?php endif; ?>

            <div class="header-actions">
                <?php if ($ctaLabel !== '' && $ctaUrl !== ''): ?>
                    <a class="header-cta" href="<?= View::escape(View::url($ctaUrl)) ?>"><?= View::escape($ctaLabel) ?></a>
                <?php endif; ?>
                <?php foreach ($actions as $action): ?>
                    <a class="header-link" href="<?= View::escape(View::url((string) $action['url'])) ?>"
                       <?= $action['target'] === '_blank' ? 'target="_blank" rel="noopener"' : '' ?>>
                        <?= View::escape((string) $action['label']) ?>
                    </a>
                <?php endforeach; ?>
                <?php if ($showCount): ?>
                    <a class="header-link" href="<?= View::escape(View::url('/calculators')) ?>" title="Browse every calculator">
                        <span data-live-count="total"><?= View::escape(Format::count(Data::total())) ?></span> calculators
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <nav class="category-nav" aria-label="Calculator categories">
        <div class="shell category-nav-inner">
            <?php foreach ($menu as $item): ?>
                <?php $isActiveItem = $isActive($item); ?>
                <?php if (!empty($item['children'])): ?>
                    <div class="category-nav-group">
                        <a class="category-nav-link<?= $isActiveItem ? ' is-active' : '' ?>"
                           href="<?= View::escape(View::url((string) $item['url'])) ?>"
                           aria-haspopup="true" aria-expanded="false">
                            <?= View::escape((string) $item['label']) ?>
                            <?= View::icon('chevron-down', 14) ?>
                        </a>
                        <div class="category-dropdown" role="group" aria-label="<?= View::escape((string) $item['label']) ?>">
                            <?php foreach ($item['children'] as $child): ?>
                                <a href="<?= View::escape(View::url((string) $child['url'])) ?>"
                                   <?= ($child['target'] ?? '_self') === '_blank' ? 'target="_blank" rel="noopener"' : '' ?>>
                                    <?= View::escape((string) $child['label']) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <a class="category-nav-link<?= $isActiveItem ? ' is-active' : '' ?>"
                       href="<?= View::escape(View::url((string) $item['url'])) ?>"
                       <?= ($item['target'] ?? '_self') === '_blank' ? 'target="_blank" rel="noopener"' : '' ?>
                       <?= $isActiveItem ? 'aria-current="page"' : '' ?>>
                        <?= View::escape((string) $item['label']) ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </nav>
</header>
