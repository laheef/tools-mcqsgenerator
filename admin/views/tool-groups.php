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

$parentPreset = $parentPreset ?? '';
/* ''  — nothing chosen yet: the card offers the choice
   'section' | 'sub' — the form, for that kind of thing
   edit mode is decided by $editing, not by this. */
$newMode = (string) ($newMode ?? '');
/* The mode, resolved once: the form opens as a sub-category when the address
   says so or when a parent was handed in. Everything below reads this instead
   of re-deriving it from the (still empty) parent field. */
$isSubForm = $editing === null && ($newMode === 'sub' || (string) ($parentPreset ?? '') !== '');
$parentPreset = $parentPreset !== '' ? $parentPreset : ($newMode === 'sub' ? '__required__' : '');
$form = $editing ?? [
    'slug' => '', 'parent' => ($parentPreset === '__required__' ? '' : $parentPreset),
    'name' => '', 'short' => '', 'title' => '',
    'description' => '', 'icon' => 'grid',
    /* A subgroup is ordered inside its parent, not after every group. */
    'sort_order' => $parentPreset !== '' ? 10 : (count($groups) + 1) * 10,
    'status' => 'published', 'source' => 'file',
];
$parentName = $parentPreset !== '' ? (string) ($groupOptions[$parentPreset] ?? '') : '';
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

<?php require ADMIN_ROOT . '/views/partials/tools-tabs.php'; ?>

<div class="stack" style="gap:18px">

        <div class="card">
            <div class="card-head">
                <?php
                $hasParent = (string) $form['parent'] !== '';
                $headline = $editing !== null
                    ? 'Edit “' . e((string) $form['name']) . '”'
                    : (($isSubForm && $hasParent)
                        ? 'New sub-category of “' . e((string) ($groupOptions[(string) $form['parent']] ?? $form['parent'])) . '”'
                        : ($isSubForm ? 'New sub-category'
                            : ($newMode === 'section' ? 'New section' : 'Add a section or a sub-category')));
                ?>
                <h2><?= $headline ?></h2>
                <span class="spacer"></span>
                <?php if ($editing !== null || $newMode !== ''): ?>
                    <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('tool-groups')) ?>" aria-label="Close"><?= admin_icon('x', 15) ?></a>
                <?php endif; ?>
            </div>

            <?php /* Two things can be created here, and they are not the same
                     thing: a section is a page of its own in the header bar, a
                     sub-category lives inside one. One form with an empty
                     "parent" box left the difference to be discovered; this
                     switch states it before the fields appear. */ ?>
            <?php if ($editing === null): ?>
                <div class="tools-kind" role="tablist" aria-label="What to add">
                    <a class="tools-kind-option<?= $isSubForm ? '' : ' is-active' ?>"
                       role="tab" aria-selected="<?= $isSubForm ? 'false' : 'true' ?>"
                       href="<?= e(admin_url('tool-groups', ['new' => 'section'])) ?>">
                        <strong>Section</strong>
                        <span>A new heading of its own in the header bar, e.g. “Audio Tools”.</span>
                    </a>
                    <a class="tools-kind-option<?= $isSubForm ? ' is-active' : '' ?>"
                       role="tab" aria-selected="<?= $isSubForm ? 'true' : 'false' ?>"
                       href="<?= e(admin_url('tool-groups', ['new' => 'sub'])) ?>">
                        <strong>Sub-category</strong>
                        <span>A page inside a section, e.g. “PDF Converters” under “PDF Tools”.</span>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($editing === null && $newMode === ''): ?>
                <div class="card-body">
                    <p class="small muted" style="margin:0">
                        Pick one above, or use
                        <a href="<?= e(admin_url('tool-groups', ['new' => 'sub'])) ?>">New sub-category</a> /
                        <a href="<?= e(admin_url('tool-groups', ['new' => 'section'])) ?>">New section</a>
                        at the top of the list.
                    </p>
                </div>
            <?php else: ?>
            <form method="post" action="<?= e(admin_url('tool-groups')) ?>" class="card-body stack tool-group-form">
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
                        <label for="parent"><?= $isSubForm ? 'Inside which section' : 'Parent group' ?></label>
                        <span class="hint"><?= $isSubForm ? 'required' : 'empty = a top-level group' ?></span>
                    </div>
                    <?php /* In sub-category mode there is no "top-level" answer: the
                             placeholder says so and cannot be submitted. */ ?>
                    <select id="parent" name="parent" <?= $isSubForm ? 'required' : '' ?>>
                        <option value="" <?= $isSubForm ? 'disabled' : '' ?> <?= (string) $form['parent'] === '' ? 'selected' : '' ?>>
                            <?= $isSubForm ? '— choose the section it sits in —' : '— top-level group —' ?>
                        </option>
                        <?php foreach ($groupOptions as $slug => $label): ?>
                            <?php if ($slug === (string) $form['slug']) { continue; } ?>
                            <option value="<?= e((string) $slug) ?>" <?= (string) $form['parent'] === (string) $slug ? 'selected' : '' ?>>
                                <?= e((string) $label) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="hint">
                        <?= $isSubForm
                            ? 'Required: a sub-category lives inside a section. It becomes a page and a dropdown entry.'
                            : 'Pick a section to file this under one (a dropdown entry).' ?>
                    </div>
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
                    <?= admin_icon('check', 15) ?>
                    <?= $editing !== null ? 'Save changes' : ($isSubForm ? 'Add sub-category' : 'Add section') ?>
                </button>
            </form>
            <?php endif; ?>
        </div>

<div class="card">
    <div class="card-head">
        <h2>Sections &amp; sub-categories</h2>
        <span class="spacer"></span>
        <a class="btn btn-sm btn-soft" href="<?= e(admin_url('tool-groups', ['new' => 'sub'])) ?>">
            <?= admin_icon('plus', 14) ?> New sub-category
        </a>
        <a class="btn btn-sm btn-primary" href="<?= e(admin_url('tool-groups', ['new' => 'section'])) ?>">
            <?= admin_icon('plus', 14) ?> New section
        </a>
    </div>
    <div class="table-wrap">
        <table class="data sections-table">
            <thead>
            <tr>
                <th>Section</th>
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
                            <span class="badge badge-muted"><?= \Onim\Groups::isShipped($slug) ? 'edited here' : 'added here' ?></span>
                        <?php endif; ?>
                        <span class="sub" title="<?= e((string) $group['description']) ?>"><?= e(str_limit((string) $group['description'], 96)) ?></span>
                    </td>
                    <td class="mono small">/<?= e($slug) ?></td>
                    <td class="num"><?= number_format((int) ($counts[$slug] ?? 0)) ?></td>
                    <td class="small"><?= (int) $group['sort_order'] ?></td>
                    <td><span class="badge <?= (string) $group['status'] === 'published' ? 'badge-ok' : 'badge-warn' ?>"><?= e((string) $group['status']) ?></span></td>
                    <td class="actions">
                        <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('tool-groups', ['edit' => $slug])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                        <?php if ((string) $group['parent'] === '' && (string) $group['slug'] !== \Onim\Groups::CALCULATORS): ?>
                            <a class="btn btn-sm btn-ghost tools-sub-add"
                               href="<?= e(admin_url('tool-groups', ['edit' => 'new', 'parent' => $slug])) ?>"
                               title="Add a sub-category under <?= e((string) $group['name']) ?>">
                                <?= admin_icon('plus', 14) ?><span>Sub-category</span>
                            </a>
                        <?php endif; ?>
                        <a class="btn btn-sm btn-ghost" href="<?= e(site_link($slug)) ?>" target="_blank" rel="noopener" title="Open"><?= admin_icon('external', 15) ?></a>
                        <?php if ((string) $group['source'] === 'panel' && !\Onim\Groups::isShipped($slug)): ?>
                            <?php /* Created here: it can go, once nothing is filed under it. */ ?>
                            <form method="post" action="<?= e(admin_url('tool-groups')) ?>" style="display:inline"
                                  data-confirm="Delete “<?= e((string) $group['name']) ?>”? It disappears from the header. A section that still has tools or sub-categories in it will refuse.">
                                <?= Csrf::field() ?>
                                <input type="hidden" name="do" value="delete">
                                <input type="hidden" name="slug" value="<?= e($slug) ?>">
                                <button class="btn btn-sm btn-ghost" type="submit" title="Delete this section"><?= admin_icon('trash', 15) ?></button>
                            </form>
                        <?php elseif ((string) $group['source'] === 'panel'): ?>
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
                            <?php if (!\Onim\Groups::isShipped((string) $sub['slug'])): ?>
                                <form method="post" action="<?= e(admin_url('tool-groups')) ?>" style="display:inline"
                                      data-confirm="Delete “<?= e((string) $sub['name']) ?>”? Its tools are not touched; a sub-category that still has tools in it will refuse.">
                                    <?= Csrf::field() ?>
                                    <input type="hidden" name="do" value="delete">
                                    <input type="hidden" name="slug" value="<?= e((string) $sub['slug']) ?>">
                                    <button class="btn btn-sm btn-ghost" type="submit" title="Delete this sub-category"><?= admin_icon('trash', 15) ?></button>
                                </form>
                            <?php elseif ((string) $sub['source'] === 'panel'): ?>
                                <form method="post" action="<?= e(admin_url('tool-groups')) ?>" style="display:inline"
                                      data-confirm="Reset “<?= e((string) $sub['name']) ?>” to the wording the site ships with?">
                                    <?= Csrf::field() ?>
                                    <input type="hidden" name="do" value="reset">
                                    <input type="hidden" name="slug" value="<?= e((string) $sub['slug']) ?>">
                                    <button class="btn btn-sm btn-ghost" type="submit" title="Reset to the shipped wording"><?= admin_icon('trash', 15) ?></button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

<details class="card tools-help">
    <summary><?= admin_icon('grid', 15) ?> How sections and sub-categories relate</summary>
    <div class="card-body stack small" style="line-height:1.65">
        <p style="margin:0">
            <strong>A section</strong> is a page of its own (<code>/audio</code>) and an entry in the
            secondary header. <strong>A sub-category</strong> lives inside one (<code>/img-converters</code>)
            and appears in that section’s dropdown.
        </p>
        <p style="margin:0">
            <strong>A tool</strong> is filed under either one, so its address is
            <code>/{section}/{tool}</code>. Upload the file on
            <a href="<?= e(admin_url('tool-plugins')) ?>">Tool files</a>, then
            <a href="<?= e(admin_url('custom-calculators', ['new' => 'tool'])) ?>">add the page</a>.
        </p>
        <p style="margin:0" class="muted">
            The Calculators section is the exception: its children are the calculator categories
            (<a href="<?= e(admin_url('categories')) ?>">Calculator categories</a>), not sub-categories.
        </p>
    </div>
</details>
