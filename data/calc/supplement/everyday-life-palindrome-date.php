<?php
/**
 * Palindrome dates between two dates.
 *
 * A date reads as a palindrome when its digits are the same forwards and
 * backwards — 2020-02-02, or 12-02-2021 in DD-MM-YYYY. The page counts them in
 * a range and lists them, honouring the chosen order and whether leading zeros
 * are part of the string.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'first_palindrome' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'palindrome_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'years_per_palindrome' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'palindrome_count', 'vt' => 'dependent', 'l' => 'Palindrome dates in the range']]]],
            ['FR1', [[['t' => 'v', 'n' => 'first_palindrome', 'vt' => 'dependent', 'l' => 'Next one after the start date']]]],
            ['FR1', [[['t' => 'v', 'n' => 'years_per_palindrome', 'vt' => 'dependent',
                       'l' => 'Average gap (years)']]]],
        ],
    ]],
    'js' => <<<'JS'
var MONTHS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

function pad(n, width, zeros) {
  var s = String(n);
  if (!zeros) return s;
  while (s.length < width) s = '0' + s;
  return s;
}

/* the order the visitor chose, as digit groups */
function digitsFor(d, dayFirst, fourDigit, zeros) {
  var y = fourDigit ? pad(d.getFullYear(), 4, true) : pad(d.getFullYear() % 100, 2, true);
  var m = pad(d.getMonth() + 1, 2, zeros);
  var day = pad(d.getDate(), 2, zeros);
  return dayFirst ? (day + m + y) : (m + day + y);
}

omni.onResult([], function (ctx, v) {
  var startMs = Number(v.start_date), endMs = Number(v.end_date);
  if (v.start_date === '' || v.end_date === '' || !isFinite(startMs) || !isFinite(endMs)) {
    ctx.addUnmetCondition('Pick the first and the last day of the range.');
    return;
  }
  var start = new Date(Math.round(startMs)), end = new Date(Math.round(endMs));
  if (end < start) {
    ctx.addUnmetCondition('The range has to end after it starts.');
    return;
  }
  var spanDays = Math.round((end - start) / 86400000);
  if (spanDays > 200000) {
    ctx.addUnmetCondition('That range is over 500 years — pick something shorter.');
    return;
  }
  var dayFirst = Math.round(Number(v.date_format_VS)) === 1;
  var fourDigit = v.year_format_VS === undefined || v.year_format_VS === ''
    ? true : Math.round(Number(v.year_format_VS)) === 1;
  var zeros = String(v.dates_with_leading_zeros_checkbox) === '1';

  /* either "the next N from here" or "everything between the two dates" */
  var nextN = Math.round(Number(v.choice_VS)) === 1;
  var wanted = Math.round(Number(v.number_of_dates));
  if (nextN && (!isFinite(wanted) || wanted < 1)) {
    ctx.addUnmetCondition('Say how many palindrome dates you want.');
    return;
  }
  if (nextN) wanted = Math.min(wanted, 60);

  var found = [];
  var d = new Date(start.getFullYear(), start.getMonth(), start.getDate());
  var last = nextN
    ? new Date(start.getFullYear() + 60, start.getMonth(), start.getDate())
    : new Date(end.getFullYear(), end.getMonth(), end.getDate());
  while (d <= last) {
    var s = digitsFor(d, dayFirst, fourDigit, zeros);
    if (s === s.split('').reverse().join('')) {
      found.push({ date: new Date(d), text: s });
      if (nextN && found.length >= wanted) break;
    }
    d.setDate(d.getDate() + 1);
  }

  var years = nextN
    ? (found.length > 1 ? (found[found.length - 1].date - found[0].date) / 86400000 / 365.25 : 0)
    : spanDays / 365.25;
  ctx.exportValue('palindrome_count', found.length);
  ctx.exportValue('years_per_palindrome',
    found.length > 1 ? sround(years / (found.length - 1), 2) : 0);
  if (found.length) {
    var nice = function (x) {
      return x.getDate() + ' ' + MONTHS[x.getMonth()] + ' ' + x.getFullYear();
    };
    ctx.exportValue('first_palindrome', found[0].date.getFullYear() * 10000
      + (found[0].date.getMonth() + 1) * 100 + found[0].date.getDate());
    ctx.addHtml('<p><strong>' + found.length + (found.length === 1 ? ' palindrome date' : ' palindrome dates')
      + '</strong> between those days' + (found.length ? ', the first being ' + nice(found[0].date) : '')
      + '.</p>');
    var rows = found.slice(0, 12).map(function (f) {
      return [nice(f.date), f.text];
    });
    ctx.addHtml(stable(['Date', 'Digits'], rows));
    if (found.length > 12) {
      ctx.addHtml('<p class="calc-unmet">The table shows the first twelve of ' + found.length + '.</p>');
    }
  } else {
    ctx.exportValue('first_palindrome', 0);
    ctx.addHtml('<p><strong>No palindrome dates in that range.</strong> With leading zeros the digits are '
      + 'fixed-width, so palindromes cluster in the early years of each century; without them most months '
      + 'produce none at all.</p>');
  }
});
JS,
];
