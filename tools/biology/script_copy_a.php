<?php
/**
 * Hand-written copy for the first nine script pages.
 *
 * Every sentence here is about the page it belongs to. The builder adds the
 * facts it can measure — the boxes, the example, the engine note — and refuses
 * to publish a page whose article is under 1,500 words.
 */
return [
    'amino-acid-composition' => [
        'title' => 'Amino Acid Composition Calculator: MW, GRAVY and Charge',
        'desc' => 'Paste a protein sequence and read its length, molecular weight, GRAVY, aromatic fraction, charge balance and cysteine count, worked out in the browser.',
        'intro' => 'Amino acid composition reads one protein sequence and describes it in six numbers: how long it is, how heavy, how hydrophobic, how aromatic, how charged and how many cysteines it carries. Nothing is uploaded — the sequence is read letter by letter in the tab you are looking at.',
        'does' => 'The page takes a protein in single-letter code and turns it into the handful of figures people actually ask for: length, average molecular weight, GRAVY, the share of aromatic residues, the acidic-minus-basic balance and the cysteine count.',
        'how' => 'It cleans the paste first, keeping only letters, so a FASTA header line, a row of digits from a sequence viewer or a stray space cannot change the answer. It then walks the cleaned string once, counting each residue against a table of average residue masses and against the Kyte-Doolittle hydropathy scale. The molecular weight is the sum of the free amino-acid masses minus one water molecule for every peptide bond; GRAVY is the sum of the hydropathy values divided by the number of residues; the aromatic figure is the count of phenylalanine, tryptophan and tyrosine as a percentage of the chain.',
        'example_note' => 'Twenty-nine residues, 3.56 kDa, a GRAVY of −0.476 and no cysteine: the sequence is small, slightly hydrophilic and carries no disulfide bond. The charge balance of −4 says the acidic residues outnumber the basic ones by four, which is the first thing to check against a calculated pI.',
        'read' => 'Read the six figures as a description of one molecule, not as six unrelated measurements. A negative GRAVY with a charge balance near zero describes a soluble, globular protein; a positive GRAVY with a high aromatic percentage describes something that prefers a membrane or a hydrophobic core. The cysteine count is the ceiling on disulfide bonds, never the number of bonds itself.',
        'defs' => [
            'Length' => 'the number of residues after headers, spaces and digits are removed.',
            'Molecular weight' => 'the sum of average residue masses in kilodaltons, with one water lost per peptide bond. No modifications, no isotopes, no signal peptide removal.',
            'GRAVY' => 'the grand average of hydropathy: positive is hydrophobic, negative is hydrophilic, and the scale runs roughly from −4.5 to +4.5.',
            'Aromatic residues' => 'phenylalanine, tryptophan and tyrosine as a percentage of the chain — the residues that absorb at 280 nm.',
            'Acidic minus basic' => 'aspartate and glutamate counted against lysine, arginine and histidine. Positive means the chain is net acidic at neutral pH.',
            'Cysteines' => 'how many cysteine residues there are. Two are needed for one disulfide bond, and only if they are close enough to pair.',
        ],
        'check' => 'A molecular weight is checkable by hand. Count the residues, multiply by an average residue mass of about 110 Da, and compare: 29 residues gives roughly 3.2 kDa, and the page says 3.56 because the sequence is rich in the heavier residues. For an exact figure, add the free amino-acid masses from a table and subtract 18.015 Da for every peptide bond. GRAVY is easier still: add the Kyte-Doolittle values for each residue and divide by the length.',
        'pitfalls' => [
            'DNA pasted by mistake' => 'A nucleotide string is made of A, C, G and T, and all four are real amino-acid letters. The page will happily read a 39-base oligo as a 39-residue peptide and report a weight for it.',
            'Ambiguous codes' => 'X, B, Z and J are accepted as letters but carry no mass on a table of the twenty standard residues, so a sequence full of X will come out lighter than the protein it stands for.',
            'Modifications' => 'A phosphorylated serine, a glycosylated asparagine or an N-terminal acetyl group changes the mass, and none of them is in the string.',
            'The length box' => 'If you typed a length yourself, it is the sequence that decides the other five figures, not the number beside it.',
        ],
        'limits' => [
            'Average, not monoisotopic' => 'The mass is the average over natural isotope abundance, which is what a mass spectrometer reports for a large protein and what a gel image is consistent with. A monoisotopic mass can differ in the third decimal place for a short peptide.',
            'Counts, not bonds' => 'The page counts cysteines; it cannot know which of them are bonded, so it will not tell you how many disulfides a folded protein has.',
            'Composition only' => 'Nothing here describes secondary structure, stability or function. Two proteins with identical composition can fold into entirely different shapes.',
        ],
        'uses' => 'Composition figures come up whenever a protein is being handled rather than studied: checking that a synthetic peptide matches the mass the supplier quoted, estimating how much of a protein a gel band contains, deciding whether a construct will run at the position a ladder predicts, or finding out whether a sequence is unusual enough in its aromatic content to explain a strange absorbance reading.',
        'faq' => [
            ['q' => 'Why does the page ignore my FASTA header?', 'a' => 'The header is a description, not sequence. Keeping only letters drops the ">" line and its text, which is what you want: otherwise the letters of the description would be counted as residues.'],
            ['q' => 'Is the molecular weight the same as the one my mass spec reports?', 'a' => 'Close, but not identical. This is an average mass with no modifications; a mass spectrometer reports the masses of the actual ions, including every phosphorylation and every N-terminal methionine that was or was not removed.'],
            ['q' => 'What does a positive GRAVY mean?', 'a' => 'Hydrophobic overall. Values above roughly +0.5 usually mean a membrane-spanning or core-forming protein; values below −0.5 usually mean a soluble one.'],
        ],
    ],

    'codon-adaptation-index' => [
        'title' => 'Codon Adaptation Index Calculator for Any Host',
        'desc' => 'Paste a coding sequence, choose a host, and read its codon adaptation index, its count of rare codons, and the GC content of third codon positions.',
        'intro' => 'The codon adaptation index scores how well a coding sequence matches the codons a host uses in its own highly expressed genes. Paste an open reading frame, pick the host, and the page reports CAI, the number of codons read, how many of them are rare, and GC3s.',
        'does' => 'It scores a coding sequence against a host\'s codon usage table, so you can see whether the same protein will translate smoothly in E. coli, in yeast or in a human cell line. It also reports the practical figures behind that score: how many complete codons were read, how many were rare, and how GC-rich the third position is.',
        'how' => 'The sequence is cleaned to letters, split into codons from the first base, and each codon is looked up in the chosen host table. A codon that the host uses often in highly expressed genes gets a weight near 1; a rare codon gets a weight near 0. The CAI is the geometric mean of those weights across the sequence, so a few rare codons pull the score down more than their share of the length suggests. Third-position GC is computed on the same codon split, which is why changing the frame changes it.',
        'example_note' => 'A 48-base reading frame gives 16 codons and a CAI of 0.788 in E. coli K-12: mostly well-used codons, no rare ones, and a low GC3s of 18.75 per cent, since the sequence is written with the AT-ending codons E. coli prefers. The same sequence scores differently in human or yeast because the tables differ.',
        'read' => 'A CAI near 1 means the sequence uses the codons the host leans on in its fastest-translated genes; a score below about 0.5 usually means a heterologous gene that may benefit from resynthesis. The rare-codon count matters more for expression than the score itself: a single rare codon cluster can stall a ribosome even when the average looks good.',
        'defs' => [
            'CAI' => 'the geometric mean of relative adaptiveness over all codons, on a scale from 0 to 1.',
            'Codons' => 'complete codons after the frame split; a trailing one or two bases cannot form a codon and is not counted.',
            'Rare codons' => 'codons whose relative adaptiveness falls below the threshold the page uses — the ones most likely to slow translation.',
            'GC3s' => 'the GC percentage at the third codon position, often used as a proxy for codon bias in bacteria.',
        ],
        'check' => 'Pick three codons from your sequence, look each up in the host table, and multiply their relative adaptiveness values; the cube root of that product is the CAI those three codons contribute. Doing this for the whole sequence by hand is tedious but possible, and the first few codons will tell you whether the score is in the right region.',
        'pitfalls' => [
            'Not an open reading frame' => 'If the sequence has no start codon, or begins mid-gene, every codon is shifted and the score describes the wrong reading frame.',
            'Wrong host' => 'The index is relative to a table. A score of 0.8 in E. coli says nothing about the same gene in CHO cells.',
            'Short sequences' => 'Under about 20 codons the geometric mean is dominated by single outliers, and the score swings wildly.',
            'Internal stops' => 'A stop codon inside the frame is a warning about the sequence, not about the host; the page will still score it.',
        ],
        'limits' => [
            'One table per host' => 'The page offers a small set of reference tables. A strain with a different codon usage — or a gene expressed at a different growth rate — will score slightly differently in reality.',
            'No tRNA model' => 'CAI assumes codon usage is a proxy for tRNA availability. It knows nothing about tRNA charging, modification or the position of a rare codon in the transcript.',
            'Expression is more than codons' => 'mRNA structure, ribosome binding, promoter strength and protein folding all matter more than CAI in most expression experiments.',
        ],
        'uses' => 'CAI is a screening number. It is used to decide whether a synthetic gene needs redesigning before it goes into an expression vector, to compare two versions of a construct, and to flag a sequence that looks fine on a gel but translates poorly.',
        'faq' => [
            ['q' => 'What CAI should I aim for before synthesising a gene?', 'a' => 'Most suppliers and protocols aim for at least 0.8 in the chosen host. Below about 0.5, resynthesis with host-optimised codons usually pays for itself.'],
            ['q' => 'Does a high CAI guarantee high expression?', 'a' => 'No. It removes one common obstacle. Promoter, copy number, mRNA structure and the protein itself decide the rest.'],
            ['q' => 'Why does the codon count change when I trim one base?', 'a' => 'Trimming shifts the reading frame by one, so every codon after the cut is different. The count is of complete codons in the frame, and the frame starts at the first base you paste.'],
        ],
    ],

    'codon-plot' => [
        'title' => 'Codon Plot Calculator: Rare Codons and Clusters',
        'desc' => 'Paste a coding sequence and see how many codons it contains, which of them are rare, and whether the rare codons arrive in clusters or singly.',
        'intro' => 'A codon plot follows a coding sequence codon by codon and marks where the host finds translation expensive. The page reports the codon count, the rare-codon count and how many clusters of rare codons the window scan finds.',
        'does' => 'It walks a coding sequence in codons and summarises where the rare ones sit. A single rare codon is usually tolerated; a run of them in one window is what stalls a ribosome, which is why the cluster count is reported beside the raw rare count.',
        'how' => 'The sequence is cleaned and split into codons from the first base. Each codon is scored against a reference usage table, and any codon below the rarity threshold is flagged. The flags are then read in windows of the size you choose: a window that holds more than one flagged codon counts as a cluster, and the page adds up how many windows cross that line.',
        'example_note' => 'Seventeen codons, none of them rare, and no clusters at a window of ten: a short, GC-light reading frame with nothing in it that a bacterial ribosome would hesitate over.',
        'read' => 'Read the two rare figures together. Many rare codons spread evenly through a gene is a different problem from the same number gathered into two windows: the first slows the average rate, the second stalls the ribosome at a specific place and can cause premature termination or misfolding.',
        'defs' => [
            'Codons read' => 'complete codons from the first base; a trailing fragment is ignored.',
            'Rare codons' => 'codons the reference table marks as poorly used — for E. coli these are usually the AGG/AGA arginines, the AUA isoleucine and the CUA leucine.',
            'Clusters' => 'windows of the chosen size that contain more than one rare codon.',
        ],
        'check' => 'Count codons yourself by dividing the cleaned length by three, and compare with the reported figure. Then look at the sequence for AGG, AGA, AUA and CUA: those are the usual suspects in bacterial expression, and a hand count of them should match the rare-codon figure.',
        'pitfalls' => [
            'Reading the wrong frame' => 'A plot is only meaningful in the reading frame the ribosome will use. If your paste starts before the start codon, every window is shifted.',
            'Window too small' => 'A window of three codons will almost never contain two rare codons, so clusters report zero even in a badly biased gene.',
            'Reference table' => 'Rarity is host-specific. A codon that is rare in E. coli can be common in yeast.',
            'Stops counted as codons' => 'Stop codons are part of the frame but not part of the protein; read the plot with that in mind.',
        ],
        'limits' => [
            'No tRNA supply model' => 'The plot knows codon usage, not the actual tRNA pool in your strain at your growth rate.',
            'No mRNA structure' => 'A rare codon next to a strong hairpin is worse than the plot suggests, and one in an open stretch is better.',
            'Summary, not a picture' => 'The numbers describe the plot; they do not replace looking at the positions of the flagged codons.',
        ],
        'uses' => 'Codon plots are used when a gene expresses poorly despite a good average CAI, when deciding whether to order a codon-optimised version, and when a truncation product appears on a gel and the suspicion is a ribosome stall rather than a premature stop in the sequence.',
        'faq' => [
            ['q' => 'What counts as a codon cluster?', 'a' => 'A window of the size you set that contains more than one rare codon. Smaller windows find short tight clusters; larger windows find regions that are generally difficult.'],
            ['q' => 'Does one rare codon matter?', 'a' => 'Usually not. A single rare codon slows the ribosome briefly, and some slowing is normal. Runs of them are the problem.'],
            ['q' => 'Should the plot start at the start codon?', 'a' => 'Yes. Paste from the A of the ATG; anything before it belongs to the untranslated region and only shifts the frame.'],
        ],
    ],

    'codon-usage-calculator' => [
        'title' => 'Codon Usage Calculator: Codons, GC3 and Stops',
        'desc' => 'Paste a coding sequence and read its codon count, GC content at third positions, stop codons, distinct codons used and rare codons in the chosen frame.',
        'intro' => 'The codon usage calculator counts what a coding sequence is actually made of: how many codons it holds, how many distinct ones it uses, how GC-rich the third position is, and whether any stops fall inside the frame.',
        'does' => 'It gives you the raw composition of a coding sequence in codons rather than in bases: the total, the number of different codons, the GC3s value that bacterial gene-finders rely on, and the stop codons that should not be there.',
        'how' => 'The paste is cleaned and cut into codons from the frame you choose — frame 1 starts at the first base, frame 2 at the second, frame 3 at the third. Each codon is counted, the third base of each is tested for G or C, and stop codons are tallied separately. The distinct count is the number of different codons that appear at least once.',
        'example_note' => 'Choosing frame 3 on the same 33-base paste leaves only three complete codons and catches one stop: exactly the kind of difference a frame choice makes. In frame 1 the same sequence reads as eleven codons with no stops at all.',
        'read' => 'A high distinct count with a low codon count means a varied sequence; a low distinct count in a long gene means heavy repetition, which is worth knowing before you try to synthesise it. The GC3s figure is the one gene-finding tools compare against their thresholds, and an internal stop is an error to fix before anything else.',
        'defs' => [
            'Codons' => 'complete codons in the chosen frame.',
            'GC3s' => 'the GC percentage at the third position of each codon, the classic signal for bacterial coding regions.',
            'Stops' => 'stop codons inside the frame. In a real gene this should be one, at the end.',
            'Distinct codons' => 'how many different codons appear; a 64-codon maximum, 61 for coding sequence.',
            'Rare codons' => 'codons the reference table marks as poorly used in the chosen host.',
        ],
        'check' => 'Divide the cleaned sequence length by three and compare with the codon count. Then count the stops by eye: TAA, TAG and TGA in frame should appear exactly once, at the end, for a complete gene.',
        'pitfalls' => [
            'The frame selector' => 'Frame 2 and frame 3 read the same paste in a different register. For a gene, frame 1 is almost always the one you want.',
            'Untrimmed flanks' => 'Sequence before the start codon belongs to the 5′ UTR and shifts everything after it.',
            'Gel-purified fragments' => 'A trace of a second product can add codons that are not really in your clone.',
            'Stops in the middle' => 'One internal stop means a frameshift, a sequencing error or the wrong frame — not a rare event worth ignoring.',
        ],
        'limits' => [
            'Counts only' => 'The page does not tell you how well the sequence is expressed, only what it contains.',
            'One frame at a time' => 'The figures describe the frame you selected; the other two are not shown.',
            'Threshold-dependent' => 'The rare-codon count depends on the host table and its cut-off, so two tools can disagree about a borderline codon.',
        ],
        'uses' => 'Codon usage comes up in cloning: confirming that an open reading frame is really open, checking a synthetic construct against the supplier\'s sequence, deciding whether a gene looks bacterial, and spotting the internal stop that explains why a protein never appeared.',
        'faq' => [
            ['q' => 'Why is GC3s used to find genes?', 'a' => 'Bacterial coding regions have a characteristic bias at the third position that non-coding DNA does not share, which makes it a useful signal for gene-finding algorithms.'],
            ['q' => 'My sequence has one internal stop — is the gene broken?', 'a' => 'Usually yes. Check for a frameshift or a sequencing error before anything else; a genuine read-through is rare and would need a specific context.'],
            ['q' => 'Why do the codon counts differ between tools?', 'a' => 'Because they cut the sequence at different starting points. A tool that trims to the first ATG and one that starts at the first pasted base will report different totals.'],
        ],
    ],

    'cpg-island-finder' => [
        'title' => 'CpG Island Finder: GC Content and Observed/Expected CpG',
        'desc' => 'Paste a DNA sequence and find CpG islands by the Gardiner-Garden rule: window size, minimum GC content and minimum observed over expected CpG.',
        'intro' => 'A CpG island is a stretch of DNA that is GC-rich and carries more CG dinucleotides than chance would put there. This page scans a sequence in windows and reports where those conditions hold, how many islands it finds and how long the longest one is.',
        'does' => 'It finds CpG islands by the classical definition and reports the numbers behind the search: the overall GC content, how many CpG dinucleotides are actually present, the observed-to-expected ratio, the island count and the length of the longest island.',
        'how' => 'Two counting passes run over the sequence. The first counts G and C for the overall GC percentage and counts CG dinucleotides, comparing the count with what the base composition predicts — that is the observed over expected ratio, or CpG O/E. The second slides a window of the chosen size across the sequence, and a window counts as island material only if its GC content clears your minimum and its CpG O/E clears yours. Overlapping qualifying windows are joined, so an island is reported once.',
        'example_note' => 'A GC-rich synthetic repeat gives an overall GC of 82.6 per cent, 160 CpG dinucleotides against an expectation of about 78 (O/E 2.04) and one long island of 460 bases. Note the overall ratio is not the island rule: it is the sequence-wide figure, while islands are judged window by window.',
        'read' => 'The island count is sensitive to the three settings and should never be quoted without them. The Gardiner-Garden defaults — 200 bp window, 50 per cent GC, 0.6 O/E — are the ones most published work means, and a page that reports no islands at those settings is saying something quite specific.',
        'defs' => [
            'GC content' => 'the percentage of G and C across the whole sequence.',
            'CpG observed' => 'how many CG dinucleotides are actually present in the sequence.',
            'CpG O/E' => 'observed CpG divided by the number expected from the G and C frequencies. Above 1 means CpG is enriched; the classical island threshold is 0.6.',
            'Islands' => 'windows that meet all three criteria, with overlaps merged into one island.',
            'Longest island' => 'the length of the longest merged island, in bases.',
        ],
        'check' => 'Take a candidate island and count its G and C by hand: the percentage should clear your threshold. Then count CG dinucleotides and compare with the expectation computed from the G and C counts in the same window. Both have to hold for the window to count.',
        'pitfalls' => [
            'Overlap double counting' => 'Sliding windows overlap by design; a page that counted each qualifying window separately would report dozens of islands where there is one. This page merges them.',
            'Non-overlapping expectation' => 'The expected CpG count is the product of the G and C fractions times the window length. Using a different denominator makes the O/E ratio meaningless.',
            'Short sequences' => 'Under a few hundred bases, a window rarely fills and the island count is dominated by how much sequence you pasted.',
            'Case and line breaks' => 'Lower-case soft-masked sequence is read as ordinary letters. If you meant to exclude repeats, mask them before pasting.',
        ],
        'limits' => [
            'Sequence, not annotation' => 'The page finds composition patterns. Whether an island is a promoter depends on what is near it, which a sequence cannot tell you.',
            'One rule set' => 'Gardiner-Garden is the classical definition; some annotation pipelines use a stricter 500 bp, 55 per cent, 0.65 rule and will report fewer islands.',
            'No repeat masking' => 'A repeat rich in CG will be reported as island material unless you mask it yourself.',
        ],
        'uses' => 'CpG islands are used to find candidate promoters, to check whether a gene has a methylation-prone regulatory region, and to make sense of bisulfite sequencing: the regions worth interrogating are the ones this page points at.',
        'faq' => [
            ['q' => 'Why does my sequence have a high CpG O/E but no islands?', 'a' => 'The island rule is applied per window. A sequence can be CpG-rich overall and still have no window that clears all three thresholds at once — usually because the windows are too long for the sequence.'],
            ['q' => 'What window should I use?', 'a' => 'Two hundred bases is the classical Gardiner-Garden value. Short windows find small islands; long windows demand a long uninterrupted GC-rich stretch.'],
            ['q' => 'What does an O/E below 1 mean?', 'a' => 'CG dinucleotides are depleted, which is the usual state of most vertebrate DNA outside islands, because methylated CpG mutates to TpG over time.'],
        ],
    ],
];
