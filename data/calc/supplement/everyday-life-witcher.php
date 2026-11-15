<?php
/**
 * Repair the harvested Witcher plan: its dependent book/game flags are missing,
 * and its time-valued fields are used as if they were dimensionless rates.
 * Recompute the visible durations and finish dates from the visitor's choices.
 */
return [
    'hideTexts' => true,
    'showIf' => [
        'readingSpeedOptions' => 'whatYouWannaDo == 1 or whatYouWannaDo == 3',
        'readingSpeed' => 'readingSpeedOptions == 0',
        'readingTimePerDay' => 'whatYouWannaDo == 1 or whatYouWannaDo == 3',
        'orderOfReading' => 'whatYouWannaDo == 1 or whatYouWannaDo == 3',
        'readingAndGameOrder' => 'whatYouWannaDo == 3',
        'playStyle' => 'whatYouWannaDo == 2 or whatYouWannaDo == 3',
        'expansions' => 'whatYouWannaDo == 2 or whatYouWannaDo == 3',
        'gameTimePerDay' => 'whatYouWannaDo == 2 or whatYouWannaDo == 3',
        'episodesPerDay' => 'whatYouWannaDo == 4',
        'Vesemir' => 'whatYouWannaDo == 4',
    ],
    'outputs' => [
        'readingDaysTotal' => 'Reading days',
        'readingFinishDate' => 'Reading finish date',
        'gameDaysTotal' => 'Gaming days',
        'gameFinishDate' => 'Game finish date',
        'readingAndGameDaysTotal' => 'Reading and gaming days',
        'bothFinishDate' => 'Combined finish date',
        'seriesDays' => 'Series days',
        'seriesFinishDate' => 'Series finish date',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, values) {
  var mode = Number(values.whatYouWannaDo);
  var derived = [];
  for (var i = 1; i <= 8; i++) derived.push('readingDays' + i);
  for (var j = 1; j <= 5; j++) {
    derived.push('gameHours' + j, 'gameDays' + j);
  }
  derived.push('readingDaysTotal', 'readingFinishDate', 'gameDaysTotal',
    'gameFinishDate', 'readingAndGameDaysTotal', 'bothFinishDate',
    'seriesDays', 'seriesFinishDate');
  derived.forEach(function (name) { ctx.exportValue(name, null); });

  var start = Number(values.startDate);
  function finish(name, days) {
    if (isFinite(start) && start > 0) {
      ctx.exportValue(name, start + days * 86400000);
    }
  }
  function daysForBooks() {
    var rate = Number(values.readingSpeedOptions);
    var pagesPerMinute = { 1: 0.25, 2: 0.5, 3: 1 }[rate];
    if (rate === 0) {
      var custom = Number(values.readingSpeed);
      if (custom > 0) {
        pagesPerMinute = custom;
        ctx.addHtml('<p class="calc-note">Custom rate is interpreted as pages per minute; its unit selector is ignored.</p>');
      }
    }
    var minutesPerDay = Number(values.readingTimePerDay);
    var minuteFactors = { sec: 1 / 60, min: 1, hrs: 60, days: 1440,
      wk: 10080, wks: 10080, mos: 43829.1, yrs: 525949.2 };
    minutesPerDay *= minuteFactors[ctx.getUnit('readingTimePerDay')] || 1;
    var order = Number(values.orderOfReading);
    var pages = order === 3 ? 288 + 385
      : order === 4 ? 324 + 337 + 378 + 439 + 540
      : 288 + 366 + 385 + 324 + 337 + 378 + 439 + 540;
    if (!(pagesPerMinute > 0 && minutesPerDay > 0 && pages > 0)) return null;
    return Math.ceil(pages / (pagesPerMinute * minutesPerDay));
  }
  function gamePlan() {
    var style = Math.round(Number(values.playStyle));
    var hoursByStyle = {
      1: [35.5, 24, 51, 10, 15],
      2: [46, 34, 103, 14, 28],
      3: [64.5, 54, 174, 19, 41],
      4: [24.5, 16, 21, 10, 15]
    }[style];
    var hoursPerDay = Number(values.gameTimePerDay);
    var hourFactors = { sec: 1 / 3600, min: 1 / 60, hrs: 1, days: 24,
      wk: 168, wks: 168, mos: 730.485, yrs: 8765.82 };
    hoursPerDay *= hourFactors[ctx.getUnit('gameTimePerDay')] || 1;
    if (!hoursByStyle || !(hoursPerDay > 0)) return null;
    var includeExpansions = Number(values.expansions) === 1;
    var totalHours = hoursByStyle[0] + hoursByStyle[1] + hoursByStyle[2];
    for (var k = 0; k < 5; k++) {
      var gameHours = k < 3 || includeExpansions ? hoursByStyle[k] : null;
      if (gameHours === null) {
        ctx.exportValue('gameHours' + (k + 1), null);
        ctx.exportValue('gameDays' + (k + 1), null);
        continue;
      }
      ctx.exportValue('gameHours' + (k + 1), gameHours);
      var gameDays = Math.ceil(gameHours / hoursPerDay);
      ctx.exportValue('gameDays' + (k + 1), gameDays);
      if (k >= 3) totalHours += gameHours;
    }
    return Math.ceil(totalHours / hoursPerDay);
  }

  if (mode === 1 || mode === 3) {
    var readingDays = daysForBooks();
    if (readingDays !== null) {
      if (mode === 1) {
        ctx.exportValue('readingDaysTotal', readingDays);
        finish('readingFinishDate', readingDays);
      } else {
        ctx.exportValue('readingDaysTotal', readingDays);
      }
    }
  }
  if (mode === 2 || mode === 3) {
    var gamingDays = gamePlan();
    if (gamingDays !== null) {
      if (mode === 2) {
        ctx.exportValue('gameDaysTotal', gamingDays);
        finish('gameFinishDate', gamingDays);
      } else {
        ctx.exportValue('gameDaysTotal', gamingDays);
      }
    }
  }
  if (mode === 3 && readingDays !== null && gamingDays !== null) {
    var combinedDays = readingDays + gamingDays;
    ctx.exportValue('readingAndGameDaysTotal', combinedDays);
    finish('bothFinishDate', combinedDays);
  }
  if (mode === 4) {
    var episodesPerDay = Number(values.episodesPerDay);
    var extra = Number(values.Vesemir) === 1 ? 1 : 0;
    if (episodesPerDay > 0) {
      var series = Math.ceil((8 + extra) / episodesPerDay);
      ctx.exportValue('seriesDays', series);
      finish('seriesFinishDate', series);
    }
  }
});
JS,
];
