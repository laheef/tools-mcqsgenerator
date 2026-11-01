<?php
/**
 * @var array $columns
 * @var array $byColumn
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;
use Omni\Cms;

$total = 0;
foreach ($byColumn as $list) {
    $total += count($list);
}
?>
<div class="notice info">
    <div>
        <strong>Footer columns</strong>
        Each column is a heading plus links. The brand block, tagline, social links and copyright line are edited on the
        <a href="<?= e(admin_url('settings', ['tab' => 'layout'])) ?>">Settings → Layout</a> screen.
    </div>
</div>

<form method="post" action="<?= e(admin_url('footer')) ?>" data-track-dirty>
    <?= Csrf::field() ?>
    <input type="hidden" name="do" value="save">

    <div class="grid grid-2">
        <?php foreach ($columns as $column): ?>
            <div class="card">
                <div class="card-head">
                    <input name="columns[<?= (int) $column['id'] ?>][title]" value="<?= e((string) $column['title']) ?>"
                           aria-label="Column title" style="max-width:240px;font-weight:700">
                    <span class="spacer"></span>
                    <label class="switch" title="Visible">
                        <input type="checkbox" name="columns[<?= (int) $column['id'] ?>][enabled]" value="1" <?= $column['enabled'] ? 'checked' : '' ?>>
                        <span class="track"></span>
                    </label>
                </div>
                <div class="card-body is-flush">
                    <table class="data">
                        <tbody>
                        <?php foreach (($byColumn[(int) $column['id']] ?? []) as $link): ?>
                            <tr>
                                <td><input name="items[<?= (int) $link['id'] ?>][label]" value="<?= e((string) $link['label']) ?>" aria-label="Link label"></td>
                                <td><input name="items[<?= (int) $link['id'] ?>][url]" value="<?= e((string) $link['url']) ?>" class="mono" aria-label="Link URL"></td>
                                <td style="width:64px"><input name="items[<?= (int) $link['id'] ?>][sort_order]" type="number" value="<?= (int) $link['sort_order'] ?>" aria-label="Order"></td>
                                <td style="width:50px">
                                    <label class="switch"><input type="checkbox" name="items[<?= (int) $link['id'] ?>][enabled]" value="1" <?= $link['enabled'] ? 'checked' : '' ?>><span class="track"></span></label>
                                </td>
                                <td class="actions" style="width:46px">
                                    <button class="btn btn-sm btn-ghost" type="submit" name="do" value="delete" formnovalidate
                                            onclick="this.form.querySelector('[name=id]').value='<?= (int) $link['id'] ?>'"
                                            title="Remove link"><?= admin_icon('trash', 14) ?></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-foot">
                    <label class="small muted" for="col-order-<?= (int) $column['id'] ?>">Order</label>
                    <input id="col-order-<?= (int) $column['id'] ?>" type="number" name="columns[<?= (int) $column['id'] ?>][sort_order]"
                           value="<?= (int) $column['sort_order'] ?>" style="max-width:80px">
                    <span class="spacer"></span>
                    <button class="btn btn-sm btn-danger" type="submit" name="do" value="delete_column" formnovalidate
                            onclick="this.form.querySelector('[name=id]').value='<?= (int) $column['id'] ?>'"
                            data-confirm="Delete this column and its <?= count($byColumn[(int) $column['id']] ?? []) ?> link(s)?">
                        <?= admin_icon('trash', 14) ?>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <input type="hidden" name="id" value="0">
    <div class="row" style="margin-top:16px">
        <button class="btn btn-primary" type="submit">Save footer</button>
        <span class="muted small"><?= count($columns) ?> columns · <?= $total ?> links</span>
    </div>
</form>

<div class="card" style="margin-top:22px">
    <div class="card-head"><h2>Add a link</h2></div>
    <div class="card-body">
        <form method="post" action="<?= e(admin_url('footer')) ?>" class="row">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="add">
            <input type="hidden" name="location" value="footer_column">
            <select name="footer_column_id" aria-label="Column" style="width:auto">
                <?php foreach ($columns as $column): ?>
                    <option value="<?= (int) $column['id'] ?>"><?= e((string) $column['title']) ?></option>
                <?php endforeach; ?>
            </select>
            <input name="label" placeholder="Link label" required style="max-width:170px">
            <input name="url" placeholder="/path-or-full-url" class="mono" style="max-width:220px">
            <button class="btn" type="submit"><?= admin_icon('plus', 15) ?> Add link</button>
        </form>
    </div>
</div>

<div class="card" style="margin-top:22px">
    <div class="card-head"><h2>Add a column</h2></div>
    <div class="card-body">
        <form method="post" action="<?= e(admin_url('footer')) ?>" class="row">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="add_column">
            <input name="column_title" placeholder="Column heading, e.g. Company" required style="max-width:280px">
            <button class="btn" type="submit"><?= admin_icon('plus', 15) ?> Add column</button>
        </form>
    </div>
</div>
