<?php
/**
 * Calendar countdown — the distance to any date, in days and weeks.
 *
 * The page kept a date box and three presentation fields that never rendered,
 * so it said "nothing to calculate here". The repair places the date box and
 * counts from today, which is what a countdown is: positive before the date,
 * negative once it has passed.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'remove' => ['day_num', 'final_date', 'year_num'],
    'vars' => [
        'cd_days' => sup_dep('0'),
        'cd_weeks' => sup_dep('1'),
        'cd_months' => sup_dep('1'),
        'cd_weekday' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-countdown-inputs', 'Count down to', [
            sup_field(sup_date('date', 'The date you are counting to')),
        ]),
        sup_group('supp-countdown-results', 'Results', [
            sup_field(sup_out('cd_days', 'Days from today (negative once the date has passed)')),
            sup_field(sup_out('cd_weeks', 'Weeks from today')),
            sup_field(sup_out('cd_months', 'Months from today (approximate)')),
            sup_field(sup_out('cd_weekday', 'Day of the week of your date (0 = Sunday)')),
        ]),
    ],
    'js' => <<<'JS'
var DAY = 86400000;
var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
              'August', 'September', 'October', 'November', 'December'];
var WEEKDAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

function dateMs(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || !el.value) { return null; }
  var m = /^(\d{4})-(\d{2})-(\d{2})/.exec(el.value);
  return m ? Date.UTC(+m[1], +m[2] - 1, +m[3]) : null;
}

function pretty(ms) {
  var d = new Date(ms);
  return WEEKDAYS[d.getUTCDay()] + ' ' + d.getUTCDate() + ' ' + MONTHS[d.getUTCMonth()] + ' '
    + d.getUTCFullYear();
}

omni.onResult(['date'], function (ctx, v) {
  var target = dateMs('date');
  if (target === null) {
    ctx.addUnmetCondition('Choose the date you are counting to.');
    return;
  }

  var now = new Date();
  var today = Date.UTC(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate());
  var days = Math.round((target - today) / DAY);
  var d = new Date(target);

  ctx.exportValue('cd_days', days);
  ctx.exportValue('cd_weeks', sround(days / 7, 1));
  ctx.exportValue('cd_months', sround(days / 30.44, 1));
  ctx.exportValue('cd_weekday', d.getUTCDay());

  var direction;
  if (days === 0) {
    direction = 'is today';
  } else if (days > 0) {
    direction = 'is ' + days + ' day' + (days === 1 ? '' : 's') + ' away — about ' + snum(days / 7, 1)
      + ' weeks';
  } else {
    direction = 'was ' + Math.abs(days) + ' day' + (days === -1 ? '' : 's') + ' ago — about '
      + snum(Math.abs(days) / 7, 1) + ' weeks';
  }
  ctx.addHtml('<p><strong>' + pretty(target) + ' ' + direction + '.</strong></p>');

  /* the breakdown people actually use: months, weeks and days */
  var wholeWeeks = Math.floor(Math.abs(days) / 7);
  var spare = Math.abs(days) % 7;
  var years = 0, months = 0;
  var cursor = days >= 0 ? today : target;
  var end = days >= 0 ? target : today;
  while (true) {
    var probe = new Date(cursor);
    probe.setUTCMonth(probe.getUTCMonth() + 1);
    if (probe.getTime() > end) { break; }
    cursor = probe.getTime();
    months++;
    if (months === 12) { months = 0; years++; }
  }
  var afterMonths = Math.round((end - cursor) / DAY);

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Your date', pretty(target)],
    ['Today', pretty(today)],
    ['Days', String(days)],
    ['Weeks', snum(days / 7, 2)],
    ['Months (approximate)', snum(days / 30.44, 2)],
    ['Years (approximate)', snum(days / 365.2425, 2)],
    ['Whole calendar months', (years > 0 ? years + ' year' + (years === 1 ? '' : 's') + ' ' : '')
      + months + ' month' + (months === 1 ? '' : 's') + ' and ' + afterMonths + ' day'
      + (afterMonths === 1 ? '' : 's')],
    ['Whole weeks and days', wholeWeeks + ' weeks and ' + spare + ' day' + (spare === 1 ? '' : 's')],
    ['Day of the week', WEEKDAYS[d.getUTCDay()]],
    ['Day of the year', String(Math.floor((target - Date.UTC(d.getUTCFullYear(), 0, 1)) / DAY) + 1)]
  ]));

  ctx.addHtml('<p class="calc-unmet">Days are counted between calendar dates, so a countdown to tomorrow '
    + 'is one day even though it is only a few hours; no time zone or clock time is involved. Weeks are '
    + 'days ÷ 7 and months are days ÷ 30.44, which is the average length of a month over the Gregorian '
    + 'cycle — that is why a countdown of "three months" and one of 91 days can differ by a day or two. '
    + 'The whole-month figure above is the honest one: it walks forward a month at a time and reports what '
    + 'is left, so it never claims a month that has not passed. Leap days are handled by the calendar '
    + 'arithmetic itself.</p>');
});
JS,
];
