"""Batch K — restriction mapping, ORF finding, primer dimers, and lab arithmetic.

Three script-driven tools that need a real look at a sequence, plus five numeric
calculators that are ordinary bench arithmetic. Same conventions as batches I
and J: every script is total (any input, including empty or protein letters,
produces a message rather than an exception), everything it publishes is a
finite number, and every internal link resolves before the batch ships.
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
  var COMP = {A:'T',T:'A',G:'C',C:'G',U:'A',R:'Y',Y:'R',S:'S',W:'W',K:'M',M:'K',
              B:'V',V:'B',D:'H',H:'D',N:'N'};
  function revcomp(s) {
    var out = '';
    for (var i = s.length - 1; i >= 0; i--) out += COMP[s.charAt(i)] || 'N';
    return out;
  }
"""


# ------------------------------------------------------ 1. restriction digest
add(Spec(
    name="Restriction Digest Calculator",
    slug="restriction-digest",
    summary=("Work out where a restriction enzyme cuts a DNA sequence and how big the fragments "
             "will be. Paste a plasmid or a PCR product, choose one enzyme or two, and the map "
             "gives every cut site, the fragment sizes in base pairs and what the gel will look "
             "like — the check you want before committing a digest."),
    fields=[
        txt("sequence", "DNA sequence", "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGGAATTCGGATCCAAGCTTGTCGACTCTAGAGGTACC",
            "Paste the plasmid or the whole amplicon; FASTA headers are ignored", 6),
        sel("enzyme1", "Enzyme 1", [
            ("EcoRI (G^AATTC)", "ecori"), ("BamHI (G^GATCC)", "bamhi"), ("HindIII (A^AGCTT)", "hindiii"),
            ("NotI (GC^GGCCGC)", "noti"), ("XhoI (C^TCGAG)", "xhoi"), ("SalI (G^TCGAC)", "sali"),
            ("PstI (CTGCA^G)", "psti"), ("XbaI (T^CTAGA)", "xbai"), ("KpnI (GGTAC^C)", "kpni"),
            ("SmaI (CCC^GGG)", "smai")], "ecori"),
        sel("enzyme2", "Enzyme 2", [
            ("None", "none"), ("BamHI (G^GATCC)", "bamhi"), ("HindIII (A^AGCTT)", "hindiii"),
            ("NotI (GC^GGCCGC)", "noti"), ("XhoI (C^TCGAG)", "xhoi"), ("SalI (G^TCGAC)", "sali"),
            ("XbaI (T^CTAGA)", "xbai"), ("NcoI (C^CATGG)", "ncoi"), ("NdeI (CA^TATG)", "ndei"),
            ("SacI (GAGCT^C)", "saci")], "none"),
        sel("topology", "Molecule", [("Linear", "linear"), ("Circular (plasmid)", "circular")], "linear"),
        num("length", "Sequence length", "", "bp", "", output=True),
        num("sites", "Cut sites", "", "", "Both enzymes together", output=True),
        num("fragments", "Fragments", "", "", "", output=True),
        num("largest", "Largest fragment", "", "bp", "", output=True),
        num("smallest", "Smallest fragment", "", "bp", "", output=True),
    ],
    dirs=[],
    formula=("Distance between adjacent cut sites gives each fragment; for a circular molecule the last "
             "fragment wraps from the final site back to the first.  Σ fragments = sequence length"),
    symbols=[("^", "where the enzyme cuts, on the top strand", "—"),
             ("bp", "base pair", "—"),
             ("site", "a recognition sequence, usually 4–8 bp and palindromic", "—")],
    bands=[("1 fragment", "No cut", "the enzyme does not cut, or cuts once on a circle"),
           ("2 – 4 fragments", "Diagnostic", "a good check on a clone's identity"),
           ("more than 6", "Frequent cutter", "hard to read on a gel; use a different enzyme")],
    notes=[
        "A circular molecule cut once gives one linear fragment; cut twice it gives two fragments "
        "whose sizes add up to the plasmid length.",
        "Fragment sizes are what a gel will show. Two fragments of similar size appear as one thick "
        "band, which is why a double digest that gives 1 200 and 1 250 bp is a poor diagnostic.",
        "Methylation blocks many enzymes in vivo: Dam methylation stops MboI and ClaI, Dcm stops "
        "EcoRII. A site that exists in the sequence may still not cut in a plasmid prepared from "
        "E. coli.",
    ],
    mistakes=[
        "Pasting only the insert when the question is about the plasmid map.",
        "Forgetting that a PCR product is linear while the template was circular.",
        "Assuming a single-cutter is unique in the whole construct when only part of it was pasted.",
    ],
    faq=[
        ("How many fragments does a circular plasmid give with two cuts?", "Two — the plasmid is "
         "split at both sites and the two arcs add up to the full length."),
        ("Why does an enzyme not cut a site that is in the sequence?", "Usually methylation (Dam or "
         "Dcm), supercoiling, or a buffer that does not suit the enzyme."),
        ("How do I pick a diagnostic digest?", "Choose an enzyme that gives two or three clearly "
         "differently sized fragments, nothing within 15% of another."),
    ],
    related=[("/biology/dna-pattern-finder", "DNA pattern finder"),
             ("/biology/dna-molecular-weight-calculator", "DNA molecular weight"),
             ("/biology/dsdna-ug-to-pmol", "dsDNA µg to pmol")],
    svg=("bars", {"caption": "A typical double digest on a 3 kb plasmid",
                  "series": [("Fragment 1", 1850), ("Fragment 2", 900), ("Fragment 3", 250)]}),
    icon="dna",
    keywords=["restriction digest", "restriction map", "fragment sizes", "double digest"],
    script=JS_HELPERS + r"""
  // Recognition sequence, cut offset on the top strand, and the enzyme name.
  // The offsets are the published ones for these enzymes.
  var ENZYMES = {
    ecori:   {name: 'EcoRI',   site: 'GAATTC',   cut: 1},
    bamhi:   {name: 'BamHI',   site: 'GGATCC',   cut: 1},
    hindiii: {name: 'HindIII', site: 'AAGCTT',   cut: 1},
    noti:    {name: 'NotI',    site: 'GCGGCCGC', cut: 2},
    xhoi:    {name: 'XhoI',    site: 'CTCGAG',   cut: 1},
    sali:    {name: 'SalI',    site: 'GTCGAC',   cut: 1},
    psti:    {name: 'PstI',    site: 'CTGCAG',   cut: 5},
    xbai:    {name: 'XbaI',    site: 'TCTAGA',   cut: 1},
    kpni:    {name: 'KpnI',    site: 'GGTACC',   cut: 5},
    smai:    {name: 'SmaI',    site: 'CCCGGG',   cut: 3},
    ncoi:    {name: 'NcoI',    site: 'CCATGG',   cut: 1},
    ndei:    {name: 'NdeI',    site: 'CATATG',   cut: 2},
    saci:    {name: 'SacI',    site: 'GAGCTC',   cut: 5}
  };
  function sitesOf(seq, enz, circular) {
    // search both strands: a palindromic site is found once, a non-palindromic
    // one (BsaI and friends) can appear on either strand
    var hits = [], i, hay = seq, len = enz.site.length;
    for (i = 0; i + len <= hay.length; i++) {
      if (hay.substr(i, len) === enz.site) hits.push(i + enz.cut);
    }
    var rc = revcomp(seq), rcSite = revcomp(enz.site);
    if (rcSite !== enz.site) {
      for (i = 0; i + len <= rc.length; i++) {
        if (rc.substr(i, len) === rcSite) {
          // convert a position on the bottom strand to the top-strand coordinate
          hits.push(seq.length - (i + len) + (len - enz.cut));
        }
      }
    }
    if (circular) {
      // a circular molecule also has the site spanning the origin
      var doubled = seq + seq.substring(0, Math.min(len, seq.length));
      for (i = seq.length; i + len <= doubled.length; i++) {
        if (doubled.substr(i, len) === enz.site) hits.push(i + enz.cut - seq.length);
      }
      hits = hits.map(function (p) { return ((p % seq.length) + seq.length) % seq.length; });
    }
    hits.sort(function (a, b) { return a - b; });
    var out = [];
    hits.forEach(function (p) { if (out.indexOf(p) < 0) out.push(p); });
    return out;
  }
  function fragmentsOf(cuts, n, circular) {
    if (!cuts.length) return [];
    var frs = [];
    for (var i = 1; i < cuts.length; i++) frs.push(cuts[i] - cuts[i - 1]);
    if (circular) frs.push(n - cuts[cuts.length - 1] + cuts[0]);
    else {
      if (cuts[0] > 0) frs.unshift(cuts[0]);
      if (cuts[cuts.length - 1] < n) frs.push(n - cuts[cuts.length - 1]);
    }
    return frs;
  }
  omni.onResult(['sequence', 'enzyme1', 'enzyme2', 'topology'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    if (seq.length < 8) {
      ctx.addHtml(block('Restriction map', '—', 'Paste a DNA sequence of at least 8 bp.'));
      return;
    }
    var circular = /circular/i.test(String(ctx.getRawInput('topology') || ''));
    // the option slug is "<key>-<site>", e.g. "bamhi-g-gatcc", so the key is the
    // part before the first hyphen
    var key1 = String(ctx.getRawInput('enzyme1') || 'ecori').split('-')[0];
    var key2 = String(ctx.getRawInput('enzyme2') || 'none').split('-')[0];
    var e1 = ENZYMES[key1] || ENZYMES.ecori;
    var e2 = key2 === 'none' ? null : (ENZYMES[key2] || null);
    if (e2 && e2.name === e1.name) e2 = null;

    var cuts1 = sitesOf(seq, e1, circular);
    var cuts2 = e2 ? sitesOf(seq, e2, circular) : [];
    var all = [];
    cuts1.forEach(function (p) { all.push({p: p, e: e1.name, off: 0}); });
    cuts2.forEach(function (p) { all.push({p: p, e: e2.name, off: 0}); });
    all.sort(function (a, b) { return a.p - b.p; });
    var positions = [];
    all.forEach(function (c) { if (positions.indexOf(c.p) < 0) positions.push(c.p); });

    var frs = fragmentsOf(positions, seq.length, circular);
    ctx.exportValue('length', seq.length);
    ctx.exportValue('sites', all.length);
    ctx.exportValue('fragments', frs.length);
    ctx.exportValue('largest', frs.length ? Math.max.apply(null, frs) : 0);
    ctx.exportValue('smallest', frs.length ? Math.min.apply(null, frs) : 0);

    ctx.addHtml(block('Cut sites',
      seq.length + ' bp ' + (circular ? 'circular' : 'linear') + ' molecule\n'
      + e1.name + ': ' + (cuts1.length ? cuts1.map(function (p) { return p + 1; }).join(', ') : 'no site')
      + (e2 ? '\n' + e2.name + ': ' + (cuts2.length ? cuts2.map(function (p) { return p + 1; }).join(', ')
        : 'no site') : '')
      + '\nEnzymes used: ' + all.length + ' · fragments: ' + frs.length,
      'Cut positions are 1-based and mark the first base of the downstream fragment.'));

    if (frs.length) {
      var sorted = frs.slice().sort(function (a, b) { return b - a; });
      ctx.addHtml(table('Fragments', ['Fragment', 'Size (bp)', 'Share of the molecule'],
        sorted.map(function (f, i) {
          return [String(i + 1), String(f), (f / seq.length * 100).toFixed(1) + '%'];
        }),
        'Sorted largest first, the order a gel shows them. Fragments within 10% of each other '
        + 'will run as a single band.'));
    } else {
      ctx.addHtml(block('Fragments', 'The sequence is not cut',
        'Neither enzyme has a site here. Check the topology — a single cut on a circle gives one '
        + 'linear fragment, not two.'));
    }
  });
""",
))


# --------------------------------------------------------------- 2. ORF finder
add(Spec(
    name="ORF Finder",
    slug="orf-finder",
    summary=("An ORF finder lists every open reading frame in a sequence: each stretch between a start and "
             "a stop codon. It is how you decide which frame to express, whether a cloned insert is "
             "intact, and where a sequencing read's protein should start."),
    fields=[
        txt("sequence", "DNA sequence", "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTTTAATGA",
            "Paste DNA; FASTA headers and digits are ignored", 6),
        num("min_aa", "Minimum protein length", 30, "aa", "Shorter ORFs are ignored"),
        sel("starts", "Count as a start", [("ATG only", "atg"),
                                           ("ATG, GTG and TTG (bacterial)", "bacterial")], "atg"),
        num("orfs", "Open reading frames", "", "", "", output=True),
        num("longest", "Longest ORF", "", "aa", "", output=True),
        num("forward", "On the forward strand", "", "", "", output=True),
        num("reverse", "On the reverse strand", "", "", "", output=True),
        num("stops", "Stop codons in frame", "", "", "All six frames together", output=True),
    ],
    dirs=[],
    formula=("An ORF runs from a start codon to the first in-frame stop.  Length in aa = (stop − start) ÷ 3.  "
             "Six frames = three on the forward strand and three on its reverse complement"),
    symbols=[("ORF", "open reading frame", "—"),
             ("frame", "one of the three registers a sequence can be read in", "—"),
             ("aa", "amino acid", "—")],
    bands=[("under 100 aa", "Short ORF", "often a false call in a random sequence"),
           ("100 – 300 aa", "Typical protein", "most bacterial proteins fall here"),
           ("above 500 aa", "Large protein", "check for a fused or unfused tag")],
    notes=[
        "In a random DNA sequence an ORF of 100 codons appears by chance roughly once per 60 kb, so a "
        "short ORF on its own proves nothing.",
        "The longest ORF is not automatically the gene: in a bacterial operon the first gene may be "
        "shorter than a downstream one, and on the reverse strand there may be an equally long "
        "frame.",
        "The bacterial start set (ATG, GTG, TTG) is worth using on prokaryotic sequence; eukaryotic "
        "scans should stay with ATG.",
    ],
    mistakes=[
        "Reporting an ORF that starts mid-gene because the real start codon is upstream of the "
        "pasted region.",
        "Forgetting the reverse strand — a gene can be on either strand.",
        "Assuming the first ATG is the start; in eukaryotes the first ATG in a good Kozak context "
        "is the better guess.",
    ],
    faq=[
        ("What is an open reading frame?", "A stretch with no stop codon in a given frame, usually "
         "counted from a start codon to the next in-frame stop."),
        ("Why six frames?", "DNA is double-stranded, and each strand can be read in three registers, "
         "so a sequence has six possible protein products."),
        ("How long must an ORF be to be believable?", "In bacteria, 100 codons or more; in "
         "eukaryotes, longer, because introns break the frame."),
    ],
    related=[("/biology/dna-to-protein", "DNA to protein"),
             ("/biology/reverse-complement", "Reverse complement"),
             ("/biology/dna-pattern-finder", "DNA pattern finder")],
    svg=("bars", {"caption": "Open reading frames are read from six registers",
                  "series": [("Forward frames", 3), ("Reverse frames", 3)]}),
    icon="dna",
    keywords=["ORF finder", "open reading frame", "six frames", "start codon"],
    script=JS_HELPERS + r"""
  var CODON_TABLE = 'FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG';
  var BASES = 'TCAG';
  function aaOf(codon) {
    var i1 = BASES.indexOf(codon.charAt(0)), i2 = BASES.indexOf(codon.charAt(1)),
        i3 = BASES.indexOf(codon.charAt(2));
    if (i1 < 0 || i2 < 0 || i3 < 0) return null;
    return CODON_TABLE.charAt(16 * i1 + 4 * i2 + i3);
  }
  function findOrfs(seq, frame, starts, minAa, strand) {
    var found = [], start = -1, stops = 0, i, codon, aa;
    for (i = frame; i + 3 <= seq.length; i += 3) {
      codon = seq.substr(i, 3);
      aa = aaOf(codon);
      if (aa === null) { start = -1; continue; }
      if (aa === '*') {
        stops++;
        if (start >= 0 && (i - start) / 3 >= minAa) {
          found.push({start: start, end: i + 3, aa: (i - start) / 3, strand: strand, frame: frame + 1});
        }
        start = -1;
        continue;
      }
      if (start < 0 && starts.indexOf(codon) >= 0) start = i;
    }
    // an ORF running to the end of the pasted sequence has no stop yet
    if (start >= 0 && (seq.length - start) / 3 >= minAa) {
      found.push({start: start, end: seq.length, aa: Math.floor((seq.length - start) / 3),
                  strand: strand, frame: frame + 1, open: true});
    }
    return {orfs: found, stops: stops};
  }
  omni.onResult(['sequence', 'min_aa', 'starts'], function (ctx) {
    var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
    var minAa = Number(ctx.getRawInput('min_aa'));
    if (!isFinite(minAa) || minAa < 1) minAa = 30;
    if (seq.length < 12) {
      ctx.addHtml(block('Open reading frames', '—', 'Paste at least a dozen bases.'));
      return;
    }
    var starts = /bacterial/i.test(String(ctx.getRawInput('starts') || ''))
      ? ['ATG', 'GTG', 'TTG'] : ['ATG'];
    var rc = revcomp(seq);
    var all = [], stops = 0, i;
    for (i = 0; i < 3; i++) {
      var f = findOrfs(seq, i, starts, minAa, 'forward');
      all = all.concat(f.orfs); stops += f.stops;
      var r = findOrfs(rc, i, starts, minAa, 'reverse');
      all = all.concat(r.orfs); stops += r.stops;
    }
    all.sort(function (a, b) { return b.aa - a.aa; });
    var longest = all.length ? all[0].aa : 0;
    var fwd = all.filter(function (o) { return o.strand === 'forward'; }).length;

    ctx.exportValue('orfs', all.length);
    ctx.exportValue('longest', longest);
    ctx.exportValue('forward', fwd);
    ctx.exportValue('reverse', all.length - fwd);
    ctx.exportValue('stops', stops);

    if (!all.length) {
      ctx.addHtml(block('Open reading frames',
        'None of at least ' + minAa + ' aa',
        'No start codon in the six frames is followed by ' + minAa
        + ' codons without a stop. Lower the minimum length, or try the bacterial start set.'));
      return;
    }
    ctx.addHtml(block('Longest open reading frame',
      'Frame ' + (all[0].strand === 'forward' ? '+' : '−') + all[0].frame
      + ' · ' + all[0].aa + ' aa · ' + all[0].start + '–' + all[0].end + ' bp'
      + (all[0].open ? ' (runs to the end of the sequence)' : ''),
      all.length + ' ORF' + (all.length === 1 ? '' : 's') + ' of at least ' + minAa
      + ' aa · ' + fwd + ' on the forward strand, ' + (all.length - fwd) + ' on the reverse.'));
    ctx.addHtml(table('Open reading frames', ['Frame', 'From', 'To', 'Length (aa)', 'Start'],
      all.slice(0, 20).map(function (o) {
        return [(o.strand === 'forward' ? '+' : '−') + o.frame, String(o.start + 1),
                String(o.end), String(o.aa), o.open ? 'no stop yet' : 'stop'];
      }),
      all.length > 20 ? 'Showing the 20 longest of ' + all.length + '.' : ''));
  });
""",
))


# -------------------------------------------------------- 3. primer dimers
add(Spec(
    name="Primer Dimer Checker",
    slug="primer-dimer-checker",
    summary=("Primer dimers are the most common reason a PCR reaction produces no product: the "
             "primers pair with each other or with themselves and the polymerase extends that "
             "product instead. This tool scores the 3′ complementarity of a pair, each primer's "
             "self-dimer and its hairpin, and says plainly whether the pair is safe."),
    fields=[
        txt("forward", "Forward primer (5′→3′)", "ATGGCCATTGTAATGGGCCG", "Paste the primer", 2),
        txt("reverse", "Reverse primer (5′→3′)", "CTATCGGGCACCCTTTCAG", "Paste the primer", 2),
        num("tail_run", "3′ complementary run", "", "bases", "3 or more is a risk", output=True),
        num("any_run", "Longest complementary run", "", "bases", "Anywhere in the pair", output=True),
        num("self_fwd", "Forward self-dimer run", "", "bases", "", output=True),
        num("self_rev", "Reverse self-dimer run", "", "bases", "", output=True),
        num("hairpin_fwd", "Forward hairpin stem", "", "bases", "4 or more can misprime", output=True),
        num("hairpin_rev", "Reverse hairpin stem", "", "bases", "", output=True),
        num("risk", "Dimer risk score", "", "of 10", "0 is clean, 10 is a guaranteed dimer", output=True),
    ],
    dirs=[],
    formula=("A 3′ run of k complementary bases contributes 3^(k−1) to the risk: 4 bases is 27× the "
             "chance of a 2-base match, because the polymerase only needs a short 3′ duplex to extend"),
    symbols=[("3′ run", "complementary bases at the 3′ ends, which can be extended", "bases"),
             ("hairpin", "a primer folding back on itself", "bases"),
             ("ΔG", "free energy of the dimer — lower is worse", "kcal/mol")],
    bands=[("3′ run 0–2", "Safe", "no extension possible in practice"),
           ("3′ run 3–4", "Watch", "some dimer forms; consider a redesign"),
           ("3′ run 5+", "Redesign", "the pair will amplify a dimer instead of the target")],
    notes=[
        "Only 3′ complementarity is extendable. A strong match in the middle of two primers looks "
        "alarming but the polymerase has no 3′ end to extend there.",
        "Self-dimers matter as much as cross-dimers: a primer that can pair with another copy of "
        "itself doubles its own effective concentration.",
        "A hairpin with a stem of four or more G–C pairs is stable enough to compete with template "
        "binding, especially at low annealing temperatures.",
    ],
    mistakes=[
        "Checking only the forward primer against the reverse, and not each against itself.",
        "Judging a dimer by the total number of complementary bases instead of the 3′ run.",
        "Ignoring a 3′ G/C clamp that also happens to be complementary to the other primer's 3′ end.",
    ],
    faq=[
        ("How many complementary bases cause a primer dimer?", "Three at the 3′ end is already a "
         "risk because that is where the polymerase extends; five or more will almost always dimerise."),
        ("What is the difference between a self-dimer and a hairpin?", "A self-dimer is two copies of "
         "the primer pairing; a hairpin is one primer folding back on itself."),
        ("Does a dimer always stop the PCR?", "No, but it consumes primers and polymerase, so the "
         "target product appears late or not at all, and a low band appears on the gel."),
    ],
    related=[("/biology/pcr-primer-stats", "PCR primer stats"),
             ("/biology/oligo-tm-calculator", "Oligo Tm"),
             ("/biology/reverse-complement", "Reverse complement")],
    svg=("bars", {"caption": "Dimer risk rises sharply with the length of the 3′ run",
                  "series": [("2 bases", 3), ("3 bases", 9), ("4 bases", 27), ("5 bases", 81)]}),
    icon="dna",
    keywords=["primer dimer", "self-dimer", "hairpin", "PCR troubleshooting"],
    script=JS_HELPERS + r"""
  function longestRun(a, b) {
    // longest stretch where a[i..] pairs with b[..] read backwards
    a = a.slice(0, 60); b = b.slice(0, 60);
    var best = 0;
    for (var i = 0; i < a.length; i++) {
      for (var j = 0; j < b.length; j++) {
        var k = 0;
        while (i + k < a.length && j - k >= 0 && COMP[a.charAt(i + k)] === b.charAt(j - k)) k++;
        if (k > best) best = k;
      }
    }
    return best;
  }
  function endRun(a, b) {
    // Two primers anneal antiparallel, so their 3' ends sit opposite each other:
    // position 1 from the 3' end of one pairs with position 1 from the 3' end of
    // the other. The run is how far that pairing continues before a mismatch.
    var best = 0;
    for (var k = 1; k <= Math.min(a.length, b.length); k++) {
      if (COMP[a.charAt(a.length - k)] === b.charAt(b.length - k)) best = k; else break;
    }
    return best;
  }
  function hairpinStem(p) {
    // a stem needs a loop of at least three bases between the two halves
    var best = 0;
    for (var loop = 3; loop <= 12; loop++) {
      for (var i = 0; i + loop < p.length; i++) {
        var k = 0;
        while (i - k >= 0 && i + loop + k < p.length
               && COMP[p.charAt(i - k)] === p.charAt(i + loop + k)) k++;
        if (k > best) best = k;
      }
    }
    return best;
  }
  omni.onResult(['forward', 'reverse'], function (ctx) {
    var f = cleanSeq(ctx.getRawInput('forward'), 'dna').slice(0, 100);
    var r = cleanSeq(ctx.getRawInput('reverse'), 'dna').slice(0, 100);
    if (!f || !r) {
      ctx.addHtml(block('Primer dimers', '—', 'Paste both primers to check the pair.'));
      return;
    }
    var tail = Math.max(endRun(f, r), endRun(r, f));
    var any = longestRun(f, r);
    var selfF = longestRun(f, f), selfR = longestRun(r, r);
    var hairF = hairpinStem(f), hairR = hairpinStem(r);
    var score = 0;
    if (tail >= 2) score += Math.min(6, Math.pow(3, tail - 2));
    if (Math.max(selfF, selfR) >= 4) score += 2;
    if (Math.max(hairF, hairR) >= 4) score += 2;
    score = Math.min(10, score);

    ctx.exportValue('tail_run', tail);
    ctx.exportValue('any_run', any);
    ctx.exportValue('self_fwd', selfF);
    ctx.exportValue('self_rev', selfR);
    ctx.exportValue('hairpin_fwd', hairF);
    ctx.exportValue('hairpin_rev', hairR);
    ctx.exportValue('risk', score);

    var verdict = tail >= 5 ? 'Redesign the pair'
      : tail >= 3 ? 'Risk of dimers — consider a redesign'
      : 'No significant 3′ complementarity';
    ctx.addHtml(block('Verdict',
      verdict + '\n3′ complementary run: ' + tail + ' base' + (tail === 1 ? '' : 's')
      + '\nLongest run anywhere: ' + any + ' bases'
      + '\nSelf-dimers: forward ' + selfF + ', reverse ' + selfR
      + '\nHairpin stems: forward ' + hairF + ', reverse ' + hairR
      + '\nRisk score: ' + score + '/10',
      tail >= 3
        ? 'A polymerase can extend a 3′ duplex of three or more bases, so the primer pair will '
          + 'amplify a dimer. Move the 3′ end a base or two, or trim it.'
        : 'Nothing at the 3′ ends can be extended, which is what matters for dimer formation.'));
    ctx.addHtml(table('Detail', ['Check', 'Bases', 'Reads as'],
      [['3′ cross-dimer', String(tail), tail >= 3 ? 'extendable — a real risk' : 'not extendable'],
       ['Anywhere in the pair', String(any), any >= 6 ? 'strong but not extendable' : 'minor'],
       ['Forward self-dimer', String(selfF), selfF >= 5 ? 'will self-pair' : 'acceptable'],
       ['Reverse self-dimer', String(selfR), selfR >= 5 ? 'will self-pair' : 'acceptable'],
       ['Forward hairpin', String(hairF), hairF >= 4 ? 'stable enough to misprime' : 'unlikely'],
       ['Reverse hairpin', String(hairR), hairR >= 4 ? 'stable enough to misprime' : 'unlikely']]));
  });
""",
))


# ---------------------------------------------------- 4. DNA molarity / A260
add(Spec(
    name="DNA Molarity Calculator",
    slug="dna-molarity-calculator",
    summary=("A DNA molarity comes from an A₂₆₀ reading, a mass or a concentration, once you know the "
             "length. One A₂₆₀ unit means 50 µg/mL of double-stranded DNA, 33 µg/mL of single-stranded DNA "
             "and 40 µg/mL of RNA, and a known length converts that mass into moles — the number a "
             "sequencing reaction or a ligation actually asks for."),
    fields=[
        num("length", "Length", 1000, "bp", "Fragment or genome length"),
        num("conc_ng_ul", "Concentration", 100, "ng/µL", "What a nanodrop or a Qubit reports"),
        num("volume_ul", "Volume", 50, "µL", ""),
        sel("factor", "Molecule (A₂₆₀ factor)", [
            ("Double-stranded DNA — 50", "50"), ("Single-stranded DNA — 33", "33"),
            ("RNA — 40", "40")], "50", "µg/mL per absorbance unit"),
        num("mw_per_bp", "Molar mass per base", 660, "g/mol", "660 dsDNA per bp, 330 ssDNA, 340 RNA"),
        num("mass_ng", "Total mass", "", "ng", "", output=True),
        num("pmol", "Amount", "", "pmol", "", output=True),
        num("molarity", "Molarity", "", "nM", "", output=True),
        num("copies", "Molecules", "", "", "", output=True),
        num("a260", "A₂₆₀ equivalent", "", "A", "For a 1 cm path", output=True),
    ],
    dirs=[
        # 1 µg/mL is 1 ng/µL, so the A260 factor needs no scaling
        d("Mass", "mass_ng", "conc_ng_ul*volume_ul"),
        d("Mass", "conc_ng_ul", "mass_ng/volume_ul"),
        d("Mass", "a260", "conc_ng_ul/factor"),
        d("Amount", "pmol", "mass_ng*1000/(mw_per_bp*length)"),
        d("Amount", "mass_ng", "pmol*mw_per_bp*length/1000"),
        d("Amount", "molarity", "pmol/volume_ul*1000"),
        d("Amount", "copies", "pmol*602214076000"),
    ],
    formula=("mass (ng) = concentration (ng/µL) × volume (µL).  "
             "pmol = mass (ng) × 1000 ÷ (660 × length in bp).  c (nM) = pmol ÷ volume (µL) × 1000.  "
             "A₂₆₀ = concentration ÷ 50 (dsDNA), 33 (ssDNA) or 40 (RNA)"),
    symbols=[("A₂₆₀", "absorbance at 260 nm through a 1 cm path", "—"),
             ("660", "g/mol per base pair of dsDNA", "g/mol"),
             ("nM", "nanomole per litre", "mol/L")],
    bands=[("1.8 – 1.9", "A₂₆₀/A₂₈₀", "clean DNA; lower means protein or phenol carry-over"),
           ("50 ng/µL", "Typical miniprep", "enough for a dozen PCRs"),
           ("under 2 ng/µL", "Too dilute", "concentrate before a sequencing reaction")],
    notes=[
        "The A₂₆₀ factor assumes a 1 cm path. A nanodrop uses a much shorter path and applies its own "
        "multiplier, so its answer is already in ng/µL — do not multiply it again.",
        "A₂₆₀ cannot tell DNA from RNA or from free nucleotides. A reading with a huge 260 peak and a "
        "ratio near 1.8 often means nucleotides left over from a bad cleanup.",
        "Molarity needs the length. Without it a mass tells you nothing about how many molecules are "
        "in the tube: the same 100 ng is 0.15 pmol of a 1 kb fragment but 0.003 pmol of a 50 kb one.",
    ],
    mistakes=[
        "Using the dsDNA factor (50) for an oligo, which understates the absorbance by a third.",
        "Forgetting to divide by the volume when converting to a working concentration.",
        "Comparing A₂₆₀ readings taken in different cuvettes or after a freeze–thaw.",
    ],
    faq=[
        ("How do I convert A₂₆₀ to concentration?", "Multiply by 50 for dsDNA, 33 for ssDNA or 40 "
         "for RNA to get µg/mL, which is the same number in ng/µL."),
        ("How many copies are in 100 ng of a 1 kb plasmid?", "About 9 × 10¹⁰ — 100 ng ÷ 660 kDa, "
         "times Avogadro's number."),
        ("Why does molarity need the fragment length?", "Because the same mass of a longer molecule "
         "is fewer molecules."),
    ],
    related=[("/biology/dsdna-ug-to-pmol", "dsDNA µg to pmol"),
             ("/biology/dna-molecular-weight-calculator", "DNA molecular weight"),
             ("/biology/oligo-tm-calculator", "Oligo Tm")],
    svg=("bars", {"caption": "A₂₆₀ conversion factors (µg/mL per absorbance unit)",
                  "series": [("dsDNA", 50), ("ssDNA", 33), ("RNA", 40)]}),
    icon="flask",
    keywords=["DNA concentration", "A260", "molarity", "nanodrop"],
    steps=[
        "Enter the length of the molecule — this is what turns a mass into a molar amount.",
        "Type the concentration your nanodrop or Qubit reports, and the volume you will use.",
        "Read the amount in pmol, the molarity in nM, the molecule count and the A₂₆₀ it corresponds to.",
    ],
))


# ------------------------------------------------- 5. Henderson–Hasselbalch
add(Spec(
    name="Buffer pH Calculator (Henderson–Hasselbalch)",
    slug="henderson-hasselbalch-buffer",
    summary=("The pH of a buffer depends on the ratio of its conjugate base to its acid, not on how "
             "concentrated it is: pH = pKa + log₁₀([A⁻]/[HA]). This calculator gives the ratio for a "
             "target pH, the pH for a ratio you already have, and the ionic strength the mixture "
             "contributes."),
    fields=[
        num("pka", "pKa of the buffer", 7.2, "", "Phosphate 7.2, Tris 8.06, HEPES 7.55 at 25 °C"),
        num("ph", "Target pH", 7.4, "pH", ""),
        num("ratio", "Base ÷ acid ratio", "", "", "", output=True),
        num("acid_pct", "Acid share", "", "%", "", output=True),
        num("base_pct", "Base share", "", "%", "", output=True),
        num("delta", "pH − pKa", "", "pH", "", output=True),
        num("total_mm", "Total buffer concentration", 50, "mM", "Optional"),
        num("acid_mm", "Concentration of the acid form", "", "mM", "", output=True),
        num("base_mm", "Concentration of the base form", "", "mM", "", output=True),
    ],
    dirs=[
        d("Ratio", "ratio", "10^(ph-pka)"),
        d("Ratio", "ph", "pka+log10(ratio)"),
        d("Ratio", "delta", "ph-pka"),
        d("Mixture", "acid_pct", "100/(1+10^(ph-pka))"),
        d("Mixture", "base_pct", "100*10^(ph-pka)/(1+10^(ph-pka))"),
        d("Mixture", "acid_mm", "total_mm/(1+10^(ph-pka))"),
        d("Mixture", "base_mm", "total_mm*10^(ph-pka)/(1+10^(ph-pka))"),
    ],
    formula=("pH = pKa + log₁₀([A⁻] ÷ [HA]).  Base share = 10^(pH−pKa) ÷ (1 + 10^(pH−pKa)) × 100"),
    symbols=[("pKa", "negative log of the acid dissociation constant", "—"),
             ("[A⁻]", "concentration of the deprotonated form", "M"),
             ("[HA]", "concentration of the protonated form", "M")],
    bands=[("pH = pKa", "50 / 50", "maximum buffer capacity, minimum pH drift on dilution"),
           ("within ±1 of pKa", "Useful buffer", "capacity is still good"),
           ("more than 1 unit away", "Poor buffer", "almost all of it is one form; pick another buffer")],
    notes=[
        "Buffer capacity is highest at pH = pKa, where the two forms are equal. A buffer is only "
        "worth using within about one pH unit of its pKa.",
        "pKa depends on temperature: Tris drops about 0.03 pH units per °C, which is why a Tris "
        "buffer made at 25 °C reads about 7.8 in a cold room at 4 °C.",
        "This equation ignores activity coefficients. At 100 mM and above, real pH drifts by a few "
        "tenths from the calculated value — measure it.",
    ],
    mistakes=[
        "Confusing the ratio of the two forms with the ratio of stock volumes — a 1 M stock of each "
        "is the only case where they are the same.",
        "Making a buffer at a pH far from the pKa and expecting it to hold.",
        "Forgetting that adding HCl or NaOH changes the volume and therefore the final concentration.",
    ],
    faq=[
        ("What ratio gives pH = pKa?", "Exactly 1:1 of base to acid."),
        ("How much can I dilute a buffer before the pH changes?", "Dilution does not change the "
         "ratio, so pH holds; capacity falls, which matters once you add acid or base."),
        ("Why is my measured pH different from the calculation?", "Temperature, ionic strength and "
         "activity coefficients all shift it; calibrate at the temperature you will use."),
    ],
    related=[("/chemistry/buffer-ph", "Buffer pH"),
             ("/chemistry/buffer-capacity", "Buffer capacity"),
             ("/chemistry/ph", "pH calculator")],
    svg=("curve", {"caption": "Base share against pH around the pKa",
                   "samples": [(5.5, 2.0), (6.2, 9.1), (6.9, 33.3), (7.2, 50.0), (7.5, 66.7),
                               (8.2, 90.9), (8.9, 98.0)],
                   "axis": ("pH", "base share (%)")}),
    icon="flask",
    keywords=["Henderson-Hasselbalch", "buffer pH", "pKa", "buffer ratio"],
    steps=[
        "Enter the pKa of the buffer you are making (phosphate 7.2, HEPES 7.55, Tris 8.06).",
        "Enter the pH you need. The ratio and the share of each form follow.",
        "If you know the total concentration, the amount of acid and base form is filled in too.",
    ],
))


# --------------------------------------------------- 6. Mark–recapture
add(Spec(
    name="Mark-Recapture Population Calculator",
    slug="mark-recapture",
    summary=("Estimate how many animals are in a population from two visits: mark a sample, release "
             "them, then count how many marked individuals turn up in a second sample. The "
             "Lincoln–Petersen estimator is the simple proportion, and the Chapman correction makes "
             "it usable when samples are small."),
    fields=[
        num("marked", "Marked in the first sample", 80, "", "M"),
        num("second", "Total caught in the second sample", 100, "", "C"),
        num("recaptured", "Of those, already marked", 20, "", "R"),
        num("estimate", "Population estimate", "", "", "Lincoln–Petersen", output=True),
        num("chapman", "Chapman estimate", "", "", "Less biased for small samples", output=True),
        num("ci_low", "95% confidence, lower", "", "", "On the Chapman estimate", output=True),
        num("ci_high", "95% confidence, upper", "", "", "", output=True),
        num("marked_share", "Share marked in the second sample", "", "%", "", output=True),
    ],
    dirs=[
        d("Estimate", "estimate", "marked*second/recaptured"),
        d("Estimate", "chapman", "(marked+1)*(second+1)/(recaptured+1)-1"),
        d("Estimate", "marked_share", "recaptured/second*100"),
        # normal approximation to the Chapman interval
        d("Estimate", "ci_low",
          "(marked+1)*(second+1)/(recaptured+1)-1-1.96*sqrt((marked+1)*(second+1)*(marked-recaptured)*(second-recaptured)/((recaptured+1)^2*(recaptured+2)))"),
        d("Estimate", "ci_high",
          "(marked+1)*(second+1)/(recaptured+1)-1+1.96*sqrt((marked+1)*(second+1)*(marked-recaptured)*(second-recaptured)/((recaptured+1)^2*(recaptured+2)))"),
    ],
    formula=("N ≈ (M × C) ÷ R.  Chapman: N = (M+1)(C+1)/(R+1) − 1"),
    symbols=[("M", "animals marked and released in the first sample", "animals"),
             ("C", "animals caught in the second sample", "animals"),
             ("R", "of those, how many carry a mark", "animals")],
    bands=[("R ≥ 20", "Reliable", "the estimate is stable and the interval is tight"),
           ("R 5 – 20", "Usable with care", "use the Chapman correction; expect a wide interval"),
           ("R under 5", "Unreliable", "the interval will be enormous — mark more animals")],
    notes=[
        "The method assumes a closed population: no births, deaths, immigration or emigration between "
        "the two samples, and marks that do not fall off or change behaviour.",
        "The Lincoln–Petersen estimate is biased high when R is small — it cannot even return a value "
        "below M plus the unmarked animals you saw. The Chapman correction exists for exactly this.",
        "The confidence interval depends almost entirely on R. Twelve recaptures is the practical "
        "minimum for a number you would publish.",
    ],
    mistakes=[
        "Comparing samples taken in different seasons, when the population is not closed.",
        "Marking only conspicuous animals, which are then more likely to be caught again.",
        "Reporting the point estimate without the interval — it can easily be ±40%.",
    ],
    faq=[
        ("What does mark-recapture assume?", "A closed population, equal catchability of marked and "
         "unmarked animals, and marks that are neither lost nor harmful."),
        ("Why use the Chapman correction?", "The plain Lincoln–Petersen estimator is biased upward "
         "for small samples; Chapman's version is close to unbiased."),
        ("How many recaptures do I need?", "At least twenty for a useful interval, and never fewer "
         "than five for a number worth reporting."),
    ],
    related=[("/biology/biodiversity-index", "Biodiversity index"),
             ("/biology/plant-population", "Plant population"),
             ("/biology/bacteria-growth", "Bacteria growth")],
    svg=("bars", {"caption": "The estimate tightens as recaptures rise",
                  "series": [("R = 5", 400), ("R = 20", 200), ("R = 50", 160)]}),
    icon="flask",
    keywords=["mark recapture", "Lincoln-Petersen", "population estimate"],
    steps=[
        "Enter how many animals you marked and released (M).",
        "Enter the size of the second sample (C) and how many of them were already marked (R).",
        "Read the estimate, the Chapman-corrected value and the confidence interval.",
    ],
))


# ------------------------------------------------ 7. growth rate from OD
add(Spec(
    name="Specific Growth Rate from OD",
    slug="specific-growth-rate-od",
    summary=("Specific growth rate is how fast a culture is dividing, in units of generations per "
             "hour: µ = ln(OD₂/OD₁) ÷ (t₂ − t₁). From two optical densities and the time between "
             "them you get µ, the doubling time and the number of generations the culture went "
             "through — as long as the readings sit in the exponential phase."),
    fields=[
        num("od1", "First OD₆₀₀", 0.15, "", "Blank subtracted, in the linear range"),
        num("od2", "Second OD₆₀₀", 0.62, "", ""),
        num("t1", "First reading at", 0, "h", ""),
        num("t2", "Second reading at", 3, "h", ""),
        num("mu", "Specific growth rate", "", "1/h", "", output=True),
        num("doubling", "Doubling time", "", "min", "", output=True),
        num("generations", "Generations", "", "", "", output=True),
        num("rate_per_day", "Growth rate", "", "1/day", "", output=True),
    ],
    dirs=[
        d("Growth", "mu", "ln(od2/od1)/(t2-t1)"),
        d("Growth", "doubling", "ln(2)/mu*60"),
        d("Growth", "generations", "mu*(t2-t1)/ln(2)"),
        d("Growth", "rate_per_day", "mu*24"),
    ],
    formula=("µ = ln(OD₂ ÷ OD₁) ÷ (t₂ − t₁).  Doubling time = ln2 ÷ µ.  Generations = µ × Δt ÷ ln2"),
    symbols=[("µ", "specific growth rate", "1/h"),
             ("OD₆₀₀", "optical density at 600 nm", "—"),
             ("ln2", "0.693, the natural log of two", "—")],
    bands=[("under 0.2 1/h", "Slow", "doubling in more than 3.5 h — stressed or minimal medium"),
           ("0.2 – 0.8 1/h", "Typical", "E. coli in rich medium doubles in 20–60 min"),
           ("above 1.0 1/h", "Fast", "doubling faster than 42 min; check for clumping or a bad blank")],
    notes=[
        "OD₆₀₀ is only proportional to cell number up to about 0.4–0.6. Above that, dilute and "
        "measure again — an OD of 1.2 underestimates the cells by a third or more.",
        "A rate calculated across the lag or stationary phase is meaningless. Use two points that are "
        "both in the exponential phase, and ideally more than two.",
        "OD₆₀₀ depends on the spectrophotometer and the cuvette. Report µ, not the OD, and describe "
        "the instrument.",
    ],
    mistakes=[
        "Using OD 0.05 as the first point, when the blank or the cuvette dominates the reading.",
        "Averaging several late readings, where the culture has already slowed.",
        "Confusing µ (per hour) with the number of generations, which is µ × Δt ÷ ln2.",
    ],
    faq=[
        ("What is a typical growth rate for E. coli?", "About 0.6–0.8 1/h in LB at 37 °C, a doubling "
         "time of 20–30 minutes."),
        ("Why is my doubling time longer in minimal medium?", "Fewer nutrients, so the cell spends "
         "longer building biomass; 60–120 minutes is normal."),
        ("Can I use OD above 1?", "Dilute the sample into medium and multiply the reading by the "
         "dilution factor — beyond about 0.6 the relation is no longer linear."),
    ],
    related=[("/biology/bacterial-growth-curve", "Bacterial growth curve"),
             ("/biology/cell-doubling-time", "Cell doubling time"),
             ("/chemistry/michaelis-menten-equation", "Michaelis–Menten")],
    svg=("curve", {"caption": "Exponential growth: the OD doubles at a constant interval",
                   "samples": [(0, 0.1), (1, 0.13), (2, 0.17), (3, 0.22), (4, 0.29), (5, 0.38),
                               (6, 0.5)], "axis": ("time (h)", "OD600")}),
    icon="flask",
    keywords=["specific growth rate", "doubling time", "OD600", "exponential growth"],
    steps=[
        "Take two OD₆₀₀ readings that are both between 0.05 and 0.6.",
        "Enter each with the time it was taken.",
        "Read µ, the doubling time in minutes and how many generations passed.",
    ],
))


# ---------------------------------------------------- 8. Ligation calculator
add(Spec(
    name="Ligation Calculator",
    slug="ligation-calculator",
    summary=("Set up a ligation by molar ratio instead of guessing: with a fixed amount of vector, "
             "the mass of insert you need depends on the ratio you want and the relative lengths. "
             "A 3:1 insert-to-vector ratio is the usual starting point, and this calculator gives "
             "the nanograms for any ratio you choose."),
    fields=[
        num("vector_ng", "Vector mass", 50, "ng", "The amount you will put in the reaction"),
        num("vector_bp", "Vector length", 3000, "bp", ""),
        num("insert_bp", "Insert length", 1000, "bp", ""),
        num("ratio", "Insert : vector ratio", 3, "×", "3 is the usual starting point"),
        num("insert_ng", "Insert mass needed", "", "ng", "", output=True),
        num("vector_pmol", "Vector in the reaction", "", "fmol", "", output=True),
    ],
    dirs=[
        d("Ligation", "insert_ng", "ratio*vector_ng*insert_bp/vector_bp"),
        d("Ligation", "vector_ng", "insert_ng*vector_bp/(ratio*insert_bp)"),
        d("Ligation", "vector_pmol", "vector_ng*1000000000/(660*vector_bp)/1000"),
    ],
    formula=("insert (ng) = ratio × vector (ng) × insert length ÷ vector length.  "
             "fmol = ng × 10⁹ ÷ (660 × length in bp) ÷ 1000"),
    symbols=[("ratio", "molecules of insert per molecule of vector", "—"),
             ("ng", "nanogram", "—"),
             ("fmol", "femtomole, 10⁻¹⁵ mol", "mol")],
    bands=[("1 : 1", "Equimolar", "good for a single insert with compatible ends"),
           ("3 : 1", "Standard", "the usual insert-to-vector ratio for a sticky-end ligation"),
           ("10 : 1", "Saturating", "useful for a short insert or a blunt-end ligation, but more concatemers")],
    notes=[
        "Many inserts at once need an equimolar amount of each, so divide the insert mass between "
        "them rather than multiplying it.",
        "Total DNA in the reaction matters as much as the ratio: below about 5 ng/µL of total DNA "
        "the ends rarely find each other.",
        "Blunt-end ligations are far slower and give more background; use 10:1 and double the enzyme.",
    ],
    mistakes=[
        "Using equal masses instead of equal moles, which over-represents the short molecule.",
        "Adding a huge excess of insert, which mostly produces insert concatemers that will not "
        "transform as a single plasmid.",
        "Forgetting to heat-inactivate the restriction enzyme before ligating.",
    ],
    faq=[
        ("What insert:vector ratio should I use?", "3:1 for sticky ends, 10:1 for blunt ends; 1:1 "
         "when you are ligating several fragments at once."),
        ("How much total DNA should be in a ligation?", "10–100 ng in 10–20 µL, so the ends can "
         "find each other."),
        ("Why did my ligation give no colonies?", "Usually the ratio, the total concentration, "
         "phosphatase treatment or the ligase buffer."),
    ],
    related=[("/biology/dsdna-ug-to-pmol", "dsDNA µg to pmol"),
             ("/biology/dna-molarity-calculator", "DNA molarity"),
             ("/biology/restriction-digest", "Restriction digest")],
    svg=("bars", {"caption": "Insert mass needed for a 1 kb insert into a 3 kb vector",
                  "series": [("1:1", 17), ("3:1", 50), ("5:1", 83), ("10:1", 167)]}),
    icon="flask",
    keywords=["ligation", "insert vector ratio", "molar ratio", "cloning"],
    steps=[
        "Enter the vector mass you will use and both lengths in base pairs.",
        "Choose the molar ratio — 3:1 for sticky ends is the standard start.",
        "The insert mass is calculated; scale the whole reaction up if the volume gets too large.",
    ],
))
