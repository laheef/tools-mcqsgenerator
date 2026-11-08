<?php
/**
 * Page shell. Everything above the fold is server-rendered HTML; no framework,
 * no hydration. Tailwind's Play CDN is loaded for utility classes, but all
 * critical styling lives in assets/css/app.css so the page looks correct even
 * when the CDN is unreachable (offline, sandboxed preview, locked-down network).
 *
 * @var \Onim\Seo $seo
 * @var string    $content
 */

declare(strict_types=1);

use Onim\Cms;
use Onim\View;

$bodyClass = $bodyClass ?? '';

/* Everything below comes from the admin panel when it is installed, and falls
   back to the values compiled into config.php when it is not. */
$siteName  = Cms::siteName();
/* The lockup next to the logo: same name, without a trailing "Calculator". */
$brandName = Cms::brandName();
$brand     = (string) Cms::setting('brand_primary', '#3B68FC');
$accent    = (string) Cms::setting('brand_accent', '#FF6B35');
/*
 * The stylesheet is built from four radius tokens, not one, so a shape setting
 * scales the whole family: [--radius, --radius-sm, --radius-lg, --radius-xl].
 * "medium" is the pair the design ships with, so an untouched panel renders
 * exactly the stylesheet's own corners.
 */
$radiusMap = [
    'none'   => [0, 0, 0, 0],
    'small'  => [6, 4, 8, 12],
    'medium' => [8, 6, 12, 16],
    'large'  => [16, 10, 20, 28],
    'pill'   => [24, 16, 28, 34],
];
$radiusSet = $radiusMap[(string) Cms::setting('radius_scale', 'medium')] ?? $radiusMap['medium'];
$shell     = (int) (Cms::setting('container_width', '1286') ?: 1286);
$weight    = (string) Cms::setting('heading_weight', '700');
$buttonStyle = (string) Cms::setting('button_style', 'solid');
/* Hover and tint shades follow the brand instead of staying the shipped blue. */
$brandInk  = \Onim\Palette::shade($brand, 0.22);
$brandSoft = \Onim\Palette::tint($brand, 0.9);
$brandOn   = \Onim\Palette::onColor($brand);
$fontMap   = [
    'system'  => "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif",
    'poppins' => "Poppins, Verdana, sans-serif",
    'inter'   => "Inter, 'Segoe UI', sans-serif",
    'serif'   => "Georgia, 'Times New Roman', serif",
    'mono'    => "'DM Mono', ui-monospace, monospace",
];
$fontBody    = $fontMap[(string) Cms::setting('font_body', 'poppins')] ?? $fontMap['poppins'];
$fontHeading = $fontMap[(string) Cms::setting('font_heading', 'poppins')] ?? $fontMap['poppins'];
$colorMode   = (string) Cms::setting('color_mode', 'light');
$themeAttr   = $colorMode === 'dark' ? 'dark' : ($colorMode === 'auto' ? 'auto' : 'light');
$analyticsProvider = (string) Cms::setting('analytics_provider', 'none');
$analyticsId       = (string) Cms::setting('analytics_id', '');
$analyticsCustom   = (string) Cms::setting('analytics_custom_head', '');
/* The network's loader script, printed once in <head>. Suppressed in the
   slot preview: the preview exists to show the map, and loading a live tag
   while mapping would count impressions on an unfinished page. */
$adsHead           = (Cms::settingBool('ads_enabled') && !\Onim\Ads::showOutlines())
    ? (string) Cms::setting('ads_head_code', '')
    : '';
$noindexSite       = Cms::enabled() && !Cms::settingBool('seo_indexing', true);
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?= View::escape($themeAttr) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="<?= View::escape($brand) ?>">
    <?php if ($noindexSite): ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>
    <?= $seo->render() ?><?= $seo->renderSchema() ?>

    <link rel="icon" href="<?= View::escape(Cms::faviconUrl()) ?>">
    <style>
        /*
         * Settings → Appearance.
         *
         * Printed as custom properties so the whole stylesheet follows without a
         * rebuild. The selector is `:root:root`, not `:root`: app.css declares
         * the same properties on `:root`, and this block is printed *before* the
         * stylesheet — at equal specificity the later rule wins, which is how a
         * colour picked in the panel used to change nothing at all. Doubling the
         * pseudo-class makes this block win wherever it sits.
         */
        :root:root {
            --brand: <?= View::escape($brand) ?>;
            --brand-ink: <?= View::escape($brandInk) ?>;
            --brand-soft: <?= View::escape($brandSoft) ?>;
            --brand-on: <?= View::escape($brandOn) ?>;
            --accent: <?= View::escape($accent) ?>;
            --accent-pink: <?= View::escape($accent) ?>;
            --radius: <?= (int) $radiusSet[0] ?>px;
            --radius-sm: <?= (int) $radiusSet[1] ?>px;
            --radius-lg: <?= (int) $radiusSet[2] ?>px;
            --radius-xl: <?= (int) $radiusSet[3] ?>px;
            --shell: <?= $shell ?>px;
            --calc-shell: <?= $shell + 54 ?>px;
            --font: <?= $fontBody ?>;
            --font-heading: <?= $fontHeading ?>;
            --heading-weight: <?= View::escape($weight) ?>;
            /*
             * The unit chip's caret, drawn in the brand colour.
             *
             * A data-URI background cannot read a custom property, so the SVG is
             * written here with the colour baked in — the stylesheet keeps a
             * default for the case where this block is missing. Without it the
             * arrow would stay #3B68FC after Settings → Appearance picks
             * something else, which is exactly the mismatch this token prevents.
             */
            --caret-brand: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='8' viewBox='0 0 10 8'%3E%3Cpath d='M1.7 2.4L5 5.6l3.3-3.2' fill='none' stroke='<?= str_replace('#', '%23', View::escape($brand)) ?>' stroke-width='1.7' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        }
        /* Fonts and heading weight are rules, not tokens: nothing in app.css
           reads them yet, so they are applied here. `html body …` outranks the
           single-class rules the stylesheet uses for each of these titles. */
        html body { font-family: var(--font); }
        html body h1, html body h2, html body h3,
        html body .hero-title, html body .page-title,
        html body .article-title, html body .section-title {
            font-family: var(--font-heading);
            font-weight: var(--heading-weight);
        }
        html body .btn-primary { color: var(--brand-on); }
        <?php if ($buttonStyle === 'outline'): ?>
        /* Buttons drawn as an outline of the brand colour. */
        html body .btn-primary {
            background: transparent;
            color: var(--brand);
            border: 1px solid var(--brand);
            box-shadow: none;
        }
        html body .btn-primary:hover {
            background: var(--brand-soft);
            color: var(--brand-ink);
            border-color: var(--brand-ink);
        }
        <?php elseif ($buttonStyle === 'soft'): ?>
        /* A tinted fill instead of a solid one. */
        html body .btn-primary {
            background: var(--brand-soft);
            color: var(--brand-ink);
            border: 1px solid transparent;
            box-shadow: none;
        }
        html body .btn-primary:hover { background: var(--brand); color: var(--brand-on); }
        <?php endif; ?>
        <?php if ($themeAttr === 'dark' || $themeAttr === 'auto'): ?>
        <?php
        /*
         * Dark mode is the same layout with the surface tokens inverted; every
         * component in app.css is drawn from these tokens, so nothing else has
         * to know that the page is dark. Printed for `dark` always and for
         * `auto` only when the visitor's system asks for it.
         */
        $darkTokens = <<<CSS
            --bg: #0E1116;
            --surface: #151A21;
            --surface-2: #1A2028;
            --ink: #F4F6FA;
            --ink-2: #E6EAF1;
            --ink-3: #C6CDD8;
            --ink-4: #A9B3C1;
            --border: #2A3340;
            --border-strong: #3B4756;
            --brand-soft: #1C2B4A;
            --surface-3: #1D242D;
            --note-bg: #2A2415;
            --note-ink: #F1E0B2;
            --shadow-card: 0 1px 2px rgba(0, 0, 0, .5);
            --shadow-lift: 0 8px 24px rgba(0, 0, 0, .55);
            --shadow-pop: 0 12px 32px rgba(0, 0, 0, .6);
        CSS;
        ?>
        <?php if ($themeAttr === 'dark'): ?>
        html[data-theme="dark"] {
            color-scheme: dark;
<?= $darkTokens ?>

        }
        <?php else: ?>
        html[data-theme="auto"] { color-scheme: light dark; }
        @media (prefers-color-scheme: dark) {
            html[data-theme="auto"] {
                color-scheme: dark;
<?= $darkTokens ?>

            }
        }
        <?php endif; ?>
        <?php endif; ?>
    </style>
    <?php if ($adsHead !== ''): ?>
        <?= $adsHead ?>
    <?php endif; ?>
    <?php if ($analyticsProvider === 'plausible' && $analyticsId !== ''): ?>
        <script defer data-domain="<?= View::escape($analyticsId) ?>" src="https://plausible.io/js/script.js"></script>
    <?php elseif ($analyticsProvider === 'umami' && $analyticsId !== ''): ?>
        <script defer src="https://cloud.umami.is/script.js" data-website-id="<?= View::escape($analyticsId) ?>"></script>
    <?php elseif ($analyticsProvider === 'ga4' && $analyticsId !== ''): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?= View::escape($analyticsId) ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', <?= json_encode($analyticsId) ?>);
        </script>
    <?php elseif ($analyticsProvider === 'matomo' && $analyticsId !== ''): ?>
        <script>
            var _paq = window._paq = window._paq || [];
            _paq.push(['trackPageView']); _paq.push(['enableLinkTracking']);
            (function () {
                var u = <?= json_encode(rtrim($analyticsId, '/') . '/') ?>;
                _paq.push(['setTrackerUrl', u + 'matomo.php']);
                _paq.push(['setSiteId', <?= json_encode((string) Cms::setting('analytics_site_id', '1')) ?>]);
                var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
                g.async = true; g.src = u + 'matomo.js'; s.parentNode.insertBefore(g, s);
            })();
        </script>
    <?php elseif ($analyticsProvider === 'custom' && $analyticsCustom !== ''): ?>
        <?= $analyticsCustom ?>
    <?php endif; ?>
    <link rel="stylesheet" href="<?= View::escape(View::asset('css/app.css')) ?>">

    <?php /* The element/form reset (Tailwind's preflight, vendored as CSS).
        It used to arrive as 408 KB of JavaScript — the whole Tailwind compiler,
        run on every page to generate the same ~10 KB of rules, warning in the
        console that it was not for production. The rules are now a file the
        browser caches, loaded after app.css so it sits at the same point in the
        cascade the injected style did. */ ?>
    <link rel="stylesheet" href="<?= View::escape(View::asset('css/base.css')) ?>">

    <?php /* Mark the document as scripted before the first paint. The calculator
        widget holds its results back until Calculate is pressed, and without
        this the server-rendered numbers would flash on screen for one frame and
        then vanish. A visitor without JavaScript never gets the class, so the
        results stay visible for them. */ ?>
    <script>document.documentElement.className += ' js';</script>

    <?php /* The scripts and stylesheets this page's tool asks for (Chart.js,
        KaTeX, …). They are chosen per page in the panel and printed here, in
        <head>, so a widget never races its own library. Empty for every page
        that does not need one. */ ?>
    <?= \Onim\ToolLibraries::headForPath((string) ($path ?? View::currentPath())) ?>
</head>
<?php
/* The anchor is rendered at the very end of the document, but whether it will
   be there decides the body padding, so it is resolved once, here. */
$anchorAd = \Onim\Ads::slot('anchor');
if ($anchorAd !== '') {
    $bodyClass .= ' has-ad-anchor';
}
?>
<body class="<?= View::escape($bodyClass) ?>">
    <a class="skip-link" href="#main">Skip to content</a>
    <?= View::render('partials/header', ['navCategories' => $navCategories ?? [], 'active' => $active ?? '', 'siteName' => $brandName]) ?>

    <?php /* Sitewide slots. The header leaderboard stands down on calculator and
             blog pages, which print their own top-of-page slot: two leaderboards
             stacked is the one arrangement every ad guide agrees is a mistake. */ ?>
    <?php if (!str_contains($bodyClass, 'is-calculator') && !str_contains($bodyClass, 'is-post')): ?>
        <?= \Onim\Ads::slot('header', 'ad-slot--page-top') ?>
    <?php endif; ?>

    <main id="main" class="site-main">
        <?= $content ?>
    </main>

    <?= \Onim\Ads::slot('footer', 'ad-slot--page-bottom') ?>

    <?= View::render('partials/footer', ['categories' => $categories ?? [], 'siteName' => $brandName]) ?>

    <?php /* Sticky anchor. A wrapper, because the bar has to stay put while the
        document scrolls and the close button must not be inside the ad slot —
        the slot's contents are the network's HTML, and a button there would be
        click-jacking material. Rendered only below 1100px, where the sticky
        tool column does not exist. */ ?>
    <?php if ($anchorAd !== ''): ?>
        <div class="ad-anchor" data-ad-anchor>
            <button type="button" class="ad-anchor-close" data-ad-anchor-close aria-label="Close this advertisement">
                <?= View::icon('x', 16) ?>
            </button>
            <div class="ad-anchor-body"><?= $anchorAd ?></div>
        </div>
    <?php endif; ?>

    <script>window.BASE_PATH = <?= json_encode(BASE_PATH) ?>;</script>
    <script src="<?= View::escape(View::asset('js/app.js')) ?>" defer></script>
    <script src="<?= View::escape(View::asset('js/live-counts.js')) ?>" defer></script>
    <?php if (!empty($withCalculatorJs)): ?>
        <script src="<?= View::escape(View::asset('js/calc.js')) ?>" defer></script>
    <?php endif; ?>
    <?php if (!empty($withBrowseJs)): ?>
        <script src="<?= View::escape(View::asset('js/browse.js')) ?>" defer></script>
    <?php endif; ?>
</body>
</html>
