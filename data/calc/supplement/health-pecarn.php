<?php
/**
 * PECARN — the head-injury rule for children with a minor bump.
 *
 * The harvested page asked the five questions the rule asks and then computed
 * nothing. What the rule does is a decision, not a sum: if any of the
 * predictors is present the child is in the group where a CT scan is
 * recommended; if none is, the risk of a clinically important injury is far
 * below the risk of the scan itself. The two age bands carry their own
 * predictors and their own published risks, so the page reports both.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'predictors' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'ciTBI_risk' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'ct_recommended' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'band' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-pecarn-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'predictors', 'vt' => 'dependent', 'l' => 'PECARN predictors present (count)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'ciTBI_risk', 'vt' => 'dependent', 'l' => 'Risk of a clinically important brain injury (%)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'ct_recommended', 'vt' => 'dependent', 'l' => 'CT scan recommended? (1 = yes, 0 = no)']]]],
        ],
    ]],
    'js' => <<<'JS'
/*
 * PECARN (Kuppermann et al., Lancet 2009). The five questions on the form map
 * onto the predictors like this:
 *   age          < 2 years / >= 2 years   (the two bands, each with its own list)
 *   gcsBasilar   GCS < 15 or signs of basilar skull fracture
 *   gcsSkull     GCS < 15 or palpable skull fracture  (the under-2 wording)
 *   hematoma     occipital / parietal / temporal scalp haematoma
 *   historyOf    loss of consciousness, vomiting, severe mechanism, severe headache
 * Any one of them puts the child in the "CT recommended" group.
 *
 * Published risks of clinically important traumatic brain injury (ciTBI):
 *   under 2, one or more predictors: 4.4 %   |  none: 0.02 %
 *   2 and over, one or more:         4.3 %   |  none: 0.05 %
 */
omni.onResult(['age', 'gcsBasilar', 'gcsSkull', 'hematoma', 'historyOf'], function (ctx, v) {
  var age = Number(v.age);
  if (!isFinite(age)) {
    ctx.addUnmetCondition('Choose the age band.');
    return;
  }
  var under2 = Math.round(age) === 1;

  var names = under2
    ? [['gcsBasilar', 'GCS under 15 or signs of a basilar skull fracture'],
       ['gcsSkull', 'palpable skull fracture'],
       ['hematoma', 'occipital, parietal or temporal scalp haematoma'],
       ['historyOf', 'loss of consciousness, vomiting or a severe mechanism']]
    : [['gcsBasilar', 'GCS under 15 or signs of a basilar skull fracture'],
       ['gcsSkull', 'history of loss of consciousness'],
       ['hematoma', 'vomiting'],
       ['historyOf', 'severe mechanism or severe headache']];

  var present = [];
  var missing = false;
  names.forEach(function (pair) {
    var raw = v[pair[0]];
    if (raw === undefined || raw === null || raw === '') { missing = true; return; }
    if (Math.round(Number(raw)) === 1) present.push(pair[1]);
  });
  if (missing) {
    ctx.addUnmetCondition('Answer all four findings — the rule needs every one of them.');
    return;
  }

  var count = present.length;
  var risk = under2 ? (count > 0 ? 4.4 : 0.02) : (count > 0 ? 4.3 : 0.05);
  var band = under2 ? 'under 2 years' : '2 years and over';

  ctx.exportValue('predictors', count);
  ctx.exportValue('ciTBI_risk', risk);
  ctx.exportValue('ct_recommended', count > 0 ? 1 : 0);
  ctx.exportValue('band', under2 ? 1 : 2);

  ctx.addHtml('<p><strong>' + (count === 0
    ? 'No PECARN predictor in the ' + band + ' band — a CT scan is not recommended on this rule '
      + '(risk of a clinically important injury about ' + risk + '%).'
    : count + ' of 4 predictors present in the ' + band + ' band — a CT scan is recommended '
      + '(risk of a clinically important injury about ' + risk + '%).')
    + '</strong></p>');

  var rows = names.map(function (pair) {
    var raw = v[pair[0]];
    return [pair[1], Math.round(Number(raw)) === 1 ? 'present' : 'absent'];
  });
  rows.unshift(['Age band', band]);
  ctx.addHtml(stable(['PECARN predictor', 'This child'], rows,
    ['Predictors present', String(count)]));

  ctx.addHtml('<p class="calc-unmet">PECARN applies to children with a Glasgow Coma Scale of 14 or 15 '
    + 'after a head bump. It does not apply if the child has a GCS below 14, is under 3 months old, has a '
    + 'known bleeding disorder or a shunt, or if the injury was inflicted. The rule is a decision aid, not a '
    + 'diagnosis: a child who is getting worse, vomiting repeatedly or will not settle needs to be seen '
    + 'whatever this page says.</p>');
});
JS,
];
