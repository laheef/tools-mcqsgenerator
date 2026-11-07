<?php

/**
 * Reverse Translate Calculator
 * /biology/reverse-translate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reverse Translate Calculator',
    'meta' => ['title' => 'Reverse Translate Calculator — Formula & Results', 'description' => 'Reverse Translate takes Protein sequence, Codon choice and Add a stop codon and returns Protein length and DNA length. Protein length is opened in aa; the…', 'h1' => 'Reverse Translate Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'protein' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQV', 'c' => null],
                ],
            ],
            'strategy' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'e-coli-most-used-codon', 'c' => null],
                ],
                'ds' => 'ds-strategy',
            ],
            'tail' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yes', 'c' => null],
                ],
                'ds' => 'ds-tail',
            ],
            'length_aa' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc_pct' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'codons' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'tm' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-reverse-translate',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'protein',
                                    'l' => 'Protein sequence',
                                    'h' => 'Single-letter code; spaces, digits and FASTA headers are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'strategy',
                                    'l' => 'Codon choice',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-strategy',
                                    'opts' => [
                                        ['e-coli-most-used-codon', 'E. coli, most used codon', 'ecoli'],
                                        ['human-most-used-codon', 'Human, most used codon', 'human'],
                                        ['gc-balanced-50', 'GC-balanced (50%)', 'gc'],
                                        ['avoid-rare-codons-gc-rich-hosts', 'Avoid rare codons (GC-rich hosts)', 'gchost'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'tail',
                                    'l' => 'Add a stop codon',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-tail',
                                    'opts' => [
                                        ['yes', 'Yes', 'yes'],
                                        ['no', 'No', 'no'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length_aa',
                                    'l' => 'Protein length',
                                    'suf' => 'aa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'DNA length',
                                    'suf' => 'nt',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc_pct',
                                    'l' => 'GC content of the DNA',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'codons',
                                    'l' => 'Codons',
                                    'h' => 'Includes the stop codon when one is added',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'tm',
                                    'l' => 'Melting temperature of the duplex',
                                    'h' => 'At 50 mM monovalent salt',
                                    'suf' => '°C',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            'ds-strategy' => [
                'name' => 'Codon choice',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'e-coli-most-used-codon', 'label' => 'E. coli, most used codon', 'value' => 'ecoli'],
                    ['uid' => 'human-most-used-codon', 'label' => 'Human, most used codon', 'value' => 'human'],
                    ['uid' => 'gc-balanced-50', 'label' => 'GC-balanced (50%)', 'value' => 'gc'],
                    ['uid' => 'avoid-rare-codons-gc-rich-hosts', 'label' => 'Avoid rare codons (GC-rich hosts)', 'value' => 'gchost'],
                ],
            ],
            'ds-tail' => [
                'name' => 'Add a stop codon',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yes', 'label' => 'Yes', 'value' => 'yes'],
                    ['uid' => 'no', 'label' => 'No', 'value' => 'no'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        function cleanSeq(raw, kind) {
            var s = String(raw || '').replace(/^>.*$/gm, '');
            s = s.replace(/[^A-Za-z]/g, '');
            return kind === 'protein' ? s.toUpperCase() : s.toUpperCase().replace(/U/g, 'T');
          }
          function wrap(s, width) {
            width = width || 60;
            var out = [];
            for (var i = 0; i < s.length; i += width) out.push(s.slice(i, i + width));
            return out.join('\n');
          }
          function esc(s) {
            return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
          }
          function block(title, body, note) {
            return '<div class="calc-script-block"><h3>' + esc(title) + '</h3><pre>' + esc(body) + '</pre>'
              + (note ? '<p class="calc-script-note">' + esc(note) + '</p>' : '') + '</div>';
          }
          function table(title, head, rows, note) {
            var h = '<tr>' + head.map(function (c) { return '<th>' + esc(c) + '</th>'; }).join('') + '</tr>';
            var b = rows.map(function (r) {
              return '<tr>' + r.map(function (c) { return '<td>' + esc(c) + '</td>'; }).join('') + '</tr>';
            }).join('');
            return '<div class="calc-script-block"><h3>' + esc(title) + '</h3>'
              + '<div class="calc-script-scroll"><table class="calc-script-table">' + h + b + '</table></div>'
              + (note ? '<p class="calc-script-note">' + esc(note) + '</p>' : '') + '</div>';
          }
          function gcOf(s) {
            var gc = 0;
            for (var i = 0; i < s.length; i++) { var c = s.charAt(i); if (c === 'G' || c === 'C') gc++; }
            return gc;
          }
          function tmOf(n, pct, at, gc) {
            if (n <= 14) return 2 * at + 4 * gc;
            if (n <= 40) return 64.9 + 41 * (gc - 16.4) / n;
            return 81.5 + 16.6 * Math.log10(0.05) + 0.41 * pct - 675 / n;
          }
          function pct1(x) { return (Math.round(x * 10) / 10).toFixed(1); }
          function pct2(x) { return (Math.round(x * 100) / 100).toFixed(2); }
          var COMP = {A:'T',T:'A',G:'C',C:'G',U:'A',R:'Y',Y:'R',S:'S',W:'W',K:'M',M:'K',
                      B:'V',V:'B',D:'H',H:'D',N:'N'};
          function revcomp(s) {
            var out = '';
            for (var i = s.length - 1; i >= 0; i--) out += COMP[s.charAt(i)] || 'N';
            return out;
          }
          // NCBI standard genetic code: bases ordered T, C, A, G for each position
          var CODON_TABLE = 'FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG';
          var BASES = 'TCAG';
          function aaOf(codon) {
            var i1 = BASES.indexOf(codon.charAt(0)), i2 = BASES.indexOf(codon.charAt(1)),
                i3 = BASES.indexOf(codon.charAt(2));
            if (i1 < 0 || i2 < 0 || i3 < 0) return null;
            return CODON_TABLE.charAt(16 * i1 + 4 * i2 + i3);
          }
          function eachCodon(seq, frame, fn) {
            for (var i = (frame || 0); i + 3 <= seq.length; i += 3) {
              fn(seq.substr(i, 3), i);
            }
          }
        
          // Codon preference lists, most used first, per host. Only the relative order
          // matters here; it reproduces the ordering of the Kazusa usage tables closely
          // enough for a design starting point.
          var ECOL = {
            A: ['GCG','GCA','GCT','GCC'], R: ['CGT','CGC','CGG','CGA','AGA','AGG'],
            N: ['AAC','AAT'], D: ['GAT','GAC'], C: ['TGC','TGT'], Q: ['CAG','CAA'],
            E: ['GAA','GAG'], G: ['GGC','GGT','GGG','GGA'], H: ['CAT','CAC'],
            I: ['ATT','ATC','ATA'], L: ['CTG','TTA','TTA','CTT','CTC','TTA','TTG','TTA'],
            K: ['AAA','AAG'], M: ['ATG'], F: ['TTT','TTC'], P: ['CCG','CCA','CCT','CCC'],
            S: ['AGC','TCT','TCC','TCG','AGT','TCA'], T: ['ACC','ACG','ACT','ACA'],
            W: ['TGG'], Y: ['TAT','TAC'], V: ['GTG','GTT','GTC','GTA'], '*': ['TAA','TGA','TAG']
          };
          var HUMAN = {
            A: ['GCC','GCT','GCA','GCG'], R: ['AGG','AGA','CGG','CGC','CGT','CGA'],
            N: ['AAC','AAT'], D: ['GAC','GAT'], C: ['TGC','TGT'], Q: ['CAG','CAA'],
            E: ['GAG','GAA'], G: ['GGC','GGG','GGA','GGT'], H: ['CAC','CAT'],
            I: ['ATC','ATT','ATA'], L: ['CTG','CTC','TTG','CTT','TTA','CTA'],
            K: ['AAG','AAA'], M: ['ATG'], F: ['TTC','TTT'], P: ['CCC','CCG','CCA','CCT'],
            S: ['AGC','TCC','TCT','TCG','AGT','TCA'], T: ['ACC','ACA','ACT','ACG'],
            W: ['TGG'], Y: ['TAC','TAT'], V: ['GTG','GTC','GTT','GTA'], '*': ['TGA','TAA','TAG']
          };
          function gcCount(c) { return (c === 'G' || c === 'C') ? 1 : 0; }
          function pickCodon(aa, strategy) {
            var table = strategy === 'human' ? HUMAN : ECOL;
            var list = table[aa];
            if (!list || !list.length) return null;
            if (strategy === 'ecoli' || strategy === 'human') return list[0];
            // GC-balanced or GC-rich host: choose by how close the codon sits to 50% GC
            var best = list[0], bestScore = 9;
            for (var i = 0; i < list.length; i++) {
              var g = gcCount(list[i].charAt(0)) + gcCount(list[i].charAt(1)) + gcCount(list[i].charAt(2));
              var score = Math.abs(g - (strategy === 'gc' ? 1.5 : 2.4));
              if (score < bestScore) { bestScore = score; best = list[i]; }
            }
            return best;
          }
          omni.onResult(['protein', 'strategy', 'tail'], function (ctx) {
            var raw = String(ctx.getRawInput('protein') || '').replace(/^>.*$/gm, '')
              .replace(/[^A-Za-z]/g, '').toUpperCase();
            if (!raw) {
              ctx.addHtml(block('Reverse translation', '—', 'Paste a protein sequence to back-translate.'));
              return;
            }
            var stratSlug = String(ctx.getRawInput('strategy') || '');
            var strategy = /human/i.test(stratSlug) ? 'human'
              : /gc-balanced/i.test(stratSlug) ? 'gc'
              : /avoid/i.test(stratSlug) ? 'gchost' : 'ecoli';
            var addStop = !/^no/i.test(String(ctx.getRawInput('tail') || 'yes').trim());
            var dna = '', unknown = [], residues = 0;
            for (var i = 0; i < raw.length; i++) {
              var aa = raw.charAt(i);
              if (aa === '*') { dna += 'TAA'; continue; }
              var codon = pickCodon(aa, strategy);
              if (!codon) { unknown.push(aa); dna += 'NNN'; continue; }
              dna += codon;
              residues++;
            }
            if (addStop) dna += pickCodon('*', strategy);
            var n = dna.length, gc = gcOf(dna.replace(/N/g, ''));
            var pct = n ? gc / n * 100 : 0;
            ctx.exportValue('length_aa', residues);
            ctx.exportValue('length', n);
            ctx.exportValue('gc_pct', Math.round(pct * 100) / 100);
            ctx.exportValue('codons', Math.floor(n / 3));
            ctx.exportValue('tm', Math.round(tmOf(n, pct, n - gc, gc) * 10) / 10);
        
            ctx.addHtml(block('Reverse-translated DNA (5′→3′)', wrap(dna, 60),
              n + ' nt · ' + Math.floor(n / 3) + ' codons · GC ' + pct1(pct) + '%'
              + (unknown.length ? ' · unrecognised letters replaced by NNN: '
                 + Array.from(new Set(unknown)).join(' ') : '')));
            if (unknown.length) {
              ctx.addHtml(block('Check your input',
                'These characters are not amino acid codes: ' + Array.from(new Set(unknown)).join(' ')
                + '\nThey were written as NNN, which a synthesiser will not accept.'));
            }
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Reverse Translate takes Protein sequence, Codon choice and Add a stop codon and returns Protein length and DNA length. Nothing is looked up on this page: Protein length is computed from Protein sequence and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Protein length is opened in aa; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Reverse Translate calculator works', 'html' => <<<'TXT'
            <p>Reverse Translate answers one question from 3 numbers, and the answer is Protein length, DNA length and GC content of the DNA.</p><p>What comes back is Protein length, DNA length, GC content of the DNA and Codons — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Protein sequence</strong> — a plain number, no unit. Single-letter code; spaces, digits and FASTA headers are ignored</li><li><strong>Codon choice</strong> — a plain number, no unit</li><li><strong>Add a stop codon</strong> — a plain number, no unit</li></ul><p>The answers come back as Protein length in aa, DNA length in nt, GC content of the DNA in %, Codons, Melting temperature of the duplex in °C. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Protein length takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Protein length, DNA length and GC content of the DNA are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Protein sequence left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Protein sequence is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Codon choice left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Codon choice is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Add a stop codon left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Add a stop codon is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Protein sequence is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Reverse Translate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Protein sequence</strong> takes a plain number with no unit attached. Single-letter code; spaces, digits and FASTA headers are ignored. Fill it from a measurement rather than a memory — Protein sequence is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Codon choice</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Codon choice is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Add a stop codon</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Add a stop codon is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Protein length</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>DNA length</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>GC content of the DNA</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Codons</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Melting temperature of the duplex</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p>&lt;strong&gt;Protein sequence&lt;/strong&gt; takes text, not a number, so the way it is pasted decides whether the analysis is right.</p><ul><li><strong>No header line.</strong> A FASTA file starts with a line that begins with &quot;&gt;&quot; — a name, not a sequence. Paste from the line below it, or that line is read as characters of its own.</li><li><strong>No spaces or line numbers.</strong> Nucleotide and protein text is often printed in blocks of sixty or eighty characters. Line breaks are usually fine; spaces, tabs and the numbers down the side are not.</li><li><strong>Case is a choice you make.</strong> Upper-case is the convention, but lower-case is often used to mark a region such as soft-masked repeats. Whether the page folds case or respects it is part of what it is telling you, so keep the case you mean.</li><li><strong>Ambiguous characters are not rare.</strong> Sites where the read was uncertain are usually written as N or as a degenerate code. They are counted like any other character, which is right, but it means the answer describes the text as written rather than the molecule as it is.</li></ul><p>The quick check is always the same: does the reported length match the text you pasted? If Protein length, DNA length, GC content of the DNA and Codons disagree with what you can count by eye, the box is holding something you did not intend to give it.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Reverse Translate, works through it, and the panel lists Protein sequence, Codon choice and Add a stop codon.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Protein length, DNA length, GC content of the DNA and Codons — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Protein sequence, Codon choice and Add a stop codon ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Protein sequence — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Protein length in aa against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Protein length follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Protein sequence, Codon choice and Add a stop codon measured, Protein length and DNA length wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/relative-abundance">Relative Abundance Calculator</a>, <a href="/biology/respiratory-quotient">Respiratory Quotient Calculator</a> and <a href="/biology/restriction-digest">Restriction Digest Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Reverse Translate calculator work out?', 'a' => 'Protein length, DNA length, GC content of the DNA and Codons.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Protein sequence, Codon choice, Add a stop codon. Enter protein, strategy and tail; Protein length is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Protein length is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Protein length is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Protein length keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/relative-abundance', 'name' => 'Relative Abundance Calculator'],
            ['path' => '/biology/respiratory-quotient', 'name' => 'Respiratory Quotient Calculator'],
            ['path' => '/biology/restriction-digest', 'name' => 'Restriction Digest Calculator'],
        ],
        'authors' => [],
    ],
];
