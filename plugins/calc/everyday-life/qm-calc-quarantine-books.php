<?php

/**
 * Quarantine books
 * /everyday-life/quarantine-books
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Quarantine books',
    'meta' => ['title' => 'Quarantine books — Formula, Steps & Examples', 'description' => 'Quarantine books works out whichever of pages you read in a day, days you have to read and average pages per book is left blank. Every figure is computed.', 'h1' => 'Quarantine books Calculator', 'updated' => '2026-08-21'],
    'raw' => [
        'vars' => [
            'qb_books' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'qb_pages' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'qb_hours' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'qb_left_over' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'qb_words' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => '-cOnMSYKn_dqn0IOuDPKQ',
                'title' => '',
                'desc' => '',
                'm' => [],
            ],
            [
                'uid' => 'supp-books-inputs',
                'title' => 'Your reading',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pages_per_day', 'vt' => 'numerical', 'l' => 'Pages you read in a day'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'days', 'vt' => 'numerical', 'l' => 'Days you have to read'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pages_per_book', 'vt' => 'numerical', 'l' => 'Average pages per book'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'minutes_per_page', 'vt' => 'numerical', 'l' => 'Minutes you spend on a page (leave empty for 2)'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'supp-books-results',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'qb_books', 'vt' => 'dependent', 'oo' => 1, 'l' => 'Books you will get through'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'qb_pages', 'vt' => 'dependent', 'oo' => 1, 'l' => 'Pages in total'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'qb_hours', 'vt' => 'dependent', 'oo' => 1, 'l' => 'Hours of reading'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'qb_left_over', 'vt' => 'dependent', 'oo' => 1, 'l' => 'Pages into the next book'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'qb_words', 'vt' => 'dependent', 'oo' => 1, 'l' => 'Words read (at 300 a page)'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'Books, pages, time and reading totals',
                'var' => [
                    ['l' => 'qb_pages', 'f' => 'pages_per_day * days', 'r' => ['pages_per_day', 'days']],
                    ['l' => 'qb_books', 'f' => 'pages_per_day * days / pages_per_book', 'r' => ['pages_per_day', 'days', 'pages_per_book']],
                    ['l' => 'qb_hours', 'f' => 'pages_per_day * days * minutes_per_page / 60', 'r' => ['pages_per_day', 'days', 'minutes_per_page']],
                    ['l' => 'qb_left_over', 'f' => 'mod(pages_per_day * days, pages_per_book)', 'r' => ['pages_per_day', 'days', 'pages_per_book']],
                    ['l' => 'qb_words', 'f' => 'pages_per_day * days * 300', 'r' => ['pages_per_day', 'days']],
                ],
            ],
        ],
        'datasets' => [],
        'js' => <<<'TXT'
        /*
         * Shared helpers for the hand-written repairs in data/calc/supplement/.
         *
         * Every supplement script is evaluated in its own closed scope, so anything the
         * repairs have in common has to travel with each one. Supplement::apply()
         * prepends this file to every page script it merges.
         */

        /**
         * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
         *
         * A statistics page that asked for fifty separate boxes now asks for one, and
         * the visitor types a list the way they would in a spreadsheet cell. Anything
         * that is not a number is ignored rather than turned into NaN — a stray comma
         * or an accidental letter must not poison the whole set.
         */
        function snumlist(text) {
          if (typeof text !== 'string' || text.trim() === '') return [];
          var out = [];
          text.split(/[\s,;]+/).forEach(function (piece) {
            if (piece === '') return;
            var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
            if (isFinite(n)) out.push(n);
          });
          return out;
        }

        /** Median of an already sorted array of numbers. */
        function smedian(sorted) {
          var n = sorted.length;
          if (!n) return NaN;
          var mid = Math.floor(n / 2);
          return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
        }

        /** The numbers a visitor actually typed, in field order, skipping blanks. */
        function snumbers(values, pattern, limit) {
          var out = [];
          for (var i = 1; i <= limit; i++) {
            var key = pattern.replace('%d', i);
            var raw = values[key];
            if (raw === undefined || raw === null || raw === '') continue;
            var n = Number(raw);
            if (!isFinite(n)) continue;
            out.push({ key: key, n: n });
          }
          return out;
        }

        /** A plain number, no trailing zeros, at most `d` decimals. */
        function snum(n, d) {
          if (!isFinite(n)) return '—';
          var v = Number(n.toFixed(d === undefined ? 4 : d));
          return String(v);
        }

        /** Round to `d` decimals but keep it a number. */
        function sround(n, d) {
          var f = Math.pow(10, d === undefined ? 2 : d);
          return Math.round(n * f) / f;
        }

        /** Greatest common divisor of two whole numbers. */
        function sgcd(x, y) {
          x = Math.abs(Math.round(x));
          y = Math.abs(Math.round(y));
          return y === 0 ? x : sgcd(y, x % y);
        }

        /** "10" / "1/3" — a fraction reduced to lowest terms. */
        function sfrac(part, whole) {
          if (!whole) return '—';
          var a = Math.round(part), b = Math.round(whole);
          var g = sgcd(a, b) || 1;
          if (g > 1) { a = a / g; b = b / g; }
          return b === 1 ? String(a) : a + '/' + b;
        }

        /** Minimal escape for text that came out of the definition or a label. */
        function sesc(s) {
          return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        }

        /**
         * A table from a header list and rows of cells. Cells are printed as they are
         * given, so a caller can pass a pre-formatted string.
         */
        function stable(head, rows, foot) {
          var html = '<table><thead><tr>';
          head.forEach(function (h) { html += '<th>' + h + '</th>'; });
          html += '</tr></thead><tbody>';
          rows.forEach(function (r) {
            html += '<tr>';
            r.forEach(function (c) { html += '<td>' + c + '</td>'; });
            html += '</tr>';
          });
          if (foot) {
            html += '<tr>';
            foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
            html += '</tr>';
          }
          return html + '</tbody></table>';
        }

        /** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
        function slist(pairs) {
          return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
        }

        /**
         * Tidy a value a page script published.
         *
         * The harvested scripts speak the reference site's front-end dialect: `==2==`
         * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
         * comma or a dangling colon left where a second half of a sentence used to
         * follow. Our panel prints the string as plain text, so those markers would
         * land on screen as punctuation soup. This turns them into something readable
         * without changing the value itself.
         */
        function sclean(value) {
          var s = value === null || value === undefined ? '' : String(value);
          var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
                     '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
          s = s.replace(/==(\d+)==/g, function (all, d) {
            return d.split('').map(function (c) { return sub[c] || c; }).join('');
          });
          /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
          var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
                     '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
                     '+': '⁺', '-': '⁻'};
          s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
            return d.split('').map(function (c) { return sup[c] || c; }).join('');
          });
          s = s.replace(/\*\*(.+?)\*\*/g, '$1');
          s = s.replace(/<br\s*\/?>/gi, ' ');
          s = s.replace(/<\/(p|div|li)>/gi, ' ');
          s = s.replace(/<[^>]+>/g, '');
          s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
          /* invisible characters the reference used as "this line is blank": an Arabic
             letter mark, a zero-width space, a byte-order mark. They render as nothing
             and would otherwise keep an empty row looking filled. */
          s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
          s = s.replace(/\s+/g, ' ').trim();
          s = s.replace(/[,;:\-–—]\s*$/, '').trim();
          return s;
        }

        /**
         * Turn a drop-down option's id back into its label.
         *
         * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
         * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
         * picked. The uid is in the page markup as an option value or a radio value,
         * so the label is one lookup away.
         */
        function sdelabel(value) {
          if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
          var one = function (id) {
            if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
            var el = document.querySelector('[value="' + id + '"]');
            if (!el) { return id; }
            if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
            var lab = el.closest ? el.closest('label') : null;
            return lab ? ((lab.textContent || '').trim() || id) : id;
          };
          /* a published value can be several ids joined by commas ("Possibilities,
             MD4, NTLM"), so map each piece rather than the whole string */
          return value.split(/\s*,\s*/).map(one).join(', ');
        }

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
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Quarantine books calculator takes the numbers you enter and reports the result immediately.

         The panel waits for the button.
        TXT,
        'sections' => [
            ['title' => 'How does the Quarantine books calculator work?', 'html' => '<p>The Quarantine books calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>'],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Quarantine books calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Quarantine books calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/date-of-birth">Date of birth</a>, <a href="/everyday-life/date-to-date">Date to date</a> and <a href="/everyday-life/day-countdown">Day countdown</a>.</p>
            TXT],
            ['title' => 'Planning reading time from pages and pace', 'html' => <<<'TXT'
            <p>The Quarantine books calculator turns pages per day, available days and average pages per book into a rough reading plan. It estimates total pages, whole books, progress into the next book, reading hours and an approximate word count. These are separate outputs based on different assumptions: the book count depends on average pages per book, while the hours depend on minutes per page.</p>
            <p>Enter a realistic daily page count and the number of days you expect to read. If your routine varies, use a reasonable average or compare a typical and a busy scenario. The calculator assumes the pace continues across the entered days; it does not subtract days off, interruptions or changes in attention unless you include them in the schedule.</p>
            <p>Average pages per book controls the estimate of how many books you will finish. A short novel and a large reference book differ considerably, so choose an average that fits the pile you mean to read. The result may be fractional because it estimates progress across the next book. The page also reports whole books and remaining pages to make that fraction easier to interpret.</p>
            <p>Reading time is estimated from minutes per page. If that input is blank or invalid, the page’s script uses two minutes per page as its default. Actual pace can vary with text density, font size, language, familiarity, note-taking, interruptions and reading environment. Treat the hours as a planning estimate rather than a stopwatch prediction.</p>
            <p>The word-count output assumes 300 words per page. That is a rough convention, not a measurement of the books you own. Pages can contain illustrations, large type, footnotes or dense text, so the actual word count may differ substantially. Use the page estimate for comparing scenarios, not for reporting a precise manuscript word count.</p>
            <p>For example, doubling the days while keeping pages per day fixed doubles the modeled total pages and reading hours. Changing only the average book length changes the estimated number of books but not the pages or hours. This is a useful way to see which input drives each output.</p>
            <p>Use the result to set a flexible reading goal, build a schedule or estimate how many volumes to pack. Review progress after a week and update the pace if your real routine differs. A reading plan should leave room for rest and enjoyment; the calculator does not judge how quickly anyone should read.</p>
            <p>Keep the inputs with the result so another person can reproduce the estimate. If you are planning around a loan due date or travel schedule, verify the relevant dates separately. The tool models pages and time, not book availability or library deadlines.</p>
            TXT],
            ['title' => 'Making the page estimate fit a real reading schedule', 'html' => <<<'TXT'
            <p>Use the calculator to compare scenarios rather than treating its first result as a commitment. A conservative plan might use fewer reading days per week, while a stretch plan might assume a longer session. Keep the book-size and minutes-per-page assumptions fixed while comparing schedule changes, then vary them separately to see their effect. This makes the estimate easier to explain and revise.</p><p>If you read a mix of short and long books, average pages per book can be misleading. A more useful approach is to group the planned books by approximate length or run separate calculations for each group. The calculator estimates an average and may show a fractional book count; it cannot know the titles in your stack unless you provide their average size.</p><p>The partial-book result represents pages remaining into the next average-length book. It is not a prediction that you will stop at exactly that page. A reader may finish a book early, switch titles or read at different speeds. Use whole-book count and remainder as planning shorthand.</p><p>The default pace is two minutes per page when the minutes-per-page field is blank or invalid. That value is only a fallback. A page of dense nonfiction, poetry, a large-print edition or a book with illustrations can take a very different amount of time. Track a few real sessions and use your own average if the form allows it.</p><p>The words estimate assumes 300 words per page. It may be far from the actual number in a specific edition, especially when pages include diagrams, large type, notes or blank space. Do not use it to report a book’s exact word count or compare authors precisely.</p><p>Use the time estimate to reserve reading windows and check whether a goal seems realistic. If your routine changes, update the inputs. A schedule that leaves no room for breaks or changes in attention may be less sustainable than a longer plan.</p><p>For library due dates or travel, check the actual calendar separately. The model counts entered days and does not know which dates are available to you. It is a planning helper, not a deadline manager.</p>
            TXT],
            ['title' => 'Worked schedule examples and what they omit', 'html' => <<<'TXT'
            <p>Suppose a reader plans 20 pages a day for 30 days. The calculator estimates 600 pages. If the average book is 300 pages, that is two average books. At two minutes per page, the modeled reading time is 1,200 minutes, or 20 hours. This example shows how the fields relate; it is not a target pace or a prediction that every book will take exactly that long.</p><p>If the average book length changes to 400 pages while daily pages and days stay the same, the page total and hours remain unchanged, but the estimated number of books changes. If the reader instead doubles the daily pages, both total pages and hours double. Changing one input at a time makes the result easier to interpret.</p><p>The default two minutes per page can be too fast or too slow. A dense textbook may take longer, while a familiar light read may take less. Breaks, notes, rereading, audio supplements and days off are outside the basic calculation. Use your own observed pace if you want a schedule that reflects your routine.</p><p>The words estimate uses 300 words per page and should be treated as a rough scale only. It is not suitable for comparing exact word counts across editions, genres or page layouts. If you need a manuscript word count, use the text itself rather than this estimate.</p><p>Use the calculator to plan a flexible reading period or to compare a few possible schedules. Revisit the estimate after real reading sessions and adjust it without treating a change as failure. The purpose is to make a plan more visible, not to put a deadline on enjoying a book.</p>
            TXT],
            ['title' => 'Keep the plan flexible as you read', 'html' => <<<'TXT'
            <p>Recalculate if you take days off, switch to a book with a very different page count or change your daily reading time. The original estimate reflects only its inputs. A flexible schedule can be more useful than trying to maintain a pace that no longer matches your life.</p><p>If the goal is a deadline, add a buffer for travel, interruptions and books that take longer than expected. The calculator counts the days you enter but does not know which days you will actually be able to read.</p><p>Track actual pages for a week or two and use that experience to adjust the plan. This turns the output into a personal estimate rather than a generic pace assumption.</p>
            TXT],
            ['title' => 'Separate modeled pages from actual reading progress', 'html' => <<<'TXT'
            <p>The page total is a forecast, not a record of pages already read. If you want to track progress, keep a separate log of actual pages completed and update the remaining days and pace from that log. The calculator cannot know whether you skipped a day or changed books.</p><p>For a realistic finish estimate, use the remaining pages rather than the original stack and choose a pace based on recent sessions. Revisit the estimate when the plan changes.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What numbers do I need to estimate my reading?', 'a' => 'Enter pages read per day, the number of available days and the average pages per book. Minutes per page is optional; if left blank, this calculator assumes two minutes per page.'],
            ['q' => 'How are books and leftover pages calculated?', 'a' => 'Total pages are pages per day multiplied by days. The book estimate divides that total by pages per book; leftover pages show how far the total goes into the next book.'],
            ['q' => 'What does the reading-hours estimate mean?', 'a' => 'It multiplies total pages by your minutes per page and converts minutes to hours. The estimate depends on your entered pace and does not account for breaks or changes in reading speed.'],
        ],
        'related' => [
            ['path' => '/everyday-life/date-of-birth', 'name' => 'Date of birth'],
            ['path' => '/everyday-life/date-to-date', 'name' => 'Date to date'],
            ['path' => '/everyday-life/day-countdown', 'name' => 'Day countdown'],
        ],
    ],
];
