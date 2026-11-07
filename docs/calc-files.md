# Calculator files

Every calculator can be one file. This is the format, how a file gets onto the
site, and what happens when one is wrong.

```
plugins/calc/<category>/qm-calc-<slug>.php   →  /<category>/<slug>
```

A page whose file exists is built from the file — form, formulas, article,
metadata — and nothing else. A page without one keeps using the harvested
catalogue record, so converting a category is a matter of writing its files, one
at a time, and deleting a file puts the old page back.

The same folder layout as tool files, for the same reason: a page you maintain
should be a file you can open.

---

## 1. The file

```php
<?php

/**
 * Punnett Square Calculator
 * /biology/punnett-square
 */

return [
    'name' => 'Punnett Square Calculator',

    'meta' => [
        'title'       => 'Punnett Square Calculator — Genotype Ratios',  // 43–53 chars
        'description' => '…',                                            // 150–160 chars
        'h1'          => 'Punnett Square Calculator',                    // defaults to name
        'updated'     => '2026-11-07',
    ],

    'sections' => [
        [
            'title' => 'Parents',            // optional heading on the form
            'note'  => '…',                  // optional paragraph under it
            'columns' => 2,                  // optional; default 1 = one box per row
            'fields'  => [ /* … */ ],
        ],
    ],

    'formula' => [
        'AA' => 'get_chance_a(mother, father)',
    ],

    'article' => [
        'intro'    => 'Answer-first paragraph.',
        'sections' => [['title' => 'How it works', 'html' => '<p>…</p>']],
        'faq'      => [['q' => '…', 'a' => '…']],
        'related'  => [['path' => '/biology/genetics', 'name' => 'Genetics']],
    ],
];
```

`meta.title` is the title without the brand: the layout adds ` | Onim`, and the
SEO rules count that. Titles are checked against the 50–60 window by
`tests/calc_files.php`.

## 2. Fields

| key | what it is |
|---|---|
| `name` | the variable the formula reads — `[a-zA-Z_][a-zA-Z0-9_]*` |
| `label` | what the box says |
| `type` | `number`, `result`, `select`, `note`, `image`, `text`, `date` |
| `default` | the value the box opens with (for a select: the option's label) |
| `options` | select only: `['label' => value, …]`, in display order |
| `dataset`, `control` | select only: the dataset's name and `RADIO` / `SELECT` / `DROPDOWN` / `CHECKBOX` |
| `unit`, `unit_default` | a unit switcher — `'4'` is length, `'28'` area, `'omni'` none |
| `prefix`, `suffix` | text inside the box (`'$'`, `'%'`, `'mmHg'`) |
| `help` | the grey line under the label |
| `rounding` | `['omni', '0.0001']` — how many decimals the result keeps |
| `readonly` | the box shows a number but cannot be typed into |

A `note` field is a line of text: `['type' => 'note', 'text' => 'A – dominant, a – recessive']`.
An `image` field is `['type' => 'image', 'url' => '/uploads/…svg']`.

`columns` on a section is how the matrix is laid out: `1` gives every field its
own row, `2` deals them into two columns (the first taking the extra one), `3`
into three. That is the same arithmetic the harvested matrices were built with.

## 3. Formulas

`formula` maps a **result field** to an expression over the input names:

```php
'formula' => [
    'transmittance' => 'pow(10, -absorbance)',
    'percent'       => 'pow(10, -absorbance) * 100',
],
```

Several passes are allowed when one depends on another:

```php
'formula' => [
    ['title' => 'Genotypes', 'results' => ['AA' => '…', 'Aa' => '…']],
    ['title' => 'Ratios',    'results' => ['ratio' => 'AA / Aa']],
],
```

The expressions are the site's own (`lib/Expr.php`): `+ - * / ^`, `pow`, `sqrt`,
`log`, `log10`, `exp`, `abs`, `min`, `max`, `round`, `floor`, `ceil`, and the
statistical helpers (`normalCdf`, `erf`, `tTwoTailed`, `chiSquareUpper`,
`fUpper`, `pValue`, …). A name that is not a field on the form is refused when
the file is validated, with the reason.

A page that needs a script rather than a formula can attach `'js' => '…'`, the
page script that `omni.define` / `omni.onResult` hooks into.

## 4. Anything the shorthand cannot say

A harvested page can have a date picker, a conditional note, several defaults
for the same variable, or two columns of unequal height. Those are carried
verbatim in a `raw` block, which is the catalogue record itself:

```php
'raw' => [
    'vars'     => [ /* variable definitions */ ],
    'groups'   => [ /* matrices and fields */ ],
    'eq'       => [ /* equations */ ],
    'datasets' => [ /* option lists */ ],
    'js'       => '…',
],
```

A `raw` file is exactly as editable as any other — the formulas are the same
strings — and the page cannot regress, because the record is the one the site
already rendered. `tools/export_calc_files.php` writes the shorthand wherever it
can prove the round trip is identical and `raw` where it cannot.

## 5. Getting a file onto the site

* **From the repo** — commit it; the page is live on the next request.
* **From the panel** — Tools → Calculator files → Upload. The file is parsed
  (`token_get_all`, a real parser), the definition is validated, and only then
  written. Uploading over an existing slug replaces that calculator; the
  previous body is kept in the file history, so it can be restored.

The list shows each page's title and description length, its word count and any
validation error, so a broken file is visible before anyone clicks it.

## 6. Exporting a category

```
php tools/export_calc_files.php --cat=biology            # skip files that exist
php tools/export_calc_files.php --cat=biology --force    # rewrite all
php tools/export_calc_files.php --cat=biology --only=punnett-square
```

The exporter reads the harvested record and the content JSON, converts the form
to the shorthand where the round trip is provably identical (same fields, same
order, same widths, same options, same equations, same answers for a set of
sample inputs), and otherwise writes a `raw` block. It also:

* removes boilerplate — sentences that appear on five or more pages of the
  category (`lib/ContentClean.php`);
* writes the metadata through the rules in `lib/CalcSeo.php`;
* adds a worked example computed from the page's own formulas where the page
  came out thin (`lib/CalcExample.php`).

## 7. Checks

```
php tests/calc_files.php            # every file: valid, builds, computes, is a page
php tests/calc_files.php biology    # one category
```

---

## Why files

The catalogue is a 40 MB shard of harvested records. That is the right shape for
four thousand pages nobody edits and the wrong shape for one somebody does: to
change a label you open a 40 000-line file, and to change a formula you patch it
from a second file that only exists because the first one could not be touched.

A calculator someone is expected to improve should be a file with the form at
the top, the formulas under it, and the article below them — the whole page in
one place, in the order a reader meets it.
