"""Batch J — the rest of the sequence toolkit.

Same machinery as batch I: a `text` box for the molecule, a page script for the
work, no equations. Everything runs in the browser, so a 20 kb paste is
instantaneous and nothing is stored on the server.

Shared conventions (see `specs_i.py` for the long version):
  * the script strips FASTA headers, digits, gaps and spaces itself,
  * every branch is total — empty input, protein letters in a DNA box, a lone
    header line, an unparsable pattern all produce a message, never a throw,
  * output goes through `block()` / `table()`, both of which escape their input,
  * `ctx.exportValue()` only ever receives a finite number.
"""

from lib import Spec, num, sel, chk, txt, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


# ---------------------------------------------------------------- JS toolkit
JS_HELPERS = r"""
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
"""


# ------------------------------------------------------------ 1. codon usage
add(Spec(
    name="Codon Usage Calculator",
    slug="codon-usage-calculator",
    summary=("Codon usage is how often each of the 61 sense codons appears in a coding sequence. "
             "Because several codons stand for the same amino acid, the pattern shows which "
             "synonyms a gene prefers — the first thing to check before expressing a gene in "
             "E. coli, yeast or CHO cells, where rare codons stall the ribosome."),
    fields=[
        txt("sequence", "Coding sequence", "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTT",
            "Paste DNA; FASTA headers, spaces and digits are ignored", 5),
        sel("frame", "Reading frame", [("Frame 1", "0"), ("Frame 2", "1"), ("Frame 3", "2")], "0",
            "Frame 1 starts at the first base"),
        num("codons", "Complete codons", "", "", "", output=True),
        num("gc3", "GC at the third position", "", "%", "A high GC3 usually means a GC-rich organism", output=True),
        num("stops", "Stop codons", "", "", "", output=True),
        num("distinct", "Different codons used", "", "of 64", "", output=True),
        num("rare", "Rare codons", "", "", "Under 10% within a family that appears at least five times — candidates for codon optimisation", output=True),
    ],
    dirs=[],
    formula=("RSCU = observed count of a codon ÷ (count of its amino acid ÷ number of its synonyms).  "
             "GC3 = codons ending in G or C ÷ complete codons × 100"),
    symbols=[("RSCU", "relative synonymous codon usage; 1.0 = no preference", "—"),
             ("GC3", "GC content at the third codon position", "%"),
             ("CDS", "coding sequence, in frame from the start codon", "—")],
    bands=[("RSCU > 1.5", "Strongly preferred", "the codon is used far more than chance in this gene"),
           ("RSCU 0.8 – 1.5", "Neutral", "no meaningful preference"),
           ("RSCU < 0.5", "Avoided", "a candidate rare codon if the host also dislikes it"),
           ("GC3 > 70%", "GC-rich coding sequence", "common in Streptomyces, Mycobacterium, some plants")],
    notes=[
        "RSCU normalises for family size: serine has six codons, methionine and tryptophan have one, "
        "so raw counts cannot be compared without it.",
        "The rare-codon count only looks at families that appear at least five times. In a short "
        "sequence most amino acids occur once, so every codon is trivially 100% of its family and a "
        "plain 10% cut-off would report nothing.",
        "Codon usage is species-specific. A codon that is common in humans can be rare in E. coli, "
        "which is why a human cDNA often expresses poorly in bacteria.",
        "Rare codons do not always slow translation — clusters of them, especially at the 5′ end, "
        "are the ones that matter.",
    ],
    mistakes=[
        "Analysing the sequence in the wrong frame, which turns every codon into noise.",
        "Including the stop codon in the GC3 figure while excluding it from the codon table.",
        "Comparing a gene's usage with a host table built from highly expressed genes rather than "
        "from the whole genome.",
    ],
    faq=[
        ("What is a good GC3 value?", "There is no good or bad value — it is a fingerprint of the "
         "organism. E. coli sits near 55%, human genes near 60%, and Plasmodium near 25%."),
        ("Why does codon usage matter for expression?", "Rare codons can exhaust the matching tRNA, "
         "cause ribosome stalling and lower yield. Codon optimisation replaces them with common "
         "synonyms without changing the protein."),
        ("Should I include the stop codon?", "Analyse it separately. Stops carry no amino acid, so "
         "they have no RSCU within a family."),
    ],
    related=[("/biology/reverse-translate", "Reverse translate"),
             ("/biology/dna-to-protein", "DNA to protein"),
             ("/biology/gc-content-sequence", "GC content")],
    svg=("rows", {"caption": "Codons available for one amino acid",
                  "series": [("Leu", 6), ("Ser", 6), ("Arg", 6), ("Ala", 4), ("Met", 1)]}),
    icon="dna",
    keywords=["codon usage", "RSCU", "codon bias", "GC3"],
    script=JS_HELPERS + r"""
  omni.onResult(['sequence', 'frame'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    // the select's slug is "frame-2" for the second frame
    var frameSlug = String(ctx.getRawInput('frame') || '');
    var frame = parseInt(frameSlug.replace(/\D/g, ''), 10) - 1;
    if (!isFinite(frame) || frame < 0 || frame > 2) frame = 0;
    if (seq.length < 3) {
      ctx.addHtml(block('Codon usage', '—', 'Paste a coding sequence of at least three bases.'));
      return;
    }
    var counts = {}, total = 0, stops = 0, gc3 = 0, aaCount = {}, aaSyn = {};
    eachCodon(seq, frame, function (codon) {
      var aa = aaOf(codon);
      if (!aa) return;
      total++;
      if (aa === '*') { stops++; return; }
      counts[codon] = (counts[codon] || 0) + 1;
      aaCount[aa] = (aaCount[aa] || 0) + 1;
      if (codon.charAt(2) === 'G' || codon.charAt(2) === 'C') gc3++;
    });
    if (!total) {
      ctx.addHtml(block('Codon usage', '—', 'No complete codon in this frame.'));
      return;
    }
    // Degeneracy of each amino acid in the standard code. It is a property of the
    // code, not of this sequence: counting the distinct codons *used* would give
    // a family of one for any amino acid the gene spells only one way, and RSCU
    // would then be wrong by the missing synonyms.
    var DEGEN = {F: 2, L: 6, S: 6, Y: 2, C: 2, W: 1, P: 4, H: 2, Q: 2, R: 6, I: 3,
                 T: 4, N: 2, K: 2, M: 1, V: 4, A: 4, D: 2, E: 2, G: 4};
    aaSyn = DEGEN;

    var rare = 0;
    var rows = Object.keys(counts).sort(function (a, b) { return counts[b] - counts[a]; })
      .map(function (c) {
        var aa = aaOf(c);
        var family = aaCount[aa] || 1, syn = aaSyn[aa] || 1;
        var rscu = (counts[c] * syn) / family;
        var share = counts[c] / family;
        // Only meaningful where the amino acid appears often enough for a share
        // to mean anything: one occurrence in a family is always 100%.
        if (family >= 5 && share < 0.10 && syn > 1) rare++;
        return [c, aa, String(counts[c]), pct1(share * 100) + '%', rscu.toFixed(2)];
      });

    ctx.exportValue('codons', total - stops);
    ctx.exportValue('gc3', Math.round(gc3 / total * 1000) / 10);
    ctx.exportValue('stops', stops);
    ctx.exportValue('distinct', Object.keys(counts).length);
    ctx.exportValue('rare', rare);

    ctx.addHtml(block('Summary',
      (total - stops) + ' sense codons · ' + (stops ? stops + ' stop codon' + (stops > 1 ? 's' : '')
        : 'no stop codon in frame ' + (frame + 1))
      + '\nGC3 ' + pct1(gc3 / total * 100) + '% · ' + Object.keys(counts).length + ' different codons used',
      'RSCU above 1 means the codon is used more often than a flat distribution within its family.'));
    ctx.addHtml(table('Codons in this sequence', ['Codon', 'AA', 'Count', 'Share in family', 'RSCU'],
      rows.slice(0, 40),
      rows.length > 40 ? 'Showing the 40 most used of ' + rows.length + ' codons.' : ''));
  });
""",
))


# ------------------------------------------------------------ 2. CpG islands
add(Spec(
    name="CpG Island Finder",
    slug="cpg-island-finder",
    summary=("A CpG island finder scans a sequence for windows that are GC-rich and CpG-dense against "
             "expectation. By the classic definition an island is 200 bp or more with GC ≥ 50% and "
             "observed over expected CpG ≥ 0.6."),
    fields=[
        txt("sequence", "Sequence", "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGCGCGCGCGGCCGCGGATCGCGATCGCCGCG",
            "Paste DNA; 200 bp or more gives a meaningful answer", 6),
        num("window", "Window", 200, "bp", "Gardiner-Garden uses 200 bp"),
        num("gc_min", "Minimum GC in the window", 50, "%", ""),
        num("oe_min", "Minimum observed/expected CpG", 0.6, "", "0.6 is the classical cut-off"),
        num("gc_pct", "GC content of the sequence", "", "%", "", output=True),
        num("cpg_obs", "CpG dinucleotides observed", "", "", "", output=True),
        num("cpg_oe", "Observed / expected CpG", "", "", "Below 0.6 suggests the CG has been methylated and lost", output=True),
        num("islands", "CpG islands found", "", "", "", output=True),
        num("longest", "Longest island", "", "bp", "", output=True),
    ],
    dirs=[],
    formula=("Expected CpG = (C count × G count) ÷ N.  Observed/expected = CpG observed ÷ expected.  "
             "An island needs GC ≥ 50%, O/E ≥ 0.6 across a window of 200 bp"),
    symbols=[("CpG", "a cytosine followed by a guanine on the same strand", "—"),
             ("O/E", "observed divided by expected CpG count", "—"),
             ("N", "number of bases examined", "bp")],
    bands=[("O/E > 1.0", "CpG-rich", "unusual outside promoters and repeats"),
           ("O/E 0.6 – 1.0", "Candidate island", "island criteria met if GC is also ≥ 50%"),
           ("O/E < 0.6", "Depleted", "the normal state of vertebrate DNA, where CpG is methylated "
            "and mutates to TpG")],
    notes=[
        "About 70–80% of human gene promoters sit in a CpG island, which is why a predicted island "
        "is used as a first pass at finding promoters in an unknown sequence.",
        "Vertebrate genomes are CpG-depleted overall (O/E near 0.25) because methylated cytosine "
        "deaminates to thymine. Islands stay unmethylated and therefore keep their CpGs.",
        "Methylation of an island silences the gene beneath it — the mechanism behind X inactivation "
        "and many tumour suppressors.",
    ],
    mistakes=[
        "Running the finder on a sequence shorter than the window: every window then fails and the "
        "answer looks like 'no islands' rather than 'sequence too short'.",
        "Treating a predicted island as a proven promoter — it is a hypothesis that needs a "
        "transcription start site or a ChIP signal.",
        "Forgetting that GC-rich repeats also score as islands.",
    ],
    faq=[
        ("What defines a CpG island?", "Historically 200 bp or more with GC ≥ 50% and observed over "
         "expected CpG ≥ 0.6. Modern genome annotations use slightly relaxed thresholds."),
        ("How many CpG islands does a human genome have?", "About 28 000, roughly one per gene, "
         "plus many in repeats."),
        ("Why is CpG depleted in vertebrates?", "Cytosine in a CpG is methylated, and methylcytosine "
         "deaminates to thymine, so CG slowly mutates away to TG."),
    ],
    related=[("/biology/gc-content-sequence", "GC content"),
             ("/biology/reverse-complement", "Reverse complement"),
             ("/biology/dna-molecular-weight-calculator", "DNA molecular weight")],
    svg=("bars", {"caption": "CpG observed / expected",
                  "series": [("CpG-depleted genome", 0.25), ("Island threshold", 0.6),
                             ("CpG island", 1.0)]}),
    icon="dna",
    keywords=["CpG island", "promoter", "methylation", "Gardiner-Garden"],
    script=JS_HELPERS + r"""
  function oecpg(s) {
    var n = s.length, c = 0, g = 0, cpg = 0;
    for (var i = 0; i < n; i++) {
      var ch = s.charAt(i);
      if (ch === 'C') { c++; if (s.charAt(i + 1) === 'G') cpg++; }
      else if (ch === 'G') g++;
    }
    return {n: n, c: c, g: g, cpg: cpg, oe: (c && g) ? cpg / ((c * g) / n) : 0};
  }
  omni.onResult(['sequence', 'window', 'gc_min', 'oe_min'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    var w = Math.max(20, Math.min(5000, Number(ctx.getRawInput('window')) || 200));
    var gcMin = Number(ctx.getRawInput('gc_min')); if (!isFinite(gcMin)) gcMin = 50;
    var oeMin = Number(ctx.getRawInput('oe_min')); if (!isFinite(oeMin)) oeMin = 0.6;

    if (seq.length < 20) {
      ctx.addHtml(block('CpG islands', '—', 'Paste at least a few hundred bases to scan.'));
      return;
    }
    var whole = oecpg(seq);
    ctx.exportValue('gc_pct', Math.round(gcOf(seq) / seq.length * 1000) / 10);
    ctx.exportValue('cpg_obs', whole.cpg);
    ctx.exportValue('cpg_oe', Math.round(whole.oe * 100) / 100);

    // slide a window, keep every window that passes, then merge overlaps
    var step = Math.max(1, Math.floor(seq.length / 4000));
    var hits = [];
    for (var i = 0; i + w <= seq.length; i += step) {
      var win = seq.substr(i, w);
      var gc = gcOf(win) / w * 100;
      if (gc < gcMin) continue;
      var o = oecpg(win);
      if (o.oe >= oeMin) hits.push({s: i, e: i + w, gc: gc, oe: o.oe});
    }
    var merged = [];
    hits.forEach(function (h) {
      var last = merged[merged.length - 1];
      if (last && h.s <= last.e) {
        last.e = Math.max(last.e, h.e);
        last.gc = Math.max(last.gc, h.gc);
        last.oe = Math.max(last.oe, h.oe);
      } else merged.push({s: h.s, e: h.e, gc: h.gc, oe: h.oe});
    });
    var longest = 0;
    merged.forEach(function (m) { longest = Math.max(longest, m.e - m.s); });
    ctx.exportValue('islands', merged.length);
    ctx.exportValue('longest', longest);

    if (!merged.length) {
      ctx.addHtml(block('CpG islands', 'No island found',
        'GC ' + pct1(gcOf(seq) / seq.length * 100) + '% over ' + seq.length + ' bp · O/E '
        + pct2(whole.oe) + '. Lower the thresholds if you expect a weak island, or paste a longer '
        + 'region — a window of ' + w + ' bp needs at least that much sequence.'));
      return;
    }
    ctx.addHtml(table('Islands found',
      ['From', 'To', 'Length', 'GC', 'CpG O/E', 'Sequence'],
      merged.map(function (m) {
        var sub = seq.substring(m.s, m.e);
        return [(m.s + 1) + ' bp', m.e + ' bp', (m.e - m.s) + ' bp', pct1(m.gc) + '%',
                m.oe.toFixed(2), sub.length > 40 ? sub.slice(0, 37) + '…' : sub];
      }),
      'Coordinates are 1-based on the pasted sequence. ' + merged.length + ' island'
      + (merged.length > 1 ? 's' : '') + ', longest ' + longest + ' bp.'));
  });
""",
))


# --------------------------------------------------------- 3. pattern finder
add(Spec(
    name="DNA Pattern Finder",
    slug="dna-pattern-finder",
    summary=("Search a DNA sequence for a motif written in IUPAC code and get every position on both "
             "strands. It is the quickest way to count a regulatory element or check whether a cloning "
             "site is unique."),
    fields=[
        txt("sequence", "Sequence", "TTTGAATTCTTGGATCCAAGCTTAAAGAATTCAAGCTTGATATCGAATTCCCC",
            "Paste DNA; headers, spaces and digits are ignored", 5),
        txt("pattern", "Pattern (IUPAC allowed)", "GAATTC",
            "N = any base, R = A/G, Y = C/T, W = A/T, S = G/C, K = G/T, M = A/C", 2),
        sel("strand", "Strand", [("Both strands", "both"), ("Forward only", "forward")], "both"),
        num("matches_fwd", "Matches, forward strand", "", "", "", output=True),
        num("matches_rev", "Matches, reverse strand", "", "", "", output=True),
        num("total", "Total sites", "", "", "", output=True),
        num("spacing", "Average spacing", "", "bp", "Blank when there is only one site", output=True),
    ],
    dirs=[],
    formula=("A pattern of length k has N − k + 1 possible start positions.  "
             "Each IUPAC letter is expanded to the set of bases it stands for"),
    symbols=[("N", "sequence length", "bp"), ("k", "pattern length", "bp"),
             ("IUPAC", "the standard degenerate base alphabet", "—")],
    bands=[("1 site", "Unique", "usable as a single-cutter cloning site"),
           ("2 – 5 sites", "A few", "check fragment sizes before digesting"),
           ("more than 5", "Frequent", "poor choice for a unique site")],
    notes=[
        "Positions are 1-based and count from the first base of the pasted sequence, on the strand "
        "as written. Reverse-strand hits are reported at the position of the equivalent forward "
        "site so the two lists line up.",
        "Palindromic patterns (GAATTC, most type II restriction sites) match both strands at the "
        "same coordinates and are therefore counted once, not twice.",
        "Overlapping matches are counted, which matters for repeats such as ATATAT.",
    ],
    mistakes=[
        "Forgetting that a reverse-strand hit means the motif is on the other strand — the protein "
        "or enzyme still binds there.",
        "Typing a pattern with a space or a digit in it; both are stripped, which can silently "
        "change the motif.",
        "Assuming a unique site is unique in the whole plasmid when only an insert was pasted.",
    ],
    faq=[
        ("What does N mean in a DNA pattern?", "Any base. It is the IUPAC wildcard, so NNNN finds "
         "any four bases."),
        ("How do I find a restriction site?", "Type the recognition sequence, e.g. GAATTC for EcoRI "
         "or AAGCTT for HindIII, and search both strands."),
        ("Does the search handle overlapping matches?", "Yes — ATATAT contains ATATAT twice in an "
         "ATATATAT run, and both are reported."),
    ],
    related=[("/biology/reverse-complement", "Reverse complement"),
             ("/biology/gc-content-sequence", "GC content"),
             ("/biology/codon-usage-calculator", "Codon usage")],
    svg=("bars", {"caption": "Start positions a pattern can have",
                  "series": [("Sequence length N", 100), ("Pattern length k", 6),
                             ("Positions N−k+1", 95)]}),
    icon="dna",
    keywords=["pattern finder", "motif search", "restriction site", "IUPAC"],
    script=JS_HELPERS + r"""
  var IUPAC = {A:'A', C:'C', G:'G', T:'T', U:'T', R:'[AG]', Y:'[CT]', S:'[GC]', W:'[AT]',
               K:'[GT]', M:'[AC]', B:'[CGT]', D:'[AGT]', H:'[ACT]', V:'[ACG]', N:'[ACGT]'};
  function patternToRegex(p) {
    var out = '';
    for (var i = 0; i < p.length; i++) {
      var c = p.charAt(i);
      if (!IUPAC[c]) return null;
      out += IUPAC[c];
    }
    return out;
  }
  function findAll(hay, re) {
    var g = new RegExp(re, 'g'), hits = [], m;
    while ((m = g.exec(hay)) !== null) {
      hits.push(m.index + 1);
      if (m.index === g.lastIndex) g.lastIndex++;
      if (hits.length > 5000) break;
    }
    return hits;
  }
  omni.onResult(['sequence', 'pattern', 'strand'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    var raw = String(ctx.getRawInput('pattern') || '').replace(/[^A-Za-z]/g, '').toUpperCase()
      .replace(/U/g, 'T');
    if (!seq) {
      ctx.addHtml(block('Pattern search', '—', 'Paste a sequence to search.'));
      return;
    }
    if (!raw) {
      ctx.addHtml(block('Pattern search', '—', 'Type the motif to look for, for example GAATTC.'));
      return;
    }
    var re = patternToRegex(raw);
    if (!re) {
      ctx.addHtml(block('Pattern search', 'Not a valid pattern',
        'Use only A, C, G, T and the IUPAC codes R Y S W K M B D H V N.'));
      return;
    }
    var fwd = findAll(seq, re);
    var rev = [];
    if (!/forward-only/i.test(String(ctx.getRawInput('strand') || ''))) {
      var rc = revcomp(seq);
      findAll(rc, re).forEach(function (p) {
        var start = seq.length - (p - 1) - raw.length + 1;
        if (fwd.indexOf(start) < 0) rev.push(start);
      });
    }
    var all = fwd.concat(rev).sort(function (a, b) { return a - b; });
    ctx.exportValue('matches_fwd', fwd.length);
    ctx.exportValue('matches_rev', rev.length);
    ctx.exportValue('total', all.length);
    if (all.length > 1 && all[all.length - 1] > all[0]) {
      ctx.exportValue('spacing', Math.round((all[all.length - 1] - all[0]) / (all.length - 1)));
    } else {
      ctx.exportValue('spacing', '');
    }

    ctx.addHtml(block('Pattern found',
      all.length + ' site' + (all.length === 1 ? '' : 's') + ' for ' + raw
      + (rev.length ? ' (' + fwd.length + ' forward, ' + rev.length + ' reverse)' : '')
      + ' in ' + seq.length + ' bp\n'
      + (all.length ? 'Positions: ' + all.slice(0, 60).join(', ') + (all.length > 60 ? ' …' : '') : '—'),
      all.length ? 'Positions are 1-based on the forward strand.' : 'No site found.'));
    if (all.length) {
      var rows = all.slice(0, 30).map(function (p) {
        var ctxs = seq.substr(Math.max(0, p - 6), raw.length + 10);
        return [String(p), p + raw.length - 1 > seq.length ? '—' : String(p + raw.length - 1),
                (fwd.indexOf(p) >= 0 ? 'forward' : 'reverse'), ctxs];
      });
      ctx.addHtml(table('First sites', ['Start', 'End', 'Strand', 'Context ±5 bp'], rows));
    }
  });
""",
))


# ------------------------------------------------------- 4. DNA molecular weight
add(Spec(
    name="DNA Molecular Weight Calculator",
    slug="dna-molecular-weight-calculator",
    summary=("Molecular weight of a DNA molecule, single- or double-stranded, from its base "
             "composition. It is what you need to convert a mass in nanograms into picomoles for a "
             "ligation, and to work out how much of a PCR product is in a band on a gel."),
    fields=[
        txt("sequence", "Sequence", "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG",
            "Paste one strand; the other is assumed to be its exact complement", 5),
        sel("strands", "Molecule", [("Double-stranded DNA", "ds"), ("Single-stranded DNA", "ss"),
                                    ("Single-stranded RNA", "rna")], "ds"),
        num("length", "Length", "", "nt", "", output=True),
        num("gc_pct", "GC content", "", "%", "", output=True),
        num("mw_ss", "Molecular weight, one strand", "", "Da", "", output=True),
        num("mw", "Molecular weight of the molecule", "", "Da", "", output=True),
        num("mw_kda", "Molecular weight", "", "kDa", "", output=True),
        num("pmol_per_ug", "Amount in 1 µg", "", "pmol", "Handy for setting up a ligation", output=True),
    ],
    dirs=[],
    formula=("ssDNA = 313.21·A + 304.20·T + 289.18·C + 329.21·G − 61.96  (Da).  "
             "dsDNA = 2 × ssDNA.  pmol per µg = 10⁶ ÷ MW"),
    symbols=[("A, T, C, G", "counts of each base", "bases"),
             ("MW", "molecular weight", "g/mol = Da"),
             ("Da", "dalton, one atomic mass unit", "—")],
    bands=[("under 50 bp", "Oligonucleotide", "order by scale, not by mass"),
           ("100 – 3 000 bp", "Typical PCR product", "a 1 kb dsDNA is about 660 kDa"),
           ("above 10 000 bp", "Plasmid or genomic fragment", "handle shear-sensitive")],
    notes=[
        "A base pair of double-stranded DNA weighs about 618–660 Da depending on GC content; the "
        "often quoted 660 Da per bp is the average over equal base frequencies.",
        "Pairing does not consume mass: a duplex weighs the sum of its two strands. Because the "
        "complement has the same composition as the strand you pasted, the duplex is exactly twice "
        "the single strand.",
        "RNA uses uracil, which is 306.17 Da, so an RNA strand of the same sequence weighs slightly "
        "more than the equivalent DNA.",
        "The figure here is the free-acid mass, summed from the exact residue masses (about 618 Da "
        "per base pair at 50% GC). The rounded 660 Da per base pair used for quick bench arithmetic "
        "is the sodium salt, which adds a sodium counterion for every phosphate — that is why the "
        "µg-to-pmol converter, which uses 660, returns about 7% fewer picomoles per microgram.",
    ],
    mistakes=[
        "Reporting the duplex mass for a single-stranded oligo, which doubles the number.",
        "Using the 660 Da/bp shortcut for a GC-rich molecule; at 70% GC, a base pair is closer to "
        "640 Da.",
        "Forgetting that a 5′ modification (biotin, phosphate, a fluorophore) adds its own mass.",
    ],
    faq=[
        ("How much does a 1 kb DNA fragment weigh?", "About 660 kDa double-stranded, roughly "
         "1.1 × 10⁻¹⁸ g per molecule."),
        ("How many pmol are in 100 ng of a 500 bp dsDNA?", "100 ng ÷ 330 000 g/mol = 3 × 10⁻¹³ mol ≈ "
         "0.30 pmol."),
        ("Does the calculator handle RNA?", "Yes — choose RNA and uracil is counted at its own "
         "residue mass."),
    ],
    related=[("/biology/dsdna-ug-to-pmol", "dsDNA µg to pmol"),
             ("/biology/oligo-tm-calculator", "Oligo Tm"),
             ("/biology/gc-content-sequence", "GC content")],
    svg=("bars", {"caption": "Residue mass of each base (Da)",
                  "series": [("A", 313), ("T", 304), ("C", 289), ("G", 329)]}),
    icon="dna",
    keywords=["DNA molecular weight", "molar mass", "pmol per microgram", "dalton"],
    script=JS_HELPERS + r"""
  omni.onResult(['sequence', 'strands'], function (ctx) {
    // A select hands back the option's slug ("single-stranded-rna"), not its
    // value, so the kind is matched on words rather than compared to a code.
    var pick = String(ctx.getRawInput('strands') || '');
    var kind = /rna/i.test(pick) ? 'rna' : /single/i.test(pick) ? 'ss' : 'ds';
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    if (kind === 'rna') seq = seq.replace(/T/g, 'U');
    if (!seq) {
      ctx.addHtml(block('Molecular weight', '—', 'Paste a sequence to weigh it.'));
      return;
    }
    var n = seq.length, c = {A: 0, T: 0, G: 0, C: 0, U: 0};
    for (var i = 0; i < n; i++) {
      var ch = seq.charAt(i);
      if (c.hasOwnProperty(ch)) c[ch]++;
    }
    var mass = 313.21 * c.A + 304.20 * c.T + 289.18 * c.C + 329.21 * c.G;
    if (kind === 'rna') mass += 306.17 * c.U;
    var ss = mass - 61.96;
    var total = kind === 'ss' || kind === 'rna' ? ss : 2 * ss;
    var gc = c.G + c.C;
    var pctGC = n ? gc / n * 100 : 0;

    ctx.exportValue('length', n);
    ctx.exportValue('gc_pct', Math.round(pctGC * 100) / 100);
    ctx.exportValue('mw_ss', Math.round(ss));
    ctx.exportValue('mw', Math.round(total));
    ctx.exportValue('mw_kda', Math.round(total / 1000 * 10) / 10);
    ctx.exportValue('pmol_per_ug', Math.round(1e6 / total * 1000) / 1000);

    ctx.addHtml(block('Mass',
      n + (kind === 'rna' ? ' nt RNA' : kind === 'ss' ? ' nt ssDNA' : ' bp dsDNA')
      + '\nOne strand: ' + (Math.round(ss)).toLocaleString() + ' Da'
      + '\nMolecule: ' + (Math.round(total)).toLocaleString() + ' Da = '
      + (total / 1000).toFixed(1) + ' kDa'
      + '\n1 µg = ' + (1e6 / total).toFixed(3) + ' pmol · 1 pmol = '
      + (total / 1e6).toFixed(4) + ' µg'
      + '\nMass per ' + (kind === 'rna' ? 'base' : 'base pair') + ': '
      + (total / n).toFixed(1) + ' Da',
      kind === 'ds' ? 'Double-stranded mass assumes the complement has the same composition.'
                    : ''));
    ctx.addHtml(table('Composition', ['Base', 'Count', 'Share', 'Residue mass (Da)'],
      [['A', String(c.A), pct1(n ? c.A / n * 100 : 0) + '%', '313.21'],
       ['T', String(c.T), pct1(n ? c.T / n * 100 : 0) + '%', '304.20'],
       ['C', String(c.C), pct1(n ? c.C / n * 100 : 0) + '%', '289.18'],
       ['G', String(c.G), pct1(n ? c.G / n * 100 : 0) + '%', '329.21'],
       ['U', String(c.U), pct1(n ? c.U / n * 100 : 0) + '%', '306.17']],
      'GC content ' + pct2(pctGC) + '%. Residue masses are for the nucleotide monophosphate '
      + 'in a chain, with one water subtracted per strand.'));
  });
""",
))


# --------------------------------------------------------- 5. reverse translate
add(Spec(
    name="Reverse Translate Calculator",
    slug="reverse-translate",
    summary=("Reverse translation turns a protein sequence back into a DNA sequence that would "
             "encode it. Every amino acid except methionine and tryptophan has several codons, so "
             "there is no single right answer — this tool offers the codons a host actually uses, "
             "the GC-balanced choice, and the rare-codon-avoiding choice."),
    fields=[
        txt("protein", "Protein sequence", "MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQV",
            "Single-letter code; spaces, digits and FASTA headers are ignored", 5),
        sel("strategy", "Codon choice",
            [("E. coli, most used codon", "ecoli"), ("Human, most used codon", "human"),
             ("GC-balanced (50%)", "gc"), ("Avoid rare codons (GC-rich hosts)", "gchost")], "ecoli"),
        sel("tail", "Add a stop codon", [("Yes", "yes"), ("No", "no")], "yes"),
        num("length_aa", "Protein length", "", "aa", "", output=True),
        num("length", "DNA length", "", "nt", "", output=True),
        num("gc_pct", "GC content of the DNA", "", "%", "", output=True),
        num("codons", "Codons", "", "", "Includes the stop codon when one is added", output=True),
        num("tm", "Melting temperature of the duplex", "", "°C", "At 50 mM monovalent salt", output=True),
    ],
    dirs=[],
    formula=("Each residue is replaced by a codon from the host's preferred set; "
             "DNA length = 3 × (residues + stop).  GC% = (G + C) ÷ length × 100"),
    symbols=[("aa", "amino acid residue", "—"),
             ("nt", "nucleotide", "—"),
             ("codon", "three bases that specify one residue", "—")],
    bands=[("rare codons kept", "Risk of poor expression", "especially clusters near the 5′ end"),
           ("GC 40 – 60%", "Comfortable range", "synthesis and PCR both behave well"),
           ("GC above 70%", "Hard to synthesise", "secondary structure and mispriming become likely")],
    notes=[
        "A back-translated sequence is a design proposal, not a recovered gene. Silent codons are "
        "lost forever when you translate forward, so the original DNA cannot be reconstructed.",
        "The most-used codon is not always the best choice: runs of the same rare tRNA demand, "
        "strong secondary structure at the ribosome binding site, and hidden restriction sites all "
        "matter. Treat the output as a starting point for codon optimisation.",
        "GC-balanced output is the safest default when the DNA will be chemically synthesised, "
        "because synthesis fails most often on extreme GC.",
    ],
    mistakes=[
        "Assuming the reverse-translated sequence will match the original gene — it will not.",
        "Ignoring the host: a codon set chosen for E. coli can be poor for Pichia or CHO.",
        "Forgetting the stop codon, which truncates translation if it is missing in an expression "
        "construct.",
    ],
    faq=[
        ("Can I recover the original DNA from a protein?", "No. Most amino acids map to several "
         "codons and that information is lost in translation; you can only propose a new sequence."),
        ("Which codon table should I use?", "The host you will express in. E. coli for bacterial "
         "work, human for mammalian cells, GC-balanced if the sequence is being synthesised."),
        ("Why does the tool avoid rare codons?", "Clusters of rare codons deplete the matching tRNA "
         "and stall the ribosome, which lowers yield and can cause truncation."),
    ],
    related=[("/biology/codon-usage-calculator", "Codon usage"),
             ("/biology/dna-to-protein", "DNA to protein"),
             ("/biology/gc-content-sequence", "GC content")],
    svg=("bars", {"caption": "Codons a residue can use",
                  "series": [("Met", 1), ("Trp", 1), ("Ala", 4), ("Leu", 6)]}),
    icon="dna",
    keywords=["reverse translate", "back translation", "codon optimisation"],
    script=JS_HELPERS + r"""
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
""",
))


# --------------------------------------------------------------- 6. shuffler
add(Spec(
    name="DNA Sequence Shuffler",
    slug="sequence-shuffler",
    summary=("Shuffling preserves the exact composition of a sequence — every base, or every "
             "dinucleotide — while destroying its order. It is how you build the null model that "
             "tells you whether a motif count, a repeat or a codon bias is more than chance."),
    fields=[
        txt("sequence", "Sequence", "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTT",
            "Paste DNA or protein; headers, spaces and digits are ignored", 5),
        sel("mode", "Shuffle by", [("Single bases", "mono"), ("Dinucleotides", "di")], "mono",
            "Dinucleotide shuffling keeps the same pairs, so dinucleotide biases survive"),
        sel("type", "Molecule", [("DNA", "dna"), ("Protein", "protein")], "dna"),
        num("seed", "Random seed", 42, "", "Same seed, same result — useful for reproducible nulls"),
        num("length", "Length", "", "", "", output=True),
        num("gc_pct", "GC content", "", "%", "Unchanged by mononucleotide shuffling", output=True),
        num("changes", "Positions changed", "", "", "", output=True),
        num("hamming", "Difference from the input", "", "%", "", output=True),
    ],
    dirs=[],
    formula=("Shuffled sequence has the same base counts: A₁ = A₀, C₁ = C₀, G₁ = G₀, T₁ = T₀.  "
             "Dinucleotide shuffling also preserves every dinucleotide count"),
    symbols=[("A₀, C₀, G₀, T₀", "base counts in the input", "bases"),
             ("A₁ … T₁", "base counts in the output; identical", "bases"),
             ("seed", "starting value of the pseudo-random generator", "—")],
    bands=[("0% changed", "Identical", "a very short or single-base sequence cannot be shuffled"),
           ("30 – 70% changed", "Well shuffled", "what a random permutation normally looks like"),
           ("100% changed", "Fully displaced", "possible for short sequences, unlikely for long ones")],
    notes=[
        "A mononucleotide shuffle preserves base composition but not dinucleotide composition, so "
        "it is the right null for asking whether a motif is over-represented.",
        "For CpG or oligo-frequency questions the dinucleotide shuffle is stricter and is the "
        "better null, because it keeps the sequence's dinucleotide bias intact.",
        "Reproducibility matters: report the seed alongside the shuffled sequence, otherwise nobody "
        "can regenerate the control you used.",
    ],
    mistakes=[
        "Shuffling to test a property the shuffle preserves — GC content cannot be tested this way, "
        "because it is fixed by construction.",
        "Using one shuffle as a null; a proper test needs hundreds and a distribution.",
        "Forgetting that a dinucleotide shuffle reproduces mononucleotide composition only "
        "approximately for very short sequences.",
    ],
    faq=[
        ("What does sequence shuffling test?", "Whether an observed pattern — a motif count, a "
         "repeat, a codon bias — is more than the composition alone would produce."),
        ("Why preserve dinucleotides?", "Because genomes have strong dinucleotide biases, notably "
         "CpG depletion. A mononucleotide shuffle destroys that and inflates significance."),
        ("Is the output random?", "Pseudo-random from the seed. The same seed always gives the same "
         "sequence, which is what you want in a methods section."),
    ],
    related=[("/biology/cpg-island-finder", "CpG islands"),
             ("/biology/gc-content-sequence", "GC content"),
             ("/biology/reverse-complement", "Reverse complement")],
    svg=("bars", {"caption": "A shuffle keeps the base counts",
                  "series": [("Input GC%", 49), ("Shuffled GC%", 49)]}),
    icon="dna",
    keywords=["sequence shuffle", "null model", "mononucleotide", "dinucleotide"],
    script=JS_HELPERS + r"""
  function mulberry32(a) {
    return function () {
      a |= 0; a = a + 0x6D2B79F5 | 0;
      var t = Math.imul(a ^ a >>> 15, 1 | a);
      t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t;
      return ((t ^ t >>> 14) >>> 0) / 4294967296;
    };
  }
  function shuffleMono(s, rnd) {
    var a = s.split('');
    for (var i = a.length - 1; i > 0; i--) {
      var j = Math.floor(rnd() * (i + 1));
      var t = a[i]; a[i] = a[j]; a[j] = t;
    }
    return a.join('');
  }
  function shuffleDi(s, rnd) {
    // Altschul-Erikson style: repeatedly pick a random dinucleotide and swap its
    // two occurrences of the second base. Keeps every dinucleotide count intact.
    if (s.length < 4) return shuffleMono(s, rnd);
    var a = s.split('');
    var tries = Math.max(50, a.length * 12);
    for (var k = 0; k < tries; k++) {
      var i = Math.floor(rnd() * (a.length - 1));
      var j = Math.floor(rnd() * (a.length - 1));
      if (i === j) continue;
      var b = a[i + 1], c = a[j + 1];
      if (a[i] === a[j] || b === c) continue;
      a[i + 1] = c; a[j + 1] = b;
    }
    return a.join('');
  }
  omni.onResult(['sequence', 'mode', 'type', 'seed'], function (ctx) {
    var kind = /protein/i.test(String(ctx.getRawInput('type') || '')) ? 'protein' : 'dna';
    var seq = cleanSeq(ctx.getRawInput('sequence'), kind);
    if (!seq) {
      ctx.addHtml(block('Shuffled sequence', '—', 'Paste a sequence to shuffle.'));
      return;
    }
    var seed = Number(ctx.getRawInput('seed'));
    if (!isFinite(seed)) seed = 42;
    var rnd = mulberry32(Math.floor(seed) || 1);
    var mode = /dinucleotide/i.test(String(ctx.getRawInput('mode') || '')) ? 'di' : 'mono';
    var out = seq.length < 2 ? seq : (mode === 'di' ? shuffleDi(seq, rnd) : shuffleMono(seq, rnd));

    var changed = 0;
    for (var i = 0; i < seq.length; i++) if (seq.charAt(i) !== out.charAt(i)) changed++;
    var pctChanged = seq.length ? changed / seq.length * 100 : 0;
    var gc = kind === 'dna' ? gcOf(out) : 0;
    var pctGC = kind === 'dna' && out.length ? gc / out.length * 100 : 0;

    ctx.exportValue('length', out.length);
    if (kind === 'dna') ctx.exportValue('gc_pct', Math.round(pctGC * 100) / 100);
    ctx.exportValue('changes', changed);
    ctx.exportValue('hamming', Math.round(pctChanged * 10) / 10);

    ctx.addHtml(block('Shuffled ' + (kind === 'dna' ? 'DNA' : 'protein') + ' ('
      + (mode === 'di' ? 'dinucleotide' : 'mononucleotide') + ' preserving, seed ' + seed + ')',
      wrap(out, 60),
      out.length + ' residues · ' + changed + ' positions changed ('
      + pct1(pctChanged) + '%)'
      + (kind === 'dna' ? ' · GC ' + pct1(pctGC) + '%, identical to the input' : '')));
    if (seq.length < 4) {
      ctx.addHtml(block('Too short to shuffle',
        'A sequence of ' + seq.length + ' residue' + (seq.length === 1 ? '' : 's')
        + ' has only one possible arrangement.'));
    }
  });
""",
))


# ------------------------------------------------------- 7. PCR primer stats
add(Spec(
    name="PCR Primer Stats Calculator",
    slug="pcr-primer-stats",
    summary=("A primer pair is worth checking on eight counts before you order it. A pair that differs by "
             "more than 5 °C, or that can dimerise at its 3′ end, will amplify badly no matter how good "
             "the polymerase is."),
    fields=[
        txt("forward", "Forward primer (5′→3′)", "ATGGCCATTGTAATGGGCCG", "Paste the primer", 2),
        txt("reverse", "Reverse primer (5′→3′)", "CTATCGGGCACCCTTTCAG", "Paste the primer as ordered", 2),
        num("fwd_len", "Forward length", "", "nt", "", output=True),
        num("fwd_gc", "Forward GC", "", "%", "", output=True),
        num("fwd_tm", "Forward Tm", "", "°C", "Wallace under 14 nt, GC rule to 40 nt, then the long form", output=True),
        num("rev_len", "Reverse length", "", "nt", "", output=True),
        num("rev_gc", "Reverse GC", "", "%", "", output=True),
        num("rev_tm", "Reverse Tm", "", "°C", "", output=True),
        num("ta", "Suggested annealing temperature", "", "°C", "About the lower primer Tm minus 5", output=True),
        num("dtm", "Difference in Tm", "", "°C", "Under 5 °C is the usual target", output=True),
        num("dimer", "Longest 3′ complementary run", "", "bases", "3 or more risks primer dimers", output=True),
    ],
    dirs=[],
    formula=("Tm = 2(A+T) + 4(G+C) up to 14 nt;  64.9 + 41(G+C − 16.4)/N from 15 to 40 nt;  "
             "81.5 + 16.6·log₁₀[Na⁺] + 0.41(GC%) − 675/N above 40 nt.  Ta ≈ Tm(lower) − 5"),
    symbols=[("Tm", "melting temperature of the primer-template duplex", "°C"),
             ("Ta", "annealing temperature for the PCR programme", "°C"),
             ("GC clamp", "a G or C at the 3′ end", "—")],
    bands=[("18 – 22 nt", "Ideal length", "specific and cheap to synthesise"),
           ("40 – 60%", "Ideal GC", "balanced stability"),
           ("difference over 5 °C", "Mismatched pair", "the cooler primer sets the annealing temperature"),
           ("3′ run of 4+", "Dimer risk", "primers will amplify each other instead of the target")],
    notes=[
        "The annealing temperature is set by the less stable primer, so a big Tm difference wastes "
        "the better one. Aim for a pair within 2–5 °C.",
        "Complementarity at the 3′ end is the dangerous kind: a polymerase will extend from it, so "
        "even two or three paired bases there produce primer dimers.",
        "These Tm values are length-banded approximations. For a critical assay use a nearest-neighbour "
        "calculation with your real salt and primer concentrations.",
    ],
    mistakes=[
        "Entering the reverse primer as it appears in the template rather than as it is ordered "
        "(the order is the reverse complement).",
        "Choosing a primer with a 3′ T — it is a poor clamp and misprimes more often.",
        "Running all 40 cycles at the Tm of the higher primer, which lets the lower one misprime.",
    ],
    faq=[
        ("What is a good Tm difference for a primer pair?", "Under 5 °C, ideally 2–3 °C."),
        ("How long should a primer be?", "18–22 nt for routine PCR; longer for high GC or for "
         "adding restriction tails."),
        ("Why is my primer dimerising?", "Complementary 3′ ends, or a long self-complementary run. "
         "Check the 3′ complementary run in the table above."),
    ],
    related=[("/biology/oligo-tm-calculator", "Oligo Tm"),
             ("/biology/reverse-complement", "Reverse complement"),
             ("/biology/gc-content-sequence", "GC content")],
    svg=("bars", {"caption": "Melting temperature by primer length (°C)",
                  "series": [("14 nt, Wallace", 40), ("20 nt, GC rule", 48),
                             ("39 nt, long form", 71)]}),
    icon="dna",
    keywords=["primer Tm", "PCR primer", "annealing temperature", "primer dimer"],
    script=JS_HELPERS + r"""
  function primerStats(p) {
    var n = p.length, gc = gcOf(p), at = n - gc;
    return {n: n, gc: gc, pct: n ? gc / n * 100 : 0, tm: n ? tmOf(n, n ? gc / n * 100 : 0, at, gc) : 0,
            clamp: /[GC]$/.test(p)};
  }
  function maxComplementaryRun(a, b) {
    // Longest stretch where a[i..] pairs with the reverse of b[..]. The search is
    // quadratic, so it is capped: nothing legitimate is longer than an oligo, and
    // an uncapped loop lets a pasted 20 kb sequence freeze the page.
    a = a.slice(0, 80); b = b.slice(0, 80);
    var best = 0;
    for (var i = 0; i < a.length; i++) {
      for (var j = 0; j < b.length; j++) {
        var k = 0;
        while (i + k < a.length && j - k >= 0 && (COMP[a.charAt(i + k)] === b.charAt(j - k))) k++;
        if (k > best) best = k;
      }
    }
    return best;
  }
  function tailRun(a, b) {
    // longest run that involves the 3' end of either primer
    var best = 0;
    for (var k = 1; k <= Math.min(a.length, b.length); k++) {
      if (COMP[a.charAt(a.length - 1 - (k - 1))] === b.charAt(b.length - k)) best = k; else break;
    }
    var best2 = 0;
    for (var k2 = 1; k2 <= Math.min(a.length, b.length); k2++) {
      if (COMP[b.charAt(b.length - 1 - (k2 - 1))] === a.charAt(a.length - k2)) best2 = k2; else break;
    }
    return Math.max(best, best2);
  }
  function longestHomopolymer(s) {
    var best = 1, run = 1;
    for (var i = 1; i < s.length; i++) {
      if (s.charAt(i) === s.charAt(i - 1)) { run++; if (run > best) best = run; } else run = 1;
    }
    return s.length ? best : 0;
  }
  omni.onResult(['forward', 'reverse'], function (ctx) {
    var f = cleanSeq(ctx.getRawInput('forward'), 'dna');
    var r = cleanSeq(ctx.getRawInput('reverse'), 'dna');
    var tooLong = (f.length > 200 || r.length > 200);
    if (f.length > 200) f = f.slice(0, 200);
    if (r.length > 200) r = r.slice(0, 200);
    if (!f && !r) {
      ctx.addHtml(block('Primer stats', '—', 'Paste a forward or reverse primer, or both.'));
      return;
    }
    var sf = f ? primerStats(f) : null;
    var sr = r ? primerStats(r) : null;

    if (sf) {
      ctx.exportValue('fwd_len', sf.n);
      ctx.exportValue('fwd_gc', Math.round(sf.pct * 10) / 10);
      ctx.exportValue('fwd_tm', Math.round(sf.tm * 10) / 10);
    }
    if (sr) {
      ctx.exportValue('rev_len', sr.n);
      ctx.exportValue('rev_gc', Math.round(sr.pct * 10) / 10);
      ctx.exportValue('rev_tm', Math.round(sr.tm * 10) / 10);
    }
    if (sf && sr) {
      var lower = Math.min(sf.tm, sr.tm);
      var dtm = Math.abs(sf.tm - sr.tm);
      var dimer = Math.max(tailRun(f, r), tailRun(f, f), tailRun(r, r));
      ctx.exportValue('ta', Math.round((lower - 5) * 10) / 10);
      ctx.exportValue('dtm', Math.round(dtm * 10) / 10);
      ctx.exportValue('dimer', dimer);
    }

    var rows = [];
    if (sf) rows.push(['Forward', f, String(sf.n), pct1(sf.pct) + '%', pct1(sf.tm),
                       sf.clamp ? 'yes' : 'no', String(longestHomopolymer(f)),
                       String(maxComplementaryRun(f, f))]);
    if (sr) rows.push(['Reverse', r, String(sr.n), pct1(sr.pct) + '%', pct1(sr.tm),
                       sr.clamp ? 'yes' : 'no', String(longestHomopolymer(r)),
                       String(maxComplementaryRun(r, r))]);
    ctx.addHtml(table('Primer by primer',
      ['Primer', 'Sequence', 'Length', 'GC', 'Tm', 'GC clamp', 'Longest run', 'Self-complement'],
      rows, 'Tm uses the length-appropriate approximation at 50 mM Na⁺.'));

    if (tooLong) {
      ctx.addHtml(block('That is not a primer',
        'A primer longer than 200 nt is not something a synthesiser will make, so only the first '
        + '200 bases were analysed. Paste a single primer of 18–30 nt for a meaningful answer.'));
    }
    if (sf && sr) {
      var warn = [];
      if (Math.abs(sf.tm - sr.tm) > 5) warn.push('the two Tm values differ by more than 5 °C');
      if (tailRun(f, r) >= 3) warn.push('the 3′ ends can pair, which risks primer dimers');
      if (longestHomopolymer(f) >= 5 || longestHomopolymer(r) >= 5) warn.push('a homopolymer run of 5 or more invites slippage');
      if (Math.abs(f.length - r.length) > 6) warn.push('the primers are very different in length');
      ctx.addHtml(block('Pair check',
        'Annealing temperature about ' + pct1(Math.min(sf.tm, sr.tm) - 5) + ' °C'
        + '\nTm difference ' + pct1(Math.abs(sf.tm - sr.tm)) + ' °C'
        + '\n3′ complementary run ' + tailRun(f, r) + ' base' + (tailRun(f, r) === 1 ? '' : 's'),
        warn.length ? 'Watch: ' + warn.join('; ') + '.' : 'No obvious pairing or balance problems.'));
    }
  });
""",
))


# --------------------------------------------------------- 8. isoelectric point
add(Spec(
    name="Protein Isoelectric Point Calculator",
    slug="protein-isoelectric-point",
    summary=("A protein's isoelectric point is the pH at which its net charge is exactly zero. It is found "
             "by summing the charge of every ionisable residue at each trial pH and bisecting until the "
             "sum vanishes."),
    fields=[
        txt("protein", "Protein sequence", "MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQVKVKAL",
            "Single-letter code; headers, spaces and digits are ignored", 6),
        num("ph", "pH for the charge calculation", 7.0, "pH", "Net charge is reported at this pH"),
        num("pi", "Isoelectric point", "", "pH", "", output=True),
        num("charge", "Net charge at the given pH", "", "e", "", output=True),
        num("length", "Length", "", "aa", "", output=True),
        num("mw_kda", "Molecular weight", "", "kDa", "Average residue masses, no PTMs", output=True),
        num("acidic", "Acidic residues (D + E)", "", "", "", output=True),
        num("basic", "Basic residues (K + R + H)", "", "", "", output=True),
        num("gravy", "GRAVY (hydrophobicity)", "", "", "Positive means hydrophobic", output=True),
    ],
    dirs=[],
    formula=("Z(pH) = Σ (+) ÷ (1 + 10^(pH − pKa)) − Σ (−) ÷ (1 + 10^(pKa − pH)).  "
             "pI is the pH at which Z = 0, found by bisection between 0 and 14"),
    symbols=[("Z", "net charge in units of the elementary charge", "e"),
             ("pI", "isoelectric point", "pH"),
             ("pKa", "acid dissociation constant of each ionisable group", "—")],
    bands=[("pI below 5", "Acidic", "binds anion exchangers such as Q Sepharose"),
           ("pI 5 – 7.5", "Neutral", "poor solubility near its pI; buffer away from it"),
           ("pI above 7.5", "Basic", "binds cation exchangers such as SP Sepharose")],
    notes=[
        "Solubility is lowest at the pI because the protein has no net charge and molecules "
        "aggregate. Purification buffers are usually set one pH unit away from it.",
        "The pKa values used are the standard solution values (D 3.65, E 4.25, C 8.18, Y 10.07, "
        "H 6.0, K 10.53, R 12.48, N-terminus 8.2, C-terminus 3.65). Real pKa values shift in a "
        "folded protein, so a measured pI can differ by half a unit.",
        "Modifications are ignored: phosphorylation adds negative charges and moves the pI down, "
        "while a His-tag or a nuclear localisation signal moves it up.",
    ],
    mistakes=[
        "Assuming the calculated pI equals the value on an IEF gel — glycosylation and PTMs shift it.",
        "Running an ion-exchange step at the pI, where the protein has no charge to bind with.",
        "Forgetting that the N- and C-termini contribute, which matters for short peptides.",
    ],
    faq=[
        ("What is a typical protein pI?", "Most cytosolic proteins sit between 5 and 7; the human "
         "proteome averages around 6.5."),
        ("How is pI calculated?", "By finding the pH where the sum of positive and negative charges "
         "is zero, using the Henderson-Hasselbalch equation for every ionisable group."),
        ("Why is my measured pI different?", "Post-translational modification, bound ions, "
         "glycosylation and the local environment of each residue all shift the true value."),
    ],
    related=[("/biology/amino-acid-composition", "Amino acid composition"),
             ("/biology/dna-to-protein", "DNA to protein"),
             ("/biology/codon-usage-calculator", "Codon usage")],
    # The curve is the real titration of the default sequence, computed here with
    # the same pKa set the page uses — not a sketched line.
    svg=("curve", {"caption": "Net charge against pH for the example protein",
                  "samples": [(2, 11.91), (4, 8.48), (6, 4.58), (7, 4.04), (8, 3.60), (10, 1.18), (12, -4.79)],
                  "axis": ("pH", "net charge (e)"), "description": "charge curve"}),
    icon="protein",
    keywords=["isoelectric point", "pI", "protein charge", "IEF"],
    script=JS_HELPERS + r"""
  var PKA = {D: 3.65, E: 4.25, C: 8.18, Y: 10.07, H: 6.00, K: 10.53, R: 12.48,
             nterm: 8.20, cterm: 3.65};
  var MASS = {A: 89.09, R: 174.20, N: 132.12, D: 133.10, C: 121.16, E: 147.13, Q: 146.15,
              G: 75.07, H: 155.16, I: 131.17, L: 131.17, K: 146.19, M: 149.21, F: 165.19,
              P: 115.13, S: 105.09, T: 119.12, W: 204.23, Y: 181.19, V: 117.15};
  var HYDRO = {A: 1.8, R: -4.5, N: -3.5, D: -3.5, C: 2.5, E: -3.5, Q: -3.5, G: -0.4,
               H: -3.2, I: 4.5, L: 3.8, K: -3.9, M: 1.9, F: 2.8, P: -1.6, S: -0.8,
               T: -0.7, W: -0.9, Y: -1.3, V: 4.2};
  function netCharge(counts, n, ph) {
    var pos = counts.K / (1 + Math.pow(10, ph - PKA.K))
            + counts.R / (1 + Math.pow(10, ph - PKA.R))
            + counts.H / (1 + Math.pow(10, ph - PKA.H))
            + 1 / (1 + Math.pow(10, ph - PKA.nterm));
    var neg = counts.D / (1 + Math.pow(10, PKA.D - ph))
            + counts.E / (1 + Math.pow(10, PKA.E - ph))
            + counts.C / (1 + Math.pow(10, PKA.C - ph))
            + counts.Y / (1 + Math.pow(10, PKA.Y - ph))
            + 1 / (1 + Math.pow(10, PKA.cterm - ph));
    return pos - neg;
  }
  omni.onResult(['protein', 'ph'], function (ctx) {
    var p = String(ctx.getRawInput('protein') || '').replace(/^>.*$/gm, '')
      .replace(/[^A-Za-z*]/g, '').toUpperCase().replace(/\*/g, '');
    if (!p) {
      ctx.addHtml(block('Isoelectric point', '—', 'Paste a protein sequence.'));
      return;
    }
    var counts = {D: 0, E: 0, C: 0, Y: 0, H: 0, K: 0, R: 0};
    var mass = 0, hydro = 0, known = 0;
    for (var i = 0; i < p.length; i++) {
      var aa = p.charAt(i);
      if (counts.hasOwnProperty(aa)) counts[aa]++;
      if (MASS[aa]) { mass += MASS[aa]; hydro += HYDRO[aa]; known++; }
    }
    mass = mass - (known - 1) * 18.015 + 18.015;   // peptide bonds, plus terminal water
    var ph = Number(ctx.getRawInput('ph'));
    if (!isFinite(ph)) ph = 7;

    var lo = 0, hi = 14;
    for (var k = 0; k < 60; k++) {
      var mid = (lo + hi) / 2;
      if (netCharge(counts, p.length, mid) > 0) lo = mid; else hi = mid;
    }
    var pi = (lo + hi) / 2;
    var charge = netCharge(counts, p.length, ph);
    var gravy = known ? hydro / known : 0;

    ctx.exportValue('pi', Math.round(pi * 100) / 100);
    ctx.exportValue('charge', Math.round(charge * 100) / 100);
    ctx.exportValue('length', p.length);
    ctx.exportValue('mw_kda', Math.round(mass / 1000 * 100) / 100);
    ctx.exportValue('acidic', counts.D + counts.E);
    ctx.exportValue('basic', counts.K + counts.R + counts.H);
    ctx.exportValue('gravy', Math.round(gravy * 1000) / 1000);

    ctx.addHtml(block('Isoelectric point',
      'pI = ' + pi.toFixed(2) + '\nNet charge at pH ' + ph.toFixed(1) + ' = '
      + (charge >= 0 ? '+' : '') + charge.toFixed(2) + ' e'
      + '\nLength ' + p.length + ' aa · mass ' + (mass / 1000).toFixed(2) + ' kDa'
      + '\nGRAVY ' + gravy.toFixed(3) + ' (' + (gravy > 0 ? 'hydrophobic' : 'hydrophilic') + ')',
      'Calculated with solution pKa values; PTMs and bound ions are not included.'));
    ctx.addHtml(table('Ionisable groups', ['Group', 'pKa', 'Residues', 'State at pH ' + ph.toFixed(1)],
      [['Asp (D)', '3.65', String(counts.D), counts.D ? (ph > 3.65 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
       ['Glu (E)', '4.25', String(counts.E), counts.E ? (ph > 4.25 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
       ['Cys (C)', '8.18', String(counts.C), counts.C ? (ph > 8.18 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
       ['Tyr (Y)', '10.07', String(counts.Y), counts.Y ? (ph > 10.07 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
       ['His (H)', '6.00', String(counts.H), counts.H ? (ph < 6 ? 'protonated (+)' : 'neutral') : '—'],
       ['Lys (K)', '10.53', String(counts.K), counts.K ? (ph < 10.53 ? 'protonated (+)' : 'neutral') : '—'],
       ['Arg (R)', '12.48', String(counts.R), counts.R ? (ph < 12.48 ? 'protonated (+)' : 'neutral') : '—'],
       ['N-terminus', '8.20', '1', ph < 8.2 ? 'protonated (+)' : 'neutral'],
       ['C-terminus', '3.65', '1', ph > 3.65 ? 'deprotonated (−)' : 'neutral']]));
  });
""",
))


# --------------------------------------------------- 9. amino acid composition
add(Spec(
    name="Amino Acid Composition Calculator",
    slug="amino-acid-composition",
    summary=("Amino acid composition counts each residue in a protein and the share of the chain it makes "
             "up. From those counts it derives molecular weight, GRAVY hydrophobicity, aromatic content "
             "and the acidic-to-basic balance."),
    fields=[
        txt("protein", "Protein sequence", "MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQVKVKAL",
            "Single-letter code; headers, spaces and digits are ignored", 6),
        num("length", "Length", "", "aa", "", output=True),
        num("mw_kda", "Molecular weight", "", "kDa", "Average residue masses, no modifications", output=True),
        num("gravy", "GRAVY", "", "", "Positive means hydrophobic", output=True),
        num("aromatic", "Aromatic residues (F + W + Y)", "", "%", "", output=True),
        num("charge_balance", "Acidic minus basic residues", "", "", "Positive means acidic overall", output=True),
        num("cysteine", "Cysteines", "", "", "Pairs set the maximum number of disulfides", output=True),
    ],
    dirs=[],
    formula=("Molecular weight = Σ(residue masses) − (n − 1) × 18.015.  "
             "GRAVY = Σ(hydropathy × count) ÷ n.  Share of an amino acid = count ÷ n × 100"),
    symbols=[("n", "number of residues", "aa"),
             ("GRAVY", "grand average of hydropathicity (Kyte–Doolittle)", "—"),
             ("Da", "dalton", "—")],
    bands=[("GRAVY above 0.2", "Hydrophobic", "likely membrane-associated or a membrane domain"),
           ("GRAVY −0.2 to 0.2", "Mixed", "soluble globular proteins typically sit here"),
           ("GRAVY below −0.5", "Very hydrophilic", "highly soluble, often disordered")],
    notes=[
        "GRAVY is the mean Kyte–Doolittle hydropathy. A value above about 0.2 across a window of "
        "19–20 residues is the classic signal of a transmembrane helix.",
        "Cysteine count matters downstream: an even number can form disulfide bonds, and free "
        "cysteines cause aggregation in formulation.",
        "The mass here is the unmodified chain. Signal peptides are cleaved, glycosylation adds "
        "several kDa, and a His-tag adds about 0.8 kDa per histidine.",
    ],
    mistakes=[
        "Assuming an extinction coefficient from composition alone — Trp and Tyr are close, but "
        "disulfides also contribute at 280 nm.",
        "Comparing GRAVY of a full-length protein with that of its mature, processed form.",
        "Treating percent composition as conserved: it varies widely between unrelated proteins of "
        "the same size.",
    ],
    faq=[
        ("How do I calculate protein molecular weight from sequence?", "Add the average residue "
         "masses and subtract one water molecule per peptide bond."),
        ("What does a positive GRAVY mean?", "The protein is net hydrophobic — often a membrane "
         "protein or a hydrophobic domain."),
        ("Why does cysteine count matter?", "Two cysteines can form a disulfide bond; unpaired ones "
         "drive aggregation and need to be capped or removed."),
    ],
    related=[("/biology/protein-isoelectric-point", "Isoelectric point"),
             ("/biology/dna-to-protein", "DNA to protein"),
             ("/biology/codon-usage-calculator", "Codon usage")],
    svg=("bars", {"caption": "Kyte–Doolittle hydropathy, most and least hydrophobic",
                  "series": [("Ile", 4.5), ("Val", 4.2), ("Lys", -3.9), ("Arg", -4.5)]}),
    icon="protein",
    keywords=["amino acid composition", "protein molecular weight", "GRAVY"],
    script=JS_HELPERS + r"""
  var AA_MASS = {A: 89.09, R: 174.20, N: 132.12, D: 133.10, C: 121.16, E: 147.13, Q: 146.15,
                 G: 75.07, H: 155.16, I: 131.17, L: 131.17, K: 146.19, M: 149.21, F: 165.19,
                 P: 115.13, S: 105.09, T: 119.12, W: 204.23, Y: 181.19, V: 117.15};
  var AA_HYDRO = {A: 1.8, R: -4.5, N: -3.5, D: -3.5, C: 2.5, E: -3.5, Q: -3.5, G: -0.4,
                  H: -3.2, I: 4.5, L: 3.8, K: -3.9, M: 1.9, F: 2.8, P: -1.6, S: -0.8,
                  T: -0.7, W: -0.9, Y: -1.3, V: 4.2};
  var AA_NAME = {A: 'Ala', R: 'Arg', N: 'Asn', D: 'Asp', C: 'Cys', E: 'Glu', Q: 'Gln',
                 G: 'Gly', H: 'His', I: 'Ile', L: 'Leu', K: 'Lys', M: 'Met', F: 'Phe',
                 P: 'Pro', S: 'Ser', T: 'Thr', W: 'Trp', Y: 'Tyr', V: 'Val'};
  omni.onResult(['protein'], function (ctx) {
    var p = String(ctx.getRawInput('protein') || '').replace(/^>.*$/gm, '')
      .replace(/[^A-Za-z*]/g, '').toUpperCase().replace(/\*/g, '');
    if (!p) {
      ctx.addHtml(block('Amino acid composition', '—', 'Paste a protein sequence.'));
      return;
    }
    var counts = {}, known = 0, mass = 0, hydro = 0, unknown = 0;
    for (var i = 0; i < p.length; i++) {
      var aa = p.charAt(i);
      if (!AA_MASS[aa]) { unknown++; continue; }
      counts[aa] = (counts[aa] || 0) + 1;
      known++;
      mass += AA_MASS[aa];
      hydro += AA_HYDRO[aa];
    }
    if (!known) {
      ctx.addHtml(block('Amino acid composition', '—',
        'No amino acid codes found. Use the single-letter alphabet: ACDEFGHIKLMNPQRSTVWY.'));
      return;
    }
    mass = mass - (known - 1) * 18.015 + 18.015;
    var gravy = hydro / known;
    var aromatic = ((counts.F || 0) + (counts.W || 0) + (counts.Y || 0)) / known * 100;
    var acidic = (counts.D || 0) + (counts.E || 0);
    var basic = (counts.K || 0) + (counts.R || 0) + (counts.H || 0);

    ctx.exportValue('length', known);
    ctx.exportValue('mw_kda', Math.round(mass / 1000 * 100) / 100);
    ctx.exportValue('gravy', Math.round(gravy * 1000) / 1000);
    ctx.exportValue('aromatic', Math.round(aromatic * 100) / 100);
    ctx.exportValue('charge_balance', acidic - basic);
    ctx.exportValue('cysteine', counts.C || 0);

    var order = 'ACDEFGHIKLMNPQRSTVWY'.split('');
    var rows = order.filter(function (a) { return counts[a]; }).map(function (a) {
      return [a, AA_NAME[a], String(counts[a]),
              pct1(counts[a] / known * 100) + '%',
              (counts[a] * AA_MASS[a]).toFixed(0),
              ((counts[a] * AA_MASS[a]) / mass * 100).toFixed(1) + '%'];
    });
    ctx.addHtml(block('Summary',
      known + ' residues · ' + (mass / 1000).toFixed(2) + ' kDa\nGRAVY '
      + gravy.toFixed(3) + ' · aromatic ' + pct1(aromatic) + '% · acidic ' + acidic
      + ' / basic ' + basic
      + (unknown ? '\nIgnored ' + unknown + ' character' + (unknown === 1 ? '' : 's')
         + ' that are not amino acid codes' : ''),
      gravy > 0.2 ? 'Net hydrophobic: consider a membrane or buried domain.'
        : gravy < -0.5 ? 'Strongly hydrophilic: likely soluble and surface-exposed.'
        : 'Balanced hydropathy, typical of a soluble globular protein.'));
    ctx.addHtml(table('Composition', ['Code', 'Residue', 'Count', 'Share', 'Mass (Da)', 'Share of mass'],
      rows, 'Masses are average residue masses; the total subtracts one water per peptide bond.'));
  });
""",
))


# ------------------------------------------------------ 10. dsDNA µg to pmol
add(Spec(
    name="dsDNA µg to pmol Calculator",
    slug="dsdna-ug-to-pmol",
    summary=("Converting dsDNA from micrograms to picomoles needs the fragment length, nothing else. A "
             "ligation, a sequencing reaction and a self-made standard all ask for a molar amount, while "
             "the bench gives you nanograms on a spectrophotometer — this does the arithmetic both ways at "
             "the exact length of your fragment."),
    fields=[
        num("length", "Fragment length", 1000, "bp", "The length of the dsDNA molecule"),
        num("mass_ug", "Mass", 1, "µg", "Leave the other box blank to solve from it instead"),
        num("pmol", "Amount", "", "pmol", "", output=True),
        num("molecules", "Number of molecules", "", "", "", output=True),
        num("ng", "Mass", "", "ng", "", output=True),
    ],
    dirs=[
        d("Convert", "pmol", "mass_ug*1000000/(660*length)"),
        d("Convert", "mass_ug", "pmol*660*length/1000000"),
        d("Convert", "ng", "mass_ug*1000"),
        # written without exponent notation: the compile-time field scan would read "e23" as a field name
        d("Convert", "molecules", "mass_ug*912445569696970/length"),
    ],
    formula=("pmol = mass (µg) × 10⁶ ÷ (660 × length in bp).  "
             "Molecules = mass (g) ÷ (660 × length) × 6.022 × 10²³"),
    symbols=[("660", "average molar mass of one base pair", "g/mol"),
             ("N", "fragment length", "bp"),
             ("pmol", "picomole, 10⁻¹² mol", "mol")],
    bands=[("under 100 bp", "Oligo-like", "use the single-strand or oligo converters instead"),
           ("100 – 5 000 bp", "Typical fragment", "the 660 g/mol per bp average is accurate to a few percent"),
           ("above 10 000 bp", "Large molecule", "pipetting error dominates the conversion")],
    notes=[
        "660 g/mol per base pair is the sodium salt average at 50% GC. At 70% GC the true figure is "
        "closer to 640, a 3% difference that matters only for quantitative work.",
        "A 1 000 bp fragment weighs 660 kDa, so 1 µg is about 1.5 pmol — the number worth "
        "remembering at the bench.",
        "Ligations are usually set up at a 1:3 vector-to-insert molar ratio rather than equal mass, "
        "which is exactly what this conversion gives you.",
    ],
    mistakes=[
        "Using the single-stranded constant (330 g/mol per nucleotide) for a duplex, which halves "
        "the answer.",
        "Forgetting that the length must be the whole molecule, not the insert.",
        "Rounding a 20 ng measurement to 1 µg of 'measured' DNA.",
    ],
    faq=[
        ("How many pmol is 100 ng of a 1 kb dsDNA?", "0.15 pmol. 0.1 µg × 10⁶ ÷ (660 × 1 000) = "
         "0.1515 pmol."),
        ("Why 660 g/mol per base pair?", "It is the average of the four base pairs' sodium salts, "
         "weighted for equal base composition."),
        ("Can I use this for ssDNA?", "No — use 330 g/mol per nucleotide for single-stranded DNA or "
         "RNA."),
    ],
    related=[("/biology/dna-molecular-weight-calculator", "DNA molecular weight"),
             ("/biology/gc-content-sequence", "GC content"),
             ("/biology/pcr-primer-stats", "PCR primer stats")],
    svg=("bars", {"caption": "Mass, moles and molecule count for the same amount of DNA."}),
    icon="flask",
    keywords=["dsDNA pmol", "microgram to picomole", "ligation ratio"],
    steps=[
        "Enter the length of the double-stranded molecule in base pairs.",
        "Type the mass in micrograms, or the amount in picomoles — whichever you know.",
        "The other value is solved for you, together with the molecule count.",
    ],
))
