<?php
/** @var array $values */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;

$v = static fn (string $key, string $default = ''): string => (string) ($values[$key] ?? $default);
$fonts = [
    'system'  => 'System UI (fastest)',
    'poppins' => 'Poppins (bundled)',
    'inter'   => 'Inter (bundled)',
    'serif'   => 'Serif stack',
    'mono'    => 'Monospace',
];
?>
<form method="post" action="<?= e(admin_url('appearance')) ?>" data-track-dirty>
    <?= Csrf::field() ?>
    <input type="hidden" name="do" value="save">

    <div class="grid grid-sidebar">
        <div class="stack" style="gap:18px">
            <div class="card">
                <div class="card-head"><h2>Brand colours</h2></div>
                <div class="card-body">
                    <div class="field-row">
                        <div class="field">
                            <label for="brand_primary">Primary</label>
                            <div class="row tight">
                                <input id="brand_primary" name="settings[brand_primary]" value="<?= e($v('brand_primary', '#1a73e8')) ?>" class="mono" style="max-width:140px">
                                <input type="color" value="<?= e($v('brand_primary', '#1a73e8')) ?>" aria-label="Pick the primary colour"
                                       oninput="document.getElementById('brand_primary').value=this.value;var s=document.getElementById('swatch');if(s){s.style.background=this.value;}">
                            </div>
                            <div class="hint">Links, buttons, the active state.</div>
                        </div>
                        <div class="field">
                            <label for="brand_accent">Accent</label>
                            <div class="row tight">
                                <input id="brand_accent" name="settings[brand_accent]" value="<?= e($v('brand_accent', '#ff6b35')) ?>" class="mono" style="max-width:140px">
                                <input type="color" value="<?= e($v('brand_accent', '#ff6b35')) ?>" aria-label="Pick the accent colour"
                                       oninput="document.getElementById('brand_accent').value=this.value">
                            </div>
                            <div class="hint">Highlights, badges, the hero gradient.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Typography &amp; shape</h2></div>
                <div class="card-body">
                    <div class="field-row-3">
                        <div class="field">
                            <label for="font_heading">Headings</label>
                            <select id="font_heading" name="settings[font_heading]">
                                <?php foreach ($fonts as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $v('font_heading', 'system') === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="field">
                            <label for="font_body">Body text</label>
                            <select id="font_body" name="settings[font_body]">
                                <?php foreach ($fonts as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $v('font_body', 'system') === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="field">
                            <label for="heading_weight">Heading weight</label>
                            <select id="heading_weight" name="settings[heading_weight]">
                                <?php foreach (['600' => 'Semibold 600', '700' => 'Bold 700', '800' => 'Extra bold 800'] as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $v('heading_weight', '700') === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="field-row-3" style="margin-top:14px">
                        <div class="field">
                            <label for="radius_scale">Corner radius</label>
                            <select id="radius_scale" name="settings[radius_scale]">
                                <?php foreach (['none' => 'Square', 'small' => 'Small', 'medium' => 'Medium', 'large' => 'Large', 'pill' => 'Pill'] as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $v('radius_scale', 'medium') === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="field">
                            <label for="button_style">Buttons</label>
                            <select id="button_style" name="settings[button_style]">
                                <?php foreach (['solid' => 'Solid', 'outline' => 'Outline', 'soft' => 'Soft fill'] as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $v('button_style', 'solid') === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="field">
                            <label for="container_width">Content width (px)</label>
                            <input id="container_width" name="settings[container_width]" type="number" min="960" max="1600" step="20" value="<?= e($v('container_width', '1200')) ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Colour mode</h2></div>
                <div class="card-body">
                    <div class="field-row">
                        <div class="field">
                            <label for="color_mode">Public site</label>
                            <select id="color_mode" name="settings[color_mode]">
                                <?php foreach (['light' => 'Light only', 'dark' => 'Dark only', 'auto' => 'Follow the visitor\'s system'] as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $v('color_mode', 'light') === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="hint">Dark mode uses the same palette with inverted surfaces.</div>
                        </div>
                        <div class="field">
                            <label for="admin_theme">Admin panel</label>
                            <select id="admin_theme" name="settings[admin_theme]">
                                <option value="light" <?= $v('admin_theme', 'light') === 'light' ? 'selected' : '' ?>>Light</option>
                                <option value="dark" <?= $v('admin_theme', 'light') === 'dark' ? 'selected' : '' ?>>Dark</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-foot">
                    <button class="btn btn-primary" type="submit">Save appearance</button>
                    <span class="spacer"></span>
                    <button class="btn btn-ghost" type="submit" name="do" value="reset" formnovalidate
                            data-confirm="Reset colours, fonts and shape to the shipped defaults?">Reset to defaults</button>
                </div>
            </div>
        </div>

        <div class="stack" style="gap:18px">
            <div class="card">
                <div class="card-head"><h2>Preview</h2></div>
                <div class="card-body">
                    <div style="border:1px solid var(--border);border-radius:10px;overflow:hidden">
                        <div style="height:76px;background:linear-gradient(135deg, <?= e($v('brand_primary', '#1a73e8')) ?>, <?= e($v('brand_accent', '#ff6b35')) ?>)" id="swatch"></div>
                        <div style="padding:14px">
                            <div style="font-weight:<?= e($v('heading_weight', '700')) ?>;font-size:16px;margin-bottom:6px">Mortgage Calculator</div>
                            <p class="small muted" style="margin:0 0 10px">This is how headings and body text will read on the public site.</p>
                            <span style="display:inline-block;padding:7px 14px;border-radius:8px;color:#fff;font-size:13px;font-weight:600;background:<?= e($v('brand_primary', '#1a73e8')) ?>">Calculate</span>
                        </div>
                    </div>
                    <p class="small muted" style="margin:12px 0 0">The preview uses the values already saved. Save first, then reload this page.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>How this is applied</h2></div>
                <div class="card-body">
                    <p class="small">Saved values are printed into <code>&lt;style&gt;</code> in the public layout as CSS custom
                        properties (<code>--brand</code>, <code>--accent</code>, <code>--radius</code>, <code>--shell</code>). Nothing is
                        recompiled, so a colour change is live on the next page load.</p>
                    <p class="small muted">The admin panel has its own theme switch and does not use the site palette.</p>
                </div>
            </div>
        </div>
    </div>
</form>
