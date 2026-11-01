<?php
/**
 * Off days — statutory paid holiday, in days and in hours.
 *
 * The harvested page asked which country and which contract and then answered
 * nothing at all. The arithmetic is the one every payroll department uses: a
 * full-time week is five days, so a day of leave is `hours per week ÷ 5` hours
 * and an entitlement of N days is N × that. The entitlement itself is set by
 * law in the country, which is why the country is a field.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'leave_days' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'leave_hours' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'leave_weeks' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'day_hours' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
    ],
    'groups' => [[
        'uid' => 'supp-leave-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'leave_days', 'vt' => 'dependent', 'l' => 'Paid holiday you are entitled to (days)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'leave_hours', 'vt' => 'dependent', 'l' => 'The same entitlement in hours']]]],
            ['FR1', [[['t' => 'v', 'n' => 'leave_weeks', 'vt' => 'dependent', 'l' => 'That is this many working weeks']]]],
            ['FR1', [[['t' => 'v', 'n' => 'day_hours', 'vt' => 'dependent', 'l' => 'Length of one of your working days (hours)']]]],
        ],
    ]],
    'js' => <<<'JS'
/* statutory minimum paid holiday, in days of a five-day week */
var RULES = {
  /* United States: no federal minimum at all; 10 days is the private-sector average after a year (BLS) */
  0: { days: 10, name: 'United States', legal: false,
       note: 'The United States has no federal statutory holiday at all — 10 days is the average private-sector '
           + 'entitlement after a year of service, and about a quarter of workers get none.' },
  /* United Kingdom: 5.6 weeks = 28 days for a five-day week, bank holidays included */
  1: { days: 28, name: 'United Kingdom', legal: true,
       note: 'UK law gives 5.6 weeks (28 days for a five-day week) including the eight bank holidays, '
           + 'pro-rated for the hours you actually work.' },
  /* Poland: 20 days under 10 years of service, 26 days after */
  2: { days: 26, name: 'Poland', legal: true,
       note: 'Poland gives 20 days below 10 years of service and 26 days after it; 26 is used here. '
           + 'The entitlement is in days, not hours, so a part-timer still gets 26 of their own short days.' }
};

omni.onResult(['country', 'contract', 'hours_per_week'], function (ctx, v) {
  var country = Math.round(Number(v.country));
  var contract = Math.round(Number(v.contract));
  var hours = Number(v.hours_per_week);
  if (!isFinite(country) || !RULES[country]) {
    ctx.addUnmetCondition('Choose the country you work in.');
    return;
  }
  if (!isFinite(hours) || hours <= 0) {
    ctx.addUnmetCondition('Enter the hours you work in a normal week.');
    return;
  }
  if (hours > 90) {
    ctx.addUnmetCondition('That is ' + snum(hours, 1) + ' hours a week — check the number.');
    return;
  }

  var rule = RULES[country];
  var dayHours = hours / 5;
  var days = rule.days;
  var freelance = contract === 2;

  ctx.exportValue('leave_days', sround(days, 1));
  ctx.exportValue('leave_hours', sround(days * dayHours, 1));
  ctx.exportValue('leave_weeks', sround(days / 5, 2));
  ctx.exportValue('day_hours', sround(dayHours, 2));

  var headline = freelance
    ? 'As a freelancer or contractor nobody owes you paid holiday — the ' + snum(days, 0)
      + ' days below are what a salaried ' + rule.name + ' worker would get on the same hours.'
    : 'A ' + (contract === 1 ? 'part-time' : 'full-time') + ' worker on ' + snum(hours, 1)
      + ' hours a week in ' + rule.name + ' is entitled to ' + snum(days, 0) + ' days, which is '
      + snum(days * dayHours, 1) + ' hours.';

  ctx.addHtml('<p><strong>' + headline + '</strong></p>');
  ctx.addHtml('<p>' + rule.note
    + (rule.legal
        ? ' A part-timer gets the same number of days, not the same number of hours: a day is simply shorter.'
        : '')
    + '</p>');

  var rows = [
    ['Working days a week', '5 (the basis for the division)'],
    ['One working day', snum(dayHours, 2) + ' h'],
    ['Holiday entitlement', snum(days, 0) + ' days = ' + snum(days * dayHours, 1) + ' h'],
    ['Of which bank / public holidays', rule.legal && country === 1 ? '8 days are inside the 28' : 'included in the days above']
  ];
  rows.push(['Holiday as a share of the year', snum(days / 260 * 100, 1) + '% of 260 working days']);
  ctx.addHtml(stable(['Item', 'Value'], rows));

  /* the same entitlement at the usual weekly hours, so a part-timer can see theirs */
  var bands = [10, 15, 20, 26, 30, 37.5, 40];
  var bandRows = bands.map(function (h) {
    return [snum(h, 1) + ' h / week', snum(h / 5, 2) + ' h a day', snum(days * h / 5, 1) + ' h of leave'];
  });
  ctx.addHtml('<p>What the same ' + snum(days, 0) + ' days is worth at other weekly hours:</p>');
  ctx.addHtml(stable(['Hours a week', 'One day', 'Paid holiday'], bandRows));

  if (freelance) {
    var uplift = days / 5 / 52 * 100;
    ctx.addHtml('<p class="calc-unmet">If you want to build the same days off into your own rate, '
      + 'add about ' + snum(uplift, 1) + '% to the hours you bill: ' + snum(days, 0) + ' days out of 260 '
      + 'working days is ' + snum(days / 260 * 100, 1) + '% of the year. Freelance rates have to carry it, '
      + 'because no employer does.</p>');
  }
});
JS,
];
