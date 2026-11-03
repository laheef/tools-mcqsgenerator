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
use Onim\Groups;
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
/* Blog, About and Contact sit next to the search box, where a reader looks
   for them. The panel's Header & menu screen replaces this list when it has
   entries of its own, so an install that manages the header still wins. */
if ($actions === []) {
    $actions = [
        ['label' => 'Blog', 'url' => '/blog', 'target' => '_self'],
        ['label' => 'About', 'url' => '/about', 'target' => '_self'],
        ['label' => 'Contact', 'url' => '/contact', 'target' => '_self'],
    ];
}
$isActive = static function (array $item) use ($active): bool {
    if (isset($item['is_active'])) {
        return (bool) $item['is_active'];
    }
    return $active !== '' && trim((string) $item['url'], '/') === $active;
};

/*
 * The second bar is the tool categories, in the order the panel gives them:
 * Calculators (with the fourteen calculator categories inside it), Audio Tools,
 * Video Tools, and the rest. It is one row with dropdowns, the way a tool site
 * is navigated — a flat strip of fourteen calculator topics was right when the
 * site *was* a calculator site and is wrong now.
 *
 * The panel's own menu, when it has one, is appended after the groups as plain
 * links, so a custom entry can never displace the categories.
 */
$groupMenu = Groups::menu();
/*
 * The panel's own header menu is still honoured, but only for entries that are
 * not already in the bar. It used to hold the fourteen category links; those
 * now live inside the Calculators dropdown, and appending them again would have
 * printed every category twice and pushed the bar three rows tall.
 */
$alreadyInBar = [];
foreach ($groupMenu as $barItem) {
    $alreadyInBar[trim((string) $barItem['url'], '/')] = true;
    foreach ($barItem['children'] as $barChild) {
        $alreadyInBar[trim((string) $barChild['url'], '/')] = true;
    }
}
$extraMenu = [];
foreach ($menu as $item) {
    $path = trim((string) parse_url((string) $item['url'], PHP_URL_PATH), '/');
    if ($path === '' || isset($alreadyInBar[$path])) {
        continue;
    }
    $extraMenu[] = $item;
}
/* A site without the group file still has to navigate: fall back to the
   categories as a flat row, exactly as it used to be. */
if ($groupMenu === []) {
    foreach ($navCategories as $cat) {
        $groupMenu[] = [
            'slug' => (string) $cat['slug'],
            'name' => (string) $cat['name'],
            'url' => '/' . $cat['slug'],
            'icon' => (string) ($cat['icon'] ?? 'grid'),
            'children' => [],
        ];
    }
}
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
                    <label class="sr-only" for="site-search">Search tools</label>
                    <input id="site-search" type="search" name="q" value="<?= View::escape($q) ?>"
                           placeholder="Search tools…" data-search-input
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
                    <a class="header-count" href="<?= View::escape(View::url('/all-calculators')) ?>"
                       title="Browse every tool — the number updates live">
                        <span class="header-count-dot" aria-hidden="true"></span>
                        <span class="header-count-number" data-live-count="total"><?= View::escape(Format::count(Data::total())) ?></span>
                        <span class="header-count-label">tools, ready</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <nav class="category-nav" aria-label="Tool categories" data-scrollrow>
      <div class="shell category-nav-wrap">
        <div class="category-nav-inner" data-scroll-track>
            <?php foreach ($groupMenu as $item): ?>
                <?php $isActiveItem = $active === (string) $item['slug']; ?>
                <?php if (!empty($item['children'])): ?>
                    <div class="category-nav-group">
                        <a class="category-nav-link<?= $isActiveItem ? ' is-active' : '' ?>"
                           href="<?= View::escape(View::url((string) $item['url'])) ?>"
                           aria-haspopup="true" aria-expanded="false">
                            <?= View::icon((string) $item['icon'], 13) ?>
                            <?= View::escape((string) $item['name']) ?>
                            <?= View::icon('chevron-down', 12) ?>
                        </a>
                        <div class="category-dropdown" role="group" aria-label="<?= View::escape((string) $item['name']) ?>">
                            <?php foreach ($item['children'] as $child): ?>
                                <a href="<?= View::escape(View::url((string) $child['url'])) ?>">
                                    <?= View::escape((string) $child['name']) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <a class="category-nav-link<?= $isActiveItem ? ' is-active' : '' ?>"
                       href="<?= View::escape(View::url((string) $item['url'])) ?>"
                       <?= $isActiveItem ? 'aria-current="page"' : '' ?>>
                        <?= View::icon((string) $item['icon'], 13) ?>
                        <?= View::escape((string) $item['name']) ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php foreach ($extraMenu as $item): ?>
                <?php $isActiveItem = $isActive($item); ?>
                <a class="category-nav-link category-nav-link--extra<?= $isActiveItem ? ' is-active' : '' ?>"
                   href="<?= View::escape(View::url((string) $item['url'])) ?>"
                   <?= ($item['target'] ?? '_self') === '_blank' ? 'target="_blank" rel="noopener"' : '' ?>>
                    <?= View::escape((string) $item['label']) ?>
                </a>
            <?php endforeach; ?>
        </div>
        <button class="category-nav-arrow" type="button" data-scroll-next
                aria-label="Scroll the sections" tabindex="-1">
            <?= View::icon('arrow', 17) ?>
        </button>
      </div>
    </nav>
</header>
