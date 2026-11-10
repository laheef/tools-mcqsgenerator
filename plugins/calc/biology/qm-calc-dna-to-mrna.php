<?php

/**
 * DNA to mRNA
 * /biology/dna-to-mrna
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA to mRNA',
    'engine' => 'script',
    'engine_note' => 'transcribes a DNA strand to mRNA — and back — codon by codon',
    'meta' => ['title' => 'DNA to mRNA Converter: Transcription, Reverse and Protein', 'description' => 'Transcribe a DNA strand to mRNA and back, codon by codon, and read the protein the transcript would make — DNA, message and protein together in one panel.', 'h1' => 'DNA to mRNA Calculator', 'updated' => '2026-01-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choice',
                            'label' => 'Convert sequence from:',
                            'type' => 'select',
                            'options' => ['DNA to mRNA' => '1', 'mRNA to DNA' => '2'],
                            'dataset' => 'direction_DS',
                            'default' => 'DNA to mRNA',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'input_DNA_strand', 'label' => 'Input DNA sequence', 'type' => 'text', 'help' => 'DNA uses A, C, G, T. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'input_mRNA_strand', 'label' => 'Input mRNA sequence', 'type' => 'text', 'help' => 'mRNA uses A, C, G, U. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically.'],
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
                        ['name' => 'dna_out_1', 'label' => 'DNA, in codons', 'type' => 'result'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'mrna_out_1', 'label' => 'Messenger RNA transcript', 'type' => 'result'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'protein_out_1', 'label' => 'Protein', 'type' => 'result'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dna_out_2', 'label' => 'DNA from your messenger RNA', 'type' => 'result'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'mrna_out_2', 'label' => 'Messenger RNA you entered', 'type' => 'result'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'protein_out_2', 'label' => 'Protein from that mRNA', 'type' => 'result'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";function insertEveryN(str,n){return str.replace(new RegExp(".{1,"+n+"}","g"),"$& ").trim()}function dnaToMrna(dna){return dna.split("").map(function(b){switch(b){case"A":return"U";case"T":return"A";case"C":return"G";case"G":return"C";default:return""}}).join("")}function mrnaToDna(mrna){return mrna.split("").map(function(b){switch(b){case"U":return"A";case"A":return"T";case"C":return"G";case"G":return"C";default:return""}}).join("")}function mrnaToProtein(mrna){var codonTable={UUU:"PHE",UUC:"PHE",UUA:"LEU",UUG:"LEU",CUU:"LEU",CUC:"LEU",CUA:"LEU",CUG:"LEU",AUU:"ILE",AUC:"ILE",AUA:"ILE",AUG:"MET",GUU:"VAL",GUC:"VAL",GUA:"VAL",GUG:"VAL",UCU:"SER",UCC:"SER",UCA:"SER",UCG:"SER",CCU:"PRO",CCC:"PRO",CCA:"PRO",CCG:"PRO",ACU:"THR",ACC:"THR",ACA:"THR",ACG:"THR",GCU:"ALA",GCC:"ALA",GCA:"ALA",GCG:"ALA",UAU:"TYR",UAC:"TYR",UAA:"STOP",UAG:"STOP",CAU:"HIS",CAC:"HIS",CAA:"GLN",CAG:"GLN",AAU:"ASN",AAC:"ASN",AAA:"LYS",AAG:"LYS",GAU:"ASP",GAC:"ASP",GAA:"GLU",GAG:"GLU",UGU:"CYS",UGC:"CYS",UGA:"STOP",UGG:"TRP",CGU:"ARG",CGC:"ARG",CGA:"ARG",CGG:"ARG",AGU:"SER",AGC:"SER",AGA:"ARG",AGG:"ARG",GGU:"GLY",GGC:"GLY",GGA:"GLY",GGG:"GLY"};var seq=mrna.toUpperCase().replace(/[^ACGU]/g,"");var aminoAcids=[];for(var i=0;i+2<seq.length;i+=3){var codon=seq.slice(i,i+3);var aa=codonTable[codon]||"?";if(aa==="STOP"){break}aminoAcids.push(aa)}return aminoAcids.join("-")}omni.onResult([],function(ctx){var rawDNA=ctx.getRawInput("input_DNA_strand")||"";var rawmRNA=ctx.getRawInput("input_mRNA_strand")||"";ctx.exportValue("dna_out_1","");ctx.exportValue("mrna_out_1","");ctx.exportValue("protein_out_1","");ctx.exportValue("dna_out_2","");ctx.exportValue("mrna_out_2","");ctx.exportValue("protein_out_2","");if(rawDNA.trim()){var cleanedDNA=rawDNA.toUpperCase().replace(/ /g,"");cleanedDNA=cleanedDNA.replace(/[^ACGT]/g,"");var dna1=cleanedDNA;var mrna1=dnaToMrna(dna1);var prot1=mrnaToProtein(mrna1);var dnaFormatted1=dna1?insertEveryN(dna1,3):"__";var mrnaFormatted1=mrna1?insertEveryN(mrna1,3):"__";ctx.exportValue("dna_out_1",dnaFormatted1);ctx.exportValue("mrna_out_1",mrnaFormatted1);ctx.exportValue("protein_out_1",prot1||"__")}if(rawmRNA.trim()){var cleanedmRNA=rawmRNA.toUpperCase().replace(/ /g,"");cleanedmRNA=cleanedmRNA.replace(/[^ACGU]/g,"");var mrna2=cleanedmRNA;var dna2=mrnaToDna(mrna2);var prot2=mrnaToProtein(mrna2);var dnaFormatted2=dna2?insertEveryN(dna2,3):"__";var mrnaFormatted2=mrna2?insertEveryN(mrna2,3):"__";ctx.exportValue("dna_out_2",dnaFormatted2);ctx.exportValue("mrna_out_2",mrnaFormatted2);ctx.exportValue("protein_out_2",prot2||"__")}});//# sourceURL=customJs.js
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
    
    var CODON_TABLE = {
      UUU: 'Phe', UUC: 'Phe', UUA: 'Leu', UUG: 'Leu', CUU: 'Leu', CUC: 'Leu', CUA: 'Leu', CUG: 'Leu',
      AUU: 'Ile', AUC: 'Ile', AUA: 'Ile', AUG: 'Met', GUU: 'Val', GUC: 'Val', GUA: 'Val', GUG: 'Val',
      UCU: 'Ser', UCC: 'Ser', UCA: 'Ser', UCG: 'Ser', CCU: 'Pro', CCC: 'Pro', CCA: 'Pro', CCG: 'Pro',
      ACU: 'Thr', ACC: 'Thr', ACA: 'Thr', ACG: 'Thr', GCU: 'Ala', GCC: 'Ala', GCA: 'Ala', GCG: 'Ala',
      UAU: 'Tyr', UAC: 'Tyr', UAA: 'Stop', UAG: 'Stop', CAU: 'His', CAC: 'His', CAA: 'Gln', CAG: 'Gln',
      AAU: 'Asn', AAC: 'Asn', AAA: 'Lys', AAG: 'Lys', GAU: 'Asp', GAC: 'Asp', GAA: 'Glu', GAG: 'Glu',
      UGU: 'Cys', UGC: 'Cys', UGA: 'Stop', UGG: 'Trp', CGU: 'Arg', CGC: 'Arg', CGA: 'Arg', CGG: 'Arg',
      AGU: 'Ser', AGC: 'Ser', AGA: 'Arg', AGG: 'Arg', GGU: 'Gly', GGC: 'Gly', GGA: 'Gly', GGG: 'Gly'
    };
    
    function dmBox(name) {
      var el = document.querySelector('.calc-widget textarea[data-var="' + name + '"], '
        + '.calc-widget input[data-var="' + name + '"]');
      return el ? String(el.value) : '';
    }
    
    function dmGroup(seq) {
      return String(seq).replace(/(.{3})/g, '$1 ').trim();
    }
    
    omni.onResult([], function (ctx, values) {
      var dna = dmBox('input_DNA_strand').toUpperCase().replace(/\s/g, '');
      var rna = dmBox('input_mRNA_strand').toUpperCase().replace(/\s/g, '');
      var dnaBad = dna.replace(/[ACGT]/g, '').length;
      var rnaBad = rna.replace(/[ACGU]/g, '').length;
      dna = dna.replace(/[^ACGT]/g, '');
      rna = rna.replace(/[^ACGU]/g, '');
    
      if (!dna && !rna) {
        ctx.addUnmetCondition('Type a DNA strand (A, C, G, T) or an mRNA strand (A, C, G, U).');
        return;
      }
      if ((dnaBad && !dna) || (rnaBad && !rna)) {
        ctx.addUnmetCondition('That is not a nucleotide sequence — DNA uses A, C, G and T, mRNA uses A, C, G and U.');
        return;
      }
    
      if (dna) {
        /* the strand typed in is read as the coding strand: transcription copies it
           with every T turned into U, so ATG still opens the protein at Met */
        var mrna = dna.replace(/T/g, 'U');
        ctx.exportValue('dna_out_1', dmGroup(dna));
        ctx.exportValue('mrna_out_1', dmGroup(mrna));
        ctx.exportValue('protein_out_1', dmProtein(mrna));
        dmReport(ctx, 'DNA', dna, mrna, '1');
      }
      if (rna) {
        var dna2 = rna.replace(/U/g, 'T');
        ctx.exportValue('dna_out_2', dmGroup(dna2));
        ctx.exportValue('mrna_out_2', dmGroup(rna));
        ctx.exportValue('protein_out_2', dmProtein(rna));
        if (!dna) { dmReport(ctx, 'mRNA', dna2, rna, '2'); }
      }
      if (dnaBad || rnaBad) {
        ctx.addHtml('<p class="calc-note">' + (dnaBad + rnaBad) + ' character(s) were not a nucleotide and were '
          + 'left out of the calculation.</p>');
      }
    });
    
    function dmProtein(mrna) {
      var out = [];
      for (var i = 0; i + 3 <= mrna.length; i += 3) {
        var aa = CODON_TABLE[mrna.substr(i, 3)];
        if (!aa) { out.push('?'); continue; }
        if (aa === 'Stop') { out.push('Stop'); break; }
        out.push(aa);
      }
      return out.length ? out.join('-') : 'no complete codon';
    }
    
    function dmReport(ctx, which, dna, mrna, n) {
      var protein = dmProtein(mrna);
      var codons = Math.floor(mrna.length / 3);
      ctx.addHtml('<p><strong>' + codons + ' codon' + (codons === 1 ? '' : 's') + ' from ' + mrna.length
        + ' nucleotides: ' + sesc(protein) + '</strong></p>');
      ctx.addHtml(stable(['Step', 'Result'], [
        ['Template DNA', dmGroup(dna)],
        ['mRNA (transcription)', dmGroup(mrna)],
        ['Reading frame', 'starts at the first base' + (mrna.substr(0, 3) === 'AUG' ? ', an AUG start codon' : '')],
        ['Protein (translation)', protein]
      ]));
      ctx.addHtml('<p class="calc-note">Transcription copies the coding strand into mRNA, swapping T for U; '
        + 'translation then reads the mRNA three bases at a time, because three bases carry the sixteen possible '
        + 'choices that a four-letter alphabet needs to name twenty amino acids. AUG is the usual start and also '
        + 'codes methionine; UAA, UAG and UGA stop the chain and are not turned into an amino acid. The strand you '
        + 'type is taken as the coding strand — the one the mRNA matches — so ATG opens at methionine. A laboratory '
        + 'sequence is often the template strand instead, in which case the mRNA is its complement (A to U, T to A, '
        + 'C to G, G to C); paste that complement here and the protein will be right. Only the first reading frame '
        + 'is read: a real gene needs its frame chosen, and one strand of DNA holds six frames.</p>');
    }
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        This page shows a coding sequence in three forms at once: the DNA in codons, the mRNA transcript it would produce, and the protein those codons encode. It also works in the other direction, from an mRNA back to the DNA that could have made it.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It converts between DNA and mRNA in whole codons and reports the protein that the message encodes, so a sequence can be checked at all three levels at once instead of one at a time.</p><p>Both boxes are cleaned to letters. Transcribing DNA to mRNA replaces every T with U and leaves the rest alone; the reverse replaces U with T. The transcript is then split into codons from the first base, and each codon is looked up in the standard genetic code and written out as a three-letter amino acid name, with stop codons shown as Stop. The page computes both directions, so it always has something to show whichever box you filled.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 things to fill in, and the order does not matter:</p><ul><li><strong>Convert sequence from:</strong> — a drop-down with the choices the page offers.</li><li><strong>Input DNA sequence</strong> — a text box. DNA uses A, C, G, T. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically..</li><li><strong>Input mRNA sequence</strong> — a text box. mRNA uses A, C, G, U. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically..</li></ul><p>The answer comes back as 6 boxes: DNA, in codons, Messenger RNA transcript, Protein, DNA from your messenger RNA, Messenger RNA you entered, Protein from that mRNA. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Convert sequence from:</strong> is a drop-down with the choices the page offers. The choices are DNA to mRNA and mRNA to DNA. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Input DNA sequence</strong> is a text box. DNA uses A, C, G, T. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Input mRNA sequence</strong> is a text box. mRNA uses A, C, G, U. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically. Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Convert sequence from:</th><td>DNA to mRNA</td></tr><tr><th>Input DNA sequence</th><td>ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>DNA, in codons</th><td>ATG GCC ATT GTA ATG GGC CGC TGA AAG GGT GCC CGA TAG</td></tr><tr><th>Messenger RNA transcript</th><td>AUG GCC AUU GUA AUG GGC CGC UGA AAG GGU GCC CGA UAG</td></tr><tr><th>Protein</th><td>Met-Ala-Ile-Val-Met-Gly-Arg-Stop</td></tr></tbody></table><p>A 39-base coding sequence becomes 39 bases of mRNA with every T turned into U, and the protein reads Met-Ala-Ile-Val-Met-Gly-Arg-Stop: eight residues and a stop, which is what a 39-base frame can hold if a stop falls inside it.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Convert sequence from:</th><td>mRNA to DNA</td></tr><tr><th>Input mRNA sequence</th><td>AUGGCCAUUGUA</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>DNA from your messenger RNA</th><td>ATG GCC ATT GTA</td></tr><tr><th>Messenger RNA you entered</th><td>AUG GCC AUU GUA</td></tr><tr><th>Protein from that mRNA</th><td>Met-Ala-Ile-Val</td></tr></tbody></table><p>3 of the 3 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>DNA, in codons</strong> — the input split into triplets for reading, not a different sequence.</li><li><strong>Messenger RNA transcript</strong> — the same bases with T replaced by U, still in codons.</li><li><strong>Protein</strong> — one three-letter name per codon, with Stop where a stop codon falls.</li><li><strong>DNA from your mRNA</strong> — the reverse direction: U replaced by T.</li></ul><p>The three columns are the same information at three levels. If the protein ends in Stop where you expected more residues, the frame or the sequence is wrong; if the mRNA differs from the DNA anywhere other than T and U, something downstream of the paste is not a plain transcription.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Transcribe the first six bases by hand: every T becomes U and nothing else moves. Then translate the first two codons from a genetic-code table and compare with the protein line. If the first residue is not Met, the first codon is not ATG and you are not looking at a coding sequence.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Typing a T into the mRNA box</strong> — T is not an RNA base; it is dropped, which shortens the message silently.</li><li><strong>Pasting the template strand</strong> — The template strand is the complement of the coding strand. Transcribing it gives the antisense message.</li><li><strong>Reading frame</strong> — Translation starts at the first base you paste. One leading base shifts every codon after it.</li></ul><p>Nothing here is pasted from a file: every box is short enough to type, and the choice lists mean the answer depends on which entry is selected rather than on how it is spelled.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No splicing</strong> — The page transcribes and translates a contiguous sequence. Introns, if present, are translated as though they were exons.</li><li><strong>Standard code only</strong> — Mitochondrial and other variant codes are not applied.</li><li><strong>One strand</strong> — It works on the strand you paste; it does not choose the coding strand for you.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>DNA to mRNA Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is used to check a cloned insert end to end, to see what a silent mutation did to the codons, to confirm that a primer did not shift the frame, and to explain to a student why the protein does not match the DNA by eye.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Can I type mRNA and get DNA?', 'a' => 'Yes. Put the message in the mRNA box; the page shows the DNA that would transcribe into it.'],
            ['q' => 'Why does the protein stop in the middle?', 'a' => 'A stop codon inside the frame. Either the sequence really has one or the reading frame is wrong.'],
            ['q' => 'Does DNA to mRNA Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/inbreeding-coefficient', 'name' => 'Inbreeding Coefficient (COI) Calculator'],
            ['path' => '/biology/land-equivalent-ratio', 'name' => 'Land Equivalent Ratio Calculator'],
            ['path' => '/biology/lawn-fertilizer-rate', 'name' => 'Lawn Fertilizer Rate Calculator'],
        ],
        'authors' => [],
    ],
];
