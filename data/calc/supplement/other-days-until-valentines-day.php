<?php
/**
 * Days until Valentine's day — how long is left, and how long since.
 *
 * The page kept a date box and two presentation fields ("day_num" and
 * "final_date") that never rendered, so it said "nothing to calculate here".
 * The repair places the date box, works out the next 14 February and says how
 * many days away it is — this year if it has not passed, next year if it has.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'remove' => ['day_num', 'final_date'],
    'vars' => [
        'val_days' => sup_dep('0'),
        'val_weeks' => sup_dep('1'),
        'val_year' => sup_dep('0'),
        'val_days_since' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-valentine-inputs', 'Count from', [
            sup_field(sup_date('date', 'Date to count from')),
        ]),
        sup_group('supp-valentine-results', 'Results', [
            sup_field(sup_out('val_days', 'Days until Valentine’s day')),
            sup_field(sup_out('val_weeks', 'Weeks until Valentine’s day')),
            sup_field(sup_out('val_year', 'The 14 February being counted to')),
            sup_field(sup_out('val_days_since', 'Days since the last Valentine’s day')),
        ]),
    ],
    'js' => <<<'JS'
var DAY = 86400000;
var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
              'August', 'September', 'October', 'November', 'December'];
var WEEKDAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

function dateMs(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || !el.value) { return null; }
  var m = /^(\d{4})-(\d{2})-(\d{2})/.exec(el.value);
  return m ? Date.UTC(+m[1], +m[2] - 1, +m[3]) : null;
}

omni.onResult(['date'], function (ctx, v) {
  var from = dateMs('date');
  if (from === null) {
    ctx.addUnmetCondition('Choose the date to count from.');
    return;
  }

  var d = new Date(from);
  var year = d.getUTCFullYear();

  /* this year's 14 February, or next year's once it has gone */
  var thisYear = Date.UTC(year, 1, 14);
  var next = thisYear >= from ? thisYear : Date.UTC(year + 1, 1, 14);
  var last = thisYear <= from ? thisYear : Date.UTC(year - 1, 1, 14);

  var days = Math.round((next - from) / DAY);
  var since = Math.round((from - last) / DAY);

  ctx.exportValue('val_days', days);
  ctx.exportValue('val_weeks', sround(days / 7, 1));
  ctx.exportValue('val_year', new Date(next).getUTCFullYear());
  ctx.exportValue('val_days_since', since);

  var nextDate = new Date(next);
  var label = nextDate.getUTCDate() + ' ' + MONTHS[nextDate.getUTCMonth()] + ' '
    + nextDate.getUTCFullYear() + ', a ' + WEEKDAYS[nextDate.getUTCDay()];

  var headline;
  if (days === 0) {
    headline = 'It is Valentine’s day today (' + label + ').';
  } else {
    headline = 'From ' + new Date(from).getUTCDate() + ' ' + MONTHS[new Date(from).getUTCMonth()]
      + ' ' + year + ' there are ' + days + ' day' + (days === 1 ? '' : 's') + ' until '
      + 'Valentine’s day — ' + label + ', about ' + snum(days / 7, 1) + ' weeks away.';
  }
  ctx.addHtml('<p><strong>' + headline + '</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Counting from', new Date(from).getUTCDate() + ' ' + MONTHS[new Date(from).getUTCMonth()] + ' ' + year],
    ['Valentine’s day', label],
    ['Days until', String(days)],
    ['Weeks until', snum(days / 7, 1)],
    ['Days since last', String(since)],
    ['Working days left (Mon–Fri, if today is a working day)', String(Math.max(0, Math.floor(days / 7) * 5
      + Math.min(5, days % 7)))],
    ['Shopping weekends left', String(Math.floor(days / 7))]
  ]));

  /* the countdown at a few other starting points in the same year */
  var rows = [[2, 1], [2, 7], [2, 13], [2, 14], [2, 15], [3, 1]].map(function (md) {
    var start = Date.UTC(year, md[0] - 1, md[1]);
    var target = Date.UTC(year, 1, 14) >= start ? Date.UTC(year, 1, 14) : Date.UTC(year + 1, 1, 14);
    return [md[1] + ' ' + MONTHS[md[0] - 1] + ' ' + year,
      String(Math.round((target - start) / DAY)) + ' days'];
  });
  ctx.addHtml('<p>Counting from other dates in ' + year + ':</p>');
  ctx.addHtml(stable(['Starting date', 'Days until 14 February'], rows));

  ctx.addHtml('<p class="calc-unmet">The count is of calendar days, so it includes weekends and does not '
    + 'care about leap years beyond the extra day in February that a leap year brings after the 14th. Time '
    + 'zones are ignored: the date is read as a postal date, with no clock attached, which is what a '
    + 'countdown means. Once 14 February has passed, the count rolls over to next year rather than going '
    + 'negative, and the "days since" line keeps the last one in view.</p>');
});
JS,
];
