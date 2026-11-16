<?php

/**
 * Underline text
 * /everyday-life/underline-text
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Underline text',
    'meta' => ['title' => 'Underline text Calculator — Formula & Results', 'description' => 'Underline text takes enter your text and returns double. A worked example follows. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Underline text Calculator', 'updated' => '2026-03-25'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'input_text', 'label' => 'Enter your text', 'type' => 'text', 'help' => 'Type or paste any text.'],
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
                        ['name' => 'output_underline', 'label' => 'Underline', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_double', 'label' => 'Double', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_wavy', 'label' => 'Wavy', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_dots', 'label' => 'Dots', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_continuous', 'label' => 'Continuous', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";function applyStyle(text,styleChar){if(!text){return""}var fixedText=text.replace(/ /g,"\xA0");var result="";for(var i=0;i<fixedText.length;i++){if(styleChar==="\u035F"&&i===fixedText.length-1){result+=fixedText[i]}else{result+=fixedText[i]+styleChar}}return result}var STYLE={single:"\u0332","double":"\u0333",wavy:"\u0330",dots:"\u0324",continuous:"\u035F"};omni.onResult(["input_text"],function(ctx){var input=ctx.getRawInput("input_text")||"";ctx.exportValue("output_underline","");ctx.exportValue("output_double","");ctx.exportValue("output_wavy","");ctx.exportValue("output_dots","");ctx.exportValue("output_continuous","");if(!input.trim()){return}ctx.exportValue("output_underline",applyStyle(input,STYLE.single));ctx.exportValue("output_double",applyStyle(input,STYLE["double"]));ctx.exportValue("output_wavy",applyStyle(input,STYLE.wavy));ctx.exportValue("output_dots",applyStyle(input,STYLE.dots));ctx.exportValue("output_continuous",applyStyle(input,STYLE.continuous))});//# sourceURL=customJs.js
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
        'output_underline',
        'output_double',
        'output_wavy',
        'output_dots',
        'output_continuous'
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
        The Underline text calculator is a free, no-sign-up everyday life tool. Fill in the field it asks for and it works out the answer straight away, with the formula shown underneath.
        TXT,
        'sections' => [
            ['title' => 'How does the Underline text calculator work?', 'html' => '<p>The Underline text calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>'],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Underline text calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 1 figures keep coming back — enter your text — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Underline text calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li> A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/hours-between-two-times">Hours between two times</a>, <a href="/everyday-life/hours-minutes">Hours and minutes</a> and <a href="/everyday-life/hours-to-decimal">Hours to decimal</a>.</p>
            TXT],
            ['title' => 'How the underline characters are made', 'html' => <<<'TXT'
            <p>The page creates underlined-looking outputs by adding Unicode combining marks to the entered characters. The single, double, wavy and dotted styles use different marks; the continuous style uses a mark designed to join adjacent characters. Spaces are preserved in a way that helps keep the decoration visually continuous in many renderers.</p><p>These marks are not the same as a text editor’s underline attribute. The output is a sequence of characters and marks, so its appearance depends on font shaping and how an app positions combining marks. A mark may sit too low, overlap the next line or appear disconnected on a platform with limited support.</p>
            TXT],
            ['title' => 'Combining marks and rendering differences', 'html' => <<<'TXT'
            <p>A combining mark modifies the character before it rather than occupying a normal independent letter position. Repeating that pattern across a phrase can create an underline effect, but software does not display all combinations identically. Font metrics, line height, text direction and the handling of spaces affect whether the mark joins smoothly.</p><p>Try a short test in the app where you intend to use the result. Check the line at both desktop and mobile sizes, and look for clipping, doubled marks or unexpected spacing. If the rendering is uneven, use the destination app’s native underline option or a design tool that applies a real style.</p>
            TXT],
            ['title' => 'Choosing among the styles', 'html' => <<<'TXT'
            <p>Single underlining is usually the simplest effect; double, wavy and dotted versions are more decorative and can attract attention. Compare the generated outputs at the final text size. A mark that looks subtle in a large preview can become visually dense in a small profile or crowded line.</p><p>Use one treatment consistently and reserve it for short emphasis. Combining multiple underline styles or pairing them with bold and decorative alphabets can make the text difficult to scan. The output labels describe the intended visual style, but the final appearance depends on the platform, font and surrounding text.</p>
            TXT],
            ['title' => 'Copying and editing the result', 'html' => <<<'TXT'
            <p>Enter or paste ordinary text, choose one of the generated lines and copy the complete result. Keep the original wording separately; editing a string of decorated characters can be awkward because each visible letter may be followed by a hidden combining mark. Placing the cursor in the middle of a word or deleting one character can leave a mark behind.</p><p>If you need to revise a sentence, change the source text and generate the output again. After pasting, select a short section and confirm the underline marks travel with the letters. If a destination strips combining marks, switch to its native underline control rather than trying to repair the copied string by hand.</p>
            TXT],
            ['title' => 'Accessibility and meaning', 'html' => <<<'TXT'
            <p>Combining-mark output is a visual effect, not semantic emphasis. Assistive technology may announce the underlying marks or read the characters in an unexpected way. Do not rely on decorative underlining alone to identify a required field, a warning or a link. In documents and websites, use real underline styling and preserve the text as ordinary characters.</p><p>Underlining also has established conventions: readers often expect underlined text to be a link. If a decorative underline is not clickable, make that clear from context. Use color, labels or surrounding wording to communicate meaning rather than depending only on the mark’s appearance.</p>
            TXT],
            ['title' => 'Punctuation, symbols and mixed scripts', 'html' => <<<'TXT'
            <p>The tool applies its mark pattern to the input string, but punctuation, emoji, accented letters and non-Latin scripts can have different spacing and shaping behavior. A combining mark may attach to an unexpected glyph or fail to join the next character. Inspect every mixed-script result, especially names and symbols where a stray mark could change how a reader interprets the text.</p><p>URLs, code, email addresses and account identifiers are poor candidates for decorative marks because the visible string can stop matching the underlying characters users need to type. Keep those in plain text. For longer passages, use native formatting, which is easier to edit and generally more robust.</p>
            TXT],
            ['title' => 'A practical workflow', 'html' => <<<'TXT'
            <p>Start with the original phrase, generate the styles and choose the least elaborate one that serves the purpose. Copy it into the intended application, inspect spacing and line breaks, then check that a reader can still select and understand it. If the output will be used in a public notice or accessible document, prefer proper formatting controls.</p><p>The calculator does not change font files or create a permanent style for an entire document. It generates copyable text for a specific passage. Keep the source phrase so you can update it later, and re-test after changing wording, punctuation or the destination platform.</p>
            TXT],
            ['title' => 'Troubleshooting an uneven underline', 'html' => <<<'TXT'
            <p>If the decoration appears broken, first try a shorter phrase and another style. A long word may wrap at a line edge, while a narrow container can split combining marks from the characters they modify. A different font or text editor may handle the same sequence more cleanly. Avoid adding extra spaces as a repair unless you have checked the result at the final width.</p><p>If no variant renders consistently in the destination, use its built-in underline tool. Native styling is more predictable across edits and often better for accessibility, searching and copying. The text generator is best for informal decorative text, not for content whose layout or meaning must remain exact.</p>
            TXT],
            ['title' => 'Editing decorated strings', 'html' => <<<'TXT'
            <p>A combining mark is attached to a preceding character, so editing a generated word can be less intuitive than editing ordinary text. Pressing backspace may remove a mark first and leave the visible letter, or select-and-replace operations may split the pair. If a phrase needs revision, return to the original input, make the edit there and generate a fresh output rather than manually repairing each decorated character.</p><p>Normalization and copying tools can also alter combining sequences. Keep a plain-text source and verify the result after pasting, especially if the text passes through chat apps, content-management systems or form fields that sanitize input.</p>
            TXT],
            ['title' => 'Spacing, line breaks and font support', 'html' => <<<'TXT'
            <p>Underline marks follow the sequence of characters, but layout engines decide how those marks are positioned. A word that wraps at the edge of a narrow column may split the visual line; the mark can appear close to the next line or continue in a way that looks uneven. Spaces and punctuation may also create gaps or extended marks depending on the font.</p><p>Test the output at the actual width and font size. If a clean continuous line is essential, use a border or underline style in a design or document editor. That approach separates visual decoration from the underlying text and gives you more control over wrapping.</p>
            TXT],
            ['title' => 'Choosing between characters and formatting', 'html' => <<<'TXT'
            <p>Unicode underlining is convenient for short plain-text decorations, but it is not a replacement for the underline control in a word processor or webpage. Native formatting can be turned on and off without changing the letters, can be styled consistently, and is more suitable for long-form text. It also helps preserve search, spell-check and editing behavior.</p><p>Use generated marks when the destination does not offer formatting and the phrase is brief. Avoid using them for links, legal text, instructions or data that users must copy exactly. If underlining signals a link in your design, ensure that the styled text is actually clickable so readers are not misled.</p>
            TXT],
            ['title' => 'Checking accessibility before sharing', 'html' => <<<'TXT'
            <p>Screen readers and other assistive tools may announce combining marks, omit them or handle them differently. Do not rely on the visual line alone to communicate “required,” “warning” or another important status. Include a clear text label and, where possible, use semantic formatting supported by the destination.</p><p>If accessibility is important, test with the relevant assistive technology or ask users with different needs to review the content. A decorative result that looks attractive but cannot be interpreted consistently is not a good substitute for clear wording and native text styling.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I underline text with this tool?', 'a' => 'Type or paste text in the input. The calculator generates several decorative outputs, including underline styles, for you to select and copy.'],
            ['q' => 'Can I change the underline style?', 'a' => 'Yes. Compare the styles shown in the output area, such as continuous, double, wavy or dotted treatments, and copy the one that suits your use.'],
            ['q' => 'Will the underline look the same everywhere?', 'a' => 'Not always. These outputs rely on Unicode characters and combining marks, whose rendering and accessibility support vary by app, font and device.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hours-between-two-times', 'name' => 'Hours between two times'],
            ['path' => '/everyday-life/hours-minutes', 'name' => 'Hours and minutes'],
            ['path' => '/everyday-life/hours-to-decimal', 'name' => 'Hours to decimal'],
        ],
    ],
];
