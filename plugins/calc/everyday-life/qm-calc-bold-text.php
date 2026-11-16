<?php

/**
 * Bold text
 * /everyday-life/bold-text
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bold text',
    'meta' => ['title' => 'Bold text Calculator: Formula, Steps & Examples', 'description' => 'Bold text takes enter your text and returns bold serif and bold sans. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Bold text Calculator', 'updated' => '2026-08-27'],
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
                        ['name' => 'output_bold_serif', 'label' => 'Bold serif', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_bold_sans', 'label' => 'Bold sans', 'type' => 'number', 'readonly' => true],
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
                        ['name' => 'output_bold_script', 'label' => 'Bold script', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_bold_fraktur', 'label' => 'Bold fraktur', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_double_struck', 'label' => 'Double struck', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'output_monospace', 'label' => 'Monospace', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";function mapAZ(ch,upperStart,lowerStart){var code=ch.charCodeAt(0);if(code>=65&&code<=90){return String.fromCodePoint(upperStart+(code-65))}if(code>=97&&code<=122){return String.fromCodePoint(lowerStart+(code-97))}return ch}var DOUBLE_STRUCK_CAP_PATCH={C:"\u2102",H:"\u210D",N:"\u2115",P:"\u2119",Q:"\u211A",R:"\u211D",Z:"\u2124"};function transform(raw,type){var out="";for(var i=0;i<raw.length;i++){var ch=raw[i];if(!/[A-Za-z]/.test(ch)){out+=ch;continue}switch(type){case"bold_serif":{out+=mapAZ(ch,119808,119834);break}case"bold_sans":{out+=mapAZ(ch,120276,120302);break}case"bold_italic_serif":{out+=mapAZ(ch,119912,119938);break}case"bold_italic_sans":{out+=mapAZ(ch,120380,120406);break}case"bold_script":{out+=mapAZ(ch,120016,120042);break}case"bold_fraktur":{out+=mapAZ(ch,120172,120198);break}case"double_struck":{if(ch===ch.toUpperCase()&&DOUBLE_STRUCK_CAP_PATCH[ch]){out+=DOUBLE_STRUCK_CAP_PATCH[ch]}else{out+=mapAZ(ch,120120,120146)}break}case"monospace":{out+=mapAZ(ch,120432,120458);break}default:{out+=ch;break}}}return out}omni.onResult(["input_text"],function(ctx){var input=ctx.getRawInput("input_text")||"";ctx.exportValue("output_bold_serif","");ctx.exportValue("output_bold_sans","");ctx.exportValue("output_bold_italic_serif","");ctx.exportValue("output_bold_italic_sans","");ctx.exportValue("output_bold_script","");ctx.exportValue("output_bold_fraktur","");ctx.exportValue("output_double_struck","");ctx.exportValue("output_monospace","");if(!input.trim()){return}ctx.exportValue("output_bold_serif",transform(input,"bold_serif"));ctx.exportValue("output_bold_sans",transform(input,"bold_sans"));ctx.exportValue("output_bold_italic_serif",transform(input,"bold_italic_serif"));ctx.exportValue("output_bold_italic_sans",transform(input,"bold_italic_sans"));ctx.exportValue("output_bold_script",transform(input,"bold_script"));ctx.exportValue("output_bold_fraktur",transform(input,"bold_fraktur"));ctx.exportValue("output_double_struck",transform(input,"double_struck"));ctx.exportValue("output_monospace",transform(input,"monospace"))});//# sourceURL=customJs.js
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
        'output_bold_serif',
        'output_bold_sans',
        'output_bold_italic_serif',
        'output_bold_italic_sans',
        'output_bold_script',
        'output_bold_fraktur',
        'output_double_struck',
        'output_monospace'
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
        'intro' => 'The Bold text calculator returns your result from the field on the form.',
        'sections' => [
            ['title' => 'How does the Bold text calculator work?', 'html' => '<p>The Bold text calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>'],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Bold text calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 1 figures keep coming back — enter your text — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Bold text calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li> A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/sex">Sex frequency</a>, <a href="/everyday-life/shoe-size-conversion">Shoe size conversion</a> and <a href="/everyday-life/shoelace-length">Shoelace length</a>.</p>
            TXT],
            ['title' => 'Bold-looking Unicode and actual bold formatting', 'html' => <<<'TXT'
            <p>The Bold text calculator creates several bold-looking versions by substituting Latin letters with characters from Unicode’s mathematical alphanumeric blocks. It may offer bold serif, bold sans, bold italic, script, fraktur, double-struck and monospace styles. These are character substitutions, not a font-formatting command. The input’s appearance changes because the output contains different code points, not because the text has a semantic “bold” attribute.</p>
            <p>The map primarily transforms basic A–Z and a–z letters. Spaces, digits, punctuation and many other characters are passed through unchanged. Some double-struck capital letters use special existing Unicode symbols, so the style may not be perfectly consistent. Accented letters or characters from other scripts may not have a matching variant and can remain in their original form.</p>
            <p>Unicode-styled text can cause practical problems. Search may not find the original word, spell-checkers can flag it, and screen readers may announce mathematical character names rather than the intended sentence. Copying into an email, document or social platform can render differently depending on font support. Search engines and moderation systems may treat the output as unrelated symbols.</p>
            <p>For documents, websites and presentations you control, use real bold formatting or semantic emphasis. That preserves ordinary text for search and assistive technology while displaying it in bold. For a short decorative social caption, Unicode substitutions can be useful if the destination supports them and the message remains understandable.</p>
            <p>Before posting, test a short sample and compare every character. Keep a plain-text version so the message can be searched, quoted or read aloud. Avoid using special bold characters for important instructions, links, account names, legal text or content where precise spelling matters.</p>
            <p>Bold appearance is not the same as emphasis in meaning. If a sentence needs to communicate importance, make that clear in the wording and use typographic emphasis as a supplement. A decorative style cannot ensure that every reader will perceive the same hierarchy.</p>
            <p>This tool does not create a reusable font, format a file or encrypt text. It returns a Unicode string based on the input, and the final appearance depends on the reader’s device and software.</p>
            TXT],
            ['title' => 'Use semantic emphasis when the message matters', 'html' => <<<'TXT'
            <p>In a document or website you control, actual bold formatting is usually preferable to Unicode substitutions. HTML strong or emphasis markup can communicate meaning to assistive technology, and a word processor’s bold style preserves the ordinary spelling for search and editing. Unicode bold is most useful when an app offers no formatting controls and a short decorative effect is desired.</p><p>Different styles in the output are not equally complete. The map covers basic Latin letters and may use special exceptions for some mathematical symbols. Accented letters, non-Latin scripts and emoji may remain unchanged. A mixed sentence can look inconsistent, so proofread every word in the destination font.</p><p>Styled characters can create false matches in usernames, hashtags, URLs and search. A person may see a familiar letter, while software treats it as a different symbol. Avoid using Unicode substitutions in account names, form labels, directions, legal wording or technical identifiers. If exact spelling matters, use normal characters.</p><p>Screen readers may announce symbols such as “mathematical bold capital A” rather than simply reading “A.” This can make a sentence slow or confusing to hear. If you publish content for a broad audience, provide a plain text version and do not make the decorative string the only version of essential information.</p><p>Use a short sample to test copy and rendering across the platforms where it will appear. Some devices substitute fonts, and some moderation or search systems may fail to recognize the original words. Keep a plain copy so you can undo the effect without retyping.</p><p>Bold is a visual cue, but it is not a substitute for clear writing. If information is important, state it plainly and use semantic emphasis in a format that supports it. The tool returns alternative Unicode characters; it does not change the input’s underlying meaning, create an installed font or guarantee accessibility.</p><p>Use the output for decoration, not for hiding text, bypassing platform rules or encrypting a message. The characters can be copied and inspected like any other text.</p>
            TXT],
            ['title' => 'When actual bold formatting is the better tool', 'html' => <<<'TXT'
            <p>Use semantic bold or strong formatting when the goal is to emphasize information in a document, webpage or presentation. That formatting preserves the normal letters and can be interpreted by screen readers and search tools. Unicode bold is a workaround for platforms with no style controls, but it does not carry the same meaning to assistive software.</p><p>The calculator creates several visual variants; compare them in the destination app before deciding. A font may support bold serif but lack a less common mathematical symbol, leaving a blank box or a fallback character. Some special capitals are encoded separately, so the style can vary from letter to letter.</p><p>Avoid Unicode bold in links, hashtags, forms, passwords, code and names that need exact searching. It can make visually identical strings differ at the character level, and users may be unable to find or copy the original spelling. If you need emphasis in public information, use plain text plus accessible markup or a short descriptive label.</p><p>Keep a normal-text copy beside any decorative version. This helps people using assistive technology, allows editing later and ensures the original spelling can be found. If the app changes the text after pasting, compare it with the source rather than assuming the visual output is unchanged.</p><p>Bold text should support meaning, not replace it. State the important point clearly and use a style that matches the context. The generator is a character converter; it cannot decide what deserves emphasis or make a message more authoritative.</p>
            TXT],
            ['title' => 'Keep the original spelling available', 'html' => <<<'TXT'
            <p>Because the bold-looking output uses different characters, a search for the ordinary spelling may not find it. This can affect hashtags, names, labels and saved notes. If the text needs to be searchable or copied exactly, keep the normal version alongside the decorative one.</p><p>For an accessible page, use actual bold formatting with semantic markup and test it with assistive technology. The Unicode output is a visual workaround, not a replacement for accessible content structure.</p><p>Before sharing, copy the result into the target app and inspect letters that look similar to ordinary Latin characters. Font substitution can change their appearance.</p>
            TXT],
            ['title' => 'Use a short sample before converting a long phrase', 'html' => <<<'TXT'
            <p>Test a few uppercase and lowercase letters, digits and punctuation in the destination app. Some characters remain unchanged, and a font may not include every glyph. If the output looks inconsistent, use regular text with actual formatting rather than extending the conversion across a long passage.</p><p>For headings or labels, make sure the meaning is still clear without relying only on the bold appearance. The calculator does not mark semantic importance; it only substitutes characters.</p>
            TXT],
            ['title' => 'Use typography that travels well', 'html' => <<<'TXT'
            <p>If readers will copy or search the text, use plain characters with actual formatting. This keeps the spelling intact across platforms and avoids a visual style becoming a technical barrier.</p><p>The calculator is best for short decorative snippets where that trade-off is acceptable.</p>
            TXT],
            ['title' => 'Keep decorative emphasis optional', 'html' => <<<'TXT'
            <p>Use the transformed version only where its appearance helps. For important or longer content, clear plain text with semantic formatting is easier to access, search and maintain.</p>
            TXT],
            ['title' => 'Check how a device renders the output', 'html' => <<<'TXT'
            <p>A quick test in the target app helps catch missing characters before you share a longer phrase.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the bold text tool change?', 'a' => 'It converts typed characters into bold-looking Unicode variants such as bold serif, sans-serif and other styles. It changes the characters in the output, not the font styling of the original text.'],
            ['q' => 'How do I copy a bold version?', 'a' => 'Enter or paste text in the input field, choose the style you want from the generated outputs, then select and copy that output into your destination app.'],
            ['q' => 'Why do some characters look unchanged?', 'a' => 'Unicode has styled forms for many letters and digits, but coverage is not complete for every symbol or language. The appearance also depends on the font and app where you paste the text.'],
        ],
        'related' => [
            ['path' => '/everyday-life/sex', 'name' => 'Sex frequency'],
            ['path' => '/everyday-life/shoe-size-conversion', 'name' => 'Shoe size conversion'],
            ['path' => '/everyday-life/shoelace-length', 'name' => 'Shoelace length'],
        ],
    ],
];
