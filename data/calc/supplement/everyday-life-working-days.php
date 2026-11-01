<?php
/**
 * Working days — the same count under the page's other name (see the
 * business-days repair): the answer was published as `days_count`, which the
 * definition does not declare.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    /* the page's own hook walks the span a millisecond at a time */
    'replaceJs' => true,
    'outputs' => [
        'days_count'     => ['label' => 'Working days', 'precision' => '0'],
        'calendar_days'  => ['label' => 'Calendar days in the span', 'precision' => '0'],
        'weekend_days'   => ['label' => 'Weekend days inside it', 'precision' => '0'],
        'holidays_used'  => ['label' => 'Holidays you listed', 'precision' => '0'],
    ],
    'js' => <<<'JS'
function wdDate(name) {
  var el = document.querySelector('.calc-widget input[data-var="' + name + '"]');
  if (!el || !el.value) { return null; }
  var parts = String(el.value).split('-');
  if (parts.length !== 3) { return null; }
  return new Date(Date.UTC(Number(parts[0]), Number(parts[1]) - 1, Number(parts[2])));
}

omni.onResult([], function (ctx, values) {
  var clear = function () {
    ['days_count', 'calendar_days', 'weekend_days', 'holidays_used'].forEach(function (n) {
      ctx.exportValue(n, null);
    });
  };
  var start = wdDate('start_date'), end = wdDate('end_date');
  if (!start || !end) {
    clear();
    ctx.addUnmetCondition('Enter both the start date and the end date.');
    return;
  }
  var rule = Number(values.business_days || 0);
  var includeEnd = Number(values.include_end_date || 0) === 1;
  if (end < start) {
    clear();
    ctx.addUnmetCondition('The end date is before the start date — swap them.');
    return;
  }
  var holidays = {};
  for (var h = 1; h <= 50; h++) {
    var d = wdDate('holiday_' + h);
    if (d) { holidays[d.getTime()] = true; }
  }
  var holidayCount = Object.keys(holidays).length;
  var DAY = 86400000;
  var span = Math.round((end - start) / DAY) + (includeEnd ? 1 : 0);
  var counted = 0, weekend = 0;
  for (var i = 0; i < span; i++) {
    var t = start.getTime() + i * DAY;
    var dow = new Date(t).getUTCDay();
    var off = rule === 1 ? (dow === 0 || dow === 6) : rule === 2 ? dow === 0 : false;
    if (off) { weekend++; }
    if (!off && !holidays[t]) { counted++; }
  }
  ctx.exportValue('days_count', counted);
  ctx.exportValue('calendar_days', span);
  ctx.exportValue('weekend_days', weekend);
  ctx.exportValue('holidays_used', holidayCount);

  ctx.addHtml('<p><strong>' + counted + ' working days</strong> between ' + snum(span, 0) + ' calendar days'
    + (holidayCount ? ', with ' + holidayCount + ' holiday' + (holidayCount === 1 ? '' : 's') + ' removed' : '')
    + '.</p>');
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Calendar days in the span', String(span)],
    ['Weekend days', String(weekend)],
    ['Holidays listed', String(holidayCount)],
    ['Working days', String(counted)]
  ]));
  ctx.addHtml('<p class="calc-note">The count is inclusive only when "Include end date" is set. Weekends follow '
    + 'the rule you picked — both days, Sundays only, or every day counted — and a listed holiday that falls on '
    + 'a weekend is not removed twice. Unused holiday boxes are ignored.</p>');
});
JS,
];
