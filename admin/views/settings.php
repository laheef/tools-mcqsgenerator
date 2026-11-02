<?php
/**
 * @var string $tab @var array $groups @var array $values @var array $dbInfo
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;
use Onim\Cms;

$v = static fn (string $key, string $default = ''): string => (string) ($values[$key] ?? $default);
$b = static fn (string $key, bool $default = false): bool => Cms::settingBool($key, $default);
?>
<div class="tabs" data-tabs="settings-tabs">
    <?php foreach ($groups as $key => $label): ?>
        <button type="button" data-tab="<?= e($key) ?>"><?= e($label) ?></button>
    <?php endforeach; ?>
</div>

<div id="settings-tabs">
    <!-- ------------------------------------------------------------- general -->
    <div data-tab-panel="general" hidden>
        <form method="post" action="<?= e(admin_url('settings')) ?>" data-track-dirty>
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="save">
            <input type="hidden" name="group" value="general">
            <div class="card">
                <div class="card-head"><h2>Site identity</h2></div>
                <div class="card-body">
                    <div class="field-row">
                        <div class="field">
                            <label for="site_name">Site name</label>
                            <input id="site_name" name="settings[site_name]" value="<?= e($v('site_name', SITE_NAME)) ?>">
                        </div>
                        <div class="field">
                            <label for="site_tagline">Tagline</label>
                            <input id="site_tagline" name="settings[site_tagline]" value="<?= e($v('site_tagline', SITE_TAGLINE)) ?>">
                        </div>
                    </div>
                    <div class="field">
                        <label for="site_description">Site description</label>
                        <textarea id="site_description" name="settings[site_description]" rows="2"><?= e($v('site_description')) ?></textarea>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="site_url">Public site URL</label>
                            <input id="site_url" name="settings[site_url]" value="<?= e($v('site_url')) ?>" placeholder="https://example.com">
                            <div class="hint">Used for canonical URLs, the sitemap and emails. Leave blank to detect it from the request.</div>
                        </div>
                        <div class="field">
                            <label for="logo_path">Logo file</label>
                            <div class="row tight">
                                <input id="logo_path" name="settings[logo_path]" value="<?= e($v('logo_path')) ?>" placeholder="uploads/media/…/logo.svg">
                                <button class="btn btn-sm" type="button" data-media-pick="logo_path">Pick</button>
                            </div>
                            <div class="hint">Blank keeps the built-in logo.</div>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="favicon_path">Favicon</label>
                            <div class="row tight">
                                <input id="favicon_path" name="settings[favicon_path]" value="<?= e($v('favicon_path')) ?>" placeholder="uploads/media/…/favicon.png">
                                <button class="btn btn-sm" type="button" data-media-pick="favicon_path">Pick</button>
                            </div>
                        </div>
                        <div class="field">
                            <label for="contact_email">Public contact email</label>
                            <input id="contact_email" name="settings[contact_email]" value="<?= e($v('contact_email')) ?>" type="email">
                        </div>
                    </div>
                    <div class="field-row-3">
                        <div class="field">
                            <label for="contact_phone">Phone</label>
                            <input id="contact_phone" name="settings[contact_phone]" value="<?= e($v('contact_phone')) ?>">
                        </div>
                        <div class="field">
                            <label for="locale">Locale</label>
                            <input id="locale" name="settings[locale]" value="<?= e($v('locale', 'en_US')) ?>">
                        </div>
                        <div class="field">
                            <label for="timezone">Timezone</label>
                            <input id="timezone" name="settings[timezone]" value="<?= e($v('timezone', 'UTC')) ?>" class="mono">
                        </div>
                    </div>
                    <div class="field">
                        <label for="contact_address">Postal address</label>
                        <input id="contact_address" name="settings[contact_address]" value="<?= e($v('contact_address')) ?>">
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="calculators_per_page">Calculators per page</label>
                            <input id="calculators_per_page" name="settings[calculators_per_page]" type="number" min="12" max="200" value="<?= e($v('calculators_per_page', '48')) ?>">
                        </div>
                        <div class="field">
                            <label for="posts_per_page">Posts per page</label>
                            <input id="posts_per_page" name="settings[posts_per_page]" type="number" min="3" max="48" value="<?= e($v('posts_per_page', '9')) ?>">
                        </div>
                    </div>
                </div>
                <div class="card-foot"><button class="btn btn-primary" type="submit">Save general settings</button></div>
            </div>
        </form>
    </div>

    <!-- -------------------------------------------------------------- layout -->
    <div data-tab-panel="layout" hidden>
        <form method="post" action="<?= e(admin_url('settings')) ?>" data-track-dirty>
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="save">
            <input type="hidden" name="group" value="layout">
            <div class="card">
                <div class="card-head"><h2>Header</h2></div>
                <div class="card-body">
                    <div class="field-row-3">
                        <label class="check"><input type="checkbox" name="settings[header_sticky]" value="1" <?= $b('header_sticky', true) ? 'checked' : '' ?>> <span>Sticky header</span></label>
                        <label class="check"><input type="checkbox" name="settings[header_search_enabled]" value="1" <?= $b('header_search_enabled', true) ? 'checked' : '' ?>> <span>Search box</span></label>
                        <label class="check"><input type="checkbox" name="settings[header_show_count]" value="1" <?= $b('header_show_count', true) ? 'checked' : '' ?>> <span>Calculator count</span></label>
                    </div>
                    <div class="field-row" style="margin-top:14px">
                        <div class="field">
                            <label for="header_cta_label">Call-to-action label</label>
                            <input id="header_cta_label" name="settings[header_cta_label]" value="<?= e($v('header_cta_label')) ?>" placeholder="Browse all calculators">
                        </div>
                        <div class="field">
                            <label for="header_cta_url">Call-to-action URL</label>
                            <input id="header_cta_url" name="settings[header_cta_url]" value="<?= e($v('header_cta_url')) ?>" placeholder="/search">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Footer</h2></div>
                <div class="card-body">
                    <div class="field">
                        <label for="footer_about">About text</label>
                        <textarea id="footer_about" name="settings[footer_about]" rows="2"><?= e($v('footer_about')) ?></textarea>
                    </div>
                    <div class="field">
                        <label for="footer_copyright">Copyright line</label>
                        <input id="footer_copyright" name="settings[footer_copyright]" value="<?= e($v('footer_copyright')) ?>" placeholder="© {year} {site}. All rights reserved.">
                        <div class="hint"><code>{year}</code> and <code>{site}</code> are filled in automatically.</div>
                    </div>
                    <div class="field">
                        <label for="social_links">Social links</label>
                        <textarea id="social_links" name="settings[social_links]" rows="4" class="mono"><?php
                            $links = json_decode((string) ($values['social_links'] ?? '[]'), true) ?: [];
                            $lines = [];
                            foreach ($links as $link) {
                                if (is_array($link)) {
                                    $lines[] = ($link['label'] ?? '') . '|' . ($link['url'] ?? '');
                                }
                            }
                            echo e(implode("\n", $lines));
                        ?></textarea>
                        <div class="hint">One per line, <code>Label|https://url</code>.</div>
                    </div>
                    <div class="field-row">
                        <label class="check"><input type="checkbox" name="settings[footer_show_notice]" value="1" <?= $b('footer_show_notice', false) ? 'checked' : '' ?>> <span>Show a one-line privacy note beside the copyright</span></label>
                        <label class="check"><input type="checkbox" name="settings[newsletter_enabled]" value="1" <?= $b('newsletter_enabled') ? 'checked' : '' ?>> <span>Newsletter sign-up</span></label>
                    </div>
                    <div class="field" style="margin-top:14px">
                        <label for="newsletter_note">Newsletter note</label>
                        <input id="newsletter_note" name="settings[newsletter_note]" value="<?= e($v('newsletter_note')) ?>">
                    </div>
                </div>
                <div class="card-foot"><button class="btn btn-primary" type="submit">Save layout</button></div>
            </div>
        </form>
    </div>

    <!-- --------------------------------------------------------------- email -->
    <div data-tab-panel="email" hidden>
        <form method="post" action="<?= e(admin_url('settings')) ?>" data-track-dirty>
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="save">
            <input type="hidden" name="group" value="email">
            <div class="card">
                <div class="card-head"><h2>Delivery</h2></div>
                <div class="card-body">
                    <div class="field-row">
                        <div class="field">
                            <label for="mail_transport">Transport</label>
                            <select id="mail_transport" name="settings[mail_transport]">
                                <option value="mail" <?= $v('mail_transport', 'mail') === 'mail' ? 'selected' : '' ?>>PHP mail() — simplest, sometimes filtered</option>
                                <option value="smtp" <?= $v('mail_transport') === 'smtp' ? 'selected' : '' ?>>SMTP — recommended on shared hosting</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="mail_to">Send notifications to</label>
                            <input id="mail_to" name="settings[mail_to]" type="email" value="<?= e($v('mail_to')) ?>" placeholder="you@example.com">
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="mail_from_email">From address</label>
                            <input id="mail_from_email" name="settings[mail_from_email]" type="email" value="<?= e($v('mail_from_email')) ?>" placeholder="no-reply@yourdomain.com">
                            <div class="hint">Use an address on your own domain, or the host will reject it.</div>
                        </div>
                        <div class="field">
                            <label for="mail_from_name">From name</label>
                            <input id="mail_from_name" name="settings[mail_from_name]" value="<?= e($v('mail_from_name', SITE_NAME)) ?>">
                        </div>
                    </div>
                    <div class="field-row-3">
                        <div class="field">
                            <label for="smtp_host">SMTP host</label>
                            <input id="smtp_host" name="settings[smtp_host]" value="<?= e($v('smtp_host')) ?>" placeholder="smtp.hostinger.com">
                        </div>
                        <div class="field">
                            <label for="smtp_port">Port</label>
                            <input id="smtp_port" name="settings[smtp_port]" type="number" value="<?= e($v('smtp_port', '587')) ?>">
                        </div>
                        <div class="field">
                            <label for="smtp_secure">Encryption</label>
                            <select id="smtp_secure" name="settings[smtp_secure]">
                                <?php foreach (['tls' => 'STARTTLS (587)', 'ssl' => 'SSL (465)', 'none' => 'None (not recommended)'] as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $v('smtp_secure', 'tls') === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="smtp_user">SMTP username</label>
                            <input id="smtp_user" name="settings[smtp_user]" value="<?= e($v('smtp_user')) ?>" autocomplete="off">
                        </div>
                        <div class="field">
                            <label for="smtp_pass">SMTP password</label>
                            <input id="smtp_pass" name="settings[smtp_pass]" type="password" autocomplete="new-password"
                                   placeholder="<?= $v('smtp_pass') !== '' ? '•••••••• stored — leave blank to keep' : 'not set' ?>">
                            <div class="hint">Stored encrypted with the application key.</div>
                        </div>
                    </div>
                </div>
                <div class="card-foot"><button class="btn btn-primary" type="submit">Save email settings</button></div>
            </div>
        </form>

        <div class="card">
            <div class="card-head"><h2>Send a test</h2></div>
            <div class="card-body">
                <form method="post" action="<?= e(admin_url('settings')) ?>" class="row">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="test_mail">
                    <input name="test_to" type="email" placeholder="you@example.com" value="<?= e($v('mail_to')) ?>" style="max-width:300px">
                    <button class="btn" type="submit"><?= admin_icon('mail', 15) ?> Send test email</button>
                </form>
                <p class="small muted" style="margin:10px 0 0">Save the settings first — the test uses what is stored, not what is typed above.</p>
            </div>
        </div>
    </div>

    <!-- ------------------------------------------------------------- contact -->
    <div data-tab-panel="contact" hidden>
        <form method="post" action="<?= e(admin_url('settings')) ?>" data-track-dirty>
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="save">
            <input type="hidden" name="group" value="contact">
            <div class="card">
                <div class="card-head"><h2>Contact form</h2></div>
                <div class="card-body">
                    <label class="check" style="margin-bottom:14px">
                        <input type="checkbox" name="settings[contact_form_enabled]" value="1" <?= $b('contact_form_enabled', true) ? 'checked' : '' ?>>
                        <span>The contact page shows the form</span>
                    </label>
                    <label class="check" style="margin-bottom:14px">
                        <input type="checkbox" name="settings[contact_captcha]" value="1" <?= $b('contact_captcha', true) ? 'checked' : '' ?>>
                        <span>Ask a simple arithmetic question (no third-party captcha, no cookies)</span>
                    </label>
                    <div class="field">
                        <label for="contact_success">Message after sending</label>
                        <input id="contact_success" name="settings[contact_success]" value="<?= e($v('contact_success')) ?>">
                    </div>
                    <div class="field">
                        <label for="contact_privacy_note">Privacy note under the button</label>
                        <input id="contact_privacy_note" name="settings[contact_privacy_note]" value="<?= e($v('contact_privacy_note')) ?>">
                    </div>
                    <p class="small muted">The field list (add, rename, reorder, required) is managed on its own screen.</p>
                </div>
                <div class="card-foot">
                    <button class="btn btn-primary" type="submit">Save contact settings</button>
                    <a class="btn" href="<?= e(admin_url('forms')) ?>">Manage the fields</a>
                </div>
            </div>
        </form>
    </div>

    <!-- ----------------------------------------------------------- analytics -->
    <div data-tab-panel="analytics" hidden>
        <form method="post" action="<?= e(admin_url('settings')) ?>" data-track-dirty>
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="save">
            <input type="hidden" name="group" value="analytics">
            <div class="card">
                <div class="card-head"><h2>Analytics</h2></div>
                <div class="card-body">
                    <div class="notice info">
                        <div><strong>The panel never invents numbers</strong>
                            The dashboard counts page views in MySQL itself. A third-party provider is optional and only
                            active when you configure it here.</div>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="analytics_provider">Provider</label>
                            <select id="analytics_provider" name="settings[analytics_provider]">
                                <?php foreach (['none' => 'None — own counter only', 'plausible' => 'Plausible', 'umami' => 'Umami', 'ga4' => 'Google Analytics 4', 'matomo' => 'Matomo', 'custom' => 'Custom snippet'] as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $v('analytics_provider', 'none') === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="field">
                            <label for="analytics_id">Measurement ID / domain / Matomo URL</label>
                            <input id="analytics_id" name="settings[analytics_id]" value="<?= e($v('analytics_id')) ?>" placeholder="G-XXXXXXX, example.com, https://matomo.example.com">
                        </div>
                        <div class="field">
                            <label for="analytics_site_id">Matomo site ID</label>
                            <input id="analytics_site_id" name="settings[analytics_site_id]" value="<?= e($v('analytics_site_id')) ?>" placeholder="1">
                            <div class="hint">Only used by Matomo; every other provider ignores it.</div>
                        </div>
                    </div>
                    <div class="field">
                        <label for="analytics_custom_head">Custom head snippet</label>
                        <textarea id="analytics_custom_head" name="settings[analytics_custom_head]" rows="4" class="code"><?= e($v('analytics_custom_head')) ?></textarea>
                        <div class="hint">Only used when the provider is “Custom snippet”. Output verbatim in &lt;head&gt;.</div>
                    </div>
                    <label class="check"><input type="checkbox" name="settings[analytics_internal_tracking]" value="1" <?= $b('analytics_internal_tracking', true) ? 'checked' : '' ?>>
                        <span>Count page views in the internal dashboard counter</span></label>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Advertising</h2></div>
                <div class="card-body">
                    <label class="check" style="margin-bottom:6px">
                        <input type="checkbox" name="settings[ads_enabled]" value="1" <?= $b('ads_enabled') ? 'checked' : '' ?>>
                        <span>Advertising is enabled on this site</span>
                    </label>
                    <p class="hint" style="margin:0 0 16px">
                        One switch for every slot below. With this off nothing renders anywhere, whatever is saved —
                        which is what you want while an ad network reviews the site.
                    </p>

                    <?php
                    /* One line that answers the two questions an owner actually
                       asks: is it on, and how much of the page is earning. */
                    $slotCount = count(\Onim\Ads::slots());
                    $slotFilled = 0;
                    foreach (array_keys(\Onim\Ads::slots()) as $slotKey) {
                        if (trim((string) (\Onim\Cms::setting('ads_slot_' . $slotKey, '') ?? '')) !== '') {
                            $slotFilled++;
                        }
                    }
                    $adsOn = $b('ads_enabled');
                    ?>
                    <div class="ad-status<?= $adsOn ? ' is-on' : '' ?>">
                        <span class="ad-status-state">
                            <?= $adsOn ? 'Advertising is live' : 'Advertising is switched off' ?>
                        </span>
                        <span class="ad-status-count">
                            <?= $slotFilled ?> of <?= $slotCount ?> positions have code
                            <?php if ($adsOn && $slotFilled === 0): ?>
                                — the switch is on, but every box is empty, so nothing shows yet
                            <?php elseif (!$adsOn && $slotFilled > 0): ?>
                                — <?= $slotFilled ?> saved tag<?= $slotFilled === 1 ? '' : 's' ?> will appear as soon as you switch it on
                            <?php endif; ?>
                        </span>
                    </div>

                    <?php
                    /* Calculators and posts have their own slot sets, and only a
                       real page of each kind shows them. Link both, so the map
                       can be checked without hunting for a URL. */
                    $sampleCalc = (string) (\Onim\Data::all()[0]['path'] ?? '/calculators');
                    $postSlug = \Onim\Db::value(
                        "SELECT slug FROM posts WHERE status = 'published' AND published_at <= NOW()
                         ORDER BY published_at DESC LIMIT 1",
                        [],
                        ''
                    );
                    $samplePost = ($postSlug !== '' && $postSlug !== null) ? '/blog/' . $postSlug : '';
                    ?>
                    <div class="ad-preview-row">
                        <div class="ad-preview-links">
                            <a class="btn btn-sm" href="<?= e(\Onim\Ads::previewUrl($sampleCalc)) ?>" target="_blank" rel="noopener">
                                Preview a calculator page &rarr;
                            </a>
                            <?php if ($samplePost !== ''): ?>
                                <a class="btn btn-sm" href="<?= e(\Onim\Ads::previewUrl($samplePost)) ?>" target="_blank" rel="noopener">
                                    Preview a blog post &rarr;
                                </a>
                            <?php endif; ?>
                            <a class="btn btn-sm" href="<?= e(\Onim\Ads::previewUrl('/')) ?>" target="_blank" rel="noopener">
                                Preview the home page &rarr;
                            </a>
                        </div>
                        <p class="hint" style="margin:0">
                            Each link opens the page as a map: a dashed, labelled box in every slot, and no real
                            tags — the saved code is not printed, so nothing loads and no impression is counted.
                            Works with advertising switched off, which is when you most want the map. The links
                            are signed and expire at midnight; visitors can never see them.
                        </p>
                    </div>

                    <h3 class="settings-subhead">Where the ads go</h3>
                    <p class="hint" style="margin-top:-4px;margin-bottom:18px">
                        Every place that can hold an ad is listed below. Paste the tag from your ad network into a
                        box and it appears in that position on the next page load — the panel is the only place ad
                        code lives. An empty box renders nothing at all: no gap, no placeholder, no reserved height.
                        AdSense units work exactly as pasted, with or without the <code>push()</code> line: a bare
                        <code>&lt;ins class="adsbygoogle"&gt;</code> is filled for you, and a tag that already carries
                        its own push is left alone.
                    </p>

                    <?php foreach (\Onim\Ads::slots() as $slotKey => $slotMeta):
                        $slotSetting = 'ads_slot_' . $slotKey;
                        $slotValue = (string) (\Onim\Cms::setting($slotSetting, '') ?? '');
                        $slotHas = trim($slotValue) !== '';
                        ?>
                        <div class="field ad-slot-field<?= $slotHas ? ' has-code' : '' ?>">
                            <label for="<?= e($slotSetting) ?>">
                                <strong><?= e($slotMeta['label']) ?></strong>
                                <span class="badge <?= $slotHas ? 'badge-ok' : 'badge-muted' ?>"><?= $slotHas ? 'filled' : 'empty' ?></span>
                                <span class="badge badge-brand"><?= e($slotMeta['size']) ?></span>
                            </label>
                            <textarea id="<?= e($slotSetting) ?>" name="settings[<?= e($slotSetting) ?>]" rows="3"
                                      class="code" spellcheck="false"
                                      placeholder="&lt;ins class=&quot;adsbygoogle&quot; ...&gt;&lt;/ins&gt;"><?= e($slotValue) ?></textarea>
                            <div class="hint"><?= e($slotMeta['where']) ?></div>
                        </div>
                    <?php endforeach; ?>

                    <h3 class="settings-subhead">Site-wide code</h3>
                    <div class="field">
                        <label for="ads_head_code">Head code</label>
                        <textarea id="ads_head_code" name="settings[ads_head_code]" rows="3" class="code"><?= e($v('ads_head_code')) ?></textarea>
                        <div class="hint">Printed in &lt;head&gt; on every page — the loader script an ad network asks
                            for once (AdSense's <code>adsbygoogle.js</code>, for example). Not printed while
                            advertising is switched off.</div>
                    </div>
                    <div class="field">
                        <label for="ads_inline_code">Legacy in-article tag</label>
                        <textarea id="ads_inline_code" name="settings[ads_inline_code]" rows="3" class="code"><?= e($v('ads_inline_code')) ?></textarea>
                        <div class="hint">The in-article tag from before the slots were named. It still prints in the
                            <strong>Calculator — inside the article</strong> position, but only while that slot above is
                            empty — a tag in the named slot always wins. Move it up there when you get a moment.</div>
                    </div>
                    <div class="field">
                        <label for="ads_txt">ads.txt</label>
                        <textarea id="ads_txt" name="settings[ads_txt]" rows="3" class="code" placeholder="google.com, pub-0000000000000000, DIRECT, f08c47fec0942fa0"><?= e($v('ads_txt')) ?></textarea>
                        <div class="hint">Served at <code>/ads.txt</code> when not empty.</div>
                    </div>
                </div>
                <div class="card-foot"><button class="btn btn-primary" type="submit">Save analytics &amp; ads</button></div>
            </div>
        </form>
    </div>

    <!-- -------------------------------------------------------------- system -->
    <div data-tab-panel="system" hidden>
        <form method="post" action="<?= e(admin_url('settings')) ?>" data-track-dirty>
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="save">
            <input type="hidden" name="group" value="system">
            <div class="card">
                <div class="card-head"><h2>Performance</h2></div>
                <div class="card-body">
                    <label class="check" style="margin-bottom:14px">
                        <input type="checkbox" name="settings[cache_enabled]" value="1" <?= $b('cache_enabled', true) ? 'checked' : '' ?>>
                        <span>Enable the response cache for public pages</span>
                    </label>
                    <div class="field-row">
                        <div class="field">
                            <label for="cache_ttl">Cache lifetime (seconds)</label>
                            <input id="cache_ttl" name="settings[cache_ttl]" type="number" min="0" max="86400" value="<?= e($v('cache_ttl', '300')) ?>">
                        </div>
                        <div class="field">
                            <label for="pagination_style">Pagination style</label>
                            <select id="pagination_style" name="settings[pagination_style]">
                                <?php foreach (['numbers' => 'Numbers', 'loadmore' => 'Load more', 'infinite' => 'Infinite scroll'] as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $v('pagination_style', 'numbers') === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <label class="check"><input type="checkbox" name="settings[mail_debug_links]" value="1" <?= $b('mail_debug_links') ? 'checked' : '' ?>>
                        <span>Show password-reset links on screen when email cannot be sent (development only)</span></label>
                </div>
                <div class="card-foot"><button class="btn btn-primary" type="submit">Save system settings</button></div>
            </div>
        </form>

        <div class="card">
            <div class="card-head"><h2>Maintenance &amp; cron</h2></div>
            <div class="card-body">
                <p class="small muted" style="margin:0 0 12px">
                    <code>cron.php</code> prunes expired rate limits and reset tokens, trims the page-view and
                    activity tables, writes the nightly database snapshot and clears the page cache. Every job is
                    idempotent and prints what it changed.
                </p>
                <div class="field-row">
                    <div class="field">
                        <label for="cron_token">Cron token (for the HTTP entry point)</label>
                        <input id="cron_token" class="mono" name="settings[cron_token]" value="<?= e($v('cron_token')) ?>" readonly>
                        <div class="hint">Used only if you cannot run PHP from cron. Keep it secret.</div>
                    </div>
                    <div class="field">
                        <label>Command for hPanel → Advanced → Cron Jobs</label>
                        <input class="mono" readonly value="<?= e('php ' . dirname(__DIR__, 2) . '/cron.php') ?>">
                        <div class="hint">Recommended: once a day, <code>0 3 * * *</code>.</div>
                    </div>
                </div>
                <div class="field-row">
                    <div class="field">
                        <label for="backup_keep">Backups to keep</label>
                        <input id="backup_keep" type="number" min="1" max="200" name="settings[backup_keep]" value="<?= e($v('backup_keep', '10')) ?>">
                    </div>
                    <div class="field">
                        <label for="analytics_retention_days">Keep page-view history (days)</label>
                        <input id="analytics_retention_days" type="number" min="30" max="3650" name="settings[analytics_retention_days]" value="<?= e($v('analytics_retention_days', '400')) ?>">
                    </div>
                    <div class="field">
                        <label for="activity_retention_rows">Activity-log rows to keep</label>
                        <input id="activity_retention_rows" type="number" min="1000" max="200000" name="settings[activity_retention_rows]" value="<?= e($v('activity_retention_rows', '20000')) ?>">
                    </div>
                </div>
                <label class="check"><input type="checkbox" name="settings[backup_auto]" value="1" <?= $b('backup_auto', true) ? 'checked' : '' ?>>
                    <span>Write a database snapshot on every cron run</span></label>
            </div>
            <div class="card-foot" style="display:flex;gap:8px">
                <button class="btn btn-primary" type="submit">Save system settings</button>
                <button class="btn" type="submit" formnovalidate
                        formaction="<?= e(admin_url('settings', ['do' => 'cron_rotate'])) ?>"
                        data-confirm="Generate a new cron token? Any existing cron URL stops working.">Rotate cron token</button>
            </div>
        </div>

        <div class="card">
            <div class="card-head"><h2>Environment</h2></div>
            <div class="card-body">
                <dl class="kv">
                    <dt>PHP</dt><dd class="mono small"><?= e(PHP_VERSION) ?></dd>
                    <dt>Database</dt><dd class="mono small"><?= e($dbInfo['driver']) ?> · <?= e($dbInfo['version']) ?></dd>
                    <dt>DB host / name</dt><dd class="mono small"><?= e($dbInfo['host']) ?> / <?= e($dbInfo['name']) ?></dd>
                    <dt>Memory limit</dt><dd class="mono small"><?= e((string) ini_get('memory_limit')) ?></dd>
                    <dt>Upload limit</dt><dd class="mono small"><?= e((string) ini_get('upload_max_filesize')) ?></dd>
                    <dt>Max execution</dt><dd class="mono small"><?= e((string) ini_get('max_execution_time')) ?>s</dd>
                    <dt>Timezone</dt><dd class="mono small"><?= e(date_default_timezone_get()) ?></dd>
                    <dt>Session save path</dt><dd class="mono small"><?= e((string) ini_get('session.save_path')) ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>
