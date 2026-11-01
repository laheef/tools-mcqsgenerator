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

if ($columns === []) {
    /* No database: four category columns built from the catalogue itself. */
    $links = [];
    foreach (array_slice($categories ?? [], 0, 4) as $cat) {
        $links[] = [
            'title' => (string) $cat['name'],
            'links' => [['label' => 'All ' . mb_strtolower((string) $cat['name']) . ' calculators', 'url' => '/' . $cat['slug'], 'target' => '_self']],
        ];
    }
    $links[] = [
        'title' => 'Site',
        'links' => [
            ['label' => 'All calculators', 'url' => '/calculators', 'target' => '_self'],
            ['label' => 'Blog', 'url' => '/blog', 'target' => '_self'],
            ['label' => 'About us', 'url' => '/about', 'target' => '_self'],
            ['label' => 'Contact', 'url' => '/contact', 'target' => '_self'],
        ],
    ];
    $columns = $links;
}

$about = (string) (Cms::setting('footer_about', '') ?? '');
$copyright = (string) (Cms::setting('footer_copyright', '') ?? '');
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
                    <a href="<?= View::escape(View::url('/calculators')) ?>"><span data-live-count="total"><?= View::escape(Format::count(Data::total())) ?></span> calculators</a>
                    across <?= View::escape((string) count($categories ?? [])) ?> categories, free and without an account.
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
                    <div class="footer-column">
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
            <p class="footer-copyright"><?= View::escape($copyright !== '' ? $copyright : '© ' . date('Y') . ' ' . $siteName . '. All rights reserved.') ?></p>
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
            <?php if ($showNotice): ?>
                <p class="footer-note">Every calculation runs on this site — nothing you type is sent to a third party.</p>
            <?php endif; ?>
        </div>
    </div>
</footer>
