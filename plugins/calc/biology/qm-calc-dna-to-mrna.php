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
    'meta' => ['title' => 'DNA to mRNA Calculator: Formula, Steps & Examples', 'description' => 'DNA to mRNA turns convert sequence from:, Input DNA sequence and Input mRNA sequence into DNA, in codons and Messenger RNA transcript. Every figure is computed.', 'h1' => 'DNA to mRNA Calculator', 'updated' => '2026-01-27'],
    'raw' => [
        'vars' => [
            'choice' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'CUEgWvImp8RtmGtcgxqQi', 'c' => null],
                ],
                'ds' => '_AKF2kJVItM3H1_FhddsK',
            ],
            'input_DNA_strand' => ['type' => 'text'],
            'input_mRNA_strand' => ['type' => 'text'],
            'dna_out_1' => ['type' => 'numerical'],
            'mrna_out_1' => ['type' => 'numerical'],
            'protein_out_1' => ['type' => 'numerical'],
            'dna_out_2' => ['type' => 'numerical'],
            'mrna_out_2' => ['type' => 'numerical'],
            'protein_out_2' => ['type' => 'numerical'],
        ],
        'groups' => [
            [
                'uid' => 'N2ABS0BRK88SVjd9Ju52B',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'choice',
                                    'vt' => 'valueSelect',
                                    'l' => 'Convert sequence from:',
                                    'ds' => '_AKF2kJVItM3H1_FhddsK',
                                    'opts' => [
                                        ['CUEgWvImp8RtmGtcgxqQi', 'DNA to mRNA', '1'],
                                        ['h3-f64BZDFZENg5uAiHDO', 'mRNA to DNA', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'input_DNA_strand',
                                    'vt' => 'numerical',
                                    'l' => 'Input DNA sequence',
                                    'h' => 'DNA uses A, C, G, T. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'input_mRNA_strand',
                                    'vt' => 'numerical',
                                    'l' => 'Input mRNA sequence',
                                    'h' => 'mRNA uses A, C, G, U. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'supp-outputs',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'dna_out_1',
                                    'vt' => 'numerical',
                                    'l' => 'DNA, in codons',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mrna_out_1',
                                    'vt' => 'numerical',
                                    'l' => 'Messenger RNA transcript',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'protein_out_1',
                                    'vt' => 'numerical',
                                    'l' => 'Protein',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'dna_out_2',
                                    'vt' => 'numerical',
                                    'l' => 'DNA from your messenger RNA',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mrna_out_2',
                                    'vt' => 'numerical',
                                    'l' => 'Messenger RNA you entered',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'protein_out_2',
                                    'vt' => 'numerical',
                                    'l' => 'Protein from that mRNA',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            '_AKF2kJVItM3H1_FhddsK' => [
                'name' => 'direction_DS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'CUEgWvImp8RtmGtcgxqQi', 'label' => 'DNA to mRNA', 'value' => '1'],
                    ['uid' => 'h3-f64BZDFZENg5uAiHDO', 'label' => 'mRNA to DNA', 'value' => '2'],
                ],
            ],
        ],
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
    ],
    'article' => [
        'intro' => <<<'TXT'
        DNA to mRNA turns Convert sequence from, Input DNA sequence and Input mRNA sequence into DNA, in codons and Messenger RNA transcript. There is no hidden constant here: change DNA, in codons and convert sequence from: moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the DNA to mRNA calculator works', 'html' => <<<'TXT'
            <p>The DNA to mRNA calculator applies one relationship to 3 numbers and reports DNA, in codons, Messenger RNA transcript and Protein.</p><p>What comes back is DNA, in codons, Messenger RNA transcript, Protein and DNA from your messenger RNA — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Convert sequence from</strong> — a plain number, no unit</li><li><strong>Input DNA sequence</strong> — a plain number, no unit. DNA uses A, C, G, T. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically.</li><li><strong>Input mRNA sequence</strong> — a plain number, no unit. mRNA uses A, C, G, U. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically.</li></ul><p>The result boxes are DNA, in codons, Messenger RNA transcript, Protein, DNA from your messenger RNA, Messenger RNA you entered, Protein from that mRNA; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: DNA, in codons takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with DNA, in codons, Messenger RNA transcript and Protein are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Convert sequence from left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Convert sequence from is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Input DNA sequence left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Input DNA sequence is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Input mRNA sequence left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Input mRNA sequence is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Convert sequence from: to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the DNA to mRNA form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Convert sequence from</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Convert sequence from is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Input DNA sequence</strong> takes a plain number with no unit attached. DNA uses A, C, G, T. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically. Fill it from a measurement rather than a memory — Input DNA sequence is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Input mRNA sequence</strong> takes a plain number with no unit attached. mRNA uses A, C, G, U. Any other letters or characters (numbers, punctuation, etc.) are ignored automatically. Fill it from a measurement rather than a memory — Input mRNA sequence is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>DNA, in codons</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Messenger RNA transcript</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Protein</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>DNA from your messenger RNA</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Messenger RNA you entered</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Protein from that mRNA</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p><strong>Input DNA sequence</strong> and <strong>Input mRNA sequence</strong> takes text, not a number, so the way it is pasted decides whether the analysis is right.</p><ul><li><strong>No header line.</strong> A FASTA file starts with a line that begins with &quot;&gt;&quot; — a name, not a sequence. Paste from the line below it, or that line is read as characters of its own.</li><li><strong>No spaces or line numbers.</strong> Nucleotide and protein text is often printed in blocks of sixty or eighty characters. Line breaks are usually fine; spaces, tabs and the numbers down the side are not.</li><li><strong>Case is a choice you make.</strong> Upper-case is the convention, but lower-case is often used to mark a region such as soft-masked repeats. Whether the page folds case or respects it is part of what it is telling you, so keep the case you mean.</li><li><strong>Ambiguous characters are not rare.</strong> Sites where the read was uncertain are usually written as N or as a degenerate code. They are counted like any other character, which is right, but it means the answer describes the text as written rather than the molecule as it is.</li></ul><p>The quick check is always the same: does the reported length match the text you pasted? If DNA, in codons, Messenger RNA transcript, Protein and DNA from your messenger RNA disagree with what you can count by eye, the box is holding something you did not intend to give it.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes DNA to mRNA, works through it, and the panel lists Convert sequence from, Input DNA sequence and Input mRNA sequence.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is DNA, in codons, Messenger RNA transcript, Protein and DNA from your messenger RNA — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> DNA, in codons follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Convert sequence from, Input DNA sequence and Input mRNA sequence are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Convert sequence from, Input DNA sequence and Input mRNA sequence and the number you are missing is DNA, in codons and Messenger RNA transcript.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/inbreeding-coefficient">Inbreeding Coefficient (COI) Calculator</a>, <a href="/biology/land-equivalent-ratio">Land Equivalent Ratio Calculator</a> and <a href="/biology/lawn-fertilizer-rate">Lawn Fertilizer Rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA to mRNA calculator work out?', 'a' => 'DNA, in codons, Messenger RNA transcript, Protein and DNA from your messenger RNA.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Convert sequence from, Input DNA sequence, Input mRNA sequence. Fill convert sequence from, input DNA sequence and input mRNA sequence and leave DNA, in codons empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of DNA, in codons is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: DNA, in codons is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. DNA, in codons keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/inbreeding-coefficient', 'name' => 'Inbreeding Coefficient (COI) Calculator'],
            ['path' => '/biology/land-equivalent-ratio', 'name' => 'Land Equivalent Ratio Calculator'],
            ['path' => '/biology/lawn-fertilizer-rate', 'name' => 'Lawn Fertilizer Rate Calculator'],
        ],
        'authors' => [],
    ],
];
