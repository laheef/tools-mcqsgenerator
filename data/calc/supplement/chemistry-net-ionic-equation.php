<?php
/**
 * Net ionic equation — the equation with the spectators taken out.
 *
 * The page's script does the whole job: it balances the formula, expands the
 * soluble salts into ions, cancels the ions that appear on both sides and
 * prints the net ionic equation. It published all of that under names the
 * definition does not declare, and both equation boxes were typed as numbers,
 * so nothing could be typed into them at all.
 *
 * The repair makes the two boxes text boxes, declares the three equations, and
 * asks for the state symbols the cancellation depends on: without (aq) and (s)
 * the script has no way to know which product comes out of solution.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'lhs' => ['type' => 'text'],
        'rhs' => ['type' => 'text'],
    ],
    'outputs' => [
        'finalEquation'         => ['label' => 'Balanced equation'],
        'completeIonicEquation' => ['label' => 'Complete ionic equation'],
        'netIonicEquation'      => ['label' => 'Net ionic equation'],
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, values) {
  var lhs = String(ctx.getRawInput('lhs') || '').trim();
  var rhs = String(ctx.getRawInput('rhs') || '').trim();
  if (!lhs || !rhs) {
    ['finalEquation', 'completeIonicEquation', 'netIonicEquation'].forEach(function (n) {
      ctx.exportValue(n, null);
    });
    ctx.addUnmetCondition('Write both sides of the reaction, with the state of each substance: '
      + 'AgNO3(aq) + NaCl(aq) on the left, AgCl(s) + NaNO3(aq) on the right.');
    return;
  }
  var net = sclean(sdelabel(String(values.netIonicEquation || '')));
  var complete = sclean(sdelabel(String(values.completeIonicEquation || '')));
  var finalEq = sclean(sdelabel(String(values.finalEquation || '')));

  if (!net || net.replace(/[^A-Za-z0-9]/g, '') === '') {
    ctx.exportValue('netIonicEquation', null);
    ctx.addUnmetCondition('Nothing cancelled, so there is no net ionic equation for this pair. That is the '
      + 'right answer when no product leaves the solution — check the state symbols: only an (s), (l) or (g) '
      + 'product is written whole on the right.');
  } else {
    ctx.exportValue('netIonicEquation', net);
  }
  /* the page published these two with its own markup; write the tidied copy back */
  if (finalEq) { ctx.exportValue('finalEquation', finalEq); }
  if (complete) { ctx.exportValue('completeIonicEquation', complete); }

  ctx.addHtml('<p><strong>' + sesc(net || 'nothing left after cancelling') + '</strong></p>');
  ctx.addHtml(stable(['Equation', 'Written as'], [
    ['Balanced', finalEq || '—'],
    ['Complete ionic', complete || '—'],
    ['Net ionic', net || '—']
  ]));
  ctx.addHtml('<p class="calc-note">A complete ionic equation writes every strong electrolyte as its ions; '
    + 'the net ionic equation keeps only the species that actually change, so the ions that appear on both '
    + 'sides — the spectators — are crossed out. The state symbols are what make that possible: AgCl(s) stays '
    + 'whole on the right, while NaNO₃(aq) splits, which is why silver chloride precipitates and sodium nitrate '
    + 'does not. Weaker electrolytes and gases are written as molecules. Charges must balance as well as atoms, '
    + 'so a net ionic equation is worth checking by adding up the charges on each side.</p>');
});
JS,
];
