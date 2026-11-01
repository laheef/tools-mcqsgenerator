<?php
/**
 * School age — when a child starts school, which year they are in now, and when
 * they finish.
 *
 * The harvested page asked for a birthday, a country and a state and then
 * answered nothing. The rule behind it is a cut-off date: a child born before
 * the cut-off starts in the September of the year they turn five (in the US),
 * and in England, Wales and Northern Ireland a child starts in the September
 * after their fifth birthday provided they were five by 31 August.
 *
 * Cut-off dates differ by state and by district — about half the states use
 * 1 September and the rest sit between 1 August and 1 December — so the page
 * reports the standard date it applied and warns when the birthday is close
 * enough to it for the district's own date to change the answer.
 */
return [
    'hideTexts' => true,
    'showIf' => [
        'state_VS' => 'country_VS == 0',
        'uk_country_VS' => 'country_VS == 1',
    ],
    'vars' => [
        'start_date_day' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'start_age' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'grade_now' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'finish_year' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'days_to_start' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-school-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'start_date_day', 'vt' => 'dependent', 'l' => 'First day of school (day number, see the table for the date)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'start_age', 'vt' => 'dependent', 'l' => 'Age on that first day (years)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'grade_now', 'vt' => 'dependent', 'l' => 'Years of school completed today (0 = not started yet)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'finish_year', 'vt' => 'dependent', 'l' => 'Year they finish secondary school']]]],
            ['FR1', [[['t' => 'v', 'n' => 'days_to_start', 'vt' => 'dependent', 'l' => 'Days until their first day (negative = already started)']]]],
        ],
    ]],
    'js' => <<<'JS'
/*
 * A date arrives either as a day number since 1970-01-01 (the engine's own
 * convention) or as the YYYY-MM-DD string the picker shows, depending on which
 * of the two boxes the value came from — accept both.
 */
function sd(value) {
  if (typeof value === 'string') {
    var m = value.match(/^(\d{4})-(\d{2})-(\d{2})/);
    if (!m) { return null; }
    return new Date(Date.UTC(Number(m[1]), Number(m[2]) - 1, Number(m[3])));
  }
  var n = Number(value);
  if (!isFinite(n) || n === 0) { return null; }
  return new Date(Math.abs(n) > 1e11 ? n : Math.round(n) * 86400000);
}
function sDay(date) {
  return Math.floor(Date.UTC(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate()) / 86400000);
}
function sLabel(date) {
  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                'August', 'September', 'October', 'November', 'December'];
  return date.getUTCDate() + ' ' + months[date.getUTCMonth()] + ' ' + date.getUTCFullYear();
}
/* age in years, to two decimals, between two dates */
function ageAt(birth, when) {
  return (when.getTime() - birth.getTime()) / (365.2425 * 86400000);
}

omni.onResult(['birthdayDate', 'country_VS'], function (ctx, v) {
  var raw = v.birthdayDate;
  var birth = sd(raw);
  if (raw === '' || raw === undefined || raw === null || birth === null) {
    ctx.addUnmetCondition('Enter the child\'s date of birth.');
    return;
  }
  var today = new Date();
  var age = ageAt(birth, today);
  if (age < 0) {
    ctx.addUnmetCondition('That date is in the future — check the date of birth.');
    return;
  }
  if (age > 19) {
    ctx.addUnmetCondition('That is ' + snum(age, 0) + ' years old — this calculator is for children of school age.');
    return;
  }

  var country = Math.round(Number(v.country_VS));
  var uk = country === 1;
  var ukCountry = Math.round(Number(v.uk_country_VS)) || 1;

  var cutoffMonth, cutoffDay, place, startYear, note, warn = '';
  var by = birth.getUTCFullYear();
  var bornBeforeCutoff = false;

  if (uk) {
    /* England, Wales, Northern Ireland: five by 31 August, start that September.
       Scotland: five by the end of February, start the following August. */
    if (ukCountry === 3) {
      cutoffMonth = 1; cutoffDay = 28;                             /* end of February */
      startYear = (birth.getUTCMonth() > 1
        || (birth.getUTCMonth() === 1 && birth.getUTCDate() > 28)) ? by + 6 : by + 5;
      place = 'Scotland';
      note = 'In Scotland a child starts in the August after their fifth birthday if they turned five by the '
        + 'end of February; children born from March onwards start the following year.';
    } else {
      cutoffMonth = 7; cutoffDay = 31;                             /* 31 August */
      bornBeforeCutoff = birth.getUTCMonth() < 7
        || (birth.getUTCMonth() === 7 && birth.getUTCDate() <= 31);
      startYear = bornBeforeCutoff ? by + 5 : by + 6;
      place = ukCountry === 2 ? 'Northern Ireland' : (ukCountry === 4 ? 'Wales' : 'England');
      note = 'In ' + place + ' a child starts reception in the September after their fifth birthday, '
        + 'provided they were five by 31 August; a child born in September starts the next year.';
    }
  } else {
    cutoffMonth = 8; cutoffDay = 1;                                /* 1 September */
    bornBeforeCutoff = birth.getUTCMonth() < 8
      || (birth.getUTCMonth() === 8 && birth.getUTCDate() < 2);
    startYear = bornBeforeCutoff ? by + 5 : by + 6;
    var sel = document.querySelector('select[data-var="state_VS"]');
    var stateName = sel && sel.selectedIndex >= 0 ? (sel.options[sel.selectedIndex].text || '').trim() : '';
    place = stateName || 'the United States';
    note = 'In most US states a child may start kindergarten in the school year in which they turn five by '
      + 'the district\'s cut-off date, which here is taken as 1 September. About half the states use exactly '
      + 'that date and the rest use a date between 1 August and 1 December.';
    if (!stateName) {
      ctx.addUnmetCondition('Choose the state, so the cut-off can be checked against it.');
      return;
    }
  }

  /* the first day of school, in the September (or August, in Scotland) of startYear */
  var startMonth = uk && ukCountry === 3 ? 7 : (uk ? 8 : 8);
  var start = new Date(Date.UTC(startYear, startMonth, 1));
  var startAge = ageAt(birth, start);

  /* the year group: one school year per 12 months since the first day */
  var grade = Math.floor((today.getTime() - start.getTime()) / (365.2425 * 86400000));
  var gradeNow = grade < 0 ? 0 : grade;

  /* secondary school ends at 18 in both countries: 13 years of school from reception */
  var finish = uk ? startYear + 13 : startYear + 13;

  var daysTo = Math.round((start.getTime() - today.getTime()) / 86400000);

  ctx.exportValue('start_date_day', sDay(start));
  ctx.exportValue('start_age', sround(startAge, 2));
  ctx.exportValue('grade_now', sround(gradeNow, 2));
  ctx.exportValue('finish_year', finish);
  ctx.exportValue('days_to_start', daysTo);

  /* a birthday within a few weeks of the cut-off is the one that moves */
  var gapDays = Math.round((new Date(Date.UTC(by, cutoffMonth, cutoffDay)).getTime()
    - birth.getTime()) / 86400000);
  if (Math.abs(gapDays) <= 45) {
    warn = ' <strong>Their birthday is ' + Math.abs(gapDays) + ' days from the cut-off</strong>, which is '
      + 'the one case where the local admissions date can move the start by a whole year — ask '
      + (uk ? 'the council\'s school admissions team' : 'the district admissions office')
      + ' before planning around this date.';
  }

  ctx.addHtml('<p><strong>A child born on ' + sLabel(birth) + ' in ' + place + ' starts school on '
    + sLabel(start) + ', at ' + snum(startAge, 2) + ' years old'
    + (daysTo > 0 ? ' — ' + snum(daysTo, 0) + ' days from today.' : ' — that has already happened.')
    + '</strong>' + warn + '</p>');

  var rows = [
    ['Date of birth', sLabel(birth)],
    ['Age today', snum(age, 2) + ' years'],
    ['Country', uk ? 'United Kingdom' : 'United States'],
    ['Place used', place],
    ['Cut-off applied', cutoffDay + ' ' + ['January', 'February', 'March', 'April', 'May', 'June', 'July',
      'August', 'September', 'October', 'November', 'December'][cutoffMonth] + ' in their birth year'],
    ['First day', sLabel(start)],
    ['Age on the first day', snum(startAge, 2)],
    ['Years of school completed', gradeNow <= 0 ? 'not started yet' : snum(gradeNow, 0) + ' year' + (gradeNow === 1 ? '' : 's')],
    ['Finishes secondary school', String(finish) + ' (aged about ' + snum(finish - by, 0) + ')'],
    ['Days until the first day', String(daysTo)]
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  /* the same birthday at each month of the year, so the cut-off is easy to see */
  var edge = [];
  [1, 3, 5, 7, 8, 9, 11].forEach(function (m) {
    var probe = new Date(Date.UTC(by, m - 1, 15));
    var before = uk
      ? (ukCountry === 3 ? (m <= 2) : (m < 9))
      : (m < 9);
    var yr = before ? by + 5 : by + 6;
    edge.push([sLabel(probe), String(yr), before ? 'starts that year' : 'starts the year after']);
  });
  ctx.addHtml('<p>Where the cut-off falls, for a child born in ' + by + ':</p>');
  ctx.addHtml(stable(['Born on', 'Starts school in', 'Why'], edge));

  ctx.addHtml('<p class="calc-unmet">' + note + ' The school year group is the count of completed years since '
    + 'that first day, which is why a child who is old for their year can be nearly a full year ahead of a '
    + 'classmate born in the same September. Both countries also allow a later start — in England a child '
    + 'can start in the term after their fifth birthday rather than in September, and every US state allows '
    + 'a parent to hold a child back a year — and the age at which school is compulsory differs from the age '
    + 'at which it is offered. Check the local admissions rules for the year you actually need.</p>');
});
JS,
];
