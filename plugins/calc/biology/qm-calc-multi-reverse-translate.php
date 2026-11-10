<?php

/**
 * Multi Reverse Translate Calculator
 * /biology/multi-reverse-translate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Multi Reverse Translate Calculator',
    'engine' => 'script',
    'engine_note' => 'reverse-translates several protein sequences into codons and reports how many residues were translated',
    'meta' => ['title' => 'Multi Reverse Translate: Many Proteins, Host Codons', 'description' => 'Reverse translate one or several proteins at once into DNA, using host-preferred codons or a degenerate codon per residue, with an optional stop at the end.', 'h1' => 'Multi Reverse Translate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'grid' => 'FR2',
                    'place' => [
                        0,
                        0,
                        0,
                        1,
                        1,
                        1,
                    ],
                    'fields' => [
                        [
                            'name' => 'proteins',
                            'label' => 'Protein sequences (one or more)',
                            'type' => 'text',
                            'help' => 'One sequence per line, FASTA headers allowed — every sequence is translated separately',
                            'default' => <<<'TXT'
                            >example
                            MKWVTFISLLFLFSSAYSR
                            >second
                            GVFRQESK
                            TXT,
                        ],
                        [
                            'name' => 'host',
                            'label' => 'Codon choice',
                            'type' => 'select',
                            'options' => ['E. coli K-12' => 'ecoli', 'Human (Homo sapiens)' => 'human', 'Yeast (S. cerevisiae)' => 'yeast', 'Degenerate (IUPAC)' => 'degenerate'],
                            'help' => 'Host-preferred codons, or one degenerate codon per residue',
                            'default' => 'E. coli K-12',
                        ],
                        [
                            'name' => 'stop',
                            'label' => 'Add a stop codon at the end',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'help' => 'Uses the host\'s preferred stop',
                            'default' => 'Yes',
                        ],
                        [
                            'name' => 'sequences',
                            'label' => 'Sequences translated',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'residues',
                            'label' => 'Residues translated',
                            'type' => 'result',
                            'help' => 'Stop characters excluded',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc',
                            'label' => 'GC content of the output',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
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
      // A select arrives here as the option *uid* the panel generated from the label,
      // not as its value, so resolve by normalised containment and take the longest
      // match (otherwise "hindiii" would be caught by a shorter key like "hin").
      function resolve(raw, map, fallback) {
        var n = String(raw || '').toLowerCase().replace(/[^a-z0-9]/g, '');
        if (Object.prototype.hasOwnProperty.call(map, raw)) return map[raw];
        var keys = Object.keys(map).sort(function (a, b) { return b.length - a.length; });
        for (var i = 0; i < keys.length; i++) {
          var k = keys[i].toLowerCase().replace(/[^a-z0-9]/g, '');
          if (k && n.indexOf(k) >= 0) return map[keys[i]];
        }
        return fallback;
      }
      var BASES = 'TCAG';
      var AA_ORDER = 'FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG';
      function aaOf(codon) {
        var i1 = BASES.indexOf(codon.charAt(0)), i2 = BASES.indexOf(codon.charAt(1)),
            i3 = BASES.indexOf(codon.charAt(2));
        if (i1 < 0 || i2 < 0 || i3 < 0) return null;
        return AA_ORDER.charAt(i1 * 16 + i2 * 4 + i3);
      }
      var STOPS = { TAA: 1, TAG: 1, TGA: 1 };
      var MASS = { A: 71.0788, R: 156.1875, N: 114.1038, D: 115.0886, C: 103.1388,
                   E: 129.1155, Q: 128.1307, G: 57.0519, H: 137.1411, I: 113.1594,
                   L: 113.1594, K: 128.1741, M: 131.1926, F: 147.1766, P: 97.1167,
                   S: 87.0782, T: 101.1051, W: 186.2132, Y: 163.1760, V: 99.1326 };
      function peptideMass(s) {
        var m = 0, n = 0;
        for (var i = 0; i < s.length; i++) {
          var x = MASS[s.charAt(i)];
          if (x) { m += x; n++; }
        }
        return n ? m + 18.01524 : 0;
      }
    
      var CODON_W = {
        ecoli: {
          TTT: 0.57, TTC: 1.00, TTA: 0.13, TTG: 0.13, CTT: 0.10, CTC: 0.10, CTA: 0.04, CTG: 1.00,
          ATT: 0.51, ATC: 1.00, ATA: 0.08, ATG: 1.00,
          GTT: 0.60, GTC: 0.42, GTA: 0.27, GTG: 1.00,
          TCT: 0.60, TCC: 0.60, TCA: 0.14, TCG: 0.14, AGT: 0.31, AGC: 1.00,
          CCT: 0.35, CCC: 0.22, CCA: 0.35, CCG: 1.00,
          ACT: 0.49, ACC: 1.00, ACA: 0.13, ACG: 0.27,
          GCT: 0.53, GCC: 0.58, GCA: 0.45, GCG: 1.00,
          TAT: 0.57, TAC: 1.00, CAT: 0.57, CAC: 1.00, CAA: 0.34, CAG: 1.00,
          AAT: 0.49, AAC: 1.00, AAA: 1.00, AAG: 0.25, GAT: 0.63, GAC: 1.00,
          GAA: 0.68, GAG: 1.00, TGT: 0.46, TGC: 1.00, TGG: 1.00,
          CGT: 1.00, CGC: 0.55, CGA: 0.06, CGG: 0.03, AGA: 0.03, AGG: 0.02,
          GGT: 1.00, GGC: 0.74, GGA: 0.19, GGG: 0.15
        },
        human: {
          TTT: 0.93, TTC: 1.00, TTA: 0.29, TTG: 0.50, CTT: 0.53, CTC: 0.79, CTA: 0.28, CTG: 1.00,
          ATT: 0.74, ATC: 0.87, ATA: 0.35, ATG: 1.00,
          GTT: 0.60, GTC: 0.79, GTA: 0.46, GTG: 1.00,
          TCT: 0.75, TCC: 0.88, TCA: 0.58, TCG: 0.22, AGT: 0.67, AGC: 1.00,
          CCT: 0.83, CCC: 1.00, CCA: 0.83, CCG: 0.28,
          ACT: 0.82, ACC: 1.00, ACA: 0.90, ACG: 0.38,
          GCT: 0.79, GCC: 1.00, GCA: 0.73, GCG: 0.29,
          TAT: 0.87, TAC: 1.00, CAT: 0.83, CAC: 1.00, CAA: 0.51, CAG: 1.00,
          AAT: 0.88, AAC: 1.00, AAA: 0.86, AAG: 1.00, GAT: 0.93, GAC: 1.00,
          GAA: 0.84, GAG: 1.00, TGT: 0.87, TGC: 1.00, TGG: 1.00,
          CGT: 0.48, CGC: 0.63, CGA: 0.31, CGG: 1.00, AGA: 0.62, AGG: 0.65,
          GGT: 0.62, GGC: 0.83, GGA: 1.00, GGG: 0.79
        },
        yeast: {
          TTT: 0.60, TTC: 1.00, TTA: 0.29, TTG: 1.00, CTT: 0.13, CTC: 0.06, CTA: 0.14, CTG: 0.11,
          ATT: 0.99, ATC: 1.00, ATA: 0.39, ATG: 1.00,
          GTT: 1.00, GTC: 0.62, GTA: 0.44, GTG: 0.28,
          TCT: 1.00, TCC: 0.74, TCA: 0.51, TCG: 0.15, AGT: 0.51, AGC: 0.33,
          CCT: 1.00, CCC: 0.30, CCA: 0.79, CCG: 0.09,
          ACT: 1.00, ACC: 0.79, ACA: 0.62, ACG: 0.26,
          GCT: 1.00, GCC: 0.52, GCA: 0.71, GCG: 0.19,
          TAT: 0.87, TAC: 1.00, CAT: 0.73, CAC: 1.00, CAA: 1.00, CAG: 0.31,
          AAT: 1.00, AAC: 0.83, AAA: 1.00, AAG: 0.58, GAT: 1.00, GAC: 0.72,
          GAA: 1.00, GAG: 0.45, TGT: 1.00, TGC: 0.63, TGG: 1.00,
          CGT: 0.14, CGC: 0.06, CGA: 0.07, CGG: 0.04, AGA: 1.00, AGG: 0.66,
          GGT: 1.00, GGC: 0.39, GGA: 0.31, GGG: 0.24
        }
      };
      var DEGENERATE = { A: 'GCN', C: 'TGY', D: 'GAY', E: 'GAR', F: 'TTY', G: 'GGN',
                         H: 'CAY', I: 'ATH', K: 'AAR', L: 'YTN', M: 'ATG', N: 'AAY',
                         P: 'CCN', Q: 'CAR', R: 'MGN', S: 'WSN', T: 'ACN', V: 'GTN',
                         W: 'TGG', Y: 'TAY', '*': 'TAR' };
    
      var ALL_CODONS = Object.keys(CODON_W.ecoli);
      var PREFERRED = {}, PREFERRED_STOP = {};
      function buildPreferred(key) {
        var out = {}, best = {};
        var table = CODON_W[key] || CODON_W.ecoli;
        for (var i = 0; i < ALL_CODONS.length; i++) {
          var cod = ALL_CODONS[i], aa = aaOf(cod);
          if (!aa || aa === '*') continue;
          var w = table[cod];
          if (w === undefined) continue;
          if (best[aa] === undefined || w > best[aa]) { best[aa] = w; out[aa] = cod; }
        }
        // the preferred stop codon is TAA in bacteria, TGA in eukaryotes
        out['*'] = key === 'ecoli' ? 'TAA' : 'TGA';
        return out;
      }
      var PREF = { ecoli: buildPreferred('ecoli'), human: buildPreferred('human'), yeast: buildPreferred('yeast') };
      function records(raw) {
        var lines = String(raw || '').split(/\r?\n/), out = [], cur = null;
        for (var i = 0; i < lines.length; i++) {
          var line = lines[i].trim();
          if (!line) continue;
          if (line.charAt(0) === '>') {
            cur = { name: line.slice(1).trim() || ('sequence ' + (out.length + 1)), seq: '' };
            out.push(cur);
          } else {
            if (!cur) { cur = { name: 'sequence 1', seq: '' }; out.push(cur); }
            cur.seq += line.replace(/[^A-Za-z]/g, '');
          }
        }
        return out;
      }
      omni.onResult(['proteins', 'host', 'stop'], function (ctx) {
        var recs = records(ctx.getRawInput('proteins'));
        var mode = resolve(ctx.getChoice('host'), { ecoli: 'ecoli', human: 'human', yeast: 'yeast', degenerate: 'degenerate' }, 'ecoli');
        var addStop = /true|yes|1/i.test(String(ctx.getChoice('stop') || ''));
        if (!recs.length) {
          ctx.addHtml(block('Reverse translation', '—', 'Paste at least one protein sequence.'));
          ctx.exportValue('sequences', 0); ctx.exportValue('residues', 0); ctx.exportValue('gc', 0);
          return;
        }
        var html = '', done = 0, residues = 0, gc = 0, at = 0, problems = [];
        for (var r = 0; r < recs.length && r < 20; r++) {
          var pep = recs[r].seq.toUpperCase().replace(/[^A-Z*]/g, '');
          if (!pep) { problems.push(recs[r].name + ': no residues'); continue; }
          var dna = '', i, unknown = [];
          for (i = 0; i < pep.length; i++) {
            var aa = pep.charAt(i);
            if (aa === '*') { if (i === pep.length - 1 && addStop) dna += (PREF[mode] || PREF.ecoli)['*']; continue; }
            var cod;
            if (mode === 'degenerate') cod = DEGENERATE[aa];
            else cod = (PREF[mode] || PREF.ecoli)[aa];
            if (!cod) { unknown.push(aa + '@' + (i + 1)); continue; }
            dna += cod;
            residues++;
          }
          if (addStop && dna.length && pep.charAt(pep.length - 1) !== '*' && mode !== 'degenerate') {
            dna += (PREF[mode] || PREF.ecoli)['*'];
          }
          for (i = 0; i < dna.length; i++) {
            var ch = dna.charAt(i);
            at++;
            if (ch === 'G' || ch === 'C') gc++;
          }
          done++;
          html += block('> ' + recs[r].name + '  (' + pep.length + ' aa → ' + dna.length + ' nt)',
            wrap(dna, 60), unknown.length ? 'Unreadable characters: ' + unknown.join(', ') : '');
        }
        var pct = at ? gc / at * 100 : 0;
        ctx.exportValue('sequences', done);
        ctx.exportValue('residues', residues);
        ctx.exportValue('gc', Math.round(pct * 100) / 100);
        var head = block('Reverse translation summary',
          'Sequences   ' + done + '\nResidues    ' + residues + '\nCodon set   ' + mode
          + '\nGC content  ' + pct.toFixed(1) + ' %',
          pct > 70 ? 'Above 70 % GC: expect synthesis difficulty and secondary structure.'
                   : pct < 30 ? 'Below 30 % GC: check that the reading frame and host are what you meant.'
                   : 'GC within the comfortable 30–70 % range.');
        ctx.addHtml(head + html + (problems.length ? block('Skipped', problems.join('\n')) : ''));
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Reverse translation turns a protein back into the DNA that could encode it. This page does it for a whole list of proteins at once, choosing codons for a named host and reporting how many sequences it translated and how GC-rich the result is.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It converts a batch of protein sequences into DNA, one line at a time, using a codon table for the host you choose. It reports how many sequences it read, how many residues in total, and the GC content of the DNA it produced.</p><p>Each line is cleaned and read as a protein. Every residue is replaced by a codon — the host's most-used codon for that residue, or a degenerate codon such as GCN for alanine when you ask for the one that covers all synonyms. A stop codon is appended if you asked for one. Sequences are translated independently, so one line of headers or one blank line does not shift the rest.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 things to fill in, and the order does not matter:</p><ul><li><strong>Protein sequences (one or more)</strong> — a text box. One sequence per line, FASTA headers allowed — every sequence is translated separately.</li><li><strong>Codon choice</strong> — a drop-down with the choices the page offers. Host-preferred codons, or one degenerate codon per residue.</li><li><strong>Add a stop codon at the end</strong> — a drop-down with the choices the page offers. Uses the host&#039;s preferred stop.</li></ul><p>The answer comes back as 3 boxes: Sequences translated, Residues translated, GC content of the output (%). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Protein sequences (one or more)</strong> is a text box. One sequence per line, FASTA headers allowed — every sequence is translated separately Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Codon choice</strong> is a drop-down with the choices the page offers. The choices are E. coli K-12, Human (Homo sapiens), Yeast (S. cerevisiae) and Degenerate (IUPAC). Host-preferred codons, or one degenerate codon per residue Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Add a stop codon at the end</strong> is a drop-down with the choices the page offers. The choices are Yes and No. Uses the host&#039;s preferred stop Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Protein sequences (one or more)</th><td>MKTAYIAKQRQISFVKSHFSRQDILDLWQ</td></tr><tr><th>Codon choice</th><td>E. coli</td></tr><tr><th>Add a stop codon at the end</th><td>Yes</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Sequences translated</th><td>1</td></tr><tr><th>Residues translated</th><td>29</td></tr><tr><th>GC content of the output</th><td>52.22 %</td></tr></tbody></table><p>One 29-residue protein becomes 90 bases of DNA with a GC content of 52.22 per cent: three bases per residue plus a stop, with the codons E. coli prefers.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Protein sequences (one or more)</th><td>MKTAYIAKQR
            MGSSHHHHHHSSGLVPR</td></tr><tr><th>Codon choice</th><td>E. coli</td></tr><tr><th>Add a stop codon at the end</th><td>Yes</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Sequences translated</th><td>1</td></tr><tr><th>Residues translated</th><td>27</td></tr><tr><th>GC content of the output</th><td>58.33</td></tr></tbody></table><p>2 of the 3 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Sequences translated</strong> — how many protein records the page read.</li><li><strong>Residues translated</strong> — the total length of all of them, stops excluded.</li><li><strong>GC content</strong> — the GC percentage of the DNA produced, across all sequences.</li></ul><p>The residue count tells you the list was read as you expected; the GC content tells you whether the DNA you are about to order will be easy or hard to synthesise, clone and amplify. Above about 65 per cent GC, synthesis vendors usually ask for a redesign.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Multiply the residue count by three and add one codon per sequence for the stop; that is the DNA length. Then count the Gs and Cs in the first few codons and compare with the reported percentage.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Pasting DNA by mistake</strong> — A nucleotide string reads as a protein of alanines, threonines, glycines and cysteines. The length gives it away: three times too long.</li><li><strong>Mixed case and spaces</strong> — Both are handled; FASTA headers are stripped. What is not handled is a protein with digits in it.</li><li><strong>Host choice</strong> — The codons are chosen for one host. A sequence optimised for E. coli will not be optimal in a human cell line.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One codon per residue</strong> — Except in degenerate mode, the page picks a single codon. It does not optimise for mRNA structure or avoid restriction sites.</li><li><strong>No verification</strong> — The DNA is a possible gene, not a validated one; translating it back is the check.</li><li><strong>Stop handling</strong> — Whether a stop is added is a setting; forgetting it changes the length by three.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Multi Reverse Translate Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is used to design a gene for synthesis, to turn a peptide list into orderable oligos, to work out what DNA a protein would need, and to compare the GC content of two possible back-translations before ordering one.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the degenerate mode for?', 'a' => 'It writes each residue as IUPAC code covering every codon that encodes it, so the DNA shows which positions are free rather than committing to one.'],
            ['q' => 'Why does GC content matter so much?', 'a' => 'Because it decides how hard the DNA is to synthesise and amplify. Very high or very low GC sequences often need redesign before a vendor will make them.'],
            ['q' => 'Does Multi Reverse Translate Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/logistic-population-growth', 'name' => 'Logistic Population Growth Calculator'],
            ['path' => '/biology/mark-recapture', 'name' => 'Mark-Recapture Population Calculator'],
            ['path' => '/biology/mark-recapture-population', 'name' => 'Mark–Recapture Population (Lincoln–Petersen) Calculator'],
        ],
        'authors' => [],
    ],
];
