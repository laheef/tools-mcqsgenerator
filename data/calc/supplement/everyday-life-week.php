<?php
/**
 * What week a date falls in, and how many days lie between two dates.
 *
 * The ISO-8601 week number is used (weeks start on Monday, week 1 is the one
 * holding the first Thursday), plus the plain day count and the remainder in
 * weeks and days, which is what people usually want from "how long between".
 */
return [
    'vars' => [
        'days_between' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'weeks_between' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'iso_week' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'iso_year' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'day_of_year' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'days_between', 'vt' => 'dependent', 'l' => 'Days between the two dates']]]],
            ['FR1', [[['t' => 'v', 'n' => 'weeks_between', 'vt' => 'dependent', 'l' => 'Whole weeks between them']]]],
            ['FR1', [[['t' => 'v', 'n' => 'iso_week', 'vt' => 'dependent', 'l' => 'Week number of the last day']]]],
            ['FR1', [[['t' => 'v', 'n' => 'iso_year', 'vt' => 'dependent', 'l' => 'ISO week-year']]]],
            ['FR1', [[['t' => 'v', 'n' => 'day_of_year', 'vt' => 'dependent', 'l' => 'Day of the year (last date)']]]],
        ],
    ]],
    'js' => <<<'JS'
var DAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
              'September', 'October', 'November', 'December'];

function asDate(ms) {
  /* dates arrive as epoch milliseconds at local midnight */
  return new Date(Math.round(ms));
}

function isoWeek(d) {
  var t = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
  var day = t.getUTCDay() || 7;              /* Monday = 1 … Sunday = 7 */
  t.setUTCDate(t.getUTCDate() + 4 - day);    /* nearest Thursday decides the year */
  var year = t.getUTCFullYear();
  var jan1 = new Date(Date.UTC(year, 0, 1));
  var week = Math.ceil(((t - jan1) / 86400000 + 1) / 7);
  return { week: week, year: year };
}

omni.onResult([], function (ctx, v) {
  var startMs = Number(v.firstDay), endMs = Number(v.lastDay);
  if (!isFinite(startMs) || !isFinite(endMs) || v.firstDay === '' || v.lastDay === '') {
    ctx.addUnmetCondition('Pick the starting day and the last day.');
    return;
  }
  var a = asDate(startMs), b = asDate(endMs);
  var sign = b < a ? -1 : 1;
  if (sign < 0) { var tmp = a; a = b; b = tmp; }
  var days = Math.round((b - a) / 86400000);
  var weeks = Math.floor(days / 7);
  var rest = days - weeks * 7;

  var wk = isoWeek(b);
  var jan1 = new Date(b.getFullYear(), 0, 1);
  var doy = Math.round((new Date(b.getFullYear(), b.getMonth(), b.getDate()) - jan1) / 86400000) + 1;

  ctx.exportValue('days_between', sign * days);
  ctx.exportValue('weeks_between', sign * weeks);
  ctx.exportValue('iso_week', wk.week);
  ctx.exportValue('iso_year', wk.year);
  ctx.exportValue('day_of_year', doy);

  var fmt = function (d) {
    return DAYS[d.getDay()] + ', ' + d.getDate() + ' ' + MONTHS[d.getMonth()] + ' ' + d.getFullYear();
  };
  ctx.addHtml('<p><strong>' + days + (days === 1 ? ' day' : ' days')
    + ', which is ' + weeks + (weeks === 1 ? ' week' : ' weeks') + ' and ' + rest
    + (rest === 1 ? ' day' : ' days') + '.</strong></p>');
  ctx.addHtml(stable(['Date', 'Weekday', 'ISO week', 'Day of the year'], [
    [fmt(a), DAYS[a.getDay()], 'W' + isoWeek(a).week + ' of ' + isoWeek(a).year,
      String(Math.round((new Date(a.getFullYear(), a.getMonth(), a.getDate())
        - new Date(a.getFullYear(), 0, 1)) / 86400000) + 1)],
    [fmt(b), DAYS[b.getDay()], 'W' + wk.week + ' of ' + wk.year, String(doy)],
  ]));
  ctx.addHtml('<p class="calc-unmet">Week numbers follow ISO 8601: Monday starts the week, and week 1 is the '
    + 'week that holds the first Thursday of the year. ' + (sign < 0 ? 'You gave the later date first, so the '
    + 'answer counts backwards from it. ' : '') + b.getFullYear() + ' has '
    + (isoWeek(new Date(b.getFullYear(), 11, 28)).week) + ' ISO weeks.</p>');
});
JS,
];
