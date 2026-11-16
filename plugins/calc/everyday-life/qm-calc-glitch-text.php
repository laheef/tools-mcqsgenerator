<?php

/**
 * Glitch text
 * /everyday-life/glitch-text
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Glitch text',
    'meta' => ['title' => 'Glitch text Calculator: Formula, Steps & Examples', 'description' => 'Glitch text takes enter your text and returns glitch. Every figure is computed. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Glitch text Calculator', 'updated' => '2026-08-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'input_text', 'label' => 'Enter your text', 'type' => 'text'],
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
                        ['name' => 'output_glitch', 'label' => 'Glitch', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";function _toConsumableArray(r){return _arrayWithoutHoles(r)||_iterableToArray(r)||_unsupportedIterableToArray(r)||_nonIterableSpread()}function _nonIterableSpread(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}function _unsupportedIterableToArray(r,a){if(r){if("string"==typeof r)return _arrayLikeToArray(r,a);var t={}.toString.call(r).slice(8,-1);return"Object"===t&&r.constructor&&(t=r.constructor.name),"Map"===t||"Set"===t?Array.from(r):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?_arrayLikeToArray(r,a):void 0}}function _iterableToArray(r){if("undefined"!=typeof Symbol&&null!=r[Symbol.iterator]||null!=r["@@iterator"])return Array.from(r)}function _arrayWithoutHoles(r){if(Array.isArray(r))return _arrayLikeToArray(r)}function _arrayLikeToArray(r,a){(null==a||a>r.length)&&(a=r.length);for(var e=0,n=Array(a);e<a;e++)n[e]=r[e];return n}var GLITCH_CHARS={above:["\u0300","\u0301","\u0302","\u0303","\u0304","\u0305","\u0306","\u0307","\u0308","\u0309","\u030A","\u030B","\u030C","\u030D","\u030E","\u030F","\u0310","\u0311","\u0312","\u0313","\u0314","\u033D","\u033E","\u033F","\u0340","\u0341","\u0342","\u0343","\u0344","\u0346","\u034A","\u034B","\u034C","\u0350","\u0351","\u0352","\u0357","\u0358","\u035B","\u035D","\u035E","\u0360","\u0361","\u0363","\u0364","\u0365","\u0366"],middle:["\u0315","\u031A","\u0334","\u0335","\u0336","\u0337","\u0338","\u035C","\u0362","\u0321","\u0322","\u0327","\u0328"],below:["\u0316","\u0317","\u0318","\u0319","\u031C","\u031D","\u031E","\u031F","\u0320","\u0323","\u0324","\u0325","\u0326","\u0329","\u032A","\u032B","\u032C","\u032D","\u032E","\u032F","\u0330","\u0331","\u0332","\u0333","\u0339","\u033A","\u033B","\u033C","\u0345","\u0347","\u0348","\u0349","\u034D","\u034E","\u0353","\u0354","\u0355","\u0356","\u0359","\u035A","\u035F"]};function applyGlitch(text){if(!text){return""}var result="";var allChars=[].concat(_toConsumableArray(GLITCH_CHARS.above),_toConsumableArray(GLITCH_CHARS.middle),_toConsumableArray(GLITCH_CHARS.below));var intensity=8;for(var i=0;i<text.length;i++){result+=text[i];for(var j=0;j<intensity;j++){var randomMark=allChars[Math.floor(Math.random()*allChars.length)];result+=randomMark}}return result}omni.onResult(["input_text"],function(ctx){var input=ctx.getRawInput("input_text")||"";ctx.exportValue("output_glitch","");if(!input.trim()){return}ctx.exportValue("output_glitch",applyGlitch(input))});//# sourceURL=customJs.js
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

    /* The page hook has already run by the time this one does, so the values
       below are its results: tidy the reference site's markup out of them
       before they reach the panel. */
    omni.onResult([], function (ctx, values) {
      var rows = [
        'output_glitch'
      ];
      rows.forEach(function (name) {
        var v = values[name];
        if (typeof v !== 'string' || v.trim() === '') { return; }
        var text = sclean(sdelabel(v));
        ctx.exportValue(name, text === '' ? null : text);
      });
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        The Glitch text calculator returns your result from the field on the form.

         The panel waits for the button.
        TXT,
        'sections' => [
            ['title' => 'How does the Glitch text calculator work?', 'html' => '<p>The Glitch text calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>'],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Glitch text calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 1 figures keep coming back — enter your text — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Glitch text calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li> A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/acceptance-rate">Acceptance rate</a>, <a href="/everyday-life/add-days">Add days</a> and <a href="/everyday-life/add-minutes">Add minutes</a>.</p>
            TXT],
            ['title' => 'What glitch text changes in your message', 'html' => <<<'TXT'
            <p>The Glitch text calculator adds Unicode combining marks above, through and below each character to create a distorted visual effect. It does not change the underlying meaning or encrypt the text. The marks are selected randomly, so pressing Calculate again can create a different result from the same input. The output is intended for decoration or playful experimentation, not for text that must remain easy to read.</p>
            <p>Combining marks attach to nearby characters, and fonts or apps may render them differently. Some platforms stack the marks; others may show boxes, move them, omit them or truncate the line. Very long output can make a page difficult to read or copy. Test a short sample in the destination app before using the effect in a profile, caption or message.</p>
            <p>Accessibility can be affected. Screen readers may announce the combining marks individually, making the content confusing or extremely long when spoken. Search engines and text search may not match the original text, and moderation or copy tools may treat the marks differently. Avoid glitch text in names, instructions, links, forms, emergency information, educational content or any context where readers need to understand the message quickly.</p>
            <p>The effect also complicates selection and editing. A cursor may move through the marks rather than through visible letters, and deleting one character can leave marks behind. Keep the original plain-text version somewhere safe before copying the output. If someone needs to quote, translate or index the message, provide the ordinary text as well.</p>
            <p>Use the calculator for short decorative phrases and choose a moderate effect if the output becomes visually dense. The generated marks do not improve security or anonymity; the original words remain visible and can be recovered. Do not use the result to bypass platform rules or disguise harmful content.</p>
            <p>Because the output uses Unicode rather than an image, it remains selectable text but depends on Unicode support and font rendering. Copying between apps may normalize or rearrange characters. If the appearance matters, check the result on the device and platform where it will be displayed.</p>
            <p>This is a visual text effect only. It does not validate spelling, preserve every character in every writing system or guarantee accessibility. Use plain text whenever accuracy and inclusion are more important than appearance.</p>
            TXT],
            ['title' => 'Why glitch text can be hard to use', 'html' => <<<'TXT'
            <p>The output adds many combining marks after each input character. The marks are part of the text stream even when they overlap visually, which can make the string much longer than it appears. Some applications limit input length or truncate content, so a short phrase may exceed a platform’s limit after transformation.</p><p>Selection and editing can be awkward. A cursor may move through marks that are not visually obvious, and deleting what looks like one letter may leave several marks behind. If you need to edit the message, return to the original plain text, change it there and generate a fresh effect rather than repairing the distorted string character by character.</p><p>Screen readers may announce the combining marks individually or pronounce them unpredictably. Search, translation, spell-check and content moderation can also behave differently because the underlying characters are not the ordinary letters shown to the eye. For accessible communication, provide a plain-text alternative and avoid placing essential instructions only in glitch form.</p><p>Different fonts and operating systems handle mark stacking in different ways. A phrase may be readable in one browser and nearly illegible in another. Test the output at the target size and platform, and avoid using it for long passages, forms, navigation labels or content that someone must act on quickly.</p><p>Glitch marks are decorative, not protective. They do not anonymize or encrypt a message, and they should not be used to evade moderation or disguise harmful content. The original words remain visible to many systems and people.</p><p>Keep a copy of the original text before generating the effect. This is especially important for names, links and messages that need to be quoted or searched later.</p>
            TXT],
            ['title' => 'A practical check before sharing glitch text', 'html' => <<<'TXT'
            <p>After generating the text, copy a short sample and paste it into the intended platform. Check that the marks render, the message remains selectable and the text is not cut off. Different fonts and devices can place combining marks differently, so test on the actual screen where readers will see it.</p><p>If the result is difficult to edit, return to the original plain text and generate it again after making changes. Avoid manually removing invisible marks; the visible character and the underlying sequence may not align. Keep a clean copy for accessibility, search and later updates.</p><p>Do not use glitch text for usernames, links or access codes that people need to type or search. It can cause look-alike characters and invisible combining marks that make the original string hard to verify. A decorative post should remain optional and should not be the only way essential information is conveyed.</p><p>Because the marks are randomly selected, two outputs from the same input can differ. If you need a consistent visual identity, use a designed image or a controlled typography system rather than relying on random text marks. The generator is not a layout or font tool.</p><p>Some platforms may sanitize or strip unusual characters. If the text is altered during posting, that is a rendering or input-processing difference, not a guarantee that the message was preserved exactly. Check the posted version and provide plain text where needed.</p><p>The effect is for playful decoration only. It does not make a message private, unreadable to software or exempt from platform rules.</p>
            TXT],
            ['title' => 'Keep a plain-text alternative available', 'html' => <<<'TXT'
            <p>If you share a decorative result, place a plain version nearby whenever someone needs to search, quote or understand the message with assistive technology. The generated string may be visually recognizable but is still composed of many code points, and not every reader or app interprets them the same way.</p><p>Do not hide essential contact details, safety instructions or links inside glitch marks. Keep those in ordinary text so they remain usable if a platform strips marks or a screen reader announces them separately.</p><p>The generator is best for short, optional decoration. A clean original makes it easy to revise or remove the effect later.</p>
            TXT],
            ['title' => 'Decide where the effect adds value', 'html' => <<<'TXT'
            <p>For decorative content, use the effect sparingly and test whether readers can still recognize the intended words. If a platform renders the marks poorly, switch back to plain text rather than adding more marks. The appearance is an optional style choice, not a measure of creativity or clarity.</p><p>When you revise the source phrase, generate a fresh version from the clean original. This avoids leaving hidden combining marks in the edited string and keeps the output predictable enough to review.</p>
            TXT],
            ['title' => 'Check the text length after transformation', 'html' => <<<'TXT'
            <p>Combining marks count toward text limits even when they appear as one decorative cluster. If a platform rejects the output, shorten the plain source text and generate it again; removing visible characters from the distorted result may leave marks behind.</p>
            TXT],
            ['title' => 'Retain the source wording', 'html' => <<<'TXT'
            <p>Save the clean source phrase until the final post is checked. That makes later corrections easier than editing an output with invisible marks.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I make glitch text?', 'a' => 'Enter or paste text in the input field. The tool creates a decorative glitch-style Unicode version for you to review and copy.'],
            ['q' => 'Why can glitch text be hard to read?', 'a' => 'The effect uses extra visual marks and characters that can overlap. Keep the text short when readability matters and check the result in the app where you plan to use it.'],
            ['q' => 'Will glitch text work in every app?', 'a' => 'Not necessarily. Unicode and combining-mark support varies across fonts, platforms and assistive technology, so the result may wrap, stack or appear differently elsewhere.'],
        ],
        'related' => [
            ['path' => '/everyday-life/acceptance-rate', 'name' => 'Acceptance rate'],
            ['path' => '/everyday-life/add-days', 'name' => 'Add days'],
            ['path' => '/everyday-life/add-minutes', 'name' => 'Add minutes'],
        ],
    ],
];
