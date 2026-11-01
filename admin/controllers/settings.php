<?php
/**
 * Settings — identity, layout, appearance values, SEO defaults, analytics, ads,
 * email, contact form and system behaviour.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Activity;
use Onim\Admin\Auth;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Admin\Settings as SettingsRepo;
use Onim\Cms;
use Onim\Db;
use Onim\Mailer;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', 'save') ?? 'save';

    if ($do === 'save') {
        $group = (string) (post('group', 'general') ?? 'general');
        $allowed = ['general', 'layout', 'appearance', 'seo', 'analytics', 'email', 'contact', 'system'];
        if (!in_array($group, $allowed, true)) {
            Flash::error('Unknown settings group.');
            redirect_to(admin_url('settings'));
        }
        $input = post_deep('settings');
        $result = SettingsRepo::save($group, $input);
        foreach ($result['errors'] as $error) {
            Flash::error($error);
        }
        if ($result['saved'] > 0) {
            Flash::success($result['saved'] . ' setting' . ($result['saved'] === 1 ? '' : 's') . ' saved.');
        }
        $back = match ($group) {
            'appearance' => admin_url('appearance'),
            'seo' => admin_url('seo'),
            default => admin_url('settings', ['tab' => $group]),
        };
        redirect_to((string) (post('return', '') ?: $back));
    }

    if ($do === 'cron_rotate') {
        $token = bin2hex(random_bytes(24));
        $existing = Db::one('SELECT skey FROM settings WHERE skey = ?', ['cron_token']);
        $data = ['svalue' => $token, 'sgroup' => 'system', 'is_secret' => 0, 'updated_at' => date('Y-m-d H:i:s')];
        if ($existing === null) {
            Db::insert('settings', array_merge(['skey' => 'cron_token'], $data));
        } else {
            Db::update('settings', $data, 'skey = :k', [':k' => 'cron_token']);
        }
        Cms::flush();
        Activity::log('cron_token_rotated', 'settings', 'cron_token', 'Generated a new cron token');
        Flash::success('A new cron token was generated. Update any cron URL that used the old one.');
        redirect_to(admin_url('settings', ['tab' => 'system']));
    }

    if ($do === 'test_mail') {
        $to = (string) (post('test_to', '') ?: (Cms::setting('mail_to') ?: Cms::setting('contact_email') ?: ''));
        $result = Mailer::test($to);
        Activity::log('mail_test', 'settings', '', 'Test email ' . ($result['ok'] ? 'sent' : 'failed: ' . $result['error']));
        $result['ok']
            ? Flash::success('Test email accepted by the ' . $result['transport'] . ' transport. Check the inbox for ' . $to . '.')
            : Flash::error('Sending failed: ' . $result['error']);
        redirect_to(admin_url('settings', ['tab' => 'email']));
    }

    redirect_to(admin_url('settings'));
}

$tab = (string) (request('tab') ?? 'general');
$groups = [
    'general'    => 'General',
    'layout'     => 'Layout & footer',
    'email'      => 'Email',
    'contact'    => 'Contact form',
    'analytics'  => 'Analytics & ads',
    'system'     => 'System',
];
if (!isset($groups[$tab])) {
    $tab = 'general';
}

$values = Cms::settings();
$dbInfo = [
    'driver' => 'MySQL / MariaDB',
    'host' => (string) (onim_db_config()['host'] ?? ''),
    'name' => (string) (onim_db_config()['name'] ?? ''),
    'version' => (string) \Onim\Db::value('SELECT VERSION()', [], 'unknown'),
];

$pageTitle = 'Settings';
$title = $pageTitle;
$wide = true;

render('settings', compact('tab', 'groups', 'values', 'dbInfo', 'pageTitle', 'title', 'wide'));
