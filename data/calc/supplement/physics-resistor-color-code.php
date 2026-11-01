<?php
/**
 * Resistor colour bands to ohms.
 *
 * Four bands are two significant digits and a multiplier; five and six bands
 * take a third digit. The tolerance and (six band only) temperature coefficient
 * are read straight off the last bands, and the value is reported with its
 * plus/minus window in the largest sensible unit.
 */
return [
    'vars' => [
        'resistance' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'min_value' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'max_value' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'resistance', 'vt' => 'dependent', 'l' => 'In ohms']]]],
            ['FR1', [[['t' => 'v', 'n' => 'min_value', 'vt' => 'dependent', 'l' => 'Minimum']]]],
            ['FR1', [[['t' => 'v', 'n' => 'max_value', 'vt' => 'dependent', 'l' => 'Maximum']]]],
        ],
    ]],
    'showIf' => [
        'band3' => 'number >= 5',
        'temperature_coefficient' => 'number == 6',
    ],
    'js' => <<<'JS'
function human(ohms) {
  var units = [[1e9, 'GΩ'], [1e6, 'MΩ'], [1e3, 'kΩ'], [1, 'Ω']];
  for (var i = 0; i < units.length; i++) {
    if (Math.abs(ohms) >= units[i][0]) {
      return snum(ohms / units[i][0], 4).replace(/\.?0+$/, '') + ' ' + units[i][1];
    }
  }
  return snum(ohms, 4) + ' Ω';
}

omni.onResult([], function (ctx, v) {
  var bands = Number(v.number);
  if (!isFinite(bands) || [4, 5, 6].indexOf(bands) === -1) {
    ctx.addUnmetCondition('Choose how many bands the resistor has.');
    return;
  }
  var need = bands >= 5 ? ['band1', 'band2', 'band3', 'multiplier', 'tolerance']
                        : ['band1', 'band2', 'multiplier', 'tolerance'];
  for (var i = 0; i < need.length; i++) {
    if (v[need[i]] === '' || v[need[i]] === undefined) {
      ctx.addUnmetCondition('Pick a colour for every band.');
      return;
    }
  }
  if (bands === 6 && (v.temperature_coefficient === '' || v.temperature_coefficient === undefined)) {
    ctx.addUnmetCondition('A six-band resistor needs the temperature coefficient colour as well.');
    return;
  }

  var digits = String(Math.round(Number(v.band1))) + String(Math.round(Number(v.band2)));
  if (bands >= 5) digits += String(Math.round(Number(v.band3)));
  var mult = Number(v.multiplier);
  var tol = Number(v.tolerance);
  var ohms = Number(digits) * mult;

  ctx.exportValue('resistance', sround(ohms, 4));
  ctx.exportValue('min_value', sround(ohms * (1 - tol / 100), 4));
  ctx.exportValue('max_value', sround(ohms * (1 + tol / 100), 4));

  var rows = [['Significant digits', digits], ['Multiplier', '× ' + snum(mult, 4)],
              ['Resistance', human(ohms)]];
  if (bands === 6) {
    rows.push(['Temperature coefficient', snum(Number(v.temperature_coefficient), 4) + ' ppm/°C']);
  }

  ctx.addHtml('<p><strong>' + human(ohms) + ' ± ' + snum(tol, 4) + ' %</strong> ('
    + human(ohms * (1 - tol / 100)) + ' to ' + human(ohms * (1 + tol / 100)) + ')</p>');
  ctx.addHtml(stable(['Band reading', 'Value'], rows));
});
JS,
];
