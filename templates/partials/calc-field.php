<?php
/**
 * One widget field: number input with unit chip, radio group, formula line or
 * figure. Keeping this in a partial keeps the calculator template readable.
 *
 * @var array $field
 */

declare(strict_types=1);

use Onim\View;

$f = $field;
$id = 'f-' . preg_replace('/[^A-Za-z0-9_-]/', '-', (string) ($f['name'] ?? 'field'));
?>
<?php if (($f['kind'] ?? '') === 'number'): ?>
    <div class="calc-field" data-field data-var="<?= View::escape($f['name']) ?>"<?= !empty($f['declaredOutput']) ? ' data-output="1"' : '' ?>>
        <?php if ($f['label'] !== ''): ?>
            <label class="calc-label" for="<?= View::escape($id) ?>"><?= View::escape($f['label']) ?></label>
        <?php endif; ?>

        <?php $len = mb_strlen((string) $f['value']); ?>
        <div class="calc-input-wrap<?= $f['computed'] ? ' is-computed' : '' ?>">
            <?php if ($f['prefix'] !== ''): ?>
                <span class="calc-affix calc-affix--prefix" aria-hidden="true"><?= View::escape($f['prefix']) ?></span>
            <?php endif; ?>

            <input
                class="calc-input<?= $len > 8 && $len <= 11 ? ' calc-input--long' : ($len > 11 ? ' calc-input--longer' : '') ?>"
                id="<?= View::escape($id) ?>"
                type="text"
                inputmode="decimal"
                autocomplete="off"
                spellcheck="false"
                data-var="<?= View::escape($f['name']) ?>"
                <?= !empty($f['integer']) ? 'data-integer="1" inputmode="numeric" step="1"' : '' ?>
                data-unit-key="<?= View::escape((string) ($f['unitKey'] ?? '')) ?>"
                data-unit="<?= View::escape((string) ($f['unit'] ?? '')) ?>"
                value="<?= View::escape($f['value']) ?>"
                aria-label="<?= View::escape($f['label'] !== '' ? $f['label'] : $f['name']) ?>"
                <?= !empty($f['range']) ? 'data-range-min="' . View::escape((string) $f['range']['min']) . '" data-range-max="' . View::escape((string) $f['range']['max']) . '" data-range-why="' . View::escape((string) $f['range']['text']) . '"' . (!empty($f['range']['factors']) ? ' data-range-factors="' . View::escape(json_encode($f['range']['factors'])) . '"' : '') : '' ?>
                <?= $f['outputOnly'] ? 'readonly' : '' ?>
            >

            <?php if (!empty($f['units'])): ?>
                <label class="sr-only" for="<?= View::escape($id) ?>-unit">Unit for <?= View::escape($f['label'] !== '' ? $f['label'] : $f['name']) ?></label>
                <select class="calc-unit" id="<?= View::escape($id) ?>-unit" data-unit-select="<?= View::escape($f['name']) ?>"
                        aria-label="Unit for <?= View::escape($f['label'] !== '' ? $f['label'] : $f['name']) ?>">
                    <?php foreach ($f['units'] as $u): ?>
                        <option value="<?= View::escape($u['slug']) ?>" title="<?= View::escape($u['title']) ?>"
                            <?= $u['slug'] === $f['unit'] ? 'selected' : '' ?>><?= View::escape($u['label']) ?></option>
                    <?php endforeach; ?>
                </select>
            <?php elseif ($f['suffix'] !== ''): ?>
                <span class="calc-affix"><?= View::escape($f['suffix']) ?></span>
            <?php endif; ?>
        </div>

        <?php if ($f['help'] !== ''): ?>
            <p class="calc-help"><?= View::escape($f['help']) ?></p>
        <?php endif; ?>
    </div>

<?php elseif (in_array(($f['kind'] ?? ''), ['date', 'time', 'datetime'], true)): ?>
    <?php
    $inputType = ['date' => 'date', 'time' => 'time', 'datetime' => 'datetime-local'][$f['kind']];
    ?>
    <div class="calc-field" data-field data-var="<?= View::escape($f['name']) ?>">
        <?php if ($f['label'] !== ''): ?>
            <label class="calc-label" for="<?= View::escape($id) ?>"><?= View::escape($f['label']) ?></label>
        <?php endif; ?>
        <div class="calc-input-wrap<?= $f['computed'] ? ' is-computed' : '' ?>">
            <input
                class="calc-input calc-input--date"
                id="<?= View::escape($id) ?>"
                type="<?= View::escape($inputType) ?>"
                data-var="<?= View::escape($f['name']) ?>"
                data-datetype="<?= View::escape($f['kind']) ?>"
                value="<?= View::escape($f['value']) ?>"
                aria-label="<?= View::escape($f['label'] !== '' ? $f['label'] : $f['name']) ?>"
                <?= $f['computed'] ? 'readonly' : '' ?>
            >
        </div>
        <?php if ($f['help'] !== ''): ?>
            <p class="calc-help"><?= View::escape($f['help']) ?></p>
        <?php endif; ?>
    </div>

<?php elseif (($f['kind'] ?? '') === 'checkbox'): ?>
    <div class="calc-field calc-field--check" data-field data-var="<?= View::escape($f['name']) ?>">
        <?php if ($f['label'] !== ''): ?>
            <p class="calc-label"><?= View::escape($f['label']) ?></p>
        <?php endif; ?>
        <label class="calc-check">
            <input type="checkbox" data-var-check="<?= View::escape($f['name']) ?>"
                value="<?= View::escape($f['onUid']) ?>"
                data-off="<?= View::escape($f['offUid']) ?>"
                <?= $f['checked'] ? 'checked' : '' ?>>
            <span><?= View::escape($f['optionLabel']) ?></span>
        </label>
        <?php if ($f['help'] !== ''): ?>
            <p class="calc-help"><?= View::escape($f['help']) ?></p>
        <?php endif; ?>
    </div>

<?php elseif (($f['kind'] ?? '') === 'select'): ?>
    <fieldset class="calc-field calc-field--choice" data-field data-choice="1" data-var="<?= View::escape($f['name']) ?>">
        <?php if ($f['label'] !== ''): ?>
            <legend class="calc-label"><?= View::escape($f['label']) ?></legend>
        <?php endif; ?>
        <?php if (count($f['options']) > 6): ?>
            <select class="calc-select" data-var="<?= View::escape($f['name']) ?>"
                aria-label="<?= View::escape($f['label'] !== '' ? $f['label'] : $f['name']) ?>">
                <?php /* Nothing is chosen until the visitor chooses it. Without this
                         row a <select> shows its first option, which is a default
                         value the page never declared and cannot clear. */ ?>
                <?php if (($f['value'] ?? null) === null || $f['value'] === ''): ?>
                    <option value="" disabled selected>Choose…</option>
                <?php endif; ?>
                <?php foreach ($f['options'] as $opt): ?>
                    <option value="<?= View::escape($opt['uid']) ?>"
                        <?= $opt['uid'] === $f['value'] ? 'selected' : '' ?>><?= View::escape(Onim\Widget::cleanText((string) $opt['label'])) ?></option>
                <?php endforeach; ?>
            </select>
        <?php else: ?>
            <div class="calc-radios">
                <?php foreach ($f['options'] as $opt): ?>
                    <label class="calc-radio">
                        <input type="radio" name="<?= View::escape($f['name']) ?>" value="<?= View::escape($opt['uid']) ?>"
                            <?= $opt['uid'] === $f['value'] ? 'checked' : '' ?>>
                        <span><?= View::escape(Onim\Widget::cleanText((string) $opt['label'])) ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if ($f['help'] !== ''): ?>
            <p class="calc-help"><?= View::escape($f['help']) ?></p>
        <?php endif; ?>
    </fieldset>

<?php elseif (($f['kind'] ?? '') === 'textbox'): ?>
    <?php /* A sequence box: monospace, multi-line, and marked data-datetype="text"
             so the numeric key handler leaves its contents alone. */ ?>
    <div class="calc-field calc-field--textbox" data-field data-var="<?= View::escape($f['name']) ?>">
        <?php if ($f['label'] !== ''): ?>
            <label class="calc-label" for="<?= View::escape($id) ?>"><?= View::escape($f['label']) ?></label>
        <?php endif; ?>
        <textarea
            class="calc-textarea"
            id="<?= View::escape($id) ?>"
            rows="4"
            autocomplete="off"
            spellcheck="false"
            autocapitalize="off"
            data-var="<?= View::escape($f['name']) ?>"
            data-datetype="text"
            aria-label="<?= View::escape($f['label'] !== '' ? $f['label'] : $f['name']) ?>"
        ><?= View::escape((string) $f['value']) ?></textarea>
        <?php if ($f['help'] !== ''): ?>
            <p class="calc-help"><?= View::escape($f['help']) ?></p>
        <?php endif; ?>
    </div>

<?php elseif (($f['kind'] ?? '') === 'text'): ?>
    <?php
    $textClass = empty($f['block']) ? 'calc-formula' : 'calc-note';
    if (!empty($f['block']) && !empty($f['feedback'])) {
        $textClass .= ' calc-note--feedback';
    }
    ?>
    <div class="<?= $textClass ?>" data-formula-index="<?= (int) ($f['index'] ?? 0) ?>"
         <?php if (!empty($f['feedback'])): ?>data-feedback="1"<?php endif; ?>><?= $f['html'] ?></div>

<?php elseif (($f['kind'] ?? '') === 'image'): ?>
    <figure class="calc-figure">
        <?php $dims = View::imageSize((string) $f['src']); ?>
        <img src="<?= View::escape($f['src']) ?>" alt="<?= View::escape($f['alt']) ?>"
             <?php if ($dims !== null): ?>width="<?= $dims[0] ?>" height="<?= $dims[1] ?>"<?php endif; ?>
             loading="lazy" decoding="async">
        <?php if ($f['caption'] !== ''): ?>
            <figcaption><?= View::escape($f['caption']) ?></figcaption>
        <?php endif; ?>
    </figure>
<?php endif; ?>
