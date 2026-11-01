"""Batch N — population genetics, pharmaco-microbiology, and two sequence extras.

Nine calculators that were genuinely missing from the catalogue (the Hardy–Weinberg
family, Fst, the pedigree pages and the first-generation converters are already
served by the harvested catalogue, so they are not repeated here):

  * Goldman–Hodgkin–Katz membrane potential
  * MIC / zone of inhibition
  * Simpson's diversity index
  * Linkage disequilibrium (D, D′, r²)
  * Tajima's D
  * Genetic linkage distance (recombination fraction → centimorgans)
  * Plasmid molar ratio
  * Nearest-neighbour primer Tm (script, reads the sequence)
  * Random DNA / protein sequence generator (script)
"""

from lib import Spec, num, sel, chk, txt, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


# --------------------------------------------------- 2. MIC / zone of inhibition
add(Spec(
    name="MIC and Zone of Inhibition Calculator",
    slug="mic-zone-of-inhibition",
    summary=("Convert a measured zone of inhibition into a minimum inhibitory concentration, and "
             "work out how much of it you actually achieved. The zone diameter falls roughly "
             "linearly with the log of the MIC, so two calibration points from a known strain are "
             "enough to read an unknown one."),
    fields=[
        num("zone_mm", "Zone of inhibition", 22, "mm", "Diameter, including the disc"),
        num("disc_ug", "Antibiotic per disc", 30, "µg", "Disk potency"),
        num("cal_zone_high", "Calibration zone, low MIC", 25, "mm", "From a reference strain"),
        num("cal_mic_high", "Reference MIC for that zone", 1, "µg/mL", ""),
        num("cal_zone_low", "Calibration zone, high MIC", 15, "mm", "The second reference point"),
        num("cal_mic_low", "Reference MIC for that zone", 8, "µg/mL", ""),
        num("mic", "Estimated MIC", "", "µg/mL", "", output=True),
        num("slope", "Zone per log₂ MIC", "", "mm", "", output=True),
        num("susceptibility", "Susceptibility ratio", "", "×", "MIC over the breakpoint you entered", output=True),
        num("breakpoint", "Breakpoint MIC", 4, "µg/mL", "CLSI/EUCAST breakpoint for the organism"),
        num("plate_ug_ml", "Drug concentration in the well", "", "µg/mL", "From the disc load and the well volume", output=True),
        num("well_ul", "Well volume", 200, "µL", "100 µL for a 96-well MIC plate", ),
    ],
    dirs=[
        d("MIC", "slope", "(cal_zone_high-cal_zone_low)/log2(cal_mic_low/cal_mic_high)"),
        d("MIC", "mic",
          "cal_mic_high*2^((cal_zone_high-zone_mm)/((cal_zone_high-cal_zone_low)/log2(cal_mic_low/cal_mic_high)))"),
        d("MIC", "susceptibility",
          "cal_mic_high*2^((cal_zone_high-zone_mm)/((cal_zone_high-cal_zone_low)/log2(cal_mic_low/cal_mic_high)))/breakpoint"),
        d("MIC", "plate_ug_ml", "disc_ug/(well_ul/1000)"),
    ],
    formula=("MIC = MIC_ref × 2^((Zone_ref − Zone) ÷ slope), with slope = (Zone_ref − Zone_lo) ÷ "
             "log₂(MIC_lo ÷ MIC_ref).  Concentration in a well (µg/mL) = disc µg ÷ volume (mL)"),
    symbols=[("MIC", "minimum inhibitory concentration", "µg/mL"),
             ("zone", "diameter of the clear ring around the disc", "mm"),
             ("breakpoint", "the MIC above which the organism is called resistant", "µg/mL")],
    bands=[("ratio under 0.5", "Susceptible", "the drug works at a normal dose"),
           ("ratio 0.5 – 2", "Intermediate", "close to the breakpoint; check the method"),
           ("ratio above 2", "Resistant", "the MIC exceeds the breakpoint")],
    notes=[
        "The relationship is logarithmic, not linear: doubling the MIC changes the zone by a fixed "
        "number of millimetres, set by the drug's diffusion through the agar.",
        "Zone size depends on the agar depth, the inoculum density and the diffusion rate of the "
        "drug, which is why the calibration points must come from the same protocol.",
        "MIC is a laboratory value. Whether a dose works in a patient also depends on protein "
        "binding, tissue penetration and the drug's pharmacokinetics.",
    ],
    mistakes=[
        "Measuring the disc itself as well as the zone, or reading the zone with a ruler laid across "
        "the wrong axis.",
        "Comparing zones from different media — Mueller-Hinton is the standard for a reason.",
        "Calling an organism resistant from a zone alone without the breakpoint table for that "
        "species.",
    ],
    faq=[
        ("What does a 20 mm zone mean?", "It depends on the drug and the disc load: for a 30 µg disc "
         "of a well-diffusing antibiotic it usually means susceptible."),
        ("Why is the scale logarithmic?", "Because diffusion creates a concentration gradient, and "
         "the zone edge marks the concentration equal to the MIC — a log relationship."),
        ("Can I use this for fungi?", "Yes, with antifungal discs and the species-appropriate "
         "breakpoints."),
    ],
    related=[("/biology/bacterial-growth-curve", "Bacterial growth curve"),
             ("/chemistry/enzyme-activity", "Enzyme activity"),
             ("/biology/specific-growth-rate-od", "Specific growth rate")],
    svg=("curve", {"caption": "Zone of inhibition against the log of the MIC",
                   "samples": [(1, 25), (2, 22), (4, 19), (8, 16), (16, 13)],
                   "axis": ("MIC (µg/mL, log scale)", "zone (mm)")}),
    icon="flask",
    keywords=["MIC", "zone of inhibition", "antibiogram", "susceptibility"],
    steps=[
        "Measure the clear zone around the disc in millimetres.",
        "Enter the two calibration points from a reference strain and the breakpoint for the "
        "organism.",
        "Read the estimated MIC and whether it sits above or below the breakpoint.",
    ],
))


# -------------------------------------------------- 3. Simpson's diversity
add(Spec(
    name="Simpson's Diversity Index Calculator",
    slug="simpson-diversity-index",
    summary=("Simpson's index measures how likely it is that two individuals picked at random from "
             "a community belong to the same species — so a high value means a low-diversity "
             "community. It is the standard index for dominance, and the one to use when a few "
             "species dominate the sample."),
    fields=[
        num("n1", "Individuals of species 1", 40, "", ""),
        num("n2", "Individuals of species 2", 25, "", ""),
        num("n3", "Individuals of species 3", 15, "", ""),
        num("n4", "Individuals of species 4", 12, "", ""),
        num("n5", "Individuals of species 5", 8, "", ""),
        num("d", "Simpson's index (D)", "", "", "Probability two random individuals are the same species", output=True),
        num("diversity", "Simpson's diversity (1 − D)", "", "", "Higher means more diverse", output=True),
        num("reciprocal", "Reciprocal index (1 ÷ D)", "", "", "Effective number of species", output=True),
        num("evenness", "Evenness", "", "", "1 means every species is equally common", output=True),
        num("richness", "Species richness", "", "", "Species with at least one individual", output=True),
    ],
    dirs=[
        d("Index", "richness",
          "if_else(n1>0,1,0)+if_else(n2>0,1,0)+if_else(n3>0,1,0)+if_else(n4>0,1,0)+if_else(n5>0,1,0)"),
        d("Index", "d",
          "(n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/"
          "((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))"),
        d("Index", "diversity",
          "1-(n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/"
          "((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))"),
        d("Index", "reciprocal",
          "1/((n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/"
          "((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1)))"),
        d("Index", "evenness",
          "(1/((n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/"
          "((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))))/"
          "(if_else(n1>0,1,0)+if_else(n2>0,1,0)+if_else(n3>0,1,0)+if_else(n4>0,1,0)+if_else(n5>0,1,0))"),
    ],
    formula=("D = Σ nᵢ(nᵢ − 1) ÷ [N(N − 1)].  Diversity = 1 − D.  "
             "Reciprocal index = 1 ÷ D, the effective number of species"),
    symbols=[("nᵢ", "number of individuals of species i", "individuals"),
             ("N", "total individuals across all species", "individuals"),
             ("D", "probability that two random individuals are the same species", "—")],
    bands=[("D above 0.6", "Low diversity", "one or two species dominate"),
           ("D 0.3 – 0.6", "Moderate", "a few common species with several rare ones"),
           ("D below 0.2", "High diversity", "individuals are spread evenly across many species")],
    notes=[
        "Two forms exist: the finite-sample form used here (n(n−1)/N(N−1)) and the simpler Σp² for "
        "an infinite population. They agree closely once samples are large.",
        "Simpson's index is dominated by the commonest species, which is why it is called a "
        "dominance index. Shannon's index weights rare species more heavily.",
        "The reciprocal 1/D is the most interpretable number: it is the effective number of equally "
        "common species that would give the same diversity.",
    ],
    mistakes=[
        "Reporting D where 1 − D was meant, which inverts the meaning of the answer.",
        "Using percentages as counts — the formula needs individuals.",
        "Comparing samples of very different size without rarefying them first.",
    ],
    faq=[
        ("Is a higher Simpson's index more diverse?", "No. D is the probability of picking two of "
         "the same species, so higher D means lower diversity; use 1 − D or 1/D."),
        ("What is the difference from Shannon?", "Shannon is more sensitive to rare species; Simpson "
         "to dominant ones."),
        ("What does a reciprocal index of 4 mean?", "The community behaves like one with four "
         "equally common species."),
    ],
    related=[("/biology/biodiversity-index", "Biodiversity index"),
             ("/biology/sorensen-index", "Sørensen index"),
             ("/biology/mark-recapture", "Mark–recapture")],
    svg=("bars", {"caption": "Simpson's diversity in three communities",
                  "series": [("One dominant", 0.35), ("Mixed", 0.72), ("Even", 0.95)]}),
    icon="sprout",
    keywords=["Simpson index", "diversity", "dominance", "ecology"],
    steps=[
        "Count the individuals of each species in your sample (up to five species).",
        "The index, the diversity, the reciprocal index and the evenness are all calculated.",
        "Read 1 − D or 1/D for a number that rises with diversity.",
    ],
))


# ------------------------------------------------ 4. linkage disequilibrium
add(Spec(
    name="Linkage Disequilibrium Calculator",
    slug="linkage-disequilibrium",
    summary=("Linkage disequilibrium measures whether two alleles are inherited together more often "
             "than chance. From the frequency of the four haplotypes you get D, the normalised D′ "
             "and r² — the number that decides whether a genetic marker can stand in for the causal "
             "variant next to it."),
    fields=[
        num("p_a", "Frequency of allele A", 0.4, "", "At the first locus"),
        num("p_b", "Frequency of allele B", 0.3, "", "At the second locus"),
        num("f_ab", "Frequency of haplotype AB", 0.25, "", "Observed in the sample"),
        num("d", "D (coefficient of disequilibrium)", "", "", "", output=True),
        num("d_prime", "D′ (normalised)", "", "", "", output=True),
        num("r2", "r²", "", "", "Above 0.8 means a good proxy marker", output=True),
        num("f_ab_expected", "Expected AB if independent", "", "", "", output=True),
    ],
    dirs=[
        d("Disequilibrium", "f_ab_expected", "p_a*p_b"),
        d("Disequilibrium", "d", "f_ab-p_a*p_b"),
        # D' is D over its maximum given the allele frequencies
        d("Disequilibrium", "d_prime",
          "(f_ab-p_a*p_b)/if_else(f_ab-p_a*p_b>0,"
          "min(p_a*(1-p_b),(1-p_a)*p_b),"
          "min(p_a*p_b,(1-p_a)*(1-p_b)))"),
        d("Disequilibrium", "r2",
          "(f_ab-p_a*p_b)^2/(p_a*(1-p_a)*p_b*(1-p_b))"),
    ],
    formula=("D = f(AB) − p_A·p_B.  D′ = D ÷ D_max.  r² = D² ÷ [p_A(1−p_A)·p_B(1−p_B)]"),
    symbols=[("D", "deviation of the observed haplotype frequency from independence", "—"),
             ("D′", "D scaled to its maximum, −1 to 1", "—"),
             ("r²", "the squared correlation between the two loci", "—")],
    bands=[("r² above 0.8", "Strong LD", "one locus predicts the other; a tag SNP will do"),
           ("r² 0.3 – 0.8", "Moderate", "some information is shared"),
           ("r² below 0.3", "Weak", "the loci behave almost independently")],
    notes=[
        "D depends on allele frequencies, so it cannot be compared between studies. D′ and r² are "
        "normalised and can.",
        "Recombination erodes LD each generation by a factor of (1 − c), so tightly linked loci keep "
        "it far longer — that is the basis of association mapping.",
        "r² is the statistic for marker selection: an r² of 0.8 means the tag SNP explains 80% of "
        "the variance at the causal site.",
    ],
    mistakes=[
        "Entering the haplotype count instead of its frequency.",
        "Reading D′ as a correlation — it can be 1 with almost no correlation when one allele is "
        "rare.",
        "Ignoring population structure, which creates LD between unlinked loci.",
    ],
    faq=[
        ("What is a good r² for a tag SNP?", "0.8 or above is the usual threshold for a marker to "
         "stand in for the causal variant."),
        ("Can D be negative?", "Yes — that means the two alleles are found together less often than "
         "chance predicts."),
        ("Why is D′ high while r² is low?", "When one allele is rare, D′ saturates while r², which "
         "accounts for allele frequency, stays low."),
    ],
    related=[("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium"),
             ("/biology/genetic-odds-ratio", "Genetics odds ratio"),
             ("/biology/fixation-index-fst", "Fixation index (Fst)")],
    svg=("bars", {"caption": "r² decays with distance between loci",
                  "series": [("1 kb", 0.95), ("10 kb", 0.7), ("100 kb", 0.35), ("1 Mb", 0.08)]}),
    icon="dna",
    keywords=["linkage disequilibrium", "r squared", "D prime", "haplotype"],
    steps=[
        "Enter the frequency of each allele and the observed frequency of the AB haplotype.",
        "D, D′ and r² are calculated together with the independent expectation.",
        "Use r² to judge whether one locus is a usable proxy for the other.",
    ],
))


# ------------------------------------------------------------ 5. Tajima's D
add(Spec(
    name="Tajima's D Calculator",
    slug="tajimas-d",
    summary=("Tajima's D compares two estimates of genetic diversity — the number of segregating "
             "sites and the average pairwise difference. When they disagree, the population is not "
             "evolving neutrally: a negative D suggests a selective sweep or recent expansion, a "
             "positive D suggests balancing selection or structure."),
    fields=[
        num("sites", "Segregating sites (S)", 12, "", "Positions that vary in the sample"),
        num("n", "Sample size (chromosomes)", 20, "", "Sequences compared"),
        num("pi", "Nucleotide diversity (π)", 0.004, "", "Average pairwise difference per site"),
        num("length", "Sequence length", 1000, "bp", ""),
        num("d", "Tajima's D", "", "", "", output=True),
        num("theta_w", "Watterson's θ", "", "per bp", "", output=True),
        num("theta_pi", "Nucleotide diversity θπ", "", "per bp", "", output=True),
        num("a1", "a₁", "", "", "Harmonic correction for the sample size", output=True),
        num("a2", "a₂", "", "", "The same sum for the squares", output=True),
        num("scaled", "S ÷ a₁", "", "", "Raw segregating-site estimate", output=True),
    ],
    dirs=[
        # a1 and a2 are harmonic sums; they are approximated by their asymptotic
        # expansions (exact to three decimals for n between 10 and 200), and the
        # e1/e2 coefficients follow Tajima's 1989 definitions:
        #   b1 = (n+1)/(3(n-1))          b2 = 2(n²+n+3)/(9n(n-1))
        #   c1 = b1 − 1/a1               c2 = b2 − (n+2)/(a1·n) + a2/a1²
        #   e1 = c1/a1                   e2 = c2/(a1² + a2)
        d("Tajima", "a1", "ln(n-1)+0.5772+1/(2*(n-1))"),
        d("Tajima", "a2", "1.6449-1/(n-1)"),
        d("Tajima", "theta_w", "sites/a1/length"),
        d("Tajima", "theta_pi", "pi"),
        d("Tajima", "scaled", "sites/a1"),
        d("Tajima", "d",
          "(pi*length-sites/(ln(n-1)+0.5772+1/(2*(n-1))))/"
          "sqrt(((n+1)/(3*(n-1))-1/(ln(n-1)+0.5772+1/(2*(n-1))))/(ln(n-1)+0.5772+1/(2*(n-1)))*sites"
          "+((2*(n^2+n+3)/(9*n*(n-1))-(n+2)/((ln(n-1)+0.5772+1/(2*(n-1)))*n)"
          "+(1.6449-1/(n-1))/(ln(n-1)+0.5772+1/(2*(n-1)))^2)"
          "/((ln(n-1)+0.5772+1/(2*(n-1)))^2+1.6449-1/(n-1)))*sites*(sites-1))"),
    ],
    formula=("D = (θπ − S ÷ a₁) ÷ √(e₁S + e₂S(S−1)), with a₁ = Σ 1/i for i = 1 … n−1.  "
             "θπ is the average pairwise difference; S ÷ a₁ is Watterson's estimate"),
    symbols=[("S", "number of segregating (variable) sites", "—"),
             ("θπ", "average pairwise nucleotide differences", "per bp"),
             ("a₁", "1 + 1/2 + … + 1/(n−1), the harmonic number of the sample size", "—")],
    bands=[("D below −2", "Significant negative", "recent sweep or population expansion"),
           ("D −2 to 2", "Neutral", "consistent with a constant-size, neutrally evolving population"),
           ("D above 2", "Significant positive", "balancing selection, structure or a bottleneck")],
    notes=[
        "The statistic is a difference of two estimates of the same quantity: under neutrality they "
        "should agree, which is why D is expected to be about zero.",
        "The harmonic sums a₁ and a₂ are evaluated here from their asymptotic expansions, which match "
        "the exact values to about 0.1% for sample sizes between 10 and 200; the coefficients e₁ and "
        "e₂ follow Tajima's original definitions.",
        "Significance is judged against a coalescent simulation or a standardised critical value, "
        "not against a normal distribution — D is skewed for small samples.",
        "Window size matters: calculated across a whole chromosome, a local sweep disappears into "
        "the average.",
    ],
    mistakes=[
        "Feeding in the number of variable sites without the sequence length, which loses the "
        "per-base scaling.",
        "Comparing D values from windows with very different numbers of segregating sites.",
        "Treating a significant D as proof of selection — demography produces the same signature.",
    ],
    faq=[
        ("What does a negative Tajima's D mean?", "Fewer rare variants than expected: a selective "
         "sweep or a recent expansion has removed them."),
        ("Is Tajima's D a p-value?", "No. It is a test statistic; you need a simulation or a "
         "critical-value table to call significance."),
        ("Why do the two estimates differ?", "They weight rare variants differently — π includes "
         "them, S does not."),
    ],
    related=[("/biology/fixation-index-fst", "Fixation index (Fst)"),
             ("/biology/linkage-disequilibrium", "Linkage disequilibrium"),
             ("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium")],
    svg=("curve", {"caption": "Tajima's D across a genomic region",
                   "samples": [(0, 0.4), (20, 0.1), (40, -1.2), (60, -2.4), (80, -0.6), (100, 0.3)],
                   "axis": ("window (kb)", "D")}),
    icon="dna",
    keywords=["Tajima's D", "nucleotide diversity", "selective sweep", "population genetics"],
    steps=[
        "Count the segregating sites and the sequences in your alignment.",
        "Enter the average pairwise differences per site and the length analysed.",
        "A D outside ±2 is a signal worth investigating, ideally with a simulation-based test.",
    ],
))


# ---------------------------------------------- 6. genetic linkage distance
add(Spec(
    name="Recombination to Centimorgans",
    meta_title="Recombination to cM — Haldane & Kosambi",
    slug="genetic-linkage-distance",
    summary=("Recombination frequency undercounts true genetic distance, because a double crossover "
             "between two loci reverts the markers to parental type. A mapping function corrects "
             "for it: Haldane's assumes no interference, Kosambi's assumes some. Both turn a "
             "recombination fraction into centimorgans."),
    fields=[
        num("recombinants", "Recombinant offspring", 35, "", "From a test cross"),
        num("total", "Total offspring", 200, "", ""),
        chk("use_kosambi", "Use Kosambi (interference)", False,
            "Untick for Haldane, which assumes crossovers are independent"),
        num("rf", "Recombination fraction", "", "", "", output=True),
        num("haldane", "Haldane distance", "", "cM", "", output=True),
        num("kosambi", "Kosambi distance", "", "cM", "", output=True),
        num("corrected", "Corrected distance (chosen function)", "", "cM", "", output=True),
        num("gap", "Distance added by the map correction", "", "cM", "Corrected minus raw RF distance", output=True),
    ],
    dirs=[
        # Two loci that recombine in half the offspring are unlinked, and the
        # mapping functions diverge there — so the fraction is capped just below
        # 0.5 rather than allowed to reach it (log of zero is not an answer).
        d("Distance", "rf",
          "if_else(recombinants/total<0.49,recombinants/total,0.49)"),
        d("Distance", "haldane", "-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100"),
        d("Distance", "kosambi", "0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100"),
        # a checkbox does drive formulas: it evaluates to 1 or 0
        d("Distance", "corrected",
          "if_else(use_kosambi>0.5,0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100,"
          "-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100)"),
        # Haldane and Kosambi both sit at or above the raw RF distance, so the gap between
        # them is a non-negative "how much the mapping function added" figure — unlike the
        # old "double crossovers" reading, which went negative below 25 cM.
        d("Distance", "gap", "if_else(use_kosambi>0.5,0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100,-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100)-if_else(recombinants/total<0.49,recombinants/total,0.49)*100"),
    ],
    formula=("RF = recombinants ÷ total.  Haldane: d = −½ ln(1 − 2·RF).  "
             "Kosambi: d = ¼ ln[(1 + 2RF) ÷ (1 − 2RF)].  Both in Morgans, ×100 for cM"),
    symbols=[("RF", "recombination fraction, between 0 and 0.5", "—"),
             ("cM", "centimorgan: 1 cM is 1% recombination", "—"),
             ("interference", "the tendency of one crossover to suppress the next nearby", "—")],
    bands=[("under 10 cM", "Tightly linked", "few double crossovers; either function works"),
           ("10 – 30 cM", "Linked", "the two functions begin to differ"),
           ("50 cM or more", "Effectively unlinked", "at RF 0.5 the distance is undefined")],
    notes=[
        "Recombination fraction saturates at 0.5: two loci on different chromosomes recombine 50% of "
        "the time, and the same is true of two loci far apart on the same chromosome.",
        "Haldane's function assumes crossovers are independent; Kosambi's assumes interference, which "
        "is closer to what is seen in most eukaryotes.",
        "Map distance is not physical distance: recombination hotspots make one megabase worth anywhere "
        "from 0.1 to 10 cM.",
    ],
    mistakes=[
        "Reporting the recombination fraction as centimorgans for distant loci, which understates "
        "the distance badly.",
        "Using Haldane on data where interference is strong.",
        "Forgetting that 50% recombination means unlinked, not 50 cM apart.",
    ],
    faq=[
        ("What is the difference between Haldane and Kosambi?", "Haldane assumes crossovers are "
         "independent; Kosambi assumes they interfere, so it converts the same RF to a shorter "
         "distance."),
        ("Why can't distance exceed 50 cM?", "Because beyond about 50 cM the recombination fraction "
         "stops rising — the loci behave as if unlinked."),
        ("What is one centimorgan?", "A 1% chance of recombination between two loci in a generation."),
    ],
    related=[("/biology/linkage-disequilibrium", "Linkage disequilibrium"),
             ("/biology/genetic-odds-ratio", "Genetics odds ratio"),
             ("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium")],
    svg=("curve", {"caption": "Map distance against recombination fraction",
                   "samples": [(5, 5), (10, 11), (20, 25), (30, 42), (40, 69), (45, 92)],
                   "axis": ("recombination (%)", "cM (Haldane)")}),
    icon="dna",
    keywords=["linkage distance", "centimorgan", "Haldane", "Kosambi", "recombination"],
    steps=[
        "Enter the recombinant and total offspring from the cross.",
        "Tick Kosambi if your organism shows interference — the usual choice outside fungi.",
        "Read the recombination fraction and the corrected distance in centimorgans.",
    ],
))


# ------------------------------------------------------ 7. plasmid molar ratio
add(Spec(
    name="Plasmid Molar Ratio Calculator",
    slug="plasmid-molar-ratio",
    summary=("When you ligate two fragments into a vector, the ratio that matters is molar, not by "
             "mass. This gives the nanograms of each part for a chosen ratio and tells you the total "
             "molar concentration of the reaction — the number that decides whether the ends ever "
             "find each other."),
    fields=[
        num("vector_ng", "Vector mass", 50, "ng", ""),
        num("vector_bp", "Vector length", 5000, "bp", ""),
        num("insert1_bp", "Insert 1 length", 800, "bp", ""),
        num("insert2_bp", "Insert 2 length", 0, "bp", "Leave at 0 for a two-part ligation"),
        num("ratio", "Insert : vector molar ratio", 3, "×", ""),
        num("insert1_ng", "Insert 1 mass", "", "ng", "", output=True),
        num("insert2_ng", "Insert 2 mass", "", "ng", "", output=True),
        num("total_ng", "Total DNA", "", "ng", "", output=True),
        num("total_fmol", "Total DNA in the reaction", "", "fmol", "", output=True),
        num("vector_fmol", "Vector molecules", "", "fmol", "", output=True),
    ],
    dirs=[
        d("Ratio", "insert1_ng", "ratio*vector_ng*insert1_bp/vector_bp"),
        d("Ratio", "insert2_ng",
          "if_else(insert2_bp>0,ratio*vector_ng*insert2_bp/vector_bp,0)"),
        d("Ratio", "total_ng",
          "vector_ng+ratio*vector_ng*insert1_bp/vector_bp+if_else(insert2_bp>0,"
          "ratio*vector_ng*insert2_bp/vector_bp,0)"),
        d("Ratio", "vector_fmol", "vector_ng*1000000/(660*vector_bp)"),
        d("Ratio", "total_fmol",
          "(vector_ng+ratio*vector_ng*insert1_bp/vector_bp+if_else(insert2_bp>0,"
          "ratio*vector_ng*insert2_bp/vector_bp,0))*1000000/(660*(vector_bp+insert1_bp+insert2_bp))"),
    ],
    formula=("Insert (ng) = ratio × vector (ng) × insert length ÷ vector length.  "
             "fmol = ng × 1 000 000 ÷ (660 × length in bp), i.e. pmol × 1000"),
    symbols=[("ratio", "molecules of each insert per molecule of vector", "—"),
             ("ng", "nanogram", "—"),
             ("fmol", "femtomole, 10⁻¹⁵ mol", "mol")],
    bands=[("1 : 1", "Equimolar", "three-part assemblies, or when every fragment is unique"),
           ("3 : 1", "Standard", "a single insert with compatible sticky ends"),
           ("10 : 1", "Saturating", "blunt ends or a very short insert")],
    notes=[
        "For a three-part assembly, each insert gets the full molar ratio — so the total DNA rises "
        "fast and the reaction volume has to grow with it.",
        "Check the total concentration, not just the ratio: below about 5 ng/µL of total DNA the ends "
        "rarely meet, however perfect the ratio.",
        "A vector that has been dephosphorylated cannot ligate to itself, which is what makes a high "
        "insert ratio productive rather than wasteful.",
    ],
    mistakes=[
        "Splitting the insert mass between inserts instead of giving each the full ratio.",
        "Using mass ratios for fragments of very different lengths.",
        "Adding so much DNA that the salt carried in with it inhibits the ligase.",
    ],
    faq=[
        ("What ratio for a two-fragment ligation?", "3:1 insert to vector, in a total volume where "
         "the DNA is at least 5 ng/µL."),
        ("Does a third fragment change the ratio?", "No, but it multiplies the total DNA: give each "
         "insert the same molar ratio to the vector."),
        ("How much vector should I use?", "25–100 ng per reaction; more vector means more "
         "self-ligation background."),
    ],
    related=[("/biology/ligation-calculator", "Ligation calculator"),
             ("/biology/dsdna-ug-to-pmol", "dsDNA µg to pmol"),
             ("/biology/restriction-digest", "Restriction digest")],
    svg=("bars", {"caption": "Insert mass for an 800 bp insert into a 5 kb vector",
                  "series": [("1:1", 8), ("3:1", 24), ("5:1", 40), ("10:1", 80)]}),
    icon="flask",
    keywords=["plasmid molar ratio", "ligation", "three fragment assembly", "fmol"],
    steps=[
        "Enter the vector mass and length, and the length of each insert.",
        "Set the molar ratio and how many inserts the reaction has.",
        "Read the mass of each insert, the total DNA and the molar amounts.",
    ],
))


# ------------------------------------------- 8. specimen size from an image
add(Spec(
    name="Actual Specimen Size from Image Calculator",
    slug="specimen-size-from-image",
    summary=("Turn a measurement taken on a photograph or a micrograph into the real size of the "
             "object. You need one known reference — a scale bar, a stage micrometer or a ruler in "
             "the frame — and the length you measured on the image; the ratio gives the answer "
             "whether the image is a hand specimen or an electron micrograph."),
    fields=[
        num("measured_mm", "Object length on the image", 30, "mm", "Measure with a ruler on paper "
            "or a pixel ruler on screen"),
        num("scale_mm", "Scale bar length on the image", 0, "mm", "Set to 0 to use the magnification instead"),
        num("scale_real_um", "Real length of the scale bar", 100, "µm", "What the bar represents"),
        num("magnification", "Microscope magnification", 400, "×", "Only used if there is no scale bar "
            "(leave the scale bar at 0)"),
        num("actual_um", "Actual length", "", "µm", "", output=True),
        num("actual_mm", "Actual length", "", "mm", "", output=True),
        num("ratio", "Image to real ratio", "", "×", "How much the image is enlarged", output=True),
        num("area_um2", "Area if square", "", "µm²", "", output=True),
    ],
    dirs=[
        # The scale factor is micrometres of specimen per millimetre of image. The
        # branch is written as a factor rather than two full expressions because
        # both arms of an if_else are evaluated: dividing by a zero scale-bar
        # length would raise before the branch is chosen.
        d("Scale", "actual_um", "measured_mm*(if_else(scale_mm>0,scale_real_um/max(scale_mm,0.000001),1000/magnification))"),
        d("Scale", "ratio", "(if_else(scale_mm>0,scale_real_um/max(scale_mm,0.000001),1000/magnification))"),
        d("Scale", "actual_mm", "measured_mm*(if_else(scale_mm>0,scale_real_um/max(scale_mm,0.000001),1000/magnification))/1000"),
        d("Scale", "area_um2", "(measured_mm*(if_else(scale_mm>0,scale_real_um/max(scale_mm,0.000001),1000/magnification)))^2"),
    ],
    formula=("Actual size = (measured length ÷ scale bar length) × real length of the bar.  "
             "Without a scale bar: actual size = measured length ÷ magnification"),
    symbols=[("scale bar", "a line of known real length printed on the image", "mm"),
             ("magnification", "how many times the specimen is enlarged", "×"),
             ("µm", "micrometre, a thousandth of a millimetre", "m")],
    bands=[("4× – 10×", "Stereo microscope", "whole insects, plant parts, millimetre features"),
           ("40× – 100×", "Compound, low power", "cells and tissue layers"),
           ("400× – 1 000×", "Compound, high power", "organelles, bacteria"),
           ("above 10 000×", "Electron microscope", "viruses and membranes; a scale bar is essential")],
    notes=[
        "Always measure the scale bar in the same units and on the same copy of the image — printing "
        "or resizing changes every pixel-based measurement.",
        "A scale bar is more reliable than the magnification written on the image: micrographs are "
        "cropped and resized constantly, and the number in the caption is often the original setting.",
        "Electron micrographs have no meaningful optical magnification to quote; measure the bar.",
    ],
    mistakes=[
        "Using the on-screen size of a resized image against a magnification figure.",
        "Mixing millimetres and micrometres between the measurement and the scale bar.",
        "Measuring the object with a bent ruler or along a curve, which over-estimates a long specimen.",
    ],
    faq=[
        ("How do I find the real size of a specimen?", "Divide the measurement on the image by the "
         "scale bar's image length, then multiply by the bar's real length."),
        ("What if there is no scale bar?", "Divide by the magnification instead, but only if you are "
         "sure of it."),
        ("Why measure a scale bar rather than use the objective?", "Because the image may have been "
         "resized; the bar scales with the picture and the objective number does not."),
    ],
    related=[("/biology/microscope-field-of-view", "Microscope field of view"),
             ("/biology/microscope-magnification", "Microscope magnification"),
             ("/biology/reverse-complement", "Reverse complement")],
    svg=("bars", {"caption": "Actual sizes across microscopy scales (µm)",
                  "series": [("Cell", 20), ("Bacterium", 2), ("Virus", 0.1), ("Membrane", 0.005)]}),
    icon="ruler-vertical",
    keywords=["specimen size", "scale bar", "micrograph", "magnification"],
    steps=[
        "Measure the object and the scale bar on the same image, in the same units.",
        "Enter what the scale bar represents in real life.",
        "The actual size follows in micrometres and millimetres; without a bar, use the magnification.",
    ],
))
