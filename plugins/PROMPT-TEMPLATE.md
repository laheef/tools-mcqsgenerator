# Building a tool: the standing brief

Paste this at the top of any request for a new tool file. It is the same brief
every existing tool was written against, and it exists because the failures are
predictable: a tool that only works with the script on, a tool that quietly
prints `NaN`, a tool that copies a competitor's wording.

---

## 1. Research first (15 minutes, no code)

Open the five pages that currently rank for the tool's name. For each, write
down one line: **what it computes, and what it does not.** Then decide what this
tool does that none of them do — usually one of:

* shows the working (the substitution, not just the answer);
* accepts the unit the reader actually thinks in;
* handles the edge case the competitors print `NaN` for;
* says plainly when the answer is an estimate.

**Do not copy their text, their layout or their code.** The point of the
research is to find the gap, not to re-type the page.

## 2. Write the spec in one paragraph

> "The reader types ___, ___, ___; the tool shows ___; it is right when ___; it
> refuses to answer when ___ (and says why)."

If that paragraph is hard to write, the tool is not ready.

## 3. Design against the site's tokens

The frame is already styled (`.calc-tool-frame` in `assets/css/app.css`). Inside
it, use the same tokens the rest of the site uses — never new colours:

```
--ink #0A0A0A · --ink-3 #4B5259 · --ink-4 #66717F
--brand #3B68FC · --brand-ink #294CC2 · --brand-soft #EBEFFF
--border #DFE2EB · --surface-2 #F8F9FB · --radius 8px
```

Layout rules that have already been through review:

* **one column** — the widget column is ~400 px wide;
* labels above fields, never beside them;
* the primary button is full width, one per form;
* the answer is visually louder than the inputs (bigger, brand colour);
* units are shown in the field, not only in the label.

## 4. Handle the edges before the happy path

| input | behaviour |
|---|---|
| empty | answer shows `—`, never `NaN`, never `0` |
| zero divisor | a sentence: "a percentage of zero is zero", not `Infinity` |
| negative | allowed where it means something, refused where it does not |
| huge / tiny | switch to exponent notation rather than a wall of digits |
| decimals with a comma | accept `1,5` as `1.5` |
| pasted values | strip spaces and currency symbols before parsing |

## 5. Both paths must work

* **No script:** the form submits (GET, or POST for text), the page re-renders,
  the server prints the answer.
* **With script:** `input` event → recompute → repaint, and the submit is
  cancelled.

If the no-script path cannot work, say so in the description and in the article.

## 6. Security

* escape with `Toolkit::e()` in text and attributes;
* no `eval`, no `innerHTML` with anything a visitor typed (`textContent`, or an
  escaping helper);
* no file paths from the request; no `include` of a variable;
* no network calls — a tool that phones home is a tool that breaks.

## 7. Structure of an answer

Every result should be **the number, its unit, and one line of working**:

```
18% of 84.50 = 15.21
  10% = 8.45   ·   5% = 4.23   ·   1% = 0.85
```

A number without a unit or a derivation is a number the reader has to trust. The
whole reason people come here rather than to a competitor is that this site shows
its work.

## 8. Ship list

- [ ] header block complete (name, shortcode, category, version, description)
- [ ] guard at the top
- [ ] `Toolkit::addShortcode()` registers exactly one tag
- [ ] every id derived from `$ctx['uid']`
- [ ] styles and script scoped to `#<uid>`
- [ ] every visible string through `Toolkit::t()`
- [ ] server-rendered answer present in the returned HTML
- [ ] empty / zero / negative / comma-decimal all tested by hand
- [ ] no CDN, no external font, no tracking pixel
- [ ] the file is under 2 MB and passes `php -l`

## 9. Then

Upload it under **Tool plugins**, create the page, write the article, publish.
The page gets its own URL, its own place in the catalogue, its own schema, and
its own share buttons — none of which the file has to know about.
