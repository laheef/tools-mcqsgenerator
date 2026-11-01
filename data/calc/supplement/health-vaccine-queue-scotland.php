<?php
/**
 * Vaccine queue — Scotland.
 *
 * The page arrived as an article with no form: nothing to fill in, nothing to
 * press. The repair adds the queue arithmetic the article describes — doses,
 * pace, and the date the last arm is reached — with the country's own priority
 * order named in the working.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'supp_population' => ['type' => 'numerical'],
        'supp_doses_per_day' => ['type' => 'numerical'],
        'supp_doses_per_person' => ['type' => 'valueSelect'],
        'supp_already' => ['type' => 'numerical'],
        'supp_ahead' => ['type' => 'numerical'],
        'supp_start' => ['type' => 'date'],
        'supp_total_doses' => sup_dep('0'),
        'supp_days' => sup_dep('0'),
        'supp_people_per_day' => sup_dep('0'),
        'supp_days_to_you' => sup_dep('0'),
        'supp_weeks' => sup_dep('1'),
    ],
    'groups' => [
        sup_group('supp-queue-inputs', 'The queue', [
            sup_field(sup_num('supp_population', 'Population to be vaccinated')),
            sup_field(sup_num('supp_doses_per_day', 'Doses that can be given each day')),
            sup_field(sup_sel('supp_doses_per_person', 'Doses per person', [
                ['supp-pp-1', 'One dose per person', '1'],
                ['supp-pp-2', 'Two doses per person', '2'],
            ])),
            sup_field(sup_num('supp_already', 'Doses already given (leave empty for none)')),
            sup_field(sup_num('supp_ahead', 'People ahead of you in the queue (leave empty if you are not waiting)')),
            sup_field(sup_date('supp_start', 'First day of the campaign')),
        ]),
        sup_group('supp-queue-results', 'Results', [
            sup_field(sup_out('supp_total_doses', 'Total doses needed')),
            sup_field(sup_out('supp_days', 'Days to finish')),
            sup_field(sup_out('supp_weeks', 'Weeks to finish')),
            sup_field(sup_out('supp_people_per_day', 'People fully vaccinated per day')),
            sup_field(sup_out('supp_days_to_you', 'Days until your turn')),
        ]),
    ],
    'datasets' => sup_datasets(),
    'js' => <<<'JS'

var DAY = 86400000;

/* the text of the option chosen in a picker, whether it is a select or radios */
function chosenText(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel && sel.selectedIndex >= 0) { return (sel.options[sel.selectedIndex].text || '').trim(); }
  var r = document.querySelector('input[type="radio"][name="' + name + '"]:checked');
  if (r) {
    var host = r.closest('label') || r.parentNode;
    return (host.innerText || host.textContent || '').replace(/\s+/g, ' ').trim();
  }
  return '';
}

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

/* epoch milliseconds of the date box, or null */
function dateMs(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || !el.value) { return null; }
  var m = /^(\d{4})-(\d{2})-(\d{2})/.exec(el.value);
  if (m) { return Date.UTC(+m[1], +m[2] - 1, +m[3]); }
  var ms = Date.parse(el.value);
  return isNaN(ms) ? null : ms;
}

function prettyDay(ms) {
  if (ms === null) { return '—'; }
  var d = new Date(ms);
  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                'August', 'September', 'October', 'November', 'December'];
  return d.getUTCDate() + ' ' + months[d.getUTCMonth()] + ' ' + d.getUTCFullYear();
}

omni.onResult(['supp_population', 'supp_doses_per_day', 'supp_doses_per_person'], function (ctx, v) {
  var population = num('supp_population');
  var perDay = num('supp_doses_per_day');
  var already = num('supp_already');
  var ahead = num('supp_ahead');
  var start = dateMs('supp_start');

  if (population === null || population <= 0) {
    ctx.addUnmetCondition('Enter the population to be vaccinated.');
    return;
  }
  if (perDay === null || perDay <= 0) {
    ctx.addUnmetCondition('Enter how many doses can be given each day.');
    return;
  }
  if (already === null) { already = 0; }
  if (ahead === null || ahead < 0) { ahead = 0; }

  /* one dose or two, read from the picker's label */
  var text = chosenText('supp_doses_per_person');
  var perPerson = /one|1/i.test(text) ? 1 : 2;

  var totalDoses = population * perPerson;
  var remaining = Math.max(0, totalDoses - already);
  var daysTotal = remaining / perDay;
  var peoplePerDay = perDay / perPerson;

  /* the queue: how long until the people ahead of you are done */
  var daysToYou = ahead / peoplePerDay;
  var daysToFinishAfterYou = Math.max(0, (population - ahead) / peoplePerDay);

  ctx.exportValue('supp_total_doses', Math.round(totalDoses));
  ctx.exportValue('supp_days', Math.round(daysTotal));
  ctx.exportValue('supp_people_per_day', Math.round(peoplePerDay));
  ctx.exportValue('supp_days_to_you', Math.round(daysToYou));
  ctx.exportValue('supp_weeks', Math.round(daysTotal / 7 * 10) / 10);

  var finish = start === null ? null : start + Math.round(daysTotal) * DAY;
  var yourDay = start === null ? null : start + Math.round(daysToYou) * DAY;

  var head = 'At ' + snum(perDay, 0) + ' doses a day, ' + "Scotland" + ' needs '
    + Math.round(totalDoses).toLocaleString() + ' doses for ' + Math.round(population).toLocaleString()
    + ' people at ' + perPerson + ' dose' + (perPerson === 1 ? '' : 's') + ' each — '
    + (daysTotal < 1 ? 'less than a day' : Math.round(daysTotal).toLocaleString() + ' days')
    + ' of work, about ' + snum(daysTotal / 7, 1) + ' weeks.';
  if (finish !== null) {
    head += ' Starting on ' + prettyDay(start) + ' and working every day, the last dose goes in on '
      + prettyDay(finish) + '.';
  }
  ctx.addHtml('<p><strong>' + head + '</strong></p>');

  var rows = [
    ['Population', Math.round(population).toLocaleString()],
    ['Doses per person', String(perPerson)],
    ['Total doses needed', Math.round(totalDoses).toLocaleString()],
    ['Already given', Math.round(already).toLocaleString(),],
    ['Still to give', Math.round(remaining).toLocaleString()],
    ['Doses per day', Math.round(perDay).toLocaleString()],
    ['People fully vaccinated per day', Math.round(peoplePerDay).toLocaleString()],
    ['Days to finish', Math.round(daysTotal).toLocaleString()],
    ['Weeks to finish', snum(daysTotal / 7, 1)],
    ['Finish date', finish === null ? 'enter a start date to see it' : prettyDay(finish)]
  ];
  if (ahead > 0) {
    rows.push(['People ahead of you', Math.round(ahead).toLocaleString()]);
    rows.push(['Days until your turn', Math.round(daysToYou).toLocaleString()]);
    rows.push(['Your date', yourDay === null ? 'enter a start date to see it' : prettyDay(yourDay)]);
    rows.push(['Days from your turn to the end', Math.round(daysToFinishAfterYou).toLocaleString()]);
  }
  ctx.addHtml(stable(['Item', 'Value'], rows));

  /* what a change of pace would do, so the answer can be argued with */
  var pace = [0.5, 1, 2, 5].map(function (mult) {
    var d = remaining / (perDay * mult);
    return [snum(perDay * mult, 0) + ' a day', Math.round(d).toLocaleString() + ' days',
      snum(d / 7, 1) + ' weeks',
      start === null ? '—' : prettyDay(start + Math.round(d) * DAY)];
  });
  ctx.addHtml('<p>The same queue at different speeds:</p>');
  ctx.addHtml(stable(['Doses per day', 'Days', 'Weeks', 'Finish date'], pace));

  ctx.addHtml('<p class="calc-unmet">This is a queue, not an epidemic model: it assumes the doses arrive '
    + 'at a steady rate, that every dose finds an arm the same day, and that nobody refuses. Real rollouts '
    + 'ramp up, stall on deliveries, and lose a slice of every shipment to cold-chain failures and '
    + 'no-shows, so a real finish date usually slips by a month or two against a straight-line estimate. '
    + 'The order the doses are offered in is the policy question — ' + "the JCVI order used in Scotland — care-home residents and staff, the over-80s, front-line health staff, then the clinically vulnerable, then the age bands" + ' — which is why the '
    + 'calculator also reports how long the people ahead of you will take, rather than only the date the '
    + 'whole population is covered.</p>');
});

JS,
];
