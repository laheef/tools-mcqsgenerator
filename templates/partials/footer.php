<?php
/**
 * Footer, assembled from what the Footer screen says.
 *
 * Columns and links come from `footer_columns` + `menu_items`; the contact
 * block, social links, newsletter note and copyright line come from Settings.
 * With no database the footer falls back to the category matrix the site shipped
 * with, so nothing here can leave a visitor staring at an empty foot.
 *
 * @var array  $categories
 * @var string $siteName
 */

declare(strict_types=1);

use Omni\Cms;
use Omni\Data;
use Omni\Format;
use Omni\View;

$siteName = $siteName ?? SITE_NAME;
$columns = Cms::footerColumns();

if ($columns === []) {
    foreach (array_slice($categories ?? [], 0, 5) as $cat) {
        $links = [];
        foreach (array_slice(Data::byCategory((string) $cat['slug']), 0, 4) as $row) {
            $links[] = ['label' => $row['name'], 'url' => $row['path'], 'target' => '_self'];
        }
        $columns[] = ['title' => $cat['name'], 'links' => $links];
    }
}

$about = (string) (Cms::setting('footer_about', '') ?? '');
$copyright = (string) (Cms::setting('footer_copyright', '') ?? '');
$showNotice = Cms::enabled() ? Cms::settingBool('footer_show_notice', true) : SHOW_CLONE_NOTICE;
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
                <img src="<?= View::escape(Cms::logoUrl()) ?>" width="165" height="25" alt="<?= View::escape($siteName) ?>"
                     loading="lazy" decoding="async">
                <p class="footer-tagline"><?= View::escape(Cms::tagline()) ?></p>
                <?php if ($about !== ''): ?>
                    <p class="footer-tagline"><?= View::escape($about) ?></p>
                <?php endif; ?>
                <?php /* Every page links to the catalogue: it is the one URL that reaches everything, and before round 22 the footer was the only place on the site that did not mention it. */ ?>
                <p class="footer-count"><a href="<?= View::escape(View::url('/calculators')) ?>"><span data-live-count="total"><?= View::escape(Format::count(Data::total())) ?></span> calculators across
                    <?= View::escape((string) count($categories ?? [])) ?> categories</a> — browse the whole list.
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
                    <?= \Omni\Csrf::field() ?>
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
            <p><?= View::escape($copyright !== '' ? $copyright : '© ' . date('Y') . ' ' . $siteName . '. All calculations run in your browser and on this server — nothing is sent to a third party.') ?></p>
            <?php foreach ($legal as $item): ?>
                <p class="footer-note">
                    <a href="<?= View::escape(View::url((string) $item['url'])) ?>"><?= View::escape((string) $item['label']) ?></a>
                </p>
            <?php endforeach; ?>
            <?php if ($showNotice): ?>
                <p class="footer-note">
                    An educational rebuild of the Omni Calculator interface: PHP + hand-authored CSS,
                    calculator definitions extracted from the public site. Not affiliated with Omni Calculator.
                </p>
            <?php endif; ?>
        </div>
    </div>
</footer>
