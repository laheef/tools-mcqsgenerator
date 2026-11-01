<?php
/**
 * Pregnancy countdown — the time left between two dates, spelled out.
 *
 * The page computed the answer correctly and then had nowhere to put it: the
 * five differences (`years_diff`, `days_diff`, `hours_diff`, `minutes_diff`,
 * `seconds_diff`) are declared and derived by the equations, but the form has a
 * box for the two dates only, so the whole result set was dropped. The one
 * sentence that could have carried it arrived from the harvest with its number
 * slots stripped — "Only...  year(s);  day(s) ... until your due date!".
 *
 * The repair gives each difference a row in the results panel and writes the
 * sentence itself, from the figures the solver derived.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'days_diff'    => ['label' => 'Whole days to go', 'precision' => '0'],
        'years_diff'   => ['label' => 'Whole years to go', 'precision' => '0'],
        'hours_diff'   => ['label' => 'Hours to go', 'precision' => '0'],
        'minutes_diff' => ['label' => 'Minutes to go', 'precision' => '0'],
        'seconds_diff' => ['label' => 'Seconds to go', 'precision' => '0'],
    ],
    'js' => <<<'JS'
omni.onResult(['date', 'final_date'], function (ctx, values) {
  var start = values.date, due = values.final_date;
  var clear = function () {
    ['days_diff', 'years_diff', 'hours_diff', 'minutes_diff', 'seconds_diff']
      .forEach(function (n) { ctx.exportValue(n, null); });
  };
  if (!start || !due) {
    clear();
    ctx.addUnmetCondition('Enter both dates — the day the countdown starts and the due date.');
    return;
  }
  var a = new Date(start), b = new Date(due);
  /* Calendar days, not 24-hour steps: a due date has no time of day, so
     counting hours from a 9 a.m. start would make the same pair of dates read
     one day short. */
  var DAY = 86400000;
  var days = Math.round((Date.UTC(b.getFullYear(), b.getMonth(), b.getDate())
    - Date.UTC(a.getFullYear(), a.getMonth(), a.getDate())) / DAY);
  if (days < 0) {
    clear();
    ctx.addUnmetCondition('The due date is before the starting date, so there is nothing left to count down.');
    return;
  }
  var years = Math.floor(days / 365.25);
  var weeks = Math.floor(days / 7);
  var left = days - weeks * 7;
  var hours = days * 24;
  var minutes = hours * 60;
  var seconds = minutes * 60;

  ctx.exportValue('days_diff', days);
  ctx.exportValue('years_diff', years);
  ctx.exportValue('hours_diff', hours);
  ctx.exportValue('minutes_diff', minutes);
  ctx.exportValue('seconds_diff', seconds);

  /* calendar difference: years, months, days */
  var y = b.getFullYear() - a.getFullYear();
  var m = b.getMonth() - a.getMonth();
  var d = b.getDate() - a.getDate();
  if (d < 0) {
    m -= 1;
    d += new Date(b.getFullYear(), b.getMonth(), 0).getDate();
  }
  if (m < 0) { y -= 1; m += 12; }

  var fmt = function (t) {
    return t.toLocaleDateString(undefined, { year: 'numeric', month: 'long', day: 'numeric' });
  };

  ctx.addHtml('<p><strong>' + days + ' days to go</strong> — ' + weeks + ' weeks and ' + left
    + (left === 1 ? ' day' : ' days') + ', counting from ' + sesc(fmt(a)) + ' to ' + sesc(fmt(b)) + '.</p>');
  ctx.addHtml(stable(['Countdown', 'Value'], [
    ['Calendar difference', y + ' y ' + m + ' m ' + d + ' d'],
    ['Whole days', String(days)],
    ['Weeks and days', weeks + ' w ' + left + ' d'],
    ['Hours', String(hours)],
    ['Minutes', String(minutes)],
    ['Seconds', String(seconds)],
  ]));
  ctx.addHtml('<p class="calc-note">The countdown is the distance between the two dates you entered. '
    + 'Pregnancies are dated from the first day of the last menstrual period, so a due date forty weeks '
    + 'after that day is the usual one; this page does not estimate a delivery date, it measures the wait. '
    + 'Days are whole calendar days between the two dates, so the time of day in the starting box does not '
    + 'shift the count; hours, minutes and seconds are those days converted, not a separate measurement.</p>');
});
JS,
];
