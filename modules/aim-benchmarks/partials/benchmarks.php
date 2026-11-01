<?php
/**
 * Aim benchmarks — module partial.
 *
 * Included by templates/calculator.php inside the calculator card, so every
 * variable the template has is in scope here. This one uses:
 *
 *   $calc     the calculator definition
 *   $inputs   the values read from the query string (empty on a first visit)
 *   $solver   the Solver that already ran for this request
 *
 * It reads the headshot percentage the visitor entered or the calculator solved,
 * then says which band that falls into. When the solver has nothing yet it uses
 * the definition's default, so the strip is never empty.
 *
 * Included as PHP, not as a template with a sandbox: a module is a deploy-time
 * artefact like a template file, and it is expected to use the site's own
 * helpers (Format, View) rather than to be safe for untrusted authors.
 */

declare(strict_types=1);

// A partial must not run on its own.
if (!defined('ONIM_PANEL') && !isset($calc)) {
    return;
}

use Onim\Format;
use Onim\View;

/* Which value does the page have right now? Query input first, then the solver,
   then the definition's default. */
$percent = null;
foreach (['hs_percent'] as $name) {
    if (isset($inputs[$name]) && is_numeric($inputs[$name])) {
        $percent = (float) $inputs[$name];
        break;
    }
}
if ($percent === null && isset($solver) && method_exists($solver, 'value')) {
    $value = $solver->value('hs_percent');
    $percent = $value === null ? null : (float) $value;
}
if ($percent === null) {
    // the definition's default, read the same way the engine reads it
    $defaults = $calc['variables']['hs_percent']['defaults'] ?? [];
    foreach ($defaults as $default) {
        if (isset($default['value']) && is_numeric($default['value'])) {
            $percent = (float) $default['value'];
            break;
        }
    }
}

$bands = [
    ['label' => 'Still building the habit', 'from' => 0,  'to' => 15, 'note' => 'Crosshair at chest height, wide swings, and a spray that starts too early are the usual causes.'],
    ['label' => 'Average',                  'from' => 15, 'to' => 22, 'note' => 'Most players plateau here. Holding angles and resetting the crosshair after each kill moves it.'],
    ['label' => 'Comfortably above average', 'from' => 22, 'to' => 30, 'note' => 'Enough that weapon choice starts to explain the swings more than aim does.'],
    ['label' => 'Strong',                   'from' => 30, 'to' => 100, 'note' => 'Above the level comparison tables usually report; look at headshot rate by weapon instead of overall.'],
];

$band = null;
if ($percent !== null) {
    foreach ($bands as $candidate) {
        if ($percent >= $candidate['from'] && $percent < $candidate['to']) {
            $band = $candidate;
            break;
        }
    }
    if ($band === null) {
        $band = $bands[count($bands) - 1];
    }
}

$shown = $percent === null ? null : Format::number($percent, '0.1');
?>
<div class="module-panel" role="region" aria-label="Aim benchmarks">
    <style>
        .module-panel { margin-top: 14px; border: 1px solid #e2e6ec; border-radius: 12px; padding: 14px 16px; background: #f8fafc; }
        .module-panel h3 { margin: 0 0 6px; font-size: 15px; color: #131a24; }
        .module-panel p { margin: 0; font-size: 14px; line-height: 1.55; color: #445161; }
        .module-bands { display: flex; gap: 6px; margin: 12px 0 10px; }
        .module-band { flex: 1; text-align: center; font-size: 11.5px; font-weight: 700; letter-spacing: .02em;
                       padding: 6px 4px; border-radius: 8px; background: #eef1f5; color: #5b6b82; }
        .module-band b { display: block; font-size: 12.5px; color: #131a24; }
        .module-band.is-now { background: #1a63d0; color: #f2f7ff; }
        .module-band.is-now b { color: #fff; }
    </style>

    <h3>Where <?= $shown === null ? 'this percentage' : $shown . '%' ?> sits</h3>

    <div class="module-bands">
        <?php foreach ($bands as $candidate): ?>
            <div class="module-band<?= $band !== null && $candidate === $band ? ' is-now' : '' ?>">
                <?= View::escape($candidate['label']) ?>
                <b><?= $candidate['from'] ?>–<?= $candidate['to'] === 100 ? '+' : $candidate['to'] ?>%</b>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($band !== null): ?>
        <p><?= View::escape($band['note']) ?></p>
    <?php else: ?>
        <p>Fill in your kills and headshots above to see which band you are in.</p>
    <?php endif; ?>
</div>
