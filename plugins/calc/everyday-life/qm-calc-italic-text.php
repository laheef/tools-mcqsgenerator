<?php

/**
 * Italic text
 * /everyday-life/italic-text
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Italic text',
    'meta' => ['title' => 'Italic text Calculator: Formula, Steps & Examples', 'description' => 'Italic text reports italic serif, script, bold italic serif and bold italic sans. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Italic text Calculator', 'updated' => '2026-08-27'],
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
        The Italic text calculator is a free, no-sign-up everyday life tool. Fill in the field it asks for and it works out the answer straight away, with the formula shown underneath.
        TXT,
        'sections' => [
            ['title' => 'How does the Italic text calculator work?', 'html' => '<p>The Italic text calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>'],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Italic text calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 1 figures keep coming back — enter your text — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Italic text calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li> A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/bath-vs-shower-footprint">Bath vs shower</a>, <a href="/everyday-life/bathroom-mirror-size">Bathroom mirror size</a> and <a href="/everyday-life/battery-charge-time">Battery charge time</a>.</p>
            TXT],
            ['title' => 'What the generated styles represent', 'html' => <<<'TXT'
            <p>The converter produces several text variants so you can compare their appearance before copying one. The italic serif and italic sans outputs use different Unicode character sets; the script and bold-italic options use other styled alphabets. These are characters, not a font setting. That distinction explains why a pasted result can keep its appearance in a plain-text field, but also why it may behave differently from semantic italics in a document.</p><p>The output names describe the visual family, not a promise that every glyph looks identical on every device. Font design, screen rendering and the destination app all influence the result. Compare the variants at the size and in the context where you plan to use them.</p>
            TXT],
            ['title' => 'Unicode characters versus italic formatting', 'html' => <<<'TXT'
            <p>In a word processor, italic formatting normally keeps the original letters and attaches a style to them. This tool instead maps many basic Latin letters to visually related Unicode characters. The text remains plain text in the sense that no document-style instruction is attached, but the underlying code points differ from ordinary A-to-Z letters.</p><p>That makes the effect portable in some contexts, while creating trade-offs. Search, sorting, spell-checking and text editing may not treat the styled characters as their ordinary equivalents. If you are preparing a document, website or email where accessibility and semantic meaning matter, use the application’s italic formatting or HTML/CSS styles instead of substituting decorative characters.</p>
            TXT],
            ['title' => 'Copying and checking the result', 'html' => <<<'TXT'
            <p>Enter a short sample first, such as a heading and a sentence with punctuation, then inspect every output. Select the exact style you want and copy it into the destination app. Some apps preserve the Unicode characters, while others normalize, replace or render them with a fallback font. Check the pasted version there rather than assuming the preview guarantees identical display.</p><p>If a character looks like a box, question mark or unrelated symbol, the destination font may lack that glyph. Try another style or use ordinary text with native formatting. Keep a plain-text copy of important content so you can recover the original wording if a platform changes its rendering.</p>
            TXT],
            ['title' => 'Letters, numbers and punctuation', 'html' => <<<'TXT'
            <p>The conversion focuses on supported Latin letters. Numbers, punctuation, whitespace and many symbols are returned unchanged by the page’s transformation. Accented letters, non-Latin scripts, emoji and combining characters may also remain as entered because there is not a matching styled character for every code point.</p><p>Do not interpret an unchanged character as a calculation error: it can be a limitation of the available Unicode alphabet. For mixed-language names or technical text, compare the original and transformed outputs to make sure important symbols remain clear. If the text contains identifiers, URLs, formulas or code, decorative variants can make the content harder to copy accurately.</p>
            TXT],
            ['title' => 'Accessibility and readability', 'html' => <<<'TXT'
            <p>Decorative Unicode letters may be announced differently by screen readers and can be harder for assistive technology to interpret than ordinary text with real italic styling. A reader may identify mathematical or styled symbols individually, interrupting the flow of a sentence. Avoid using these characters for instructions, essential labels, long passages or information that every reader must understand.</p><p>For accessible web content, preserve ordinary text and apply emphasis semantically through the page’s styling. If you use a decorative variant in a social post or profile, keep a plain-text version nearby for clarity. Test with the audience and platform you intend to reach, particularly when the message contains names or directions.</p>
            TXT],
            ['title' => 'Search, editing and reuse', 'html' => <<<'TXT'
            <p>Because many styled letters are distinct code points, a search for the ordinary spelling may not find the decorated version. Copying it into a form, username or search field can also affect matching, sorting or automated moderation. Some systems accept the characters; others reject or normalize them. Test a small example before replacing a title or long block of text.</p><p>Keep the source text in an editable note and treat each generated output as a display copy. That makes it easier to change wording, correct a typo or switch back to standard text without reconstructing the sentence. If you plan to reuse the text in several platforms, confirm that each one renders the glyphs properly.</p>
            TXT],
            ['title' => 'When a styled variant is a good fit', 'html' => <<<'TXT'
            <p>Short decorative headings, playful profile text and informal labels are common low-stakes uses, provided the audience can read them. Choose a style that contrasts enough with surrounding text and avoid stacking several effects in the same line. A single styled phrase is usually easier to scan than a whole paragraph written in an ornamental alphabet.</p><p>For formal reports, documentation, accessibility-sensitive pages and searchable records, native text formatting is generally a better choice. It preserves the original letters and lets readers adjust their own font and assistive settings. The converter is a visual-text helper, not a substitute for typography controls in a publishing workflow.</p>
            TXT],
            ['title' => 'A quick quality check before sharing', 'html' => <<<'TXT'
            <p>Before posting, read the output aloud or ask another person to review it, check every name and number, and paste it into the actual destination to test rendering. Confirm that links remain usable and that the text can still be selected and copied. If the effect reduces legibility at small sizes or on a mobile screen, switch to a simpler variant or ordinary text.</p><p>The practical test is whether the intended reader can understand the words without guessing. The calculator can generate variants quickly; the context, audience and final display remain your responsibility.</p>
            TXT],
            ['title' => 'Preserving the original wording', 'html' => <<<'TXT'
            <p>Because a styled character is a separate Unicode code point, its visual similarity does not guarantee identical behavior in a search box or text-processing system. A search for an ordinary word may not match the decorated spelling, and spell-checkers may treat the output as unknown symbols. Keep the source phrase in plain text and use the styled version only where appearance matters more than text normalization.</p><p>If you are entering a name, tag or handle, check the platform’s rules first. Some services reject styled characters or treat them as different identifiers, which can make an account harder to find. A display name can be decorative while a contact address or URL should remain plain and exact.</p>
            TXT],
            ['title' => 'Testing a short sample', 'html' => <<<'TXT'
            <p>Use a small sample that includes upper- and lower-case letters, a number, punctuation and a non-English character. Compare each result with the input to see which characters change and which stay the same. This simple check is more reliable than assuming every style supports every script. It also helps reveal whether the selected font renders a particular letter as intended.</p><p>Then paste the sample into the destination. If it displays correctly there, try the full passage. If the line breaks or spacing change, shorten the styled portion or switch to native formatting. This two-step check prevents a decorative heading from becoming unreadable after publication.</p>
            TXT],
            ['title' => 'Choosing the right emphasis', 'html' => <<<'TXT'
            <p>Italic text conventionally marks titles, foreign terms or emphasis in some writing styles, but conventions vary by publication and language. A decorative Unicode variant does not tell a reader why a phrase is emphasized. Use surrounding wording or a proper document style when the distinction carries meaning, and avoid styling a long passage when a short phrase would do.</p><p>For a polished document, use the editor’s italic feature so readers and assistive tools can interpret the structure. The generator is most useful when you specifically want a visual Unicode effect in a plain-text setting and have checked that the characters are supported.</p>
            TXT],
            ['title' => 'Before you publish', 'html' => <<<'TXT'
            <p>Review the final text for readability, correct spelling, working links and accessibility. Check that names and numbers remain accurate, and do not use a styled alphabet to disguise a misleading claim or impersonate another account. If the text is important, keep an unstyled copy and ask someone to review the destination view.</p><p>The right result is the one the intended audience can read and understand. If a screen reader, search tool or platform handles the Unicode variant poorly, ordinary text with native styling is the more reliable choice.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the italic text converter produce?', 'a' => 'It maps supported characters into italic-looking Unicode variants, including serif, sans-serif and related styles. It does not apply italic formatting to a word-processing document.'],
            ['q' => 'How do I copy italic text?', 'a' => 'Type or paste your text, choose the generated style you want, and copy that output into the app or page where you need it.'],
            ['q' => 'Why are some characters not italicized?', 'a' => 'Unicode does not provide an italic equivalent for every character. Unsupported symbols or letters may remain unchanged, and the destination font affects how supported characters appear.'],
        ],
        'related' => [
            ['path' => '/everyday-life/bath-vs-shower-footprint', 'name' => 'Bath vs shower'],
            ['path' => '/everyday-life/bathroom-mirror-size', 'name' => 'Bathroom mirror size'],
            ['path' => '/everyday-life/battery-charge-time', 'name' => 'Battery charge time'],
        ],
    ],
];
