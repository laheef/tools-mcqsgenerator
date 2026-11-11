# The article voice

Every calculator article on Onim is written to one standard, and since round 84
that standard is set by measurement rather than taste. The research below is
what the pages are held to; the checklist at the end is what a reviewer runs
before a page ships.

## What the research says separates human and machine prose

Four studies carry most of the weight, and they agree on the same handful of
signals.

**Reinhart et al., PNAS 2025 (122(8):e2422455122), "Do LLMs write like
humans?"** compare human and model output across genres. The differences that
survive genre control are structural:

| Marker | How far apart |
| --- | --- |
| Participial clauses ("using…", "having…", "based on…") | 2 to 5 times more frequent in model text |
| Nominalisations ("the implementation of", "the utilisation of") | about 2.1 times |
| Over-represented vocabulary ("delve", "leverage", "robust", "underscore") | up to about 100 times |

**Culda et al., Connection Science 2025 (37:2507183)** find the same direction
in sentence-level statistics: machine text has a *narrower* distribution of
sentence lengths and a *lower* type–token ratio. Human writing swings between
very short sentences and long ones.

**Georgiou, Information 2025 (16(11):979)** reports structural repetition:
parallel triples, the same paragraph shape page after page, and a closing
sentence that restates the opening.

**The readability work reported in Stroke 2025** puts Flesch reading ease at
about 42 for human scientific prose against about 26 for model prose — machine
text is measurably denser. **Big Data and Cognitive Computing 10(2):55** groups
the cues into five families: lexical, syntactic, structural, content-level and
pragmatic.

## What that means for a page on this site

The rules below are the ones the conversion articles were written to, and they
are deliberately mechanical enough to check.

1. **Vary sentence length on purpose.** A section should contain at least one
   sentence under eight words and one over thirty. Uniform rhythm is the single
   most reliable tell.
2. **Keep participles rare.** No more than one participial opener per section.
   Write "The ratio is exact. Multiply and you have the answer." rather than
   "Having established the ratio, multiplication yields the answer."
3. **Use the verb, not the noun.** "Convert before you round", not "the
   conversion should precede the rounding process".
4. **No house words.** Delve, leverage, robust, seamless, underscore, crucial,
   comprehensive, in today's fast-paced world. If a sentence can lose the word
   without losing meaning, it loses the word.
5. **Anchor every claim to a number on the page.** A paragraph about precision
   quotes the factor the page uses. A paragraph about error quotes the ten per
   cent row of the sensitivity table.
6. **One idea per paragraph, and a paragraph that ends.** Machine prose pads
   with a restatement; human prose stops.
7. **Say what is not known.** The pages state the range a correlation holds
   over, the assumption behind a density, the fact that a rate is not fetched.
   Hedging that names a limit is human; hedging that names nothing is not.
8. **No closing summary that repeats the opening.** The FAQ is the summary.

## The checklist a reviewer runs

- [ ] Sentence lengths vary by a factor of four or more within the article.
- [ ] No paragraph opens with a participle.
- [ ] No house word from the list above.
- [ ] At least one sentence under eight words in every section.
- [ ] Every number in the prose also appears in a table or the worked example.
- [ ] The article names at least one limit of the calculation.
- [ ] The article would be wrong if the formula changed — it is about *this*
      page, not about converting in general.

## How this round applied it

The generator (`tools/conversion/gen.py`) supplies the skeleton through
`DEFAULT_PROSE`, and each builder adds prose that only its own page can carry:
the factor for a pair, the three-density table for a mass-volume page, the
four-scale table for temperature, the coins-per-dollar table for money. The
computed sections — sensitivity, ten-times, the arithmetic line by line, the
scale table — are generated from the page's own numbers, which is what keeps
the prose anchored (rule 5) and stops a page describing arithmetic it does not
perform.

Articles land between 1,502 and 2,299 words by the site's own counter, inside
the 1,500–2,500 window the brief sets, with a median of 2,004.

## Measured, at the end of the round

`tools/conversion/voice_qa.py` reads the 330 shipped pages, keeps only the prose
blocks, and counts the cues the papers above single out. Run it yourself:

```
python3 tools/conversion/voice_qa.py
```

Latest run:

| Measure | Result |
| --- | --- |
| Articles read | 330 |
| House words from the list | 0 hits |
| Participial sentence openers beyond the allowance | 0 pages |
| Pages drowning in nominalisations | 0 |
| Prose words per article | median 2,182 · min 1,519 · max 2,600 |
| Sentence lengths too uniform to be human | 0 pages |
| Longest sentence ÷ shortest, per article | median 22 |
| Standard deviation of sentence length | median 8.9 words — every page above 5 |

The wide spread is the point. An article whose sentences all run 18–24 words is
the clearest machine tell there is, and not one of the 330 does it. The script
is a guard, not a prize: it reads cues, and cues can be gamed. Read a page
aloud before you trust it.
