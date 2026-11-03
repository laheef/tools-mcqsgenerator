<?php
/**
 * Footer: brand block, link columns, legal bar.
 *
 * Columns and links come from `footer_columns` + `menu_items`; the tagline, the
 * contact details and the copyright line come from Settings. With no database
 * the footer falls back to the category matrix the site shipped with, so nothing
 * here can leave a visitor staring at an empty foot.
 *
 * What this template does NOT do any more: print a paragraph about the site
 * being a rebuild of somebody else's, or a second and third copyright row. A
 * footer is navigation and attribution, in that order — one brand block, three
 * or four columns of real links, then a single bar with the copyright and the
 * legal pages.
 *
 * @var array  $categories
 * @var string $siteName
 */

declare(strict_types=1);

use Onim\Cms;
use Onim\Data;
use Onim\Format;
use Onim\View;

$siteName = $siteName ?? SITE_NAME;
$columns = Cms::footerColumns();

/*
 * Normalise whatever the database holds into the footer this site actually
 * wants: one Calculators column, Company, Resources.
 *
 * Two states have to be handled, and neither of them is hypothetical:
 *
 *   * A database seeded by an older release has one column per category (14 of
 *     them) filled with every calculator name that happened to be harvested —
 *     "Acres per hour Calculator", 57 of those. That is padding, not
 *     navigation: a footer is a map of the site, and 57 arbitrary calculator
 *     names are not a map of anything.
 *   * A database with no footer columns at all falls back to the matrix below.
 *
 * Rather than trust a migration to have run, the template does the narrowing
 * itself: a padding link (a label ending in " Calculator") is dropped wherever it
 * appears, and a spread of category columns is folded into one Calculators column
 * with four real category indexes. Columns an editor deliberately made stay
 * exactly as they are — the rule only fires when the footer looks like the
 * seeded one.
 */
$isPadding = static fn (array $link): bool => (bool) preg_match('~\s+Calculator$~i', (string) ($link['label'] ?? ''));

/* A column titled after a category is a copy of the catalogue index, not a
   footer section: the Calculators column already links the categories, so a
   second "Biology" column beside it adds nothing a reader wants twice. */
$categoryTitles = [];
foreach (($categories ?? []) as $cat) {
    $categoryTitles[] = mb_strtolower(trim((string) ($cat['name'] ?? '')));
}
$isCategoryColumn = static fn (array $column): bool => in_array(mb_strtolower(trim((string) ($column['title'] ?? ''))), $categoryTitles, true);

if ($columns !== []) {
    $clean = [];
    foreach ($columns as $column) {
        if ($isCategoryColumn($column)) {
            continue;
        }
        $links = array_values(array_filter((array) ($column['links'] ?? []), static fn ($l): bool => !$isPadding((array) $l)));
        if ($links === []) {
            continue;
        }
        $column['links'] = $links;
        $clean[] = $column;
    }
    $columns = $clean;
}

/* The two columns that make a footer navigation rather than a list of links.
   Added when absent, so a half-migrated database still renders the whole
   footer instead of a lonely Calculators column. */
$designed = static fn (): array => [
    ['title' => 'Company', 'links' => [
        ['label' => 'About us', 'url' => '/about', 'target' => '_self'],
        ['label' => 'Contact', 'url' => '/contact', 'target' => '_self'],
        ['label' => 'Discover Onim', 'url' => '/discover', 'target' => '_self'],
    ]],
    ['title' => 'Resources', 'links' => [
        ['label' => 'All calculators', 'url' => '/all-calculators', 'target' => '_self'],
        /* Every band on the home page and every section page ends in a
           "Browse all …" button that lands here, and the sitemap lists all
           sixteen addresses — the one place that did not was this column. */
        ['label' => 'All tools', 'url' => '/all-tools', 'target' => '_self'],
        ['label' => 'Search', 'url' => '/search', 'target' => '_self'],
        ['label' => 'Blog', 'url' => '/blog', 'target' => '_self'],
    ]],
];
/* The Calculators column: four real category indexes, biggest first, plus the
   catalogue. Built from the file catalogue, so it is right even when the
   database has nothing to say. */
$bySize = ($categories ?? []);
usort($bySize, static fn (array $a, array $b): int => (int) ($b['count'] ?? 0) <=> (int) ($a['count'] ?? 0));
$catLinks = [];
foreach (array_slice($bySize, 0, 4) as $cat) {
    $catLinks[] = ['label' => (string) $cat['name'], 'url' => '/' . $cat['slug'], 'target' => '_self'];
}
$catLinks[] = ['label' => 'All calculators', 'url' => '/all-calculators', 'target' => '_self'];

/* The tool sections. The site is bigger than its calculator column now, and a
   footer that lists only categories says otherwise. Built from Groups, so a
   section renamed in the panel follows here too. */
$allGroups = \Onim\Groups::all();
$toolLinks = [];
foreach ($allGroups as $groupRow) {
    if ((string) $groupRow['slug'] === \Onim\Groups::CALCULATORS) {
        continue;
    }
    $toolLinks[] = ['label' => (string) $groupRow['name'], 'url' => '/' . $groupRow['slug'], 'target' => '_self'];
}
/* Fifteen sections in one column is a ladder. The column is laid out in two
   halves — one heading, the links flowing in two columns — so the footer keeps a
   readable shape as sections are added in the panel. */
$toolColumns = [];
if ($toolLinks !== []) {
    $toolColumns = [[
        'title' => 'Tool sections',
        'links' => $toolLinks,
        'wide'  => count($toolLinks) > 9,
    ]];
}

$have = array_map(static fn (array $c): string => mb_strtolower(trim((string) $c['title'])), $columns);
if (!in_array('calculators', $have, true)) {
    $columns = array_merge([['title' => 'Calculators', 'links' => $catLinks]], $columns);
}
foreach ($designed() as $wanted) {
    if (!in_array(mb_strtolower($wanted['title']), $have, true)) {
        $columns[] = $wanted;
    }
}

/*
 * The tools index in the footer.
 *
 * Every band on the home page and every section page ends in a "Browse all 4
 * image tools" button that lands on /all-tools, and the sitemap lists all
 * sixteen of those addresses — the footer is the one navigation surface that
 * would otherwise offer no way through to them. A footer saved before that page
 * existed has no row for it, so the link is added here, after "All calculators",
 * unless the column already links it or the owner has switched it off in
 * Settings → Footer (footer_tools_link, on by default). Migration 014 puts the
 * same row into menu_items, so the panel's footer editor shows it as an ordinary
 * link that can be renamed, moved or deleted like the rest.
 */
if (Cms::enabled() ? Cms::settingBool('footer_tools_link', true) : true) {
    foreach ($columns as $i => $column) {
        if (mb_strtolower(trim((string) $column['title'])) !== 'resources') {
            continue;
        }
        $links = [];
        $hasTools = false;
        foreach ((array) $column['links'] as $link) {
            if (trim((string) ($link['url'] ?? '')) === '/all-tools') {
                $hasTools = true;
            }
            $links[] = $link;
        }
        if (!$hasTools) {
            /* Straight after the calculator catalogue, wherever that link is
               filed: the live database still points at /calculators, the
               current default, while a newer install uses /all-calculators. */
            $at = count($links);
            foreach ($links as $j => $link) {
                if (in_array(trim((string) ($link['url'] ?? '')), ['/calculators', '/all-calculators'], true)) {
                    $at = $j + 1;
                    break;
                }
            }
            array_splice($links, $at, 0, [[
                'label' => 'All tools', 'url' => '/all-tools', 'target' => '_self',
            ]]);
        }
        $columns[$i]['links'] = $links;
        break;
    }
}

$about = (string) (Cms::setting('footer_about', '') ?? '');
$copyright = (string) (Cms::setting('footer_copyright', '') ?? '');
/*
 * The stored copyright is a sentence somebody typed once, and it outlives the
 * name it was typed under — the live site was still printing "Onim Calculator"
 * after the rename, from a row no migration looks at. The brand inside that
 * sentence is not an editorial choice, so it is corrected at render time: the
 * year and the words stay, a stale variant of the name does not.
 */
$copyright = str_replace(
    ["\xc2\xa0", "\xe2\x80\xaf", "\xe2\x80\x89"],   // NBSP, narrow NBSP, thin space
    ' ',
    $copyright
);
$copyright = (string) preg_replace(
    '~\b(?:Onim|Omni)[ ]+Calculator\b~i',
    $siteName,
    $copyright
);
/* A stored line with no year is a fragment, not a copyright: give it the year
   rather than printing "Onim. All rights reserved." with nothing in front. */
if ($copyright !== '' && !preg_match('~\d{4}~', $copyright)) {
    $copyright = '© ' . date('Y') . ' ' . $copyright;
}
$showNotice = Cms::enabled() ? Cms::settingBool('footer_show_notice', false) : SHOW_CLONE_NOTICE;
$newsletter = Cms::settingBool('newsletter_enabled', false);
$newsletterNote = (string) (Cms::setting('newsletter_note', '') ?? '');
$contactEmail = (string) (Cms::setting('contact_email', '') ?? '');
$contactPhone = (string) (Cms::setting('contact_phone', '') ?? '');
$contactAddress = (string) (Cms::setting('contact_address', '') ?? '');
$socials = Cms::decode((string) (Cms::setting('social_links', '') ?? ''));
$legal = Cms::menu('legal');
?>
<footer class="site-footer">
    <div class="shell">
        <div class="footer-grid">
            <div class="footer-brand">
                <a class="footer-logo" href="<?= View::escape(View::url('/')) ?>" aria-label="<?= View::escape($siteName) ?> — home">
                    <img src="<?= View::escape(Cms::logoUrl()) ?>" width="112" height="34" alt="<?= View::escape($siteName) ?>"
                         loading="lazy" decoding="async">
                </a>
                <p class="footer-tagline"><?= View::escape(Cms::tagline()) ?></p>
                <?php if ($about !== ''): ?>
                    <p class="footer-tagline"><?= View::escape($about) ?></p>
                <?php endif; ?>
                <p class="footer-count">
                    <?php /* The total counts calculators and file tools alike, so the
                             sentence says "tools" — it said "calculators" and quietly
                             claimed nineteen file tools were calculators. */ ?>
                    <span data-live-count="total"><?= View::escape(Format::count(Data::total())) ?></span> tools
                    across <?= View::escape((string) count($categories ?? [])) ?> calculator topics and
                    <?= View::escape((string) max(0, count(\Onim\Groups::all()) - 1)) ?> tool sections —
                    free and without an account.
                </p>

                <?php if ($contactEmail !== '' || $contactPhone !== '' || $contactAddress !== ''): ?>
                    <address class="footer-contact">
                        <?php if ($contactEmail !== ''): ?>
                            <a href="mailto:<?= View::escape($contactEmail) ?>"><?= View::escape($contactEmail) ?></a>
                        <?php endif; ?>
                        <?php if ($contactPhone !== ''): ?>
                            <a href="tel:<?= View::escape(preg_replace('~[^0-9+]~', '', $contactPhone) ?? '') ?>"><?= View::escape($contactPhone) ?></a>
                        <?php endif; ?>
                        <?php if ($contactAddress !== ''): ?>
                            <span><?= nl2br(View::escape($contactAddress)) ?></span>
                        <?php endif; ?>
                    </address>
                <?php endif; ?>

                <?php if ($socials !== []): ?>
                    <ul class="footer-social" aria-label="Social links">
                        <?php foreach ($socials as $social): ?>
                            <?php if (!is_array($social) || empty($social['url'])) { continue; } ?>
                            <li>
                                <a href="<?= View::escape((string) $social['url']) ?>" rel="noopener me" target="_blank">
                                    <?= View::escape((string) ($social['label'] ?? $social['url'])) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <nav class="footer-columns" aria-label="Footer">
                <?php foreach ($columns as $column): ?>
                    <?php if (empty($column['links'])) { continue; } ?>
                    <div class="footer-column<?= !empty($column['wide']) ? ' footer-column--wide' : '' ?>">
                        <h2 class="footer-heading"><?= View::escape((string) $column['title']) ?></h2>
                        <ul class="footer-list">
                            <?php foreach (($column['links'] ?? []) as $link): ?>
                                <li>
                                    <a href="<?= View::escape(View::url((string) $link['url'])) ?>"
                                       <?= ($link['target'] ?? '_self') === '_blank' ? 'target="_blank" rel="noopener"' : '' ?>>
                                        <?= View::escape((string) $link['label']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </nav>
        </div>

        <?php if ($newsletter): ?>
            <div class="footer-newsletter">
                <form action="<?= View::escape(View::url('/contact')) ?>" method="post" class="footer-newsletter-form">
                    <?= \Onim\Csrf::field() ?>
                    <input type="hidden" name="action" value="contact">
                    <input type="hidden" name="subject" value="Newsletter sign-up">
                    <input type="hidden" name="message" value="Please add me to the newsletter.">
                    <input type="hidden" name="started" value="<?= (int) time() - 10 ?>">
                    <label for="newsletter-email" class="sr-only">Your email address</label>
                    <input id="newsletter-email" type="email" name="email" required placeholder="you@example.com">
                    <label for="newsletter-name" class="sr-only">Your name</label>
                    <input id="newsletter-name" type="text" name="name" required placeholder="Your name">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                </form>
                <?php if ($newsletterNote !== ''): ?>
                    <p class="footer-note"><?= View::escape($newsletterNote) ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="footer-bottom">
            <div class="footer-bottom-left">
                <p class="footer-copyright"><?= View::escape($copyright !== '' ? $copyright : '© ' . date('Y') . ' ' . $siteName . '. All rights reserved.') ?></p>
                <p class="footer-note">
                    <span data-live-count="total"><?= View::escape(Format::count(Data::total())) ?></span> tools ·
                    <?= View::escape((string) max(0, count($allGroups) - 1)) ?> tool sections ·
                    <?= View::escape((string) count($categories ?? [])) ?> calculator topics — no account needed.
                </p>
                <?php if ($showNotice): ?>
                    <p class="footer-note">Every calculation runs on this site — nothing you type is sent to a third party.</p>
                <?php endif; ?>
            </div>
            <?php if ($legal !== []): ?>
                <nav class="footer-legal" aria-label="Legal">
                    <?php foreach ($legal as $item): ?>
                        <a href="<?= View::escape(View::url((string) $item['url'])) ?>"><?= View::escape((string) $item['label']) ?></a>
                    <?php endforeach; ?>
                </nav>
            <?php else: ?>
                <nav class="footer-legal" aria-label="Legal">
                    <a href="<?= View::escape(View::url('/privacy')) ?>">Privacy</a>
                    <a href="<?= View::escape(View::url('/terms')) ?>">Terms</a>
                    <a href="<?= View::escape(View::url('/disclaimer')) ?>">Disclaimer</a>
                    <a href="<?= View::escape(View::url('/faq')) ?>">FAQ</a>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</footer>
