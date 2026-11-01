<?php
/** @var array $fields */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;
?>
<div class="notice info">
    <div>
        <strong>These fields make up the contact form</strong>
        The name, email and message fields are always required by the inbox (name and email identify the sender, the message
        is the body), so keep those three enabled. Everything else is optional.
    </div>
</div>

<form method="post" action="<?= e(admin_url('forms')) ?>" data-track-dirty>
    <?= Csrf::field() ?>
    <input type="hidden" name="do" value="save">
    <div class="card">
        <div class="card-head"><h2>Fields</h2><span class="spacer"></span><span class="muted small"><?= count($fields) ?> fields</span></div>
        <div class="table-wrap">
            <table class="data">
                <thead><tr><th>Key</th><th>Label</th><th>Type</th><th>Placeholder / options</th><th style="width:80px">Order</th><th style="width:90px">Required</th><th style="width:70px">Live</th><th class="actions"></th></tr></thead>
                <tbody>
                <?php foreach ($fields as $field): ?>
                    <?php $options = json_decode((string) ($field['options'] ?? ''), true) ?: []; ?>
                    <tr>
                        <td class="mono small"><?= e((string) $field['fkey']) ?></td>
                        <td><input name="fields[<?= (int) $field['id'] ?>][label]" value="<?= e((string) $field['label']) ?>" aria-label="Label"></td>
                        <td>
                            <select name="fields[<?= (int) $field['id'] ?>][ftype]" aria-label="Type">
                                <?php foreach (['text' => 'Text', 'email' => 'Email', 'tel' => 'Phone', 'textarea' => 'Long text', 'select' => 'Dropdown', 'checkbox' => 'Checkbox'] as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $field['ftype'] === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <?php if ($field['ftype'] === 'select'): ?>
                                <textarea name="fields[<?= (int) $field['id'] ?>][options]" rows="3" class="mono" aria-label="Options" placeholder="One option per line"><?= e(implode("\n", array_map('strval', $options))) ?></textarea>
                            <?php else: ?>
                                <input name="fields[<?= (int) $field['id'] ?>][placeholder]" value="<?= e((string) $field['placeholder']) ?>" aria-label="Placeholder">
                            <?php endif; ?>
                        </td>
                        <td><input name="fields[<?= (int) $field['id'] ?>][sort_order]" type="number" value="<?= (int) $field['sort_order'] ?>" aria-label="Order"></td>
                        <td><label class="switch"><input type="checkbox" name="fields[<?= (int) $field['id'] ?>][required]" value="1" <?= $field['required'] ? 'checked' : '' ?>><span class="track"></span></label></td>
                        <td><label class="switch"><input type="checkbox" name="fields[<?= (int) $field['id'] ?>][enabled]" value="1" <?= $field['enabled'] ? 'checked' : '' ?>><span class="track"></span></label></td>
                        <td class="actions">
                            <button class="btn btn-sm btn-ghost" type="submit" name="do" value="delete" formnovalidate
                                    onclick="this.form.querySelector('[name=id]').value='<?= (int) $field['id'] ?>'" title="Remove"><?= admin_icon('trash', 15) ?></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="id" value="0">
        <div class="card-foot"><button class="btn btn-primary" type="submit">Save fields</button>
            <a class="btn" href="<?= e(site_link('/contact')) ?>" target="_blank" rel="noopener">View the form</a></div>
    </div>
</form>

<div class="card" style="margin-top:22px">
    <div class="card-head"><h2>Add a field</h2></div>
    <div class="card-body">
        <form method="post" action="<?= e(admin_url('forms')) ?>" class="row">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="add">
            <input name="label" placeholder="Field label, e.g. Company" required style="max-width:240px">
            <select name="ftype" aria-label="Type" style="width:auto">
                <option value="text">Text</option>
                <option value="email">Email</option>
                <option value="tel">Phone</option>
                <option value="textarea">Long text</option>
                <option value="select">Dropdown</option>
                <option value="checkbox">Checkbox</option>
            </select>
            <button class="btn" type="submit"><?= admin_icon('plus', 15) ?> Add field</button>
        </form>
    </div>
</div>
