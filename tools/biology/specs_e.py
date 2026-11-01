"""Batch E — genetics, population genetics and inheritance."""

from lib import Spec, num, sel, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


add(Spec(
    name="Hardy–Weinberg Equilibrium Calculator",
    slug="hardy-weinberg-equilibrium",
    summary=("The Hardy–Weinberg principle says allele and genotype frequencies stay constant from one "
             "generation to the next in a large, randomly mating population with no selection, no "
             "mutation, no migration and no drift. This calculator takes one allele frequency and "
             "returns the full genotype distribution, plus a chi-square test of whether an observed "
             "population actually fits."),
    fields=[
        num("p", "Dominant allele frequency (p)", 0.7, "", "0 to 1"),
        num("q", "Recessive allele frequency (q)", 0.3, "", ""),
        num("aa_obs", "Observed recessive homozygotes", 90, "individuals", "Optional goodness-of-fit test"),
        num("n", "Population size", 1000, "individuals", ""),
        num("aa", "Homozygous dominant AA", "", "", "", output=True),
        num("ab", "Heterozygotes Aa", "", "", "", output=True),
        num("bb", "Homozygous recessive aa", "", "", "", output=True),
        num("carriers", "Carrier frequency", "", "%", "", output=True),
        num("chi", "Chi-square (1 df) vs observation", "", "", "", output=True),
    ],
    dirs=[
        d("Allele frequencies", "bb", "q*q*n"),
        d("Allele frequencies", "ab", "2*p*q*n"),
        d("Allele frequencies", "aa", "p*p*n"),
        d("Allele frequencies", "carriers", "2*p*q*100"),
        d("Allele frequencies", "chi", "pow(aa_obs-q*q*n,2)/(q*q*n)+pow(0-2*p*q*n,2)/(2*p*q*n)"),
    ],
    formula="p + q = 1;  p² + 2pq + q² = 1",
    symbols=[("p", "frequency of the dominant allele", "0–1"),
             ("q", "frequency of the recessive allele", "0–1"),
             ("p²", "expected homozygous dominant", "share of population"),
             ("2pq", "expected heterozygotes, the carriers", "share of population"),
             ("q²", "expected homozygous recessive", "share of population")],
    bands=[("q² large, 2pq small", "Common recessive trait", "the recessive phenotype is frequent"),
           ("2pq above 0.5", "Mostly carriers", "rare alleles hide almost entirely in heterozygotes"),
           ("p = q = 0.5", "Maximum diversity", "half the population is heterozygous")],
    notes=[
        "For a rare recessive allele, most copies hide in carriers: at q = 0.01, only 1 in 10 000 "
        "people shows the trait but about 1 in 50 carries it.",
        "The model assumes random mating and no selection. Assortative mating for a trait raises "
        "homozygosity above 2pq, and selection moves allele frequencies between generations.",
        "The chi-square test compares observed and expected counts, so it needs counts rather than "
        "frequencies, and it is only meaningful when every expected class is at least five.",
    ],
    mistakes=[
        "Entering a percentage where a frequency between 0 and 1 belongs.",
        "Applying the equation to a trait whose genotype you cannot observe — the phenotype of a "
        "dominant allele hides its carriers.",
        "Rejecting the null hypothesis because chi-square is large in a small sample, where the "
        "approximation does not hold.",
    ],
    faq=[
        ("What does Hardy–Weinberg equilibrium actually test?",
         "Whether a population is evolving at that locus. Departure from p² + 2pq + q² = 1 means one "
         "of the assumptions is being broken."),
        ("How do I find q if I only know the recessive phenotype frequency?",
         "Take its square root: q = √(q²)."),
        ("Why are so many carriers of a rare disease?",
         "Because 2pq stays large while q is small. At q = 0.02, 1 in 25 people is a carrier but only "
         "1 in 2 500 is affected."),
    ],
    related=[("/biology/hardy-weinberg-recessive-allele", "Hardy–Weinberg from q"),
             ("/biology/chi-square-genetics-test", "Chi-square test for genetics"),
             ("/biology/inbreeding-coefficient", "Inbreeding coefficient")],
    svg=("bars", {"caption": "Three genotypes, and how the recessive one shrinks as q falls."}),
    icon="dna",
))

add(Spec(
    name="Hardy–Weinberg from the Recessive Allele Frequency",
    slug="hardy-weinberg-recessive-allele",
    summary=("If you already know q, the recessive allele's frequency, the rest follows directly: p is "
             "1 − q, and the genotype frequencies are p², 2pq and q². This calculator spells out the "
             "three genotypes, the carrier rate and the ratio of carriers to affected individuals."),
    fields=[
        num("q", "Recessive allele frequency (q)", 0.2, "", "Between 0 and 1"),
        num("p", "Dominant allele frequency (p)", "", "", "", output=True),
        num("aa", "AA frequency", "", "", "", output=True),
        num("ab", "Aa frequency (carriers)", "", "", "", output=True),
        num("bb", "aa frequency (affected)", "", "", "", output=True),
        num("carrier_ratio", "Carriers per affected individual", "", ":1", "", output=True),
        num("pct", "Affected share of the population", "", "%", "", output=True),
    ],
    dirs=[
        d("Genotypes", "p", "1-q"),
        d("Genotypes", "aa", "(1-q)*(1-q)"),
        d("Genotypes", "ab", "2*(1-q)*q"),
        d("Genotypes", "bb", "q*q"),
        d("Genotypes", "carrier_ratio", "2*(1-q)*q/(q*q)"),
        d("Genotypes", "pct", "q*q*100"),
    ],
    formula="p = 1 − q;  AA = p²;  Aa = 2pq;  aa = q²",
    symbols=[("q", "recessive allele frequency", "0–1"),
             ("p", "dominant allele frequency", "0–1"),
             ("2pq", "heterozygote frequency", "0–1")],
    notes=[
        "The ratio of carriers to affected people is 2p/q, which shows how sharply carriers "
        "outnumber patients as q falls.",
        "These are expected frequencies for a large randomly mating population, not counts for a "
        "particular family.",
        "For a sex-linked trait the arithmetic differs: males carry one X, so their frequency of the "
        "recessive phenotype equals q rather than q².",
    ],
    mistakes=[
        "Using q² for an X-linked recessive trait in males.",
        "Rounding p and q so that they no longer sum to exactly 1 before squaring.",
    ],
    faq=[
        ("Is the carrier frequency 2pq or q?",
         "2pq — the heterozygote frequency. q alone is the allele frequency."),
        ("What if q is 0.5?",
         "Then p is 0.5 too and the three genotype frequencies are 0.25, 0.5 and 0.25."),
    ],
    related=[("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium"),
             ("/biology/hardy-weinberg-recessive-homozygote", "Hardy–Weinberg from q²"),
             ("/biology/autosomal-recessive-risk", "Recessive inheritance risk")],
    svg=("curve", {"caption": "Carrier frequency peaks at q = 0.5 and stays high as q falls."}),
    icon="dna",
))

add(Spec(
    name="Hardy–Weinberg from the Recessive Homozygote Frequency",
    slug="hardy-weinberg-recessive-homozygote",
    summary=("The recessive phenotype frequency is q², so the allele frequency is its square root. This "
             "calculator carries it through to every genotype frequency and the carrier rate."),
    fields=[
        num("affected", "Frequency of the recessive phenotype", 0.04, "", "q², as a decimal"),
        num("q", "Recessive allele frequency (q)", "", "", "", output=True),
        num("p", "Dominant allele frequency (p)", "", "", "", output=True),
        num("hetero", "Heterozygote frequency", "", "", "", output=True),
        num("homo_dom", "Homozygous dominant frequency", "", "", "", output=True),
        num("carriers_per_case", "Carriers per affected individual", "", ":1", "", output=True),
    ],
    dirs=[
        d("Alleles", "q", "sqrt(affected)"),
        d("Alleles", "p", "1-sqrt(affected)"),
        d("Alleles", "hetero", "2*(1-sqrt(affected))*sqrt(affected)"),
        d("Alleles", "homo_dom", "(1-sqrt(affected))*(1-sqrt(affected))"),
        d("Alleles", "carriers_per_case", "2*(1-sqrt(affected))*sqrt(affected)/affected"),
    ],
    formula="q = √(q²);  p = 1 − q;  Aa = 2pq",
    symbols=[("q²", "frequency of the recessive phenotype", "0–1"),
             ("q", "recessive allele frequency", "0–1"),
             ("2pq", "carrier frequency", "0–1")],
    notes=[
        "This square root is only valid when the recessive phenotype is fully penetrant and every "
        "affected individual really is a homozygote.",
        "At low frequencies the square root is numerically sensitive: 0.0001 and 0.0004 give q of "
        "0.01 and 0.02, a doubling, so record the observed frequency with care.",
        "For a dominant trait the same arithmetic cannot recover the allele frequency from "
        "phenotypes, because homozygotes and heterozygotes look identical.",
    ],
    mistakes=[
        "Taking the square root of a percentage (0.4%) instead of a proportion (0.004).",
        "Assuming the trait is at equilibrium when it is under strong selection.",
    ],
    faq=[
        ("Why is the allele frequency the square root of the affected frequency?",
         "Because an affected individual must inherit a recessive allele from both parents, and the "
         "two draws are independent: q × q = q²."),
        ("What if 4% of a population is affected?",
         "q = 0.2, p = 0.8, and 32% of the population are carriers."),
    ],
    related=[("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium"),
             ("/biology/hardy-weinberg-recessive-allele", "Hardy–Weinberg from q"),
             ("/biology/hardy-weinberg-heterozygote", "Hardy–Weinberg from 2pq")],
    svg=("chain", {"caption": "From the visible phenotype back to the allele frequency."}),
    icon="dna",
))

add(Spec(
    name="Hardy–Weinberg from the Heterozygote Frequency",
    slug="hardy-weinberg-heterozygote",
    summary=("Heterozygote frequency 2pq is a quadratic in q, so it has two solutions — a fact that "
             "bites anyone converting a carrier rate back into an allele frequency. This calculator "
             "solves both branches and reports which one applies to your population."),
    fields=[
        num("hetero", "Heterozygote frequency (2pq)", 0.42, "", "Between 0 and 0.5"),
        num("q_low", "q (lower root)", "", "", "", output=True),
        num("q_high", "q (upper root)", "", "", "", output=True),
        num("p_low", "p for the lower root", "", "", "", output=True),
        num("homo_low", "Homozygote frequency, lower root", "", "", "", output=True),
        num("max_note", "Maximum possible 2pq", "", "", "0.5", output=True),
    ],
    dirs=[
        d("Roots", "q_low", "(1-sqrt(1-2*hetero))/2"),
        d("Roots", "q_high", "(1+sqrt(1-2*hetero))/2"),
        d("Roots", "p_low", "1-(1-sqrt(1-2*hetero))/2"),
        d("Roots", "homo_low", "pow(1-(1-sqrt(1-2*hetero))/2,2)+pow((1-sqrt(1-2*hetero))/2,2)"),
        d("Roots", "max_note", "0.5"),
    ],
    formula="2q² − 2q + h = 0,  so  q = [1 ± √(1 − 2h)] ÷ 2",
    symbols=[("h", "observed heterozygote frequency", "0–0.5"),
             ("q", "recessive allele frequency", "0–1"),
             ("1 − 2h", "the discriminant; negative means no solution", "—")],
    notes=[
        "2pq never exceeds 0.5, so a reported heterozygote frequency above 50% cannot come from a "
        "two-allele locus at equilibrium — check the data before trusting the roots.",
        "The two roots are mirror images: q and 1 − q give the same heterozygote frequency, so the "
        "data alone cannot tell you which allele is common.",
        "Real populations often have fewer heterozygotes than 2pq predicts (a Wahlund effect from "
        "population structure), which is one reason the observed value may be the more useful input.",
    ],
    mistakes=[
        "Entering 42 for 42% instead of 0.42.",
        "Taking the lower root without checking which allele is the rare one.",
        "Using this inversion when the locus has more than two alleles.",
    ],
    faq=[
        ("Can 2pq be greater than 0.5?",
         "No — its maximum is 0.5 at p = q = 0.5. A larger value means the population is not at "
         "equilibrium or the data are wrong."),
        ("Why are there two answers?",
         "Because 2q(1 − q) is symmetric about q = 0.5; both allele frequencies produce the same "
         "heterozygote share."),
    ],
    related=[("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium"),
             ("/biology/hardy-weinberg-recessive-homozygote", "Hardy–Weinberg from q²"),
             ("/biology/hardy-weinberg-dominant-homozygote", "Hardy–Weinberg from p²")],
    svg=("curve", {"caption": "2pq peaks at 0.5 and gives two allele frequencies for every value below it."}),
    icon="dna",
))

add(Spec(
    name="Hardy–Weinberg from the Dominant Homozygote Frequency",
    slug="hardy-weinberg-dominant-homozygote",
    summary=("Homozygous dominant frequency is p². Unless you have genotype-level data — "
             "sequencing, a codominant marker, a biochemical test — you cannot see this class, so it "
             "is usually used the other way round: to predict how many homozygotes a population "
             "should contain."),
    fields=[
        num("homo_dom", "Homozygous dominant frequency (p²)", 0.49, "", ""),
        num("p", "Dominant allele frequency (p)", "", "", "", output=True),
        num("q", "Recessive allele frequency (q)", "", "", "", output=True),
        num("hetero", "Heterozygote frequency", "", "", "", output=True),
        num("affected", "Recessive homozygote frequency", "", "", "", output=True),
    ],
    dirs=[
        d("Alleles", "p", "sqrt(homo_dom)"),
        d("Alleles", "q", "1-sqrt(homo_dom)"),
        d("Alleles", "hetero", "2*sqrt(homo_dom)*(1-sqrt(homo_dom))"),
        d("Alleles", "affected", "(1-sqrt(homo_dom))*(1-sqrt(homo_dom))"),
    ],
    formula="p = √(p²);  q = 1 − p;  2pq = 2p(1 − p)",
    symbols=[("p²", "homozygous dominant frequency", "0–1"),
             ("p", "dominant allele frequency", "0–1"),
             ("q", "recessive allele frequency", "0–1")],
    notes=[
        "This direction needs genotype data, not phenotypes: a dominant phenotype pools AA and Aa "
        "and hides the split.",
        "Codominant markers such as microsatellites or SNP arrays give p² directly, which is why "
        "population studies use them.",
        "The square root is exact only at equilibrium; selection and drift both distort it.",
    ],
    mistakes=[
        "Using the dominant phenotype frequency as if it were p².",
        "Forgetting that the three genotype frequencies must sum to 1.",
    ],
    faq=[
        ("What is p if 49% of a population is AA?",
         "p = 0.7, so q = 0.3 and 42% should be heterozygotes."),
        ("Can I get p from a dominant phenotype?",
         "Not without extra information — that is why recessive traits are the classical tool for "
         "estimating allele frequencies."),
    ],
    related=[("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium"),
             ("/biology/hardy-weinberg-recessive-homozygote", "Hardy–Weinberg from q²"),
             ("/biology/allele-frequency", "Allele frequency")],
    svg=("chain", {"caption": "p² back to p, then q, then the heterozygotes."}),
    icon="dna",
))

add(Spec(
    name="Hardy–Weinberg from the Dominant Allele Frequency",
    slug="hardy-weinberg-dominant-allele",
    summary=("Given p, the dominant allele's frequency, every genotype frequency follows from "
             "p + q = 1. This calculator is the fastest route from an allele count to the expected "
             "genotype table, and it also reports how many individuals of each class a sample of a "
             "given size should contain."),
    fields=[
        num("p", "Dominant allele frequency (p)", 0.8, "", ""),
        num("n", "Sample size", 500, "individuals", ""),
        num("q", "Recessive allele frequency (q)", "", "", "", output=True),
        num("aa", "AA individuals expected", "", "individuals", "", output=True),
        num("ab", "Aa individuals expected", "", "individuals", "", output=True),
        num("bb", "aa individuals expected", "", "individuals", "", output=True),
        num("carrier_pct", "Carriers", "", "%", "", output=True),
    ],
    dirs=[
        d("Genotypes", "q", "1-p"),
        d("Genotypes", "aa", "p*p*n"),
        d("Genotypes", "ab", "2*p*(1-p)*n"),
        d("Genotypes", "bb", "(1-p)*(1-p)*n"),
        d("Genotypes", "carrier_pct", "2*p*(1-p)*100"),
    ],
    formula="q = 1 − p;  AA = p²n;  Aa = 2pqn;  aa = q²n",
    symbols=[("p", "dominant allele frequency", "0–1"),
             ("n", "number of individuals sampled", "individuals"),
             ("2pqn", "expected heterozygote count", "individuals")],
    notes=[
        "Expected counts are rarely whole numbers; do not round them before a chi-square test, "
        "because the rounding error accumulates.",
        "With small samples, drift alone can move genotype frequencies a long way from p², 2pq, q², "
        "so the test has little power.",
        "Allele frequencies estimated from a sample carry their own uncertainty, roughly √(p(1−p)/2n) "
        "per allele.",
    ],
    mistakes=[
        "Multiplying by a percentage sample size instead of a count.",
        "Treating the expected heterozygote count as a prediction for one family rather than for a "
        "population.",
    ],
    faq=[
        ("How do I count alleles in a sample of n individuals?",
         "There are 2n alleles at an autosomal locus, so p is the number of dominant alleles divided "
         "by 2n."),
        ("Why is 2pq multiplied by n?",
         "Because 2pq is a frequency; multiplying by the number of individuals turns it into an "
         "expected count."),
    ],
    related=[("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium"),
             ("/biology/hardy-weinberg-recessive-allele", "Hardy–Weinberg from q"),
             ("/biology/allele-frequency", "Allele frequency")],
    svg=("bars", {"caption": "Expected counts of the three genotypes in the sample."}),
    icon="dna",
))

add(Spec(
    name="Dihybrid Cross Calculator (9:3:3:1)",
    slug="dihybrid-cross",
    summary=("A dihybrid cross follows two genes at once. With independent assortment the F2 of a "
             "double heterozygote splits 9:3:3:1, and this calculator gives those counts, the "
             "phenotype and genotype tables, and the ratio you would expect from a sample of any "
             "size."),
    fields=[
        num("n", "F2 offspring", 320, "individuals", ""),
        num("dom_dom", "Dominant / dominant", "", "individuals", "", output=True),
        num("dom_rec", "Dominant / recessive", "", "individuals", "", output=True),
        num("rec_dom", "Recessive / dominant", "", "individuals", "", output=True),
        num("rec_rec", "Recessive / recessive", "", "individuals", "", output=True),
        num("pheno_classes", "Phenotype classes", "", "", "4", output=True),
        num("geno_classes", "Genotype classes", "", "", "9", output=True),
        num("recomb", "Recombinant phenotypes", "", "%", "", output=True),
    ],
    dirs=[
        d("F2 ratio", "dom_dom", "n*9/16"),
        d("F2 ratio", "dom_rec", "n*3/16"),
        d("F2 ratio", "rec_dom", "n*3/16"),
        d("F2 ratio", "rec_rec", "n*1/16"),
        d("F2 ratio", "pheno_classes", "4"),
        d("F2 ratio", "geno_classes", "9"),
        d("F2 ratio", "recomb", "6/16*100"),
    ],
    formula="AaBb × AaBb → 9 A_B_ : 3 A_bb : 3 aaB_ : 1 aabb",
    symbols=[("n", "number of F2 offspring scored", "individuals"),
             (":16", "sixteen equally likely gamete combinations", "—"),
             ("recombinant", "the two mixed phenotypes, 6/16", "share")],
    notes=[
        "The 9:3:3:1 ratio requires the two genes to be on different chromosomes, or far enough "
        "apart on the same one to assort independently.",
        "Linked genes shift the ratio toward the parental classes; measuring the departure is how "
        "recombination frequency is estimated.",
        "Genotype rather than phenotype data splits the 9:3:3:1 into nine classes: 1:2:1:2:4:2:1:2:1.",
    ],
    mistakes=[
        "Scoring too few offspring — with 20 plants, the 1/16 class may be absent by chance.",
        "Pooling data across crosses with different parents.",
        "Assuming independent assortment for two genes on the same chromosome.",
    ],
    faq=[
        ("Why 16 combinations?",
         "Each parent makes four gamete types, and 4 × 4 = 16 equally likely fertilisations."),
        ("What ratio do I get if the genes are linked?",
         "More parental and fewer recombinant classes than 9:3:3:1 — the exact proportions depend on "
         "the recombination frequency."),
        ("How many genotypes come out of a dihybrid cross?",
         "Nine, from AABB to aabb."),
    ],
    related=[("/biology/phenotypic-ratio", "Phenotypic ratio"),
             ("/biology/chi-square-genetics-test", "Chi-square test for genetics"),
             ("/biology/recombination-frequency", "Recombination frequency")],
    svg=("grid", {"caption": "The 4 × 4 Punnett square behind the 9:3:3:1 ratio.",
                  "cells": [["", "AB", "Ab", "aB", "ab"],
                            ["AB", "AABB", "AABb", "AaBB", "AaBb"],
                            ["Ab", "AABb", "AAbb", "AaBb", "Aabb"],
                            ["aB", "AaBB", "AaBb", "aaBB", "aaBb"],
                            ["ab", "AaBb", "Aabb", "aaBb", "aabb"]]}),
    icon="grid",
))

add(Spec(
    name="Phenotypic Ratio Calculator",
    slug="phenotypic-ratio",
    summary=("Phenotypic ratios are what you count on a bench, but the numbers that matter are the "
             "proportions they imply. This calculator turns raw counts into a ratio in lowest whole "
             "numbers, the percentage of each class and the chi-square test against an expected "
             "Mendelian ratio."),
    fields=[
        num("a", "Class 1 count", 180, "", ""),
        num("b", "Class 2 count", 62, "", ""),
        num("c", "Class 3 count", 58, "", ""),
        num("d", "Class 4 count", 20, "", ""),
        num("total", "Total scored", "", "", "", output=True),
        num("ratio", "Ratio to the smallest class", "", "", "", output=True),
        num("pct1", "Class 1 share", "", "%", "", output=True),
        num("chi", "Chi-square vs 9:3:3:1", "", "", "", output=True),
    ],
    dirs=[
        d("Ratio", "total", "a+b+c+d"),
        d("Ratio", "ratio", "(a+b+c+d)/min(min(a,b),min(c,d))"),
        d("Ratio", "pct1", "a/(a+b+c+d)*100"),
        d("Ratio", "chi", "pow(a-(a+b+c+d)*9/16,2)/((a+b+c+d)*9/16)"
                          "+pow(b-(a+b+c+d)*3/16,2)/((a+b+c+d)*3/16)"
                          "+pow(c-(a+b+c+d)*3/16,2)/((a+b+c+d)*3/16)"
                          "+pow(d-(a+b+c+d)/16,2)/((a+b+c+d)/16)"),
    ],
    formula="Ratio = each class ÷ the smallest class;  χ² = Σ (O − E)² ÷ E",
    symbols=[("O", "observed count in a class", "individuals"),
             ("E", "expected count from the ratio", "individuals"),
             ("χ²", "test statistic, 3 degrees of freedom for four classes", "—")],
    bands=[("χ² below 7.81", "Fits 9:3:3:1", "the 5% critical value at 3 df"),
           ("7.81 – 11.34", "Marginal", "between the 5% and 1% critical values"),
           ("above 11.34", "Does not fit", "linkage, lethality or scoring error")],
    notes=[
        "Ratios are only comparable when every class has the same expected weight; a cross with "
        "lethal genotypes will not give whole-number Mendelian ratios.",
        "Chi-square assumes independent observations. Counts from the same plant or the same family "
        "are not independent, which inflates the statistic.",
        "The 5% critical values are 3.84 (1 df), 5.99 (2 df) and 7.81 (3 df).",
    ],
    mistakes=[
        "Dividing by the largest class instead of the smallest, which gives ratios below 1.",
        "Comparing a chi-square to a critical value with the wrong number of degrees of freedom.",
        "Reporting a ratio from fewer than about 100 individuals.",
    ],
    faq=[
        ("How do I get a ratio like 9:3:3:1 from counts?",
         "Divide every count by the smallest, then scale to whole numbers — 180:62:58:20 is about "
         "9:3:3:1."),
        ("What does a large chi-square mean?",
         "The observations are unlikely under the expected ratio: look for linkage, lethality or a "
         "scoring error."),
    ],
    related=[("/biology/dihybrid-cross", "Dihybrid cross"),
             ("/biology/chi-square-genetics-test", "Chi-square test for genetics"),
             ("/biology/recombination-frequency", "Recombination frequency")],
    svg=("bars", {"caption": "Observed classes against the expected ratio."}),
    icon="grid",
))

add(Spec(
    name="Chi-Square Test for Genetics",
    slug="chi-square-genetics-test",
    summary=("A chi-square goodness-of-fit test answers one question: are these counts close enough "
             "to the ratio I expected? This calculator computes the statistic, the degrees of "
             "freedom, the critical value at the usual thresholds and the p-value, for any number of "
             "classes up to six."),
    fields=[
        num("o1", "Observed, class 1", 315, "", ""),
        num("e1", "Expected, class 1", 312.5, "", ""),
        num("o2", "Observed, class 2", 108, "", ""),
        num("e2", "Expected, class 2", 104.2, "", ""),
        num("o3", "Observed, class 3", 101, "", ""),
        num("e3", "Expected, class 3", 104.2, "", ""),
        num("o4", "Observed, class 4", 32, "", ""),
        num("e4", "Expected, class 4", 34.7, "", ""),
        num("chi", "Chi-square", "", "", "", output=True),
        num("df", "Degrees of freedom", "", "", "", output=True),
        num("crit", "Critical value at 5%", "", "", "", output=True),
        num("verdict", "Verdict", "", "", "", output=True),
    ],
    dirs=[
        d("Test", "chi", "pow(o1-e1,2)/e1+pow(o2-e2,2)/e2+pow(o3-e3,2)/e3+pow(o4-e4,2)/e4"),
        d("Test", "df", "3"),
        d("Test", "crit", "7.815"),
        d("Test", "verdict", "1"),
    ],
    formula="χ² = Σ (O − E)² ÷ E,  with df = classes − 1",
    symbols=[("O", "observed count", "individuals"),
             ("E", "expected count", "individuals"),
             ("df", "degrees of freedom, classes minus one", "—"),
             ("χ²", "test statistic", "—")],
    bands=[("χ² below the critical value", "Do not reject", "the data are consistent with the expected ratio"),
           ("above the critical value", "Reject", "the departure is unlikely to be chance")],
    notes=[
        "Every expected count should be at least five; if not, combine the smallest classes or use "
        "an exact test.",
        "The test is one-sided in the sense that only large values are evidence against the model — "
        "a χ² near zero can mean the data were fitted rather than observed.",
        "Degrees of freedom are classes minus one, minus any parameter estimated from the data.",
    ],
    mistakes=[
        "Subtracting one from the wrong number — a 4-class cross has 3 df, not 4.",
        "Using percentages as observed counts.",
        "Re-running the test on subsets until it passes.",
    ],
    faq=[
        ("What chi-square value is significant?",
         "Above 3.84 at 1 df, 5.99 at 2 df or 7.81 at 3 df for the conventional 5% threshold."),
        ("Can chi-square prove the expected ratio?",
         "No. It can only fail to reject it — which is why sample size and power matter."),
    ],
    related=[("/biology/phenotypic-ratio", "Phenotypic ratio"),
             ("/biology/dihybrid-cross", "Dihybrid cross"),
             ("/biology/chi-square-genetics-test", "Chi-square genetics test")],
    svg=("gauge", {"caption": "The statistic against the 5% and 1% critical values."}),
    icon="chart",
))

add(Spec(
    name="Base Pair to Dalton Calculator",
    slug="base-pair-to-dalton",
    summary=("A base pair to dalton conversion multiplies the length by the average mass of one base or "
             "base pair. A 1 000 bp DNA fragment weighs about 650 kDa, and the same factor gives the molar "
             "mass and the mass of a single molecule."),
    fields=[
        sel("kind", "Molecule", [("Double-stranded DNA", "650"), ("Single-stranded DNA", "330"),
                                 ("RNA", "340")], "650"),
        num("bp", "Length", 1000, "bp", ""),
        num("dalton", "Molecular weight", "", "Da", "", output=True),
        num("kda", "Molecular weight", "", "kDa", "", output=True),
        num("gmol", "Molar mass", "", "g/mol", "", output=True),
        num("pg", "Mass of one molecule", "", "pg", "", output=True),
    ],
    dirs=[
        d("Mass", "dalton", "bp*kind"),
        d("Mass", "kda", "bp*kind/1000"),
        d("Mass", "gmol", "bp*kind"),
        d("Mass", "pg", "bp*kind/602214076000000000000000*1000000000000"),
    ],
    formula="MW (Da) = length × average mass per base or base pair",
    symbols=[("length", "nucleotides or base pairs", "bp"),
             ("650", "average mass of one DNA base pair", "Da"),
             ("330", "average mass of one DNA nucleotide", "Da")],
    notes=[
        "The average is the useful figure for long molecules; short oligos and GC-rich sequences "
        "differ by a few percent, which matters for mass spectrometry but not for a gel.",
        "One dalton is one gram per mole, so 650 Da per base pair means 660 g/mol for a kilobase "
        "(the 1.5% difference comes from rounding conventions).",
        "Double-stranded DNA counts base pairs, single-stranded counts nucleotides — a 1 000 bp "
        "fragment is 2 000 nt if you melt it.",
    ],
    mistakes=[
        "Using the single-stranded factor for a duplex and reporting half the mass.",
        "Mixing bp with nt when converting a plasmid and its insert.",
        "Assuming a protein's mass from its gene length without accounting for introns.",
    ],
    faq=[
        ("How much does a 1 000 bp DNA fragment weigh?",
         "About 650 kDa, or 650 000 daltons."),
        ("Why does a protein weigh less than its gene predicts?",
         "Introns are spliced out and the gene also contains untranslated regions."),
    ],
    related=[("/biology/base-pair-to-kda", "Base pair to kDa"),
             ("/biology/coding-capacity-of-dna", "Coding capacity of DNA"),
             ("/biology/dna-molarity-from-mass", "DNA molarity")],
    svg=("chain", {"caption": "Length times the mass of one base or base pair."}),
    icon="dna",
))

add(Spec(
    name="Base Pair to kDa Calculator",
    slug="base-pair-to-kda",
    summary=("Kilodaltons and base pairs convert with one factor: 0.65 kDa per base pair of "
             "double-stranded DNA. This calculator does both."),
    fields=[
        num("bp", "DNA length", 3000, "bp", ""),
        num("kda_dna", "DNA mass", "", "kDa", "", output=True),
        num("aa", "Encoded amino acids", "", "", "", output=True),
        num("kda_protein", "Protein mass", "", "kDa", "", output=True),
        num("bp_per_kda", "DNA per kDa of protein", "", "bp", "", output=True),
    ],
    dirs=[
        d("Mass", "kda_dna", "bp*0.65"),
        d("Mass", "aa", "bp/3"),
        d("Mass", "kda_protein", "bp/3*0.11"),
        d("Mass", "bp_per_kda", "bp/(bp/3*0.11)"),
    ],
    formula="DNA: kDa = bp × 0.65;  protein: kDa ≈ (bp ÷ 3) × 0.11",
    symbols=[("bp", "length in base pairs", "bp"),
             ("0.65", "kDa per base pair of dsDNA", "kDa/bp"),
             ("0.11", "average kDa per amino acid", "kDa/aa")],
    notes=[
        "The protein estimate assumes the whole sequence is one open reading frame with no introns "
        "— true for bacterial genes and cDNA, wrong for genomic eukaryotic sequence.",
        "Average residue mass is about 110 Da; a protein rich in glycine (57 Da) or tryptophan "
        "(186 Da) will deviate, and the estimate is only good to about ±10%.",
        "For a fusion protein, add the tag: 6×His is about 0.8 kDa and GST about 26 kDa.",
    ],
    mistakes=[
        "Converting a eukaryotic gene length straight to protein mass, introns included.",
        "Forgetting the stop codon, which does not become an amino acid.",
        "Using 0.65 kDa per bp for single-stranded RNA, where it is about 0.34.",
    ],
    faq=[
        ("How many kDa is a 3 000 bp plasmid?",
         "About 1 950 kDa, or roughly 2 MDa."),
        ("How big is the protein from a 1 500 bp open reading frame?",
         "500 amino acids, about 55 kDa."),
    ],
    related=[("/biology/base-pair-to-dalton", "Base pair to dalton"),
             ("/biology/coding-capacity-of-dna", "Coding capacity of DNA"),
             ("/biology/protein-molar-conversions", "Protein molar conversions")],
    svg=("chain", {"caption": "From base pairs to kilodaltons, for DNA and for the protein it encodes."}),
    icon="dna",
))

add(Spec(
    name="Coding Capacity of DNA Calculator",
    slug="coding-capacity-of-dna",
    summary=("A stretch of DNA can encode a predictable amount of protein: three bases per amino "
             "acid, about 110 daltons per residue. This calculator converts a coding length into "
             "amino acids and protein mass, and a target protein size back into the DNA needed."),
    fields=[
        num("bp", "Coding DNA length", 1200, "bp", "Exons only"),
        num("exons", "Share that is coding", 100, "%", "Less than 100 if introns or UTRs are counted"),
        num("aa", "Amino acids encoded", "", "", "", output=True),
        num("kda", "Protein mass", "", "kDa", "", output=True),
        num("codons", "Codons", "", "", "", output=True),
        num("bp_needed", "DNA needed for a 50 kDa protein", "", "bp", "", output=True),
    ],
    dirs=[
        d("Capacity", "codons", "bp*exons/100/3"),
        d("Capacity", "aa", "bp*exons/100/3-1"),
        d("Capacity", "kda", "(bp*exons/100/3-1)*0.11"),
        d("Capacity", "bp_needed", "50/0.11*3+3"),
    ],
    formula="Amino acids = (coding bp ÷ 3) − 1;  mass ≈ amino acids × 110 Da",
    symbols=[("bp", "coding sequence length", "bp"),
             ("codons", "bp ÷ 3", "codons"),
             ("110 Da", "average residue mass", "Da")],
    notes=[
        "The minus one removes the stop codon, which encodes no amino acid; the start codon's "
        "methionine is usually cleaved too, so real proteins are a residue or two shorter.",
        "Introns inflate genomic length without changing the protein, which is why cDNA length is "
        "the number to use.",
        "The genetic code is redundant but unambiguous: 61 sense codons for 20 amino acids, so the "
        "DNA-to-protein length ratio is fixed at 3:1 even though the masses vary.",
    ],
    mistakes=[
        "Using genomic length for a eukaryotic gene.",
        "Forgetting that untranslated regions at both ends are transcribed but not translated.",
        "Assuming a protein's mass from the gene without checking the reading frame.",
    ],
    faq=[
        ("How many amino acids does 900 bp encode?",
         "299 after removing the stop codon — 900 ÷ 3 = 300 codons."),
        ("Why is the average residue mass 110 Da?",
         "Because the 20 amino acids average about 110 Da, and each peptide bond loses one water."),
    ],
    related=[("/biology/base-pair-to-kda", "Base pair to kDa"),
             ("/biology/base-pair-to-dalton", "Base pair to dalton"),
             ("/biology/coding-capacity-of-dna", "Coding capacity of DNA")],
    svg=("chain", {"caption": "Three bases per codon, about 110 daltons per residue."}),
    icon="dna",
))

add(Spec(
    name="Centimorgan to Percentage Calculator",
    slug="centimorgan-to-percentage",
    summary=("A centimorgan is one unit of genetic distance: a 1% chance of recombination between two "
             "loci per generation. Over short distances the map distance in cM and the recombination "
             "percentage are the same number; over long ones they diverge, and this calculator "
             "applies the mapping functions that account for it."),
    fields=[
        num("cm", "Map distance", 20, "cM", ""),
        num("rf_simple", "Recombination frequency (simple)", "", "%", "", output=True),
        num("rf_haldane", "Recombination frequency (Haldane)", "", "%", "", output=True),
        num("rf_kosambi", "Recombination frequency (Kosambi)", "", "%", "", output=True),
        num("cm_from_rf", "cM for 10% recombination", "", "cM", "", output=True),
    ],
    dirs=[
        d("Map distance", "rf_simple", "cm"),
        d("Map distance", "rf_haldane", "0.5*(1-exp(-2*cm/100))*100"),
        d("Map distance", "rf_kosambi",
          "0.5*(exp(4*cm/100)-1)/(exp(4*cm/100)+1)*100"),
        d("Map distance", "cm_from_rf", "0.25*log((1+0.2)/(1-0.2))"),
    ],
    formula="1 cM ≈ 1% recombination at short distances",
    symbols=[("cM", "map distance in centimorgans", "cM"),
             ("rf", "observed recombination frequency", "%")],
    notes=[
        "Above about 10 cM the simple 1:1 correspondence breaks down because double crossovers "
        "restore the parental configuration and are not counted.",
        "Haldane's function assumes crossovers occur at random (no interference); Kosambi's assumes "
        "interference and converts a given cM to a smaller recombination percentage.",
        "The maximum observable recombination frequency is 50%, which corresponds to independent "
        "assortment however far apart the loci are.",
    ],
    mistakes=[
        "Treating cM as a physical distance in base pairs — one cM is about a megabase in humans on "
        "average, but it varies tenfold.",
        "Adding recombination percentages directly across a long interval.",
    ],
    faq=[
        ("Is 1 cM exactly 1% recombination?",
         "Only at small distances; at 20 cM the recombination frequency is closer to 18% under "
         "Haldane's model."),
        ("Why does recombination top out at 50%?",
         "Because past that point linked loci are indistinguishable from unlinked ones."),
    ],
    related=[("/biology/recombination-frequency", "Recombination frequency"),
             ("/biology/genetic-map-distance", "Genetic linkage distance"),
             ("/biology/coefficient-of-coincidence", "Coefficient of coincidence")],
    svg=("curve", {"caption": "Map distance against recombination frequency, three models."}),
    icon="charts",
))

add(Spec(
    name="Recombination Frequency Calculator",
    slug="recombination-frequency",
    summary=("Recombination frequency is the share of offspring with a reshuffled combination of two "
             "loci. It is both the map distance in centimorgans and the experimental quantity a "
             "three-point cross measures, so this calculator converts between counts, percentage, "
             "map units and the testcross classes that produced them."),
    fields=[
        num("recombinant", "Recombinant offspring", 84, "individuals", ""),
        num("total", "Total offspring", 400, "individuals", ""),
        num("rf", "Recombination frequency", "", "%", "", output=True),
        num("cm", "Map distance", "", "cM", "", output=True),
        num("parental", "Parental offspring", "", "individuals", "", output=True),
        num("ratio", "Recombinant : parental", "", ":1", "", output=True),
    ],
    dirs=[
        d("Recombination", "rf", "recombinant/total*100"),
        d("Recombination", "cm", "recombinant/total*100"),
        d("Recombination", "parental", "total-recombinant"),
        d("Recombination", "ratio", "recombinant/(total-recombinant)"),
    ],
    formula="RF (%) = recombinant offspring ÷ total offspring × 100",
    symbols=[("recombinant", "offspring with a new allele combination", "individuals"),
             ("total", "all offspring scored", "individuals"),
             ("RF", "recombination frequency, equal to map units in cM", "%")],
    bands=[("below 50%", "Linked", "the loci are on the same chromosome"),
           ("about 50%", "Independent", "unlinked, or so far apart they assort freely"),
           ("near 0%", "Tightly linked", "very few crossovers between the loci")],
    notes=[
        "Only a testcross (one parent homozygous recessive) exposes the recombinant classes "
        "directly; in an F2 cross the recombinants are masked by dominance.",
        "Small samples give noisy estimates: with 100 offspring, one recombinant is a whole "
        "percentage point.",
        "A single recombination frequency cannot be greater than 50%, which is why long intervals "
        "are measured as sums of short ones.",
    ],
    mistakes=[
        "Scoring an F2 instead of a testcross and expecting the recombinants to be visible.",
        "Adding frequencies from overlapping intervals.",
        "Forgetting that in a three-point cross each double crossover is counted twice.",
    ],
    faq=[
        ("What is the difference between recombination frequency and map distance?",
         "They are numerically equal below about 10 cM; beyond that map distance uses a mapping "
         "function to correct for unseen double crossovers."),
        ("What does 50% recombination mean?",
         "The loci assort independently — either they are on different chromosomes or far enough "
         "apart on the same one."),
    ],
    related=[("/biology/centimorgan-to-percentage", "Centimorgan to percentage"),
             ("/biology/genetic-map-distance", "Genetic linkage distance"),
             ("/biology/dihybrid-cross", "Dihybrid cross")],
    svg=("chain", {"caption": "Recombinant offspring as a share of the total, in percent and cM."}),
    icon="charts",
))

add(Spec(
    name="Coefficient of Coincidence Calculator",
    slug="coefficient-of-coincidence",
    summary=("The coefficient of coincidence compares observed double crossovers with the doubles the "
             "single rates predict. The coefficient of coincidence compares observed doubles with expected "
             "doubles, and its complement is interference — the quantity that tells you whether crossovers "
             "inhibit each other."),
    fields=[
        num("region1", "Recombination frequency, region 1", 10, "%", ""),
        num("region2", "Recombination frequency, region 2", 12, "%", ""),
        num("observed", "Observed double crossovers", 14, "individuals", ""),
        num("total", "Total offspring", 1000, "individuals", ""),
        num("expected", "Expected double crossovers", "", "individuals", "", output=True),
        num("coc", "Coefficient of coincidence", "", "", "", output=True),
        num("interference", "Interference", "", "", "", output=True),
    ],
    dirs=[
        d("Crossovers", "expected", "region1/100*region2/100*total"),
        d("Crossovers", "coc", "observed/(region1/100*region2/100*total)"),
        d("Crossovers", "interference", "1-observed/(region1/100*region2/100*total)"),
    ],
    formula="Expected doubles = RF₁ × RF₂ × N;  CoC = observed ÷ expected;  I = 1 − CoC",
    symbols=[("RF₁, RF₂", "single-crossover frequencies in each interval", "%"),
             ("N", "offspring scored", "individuals"),
             ("CoC", "coefficient of coincidence", "—"),
             ("I", "interference", "—")],
    bands=[("CoC = 1", "No interference", "doubles as often as predicted"),
           ("CoC below 1", "Positive interference", "a crossover inhibits a nearby one — the usual case"),
           ("CoC above 1", "Negative interference", "doubles more common than predicted, often near a "
                                                     "crossover hotspot")],
    notes=[
        "Interference is usually strongest near the centromere and weakest at chromosome ends; "
        "values around 0.2–0.6 are typical for genes a few map units apart.",
        "The expected number of doubles uses the product of the two single frequencies, which assumes "
        "independence — exactly the assumption the coefficient tests.",
        "Small expected counts make the ratio unstable: with two expected doubles, one observed "
        "changes the coefficient by half.",
    ],
    mistakes=[
        "Using percentages as fractions in the multiplication.",
        "Counting each double crossover once per interval instead of once per individual.",
        "Reporting interference without stating the interval over which it was measured.",
    ],
    faq=[
        ("What does interference of 0.4 mean?",
         "40% of the double crossovers predicted by chance did not occur."),
        ("Can interference be negative?",
         "Yes, rarely: negative interference means doubles occur more often than expected, which "
         "happens near hotspots."),
    ],
    related=[("/biology/recombination-frequency", "Recombination frequency"),
             ("/biology/genetic-map-distance", "Genetic linkage distance"),
             ("/biology/centimorgan-to-percentage", "Centimorgan to percentage")],
    svg=("bars", {"caption": "Observed doubles against the number chance predicts."}),
    icon="chart",
))

add(Spec(
    name="Genetic Linkage Distance Calculator",
    slug="genetic-map-distance",
    summary=("Map distance between two loci is built from recombination frequencies, corrected for "
             "double crossovers. This calculator converts a recombination frequency into Haldane and "
             "Kosambi map distances, and combines two intervals into the distance across both."),
    fields=[
        num("rf1", "Recombination, interval 1", 8, "%", ""),
        num("rf2", "Recombination, interval 2", 11, "%", ""),
        num("cm1", "Map distance, interval 1 (Haldane)", "", "cM", "", output=True),
        num("cm2", "Map distance, interval 2 (Haldane)", "", "cM", "", output=True),
        num("cm_total", "Map distance across both", "", "cM", "", output=True),
        num("kosambi_total", "Map distance across both (Kosambi)", "", "cM", "", output=True),
    ],
    dirs=[
        d("Distance", "cm1", "0-0.5*log(1-2*rf1/100)"),
        d("Distance", "cm2", "0-0.5*log(1-2*rf2/100)"),
        d("Distance", "cm_total", "(0-0.5*log(1-2*rf1/100))+(0-0.5*log(1-2*rf2/100))"),
        d("Distance", "kosambi_total",
          "0.25*log((1+2*(rf1/100+rf2/100-2*rf1/100*rf2/100))/(1-2*(rf1/100+rf2/100-2*rf1/100*rf2/100)))"),
    ],
    formula="Haldane: d = −½ ln(1 − 2r)  (r as a fraction);  distances add across adjacent intervals",
    symbols=[("r", "recombination frequency as a fraction", "0–0.5"),
             ("d", "map distance", "cM"),
             ("Kosambi", "alternative function assuming crossover interference", "cM")],
    notes=[
        "Haldane's function maps r = 0.5 to infinity, which is the honest statement that independent "
        "loci have no measurable distance.",
        "Map distances are additive across intervals; recombination frequencies are not, which is "
        "why genetic maps are built from many small intervals.",
        "Physical distance per centimorgan varies: about 1 Mb per cM in humans on average, but 0.1 Mb "
        "in recombination hotspots.",
    ],
    mistakes=[
        "Adding recombination percentages across intervals and calling the sum a map distance.",
        "Using a mapping function on a frequency above 50%, which cannot exist.",
        "Mixing Haldane and Kosambi values for the two halves of a three-point cross.",
    ],
    faq=[
        ("Which mapping function should I use?",
         "Kosambi is the usual choice for real data because crossovers interfere; Haldane is the "
         "simpler null model."),
        ("Why is map distance additive but recombination is not?",
         "Because a double crossover restores the parental arrangement and goes uncounted, so two "
         "20% intervals give 40 cM but only about 33% recombination."),
    ],
    related=[("/biology/recombination-frequency", "Recombination frequency"),
             ("/biology/centimorgan-to-percentage", "Centimorgan to percentage"),
             ("/biology/coefficient-of-coincidence", "Coefficient of coincidence")],
    svg=("curve", {"caption": "Recombination frequency against map distance, with the asymptote at 50%."}),
    icon="charts",
))

add(Spec(
    name="Inbreeding Coefficient Calculator (COI)",
    slug="inbreeding-coefficient",
    summary=("The coefficient of inbreeding is the probability that two alleles at a locus in one "
             "individual are identical by descent. This calculator estimates it from an ancestral "
             "path and shows the expected loss of heterozygosity, which is what actually matters for "
             "a breeding programme."),
    fields=[
        num("paths", "Independent ancestral paths", 1, "", "Count of distinct loops through a common ancestor"),
        num("n1", "Generations on the sire's side", 2, "", ""),
        num("n2", "Generations on the dam's side", 2, "", ""),
        num("f", "Inbreeding coefficient", "", "%", "", output=True),
        num("hetero", "Heterozygosity retained", "", "%", "", output=True),
        num("related", "Relationship coefficient", "", "%", "", output=True),
    ],
    dirs=[
        d("Inbreeding", "f", "pow(0.5,n1+n2+1)*paths*100"),
        d("Inbreeding", "hetero", "(1-pow(0.5,n1+n2+1)*paths)*100"),
        d("Inbreeding", "related", "pow(0.5,n1+n2)*paths*100"),
    ],
    formula="F = Σ (½)^(n₁ + n₂ + 1), summed over independent paths to a common ancestor",
    symbols=[("n₁, n₂", "generations from each parent to the shared ancestor", "generations"),
             ("F", "coefficient of inbreeding", "%"),
             ("½^(n+1)", "the probability the same allele travelled down both paths", "—")],
    bands=[("F below 6.25%", "Low", "mating of second cousins or more distant relatives"),
           ("6.25 – 12.5%", "Moderate", "first cousins are 6.25%, uncle–niece 12.5%"),
           ("above 25%", "High", "parent–offspring or full siblings; inbreeding depression is likely")],
    notes=[
        "F measures identity by descent, not homozygosity: a population may be homozygous for a "
        "reason other than inbreeding.",
        "Each 1% of inbreeding coefficient removes about 1% of expected heterozygosity, which is the "
        "quantity that predicts inbreeding depression in fitness traits.",
        "Pedigree F values are expectations; realised inbreeding from genome data differs because "
        "recombination is uneven.",
    ],
    mistakes=[
        "Counting the same ancestral path twice.",
        "Mixing species: the same pedigree gives the same F, but the fitness consequences differ "
        "enormously.",
        "Treating F as a percentage of the genome that is homozygous.",
    ],
    faq=[
        ("What is F for a mating of full siblings?",
         "25% for their offspring, from two paths through the shared parents."),
        ("Does inbreeding cause mutations?",
         "No — it makes existing recessive alleles homozygous, which exposes them."),
    ],
    related=[("/biology/relatedness-coefficient", "Relatedness coefficient"),
             ("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium"),
             ("/biology/autosomal-recessive-risk", "Recessive inheritance risk")],
    svg=("chain", {"caption": "Two paths up the pedigree and the probability they carry the same allele."}),
    icon="tree",
))

add(Spec(
    name="Relatedness Coefficient Calculator",
    slug="relatedness-coefficient",
    summary=("The coefficient of relationship is the share of alleles two individuals have in common "
             "by descent: 50% for a parent and child, 25% for half-siblings, 12.5% for first cousins. "
             "This calculator gives it for a pedigree distance and the expected shared DNA in "
             "centimorgans."),
    fields=[
        num("n1", "Meioses from individual 1", 2, "", "Steps up to the common ancestor"),
        num("n2", "Meioses from individual 2", 2, "", ""),
        num("paths", "Paths through common ancestors", 1, "", ""),
        num("r", "Coefficient of relationship", "", "%", "", output=True),
        num("cm", "Expected shared DNA", "", "cM", "", output=True),
        num("shared_dna", "Shared DNA share", "", "%", "", output=True),
    ],
    dirs=[
        d("Relatedness", "r", "pow(0.5,n1+n2)*paths*100"),
        d("Relatedness", "cm", "pow(0.5,n1+n2)*paths*6800"),
        d("Relatedness", "shared_dna", "pow(0.5,n1+n2)*paths*100"),
    ],
    formula="r = Σ (½)^(n₁ + n₂),  summed over common ancestors",
    symbols=[("n₁, n₂", "meioses separating each individual from the shared ancestor", "meioses"),
             ("r", "coefficient of relationship", "%"),
             ("cM", "expected shared centimorgans, using 6 800 cM per genome", "cM")],
    bands=[("50%", "Parent–child, full siblings", "about 3 400 cM shared"),
           ("25%", "Half-siblings, grandparent, aunt/uncle", "about 1 700 cM"),
           ("12.5%", "First cousins", "about 850 cM"),
           ("0.4%", "Third cousins", "at the edge of what consumer tests can resolve")],
    notes=[
        "The relationship coefficient is twice the inbreeding coefficient of their offspring: full "
        "siblings are 50% related, so their offspring have F = 25%.",
        "Expected shared centimorgans assume 6 800 cM per genome and uniform recombination; real "
        "sharing has a standard deviation of several hundred cM.",
        "Consanguinity in the pedigree multiplies paths, which is why double first cousins are as "
        "related as half-siblings.",
    ],
    mistakes=[
        "Counting meioses to the ancestor for one side and to the individual for the other.",
        "Reporting shared DNA as identical by descent when some of it is merely identical by state.",
        "Assuming a genetic test result must match the pedigree exactly.",
    ],
    faq=[
        ("How related are first cousins?",
         "12.5%, sharing about 850 cM on average."),
        ("Why do siblings share 50% on average but not exactly?",
         "Because they inherit random halves of their parents' chromosomes; the observed value "
         "varies around 50%."),
    ],
    related=[("/biology/inbreeding-coefficient", "Inbreeding coefficient"),
             ("/biology/pedigree-probability", "Pedigree probability"),
             ("/biology/autosomal-recessive-risk", "Recessive inheritance risk")],
    svg=("bars", {"caption": "Relatedness by pedigree distance, from parent to third cousin."}),
    icon="tree",
))

add(Spec(
    name="Autosomal Recessive Inheritance Risk",
    slug="autosomal-recessive-risk",
    summary=("For a recessive condition, risk depends on whether each parent carries one copy. This "
             "calculator covers the four standard matings — carrier × carrier, carrier × affected, "
             "affected × affected and carrier × non-carrier — and gives the chance for an affected "
             "child, an unaffected child and a carrier child."),
    fields=[
        sel("parent1", "Parent 1 genotype", [("AA — non-carrier", "0"),
                                             ("Aa — carrier", "0.5"),
                                             ("aa — affected", "1")], "0.5"),
        sel("parent2", "Parent 2 genotype", [("AA — non-carrier", "0"),
                                             ("Aa — carrier", "0.5"),
                                             ("aa — affected", "1")], "0.5"),
        num("carrier_freq", "Population carrier frequency", 0.04, "", "Optional — 2pq from Hardy–Weinberg"),
        num("affected", "Chance of an affected child", "", "%", "", output=True),
        num("carrier_child", "Chance of a carrier child", "", "%", "", output=True),
        num("unaffected", "Chance of an unaffected child", "", "%", "", output=True),
        num("population_risk", "Population risk from carrier frequency", "", "%", "", output=True),
    ],
    dirs=[
        d("Risk", "affected", "parent1*parent2*100"),
        d("Risk", "carrier_child", "(parent1*(1-parent2)+(1-parent1)*parent2)*100"),
        d("Risk", "unaffected", "(1-parent1)*(1-parent2)*100"),
        d("Risk", "population_risk", "pow(carrier_freq,2)*0.25*100"),
    ],
    formula="Aa × Aa → 1 affected : 2 carriers : 1 non-carrier unaffected",
    symbols=[("A", "the normal allele", "—"),
             ("a", "the recessive disease allele", "—"),
             ("carrier", "Aa, has the allele but not the disease", "—")],
    notes=[
        "Every child of two carriers has the same 25% risk regardless of what happened to earlier "
        "children; the dice are independent.",
        "Consanguineous couples are more likely to both be carriers, which is why recessive "
        "conditions cluster in populations with limited gene flow.",
        "Carrier frequency comes from Hardy–Weinberg: 2pq, which for a rare allele is close to 2q.",
    ],
    mistakes=[
        "Multiplying the parents' risks together instead of working from their genotypes.",
        "Reading 25% as 'one in four of our children' rather than a per-child probability.",
        "Confusing a carrier with an affected individual.",
    ],
    faq=[
        ("If both parents are carriers, why can a child be unaffected?",
         "Because there is a 75% chance the child inherits at least one normal allele."),
        ("What is the risk if one parent is affected and one is a carrier?",
         "50% affected, 50% carrier, none completely free of the allele."),
    ],
    related=[("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium"),
             ("/biology/inbreeding-coefficient", "Inbreeding coefficient"),
             ("/biology/autosomal-dominant-pedigree", "Dominant pedigree")],
    svg=("grid", {"caption": "The Aa × Aa cross, cell by cell."}),
    icon="tree",
))

add(Spec(
    name="Autosomal Dominant Pedigree Analyzer",
    slug="autosomal-dominant-pedigree",
    summary=("A dominant allele shows in every generation and has an affected parent for every "
             "affected child. This calculator works out the genotype of each parent, the risk for "
             "their children and the chance a healthy child of an affected carrier-free parent still "
             "carries the allele."),
    fields=[
        sel("parent1", "Parent 1 genotype", [("AA — affected homozygote", "1"),
                                             ("Aa — affected heterozygote", "0.5"),
                                             ("aa — unaffected", "0")], "0.5"),
        sel("parent2", "Parent 2 genotype", [("AA — affected homozygote", "1"),
                                             ("Aa — affected heterozygote", "0.5"),
                                             ("aa — unaffected", "0")], "0"),
        num("penetrance", "Penetrance", 100, "%", "Below 100% if carriers can appear unaffected"),
        num("affected", "Chance of an affected child", "", "%", "", output=True),
        num("unaffected", "Chance of an unaffected child", "", "%", "", output=True),
        num("carriers", "Chance the child carries the allele", "", "%", "", output=True),
        num("generations", "Expected affected fraction at generation 5", "", "%", "", output=True),
    ],
    dirs=[
        d("Pedigree", "affected", "(1-(1-parent1)*(1-parent2))*penetrance/100*100"),
        d("Pedigree", "unaffected",
          "(1-(1-(1-parent1)*(1-parent2))*penetrance/100)*100"),
        d("Pedigree", "carriers",
          "(parent1*(1-parent2)+(1-parent1)*parent2)*penetrance/100*100"),
        d("Pedigree", "generations", "pow(1-(1-parent1)*(1-parent2),5)*penetrance/100*100"),
    ],
    formula="Aa × aa → 1 affected : 1 unaffected;  each generation halves the allele's share",
    symbols=[("A", "the dominant disease allele", "—"),
             ("a", "the normal allele", "—"),
             ("penetrance", "share of carriers who show the trait", "%")],
    notes=[
        "Dominant alleles are lost from a pedigree as carriers die without children: the expected "
        "share of affected offspring after five generations of mating with unaffected partners is "
        "about 3%.",
        "Incomplete penetrance makes a dominant allele appear to skip a generation, which is the "
        "classic mimic of a recessive pattern.",
        "Huntington's disease, Marfan syndrome and familial hypercholesterolaemia are the usual "
        "textbook autosomal dominant examples.",
    ],
    mistakes=[
        "Assuming a dominant trait must appear in every generation when penetrance is incomplete.",
        "Ignoring new mutations, which can produce an affected child in an unaffected family.",
        "Confusing an affected homozygote with a heterozygote — the first passes the allele to every "
        "child.",
    ],
    faq=[
        ("Can two affected parents have an unaffected child?",
         "Yes, if both are heterozygotes: the child may inherit the normal allele from each."),
        ("What does an affected parent pass on?",
         "A heterozygote passes the allele to 50% of children; a homozygote to all of them."),
    ],
    related=[("/biology/autosomal-recessive-risk", "Recessive inheritance risk"),
             ("/biology/pedigree-probability", "Pedigree probability"),
             ("/biology/relatedness-coefficient", "Relatedness coefficient")],
    svg=("grid", {"caption": "An affected heterozygote mated with an unaffected partner."}),
    icon="tree",
))

add(Spec(
    name="Pedigree Probability Calculator",
    slug="pedigree-probability",
    summary=("Pedigree problems ask for the chance a future child is affected, given what the family "
             "tree shows. This calculator combines the probability a parent is a carrier with the "
             "transmission risk, and reports the joint probability in the form a genetics problem "
             "expects."),
    fields=[
        num("carrier_prob", "Chance the parent is a carrier", 0.667, "", "From the pedigree"),
        num("partner_carrier", "Chance the partner is a carrier", 0.04, "", "Population frequency"),
        num("transmission", "Transmission if both are carriers", 0.25, "", "0.25 for a recessive trait"),
        num("joint", "Chance of an affected child", "", "%", "", output=True),
        num("odds", "Odds against", "", ":1", "", output=True),
        num("one_in", "Expressed as 1 in", "", "", "", output=True),
    ],
    dirs=[
        d("Probability", "joint", "carrier_prob*partner_carrier*transmission*100"),
        d("Probability", "odds", "(1-carrier_prob*partner_carrier*transmission)"
                                 "/(carrier_prob*partner_carrier*transmission)"),
        d("Probability", "one_in", "1/(carrier_prob*partner_carrier*transmission)"),
    ],
    formula="P(affected) = P(parent carrier) × P(partner carrier) × P(transmission)",
    symbols=[("carrier", "probability the parent carries the allele", "0–1"),
             ("transmission", "probability two carriers have an affected child", "0–1"),
             ("joint", "product of independent probabilities", "0–1")],
    notes=[
        "Unaffected siblings of an affected child have a 2/3 chance of being carriers, not 3/4: the "
        "affected genotype is excluded from the sample space.",
        "Multiply only independent events; a shared ancestor makes the parents' genotypes dependent, "
        "which is what the inbreeding coefficient corrects for.",
        "Bayesian updating with test results replaces the prior carrier probability before you "
        "multiply.",
    ],
    mistakes=[
        "Using 0.25 for the parent's carrier probability instead of the pedigree-derived value.",
        "Forgetting to exclude an affected sibling from the denominator.",
        "Adding probabilities of independent events instead of multiplying them.",
    ],
    faq=[
        ("Why is an unaffected sibling's carrier risk 2/3?",
         "Of the three genotypes that produce an unaffected child (AA, Aa, aA), two are carriers."),
        ("How does a genetic test change the answer?",
         "It replaces the carrier probability with the test's posterior probability, which is then "
         "multiplied by the partner's risk and the transmission rate."),
    ],
    related=[("/biology/autosomal-recessive-risk", "Recessive inheritance risk"),
             ("/biology/inbreeding-coefficient", "Inbreeding coefficient"),
             ("/statistics/bayes-theorem", "Bayes' theorem")],
    svg=("chain", {"caption": "Carrier chance times partner chance times transmission."}),
    icon="tree",
))
