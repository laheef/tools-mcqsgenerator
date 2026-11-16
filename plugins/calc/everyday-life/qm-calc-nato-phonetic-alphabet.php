<?php

/**
 * NATO phonetic alphabet
 * /everyday-life/nato-phonetic-alphabet
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'NATO phonetic alphabet',
    'meta' => ['title' => 'NATO phonetic alphabet — Free Online Calculator', 'description' => 'NATO phonetic alphabet turns choose translation direction and enter text into encoded text and decoded text. The formula is printed in the form\'s own words.', 'h1' => 'NATO phonetic alphabet Calculator', 'updated' => '2026-01-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'encoded_mode',
                            'label' => 'Choose translation direction',
                            'type' => 'select',
                            'options' => ['Text → NATO phonetic alphabet' => '1', 'NATO phonetic alphabet → Text' => '2'],
                            'dataset' => 'modeRaw_ds',
                            'default' => 'Text → NATO phonetic alphabet',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'input_text_encode', 'label' => 'Enter text', 'type' => 'text', 'help' => 'Letters (A–Z) and digits (0–9) are converted to NATO code words. Spaces become (space). A period (.) becomes Stop.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'input_text_decode', 'label' => 'Enter NATO words', 'type' => 'text', 'help' => 'Enter NATO words separated by spaces (e.g., Hotel Echo Lima). Use (space) to insert a space and Stop to insert a period (.).'],
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
                        ['name' => 'encoded_out', 'label' => 'Encoded text', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'decoded_out', 'label' => 'Decoded text', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";var NATO={A:"Alfa",B:"Bravo",C:"Charlie",D:"Delta",E:"Echo",F:"Foxtrot",G:"Golf",H:"Hotel",I:"India",J:"Juliett",K:"Kilo",L:"Lima",M:"Mike",N:"November",O:"Oscar",P:"Papa",Q:"Quebec",R:"Romeo",S:"Sierra",T:"Tango",U:"Uniform",V:"Victor",W:"Whiskey",X:"X-ray",Y:"Yankee",Z:"Zulu",0:"Zero",1:"One",2:"Two",3:"Three",4:"Four",5:"Five",6:"Six",7:"Seven",8:"Eight",9:"Nine"};function encodeNato(raw){var out=[];for(var i=0;i<raw.length;i++){var c=raw[i];if(/[A-Za-z]/.test(c)){out.push(NATO[c.toUpperCase()]||c)}else if(/[0-9]/.test(c)){out.push(NATO[c]||c)}else if(c==="."){out.push("Stop")}else if(c===" "){out.push("(space)")}else if(c==="\n"){out.push("\n")}else if(c==="\t"){out.push("(tab)")}else{out.push(c)}}var result="";for(var _i=0;_i<out.length;_i++){var token=out[_i];if(token==="\n"){result=result.replace(/\s+$/g,"")+"\n"}else{result+=token+" "}}return result.replace(/\s+$/g,"")}omni.onResult([],function(ctx){var input=ctx.getRawInput("input_text_encode")||"";ctx.exportValue("encoded_out","");if(!input.trim()){return}ctx.exportValue("encoded_out",encodeNato(input))});var NATO_REV={alfa:"a",alpha:"a",bravo:"b",charlie:"c",delta:"d",echo:"e",foxtrot:"f",golf:"g",hotel:"h",india:"i",juliett:"j",juliet:"j",kilo:"k",lima:"l",mike:"m",november:"n",oscar:"o",papa:"p",quebec:"q",romeo:"r",sierra:"s",tango:"t",uniform:"u",victor:"v",whiskey:"w","x-ray":"x",xray:"x",yankee:"y",zulu:"z",zero:"0",one:"1",two:"2",three:"3",four:"4",five:"5",six:"6",seven:"7",eight:"8",nine:"9",stop:"."};function toSentenceCase(s){var str=String(s||"").toLowerCase();var out="";var capNext=true;for(var i=0;i<str.length;i++){var ch=str[i];if(capNext&&/[a-z]/.test(ch)){out+=ch.toUpperCase();capNext=false;continue}out+=ch;if(ch==="."||ch==="!"||ch==="?"||ch==="\n"){capNext=true}}out=out.replace(/\bi\b/g,"I");return out}function decodeNato(raw){var lines=String(raw||"").split("\n");var decodedLines=lines.map(function(line){if(!line.trim()){return""}var tokens=line.trim().split(/\s+/);var text="";for(var i=0;i<tokens.length;i++){var tokRaw=tokens[i];if(!tokRaw){continue}var tok=tokRaw.toLowerCase();if(tok==="(space)"||tok==="space"){text+=" ";continue}if(tok==="(tab)"||tok==="tab"){text+="\t";continue}var match=tokRaw.match(/^([A-Za-z-]+)([^A-Za-z-].*)?$/);if(match){var word=match[1].toLowerCase();var tail=match[2]||"";if(NATO_REV[word]){text+=NATO_REV[word]+tail}else{text+=tokRaw}}else{text+=tokRaw}}return text});return toSentenceCase(decodedLines.join("\n"))}omni.onResult(["input_text_decode"],function(ctx){var input=ctx.getRawInput("input_text_decode")||"";ctx.exportValue("decoded_out","");if(!input.trim()){return}ctx.exportValue("decoded_out",decodeNato(input))});//# sourceURL=customJs.js
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
        'encoded_out',
        'decoded_out'
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
        'intro' => 'The answer is what the NATO phonetic alphabet calculator works out, and it gets there from enter text and enter NATO words.',
        'sections' => [
            ['title' => 'How does the NATO phonetic alphabet calculator work?', 'html' => <<<'TXT'
            <p>The NATO phonetic alphabet calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (choose translation direction); then you type in enter text and enter NATO words.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as text → NATO phonetic alphabet and NATO phonetic alphabet → Text. </li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Choose translation direction</strong></td><td>One of 2 options, such as text → NATO phonetic alphabet and NATO phonetic alphabet → Text.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Enter text</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Enter NATO words</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The NATO phonetic alphabet calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Any time the same 2 figures keep coming back — enter text and enter NATO words — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the NATO phonetic alphabet calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — choose translation direction for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/chronological-age">Chronological age</a>, <a href="/everyday-life/circle-skirt">Circle skirt</a> and <a href="/everyday-life/clay-shrinkage">Clay shrinkage</a>.</p>
            TXT],
            ['title' => 'Encoding and decoding with the NATO phonetic alphabet', 'html' => <<<'TXT'
            <p>The NATO phonetic alphabet assigns a spoken code word to each letter, such as Alfa for A and Bravo for B. It is designed to make letters easier to distinguish when spoken over a noisy or low-quality channel. This calculator can encode text into code words and decode recognized words back to letters. It is a spelling aid, not encryption: anyone who knows the alphabet can read the message.</p>
            <p>In encode mode, the page converts letters and digits, represents spaces with a marker and uses “Stop” for a period. Newlines and tabs have their own handling, while other punctuation may be passed through rather than converted. Check the form’s instructions if your text contains accented letters, symbols or punctuation beyond the listed cases; not every character has a NATO code word.</p>
            <p>In decode mode, enter code words separated by spaces, using the spellings recognized by the tool. Some common variants, such as Alpha for Alfa or Juliet for Juliett, may be accepted by the decoder even though the standardized spelling is Alfa and Juliett. “Stop” returns a period, and the page’s space marker restores a space. Unknown words may remain in the output instead of being translated, so review the result before relying on it.</p>
            <p>For spoken communication, pronounce the words clearly and leave enough separation between them. The code words are chosen to be more distinct than letter names, but accents, radio interference and hurried speech can still cause errors. Read back critical information, especially numbers, call signs, addresses or serial codes. Follow the communication procedure used by your organization.</p>
            <p>Numbers are encoded as individual digit words in this tool; that is not necessarily the same as saying a number as a complete quantity. For example, a reference number may need each digit spoken separately, while a measurement may be spoken as a number with units. Follow the recipient’s convention so that “one two” is not confused with “twelve.”</p>
            <p>The NATO alphabet is a standard spelling alphabet, but it should not be confused with a cipher or secret code. Do not encode sensitive information expecting it to be protected. Use approved encryption and secure communication methods where confidentiality matters.</p>
            <p>Use the output as a pronunciation and transcription aid, then verify names, punctuation and digits with the person receiving the message. This calculator performs a text conversion; it does not transmit, authenticate or secure the message.</p>
            TXT],
            ['title' => 'Handling digits, spaces and punctuation', 'html' => <<<'TXT'
            <p>The encoder treats each digit as an individual code word, which is useful for spelling identifiers one character at a time. That convention differs from speaking a full number as a quantity. For a phone number, room number, coordinate or serial code, follow the receiving organization’s convention and group digits clearly. The tool’s output can insert spaces between code words, but the spoken message still needs deliberate pacing.</p><p>Spaces and line breaks carry meaning. The page uses a visible space marker when encoding ordinary spaces and handles newlines separately; decoding may join tokens according to its rules. Review the result if your source has multiple spaces, tabs, blank lines or indentation. Copying text through another editor can alter whitespace and make the decoded message look different.</p><p>The form specifically documents period handling and may preserve other punctuation literally. Commas, apostrophes, hyphens, accented characters and symbols are not necessarily converted into code words. Read the output rather than assuming every character was encoded. If a punctuation mark is essential to meaning, say it explicitly or follow the communication protocol for that mark.</p><p>Code-word spellings are standardized for the alphabet, but everyday variants can appear in speech or in decoder aliases. The standard forms include Alfa and Juliett; a decoder may accept Alpha or Juliet as common variants. For formal radio communication, use the approved spelling and pronunciation required by your organization. This calculator is a text aid and cannot assess pronunciation quality.</p><p>When decoding, unknown words may remain unchanged. Check for speech recognition errors, homophones and inserted filler words. If the message is important, repeat it back and confirm the letters and digits with the sender. The alphabet reduces some ambiguity but does not eliminate misunderstanding.</p><p>Do not use phonetic spelling as a security technique. It makes letters easier to communicate, not secret. For confidential information, use an approved secure channel; for emergency or regulated traffic, follow the relevant protocol.</p>
            TXT],
            ['title' => 'Review the converted text before sending', 'html' => <<<'TXT'
            <p>After encoding, scan each code word against the original letters, particularly names, serial numbers and repeated characters. A missed letter can be hard to notice in a long string of spoken words. After decoding, compare the restored text with the source and confirm punctuation and line breaks.</p><p>For important communication, use a read-back: the receiver repeats the decoded name or number and the sender confirms it. This catches transcription errors that a text converter cannot detect.</p><p>The alphabet supports clearer spelling, but it does not validate whether the message is complete, current or correctly addressed. Check those details separately before sending.</p>
            TXT],
            ['title' => 'Use standardized forms in formal traffic', 'html' => <<<'TXT'
            <p>For formal radio or operational communication, follow the organization’s current procedure and the standardized code-word spellings. The calculator is a convenient practice aid but does not replace required phraseology, call-sign rules or emergency protocols.</p><p>Unknown names and abbreviations may need to be spelled letter by letter and read back. Confirm the receiver has understood before acting on a critical message.</p>
            TXT],
            ['title' => 'Treat the output as text, not a secure message', 'html' => <<<'TXT'
            <p>The code words make spelling easier to hear, but they do not conceal the original text. Anyone familiar with the alphabet can decode it. Use a secure, approved channel if information needs confidentiality.</p><p>Review unsupported punctuation and symbols manually because not every character is converted into a code word.</p>
            TXT],
            ['title' => 'Use a read-back for important details', 'html' => <<<'TXT'
            <p>For a name, address or serial number, ask the receiver to read the decoded text back. Confirm letters and digits individually before relying on the message. The tool cannot verify that the source text was entered correctly.</p>
            TXT],
            ['title' => 'Review letters that may remain unchanged', 'html' => <<<'TXT'
            <p>Check the encoded output for symbols and accented characters that the converter may leave as typed. If the text contains such characters, spell them out using the communication protocol rather than assuming they were converted.</p>
            TXT],
            ['title' => 'Confirm the spelling with the recipient', 'html' => <<<'TXT'
            <p>For names that use an unusual spelling, agree on the code words and read-back method with the recipient. That small check prevents a standard alphabet from being mistaken for an exact transcription guarantee.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I encode text with the NATO phonetic alphabet?', 'a' => 'Choose the encoding direction and enter the text. The tool maps supported letters to their corresponding NATO phonetic words so a message can be read aloud more clearly.'],
            ['q' => 'Can I decode NATO words back to text?', 'a' => 'Select the decoding direction and enter the phonetic words. Check spelling and word boundaries, because a mistyped or unfamiliar word may not map as intended.'],
            ['q' => 'Is this the same as translating a message?', 'a' => 'No. It spells supported characters using code words; it does not translate the meaning into another language or encrypt the message.'],
        ],
        'related' => [
            ['path' => '/everyday-life/chronological-age', 'name' => 'Chronological age'],
            ['path' => '/everyday-life/circle-skirt', 'name' => 'Circle skirt'],
            ['path' => '/everyday-life/clay-shrinkage', 'name' => 'Clay shrinkage'],
        ],
    ],
];
