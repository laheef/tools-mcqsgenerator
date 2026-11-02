<?php
/**
 * Advertising — every ad position on the site, on one screen.
 *
 * The tags used to live at the bottom of Settings → Analytics, which meant the
 * person pasting a network's code had to know which tab it was hiding on, and
 * had no way to say how big the box was meant to be. Each position is now a
 * card: its name, where it appears, the size it reserves, the tag itself and a
 * save of its own, so one slot can be changed without reposting the other
 * sixteen.
 *
 * Sizes are stored as "300x250" in `ads_size_<slot>` and rendered by Ads::slot()
 * as `--ad-w`/`--ad-h`, so an empty slot already occupies the shape its creative
 * will take and the page does not jump when the network's script lands.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Activity;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Ads;
use Onim\Cms;

/** "300 x 250", "300×250" and "300*250" all mean the same box. */
function ads_parse_size(string $raw): ?array
{
    if (preg_match('~^\s*(\d{2,4})\s*[x×*]\s*(\d{2,4})\s*$~iu', $raw, $m) !== 1) {
        return null;
    }
    $w = (int) $m[1];
    $h = (int) $m[2];
    if ($w < 40 || $h < 20 || $w > 2400 || $h > 1600) {
        return null;
    }
    return [$w, $h];
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = (string) (post('do', 'save') ?? 'save');
    $slot = (string) (post('slot', '') ?? '');

    if ($do === 'toggle') {
        // With JavaScript the switch posts its checkbox; without it, the
        // <noscript> button posts `set`, because an unchecked box posts nothing.
        $on = post('set') !== null ? ((string) post('set') === '1') : (post('ads_enabled') !== null);
        Cms::setSetting('ads_enabled', $on ? '1' : '0', 'analytics');
        Activity::log('ads_toggled', 'ads', '', $on ? 'Advertising on' : 'Advertising off');
        Flash::success($on ? 'Advertising is live — filled positions will show.' : 'Advertising is off. Saved tags are kept, nothing is printed.');
        redirect_to(admin_url('ads'));
    }

    if (!Ads::exists($slot)) {
        Flash::error('That is not a position this site knows about.');
        redirect_to(admin_url('ads'));
    }
    $label = Ads::slots()[$slot]['label'] ?? $slot;

    if ($do === 'clear') {
        Cms::setSetting(Ads::settingKey($slot), '', 'analytics');
        Activity::log('ad_slot_cleared', 'ads', $slot, 'Cleared the ' . $label . ' position');
        Flash::success($label . ' cleared.');
        redirect_to(admin_url('ads') . '#' . $slot);
    }

    if ($do === 'size') {
        $raw = trim((string) (post('size', '') ?? ''));
        if ($raw === '') {
            Cms::setSetting('ads_size_' . $slot, '', 'analytics');
            Flash::success($label . ' goes back to its default size.');
            redirect_to(admin_url('ads') . '#' . $slot);
        }
        $parsed = ads_parse_size($raw);
        if ($parsed === null) {
            Flash::error('Write the size as width × height in pixels, like 300x250.');
            redirect_to(admin_url('ads') . '#' . $slot);
        }
        Cms::setSetting('ads_size_' . $slot, $parsed[0] . 'x' . $parsed[1], 'analytics');
        Activity::log('ad_slot_sized', 'ads', $slot, 'Set ' . $label . ' to ' . $parsed[0] . '×' . $parsed[1]);
        Flash::success($label . ' now reserves ' . $parsed[0] . ' × ' . $parsed[1] . ' px.');
        redirect_to(admin_url('ads') . '#' . $slot);
    }

    // The default: save the tag. An empty textarea means "leave it empty".
    $code = trim((string) (post('code', '') ?? ''));
    if (mb_strlen($code) > 20000) {
        Flash::error('That tag is over 20,000 characters — trim it to what the network gave you.');
        redirect_to(admin_url('ads') . '#' . $slot);
    }
    Cms::setSetting(Ads::settingKey($slot), $code, 'analytics');
    Activity::log('ad_slot_saved', 'ads', $slot, ($code === '' ? 'Emptied' : 'Saved') . ' the ' . $label . ' position');
    Flash::success($code === '' ? $label . ' is empty.' : $label . ' saved.');
    redirect_to(admin_url('ads') . '#' . $slot);
}

$slots = Ads::slots();
$enabled = Cms::settingBool('ads_enabled', false);
$sizes = [];
$filled = 0;
foreach (array_keys($slots) as $key) {
    $sizes[$key] = Ads::dimensions($key);
    if (trim((string) (Cms::setting(Ads::settingKey($key), '') ?? '')) !== '') {
        $filled++;
    }
}
$headCode = trim((string) (Cms::setting('ads_head_code', '') ?? ''));
$adsTxt = trim((string) (Cms::setting('ads_txt', '') ?? ''));

$pageTitle = 'Advertising';
$title = $pageTitle;
$wide = true;
$topbarActions = [
    ['label' => 'Head code & ads.txt', 'url' => admin_url('settings', ['tab' => 'analytics']), 'icon' => 'settings', 'class' => 'btn-ghost'],
];
render('ads', compact('slots', 'enabled', 'sizes', 'filled', 'headCode', 'adsTxt', 'pageTitle', 'title', 'wide', 'topbarActions'));
