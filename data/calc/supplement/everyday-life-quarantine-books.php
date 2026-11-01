<?php
/**
 * Quarantine books — how many books a stretch at home will actually get through.
 *
 * The page arrived as an article with no form. The repair adds the reading rate,
 * the length of the stretch and the size of the books, and returns the pile:
 *
 *   pages read  = pages a day × days
 *   books       = pages read ÷ pages per book
 *   hours       = pages read × minutes per page
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'qb_books' => sup_dep('1'),
        'qb_pages' => sup_dep('0'),
        'qb_hours' => sup_dep('1'),
        'qb_left_over' => sup_dep('0'),
        'qb_words' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-books-inputs', 'Your reading', [
            sup_field(sup_num('pages_per_day', 'Pages you read in a day')),
            sup_field(sup_num('days', 'Days you have to read')),
            sup_field(sup_num('pages_per_book', 'Average pages per book')),
            sup_field(sup_num('minutes_per_page', 'Minutes you spend on a page (leave empty for 2)')),
        ]),
        sup_group('supp-books-results', 'Results', [
            sup_field(sup_out('qb_books', 'Books you will get through')),
            sup_field(sup_out('qb_pages', 'Pages in total')),
            sup_field(sup_out('qb_hours', 'Hours of reading')),
            sup_field(sup_out('qb_left_over', 'Pages into the next book')),
            sup_field(sup_out('qb_words', 'Words read (at 300 a page)')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['pages_per_day', 'days', 'pages_per_book'], function (ctx, v) {
  var perDay = num('pages_per_day');
  var days = num('days');
  var perBook = num('pages_per_book');
  var minutesPerPage = num('minutes_per_page');

  if (perDay === null || perDay <= 0) {
    ctx.addUnmetCondition('Enter how many pages you read in a day.');
    return;
  }
  if (days === null || days <= 0) {
    ctx.addUnmetCondition('Enter how many days you have.');
    return;
  }
  if (perBook === null || perBook <= 0) {
    ctx.addUnmetCondition('Enter the average number of pages in a book.');
    return;
  }
  if (minutesPerPage === null || minutesPerPage <= 0) { minutesPerPage = 2; }

  var pages = perDay * days;
  var books = pages / perBook;
  var whole = Math.floor(books);
  var into = Math.round((books - whole) * perBook);
  var hours = pages * minutesPerPage / 60;

  ctx.exportValue('qb_books', sround(books, 1));
  ctx.exportValue('qb_pages', Math.round(pages));
  ctx.exportValue('qb_hours', sround(hours, 1));
  ctx.exportValue('qb_left_over', into);
  ctx.exportValue('qb_words', Math.round(pages * 300));

  var headline = 'At ' + snum(perDay, 0) + ' pages a day for ' + snum(days, 0) + ' days you will read '
    + Math.round(pages).toLocaleString() + ' pages — ' + whole + ' whole book' + (whole === 1 ? '' : 's')
    + (into > 0 ? ' and ' + into + ' pages into the next' : '')
    + ', about ' + snum(hours, 1) + ' hours of reading.';
  ctx.addHtml('<p><strong>' + headline + '</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Pages a day', snum(perDay, 1)],
    ['Days', snum(days, 0)],
    ['Pages in total', Math.round(pages).toLocaleString()],
    ['Average book', snum(perBook, 0) + ' pages'],
    ['Books', snum(books, 2)],
    ['Whole books', String(whole)],
    ['Pages into the next book', String(into)],
    ['Minutes per page', snum(minutesPerPage, 1)],
    ['Hours of reading', snum(hours, 1)],
    ['Words, at 300 a page', Math.round(pages * 300).toLocaleString()],
    ['Books if you read for one more week', snum((perDay * (days + 7)) / perBook, 1)]
  ]));

  /* a small reading list to match the pile, at common book lengths */
  var rows = [200, 300, 400, 500, 700].map(function (len) {
    return [len + ' pages', snum(pages / len, 1) + ' books'];
  });
  ctx.addHtml('<p>The same number of pages at different book lengths:</p>');
  ctx.addHtml(stable(['Book length', 'Books finished'], rows));

  ctx.addHtml('<p class="calc-unmet">Reading speed is the number that makes or breaks the estimate, and it '
    + 'varies more than people expect: 200 words a minute is a comfortable pace, about a page every ninety '
    + 'seconds for a normally set paperback, but dense non-fiction, poetry and anything with footnotes runs '
    + 'far slower. The words column assumes 300 words a page, which is a paperback average — a technical '
    + 'book can carry twice that. Nothing here accounts for the days you do not read, or for the way a '
    + 'long book gets heavier in the second half; if you want a realistic pile, enter the pages a day you '
    + 'actually manage on a weekday rather than on a good Sunday.</p>');
});
JS,
];
