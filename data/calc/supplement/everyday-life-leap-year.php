<?php
/**
 * Leap year — whether a year has the extra day, and which years in a range do.
 *
 * The page has three boxes (a year, and the two ends of a range) and published
 * its answers as `range`, a name the definition does not declare, so nothing
 * landed. The `Is it a leap year` row it does show was frozen at 0: 2024 came
 * back "not a leap year".
 *
 * The repair computes both here, with the century rule the page was missing:
 * a year divisible by 4 is a leap year, unless it is a century year that is not
 * divisible by 400 — 1900 is not, 2000 is.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'leapYear'     => ['label' => 'Is it a leap year (1 = yes)', 'precision' => '0'],
        'range'        => ['label' => 'Leap years in the range'],
        'leap_count'   => ['label' => 'How many of them', 'precision' => '0'],
        'next_leap'    => ['label' => 'Next leap year at or after it', 'precision' => '0'],
        'days_in_year' => ['label' => 'Days in that year', 'precision' => '0'],
    ],
    'js' => <<<'JS'
function lyNum(ctx, name) {
  var raw = String(ctx.getRawInput(name) || '').trim();
  if (raw === '') { return null; }
  var n = Number(raw.replace(/\s/g, '').replace(',', '.'));
  return isFinite(n) ? n : null;
}

function lyIsLeap(y) {
  return (y % 4 === 0 && y % 100 !== 0) || y % 400 === 0;
}

function lyNext(y) {
  while (!lyIsLeap(y)) { y++; }
  return y;
}

omni.onResult([], function (ctx, values) {
  var year = lyNum(ctx, 'year');
  var from = lyNum(ctx, 'rangeOne');
  var to = lyNum(ctx, 'rangeTwo');

  ctx.exportValue('leapYear', year === null ? null : (lyIsLeap(year) ? 1 : 0));
  ctx.exportValue('next_leap', year === null ? null : lyNext(year));
  ctx.exportValue('days_in_year', year === null ? null : (lyIsLeap(year) ? 366 : 365));

  if (year !== null) {
    var why;
    if (year % 400 === 0) { why = 'a century year divisible by 400'; }
    else if (year % 100 === 0) { why = 'a century year that 400 does not divide — the exception'; }
    else if (year % 4 === 0) { why = 'divisible by 4 and not a century year'; }
    else { why = 'not divisible by 4'; }
    ctx.addHtml('<p><strong>' + snum(year, 0) + (lyIsLeap(year) ? ' is' : ' is not') + ' a leap year</strong> '
      + '(' + why + ').</p>');
  }

  var list = [], count = 0, shown = '';
  if (from !== null && to !== null && to >= from) {
    var step = to - from > 400 ? 4 : 1;
    if (step === 4) {
      for (var y = from; y <= to; y++) {
        if (lyIsLeap(y)) { list.push(y); }
      }
    } else {
      for (var y2 = from; y2 <= to; y2++) {
        if (lyIsLeap(y2)) { list.push(y2); }
      }
    }
    count = list.length;
    shown = list.length ? list.join(', ') : 'none in that range';
    if (list.length > 40) {
      shown = list.slice(0, 40).join(', ') + ' … (' + list.length + ' in all)';
    }
  }
  ctx.exportValue('range', from !== null && to !== null && to >= from ? shown : null);
  ctx.exportValue('leap_count', from !== null && to !== null && to >= from ? count : null);

  var rows = [];
  if (year !== null) {
    rows.push(['Year', snum(year, 0)]);
    rows.push(['Leap year?', lyIsLeap(year) ? 'yes — 366 days' : 'no — 365 days']);
    rows.push(['Next leap year', snum(lyNext(year), 0)]);
  }
  if (from !== null && to !== null && to >= from) {
    rows.push(['Leap years between ' + snum(from, 0) + ' and ' + snum(to, 0), String(count)]);
    rows.push(['Which ones', shown]);
  }
  if (rows.length) { ctx.addHtml(stable(['Quantity', 'Value'], rows)); }

  if (year === null && (from === null || to === null)) {
    ctx.addUnmetCondition('Enter a year to test, or both ends of a range to list the leap years in it.');
    return;
  }
  ctx.addHtml('<p class="calc-note">The Julian rule alone — a leap year every four years — would drift '
    + 'because a solar year is 365.2422 days, not 365.25. The Gregorian calendar therefore skips three of the '
    + 'four century years: 1700, 1800 and 1900 were not leap years, while 1600 and 2000 were. February gains '
    + 'a 29th day, which is why a leap year has 366 days, and the rule is why a birthday on 29 February is '
    + 'usually celebrated on the 28th in ordinary years.</p>');
});
JS,
];
