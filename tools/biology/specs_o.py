"""Batch O — the table-driven sequence tools.

Six calculators that could not be written as formulas because they need a
reference table rather than an equation: codon usage per host, the salt class of
a restriction enzyme, a site panel, an amino-acid to codon map, an IUPAC
ambiguity map and a seeded random generator.

Same rules as batches I–K: every script is total (empty input, protein letters in
a DNA box, a 40 kb paste, a pattern full of junk — all produce a message, never
an exception), every number published is finite, and every link resolves before
the batch ships.
"""

from lib import Spec, num, sel, chk, txt, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


# --------------------------------------------------------------------- shared
JS_BIO = r"""
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
"""

# Relative adaptiveness w = f(codon) / f(most used codon of that amino acid).
# One set per host, most-used codon of each family = 1.00; Met and Trp are 1.00
# by definition and every stop codon is excluded from CAI.
CODON_W = r"""
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
"""

HOST_OPTIONS = [("E. coli K-12", "ecoli"), ("Human (Homo sapiens)", "human"),
                ("Yeast (S. cerevisiae)", "yeast")]


# ---------------------------------------------------------------- 1. CAI
add(Spec(
    name="Codon Adaptation Index Calculator",
    slug="codon-adaptation-index",
    summary=("The codon adaptation index scores how well a coding sequence uses the codons its host "
             "prefers. Every codon is weighted by how often that host uses it within its amino-acid "
             "family, the weights are averaged geometrically, and the result runs from 0 to 1 — "
             "above about 0.8 means the gene is already tuned for that host, below 0.5 means it is "
             "poorly adapted and is a candidate for resynthesis."),
    fields=[
        txt("sequence", "Coding sequence (DNA)",
            "ATGGCTAAAGGTGAAGAACTGTTCACTGGTGTTGTACCAATCTTAGTTGAACTGGATGGTGATGTTAACGGTCATAAATTT",
            "Paste the open reading frame; the first codon is read as the start", 6),
        sel("host", "Reference host", HOST_OPTIONS, "ecoli",
            "The codon usage table the weights come from"),
        num("cai", "Codon adaptation index", "", "", "Geometric mean of the weights", output=True),
        num("codons", "Codons scored", "", "", "Met, Trp and stops are excluded", output=True),
        num("rare", "Rare codons (w ≤ 0.2)", "", "", "", output=True),
        num("gc3", "GC at third position", "", "%", "", output=True),
    ],
    dirs=[],
    formula="CAI = exp( (1/L) · Σ ln w_i ),   w_i = f(codon) ÷ f(most used codon of the same amino acid)",
    symbols=[("w_i", "relative adaptiveness of codon i in the host", "0 – 1"),
             ("L", "codons scored (Met, Trp and stop codons left out)", "codons"),
             ("f", "usage frequency within the amino-acid family", "—")],
    steps=[
        "Paste the coding sequence — DNA, no spaces needed, FASTA headers are ignored.",
        "Pick the host you intend to express in; the weights change with the reference set.",
        "Read the CAI and then look at the rare-codon list: a single cluster of w < 0.2 codons is "
        "what stalls a ribosome, and a good average can hide it.",
    ],
    bands=[("0.80 – 1.00", "Well adapted", "codon-optimised or a highly expressed native gene"),
           ("0.60 – 0.80", "Moderately adapted", "typical of a native gene expressed at a low level"),
           ("0.40 – 0.60", "Poorly adapted", "heterologous expression usually benefits from resynthesis"),
           ("below 0.40", "Very poorly adapted", "expect low yield; check for rare-codon clusters")],
    notes=[
        "CAI is a geometric mean, so one codon with a very low weight pulls the score down much "
        "harder than an arithmetic average would — that is deliberate, because translation is "
        "limited by the slowest step.",
        "The weights are relative adaptiveness values: the most-used codon of each amino acid is "
        "1.00 and the others are scaled against it. They are tabulated to two decimals here, which "
        "is enough for a two-decimal CAI.",
        "CAI says nothing about mRNA structure, GC content or internal ribosome entry — a gene can "
        "score 0.9 and still fold badly at the start. Check the 5′ end separately.",
        "Met, Trp and the three stop codons are excluded because they have no synonymous choice; "
        "including them would push every score toward 1.0.",
    ],
    mistakes=[
        "Feeding in a genomic sequence with introns: the frame is lost after the first intron and "
        "every downstream codon is misread.",
        "Comparing a CAI computed against E. coli with one computed against human — the scales are "
        "not comparable.",
        "Reading only the average: a 0.75 CAI with five consecutive rare Arg codons will express "
        "worse than a 0.68 gene with the same codons spread out.",
    ],
    faq=[
        ("What is a good codon adaptation index?",
         "Above 0.8 is well adapted for the host; 0.6–0.8 is typical of a native gene at modest "
         "expression; below 0.5 usually justifies codon optimisation before you try expression."),
        ("Does a high CAI guarantee high protein yield?",
         "No. CAI only measures codon choice. mRNA secondary structure, GC content at the 5′ end, "
         "rare-codon clusters and the tRNA pool under the growth condition all matter as much."),
        ("Why is my CAI different from a supplier's optimisation report?",
         "Because the weight tables differ. Suppliers use their own proprietary usage sets; this "
         "page uses the standard published relative adaptiveness values, so expect the same shape "
         "and a slightly different number."),
        ("Can I use CAI for a bacterial gene expressed in human cells?",
         "Yes — that is exactly the heterologous case it is for. Read the score against the human "
         "table, not the bacterial one."),
    ],
    related=[("/biology/codon-usage-calculator", "Codon usage"),
             ("/biology/multi-reverse-translate", "Multi reverse translate"),
             ("/biology/gc-content-calculator", "GC content"),
             ("/biology/dna-to-protein", "DNA to protein")],
    svg=("rows", {"caption": "The same gene read against three hosts",
                  "series": [("E. coli", 0.71), ("Human", 0.63), ("Yeast", 0.55)]}),
    icon="dna",
    keywords=["codon adaptation index", "CAI", "codon optimisation", "codon usage bias"],
    script=JS_BIO + CODON_W + r"""
  omni.onResult(['sequence', 'host'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    var key = resolve(ctx.getRawInput('host'), { ecoli: 'ecoli', human: 'human', yeast: 'yeast' }, 'ecoli');
    var W = CODON_W[key] || CODON_W.ecoli;
    if (seq.length < 3) {
      ctx.addHtml(block('Codon adaptation index', '—', 'Paste a coding sequence of at least 3 bp.'));
      ctx.exportValue('cai', 0); ctx.exportValue('codons', 0);
      ctx.exportValue('rare', 0); ctx.exportValue('gc3', 0);
      return;
    }
    var usable = Math.floor(seq.length / 3);
    if (usable * 3 !== seq.length) {
      seq = seq.slice(0, usable * 3);
    }
    var sumLn = 0, scored = 0, rare = 0, gc3 = 0, gc3n = 0, unknown = 0;
    var counts = {}, rareList = [];
    for (var i = 0; i + 3 <= seq.length; i += 3) {
      var cod = seq.substr(i, 3);
      var aa = aaOf(cod);
      if (aa === null) { unknown++; continue; }
      if (aa === '*' || cod === 'ATG' || cod === 'TGG') continue;
      var w = W[cod];
      if (w === undefined) { unknown++; continue; }
      counts[cod] = (counts[cod] || 0) + 1;
      scored++;
      // a zero weight would make ln() infinite; the tables have none, but guard anyway
      sumLn += Math.log(Math.max(w, 0.005));
      gc3n++;
      if (cod.charAt(2) === 'G' || cod.charAt(2) === 'C') gc3++;
      if (w <= 0.2) {
        rare++;
        if (rareList.length < 12) rareList.push(cod + ' (w ' + w.toFixed(2) + ', position ' + (i + 1) + ')');
      }
    }
    var cai = scored ? Math.exp(sumLn / scored) : 0;
    var pct3 = gc3n ? gc3 / gc3n * 100 : 0;
    ctx.exportValue('cai', Math.round(cai * 10000) / 10000);
    ctx.exportValue('codons', scored);
    ctx.exportValue('rare', rare);
    ctx.exportValue('gc3', Math.round(pct3 * 100) / 100);

    var verdict = cai >= 0.8 ? 'well adapted for this host'
      : cai >= 0.6 ? 'moderately adapted — a native gene expressed at a modest level'
      : cai >= 0.4 ? 'poorly adapted — codon optimisation is worth considering'
      : 'very poorly adapted — expect a low yield as it stands';
    var rows = [];
    var order = Object.keys(counts).sort(function (a, b) { return counts[b] - counts[a]; });
    for (var k = 0; k < order.length && k < 15; k++) {
      var c = order[k];
      rows.push([c, aaOf(c) || '?', String(counts[c]), W[c].toFixed(2)]);
    }
    var html = block('Codon adaptation index (' + key + ')',
      'CAI                ' + cai.toFixed(4) + '\n'
      + 'Codons scored      ' + scored + '\n'
      + 'Rare codons (w≤0.2) ' + rare + '\n'
      + 'GC at third base   ' + pct3.toFixed(1) + ' %',
      'Reading: ' + verdict + '.');
    html += table('Most used codons in this sequence', ['Codon', 'Amino acid', 'Count', 'w'], rows);
    html += block('Rare codons', rare ? rareList.join('\n') : 'None below w = 0.2.',
      unknown ? unknown + ' codon(s) skipped as ambiguous or incomplete.' : '');
    ctx.addHtml(html);
  });
""",
))


# ------------------------------------------- 2. restriction enzyme finder
add(Spec(
    name="Restriction Enzyme Finder Calculator",
    slug="restriction-enzyme-finder",
    summary=("Paste a DNA sequence and the finder checks it against a panel of 26 common enzymes. It also "
             "reports the cut position, the overhang each enzyme leaves and whether the site crosses the "
             "origin of a circular plasmid."),
    fields=[
        txt("sequence", "DNA sequence",
            "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGGAATTCGGATCCAAGCTT",
            "Paste the plasmid or the amplicon; FASTA headers are ignored", 6),
        chk("circular", "Treat the molecule as circular (plasmid)", True,
            "Sites that span the origin are counted too"),
        num("cutters", "Enzymes that cut", "", "", "Out of the panel", output=True),
        num("unique", "Unique cutters", "", "", "Exactly one site", output=True),
        num("nocut", "Enzymes that do not cut", "", "", "", output=True),
    ],
    dirs=[],
    formula="A site is a match of the enzyme's recognition sequence on either strand; a unique cutter has exactly one match",
    symbols=[("recognition site", "the 6–8 bp sequence the enzyme binds", "bp"),
             ("cut offset", "where the phosphodiester bond breaks, from the 5′ end of the site", "bp"),
             ("overhang", "the single-stranded end left behind", "5′, 3′ or blunt")],
    steps=[
        "Paste the sequence — plasmid map coordinates are not needed, the page counts from the first base.",
        "Tick circular if it is a plasmid, so a site spanning the origin is found.",
        "Start from the unique-cutter list: a single site per enzyme is what you need for a clean "
        "single-insert ligation, and a pair of unique sites with different overhangs is what you "
        "need for a directional one.",
    ],
    bands=[("1 site", "Unique cutter", "the cloning workhorse — one cut, one linear product"),
           ("2 sites", "Double cutter", "useful for dropping a cassette out, or for a double digest"),
           ("3+ sites", "Frequent cutter", "avoid unless you want the fragment pattern"),
           ("0 sites", "Non-cutter", "useful when you must leave the sequence untouched")],
    notes=[
        "Both strands are searched, so a non-palindromic site on the bottom strand is reported at "
        "its top-strand coordinate rather than being missed.",
        "For a circular molecule the sequence is searched against itself with an overlap of one "
        "site length, so a site straddling base 1 is found.",
        "Overhang matters more than the cut position for cloning: two enzymes that leave the same "
        "cohesive end can be ligated together, and a blunt-end enzyme can go into any blunt site.",
        "Dam and Dcm methylation of E. coli DNA blocks some sites (Dam: GATC; Dcm: CCWGG). If a "
        "site is absent from a plasmid prepped from a dam+ strain, that is usually why.",
    ],
    mistakes=[
        "Searching a circular plasmid as linear and concluding an enzyme does not cut when its site "
        "spans the origin.",
        "Choosing a unique site without checking its position: 3 bp from the end of the insert is "
        "unique but useless.",
        "Forgetting that two different enzymes can leave the same overhang — BamHI (G^GATCC), BglII "
        "(A^GATCT), BclI and Sau3AI all produce a GATC 5′ overhang.",
    ],
    faq=[
        ("What is a unique restriction site?",
         "A site that occurs exactly once in the molecule, so digesting with that enzyme linearises "
         "a plasmid in one place. That is the standard position for cloning a single insert."),
        ("Why does an enzyme I expected cut nothing?",
         "Three reasons cover almost every case. The site spans the origin of a circular plasmid, "
         "the DNA is methylated at that site, or a star activity buffer was assumed where the "
         "standard buffer does not support the enzyme."),
        ("Can I use two enzymes with different overhangs?",
         "Yes — that is a directional clone, and it stops the insert going in backwards. Check that "
         "the two buffers are compatible, or digest sequentially."),
        ("Does this page give fragment sizes?",
         "The digest page does. This one is the screening step: which enzymes are worth taking "
         "forward, and where they cut."),
    ],
    related=[("/biology/restriction-digest", "Restriction digest"),
             ("/biology/restriction-digest-setup", "Restriction digest setup"),
             ("/biology/restriction-buffer-compatibility", "Buffer compatibility"),
             ("/biology/dna-pattern-finder", "DNA pattern finder")],
    svg=("rows", {"caption": "26 enzymes screened against a 4 kb plasmid",
                  "series": [("Unique", 7), ("Multiple", 5), ("No site", 14)]}),
    icon="dna",
    keywords=["restriction enzyme finder", "unique restriction site", "cloning sites", "non-cutter"],
    script=JS_BIO + r"""
  // name, recognition site, cut offset on the top strand, overhang
  var PANEL = [
    ['EcoRI', 'GAATTC', 1, '5′'], ['BamHI', 'GGATCC', 1, '5′'], ['HindIII', 'AAGCTT', 1, '5′'],
    ['NotI', 'GCGGCCGC', 2, '5′'], ['XhoI', 'CTCGAG', 1, '5′'], ['SalI', 'GTCGAC', 1, '5′'],
    ['PstI', 'CTGCAG', 5, '3′'], ['XbaI', 'TCTAGA', 1, '5′'], ['KpnI', 'GGTACC', 5, '3′'],
    ['SmaI', 'CCCGGG', 3, 'blunt'], ['SacI', 'GAGCTC', 5, '3′'], ['NcoI', 'CCATGG', 1, '5′'],
    ['NdeI', 'CATATG', 2, '5′'], ['EcoRV', 'GATATC', 3, 'blunt'], ['ScaI', 'AGTACT', 3, 'blunt'],
    ['PvuII', 'CAGCTG', 3, 'blunt'], ['HpaI', 'GTTAAC', 3, 'blunt'], ['NruI', 'TCGCGA', 3, 'blunt'],
    ['ApaI', 'GGGCCC', 5, '3′'], ['BglII', 'AGATCT', 1, '5′'], ['SpeI', 'ACTAGT', 1, '5′'],
    ['NheI', 'GCTAGC', 1, '5′'], ['AgeI', 'ACCGGT', 1, '5′'], ['AscI', 'GGCGCGCC', 2, '5′'],
    ['MluI', 'ACGCGT', 1, '5′'], ['SphI', 'GCATGC', 5, '3′']
  ];
  var COMP2 = { A: 'T', T: 'A', G: 'C', C: 'G', N: 'N' };
  function comp(s) {
    var o = '';
    for (var i = s.length - 1; i >= 0; i--) o += COMP2[s.charAt(i)] || 'N';
    return o;
  }
  function sitesOf(seq, site, cut, circular) {
    var hits = [], i, len = site.length;
    var hay = circular ? seq + seq.substring(0, Math.min(len, seq.length)) : seq;
    for (i = 0; i + len <= hay.length; i++) {
      if (hay.substr(i, len) === site) {
        var p = i + cut;
        if (circular) p = ((p % seq.length) + seq.length) % seq.length;
        hits.push(p);
      }
    }
    var rcSite = comp(site);
    if (rcSite !== site) {
      for (i = 0; i + len <= hay.length; i++) {
        if (hay.substr(i, len) === rcSite) {
          var q = i + (len - cut);
          if (circular) q = ((q % seq.length) + seq.length) % seq.length;
          hits.push(q);
        }
      }
    }
    hits.sort(function (a, b) { return a - b; });
    var out = [];
    for (i = 0; i < hits.length; i++) if (out.indexOf(hits[i]) < 0) out.push(hits[i]);
    return out;
  }
  omni.onResult(['sequence', 'circular'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    if (seq.length < 8) {
      ctx.addHtml(block('Enzyme screen', '—', 'Paste at least 8 bp of DNA.'));
      ctx.exportValue('cutters', 0); ctx.exportValue('unique', 0); ctx.exportValue('nocut', 0);
      return;
    }
    var circular = /true|yes|1/i.test(String(ctx.getRawInput('circular') || ''));
    var unique = [], multi = [], none = [];
    for (var i = 0; i < PANEL.length; i++) {
      var enz = PANEL[i];
      var hits = sitesOf(seq, enz[1], enz[2], circular);
      if (hits.length === 1) unique.push([enz[0], enz[1], String(hits[0] + 1) + ' bp', enz[3]]);
      else if (hits.length > 1) multi.push([enz[0], enz[1], hits.length + ' sites: ' + hits.map(function (p) { return p + 1; }).join(', '), enz[3]]);
      else none.push([enz[0], enz[1], '—', enz[3]]);
    }
    ctx.exportValue('cutters', unique.length + multi.length);
    ctx.exportValue('unique', unique.length);
    ctx.exportValue('nocut', none.length);
    var html = block('Enzyme screen (' + seq.length + ' bp, ' + (circular ? 'circular' : 'linear') + ')',
      'Unique cutters   ' + unique.length + '\nMulti cutters    ' + multi.length
      + '\nNo site          ' + none.length,
      unique.length ? 'Start from the unique cutters — one cut per enzyme.'
                    : 'No unique cutter in this panel; widen the enzyme list.');
    html += table('Unique cutters', ['Enzyme', 'Site', 'Cut at', 'Overhang'],
                  unique.length ? unique : [['none', '—', '—', '—']]);
    html += table('Enzymes that cut more than once', ['Enzyme', 'Site', 'Positions', 'Overhang'],
                  multi.length ? multi.slice(0, 14) : [['none', '—', '—', '—']],
                  multi.length > 14 ? 'First 14 shown.' : '');
    html += table('No site in this sequence', ['Enzyme', 'Site', 'Cut at', 'Overhang'], none.slice(0, 14),
                  none.length > 14 ? 'First 14 shown — useful as enzymes that will leave the sequence intact.' : '');
    ctx.addHtml(html);
  });
""",
))


# ------------------------------------------- 3. buffer compatibility
add(Spec(
    name="Double Digest Buffer Compatibility Calculator",
    slug="restriction-buffer-compatibility",
    summary=("Two enzymes usually want different salt conditions, and the wrong buffer quietly costs "
             "you most of your digest. This page models each enzyme's salt class against the four "
             "standard buffers, shows the predicted activity of both enzymes in every buffer, and "
             "says whether to co-digest in one buffer or to digest sequentially with a clean-up "
             "step in between."),
    fields=[
        sel("enzyme1", "Enzyme 1", [
            ("EcoRI", "ecori"), ("HindIII", "hindiii"), ("BamHI", "bamhi"), ("SalI", "sali"),
            ("XhoI", "xhoi"), ("NotI", "noti"), ("PstI", "psti"), ("SacI", "saci"),
            ("XbaI", "xbai"), ("KpnI", "kpni"), ("NcoI", "ncoi"), ("NdeI", "ndei"),
            ("EcoRV", "ecorv"), ("SmaI", "smai"), ("ScaI", "scai"), ("PvuII", "pvuii"),
            ("MluI", "mlui"), ("BglII", "bglii")], "ecori"),
        sel("enzyme2", "Enzyme 2", [
            ("BamHI", "bamhi"), ("EcoRI", "ecori"), ("HindIII", "hindiii"), ("SalI", "sali"),
            ("XhoI", "xhoi"), ("NotI", "noti"), ("PstI", "psti"), ("SacI", "saci"),
            ("XbaI", "xbai"), ("KpnI", "kpni"), ("NcoI", "ncoi"), ("NdeI", "ndei"),
            ("EcoRV", "ecorv"), ("SmaI", "smai"), ("ScaI", "scai"), ("PvuII", "pvuii"),
            ("MluI", "mlui"), ("BglII", "bglii")], "sali"),
        chk("classic_only", "I only have the classic three buffers (no universal buffer)", False,
            "Uncheck to model a kit that includes a CutSmart-type buffer"),
        num("suitable", "Buffers that suit both", "", "", "Out of the buffers available", output=True),
        num("best", "Best combined activity", "", "%", "Predicted, weaker of the two", output=True),
        num("sequential", "Enzymes that need their own buffer", "", "", "0 or 1", output=True),
    ],
    dirs=[],
    formula="activity 100 % at the enzyme's rated salt class, 60 % one class away, 20 % two classes away; co-digest needs ≥ 75 % for both",
    symbols=[("salt class", "monovalent salt the enzyme is rated at: 0, 50 or 100 mM NaCl", "mM"),
             ("CutSmart", "the acetate-based universal buffer most suppliers ship", "—"),
             ("steps away", "how many salt classes separate buffer and enzyme", "classes")],
    steps=[
        "Pick the two enzymes from the panel; the salt classes come from the classic low / medium / "
        "high classification.",
        "Read the buffer table: the column with the highest minimum across the two enzymes is your "
        "co-digest buffer.",
        "If the best combined activity is below about 75 %, digest sequentially instead — the page "
        "prints the protocol, including the dilution arithmetic.",
    ],
    bands=[("100 % both", "Co-digest", "one buffer, one tube, one incubation"),
           ("75 % both", "Co-digest, longer", "double the enzyme or the time to recover the loss"),
           ("50 – 74 %", "Sequential", "digest, heat-inactivate or column-purify, then digest again"),
           ("below 50 %", "Sequential, two buffers", "no single buffer is acceptable for both")],
    notes=[
        "The activity figures here are a salt-class model, not a measured table: 100 % at the "
        "enzyme's rated class, 60 % one class away, 20 % two classes away. Published supplier "
        "charts are measured per enzyme and should win wherever they disagree.",
        "A CutSmart-type buffer is formulated to support nearly every common enzyme at 100 %, which "
        "is why it is the default in most kits and why the page rates it at 100 % for the whole "
        "panel. Untick it if your kit only has the classic low / medium / high salt buffers — that "
        "is the case where the ordering of the two digests actually matters.",
        "Glycerol matters as much as salt. Two enzymes both supplied in 50 % glycerol push the "
        "reaction above 5 % glycerol, which causes star activity; keep the enzyme volume at or "
        "below one tenth of the reaction.",
        "If the enzymes need different temperatures, co-digestion is not possible at all: run them "
        "one after the other.",
    ],
    mistakes=[
        "Assuming any two enzymes co-digest because they are both 'common'.",
        "Adding both enzymes neat and pushing the glycerol over 5 % of the reaction volume.",
        "Heat-inactivating between digests at a temperature that also denatures the DNA or the "
        "second enzyme — check the inactivation table, not the incubation temperature.",
        "Forgetting the methylation status of the template, which can make one enzyme look inactive "
        "and be blamed on the buffer.",
    ],
    faq=[
        ("Can I do a double digest in one buffer?",
         "Yes when both enzymes are rated at least 75 % in the same buffer — the page names that "
         "buffer. Otherwise digest sequentially: the second enzyme's own buffer is restored by "
         "adding salt or by a column clean-up."),
        ("What is CutSmart buffer?",
         "A universal buffer (Tris-acetate, potassium acetate, magnesium acetate, BSA) formulated so "
         "that the large majority of common enzymes work at full activity in it. It makes most "
         "double digests single-tube."),
        ("Why does my double digest show undigested plasmid?",
         "Usually buffer incompatibility for one of the two enzymes, too much glycerol, or a "
         "methylated site. Run each enzyme alone as a control — the one that fails alone is the "
         "problem, and it is not the buffer."),
        ("How do I fix salt between sequential digests?",
         "Either heat-inactivate and dilute 5–10 fold into the second buffer, or purify the DNA on a "
         "column. Dilution is fine when the DNA is concentrated; a column is safer when it is not."),
    ],
    related=[("/biology/restriction-digest", "Restriction digest"),
             ("/biology/restriction-digest-setup", "Digest setup"),
             ("/biology/restriction-enzyme-finder", "Enzyme finder"),
             ("/biology/dna-concentration", "DNA concentration")],
    svg=("rows", {"caption": "Modelled activity of two enzymes across four buffers",
                  "series": [("Buffer 1", 25), ("Buffer 2", 75), ("Buffer 3", 100), ("CutSmart", 100)]}),
    icon="flask",
    keywords=["double digest", "buffer compatibility", "restriction buffer", "CutSmart"],
    script=JS_BIO + r"""
  // Classic low / medium / high salt classes (mM NaCl at which the enzyme is rated).
  var SALT = {
    ecori: { name: 'EcoRI', salt: 50 }, hindiii: { name: 'HindIII', salt: 50 },
    bamhi: { name: 'BamHI', salt: 100 }, sali: { name: 'SalI', salt: 100 },
    xhoi: { name: 'XhoI', salt: 100 }, noti: { name: 'NotI', salt: 100 },
    psti: { name: 'PstI', salt: 50 }, saci: { name: 'SacI', salt: 50 },
    xbai: { name: 'XbaI', salt: 50 }, kpni: { name: 'KpnI', salt: 50 },
    ncoi: { name: 'NcoI', salt: 50 }, ndei: { name: 'NdeI', salt: 50 },
    ecorv: { name: 'EcoRV', salt: 0 }, smai: { name: 'SmaI', salt: 0 },
    scai: { name: 'ScaI', salt: 0 }, pvuii: { name: 'PvuII', salt: 0 },
    mlui: { name: 'MluI', salt: 100 }, bglii: { name: 'BglII', salt: 50 }
  };
  var BUFFERS = [
    { name: 'Buffer 1 (low salt)', salt: 0 },
    { name: 'Buffer 2 (medium salt)', salt: 50 },
    { name: 'Buffer 3 (high salt)', salt: 100 },
    { name: 'CutSmart (universal)', salt: -1 }
  ];
  function activity(buffer, enzyme) {
    if (buffer.salt < 0) return 100;              // universal buffer, supplier-rated
    var steps = Math.abs(buffer.salt - enzyme.salt) / 50;
    return steps === 0 ? 100 : steps === 1 ? 60 : 20;
  }
  omni.onResult(['enzyme1', 'enzyme2', 'classic_only'], function (ctx) {
    var e1 = resolve(ctx.getRawInput('enzyme1'), SALT, SALT.ecori);
    var e2 = resolve(ctx.getRawInput('enzyme2'), SALT, SALT.sali);
    if (e1.name === e2.name) e2 = SALT.ecori === e1 ? SALT.sali : SALT.ecori;
    var classicOnly = /true|yes|1/i.test(String(ctx.getRawInput('classic_only') || ''));
    var list = classicOnly ? BUFFERS.slice(0, 3) : BUFFERS;
    var rows = [], bestName = '', bestMin = -1, suitable = 0;
    for (var i = 0; i < list.length; i++) {
      var a1 = activity(list[i], e1), a2 = activity(list[i], e2);
      var lo = Math.min(a1, a2);
      if (lo >= 75) suitable++;
      if (lo > bestMin) { bestMin = lo; bestName = list[i].name; }
      rows.push([list[i].name, a1 + ' %', a2 + ' %', lo >= 75 ? 'use it' : lo >= 50 ? 'marginal' : 'no']);
    }
    var needSeq = bestMin < 75 ? 1 : 0;
    ctx.exportValue('suitable', suitable);
    ctx.exportValue('best', bestMin);
    ctx.exportValue('sequential', needSeq);
    var html = table('Predicted activity', ['Buffer', e1.name, e2.name, 'Verdict'], rows,
      'Modelled from salt class: 100 % at the rated class, 60 % one class away, 20 % two away.');
    if (needSeq === 0) {
      html += block('Recommendation: co-digest', 'Buffer        ' + bestName
        + '\nActivity      ' + bestMin + ' % for both'
        + '\nGlycerol      keep total enzyme ≤ 1/10 of the reaction volume',
        bestMin === 100 ? 'One tube, one buffer, one incubation.'
                        : 'Compensate for the loss: double the enzyme or extend the incubation to 2 hours.');
    } else {
      html += block('Recommendation: digest sequentially',
        'Step 1   digest ' + e1.name + ' in its own buffer (salt class ' + e1.salt + ' mM)\n'
        + 'Step 2   heat-inactivate if the enzyme allows, or purify on a column\n'
        + 'Step 3   digest ' + e2.name + ' in its own buffer (salt class ' + e2.salt + ' mM)\n'
        + 'Step 4   if you dilute instead of purifying, dilute 5× to drop the carried salt',
        'No single buffer reaches 75 % for both enzymes'
        + (classicOnly ? ' — a universal buffer would make this a single tube.' : '.'));
    }
    ctx.addHtml(html);
  });
""",
))


# ------------------------------------------- 4. multi reverse translate
add(Spec(
    name="Multi Reverse Translate Calculator",
    slug="multi-reverse-translate",
    summary=("Back-translate several protein sequences at once into DNA, either with the codons a "
             "chosen host prefers or with a fully degenerate codon for every residue. Paste a "
             "multi-FASTA of proteins, pick the host, and every sequence comes back as DNA with its "
             "own length, GC content and rare-codon count — the starting point for a synthetic "
             "construct or a primer design."),
    fields=[
        txt("proteins", "Protein sequences (one or more)",
            ">example\nMKWVTFISLLFLFSSAYSR\n>second\nGVFRQESK",
            "One sequence per line, FASTA headers allowed — every sequence is translated separately", 6),
        sel("host", "Codon choice", HOST_OPTIONS + [("Degenerate (IUPAC)", "degenerate")], "ecoli",
            "Host-preferred codons, or one degenerate codon per residue"),
        chk("stop", "Add a stop codon at the end", True, "Uses the host's preferred stop"),
        num("sequences", "Sequences translated", "", "", "", output=True),
        num("residues", "Residues translated", "", "", "Stop characters excluded", output=True),
        num("gc", "GC content of the output", "", "%", "", output=True),
    ],
    dirs=[],
    formula="one codon per residue: argmax w(codon) for the host, or the IUPAC codon covering every synonym",
    symbols=[("w", "relative adaptiveness of a codon for the host", "0 – 1"),
             ("IUPAC codon", "a three-letter code with ambiguity, e.g. YTN for leucine", "—"),
             ("*", "stop", "—")],
    steps=[
        "Paste the proteins, each on its own line or under a FASTA header.",
        "Pick the expression host — the page takes the most-used codon of each amino acid from that "
        "host's table — or choose degenerate to keep every synonymous option.",
        "Copy the DNA out, keeping the wrap at 60 columns so it drops straight into a cloning tool.",
    ],
    bands=[("Host-preferred", "One defined sequence", "best for expression; the sequence is fixed"),
           ("Degenerate", "A codon family per residue", "best for primer design and for unknown host bias"),
           ("GC 40 – 60 %", "Comfortable range", "synthesis and PCR both behave well"),
           ("GC above 70 %", "Hard to synthesise", "secondary structure and synthesis cost both rise")],
    notes=[
        "Host-preferred back-translation is not codon optimisation: it uses each host's single most "
        "frequent codon everywhere, which maximises CAI but can create repeats and hairpins. A real "
        "optimisation algorithm also scans for those — this page gives you the honest starting point.",
        "Degenerate codons are the right output when the DNA is a hybridisation probe or a primer "
        "mix: YTN for leucine means four codons in one synthesis.",
        "Every protein is translated in its own frame; a sequence containing a character that is not "
        "an amino acid is reported rather than silently dropped.",
        "The GC content reported is of the DNA you would order, so it is the number a synthesis "
        "quote depends on.",
    ],
    mistakes=[
        "Pasting DNA by mistake: it is read as protein and every letter becomes a codon.",
        "Forgetting that removing the stop codon is required for a C-terminal fusion.",
        "Assuming the host-preferred sequence is also the highest-expressing one — mRNA structure "
        "at the 5′ end often dominates.",
        "Using E. coli codons for a mammalian host and then wondering why expression is poor.",
    ],
    faq=[
        ("What is the difference between reverse translation and codon optimisation?",
         "Reverse translation picks one codon per residue — here, the host's most-used one. Codon "
         "optimisation additionally avoids repeats, extreme GC, cryptic splice sites and hairpins, "
         "and often mixes synonymous codons on purpose."),
        ("Why does the page use the most frequent codon everywhere?",
         "Because it is deterministic and reproducible: the same protein always gives the same DNA, "
         "which is what you want when comparing constructs. Add synonymous variation yourself where "
         "the output has runs of the same codon."),
        ("Can I get several sequences in one run?",
         "Yes. Paste them one per line or with FASTA headers; each is translated separately and "
         "numbered in the output."),
        ("Is the degenerate output usable for ordering a primer?",
         "Yes — that is its main use. Order it as a degenerate oligo and the synthesiser will make "
         "the mixture the IUPAC code describes."),
    ],
    related=[("/biology/reverse-translate", "Reverse translate (single)"),
             ("/biology/codon-adaptation-index", "Codon adaptation index"),
             ("/biology/codon-usage-calculator", "Codon usage"),
             ("/biology/oligo-tm-calculator", "Oligo Tm")],
    svg=("rows", {"caption": "Codons needed for the same peptide under two hosts",
                  "series": [("E. coli preferred", 0.71), ("Human preferred", 0.63)]}),
    icon="dna",
    keywords=["reverse translate", "back translation", "protein to DNA", "degenerate codon"],
    script=JS_BIO + CODON_W + r"""
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
    var mode = resolve(ctx.getRawInput('host'), { ecoli: 'ecoli', human: 'human', yeast: 'yeast', degenerate: 'degenerate' }, 'ecoli');
    var addStop = /true|yes|1/i.test(String(ctx.getRawInput('stop') || ''));
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
""",
))


# ------------------------------------------- 5. fuzzy protein search
add(Spec(
    name="Fuzzy Protein Search Calculator",
    slug="fuzzy-protein-search",
    summary=("A fuzzy protein search finds an approximate motif: X matches any residue, B, Z and J their "
             "ambiguous pairs. Every hit is reported with its position, its mass and how many positions it "
             "missed — the quick way to find a motif in a protein whose exact sequence you are not sure "
             "of."),
    fields=[
        txt("protein", "Protein sequence",
            "MKWVTFISLLFLFSSAYSRGVFRRDAHKSEVAHRFKDLGEENFKALVLIAFAQYLQQCPFEDHVKLVNEVTEFAKTCVADESAENCDKS",
            "Paste the protein; FASTA headers and non-letter characters are ignored", 6),
        txt("pattern", "Pattern to find",
            "TCXAD",
            "Amino-acid letters, X for any residue, B = D/N, Z = E/Q, J = I/L", 2),
        num("mismatch", "Mismatches allowed", 0, "", "0 = exact, but X still matches any residue"),
        num("hits", "Matches found", "", "", "", output=True),
        num("best", "Fewest mismatches in a hit", "", "", "", output=True),
        num("total", "Residues searched", "", "", "", output=True),
    ],
    dirs=[],
    formula="a window of length |P| matches when the number of positions where P[i] does not cover S[i] is ≤ the allowed mismatches",
    symbols=[("S", "the protein sequence", "residues"),
             ("P", "the pattern", "residues"),
             ("X, B, Z, J", "any residue; Asp/Asn; Glu/Gln; Ile/Leu", "—")],
    steps=[
        "Paste the protein and the motif. Case does not matter.",
        "Allow a mismatch or two if the sequence comes from a different isoform or a related species.",
        "Read the positions and the reported masses: the mass tells you at a glance whether the "
        "hit is the peptide you expect or an unrelated stretch.",
    ],
    bands=[("0 mismatches", "Exact motif", "the pattern is present as written"),
           ("1 mismatch", "Conservative hit", "usually a point mutation or a species difference"),
           ("2+ mismatches", "Loose hit", "raise the allowance only if you expect divergence")],
    notes=[
        "X matches any residue, so a pattern full of X matches almost anywhere — count the X "
        "positions before trusting a hit.",
        "The search is a sliding window over the forward sequence only; report both strands only "
        "makes sense for DNA, and this page is for protein.",
        "Masses are average residue masses plus one water, the same convention as a peptide mass "
        "calculator, so they will be a few hundredths off a monoisotopic mass.",
        "Positions are 1-based, the convention in protein databases.",
    ],
    mistakes=[
        "Searching a nucleotide sequence with a protein pattern — every window will look like noise.",
        "Treating B and Z as literal letters; they are ambiguity codes for Asp/Asn and Glu/Gln.",
        "Allowing three mismatches on a six-residue pattern, which matches everything.",
        "Comparing a hit's average mass with a monoisotopic mass from a mass spectrometer and "
        "expecting them to agree to the last decimal.",
    ],
    faq=[
        ("What does a fuzzy search do that an exact search does not?",
         "It lets a pattern match when a few positions differ, and it understands the IUPAC "
         "ambiguity letters (B, Z, J, X) that protein databases use."),
        ("Why do I get a hit in a protein that should not contain the motif?",
         "Because you allowed mismatches — check the mismatch count on the hit. With a short "
         "pattern and two allowed mismatches, random matches are common."),
        ("Are the masses monoisotopic or average?",
         "Average, using the standard residue masses plus H₂O for the intact peptide. For a mass "
         "spectrometry match, compare the monoisotopic mass instead."),
        ("Can I search several patterns at once?",
         "Run them one after another; the page reports every window of the one pattern you paste."),
    ],
    related=[("/biology/dna-pattern-finder", "DNA pattern finder"),
             ("/biology/protein-molecular-weight", "Protein molecular weight"),
             ("/biology/amino-acid-composition", "Amino-acid composition"),
             ("/biology/protein-gravy-calculator", "GRAVY")],
    svg=("rows", {"caption": "Hits for a six-residue motif at three mismatch allowances",
                  "series": [("0", 1), ("1", 4), ("2", 11)]}),
    icon="dna",
    keywords=["protein motif search", "fuzzy search", "IUPAC amino acid", "peptide mass"],
    script=JS_BIO + r"""
  // What each ambiguity code will accept.
  var COVERS = {
    B: 'DN', Z: 'EQ', J: 'IL', X: 'ACDEFGHIKLMNPQRSTVWY',
    A: 'A', C: 'C', D: 'D', E: 'E', F: 'F', G: 'G', H: 'H', I: 'I', K: 'K', L: 'L',
    M: 'M', N: 'N', P: 'P', Q: 'Q', R: 'R', S: 'S', T: 'T', V: 'V', W: 'W', Y: 'Y'
  };
  omni.onResult(['protein', 'pattern', 'mismatch'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('protein'), 'protein');
    var pat = cleanSeq(ctx.getRawInput('pattern'), 'protein');
    var allowed = Math.max(0, Math.min(10, Math.round(Number(ctx.getRawInput('mismatch')) || 0)));
    if (!seq.length || !pat.length) {
      ctx.addHtml(block('Fuzzy protein search', '—', 'Paste both a protein and a pattern.'));
      ctx.exportValue('hits', 0); ctx.exportValue('best', 0); ctx.exportValue('total', 0);
      return;
    }
    var bad = [];
    for (var q = 0; q < pat.length; q++) if (!COVERS[pat.charAt(q)]) bad.push(pat.charAt(q));
    if (bad.length) {
      ctx.addHtml(block('Fuzzy protein search', '—',
        'The pattern contains characters that are not amino acids: ' + bad.join(' ')));
      ctx.exportValue('hits', 0); ctx.exportValue('best', 0); ctx.exportValue('total', seq.length);
      return;
    }
    var rows = [], hits = 0, best = null, m, n;
    var wild = 0;
    for (var w = 0; w < pat.length; w++) if (pat.charAt(w) === 'X') wild++;
    for (var i = 0; i + pat.length <= seq.length; i++) {
      m = 0;
      for (var j = 0; j < pat.length; j++) {
        var set = COVERS[pat.charAt(j)] || 'X';
        if (set.indexOf(seq.charAt(i + j)) < 0) m++;
        if (m > allowed) break;
      }
      if (m <= allowed) {
        hits++;
        if (best === null || m < best) best = m;
        if (rows.length < 15) {
          var piece = seq.substr(i, pat.length);
          rows.push([String(i + 1), piece, String(m), peptideMass(piece).toFixed(2)]);
        }
      }
    }
    ctx.exportValue('hits', hits);
    ctx.exportValue('best', best === null ? 0 : best);
    ctx.exportValue('total', seq.length);
    var head = block('Fuzzy protein search',
      'Pattern            ' + pat + '\nLength searched    ' + seq.length + ' residues\n'
      + 'Mismatches allowed ' + allowed + '\nMatches found      ' + hits,
      wild ? wild + ' wildcard position(s) in the pattern — a pattern of all X matches everywhere.'
                   : 'Positions are 1-based.');
    var html = head + table('Hits', ['Position', 'Match', 'Mismatches', 'Mass (Da)'],
      rows.length ? rows : [['—', 'no match', '—', '—']],
      rows.length > 15 ? 'First 15 shown.' : '');
    ctx.addHtml(html);
  });
""",
))


# ------------------------------------------- 6. random sequence generator
add(Spec(
    name="Random Sequence Generator Calculator",
    slug="random-sequence-generator",
    summary=("Generate a random DNA, RNA or protein sequence of any length with a target GC content, "
             "and get the same sequence back every time from the same seed. It is the negative "
             "control you need for a motif search, a composition baseline for a GC calculator, or a "
             "training example for a pipeline."),
    fields=[
        sel("kind", "Alphabet", [("DNA (ACGT)", "dna"), ("RNA (ACGU)", "rna"),
                                 ("Protein (20 aa)", "protein")], "dna"),
        num("length", "Length", 1000, "residues", "1 to 100 000"),
        num("gc", "Target GC content", 50, "%", "DNA and RNA only"),
        num("seed", "Seed", 42, "", "Same seed, same sequence — any whole number"),
        num("gc_actual", "GC content of the output", "", "%", "", output=True),
        chk("start", "Make the sequence start with ATG", False, "DNA only — gives you a start codon"),
    ],
    dirs=[],
    formula="each base is drawn from a seeded 32-bit generator, with G and C chosen with probability GC/2 each",
    symbols=[("seed", "the integer that fixes the pseudo-random stream", "—"),
             ("GC", "target fraction of G + C", "%"),
             ("n", "length of the sequence", "bases")],
    steps=[
        "Choose the alphabet, the length and — for DNA or RNA — the GC content you want.",
        "Keep the seed if you need the same sequence again, change it for a different draw.",
        "Copy the output: it is wrapped at 60 columns and the seed is printed with it, so anyone "
        "can reproduce exactly what you used.",
    ],
    bands=[("20 – 40 % GC", "AT-rich", "typical of a bacterial genome's variable regions and of "
                                      "some promoters"),
           ("40 – 60 % GC", "Balanced", "the usual null model for a mammalian sequence"),
           ("60 – 80 % GC", "GC-rich", "like a CpG island or a GC3-rich coding sequence")],
    notes=[
        "The random draw is deterministic from the seed: the same seed and length always give the "
        "same sequence, which is what makes a 'random' control reproducible in a paper.",
        "GC is applied as a target, so the achieved value wobbles around it by the binomial "
        "sampling error — for 1 000 bases at 50 %, expect about ±1.6 points.",
        "A protein draw uses the 20 standard residues with equal probability, not the natural "
        "amino-acid frequencies; that is what you want for a shuffled control, and it is stated in "
        "the output rather than assumed.",
        "Nothing here is cryptographically random. For keys or identifiers use a proper CSPRNG.",
    ],
    mistakes=[
        "Using a random sequence as a statistical null without matching its GC content to the real "
        "sequence — composition dominates most motif statistics.",
        "Assuming two different seeds give unrelated sequences: they do, but a short sequence can "
        "happen to look similar, which is the point of the test.",
        "Generating a 'random' protein with natural frequencies and calling it a shuffled control.",
        "Losing the seed and then being unable to reproduce a figure.",
    ],
    faq=[
        ("Is the sequence truly random?",
         "It is pseudo-random and deterministic from the seed: statistically uniform, perfectly "
         "reproducible, and not suitable for anything security-related."),
        ("Why does the GC content not exactly match what I asked for?",
         "Because each base is drawn independently, so the realised count fluctuates around the "
         "target — more bases means a smaller wobble. The page reports what it actually produced."),
        ("Can I regenerate the same sequence later?",
         "Yes — keep the seed and the length. The output block prints the seed for exactly that "
         "reason."),
        ("Does the protein mode use natural amino-acid frequencies?",
         "No. It draws the 20 residues uniformly, which is the right control for a shuffled "
         "sequence. Use a composition-matched generator if your null model needs natural "
         "frequencies."),
    ],
    related=[("/biology/sequence-shuffler", "Sequence shuffler"),
             ("/biology/gc-content-calculator", "GC content"),
             ("/biology/dna-pattern-finder", "DNA pattern finder"),
             ("/biology/reverse-complement", "Reverse complement")],
    svg=("rows", {"caption": "Base composition of a 1 000-base draw at 50 % GC",
                  "series": [("A", 246), ("C", 254), ("G", 243), ("T", 257)]}),
    icon="dna",
    keywords=["random DNA sequence", "random sequence generator", "GC content", "seeded"],
    script=JS_BIO + r"""
  function mulberry32(a) {
    return function () {
      a |= 0; a = (a + 0x6D2B79F5) | 0;
      var t = Math.imul(a ^ (a >>> 15), 1 | a);
      t = (t + Math.imul(t ^ (t >>> 7), 61 | t)) ^ t;
      return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
    };
  }
  omni.onResult(['kind', 'length', 'gc', 'seed', 'start'], function (ctx) {
    var kind = resolve(ctx.getRawInput('kind'), { dna: 'dna', rna: 'rna', protein: 'protein' }, 'dna');
    var n = Math.round(Number(ctx.getRawInput('length')) || 0);
    if (!(n > 0)) n = 0;
    n = Math.min(n, 100000);
    var gcTarget = Math.max(0, Math.min(100, Number(ctx.getRawInput('gc')) || 0));
    var seed = Math.round(Number(ctx.getRawInput('seed')) || 0);
    var start = /true|yes|1/i.test(String(ctx.getRawInput('start') || ''));
    if (!n) {
      ctx.addHtml(block('Random sequence', '—', 'Enter a length between 1 and 100 000.'));
      ctx.exportValue('gc_actual', 0);
      return;
    }
    var rnd = mulberry32(seed);
    var seq = '', counts = {}, i, ch;
    var seqAlpha = kind === 'protein' ? 'ACDEFGHIKLMNPQRSTVWY' : (kind === 'rna' ? 'ACGU' : 'ACGT');
    var gcPair = kind === 'rna' ? ['G', 'C'] : ['G', 'C'];
    for (i = 0; i < n; i++) {
      if (kind === 'protein') ch = seqAlpha.charAt(Math.floor(rnd() * seqAlpha.length) % seqAlpha.length);
      else {
        var r = rnd() * 100;
        if (r < gcTarget / 2) ch = gcPair[0];
        else if (r < gcTarget) ch = gcPair[1];
        else ch = (rnd() < 0.5 ? 'A' : (kind === 'rna' ? 'U' : 'T'));
      }
      seq += ch;
      counts[ch] = (counts[ch] || 0) + 1;
    }
    if (kind !== 'protein' && start && n >= 3) {
      seq = 'ATG' + seq.slice(3);
      counts = {};
      for (i = 0; i < seq.length; i++) { ch = seq.charAt(i); counts[ch] = (counts[ch] || 0) + 1; }
    }
    var gcN = (counts.G || 0) + (counts.C || 0);
    var pct = kind === 'protein' ? 0 : gcN / n * 100;
    ctx.exportValue('gc_actual', Math.round(pct * 100) / 100);
    var rows = [];
    var keys = Object.keys(counts).sort();
    for (i = 0; i < keys.length; i++) {
      rows.push([keys[i], String(counts[keys[i]]), (counts[keys[i]] / n * 100).toFixed(2) + ' %']);
    }
    var kindName = kind === 'protein' ? 'protein' : (kind === 'rna' ? 'RNA' : 'DNA');
    var head = block('Random ' + kindName + ' sequence — seed ' + seed,
      'Length      ' + n + '\nSeed        ' + seed
      + (kind === 'protein' ? '\nAlphabet    20 standard residues, uniform'
                            : '\nTarget GC   ' + gcTarget + ' %\nRealised GC ' + pct.toFixed(2) + ' %')
      + (start && kind !== 'protein' ? '\nStart       ATG forced at position 1' : ''),
      'Reuse the seed and the length to get this exact sequence again.');
    ctx.addHtml(head + block('Sequence', wrap(seq, 60)) + table('Composition', ['Symbol', 'Count', 'Share'], rows));
  });
""",
))
