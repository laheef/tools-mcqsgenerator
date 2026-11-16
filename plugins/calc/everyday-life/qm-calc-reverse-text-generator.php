<?php

/**
 * Reverse text generator
 * /everyday-life/reverse-text-generator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reverse text generator',
    'meta' => ['title' => 'Reverse text generator Calculator: Free, With Steps', 'description' => 'Reverse text generator reports reverse all, reverse wording and reverse letters. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Reverse text generator Calculator', 'updated' => '2026-08-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'input_text', 'label' => 'Text to reverse', 'type' => 'text'],
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
                        ['name' => 'reverse_all', 'label' => 'Reverse all', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'reverse_wording', 'label' => 'Reverse wording', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'reverse_letters', 'label' => 'Reverse letters', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.onResult(["input_text"],function(ctx){var input=ctx.getRawInput("input_text");var trimmed=input.trim();var reverseAll=trimmed.split("").reverse().join("");var reverseWording=function(){var t=trimmed;var m=t.match(/([.!?]+)$/);var p=m?m[1]:"";var w=t.replace(/([.!?]+)$/,"").split(/\s+/).reverse();if(p){w[0]=p+w[0]}return w.join(" ")}();var reverseLettersPerWord=trimmed.split(/\s+/).map(function(word){var match=word.match(/^(\W*)(\w+)(\W*)$/);if(match){var leading=match[1];var letters=match[2].split("").reverse().join("");var trailing=match[3];return leading+letters+trailing}return word}).join(" ");ctx.exportValue("reverse_all",reverseAll);ctx.exportValue("reverse_wording",reverseWording);ctx.exportValue("reverse_letters",reverseLettersPerWord)});//# sourceURL=customJs.js
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
        'reverse_all',
        'reverse_wording',
        'reverse_letters'
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
        'intro' => 'The Reverse text generator calculator returns your result from the field on the form.',
        'sections' => [
            ['title' => 'How does the Reverse text generator calculator work?', 'html' => <<<'TXT'
            <p>The Reverse text generator calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you type in the text to reverse.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Reverse text generator calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 1 figures keep coming back — the text to reverse — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Reverse text generator calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — text to reverse for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/days-until-december">Days until December</a>, <a href="/everyday-life/days-until-june">Days until June</a> and <a href="/everyday-life/deadline">Deadline</a>.</p>
            TXT],
            ['title' => 'Three ways to reverse a text string', 'html' => <<<'TXT'
            <p>The Reverse text generator offers distinct transformations rather than one universal meaning of “reverse.” Reverse all reverses the complete trimmed string character by character. Reverse wording reverses the order of whitespace-separated words while leaving the letters in each word in their normal order. Reverse letters reverses letters within each matched word but keeps the word sequence. Choose the output that matches the effect you want.</p>
            <p>The tool trims whitespace at the start and end of the input before transforming it. In reverse-wording mode, multiple internal spaces are treated as separators and the output joins words with single spaces. A sequence of terminal periods, exclamation marks or question marks is handled specially and placed with the first word in the reversed order. Other punctuation may stay attached to the word it originally accompanied.</p>
            <p>Reverse-letters mode recognizes a limited pattern of leading punctuation, ASCII letters/digits/underscore and trailing punctuation. Words containing accented letters, apostrophes in unexpected positions, non-Latin scripts or emoji may not be reversed as a reader expects. Reverse-all mode uses JavaScript string splitting by UTF-16 code units, so some emoji or characters represented by surrogate pairs can break when reversed.</p>
            <p>These modes can produce different punctuation and spacing. For example, reversing a sentence as a whole also moves its final punctuation to the beginning, while reversing words can preserve more of the original sentence structure. If punctuation matters, inspect the result rather than assuming it has been corrected automatically.</p>
            <p>Use the calculator for puzzles, playful messages or checking a simple string operation. It does not translate text, preserve every language’s word boundaries or understand sentence meaning. If the output needs to be readable in another language, keep the original alongside it and verify the result manually.</p>
            <p>For a technical use, decide whether you mean code-point order, grapheme-cluster order, word order or a linguistic reversal. These are different operations. This page implements the three behaviors shown in its labels and may not match a programming library’s definition of “reverse.”</p>
            <p>Keep a copy of the source text if you need to restore it. Reversing an output a second time may not recover the original exactly if leading/trailing whitespace was removed, repeated spaces were collapsed or unsupported Unicode characters were split.</p>
            <p>Check the result in the destination app, especially if it contains emoji, combining accents, line breaks or non-English writing. The calculator transforms text as a string; it cannot guarantee the same visual order in right-to-left scripts or every editor.</p>
            TXT],
            ['title' => 'Choose the transformation that preserves your intent', 'html' => <<<'TXT'
            <p>Reverse all is useful when you want the entire string in the opposite character order, such as a simple puzzle or visual effect. It also moves spaces and punctuation because they are characters in the sequence. Reverse wording keeps each word intact but changes the word order; that may be suitable for a word-order exercise. Reverse letters changes the spelling inside words while leaving the sequence of words in place.</p><p>These operations are not interchangeable. A sentence with punctuation can become difficult to read when the final mark moves to the front. Reverse wording has a special rule for a final run of periods, exclamation marks or question marks, but it does not perform a full punctuation-aware linguistic transformation. Commas, quotes, parentheses and other marks may remain attached to their original word.</p><p>Reverse letters only reverses a matched ASCII word pattern. Leading and trailing non-word punctuation can be kept around the reversed letters, while a word containing apostrophes, accented characters or non-Latin letters may not match the same way. If a word looks unchanged, it may fall outside that simple pattern rather than being skipped intentionally.</p><p>Unicode introduces another distinction: a visible character can consist of multiple code points. Emoji, skin-tone modifiers, flags, and letters with combining accents may be split if a reversal operates on code units or individual code points. The displayed result can then contain broken symbols. This is why a language-aware or grapheme-aware reversal may differ from the calculator’s output.</p><p>Before using the result, test a short sample with spaces, punctuation and any special characters you plan to include. Compare the output with the desired behavior and keep the source string. If the text needs to be understood by a person, say what operation was applied or provide the original too.</p><p>For code, data, passwords or identifiers, use a programming library with documented Unicode behavior rather than a decorative text generator. This page is designed for everyday experimentation, not a reversible encoding standard or a security feature.</p><p>One reversal may not exactly undo another if the tool trimmed outer whitespace, collapsed repeated spaces or split Unicode characters. Save the original whenever exact recovery matters.</p>
            TXT],
            ['title' => 'A few short examples to distinguish the modes', 'html' => <<<'TXT'
            <p>Consider the phrase “red blue.” Reverse all changes the character sequence, including the space, so the words and letters both appear backward. Reverse wording changes the word order to “blue red” while leaving each word spelled normally. Reverse letters keeps the order “red blue” but reverses letters within each matched word. The three labels describe different operations.</p><p>Punctuation adds another layer. In reverse-all mode, punctuation moves like any other character. In reverse-wording mode, a final run of period, exclamation or question marks is treated specially, while other punctuation may remain attached to a word. Reverse-letters mode keeps some leading and trailing punctuation around the letter sequence. Always inspect the result if punctuation carries meaning.</p><p>Outer whitespace is trimmed before the transformation. Reverse wording splits on whitespace and rejoins tokens with single spaces, so repeated spaces or tabs may not be restored. Newlines and indentation may behave differently from ordinary word separators.</p><p>Unicode text is not always one visible character per code unit. Some emoji and accented letters use multiple code points, which can separate when reversed. If you need to reverse a multilingual sentence or preserve grapheme clusters, use a Unicode-aware tool designed for that task and compare the output manually.</p><p>This generator is useful for a puzzle or a quick demonstration, but it is not a general-purpose data-reversal standard. Keep the original string, test a short sample and choose the mode whose behavior matches your intent.</p>
            TXT],
            ['title' => 'When exact reversal matters', 'html' => <<<'TXT'
            <p>If the text includes emoji, accented characters, right-to-left writing, code or repeated whitespace, test a short example before relying on the output. The calculator implements simple string operations and may not preserve visual characters or formatting in every language.</p><p>For data processing, use a library with documented Unicode and grapheme-cluster behavior, and keep a copy of the original. This page is intended for everyday text effects, not for transforming records where exact recovery is required.</p><p>Reversal is not encryption. Anyone can run the operation in the other direction or inspect the text, so never use it to protect private information.</p>
            TXT],
            ['title' => 'Keep the operation reversible in your notes', 'html' => <<<'TXT'
            <p>Save the original text before transforming it, especially when it contains repeated spaces, line breaks or special characters. Trimming and simple character reversal may not preserve every formatting detail, so the output should not be the only copy if exact recovery matters.</p><p>Use the mode label to record whether the text was reversed as a whole, by words or within each word. Those operations produce different results and cannot be inferred reliably from an arbitrary string.</p>
            TXT],
            ['title' => 'Check the output before sharing', 'html' => <<<'TXT'
            <p>Confirm punctuation, spaces and any emoji in the destination app. If anything looks broken, return to the original text and use a Unicode-aware method appropriate to the characters involved.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What kinds of reversal can I compare?', 'a' => 'The tool provides separate outputs for reversing all text, word order and letter order. Choose the version that matches the effect you want and inspect punctuation before using it.'],
            ['q' => 'Does reversing text translate or encrypt it?', 'a' => 'No. It changes character or word order according to the selected output; it does not translate language or protect the text from being read.'],
            ['q' => 'Why can reversed text render unexpectedly?', 'a' => 'Writing direction, punctuation, emoji and combined Unicode characters can behave differently in other apps. Check the copied result in its destination.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-until-december', 'name' => 'Days until December'],
            ['path' => '/everyday-life/days-until-june', 'name' => 'Days until June'],
            ['path' => '/everyday-life/deadline', 'name' => 'Deadline'],
        ],
    ],
];
