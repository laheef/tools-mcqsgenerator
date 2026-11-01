<?php
/**
 * /everyday-life/60-day — the day counts, stated instead of walked.
 *
 * `time_working` was published as milliseconds (4 566 857 141 for a 75-day
 * range) and the weekday loop in `custom_time` walked the range one
 * millisecond-based day at a time: on an untouched form that ran for ever and
 * froze the tab. The supplement replaces the script with the counting itself.
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceJs' => true,
    'js' => <<<'JS'
/*
 * The harvested script answers the same question two ways and got the second
 * one wrong: `time_working` came back as 4 566 857 141 (a day count multiplied
 * by 86 400 000 on its way out), and the weekday loop behind `custom_time`
 * walked the range one day at a time from a millisecond timestamp — a trillion
 * turns, which froze the tab before it froze the sweep.
 *
 * The counts are simple enough to state directly. Dates arrive as epoch
 * milliseconds; a day is 86 400 000 of them; the working week is Monday to
 * Friday; the two-state boxes carry the option's own numeric value.
 */
omni.onResult([], function (ctx) {
  var ms1 = Number(ctx.getInput('date1'));
  var ms2 = Number(ctx.getInput('date2'));
  if (!isFinite(ms1) || !isFinite(ms2) || !ms1 || !ms2) return;

  var start = Math.min(ms1, ms2), end = Math.max(ms1, ms2);
  var endInclusive = Number(ctx.getInput('include_end_date')) ? 1 : 0;
  var days = Math.round((end - start) / 86400000);

  ctx.exportValue('time_between', days + endInclusive);

  var dow = function (t) { return new Date(t).getUTCDay(); };
  var total = 0, working = 0;
  var picked = [];
  ['mondays', 'tuesdays', 'wednesdays', 'thursdays', 'fridays', 'saturdays', 'sundays']
    .forEach(function (name, i) {
      if (Number(ctx.getInput(name))) picked.push((i + 1) % 7);   // Mon = 1 … Sun = 0
    });
  var exclude = Number(ctx.getInput('include_exclude_days')) === 1;
  var limit = end + (endInclusive ? 86400000 : 0);
  for (var t = start; t < limit; t += 86400000) {
    var d = dow(t);
    total++;
    if (d !== 0 && d !== 6) working++;
    if (picked.length) {
      var hit = picked.indexOf(d) >= 0;
      if (!exclude && hit) ctx.__custom = (ctx.__custom || 0) + 1;
    }
  }
  ctx.exportValue('time_working', working);
  if (!picked.length) {
    ctx.exportValue('custom_time', null);
  } else {
    var count = 0, limit2 = end + (endInclusive ? 86400000 : 0);
    for (var t2 = start; t2 < limit2; t2 += 86400000) {
      var dd = dow(t2);
      var chosen = picked.indexOf(dd) >= 0;
      /* Include selected days, or include everything but them — the radio
         above the weekday row says which one the visitor meant. */
      if (exclude ? !chosen : chosen) count++;
    }
    ctx.exportValue('custom_time', count);
  }
});
JS,
];
