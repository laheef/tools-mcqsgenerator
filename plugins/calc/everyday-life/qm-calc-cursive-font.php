<?php

/**
 * Cursive font
 * /everyday-life/cursive-font
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cursive font',
    'meta' => ['title' => 'Cursive font Calculator — Formula, Units & Example', 'description' => 'Enter enter your text and Cursive font returns italic serif and script. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Cursive font Calculator', 'updated' => '2026-03-25'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'input_text', 'label' => 'Enter your text', 'type' => 'text', 'help' => 'Type or paste any text. Numbers and punctuation stay unchanged.'],
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
                        ['name' => 'output_italic_serif', 'label' => 'Italic serif', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_script', 'label' => 'Script', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_bold_italic_serif', 'label' => 'Bold italic serif', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_bold_italic_sans', 'label' => 'Bold italic sans', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_italic_sans', 'label' => 'Italic sans', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_bold_script', 'label' => 'Bold script', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";function mapAZ(ch,upperStart,lowerStart){var code=ch.charCodeAt(0);if(code>=65&&code<=90){return String.fromCodePoint(upperStart+(code-65))}if(code>=97&&code<=122){return String.fromCodePoint(lowerStart+(code-97))}return ch}var SCRIPT_CAP_PATCH={B:"\u212C",E:"\u2130",F:"\u2131",H:"\u210B",I:"\u2110",L:"\u2112",M:"\u2133",R:"\u211B"};var SCRIPT_LOW_PATCH={l:"\uD835\uDCC1",e:"\u212F",g:"\u210A",o:"\u2134"};var ITALIC_LOW_PATCH={h:"\u210E"};function transform(raw,type){var out="";for(var i=0;i<raw.length;i++){var ch=raw[i];if(!/[A-Za-z]/.test(ch)){out+=ch;continue}switch(type){case"italic_serif":{if(ch==="h"){out+=ITALIC_LOW_PATCH.h}else{out+=mapAZ(ch,119860,119886)}break}case"script":{if(ch===ch.toUpperCase()&&SCRIPT_CAP_PATCH[ch]){out+=SCRIPT_CAP_PATCH[ch]}else if(ch===ch.toLowerCase()&&SCRIPT_LOW_PATCH[ch]){out+=SCRIPT_LOW_PATCH[ch]}else{out+=mapAZ(ch,119964,119990)}break}case"bold_italic_serif":{out+=mapAZ(ch,119912,119938);break}case"bold_italic_sans":{out+=mapAZ(ch,120380,120406);break}case"italic_sans":{out+=mapAZ(ch,120328,120354);break}case"bold_script":{out+=mapAZ(ch,120016,120042);break}default:{out+=ch;break}}}return out}omni.onResult(["input_text"],function(ctx){var input=ctx.getRawInput("input_text")||"";ctx.exportValue("output_italic_serif","");ctx.exportValue("output_script","");ctx.exportValue("output_bold_italic_serif","");ctx.exportValue("output_bold_italic_sans","");ctx.exportValue("output_italic_sans","");ctx.exportValue("output_bold_script","");if(!input.trim()){return}ctx.exportValue("output_italic_serif",transform(input,"italic_serif"));ctx.exportValue("output_script",transform(input,"script"));ctx.exportValue("output_bold_italic_serif",transform(input,"bold_italic_serif"));ctx.exportValue("output_bold_italic_sans",transform(input,"bold_italic_sans"));ctx.exportValue("output_italic_sans",transform(input,"italic_sans"));ctx.exportValue("output_bold_script",transform(input,"bold_script"))});//# sourceURL=customJs.js
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
        'output_italic_serif',
        'output_script',
        'output_bold_italic_serif',
        'output_bold_italic_sans',
        'output_italic_sans',
        'output_bold_script'
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
        The Cursive font calculator takes the numbers you enter and reports the result immediately.

         The panel waits for the button.
        TXT,
        'sections' => [
            ['title' => 'How does the Cursive font calculator work?', 'html' => '<p>The Cursive font calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>'],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cursive font calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 1 figures keep coming back — enter your text — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Cursive font calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li> A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/time-adder">Time adder</a>, <a href="/everyday-life/time-between-dates">Time between dates</a> and <a href="/everyday-life/time-card">Time card</a>.</p>
            TXT],
            ['title' => 'Cursive-looking text is a Unicode substitution', 'html' => <<<'TXT'
            <p>This tool creates cursive-style, italic and related outputs by replacing many basic Latin letters with Unicode mathematical alphanumeric symbols. It does not install a font, apply a typographic style to the original text or generate an image. The output is still a string of characters, and its appearance depends on the font and platform that displays it.</p>
            <p>Several styles are provided, including italic serif, script, bold italic and bold script variants. The tool maps the letters A through Z and a through z where corresponding characters exist, and preserves non-letter characters such as spaces, digits and punctuation. Unicode includes special legacy symbols for some script letters, so an output may not be a perfectly uniform typeface. Some letters may look more decorative than others.</p>
            <p>Because the characters are different code points from ordinary Latin letters, the output can behave differently in search, spell-check, copy-paste and assistive technology. A screen reader may announce the mathematical character name instead of reading the word naturally. Search engines and text filters may not match the original spelling. For headings, navigation, instructions or important names, use normal text with actual CSS or semantic markup instead of these substitutions.</p>
            <p>Compatibility varies by device and app. A character can display in one browser but appear as a blank square in another if the font lacks that glyph. Social platforms may normalize or remove unusual characters, and a copied string can change when pasted into an editor. Test a short sample in the destination before using it publicly.</p>
            <p>Use the generated text for short decorative captions where the style adds value and readers can still understand it. Keep a plain-text version available, especially for links, usernames and information people need to search or quote. Do not use decorative Unicode to disguise a link or make a message appear more secure.</p>
            <p>If you want genuine italic or script typography in a document you control, format ordinary text with the application’s font tools. That preserves the underlying spelling and generally works better for accessibility and indexing. This calculator is a visual character effect, not a font file, translation service or semantic text formatter.</p>
            <p>Review the exact result before posting. Accented characters, non-Latin scripts and emoji may remain unchanged, and the map may cover only basic English letters. The output is a starting point for decoration, not a guarantee that every character will render consistently.</p>
            TXT],
            ['title' => 'Compatibility and accessibility of script-style text', 'html' => <<<'TXT'
            <p>Script-style Unicode can be convenient for a short decorative heading, but it has trade-offs. The output characters are often drawn from mathematical alphanumeric blocks, whose original purpose is not the same as ordinary italic or handwriting typography. Different apps may select different fallback fonts, so letter shapes, spacing and baseline can vary. A script capital may look different from the neighboring lowercase letters because Unicode has gaps or special legacy characters in the map.</p><p>Screen readers may announce each symbol by its Unicode name rather than reading the intended word. Search and spell-check may not treat a styled character as the corresponding Latin letter. This matters for navigation, public information, instructions, educational material and links. Use normal text with CSS or the document’s font formatting when you control the presentation; that keeps the underlying content accessible and searchable.</p><p>Not every letter or language has a matching variant. The tool maps basic English A–Z letters and leaves digits, punctuation, spaces and many accented or non-Latin characters unchanged. A sentence can therefore mix decorative and ordinary glyphs. Inspect names and loanwords carefully before sharing.</p><p>Copy-paste behavior can vary. A social app may accept the characters, while an email client, older device or search field may not. Some platforms normalize text or strip characters. Test the output in the actual destination, and provide the plain spelling if readers need to copy or find it.</p><p>For a short profile line or playful title, Unicode can create a consistent-looking accent when supported. Avoid using it for a long paragraph; reduced readability and screen-reader output can make the text tiring or inaccessible. Keep the amount of decoration proportional to the importance of the message.</p><p>Remember that a cursive-looking string is still editable text, not a protected logo or font file. It does not guarantee exclusive design rights or a particular visual result. If you need a brand identity or print-ready typography, work with a font and design system that supports the required characters.</p><p>This converter changes characters, not meaning. It does not proofread, translate, or ensure that a message remains legible on every device.</p>
            TXT],
            ['title' => 'When Unicode script is and is not a good choice', 'html' => <<<'TXT'
            <p>Unicode script can work for a short decorative label in an app that supports the symbols. It is less suitable for long text, where cursive forms can reduce readability and create inconsistent spacing. A genuine script font in a design file gives more control over letter connections, line height and kerning while preserving ordinary characters underneath.</p><p>Some letters in the script alphabet have special Unicode code points rather than a simple contiguous mapping. The calculator handles several exceptions, but the result can still mix visually different glyphs. Check uppercase and lowercase forms in the target typeface; a special capital may look unlike the rest of the word.</p><p>Do not use Unicode script for a URL, username, product code or anything that readers must type exactly. Search engines, assistive technology and input validation may not treat the styled characters as the ordinary letters they resemble. If a platform offers a formatting tool, use that for semantic emphasis and keep the text searchable.</p><p>For a social caption, check how the output appears on mobile and desktop. If a character is missing, substitute plain text or use an image only when you can also provide an accessible text alternative. Keep a clean original so the phrase remains useful outside the decorative context.</p><p>The calculator cannot create a font file, check licensing or guarantee that a script style is suitable for a logo. For a brand or print project, use properly licensed type and review how it handles the full language and character set you need.</p>
            TXT],
            ['title' => 'Check language coverage and rendering', 'html' => <<<'TXT'
            <p>The mapping is strongest for basic English letters. Words with accents, diacritics or non-Latin scripts may display as a mixture of styles because matching Unicode variants are not available or are not included in the page. Do not assume the result preserves every language’s orthography.</p><p>For multilingual text, test each word in the destination font and keep ordinary text available. If a glyph is missing or a screen reader announces an unfamiliar symbol, use real formatting instead.</p><p>Decorative script is best used sparingly. A plain heading with one short stylized phrase is often easier to read than a whole paragraph converted into mathematical symbols.</p>
            TXT],
            ['title' => 'Prefer actual text styles for essential writing', 'html' => <<<'TXT'
            <p>If the text must remain easy to read aloud, search or edit, use the app’s built-in italic or script font instead of the Unicode output. Real formatting preserves the underlying letters and can adapt to the reader’s settings. Unicode variants may be useful for a playful accent, but they should not carry essential information on their own.</p><p>Keep any plain version close to the decorative string when sharing with a broad audience. This helps readers who encounter missing glyphs or screen-reader output that names the symbols individually.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the cursive text converter produce?', 'a' => 'It creates script-style and related Unicode text variants from the characters you enter. The generated text is not an installed font file and does not change the formatting of the source text.'],
            ['q' => 'How do I use the converted text?', 'a' => 'Type or paste text into the input, choose the script-style output that suits your use, then copy it into the destination app.'],
            ['q' => 'Why might the result display differently elsewhere?', 'a' => 'The destination device and font must support the Unicode characters. Some letters, symbols or languages do not have matching script variants, so they may remain unchanged or render differently.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-adder', 'name' => 'Time adder'],
            ['path' => '/everyday-life/time-between-dates', 'name' => 'Time between dates'],
            ['path' => '/everyday-life/time-card', 'name' => 'Time card'],
        ],
    ],
];
