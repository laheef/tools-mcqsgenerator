<?php
/**
 * Relative strength index — Wilder's momentum gauge from a run of prices.
 *
 * The page listed fifty-one price boxes (p1 … p51) and a period, but had no
 * form and no script, so it said "nothing to calculate here". The repair places
 * the boxes it needs, works out the average gain and loss over the period —
 * Wilder's smoothing after the first average — and returns the index:
 *
 *   RS  = average gain ÷ average loss
 *   RSI = 100 − 100 ÷ (1 + RS)
 *
 * Only period + 1 prices are ever needed: n changes make the first average.
 */
require_once __DIR__ . '/_builder.php';

$vars = ['period' => ['type' => 'numerical']];
$inputs = [sup_field(sup_num('period', 'Period (usually 14 days)'))];
$show = [];

for ($i = 1; $i <= 30; $i++) {
    $vars['p' . $i] = ['type' => 'numerical'];
    $inputs[] = sup_field(sup_num('p' . $i, 'Price ' . $i));
    /* the first price is always needed; the rest only once the period reaches them */
    if ($i > 1) {
        $show['p' . $i] = 'period >= ' . ($i - 1);
    }
}

$remove = [];
for ($i = 31; $i <= 52; $i++) {
    $remove[] = 'p' . $i;
}

return [
    'hideTexts' => true,
    'remove' => $remove,
    'vars' => $vars + [
        'rsi_value' => sup_dep('2'),
        'rsi_gain' => sup_dep('4'),
        'rsi_loss' => sup_dep('4'),
        'rsi_rs' => sup_dep('3'),
        'rsi_signal' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-rsi-period', 'The period', $inputs),
        sup_group('supp-rsi-results', 'Results', [
            sup_field(sup_out('rsi_value', 'Relative strength index (0 to 100)')),
            sup_field(sup_out('rsi_gain', 'Average gain over the period')),
            sup_field(sup_out('rsi_loss', 'Average loss over the period')),
            sup_field(sup_out('rsi_rs', 'Relative strength (gain ÷ loss)')),
            sup_field(sup_out('rsi_signal', 'Signal (1 = overbought, −1 = oversold, 0 = neither)')),
        ]),
    ],
    'showIf' => $show,
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['period'], function (ctx, v) {
  var period = num('period');

  if (period === null || period < 1) {
    ctx.addUnmetCondition('Enter the period — 14 is the usual choice.');
    return;
  }
  if (period > 29) {
    ctx.addUnmetCondition('The form holds 30 prices, so the period can be at most 29.');
    return;
  }

  var prices = [], i;
  for (i = 1; i <= period + 1; i++) {
    var p = num('p' + i);
    if (p === null) {
      ctx.addUnmetCondition('Enter price ' + i + ' — a period of ' + period
        + ' needs ' + (period + 1) + ' prices.');
      return;
    }
    prices.push(p);
  }

  var gains = 0, losses = 0, rows = [], changes = [];
  for (i = 1; i < prices.length; i++) {
    var change = prices[i] - prices[i - 1];
    changes.push(change);
    if (change > 0) { gains += change; } else { losses -= change; }
    rows.push(['Price ' + (i + 1), snum(prices[i], 4), snum(change, 4)]);
  }
  var avgGain = gains / period;
  var avgLoss = losses / period;

  /* Wilder's smoothing, change by change past the first period */
  for (i = period; i < changes.length; i++) {
    var g = changes[i] > 0 ? changes[i] : 0;
    var l = changes[i] < 0 ? -changes[i] : 0;
    avgGain = (avgGain * (period - 1) + g) / period;
    avgLoss = (avgLoss * (period - 1) + l) / period;
  }

  var rs = avgLoss === 0 ? Infinity : avgGain / avgLoss;
  var rsi = avgLoss === 0 ? 100 : 100 - 100 / (1 + rs);
  var signal = rsi >= 70 ? 1 : (rsi <= 30 ? -1 : 0);

  ctx.exportValue('rsi_value', sround(rsi, 2));
  ctx.exportValue('rsi_gain', sround(avgGain, 4));
  ctx.exportValue('rsi_loss', sround(avgLoss, 4));
  ctx.exportValue('rsi_rs', sround(rs === Infinity ? 0 : rs, 3));
  ctx.exportValue('rsi_signal', signal);

  var verdict = signal === 1 ? 'above 70 — usually read as overbought'
    : signal === -1 ? 'below 30 — usually read as oversold'
    : 'between 30 and 70 — no overbought or oversold reading';

  ctx.addHtml('<p><strong>An RSI of ' + snum(rsi, 2) + ' over ' + period + ' periods: ' + verdict
    + '.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Period', String(period)],
    ['Prices used', String(prices.length)],
    ['First price', snum(prices[0], 4)],
    ['Last price', snum(prices[prices.length - 1], 4)],
    ['Net change', snum(prices[prices.length - 1] - prices[0], 4)],
    ['Average gain', snum(avgGain, 4)],
    ['Average loss', snum(avgLoss, 4)],
    ['Relative strength', avgLoss === 0 ? 'infinite (no losing periods)' : snum(rs, 3)],
    ['RSI', snum(rsi, 2)],
    ['Reading', verdict]
  ]));

  ctx.addHtml('<p>The prices you entered, and the change each one made:</p>');
  ctx.addHtml(stable(['Price', 'Value', 'Change'], rows));

  ctx.addHtml('<p class="calc-unmet">The index measures the size of recent gains against recent losses, '
    + 'not the price itself: a stock that has risen steadily from a low base and one that has fallen '
    + 'steadily from a high one can both sit in the middle of the scale. The first average is a plain '
    + 'mean of the period’s changes; every later change is folded in with Wilder’s smoothing, which '
    + 'gives the newest change a 1/period weight and keeps the rest — that is the original 1978 recipe '
    + 'and the one most charting software draws. A period of 14 is convention; 7 reacts faster and 21 '
    + 'slower. Do not read 70 and 30 as buy and sell instructions: in a strong trend the index can sit '
    + 'above 70 for weeks, and it says nothing about when a move will end. Prices must be in the same '
    + 'series and in time order.</p>');
});
JS,
];
