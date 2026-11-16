<?php

/**
 * Upside down text
 * /everyday-life/upside-down-text
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Upside down text',
    'meta' => ['title' => 'Upside down text — Formula, Steps & Examples', 'description' => 'Upside down text takes type or paste text to flip upside down and returns upside-down text. Every box can be solved for, not only the one in the title.', 'h1' => 'Upside down text Calculator', 'updated' => '2026-08-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'input_text', 'label' => 'Type or paste text to flip upside down', 'type' => 'text'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'order',
                            'label' => 'Text order',
                            'type' => 'select',
                            'options' => ['Normal' => '0', 'Reversed' => '1'],
                            'dataset' => 'backwards',
                            'default' => 'Normal',
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
                        ['name' => 'outputMessage', 'label' => 'Upside-down text', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.onResult(["input_text","order"],function(ctx,values){var inputText=ctx.getRawInput("input_text").trim();var mode=values["order"];var FLIP_MAP={a:"\u0250",b:"q",c:"\u0254",d:"p",e:"\u01DD",f:"\u025F",g:"\u0183",h:"\u0265",i:"\u1D09",j:"\u027E",k:"\u029E",l:"\u05DF",m:"\u026F",n:"u",o:"o",p:"d",q:"b",r:"\u0279",s:"s",t:"\u0287",u:"n",v:"\u028C",w:"\u028D",x:"x",y:"\u028E",z:"z",0:"0",1:"\u0196",2:"\u1105",3:"\u0190",4:"\u3123",5:"\u03DB",6:"9",7:"\u3125",8:"8",9:"6",".":"\u02D9",",":"'","'":",","\"":"\u201E","`":",","!":"\xA1","?":"\xBF","(":")",")":"(","[":"]","]":"[","{":"}","}":"{","<":">",">":"<","_":"\u203E","\u203E":"_","&":"\u214B"};function reversedText(text,shouldReverse){return shouldReverse===1?Array.from(text).reverse().join(""):text}function flipChars(text,map){return Array.from(text).map(function(ch){var _map$ch$toLowerCase;return(_map$ch$toLowerCase=map[ch.toLowerCase()])!==null&&_map$ch$toLowerCase!==void 0?_map$ch$toLowerCase:ch}).join("")}var text=inputText;text=reversedText(text,mode);text=flipChars(text,FLIP_MAP);ctx.exportValue("outputMessage",text)});//# sourceURL=customJs.js
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
        'outputMessage'
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
        'intro' => 'The Upside down text calculator takes the numbers you enter and reports the result immediately.',
        'sections' => [
            ['title' => 'How does the Upside down text calculator work?', 'html' => <<<'TXT'
            <p>The Upside down text calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the text order); then you type in the type or paste text to flip upside down.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <table><caption>What you supply, field by field</caption><thead><tr><th>Field</th><th>Units and meaning</th></tr></thead><tbody><tr><td>Type or paste text to flip upside down</td><td>a plain number with no unit attached.</td></tr><tr><td>Text order</td><td>pick the option that matches your case — 2 options, such as normal and reversed. </td></tr></tbody></table><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Upside down text calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 1 figures keep coming back — the type or paste text to flip upside down — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Upside down text calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — type or paste text to flip upside down for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/hours-to-decimal">Hours to decimal</a>, <a href="/everyday-life/how-many-days-have-i-been-alive">How many days have I been alive</a> and <a href="/everyday-life/how-many-tables">How many tables</a>.</p>
            TXT],
            ['title' => 'How the upside-down text transformation works', 'html' => <<<'TXT'
            <p>This tool maps selected characters to Unicode symbols that resemble rotated or inverted letters. It can also reverse the order of the text before applying the character map. The two modes create different effects: a character-by-character substitution keeps the original sequence, while reversed mode changes the order as well. Choose the mode based on how you want the result to read when viewed after rotation.</p>
            <p>The transformation is approximate because Unicode does not contain an upside-down equivalent for every character. Some letters and digits have visually similar symbols; others remain unchanged or use characters from different writing systems. A result that looks convincing in one font may look different in another. The tool does not rotate an image or change the device orientation—it replaces text characters.</p>
            <p>The page trims leading and trailing whitespace before transforming. Internal spaces and some punctuation are mapped or retained according to the character table. If exact spacing, line breaks or punctuation matter, test a short sample and inspect the copied output. The available map is not a complete typographic standard.</p>
            <p>Unicode characters can behave differently from ordinary Latin letters. Screen readers may pronounce them by their code-point names, search may not find the original spelling, and copy-paste may not preserve a visually identical result across apps. Font coverage and text normalization can also affect display. Avoid using upside-down text for names, accessibility-critical instructions, official documents, passwords or content that must be indexed and searched.</p>
            <p>Emoji, combining accents and scripts beyond the mapped alphabet may not reverse as a reader expects. Some characters consist of several code points joined together; reversing individual code points can separate a mark from its base or disturb a grapheme. Check the destination app with the actual text before sharing it publicly.</p>
            <p>For a playful caption or short decorative message, paste a small test into the target platform and confirm the appearance. Keep an unmodified copy of the original so that readers can recover the intended text if the special characters are unsupported.</p>
            <p>This calculator is a text effect, not encryption, translation or a reliable way to hide a message. The characters remain copyable and may be decoded by anyone who recognizes the mapping. Use plain text whenever clarity, accessibility or exact spelling matters.</p>
            TXT],
            ['title' => 'Unicode mapping and the limits of reversal', 'html' => <<<'TXT'
            <p>Upside-down text is made by substituting characters with Unicode symbols that resemble rotated forms. Some mappings are strong visual matches, while others are approximations or use symbols from unrelated scripts. The map covers a limited set of letters, digits and punctuation. Characters without an entry may remain unchanged, so a sentence can contain a mixture of rotated-looking and ordinary symbols.</p><p>In reversed mode, the calculator reverses the sequence of characters first and then applies the map. That is different from merely changing the appearance of each character. A period or bracket may have a mapped counterpart, and their position can change when the whole string is reversed. Try a short phrase and inspect the punctuation as well as the letters.</p><p>Unicode text is not the same as rotating a font or image. A font can draw a symbol differently, and some devices may show a missing-glyph box. Search, spell-check and text-to-speech may treat the substituted characters as different letters. If you need text that remains searchable, selectable by its original spelling or usable by assistive technology, keep a plain version too.</p><p>Combining marks and emoji are more complex than one character per visible symbol. A displayed emoji may consist of multiple code points joined together; reversing code points can break the sequence. Accented letters may also consist of a base character and a combining mark. The transformation does not preserve every grapheme as a single visual unit.</p><p>For short decorative posts, test the text on the platform where it will appear. Copying through a message app, social network or editor can normalize whitespace or alter font support. Keep the original message available so readers can recover it if the transformed version is difficult to interpret.</p><p>This effect is not a cipher, translation or reliable concealment. Anyone can copy the characters, and the mapping is not secret. Use normal text for identifiers, passwords, legal documents or instructions.</p>
            TXT],
            ['title' => 'A workflow for creating and checking a short message', 'html' => <<<'TXT'
            <p>Start with a short, plain-text phrase and choose whether to keep the character order or reverse it before mapping. Compare both outputs to see which effect is readable for your purpose. Short words are easier to inspect than a full paragraph, especially when punctuation or numbers are included.</p><p>Check the output character by character for letters that have no convincing rotated equivalent. Some symbols remain as they were, and some mapped symbols may look like a different letter. The appearance depends on font support, so a result that looks clear in the calculator may not look the same after pasting into a social platform or document.</p><p>Preserve a copy of the original. Special Unicode characters may not be searchable under the original spelling, and assistive technology may pronounce them differently. If the text contains an address, username or code that readers must copy accurately, provide the plain version too.</p><p>Reversal can change punctuation order and may produce a string that is visually confusing when read left to right. Test the output in its final location and ask someone unfamiliar with the text whether the intended reading is clear. If clarity is the priority, use ordinary text or a rotated image with an accessible text alternative.</p><p>This tool is meant for decoration, not translation, security or data obfuscation. The characters can be copied and examined. Do not use the transformation where exact spelling, accessibility, searchability or legal meaning matters.</p>
            TXT],
            ['title' => 'Choose readability over visual novelty when needed', 'html' => <<<'TXT'
            <p>Some letters in the map are visually close to ordinary letters, while others may look unfamiliar or render differently. Test the output at the intended display size and in the destination font. If a reader has to decode the phrase manually, include the original text nearby so the joke or message is still accessible.</p><p>Reversing the sequence can make a phrase harder to scan, especially with numbers, punctuation or line breaks. For a short playful caption, that can be part of the effect; for directions, names or essential information, use normal text instead.</p><p>The converter maps a limited set of characters and cannot preserve every script or text convention. Check names and accented characters carefully before sharing the output.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I make upside-down text?', 'a' => 'Enter or paste text, choose the text-order option if needed, and copy the generated upside-down version from the result area.'],
            ['q' => 'Why does the output reverse the character order?', 'a' => 'Rotating individual glyphs changes their visual orientation, while reversing their sequence helps the line read in the intended direction when viewed upside down.'],
            ['q' => 'Will every letter or symbol flip correctly?', 'a' => 'No. The conversion uses available look-alike Unicode characters, and some symbols or languages have no matching upside-down form. Check the output in the destination app.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hours-to-decimal', 'name' => 'Hours to decimal'],
            ['path' => '/everyday-life/how-many-days-have-i-been-alive', 'name' => 'How many days have I been alive'],
            ['path' => '/everyday-life/how-many-tables', 'name' => 'How many tables'],
        ],
    ],
];
