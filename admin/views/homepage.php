<?php
/**
 * @var array $sections
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;

$types = HOME_TYPES;
?>
<div class="notice info">
    <div>
        <strong>Sections render in this order</strong>
        Drag-free reordering: use the arrows. Disable a section to keep it configured but out of the page.
        The hero's headline understands <code>{count}</code>, which becomes the live calculator total.
    </div>
</div>

<form method="post" action="<?= e(admin_url('homepage')) ?>" data-track-dirty>
    <?= Csrf::field() ?>
    <input type="hidden" name="do" value="save">

    <div class="stack" style="gap:14px">
        <?php foreach ($sections as $i => $section): ?>
            <?php $type = (string) $section['stype']; ?>
            <div class="card">
                <div class="card-head">
                    <span class="badge badge-brand"><?= e($types[$type]['label'] ?? $type) ?></span>
                    <h2 style="font-size:14px"><?= e((string) ($section['title'] !== '' ? $section['title'] : $types[$type]['label'])) ?></h2>
                    <span class="spacer"></span>
                    <label class="switch" title="Enabled">
                        <input type="checkbox" name="sections[<?= (int) $section['id'] ?>][enabled]" value="1" <?= $section['enabled'] ? 'checked' : '' ?>>
                        <span class="track"></span>
                        <span class="small"><?= $section['enabled'] ? 'Live' : 'Hidden' ?></span>
                    </label>
                </div>
                <div class="card-body">
                    <div class="field-row">
                        <div class="field">
                            <label for="title-<?= (int) $section['id'] ?>">Heading</label>
                            <input id="title-<?= (int) $section['id'] ?>" name="sections[<?= (int) $section['id'] ?>][title]" value="<?= e((string) $section['title']) ?>">
                        </div>
                        <div class="field">
                            <label for="sub-<?= (int) $section['id'] ?>">Sub-heading</label>
                            <input id="sub-<?= (int) $section['id'] ?>" name="sections[<?= (int) $section['id'] ?>][subtitle]" value="<?= e((string) $section['subtitle']) ?>">
                        </div>
                    </div>
                    <?php if (!empty($types[$type]['fields'])): ?>
                        <div class="field-row-3">
                            <?php foreach ($types[$type]['fields'] as $key => $label): ?>
                                <div class="field">
                                    <label for="cfg-<?= (int) $section['id'] ?>-<?= e($key) ?>"><?= e($label) ?></label>
                                    <input id="cfg-<?= (int) $section['id'] ?>-<?= e($key) ?>"
                                           name="sections[<?= (int) $section['id'] ?>][config][<?= e($key) ?>]"
                                           value="<?= e((string) ($section['config'][$key] ?? '')) ?>"
                                           <?= in_array($key, ['html'], true) ? 'class="mono"' : '' ?>>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <p class="small muted" style="margin:8px 0 0">Key: <code><?= e((string) $section['skey']) ?></code> · order <?= (int) $section['sort_order'] ?></p>
                </div>
                <div class="card-foot">
                    <button class="btn btn-sm" type="submit" name="do" value="move" formnovalidate
                            onclick="this.form.querySelector('[name=id]').value='<?= (int) $section['id'] ?>';this.form.querySelector('[name=dir]').value='up'">
                        <?= admin_icon('up', 14) ?> Up
                    </button>
                    <button class="btn btn-sm" type="submit" name="do" value="move" formnovalidate
                            onclick="this.form.querySelector('[name=id]').value='<?= (int) $section['id'] ?>';this.form.querySelector('[name=dir]').value='down'">
                        <?= admin_icon('down', 14) ?> Down
                    </button>
                    <button class="btn btn-sm btn-danger" type="submit" name="do" value="delete" formnovalidate
                            onclick="this.form.querySelector('[name=id]').value='<?= (int) $section['id'] ?>'"
                            data-confirm="Remove this section from the homepage?">
                        <?= admin_icon('trash', 14) ?> Remove
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
        <input type="hidden" name="id" value="0">
        <input type="hidden" name="dir" value="">
    </div>

    <div class="row" style="margin-top:16px">
        <button class="btn btn-primary" type="submit">Save homepage</button>
        <span class="muted small">Changes take effect on the live page immediately.</span>
    </div>
</form>

<div class="card" style="margin-top:22px">
    <div class="card-head"><h2>Add a section</h2></div>
    <div class="card-body">
        <form method="post" action="<?= e(admin_url('homepage')) ?>" class="row">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="add">
            <select name="type" aria-label="Section type" style="width:auto">
                <?php foreach ($types as $key => $type): ?>
                    <option value="<?= e($key) ?>"><?= e($type['label']) ?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn" type="submit"><?= admin_icon('plus', 15) ?> Add section</button>
        </form>
    </div>
</div>
