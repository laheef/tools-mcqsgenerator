<?php

/**
 * Rabbit color
 * /biology/rabbit-color
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rabbit Colour Calculator',
    'engine' => 'script',
    'engine_note' => 'reads the genotype at each coat locus and works out the probability of every coat colour the cross can produce',
    'meta' => ['title' => 'Rabbit Colour Calculator: Coat Probabilities from Genotypes', 'description' => 'Enter the dominant-allele count at five coat loci for both parents and read the chance of each colour class in a litter, from albino to chestnut and the selfs.', 'h1' => 'Rabbit Colour Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'The sire (father)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_A', 'label' => 'Sire, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_B', 'label' => 'Sire, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_C', 'label' => 'Sire, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_D', 'label' => 'Sire, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_E', 'label' => 'Sire, Extension (E dominant over e) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'The dam (mother)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_A', 'label' => 'Dam, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_B', 'label' => 'Dam, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_C', 'label' => 'Dam, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_D', 'label' => 'Dam, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_E', 'label' => 'Dam, Extension (E dominant over e) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results — chance of each colour in a kit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_albino',
                            'label' => 'Albino (ruby-eyed white) %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_nonext',
                            'label' => 'Non-extension — red, fawn, tortoiseshell %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_chestnut',
                            'label' => 'Agouti, black-based — chestnut %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_agouti_other',
                            'label' => 'Agouti in chocolate, opal, cinnamon or lilac %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_self_black',
                            'label' => 'Self black %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_self_other',
                            'label' => 'Self in chocolate, blue or lilac %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_coloured',
                            'label' => 'Not albino %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_top',
                            'label' => 'Most likely colour class — chance %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.define("writeColor",function(color_family_sire,color_family_dam,color_sire_full,color_dam_full,color_sire_chinchilla,color_dam_chinchilla,color_sire_seal,color_dam_seal,color_sire_sable,color_dam_sable,color_sire_himalayan,color_dam_himalayan){var subcolor_sire=1,subcolor_dam=1;if(color_family_sire==0){subcolor_sire=color_sire_full}else if(color_family_sire==1){subcolor_sire=color_sire_chinchilla}else if(color_family_sire==2){subcolor_sire=color_sire_seal}else if(color_family_sire==3){subcolor_sire=color_sire_sable}else if(color_family_sire==4){subcolor_sire=color_sire_himalayan}if(color_family_dam==0){subcolor_dam=color_dam_full}else if(color_family_dam==1){subcolor_dam=color_dam_chinchilla}else if(color_family_dam==2){subcolor_dam=color_dam_seal}else if(color_family_dam==3){subcolor_dam=color_dam_sable}else if(color_family_dam==4){subcolor_dam=color_dam_himalayan}return Math.round(1+color_family_sire)+Math.round(subcolor_sire*10)+Math.round(subcolor_dam*1e3)+Math.round((1+color_family_dam)*1e5)});omni.define("writeColorCode",function(steel_genes_sire,steel_genes_dam,En_genes_sire,En_genes_dam,vienna_genes_sire,vienna_genes_dam,dutch_genes_sire,dutch_genes_dam,silvering_genes_sire,silvering_genes_dam,wideband_genes_sire,wideband_genes_dam,lutino_genes_sire,lutino_genes_dam,include_steel,include_broken,include_vienna,include_dutch,include_silvering,include_wideband,include_lutino){var code=Math.round(steel_genes_sire*include_steel)+Math.round(steel_genes_dam*10)+Math.round(En_genes_sire*100*include_broken)+Math.round(En_genes_dam*1e3)+Math.round(vienna_genes_sire*1e4*include_vienna)+Math.round(vienna_genes_dam*1e5)+Math.round(dutch_genes_sire*1e6*include_dutch)+Math.round(dutch_genes_dam*1e7)+Math.round(silvering_genes_sire*1e8*include_silvering)+Math.round(silvering_genes_dam*1e9)+Math.round(wideband_genes_sire*1e10*include_wideband)+Math.round(wideband_genes_dam*1e11)+Math.round(lutino_genes_sire*1e12*include_lutino)+Math.round(lutino_genes_dam*1e13);return code});omni.define("writeGenesCodePart1",function(A_gene_sire,A_gene_dam,B_gene_sire,B_gene_dam,C_gene_sire,C_gene_dam,D_gene_sire,D_gene_dam,E_gene_sire,E_gene_dam,steel_gene_sire,steel_gene_dam,include_steel){var code=Math.round(A_gene_sire)+Math.round(A_gene_dam*10)+Math.round(B_gene_sire*100)+Math.round(B_gene_dam*1e3)+Math.round(C_gene_sire*1e4)+Math.round(C_gene_dam*1e6)+Math.round(D_gene_sire*1e8)+Math.round(D_gene_dam*1e9)+Math.round(steel_gene_sire*1e10*include_steel)+Math.round(steel_gene_dam*1e12)+Math.round(E_gene_sire*1e14)+Math.round(E_gene_dam*1e15);return code});omni.define("writeGenesCodePart2",function(En_gene_sire,En_gene_dam,V_gene_sire,V_gene_dam,Du_gene_sire,Du_gene_dam,Si_gene_sire,Si_gene_dam,W_gene_sire,W_gene_dam,P_gene_sire,P_gene_dam,include_broken,include_vienna,include_dutch,include_silvering,include_wideband,include_lutino){var code=Math.round(En_gene_sire*include_broken)+Math.round(En_gene_dam*10)+Math.round(V_gene_sire*100*include_vienna)+Math.round(V_gene_dam*1e3)+Math.round(Du_gene_sire*1e4*include_dutch)+Math.round(Du_gene_dam*1e5)+Math.round(Si_gene_sire*1e6*include_silvering)+Math.round(Si_gene_dam*1e7)+Math.round(W_gene_sire*1e8*include_wideband)+Math.round(W_gene_dam*1e9)+Math.round(P_gene_sire*1e10*include_lutino)+Math.round(P_gene_dam*1e11);return code});omni.define("ifElseCustom",function(sum){if(sum<1){return 0}return 1});//# sourceURL=customJs.js
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
    
    var LOCI = ['A', 'B', 'C', 'D', 'E'];
    
    function num(name) {
      var el = document.querySelector('input[data-var="' + name + '"]');
      if (!el || String(el.value).trim() === '') { return null; }
      var n = Number(el.value);
      return isFinite(n) ? n : null;
    }
    
    /* offspring dominant-allele count: 0, 1 or 2 with its probability */
    function cross(sire, dam) {
      var qs = sire / 2, qd = dam / 2;
      return [
        { k: 2, p: qs * qd },
        { k: 1, p: qs * (1 - qd) + (1 - qs) * qd },
        { k: 0, p: (1 - qs) * (1 - qd) }
      ];
    }
    
    /* the coat a set of five counts describes */
    function coat(g) {
      if (g.C === 0) { return 'Albino (ruby-eyed white)'; }
      if (g.E === 0) {
        return g.A === 0 ? 'Tortoiseshell (non-extension, self)' : 'Red / fawn (non-extension, agouti)';
      }
      var base = g.B === 0 ? 'chocolate' : 'black';
      var dilute = g.D === 0;
      var agouti = g.A > 0;
      if (agouti) {
        if (base === 'black') { return dilute ? 'Opal (agouti, blue)' : 'Chestnut (agouti, black)'; }
        return dilute ? 'Lilac agouti' : 'Cinnamon (agouti, chocolate)';
      }
      if (base === 'black') { return dilute ? 'Blue (self, dilute black)' : 'Black (self)'; }
      return dilute ? 'Lilac (self, dilute chocolate)' : 'Chocolate (self)';
    }
    
    function group(name) {
      if (name.indexOf('Albino') === 0) { return 'albino'; }
      if (name.indexOf('Tortoiseshell') === 0 || name.indexOf('Red / fawn') === 0) { return 'nonext'; }
      if (name.indexOf('Chestnut') === 0) { return 'chestnut'; }
      if (name.indexOf('Opal') === 0 || name.indexOf('Cinnamon') === 0 || name.indexOf('Lilac agouti') === 0) {
        return 'agoutiOther';
      }
      if (name.indexOf('Black') === 0) { return 'selfBlack'; }
      return 'selfOther';
    }
    
    omni.onResult(['sire_A', 'dam_A'], function (ctx, v) {
      var sire = {}, dam = {}, i, k;
      for (i = 0; i < LOCI.length; i++) {
        var locus = LOCI[i];
        var s = num('sire_' + locus);
        var d = num('dam_' + locus);
        if (s === null || d === null) {
          ctx.addUnmetCondition('Fill in both parents at every locus — A, B, C, D and E.');
          return;
        }
        if (s < 0 || s > 2 || d < 0 || d > 2 || Math.round(s) !== s || Math.round(d) !== d) {
          ctx.addUnmetCondition('Each locus takes 0, 1 or 2 — the number of dominant alleles.');
          return;
        }
        sire[locus] = s;
        dam[locus] = d;
      }
    
      /* every combination of the three possible outcomes at the five loci */
      var dist = {};
      var idx = [0, 0, 0, 0, 0];
      for (var a = 0; a < 3; a++) {
        for (var b = 0; b < 3; b++) {
          for (var c = 0; c < 3; c++) {
            for (var dd = 0; dd < 3; dd++) {
              for (var e = 0; e < 3; e++) {
                var counts = { A: [2, 1, 0][a], B: [2, 1, 0][b], C: [2, 1, 0][c],
                               D: [2, 1, 0][dd], E: [2, 1, 0][e] };
                var p = 1;
                var order = [a, b, c, dd, e];
                for (k = 0; k < 5; k++) {
                  var out = cross(sire[LOCI[k]], dam[LOCI[k]])[order[k]];
                  p *= out.p;
                }
                if (p <= 0) { continue; }
                var name = coat(counts);
                dist[name] = (dist[name] || 0) + p;
              }
            }
          }
        }
      }
    
      var sums = { albino: 0, nonext: 0, chestnut: 0, agoutiOther: 0, selfBlack: 0, selfOther: 0 };
      var names = Object.keys(dist);
      for (i = 0; i < names.length; i++) {
        sums[group(names[i])] += dist[names[i]];
      }
      var coloured = 1 - sums.albino;
    
      var best = names[0];
      for (i = 0; i < names.length; i++) { if (dist[names[i]] > dist[best]) { best = names[i]; } }
    
      ctx.exportValue('rb_albino', sround(sums.albino * 100, 1));
      ctx.exportValue('rb_nonext', sround(sums.nonext * 100, 1));
      ctx.exportValue('rb_chestnut', sround(sums.chestnut * 100, 1));
      ctx.exportValue('rb_agouti_other', sround(sums.agoutiOther * 100, 1));
      ctx.exportValue('rb_self_black', sround(sums.selfBlack * 100, 1));
      ctx.exportValue('rb_self_other', sround(sums.selfOther * 100, 1));
      ctx.exportValue('rb_coloured', sround(coloured * 100, 1));
      ctx.exportValue('rb_top', sround(dist[best] * 100, 1));
    
      ctx.addHtml('<p><strong>The likeliest single colour is ' + best.toLowerCase() + ', at '
        + snum(dist[best] * 100, 1) + ' % of kittens; ' + snum(coloured * 100, 1)
        + ' % of the litter will have some colour and ' + snum(sums.albino * 100, 1)
        + ' % will be ruby-eyed whites.</strong></p>');
    
      /* the full list, biggest first */
      names.sort(function (x, y) { return dist[y] - dist[x]; });
      var rows = names.map(function (nm) {
        return [nm, snum(dist[nm] * 100, 1) + ' %', '1 in ' + (dist[nm] > 0 ? snum(1 / dist[nm], 1) : '—')];
      });
      ctx.addHtml('<p>Every colour the cross can produce:</p>');
      ctx.addHtml(stable(['Colour', 'Chance', 'Odds'], rows));
    
      ctx.addHtml(stable(['Genes', 'Sire', 'Dam'], LOCI.map(function (l) {
        return [l, String(sire[l]) + ' dominant allele' + (sire[l] === 1 ? '' : 's'),
          String(dam[l]) + ' dominant allele' + (dam[l] === 1 ? '' : 's')];
      })));
    
      ctx.addHtml('<p class="calc-unmet">Five loci, two alleles each, is the skeleton of rabbit colour genetics, '
        + 'not the whole animal. The C locus alone has a series — full colour, chinchilla, seal, sable-point, '
        + 'himalayan, albino — and this calculator folds all but albino into "coloured", so a chinchilla × '
        + 'chinchilla cross that should throw chinchillas will come back as chestnut or black. The E locus has '
        + 'the harlequin allele between E and e, the D locus interacts with silvering and the wideband gene, '
        + 'and the B locus with the Vienna blue-eyed-white complex and Dutch markings, none of which is here. '
        + 'Crossing-over, the steel gene and the fact that spotting patterns are polygenic are all ignored. '
        + 'Each locus is treated as independent, which is true of genes on different chromosomes and close '
        + 'enough to true for these five. Use the percentages as the shape of a litter rather than a '
        + 'prediction: a 25 % chance means one kitten in four, and a litter of four can easily be all one '
        + 'colour.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Rabbit coat colour is decided by a handful of loci that act in a fixed order. Enter how many dominant alleles each parent carries at five of them and this page works out what a litter of kits could look like.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It takes a sire and a dam, five loci each, and returns the probability of each coat class in their offspring — albino, non-extension reds and tortoiseshells, chestnut, the other agouti colours, and the two self classes.</p><p>Each locus is entered as the number of dominant alleles: 2 for a homozygote, 1 for a carrier, 0 for an animal with no dominant allele there. For a cross at one locus that gives the familiar probabilities — 2×2 gives all dominant, 2×0 gives all carriers, 1×1 gives a quarter homozygous dominant, a half carriers and a quarter recessive. The page multiplies those probabilities across the five loci independently, converts each of the 243 combinations into a coat class by applying the loci in order, and sums the classes. The most likely class is reported with its chance.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 10 things to fill in, and the order does not matter:</p><ul><li><strong>Sire, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</strong> — a number box.</li><li><strong>Sire, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</strong> — a number box.</li><li><strong>Sire, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</strong> — a number box.</li><li><strong>Sire, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</strong> — a number box.</li><li><strong>Sire, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</strong> — a number box.</li><li><strong>Dam, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</strong> — a number box.</li><li><strong>Dam, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</strong> — a number box.</li><li><strong>Dam, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</strong> — a number box.</li><li><strong>Dam, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</strong> — a number box.</li><li><strong>Dam, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</strong> — a number box.</li></ul><p>The answer comes back as 8 boxes: Albino (ruby-eyed white) %, Non-extension — red, fawn, tortoiseshell %, Agouti, black-based — chestnut %, Agouti in chocolate, opal, cinnamon or lilac %, Self black %, Self in chocolate, blue or lilac %, Not albino %, Most likely colour class — chance %. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Sire, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Sire, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Sire, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Sire, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Sire, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Dam, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Dam, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Dam, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Dam, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Dam, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Sire, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</th><td>2</td></tr><tr><th>Sire, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</th><td>2</td></tr><tr><th>Sire, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</th><td>1</td></tr><tr><th>Sire, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</th><td>2</td></tr><tr><th>Sire, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</th><td>1</td></tr><tr><th>Dam, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</th><td>0</td></tr><tr><th>Dam, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</th><td>2</td></tr><tr><th>Dam, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</th><td>0</td></tr><tr><th>Dam, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</th><td>0</td></tr><tr><th>Dam, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</th><td>0</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Albino (ruby-eyed white) %</th><td>50</td></tr><tr><th>Non-extension — red, fawn, tortoiseshell %</th><td>25</td></tr><tr><th>Agouti, black-based — chestnut %</th><td>25</td></tr><tr><th>Agouti in chocolate, opal, cinnamon or lilac %</th><td>0</td></tr><tr><th>Self black %</th><td>0</td></tr><tr><th>Self in chocolate, blue or lilac %</th><td>0</td></tr><tr><th>Not albino %</th><td>50</td></tr><tr><th>Most likely colour class — chance %</th><td>50</td></tr></tbody></table><p>A sire with C/c and E/e crossed to a dam with c/c and e/e gives 50 per cent albino, 25 per cent non-extension and 25 per cent chestnut. The two recessive loci multiply: half the kits are c/c and cannot show colour at all, and of the rest a quarter are e/e.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Sire, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</th><td>0</td></tr><tr><th>Sire, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</th><td>2</td></tr><tr><th>Sire, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</th><td>2</td></tr><tr><th>Sire, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</th><td>2</td></tr><tr><th>Sire, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</th><td>2</td></tr><tr><th>Dam, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</th><td>2</td></tr><tr><th>Dam, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</th><td>0</td></tr><tr><th>Dam, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</th><td>1</td></tr><tr><th>Dam, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</th><td>0</td></tr><tr><th>Dam, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</th><td>1</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Albino (ruby-eyed white) %</th><td>0</td></tr><tr><th>Non-extension — red, fawn, tortoiseshell %</th><td>0</td></tr><tr><th>Agouti, black-based — chestnut %</th><td>100</td></tr><tr><th>Agouti in chocolate, opal, cinnamon or lilac %</th><td>0</td></tr><tr><th>Self black %</th><td>0</td></tr><tr><th>Self in chocolate, blue or lilac %</th><td>0</td></tr><tr><th>Not albino %</th><td>100</td></tr><tr><th>Most likely colour class — chance %</th><td>100</td></tr></tbody></table><p>5 of the 8 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Albino</strong> — c/c at the C locus: no pigment is made at all.</li><li><strong>Non-extension</strong> — e/e with colour allowed: red, fawn or tortoiseshell depending on the agouti locus.</li><li><strong>Chestnut</strong> — agouti with black-based pigment — the wild-type rabbit coat.</li><li><strong>Self black</strong> — no agouti banding, black pigment, undiluted.</li><li><strong>Not albino</strong> — the complement of the albino figure.</li><li><strong>Most likely class</strong> — the colour class with the highest single probability, and that probability.</li></ul><p>The eight figures describe a litter, not an individual. The chance of albino is the single most useful one when a recessive hides in a line; the split between non-extension and chestnut tells you whether the E locus is being carried. "Not albino" is the complement of the albino figure and is easy to check by adding them.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Do one locus by hand. A carrier crossed to a carrier gives 25 per cent recessive at that locus; if the answer for albino is not a quarter for a C/c × C/c cross, something else is also segregating. Then check that the eight percentages add to 100.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Counting phenotypes</strong> — The boxes take genotypes — how many dominant alleles the animal carries — not the colour it looks. A black rabbit can be a carrier at several loci.</li><li><strong>Ignoring linkage</strong> — The page multiplies loci as independent. Real loci on the same chromosome are linked and can distort the ratios.</li><li><strong>Small litters</strong> — A 25 per cent chance in a litter of four means one kit, on average. Probabilities describe many litters, not the next one.</li></ul><p>Nothing here is pasted from a file: every box is short enough to type, and the choice lists mean the answer depends on which entry is selected rather than on how it is spelled.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Five loci</strong> — The many modifier loci in fancy breeds — steel, broken, vienna, silvering — are not modelled here, so a patterned rabbit is described by its base colour.</li><li><strong>No mutation</strong> — Rates are Mendelian and assume no new mutation.</li><li><strong>One cross</strong> — Each mating is calculated separately; a breeding programme needs the genotypes of the offspring, which the page cannot infer.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Rabbit color Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is used to decide whether two animals can produce an albino, to work out what a recessive is hiding in a line, and to explain to a buyer why a litter from two coloured parents can include a white kit.</p><p>The albino figure is the one to watch across a breeding programme. Every cross between two carriers produces a quarter albino, whatever the other loci are doing, and that is the cheapest way to find out whether a line is carrying the recessive at all. If two coloured rabbits never produce an albino in many litters, they are much more likely to be C/C than chance would suggest.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why does a white kit appear from two coloured parents?', 'a' => 'Because both parents can carry c. Two C/c rabbits produce c/c kits a quarter of the time, and c/c makes no pigment.'],
            ['q' => 'What does "dominant alleles" mean in the boxes?', 'a' => 'How many copies of the dominant allele the animal has: 2 for two, 1 for one, 0 for none.'],
            ['q' => 'Does Rabbit color Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/pet-sitter-rates', 'name' => 'Pet sitter rates Calculator'],
            ['path' => '/biology/phenotypic-ratio', 'name' => 'Phenotypic Ratio Calculator'],
            ['path' => '/biology/photosynthesis-rate', 'name' => 'Photosynthesis Rate Calculator'],
        ],
        'authors' => [],
    ],
];
