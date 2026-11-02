<?php
/**
 * @var array  $groups       top-level groups, in header order
 * @var array  $subs         group slug => its subgroups
 * @var array  $counts       section slug => how many tools it holds
 * @var array  $groupOptions group slug => name, for the "parent" select
 * @var string $edit         slug being edited ('' for none)
 * @var bool   $missingMigration
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Admin\Csrf;

$missingMigration = $missingMigration ?? false;
$edit = $edit ?? '';
$editing = $edit !== '' ? \Onim\Groups::findAny($edit) : null;

$form = $editing ?? [
    'slug' => '', 'parent' => '', 'name' => '', 'short' => '', 'title' => '',
    'description' => '', 'icon' => 'grid', 'sort_order' => (count($groups) + 1) * 10,
    'status' => 'published', 'source' => 'file',
];
?>
<?php if ($missingMigration): ?>
    <div class="card" style="border-color:var(--warn,#d97706);margin-bottom:18px">
        <div class="card-body">
            <strong>Database not upgraded.</strong>
            <p class="small" style="margin:6px 0 0">
                The <code>tool_groups</code> table (migration 010) is not applied yet, so a group cannot be
                renamed or added. The site itself is fine — it reads the shipped list from
                <code>data/groups.json</code>. Run the upgrade on the <a href="<?= e(admin_url('dashboard')) ?>">dashboard</a> first.
            </p>
        </div>
    </div>
<?php endif; ?>

<div class="grid grid-sidebar">
    <div class="card">
        <div class="card-head">
            <h2>Tool groups</h2>
            <span class="spacer"></span>
            <a class="btn btn-sm btn-primary" href="<?= e(admin_url('tool-groups', ['edit' => 'new'])) ?>">
                <?= admin_icon('plus', 14) ?> New group
            </a>
        </div>
        <div class="table-wrap">
            <table class="data">
                <thead>
                <tr>
                    <th>Group</th>
                    <th>Address</th>
                    <th class="num">Tools</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($groups as $group): ?>
                    <?php $slug = (string) $group['slug']; ?>
                    <tr class="<?= $edit === $slug ? 'is-selected' : '' ?>">
                        <td class="primary">
                            <?= e((string) $group['name']) ?>
                            <?php if ((string) $group['source'] === 'panel'): ?>
                                <span class="badge badge-muted">edited here</span>
                            <?php endif; ?>
                            <span class="sub"><?= e(str_limit((string) $group['description'], 96)) ?></span>
                        </td>
                        <td class="mono small">/<?= e($slug) ?></td>
                        <td class="num"><?= number_format((int) ($counts[$slug] ?? 0)) ?></td>
                        <td class="small"><?= (int) $group['sort_order'] ?></td>
                        <td><span class="badge <?= (string) $group['status'] === 'published' ? 'badge-ok' : 'badge-warn' ?>"><?= e((string) $group['status']) ?></span></td>
                        <td class="actions">
                            <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('tool-groups', ['edit' => $slug])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                            <a class="btn btn-sm btn-ghost" href="<?= e(site_link($slug)) ?>" target="_blank" rel="noopener" title="Open"><?= admin_icon('external', 15) ?></a>
                            <?php if ((string) $group['source'] === 'panel'): ?>
                                <form method="post" action="<?= e(admin_url('tool-groups')) ?>" style="display:inline"
                                      data-confirm="Reset “<?= e((string) $group['name']) ?>” to the wording the site ships with?">
                                    <?= Csrf::field() ?>
                                    <input type="hidden" name="do" value="reset">
                                    <input type="hidden" name="slug" value="<?= e($slug) ?>">
                                    <button class="btn btn-sm btn-ghost" type="submit" title="Reset to the shipped wording"><?= admin_icon('trash', 15) ?></button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php foreach (($subs[$slug] ?? []) as $sub): ?>
                        <tr class="<?= $edit === (string) $sub['slug'] ? 'is-selected' : '' ?>">
                            <td class="primary" style="padding-left:34px">
                                <span class="muted">↳</span> <?= e((string) $sub['name']) ?>
                                <span class="sub"><?= e(str_limit((string) $sub['description'], 90)) ?></span>
                            </td>
                            <td class="mono small">/<?= e((string) $sub['slug']) ?></td>
                            <td class="num"><?= number_format((int) ($counts[(string) $sub['slug']] ?? 0)) ?></td>
                            <td class="small"><?= (int) $sub['sort_order'] ?></td>
                            <td><span class="badge <?= (string) $sub['status'] === 'published' ? 'badge-ok' : 'badge-warn' ?>"><?= e((string) $sub['status']) ?></span></td>
                            <td class="actions">
                                <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('tool-groups', ['edit' => (string) $sub['slug']])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                                <a class="btn btn-sm btn-ghost" href="<?= e(site_link((string) $sub['slug'])) ?>" target="_blank" rel="noopener" title="Open"><?= admin_icon('external', 15) ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-body small muted">
            <p style="margin:0">
                A group is a page (<code>/audio</code>) and an entry in the secondary header. A subgroup is a page
                too (<code>/img-converters</code>) and appears in its group’s dropdown. A tool is filed under
                either one, and its address is <code>/{section}/{tool}</code>. The Calculators group’s children
                are the calculator categories, not subgroups — that is why it has none listed here.
            </p>
        </div>
    </div>

    <div class="stack" style="gap:18px">
        <div class="card">
            <div class="card-head">
                <h2><?= $editing !== null ? 'Edit “' . e((string) $form['name']) . '”' : 'New group' ?></h2>
                <span class="spacer"></span>
                <?php if ($editing !== null): ?>
                    <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('tool-groups')) ?>" aria-label="Close"><?= admin_icon('x', 15) ?></a>
                <?php endif; ?>
            </div>
            <form method="post" action="<?= e(admin_url('tool-groups')) ?>" class="card-body stack">
                <?= Csrf::field() ?>
                <input type="hidden" name="do" value="save">

                <div class="field">
                    <div class="label-row"><label for="name">Name</label></div>
                    <input id="name" name="name" value="<?= e((string) $form['name']) ?>" required>
                    <div class="hint">“Audio Tools”. This is the heading on its page.</div>
                </div>

                <div class="field">
                    <div class="label-row">
                        <label for="short">Short name</label>
                        <span class="hint">the header bar</span>
                    </div>
                    <input id="short" name="short" value="<?= e((string) $form['short']) ?>">
                    <div class="hint">“Audio” — used where the bar is tight. Empty means the full name.</div>
                </div>

                <div class="field">
                    <div class="label-row">
                        <label for="slug">Address</label>
                        <span class="hint">becomes /<?= e((string) ($form['slug'] !== '' ? $form['slug'] : 'slug')) ?></span>
                    </div>
                    <input id="slug" name="slug" value="<?= e((string) $form['slug']) ?>" required
                           <?= $editing !== null ? 'readonly' : '' ?>>
                    <div class="hint">
                        <?= $editing !== null
                            ? 'Fixed: every tool filed under this group is addressed through it.'
                            : 'Lowercase letters, digits and dashes. Tools filed here get /this/tool-name.' ?>
                    </div>
                </div>

                <div class="field">
                    <div class="label-row">
                        <label for="parent">Parent group</label>
                        <span class="hint">empty = a top-level group</span>
                    </div>
                    <select id="parent" name="parent" <?= $editing !== null && (string) $form['parent'] !== '' ? '' : '' ?>>
                        <option value="">— top-level group —</option>
                        <?php foreach ($groupOptions as $slug => $label): ?>
                            <?php if ($slug === (string) $form['slug']) { continue; } ?>
                            <option value="<?= e((string) $slug) ?>" <?= (string) $form['parent'] === (string) $slug ? 'selected' : '' ?>>
                                <?= e((string) $label) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="hint">Pick a group to make this one of its subgroups (a dropdown entry).</div>
                </div>

                <div class="field">
                    <div class="label-row"><label for="description">Description</label></div>
                    <textarea id="description" name="description" rows="3"><?= e((string) $form['description']) ?></textarea>
                    <div class="hint">One sentence, under the heading on the group page.</div>
                </div>

                <div class="field">
                    <div class="label-row">
                        <label for="icon">Icon</label>
                        <span class="hint">audio, video, image, pdf, code, shield, gamepad, zip, clock, palette, text, swap, people, dice, grid…</span>
                    </div>
                    <input id="icon" name="icon" value="<?= e((string) $form['icon']) ?>">
                </div>

                <div class="grid grid-2">
                    <div class="field">
                        <label for="sort_order">Order</label>
                        <input id="sort_order" name="sort_order" type="number" step="10" value="<?= (int) $form['sort_order'] ?>">
                        <div class="hint">Lower comes first in the bar.</div>
                    </div>
                    <div class="field">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="published" <?= (string) $form['status'] === 'published' ? 'selected' : '' ?>>Published</option>
                            <option value="hidden" <?= (string) $form['status'] === 'hidden' ? 'selected' : '' ?>>Hidden</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="justify-content:center">
                    <?= admin_icon('check', 15) ?> Save group
                </button>
            </form>
        </div>

        <div class="card">
            <div class="card-head"><h2>How tools are filed</h2></div>
            <div class="card-body small stack" style="line-height:1.65">
                <p style="margin:0">
                    <strong>Upload a tool file</strong> on <a href="<?= e(admin_url('tool-plugins')) ?>">Tool plugins</a>:
                    choose the folder it is stored in and the section it belongs to.
                </p>
                <p style="margin:0">
                    <strong>Bind it to a page</strong> — one click creates a draft with the shortcode already
                    attached; the section you picked becomes the page’s address.
                </p>
                <p style="margin:0" class="muted">
                    A page filed under <code>audio</code> lives at <code>/audio/its-name</code> and appears on
                    the Audio Tools page and on the home page under that heading.
                </p>
            </div>
        </div>
    </div>
</div>
