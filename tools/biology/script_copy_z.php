<?php
/**
 * Corrections and top-ups applied after the four copy files: a title that has
 * to sit between 50 and 60 characters, a description between 150 and 160, and
 * an extra paragraph for a page that came out just under 1,500 words.
 */
return [
    'codon-adaptation-index' => [
        'title' => 'Codon Adaptation Index Calculator: Score a Gene for Its Host',
        'desc' => 'Paste a coding sequence, choose a host, and read its codon adaptation index, rare codon count and third-position GC content. All worked out in your browser.',
        'extra' => 'A second use of the index is comparison. Score the same gene against E. coli, yeast and human tables before choosing an expression system: a gene that scores well in two of the three is a safer construct than one that is excellent in a single host and poor in the others, because it leaves you room to change systems without redesigning the sequence.',
    ],
    'cpg-island-finder' => [
        'desc' => 'Paste a DNA sequence and find CpG islands by the Gardiner-Garden rule: the window size, minimum GC content and minimum observed over expected CpG you set.',
    ],
    'dna-to-mrna' => [
        'desc' => 'Transcribe a DNA strand to mRNA and back, codon by codon, and read the protein the transcript would make — DNA, message and protein together in one panel.',
    ],
    'pcr-primer-stats' => [
        'title' => 'PCR Primer Stats Calculator: Tm, GC Content and Annealing',
        'desc' => "Paste a primer pair and read each primer's length, GC content and melting temperature, plus the annealing temperature and the gap between the two primers.",
    ],
    'rabbit-color' => [
        'desc' => 'Enter the dominant-allele count at five coat loci for both parents and read the chance of each colour class in a litter, from albino to chestnut and the selfs.',
    ],
    'orf-finder' => [
        'title' => 'ORF Finder for DNA: Six Frames, Both Strands, Longest ORF',
    ],
    'codon-plot' => [
        'title' => 'Codon Plot: Where the Rare Codons Sit in a Coding Sequence',
        'desc' => 'Paste a coding sequence and see how many codons it holds, which the host finds rare, and whether the rare ones arrive in clusters or singly across the gene.',
        'extra' => 'Where the rare codons sit matters as much as how many there are. A gene with its rare codons in the first fifty codons is usually fine, because the ribosome has not committed to a full-length product yet. The same codons in the middle of the message give a stalled elongation complex, a truncated protein and a low yield — which is the pattern this page exists to make visible.',
    ],
    'codon-usage-calculator' => [
        'title' => 'Codon Usage Calculator for DNA: GC3, Stops, Rare Codons',
        'desc' => 'Paste a coding sequence and read its codon count, GC content at third positions, stop codons, distinct codons used and rare codons in the chosen frame.',
        'extra' => 'The distinct-codon figure is the one people underuse. A 300-codon gene that uses only 25 different codons is repetitive, and repeat-rich genes are hard to synthesise and hard to assemble: the same short string occurs many times, which is exactly what recombination and synthesis errors like. A look at that number before ordering a gene can save a failed build.',
    ],
    'dna-molecular-weight-calculator' => [
        'extra' => 'The picomole figure is worth keeping in mind when a protocol asks for a specific number of moles. A nanogram of a 36-base oligo is about 45 femtomoles, while a nanogram of a 3,000-base plasmid is about 0.5 femtomoles: the same mass, ninety times fewer molecules. Most mistakes in normalising DNA come from comparing masses across very different lengths.',
    ],
    'dna-pattern-finder' => [
        'title' => 'DNA Pattern Finder with IUPAC Codes and Both Strands',
        'desc' => 'Search a DNA sequence for a motif, including IUPAC codes, on the forward strand, the reverse strand or both, and see every match counted position by position.',
        'extra' => 'When a search returns more hits than you expected, the useful next step is to look at where they fall rather than at the count. Two hits a few bases apart are a cluster and often mean a repeated element; hits spread evenly through a long sequence usually mean a short motif and a large sequence, which is arithmetic rather than biology.',
    ],
    'dna-to-protein' => [
        'desc' => 'Translate a DNA sequence in any frame, find the longest open reading frame across all six frames, and read its coding length, residue count, stops and mass.',
        'extra' => 'The six-frame answer is not the same as the right answer. In a bacterial genome roughly half of all genes sit on the reverse strand, so both are plausible; in a eukaryotic cDNA the coding frame almost always starts at the first ATG and ends at the first stop after it. Use the six-frame figure to find the candidate, and the frame-1 or first-stop setting to describe it once found.',
    ],
    'dog-coat-color' => [
        'title' => 'Dog Coat Colour Calculator: Genotypes at E, K, B and D',
        'desc' => 'Choose the genotype at the E, K, B and D coat loci, add ticking if the dog has it, and read the coat colour those loci produce, with each locus explained.',
        'extra' => 'The order the loci act in is the whole model, and it explains most of the surprises. Extension comes first: an e/e dog makes no black pigment at all, which is why a red dog can carry black, chocolate and dilution without showing any of them. Dominant black comes next and overrides the agouti pattern entirely, and only when both of those have had their say do brown and dilution get to change the shade.',
    ],
    'dog-life-expectancy' => [
        'desc' => "Enter a dog's age and breed size to see its age in human years, the typical lifespan for that size class, the years likely left and its current life stage.",
        'extra' => 'Life stage is the figure most owners act on. A dog that is a young adult by this page is in the years when weight, teeth and vaccinations are set; a dog labelled mature adult is where screening for the conditions common to its size class becomes worth the cost. The human-years figure is a comparison for conversation, while the stage is a prompt to do something.',
    ],
    'fuzzy-protein-search' => [
        'desc' => 'Search a protein for a motif allowing a set number of mismatches, with X matching any residue, and read the hits, the best mismatch count and positions tested.',
        'extra' => 'A good way to decide the allowance is to run the same search at zero, one and two mismatches and watch how the hit count grows. If it doubles at one mismatch and doubles again at two, the motif is short and the results describe chance. If it stays small and the best mismatch count is zero or one, the hits are likely real relatives.',
    ],
    'gc-content-sequence' => [
        'desc' => 'Paste a DNA or RNA sequence and read its length, G plus C count, GC and AT percentages, and the melting temperature those bases predict for the duplex.',
        'extra' => 'GC content is not uniform along a genome, and it is rarely uniform along a single amplicon either. A primer that sits in a GC-rich island will behave differently from one twenty bases away in an AT-rich stretch, which is why primer design tools compute the figure over the primer and not over the template. Checking the local value in the window round the intended site is more informative than the whole-sequence number. A primer that sits at the junction of a GC-rich and an AT-rich block can look well matched by whole-sequence figures and still fail, because the three or four bases at its 3′ end are what the polymerase actually grips.',
    ],
    'multi-reverse-translate' => [
        'desc' => 'Reverse translate one or several proteins at once into DNA, using host-preferred codons or a degenerate codon per residue, with an optional stop at the end.',
    ],
    'primer-dimer-checker' => [
        'desc' => 'Check a primer pair for complementary runs, 3-prime self-complementarity, hairpins and cross-dimers, and read a single risk rating for the pair before ordering.',
        'extra' => 'The figures describe the primers at the moment they are mixed, before any template is added. That is why dimer problems scale with primer concentration and why reducing the primer in the reaction often fixes a failing pair without redesigning anything: the same complementary run is present, but it finds a partner less often. Raising the annealing temperature has the same effect for the same reason, and both changes are cheaper than a new pair of primers. If neither works, the 3′ figure is the one to look at rather than the internal run: it is the run a polymerase can extend, and it is reported separately for exactly this reason. A pair with a long internal run and a clean 3′ end is usually worth trying before ordering replacements.',
    ],
    'protein-isoelectric-point' => [
        'desc' => 'Paste a protein to find its isoelectric point and net charge at a chosen pH, with length, mass, acidic and basic residue counts and GRAVY reported alongside.',
    ],
    'random-sequence-generator' => [
        'title' => 'Random DNA and RNA Sequence Generator with a Fixed Seed',
        'desc' => 'Generate a random DNA or RNA sequence of any length with a target GC content, a fixed seed so the result repeats, and an optional start codon at the front.',
        'extra' => 'A start codon is worth adding when the random sequence is going into a construct that will be translated: without one, the sequence is only useful as filler or as a null model, not as an open reading frame someone might express. The start codon is added after the rest of the sequence is drawn, so the GC content reported includes it and can sit a little away from the target when the length is short.',
    ],
    'restriction-buffer-compatibility' => [
        'extra' => 'The salt requirement behind the page is worth knowing, because it explains the failure rather than just predicting it. Enzymes that need high salt work poorly in low-salt buffers and slow down; enzymes that need low salt will still work at high salt but often lose specificity first, cutting at near-cognate sites. That is why a compromise buffer is a compromise on fidelity as well as on speed. If a digest in a shared buffer gives extra bands rather than fewer, star activity is the first explanation to test. Reducing the enzyme, shortening the incubation and lowering the glycerol carried over from the first digest are the usual fixes.',
    ],
    'restriction-enzyme-finder' => [
        'title' => 'Restriction Enzyme Finder: Unique Cutters and Non-Cutters',
        'desc' => 'Scan a DNA sequence against a panel of restriction enzymes and read which ones cut, which cut exactly once, and which have no site at all, linear or circular.',
        'extra' => 'The list of enzymes with no site is as useful as the list with sites. Every enzyme on it is a candidate for a step later in the workflow — a site to add by PCR, a position that will not be cut when the construct is checked — and checking that list before designing primers saves a redesign, because it tells you which recognition sequences are already absent from the sequence you are working with. It is also the list to check before adding a site by PCR: a second copy of that site elsewhere in the plasmid will cut the construct you have just built. The same list also tells you which enzymes are safe for a diagnostic digest later, when the construct is finished and you want to prove it is what you think. On a small sequence the list will be long, and that is not a problem: what matters is that at least one enzyme has exactly the number of sites you need.',
    ],
    'restriction-digest' => [
        'desc' => 'Paste DNA, choose one or two enzymes and a linear or circular molecule, and read the cut sites, the number of fragments and their largest and smallest sizes.',
    ],
    'reverse-complement' => [
        'title' => 'Reverse Complement Calculator for DNA or RNA Sequences',
        'extra' => 'The operation is symmetric: taking the reverse complement twice gives back the sequence you started with. That makes it a good check when a primer design looks wrong — paste the primer, take its reverse complement, and compare with the template. Anything that does not match is a design error rather than a calculation error. The same symmetry makes the page useful for flipping a sequence into the orientation a database expects: do it twice and you are back where you started, which is the cheapest proof that the paste was not mangled on the way in. If the double complement does not match, the sequence lost or gained a character somewhere between the source and the box.',
    ],
    'sequence-shuffler' => [
        'title' => 'DNA and Protein Sequence Shuffler with a Fixed Seed',
        'desc' => 'Shuffle a DNA or protein sequence while keeping its exact composition, by single bases or dinucleotides, with a seed so the same shuffle can be repeated.',
    ],
];
