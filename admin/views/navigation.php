<?php
/**
 * @var array $grouped
 * @var array $parents
 * @var array $pages
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;
use Omni\Cms;

$locations = [
    'header'         => ['Header navigation', 'The category bar under the logo. Links can have one level of dropdown.'],
    'header_actions' => ['Header actions', 'The right-hand side of the top bar (search, a call to action).'],
    'mobile'         => ['Mobile menu', 'Shown in the slide-out menu on small screens. Empty means the header links are used.'],
    'legal'          => ['Legal strip', 'Small links in the footer bottom row (privacy, terms).'],
];
?>
<form method="post" action="<?= e(admin_url('navigation')) ?>" data-track-dirty>
    <?= Csrf::field() ?>
    <input type="hidden" name="do" value="save">

    <?php foreach ($locations as $location => [$label, $help]): ?>
        <div class="card" style="margin-bottom:18px">
            <div class="card-head">
                <h2><?= e($label) ?></h2>
                <span class="spacer"></span>
                <span class="muted small"><?= count($grouped[$location] ?? []) ?> link<?= count($grouped[$location] ?? []) === 1 ? '' : 's' ?></span>
            </div>
            <?php if (!empty($grouped[$location])): ?>
                <div class="table-wrap">
                    <table class="data">
                        <thead>
                        <tr><th>Label</th><th>URL</th><th>Parent</th><th style="width:80px">Order</th><th style="width:90px">Target</th><th style="width:70px">Live</th><th class="actions">Remove</th></tr>
                        </thead>
                        <tbody>
                        <?php foreach ($grouped[$location] as $item): ?>
                            <tr>
                                <td><input name="items[<?= (int) $item['id'] ?>][label]" value="<?= e((string) $item['label']) ?>" aria-label="Label"></td>
                                <td><input name="items[<?= (int) $item['id'] ?>][url]" value="<?= e((string) $item['url']) ?>" class="mono" aria-label="URL"></td>
                                <td>
                                    <?php if ($location === 'header'): ?>
                                        <select name="items[<?= (int) $item['id'] ?>][parent_id]" aria-label="Parent">
                                            <option value="0">Top level</option>
                                            <?php foreach ($parents as $parent): ?>
                                                <?php if ((int) $parent['id'] === (int) $item['id']) { continue; } ?>
                                                <option value="<?= (int) $parent['id'] ?>" <?= (int) $item['parent_id'] === (int) $parent['id'] ? 'selected' : '' ?>>
                                                    <?= e((string) $parent['label']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php else: ?>
                                        <span class="muted small">—</span>
                                    <?php endif; ?>
                                </td>
                                <td><input name="items[<?= (int) $item['id'] ?>][sort_order]" type="number" value="<?= (int) $item['sort_order'] ?>" aria-label="Order"></td>
                                <td>
                                    <select name="items[<?= (int) $item['id'] ?>][target]" aria-label="Target">
                                        <option value="_self" <?= $item['target'] === '_self' ? 'selected' : '' ?>>Same tab</option>
                                        <option value="_blank" <?= $item['target'] === '_blank' ? 'selected' : '' ?>>New tab</option>
                                    </select>
                                </td>
                                <td>
                                    <label class="switch"><input type="checkbox" name="items[<?= (int) $item['id'] ?>][enabled]" value="1" <?= $item['enabled'] ? 'checked' : '' ?>><span class="track"></span></label>
                                </td>
                                <td class="actions">
                                    <button class="btn btn-sm btn-ghost" type="submit" name="do" value="delete" formnovalidate
                                            onclick="this.form.querySelector('[name=id]').value='<?= (int) $item['id'] ?>'"
                                            title="Remove"><?= admin_icon('trash', 15) ?></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="card-body"><p class="muted small" style="margin:0">No links here yet.</p></div>
            <?php endif; ?>
            <div class="card-foot">
                <span class="muted small">Use “Add a link” below to add to this section.</span>
            </div>
            <p class="small muted" style="padding:0 18px 12px;margin:0"><?= e($help) ?></p>
        </div>
    <?php endforeach; ?>

    <input type="hidden" name="id" value="0">
    <button class="btn btn-primary" type="submit">Save menu</button>
</form>

<div class="card" style="margin-top:22px">
    <div class="card-head"><h2>Add a link</h2></div>
    <div class="card-body">
        <form method="post" action="<?= e(admin_url('navigation')) ?>" class="row">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="add">
            <select name="location" aria-label="Where" style="width:auto">
                <?php foreach ($locations as $key => [$label2]) : ?>
                    <option value="<?= e($key) ?>"><?= e($label2) ?></option>
                <?php endforeach; ?>
            </select>
            <input name="label" placeholder="Label" required style="max-width:180px">
            <input name="url" placeholder="/path-or-full-url" class="mono" style="max-width:240px">
            <button class="btn" type="submit"><?= admin_icon('plus', 15) ?> Add link</button>
        </form>
    </div>
</div>

<div class="card" style="margin-top:22px">
    <div class="card-head"><h2>Header behaviour</h2></div>
    <div class="card-body">
        <form method="post" action="<?= e(admin_url('settings')) ?>">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="save">
            <input type="hidden" name="group" value="layout">
            <div class="field-row-3">
                <label class="check"><input type="checkbox" name="settings[header_sticky]" value="1" <?= Cms::settingBool('header_sticky', true) ? 'checked' : '' ?>>
                    <span>Sticky header on scroll</span></label>
                <label class="check"><input type="checkbox" name="settings[header_search_enabled]" value="1" <?= Cms::settingBool('header_search_enabled', true) ? 'checked' : '' ?>>
                    <span>Show the search box</span></label>
                <label class="check"><input type="checkbox" name="settings[header_show_count]" value="1" <?= Cms::settingBool('header_show_count', true) ? 'checked' : '' ?>>
                    <span>Show the calculator count</span></label>
            </div>
            <div class="field-row" style="margin-top:12px">
                <div class="field">
                    <label for="cta_label">Call-to-action label</label>
                    <input id="cta_label" name="settings[header_cta_label]" value="<?= e((string) Cms::setting('header_cta_label', '')) ?>" placeholder="Browse all calculators">
                </div>
                <div class="field">
                    <label for="cta_url">Call-to-action URL</label>
                    <input id="cta_url" name="settings[header_cta_url]" value="<?= e((string) Cms::setting('header_cta_url', '')) ?>" placeholder="/search">
                </div>
            </div>
            <button class="btn" type="submit">Save header behaviour</button>
        </form>
    </div>
</div>
