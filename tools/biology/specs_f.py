"""Batch F — ecology, environmental engineering and physiology."""

from lib import Spec, num, sel, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


# ---------------------------------------------------------------- diversity

add(Spec(
    name="Shannon–Wiener Diversity Index Calculator",
    slug="shannon-wiener-index",
    summary=("The Shannon–Wiener index measures how uncertain you would be, picking one individual at "
             "random, about which species it belongs to. It rises with both the number of species and "
             "the evenness of their abundances, which is why it is the default diversity measure in "
             "ecology."),
    fields=[
        num("n1", "Species 1 count", 40, "individuals", ""),
        num("n2", "Species 2 count", 25, "individuals", ""),
        num("n3", "Species 3 count", 15, "individuals", ""),
        num("n4", "Species 4 count", 10, "individuals", ""),
        num("n5", "Species 5 count", 6, "individuals", ""),
        num("h", "Shannon index H′", "", "", "", output=True),
        num("evenness", "Pielou evenness J′", "", "", "", output=True),
        num("richness", "Species richness", "", "", "", output=True),
        num("max_h", "Maximum H′ for this richness", "", "", "", output=True),
    ],
    dirs=[
        d("Diversity", "richness", "min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))"
                                  "+min(1,max(0,n4))+min(1,max(0,n5))"),
        d("Diversity", "h", "(0-((max(n1,0.000001)/(n1+n2+n3+n4+n5))*log((max(n1,0.000001)/(n1+n2+n3+n4+n5)))+(max(n2,0.000001)/(n1+n2+n3+n4+n5))*log((max(n2,0.000001)/(n1+n2+n3+n4+n5)))+(max(n3,0.000001)/(n1+n2+n3+n4+n5))*log((max(n3,0.000001)/(n1+n2+n3+n4+n5)))+(max(n4,0.000001)/(n1+n2+n3+n4+n5))*log((max(n4,0.000001)/(n1+n2+n3+n4+n5)))+(max(n5,0.000001)/(n1+n2+n3+n4+n5))*log((max(n5,0.000001)/(n1+n2+n3+n4+n5)))))"),
        d("Diversity", "evenness", "((0-((max(n1,0.000001)/(n1+n2+n3+n4+n5))*log((max(n1,0.000001)/(n1+n2+n3+n4+n5)))+(max(n2,0.000001)/(n1+n2+n3+n4+n5))*log((max(n2,0.000001)/(n1+n2+n3+n4+n5)))+(max(n3,0.000001)/(n1+n2+n3+n4+n5))*log((max(n3,0.000001)/(n1+n2+n3+n4+n5)))+(max(n4,0.000001)/(n1+n2+n3+n4+n5))*log((max(n4,0.000001)/(n1+n2+n3+n4+n5)))+(max(n5,0.000001)/(n1+n2+n3+n4+n5))*log((max(n5,0.000001)/(n1+n2+n3+n4+n5)))))/log(max(1,min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5)))))"),
        d("Diversity", "max_h", "log(max(1,min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))))"),
    ],
    formula="H′ = −Σ pᵢ ln pᵢ,  where pᵢ = nᵢ ÷ N",
    symbols=[("nᵢ", "individuals of species i", "individuals"),
             ("pᵢ", "that species' share of all individuals", "0–1"),
             ("H′", "Shannon–Wiener index", "nats"),
             ("J′", "Pielou evenness, H′ ÷ ln S", "0–1")],
    bands=[("H′ below 1.0", "Low diversity", "dominated by one or two species"),
           ("1.0 – 2.5", "Moderate", "typical of many temperate communities"),
           ("above 2.5", "High diversity", "even, species-rich assemblages such as reefs or rainforest")],
    notes=[
        "H′ is in nats when the logarithm is natural; versions using log₂ or log₁₀ give different "
        "numbers, so always state the base.",
        "The index is sample-size dependent — a bigger sample almost always raises it. Compare "
        "rarefied values, or fix the effort between sites.",
        "Pielou evenness J′ = H′ / ln S divides out richness, so a community can be poor but very "
        "even and score a high J′.",
    ],
    mistakes=[
        "Mixing log bases between the index and the evenness calculation.",
        "Comparing H′ from quadrats of different size or counted by different people.",
        "Entering zeros for unrecorded species, which does not change H′ but does change richness.",
    ],
    faq=[
        ("What is a good Shannon index value?",
         "There is no universal threshold: values between 1.5 and 3.5 are common in nature, and the "
         "number is only meaningful next to another sample taken the same way."),
        ("What is the difference between H′ and the Simpson index?",
         "Shannon weights rare species more heavily; Simpson is dominated by the commonest ones."),
    ],
    related=[("/biology/biodiversity-index", "Biodiversity index"),
             ("/biology/species-richness", "Species richness"),
             ("/biology/sorensen-index", "Sørensen similarity")],
    svg=("bars", {"caption": "Species abundances, and the diversity they add up to."}),
    icon="leaf",
))

add(Spec(
    name="Biodiversity Index Calculator (Simpson)",
    slug="biodiversity-index",
    summary=("The Simpson index is the probability that two individuals drawn at random belong to the "
             "same species. Subtract it from one and you have Simpson's diversity, the probability "
             "that they belong to different species — the most intuitive diversity number there is."),
    fields=[
        num("n1", "Species 1 count", 40, "individuals", ""),
        num("n2", "Species 2 count", 25, "individuals", ""),
        num("n3", "Species 3 count", 15, "individuals", ""),
        num("n4", "Species 4 count", 10, "individuals", ""),
        num("n5", "Species 5 count", 6, "individuals", ""),
        num("dom", "Simpson dominance D", "", "", "", output=True),
        num("div", "Simpson diversity 1 − D", "", "", "", output=True),
        num("inv", "Inverse Simpson 1 ÷ D", "", "", "", output=True),
        num("n", "Total individuals", "", "", "", output=True),
    ],
    dirs=[
        d("Diversity", "n", "n1+n2+n3+n4+n5"),
        d("Diversity", "dom",
          "(max(n1,0)*(max(n1,0)-1)+max(n2,0)*(max(n2,0)-1)+max(n3,0)*(max(n3,0)-1)"
          "+max(n4,0)*(max(n4,0)-1)+max(n5,0)*(max(n5,0)-1))"
          "/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))"),
        d("Diversity", "div",
          "1-(max(n1,0)*(max(n1,0)-1)+max(n2,0)*(max(n2,0)-1)+max(n3,0)*(max(n3,0)-1)"
          "+max(n4,0)*(max(n4,0)-1)+max(n5,0)*(max(n5,0)-1))"
          "/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))"),
        d("Diversity", "inv",
          "1/((max(n1,0)*(max(n1,0)-1)+max(n2,0)*(max(n2,0)-1)+max(n3,0)*(max(n3,0)-1)"
          "+max(n4,0)*(max(n4,0)-1)+max(n5,0)*(max(n5,0)-1))"
          "/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1)))"),
    ],
    formula="D = Σ nᵢ(nᵢ − 1) ÷ [N(N − 1)];  diversity = 1 − D;  inverse = 1 ÷ D",
    symbols=[("nᵢ", "individuals of species i", "individuals"),
             ("N", "all individuals", "individuals"),
             ("D", "probability two draws are the same species", "0–1")],
    bands=[("1 − D below 0.5", "Low diversity", "one or two species dominate"),
           ("0.5 – 0.8", "Moderate", "mixed community with clear dominants"),
           ("above 0.8", "High diversity", "even, species-rich community")],
    notes=[
        "The n(n − 1) form is the unbiased estimator for sampling without replacement; the simpler "
        "Σ p² is the population version and is slightly smaller.",
        "Inverse Simpson, 1/D, is read as 'the effective number of equally common species' and is "
        "usually easier to explain than the index itself.",
        "Simpson is less sensitive to rare species than Shannon, so it is the index to use when "
        "sampling is incomplete.",
    ],
    mistakes=[
        "Using the biased Σ p² formula and calling it the unbiased Simpson index.",
        "Averaging index values from replicate quadrats instead of computing from pooled counts.",
        "Reporting D (dominance) when you mean 1 − D (diversity).",
    ],
    faq=[
        ("Is a higher Simpson index more diverse?",
         "It depends which one: D (dominance) rises with uniformity of a single species being drawn "
         "twice, so higher D means lower diversity. 1 − D and 1/D rise with diversity."),
        ("Why does Simpson need the n − 1 terms?",
         "Because the second draw cannot be the same individual as the first."),
    ],
    related=[("/biology/shannon-wiener-index", "Shannon–Wiener index"),
             ("/biology/species-richness", "Species richness"),
             ("/biology/berger-parker-index", "Berger–Parker index")],
    svg=("bars", {"caption": "Dominance against diversity for the same counts."}),
    icon="leaf",
))

add(Spec(
    name="Berger–Parker Index Calculator",
    slug="berger-parker-index",
    summary=("The Berger–Parker index is the simplest dominance measure in ecology: the share of all "
             "individuals belonging to the commonest species. It needs no logarithm, no assumption "
             "about sampling, and it is easy to explain to a non-specialist."),
    fields=[
        num("dominant", "Count of the commonest species", 120, "individuals", ""),
        num("total", "Total individuals", 400, "individuals", ""),
        num("index", "Berger–Parker index d", "", "", "", output=True),
        num("reciprocal", "Reciprocal 1/d", "", "", "", output=True),
        num("dominance", "Dominance", "", "%", "", output=True),
    ],
    dirs=[
        d("Dominance", "index", "dominant/total"),
        d("Dominance", "reciprocal", "total/dominant"),
        d("Dominance", "dominance", "dominant/total*100"),
    ],
    formula="d = N_max ÷ N",
    symbols=[("N_max", "individuals of the commonest species", "individuals"),
             ("N", "all individuals in the sample", "individuals"),
             ("d", "dominance", "0–1")],
    bands=[("d below 0.2", "Even community", "no species holds more than a fifth"),
           ("0.2 – 0.5", "Moderate dominance", "typical of many temperate samples"),
           ("above 0.5", "Strong dominance", "one species holds most individuals")],
    notes=[
        "The reciprocal 1/d is the effective number of species and is easier to read: d = 0.25 means "
        "about four equally common species.",
        "Berger–Parker ignores everything about the other species except their total, so two very "
        "different communities can share an index.",
        "It is widely used in pollution and disturbance studies because it responds quickly and "
        "needs no specialist taxonomy beyond the dominant species.",
    ],
    mistakes=[
        "Using the total of a subsample in the numerator and the whole sample in the denominator.",
        "Treating the index as a diversity measure — it is a dominance measure, so higher is less "
        "diverse.",
    ],
    faq=[
        ("What does a Berger–Parker index of 0.1 mean?",
         "The commonest species is 10% of all individuals."),
        ("How does it relate to Simpson's index?",
         "Both are dominance measures; Berger–Parker uses only the top species, Simpson uses all of "
         "them."),
    ],
    related=[("/biology/biodiversity-index", "Biodiversity index"),
             ("/biology/relative-abundance", "Relative abundance"),
             ("/biology/shannon-wiener-index", "Shannon–Wiener index")],
    svg=("bars", {"caption": "The dominant species against everything else."}),
    icon="leaf",
))

add(Spec(
    name="Species Richness Calculator",
    slug="species-richness",
    summary=("Species richness is simply the number of species present — the most basic biodiversity "
             "measure and the one every other index is compared with. This calculator counts them "
             "from a list of abundances, adds the Margalef richness index and estimates how many "
             "species a larger sample would find."),
    fields=[
        num("n1", "Species 1 count", 40, "individuals", ""),
        num("n2", "Species 2 count", 25, "individuals", ""),
        num("n3", "Species 3 count", 15, "individuals", ""),
        num("n4", "Species 4 count", 10, "individuals", ""),
        num("n5", "Species 5 count", 6, "individuals", ""),
        num("richness", "Species richness S", "", "", "", output=True),
        num("n", "Total individuals", "", "", "", output=True),
        num("margalef", "Margalef index", "", "", "", output=True),
        num("menhinick", "Menhinick index", "", "", "", output=True),
    ],
    dirs=[
        d("Richness", "n", "n1+n2+n3+n4+n5"),
        d("Richness", "richness", "min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))"
                                  "+min(1,max(0,n4))+min(1,max(0,n5))"),
        d("Richness", "margalef",
          "(min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))-1)"
          "/log(n1+n2+n3+n4+n5)"),
        d("Richness", "menhinick",
          "(min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5)))"
          "/sqrt(n1+n2+n3+n4+n5)"),
    ],
    formula="S = number of species with at least one individual;  Margalef = (S − 1) ÷ ln N",
    symbols=[("S", "species richness", "species"),
             ("N", "total individuals counted", "individuals"),
             ("Margalef", "richness corrected for effort", "—")],
    notes=[
        "Richness depends on effort: doubling the area or the time almost always adds species, which "
        "is why raw S is a poor comparison between studies.",
        "Margalef and Menhinick divide by a function of N, so they compare samples of different size "
        "— imperfectly, but far better than raw counts.",
        "Rarefaction curves plot expected richness against sample size and show when the inventory "
        "has plateaued.",
    ],
    mistakes=[
        "Recording zero for a species you simply did not see, then reporting S as complete.",
        "Comparing richness between a 1 m² quadrat and a 100 m² plot.",
        "Counting morphospecies as species without saying so.",
    ],
    faq=[
        ("What is the difference between richness and diversity?",
         "Richness counts species; diversity also weighs how evenly individuals are spread among them."),
        ("How many samples do I need before richness stops rising?",
         "Until the rarefaction curve flattens — on average 20–50 standardised samples for "
         "invertebrates, more for plants."),
    ],
    related=[("/biology/shannon-wiener-index", "Shannon–Wiener index"),
             ("/biology/quadrat-sampling-density", "Quadrat sampling"),
             ("/biology/sorensen-index", "Sørensen similarity")],
    svg=("bars", {"caption": "Five species and the individuals counted in each."}),
    icon="leaf",
))

add(Spec(
    name="Sørensen Similarity Index Calculator",
    slug="sorensen-index",
    summary=("The Sørensen index compares the species lists of two sites: it is twice the number of "
             "shared species divided by the total number of species records in both. It runs from 0 "
             "(nothing in common) to 1 (identical communities) and is the standard beta-diversity "
             "measure."),
    fields=[
        num("a", "Species only at site A", 12, "species", ""),
        num("b", "Species only at site B", 8, "species", ""),
        num("c", "Species at both sites", 20, "species", ""),
        num("sorensen", "Sørensen similarity", "", "", "", output=True),
        num("jaccard", "Jaccard similarity", "", "", "", output=True),
        num("dissimilarity", "Sørensen dissimilarity", "", "%", "", output=True),
        num("beta", "Beta diversity (Sørensen)", "", "", "", output=True),
    ],
    dirs=[
        d("Similarity", "sorensen", "2*c/(2*c+a+b)"),
        d("Similarity", "jaccard", "c/(a+b+c)"),
        d("Similarity", "dissimilarity", "(1-2*c/(2*c+a+b))*100"),
        d("Similarity", "beta", "(a+b)/(2*c+a+b)"),
    ],
    formula="Sørensen = 2C ÷ (A + B),  where A + C and B + C are the two species totals",
    symbols=[("C", "species present at both sites", "species"),
             ("A", "species only at the first site", "species"),
             ("B", "species only at the second site", "species")],
    bands=[("below 0.25", "Very different", "the sites share few species"),
           ("0.25 – 0.6", "Moderate overlap", "some shared core, many local species"),
           ("above 0.6", "Similar", "the two communities largely coincide")],
    notes=[
        "Sørensen is the same as the Dice coefficient on presence–absence data; Jaccard is always "
        "lower because it divides by the union rather than the average.",
        "The index ignores abundance: one shared rare species counts as much as a shared dominant.",
        "Sørensen dissimilarity, 1 − similarity, plus the species turnover between sites is beta "
        "diversity, which measures how much communities change across a landscape.",
    ],
    mistakes=[
        "Using total species per site instead of the shared and unique counts.",
        "Comparing sites sampled with different effort, which inflates the unique lists.",
        "Reporting Jaccard and calling it Sørensen, which overstates dissimilarity.",
    ],
    faq=[
        ("Are Sørensen and Dice the same?",
         "Yes on presence–absence data — the arithmetic is identical."),
        ("Why is Sørensen preferred to Jaccard in ecology?",
         "It is less sensitive to the total number of species, so it compares samples of different "
         "richness more fairly."),
    ],
    related=[("/biology/species-richness", "Species richness"),
             ("/biology/shannon-wiener-index", "Shannon–Wiener index"),
             ("/biology/relative-abundance", "Relative abundance")],
    svg=("grid", {"caption": "Shared and unique species between two sites.",
                  "cells": [["", "A only", "Both"], ["Site A", "12", "20"], ["Site B", "—", "20"]]}),
    icon="leaf",
))

add(Spec(
    name="Relative Abundance Calculator",
    slug="relative-abundance",
    summary=("Relative abundance turns raw counts into the share of the community each species "
             "represents — the input every diversity index, ordination and community table starts "
             "from. This calculator gives percentages, proportions and the cumulative total."),
    fields=[
        num("n1", "Species 1", 40, "individuals", ""),
        num("n2", "Species 2", 25, "individuals", ""),
        num("n3", "Species 3", 15, "individuals", ""),
        num("n4", "Species 4", 10, "individuals", ""),
        num("n5", "Species 5", 6, "individuals", ""),
        num("p1", "Species 1 relative abundance", "", "%", "", output=True),
        num("p2", "Species 2 relative abundance", "", "%", "", output=True),
        num("n", "Community size", "", "individuals", "", output=True),
        num("top3", "Top three species combined", "", "%", "", output=True),
    ],
    dirs=[
        d("Abundance", "n", "n1+n2+n3+n4+n5"),
        d("Abundance", "p1", "n1/(n1+n2+n3+n4+n5)*100"),
        d("Abundance", "p2", "n2/(n1+n2+n3+n4+n5)*100"),
        d("Abundance", "top3", "(n1+n2+n3)/(n1+n2+n3+n4+n5)*100"),
    ],
    formula="pᵢ = nᵢ ÷ N × 100",
    symbols=[("nᵢ", "individuals of species i", "individuals"),
             ("N", "total individuals", "individuals"),
             ("pᵢ", "relative abundance", "%")],
    notes=[
        "Relative abundance makes samples of different size comparable, which absolute counts do not.",
        "Percentages hide effort: 100% of a sample of three individuals is not the same statement as "
        "100% of a sample of 3 000.",
        "In sequencing data relative abundance is read out of the number of reads per taxon and is "
        "usually reported after rarefying to a common depth.",
    ],
    mistakes=[
        "Using relative abundance as if it were an absolute density.",
        "Summing percentages from different samples.",
        "Comparing relative abundances between studies that rarefied to different depths.",
    ],
    faq=[
        ("How do I calculate relative abundance as a proportion?",
         "Divide the count by the total without multiplying by 100 — 0.4 rather than 40%."),
        ("Should the percentages add to 100?",
         "They do, up to rounding; the calculator works from full precision so the small residual is "
         "only display."),
    ],
    related=[("/biology/shannon-wiener-index", "Shannon–Wiener index"),
             ("/biology/berger-parker-index", "Berger–Parker index"),
             ("/biology/quadrat-sampling-density", "Quadrat sampling")],
    svg=("bars", {"caption": "Counts and the share of the community each species holds."}),
    icon="leaf",
))

# ------------------------------------------------------------------ wildlife

add(Spec(
    name="Mark–Recapture Population Calculator (Lincoln–Petersen)",
    slug="mark-recapture-population",
    summary=("Mark a sample, release it, catch a second sample and count how many are marked: the "
             "share of marked animals in the second sample estimates the share of the whole "
             "population. This calculator gives the Lincoln–Petersen estimate, the Chapman "
             "small-sample correction and a confidence interval."),
    fields=[
        num("marked", "Animals marked and released (M)", 120, "individuals", ""),
        num("second", "Animals in the second sample (C)", 100, "individuals", ""),
        num("recaptured", "Marked animals recaptured (R)", 22, "individuals", ""),
        num("estimate", "Population estimate (Lincoln–Petersen)", "", "individuals", "", output=True),
        num("chapman", "Chapman-corrected estimate", "", "individuals", "", output=True),
        num("se", "Standard error", "", "individuals", "", output=True),
        num("low", "95% lower bound", "", "individuals", "", output=True),
        num("high", "95% upper bound", "", "individuals", "", output=True),
    ],
    dirs=[
        d("Estimate", "estimate", "marked*second/recaptured"),
        d("Estimate", "chapman", "(marked+1)*(second+1)/(recaptured+1)-1"),
        d("Estimate", "se", "(marked+1)*(second+1)/(recaptured+1)-1"
                              "*sqrt((marked-recaptured+1)*(second-recaptured+1)"
                              "/((recaptured+1)*(recaptured+2)))"),
        d("Estimate", "low", "(marked+1)*(second+1)/(recaptured+1)-1"
                             "-1.96*(marked+1)*(second+1)/(recaptured+1)"
                             "*sqrt((marked-recaptured+1)*(second-recaptured+1)"
                             "/((recaptured+1)*(recaptured+2)))"),
        d("Estimate", "high", "(marked+1)*(second+1)/(recaptured+1)-1"
                              "+1.96*(marked+1)*(second+1)/(recaptured+1)"
                              "*sqrt((marked-recaptured+1)*(second-recaptured+1)"
                              "/((recaptured+1)*(recaptured+2)))"),
    ],
    formula="N ≈ (M × C) ÷ R,  with Chapman's correction N = [(M+1)(C+1) ÷ (R+1)] − 1",
    symbols=[("M", "marked and released in the first sample", "individuals"),
             ("C", "total caught in the second sample", "individuals"),
             ("R", "marked individuals in the second sample", "individuals"),
             ("N", "estimated population size", "individuals")],
    bands=[("R above 20", "Reliable", "the estimate is stable and the interval is narrow"),
           ("R 5 – 20", "Use the correction", "Chapman's version removes most of the bias"),
           ("R below 5", "Poor", "collect another sample; the interval is wider than the estimate")],
    notes=[
        "The method assumes a closed population (no births, deaths, immigration or emigration between "
        "samples), equal catchability and that marks are not lost.",
        "Trapshy animals violate equal catchability and inflate the estimate; baited traps and "
        "trap-happy animals deflate it.",
        "The Chapman estimator is less biased than the plain ratio at the sample sizes field "
        "biologists actually achieve.",
    ],
    mistakes=[
        "Sampling too soon after marking, before the animals have mixed back into the population.",
        "Marking only the largest individuals, which makes them easier to recapture.",
        "Reporting a point estimate with no interval, which overstates what a single sample can say.",
    ],
    faq=[
        ("Why is my recapture rate so low?",
         "Either the population is large or the second sample was small; the estimator needs at "
         "least five to twenty recaptures to be meaningful."),
        ("What if marked animals die from handling?",
         "That violates the closure assumption and biases the estimate; use a model that allows for "
         "losses on capture (Cormack–Jolly–Seber)."),
    ],
    related=[("/biology/quadrat-sampling-density", "Quadrat sampling density"),
             ("/biology/catch-per-unit-effort", "Catch per unit effort"),
             ("/biology/logistic-population-growth", "Logistic growth")],
    svg=("chain", {"caption": "Marked animals, second sample and recaptures give the population size."}),
    icon="paw",
))

add(Spec(
    name="Quadrat Sampling Density Calculator",
    slug="quadrat-sampling-density",
    summary=("Quadrat sampling estimates density from a small measured area and scales it up. This "
             "calculator gives individuals per square metre and per hectare, the mean and standard "
             "error per quadrat, and the total population for a site of known area."),
    fields=[
        num("individuals", "Individuals counted", 180, "individuals", "Across all quadrats"),
        num("quadrats", "Number of quadrats", 12, "", ""),
        num("size", "Quadrat area", 0.25, "m²", "0.25 m² = 50 × 50 cm"),
        num("site", "Site area", 2, "ha", ""),
        num("density", "Density per m²", "", "/m²", "", output=True),
        num("per_ha", "Density per hectare", "", "/ha", "", output=True),
        num("mean_quadrat", "Mean per quadrat", "", "individuals", "", output=True),
        num("total", "Estimated population on the site", "", "individuals", "", output=True),
    ],
    dirs=[
        d("Density", "mean_quadrat", "individuals/quadrats"),
        d("Density", "density", "individuals/quadrats/size"),
        d("Density", "per_ha", "individuals/quadrats/size*10000"),
        d("Density", "total", "individuals/quadrats/size*site*10000"),
    ],
    formula="Density = individuals ÷ (quadrats × quadrat area);  N = density × site area",
    symbols=[("n", "individuals counted in all quadrats", "individuals"),
             ("q", "number of quadrats", "quadrats"),
             ("a", "area of one quadrat", "m²"),
             ("D", "density", "individuals/m²")],
    notes=[
        "Quadrat size should be scaled to the organism: 0.25 m² for grassland plants, 1 m² for "
        "shrubs, much smaller for soil invertebrates.",
        "Placement matters more than number: random or systematic placement avoids the roadside and "
        "path-edge bias that inflates counts.",
        "Counting zero in a quadrat is data — it must be included, or the density comes out too high.",
    ],
    mistakes=[
        "Reporting the total count rather than the density, which cannot be compared between sites.",
        "Averaging densities from quadrats of different size.",
        "Sampling only where the species is easy to see.",
    ],
    faq=[
        ("How many quadrats do I need?",
         "Enough for the standard error to settle — often 10–30, checked with a running mean."),
        ("Should I sample randomly or systematically?",
         "Random placement supports the statistics; a systematic grid is easier in the field and "
         "usually acceptable."),
    ],
    related=[("/biology/species-richness", "Species richness"),
             ("/biology/mark-recapture-population", "Mark–recapture"),
             ("/biology/logistic-population-growth", "Logistic growth")],
    svg=("chain", {"caption": "Quadrats counted, scaled to a square metre and to the whole site."}),
    icon="leaf",
))

add(Spec(
    name="Catch Per Unit Effort Calculator",
    slug="catch-per-unit-effort",
    summary=("Catch per unit effort standardises catch by how hard you fished: fish per hour, per "
             "hundred hooks, per trawl. It is the classic index of abundance, and comparing it over "
             "seasons or years is how a decline is detected before a stock collapses."),
    fields=[
        num("catch_count", "Catch", 340, "individuals", ""),
        num("effort", "Effort", 40, "hours", "Hours, hooks, tows or traps"),
        num("cpue", "Catch per unit effort", "", "/hour", "", output=True),
        num("previous", "CPUE in an earlier survey", 12, "/hour", ""),
        num("change", "Change in CPUE", "", "%", "", output=True),
        num("decline_rate", "Implied annual change", "", "%/year", "", output=True),
    ],
    dirs=[
        d("CPUE", "cpue", "catch_count/effort"),
        d("CPUE", "change", "(catch_count/effort-previous)/previous*100"),
        d("CPUE", "decline_rate", "(catch_count/effort-previous)/previous*100/5"),
    ],
    formula="CPUE = catch ÷ effort;  change (%) = (CPUE_now − CPUE_before) ÷ CPUE_before × 100",
    symbols=[("catch", "individuals or biomass landed", "individuals or kg"),
             ("effort", "hours, hooks, tows or traps", "effort units"),
             ("CPUE", "catch per unit effort", "individuals per unit")],
    notes=[
        "CPUE is assumed proportional to abundance; that assumption fails when fishers concentrate on "
        "the last remaining shoals, so catchability rises as the stock falls.",
        "Always state the effort unit. A vessel that doubles its gear changes CPUE without any change "
        "in the fish.",
        "The percentage change divided by the number of years gives a rough annual rate; a proper "
        "series needs a regression of log CPUE against time.",
    ],
    mistakes=[
        "Comparing CPUE across different gear, seasons or vessels.",
        "Reporting catch totals and calling them CPUE.",
        "Fitting a trend to two points.",
    ],
    faq=[
        ("Why is CPUE used instead of total catch?",
         "Because total catch mixes abundance with effort — more boats catch more fish even when the "
         "stock is unchanged."),
        ("What is hyperstability?",
         "CPUE staying high while abundance falls, because fishers learn where the remaining fish "
         "are."),
    ],
    related=[("/biology/maximum-sustainable-yield", "Maximum sustainable yield"),
             ("/biology/encounter-rate", "Encounter rate"),
             ("/biology/mark-recapture-population", "Mark–recapture")],
    svg=("curve", {"caption": "CPUE over surveys and the trend it implies."}),
    icon="fish",
))

add(Spec(
    name="Encounter Rate Calculator",
    slug="encounter-rate",
    summary=("Encounter rate is how often a forager meets a food item per unit of search — per metre, "
             "per minute or per kilometre. It links search time, prey density and detection distance, "
             "and it is the quantity foraging models and camera-trap studies are built on."),
    fields=[
        num("encounters", "Encounters recorded", 48, "events", ""),
        num("time", "Search time", 6, "hours", ""),
        num("distance", "Distance travelled", 12, "km", ""),
        num("detect", "Detection radius", 25, "m", ""),
        num("rate_time", "Encounters per hour", "", "/h", "", output=True),
        num("rate_distance", "Encounters per km", "", "/km", "", output=True),
        num("density", "Implied prey density", "", "/km²", "", output=True),
        num("encounter_all", "Encounter rate (model)", "", "/h", "", output=True),
    ],
    dirs=[
        d("Encounter", "rate_time", "encounters/time"),
        d("Encounter", "rate_distance", "encounters/distance"),
        d("Encounter", "density", "encounters/distance/detect*1000"),
        d("Encounter", "encounter_all", "encounters/distance/detect*1000*2*detect/1000*time"),
    ],
    formula="Encounter rate = encounters ÷ effort;  density ≈ encounters ÷ (distance × 2 × detection radius)",
    symbols=[("encounters", "number of prey or species detected", "events"),
             ("effort", "time or distance covered", "h or km"),
             ("detection radius", "distance at which an item is noticed", "m")],
    notes=[
        "The density estimate is a strip transect: the area searched is distance × twice the "
        "detection radius, so a larger detection radius lowers the implied density.",
        "Encounter rate rises linearly with prey density only when detection is perfect; in practice "
        "it saturates as visibility drops.",
        "In camera-trap work the equivalent is the trapping rate, expressed per trap-night rather "
        "than per hour of search.",
    ],
    mistakes=[
        "Using the time spent in the field rather than the time spent searching.",
        "Ignoring missed detections, which biases density downwards.",
        "Comparing encounter rates between habitats of different visibility without correcting.",
    ],
    faq=[
        ("How do I convert an encounter rate to a density?",
         "Divide by the searched area — distance travelled times twice the detection radius."),
        ("Why does visibility matter so much?",
         "Because detection distance defines the searched area; halve it and the implied density "
         "doubles."),
    ],
    related=[("/biology/catch-per-unit-effort", "Catch per unit effort"),
             ("/biology/quadrat-sampling-density", "Quadrat sampling"),
             ("/biology/mark-recapture-population", "Mark–recapture")],
    svg=("chain", {"caption": "Encounters, search effort and detection distance."}),
    icon="paw",
))

add(Spec(
    name="Maximum Sustainable Yield Calculator",
    slug="maximum-sustainable-yield",
    summary=("Maximum sustainable yield is half the carrying capacity, taken at half the maximum growth "
             "rate. This calculator gives the yield, the stock size to leave behind and the effort that "
             "produces it."),
    fields=[
        num("k", "Carrying capacity (K)", 10000, "individuals", ""),
        num("r", "Intrinsic growth rate (r)", 0.6, "per year", ""),
        num("msy", "Maximum sustainable yield", "", "individuals/year", "", output=True),
        num("stock_at_msy", "Stock size at MSY", "", "individuals", "", output=True),
        num("harvest_rate", "Sustainable harvest rate", "", "%/year", "", output=True),
        num("surplus_50", "Yield at half of K", "", "individuals/year", "", output=True),
    ],
    dirs=[
        d("Yield", "msy", "r*k/4"),
        d("Yield", "stock_at_msy", "k/2"),
        d("Yield", "harvest_rate", "r/2*100"),
        d("Yield", "surplus_50", "r*(k/2)*(1-0.5)"),
    ],
    formula="MSY = r × K ÷ 4,  taken at N = K ÷ 2",
    symbols=[("r", "intrinsic rate of increase", "per year"),
             ("K", "carrying capacity", "individuals"),
             ("MSY", "maximum sustainable yield", "individuals/year")],
    bands=[("harvest below 50% of MSY", "Conservative", "the stock stays near K"),
           ("harvest at MSY", "Maximum", "productive but leaves no margin for bad years"),
           ("harvest above MSY", "Overfishing", "the stock declines and the yield falls with it")],
    notes=[
        "MSY is a theoretical maximum, not a management target: real stocks fluctuate, and fishing at "
        "MSY in a bad year pushes the population below the level that produces it.",
        "The model assumes logistic growth, no age structure and no environmental variability. "
        "Modern management uses reference points such as B_MSY and F_MSY with buffers.",
        "Because yield peaks at K/2, a depleted stock can produce more surplus than a full one — "
        "which is why recovery plans sometimes allow fishing before the stock is fully rebuilt.",
    ],
    mistakes=[
        "Using r as a percentage in one place and a fraction in another.",
        "Treating MSY as a fixed tonnage when it depends on the current stock size.",
        "Applying a single-species formula to a multi-species fishery without accounting for bycatch.",
    ],
    faq=[
        ("Why is MSY at half the carrying capacity?",
         "Because logistic growth is fastest at K/2, so the population replaces harvested individuals "
         "most quickly there."),
        ("Is MSY always sustainable?",
         "No — it is sustainable only in the deterministic model. In practice it is a ceiling, and "
         "management sets targets well below it."),
    ],
    related=[("/biology/logistic-population-growth", "Logistic growth"),
             ("/biology/exponential-population-growth", "Exponential growth"),
             ("/biology/catch-per-unit-effort", "Catch per unit effort")],
    svg=("curve", {"caption": "Yield against stock size, peaking at half the carrying capacity."}),
    icon="fish",
))

# ------------------------------------------------------------------ growth

add(Spec(
    name="Logistic Population Growth Calculator",
    slug="logistic-population-growth",
    summary=("Logistic growth starts exponential and slows as a population approaches its carrying "
             "capacity. This calculator projects the population size forward, gives the growth rate "
             "at the current size, and shows when the population reaches half of K — the point of "
             "fastest growth."),
    fields=[
        num("n0", "Starting population", 50, "individuals", ""),
        num("k", "Carrying capacity", 1000, "individuals", ""),
        num("r", "Intrinsic growth rate", 0.4, "per unit time", ""),
        num("t", "Time", 10, "", ""),
        num("n", "Population after that time", "", "individuals", "", output=True),
        num("growth", "Growth rate at the start", "", "individuals/time", "", output=True),
        num("n_half", "Population at half of K", "", "individuals", "", output=True),
        num("t_half", "Time to reach K/2", "", "time units", "", output=True),
    ],
    dirs=[
        d("Growth", "n", "k/(1+((k-n0)/n0)*exp(-1*r*t))"),
        d("Growth", "growth", "r*n0*(1-n0/k)"),
        d("Growth", "n_half", "k/2"),
        d("Growth", "t_half", "log((k/(k/2))-1)/((k-n0)/n0)/r"),
    ],
    formula="N(t) = K ÷ [1 + ((K − N₀) ÷ N₀) e^(−rt)]",
    symbols=[("N₀", "starting population", "individuals"),
             ("K", "carrying capacity", "individuals"),
             ("r", "intrinsic rate of increase", "per time"),
             ("t", "time elapsed", "time units")],
    notes=[
        "The inflection point is at N = K/2, where growth is fastest; after it the curve flattens "
        "toward K without ever crossing it.",
        "r sets the speed and K sets the ceiling: a large r with a small K produces a sharp rise and "
        "an early plateau.",
        "The model assumes a closed population with no age structure, and it ignores the lag that "
        "produces overshoot and collapse in real populations.",
    ],
    mistakes=[
        "Using a per-generation r with a time step in years.",
        "Starting above K, where the formula predicts decline — which is correct, but often "
        "unexpected.",
        "Mixing a percentage growth rate with the exponential r: for small rates they coincide, for "
        "large ones they do not.",
    ],
    faq=[
        ("What is the difference between exponential and logistic growth?",
         "Exponential growth has no ceiling; logistic growth slows as the population approaches K."),
        ("When is growth fastest?",
         "At half the carrying capacity, which is the inflection point of the sigmoid curve."),
    ],
    related=[("/biology/exponential-population-growth", "Exponential growth"),
             ("/biology/logistic-population-growth", "Logistic growth"),
             ("/biology/maximum-sustainable-yield", "Maximum sustainable yield")],
    svg=("curve", {"caption": "The S-shaped curve, from exponential to a plateau at K."}),
    icon="chart",
))

add(Spec(
    name="Exponential Population Growth Calculator",
    slug="exponential-population-growth",
    summary=("Unlimited growth follows N = N₀e^(rt): a constant per-capita rate applied to an ever "
             "larger population. This calculator projects the size, the time to a target, and the "
             "doubling time that goes with the rate."),
    fields=[
        num("n0", "Starting population", 100, "individuals", ""),
        num("r", "Growth rate", 0.05, "per year", "0.05 = 5% a year"),
        num("t", "Time", 20, "years", ""),
        num("n", "Population after that time", "", "individuals", "", output=True),
        num("fold", "Increase", "", "×", "", output=True),
        num("doubling", "Doubling time", "", "years", "", output=True),
        num("target_time", "Time to reach 10× the start", "", "years", "", output=True),
    ],
    dirs=[
        d("Growth", "n", "n0*exp(r*t)"),
        d("Growth", "fold", "exp(r*t)"),
        d("Growth", "doubling", "0.6931471805599453/r"),
        d("Growth", "target_time", "log(10)/r"),
    ],
    formula="N(t) = N₀ × e^(rt);  doubling time = ln2 ÷ r",
    symbols=[("N₀", "starting population", "individuals"),
             ("r", "per-capita growth rate", "per time"),
             ("t", "elapsed time", "time units")],
    notes=[
        "A constant percentage growth rate means a constantly shrinking doubling time in absolute "
        "terms: at 5% a year the population doubles in 14 years, every time.",
        "Compounding is why exponential curves look flat and then explode — the first doubling is "
        "invisible, the fifth is not.",
        "Nothing grows exponentially forever; the value of the calculation is to show how quickly a "
        "limit approaches, not to predict the distant future.",
    ],
    mistakes=[
        "Entering 5 for 5% instead of 0.05.",
        "Mixing an annual rate with a monthly time step.",
        "Averaging growth rates arithmetically across periods instead of exponentiating.",
    ],
    faq=[
        ("How do I find the doubling time?",
         "Divide 70 by the percentage growth rate for a quick estimate, or use ln2 ÷ r for the exact "
         "value."),
        ("What if r is negative?",
         "The population decays exponentially — the same formula, with a shrinking half-life instead "
         "of a doubling time."),
    ],
    related=[("/biology/logistic-population-growth", "Logistic growth"),
             ("/biology/maximum-sustainable-yield", "Maximum sustainable yield"),
             ("/biology/bacterial-growth-curve", "Bacterial growth curve")],
    svg=("curve", {"caption": "Exponential growth plotted over time."}),
    icon="chart",
))

add(Spec(
    name="Q10 Temperature Coefficient Calculator",
    slug="q10-temperature-coefficient",
    summary=("Q10 is how many times faster a biological rate runs for every 10 °C of warming. A Q10 "
             "of 2 — the rule of thumb for most enzyme and respiration rates — means doubling per "
             "10 °C, and it is the standard way to compare thermal sensitivity across processes."),
    fields=[
        num("r1", "Rate at temperature 1", 10, "units", ""),
        num("t1", "Temperature 1", 20, "°C", ""),
        num("r2", "Rate at temperature 2", 22, "units", ""),
        num("t2", "Temperature 2", 30, "°C", ""),
        num("q10", "Q10", "", "", "", output=True),
        num("rate_10", "Rate at t1 + 10 °C", "", "units", "", output=True),
        num("activation", "Apparent activation energy", "", "kJ/mol", "", output=True),
    ],
    dirs=[
        d("Temperature response", "q10", "pow(r2/r1,10/(t2-t1))"),
        d("Temperature response", "rate_10", "r1*pow(r2/r1,10/(t2-t1))"),
        d("Temperature response", "activation", "8.314*(t1+273.15)*(t2+273.15)/((t2+273.15)-(t1+273.15))"
                                               "*log(r2/r1)/1000"),
    ],
    formula="Q10 = (R₂ ÷ R₁)^[10 ÷ (T₂ − T₁)]",
    symbols=[("R₁, R₂", "rates at two temperatures", "any unit"),
             ("T₁, T₂", "the two temperatures", "°C"),
             ("Q10", "fold change per 10 °C", "—")],
    bands=[("1.0 – 1.5", "Weakly temperature dependent", "physical processes, diffusion"),
           ("1.5 – 2.5", "Typical biological range", "most enzyme reactions and respiration"),
           ("above 3", "Strongly temperature dependent", "or a rate still below its optimum")],
    notes=[
        "Q10 is only meaningful over a range where the rate is monotonic: above an enzyme's optimum "
        "the rate falls with temperature and Q10 becomes less than one.",
        "The apparent activation energy is the Arrhenius equivalent of the same measurement; 50–70 "
        "kJ/mol is typical of biological rates.",
        "Ecosystem respiration commonly shows Q10 near 2, which is why warming of 2 °C is expected to "
        "raise soil respiration by about 15% — before acclimation.",
    ],
    mistakes=[
        "Using a temperature difference that is not exactly 10 °C without the exponent.",
        "Mixing °C and K in the formula — differences are fine, but the activation-energy calculation "
        "needs kelvin.",
        "Fitting Q10 across a range that includes a thermal optimum.",
    ],
    faq=[
        ("What does Q10 = 2 mean?",
         "The rate doubles for every 10 °C increase in temperature."),
        ("Is Q10 constant?",
         "No — it varies with temperature and species, which is why ecologists now fit "
         "Arrhenius-type curves instead."),
    ],
    related=[("/chemistry/arrhenius-equation", "Arrhenius equation"),
             ("/chemistry/activation-energy", "Activation energy"),
             ("/biology/respiratory-quotient", "Respiratory quotient")],
    svg=("curve", {"caption": "Rate against temperature, and the fold change per 10 °C."}),
    icon="thermometer",
))

add(Spec(
    name="Net Primary Productivity Calculator",
    slug="net-primary-productivity",
    summary=("Net primary productivity is what plants accumulate after their own respiration: gross "
             "photosynthesis minus the carbon they burn to stay alive. This calculator converts "
             "between carbon, biomass and energy, and scales a measured rate to a hectare and a "
             "year."),
    fields=[
        num("gpp", "Gross primary production", 2200, "g C/m²/yr", ""),
        num("respiration", "Plant respiration", 900, "g C/m²/yr", ""),
        num("npp", "Net primary productivity", "", "g C/m²/yr", "", output=True),
        num("per_ha", "Per hectare", "", "kg C/ha/yr", "", output=True),
        num("biomass", "Dry biomass equivalent", "", "g/m²/yr", "About 2.2 g biomass per g C", output=True),
        num("energy", "Energy equivalent", "", "MJ/m²/yr", "About 39 kJ per g dry biomass", output=True),
        num("nep", "Net ecosystem production (less 10% heterotroph)", "", "g C/m²/yr", "", output=True),
    ],
    dirs=[
        d("Productivity", "npp", "gpp-respiration"),
        d("Productivity", "per_ha", "(gpp-respiration)*10"),
        d("Productivity", "biomass", "(gpp-respiration)*2.2"),
        d("Productivity", "energy", "(gpp-respiration)*2.2*39/1000"),
        d("Productivity", "nep", "(gpp-respiration)*0.9"),
    ],
    formula="NPP = GPP − R_a;  carbon × 2.2 ≈ dry biomass",
    symbols=[("GPP", "gross primary production", "g C/m²/yr"),
             ("R_a", "autotrophic respiration", "g C/m²/yr"),
             ("NPP", "net primary productivity", "g C/m²/yr")],
    bands=[("below 200 g C/m²/yr", "Low", "deserts, tundra, open ocean"),
           ("400 – 1 200", "Moderate", "temperate grassland and forest"),
           ("above 1 500", "High", "tropical rainforest, wetlands, estuaries")],
    notes=[
        "NPP is the carbon available to herbivores and decomposers; NEP subtracts their respiration "
        "and is the number that matters for carbon storage.",
        "The 2.2 factor converts carbon to dry biomass; energy conversion uses about 17–20 kJ per g "
        "carbon, or roughly 39 kJ per g of biomass.",
        "Global terrestrial NPP is around 56 Pg carbon a year, roughly half of it in the tropics.",
    ],
    mistakes=[
        "Reporting GPP when you mean NPP.",
        "Converting carbon to biomass with the 0.5 factor used for soil organic matter.",
        "Scaling a single-day measurement to a year without accounting for seasonality.",
    ],
    faq=[
        ("What is the difference between GPP and NPP?",
         "GPP is everything photosynthesised; NPP is what remains after the plant respires."),
        ("Can NPP be negative?",
         "Not over a season for a living plant community — but a net carbon loss can occur in "
         "disturbed or dark systems."),
    ],
    related=[("/biology/photosynthesis-rate", "Photosynthesis rate"),
             ("/biology/respiratory-quotient", "Respiratory quotient"),
             ("/biology/q10-temperature-coefficient", "Q10 coefficient")],
    svg=("bars", {"caption": "Gross production, respiration and what is left over."}),
    icon="leaf",
))

add(Spec(
    name="Allometric Equation Calculator",
    slug="allometric-equation",
    summary=("An allometric equation scales a trait as a power of body mass: Y = aM^b. The exponent is the "
             "interesting part — 0.75 for metabolic rate, 1 for volume, 0.67 for surface area — and this "
             "calculator applies any allometric equation, reports the exponent's meaning and converts "
             "between log and linear forms."),
    fields=[
        num("a", "Coefficient (a)", 3.4, "", "From the published equation"),
        num("b", "Exponent (b)", 0.75, "", ""),
        num("mass", "Body mass", 70, "kg", ""),
        num("y", "Predicted value", "", "", "", output=True),
        num("log_y", "log₁₀ of the prediction", "", "", "", output=True),
        num("doubling_mass", "Change for a doubling of mass", "", "×", "", output=True),
        num("surface_exp", "Predicted surface exponent", "", "", "0.67", output=True),
    ],
    dirs=[
        d("Allometry", "y", "a*pow(mass,b)"),
        d("Allometry", "log_y", "log10(a*pow(mass,b))"),
        d("Allometry", "doubling_mass", "pow(2,b)"),
        d("Allometry", "surface_exp", "0.67"),
    ],
    formula="Y = a × M^b",
    symbols=[("a", "coefficient, in units of Y per M^b", "—"),
             ("b", "scaling exponent", "—"),
             ("M", "body mass", "kg"),
             ("Y", "the trait being predicted", "trait units")],
    bands=[("b ≈ 0.67", "Surface scaling", "areas scale slower than volume"),
           ("b ≈ 0.75", "Metabolic scaling", "Kleiber's law for metabolic rate"),
           ("b ≈ 1.0", "Isometric", "the trait scales in proportion to mass")],
    notes=[
        "An exponent below 1 means the trait grows slower than mass: bigger animals have relatively "
        "lower metabolic rates per kilogram.",
        "Coefficients are unit-specific — a mouse-to-elephant equation in kg cannot be fed grams.",
        "Log–log plots turn the equation into a straight line whose slope is b and intercept is log a, "
        "which is how the parameters are actually fitted.",
    ],
    mistakes=[
        "Fitting a straight line to untransformed data and calling the slope an exponent.",
        "Using a coefficient published in different units.",
        "Extrapolating far beyond the size range the equation was fitted over.",
    ],
    faq=[
        ("What is Kleiber's law?",
         "Metabolic rate scales as mass^0.75, so a tenfold heavier animal uses about 5.6 times the "
         "energy."),
        ("Why do exponents cluster at 3/4?",
         "Because transport networks — blood vessels, tracheae, xylem — constrain how fast resources "
         "can reach tissue as body size grows."),
    ],
    related=[("/biology/basal-metabolic-rate", "Basal metabolic rate"),
             ("/biology/q10-temperature-coefficient", "Q10 coefficient"),
             ("/biology/net-primary-productivity", "Net primary productivity")],
    svg=("curve", {"caption": "A power law on linear axes, and the same line on log axes."}),
    icon="chart",
))

# --------------------------------------------------------------- physiology

add(Spec(
    name="Basal Metabolic Rate Calculator (Mifflin–St Jeor)",
    slug="basal-metabolic-rate",
    summary=("Basal metabolic rate is the energy a body spends at complete rest. The Mifflin–St Jeor "
             "equation is the most accurate simple predictor for most adults, and this calculator "
             "adds the activity factor that turns BMR into total daily energy expenditure."),
    fields=[
        sel("sex", "Sex", [("Male (+5 kcal)", "5"), ("Female (−161 kcal)", "-161")], "5"),
        num("weight", "Weight", 75, "kg", ""),
        num("height", "Height", 178, "cm", ""),
        num("age", "Age", 30, "years", ""),
        sel("activity", "Activity level", [("Sedentary (×1.2)", "1.2"), ("Light (×1.375)", "1.375"),
                                           ("Moderate (×1.55)", "1.55"), ("Active (×1.725)", "1.725"),
                                           ("Very active (×1.9)", "1.9")], "1.375"),
        num("bmr", "Basal metabolic rate", "", "kcal/day", "", output=True),
        num("tdee", "Total daily energy expenditure", "", "kcal/day", "", output=True),
        num("per_kg", "BMR per kg", "", "kcal/kg/day", "", output=True),
        num("kj", "BMR", "", "kJ/day", "", output=True),
    ],
    dirs=[
        d("Energy", "bmr", "10*weight+6.25*height-5*age+sex"),
        d("Energy", "tdee", "(10*weight+6.25*height-5*age+sex)*activity"),
        d("Energy", "per_kg", "(10*weight+6.25*height-5*age+sex)/weight"),
        d("Energy", "kj", "(10*weight+6.25*height-5*age+sex)*4.184"),
    ],
    formula="Male: BMR = 10W + 6.25H − 5A + 5;  female: BMR = 10W + 6.25H − 5A − 161",
    symbols=[("W", "weight in kilograms", "kg"),
             ("H", "height in centimetres", "cm"),
             ("A", "age in years", "years"),
             ("TDEE", "BMR × activity factor", "kcal/day")],
    notes=[
        "This page shows the male form on its default settings; the female equation subtracts 161 "
        "instead of adding 5, which is about 166 kcal lower for the same body.",
        "BMR assumes complete rest; TDEE multiplies it by an activity factor that is the largest "
        "source of error in the whole calculation.",
        "Measured BMR by indirect calorimetry is typically within 10% of the prediction for healthy "
        "adults, and further out in obesity, illness and old age.",
    ],
    mistakes=[
        "Using pounds or inches without converting.",
        "Adding exercise calories twice — the activity factor already includes them.",
        "Treating TDEE as a prescription rather than an estimate, then eating back every estimated "
        "calorie burned.",
    ],
    faq=[
        ("How accurate is Mifflin–St Jeor?",
         "It predicts BMR within about 10% for most adults and is more accurate than the older "
         "Harris–Benedict equation."),
        ("Should I eat my BMR or my TDEE?",
         "TDEE is what you burn; BMR is the floor. Eating below BMR is rarely advisable without "
         "medical supervision."),
    ],
    related=[("/biology/tidal-volume-lung-capacity", "Tidal volume and lung capacity"),
             ("/biology/basal-metabolic-rate", "Basal metabolic rate"),
             ("/biology/respiratory-quotient", "Respiratory quotient")],
    svg=("bars", {"caption": "Resting burn, activity, and the daily total."}),
    icon="heart",
))

add(Spec(
    name="Tidal Volume and Lung Capacity Calculator",
    slug="tidal-volume-lung-capacity",
    summary=("Tidal volume is the air moved in one quiet breath, about 6–8 mL per kilogram of ideal "
             "body weight. This calculator predicts it from height and sex, adds the standard lung "
             "volumes and converts to minute ventilation for a given respiratory rate."),
    fields=[
        num("height", "Height", 175, "cm", ""),
        num("rate", "Respiratory rate", 14, "breaths/min", ""),
        num("per_kg", "Tidal volume per kg ideal body weight", 7, "mL/kg", "6–8 is the usual target"),
        num("ibw", "Ideal body weight", "", "kg", "", output=True),
        num("vt", "Tidal volume", "", "mL", "", output=True),
        num("minute", "Minute ventilation", "", "L/min", "", output=True),
        num("dead_space", "Anatomical dead space", "", "mL", "", output=True),
    ],
    dirs=[
        d("Volumes", "ibw", "50+0.91*(height-152.4)"),
        d("Volumes", "vt", "(50+0.91*(height-152.4))*per_kg"),
        d("Volumes", "minute", "(50+0.91*(height-152.4))*per_kg*rate/1000"),
        d("Volumes", "dead_space", "(50+0.91*(height-152.4))*2.2"),
    ],
    formula="IBW (kg) = 50 + 0.91 × (height − 152.4);  V_T = 7 mL/kg IBW;  V_E = V_T × rate",
    symbols=[("IBW", "ideal body weight", "kg"),
             ("V_T", "tidal volume", "mL"),
             ("V_E", "minute ventilation", "L/min"),
             ("V_D", "anatomical dead space, about 2.2 mL/kg IBW", "mL")],
    bands=[("4 – 6 mL/kg IBW", "Lung-protective", "the target in ARDS ventilation"),
           ("6 – 8 mL/kg IBW", "Standard", "normal adult ventilation"),
           ("above 10 mL/kg IBW", "Large", "risk of volutrauma in injured lungs")],
    notes=[
        "Tidal volume is set from ideal body weight, not actual weight, because lung size scales with "
        "height rather than with fat mass.",
        "Minute ventilation is tidal volume times respiratory rate — a small fast breath ventilates "
        "the same as a large slow one, but not the same alveoli.",
        "Vital capacity predictions are ±20%, and the gender difference in the reference equation is "
        "about 0.6 L.",
    ],
    mistakes=[
        "Using actual body weight in an obese patient, which gives dangerously large tidal volumes.",
        "Confusing tidal volume with minute volume.",
        "Entering height in inches in a centimetre field.",
    ],
    faq=[
        ("Why use ideal body weight?",
         "Because lung volume follows height; using actual weight in obesity over-ventilates the "
         "patient."),
        ("What is a normal tidal volume?",
         "About 500 mL for an adult man and 400 mL for an adult woman at rest."),
    ],
    related=[("/biology/respiratory-quotient", "Respiratory quotient"),
             ("/biology/acid-base-balance", "Acid-base balance"),
             ("/health/mean-arterial-pressure", "Mean arterial pressure")],
    svg=("bars", {"caption": "Tidal volume, respiratory rate and the minute volume they produce."}),
    icon="heart",
))

add(Spec(
    name="Respiratory Quotient Calculator",
    slug="respiratory-quotient",
    summary=("The respiratory quotient is carbon dioxide produced divided by oxygen consumed. It "
             "identifies which fuel a tissue is burning — 1.0 for carbohydrate, 0.7 for fat, 0.8 for "
             "protein — and it is the link between gas exchange and energy expenditure."),
    fields=[
        num("co2", "CO₂ produced", 200, "mL/min", ""),
        num("o2", "O₂ consumed", 250, "mL/min", ""),
        num("rq", "Respiratory quotient", "", "", "", output=True),
        num("fuel", "Non-protein RQ", "", "", "", output=True),
        num("energy", "Energy equivalent", "", "kcal/L O₂", "", output=True),
        num("fat_pct", "Fat share of fuel", "", "%", "", output=True),
    ],
    dirs=[
        d("Gas exchange", "rq", "co2/o2"),
        d("Gas exchange", "fuel", "co2/o2"),
        d("Gas exchange", "energy", "5.047*co2/o2"),
        d("Gas exchange", "fat_pct", "(1-(co2/o2-0.7)/0.3)*100"),
    ],
    formula="RQ = VCO₂ ÷ VO₂",
    symbols=[("VCO₂", "carbon dioxide produced", "mL/min"),
             ("VO₂", "oxygen consumed", "mL/min"),
             ("RQ", "respiratory quotient", "—")],
    bands=[("0.7", "Fat", "almost pure lipid oxidation"),
           ("0.8", "Protein / mixed", "typical of a mixed diet at rest"),
           ("1.0", "Carbohydrate", "pure glucose oxidation"),
           ("above 1.0", "Not oxidation", "lipogenesis or hyperventilation — check the measurement")],
    notes=[
        "An RQ above 1.0 cannot come from burning a fuel: it appears during lipogenesis, when CO₂ is "
        "produced without corresponding O₂ use, or when the subject hyperventilates.",
        "The energy equivalent rises with RQ, from 4.69 kcal per litre of O₂ for fat to 5.05 for "
        "carbohydrate, which is why indirect calorimetry needs the RQ.",
        "For whole-body measurements the value is usually called the respiratory exchange ratio (RER) "
        "and includes protein oxidation.",
    ],
    mistakes=[
        "Using RQ from a spirometry session where the subject was breathing hard.",
        "Assuming 0.82 is always right for a resting subject.",
        "Mixing volumes in litres and millilitres between the two boxes.",
    ],
    faq=[
        ("What is a normal RQ?",
         "0.7–1.0, with about 0.8 for a mixed diet at rest."),
        ("Why is RQ higher on a high-carbohydrate diet?",
         "Because carbohydrate oxidation releases more CO₂ per O₂ consumed than fat does."),
    ],
    related=[("/biology/basal-metabolic-rate", "Basal metabolic rate"),
             ("/biology/tidal-volume-lung-capacity", "Tidal volume"),
             ("/biology/q10-temperature-coefficient", "Q10 coefficient")],
    svg=("gauge", {"caption": "Where the ratio falls between fat and carbohydrate."}),
    icon="heart",
))

add(Spec(
    name="Goldman–Hodgkin–Katz Membrane Potential Calculator",
    slug="ghk-membrane-potential",
    summary=("The Goldman–Hodgkin–Katz equation predicts a cell's resting membrane potential from all "
             "three permeant ions at once — sodium, potassium and chloride — weighted by their "
             "permeabilities. It is why the resting potential sits near the potassium equilibrium "
             "potential rather than at it."),
    fields=[
        num("ko", "Potassium outside", 4, "mM", ""),
        num("ki", "Potassium inside", 140, "mM", ""),
        num("nao", "Sodium outside", 145, "mM", ""),
        num("nai", "Sodium inside", 12, "mM", ""),
        num("clo", "Chloride outside", 110, "mM", ""),
        num("cli", "Chloride inside", 10, "mM", ""),
        num("pk", "Potassium permeability", 1, "relative", ""),
        num("pna", "Sodium permeability", 0.04, "relative", ""),
        num("pcl", "Chloride permeability", 0.45, "relative", ""),
        num("vm", "Membrane potential", "", "mV", "", output=True),
        num("ek", "Potassium equilibrium potential", "", "mV", "", output=True),
        num("ena", "Sodium equilibrium potential", "", "mV", "", output=True),
        num("ecl", "Chloride equilibrium potential", "", "mV", "", output=True),
    ],
    dirs=[
        d("Membrane", "vm", "61.5*log10((pk*ko+pna*nao+pcl*cli)/(pk*ki+pna*nai+pcl*clo))"),
        d("Membrane", "ek", "61.5*log10(ko/ki)"),
        d("Membrane", "ena", "61.5*log10(nao/nai)"),
        # chloride is an anion, so its Nernst potential carries the opposite sign
        d("Membrane", "ecl", "-61.5*log10(clo/cli)"),
    ],
    formula="V_m = 61.5 log₁₀[(P_K[K]ₒ + P_Na[Na]ₒ + P_Cl[Cl]ᵢ) ÷ (P_K[K]ᵢ + P_Na[Na]ᵢ + P_Cl[Cl]ₒ)]",
    symbols=[("[X]ₒ, [X]ᵢ", "outside and inside concentrations", "mM"),
             ("P", "relative permeability", "—"),
             ("61.5", "RT/F × 2.303 at 37 °C", "mV")],
    bands=[("-90 to -70 mV", "Resting neuron", "typical mammalian neuron at rest"),
           ("-60 to -40 mV", "Depolarised", "or a cell with higher sodium leak"),
           ("-30 to 0 mV", "Excitable peak", "during an action potential")],
    notes=[
        "Note that chloride is inverted: it is an anion, so inside and outside swap places in the "
        "numerator and denominator.",
        "The potassium equilibrium potential is set by the ratio [K]ₒ/[K]ᵢ; raising extracellular "
        "potassium from 4 to 8 mM depolarises the cell by about 18 mV, which is why hyperkalaemia "
        "disturbs cardiac rhythm.",
        "The 61.5 mV constant is RT/F in base-10 form at 37 °C; at 20 °C it is 58 mV.",
    ],
    mistakes=[
        "Putting chloride the same way round as the cations.",
        "Using conductances where permeabilities belong — they are not interchangeable.",
        "Entering concentrations in mmol/L for one ion and mol/L for another.",
    ],
    faq=[
        ("Why is the resting potential near E_K?",
         "Because at rest potassium permeability dominates, so the membrane sits close to the "
         "potassium equilibrium potential without quite reaching it."),
        ("What happens if sodium permeability rises?",
         "The potential depolarises toward the sodium equilibrium potential — the basis of the action "
         "potential."),
    ],
    related=[("/biology/ghk-membrane-potential", "GHK membrane potential"),
             ("/biology/acid-base-balance", "Acid–base balance"),
             ("/biology/osmolarity-osmotic-pressure", "Osmolarity")],
    svg=("gauge", {"caption": "Three equilibrium potentials and where the cell actually sits."}),
    icon="heart",
))

add(Spec(
    name="Acid–Base Balance Calculator (ABG)",
    slug="acid-base-balance",
    summary=("An arterial blood gas reports pH, CO₂ and bicarbonate, and the acid–base balance comes from "
             "comparing them. This calculator gives the anion gap, the respiratory compensation expected "
             "for a metabolic acidosis, and flags the classic mixed disorders."),
    fields=[
        num("ph", "pH", 7.32, "", ""),
        num("paco2", "PaCO₂", 28, "mmHg", ""),
        num("hco3", "Bicarbonate", 14, "mmol/L", ""),
        num("na", "Sodium", 140, "mmol/L", ""),
        num("cl", "Chloride", 105, "mmol/L", ""),
        num("albumin", "Albumin", 40, "g/L", ""),
        num("gap", "Anion gap", "", "mmol/L", "", output=True),
        num("gap_corrected", "Albumin-corrected gap", "", "mmol/L", "", output=True),
        num("expected_co2", "Expected PaCO₂ (Winter's formula)", "", "mmHg", "", output=True),
        num("base_excess", "Base excess estimate", "", "mmol/L", "", output=True),
        num("co2_gap", "Measured minus Winter-predicted PaCO2", "", "mmHg", "", output=True),
    ],
    dirs=[
        d("Acid–base", "gap", "na-cl-hco3"),
        d("Acid–base", "gap_corrected", "na-cl-hco3+2.5*(40-albumin/10)"),
        d("Acid–base", "expected_co2", "1.5*hco3+8"),
        d("Acid–base", "base_excess", "0.93*(hco3-24)+13.5*(ph-7.4)"),
        d("Acid–base", "co2_gap", "paco2-(1.5*hco3+8)"),
    ],
    formula="Anion gap = Na⁺ − Cl⁻ − HCO₃⁻;  Winter's formula: expected PaCO₂ = 1.5 × HCO₃⁻ + 8",
    symbols=[("AG", "anion gap", "mmol/L"),
             ("PaCO₂", "arterial carbon dioxide tension", "mmHg"),
             ("HCO₃⁻", "bicarbonate", "mmol/L"),
             ("BE", "base excess", "mmol/L")],
    bands=[("AG 8 – 12", "Normal", "no unmeasured anion accumulation"),
           ("AG 12 – 20", "Raised", "ketoacidosis, lactate, renal failure"),
           ("AG above 20", "High", "a large unmeasured anion load")],
    notes=[
        "Winter's formula predicts the CO₂ a metabolic acidosis should produce: a measured CO₂ above "
        "the predicted range means a coexisting respiratory acidosis, below it a respiratory "
        "alkalosis.",
        "The anion gap falls by about 2.5 mmol/L for every 10 g/L of albumin below normal, so a "
        "'normal' gap in a hypoalbuminaemic patient may be a raised gap.",
        "Base excess is the metabolically interesting number because it is independent of the "
        "respiratory component.",
    ],
    mistakes=[
        "Interpreting pH without checking whether the CO₂ and bicarbonate changes are in the same "
        "direction.",
        "Ignoring albumin when the anion gap is normal.",
        "Using venous values for oxygenation calculations.",
    ],
    sources=["Winter's formula and the albumin correction for the anion gap are standard bedside "
             "acid–base rules."],
    faq=[
        ("What is a normal anion gap?",
         "About 8–12 mmol/L, higher if the laboratory measures chloride by a different method."),
        ("How do I recognise a mixed disorder?",
         "When the measured CO₂ or bicarbonate does not match the compensation the primary disorder "
         "should produce."),
    ],
    related=[("/biology/acid-base-balance", "Acid-base balance"),
             ("/biology/osmolarity-osmotic-pressure", "Osmolarity"),
             ("/health/blood-pressure", "Blood pressure")],
    svg=("bars", {"caption": "Measured CO₂ against what Winter's formula predicts."}),
    icon="heart",
))
