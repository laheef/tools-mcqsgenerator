<?php
/**
 * Who can give blood to whom, and the intervals between donations.
 *
 * The red-cell compatibility table is the full one: O− is the universal donor
 * and AB+ the universal recipient, with the antigen rules in between. Plasma is
 * the mirror image, which is why AB plasma is the universal plasma donation.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'donor_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'recipient_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'next_donation_days' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'donor_count', 'vt' => 'dependent', 'l' => 'Blood types you can give to']]]],
            ['FR1', [[['t' => 'v', 'n' => 'recipient_count', 'vt' => 'dependent', 'l' => 'Blood types you can receive from']]]],
            ['FR1', [[['t' => 'v', 'n' => 'next_donation_days', 'vt' => 'dependent',
                       'l' => 'Wait before the next donation (days)']]]],
        ],
    ]],
    'js' => <<<'JS'
var TYPES = ['0-', '0+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+'];
/* index → {antigens: A, B, Rh} using the order above */
var PROFILE = [
  { A: false, B: false, rh: false },   /* 0-  */
  { A: false, B: false, rh: true  },   /* 0+  */
  { A: true,  B: false, rh: false },   /* A-  */
  { A: true,  B: false, rh: true  },   /* A+  */
  { A: false, B: true,  rh: false },   /* B-  */
  { A: false, B: true,  rh: true  },   /* B+  */
  { A: true,  B: true,  rh: false },   /* AB- */
  { A: true,  B: true,  rh: true  }    /* AB+ */
];

function canGiveRed(donor, recipient) {
  var d = PROFILE[donor], r = PROFILE[recipient];
  if (d.A && !r.A) return false;
  if (d.B && !r.B) return false;
  if (d.rh && !r.rh) return false;
  return true;
}
function canGivePlasma(donor, recipient) {
  /* plasma carries the opposite antibodies, so the rule flips */
  var d = PROFILE[donor], r = PROFILE[recipient];
  if (!d.A && r.A) return false;
  if (!d.B && r.B) return false;
  if (!d.rh && r.rh) return false;
  return true;
}

omni.onResult([], function (ctx, v) {
  var donating = Math.round(Number(v.action)) === 0;
  var plasma = Math.round(Number(v.material)) === 1;
  var idx = Math.round(Number(v.blood_type));
  if (v.blood_type === '' || !isFinite(idx) || !TYPES[idx]) {
    ctx.addUnmetCondition('Pick your blood type.');
    return;
  }
  var matches = [];
  for (var i = 0; i < TYPES.length; i++) {
    var ok = plasma ? (donating ? canGivePlasma(idx, i) : canGivePlasma(i, idx))
                    : (donating ? canGiveRed(idx, i) : canGiveRed(i, idx));
    if (ok) matches.push(TYPES[i]);
  }

  /* NHS-style intervals between whole-blood and plasma donations */
  var wait = plasma ? 14 : 56;
  if (!donating) wait = 0;

  ctx.exportValue('next_donation_days', wait);
  if (donating) ctx.exportValue('donor_count', matches.length);
  else ctx.exportValue('recipient_count', matches.length);

  ctx.addHtml('<p><strong>' + TYPES[idx] + (plasma ? ' plasma' : ' blood') + ' can be '
    + (donating ? 'given to ' : 'received from ') + matches.join(', ') + '.</strong></p>');
  var rows = [['Your type', TYPES[idx]]];
  rows.push([donating ? 'Compatible recipients' : 'Compatible donors', matches.join(', ')]);
  if (donating) {
    rows.push(['Wait before donating ' + (plasma ? 'plasma' : 'whole blood') + ' again', wait + ' days']);
  }
  ctx.addHtml(stable(['Quantity', 'Value'], rows));
  ctx.addHtml('<p class="calc-unmet">Red cells: O− is the universal donor and AB+ the universal recipient. '
    + 'Plasma works the other way round, which is why AB plasma is the one every patient can take. '
    + 'The waiting times are the usual minimums for a healthy adult; a doctor decides in individual cases.</p>');
});
JS,
];
