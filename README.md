# tools-mcqsgenerator — 4 041 calculators, plain PHP

The calculator site served at **mcqsgenerator.com/tool**.


A self-contained rebuild of the Omni Calculator catalogue, packaged to run from
**https://mcqsgenerator.com/tool** (a folder under the domain root, not a separate
vhost). Plain PHP 8.1+, hand-written CSS, vanilla JS: no framework, no build step,
no Composer, no Node, and no third-party call at runtime — Tailwind is a vendored
build in `assets/js/vendor/`, fonts are system fonts.

| | |
|---|---|
| Calculators | **4 041** across 14 categories (320 biology) |
| Sitemap | 4 065 URLs, all under `/tool/` |
| Engine | one declarative equation solver (PHP + JS) drives every page |
| Repairs | 378 hand-written supplements where the harvested equations were incomplete |
| Admin | PHP + MySQL panel: pages, posts, calculators, media, menu, SEO, settings, backups, contact inbox |
| Tests | `tests/solver.php` (70) and `tests/e2e_panel.php` (252) — both green |

Every calculator renders real inputs and computes on demand: **no field is
prefilled**, and **nothing is calculated until you press Calculate**. Results are
formatted with their units; integer-only fields reject letters inline; an empty
submit lists the fields that are still needed instead of showing a blank panel.

## Repository layout

```
index.php  api.php  cron.php      front controller, JSON endpoints, scheduled jobs
admin/                            the panel (own front controller + assets)
lib/  templates/  modules/        the engine, views, page modules
assets/                           css, js, vendored Tailwind, images
data/calc/                        catalogue: sharded NDJSON + manifest + supplements
data/content/                     one article per calculator
data/pages/                       file-based fallback for the static pages
install/database.sql              schema + content import (no user accounts)
uploads/                          media (biology figures, uploads/media)
tools/                            harvest, audit and QA scripts referenced below
docs/                             admin panel and backup/restore documentation
HOSTINGER-GUIDE.md                complete deployment guide for mcqsgenerator.com/tool
```

## Quick start (local)

```bash
php -S 127.0.0.1:8080 router.php      # http://127.0.0.1:8080/
```

`router.php` emulates the `.htaccess` rewrite for PHP's built-in server. A database
is optional locally — the catalogue, articles and static pages come from `data/`;
only the admin panel needs MySQL.

## Deploy

This repository **is** the site. Hostinger's Git integration pulls `main` into
`public_html/tool` and redeploys automatically on every push, so publishing a change
is `git push origin main`.

`HOSTINGER-GUIDE.md` is the step-by-step guide: PHP 8.2 + extensions, MySQL in
hPanel, connecting the repository (root directory `public_html/tool`, which must be
empty), `install/database.sql` import, `/tool/admin/install.php`, HTTPS, sitemap
submission, an 18-item post-deploy check, and the update/rollback workflow.

Three things that differ from a plain zip deployment, and are already handled here:

- `config.db.php` is git-ignored — the installer writes it on the server and Git
  never overwrites it. Back it up once; Git cannot restore it.
- `install/` and `admin/install.php` stay in the repository (a redeploy would restore
  them anyway). They are blocked by `.htaccess` and the installer locks itself once
  an administrator exists.
- Hostinger leaves a `.git` directory inside the deployed folder; the `.htaccess`
  here answers **403** for it, and for `tools/`, `docs/` and `tests/`.

A release zip (`mcqsgenerator-tool.zip`, 25 MB) exists for hosts without Git — the
same tree without `tools/`, `docs/`, `.git` and the development scripts. Do not
extract it into a folder that Hostinger manages.

### Working on the site rather than just running it

`bash tools/setup.sh` installs what the test suites need (PHP + mbstring, Python
Playwright, Chromium), starts the server on :8080 and prints the suite commands.
`bash tools/setup.sh --check` reports what is present without installing anything.

Requirements: **PHP 8.1+**, `mbstring` recommended, MySQL only for the panel.

---

## Admin panel

A complete control panel for the site, built for Hostinger-style shared hosting
(PHP + MySQL only, no Node, no Composer, no root). Every screen below writes to
MySQL and every number on it is read from MySQL — nothing is simulated.

```
/admin/install.php     first-run installer (server check → database → migrations → seed → first admin)
/admin/index.php       the panel
/cron.php              nightly maintenance (CLI, or token-guarded HTTP)
```

| Area | Screens |
| --- | --- |
| Content | Dashboard · Calculators (3,831, publish/unpublish, article text, sections, FAQs, related, SEO, icon) · Categories · Pages · Blog · Tags |
| Layout | Homepage sections (reorder, enable, edit) · Header & menu · Footer columns · Appearance (colours, fonts, radius, dark mode) |
| Site | Settings (identity, layout, email/SMTP, analytics, ads, contact, system) · SEO (defaults, indexing, redirects with hit counts, sitemap) · Contact form builder |
| Operations | Media library (validated uploads, usage report) · Inbox (read/spam/resolved, notes, CSV) · Users & roles · Backups (dump, download, restore, retention) · Activity log · Source-file editor with versioning |

### The panel is an override layer

| Layer | Source of truth | Edited by |
| --- | --- | --- |
| Formulas, units, field definitions | `data/calc/*.ndjson` (harvested) | never — the panel does not touch them |
| Article text, FAQs, related picks, slug, status, SEO | MySQL `calculators` (a row exists only once someone changes it) | the panel |
| Pages, posts, menus, sections, settings, media | MySQL | the panel |
| Templates and PHP | the files on disk | Source files screen (syntax-checked, versioned) |

That is why the 3,831 calculators keep working if MySQL goes away: the harvested
catalogue is the primary source, the database only overrides it.

### Growing past the harvest

The override layer cannot invent a calculator the harvest never saw, so there is a
second, panel-only path for new tools — a social platform, a game, a niche with no
category yet. **Custom calculators** (Calculators → Custom calculators) stores the
definition in MySQL and compiles it into the very same shape the harvester produces,
so a calculator built in the panel gets routing, two-way solving, related links,
search, sitemap and signed previews for free. Fields, units, formulas, article and
FAQ are all edited in the panel; every formula is parsed *and evaluated* before it
can be saved, and every save keeps a restorable version.

```php
// the seam, in Data::allRows()
foreach (CustomCalc::rows() as $custom) {          // MySQL rows …
    $rows[] = CustomCalc::dataRow($custom);        // … become catalogue rows
}
```

Adding the next 1,000 calculators is 1,000 rows, not 1,000 PHP files — and a
whole niche at once is one document: **Bulk import** takes JSON or CSV, shows a dry
run (what each row would create, what its defaults actually calculate, and why any
row is refused), and writes only what validates. `data/samples/custom-calculators.json`
is a working example.

A definition is not an article, so the editor has **Draft the article**: it writes
the intro, sections, a worked example and the FAQ from the definition itself — the
field labels, units, options and formulas, and the real solver's output for the
default values — with a caveat that fits the category. It is deterministic, it
lands in the form rather than the database, it never overwrites prose you wrote
unless you tick *replace*, and the bulk importer can do the same for every row that
arrives without text (`draft_articles=1`). Pressing it twice is not a slot machine;
publishing it unread is your choice, not the panel's.

Drafted text is tracked, not trusted: a row the importer wrote carries `drafted_at`,
shows up under **Needs review** with a `Draft article · unread` badge, and leaves
the queue when a person opens it and presses Save. Adding that column to an
existing database is a panel button (Dashboard → *Database update available*), not
an SSH session.

### The escape hatch: modules

For the rare page whose interface is not a list of fields, `modules/<name>/`
adds a PHP partial into a named slot of that page (`widget_top`,
`widget_bottom`, `article_head`, `article_foot`, `page_foot`) without forking the
template. `modules/aim-benchmarks/` is installed as a working example: it draws a
rank-band strip under the headshot calculator and reads the solved percentage.
The panel lists modules, validates their manifests, switches them off, and edits
their partials through Source files. Broken modules never render.

### Panel features worth knowing

* **Signed preview links** — an unpublished calculator or post has no public URL; the
  panel hands out `?preview=<HMAC>` links that show the draft with a banner and
  `noindex`, and 404 for anyone else.
* **Everything confirmable** — destructive actions are POST-only with a confirmation
  dialog; a GET link can never delete or publish anything (logout included).
* **Roles** — administrator / editor / author, enforced server-side on every request.
* **Secrets** — the SMTP password and API keys are stored AES-256-GCM encrypted with
  the installation's application key and never echoed back into a form.
* **Source editor** — `php -l` before write, one version row per save, one-click
  restore, path whitelist, and a file that is in use cannot be deleted.

Deployment, cron and hardening: [HOSTINGER-GUIDE.md](HOSTINGER-GUIDE.md).
Backups and disaster recovery: [docs/BACKUP-RESTORE.md](docs/BACKUP-RESTORE.md).

### Running the panel locally

```bash
cd php-clone
cp admin/config.sample.php config.db.php     # fill in host/user/pass, generate app_key:
php -r "echo bin2hex(random_bytes(32));"
PHP_CLI_SERVER_WORKERS=8 php -S 0.0.0.0:8080 router.php
# then open http://localhost:8080/admin/install.php
```

The installer creates the schema, seeds the defaults and asks for the first
administrator — there is no default password anywhere in the codebase.

---

## Reader engagement (real, not decorative)

| Feature | How it works | Endpoint |
| --- | --- | --- |
| **Creator avatars** | 17 portrait photos in `assets/img/creators/`, one per person, stable per name and never repeated within a page | — |
| **Likes** | real counter in `data/engagement/likes.json`, locked writes, one like per visitor per calculator, harvested "N people find this helpful" count as the starting base | `POST /api/like` |
| **Reviews** | validated server-side (length, links rejected, 5 per visitor per hour), stored in `reviews.jsonl`, rendered server-side so crawlers see them, `AggregateRating` JSON-LD generated only from real reviews | `POST /api/review`, `GET /api/reviews` |
| **Preferred source** | remembers the choice on the device and links to the Google page that actually controls it — the site never pretends it can change a Google setting | — |

Reviews and likes need `data/engagement/` to be writable. If it is not, the page still
renders and the API says so instead of failing silently.

## Related content and internal linking

| Block | What it does |
| --- | --- |
| Related calculators | 6-card responsive grid, each with a reason ("Also covers mortgage"); ranked by **article similarity** — `tools/build_related.py` TF-IDF-scores all 3,831 articles against each other offline and `Data::related()` reads the precomputed neighbours |
| More {category} calculators | 14 chips into the same category + a link to the category index |
| Explore other categories | 6 sibling category tiles with their counts |
| Contextual links in the article | up to 8 per page, inserted into the body copy by `lib/InternalLinks.php`: never inside a link/heading/code block, never the same target twice, never a self-link, longest phrase wins, generic single words and lowercase 3-letter words are refused |

`python3 tools/link_audit.py` checks this on every page: **3,831 pages, avg 3.8
contextual links (min 2, max 8), 0 self-links, 0 duplicate targets.**

The linker indexes English variants of a name ("Adding Fractions" → "add
fractions", "fraction"/"fractions"), prefers a phrase without the word
"calculator" when two start at the same word, and — when an article names fewer
than two other tools — appends one sentence linking the page's most similar
neighbours, minus anything the article already linked. That is what raised the
floor from 1 contextual link per page to 2.

## Form controls that were quietly wrong

Two long-standing defects were found by a combination of the mobile audit and a
manual read of `/physics/density`:

* A two-state option in the reference payload (a `CHECKBOX` dataset: one labelled
  option plus a blank "off" entry) was rendered as **two radios, one of them
  unlabelled** — 845 variables on 388 calculators. It is now a single labelled
  checkbox, its state is read by `calc.js`, carried in the shareable URL
  (`?lookupP=<uid>`) and restored on reload, and the article describes it as
  "a single on/off switch — tick it for …" instead of counting the blank option.
* `calc.js` stripped every `{{…}}` token **before** substituting the real values, so
  any computed value embedded in a sentence disappeared in the browser:
  "The age of the sample is  ± 10 years." instead of "5 730 ± 10 years".
  1,040 pages carry such tokens. Fixed, and the strip now runs after substitution.
* `/math/center-of-mass` rendered one radio button with no text: its only option
  was labelled with a non-breaking space. Blank-labelled options are now dropped
  from every choice control, and a control left with nothing is not rendered
  (the variable keeps its definition default, so the numbers do not move).
* Article copy and option help carried the reference's own authoring syntax
  (`{{slot}}`, `&amp;nbsp;`, `^^sup^^`, `**bold**`, `==sub==`). The content
  corpus is clean after a regeneration, and the remaining cases — truncated
  definitions that end mid-slot upstream — are stripped at render time by
  `Widget::cleanText()` and `View::rewriteArticleHtml()`, with the same filters
  mirrored in `calc.js`. A rendered scan of all 3,831 pages now finds none of
  them, and a line whose value never arrived (`=  `) is blanked rather than
  printed.
* Sentence fragments that end in a hanging connector ("That's exactly the density of")
  no longer render when the fragment that finishes them needs a value nobody entered;
  the element stays in the DOM so the browser can fill it as soon as the value exists.

## What is verified

| Suite | Command | Result |
| --- | --- | --- |
| Solver regression (hand-checked values, formatting, defaults) | `php php-clone/tests/solver.php` | **67 passed, 0 failed** |
| PHP↔JS agreement — server render vs client re-solve | `python3 tools/agreement_test.py --all --jobs 6` | **3,831 pages, 5,932 rendered fields, 0 conflicts** (+57 script-only fields the browser alone can fill) |
| Solve audit — defaults in place, nothing left blank | `php tools/solve_audit.php` | 3,831 calculators: **3,622 clean, 209 flagged** — every flag explained in `php-clone/docs/solve-audit.json` (page-script helpers the server cannot run, divisors that are 0 in the page's own defaults) |
| Expression coverage of every harvested formula | `php tools/audit_expr.php` | 50,615 variants: 47,352 evaluate; 126 rejected as domain errors; `full 3,474 · script 298 · partial 10 · none 49` |
| Full-catalogue HTTP crawl | `python3 tools/crawl_all.py` | **3,831 pages, 0 failures** (median 81 ms / p95 340 ms idle) |
| Browser sweep — every page opened, filled and re-checked | `python3 tools/browser_test.py --all --jobs 6` | **3,831 pages, 0 failures, 27 retired notices** |
| Page interactions (search, collapse, units, URL state, copy link) | `python3 tools/interaction_test.py` | **all passed** |
| Share cards | `python3 tools/build_og_images.py` + `tools/seo_audit.py` | 1200×630 **PNG** on every page (per category), with type and alt text — an SVG card renders blank on every social crawler |
| Meta descriptions | corpus scan | 3,831 pages, 90–158 characters, **0 duplicates**, 0 emoji, no machine-name boilerplate |
| Page titles | `php tools/title_audit.php` | 3,831 pages: **0 under 45 characters, 0 over 62, 0 duplicates** — boilerplate tails removed, truncated source names repaired, short titles topped up |
| SEO / link / JSON-LD / sitemap audit | `python3 tools/seo_audit.py` | **no problems** — 3,846 internal links and 3,846 sitemap URLs; JSON-LD `BreadcrumbList` 3,845, `FAQPage` 3,831, `SoftwareApplication` 3,831 |
| Content corpus | scan of `data/content` | 3,831 articles, **median 1,312 words**, 0 duplicate meta descriptions, 0 identical bodies |
| Likes + reviews end to end | `python3 tools/engagement_test.py` | **17 passed, 0 failed** — writes persist, duplicates refused, validation enforced, review visible in HTML and JSON-LD (`Review` + `AggregateRating`) |
| Raw-markup scan of rendered HTML (all 3,831 pages) | `grep` over `<script>`-stripped output | **0** `{{`, **0** `&amp;nbsp;`, **0** `^^`, **0** `**`, **0** empty result lines |
| Contextual internal links | `python3 tools/link_audit.py` | 3,831 pages, avg 3.8 body links (min 2), 0 violations |
| Related-calculator relevance | `python3 tools/build_related.py` + `Data::related()` | 3,831 pages, 6 cards each, 0 self-references, 0 duplicates, ranked by TF-IDF article similarity |
| **Admin panel — UI, security, cron** | `python3 tools/admin_e2e.py` | **140 passed, 0 failed** — forms driven as a browser drives them, assertions against MySQL and the public HTML |
| **Admin panel — every screen, every write** | `php php-clone/tests/e2e_panel.php` | **94 passed, 0 failed** — settings, overrides, previews, menus, pages, blog, media, inbox, redirects, roles, source editor, backups, cron |
| Structural HTML | `python3 tools/html_audit.py --all` | **3,835 pages, 0 problems** — no duplicate ids, no dangling `label[for]`/ARIA/anchor references, balanced tags, image dimensions everywhere |
| Colour contrast, WCAG 2.1 AA | `python3 tools/contrast_audit.py --all` | **3,835 pages, 0 failures** — every text node measured against its real background in Chromium |
| Mobile / touch audit at 390 × 844 | `python3 tools/mobile_audit.py --all --jobs 5` | **3,836 pages, 0 problems** — no horizontal overflow, no tap target under 28 px, no unlabelled control, no heading jump |

The only pages outside the green sweep are 27 **retired calculators** whose
reference definition is a single "no longer available" notice with no fields at all.
They are reported in every run and listed in `docs/browser-sweep.log`, not silently
skipped; `docs/browser-failures.json` (page failures) is empty. Two pages
that used to fail here — `/health/fertility-by-age` and `/other/act-score` — pass
now that the test pushes a dropdown to its far end instead of one step: their
reference datasets map a run of adjacent options to the same number, so a single
step legitimately changes nothing.

The agreement suite asserts that the **PHP render and the JS re-solve produce the
same numbers** on all 3,831 pages: crawlers and no-JS users get the same result as a
browser that has finished loading, and nothing "settles" a moment after the page
appears. `tools/audit_expr.php` evaluates every equation direction with several
value sets, so a formula the engine cannot handle is found offline instead of
showing up as a blank field in production. Both tools are documented in `SPEC.md`
§10.3–§10.4, including the five disagreements the last sweep found and why they
existed.

---

## How the calculations run

Every definition is solved the same way in both places:

* **PHP** (`lib/Solver.php` + `lib/Expr.php`) renders the first paint, so a crawler
  or a reader with JavaScript disabled still sees the numbers.
* **JavaScript** (`assets/js/calc.js`) mirrors the parser, the function table, the
  unit conversions and the rounding rules, and re-solves on every keystroke.

Where the reference page computed its result with bespoke JavaScript, that script is
shipped rather than reimplemented: `omni.define` helpers become callable from the
equation evaluator, and `omni.onResult` hooks run after the equations settle, with a
`ctx` that exposes `getRawInput`, `exportValue`, `addHtml` and `addUnmetCondition`.
A vendored mathjs (11.12.0) backs the scripts that need arbitrary precision.

Two details of that contract matter and both were wrong at first:

* **Scripts speak display units, the engine stores base units.** A page script that
  destructures `{numberOfYears}` means *2 years*, not 63,115,200 seconds. Hooks now
  receive a converted copy of the state and `ctx.exportValue` converts back. Before
  the fix, one depreciation calculator looped 63 million times and crashed the tab.
* **A field with no value is blank, not zero.** Templates interpolate `{{x.value}}`
  only for variables the solver actually knows, so a half-filled form shows nothing
  instead of a plausible-looking zero.

Long option lists (a note picker with 78 choices, a card picker with 52) render as
drop-downs rather than 78 radio buttons: the same option uids, a fraction of the
markup, and `{{x.uiValue}}` still resolves to the chosen label.

Finally, a **period variable is a count, not a duration**. The time unit chip stores
seconds (that switcher's base), but several finance definitions read the term as a
count of years — `n_monthly = 12 * term`. In base seconds that made
`pow(1.00375, 11360736000)` infinite and the mortgage calculator silently blank.
Variables whose default unit is years, months or weeks are now converted into that
unit for the length of a formula and back afterwards (PHP and JS alike), so the
mortgage at its defaults returns **684.03 per month / 246,249.06 over the term**.

Coverage by support class (`data/calc/support.json`, written by
`tools/audit_expr.php`):

| Support | Count | Meaning |
| --- | --- | --- |
| `full` | 3,474 | every equation has a direction the engine can evaluate |
| `script` | 298 | no usable closed form; the page's own script computes the result |
| `partial` | 10 | most equations evaluate, a few need helpers the script provides |
| `none` | 49 | presentation-only pages (explanations, no calculation to run) |

---

## The article on every page

All 3,831 articles are generated from each calculator's own model — no scraped
prose. `tools/generate_content.py` reads the harvested definition plus a solved
example and writes `data/content/<category>/<slug>.json`:

| Part | Where it comes from |
| --- | --- |
| Title, meta description | the calculator's name, its headline result and its inputs |
| "How the … calculator works" | the real count and order of its inputs |
| "What you need to enter" | one line per field, from its type, unit and options |
| "The variables, at a glance" | a table of every field, its unit and whether you supply or it is calculated |
| "The formula behind the …" | the solver's own equation directions, with variable labels folded in |
| "A worked example" | numbers produced by running the solver, rejected if they would look absurd |
| "Common x to y conversions" | converters only, from the unit table's own conversion expressions |
| "Units and precision", "When to use it", "Getting a reliable answer", "Good to know" | generated, varied per page |
| "Related calculators" | three neighbours from the same category |
| FAQ (5–8 questions) | answered from the model, and emitted as `FAQPage` JSON-LD |

Current corpus: **min 509 / median 1,312 / max 3,737 words**, 0 duplicate meta
descriptions, 0 identical article bodies.

---

## Layout

```
php-clone/
├── index.php                  front controller: routing, 301 aliases, 404, sitemap, robots
├── router.php                 entry point for `php -S`
├── config.php                 site config + library loading
├── .htaccess                  Apache rewrite
├── lib/
│   ├── Expr.php               AST expression parser, function + statistics tables
│   ├── Solver.php             fixed-point equation propagation
│   ├── Units.php              unit-switcher registry (base ⇄ display)
│   ├── Shape.php              compact shard record → engine structure
│   ├── Data.php               manifest/offset reader, categories, search, related
│   ├── Widget.php             calculator → view model
│   ├── View.php               template rendering, HTML sanitiser, URL helpers
│   ├── Seo.php                meta tags, JSON-LD, sitemap, robots
│   ├── Icons.php              per-calculator glyph + accent hue
│   ├── Format.php             number parsing/formatting (omni vs standard rounding)
│   └── Conditions.php         condition expressions for text variants
├── templates/                 layout, home, category, calculator, search, 404, partials
├── assets/{css,js,img}        app.css, calc.js (client solver), figures
├── data/
│   ├── calc/batch-*.ndjson    definitions, 100 per shard
│   ├── calc/manifest.json     byte-offset map (page render reads one line)
│   ├── calc/units.json        unit switchers, deduped by switcher id
│   ├── calc/support.json      per-calculator evaluability
│   ├── calc/redirects.json    33 sitemap aliases → canonical path
│   ├── content/<cat>/<slug>.json  generated article prose, sections, FAQ
│   └── categories.json        category metadata
├── docs/                      reference payloads, screenshots, audit output
└── tests/solver.php           60 assertions
```

`tools/` (repo root) holds the pipeline: `harvest_all.py` → `build_manifest.py` →
`generate_content.py` → `audit_expr.php`, plus the four test suites.

---

## How it works

**1. Harvest.** `tools/harvest_all.py` fetches each page's `__NEXT_DATA__`, keeps only
the functional model (variables, equations with one variant per unknown, datasets,
field layout, unit switchers, metadata) and drops article HTML — prose is generated
instead of copied. 3,831 records in 39 shards of 100, ~30 MB, resumable.

**2. Dedupe.** Unit switchers are stored once per switcher id and merged across
pages (a page may serve a trimmed list; the union is what the widget offers). This
cut records from 28 KB to ~5 KB.

**3. Adapt.** `lib/Shape.php` rebuilds the verbose engine structure from the compact
record, synthesises datasets for inline drop-downs, maps prefilled defaults and
converts them from display units to base units.

**4. Solve.** `lib/Solver.php` runs a fixed-point propagation over the equation
variants: any direction whose inputs are all known fires. `lib/Expr.php` parses the
formula strings into an AST (`? :`, comparisons, `%`, 70+ functions) so the untaken
branch of a conditional can never divide by zero.

**5. Render.** Server-side render + `assets/js/calc.js`, which mirrors the parser and
function table exactly. State lives in the URL (`?p=25&d=400`), so every result is
deep-linkable and testable.

**6. Copy.** `tools/generate_content.py` writes original prose per calculator from
its own model — variable labels, units, equations, field types — with deterministic
wording variation. No sentence is taken from the reference site; listings and meta
descriptions use the generated copy too.

**7. Icons.** `lib/Icons.php` maps each calculator to one of ~150 inline SVG glyphs
via keyword rules ordered specificity-first, plus an accent hue derived from its
path, so every card, list row and page header gets its own icon.

---

## Notes and known limits

- **Rounding conventions.** Definitions carry two: `omni` (precision is a step,
  `0.0001`) and `standard` (precision is a decimal count, `2`). Both are honoured;
  they differ in ~7,500 variables, so guessing one for both would change most answers.
- **`erf` is the normal CDF.** The formulas use `2*erf(z) - 1` as "confidence level
  for z", which only holds under that reading. Verified against the confidence
  interval, z-test and margin-of-error calculators.
- **Compound units** (`mix(ft, inch)`) cannot be driven by one input + chip, so they
  are filtered from the switcher; the remaining units stay usable.
- **Date/number parsing** accepts spaces, thin spaces, commas and unicode minus.
- 67 sitemap URLs no longer serve a calculator upstream: 33 are 301 aliases (served
  as 301 here too) and 34 were removed (404 here too).
- The `none`-support calculators are described above; they are the main known gap.
- **The admin panel needs MySQL.** Hostinger's MySQL is the only database it speaks
  (PDO, prepared statements, InnoDB, utf8mb4). With no database the public site is
  unaffected — it falls back to the harvested catalogue and the bundled pages.
- **Mail on shared hosting** is usually blackholed through `mail()`. Configure SMTP in
  Settings → Email and use "Send test email"; the `log` transport (used by the tests)
  writes to `data/cache/mail-*.log`.
- **Backups live inside the site** (`data/backups/`). Download them off the host
  periodically — a file-level restore will not save you from a lost account.
- **The source-file editor edits production.** It refuses PHP syntax errors and keeps
  a version per save, but there is no staging copy; use it for small fixes.
- **Page views are counted by this install only** (one MySQL row per path per day).
  Nothing is estimated, so the dashboard is empty until visitors arrive, and a
  third-party analytics provider is optional and off by default.

A single consolidated snapshot of all of the above — suite by suite, with what each
flag means — is kept in **`docs/QA-REPORT.md`**. The panel has its own documents:
**`docs/ADMIN-PANEL.md`** (screens, roles, security model, what is tested),
**`HOSTINGER-GUIDE.md`** (upload → database → installer → cron → hardening) and
**`docs/BACKUP-RESTORE.md`** (dump, restore, disaster recovery).
