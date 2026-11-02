# Admin panel

A complete PHP + MySQL control panel for the catalogue: every calculator, page,
menu, homepage block, blog post, inbox message, media file, setting and source
file can be managed from the browser. No file editing, no SQL, no rebuilds.

```
/admin/index.php          the panel (query-string router — works on any host)
/admin/install.php        first-run installer: writes config, migrates, seeds
/config.db.php            database credentials + application key (never committed)
/cron.php                 nightly maintenance (CLI or token-guarded HTTP)
```

## How it relates to the site

The panel is an **override layer, never a replacement**:

| Layer | Source of truth | Edited by |
| --- | --- | --- |
| Formulas, units, field definitions | `data/calc/*.ndjson` (harvested) | never — the panel does not touch them |
| Article text, FAQs, related picks, SEO, status, slug | MySQL `calculators` (a row exists only once someone changes something) | Calculators → edit |
| Pages, posts, menus, sections, settings, media | MySQL | their own screens |
| Templates, PHP source | the files on disk | Source files → editor (with versioning) |

With the database unreachable the public site still serves every calculator from
the harvested data and the bundled pages in `data/pages/*.json`; only `/admin`
refuses. This is deliberate: a shared host with a broken MySQL socket should
degrade the panel, not the 3,831 pages that earn the traffic.

## Screens

| Screen | What you can do |
| --- | --- |
| **Dashboard** | live counts, real page views (own counter, one MySQL row per path per day), most-viewed pages, recent messages/activity/posts, missing-file warnings |
| **Calculators** | search/filter/sort 3,831 calculators, publish/unpublish in bulk, edit article text, add/remove/reorder sections, FAQs, related picks, SEO fields, icon, thumbnail, status |
| **Custom calculators** | build a calculator the catalogue never had — fields, units, formulas, article, FAQ, SEO — and publish it as an ordinary page, with a one-click draft of the article written from the definition |
| **Bulk import** | create a whole niche from one JSON or CSV document, with a dry run that writes nothing and says what each row would do |
| **Modules** | extra UI and logic for individual calculator pages (charts, sliders, benchmark strips) — install, inspect, switch off |
| **Tool plugins** | upload one PHP file per calculator widget, bind it to a page by shortcode, download, rescan the folder, delete (refused while a page still uses it) |
| **Categories** | rename, re-describe, re-icon, reorder, hide a category (its calculators follow) |
| **Source files** | browse and edit the site's PHP/CSS/JS with a syntax check before save, full version history, one-click restore, delete refused while a file is in use |
| **Homepage** | add/remove/reorder/enable sections (hero, category grid, popular, latest, blog, search, rich text, CTA, stats) |
| **Header & menu** | header links, drop-downs, CTA button, mobile menu order |
| **Footer** | footer columns and their links, contact block, social links, newsletter note, copyright |
| **Pages** | create/edit/delete any `/slug` page (About, Privacy, Terms, FAQ…), header/footer visibility, status, SEO |
| **Blog** | posts with draft → scheduled → published → archived, tags, cover image, author, SEO and social fields |
| **Tags** | rename, describe, delete (cascades the joins, never the posts) |
| **Media** | upload (type + size validated against real file contents), alt text, caption, picker for every image field, usage report before delete |
| **Contact form** | the fields the form shows, labels, required flags, order, success message, privacy note |
| **Inbox** | messages, read/unread/spam/resolved, internal notes, CSV export, resend |
| **SEO** | titles/descriptions defaults, indexing switch (writes `robots.txt` + `noindex`), redirects with hit counts, sitemap toggles, social defaults |
| **Appearance** | brand colours, fonts, radius, container width, button style, dark mode, live preview values |
| **Settings** | identity, layout, email (SMTP with encrypted password), analytics/ads config, contact, system + cron token |
| **Users** | create/edit/deactivate/delete accounts, three roles, last-administrator guard |
| **Backups** | one-click database dump, file archive, download, restore, retention |
| **Activity log** | who did what, from which IP, with what summary — every write action |
| **Your account** | own name/email/password, password rules enforced server-side |

## Roles

| Role | Can |
| --- | --- |
| `administrator` | everything, including settings, users, source files, backups |
| `editor` | content: calculators, pages, blog, media, menus, homepage, SEO, inbox |
| `author` | dashboard, own posts, media, own account |

The role check runs on the server for every request, not in the nav markup: an
author who types `/admin/index.php?p=users` gets the "no permission" screen, not
a hidden form.

## Security model

* **CSRF** — every state-changing form carries a per-session token, checked with
  `hash_equals`; a POST without it is answered `419` and nothing is written.
* **SQL** — PDO prepared statements throughout; identifiers come from a whitelist
  (`Db::ident()`), never from request data.
* **Output** — every value is escaped at render (`e()`); rich text is stored as
  authored HTML and sanitised on save (tags/attributes whitelisted).
* **Sessions** — `HttpOnly`, `SameSite=Lax`, `Secure` on HTTPS, strict mode, id
  rotated on login, 2 h idle / 12 h absolute timeout, tied to the user agent.
* **Passwords** — `password_hash()` (bcrypt/argon via `PASSWORD_DEFAULT`), rehash
  on login when the cost changes, minimum length + blocklist check.
* **Login throttling** — 5 failures per IP+email per 15 minutes, then a cooldown;
  the counters live in MySQL so they survive a session reset.
* **Uploads** — extension ↔ real MIME match (`finfo`), 8 MB cap, random stored
  name, no execution (`uploads/.htaccess` turns the PHP engine off and denies
  script extensions), `..` refused.
* **Source editor** — path whitelist (site roots only), `php -l` before writing,
  version row per save, `.env`/`config.db.php` not editable.
* **Secrets** — SMTP password and API keys are stored encrypted (AES-256-GCM with
  the app key) and never rendered back into a form.
* **Direct access** — `admin/lib`, `admin/views`, `admin/controllers`,
  `admin/migrations` answer 403 both from `.htaccess` and from a PHP guard inside
  each file, so the result is the same on a host that ignores `.htaccess`.
* **Confirmation** — destructive actions require `data-confirm` acknowledgement and
  are POST-only (a link can never delete a row; logout is POST too).

## Calculators the catalogue does not have

The 3,831 harvested calculators live in `data/calc/*.ndjson`; the panel layer on
top of them only ever *overrides* text, it never writes a definition. That is
deliberate — but it would also make the site unable to grow beyond the harvest.
So there is a second path: **Custom calculators**.

A custom calculator is created, calculated and published entirely from the panel.
It is stored in MySQL (`custom_calculators`, migration 002) and compiled on save
into *exactly* the definition shape the harvester produces
(`groups` / `vars` / `datasets` / `eq` / `js`). Because the compiled definition is
the same, nothing downstream needed a special case: routing, the field renderer,
the server solver, the browser solver, `search-index.json`, the sitemap, category
counts, related calculators and signed previews all treat a custom calculator as
an ordinary one.

The editor is three questions:

| Tab | What you fill in |
| --- | --- |
| **Basics** | name, category (pick an existing one or type a new slug — the category row is created for you), slug, H1, intro, icon |
| **Fields** | one row per input or answer: label, key (the variable name used in formulas), type (number / number with unit switcher / drop-down / checkbox), default, prefix, suffix, unit group, help text, and whether it is an answer |
| **Formulas** | one row per *direction*: “work out **this** field from **this** expression”. Rows sharing a *formula family* are the same equation rearranged, which is how a visitor can fill in any one box and get the rest — the same mechanism `/finance/mortgage` uses in the harvested catalogue |
| **Article** | sections (each becomes an H2 and a table-of-contents entry) and FAQ pairs (which become FAQ structured data) |
| **SEO** | title, description, noindex |
| **Advanced** | an optional page script, only for the rare calculation a formula cannot express |

**Nothing unvalidated is ever stored.** On save, `lib/CustomCalc.php`:

1. slugifies the slug, rejects one that collides with the catalogue, a page or a
   system route (`/admin`, `/blog`, `/search`…);
2. checks field keys are unique and types are known;
3. parses every expression with the real `Expr` parser, rejects one that names a
   field that does not exist, and **evaluates** it (a formula that tokenises but
   cannot run — `first++*` — is refused);
4. compiles the definition and solves it once with sample values;
5. only then writes the row, and keeps a snapshot in `custom_calculator_versions`
   so the previous state is one click away.

The **Test the formulas** button runs the same validator and the real solver on
the values currently in the form, shows each calculated answer, and warns when a
reverse direction is not the exact inverse of the forward one — without saving.

Renaming a custom calculator creates a 301 from the old address (the same helper
the catalogue editor uses), deleting it removes the page, its history and its
sitemap entry, and a **duplicate** action copies one as a new draft.

### Writing the article — Draft the article

A calculator with fields and formulas but no prose is a thin page: it answers a
question and gives the crawler almost nothing to read. The **Draft the article**
button in the editor's Publish card writes a first draft from the definition
itself — `lib/CustomArticle.php`, no external service, no invented facts:

* the summary and sections come from the calculator's own **field labels, units,
  suffix, help text, drop-down options and formula families**, so the words
  describe the calculation that is actually on the page;
* the worked example is the **real solver's output for the fields' default
  values** — the same numbers the page shows before a visitor types anything;
* the FAQ answers are built from the same rearranged formulas the widget solves,
  and the questions publish as FAQ structured data;
* a per-category caveat (finance, health, gaming, social media, sports, physics,
  chemistry, construction, maths, other) adds the sentence that niche needs;
* the result is deterministic — the same definition always drafts the same
  article, so pressing the button twice is not a slot machine.

It is a **starting point, not a publication**:

| What you press | What happens |
| --- | --- |
| **Draft the article** | empty parts are filled; anything already written is left exactly as it is |
| **Draft the article** + *Replace the existing article* | the intro, sections and FAQ are replaced wholesale |

Either way the text lands **in the form, not in the database** — you read it,
rewrite what does not sound like you, and press **Save changes**. The banner above
the tabs reports the word count and the honest warnings (the draft describes the
arithmetic only: what a good result looks like, and what to do with it, is yours
to write). The button refuses to run while the calculator has no fields and no
formula, because there would be nothing to describe.

### The review queue — which pages a person has actually read

Text a machine wrote is not finished work, so the panel keeps track of it.
`custom_calculators.drafted_at` (migration 003) records that the *importer* wrote
the article and nobody has read it since; `drafted_words` records how long it is.

| Where | What you see |
| --- | --- |
| Custom calculators list | a **Needs review (n)** counter and filter, a `Draft article · unread` badge, and the row's button reads **Review** instead of Edit |
| The editor | an amber banner naming the draft time and word count, above the tabs |
| The row itself | **Save changes** clears the flag — the reviewer has seen the text and taken ownership |
| `?p=custom-calculators&prose=review` | only the pages waiting to be read; an empty queue says so instead of showing a blank table |

Drafting in the *editor* never sets the flag: you are looking at the text when you
save it. Only the importer sets it, because nobody has looked at those rows.

### Upgrading a database that already exists

Adding a column is easy on a fresh install and awkward on shared hosting, where
there is no shell. The panel therefore checks `schema_migrations` on every
dashboard load: if the files are newer than the schema it shows a **Database
update available** card naming the pending files, and applies them with one
button (each file runs once, is recorded, and is safe to re-run). The code does not
depend on the upgrade having happened: `CustomCalc::tracksReview()` asks
`Db::hasColumn()` first, so a calculator edited before the upgrade still saves.

### Growing past one calculator

Two things make this scale to hundreds of new tools without code:

* **Definition as data.** Adding a calculator is an editor task, not a deploy.
  A definition-built calculator is a row, not a file, so 1,000 more of them are
  1,000 rows. (A calculator whose widget is a PHP file is the exception and is
  described in the next section; it is for the tools a field list cannot express.)
* **Bulk import** (Calculators → Custom calculators → Bulk import). One JSON or
  CSV document becomes many calculators:

  ```
  POST /admin/index.php?p=custom-import
    do=preview | import
    mode=skip | update
    document=<JSON array | CSV with a header row>   (or document_file=@niche.json)
  ```

  Accepted shapes: a JSON array of editor records, a single JSON object, CSV whose
  `fields`/`directions` cells hold JSON or the compact `key:Label:type:default`
  and `target=expression::Family` syntax, and harvested-style engine records
  (`vars`/`groups`/`eq`) which are converted to editor rows automatically. The
  sample in `data/samples/custom-calculators.json` created the two demo
  calculators on this install.

  Add `draft_articles=1` to either request (in the panel: *Write an article draft
  for rows that arrive without prose*) and every row that arrives with no intro or
  no FAQ is given the same draft the editor button produces **before** it is saved,
  so a bulk niche never lands as thin pages. The dry run warns which rows are short
  and would be drafted. Leave it unticked and the import writes exactly what the
  document says.

  The **dry run** is the same validation with the write removed: it lists every row
  as *create / update / leave alone / duplicate*, shows what each row's defaults
  actually calculate with the real solver, and quotes each refusal. The import then
  writes every row that validates and reports the rest — one bad row never blocks
  the file. Re-running in *skip* mode is idempotent; *update* mode overwrites and
  keeps the previous state in the version history.

## Calculator widgets from a PHP file

Everything above describes a calculator whose maths is a definition in the
database. There is a third path, for the tools a definition cannot express:
**one PHP file per tool**, uploaded from the panel, bound to a page, rendered by
its shortcode exactly where the widget sits on every other calculator page.

### What a tool file is

A single file with a header block and one shortcode:

```php
<?php
/**
 * Tool Name: Percentage of a Number
 * Shortcode: tool_percentage_of
 * Category: math
 * Version: 1.0.0
 * Description: What one number is as a percentage of another.
 * Language: en
 */

if (!defined('ONIM_TOOLKIT')) { http_response_code(403); exit; }

Toolkit::addShortcode('tool_percentage_of', static function (array $atts, ?string $inner, array $ctx): string {
    /* build the widget, return its HTML */
});
```

The header is what the panel reads: it names the tool, its shortcode, the
category it belongs in and its version. The callback is the whole widget — form,
working, answer. Three rules make them safe to stack:

* the answer is printed on the server, so a crawler and a visitor with
  JavaScript off see the same number;
* every element id is built from `$ctx['uid']`, so the same tool twice on one
  page does not collide;
* styles and script are inline and scoped to that uid — no CDN, no build step,
  nothing to enqueue.

`plugins/README.md` is the full author's guide; `plugins/math/qm-tool-percentage-of.php`
is the worked example, and `plugins/PROMPT-TEMPLATE.md` is the brief to hand to
whoever writes the next one.

### Uploading one

**Tool plugins** (`?p=tool-plugins`) lists every file in `plugins/`, grouped by
folder, with its shortcode, version, size and the page it is bound to.

| Action | What happens |
| --- | --- |
| **Upload** | Pick a `.php` file and a category. The file is refused if it is not PHP, is larger than 2 MB, does not parse, has no header block, or claims a shortcode another file already owns. A valid file is stored as `plugins/<category>/qm-tool-<shortcode>.php`, replacing the previous version only if *overwrite* is ticked — and the version it replaces is copied to `data/backups/tools/` first |
| **Create page** | Makes a draft calculator page for the tool: slug from the shortcode, category from the file, widget source `tool`. You then write the article and publish as usual |
| **Download** | Fetches the file back out of the panel |
| **Rescan** | Re-reads the folder after a file was added by FTP or a deploy |
| **Delete** | Removes the file. If a page still uses the shortcode the delete is refused unless *delete anyway* is ticked, because that page would then render the "could not run" box |

Files under `plugins/` are never served over HTTP: `.htaccess` and `router.php`
both refuse the path, and every tool file starts by refusing to run unless the
toolkit booted it. A stray PHP file dropped in the folder without a header is
listed as **invalid** and never executed.

### Binding it to a page

A calculator has a `kind`: `builder` (the definition editor described above) or
`tool` (a PHP file). Choosing **Tool file** in the editor changes what the panel
shows:

* **Basics** gains a card naming the file and its version; the slug defaults to
  the shortcode;
* **Fields** and **Formulas** disappear — the maths is in the file;
* the optional page script disappears, and so does the *replace the article*
  option;
* **Advanced** gains **Widget source**, where the shortcode is chosen;
* there is no **Save draft**: a tool page is published, or it is not.

Below the widget nothing changes. The article, the table of contents, the FAQ,
the share row, related calculators, the sitemap, the category pages and search
all work exactly as they do for a definition-built calculator — the template
renders `Toolkit::render($tool['shortcode'], ['calc' => $calc])` into the same
slot, and the rest of the page never learns which kind it is.

A page whose shortcode is missing, invalid or removed renders a short box saying
the tool could not run, with the page still intact — a broken file costs one
widget, not one page.

### Translating the widgets

Every visitor-visible string in a tool goes through `Toolkit::t('Bill', 'Bill')`,
and the map that answers is `plugins/i18n/<locale>.php`. Set **Settings →
General → Locale** to `de_DE` and the tools speak German; the article around
them is translated by the CMS. A missing row falls back to the English default,
never to an empty box, and a tool written without `t()` is simply English-only.

`plugins/i18n/de.php` ships as the worked example, and `tests/toolkit.php`
fails if a tool prints a string the German map does not carry.

## Modules — extra UI for one page

The other 3,831 pages are rendered by one template from a definition, which is
what keeps them maintainable. A few tools need something a field list cannot
express: a benchmark strip, a chart, a slider, a live table. A **module** adds it
without forking the template.

```
modules/aim-benchmarks/
  module.json            ← which pages, which slot, which partial
  partials/benchmarks.php ← ordinary PHP + HTML, rendered inside the page
```

`module.json`:

```json
{
  "name": "Aim benchmarks",
  "paths": ["/gaming/valorant-headshot-percentage"],
  "categories": [],
  "slots": { "widget_bottom": "partials/benchmarks.php" },
  "enabled": true,
  "priority": 10
}
```

Slots, in page order: `widget_top`, `widget_bottom` (inside the calculator card),
`article_head`, `article_foot` (inside the article) and `page_foot` (end of page).
The partial is included by `templates/calculator.php`, so it sees exactly what the
template sees — `$calc`, `$inputs`, `$solver`, `$groups` — and uses the site's own
helpers. It runs on the server: no client sandbox, no `eval`.

Rules the loader enforces, so a module cannot reach outside itself or break a page:

* the folder name is sanitised; the manifest must be valid JSON;
* `paths` must look like `/category/slug`; unknown slots are ignored with a warning;
* a partial must be a `.php` file **inside** the module folder (`..` is refused) — a
  manifest pointing at `../../index.php` is reported as broken and the module never
  renders;
* a module with no partials, or with no `paths`/`categories`, is broken by
  definition and listed as such;
* broken modules never render, whatever their switch says.

**Modules** in the panel lists every folder with its version, the pages it affects,
the slots it fills and its state, and switches it off or on (stored as one
`modules_off` setting). Partials are edited from **Source files** — `modules/` is an
editable root, so they get the same syntax check and version history as any other
file. The panel never uploads code: a module is a deploy-time artefact, like a
template.

## Preview links for unpublished content

A draft calculator or post has no public URL. Instead the panel hands out a
**signed preview URL**:

```
/math/percentage?preview=<32 hex chars>
```

The token is an HMAC of the record's path keyed with the application key: it
cannot be guessed, it needs no database write, it is revoked by rotating the key,
and every preview page is sent with `noindex` plus a banner explaining that the
page is not published. Without a valid token the URL is a plain 404.

## Maintenance cron

```
0 3 * * *  /usr/bin/php /path/to/public_html/cron.php
```

Or, if PHP cannot be run from cron on your plan:

```
https://example.com/cron.php?token=<token from Settings → System>
```

`cron.php` prunes expired rate limits and reset tokens, trims `page_views` and
`activity_log` to their retention windows, writes the nightly database dump,
prunes old backups and clears the page cache. It is idempotent, prints a count per
job, accepts `--dry-run`, and refuses HTTP calls without the token (403).

## What has actually been tested

Four suites. The two HTTP ones run against a live server and a real MySQL
database; all of them clean up after themselves.

```bash
python3 tools/admin_e2e.py                          # UI, security, cron (browser)
bash /home/user/tools/php.sh tests/e2e_panel.php    # 398 checks — every screen, every write
bash /home/user/tools/php.sh tests/solver.php       #  70 checks — the expression parser and solver
bash /home/user/tools/php.sh tests/toolkit.php      #  40 checks — tool files, shortcodes, translations
```

They cover: login/rejection/throttling, CSRF rejection, settings save → public
effect, encrypted secrets round-trip, appearance → CSS, calculator overrides
(prose, FAQ, related, SEO, unpublish → 404, slug change → 301), preview tokens
(valid, doctored, unsigned), homepage add/toggle/reorder/delete, header and footer
links, pages (create, duplicate-slug refusal, unpublish, delete, sitemap), blog
(draft → publish → tag archive → delete), media upload/serving/deletion/PHP
refusal, contact form → inbox → note → CSV → spam → delete, contact spam controls
(honeypot, sub-3-second submission, flood), SEO redirects and the indexing switch,
users + roles + last-admin guard + RBAC denial for authors, source editor
(save, version, syntax refusal, traversal refusal, restore), backups
(dump, download, foreign-restore refusal, delete), activity log, cron (CLI, HTTP
token, rotation, stale token), session hardening, logout, and the no-database
fallback, and the custom-calculator path from end to end: create → draft invisible
→ signed preview → both solving directions → refused syntax error → refused unknown
variable → refused catalogue collision → publish → live page, sitemap, search,
category listing → test button → version restore → rename with 301 → delete; the
bulk importer (dry run writes nothing, only valid rows are written, skip is
idempotent, update keeps history, CSV with the compact syntax, invalid JSON
reported, a field named after a built-in function explained) and modules (renders in
its slot, other pages untouched, switch off/on, a partial outside the folder
refused, a broken module never renders, partials open in the source editor), and the PHP tool files: the panel lists them,
refuses a file that is not PHP, has no header or does not parse, stores a valid
one, refuses a shortcode another file already owns, creates a draft page for it,
publishes it and renders the widget on the public page with the article, share row
and sitemap intact and the builder's client solver absent, refuses to delete a file
a page still uses, and answers 404 for `/plugins/…`; plus 40 unit checks on the
registry, the shortcode engine, the path guard and the translation fallbacks.

## Known limitations

* **Tailwind** is loaded from a CDN, as specified; the hand-written CSS in
  `assets/css/app.css` carries the layout so the site is not dependent on it. In a
  sandboxed preview iframe with no network the page still looks correct.
* **Mail** needs a real transport. `mail()` on a fresh shared host is often
  blackholed; set SMTP in Settings → Email and use "Send test email". The `log`
  transport writes to `data/cache/mail-*.log`, which is what the tests use.
* **Backups** are written inside the site (`data/backups/`) and are therefore part
  of any file-level backup you take. Download them off-site periodically.
* **The source editor** edits the running site. It refuses syntax errors and keeps
  a version per save, but there is no staging environment; use it for small fixes,
  not for feature work.
* **Page views** are counted by this install only. Nothing is estimated or
  back-filled, so the dashboard is empty on a fresh deploy until visitors arrive.
* **Analytics/ads** are configuration screens: they emit the snippet you configure
  and never invent numbers. No provider is enabled by default.
* **The 49 explanation-only calculators** have no result to compute — that is a
  property of the source data, not of the panel.
* **Custom calculators** are edited as formulas, not as arbitrary widgets. A
  calculator whose interface is not "a list of number fields" (a chart, a
  drag-the-slider visualisation) needs the optional page-script box or a template
  override — the panel deliberately does not try to be a general UI builder.
* **Bulk import** covers creation and updates of custom calculators; it does not
  import articles from a CMS export, and it does not migrate the harvested
  catalogue into the database (there is no reason to — the NDJSON shards are the
  cheaper source).
* **Modules** are installed by deploying files, not by uploading them from the
  panel. The panel inspects, switches and edits them; it deliberately cannot create
  executable code on the server.
