<?php
/**
 * Repair the books-only reading plan on /everyday-life/witcher.
 *
 * The harvested record lost the dependent book flags and treated its reading
 * rate as a time quantity. For the three supplied rate choices, calculate the
 * visible total and finish date from the book list and the visitor's daily
 * reading time instead.
 */
return [
    'hideTexts' => true,
    'showIf' => [
        'readingSpeed' => 'readingSpeedOptions == 0',
        'readingDaysTotal' => 'whatYouWannaDo == 1',
        'readingFinishDate' => 'whatYouWannaDo == 1',
        'gameHours1' => 'whatYouWannaDo == 2',
        'gameHours2' => 'whatYouWannaDo == 2',
        'gameHours3' => 'whatYouWannaDo == 2',
        'gameHours4' => 'whatYouWannaDo == 2',
        'gameHours5' => 'whatYouWannaDo == 2',
    ],
    'outputs' => [
        'readingDaysTotal' => 'Reading days',
        'readingFinishDate' => 'Finish date',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, values) {
  // This repair covers the books-only path. Other modes remain outside its scope.
  if (Number(values.whatYouWannaDo) !== 1) return;

  var rate = Number(values.readingSpeedOptions);
  var pagesPerMinute = { 1: 0.25, 2: 0.5, 3: 1 }[rate];
  var minutesPerDay = Number(values.readingTimePerDay);
  var units = { sec: 1 / 60, min: 1, hrs: 60, days: 1440,
                wk: 10080, wks: 10080, mos: 43829.1, yrs: 525949.2 };
  minutesPerDay *= units[ctx.getUnit('readingTimePerDay')] || 1;
  var order = Number(values.orderOfReading);
  var pages = order === 3 ? 288 + 385
    : order === 4 ? 324 + 337 + 378 + 439 + 540
    : 288 + 366 + 385 + 324 + 337 + 378 + 439 + 540;

  if (!(pagesPerMinute > 0 && minutesPerDay > 0 && pages > 0)) return;
  var days = Math.ceil(pages / (pagesPerMinute * minutesPerDay));
  ctx.exportValue('readingDaysTotal', days);

  var start = Number(values.startDate);
  if (isFinite(start) && start > 0) {
    ctx.exportValue('readingFinishDate', start + days * 86400000);
  }
});
JS,
];
