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

/* A link to a page that no longer exists is worse than no link: "Discover Onim"
   survived the rebuild in the database and 404s on every page of the live site.
   Anything pointing at it is dropped wherever it turns up. */
$deadUrls = ['/discover'];

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
        $links = array_values(array_filter(
            (array) ($column['links'] ?? []),
            static fn ($l): bool => !$isPadding((array) $l)
                && !in_array(trim((string) (($l ?? [])['url'] ?? '')), $deadUrls, true)
        ));
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
        ['label' => 'Blog', 'url' => '/blog', 'target' => '_self'],
        ['label' => 'Search', 'url' => '/search', 'target' => '_self'],
        ['label' => 'FAQ', 'url' => '/faq', 'target' => '_self'],
    ]],
    /* The policies are a group, not a line of small print: a reader deciding
       whether to trust a result needs the privacy, cookie and AI pages, and a
       page that is not linked from the footer is a page nobody reads. */
    ['title' => 'Policies', 'links' => [
        ['label' => 'Privacy policy', 'url' => '/privacy', 'target' => '_self'],
        ['label' => 'Cookie policy', 'url' => '/cookies', 'target' => '_self'],
        ['label' => 'AI policy', 'url' => '/ai-policy', 'target' => '_self'],
        ['label' => 'Your data and choices', 'url' => '/your-data', 'target' => '_self'],
        ['label' => 'Terms of use', 'url' => '/terms', 'target' => '_self'],
        ['label' => 'Disclaimer', 'url' => '/disclaimer', 'target' => '_self'],
    ]],
];
/* The Calculators column: four real category indexes, biggest first, plus the
   catalogue. Built from the file catalogue, so it is right even when the
   database has nothing to say. */
$bySize = ($categories ?? []);
usort($bySize, static fn (array $a, array $b): int => (int) ($b['count'] ?? 0) <=> (int) ($a['count'] ?? 0));
$catLinks = [];
foreach (array_slice($bySize, 0, 6) as $cat) {
    $catLinks[] = ['label' => (string) $cat['name'], 'url' => '/' . $cat['slug'], 'target' => '_self'];
}
$calcTotal = 0;
foreach ($bySize as $catRow) {
    $calcTotal += (int) ($catRow['count'] ?? 0);
}
$catLinks[] = ['label' => 'All ' . Format::count($calcTotal) . ' calculators', 'url' => '/all-calculators', 'target' => '_self'];

/* The tool sections — every one of them, in the order the header shows them.
   Fifteen names in one narrow column is a ladder, so the column is marked wide
   and the links flow in two halves inside it. Built from Groups, so a section
   renamed in the panel follows here too. */
$allGroups = \Onim\Groups::all();
$toolLinks = [];
foreach ($allGroups as $groupRow) {
    if ((string) $groupRow['slug'] === \Onim\Groups::CALCULATORS) {
        continue;
    }
    /* The header abbreviates these to fit one line; the footer has room, so the
       label is the section's own name minus the " Tools" tail. */
    $label = (string) $groupRow['name'];
    if (str_ends_with($label, ' Tools')) {
        $label = substr($label, 0, -6);
    }
    $toolLinks[] = [
        'label'  => $label,
        'url'    => '/' . $groupRow['slug'],
        'target' => '_self',
        'count'  => \Onim\Groups::countGroup((string) $groupRow['slug']),
    ];
}
if ($toolLinks !== []) {
    $toolLinks[] = ['label' => 'All tools', 'url' => '/all-tools', 'target' => '_self'];
}

$haveTitles = array_map(static fn (array $c): string => mb_strtolower(trim((string) $c['title'])), $columns);

/* Calculators first — the one column every version of this footer needs. */
if (!in_array('calculators', $haveTitles, true)) {
    $columns = array_merge([['title' => 'Calculators', 'links' => $catLinks]], $columns);
}

/* Tool sections next, right after the calculators: they are the other half of
   the catalogue and the reason the site is not just a calculator library. */
$hasToolColumn = false;
foreach ($columns as $c) {
    if (preg_match('~tools?|sections?~i', (string) $c['title']) === 1) {
        $hasToolColumn = true;
        break;
    }
}
if (!$hasToolColumn && $toolLinks !== []) {
    array_splice($columns, 1, 0, [[
        'title' => 'Tool sections',
        'links' => $toolLinks,
        'wide'  => count($toolLinks) > 9,
    ]]);
}

$haveTitles = array_map(static fn (array $c): string => mb_strtolower(trim((string) $c['title'])), $columns);
foreach ($designed() as $wanted) {
    if (!in_array(mb_strtolower((string) $wanted['title']), $haveTitles, true)) {
        $columns[] = $wanted;
    }
}

/* Make sure the policy pages are reachable even when the owner's Policies
   column predates them: a missing link is appended at render time, so a
   database that has not run the migration still renders a complete footer. */
$policyPages = [
    '/privacy'    => 'Privacy policy',
    '/cookies'    => 'Cookie policy',
    '/ai-policy'  => 'AI policy',
    '/your-data'  => 'Your data and choices',
    '/terms'      => 'Terms of use',
    '/disclaimer' => 'Disclaimer',
];
foreach ($columns as $i => $column) {
    if (mb_strtolower(trim((string) $column['title'])) !== 'policies') {
        continue;
    }
    $present = [];
    foreach ((array) $column['links'] as $link) {
        $present[] = trim((string) ($link['url'] ?? ''));
    }
    foreach ($policyPages as $url => $label) {
        if (!in_array($url, $present, true)) {
            $column['links'][] = ['label' => $label, 'url' => $url, 'target' => '_self'];
        }
    }
    $columns[$i] = $column;
    break;
}

/* A column with a dozen or more links is laid out in two halves inside its
   track — otherwise fifteen section names make the footer three screens tall.
   This runs whether the column came from the panel or was added above, because
   the migration's row has no idea how wide the result will be. */
foreach ($columns as $i => $column) {
    if (count((array) ($column['links'] ?? [])) > 9) {
        $columns[$i]['wide'] = true;
    }
}

/* The Calculators column always ends at the catalogue: a list of six category
   indexes with no way to reach the rest is a teaser, not a map. */
foreach ($columns as $i => $column) {
    if (mb_strtolower(trim((string) $column['title'])) !== 'calculators') {
        continue;
    }
    $hasAll = false;
    foreach ((array) $column['links'] as $link) {
        if (in_array(trim((string) ($link['url'] ?? '')), ['/all-calculators', '/calculators'], true)) {
            $hasAll = true;
            break;
        }
    }
    if (!$hasAll) {
        $column['links'][] = ['label' => 'All ' . Format::count($calcTotal) . ' calculators', 'url' => '/all-calculators', 'target' => '_self'];
        $columns[$i] = $column;
    }
    break;
}

/*
 * One link, once.
 *
 * An older database carries a "Resources" column whose four links are also in
 * the Calculators, Tool sections and Company columns. Printing both makes the
 * footer look like it was assembled twice. Any link already rendered is dropped
 * from the columns after it, and a column left with nothing disappears.
 */
$seenUrls = [];
foreach ($columns as $i => $column) {
    $links = [];
    foreach ((array) ($column['links'] ?? []) as $link) {
        $url = trim((string) ($link['url'] ?? ''));
        /* /calculators and /all-calculators are the same page under two names;
           the older database links the first one. */
        $key = $url === '/calculators' ? '/all-calculators' : $url;
        if ($key !== '' && isset($seenUrls[$key])) {
            continue;
        }
        if ($key !== '') {
            $seenUrls[$key] = true;
        }
        $links[] = $link;
    }
    $column['links'] = $links;
    $columns[$i] = $column;
}
$columns = array_values(array_filter($columns, static fn (array $c): bool => !empty($c['links'])));

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
$legal = [];
foreach (Cms::menu('legal') as $item) {
    if (in_array(trim((string) ($item['url'] ?? '')), $deadUrls, true)) {
        continue;
    }
    $legal[] = $item;
}
if ($legal === []) {
    $legal = [
        ['label' => 'Privacy', 'url' => '/privacy'],
        ['label' => 'Cookies', 'url' => '/cookies'],
        ['label' => 'Terms', 'url' => '/terms'],
        ['label' => 'AI policy', 'url' => '/ai-policy'],
        ['label' => 'Disclaimer', 'url' => '/disclaimer'],
    ];
}
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
                    <?= View::escape((string) max(0, count($allGroups) - 1)) ?> other sections —
                    free and without an account.
                </p>
                <p class="footer-count">
                    Every calculator shows the formula it used. Every file tool runs in your
                    browser — <a href="<?= View::escape(View::url('/privacy')) ?>">nothing you open is uploaded</a>.
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
                                        <?php if (isset($link['count']) && (int) $link['count'] > 0): ?>
                                            <span class="footer-count-badge"><?= View::escape(Format::count((int) $link['count'])) ?></span>
                                        <?php endif; ?>
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
                    <?= View::escape((string) max(0, count($allGroups) - 1)) ?> sections besides the calculators ·
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
