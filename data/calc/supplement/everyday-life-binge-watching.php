<?php
/**
 * Binge watching — how long a series takes at the pace you can actually keep.
 *
 * The page arrived as an article with no form. The repair adds the three numbers
 * a binge plan needs and the four it gives back:
 *
 *   total minutes = episodes × minutes per episode
 *   days needed   = total minutes ÷ (hours a day × 60)
 *   per sitting   = episodes that fit in the hours you have
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'bw_total_hours' => sup_dep('1'),
        'bw_days' => sup_dep('1'),
        'bw_per_day' => sup_dep('1'),
        'bw_weeks' => sup_dep('1'),
        'bw_total_episodes' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-binge-inputs', 'The series and your evenings', [
            sup_field(sup_num('episodes', 'How many episodes are there?')),
            sup_field(sup_num('minutes_per_episode', 'Minutes per episode (including the recap)')),
            sup_field(sup_num('hours_per_day', 'Hours you can watch in a day')),
        ]),
        sup_group('supp-binge-results', 'Results', [
            sup_field(sup_out('bw_total_hours', 'Total watching time (hours)')),
            sup_field(sup_out('bw_days', 'Days to finish at that pace')),
            sup_field(sup_out('bw_per_day', 'Episodes per sitting')),
            sup_field(sup_out('bw_weeks', 'Weeks if you watch every day')),
            sup_field(sup_out('bw_total_episodes', 'Episodes in the series')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['episodes', 'minutes_per_episode', 'hours_per_day'], function (ctx, v) {
  var episodes = num('episodes');
  var perEpisode = num('minutes_per_episode');
  var hours = num('hours_per_day');

  if (episodes === null || episodes <= 0) {
    ctx.addUnmetCondition('Enter how many episodes there are.');
    return;
  }
  if (perEpisode === null || perEpisode <= 0) {
    ctx.addUnmetCondition('Enter how long one episode runs, in minutes.');
    return;
  }
  if (hours === null || hours <= 0) {
    ctx.addUnmetCondition('Enter how many hours a day you can watch.');
    return;
  }
  if (hours > 24) {
    ctx.addUnmetCondition('There are only 24 hours in a day.');
    return;
  }

  var totalMinutes = episodes * perEpisode;
  var totalHours = totalMinutes / 60;
  var minutesAvailable = hours * 60;
  var perDay = minutesAvailable / perEpisode;          /* episodes that fit */
  var fullEpisodes = Math.floor(perDay);
  var days = totalMinutes / minutesAvailable;

  ctx.exportValue('bw_total_hours', sround(totalHours, 1));
  ctx.exportValue('bw_days', sround(days, 1));
  ctx.exportValue('bw_per_day', sround(perDay, 1));
  ctx.exportValue('bw_weeks', sround(days / 7, 1));
  ctx.exportValue('bw_total_episodes', Math.round(episodes));

  var headline = Math.round(episodes) + ' episodes of ' + snum(perEpisode, 0) + ' minutes is '
    + snum(totalHours, 1) + ' hours of television. At ' + snum(hours, 1) + ' hours a day that is '
    + snum(days, 1) + ' days';
  if (fullEpisodes >= 1) {
    headline += ' — ' + fullEpisodes + ' whole episode' + (fullEpisodes === 1 ? '' : 's')
      + ' per sitting, with ' + snum(minutesAvailable - fullEpisodes * perEpisode, 0)
      + ' minutes left over.';
  } else {
    headline += ' — less than one episode per sitting, so a single episode will spill into the next day.';
  }
  ctx.addHtml('<p><strong>' + headline + '</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Episodes', String(Math.round(episodes))],
    ['Minutes per episode', snum(perEpisode, 1)],
    ['Total minutes', snum(totalMinutes, 0)],
    ['Total hours', snum(totalHours, 1)],
    ['Hours a day', snum(hours, 1)],
    ['Episodes per sitting', snum(perDay, 2)],
    ['Whole episodes per sitting', String(fullEpisodes)],
    ['Days to finish', snum(days, 1)],
    ['Weeks to finish', snum(days / 7, 1)],
    ['Sleep lost per night if you push for one more', snum((perDay - fullEpisodes) * perEpisode, 0)
      + ' minutes of the next episode']
  ]));

  /* the same series at other paces */
  var rows = [1, 2, 3, 4, 6].map(function (h) {
    return [snum(h, 0) + ' h a day', snum(totalMinutes / (h * 60), 1) + ' days',
      snum(Math.floor(h * 60 / perEpisode), 0) + ' episodes a day'];
  });
  ctx.addHtml('<p>The same series at other paces:</p>');
  ctx.addHtml(stable(['Watching', 'Days to finish', 'Episodes a sitting'], rows));

  ctx.addHtml('<p class="calc-unmet">The arithmetic assumes every episode runs the same length and that '
    + 'nothing interrupts you — no adverts, no pausing to make tea, and no skipping the title sequence. '
    + 'Streaming episodes usually carry a recap and credits that a binge-watcher skips, which is why the '
    + '"minutes per episode" box is worth filling in from the actual runtime rather than a guess. Series '
    + 'finales and pilot episodes are often half an hour longer than the rest; if the run matters, treat '
    + 'them as a separate line. And a "day" here means one sitting, not 24 hours — the calculator has no '
    + 'opinion about whether you do this on consecutive evenings or every Sunday.</p>');
});
JS,
];
