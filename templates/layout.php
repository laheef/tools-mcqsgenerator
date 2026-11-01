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
$brand     = (string) Cms::setting('brand_primary', '#3B68FC');
$accent    = (string) Cms::setting('brand_accent', '#FF6B35');
$radiusMap = ['none' => '0', 'small' => '6px', 'medium' => '12px', 'large' => '18px', 'pill' => '28px'];
$radius    = $radiusMap[(string) Cms::setting('radius_scale', 'medium')] ?? '12px';
$shell     = (int) (Cms::setting('container_width', '1286') ?: 1286);
$weight    = (string) Cms::setting('heading_weight', '700');
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
$adsHead           = Cms::settingBool('ads_enabled') ? (string) Cms::setting('ads_head_code', '') : '';
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
        /* Settings → Appearance. Printed as custom properties so the whole
           stylesheet follows without a rebuild. */
        :root {
            --brand: <?= View::escape($brand) ?>;
            --accent: <?= View::escape($accent) ?>;
            --radius: <?= View::escape($radius) ?>;
            --shell-max: <?= (int) $shell ?>px;
            --font-body: <?= $fontBody ?>;
            --font-heading: <?= $fontHeading ?>;
            --heading-weight: <?= View::escape($weight) ?>;
        }
        <?php if ($themeAttr === 'dark'): ?>
        html { color-scheme: dark; }
        <?php elseif ($themeAttr === 'auto'): ?>
        html { color-scheme: light dark; }
        @media (prefers-color-scheme: dark) { html { color-scheme: dark; } }
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

    <?php /* The utility-class engine is served from this host, not from a CDN:
        a calculator that cannot paint because a third party is slow (or blocked)
        is a broken calculator. The file is the same build the CDN serves, forms
        plugin included. */ ?>
    <script src="<?= View::escape(View::asset('js/vendor/tailwind.js')) ?>"></script>
    <script>
    // Tailwind is available for utility classes; the design tokens match app.css.
    if (window.tailwind) {
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { DEFAULT: '#3B68FC', dark: '#294CC2', soft: '#EBEFFF' },
                        ink: { DEFAULT: '#0A0A0A', 2: '#212427', 3: '#4B5259', 4: '#748091' },
                        line: '#DFE2EB',
                        canvas: '#F7F9FF'
                    },
                    fontFamily: {
                        sans: ['Poppins', 'Verdana', 'sans-serif'],
                        mono: ['"DM Mono"', 'ui-monospace', 'monospace']
                    },
                    maxWidth: { shell: '1286px' }
                }
            }
        };
    }
    </script>
    <?php /* Mark the document as scripted before the first paint. The calculator
        widget holds its results back until Calculate is pressed, and without
        this the server-rendered numbers would flash on screen for one frame and
        then vanish. A visitor without JavaScript never gets the class, so the
        results stay visible for them. */ ?>
    <script>document.documentElement.className += ' js';</script>
</head>
<body class="<?= View::escape($bodyClass) ?>">
    <a class="skip-link" href="#main">Skip to content</a>
    <?= View::render('partials/header', ['navCategories' => $navCategories ?? [], 'active' => $active ?? '', 'siteName' => $siteName]) ?>

    <main id="main" class="site-main">
        <?= $content ?>
    </main>

    <?= View::render('partials/footer', ['categories' => $categories ?? [], 'siteName' => $siteName]) ?>

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
