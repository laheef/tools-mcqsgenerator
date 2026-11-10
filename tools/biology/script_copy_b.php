<?php
/* Hand-written copy for the second nine script pages. */
return [
    'dna-molecular-weight-calculator' => [
        'title' => 'DNA Molecular Weight Calculator: dsDNA, ssDNA and RNA',
        'desc' => 'Paste one strand and read its length, GC content, single- and double-stranded molecular weight in daltons and kDa, and how many picomoles one microgram holds.',
        'intro' => 'This page turns a DNA strand into a mass. Paste one strand of a duplex — or a single-stranded oligo — and it reports length, GC content, both molecular weights and the picomole count that makes a µg of it.',
        'does' => 'It converts between a sequence and the quantities a bench actually needs: how heavy a molecule is, how much of it a microgram contains, and how much of that weight comes from GC pairs.',
        'how' => 'The sequence is cleaned to letters and its length and GC content counted. Each base is given its residue mass in a single strand — the free nucleotide mass minus one water — and the single-strand weight is their sum. A double-stranded figure adds the complementary strand: an A-T pair contributes the mass of an A plus a T, a G-C pair the mass of a G plus a C, and the two hydrogen bonds do not count. The picomole figure is one microgram divided by the molecular weight, converted to moles.',
        'example_note' => 'Thirty-six bases, 55.56 per cent GC, 11,021 Da for one strand and 22,042 for the duplex — exactly double, because the complement of a 36-base strand is another 36 bases of the same pair masses. One microgram holds 45.4 pmol of it.',
        'read' => 'Use the double-stranded figure for plasmid and amplicon work, and the single-stranded figure for oligos, primers and probes, which are ordered as one strand. The picomole figure is the one to reach for when a protocol asks for "X pmol of primer" and your balance reading is in micrograms.',
        'defs' => [
            'Length' => 'bases in the cleaned sequence.',
            'GC content' => 'the percentage of G and C, which drives both the mass and the melting behaviour.',
            'Single-stranded weight' => 'the mass of the strand you pasted, in daltons.',
            'Double-stranded weight' => 'the mass of the duplex, counting the complementary strand base by base.',
            'kDa' => 'the same double-stranded mass in kilodaltons, for comparison with protein sizes.',
            'pmol per µg' => 'how many picomoles one microgram of this molecule represents.',
        ],
        'check' => 'A rough hand check: the average base pair mass is about 650 Da, so a 36 bp duplex should weigh roughly 23,400 Da and the page says 22,042 — the difference is the GC-rich composition, which is lighter per pair than AT. For an exact figure, use 313.2 Da per A-T pair and 618.4 per G-C pair in a rough table and compare to within one per cent.',
        'pitfalls' => [
            'Mixing strand types' => 'An oligo is single-stranded even though every base could pair. Choose the single-strand figure or you will report double its mass.',
            'Assuming perfect complementarity' => 'The duplex figure assumes the other strand is the exact complement. A mismatch or an overhang changes it.',
            'Read length' => 'An amplicon from a primer pair is single- or double-stranded depending on when you weigh it; the sequence alone does not tell you.',
        ],
        'limits' => [
            'No modifications' => 'A 5′ phosphate, a fluorophore or a quencher adds mass that is not in the sequence and not in this figure.',
            'Average masses' => 'The base masses are average over natural isotopes; monoisotopic masses differ slightly.',
            'No secondary structure' => 'A hairpin does not change mass, though it changes how the oligo behaves in a spectrophotometer.',
        ],
        'uses' => 'Molecular weight is used to convert a mass into moles when preparing primers, to check that an oligo synthesis matches its certificate, to normalise a digested plasmid against a protein standard on a gel, and to work out how much DNA is in a band of known length.',
        'faq' => [
            ['q' => 'Which figure do I use for a primer?', 'a' => 'The single-stranded one. Primers are ordered and delivered as one strand, and their certificates quote that mass.'],
            ['q' => 'Why is the duplex exactly twice the single strand?', 'a' => 'For a perfectly complementary duplex of even composition each base pair contributes two nucleotide residues, so the total is the sum of both strands. It is not exactly double for odd lengths or mismatched pairs.'],
        ],
    ],

    'dna-pattern-finder' => [
        'title' => 'DNA Pattern Finder with IUPAC Codes and Both Strands',
        'desc' => 'Search a DNA sequence for a motif, including IUPAC ambiguity codes, on the forward strand, the reverse strand or both, and see every match counted.',
        'intro' => 'Paste a sequence and a motif and this page tells you how often the motif appears, on the forward strand and on the reverse, with IUPAC codes accepted so "GGWCC" finds both GGACC and GGTCC.',
        'does' => 'It finds a pattern in a DNA sequence rather than a literal string. Ambiguity codes are expanded into the letters they stand for, and the search runs over the complement too, because a recognition site is a site whichever strand carries the text.',
        'how' => 'The sequence and the pattern are both cleaned and uppercased. Each IUPAC character is translated into a set of bases — N is anything, R is A or G, Y is C or T, W is A or T, S is G or C, K is G or T, M is A or C. Every position is tested against the expanded pattern, which makes the search a scan with one comparison per base rather than a substring match. When both strands are requested, the reverse complement is scanned the same way and the two counts are reported separately as well as together.',
        'example_note' => 'One match on the forward strand and none on the reverse: the 36-base sequence contains GAATTC once, and its reverse complement GAATTC appears nowhere else. Total one.',
        'read' => 'The forward and reverse counts are reported separately on purpose. A palindromic site such as GAATTC is found on both strands, so a both-strands count of two means one site, not two. Non-palindromic motifs appear on one strand only, and the split tells you which.',
        'defs' => [
            'Matches, forward' => 'occurrences of the pattern as written.',
            'Matches, reverse' => 'occurrences of the pattern read on the complementary strand.',
            'Total' => 'the two added together — the number of physical sites when the motif is asymmetric, twice the number when it is palindromic.',
        ],
        'check' => 'Count the motif by eye in the paste, then count it in the reverse complement written out by hand. Palindromes should appear in both; anything else in one.',
        'pitfalls' => [
            'Overlapping matches' => 'A motif like ATAT in ATATAT occurs twice, not once, because the scan advances one base at a time.',
            'Ambiguity codes' => 'A pattern of all N matches every position of a sequence long enough, which is correct and useless.',
            'Uracil' => 'RNA is read as DNA here, with U taken as T. That is usually what you want; it is worth knowing.',
        ],
        'limits' => [
            'No mismatches' => 'Every position must satisfy the pattern. A one-mismatch search is a different tool.',
            'Length floor' => 'A pattern shorter than about four bases will match by chance many times in any real sequence.',
            'Plain text only' => 'Regular expressions and position weight matrices are not accepted.',
        ],
        'uses' => 'Pattern searches are used to count restriction sites, to check whether a primer site is unique in a plasmid, to look for regulatory motifs, and to confirm that a synthesised construct still contains the sequence it was designed around.',
        'faq' => [
            ['q' => 'Why does a palindromic site count twice on both strands?', 'a' => 'Because it is its own reverse complement. The site exists once in the duplex, but the text appears on both strands, and the page counts the text.'],
            ['q' => 'Can I search for a degenerate restriction site?', 'a' => 'Yes. Write it in IUPAC codes, for example GGWCC for a BamHI-family site with either base at the third position.'],
        ],
    ],

    'dna-to-mrna' => [
        'title' => 'DNA to mRNA Converter: Transcription, Reverse and Protein',
        'desc' => 'Transcribe a DNA strand to mRNA and back, codon by codon, and read the protein the transcript would make — all three views in one panel.',
        'intro' => 'This page shows a coding sequence in three forms at once: the DNA in codons, the mRNA transcript it would produce, and the protein those codons encode. It also works in the other direction, from an mRNA back to the DNA that could have made it.',
        'does' => 'It converts between DNA and mRNA in whole codons and reports the protein that the message encodes, so a sequence can be checked at all three levels at once instead of one at a time.',
        'how' => 'Both boxes are cleaned to letters. Transcribing DNA to mRNA replaces every T with U and leaves the rest alone; the reverse replaces U with T. The transcript is then split into codons from the first base, and each codon is looked up in the standard genetic code and written out as a three-letter amino acid name, with stop codons shown as Stop. The page computes both directions, so it always has something to show whichever box you filled.',
        'example_note' => 'A 39-base coding sequence becomes 39 bases of mRNA with every T turned into U, and the protein reads Met-Ala-Ile-Val-Met-Gly-Arg-Stop: eight residues and a stop, which is what a 39-base frame can hold if a stop falls inside it.',
        'read' => 'The three columns are the same information at three levels. If the protein ends in Stop where you expected more residues, the frame or the sequence is wrong; if the mRNA differs from the DNA anywhere other than T and U, something downstream of the paste is not a plain transcription.',
        'defs' => [
            'DNA, in codons' => 'the input split into triplets for reading, not a different sequence.',
            'Messenger RNA transcript' => 'the same bases with T replaced by U, still in codons.',
            'Protein' => 'one three-letter name per codon, with Stop where a stop codon falls.',
            'DNA from your mRNA' => 'the reverse direction: U replaced by T.',
        ],
        'check' => 'Transcribe the first six bases by hand: every T becomes U and nothing else moves. Then translate the first two codons from a genetic-code table and compare with the protein line. If the first residue is not Met, the first codon is not ATG and you are not looking at a coding sequence.',
        'pitfalls' => [
            'Typing a T into the mRNA box' => 'T is not an RNA base; it is dropped, which shortens the message silently.',
            'Pasting the template strand' => 'The template strand is the complement of the coding strand. Transcribing it gives the antisense message.',
            'Reading frame' => 'Translation starts at the first base you paste. One leading base shifts every codon after it.',
        ],
        'limits' => [
            'No splicing' => 'The page transcribes and translates a contiguous sequence. Introns, if present, are translated as though they were exons.',
            'Standard code only' => 'Mitochondrial and other variant codes are not applied.',
            'One strand' => 'It works on the strand you paste; it does not choose the coding strand for you.',
        ],
        'uses' => 'It is used to check a cloned insert end to end, to see what a silent mutation did to the codons, to confirm that a primer did not shift the frame, and to explain to a student why the protein does not match the DNA by eye.',
        'faq' => [
            ['q' => 'Can I type mRNA and get DNA?', 'a' => 'Yes. Put the message in the mRNA box; the page shows the DNA that would transcribe into it.'],
            ['q' => 'Why does the protein stop in the middle?', 'a' => 'A stop codon inside the frame. Either the sequence really has one or the reading frame is wrong.'],
        ],
    ],

    'dna-to-protein' => [
        'title' => 'DNA to Protein Translation: Six Frames and Longest ORF',
        'desc' => 'Translate a DNA sequence in any frame, find the longest open reading frame across all six frames, and read its length, residues, stops and mass.',
        'intro' => 'Translate a DNA sequence into protein and the first thing to decide is the frame. This page translates it in one, in six, or up to the first stop, and reports the longest open reading frame with its length and mass.',
        'does' => 'It turns a nucleotide sequence into the protein it encodes, and reports the figures that go with that: the coding length of the longest open reading frame, how many residues it holds, how many stops fall in frame 1, and the mass of the protein.',
        'how' => 'The paste is cleaned and translated codon by codon against the standard code, in frame 1, in all six frames, or up to the first stop, depending on the setting you choose. An open reading frame is the longest run between stops. The page takes that run, multiplies its residue count by three for the coding length, and sums average residue masses for the molecular weight.',
        'example_note' => 'A 54-base paste with a deliberate ATG in the middle: all six frames find a 16-residue reading frame of 48 bases, because a longer ORF opens on the other strand than the one you might first read. Frame 1 only reports 9 residues, the difference between the two settings.',
        'read' => 'The coding length and the residue count are the same figure in different units, so they should always agree. The stop count in frame 1 is a diagnostic, not part of the protein: several stops means the frame is open in short stretches and closed in others, which is normal for a random sequence and suspicious for a cloned gene.',
        'defs' => [
            'Coding length' => 'three times the residues of the longest open reading frame, in base pairs.',
            'Amino acids' => 'the residue count of that same reading frame.',
            'Stop codons in frame 1' => 'how many stop codons appear when the sequence is read from its first base.',
            "Mass of the ORF's protein" => 'the average molecular weight of the translated frame, in kDa.',
        ],
        'check' => 'Find the ATG by eye, read triplets from it to the next stop, and translate with a table. The residue count should match your count of triplets; if it does not, the frame you read by eye is not the frame the page picked.',
        'pitfalls' => [
            'Forgetting the reverse strand' => 'Half of all open reading frames sit on the other strand. The six-frame setting exists for exactly that.',
            'No start codon' => 'The page reports the longest stop-free stretch, which need not begin at an ATG. A real gene does.',
            'Rare codons and stops' => 'Translation here is mechanical; it does not know about read-through, selenocysteine or suppression.',
        ],
        'limits' => [
            'Standard genetic code' => 'Mitochondrial codes, and codons reassigned in some organisms, are not applied.',
            'No introns' => 'Eukaryotic genes are translated as contiguous sequence, introns included.',
            'Average mass' => 'The molecular weight is a sum of average residue masses with no modifications.',
        ],
        'uses' => 'Translation is used to check that a cloned insert is in frame, to find the protein a random piece of DNA would make, to work out whether a mutation is silent, and to estimate the size of a product before running it on a gel.',
        'faq' => [
            ['q' => 'Which setting should I use?', 'a' => 'For a known gene, frame 1 from the start codon. For an unknown sequence, all six frames — the protein may be encoded on the reverse strand.'],
            ['q' => 'Why is the protein shorter than the DNA suggests?', 'a' => 'Because the reading frame starts at a start codon and ends at a stop. DNA between them and the ends of the paste is not part of the protein.'],
        ],
    ],

    'dog-coat-color' => [
        'title' => 'Dog Coat Colour Calculator: E, K, B and D Loci',
        'desc' => 'Choose the genotype at the E, K, B and D loci, add ticking, and read the coat colour those loci produce, with each locus explained in turn.',
        'intro' => 'Coat colour in dogs comes from a short list of loci that act in order. Choose the genotype at E, K, B and D, say whether ticking is present, and the page names the colour and shows what each locus is doing.',
        'does' => 'It turns a genotype into a coat description by applying the known epistatic order: extension first, then dominant black, then brown, then dilution. The answer is a phrase you can check against the dog in front of you.',
        'how' => 'Each choice is read as a genotype — E/E, E/e, e/e and so on. The page applies the loci in a fixed order. E/e and E/E allow black pigment, e/e forbids it entirely, which is why a red dog can carry black but not show it. K^B forces solid black over anything the agouti locus would otherwise do, K^br gives brindle, and k^y/k^y lets the agouti pattern show. B decides black against brown pigment, and D decides whether that pigment is diluted. The first locus that settles the outcome wins, and the ones after it only modify what is left.',
        'example_note' => 'E/e with k^y/k^y, B/b and d/d gives "blue, or blue agouti": black pigment is allowed, the agouti locus is free to show, brown is carried but not expressed, and dilution turns the black to blue. The same dog with D/D would be black or agouti-patterned.',
        'read' => 'Read the answer as the base colour the loci allow, not as the whole appearance. White markings, ticking, merle and harlequin come from other loci and are layered on top; the phrase this page returns describes the pigment the dog can make.',
        'defs' => [
            'Predicted coat colour' => 'the pigmentation the chosen combination produces, in words, with ticking added if you said so.',
        ],
        'check' => 'Work the loci in order yourself: ask whether black is allowed (E), whether it is forced (K), whether the pattern shows, then whether the pigment is brown (B) and diluted (D). If your order differs from the page, one of you has the epistasis wrong — it is E, then K, then A, then B, then D.',
        'pitfalls' => [
            'Confusing genotype with appearance' => 'A black dog can carry red at E, and a red dog can carry black. Choose the genotype, not the colour you see.',
            'Ticking is separate' => 'Ticking adds flecks to white areas; it does not change the base pigment and should not be used to explain a colour.',
            'Labelling' => 'Breeders sometimes use different letters for the same locus. Match the description, not the letter.',
        ],
        'limits' => [
            'Four loci only' => 'Merle, harlequin, and the full agouti series are not modelled, so a merle dog will be described by its base colour.',
            'Puppy prediction' => 'The page describes one genotype. A cross needs the parents\' genotypes at every locus and a probability calculation.',
            'Not a breed test' => 'This is a teaching model of known epistasis, not a substitute for a DNA test.',
        ],
        'uses' => 'It is used to explain why two black Labradors can produce a yellow puppy, to check whether a breeder\'s genotype call is consistent with the dog, and to work out what a litter could contain before a mating is planned.',
        'faq' => [
            ['q' => 'Why can two yellow Labradors never produce a black puppy?', 'a' => 'Because yellow is e/e: no black pigment is made at all, whatever the other loci say. Both parents can only pass e.'],
            ['q' => 'What does dilution do?', 'a' => 'It lightens black to blue and brown to lilac or isabella, without changing which pigment the dog is making.'],
        ],
    ],

    'dog-life-expectancy' => [
        'title' => 'Dog Life Expectancy Calculator: Human Years by Size',
        'desc' => 'Enter a dog\'s age and breed size to see its age in human years, the typical lifespan for that size, the years likely left and its life stage.',
        'intro' => 'The old rule of seven human years per dog year is wrong at both ends. This page converts a dog\'s age using the fast first years and a size-dependent rate after them, then sets that against the lifespan its size class usually reaches.',
        'does' => 'It answers two questions at once: how old the dog is in human terms, and how much of its expected life is left. It also names the life stage, which is the figure owners actually use when deciding on screening and diet.',
        'how' => 'The first year counts as about fifteen human years and the second adds nine, because a dog matures far faster than a person in its first two years. After that each dog year adds a rate set by size class: small breeds add fewer human years per dog year and live longer, large breeds the reverse. Years left are the expected lifespan for the class minus the dog\'s age, floored at zero. The life stage is a band based on the age at which that size class reaches adulthood.',
        'example_note' => 'A five-year-old medium dog comes out at 36.9 human years, with a typical lifespan of twelve and seven years likely left: a young adult, past the fast phase but nowhere near the end of its class\'s range.',
        'read' => 'The human-age figure is a comparison, not a measurement; the years-left figure is the more useful one, and it is an average for the size class rather than a prediction for this dog. Life stage is a coarse band and moves in steps, so a dog either side of a boundary can be labelled differently one month apart.',
        'defs' => [
            'Age in human years' => 'the converted age, using the fast start and the size-specific rate after year two.',
            'Typical lifespan' => 'the median lifespan for the size class you chose.',
            'Years left' => 'typical lifespan minus current age, never below zero.',
            'Life stage' => 'puppy, young adult, mature adult or senior, from the age against the class\'s adult age.',
        ],
        'check' => 'Do the first two years by hand: fifteen plus nine is twenty-four human years at age two. Then add the class rate for each further year: a small breed adds about four, a large breed about six to seven. The result should land within a year of the page.',
        'pitfalls' => [
            'Size class' => 'A large dog can be small at five kilos as a puppy. Choose the class it will be as an adult.',
            'Breed beats class' => 'Flat-faced and giant breeds sit well outside their class average; a bulldog is not a medium dog for lifespan purposes.',
            'Rescue ages' => 'An estimated age is an estimate. The lifespan figure inherits that error.',
        ],
        'limits' => [
            'Median, not maximum' => 'The lifespan is what the class usually reaches, not what the oldest dogs reach.',
            'No health adjustment' => 'Body condition, neuter status and chronic disease all move the figure and none of them is a box here.',
            'One conversion' => 'There are several published curves; this is the familiar two-phase one, not a veterinary actuarial model.',
        ],
        'uses' => 'It is used to explain to an owner why a two-year-old dog is already an adult, to decide when senior screening becomes sensible, and to set expectations when a rescue dog\'s age is uncertain.',
        'faq' => [
            ['q' => 'Why not multiply by seven?', 'a' => 'Because development is not linear. A one-year-old dog is sexually mature, which seven human years is not, and a twenty-year-old small dog is not 140.'],
            ['q' => 'Why does size change the rate?', 'a' => 'Larger dogs mature more slowly but age faster once adult, and they have shorter median lifespans. The page uses that pattern.'],
        ],
    ],

    'fuzzy-protein-search' => [
        'title' => 'Fuzzy Protein Search: Motif Matching with Mismatches',
        'desc' => 'Search a protein for a motif allowing a set number of mismatches, with X matching any residue, and read the hits, the best mismatch count and the total positions.',
        'intro' => 'Exact motif searches miss the interesting hits. This page finds a protein motif allowing a set number of mismatches, with X standing for any residue, and reports how many hits it found, how close the best one was, and how many positions were searched.',
        'does' => 'It locates a short amino-acid pattern in a protein sequence even when one or two residues differ, which is how you find a family member that is not identical, or a motif that has drifted.',
        'how' => 'The protein and the pattern are cleaned to letters. At every position the page lines the pattern up against the sequence, counts the positions that disagree, and treats X in the pattern as a free match. A position is a hit if the mismatch count is within the allowance you set. The best figure is the smallest mismatch count among the hits, which is 0 when an exact copy of the motif is present.',
        'example_note' => 'One hit with zero mismatches in a 29-residue protein: the pattern is the first nine residues of the sequence itself, so an exact match exists. The total of 29 is the number of positions tested, which is the protein length minus the pattern length plus one.',
        'read' => 'The hit count rises fast as the allowance rises, especially for short motifs: with a two-mismatch allowance a six-residue pattern matches almost anything. Read the best figure first — zero means the motif is present exactly, and anything else means you are looking at a relative.',
        'defs' => [
            'Matches found' => 'positions where the pattern fits within the mismatch allowance.',
            'Fewest mismatches' => 'the smallest disagreement count among those positions; zero means an exact copy.',
            'Total positions' => 'how many alignments were tested; a 100-residue protein and a 6-residue pattern give 95.',
        ],
        'check' => 'Slide the pattern along the first twenty residues by hand and count disagreements at each position. Your hit count over that stretch should match the page\'s, and your best should be the same as the page\'s.',
        'pitfalls' => [
            'Allowance too generous' => 'Two mismatches in a six-residue motif is a third of it. Hits become meaningless before the count becomes large.',
            'X in the sequence' => 'An X in the protein stands for an unknown residue; here only X in the pattern is a wildcard.',
            'Case' => 'Lower-case residues are read as the same letters. A soft-masked sequence is not treated as unreliable.',
        ],
        'limits' => [
            'No scoring matrix' => 'Substitutions are counted as differences, not weighted by similarity. A conservative change and a radical one cost the same.',
            'No gaps' => 'The pattern must align without insertions or deletions.',
            'One pattern at a time' => 'A library of motifs has to be searched one after another.',
        ],
        'uses' => 'It is used to find a signal peptide in a divergent protein, to check whether a point mutant still carries its motif, and to pull candidate family members out of a list when the sequences are related but not identical.',
        'faq' => [
            ['q' => 'What does X mean in the pattern?', 'a' => 'Any residue at all. It costs nothing and is the usual way to allow the one position that varies between family members.'],
            ['q' => 'Should I allow mismatches at all?', 'a' => 'For a well-conserved motif, one is usually plenty. If you need two in a short pattern you are probably describing chance rather than biology.'],
        ],
    ],

    'gc-content-sequence' => [
        'title' => 'GC Content Calculator: Percentage, Counts and Melting',
        'desc' => 'Paste a DNA or RNA sequence and read its length, G+C count, GC and AT percentages, and the melting temperature those bases predict.',
        'intro' => 'GC content is the share of a sequence made of guanine and cytosine. Paste a sequence here and the page counts G and C, reports the percentage, the AT balance and the melting temperature that composition implies.',
        'does' => 'It turns a sequence into the composition figures that decide how a duplex behaves: how much of it is GC, how much AT, and how hot it has to get before the two strands separate.',
        'how' => 'The sequence is cleaned and uppercased, then counted base by base. GC content is G plus C over the length; AT content is A plus T (or U, in RNA) over the same length, so the two add to 100. The melting temperature is then estimated from the composition and the length using the usual rules — the Wallace rule for very short oligos, the GC-percentage form for moderate lengths, and the long-duplex form above that.',
        'example_note' => 'Twenty-two of thirty-nine bases are G or C, giving 56.41 per cent GC and 43.59 per cent AT — the two add to 100, which is the quickest check that the count is sane. A melting temperature of 70.8 °C follows from that composition.',
        'read' => 'GC content is a property of the paste, so a figure above about 65 per cent usually means a GC-rich region or a repeat, and a figure below 35 per cent means an AT-rich one. The melting temperature is an estimate from composition alone: salt, length and mismatches move it, and no composition rule accounts for secondary structure.',
        'defs' => [
            'Length' => 'bases after cleaning.',
            'G + C bases' => 'the raw count, which should equal the percentage times the length.',
            'GC content' => 'G plus C as a percentage of the length.',
            'AT content' => 'A plus T (or U) as a percentage; together with GC it must make 100.',
            'Melting temperature' => 'the predicted duplex melting point in °C from composition and length.',
        ],
        'check' => 'Count the Gs and Cs in the first ten bases by hand and extrapolate: the percentage should be close to the page\'s, and the count should equal the percentage times the length to within rounding. If GC and AT do not add to 100, something in the paste is not a base.',
        'pitfalls' => [
            'Ambiguous bases' => 'N, R, Y and the other IUPAC codes are not G, C, A or T, so they are not counted in either percentage — which is why the two can add to less than 100 on a real sequence.',
            'RNA in a DNA box' => 'U is counted as a base and treated as T for the AT side; a mixed paste will still count but the melting figure is meaningless.',
            'Short oligos' => 'Under about fourteen bases the Wallace rule dominates and a single mismatch moves the number by degrees.',
        ],
        'limits' => [
            'Composition only' => 'The melting temperature ignores salt, buffer, mismatches and secondary structure.',
            'Window average' => 'The window size you set is used for the melting estimate on long sequences; the percentages are for the whole paste.',
            'No interpretation' => 'A GC content is a fact about the sequence, not a prediction of whether it will amplify or clone.',
        ],
        'uses' => 'GC content is checked before designing primers, when choosing a polymerase and its denaturation steps, when comparing a bacterial genome with a eukaryotic one, and when deciding whether a sequence is likely to form a stable hairpin.',
        'faq' => [
            ['q' => 'Why do GC and AT not add to 100?', 'a' => 'Because the paste contains letters that are neither: N, or other ambiguity codes. Those bases are skipped by both counts.'],
            ['q' => 'Is a GC-rich sequence always better?', 'a' => 'No. High GC makes a duplex more stable and a template harder to denature, which is why GC-rich regions are often the ones that fail to amplify.'],
        ],
    ],

    'multi-reverse-translate' => [
        'title' => 'Multi Reverse Translate: Many Proteins, Host Codons',
        'desc' => 'Reverse translate one or many protein sequences at once into DNA, using host-preferred codons or a degenerate codon per residue, with stops optional.',
        'intro' => 'Reverse translation turns a protein back into the DNA that could encode it. This page does it for a whole list of proteins at once, choosing codons for a named host and reporting how many sequences it translated and how GC-rich the result is.',
        'does' => 'It converts a batch of protein sequences into DNA, one line at a time, using a codon table for the host you choose. It reports how many sequences it read, how many residues in total, and the GC content of the DNA it produced.',
        'how' => 'Each line is cleaned and read as a protein. Every residue is replaced by a codon — the host\'s most-used codon for that residue, or a degenerate codon such as GCN for alanine when you ask for the one that covers all synonyms. A stop codon is appended if you asked for one. Sequences are translated independently, so one line of headers or one blank line does not shift the rest.',
        'example_note' => 'One 29-residue protein becomes 90 bases of DNA with a GC content of 52.22 per cent: three bases per residue plus a stop, with the codons E. coli prefers.',
        'read' => 'The residue count tells you the list was read as you expected; the GC content tells you whether the DNA you are about to order will be easy or hard to synthesise, clone and amplify. Above about 65 per cent GC, synthesis vendors usually ask for a redesign.',
        'defs' => [
            'Sequences translated' => 'how many protein records the page read.',
            'Residues translated' => 'the total length of all of them, stops excluded.',
            'GC content' => 'the GC percentage of the DNA produced, across all sequences.',
        ],
        'check' => 'Multiply the residue count by three and add one codon per sequence for the stop; that is the DNA length. Then count the Gs and Cs in the first few codons and compare with the reported percentage.',
        'pitfalls' => [
            'Pasting DNA by mistake' => 'A nucleotide string reads as a protein of alanines, threonines, glycines and cysteines. The length gives it away: three times too long.',
            'Mixed case and spaces' => 'Both are handled; FASTA headers are stripped. What is not handled is a protein with digits in it.',
            'Host choice' => 'The codons are chosen for one host. A sequence optimised for E. coli will not be optimal in a human cell line.',
        ],
        'limits' => [
            'One codon per residue' => 'Except in degenerate mode, the page picks a single codon. It does not optimise for mRNA structure or avoid restriction sites.',
            'No verification' => 'The DNA is a possible gene, not a validated one; translating it back is the check.',
            'Stop handling' => 'Whether a stop is added is a setting; forgetting it changes the length by three.',
        ],
        'uses' => 'It is used to design a gene for synthesis, to turn a peptide list into orderable oligos, to work out what DNA a protein would need, and to compare the GC content of two possible back-translations before ordering one.',
        'faq' => [
            ['q' => 'What is the degenerate mode for?', 'a' => 'It writes each residue as IUPAC code covering every codon that encodes it, so the DNA shows which positions are free rather than committing to one.'],
            ['q' => 'Why does GC content matter so much?', 'a' => 'Because it decides how hard the DNA is to synthesise and amplify. Very high or very low GC sequences often need redesign before a vendor will make them.'],
        ],
    ],
];
