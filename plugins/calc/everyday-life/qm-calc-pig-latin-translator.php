<?php

/**
 * Pig Latin
 * /everyday-life/pig-latin-translator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pig Latin',
    'meta' => ['title' => 'Pig Latin Calculator: Formula, Steps & Examples', 'description' => 'Pig Latin takes enter text to translate to Pig Latin and returns pig Latin text. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Pig Latin Calculator', 'updated' => '2026-08-27'],
    'sections' => [
        [
            'title' => 'English → Pig Latin',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'inputText', 'label' => 'Enter text to translate to Pig Latin', 'type' => 'text'],
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
                        ['name' => 'encodedMessage', 'label' => 'Pig Latin text', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";function isVowel(ch){var c=(ch||"").toLowerCase();return"aeiou".includes(c)}function firstVowelIndex(word){var w=(word||"").toLowerCase();for(var i=0;i<w.length;i++){var c=w[i];var prev=w[i-1]||"";var next=w[i+1]||"";if("aeiou".includes(c)){if(c==="u"&&prev==="q"){return i+1}return i}if(c==="y"&&i>0&&!"aeiou".includes(prev)&&(!next||!"aeiou".includes(next))){return i}}return-1}function detectCaseStyle(w){if(!w){return"lower"}if(w.length===1&&w===w.toUpperCase()){return"Title"}if(w===w.toUpperCase()){return"UPPER"}if(w===w.toLowerCase()){return"lower"}if(/^[A-Z][a-z']*$/.test(w)){return"Title"}return"mixed"}function applyCaseStyle(s,style){if(style==="UPPER"){return s.toUpperCase()}if(style==="Title"){return s.charAt(0).toUpperCase()+s.slice(1).toLowerCase()}return s}function translateWordCore(w){if(!/[A-Za-z]/.test(w)){return w}var style=detectCaseStyle(w);var wl=w.toLowerCase();if(isVowel(wl[0],0)){return applyCaseStyle(wl+"way",style)}var idx=firstVowelIndex(wl);if(idx<=0){return applyCaseStyle(wl+"ay",style)}return applyCaseStyle(wl.slice(idx)+wl.slice(0,idx)+"ay",style)}function translateToken(token){if(token.includes("-")){return token.split(/(-)/).map(function(t){return t==="-"?t:translateWordCore(t)}).join("")}return translateWordCore(token)}function translateTextToPigLatin(text){return String(text).replace(/\b([A-Za-z]+(?:'[A-Za-z]+)*)\b/g,function(m){return translateToken(m)})}omni.onResult(["inputText"],function(ctx,values){try{var raw=ctx.getRawInput&&ctx.getRawInput("inputText")||values&&values.inputText||"";if(!raw){ctx.exportValue("encodedMessage","");return}var out=translateTextToPigLatin(raw);ctx.exportValue("encodedMessage",out)}catch(e){var msg=e&&e.message?e.message:String(e);ctx.exportValue("encodedMessage","[Pig Latin error] "+msg)}});//# sourceURL=customJs.js
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
        'encodedMessage'
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
        The Pig Latin calculator returns your result from the field on the form.

         Press Calculate for the answer; change a value and it steps off screen until you press again, so each edit can be judged on its own.
        TXT,
        'sections' => [
            ['title' => 'How does the Pig Latin calculator work?', 'html' => <<<'TXT'
            <p>The Pig Latin calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you type in enter text to translate to Pig Latin.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Pig Latin calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Any time the same 1 figures keep coming back — enter text to translate to Pig Latin — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Pig Latin calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — enter text to translate to Pig Latin for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/cord-wood">Cord of wood</a>, <a href="/everyday-life/coronavirus-mask">Coronavirus mask</a> and <a href="/everyday-life/cost-per-mile">Cost per mile</a>.</p>
            TXT],
            ['title' => 'How this Pig Latin translator transforms a sentence', 'html' => <<<'TXT'
            <p>This translator applies a specific set of common Pig Latin rules to English text. Words that begin with a vowel receive “way” at the end. For a word beginning with one or more consonants, the initial consonant cluster moves to the end and “ay” is appended. The exact output depends on how the first vowel is identified, so this page’s rule set may differ from a classroom, family or game variation.</p>
            <p>The implementation treats “qu” as a unit when locating the first vowel. This means a word beginning with a consonant cluster followed by “qu” moves that cluster according to the page’s rule. The letter “y” can count as a vowel in some positions when it follows a consonant and is not followed by another vowel. These choices help the translator handle familiar English patterns, but words with unusual pronunciation, silent letters or borrowed spelling may still produce results that sound different from what a speaker expects.</p>
            <p>Capitalization is carried through in a simplified way. All-uppercase words stay uppercase, lowercase stays lowercase and title-style words are capitalized at the beginning of the transformed result. Mixed-case words may be normalized or handled as a general case. Apostrophes inside a word are included in the translator’s matching pattern, while punctuation outside a word is generally left in place by the text replacement.</p>
            <p>Hyphenated words are processed in pieces around the hyphen, so each component can receive its own ending. Spaces and most punctuation remain in their original positions. This is a text transformation, not a full linguistic parser; it does not understand sentence meaning, proper-name pronunciation, abbreviations or words from other languages.</p>
            <p>To check a result, test a few representative words: a vowel-initial word, a single-consonant onset, a consonant cluster, a “qu” word and a word with “y.” Compare the output with the rule you intend to use. If you are teaching or playing a particular house version, agree on its rules first and manually adjust any outputs that differ.</p>
            <p>For example, the common pattern moves an initial consonant cluster as a group rather than reversing letters. A word with a vowel at the start keeps its order and receives the vowel-initial ending. This differs from other word games that rotate syllables, change only the first consonant or use a different suffix.</p>
            <p>Use the tool for playful text, classroom demonstrations or quick experimentation. It does not translate English into another natural language, preserve pronunciation for every dialect or validate spelling. For names, slogans or a public post, read the transformed text aloud and edit it if the result is awkward or changes the intended sound.</p>
            TXT],
            ['title' => 'Common edge cases in a playful translation', 'html' => <<<'TXT'
            <p>Words beginning with a vowel and words beginning with a consonant follow different paths. The page appends “way” to vowel-initial words. For consonant-initial words, it looks for the first vowel and moves the preceding consonant cluster to the end before adding “ay.” Words with no recognized vowel use a fallback that appends “ay.” These are conventional game rules, not English phonology, so a result can look odd for abbreviations or invented words.</p><p>The translator has special behavior for “qu,” treating the u after q as part of the initial consonant sequence when it searches for a vowel. It also allows y to act as a vowel in certain positions. For a word like “rhythm,” a familiar classroom rule may treat y as the vowel, but other implementations may use a different rule. If exact agreement matters, compare the result with the version of Pig Latin your group is using.</p><p>Capitalization is approximated. All-caps input is kept uppercase, a title-style word is returned with an initial capital, and mixed-case text may be simplified. Punctuation around a word is mostly retained by the regular-expression replacement, but punctuation inside contractions or unusual hyphenated forms can behave differently from a simple alphabetic word.</p><p>Hyphenated compounds are split at each hyphen and each part is translated separately. This can be useful for playful text, though a compound with a fixed spelling may not sound natural after the transformation. Apostrophes are included in the matching pattern for contractions, but the algorithm still identifies vowels and consonants from the letters, not from the meaning of the word.</p><p>Try a controlled test set if you are demonstrating the rules: one vowel-initial word, one word with a single initial consonant, one consonant cluster, a qu-word, a y-word and one hyphenated example. This helps show which rule creates an unexpected output.</p><p>The tool does not detect language. Non-English words and names may be transformed using English letter rules even when those rules do not fit their pronunciation. For a person’s name, ask how they pronounce it and whether they want it transformed before using the result publicly.</p><p>Use Pig Latin as a game or language exercise. It is not encryption; the rules are widely known, and the output should not be used to hide sensitive information. Keep the original text when accuracy matters.</p>
            TXT],
            ['title' => 'Examples that reveal which rule is being used', 'html' => <<<'TXT'
            <p>Use a small test list to understand the page’s exact convention. Try a vowel-initial word such as “apple,” a single-consonant word such as “cat,” a consonant cluster such as “street,” a “qu” word such as “queen,” and a word where y acts like a vowel, such as “rhythm.” Compare each output with the rule your class or group agreed to use. The page’s special handling of qu and y can differ from another translator.</p><p>When a word starts with several consonants, the translator moves the whole initial cluster that occurs before the first vowel. It does not reverse the letters. This means a cluster can produce a longer-looking but still pronounceable ending. If the source word has no recognized vowel, the fallback may simply append “ay,” which can sound unusual.</p><p>Capitalization is approximate rather than grammatical. A title-style word is capitalized at the start after transformation, but mixed-case acronyms and branded terms may not retain their exact styling. Punctuation is generally kept around the matched word, but internal apostrophes or hyphens may be handled by token rules. Read the result before sharing, especially when the text contains a proper name.</p><p>Pig Latin is a playful code, not a secret language. The transformation is easy to reverse for anyone who knows the rules, and it offers no privacy. Avoid using it to conceal personal, financial or sensitive information.</p><p>For teaching, explain the rule before generating examples so learners can predict what should move. Then compare their manual result with the tool and discuss any differences. This is more useful than treating the output as an authoritative dictionary entry.</p>
            TXT],
            ['title' => 'Use examples to make the rule explicit', 'html' => <<<'TXT'
            <p>When using the translator with a group, share the rule you intend to use before entering a sentence. Pig Latin has many informal variations: some add a different suffix to vowel-starting words, some treat qu differently, and some choose a different treatment for y. A generated answer can be internally consistent with this page while differing from a friend’s version.</p><p>For a classroom exercise, ask learners to predict how the first sound moves, then compare the result. This encourages attention to consonant clusters and vowel placement rather than memorizing one output. For names or words from another language, ask the speaker how they want the word handled instead of forcing an English rule.</p><p>Keep the plain sentence beside the transformed output if you will use it in instructions or a public post. The calculator is a playful converter, not a spelling authority or a way to hide a message.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I translate text into Pig Latin?', 'a' => 'Enter or paste text in the input field and read the generated Pig Latin output. The translator applies its built-in word rules to the text you provide.'],
            ['q' => 'Does Pig Latin have one official spelling rule?', 'a' => 'No. Pig Latin is a playful word game with several common rule variations. If a particular version matters, compare the output with the convention your group or activity uses.'],
            ['q' => 'What happens to punctuation and unusual words?', 'a' => 'The tool handles text according to its implementation, but punctuation, names and words with unusual spelling may need a quick manual review after conversion.'],
        ],
        'related' => [
            ['path' => '/everyday-life/cord-wood', 'name' => 'Cord of wood'],
            ['path' => '/everyday-life/coronavirus-mask', 'name' => 'Coronavirus mask'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
        ],
    ],
];
