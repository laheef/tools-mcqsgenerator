<?php
/**
 * Settings — the whitelist between the settings forms and the database.
 *
 * Only keys listed here can be written, so a crafted POST cannot create new
 * settings rows or overwrite something the form never showed. Secrets (SMTP
 * password, API keys) are encrypted with the application key before they are
 * stored and are never rendered back into the form.
 */

declare(strict_types=1);


namespace Onim\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Cms;
use Onim\Db;

final class Settings
{
    /** key => [group, type] where type is text|bool|int|secret|json|code */
    public const FIELDS = [
        /* general */
        'site_name'            => ['general', 'text'],
        'site_tagline'         => ['general', 'text'],
        'site_description'     => ['general', 'text'],
        'site_url'             => ['general', 'text'],
        'logo_path'            => ['general', 'text'],
        'favicon_path'         => ['general', 'text'],
        'contact_email'        => ['general', 'text'],
        'contact_phone'        => ['general', 'text'],
        'contact_address'      => ['general', 'text'],
        'locale'               => ['general', 'text'],
        'timezone'             => ['general', 'text'],
        'date_format'          => ['general', 'text'],
        'calculators_per_page' => ['general', 'int'],
        'posts_per_page'       => ['general', 'int'],

        /* layout */
        'header_sticky'         => ['layout', 'bool'],
        'header_search_enabled' => ['layout', 'bool'],
        'header_show_count'     => ['layout', 'bool'],
        'header_cta_label'      => ['layout', 'text'],
        'header_cta_url'        => ['layout', 'text'],
        'footer_about'          => ['layout', 'text'],
        'footer_copyright'      => ['layout', 'text'],
        'footer_show_notice'    => ['layout', 'bool'],
        /* The tools index link in the footer. On by default: every band and
           every section page ends in "Browse all …" and lands on /all-tools,
           so the footer has to reach it too. Off is one untick. */
        'footer_tools_link'     => ['layout', 'bool'],
        'newsletter_enabled'    => ['layout', 'bool'],
        'newsletter_note'       => ['layout', 'text'],
        'social_links'          => ['layout', 'json'],

        /* appearance */
        'brand_primary'   => ['appearance', 'text'],
        'brand_accent'    => ['appearance', 'text'],
        'color_mode'      => ['appearance', 'text'],
        'font_heading'    => ['appearance', 'text'],
        'font_body'       => ['appearance', 'text'],
        'radius_scale'    => ['appearance', 'text'],
        'container_width' => ['appearance', 'int'],
        'button_style'    => ['appearance', 'text'],
        'heading_weight'  => ['appearance', 'text'],
        'admin_theme'     => ['appearance', 'text'],

        /* seo */
        'seo_default_title'       => ['seo', 'text'],
        'seo_default_description' => ['seo', 'text'],
        'seo_title_suffix'        => ['seo', 'text'],
        'seo_og_image'            => ['seo', 'text'],
        'seo_twitter_handle'      => ['seo', 'text'],
        'seo_indexing'            => ['seo', 'bool'],
        'seo_robots_extra'        => ['seo', 'code'],
        'seo_sitemap_blog'        => ['seo', 'bool'],
        'seo_breadcrumbs'         => ['seo', 'bool'],
        'seo_structured_data'     => ['seo', 'bool'],

        /* analytics + ads */
        'analytics_provider'          => ['analytics', 'text'],
        'analytics_id'                => ['analytics', 'text'],
        'analytics_site_id'           => ['analytics', 'text'],
        'analytics_custom_head'       => ['analytics', 'code'],
        'analytics_internal_tracking' => ['analytics', 'bool'],
        'ads_enabled'                 => ['analytics', 'bool'],
        'ads_head_code'               => ['analytics', 'code'],
        'ads_inline_code'             => ['analytics', 'code'],
        'ads_txt'                     => ['analytics', 'code'],
        /* The two 160px rails are gone: the calculator grid no longer reserves
           empty columns, and `calc_side` sits at the foot of the tool column
           instead. Their settings rows are left in the database (a retired key
           is harmless) but are no longer writable, so the panel cannot claim a
           slot the templates do not render. */

        /* email */
        'mail_transport'  => ['email', 'text'],
        'mail_from_name'  => ['email', 'text'],
        'mail_from_email' => ['email', 'text'],
        'mail_to'         => ['email', 'text'],
        'smtp_host'       => ['email', 'text'],
        'smtp_port'       => ['email', 'int'],
        'smtp_user'       => ['email', 'text'],
        'smtp_pass'       => ['email', 'secret'],
        'smtp_secure'     => ['email', 'text'],

        /* contact */
        'contact_form_enabled' => ['contact', 'bool'],
        'contact_success'      => ['contact', 'text'],
        'contact_captcha'      => ['contact', 'bool'],
        'contact_privacy_note' => ['contact', 'text'],

        /* system */
        'cache_enabled'    => ['system', 'bool'],
        'cache_ttl'        => ['system', 'int'],
        'pagination_style' => ['system', 'text'],
        'mail_debug_links' => ['system', 'bool'],
        'cron_token'             => ['system', 'text'],
        'backup_auto'            => ['system', 'bool'],
        'backup_keep'            => ['system', 'int'],
        'analytics_retention_days'  => ['system', 'int'],
        'activity_retention_rows'   => ['system', 'int'],
    ];

    /**
     * The full field list: the fixed settings above plus one `ads_slot_<key>`
     * row per slot the site can render.
     *
     * Generated rather than typed out, because a slot that exists in a template
     * but not in this list cannot be saved from the panel — which is exactly how
     * the first pair of ad rails ended up permanently empty.
     *
     * @return array<string,array{0:string,1:string}>
     */
    public static function fields(): array
    {
        $fields = self::FIELDS;
        foreach (\Onim\Ads::slots() as $key => $meta) {
            $fields['ads_slot_' . $key] = ['analytics', 'code'];
            // The box a publisher's creative is drawn into. Without a size the
            // slot has to guess, the creative fills a wrong-shaped hole and the
            // layout shifts when the network's script lands.
            $fields['ads_size_' . $key] = ['analytics', 'text'];
        }
        return $fields;
    }

    /** @return array<int,string> keys in a group */
    public static function group(string $group): array
    {
        $keys = [];
        foreach (self::fields() as $key => [$grp, $type]) {
            if ($grp === $group) {
                $keys[$key] = $type;
            }
        }
        return $keys;
    }

    /**
     * Save one group from a form.
     *
     * @param array<string,mixed> $input $_POST['settings']
     * @return array{saved:int,errors:array<int,string>}
     */
    public static function save(string $group, array $input): array
    {
        $errors = [];
        if (!Db::available()) {
            return ['saved' => 0, 'errors' => ['The database is not available.']];
        }
        $saved = 0;
        foreach (self::group($group) as $key => $type) {
            // A checkbox that is not in the POST means "off". Every other control
            // is always submitted by the form, so a key that is missing entirely
            // means the caller did not mean to change it — keep the stored value
            // instead of blanking it.
            if ($type !== 'bool' && !array_key_exists($key, $input)) {
                continue;
            }
            $raw = $input[$key] ?? null;
            $value = match ($type) {
                'bool' => (is_string($raw) && in_array($raw, ['1', 'on', 'true', 'yes'], true)) ? '1' : '0',
                'int'  => (string) max(0, (int) $raw),
                'json' => is_string($raw) ? self::normaliseJson($raw, $errors, $key) : '[]',
                'secret' => (is_string($raw) && trim($raw) !== '') ? Cms::encryptSecret(trim($raw)) : null,
                default => is_string($raw) ? trim($raw) : '',
            };

            if ($type === 'secret' && $value === null) {
                continue; // blank means "leave the stored secret alone"
            }
            if ($type === 'text') {
                if ($key === 'site_url' && $value !== '' && filter_var($value, FILTER_VALIDATE_URL) === false) {
                    $errors[] = 'The site URL must be a full URL, e.g. https://example.com';
                    continue;
                }
                if (str_starts_with($key, 'mail_') && str_ends_with($key, '_email') && $value !== ''
                    && filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
                    $errors[] = 'The email address in “' . $key . '” is not valid.';
                    continue;
                }
                if (in_array($key, ['brand_primary', 'brand_accent'], true) && $value !== ''
                    && preg_match('~^#[0-9a-f]{3,8}$~i', $value) !== 1) {
                    $errors[] = 'Colours must be hex values such as #1a73e8.';
                    continue;
                }
            }

            $existing = Db::one('SELECT skey FROM settings WHERE skey = ?', [$key]);
            $data = ['svalue' => $value, 'sgroup' => $group, 'is_secret' => $type === 'secret' ? 1 : 0, 'updated_at' => date('Y-m-d H:i:s')];
            if ($existing === null) {
                Db::insert('settings', array_merge(['skey' => $key], $data));
            } else {
                Db::update('settings', $data, 'skey = :k', [':k' => $key]);
            }
            $saved++;
        }
        Cms::flush();
        Activity::log('settings_saved', 'settings', $group, 'Saved the ' . $group . ' settings (' . $saved . ' values)');
        return ['saved' => $saved, 'errors' => $errors];
    }

    /** Accept "Label|https://url" lines or a JSON array; store JSON. */
    private static function normaliseJson(string $raw, array &$errors, string $key): string
    {
        $trim = trim($raw);
        if ($trim === '') {
            return '[]';
        }
        $decoded = json_decode($trim, true);
        if (is_array($decoded)) {
            return json_encode(array_values($decoded), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
        $out = [];
        foreach (preg_split('~\r\n|\r|\n~', $trim) ?: [] as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }
            $parts = array_map('trim', explode('|', $line, 2));
            $label = $parts[0];
            $url = $parts[1] ?? '';
            if ($url === '' || filter_var($url, FILTER_VALIDATE_URL) === false) {
                $errors[] = 'Social links need the form “Label|https://url” on each line.';
                continue;
            }
            $out[] = ['label' => $label, 'url' => $url];
        }
        return json_encode($out, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
