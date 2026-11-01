<?php
/**
 * What the stage of Alzheimer's disease says about the time ahead.
 *
 * The seven stages are the Global Deterioration Scale. The figures are the
 * published ranges for how long a stage lasts and for life expectancy from the
 * start of it, so the page reports the range rather than a single number.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'stage_years_low' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'stage_years_high' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'life_low' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'life_high' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'stage_years_low', 'vt' => 'dependent', 'l' => 'This stage typically lasts (years, low)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'stage_years_high', 'vt' => 'dependent', 'l' => 'This stage typically lasts (years, high)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'life_low', 'vt' => 'dependent', 'l' => 'Life expectancy from here (years, low)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'life_high', 'vt' => 'dependent', 'l' => 'Life expectancy from here (years, high)']]]],
        ],
    ]],
    'js' => <<<'JS'
var STAGES = [
  null,
  { name: 'No cognitive impairment', duration: null, life: null,
    note: 'No symptoms — this stage is the healthy baseline, not a stage of the disease.' },
  { name: 'Very mild cognitive decline', duration: [15, 15], life: [10, 15],
    note: 'Forgetfulness that looks like ordinary ageing; often not noticed by others.' },
  { name: 'Mild cognitive decline', duration: [2, 7], life: [10, 10],
    note: 'Friends and family start to notice; concentration and work performance slip.' },
  { name: 'Moderate cognitive decline', duration: [2, 2], life: [3, 8],
    note: 'A diagnosis is usually made here: memory of recent events, travel and finances affected.' },
  { name: 'Moderately severe cognitive decline', duration: [1.5, 1.5], life: [1.5, 6.5],
    note: 'Help with daily life is needed — choosing clothes, remembering an address, bathing.' },
  { name: 'Severe cognitive decline', duration: [2.5, 2.5], life: [4, 4],
    note: 'Personality changes, wandering, incontinence; supervision is needed day and night.' },
  { name: 'Very severe cognitive decline', duration: [1.5, 2.5], life: [1, 2.5],
    note: 'Loss of speech and of control over movement; the person needs total care.' }
];

omni.onResult([], function (ctx, v) {
  var idx = Math.round(Number(v.stage));
  if (v.stage === '' || !isFinite(idx) || !STAGES[idx]) {
    ctx.addUnmetCondition('Choose the stage.');
    return;
  }
  var s = STAGES[idx];

  if (!s.duration) {
    ctx.addHtml('<p><strong>' + s.name + '</strong> — ' + s.note + '</p>');
    ctx.addHtml('<p class="calc-unmet">Nothing to estimate at this stage: it describes a person without '
      + 'cognitive decline.</p>');
    return;
  }

  ctx.exportValue('stage_years_low', s.duration[0]);
  ctx.exportValue('stage_years_high', s.duration[1]);
  ctx.exportValue('life_low', s.life[0]);
  ctx.exportValue('life_high', s.life[1]);

  ctx.addHtml('<p><strong>Stage ' + idx + ' — ' + s.name + '.</strong> It typically lasts '
    + (s.duration[0] === s.duration[1] ? 'about ' + snum(s.duration[0], 1) + ' years'
       : snum(s.duration[0], 1) + '–' + snum(s.duration[1], 1) + ' years')
    + ', and life expectancy from the start of it is '
    + (s.life[0] === s.life[1] ? 'about ' + snum(s.life[0], 1) + ' years'
       : snum(s.life[0], 1) + '–' + snum(s.life[1], 1) + ' years') + '.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Stage', String(idx)],
    ['Duration of this stage', (s.duration[0] === s.duration[1] ? snum(s.duration[0], 1)
      : snum(s.duration[0], 1) + '–' + snum(s.duration[1], 1)) + ' years'],
    ['Life expectancy from here', (s.life[0] === s.life[1] ? snum(s.life[0], 1)
      : snum(s.life[0], 1) + '–' + snum(s.life[1], 1)) + ' years']
  ]));
  ctx.addHtml('<p class="calc-unmet">' + s.note + ' These are population averages from published cohorts: '
    + 'age, general health and the care available move the answer a long way in an individual case.</p>');
});
JS,
];
