<?php
/**
 * The gender pay gap.
 *
 * The country menu carries the gap itself as its value (Australia 11.4 means
 * 11.4 %). From that: what the other sex earns for the same job, how many days
 * of the year the lower-paid sex effectively works unpaid (gap % × 365), and
 * the date that unpaid stretch begins.
 */
return [
    'vars' => [
        'male_equivalent' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'female_equivalent' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'unpaid_days' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'pay_gap' => ['type' => 'dependent', 'rnd' => ['standard', '2'], 'suf' => '%'],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'pay_gap', 'vt' => 'dependent', 'l' => 'Pay gap for this country', 'suf' => '%']]]],
            ['FR1', [[['t' => 'v', 'n' => 'female_equivalent', 'vt' => 'dependent',
                       'l' => 'The same job, if you were a woman']]]],
            ['FR1', [[['t' => 'v', 'n' => 'male_equivalent', 'vt' => 'dependent',
                       'l' => 'The same job, if you were a man']]]],
            ['FR1', [[['t' => 'v', 'n' => 'unpaid_days', 'vt' => 'dependent',
                       'l' => 'Days of the year worked unpaid']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var gap = Number(v.country);
  var salary = Number(v.salary);
  if (!isFinite(gap)) {
    ctx.addUnmetCondition('Choose a country.');
    return;
  }
  if (v.salary === '' || !isFinite(salary) || salary <= 0) {
    ctx.addUnmetCondition('Enter your salary.');
    return;
  }
  var woman = String(v.sex) === '1';
  var fraction = gap / 100;

  /* the gap compares the woman's pay with the man's for the same work */
  var female = woman ? salary : salary * (1 - fraction);
  var male = woman ? salary / (1 - fraction) : salary;

  var unpaid = 365 * fraction;
  var paid = 365 - unpaid;
  var start = new Date(Date.UTC(2025, 0, 1));
  start.setUTCDate(start.getUTCDate() + Math.round(paid));
  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                'August', 'September', 'October', 'November', 'December'];
  var dateText = start.getUTCDate() + ' ' + months[start.getUTCMonth()];

  ctx.exportValue('pay_gap', sround(gap, 2));
  ctx.exportValue('female_equivalent', sround(female, 2));
  ctx.exportValue('male_equivalent', sround(male, 2));
  ctx.exportValue('unpaid_days', sround(unpaid, 1));
  ctx.exportValue('gap', sround(gap, 2));
  ctx.exportValue('female_salary', sround(female, 2));
  ctx.exportValue('male_salary', sround(male, 2));

  ctx.addHtml('<p><strong>The gap here is ' + snum(gap, 2) + ' %.</strong> For the same work a man earns '
    + snum(male, 2) + ' where a woman earns ' + snum(female, 2) + '. On a ' + snum(gap, 2)
    + ' % gap a woman works the last ' + snum(unpaid, 1) + ' days of the year unpaid — from '
    + dateText + ' onwards.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Pay gap', snum(gap, 2) + ' %'],
    ['Your salary', snum(salary, 2)],
    ['Woman, same job', snum(female, 2)],
    ['Man, same job', snum(male, 2)],
    ['Paid days of the year', snum(paid, 1)],
    ['Unpaid days', snum(unpaid, 1)],
  ]));
});
JS,
];
