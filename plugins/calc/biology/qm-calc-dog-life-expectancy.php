<?php

/**
 * Dog life expectancy
 * /biology/dog-life-expectancy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog life expectancy',
    'engine' => 'script',
    'engine_note' => 'reads the age and breed size and works out the age in human years, the typical lifespan, the years likely left and the life stage',
    'meta' => ['title' => 'Dog Life Expectancy Calculator: Human Years by Size', 'description' => 'Enter a dog\'s age and breed size to see its age in human years, the typical lifespan for that size class, the years likely left and its current life stage.', 'h1' => 'Dog life expectancy Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'Your dog',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dog_age', 'label' => 'How old is the dog, in years?', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'breed_size',
                            'label' => 'Size of the breed',
                            'type' => 'select',
                            'options' => [
                                'Toy — under 5 kg (Chihuahua, Yorkie)' => '1',
                                'Small — 5 to 10 kg (Pug, Beagle)' => '2',
                                'Medium — 10 to 25 kg (Border collie, Labrador)' => '3',
                                'Large — 25 to 40 kg (German shepherd, Rottweiler)' => '4',
                                'Giant — over 40 kg (Great Dane, Mastiff)' => '5',
                            ],
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'human_age',
                            'label' => 'Age in human years',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expected_life',
                            'label' => 'Typical lifespan for this size (years)',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years_left',
                            'label' => 'Years likely left',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'life_stage',
                            'label' => 'Life stage (1 puppy, 2 adult, 3 mature, 4 senior)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";//# sourceURL=customJs.js
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
    
    /*
     * Median lifespan and the yearly ageing rate for each size class, in the order
     * the picker lists them. A toy breed lives about 14 years against 8 for a giant,
     * which is why the same calendar age means very different things.
     */
    var SIZES = [
      { name: 'toy',    life: 14.0, rate: 3.3, adult: 3.0 },
      { name: 'small',  life: 13.0, rate: 3.8, adult: 4.5 },
      { name: 'medium', life: 12.0, rate: 4.3, adult: 6.5 },
      { name: 'large',  life: 10.0, rate: 5.0, adult: 9.0 },
      { name: 'giant',  life: 8.0,  rate: 6.0, adult: 12.0 }
    ];
    
    /* the chosen option's position, whether the picker is a select or radios */
    function chosenIndex(name) {
      var sel = document.querySelector('select[data-var="' + name + '"]');
      if (sel && sel.selectedIndex >= 0) { return sel.selectedIndex; }
      var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
      for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) { return i; }
      }
      return -1;
    }
    
    function num(name) {
      var el = document.querySelector('input[data-var="' + name + '"]');
      if (!el || String(el.value).trim() === '') { return null; }
      var n = Number(el.value);
      return isFinite(n) ? n : null;
    }
    
    omni.onResult(['dog_age', 'breed_size'], function (ctx, v) {
      var age = num('dog_age');
      /* the client banks the option's number, so the size arrives as 1 to 5 */
      var index = Number(v.breed_size) - 1;
      if (!isFinite(index) || index < 0) { index = chosenIndex('breed_size'); }
    
      if (age === null) {
        ctx.addUnmetCondition('Enter the dog’s age in years.');
        return;
      }
      if (index < 0) {
        ctx.addUnmetCondition('Choose the size of the breed.');
        return;
      }
      if (age < 0) {
        ctx.addUnmetCondition('An age cannot be negative.');
        return;
      }
      if (age > 30) {
        ctx.addUnmetCondition('No dog has reached ' + snum(age, 0) + ' years — the record is about 30.');
        return;
      }
    
      var size = SIZES[index] || SIZES[2];
    
      /* the first two years age fast, then the size decides the yearly step */
      var human;
      if (age <= 1) {
        human = age * 15;
      } else if (age <= 2) {
        human = 15 + (age - 1) * 9;
      } else {
        human = 24 + (age - 2) * size.rate;
      }
    
      var left = size.life - age;
      var stage = age < (size.adult * 0.6) ? 1
        : age < size.adult ? 2
        : age < size.adult * 1.6 ? 3
        : 4;
    
      ctx.exportValue('human_age', sround(human, 1));
      ctx.exportValue('expected_life', sround(size.life, 1));
      ctx.exportValue('years_left', sround(Math.max(0, left), 1));
      /* the stage is shown as the word the sentence uses, not as its index */
      var stageName = { 1: 'puppy', 2: 'young adult', 3: 'mature adult', 4: 'senior' }[stage];
      /* the box reads as a label; the sentence can take the lower-case word */
      ctx.exportValue('life_stage', stageName.charAt(0).toUpperCase() + stageName.slice(1));
    
    
      ctx.addHtml('<p><strong>A ' + snum(age, 1) + '-year-old ' + size.name + ' breed is about '
        + snum(human, 0) + ' in human years — a ' + stageName + '. Its size class usually lives to '
        + snum(size.life, 1) + ', so ' + (left > 0 ? snum(left, 1) + ' years are likely left'
          : 'it has already outlived the typical lifespan for its size') + '.</strong></p>');
    
      ctx.addHtml(stable(['Item', 'Value'], [
        ['Calendar age', snum(age, 1) + ' years'],
        ['Size class', size.name],
        ['Human-equivalent age', snum(human, 0) + ' years'],
        ['Typical lifespan for the size', snum(size.life, 1) + ' years'],
        ['Years left', left > 0 ? snum(left, 1) : 'none by the median'],
        ['Life stage', stageName],
        ['Yearly ageing after the second birthday', snum(size.rate, 1) + ' human years per dog year'],
        ['Share of a typical life lived', snum(Math.min(100, age / size.life * 100), 0) + ' %']
      ]));
    
      /* the same dog at every size, so the effect of the breed is visible */
      var rows = SIZES.map(function (s) {
        var h = age <= 1 ? age * 15 : age <= 2 ? 15 + (age - 1) * 9 : 24 + (age - 2) * s.rate;
        return [s.name + ' breed', snum(h, 0), snum(s.life, 1), snum(Math.max(0, s.life - age), 1)];
      });
      ctx.addHtml('<p>If this dog were another size, at the same age:</p>');
      ctx.addHtml(stable(['Size', 'Human years', 'Typical lifespan', 'Years left'], rows));
    
      ctx.addHtml('<p class="calc-unmet">The "multiply by seven" rule is wrong in both directions: a '
        + 'one-year-old dog is a young adult, not a seven-year-old child, and the multiplier that fits a '
        + 'poodle badly overshoots for a mastiff. The figures above follow the age curve most veterinarians '
        + 'use — fast in the first two years, then a steady yearly step that depends on size — and the '
        + 'lifespans are the medians for each size class, not promises for an individual dog. Breed matters '
        + 'within a size (a Cavalier King Charles lives far shorter than a Jack Russell of the same weight), '
        + 'and so do body condition, dental care and neutering. A dog that is a mixture of sizes is best '
        + 'placed by its adult weight rather than by the largest breed in its ancestry.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        The old rule of seven human years per dog year is wrong at both ends. This page converts a dog's age using the fast first years and a size-dependent rate after them, then sets that against the lifespan its size class usually reaches.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It answers two questions at once: how old the dog is in human terms, and how much of its expected life is left. It also names the life stage, which is the figure owners actually use when deciding on screening and diet.</p><p>The first year counts as about fifteen human years and the second adds nine, because a dog matures far faster than a person in its first two years. After that each dog year adds a rate set by size class: small breeds add fewer human years per dog year and live longer, large breeds the reverse. Years left are the expected lifespan for the class minus the dog's age, floored at zero. The life stage is a band based on the age at which that size class reaches adulthood.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>How old is the dog, in years?</strong> — a number box.</li><li><strong>Size of the breed</strong> — a drop-down with the choices the page offers.</li></ul><p>The answer comes back as 4 boxes: Age in human years, Typical lifespan for this size (years), Years likely left, Life stage (1 puppy, 2 adult, 3 mature, 4 senior). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>How old is the dog, in years?</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Size of the breed</strong> is a drop-down with the choices the page offers. The choices are Toy — under 5 kg (Chihuahua, Yorkie), Small — 5 to 10 kg (Pug, Beagle), Medium — 10 to 25 kg (Border collie, Labrador), Large — 25 to 40 kg (German shepherd, Rottweiler) and Giant — over 40 kg (Great Dane, Mastiff). Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>How old is the dog, in years?</th><td>5</td></tr><tr><th>Size of the breed</th><td>Medium</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Age in human years</th><td>36.9</td></tr><tr><th>Typical lifespan for this size (years)</th><td>12</td></tr><tr><th>Years likely left</th><td>7</td></tr><tr><th>Life stage (1 puppy, 2 adult, 3 mature, 4 senior)</th><td>Young adult</td></tr></tbody></table><p>A five-year-old medium dog comes out at 36.9 human years, with a typical lifespan of twelve and seven years likely left: a young adult, past the fast phase but nowhere near the end of its class's range.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>How old is the dog, in years?</th><td>11</td></tr><tr><th>Size of the breed</th><td>Large</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Age in human years</th><td>69</td></tr><tr><th>Typical lifespan for this size (years)</th><td>10</td></tr><tr><th>Years likely left</th><td>0</td></tr><tr><th>Life stage (1 puppy, 2 adult, 3 mature, 4 senior)</th><td>Mature adult</td></tr></tbody></table><p>4 of the 4 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Age in human years</strong> — the converted age, using the fast start and the size-specific rate after year two.</li><li><strong>Typical lifespan</strong> — the median lifespan for the size class you chose.</li><li><strong>Years left</strong> — typical lifespan minus current age, never below zero.</li><li><strong>Life stage</strong> — puppy, young adult, mature adult or senior, from the age against the class's adult age.</li></ul><p>The human-age figure is a comparison, not a measurement; the years-left figure is the more useful one, and it is an average for the size class rather than a prediction for this dog. Life stage is a coarse band and moves in steps, so a dog either side of a boundary can be labelled differently one month apart.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Do the first two years by hand: fifteen plus nine is twenty-four human years at age two. Then add the class rate for each further year: a small breed adds about four, a large breed about six to seven. The result should land within a year of the page.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Size class</strong> — A large dog can be small at five kilos as a puppy. Choose the class it will be as an adult.</li><li><strong>Breed beats class</strong> — Flat-faced and giant breeds sit well outside their class average; a bulldog is not a medium dog for lifespan purposes.</li><li><strong>Rescue ages</strong> — An estimated age is an estimate. The lifespan figure inherits that error.</li></ul><p>Nothing here is pasted from a file: every box is short enough to type, and the choice lists mean the answer depends on which entry is selected rather than on how it is spelled.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Median, not maximum</strong> — The lifespan is what the class usually reaches, not what the oldest dogs reach.</li><li><strong>No health adjustment</strong> — Body condition, neuter status and chronic disease all move the figure and none of them is a box here.</li><li><strong>One conversion</strong> — There are several published curves; this is the familiar two-phase one, not a veterinary actuarial model.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Dog life expectancy Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is used to explain to an owner why a two-year-old dog is already an adult, to decide when senior screening becomes sensible, and to set expectations when a rescue dog's age is uncertain.</p><p>Life stage is the figure most owners act on. A dog that is a young adult by this page is in the years when weight, teeth and vaccinations are set; a dog labelled mature adult is where screening for the conditions common to its size class becomes worth the cost. The human-years figure is a comparison for conversation, while the stage is a prompt to do something.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why not multiply by seven?', 'a' => 'Because development is not linear. A one-year-old dog is sexually mature, which seven human years is not, and a twenty-year-old small dog is not 140.'],
            ['q' => 'Why does size change the rate?', 'a' => 'Larger dogs mature more slowly but age faster once adult, and they have shorter median lifespans. The page uses that pattern.'],
            ['q' => 'Does Dog life expectancy Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
        ],
        'authors' => [],
    ],
];
