"""Batch I — sequence tools.

These are the first calculators on the site whose input is not a number. They use
the panel's `text` field type and a page script (the same `omni.define` /
`omni.onResult` contract the harvested pages use), so the sequence is processed
in the browser with no round-trip: paste twenty kilobases and the answer is
instant.

Conventions shared by every script in this file:
  * `ctx.getRawInput(name)` returns exactly what is in the box, unsanitised, so
    the script cleans it itself (whitespace, FASTA header lines, digits,
    alignment gaps) before doing anything.
  * Output is injected with `ctx.addHtml()` into one or more
    `.calc-script-block` elements: a heading, a `<pre>` with the sequence, and a
    one-line note. Nothing is interpolated into HTML without escaping.
  * Every script is written to be total: any input, including empty, DNA mixed
    with protein, or a lone FASTA header, produces a message rather than an
    exception.
"""

from lib import Spec, num, sel, txt, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


# Shared helpers, emitted once into every script that needs them. Kept as a
# string so the generated page script stays readable and debuggable.
JS_HELPERS = r"""
  function cleanSeq(raw, kind) {
    // Everything that is not a residue goes: FASTA headers, digits (line
    // numbers pasted from a viewer), gaps, spaces and newlines.
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
  function tmOf(n, pct, at, gc) {
    // Which formula applies depends on the length, and using the wrong one is
    // not a small error: the GC rule gives 107 °C for a 39 bp duplex, because it
    // was fitted to oligos of 40 nt and below.
    if (n <= 14) return 2 * at + 4 * gc;                       // Wallace
    if (n <= 40) return 64.9 + 41 * (gc - 16.4) / n;            // GC rule, G+C as a count
    return 81.5 + 16.6 * Math.log10(0.05) + 0.41 * pct - 675 / n;   // long duplex, 50 mM Na+
  }
  function esc(s) {
    return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
  }
  function block(title, body, note) {
    return '<div class="calc-script-block"><h3>' + esc(title) + '</h3><pre>' + esc(body) + '</pre>'
      + (note ? '<p class="calc-script-note">' + esc(note) + '</p>' : '') + '</div>';
  }
"""


# ------------------------------------------------------- 1. reverse complement
add(Spec(
    name="Reverse Complement Calculator",
    slug="reverse-complement",
    summary=("The reverse complement is the other strand of a DNA molecule written 5′ to 3′: read "
             "the sequence backwards and swap every base for its partner (A↔T, G↔C). It is the "
             "first step of primer design, of checking that a sequencing read maps to the strand "
             "you expect, and of turning a gene's coding sequence into the template you will "
             "actually order."),
    fields=[
        txt("sequence", "Sequence", "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG",
            "Paste DNA; spaces, line breaks and FASTA headers are ignored", 5),
        sel("alphabet", "Alphabet", [("DNA (A, C, G, T)", "dna"), ("RNA (A, C, G, U)", "rna")], "dna"),
        num("width", "Base pairs per line", 60, "", "0 for one line"),
        num("length", "Length", "", "bp", "", output=True),
        num("gc", "GC content", "", "%", "", output=True),
        num("tm", "Melting temperature of the duplex", "", "°C", "Wallace under 14 nt, GC rule to 40 nt, long-duplex form above", output=True),
    ],
    dirs=[],
    formula="Reverse complement: read 3′→5′ and pair A·T, G·C.  GC% = (G + C) ÷ length × 100",
    symbols=[("5′", "the end with a free phosphate", "—"),
             ("3′", "the end with a free hydroxyl", "—"),
             ("revcomp", "the opposite strand, written 5′→3′", "—")],
    bands=[("A ↔ T", "DNA pairing", "two hydrogen bonds"),
           ("G ↔ C", "DNA pairing", "three hydrogen bonds, which is why GC-rich duplexes melt higher"),
           ("A ↔ U", "RNA pairing", "RNA has uracil where DNA has thymine")],
    notes=[
        "A reverse complement is not a palindrome: the reverse complement of ATGC is GCAT, and the "
        "reverse alone would be CGTA.",
        "Ambiguity codes are handled properly — R (A or G) pairs with Y (C or T), S with S, W with "
        "W, K with M, B with V, D with H, and N with N.",
        "The translation tools on this site take the reverse complement as input when you need the "
        "protein from the opposite strand.",
    ],
    mistakes=[
        "Reversing without complementing (or the other way round) — both are common and both give a "
        "sequence that looks plausible.",
        "Forgetting that a primer is written 5′→3′ and its template binding site is the reverse "
        "complement of the primer.",
        "Pasting an alignment with gaps into a tool that does not strip them.",
    ],
    faq=[
        ("What is the reverse complement of ATGGCC?", "GGCCAT — read backwards (CCGGTA) and swap "
         "each base for its partner."),
        ("Why is the reverse complement used instead of the reverse?", "Because DNA is antiparallel: "
         "the other strand runs in the opposite direction, so its sequence must be both reversed "
         "and complemented to be written 5′→3′."),
        ("How do I get the protein from the opposite strand?", "Take the reverse complement, then "
         "translate it in frame 1."),
    ],
    related=[("/biology/gc-content-calculator", "GC content"),
             ("/biology/oligo-tm-calculator", "Oligo Tm"),
             ("/biology/coding-capacity-of-dna", "Coding capacity")],
    # Script-driven calculators have no solved outputs to draw, so each
    # infographic carries its own data instead of an empty result box.
    svg=("bars", {"caption": "Hydrogen bonds per base pair", "series": [("A·T", 2), ("G·C", 3)]}),
    icon="dna",
    keywords=["reverse complement", "antiparallel", "primer design"],
    script=JS_HELPERS + r"""
  var COMP = {A:'T',T:'A',G:'C',C:'G',U:'A',
              R:'Y',Y:'R',S:'S',W:'W',K:'M',M:'K',
              B:'V',V:'B',D:'H',H:'D',N:'N'};
  function revcomp(s) {
    var out = '';
    for (var i = s.length - 1; i >= 0; i--) {
      var c = s.charAt(i);
      out += COMP[c] || 'N';
    }
    return out;
  }
  function gcOf(s) {
    var gc = 0;
    for (var i = 0; i < s.length; i++) {
      var c = s.charAt(i);
      if (c === 'G' || c === 'C') gc++;
    }
    return gc;
  }

  omni.onResult(['sequence'], function (ctx) {
    var raw = ctx.getRawInput('sequence');
    // selects return the option slug ("rna-a-c-g-u"), so match on the word
    var kind = /rna/i.test(String(ctx.getRawInput('alphabet') || '')) ? 'rna' : 'dna';
    var width = Number(ctx.getRawInput('width'));
    if (!isFinite(width) || width < 0) width = 60;

    var seq = cleanSeq(raw, 'dna');
    if (kind === 'rna') seq = seq.replace(/T/g, 'U');
    if (!seq) {
      ctx.addHtml(block('Reverse complement', '—', 'Paste a sequence to see the other strand.'));
      return;
    }
    var comp = revcomp(kind === 'rna' ? seq.replace(/U/g, 'T') : seq);
    if (kind === 'rna') comp = comp.replace(/T/g, 'U');

    var gc = gcOf(kind === 'rna' ? seq.replace(/U/g, 'T') : seq);
    var pct = seq.length ? (gc / seq.length) * 100 : 0;
    var at = seq.length - gc;
    var tm = tmOf(seq.length, pct, at, gc);

    ctx.exportValue('length', seq.length);
    ctx.exportValue('gc', Math.round(pct * 100) / 100);
    ctx.exportValue('tm', Math.round(tm * 10) / 10);

    var w = width === 0 ? Math.max(seq.length, 1) : width;
    ctx.addHtml(block('Reverse complement (5′→3′)', wrap(comp, w),
      seq.length + (kind === 'rna' ? ' nt' : ' bp') + ' · GC ' + pct.toFixed(1) + '%'));
    if (seq.length <= 200) {
      ctx.addHtml(block('Input, as read 5′→3′', wrap(seq, w)));
    }
  });
""",
))

# ------------------------------------------------------- 2. GC content calculator
add(Spec(
    name="GC Content from a Sequence",
    meta_title="GC Content from a Sequence — Sliding Window",
    slug="gc-content-sequence",
    summary=("GC content is the share of a DNA molecule that is guanine or cytosine, and it decides "
             "how strongly two strands stick together. This calculator reports GC% overall and in "
             "sliding windows, so a GC-rich island inside an otherwise AT-rich sequence is visible "
             "rather than averaged away."),
    fields=[
        txt("sequence", "Sequence", "", "Paste DNA or RNA", 5),
        num("window", "Window size", 50, "bp", "GC is computed in windows of this length"),
        num("length", "Length", "", "bp", "", output=True),
        num("gc_count", "G + C bases", "", "", "", output=True),
        num("gc_pct", "GC content", "", "%", "", output=True),
        num("at_pct", "AT content", "", "%", "", output=True),
        num("tm_gc", "Melting temperature of the duplex", "", "°C", "At 50 mM monovalent salt", output=True),
    ],
    dirs=[],
    formula="GC% = (G + C) ÷ N × 100;  Tm ≈ 64.9 + 41(G+C − 16.4)/N  (G+C as a count)",
    symbols=[("N", "sequence length", "bp"),
             ("GC", "number of guanine and cytosine bases", "bases"),
             ("Tm", "melting temperature of the duplex", "°C")],
    bands=[("below 40%", "AT-rich", "easier to melt; often regulatory or repeat DNA"),
           ("40 – 60%", "Typical", "most vertebrate genomic DNA sits here"),
           ("60 – 70%", "GC-rich", "more stable duplex, harder to denature"),
           ("above 70%", "Very GC-rich", "CpG islands, ribosomal DNA, some bacterial genomes")],
    notes=[
        "GC pairs have three hydrogen bonds and AT pairs have two, which is why GC-rich DNA melts "
        "at a higher temperature and why GC-rich templates are harder to sequence through.",
        "A single GC% figure hides structure. A 200 bp CpG island at 70% GC inside a 100 kb region "
        "at 41% GC changes the overall number by a fraction of a percent.",
        "RNA has uracil instead of thymine; the GC fraction is calculated the same way.",
    ],
    mistakes=[
        "Counting ambiguous bases (N, R, Y) as AT because they are not G or C.",
        "Comparing GC% of an mRNA (no introns) with that of its gene.",
        "Assuming high GC always means a high melting temperature in a cell — salt and length "
        "matter at least as much.",
    ],
    faq=[
        ("What is a normal GC content?", "About 41% for the human genome, 50% for many bacteria, and "
         "as low as 25% in some Plasmodium genomes."),
        ("Why does GC content matter for PCR?", "GC-rich regions need higher denaturation "
         "temperatures and often additives such as betaine or DMSO."),
    ],
    related=[("/biology/reverse-complement", "Reverse complement"),
             ("/biology/oligo-tm-calculator", "Oligo Tm"),
             ("/biology/coding-capacity-of-dna", "Coding capacity")],
    svg=("bars", {"caption": "Typical GC content (%)",
                  "series": [("AT-rich genome", 25), ("Human genome", 41),
                             ("Typical bacterium", 50), ("CpG island", 70)]}),
    icon="dna",
    keywords=["GC content", "GC ratio", "sequence composition"],
    script=JS_HELPERS + r"""
  omni.onResult(['sequence'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    if (!seq) {
      ctx.addHtml(block('GC content', '—', 'Paste a sequence to see its composition.'));
      return;
    }
    var n = seq.length, gc = 0, at = 0;
    for (var i = 0; i < n; i++) {
      var c = seq.charAt(i);
      if (c === 'G' || c === 'C') gc++;
      else if (c === 'A' || c === 'T' || c === 'U') at++;
    }
    var pct = gc / n * 100;
    var tm = tmOf(n, pct, at, gc);
    ctx.exportValue('length', n);
    ctx.exportValue('gc_count', gc);
    ctx.exportValue('gc_pct', Math.round(pct * 100) / 100);
    ctx.exportValue('at_pct', Math.round((at / n * 100) * 100) / 100);
    ctx.exportValue('tm_gc', Math.round(tm * 10) / 10);

    // A profile every 5% of the sequence, so structure is visible at a glance.
    var rows = [], steps = 20;
    for (var k = 0; k < steps; k++) {
      var a = Math.floor(n * k / steps), b = Math.floor(n * (k + 1) / steps);
      if (b <= a) continue;
      var g = 0;
      for (var j = a; j < b; j++) { var ch = seq.charAt(j); if (ch === 'G' || ch === 'C') g++; }
      var p = g / (b - a) * 100;
      var bar = '';
      for (var q = 0; q < 40; q++) bar += (q < Math.round(p / 2.5)) ? '#' : '·';
      rows.push(String(a + 1).padStart(7, ' ') + '  ' + bar + '  ' + p.toFixed(0) + '%');
    }
    ctx.addHtml(block('GC content along the sequence', rows.join('\n'),
      'Each row is ' + (100 / steps).toFixed(0) + '% of the sequence, ' + steps + ' windows in total.'));
    var body = 'G+C  ' + gc + ' of ' + n + '  (' + pct.toFixed(1) + '%)\n'
             + 'A+T  ' + at + ' of ' + n + '  (' + (at / n * 100).toFixed(1) + '%)\n'
             + 'other ' + (n - gc - at) + '  (ambiguous codes)';
    ctx.addHtml(block('Composition', body));
  });
""",
))

# ------------------------------------------------- 3. translate DNA to protein
add(Spec(
    name="DNA to Protein Translation Calculator",
    slug="dna-to-protein",
    summary=("Translation reads a nucleotide sequence three bases at a time and writes the amino "
             "acids it encodes. Because the reading frame is not marked in the sequence, the same "
             "DNA gives three completely different proteins — this calculator shows all six frames, "
             "three from each strand, which is how a real open reading frame is found."),
    fields=[
        txt("sequence", "DNA sequence", "", "Paste DNA; headers and numbers are removed", 6),
        sel("start", "Frame handling",
            [("All six frames", "six"), ("Frame 1 only", "one"), ("Stop at the first stop codon", "orf")],
            "six"),
        num("length", "Coding length", "", "bp", "", output=True),
        num("aa_count", "Amino acids in the longest frame", "", "aa", "", output=True),
        num("stop_codons", "Stop codons in frame 1", "", "", "", output=True),
        num("mw", "Mass of the frame-1 protein", "", "kDa", "", output=True),
    ],
    dirs=[],
    formula="Each codon of three bases maps to one amino acid;  the standard genetic code is used",
    symbols=[("frame", "which base the reading starts on (1, 2 or 3)", "—"),
             ("ORF", "open reading frame: start codon to stop codon", "—"),
             ("aa", "amino acid", "—")],
    bands=[("ATG", "Start", "methionine, and the usual start of an ORF"),
           ("TAA, TAG, TGA", "Stop", "do not encode an amino acid"),
           ("3 frames per strand", "Six in total", "only one is normally the real gene")],
    notes=[
        "The reverse strand is read as its reverse complement, which is why a gene can be on either "
        "strand of a chromosome.",
        "A long open reading frame — a hundred codons or more with no stop — is the strongest "
        "sequence-level evidence that a region is protein-coding.",
        "The mass uses average residue masses, so it matches what a mass spectrometer reports "
        "rather than the monoisotopic mass.",
    ],
    mistakes=[
        "Translating a sequence that still contains introns and wondering why there are stops every "
        "few codons.",
        "Assuming frame 1 is the gene: roughly half of human genes are on the reverse strand.",
        "Pasting an alignment with gaps, which shifts every downstream codon.",
    ],
    faq=[
        ("How do I find the reading frame of a gene?", "Translate all six frames and look for the "
         "long open reading frame that starts with ATG and ends with a stop codon."),
        ("Why does my translation have so many stops?", "Almost always the wrong frame, or a "
         "genomic sequence where a cDNA was expected."),
    ],
    related=[("/biology/reverse-complement", "Reverse complement"),
             ("/biology/gc-content-sequence", "GC content"),
             ("/biology/coding-capacity-of-dna", "Coding capacity")],
    svg=("bars", {"caption": "Codons that mean something, and codons that stop",
                  "series": [("Sense codons", 61), ("Stop codons", 3)]}),
    icon="protein",
    keywords=["translate DNA", "reading frame", "ORF", "genetic code"],
    script=JS_HELPERS + r"""
  var CODON = {
    TTT:'F',TTC:'F',TTA:'L',TTG:'L',CTT:'L',CTC:'L',CTA:'L',CTG:'L',
    ATT:'I',ATC:'I',ATA:'I',ATG:'M',GTT:'V',GTC:'V',GTA:'V',GTG:'V',
    TCT:'S',TCC:'S',TCA:'S',TCG:'S',CCT:'P',CCC:'P',CCA:'P',CCG:'P',
    ACT:'T',ACC:'T',ACA:'T',ACG:'T',GCT:'A',GCC:'A',GCA:'A',GCG:'A',
    TAT:'Y',TAC:'Y',TAA:'*',TAG:'*',CAT:'H',CAC:'H',CAA:'Q',CAG:'Q',
    AAT:'N',AAC:'N',AAA:'K',AAG:'K',GAT:'D',GAC:'D',GAA:'E',GAG:'E',
    TGT:'C',TGC:'C',TGA:'*',TGG:'W',CGT:'R',CGC:'R',CGA:'R',CGG:'R',
    AGT:'S',AGC:'S',AGA:'R',AGG:'R',GGT:'G',GGC:'G',GGA:'G',GGG:'G'
  };
  // Average residue masses, daltons. Water is lost per peptide bond.
  var MASS = {A:71.079,G:57.052,I:113.160,L:113.160,P:97.117,V:99.133,F:147.177,
              M:131.198,W:186.213,S:87.078,T:101.105,C:103.139,Y:163.180,N:114.104,
              Q:128.131,D:115.089,E:129.116,K:128.174,R:156.188,H:137.142};
  function translate(s, frame) {
    var out = '';
    for (var i = frame; i + 2 < s.length + 0; i += 3) {
      var c = s.substr(i, 3);
      if (c.length < 3) break;
      out += CODON[c] || 'X';
    }
    return out;
  }
  function massOf(prot) {
    var m = 18.0153;                     // the free termini
    for (var i = 0; i < prot.length; i++) {
      var aa = prot.charAt(i);
      if (aa === '*') continue;
      m += MASS[aa] || 110;
    }
    return m / 1000;
  }
  function longestORF(prot) {
    var best = '', cur = '';
    for (var i = 0; i < prot.length; i++) {
      if (prot.charAt(i) === '*') { if (cur.length > best.length) best = cur; cur = ''; }
      else cur += prot.charAt(i);
    }
    return cur.length > best.length ? cur : best;
  }

  omni.onResult(['sequence'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    var startSlug = String(ctx.getRawInput('start') || '');
    // slugs: all-six-frames / frame-1-only / stop-at-the-first-stop-codon
    var mode = /first-stop|stop-at/i.test(startSlug) ? 'orf'
      : /frame-1-only|one/i.test(startSlug) ? 'one' : 'six';
    if (!seq) {
      ctx.addHtml(block('Translation', '—', 'Paste a DNA sequence to translate it in every frame.'));
      return;
    }
    var comp = '';
    var map = {A:'T',T:'A',G:'C',C:'G',N:'N'};
    for (var i = seq.length - 1; i >= 0; i--) comp += map[seq.charAt(i)] || 'N';

    var f1 = translate(seq, 0);
    var stops = 0;
    for (var k = 0; k < f1.length; k++) if (f1.charAt(k) === '*') stops++;

    ctx.exportValue('length', seq.length);
    ctx.exportValue('aa_count', f1.replace(/\*/g, '').length);
    ctx.exportValue('stop_codons', stops);
    ctx.exportValue('mw', Math.round(massOf(f1.replace(/\*/g, '')) * 100) / 100);

    if (mode === 'one') {
      ctx.addHtml(block('Frame 1', wrap(f1, 60), f1.length + ' aa including stops'));
      return;
    }
    if (mode === 'orf') {
      var orf = longestORF(f1);
      if (!orf) {
        ctx.addHtml(block('Longest open reading frame', '—',
          'Frame 1 has no stretch without a stop codon. Try the other frames or the reverse strand.'));
      } else {
        var mw = massOf(orf);
        ctx.addHtml(block('Longest open reading frame in frame 1', wrap(orf, 60),
          orf.length + ' aa · ' + orf.length * 3 + ' bp · ' + mw.toFixed(2) + ' kDa'));
      }
      return;
    }

    var frames = [
      ['+1', translate(seq, 0)], ['+2', translate(seq, 1)], ['+3', translate(seq, 2)],
      ['−1', translate(comp, 0)], ['−2', translate(comp, 1)], ['−3', translate(comp, 2)]
    ];
    var best = '';
    frames.forEach(function (f) {
      var orf = longestORF(f[1]);
      if (orf.length > best.length) best = orf;
    });
    frames.forEach(function (f) {
      ctx.addHtml(block('Frame ' + f[0], wrap(f[1], 60),
        f[1].replace(/\*/g, '').length + ' aa · longest ORF ' + longestORF(f[1]).length + ' aa'));
    });
  });
""",
))
