<?php
/**
 * Age — the answer in the units people ask for.
 *
 * The harvested page carried twenty variables (yearsDiff, daysDiff, nextBirthday
 * …) as "presentation" items: values the reference page printed inside a
 * sentence, which this template never renders. Calculate therefore said
 * "Results updated" over an empty panel. The repair replaces that machinery with
 * a form that has fields you can see and results you can copy:
 *
 *   age      = whole years, then months, then days, by calendar arithmetic
 *   totals   = days, weeks, hours, minutes, all from the same span
 *   next     = the next birthday and how far off it is
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'remove' => ['diff_in_ms', 'diff_in_s', 'diff_in_min', 'diff_in_h', 'diff_in_days',
                 'diff_in_weeks', 'diff_in_months', 'diff_in_years', 'nextDiff',
                 'nextDiffDays', 'nextDiffHours', 'nextDiffMinutes', 'nextDiffSeconds',
                 'nextYearDiff', 'nextYearDiffDays', 'nextYearDiffHours',
                 'nextYearDiffMinutes', 'nextYearDiffSeconds'],
    'vars' => [
        'start_date' => ['type' => 'date'],
        'end_date' => ['type' => 'date'],
        'age_years' => sup_dep('0'),
        'age_months' => sup_dep('0'),
        'age_days' => sup_dep('0'),
        'age_in_days' => sup_dep('0'),
        'age_in_weeks' => sup_dep('1'),
        'age_in_hours' => sup_dep('0'),
        'age_in_minutes' => sup_dep('0'),
        'next_birthday' => ['type' => 'date'],
        'days_to_birthday' => sup_dep('0'),
        'weekday_born' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-age-dates', 'The two dates', [
            sup_field(sup_date('start_date', 'Date of birth')),
            sup_field(sup_date('end_date', 'Age on this date')),
        ]),
        sup_group('supp-age-results', 'Results', [
            sup_field(sup_out('age_years', 'Years')),
            sup_field(sup_out('age_months', 'Months beyond the last whole year')),
            sup_field(sup_out('age_days', 'Days beyond the last whole month')),
            sup_field(sup_out('age_in_days', 'Age in days')),
            sup_field(sup_out('age_in_weeks', 'Age in weeks')),
            sup_field(sup_out('age_in_hours', 'Age in hours')),
            sup_field(sup_out('age_in_minutes', 'Age in minutes')),
            sup_field(sup_out('days_to_birthday', 'Days to the next birthday')),
            sup_field(['t' => 'v', 'n' => 'next_birthday', 'vt' => 'date', 'l' => 'Your next birthday']),
            sup_field(sup_out('weekday_born', 'Day of the week you were born (0 = Sunday)')),
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
  return d.getUTCDate() + ' ' + MONTHS[d.getUTCMonth()] + ' ' + d.getUTCFullYear();
}

omni.onResult(['start_date', 'end_date'], function (ctx, v) {
  var born = dateMs('start_date');
  var at = dateMs('end_date');

  if (born === null) {
    ctx.addUnmetCondition('Choose the date of birth.');
    return;
  }
  if (at === null) {
    ctx.addUnmetCondition('Choose the date to work the age out on.');
    return;
  }
  if (at < born) {
    ctx.addUnmetCondition('The second date is before the date of birth — check the two dates.');
    return;
  }

  /* whole years and months, walked one calendar step at a time */
  var years = 0, months = 0, cursor = born;
  function addMonths(ms, n) {
    var d = new Date(ms);
    var target = d.getUTCMonth() + n;
    var y = d.getUTCFullYear() + Math.floor(target / 12);
    var m = ((target % 12) + 12) % 12;
    var day = Math.min(d.getUTCDate(), new Date(Date.UTC(y, m + 1, 0)).getUTCDate());
    return Date.UTC(y, m, day);
  }
  while (addMonths(cursor, 12) <= at) { cursor = addMonths(cursor, 12); years++; }
  while (addMonths(cursor, 1) <= at) { cursor = addMonths(cursor, 1); months++; }
  var days = Math.round((at - cursor) / DAY);
  var totalDays = Math.round((at - born) / DAY);

  /* the next birthday after `at`, in the birth month and day */
  var b = new Date(born);
  var thisYear = Date.UTC(new Date(at).getUTCFullYear(), b.getUTCMonth(), b.getUTCDate());
  var next = thisYear >= at ? thisYear : Date.UTC(new Date(at).getUTCFullYear() + 1, b.getUTCMonth(), b.getUTCDate());
  var toBirthday = Math.round((next - at) / DAY);

  ctx.exportValue('age_years', years);
  ctx.exportValue('age_months', months);
  ctx.exportValue('age_days', days);
  ctx.exportValue('age_in_days', totalDays);
  ctx.exportValue('age_in_weeks', sround(totalDays / 7, 1));
  ctx.exportValue('age_in_hours', totalDays * 24);
  ctx.exportValue('age_in_minutes', totalDays * 24 * 60);
  ctx.exportValue('next_birthday', next);
  ctx.exportValue('days_to_birthday', toBirthday);
  ctx.exportValue('weekday_born', new Date(born).getUTCDay());

  var headline = 'On ' + pretty(at) + ' you are ' + years + ' year' + (years === 1 ? '' : 's');
  if (months) { headline += ', ' + months + ' month' + (months === 1 ? '' : 's'); }
  if (days) { headline += ' and ' + days + ' day' + (days === 1 ? '' : 's'); }
  headline += ' old — ' + totalDays.toLocaleString() + ' days.';
  if (toBirthday === 0) {
    headline += ' Today is your birthday.';
  } else {
    headline += ' Your next birthday is on ' + pretty(next) + ', ' + toBirthday + ' days away.';
  }
  ctx.addHtml('<p><strong>' + headline + '</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Born', pretty(born) + ', a ' + WEEKDAYS[new Date(born).getUTCDay()]],
    ['Age worked out on', pretty(at)],
    ['Years', String(years)],
    ['Months beyond the whole years', String(months)],
    ['Days beyond the whole months', String(days)],
    ['In days', totalDays.toLocaleString()],
    ['In weeks', snum(totalDays / 7, 2)],
    ['In hours', (totalDays * 24).toLocaleString()],
    ['In minutes', (totalDays * 24 * 60).toLocaleString()],
    ['In seconds', (totalDays * 86400).toLocaleString()],
    ['Next birthday', pretty(next)],
    ['Days to it', String(toBirthday)],
    ['Day of the week you were born', WEEKDAYS[new Date(born).getUTCDay()]]
  ]));

  /* the same age at several later dates, so the shape of the next few years shows */
  var rows = [1, 5, 10, 18, 65].map(function (n) {
    var target = addMonths(born, 12 * n);
    return [String(n) + (n === 65 ? ' (retirement age)' : ' years old'), pretty(target),
      Math.round((target - born) / DAY).toLocaleString() + ' days old'];
  });
  ctx.addHtml('<p>Milestones, from the date of birth:</p>');
  ctx.addHtml(stable(['Turning', 'On', 'Days old'], rows));

  ctx.addHtml('<p class="calc-unmet">Age is counted in whole calendar steps, the way a birthday works: '
    + 'a person born on 29 February ages on 1 March in a common year, because the birth date does not '
    + 'exist that year, and the months column above follows the same rule. Nothing here uses a clock — '
    + 'no hours, minutes or time zones — so a birth at 23:50 on the 3rd and one at 00:10 on the 4th are '
    + 'counted as a day apart, which is the convention birth certificates and forms use. The totals in '
    + 'hours, minutes and seconds are the plain day count multiplied out; they ignore that your age in '
    + 'hours is not exactly 24 times your age in days unless the two dates are both at midnight.</p>');
});
JS,
];
