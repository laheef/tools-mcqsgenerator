"""Batch P — the last four requested biology tools.

Three of the 246 names on the uploaded list had no page anywhere on the site and
one had only a partial cousin (rabbit colour, not dog coat colour):

* **Codon plot** — where the rare codons sit along a coding sequence.
* **Coat colour** — dog coat colour from the E/B/D/K loci.
* **In vivo formulation** — dose to dosing volume for a mouse or rat study.
* **DNA percentage** — how much of a genome is coding, and the gene density.

Everything else on the list is served by a harvested page or an earlier batch
(see docs/BIOLOGY-COVERAGE.md, which pairs every requested name with the page
that answers it).
"""

from lib import Spec, num, sel, chk, txt, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


JS_HELPERS = r"""
  function cleanSeq(raw, kind) {
    var s = String(raw || '').replace(/^>.*$/gm, '');
    s = s.replace(/[^A-Za-z]/g, '');
    return kind === 'protein' ? s.toUpperCase() : s.toUpperCase().replace(/U/g, 'T');
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
"""


# ---------------------------------------------------------------- 1. codon plot
add(Spec(
    name="Codon Plot Calculator",
    slug="codon-plot",
    summary=("A codon plot shows where the rare codons sit along a coding sequence, not just how many "
             "there are. It scores every codon for E. coli adaptation, draws the sequence as a track of "
             "bars and lists runs of rare codons — the clusters that stall a ribosome and cost protein "
             "yield."),
    fields=[
        txt("sequence", "Coding sequence (DNA)",
            "ATGGCTAGCAAAGGAGAAGAACTTTTCACTGGAGTTGTCCCAATTCTTGTTGAATTAGATGGTGATGTTAATGGGCACAAATTTTCTGTCAGTGGAGAGGGTGAAGGTGATGCAACATACGGAAAACTTACCCTTAAATTTATTTGCACTACTGGAAAACTACCTGTTCCATGGCCAACACTTGTCACTACTTTCTCTTATGGTGTTCAATGCTTTTCAAGATACCCAGATCATATGAAACGGCATGACTTTTTCAAGAGTGCCATGCCCGAAGGTTATGTACAGGAAAGAACTATATTTTTCAAAGATGACGGGAACTACAAGACACGTGCTGAAGTCAAGTTTGAAGGTGATACCCTTGTTAATAGAATCGAGTTAAAAGGTATTGATTTTAAAGAAGATGGAAACATTCTTGGACACAAATTGGAATACAACTATAACTCACACAATGTATACATCATGGCAGACAAACAAAAGAATGGAATCAAAGTTAACTTCAAAATTAGACACAACATTGAAGATGGAAGCGTTCAACTAGCAGACCATTATCAACAAAATACTCCAATTGGCGATGGCCCTGTCCTTTTACCAGACAACCATTACCTGTCCACACAATCTGCCCTTTCGAAAGATCCCAACGAAAAGAGAGACCACATGGTCCTTCTTGAGTTTGTAACAGCTGCTGGGATTACACATGGCATGGATGAACTATACAAATAA",
            "Paste the open reading frame; long sequences are summarised window by window", 6),
        num("window", "Window size", 30, "codons", "How many codons each summary point covers"),
        num("codons", "Codons read", "", "", "Whole codons only", output=True),
        num("rare", "Rare codons (w ≤ 0.2)", "", "", "", output=True),
        num("clusters", "Runs of 3+ rare codons", "", "", "The stalling risk", output=True),
    ],
    dirs=[],
    formula="plot the relative adaptiveness w of each codon in order; a cluster is 3 or more consecutive codons with w ≤ 0.2",
    symbols=[("w", "relative adaptiveness of the codon in E. coli", "0 – 1"),
             ("window", "codons per summary point on the plot", "codons"),
             ("cluster", "consecutive rare codons", "codons")],
    steps=[
        "Paste the coding sequence — the page reads from the first base as codon 1.",
        "Set the window if you want the summary coarser or finer than 30 codons.",
        "Read the track first: a flat blue line with a handful of dips is a healthy gene. Then read "
        "the cluster list — a run of three or more rare codons is the part worth resynthesising.",
    ],
    bands=[("no cluster", "Even", "the gene has rare codons but they are spread out — usually fine"),
           ("one cluster", "One hot spot", "often at the 5′ end; check the translation initiation region"),
           ("two or three", "Several hot spots", "expect a yield penalty; consider changing those codons"),
           ("four or more", "Poorly adapted", "resynthesise the gene rather than tune single codons")],
    notes=[
        "This is the plot that shows what a single CAI number cannot: a gene with a good average can "
        "still carry five consecutive codons at w = 0.06, and that run is what the ribosome queues on.",
        "The y-axis is relative adaptiveness, not frequency. w = 1.00 means the codon is the host's "
        "most-used synonym for that amino acid; w = 0.03 means it is nearly unused.",
        "Positions are codon numbers, not base numbers, so position 12 is bases 34–36.",
        "Met, Trp and stop codons carry no adaptiveness — they are drawn as neutral points rather "
        "than scored, because there is no choice to make.",
    ],
    mistakes=[
        "Plotting a genomic sequence with introns: the frame breaks at the first intron and every "
        "codon after it is wrong.",
        "Treating a low average as the whole story, or a high one as a clean bill of health.",
        "Ignoring an all-rare cluster at the very start, which affects initiation more than internal "
        "clusters affect elongation.",
    ],
    faq=[
        ("What does a codon plot show that the CAI does not?",
         "Position. CAI averages the whole sequence; the plot shows where the rare codons are, so a "
         "cluster that stalls translation is visible instead of averaged away."),
        ("What counts as a rare codon?",
         "Here, a codon whose relative adaptiveness in E. coli is 0.2 or below — roughly the bottom "
         "fifth of the usage range. The cut-off is stated on the page rather than implied."),
        ("Why are the stops and Met not scored?",
         "Because they have a single codon. Adaptiveness measures a choice between synonyms, and "
         "there is none for those."),
        ("Can I use the plot for a human gene?",
         "The weighting table here is E. coli. For a mammalian expression experiment the pattern of "
         "rare codons differs, and the codon adaptation index page lets you switch the host."),
    ],
    related=[("/biology/codon-adaptation-index", "Codon adaptation index"),
             ("/biology/codon-usage-calculator", "Codon usage"),
             ("/biology/orf-finder", "ORF finder"),
             ("/biology/multi-reverse-translate", "Multi reverse translate")],
    svg=("rows", {"caption": "Rare codons per 30-codon window along a 720 bp gene",
                  "series": [("1–30", 0), ("31–60", 2), ("61–90", 0), ("91–120", 5),
                             ("121–150", 0), ("151–180", 1)], "sort": False}),
    icon="dna",
    keywords=["codon plot", "rare codon clusters", "codon usage", "translation stalling"],
    script=JS_HELPERS + r"""
  // Relative adaptiveness in E. coli (the standard published table), two decimals.
  var W_ECOLI = {
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
  };
  // Eight steps from empty to full, so the track reads at a glance in text.
  var GLYPH = ['·', '▁', '▂', '▃', '▄', '▅', '▆', '█'];
  function bar(w) {
    var i = Math.round(Math.max(0, Math.min(1, w)) * (GLYPH.length - 1));
    return GLYPH[i];
  }
  omni.onResult(['sequence', 'window'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    var win = Math.round(Number(ctx.getRawInput('window')) || 30);
    if (!(win >= 1)) win = 30;
    win = Math.min(win, 500);
    if (seq.length < 6) {
      ctx.addHtml(block('Codon plot', '—', 'Paste a coding sequence of at least 6 bp.'));
      ctx.exportValue('codons', 0); ctx.exportValue('rare', 0); ctx.exportValue('clusters', 0);
      return;
    }
    var n = Math.floor(seq.length / 3);
    var scores = [], details = [], rare = 0, i;
    for (i = 0; i < n; i++) {
      var cod = seq.substr(i * 3, 3);
      var w = W_ECOLI[cod];
      if (w === undefined) { scores.push(null); details.push(null); continue; }
      scores.push(w);
      details.push(cod);
      if (w <= 0.2) rare++;
    }
    // runs of three or more scoring rare codons
    var runs = [], run = 0, runStart = 0;
    for (i = 0; i <= scores.length; i++) {
      var isRare = i < scores.length && scores[i] !== null && scores[i] <= 0.2;
      if (isRare) { if (run === 0) runStart = i + 1; run++; }
      else {
        if (run >= 3) runs.push({ start: runStart, len: run, codons: details.slice(runStart - 1, runStart - 1 + run).join(' ') });
        run = 0;
      }
    }
    // window averages for the summary table
    var rows = [], worst = null;
    for (i = 0; i < n; i += win) {
      var sum = 0, cnt = 0, rareInWin = 0;
      for (var j = i; j < Math.min(i + win, n); j++) {
        if (scores[j] === null) continue;
        sum += scores[j]; cnt++;
        if (scores[j] <= 0.2) rareInWin++;
      }
      var mean = cnt ? sum / cnt : 0;
      rows.push([(i + 1) + '–' + Math.min(i + win, n), cnt ? mean.toFixed(2) : '—',
                 String(rareInWin), rareInWin >= 3 ? 'check' : 'ok']);
      if (!worst || rareInWin > worst.rare) worst = { start: i + 1, rare: rareInWin };
    }
    // the track itself, wrapped to 60 codons per line
    var track = '';
    for (i = 0; i < n; i += 60) {
      var line = '';
      for (var k = i; k < Math.min(i + 60, n); k++) line += scores[k] === null ? '?' : bar(scores[k]);
      track += line + '\n';
    }
    var meanAll = 0, cntAll = 0;
    for (i = 0; i < n; i++) if (scores[i] !== null) { meanAll += scores[i]; cntAll++; }
    meanAll = cntAll ? meanAll / cntAll : 0;
    ctx.exportValue('codons', n);
    ctx.exportValue('rare', rare);
    ctx.exportValue('clusters', runs.length);
    var head = block('Codon plot — ' + n + ' codons',
      'Mean w            ' + meanAll.toFixed(3) + '\nRare codons       ' + rare
      + '\nRuns of 3+        ' + runs.length
      + '\nWorst window      ' + (worst ? worst.start + ' (first codon)' : '—'),
      'Legend: · w=0  ▁▂▃▄▅▆ rising  █ w=1.  A codon the table does not know is drawn as ?.');
    var runRows = runs.slice(0, 12).map(function (r) {
      return [String(r.start), String(r.len), r.codons];
    });
    var html = head + block('Track (one character per codon, 60 per line)', track)
      + table('Windows', ['Codons', 'Mean w', 'Rare', 'Verdict'], rows.slice(0, 20),
              rows.length > 20 ? 'First 20 windows shown.' : '')
      + table('Runs of three or more rare codons', ['First codon', 'Length', 'Codons'],
              runRows.length ? runRows : [['—', '0', 'none']],
              runs.length > 12 ? 'First 12 runs shown.' : '');
    ctx.addHtml(html);
  });
""",
))


# ------------------------------------------------------------- 2. dog coat colour
add(Spec(
    name="Dog Coat Colour Calculator",
    slug="dog-coat-color",
    summary=("Dog coat colour comes from four genes acting in a fixed order: E, K, B and D. This page "
             "takes the genotype at those four loci and returns the colour you would see, the full gene "
             "order, and what each locus is doing."),
    fields=[
        sel("e_locus", "E locus (extension)", [
            ("E/E — black allowed", "EE"), ("E/e — black allowed, carries red", "Ee"),
            ("e/e — no black, red or yellow", "ee")], "Ee"),
        sel("k_locus", "K locus (dominant black / brindle)", [
            ("K^B — solid black", "KB"), ("K^br — brindle", "KBR"),
            ("k^y/k^y — lets the A locus show", "ky")], "ky"),
        sel("b_locus", "B locus (brown)", [
            ("B/B — black pigment", "BB"), ("B/b — black, carries brown", "Bb"),
            ("b/b — brown (chocolate)", "bb")], "Bb"),
        sel("d_locus", "D locus (dilution)", [
            ("D/D — full colour", "DD"), ("D/d — full colour, carries dilute", "Dd"),
            ("d/d — diluted (blue, lilac)", "dd")], "Dd"),
        chk("ticking", "Ticking or roan spotting (T locus)", False,
            "Small coloured flecks on white areas"),
        num("loci", "Loci answered", "", "", "Always 4", output=True),
    ],
    dirs=[],
    formula="E → K → B → D, in that order: E decides if black is made, K overrides the agouti pattern, B sets black vs brown, D dilutes whatever pigment is left",
    symbols=[("E", "extension — e/e blocks all black pigment", "locus"),
             ("K", "dominant black: K^B solid, K^br brindle, k^y allows agouti", "locus"),
             ("B", "b/b turns black pigment brown", "locus"),
             ("D", "d/d dilutes black to blue and brown to lilac", "locus")],
    steps=[
        "Enter the genotype at each locus — a dog can only be E/E or E/e if it shows any black at all.",
        "Tick ticking if the dog has flecks on its white areas; that is the T locus and it is not "
        "part of the four-locus colour model.",
        "Read the predicted colour, then the gene-order explanation: it tells you which locus is "
        "actually responsible, which is what matters if you are planning a litter.",
    ],
    bands=[("e/e", "Red, yellow or cream", "no black pigment can be made, whatever the other loci say"),
           ("E/- + K^B", "Solid black", "dominant black overrides the agouti pattern"),
           ("E/- + k^y/k^y + B/-", "Black, or agouti if A allows", "the A locus decides the pattern"),
           ("b/b", "Chocolate or liver", "black pigment turned brown"),
           ("d/d", "Blue, lilac or isabella", "dilution of whatever the dog would otherwise be")],
    notes=[
        "The order matters and is the whole point of the page: a b/b dog that is also e/e is not "
        "chocolate, because with no black pigment there is nothing for B to turn brown. Epistasis "
        "runs E over K over A over B over D.",
        "Dilution is a pigment-density effect, not a colour: d/d turns black into blue and brown into "
        "lilac, and dilutes red to a paler cream.",
        "Two loci that often surprise people are missing from this model on purpose — the A (agouti) "
        "pattern, which needs a full allele series to be useful, and the merle locus, which is "
        "incompletely dominant and often unhealthy in homozygotes.",
        "Locus notation varies by author (E, EXT; K, CBD103; B, TYRP1; D, MLPH). The phenotype is the "
        "same; the letters are convention.",
    ],
    mistakes=[
        "Naming a colour from the B locus alone: a b/b dog with no black pigment is red, not chocolate.",
        "Assuming two chocolate parents give only chocolate puppies — they do, at the B locus, but E "
        "and K still decide whether any black pigment exists to be browned.",
        "Breeding two merle dogs because the colours look interesting; double merle causes deafness "
        "and eye defects, which is why merle is not offered here.",
        "Reading K^br as \"any brindle pattern\": brindle needs black pigment to stripe, so an e/e dog "
        "cannot be brindled.",
    ],
    faq=[
        ("How is dog coat colour inherited?",
         "Through a small set of loci acting in a fixed order. E decides whether black pigment is "
         "produced at all; K overrides the agouti pattern with solid black or brindle; A sets the "
         "pattern; B makes black pigment brown; D dilutes the result."),
        ("Can two black Labradors have yellow puppies?",
         "Yes — if both parents are E/e. The puppies that inherit e from both sides cannot make black "
         "pigment and are yellow, whatever their B and K loci say."),
        ("What makes a dog chocolate instead of black?",
         "Two copies of b at the TYRP1 locus, plus at least one E so that black pigment is actually "
         "being made. Without E, the B locus has nothing to act on."),
        ("Is this a DNA test?",
         "No. It predicts a phenotype from a genotype you enter. The loci are real and commercially "
         "tested, but a prediction from a pedigree is only as good as the assumed genotypes."),
    ],
    related=[("/biology/rabbit-color", "Rabbit colour genetics"),
             ("/biology/dog-size", "Dog size"),
             ("/biology/punnett-square", "Punnett square"),
             ("/biology/dihybrid-cross", "Dihybrid cross")],
    svg=("bars", {"caption": "Phenotype counts in a litter of 8 from a typical cross",
                  "series": [("Black", 3), ("Chocolate", 2), ("Yellow", 3)]}),
    icon="paw",
    keywords=["dog coat color", "coat colour genetics", "E locus", "chocolate labrador"],
    script=JS_HELPERS + r"""
  function norm(raw) { return String(raw || '').toLowerCase().replace(/[^a-z0-9]/g, ''); }
  /*
   * The panel stores a choice as a uid derived from the option *label*, so every
   * genotype label for one locus begins with the same letters ("e-e-...", "b-b-...").
   * Reading the letters back out would always pick the first option, so each locus
   * is read from the words that actually distinguish its options.
   */
  function pickE(raw) {
    var n = norm(raw);
    if (n.indexOf('noblack') >= 0) return 'ee';
    if (n.indexOf('carries') >= 0) return 'Ee';
    return 'EE';
  }
  function pickK(raw) {
    var n = norm(raw);
    if (n.indexOf('brindle') >= 0) return 'KBR';
    if (n.indexOf('solid') >= 0) return 'KB';
    return 'ky';
  }
  function pickB(raw) {
    var n = norm(raw);
    if (n.indexOf('chocolate') >= 0 || n.indexOf('brownbrown') >= 0) return 'bb';
    if (n.indexOf('carries') >= 0) return 'Bb';
    return 'BB';
  }
  function pickD(raw) {
    var n = norm(raw);
    if (n.indexOf('diluted') >= 0 || n.indexOf('lilac') >= 0) return 'dd';
    if (n.indexOf('carries') >= 0) return 'Dd';
    return 'DD';
  }
  var E_MAP = { ee: 'red/yellow', Ee: 'has black', EE: 'has black' };
  var B_MAP = { BB: 'black', Bb: 'black (carries brown)', bb: 'brown' };
  var D_MAP = { DD: 'full', Dd: 'full (carries dilute)', dd: 'dilute' };
  function colourOf(e, k, b, d) {
    // e/e: no black pigment at all — the other loci cannot put colour back
    if (e === 'ee') {
      return d === 'dd' ? 'cream (dilute red)' : 'red / yellow / golden';
    }
    // K^B makes the dog solid black whatever A would otherwise do
    if (k === 'KB') {
      if (d === 'dd') return 'blue (dilute black)';
      return 'solid black';
    }
    if (k === 'KBR') {
      if (d === 'dd') return 'blue brindle (dilute brindle)';
      return 'brindle';
    }
    // k^y/k^y: the A locus shows; we do not model A, so both pigment states appear
    if (b === 'bb') {
      if (d === 'dd') return 'lilac / isabella (dilute chocolate)';
      if (k === 'ky') return 'chocolate (or agouti-patterned brown)';
      return 'chocolate';
    }
    if (d === 'dd') return k === 'ky' ? 'blue, or blue agouti' : 'blue';
    return k === 'ky' ? 'black, or the agouti pattern (sable, tan points)' : 'black';
  }
  omni.onResult(['e_locus', 'k_locus', 'b_locus', 'd_locus', 'ticking'], function (ctx) {
    var e = pickE(ctx.getRawInput('e_locus'));
    var k = pickK(ctx.getRawInput('k_locus'));
    var b = pickB(ctx.getRawInput('b_locus'));
    var d = pickD(ctx.getRawInput('d_locus'));
    var ticking = /true|yes|1/i.test(String(ctx.getRawInput('ticking') || ''));
    var colour = colourOf(e, k, b, d);
    if (ticking) colour += ', with ticking';
    ctx.exportValue('loci', 4);
    var rows = [
      ['E (extension)', e, E_MAP[e] || ''],
      ['K (dominant black)', k === 'KB' ? 'K^B' : (k === 'KBR' ? 'K^br' : 'k^y/k^y'), k === 'KB' ? 'solid black' : (k === 'KBR' ? 'brindle' : 'lets agouti show')],
      ['B (brown)', b, B_MAP[b] || ''],
      ['D (dilution)', d, D_MAP[d] || ''],
      ['T (ticking)', ticking ? 'T/-' : 't/t', ticking ? 'flecks on white' : 'no ticking']
    ];
    var html = block('Predicted coat colour',
      'Genotype   E: ' + e + '   K: ' + (k === 'KB' ? 'K^B' : (k === 'KBR' ? 'K^br' : 'k^y/k^y'))
      + '   B: ' + b + '   D: ' + d + '\nPhenotype  ' + colour,
      e === 'ee'
        ? 'With e/e no black pigment is made, so the B, K and D loci cannot darken the dog — this is why two yellow Labradors never produce a black puppy.'
        : 'The loci act in the order E then K then A then B then D; the first one that decides the outcome wins.');
    html += table('What each locus is doing', ['Locus', 'Genotype', 'Effect'], rows);
    ctx.addHtml(html);
  });
""",
))


# --------------------------------------------------------- 3. in-vivo formulation
add(Spec(
    name="In Vivo Formulation Calculator",
    slug="in-vivo-formulation",
    summary=("Work out the dosing volume, the amount of compound to weigh out and the dilution you need "
             "before an in vivo study. Give the dose in mg/kg, the animal's weight and the stock "
             "concentration, and the page returns the volume to inject or dose orally, the total "
             "compound for the whole cohort, and whether the dose sits inside a sensible "
             "volume-to-bodyweight limit."),
    fields=[
        num("dose", "Dose", 10, "mg/kg", "Milligrams of compound per kilogram of animal"),
        num("weight", "Body weight", 25, "g", "Average weight of the animals"),
        num("animals", "Number of animals", 10, "", "Doses to prepare"),
        num("stock", "Stock concentration", 5, "mg/mL", "The solution you have or will make"),
        num("max_vol", "Maximum volume per dose", 10, "mL/kg", "5 mL/kg oral, 10 mL/kg IP are common limits"),
        num("volume", "Volume per animal", "", "µL", "", output=True),
        num("volume_kg", "Dose volume per kg", "", "mL/kg", "", output=True),
        num("compound", "Compound for the cohort", "", "mg", "Weigh this much out", output=True),
        num("stock_needed", "Minimum stock concentration", "", "mg/mL", "To stay inside the volume limit", output=True),
        num("dilution", "Dilution factor to that stock", "", "×", "", output=True),
    ],
    dirs=[
        # µL per animal = (mg/kg × g / 1000) / (mg/mL) × 1000
        d("Dose", "volume", "dose*weight/1000/stock*1000"),
        d("Dose", "volume_kg", "dose*weight/1000/stock*1000/weight"),
        d("Dose", "compound", "dose*weight/1000*animals"),
        # the weakest stock that still fits the volume limit
        d("Dose", "stock_needed", "dose/max_vol"),
        d("Dose", "dilution", "stock/(dose/max_vol)"),
    ],
    formula="V (µL) = dose (mg/kg) × body weight (g) ÷ 1000 ÷ stock (mg/mL) × 1000;  compound = dose × weight ÷ 1000 × animals",
    symbols=[("dose", "milligrams of compound per kilogram of animal", "mg/kg"),
             ("weight", "body weight of one animal", "g"),
             ("stock", "concentration of the solution you dose from", "mg/mL"),
             ("V", "volume given to one animal", "µL")],
    steps=[
        "Enter the target dose and the average weight of the animals in the cohort.",
        "Enter the stock concentration you have, or plan to make.",
        "Compare the volume per animal with the route's limit: oral and subcutaneous doses are "
        "usually capped around 10 mL/kg, intravenous around 5 mL/kg.",
        "Weigh out the compound the page reports, plus a little for losses — the figure is the "
        "theoretical minimum for the cohort.",
    ],
    bands=[("≤ 5 mL/kg", "Comfortable", "fine for every common route including IV bolus"),
           ("5 – 10 mL/kg", "Acceptable", "usual ceiling for oral gavage and subcutaneous dosing"),
           ("10 – 20 mL/kg", "High", "only for oral dosing, and it disturbs fluid balance"),
           ("above 20 mL/kg", "Too high", "raise the stock concentration instead of the volume")],
    notes=[
        "The volume limit is a physiological constraint, not a convenience: a 25 g mouse given "
        "1 mL has received 40 mL/kg, which is a fluid load large enough to change absorption and "
        "sometimes the result.",
        "If the required volume exceeds the limit, the answer is a more concentrated stock, not a "
        "larger injection. The page reports the weakest stock that still fits, and how far your "
        "current stock could be diluted toward it.",
        "The compound figure assumes no dead volume, no priming of lines and no spillage. In practice "
        "prepare 10–20 % extra, and more for a long study or a suspension.",
        "For a suspension rather than a solution, dose by mass and vortex immediately before each "
        "dose — a settled suspension is the commonest cause of a variable exposure.",
    ],
    mistakes=[
        "Mixing grams and milligrams: a 25 g mouse is 0.025 kg, and using 25 kg under-doses by 1000×.",
        "Ignoring the volume limit and dosing 20 mL/kg because the arithmetic was easier.",
        "Forgetting the vehicle-only control group when calculating how much compound to weigh out.",
        "Assuming the stock concentration is exact: check the salt form and the purity, because both "
        "change the amount of free compound.",
    ],
    faq=[
        ("How do I convert a mg/kg dose to a volume?",
         "Multiply the dose by the animal's weight in kilograms to get the mass of compound, then "
         "divide by the stock concentration. For a 25 g mouse at 10 mg/kg from a 5 mg/mL stock that "
         "is 0.25 mg ÷ 5 mg/mL = 50 µL."),
        ("What is a safe injection volume for a mouse?",
         "Roughly 10 mL/kg for oral and subcutaneous routes and 5 mL/kg for intravenous — about "
         "250 µL and 125 µL for a 25 g mouse. Above that you are dosing fluid as much as compound."),
        ("Should I weigh out extra compound?",
         "Yes. The page gives the theoretical minimum for the cohort; add 10–20 % for dead volume and "
         "losses, and more if the compound is a suspension or the study runs for days."),
        ("Does body weight matter that much?",
         "It scales the dose linearly, so a cohort that gains 10 % during a study receives 10 % more "
         "compound at the same volume. Re-weigh weekly and adjust the volume, not the concentration."),
    ],
    related=[("/biology/dilution-calculator-c1v1", "Dilution C1V1"),
             ("/biology/mass-molarity-conversion", "Mass ↔ molarity"),
             ("/health/pediatric-dose", "Paediatric dose"),
             ("/biology/serial-dilution-planner", "Serial dilution planner")],
    svg=("bars", {"caption": "Volume per dose against the usual route limits",
                  "series": [("IV", 5), ("SC", 10), ("Oral", 10), ("Your dose", 8)]}),
    icon="dropper",
    keywords=["in vivo formulation", "dosing volume", "mg/kg to volume", "mouse dosing"],
))


# ------------------------------------------------------------ 4. DNA percentage
add(Spec(
    name="DNA Percentage Calculator",
    slug="dna-percentage",
    summary=("The DNA percentage of a genome is the share of its bases that code for protein. Give the "
             "genome size and either the coding bases or a gene count with a mean gene length, and the "
             "page returns the coding percentage, the non-coding share, the gene density in genes per "
             "megabase and the mean bases per gene — the numbers that decide whether a genome is compact "
             "or mostly intergenic."),
    fields=[
        num("genome", "Genome size", 3000, "Mb", "3 000 Mb is a mammalian genome"),
        num("coding", "Coding bases", 90, "Mb", "Sum of all coding exons"),
        num("genes", "Gene count", 20000, "", "Optional — used for gene density"),
        num("coding_pct", "Coding percentage", "", "%", "", output=True),
        num("noncoding_pct", "Non-coding share", "", "%", "", output=True),
        num("gene_density", "Gene density", "", "genes/Mb", "", output=True),
        num("bases_per_gene", "Bases per gene", "", "bp", "", output=True),
        num("coding_per_gene", "Coding bases per gene", "", "bp", "", output=True),
    ],
    dirs=[
        d("Genome", "coding_pct", "coding/genome*100"),
        d("Genome", "noncoding_pct", "100-coding/genome*100"),
        d("Genome", "gene_density", "genes/genome"),
        d("Genome", "bases_per_gene", "genome*1000000/genes"),
        d("Genome", "coding_per_gene", "coding*1000000/genes"),
    ],
    formula="coding % = coding bases ÷ genome size × 100;  gene density = genes ÷ genome size (Mb);  bases per gene = genome (bp) ÷ genes",
    symbols=[("genome", "haploid genome size", "Mb"),
             ("coding", "total length of coding sequence", "Mb"),
             ("genes", "number of protein-coding genes", "—"),
             ("gene density", "how tightly genes are packed", "genes/Mb")],
    steps=[
        "Enter the genome size in megabases — one copy, not the diploid total.",
        "Enter the coding bases: the sum of all coding exons, which is what a genome annotation gives "
        "you as the total CDS length.",
        "Add the gene count if you want gene density and bases per gene; leave it as it is to skip "
        "those two lines.",
        "Compare the coding percentage across organisms: it is the single clearest number for how "
        "much of a genome is doing something.",
    ],
    bands=[("above 70 %", "Compact", "bacterial and archaeal genomes, and viral genomes"),
           ("30 – 70 %", "Dense", "small eukaryotes such as yeast and some fungi"),
           ("10 – 30 %", "Typical eukaryote", "invertebrates and many plants"),
           ("1 – 10 %", "Sparse", "vertebrates, including the human 1.5 %"),
           ("below 1 %", "Very sparse", "large plant and amphibian genomes dominated by repeats")],
    notes=[
        "The human figure is about 1.5 % coding and roughly 39 % in introns; the rest is intergenic "
        "sequence, much of it repetitive. A genome can be 50× larger than another with barely more "
        "genes — the difference is mostly repeats.",
        "Coding percentage is not the same as exon percentage: exons include untranslated regions, so "
        "exon totals run higher than coding sequence totals.",
        "Gene density and mean gene length move in opposite directions across taxa: compact genomes "
        "have short genes packed closely, which is why the bases-per-gene figure is worth reading "
        "next to the density.",
        "Genome size here is haploid. A diploid cell contains twice this, which matters if you are "
        "converting to mass of DNA per cell.",
    ],
    mistakes=[
        "Using the diploid genome size and then comparing with published haploid percentages.",
        "Entering the number of exons instead of the coding length.",
        "Comparing coding percentages between an annotation that counts only reviewed genes and one "
        "that includes predicted open reading frames.",
        "Assuming non-coding means non-functional: promoters, enhancers and non-coding RNA all live "
        "in the non-coding share.",
    ],
    faq=[
        ("What percentage of the human genome is coding?",
         "About 1.5 % — roughly 30 Mb of coding sequence in a 3 000 Mb haploid genome. Adding "
         "untranslated regions brings the exonic total to a few percent, and introns take about 39 %."),
        ("Why do some genomes have almost no non-coding DNA?",
         "Because selection against carrying extra DNA is strong in fast-growing cells with large "
         "population sizes, which is the usual explanation for bacterial genome compaction."),
        ("Is coding percentage the same as gene density?",
         "No. Gene density counts genes per megabase and says how packed the genes are; coding "
         "percentage measures how much of the sequence is coding. A genome can be gene-dense and still "
         "have a low coding percentage if its genes are mostly introns."),
        ("Can I use this for a single gene or contig?",
         "Yes, with small numbers: a 2 000 bp gene with 1 500 bp of coding sequence is 75 % coding. "
         "The same formula works at any scale."),
    ],
    related=[("/biology/coding-capacity-of-dna", "Coding capacity of DNA"),
             ("/biology/genome-copy-number", "Genome copy number"),
             ("/biology/dna-concentration", "DNA concentration"),
             ("/biology/gc-content-calculator", "GC content")],
    svg=("bars", {"caption": "Coding share of four genomes",
                  "series": [("E. coli", 88), ("Yeast", 70), ("Human", 1.5), ("Wheat", 1)]}),
    icon="dna",
    keywords=["dna percentage", "coding percentage", "gene density", "non-coding dna"],
))
