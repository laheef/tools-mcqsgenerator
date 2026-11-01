<?php
/**
 * @var array|null $row             existing row (null when creating)
 * @var array      $values          editor model
 * @var array      $errors          list of validation messages
 * @var array|null $test            result of CustomCalc::testModel()
 * @var string     $tab
 * @var array      $categoryOptions slug => name
 * @var array      $unitGroups      unit registry
 * @var array      $versions        version history rows
 * @var string|null $previewUrl
 * @var string|null $publicUrl
 * @var string     $publicPath
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;
use Omni\CustomCalc;

$fields     = is_array($values['fields'] ?? null) ? $values['fields'] : [];
$directions = is_array($values['directions'] ?? null) ? $values['directions'] : [];
$sections   = is_array($values['sections'] ?? null) ? $values['sections'] : [];
$faqs       = is_array($values['faq'] ?? null) ? $values['faq'] : [];
$types      = CustomCalc::TYPES;
$isNew      = $row === null;

$fieldRows = $fields === [] ? [[
    'key' => '', 'label' => '', 'type' => 'number', 'default' => '', 'unit_group' => '',
    'unit_default' => '', 'help' => '', 'prefix' => '', 'suffix' => '', 'options' => '', 'output' => false,
]] : $fields;

$directionRows = $directions === [] ? [['group' => '', 'l' => '', 'f' => '']] : $directions;

/* a field select needs the full unit registry once, shared by every row */
$unitLabel = static function (array $group, string $key): string {
    $name = (string) ($group['name'] ?? $key);
    $name = preg_split('~\s*\(~', $name)[0] ?? $name;
    return mb_substr($name, 0, 60) . ' — ' . $key;
};
?>
<form method="post" action="<?= e(admin_url('custom-calculator-edit', ['id' => $isNew ? 'new' : (int) $row['id']])) ?>"
      id="custom-calc-form" data-track-dirty data-primary-form data-allow-repeat="1">
    <?= Csrf::field() ?>
    <input type="hidden" name="tab" id="tab-field" value="<?= e($tab) ?>">

    <?php if ($test !== null): ?>
        <div class="card" style="margin-bottom:18px" id="test-result">
            <div class="card-head">
                <h2>Test result</h2>
                <span class="spacer"></span>
                <?php if ($test['ok'] && $test['errors'] === []): ?>
                    <span class="badge badge-ok"><?= admin_icon('check', 12) ?> Ran without errors</span>
                <?php else: ?>
                    <span class="badge badge-err"><?= admin_icon('warning', 12) ?> Not ready</span>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <p class="muted small" style="margin-top:0">
                    This is not a simulation: it is the same solver the public page runs, fed with the default
                    values of the fields above and calculating everything else.
                </p>

                <?php if ($test['errors'] !== []): ?>
                    <ul style="list-style:none;padding:0;margin:0" style="color:var(--err);margin:0 0 12px">
                        <?php foreach ($test['errors'] as $problem): ?>
                            <li><?= admin_icon('warning', 14) ?> <?= e($problem) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($test['outputs'] !== []): ?>
                    <div class="table-wrap">
                        <table class="data">
                            <thead><tr><th>Calculated</th><th class="num">Value (base units)</th></tr></thead>
                            <tbody>
                            <?php foreach ($test['outputs'] as $name => $output): ?>
                                <tr>
                                    <td><?= e($output['label']) ?> <code class="muted"><?= e((string) $name) ?></code></td>
                                    <td class="num"><strong><?= e($output['value']) ?></strong></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>

                <?php if ($test['unknown'] !== []): ?>
                    <p class="small" style="margin:12px 0 0">
                        <strong>Not calculated:</strong> <?= e(implode(', ', $test['unknown'])) ?> —
                        there is no equation that solves for <?= count($test['unknown']) === 1 ? 'it' : 'them' ?>
                        from the fields that are known.
                    </p>
                <?php endif; ?>

                <?php if ($test['warnings'] !== []): ?>
                    <ul style="list-style:none;padding:0;margin:0" style="color:var(--warn);margin:12px 0 0">
                        <?php foreach ($test['warnings'] as $warning): ?>
                            <li><?= admin_icon('info', 14) ?> <?= e($warning) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($test['ok'] && $test['outputs'] === [] && $test['unknown'] === []): ?>
                    <p class="muted small" style="margin:0">Nothing to show yet — add an equation aimed at an output field.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($row['drafted_at'])): ?>
        <div class="card" style="margin-bottom:18px;border-color:var(--warn,#d97706)">
            <div class="card-head">
                <h2><?= admin_icon('info', 15) ?> This article has not been read yet</h2>
                <span class="spacer"></span>
                <span class="badge badge-warn">drafted <?= e((string) $row['drafted_at']) ?></span>
            </div>
            <div class="card-body">
                <p class="small" style="margin:0">
                    <?= number_format((int) ($row['drafted_words'] ?? 0)) ?> words were drafted from this
                    calculator's own definition when it was imported. Read the <strong>Article</strong> tab,
                    rewrite what does not sound like you, then press <strong>Save changes</strong> — that
                    clears the flag and takes the page off the review queue.
                </p>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($draftReport)): ?>
        <div class="card" style="margin-bottom:18px">
            <div class="card-head">
                <h2>Article draft</h2>
                <span class="spacer"></span>
                <span class="badge badge-brand"><?= number_format((int) $draftReport['words']) ?> words</span>
            </div>
            <div class="card-body">
                <p class="muted small" style="margin-top:0">
                    <?= $draftReport['mode'] === 'replace'
                        ? 'The introduction, sections and FAQ were replaced with a draft written from this calculator\'s own fields and formulas.'
                        : 'Empty parts were filled with a draft written from this calculator\'s own fields and formulas. Anything you had already written was left alone.' ?>
                    It is <strong>in the form, not in the database</strong> — read it, rewrite what does not
                    sound like you, then press <strong>Save changes</strong>.
                </p>
                <ul style="list-style:none;padding:0;margin:0">
                    <?php foreach ($draftReport['notes'] as $note): ?>
                        <li class="small" style="padding:2px 0"><?= admin_icon('info', 13) ?> <?= e($note) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($errors !== []): ?>
        <div class="card" style="margin-bottom:18px">
            <div class="card-body">
                <strong style="color:var(--err)">Not saved:</strong>
                <ul style="list-style:none;padding:0;margin:0" style="margin:8px 0 0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= admin_icon('warning', 14) ?> <?= e($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <div class="grid grid-sidebar">
        <div class="stack" style="gap:18px">

            <div class="tabs" data-tabs="cc-panels">
                <button type="button" data-tab="basics">Basics</button>
                <button type="button" data-tab="fields">Fields (<?= count($fieldRows) ?>)</button>
                <button type="button" data-tab="formulas">Formulas (<?= count($directionRows) ?>)</button>
                <button type="button" data-tab="article">Article</button>
                <button type="button" data-tab="seo">SEO</button>
                <button type="button" data-tab="advanced">Advanced</button>
            </div>

            <div id="cc-panels">
                <!-- --------------------------------------------------- basics -->
                <div data-tab-panel="basics" class="stack" style="gap:18px">
                    <div class="card">
                        <div class="card-head"><h2>Identity</h2></div>
                        <div class="card-body stack">
                            <div class="field">
                                <div class="label-row">
                                    <label for="name">Name</label>
                                    <span class="hint">Shown in cards, breadcrumbs and search results</span>
                                </div>
                                <input type="text" id="name" name="name" value="<?= e((string) $values['name']) ?>" maxlength="190"
                                       required data-slug-source data-slug-target="slug">
                            </div>

                            <div class="grid grid-2">
                                <div class="field">
                                    <div class="label-row">
                                        <label for="category_slug">Category</label>
                                        <span class="hint">Pick one, or type a new slug to create it</span>
                                    </div>
                                    <input type="text" id="category_slug" name="category_slug" list="category-list"
                                           value="<?= e((string) $values['category_slug']) ?>" maxlength="80"
                                           placeholder="social-media">
                                    <datalist id="category-list">
                                        <?php foreach ($categoryOptions as $slug => $label): ?>
                                            <option value="<?= e((string) $slug) ?>"><?= e((string) $label) ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                                <div class="field">
                                    <div class="label-row">
                                        <label for="slug">Slug</label>
                                        <span class="hint">Together they make the address</span>
                                    </div>
                                    <input type="text" id="slug" name="slug" value="<?= e((string) $values['slug']) ?>" maxlength="120"
                                           data-initial="<?= e((string) $values['slug']) ?>" required>
                                    <div class="hint">Address: <code><?= e($publicPath) ?></code></div>
                                </div>
                            </div>

                            <div class="field">
                                <div class="label-row">
                                    <label for="h1">Page heading</label>
                                    <span class="hint">Defaults to the name</span>
                                </div>
                                <input type="text" id="h1" name="h1" value="<?= e((string) $values['h1']) ?>" maxlength="190">
                            </div>

                            <div class="field">
                                <div class="label-row">
                                    <label for="summary">Introduction</label>
                                    <span class="hint">The first paragraph of the article</span>
                                </div>
                                <textarea id="summary" name="summary" rows="3"><?= e((string) $values['summary']) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head"><h2>Icon</h2></div>
                        <div class="card-body">
                            <div class="field" style="margin:0">
                                <input type="text" name="icon" value="<?= e((string) $values['icon']) ?>" placeholder="calculator" maxlength="80">
                                <div class="hint">
                                    The name of an icon from the site's set (<code>calculator</code>, <code>chart</code>,
                                    <code>users</code>, <code>star</code>…). Leave empty for the default calculator icon.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- --------------------------------------------------- fields -->
                <div data-tab-panel="fields" class="stack" style="gap:18px">
                    <div class="card">
                        <div class="card-head">
                            <h2>What the visitor types in</h2>
                            <span class="spacer"></span>
                            <span class="muted small">Every field becomes both an input and, if an equation targets it, an answer</span>
                        </div>
                        <div class="card-body">
                            <p class="muted small" style="margin-top:0">
                                The key is the variable name used in formulas (letters, digits, underscores).
                                Tick <em>answer</em> for anything the calculator works out; leave it clear for what the visitor fills in.
                            </p>

                            <div class="repeat" id="fields" data-repeat-next="<?= count($fieldRows) ?>">
                                <?php foreach ($fieldRows as $i => $field): ?>
                                    <?php $type = (string) ($field['type'] ?? 'number'); ?>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number>#<?= $i + 1 ?></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove field"><?= admin_icon('trash', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="grid grid-3">
                                                <div class="field" style="margin:0">
                                                    <label for="f<?= $i ?>-label">Label</label>
                                                    <input type="text" id="f<?= $i ?>-label" name="fields[<?= $i ?>][label]"
                                                           value="<?= e((string) ($field['label'] ?? '')) ?>" maxlength="120">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f<?= $i ?>-key">Key</label>
                                                    <input type="text" id="f<?= $i ?>-key" name="fields[<?= $i ?>][key]"
                                                           value="<?= e((string) ($field['key'] ?? '')) ?>" maxlength="60"
                                                           placeholder="likes" class="mono">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f<?= $i ?>-type">Type</label>
                                                    <select id="f<?= $i ?>-type" name="fields[<?= $i ?>][type]" data-field-type>
                                                        <?php foreach ($types as $value => $label): ?>
                                                            <option value="<?= e($value) ?>" <?= $type === $value ? 'selected' : '' ?>><?= e($label) ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="grid grid-3">
                                                <div class="field" style="margin:0">
                                                    <label for="f<?= $i ?>-default">Default value</label>
                                                    <input type="text" id="f<?= $i ?>-default" name="fields[<?= $i ?>][default]"
                                                           value="<?= e((string) ($field['default'] ?? '')) ?>" maxlength="60">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f<?= $i ?>-prefix">Prefix</label>
                                                    <input type="text" id="f<?= $i ?>-prefix" name="fields[<?= $i ?>][prefix]"
                                                           value="<?= e((string) ($field['prefix'] ?? '')) ?>" maxlength="12" placeholder="$">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f<?= $i ?>-suffix">Suffix</label>
                                                    <input type="text" id="f<?= $i ?>-suffix" name="fields[<?= $i ?>][suffix]"
                                                           value="<?= e((string) ($field['suffix'] ?? '')) ?>" maxlength="12" placeholder="%">
                                                </div>
                                            </div>

                                            <div class="grid grid-2" data-row-unit>
                                                <div class="field" style="margin:0">
                                                    <label for="f<?= $i ?>-ug">Unit group</label>
                                                    <input type="text" id="f<?= $i ?>-ug" name="fields[<?= $i ?>][unit_group]" list="unit-groups"
                                                           value="<?= e((string) ($field['unit_group'] ?? '')) ?>"
                                                           placeholder="leave empty for a plain number" class="mono">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f<?= $i ?>-ud">Default unit</label>
                                                    <input type="text" id="f<?= $i ?>-ud" name="fields[<?= $i ?>][unit_default]"
                                                           value="<?= e((string) ($field['unit_default'] ?? '')) ?>" maxlength="40" class="mono">
                                                </div>
                                            </div>

                                            <div class="field" style="margin:0" data-row-options>
                                                <label for="f<?= $i ?>-options">Options</label>
                                                <textarea id="f<?= $i ?>-options" name="fields[<?= $i ?>][options]" rows="3"
                                                          class="mono" placeholder="Option label|value"><?= e(\Omni\CustomCalc::optionsToText($field['options'] ?? '')) ?></textarea>
                                                <div class="hint">One per line, <code>Label|value</code>. The value is what formulas see.</div>
                                            </div>

                                            <div class="grid grid-2">
                                                <div class="field" style="margin:0">
                                                    <label for="f<?= $i ?>-help">Help text</label>
                                                    <input type="text" id="f<?= $i ?>-help" name="fields[<?= $i ?>][help]"
                                                           value="<?= e((string) ($field['help'] ?? '')) ?>" maxlength="190">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label>Role</label>
                                                    <label class="check">
                                                        <input type="checkbox" name="fields[<?= $i ?>][output]" value="1"
                                                            <?= !empty($field['output']) ? 'checked' : '' ?>>
                                                        <span>This is an answer (calculated, shown as a result)</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <template data-repeat-template>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove field"><?= admin_icon('trash', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="grid grid-3">
                                                <div class="field" style="margin:0">
                                                    <label for="f__INDEX__-label">Label</label>
                                                    <input type="text" id="f__INDEX__-label" name="fields[__INDEX__][label]" maxlength="120">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f__INDEX__-key">Key</label>
                                                    <input type="text" id="f__INDEX__-key" name="fields[__INDEX__][key]" maxlength="60" class="mono" placeholder="likes">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f__INDEX__-type">Type</label>
                                                    <select id="f__INDEX__-type" name="fields[__INDEX__][type]" data-field-type>
                                                        <?php foreach ($types as $value => $label): ?>
                                                            <option value="<?= e($value) ?>"><?= e($label) ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="grid grid-3">
                                                <div class="field" style="margin:0">
                                                    <label for="f__INDEX__-default">Default value</label>
                                                    <input type="text" id="f__INDEX__-default" name="fields[__INDEX__][default]" maxlength="60">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f__INDEX__-prefix">Prefix</label>
                                                    <input type="text" id="f__INDEX__-prefix" name="fields[__INDEX__][prefix]" maxlength="12" placeholder="$">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f__INDEX__-suffix">Suffix</label>
                                                    <input type="text" id="f__INDEX__-suffix" name="fields[__INDEX__][suffix]" maxlength="12" placeholder="%">
                                                </div>
                                            </div>
                                            <div class="grid grid-2" data-row-unit>
                                                <div class="field" style="margin:0">
                                                    <label for="f__INDEX__-ug">Unit group</label>
                                                    <input type="text" id="f__INDEX__-ug" name="fields[__INDEX__][unit_group]" list="unit-groups" class="mono">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="f__INDEX__-ud">Default unit</label>
                                                    <input type="text" id="f__INDEX__-ud" name="fields[__INDEX__][unit_default]" maxlength="40" class="mono">
                                                </div>
                                            </div>
                                            <div class="field" style="margin:0" data-row-options>
                                                <label for="f__INDEX__-options">Options</label>
                                                <textarea id="f__INDEX__-options" name="fields[__INDEX__][options]" rows="3" class="mono" placeholder="Option label|value"></textarea>
                                            </div>
                                            <div class="grid grid-2">
                                                <div class="field" style="margin:0">
                                                    <label for="f__INDEX__-help">Help text</label>
                                                    <input type="text" id="f__INDEX__-help" name="fields[__INDEX__][help]" maxlength="190">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label>Role</label>
                                                    <label class="check">
                                                        <input type="checkbox" name="fields[__INDEX__][output]" value="1">
                                                        <span>This is an answer (calculated, shown as a result)</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <button class="btn btn-sm" type="button" data-repeat-add="fields" style="margin-top:12px">
                                <?= admin_icon('plus', 14) ?> Add field
                            </button>

                            <datalist id="unit-groups">
                                <?php foreach ($unitGroups as $key => $group): ?>
                                    <option value="<?= e((string) $key) ?>"><?= e($unitLabel($group, (string) $key)) ?></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                    </div>
                </div>

                <!-- ------------------------------------------------- formulas -->
                <div data-tab-panel="formulas" class="stack" style="gap:18px">
                    <div class="card">
                        <div class="card-head">
                            <h2>How the answer is worked out</h2>
                            <span class="spacer"></span>
                            <span class="muted small">One row per direction</span>
                        </div>
                        <div class="card-body">
                            <p class="muted small" style="margin-top:0">
                                Each row says <em>“work out this field from these others”</em>. Rows that share a
                                <strong>formula family</strong> are the same equation rearranged — that is how a visitor can
                                fill in any one box and get the rest. Use the field keys exactly as written, with
                                <code>+ - * /</code>, <code>^</code>, and functions such as
                                <code>sqrt()</code>, <code>ln()</code>, <code>exp()</code>, <code>min()</code>, <code>max()</code>,
                                <code>abs()</code>, <code>round()</code>, <code>sin()</code>.
                            </p>

                            <div class="repeat" id="directions" data-repeat-next="<?= count($directionRows) ?>">
                                <?php foreach ($directionRows as $i => $direction): ?>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number>#<?= $i + 1 ?></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove row"><?= admin_icon('trash', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="grid-formula">
                                                <div class="field" style="margin:0">
                                                    <label for="d<?= $i ?>-group">Formula family</label>
                                                    <input type="text" id="d<?= $i ?>-group" name="directions[<?= $i ?>][group]" list="direction-groups"
                                                           value="<?= e((string) ($direction['group'] ?? '')) ?>" maxlength="120"
                                                           placeholder="Engagement rate">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="d<?= $i ?>-l">Work out</label>
                                                    <input type="text" id="d<?= $i ?>-l" name="directions[<?= $i ?>][l]" list="field-keys"
                                                           value="<?= e((string) ($direction['l'] ?? '')) ?>" maxlength="60"
                                                           class="mono" placeholder="engagement_rate">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="d<?= $i ?>-f">Expression</label>
                                                    <input type="text" id="d<?= $i ?>-f" name="directions[<?= $i ?>][f]"
                                                           value="<?= e((string) ($direction['f'] ?? '')) ?>" maxlength="500"
                                                           class="mono" placeholder="(likes+comments+shares)/followers*100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <template data-repeat-template>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove row"><?= admin_icon('trash', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="grid-formula">
                                                <div class="field" style="margin:0">
                                                    <label for="d__INDEX__-group">Formula family</label>
                                                    <input type="text" id="d__INDEX__-group" name="directions[__INDEX__][group]" list="direction-groups" maxlength="120">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="d__INDEX__-l">Work out</label>
                                                    <input type="text" id="d__INDEX__-l" name="directions[__INDEX__][l]" list="field-keys" maxlength="60" class="mono">
                                                </div>
                                                <div class="field" style="margin:0">
                                                    <label for="d__INDEX__-f">Expression</label>
                                                    <input type="text" id="d__INDEX__-f" name="directions[__INDEX__][f]" maxlength="500" class="mono">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <button class="btn btn-sm" type="button" data-repeat-add="directions" style="margin-top:12px">
                                <?= admin_icon('plus', 14) ?> Add direction
                            </button>

                            <datalist id="direction-groups">
                                <?php
                                $seenGroups = [];
                                foreach ($directionRows as $direction) {
                                    $family = trim((string) ($direction['group'] ?? ''));
                                    if ($family !== '' && !isset($seenGroups[$family])) {
                                        $seenGroups[$family] = true;
                                        echo '<option value="' . e($family) . '"></option>';
                                    }
                                }
                                ?>
                            </datalist>
                            <datalist id="field-keys">
                                <?php foreach ($fieldRows as $field): ?>
                                    <?php if ((string) ($field['key'] ?? '') !== ''): ?>
                                        <option value="<?= e((string) $field['key']) ?>"><?= e((string) ($field['label'] ?? '')) ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                    </div>
                </div>

                <!-- -------------------------------------------------- article -->
                <div data-tab-panel="article" class="stack" style="gap:18px">
                    <div class="card">
                        <div class="card-head">
                            <h2>Sections</h2>
                            <span class="spacer"></span>
                            <span class="muted small">Each one becomes an H2 and a table-of-contents entry</span>
                        </div>
                        <div class="card-body">
                            <div class="repeat" id="sections" data-repeat-next="<?= count($sections) ?>">
                                <?php foreach ($sections as $i => $section): ?>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number>#<?= $i + 1 ?></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove section"><?= admin_icon('trash', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="field" style="margin:0">
                                                <label for="s<?= $i ?>-title">Heading</label>
                                                <input type="text" id="s<?= $i ?>-title" name="sections[<?= $i ?>][title]"
                                                       value="<?= e((string) ($section['title'] ?? '')) ?>" maxlength="190">
                                            </div>
                                            <div class="field" style="margin:0">
                                                <label for="s<?= $i ?>-html">Body</label>
                                                <textarea id="s<?= $i ?>-html" name="sections[<?= $i ?>][html]" rows="6"><?= e((string) ($section['html'] ?? '')) ?></textarea>
                                                <div class="hint">Plain HTML: <code>&lt;p&gt;</code>, <code>&lt;ul&gt;</code>, <code>&lt;strong&gt;</code>, <code>&lt;a href&gt;</code>.</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <template data-repeat-template>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove section"><?= admin_icon('trash', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="field" style="margin:0">
                                                <label for="s__INDEX__-title">Heading</label>
                                                <input type="text" id="s__INDEX__-title" name="sections[__INDEX__][title]" maxlength="190">
                                            </div>
                                            <div class="field" style="margin:0">
                                                <label for="s__INDEX__-html">Body</label>
                                                <textarea id="s__INDEX__-html" name="sections[__INDEX__][html]" rows="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <button class="btn btn-sm" type="button" data-repeat-add="sections" style="margin-top:12px">
                                <?= admin_icon('plus', 14) ?> Add section
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>FAQ</h2>
                            <span class="spacer"></span>
                            <span class="muted small">Becomes FAQ structured data for search results</span>
                        </div>
                        <div class="card-body">
                            <div class="repeat" id="faq" data-repeat-next="<?= count($faqs) ?>">
                                <?php foreach ($faqs as $i => $pair): ?>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number>#<?= $i + 1 ?></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove question"><?= admin_icon('trash', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="field" style="margin:0">
                                                <label for="q<?= $i ?>">Question</label>
                                                <input type="text" id="q<?= $i ?>" name="faq[<?= $i ?>][q]" value="<?= e((string) ($pair['q'] ?? '')) ?>" maxlength="190">
                                            </div>
                                            <div class="field" style="margin:0">
                                                <label for="a<?= $i ?>">Answer</label>
                                                <textarea id="a<?= $i ?>" name="faq[<?= $i ?>][a]" rows="3"><?= e((string) ($pair['a'] ?? '')) ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <template data-repeat-template>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove question"><?= admin_icon('trash', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="field" style="margin:0">
                                                <label for="q__INDEX__">Question</label>
                                                <input type="text" id="q__INDEX__" name="faq[__INDEX__][q]" maxlength="190">
                                            </div>
                                            <div class="field" style="margin:0">
                                                <label for="a__INDEX__">Answer</label>
                                                <textarea id="a__INDEX__" name="faq[__INDEX__][a]" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <button class="btn btn-sm" type="button" data-repeat-add="faq" style="margin-top:12px">
                                <?= admin_icon('plus', 14) ?> Add question
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ------------------------------------------------------ seo -->
                <div data-tab-panel="seo" class="stack" style="gap:18px">
                    <div class="card">
                        <div class="card-head"><h2>Search engine listing</h2></div>
                        <div class="card-body stack">
                            <div class="field">
                                <div class="label-row">
                                    <label for="meta_title">Title tag</label>
                                    <span class="hint">Aim for 50–60 characters</span>
                                </div>
                                <input type="text" id="meta_title" name="meta_title" value="<?= e((string) $values['meta_title']) ?>" maxlength="190">
                            </div>
                            <div class="field">
                                <div class="label-row">
                                    <label for="meta_description">Meta description</label>
                                    <span class="hint">Aim for 120–160 characters</span>
                                </div>
                                <textarea id="meta_description" name="meta_description" rows="3" maxlength="320"><?= e((string) $values['meta_description']) ?></textarea>
                            </div>
                            <div class="field" style="margin:0">
                                <label class="check">
                                    <input type="checkbox" name="noindex" value="1" <?= !empty($values['noindex']) ? 'checked' : '' ?>>
                                    <span>Keep this page out of search engines (it stays live, but adds a noindex tag and drops out of the sitemap)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ------------------------------------------------- advanced -->
                <div data-tab-panel="advanced" class="stack" style="gap:18px">
                    <div class="card">
                        <div class="card-head"><h2>Optional page script</h2></div>
                        <div class="card-body">
                            <div class="field" style="margin:0">
                                <textarea name="js" rows="8" class="mono" placeholder="// runs on the calculator page inside a try/catch"><?= e((string) $values['js']) ?></textarea>
                                <div class="hint">
                                    Only needed when a calculation cannot be expressed as a formula (a date picker, a table
                                    lookup). The formulas above already run in the browser and on the server; leave this empty otherwise.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ------------------------------------------------------- sidebar -->
        <div class="stack" style="gap:18px">
            <div class="card">
                <div class="card-head"><h2>Publish</h2></div>
                <div class="card-body stack">
                    <div class="field" style="margin:0">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <?php foreach (['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived'] as $value => $label): ?>
                                <option value="<?= $value ?>" <?= (string) $values['status'] === $value ? 'selected' : '' ?>><?= $label ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="field" style="margin:0">
                        <label for="sort_order">Sort order</label>
                        <input id="sort_order" name="sort_order" type="number" step="10" value="<?= (int) $values['sort_order'] ?>">
                    </div>
                    <div class="field" style="margin:0">
                        <label class="check">
                            <input type="checkbox" name="is_featured" value="1" <?= !empty($values['is_featured']) ? 'checked' : '' ?>>
                            <span>Feature on the homepage</span>
                        </label>
                    </div>

                    <div class="stack" style="gap:8px;margin-top:4px">
                        <button class="btn btn-primary" type="submit" name="do" value="save" style="width:100%">
                            <?= admin_icon('check', 14) ?> <?= $isNew ? 'Create calculator' : 'Save changes' ?>
                        </button>
                        <button class="btn" type="submit" name="do" value="test" style="width:100%">
                            <?= admin_icon('chart', 14) ?> Test the formulas
                        </button>
                        <button class="btn" type="submit" name="do" value="draft" style="width:100%"
                                formnovalidate>
                            <?= admin_icon('blog', 14) ?> Draft the article
                        </button>
                        <label class="check small" style="margin-top:2px">
                            <input type="checkbox" name="replace_text" value="1">
                            <span>Replace the existing article instead of only filling the empty parts</span>
                        </label>
                    </div>

                    <div class="muted small">
                        <?php if ($publicUrl !== null): ?>
                            Live at <a href="<?= e($publicUrl) ?>" target="_blank" rel="noopener"><?= e($publicUrl) ?></a>
                        <?php elseif ($previewUrl !== null): ?>
                            Not live yet. <a href="<?= e($previewUrl) ?>" target="_blank" rel="noopener">Open a signed preview</a>.
                        <?php else: ?>
                            Save once to get a preview link.
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if ($versions !== []): ?>
                <div class="card">
                    <div class="card-head"><h2>History</h2></div>
                    <div class="card-body">
                        <ul style="list-style:none;padding:0;margin:0">
                            <?php foreach ($versions as $version): ?>
                                <li style="display:flex;align-items:center;gap:8px;padding:6px 0;border-bottom:1px solid var(--border)">
                                    <span class="muted small" style="flex:1">
                                        v<?= (int) $version['version'] ?> · <?= e((string) $version['note']) ?><br>
                                        <span class="muted"><?= e((string) $version['created_at']) ?></span>
                                    </span>
                                    <button class="btn btn-sm btn-ghost" type="submit" name="do" value="restore"
                                            formnovalidate
                                            onclick="this.form.querySelector('#restore-version').value='<?= (int) $version['id'] ?>'"
                                            title="Restore this version">
                                        <?= admin_icon('clock', 14) ?>
                                    </button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <input type="hidden" name="version_id" id="restore-version" value="">
                        <div class="hint" style="margin-top:8px">Restoring keeps the current state as a new version first.</div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>

<script>
(function () {
    'use strict';

    /* show only the sub-rows that matter for the chosen field type */
    function syncRow(item) {
        var type = item.querySelector('[data-field-type]');
        if (!type) { return; }
        var unit = item.querySelector('[data-row-unit]');
        var options = item.querySelector('[data-row-options]');
        var isUnit = type.value === 'number_unit';
        var isList = type.value === 'select';
        if (unit) { unit.hidden = !isUnit; }
        if (options) { options.hidden = !isList; }
    }

    document.addEventListener('change', function (ev) {
        if (!ev.target.matches('[data-field-type]')) { return; }
        var item = ev.target.closest('.repeat-item');
        if (item) { syncRow(item); }
    });

    document.addEventListener('click', function (ev) {
        if (!ev.target.closest('[data-repeat-add]')) { return; }
        var wrap = document.getElementById(ev.target.closest('[data-repeat-add]').getAttribute('data-repeat-add'));
        if (!wrap) { return; }
        // the row was appended by admin.js after this handler ran, so wait a tick
        setTimeout(function () {
            var last = wrap.querySelectorAll('.repeat-item');
            if (last.length) { syncRow(last[last.length - 1]); }
        }, 0);
    }, true);

    document.querySelectorAll('.repeat-item').forEach(syncRow);

    /* after a save or a Test the URL may not carry the tab — restore it so the
       panel reopens where the editor was working */
    var tabField = document.getElementById('tab-field');
    if (tabField && tabField.value) {
        var current = new URL(window.location.href);
        if (current.searchParams.get('tab') !== tabField.value) {
            current.searchParams.set('tab', tabField.value);
            history.replaceState({}, '', current);
        }
    }
    document.querySelectorAll('[data-tab]').forEach(function (button) {
        button.addEventListener('click', function () {
            if (tabField) { tabField.value = button.getAttribute('data-tab'); }
        });
    });
})();
</script>
