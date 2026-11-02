# Tool plugins

Every calculator on this site is one of two things:

| kind | widget comes from | how many |
|---|---|---|
| **formula** | `data/calc/*.ndjson` — variables + equations, drawn by the form builder and solved by `lib/Solver.php` | 4 041 |
| **tool** | one PHP file in this folder — its own markup, styles and script | as many as you add |

This folder holds the second kind. A tool is not a special case on the page: it
sits in the same card, above the same article, beside the same related grid and
under the same advertising slots. The only thing that changes hands is the
widget.

---

## 1. The layout

```
plugins/
├── math/qm-tool-percentage-of.php          → [tool_percentage_of]
├── finance/qm-tool-tip-split.php           → [tool_tip_split]
├── everyday-life/qm-tool-word-counter.php  → [tool_word_counter]
├── i18n/de.php                             ← optional translations
└── README.md
```

* **One folder per category.** The folder name is the category the tool is
  offered under in the panel. It is also the default when the file's header
  does not name one.
* **One file per tool.** The file name is a convention — `qm-tool-<slug>.php`,
  where `<slug>` matches the shortcode — but the panel derives it for you on
  upload, so you rarely type it.
* **Nothing else.** No `composer.json`, no build step, no autoloader, no
  separate CSS file. A tool that needs a library vendors it (see §6).

---

## 2. The file

```php
<?php
/**
 * Tool Name: Percentage of a Number
 * Shortcode: tool_percentage_of
 * Category: math
 * Version: 1.0.0
 * Description: What one number is as a percentage of another, with the working shown.
 * Language: en
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_percentage_of', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    ob_start(); ?>
    <div id="<?= Toolkit::e($uid) ?>"> … </div>
    <?php return (string) ob_get_clean();
});
```

### The header block

Everything between the first `/**` and the first `*/`. Each line is
`Key: value`.

| key | required | what it does |
|---|---|---|
| `Shortcode` | **yes** | the name the page binds to. No header, no tool — the file is ignored. |
| `Tool Name` | yes | how the panel lists it |
| `Category` | no | defaults to the folder name |
| `Version` | no | lets the panel warn that a page was saved against an older file |
| `Description` | no | one line, used as the draft page's summary |
| `Author`, `Language` | no | bookkeeping |

### The guard

`if (!defined('ONIM_TOOLKIT'))` is not decoration. The folder is blocked twice
— in `.htaccess` and in `router.php` — but a wrong `DocumentRoot`, an old copy
of `.htaccess` or a local `php -S` is enough to expose a folder, and a PHP file
that runs when fetched directly is a hole. The guard makes the file inert
whenever it is not being included by the toolkit.

The panel refuses any file that does not carry it.

---

## 3. The callback

```php
function (array $atts, ?string $inner, array $ctx): string
```

| argument | contents |
|---|---|
| `$atts` | the shortcode's attributes: `[tool_tip_split currency="€" max="6"]` → `['currency' => '€', 'max' => '6']`. A bare word is a flag with an empty value. |
| `$inner` | the text between `[x]…[/x]`, or `null` when there is none. Most tools ignore it. |
| `$ctx['uid']` | a unique id for this instance — use it for every `id`, `for` and CSS selector |
| `$ctx['tag']` | the shortcode name |
| `$ctx['tool']` | the parsed header block of the file |
| `$ctx['calc']` | on a calculator page, the page record: `path`, `slug`, `cat`, `name`, `title`, `description` |

Return a **string of HTML**. Anything echoed is added to it, and anything
thrown is caught: a tool that throws shows a short note in its own box and
leaves the rest of the page alone.

The same tool may appear more than once on a page. That is what `$ctx['uid']`
is for — `qmtool-1`, `qmtool-2`. Never hard-code an id.

---

## 4. House rules

1. **The answer is rendered on the server.** The script is an enhancement, not
   the feature. A crawler, a visitor with JavaScript off and a reader on a bad
   connection should all see a number, not an empty box.
2. **No CDN.** The site must work from one server, offline-capable, with no
   third-party script having access to the page. Use the platform: `<input>`,
   `<canvas>`, `Intl`, `fetch`, WebAudio.
3. **Escape everything you print.** `Toolkit::e($value)` for text and
   attributes, `htmlspecialchars` for anything you build by hand.
4. **Scope your styles and script to `$ctx['uid']`.** Inline `<style>` and
   `<script>` in the returned HTML, every selector prefixed with
   `#<uid>`. Never write a global selector — you would be styling the rest of
   the site.
5. **Label sizes honestly.** `Estimated`, not `Exact`. If a result is rounded,
   say to what.
6. **Never store what a visitor types.** It is read from the request, used and
   thrown away with it.
7. **No network calls from the tool.** If a tool needs data, it ships with the
   data.

---

## 5. Translations

Wrap every string a visitor reads:

```php
$t = static fn (string $key, string $default): string => Toolkit::t($key, $default);
echo Toolkit::e($t('Bill', 'Bill'));
```

`plugins/i18n/<locale>.php` returns a flat map:

```php
<?php
return [
    'Bill' => 'Rechnung',
    'Tip'  => 'Trinkgeld',
    …
];
```

Resolution order: the current locale (`de-DE`), then its language (`de`), then
the string you passed as the default. A missing key prints the default, never an
empty string. The article around the tool is translated by the CMS; this is only
for the tool's own labels.

---

## 6. Libraries

Vendor the file, inside the tool's own folder:

```
plugins/pdf/qm-tool-pdf-merge.php
plugins/pdf/vendor/pdf-lib.min.js
```

and print it with a path the browser can fetch. Because `plugins/` is blocked
over HTTP, **vendor files that must be fetched by the browser belong in
`assets/vendor/<tool>/`**, and the tool prints:

```php
<script src="<?= Toolkit::e(SITE_URL . '/assets/vendor/pdf/qm-tool-pdf-merge/pdf-lib.min.js') ?>"></script>
```

Only add a library when the tool genuinely cannot be written without it, and
say in the header comment what it is and where it came from.

---

## 7. Binding a file to a page

1. **Tool plugins → Upload.** Pick the file, pick the category, upload. The
   panel parses the header, checks the syntax, and lists the tool.
2. **Create page.** One click makes a *draft* calculator page: name, slug and
   category taken from the file, the shortcode bound, the article empty.
3. **Write the article.** The page is a normal calculator page — summary,
   sections, FAQ, related. Until it is written the page stays a draft.
4. **Publish.** It appears in the catalogue, the sitemap, search, the related
   grids and the category counts, exactly like a formula calculator.

Replacing the file later — new version, same shortcode — updates every page
that uses it, with no edit to any page.
