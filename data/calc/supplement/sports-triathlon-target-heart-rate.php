<?php
/**
 * Training heart-rate zones from maximum and resting heart rate.
 *
 * Karvonen: the zone boundaries are percentages of the heart-rate reserve
 * (MHR − RHR) added back onto RHR, which is why a fit athlete's zone 2 is not
 * the same number as everybody else's.
 */
return [
    'vars' => [
        'zone50' => ['type' => 'dependent', 'rnd' => ['standard', '0'], 'du' => 'bpm'],
        'zone60' => ['type' => 'dependent', 'rnd' => ['standard', '0'], 'du' => 'bpm'],
        'zone70' => ['type' => 'dependent', 'rnd' => ['standard', '0'], 'du' => 'bpm'],
        'zone80' => ['type' => 'dependent', 'rnd' => ['standard', '0'], 'du' => 'bpm'],
        'zone90' => ['type' => 'dependent', 'rnd' => ['standard', '0'], 'du' => 'bpm'],
        'zone100' => ['type' => 'dependent', 'rnd' => ['standard', '0'], 'du' => 'bpm'],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Target heart rate zones', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'zone50', 'vt' => 'dependent', 'l' => '50 % of reserve', 'du' => 'bpm']]]],
            ['FR1', [[['t' => 'v', 'n' => 'zone60', 'vt' => 'dependent', 'l' => '60 % of reserve', 'du' => 'bpm']]]],
            ['FR1', [[['t' => 'v', 'n' => 'zone70', 'vt' => 'dependent', 'l' => '70 % of reserve', 'du' => 'bpm']]]],
            ['FR1', [[['t' => 'v', 'n' => 'zone80', 'vt' => 'dependent', 'l' => '80 % of reserve', 'du' => 'bpm']]]],
            ['FR1', [[['t' => 'v', 'n' => 'zone90', 'vt' => 'dependent', 'l' => '90 % of reserve', 'du' => 'bpm']]]],
            ['FR1', [[['t' => 'v', 'n' => 'zone100', 'vt' => 'dependent', 'l' => 'Maximum (MHR)', 'du' => 'bpm']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var mhr = Number(v.mhr), rhr = Number(v.rhr);
  if (!isFinite(mhr) || mhr <= 0) {
    ctx.addUnmetCondition('Enter your maximum heart rate to get the zones.');
    return;
  }
  if (!isFinite(rhr) || rhr <= 0) {
    ctx.addUnmetCondition('Enter your resting heart rate. If you do not know it, measure it lying still first thing in the morning.');
    return;
  }
  if (rhr >= mhr) {
    ctx.addUnmetCondition('The resting heart rate has to be lower than the maximum — check the two numbers.');
    return;
  }
  var reserve = mhr - rhr;
  var percents = [50, 60, 70, 80, 90, 100];
  percents.forEach(function (p) {
    ctx.exportValue('zone' + p, Math.round(rhr + reserve * p / 100));
  });
  var body = [
    ['Zone 1 — recovery', '50–60 %', Math.round(rhr + reserve * 0.5) + '–' + Math.round(rhr + reserve * 0.6)],
    ['Zone 2 — endurance', '60–70 %', Math.round(rhr + reserve * 0.6) + '–' + Math.round(rhr + reserve * 0.7)],
    ['Zone 3 — tempo', '70–80 %', Math.round(rhr + reserve * 0.7) + '–' + Math.round(rhr + reserve * 0.8)],
    ['Zone 4 — threshold', '80–90 %', Math.round(rhr + reserve * 0.8) + '–' + Math.round(rhr + reserve * 0.9)],
    ['Zone 5 — VO₂ max', '90–100 %', Math.round(rhr + reserve * 0.9) + '–' + Math.round(mhr)]
  ].map(function (r) { return [r[0], r[1], r[2] + ' bpm']; });
  ctx.addHtml(stable(['Zone', 'Share of heart-rate reserve', 'Heart rate'], body));
  ctx.addHtml('<p class="calc-unmet">Heart-rate reserve = MHR − RHR = ' + snum(mhr, 0) + ' − '
    + snum(rhr, 0) + ' = ' + snum(reserve, 0) + ' bpm. Each zone adds that percentage of the reserve '
    + 'back onto your resting rate (the Karvonen method).</p>');
});
JS,
];
