<?php
/**
 * Bench press pyramid.
 *
 * Sets are written as a percentage of the one-rep max, and the reps that go
 * with a percentage come from Epley's estimate read backwards:
 *
 *   1RM = w · (1 + reps/30)   →   reps = 30 · (1RM/w − 1)
 *
 * so 80 % of the max is about 7 reps, 70 % about 13, and so on.
 */
return [
    'vars' => [
        'set_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'top_load' => ['type' => 'dependent', 'rnd' => ['standard', '1'], 'du' => 'kg'],
        'total_volume' => ['type' => 'dependent', 'rnd' => ['standard', '0'], 'du' => 'kg'],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'set_count', 'vt' => 'dependent', 'l' => 'Sets in the pyramid']]]],
            ['FR1', [[['t' => 'v', 'n' => 'top_load', 'vt' => 'dependent',
                       'l' => 'Heaviest set', 'du' => 'kg']]]],
            ['FR1', [[['t' => 'v', 'n' => 'total_volume', 'vt' => 'dependent',
                       'l' => 'Total volume (load × reps)', 'du' => 'kg']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var rm = Number(v.rep_max);
  if (!isFinite(rm) || rm <= 0) {
    ctx.addUnmetCondition('Enter your one-rep max.');
    return;
  }
  var kind = Number(v.pyramid_type);
  var triangle = kind === 2 || kind === -2;
  var sets = Number(triangle ? v.no_sets_triangle : v.no_sets_single);
  if (!isFinite(sets) || sets < 1) sets = triangle ? 5 : 4;
  sets = Math.round(sets);

  /* the load of each set as a share of the max, walking up to 90 % and back */
  function steps(n) {
    var out = [];
    for (var i = 0; i < n; i++) {
      out.push(n === 1 ? 0.9 : 0.65 + (0.9 - 0.65) * (i / (n - 1)));
    }
    return out;
  }
  var half = Math.ceil(sets / 2);
  var ladder;
  if (kind === 1) ladder = steps(sets);                                  // ascending
  else if (kind === -1) ladder = steps(sets).reverse();                  // descending
  else if (kind === 2) ladder = steps(half).concat(steps(sets - half).reverse());  // full
  else ladder = steps(half).reverse().concat(steps(sets - half));        // full reverse
  ladder = ladder.slice(0, sets);

  var rows = [], top = 0, volume = 0;
  ladder.forEach(function (share, idx) {
    var load = rm * share;
    var reps = Math.max(1, Math.round(30 * (rm / load - 1)));
    top = Math.max(top, load);
    volume += load * reps;
    rows.push([String(idx + 1), snum(share * 100, 1) + ' %', snum(load, 1) + ' kg', String(reps),
               snum(load * reps, 0) + ' kg']);
  });
  ctx.exportValue('set_count', rows.length);
  ctx.exportValue('top_load', sround(top, 1));
  ctx.exportValue('total_volume', Math.round(volume));
  ctx.addHtml(stable(['Set', 'Share of 1RM', 'Load', 'Reps', 'Volume'], rows));
  ctx.addHtml('<p class="calc-unmet">Reps come from reading Epley\u2019s formula backwards: '
    + '1RM = load × (1 + reps/30). Warm up first — the heaviest set here is '
    + snum(top, 1) + ' kg.</p>');
});
JS,
];
