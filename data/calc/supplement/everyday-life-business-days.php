<?php
/**
 * Business days — the count between two dates, weekends and holidays taken out.
 *
 * The page counted correctly and published the total through
 * `ctx.exportValue("working_days", …)`, a name the definition does not have:
 * the number was computed and dropped, the panel stayed empty, and Calculate
 * answered "Every field already has a value, so there is nothing left to work
 * out" — an instruction to clear a box, when the fault was that the answer had
 * nowhere to land.
 *
 * The repair declares the row. It also adds the two figures the count is made
 * of, because a visitor who sees 22 wants to know how many calendar days that
 * came from.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    /* the page's own hook walks the span a millisecond at a time */
    'replaceJs' => true,
    'outputs' => [
        'working_days'   => ['label' => 'Business days', 'precision' => '0'],
        'calendar_days'  => ['label' => 'Calendar days in the span', 'precision' => '0'],
        'weekend_days'   => ['label' => 'Weekend days inside it', 'precision' => '0'],
        'holidays_used'  => ['label' => 'Holidays you listed', 'precision' => '0'],
    ],
    'js' => <<<'JS'
/* A date box holds an <input type="date">; its value is YYYY-MM-DD. */
function bdDate(name) {
  var el = document.querySelector('.calc-widget input[data-var="' + name + '"]');
  if (!el || !el.value) { return null; }
  var parts = String(el.value).split('-');
  if (parts.length !== 3) { return null; }
  return new Date(Date.UTC(Number(parts[0]), Number(parts[1]) - 1, Number(parts[2])));
}

omni.onResult([], function (ctx, values) {
  var clear = function () {
    ['working_days', 'calendar_days', 'weekend_days', 'holidays_used'].forEach(function (n) {
      ctx.exportValue(n, null);
    });
  };
  var start = bdDate('start_date'), end = bdDate('end_date');
  if (!start || !end) {
    clear();
    ctx.addUnmetCondition('Enter both the start date and the end date.');
    return;
  }
  var rule = Number(values.business_days || 0);      /* 0 all days, 1 weekdays, 2 no Sundays */
  var includeEnd = Number(values.include_end_date || 0) === 1;
  if (end < start) {
    clear();
    ctx.addUnmetCondition('The end date is before the start date — swap them.');
    return;
  }

  /* the days the visitor listed as holidays */
  var holidays = {};
  for (var h = 1; h <= 50; h++) {
    var d = bdDate('holiday_' + h);
    if (d) { holidays[d.getTime()] = true; }
  }
  var holidayCount = Object.keys(holidays).length;

  var DAY = 86400000;
  var span = Math.round((end - start) / DAY) + (includeEnd ? 1 : 0);
  var counted = 0, weekend = 0;
  for (var i = 0; i < span; i++) {
    var t = start.getTime() + i * DAY;
    var dow = new Date(t).getUTCDay();               /* 0 Sunday … 6 Saturday */
    var off = rule === 1 ? (dow === 0 || dow === 6) : rule === 2 ? dow === 0 : false;
    if (off) { weekend++; }
    if (!off && !holidays[t]) { counted++; }
  }

  ctx.exportValue('working_days', counted);
  ctx.exportValue('calendar_days', span);
  ctx.exportValue('weekend_days', weekend);
  ctx.exportValue('holidays_used', holidayCount);

  var ruleText = rule === 1 ? 'weekends excluded' : rule === 2 ? 'Sundays excluded' : 'every day counted';
  ctx.addHtml('<p><strong>' + counted + ' business days</strong> between the two dates, ' + ruleText
    + (holidayCount ? ' and ' + holidayCount + ' holiday' + (holidayCount === 1 ? '' : 's') + ' taken out' : '')
    + '.</p>');
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Calendar days in the span', String(span)],
    ['Weekend days', String(weekend)],
    ['Holidays listed', String(holidayCount)],
    ['Business days', String(counted)]
  ]));
  ctx.addHtml('<p class="calc-note">The end date is counted only when "Include end date" is chosen: a meeting '
    + 'that starts Monday and ends Friday spans four business days, not five, unless the Friday itself is a '
    + 'working day you want inside the count. A holiday that falls at a weekend is only counted once — the '
    + 'weekend rule has already taken that day out. The page holds fifty holiday boxes; leave unused ones '
    + 'empty and they are ignored.</p>');
});
JS,
];
