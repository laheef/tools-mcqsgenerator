<?php
/**
 * Internal rate of return — the rate that discounts the cash flows to zero.
 *
 * The script bisected for the rate correctly and published it as `irr`, which
 * the definition does not declare; the number was computed and dropped and the
 * panel stayed empty. When no rate exists it published the "not calculable"
 * message instead, through the same missing name.
 *
 * The repair declares `irr` and adds a short reading of the cash flows: what
 * goes out, what comes back, and the payback.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'irr'            => ['label' => 'Internal rate of return, % per year', 'precision' => '4'],
        'total_outflow'  => ['label' => 'Money invested (year 0)', 'precision' => '2'],
        'total_inflow'   => ['label' => 'Money returned', 'precision' => '2'],
        'net_gain'       => ['label' => 'Net gain', 'precision' => '2'],
    ],
    'js' => <<<'JS'
function irrFlow(name) {
  var el = document.querySelector('.calc-widget input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(String(el.value).trim());
  return isFinite(n) ? n : null;
}

omni.onResult(['c_0'], function (ctx, values) {
  /* the rate the page's own bisection found */
  var rate = typeof values.irr === 'number' ? values.irr : Number(values.irr);
  var out = irrFlow('c_0') || 0;
  var inflow = 0, count = 0;
  for (var i = 1; i <= 30; i++) {
    var v = irrFlow('c_' + i);
    if (v !== null && v > 0) { inflow += v; count++; }
  }
  var paid = Math.abs(out);
  ctx.exportValue('total_outflow', paid > 0 ? sround(paid, 2) : null);
  ctx.exportValue('total_inflow', inflow > 0 ? sround(inflow, 2) : null);
  ctx.exportValue('net_gain', inflow > 0 ? sround(inflow - paid, 2) : null);

  if (!isFinite(rate)) {
    ctx.exportValue('irr', null);
    if (paid > 0 || inflow > 0) {
      ctx.addUnmetCondition('These cash flows have no internal rate of return: the money never comes back, '
        + 'or every flow has the same sign.');
    }
    return;
  }
  ctx.addHtml('<p><strong>IRR = ' + snum(rate, 4) + '% a year</strong>'
    + (inflow ? ' — ' + snum(paid, 2) + ' paid out and ' + snum(inflow, 2) + ' returned' : '') + '.</p>');
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Money invested at year 0', snum(paid, 2)],
    ['Years with a return', String(count)],
    ['Money returned', snum(inflow, 2)],
    ['Net gain', snum(inflow - paid, 2)],
    ['IRR, % per year', snum(rate, 4)]
  ]));
  ctx.addHtml('<p class="calc-note">The IRR is the discount rate at which the sum of the discounted cash flows '
    + 'is zero — the annual rate the project earns on the money still tied up in it. It assumes every flow '
    + 'happens at the end of its year and that returns are reinvested at the same rate, which is the usual '
    + 'convention and the usual criticism of the measure. Cash flows can be negative in later years; the page '
    + 'solves for the rate numerically, and says so when no real rate exists rather than printing a stray '
    + 'number.</p>');
});
JS,
];
