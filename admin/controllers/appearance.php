<?php
/**
 * Appearance & branding — colours, typography, shape, container width, dark mode.
 *
 * These are not decorative switches: the values are written to the settings
 * table and the public layout prints them as CSS custom properties, which is how
 * the whole site picks them up without a rebuild.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;
use Omni\Admin\Flash;
use Omni\Admin\Settings as SettingsRepo;
use Omni\Cms;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', 'save') ?? 'save';
    if ($do === 'reset') {
        $defaults = ['brand_primary' => '#1a73e8', 'brand_accent' => '#ff6b35', 'color_mode' => 'light',
                     'font_heading' => 'system', 'font_body' => 'system', 'radius_scale' => 'medium',
                     'container_width' => '1200', 'button_style' => 'solid', 'heading_weight' => '700'];
        SettingsRepo::save('appearance', $defaults);
        Flash::success('Appearance reset to the defaults.');
        redirect_to(admin_url('appearance'));
    }
    $result = SettingsRepo::save('appearance', post_deep('settings'));
    foreach ($result['errors'] as $error) {
        Flash::error($error);
    }
    Flash::success('Appearance saved. The public site uses it on the next request.');
    redirect_to(admin_url('appearance'));
}

$values = Cms::settings();
$pageTitle = 'Appearance';
$title = $pageTitle;
$wide = true;
render('appearance', compact('values', 'pageTitle', 'title', 'wide'));
