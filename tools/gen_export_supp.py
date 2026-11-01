#!/usr/bin/env python3
"""gen_export_supp.py — declare the result rows a page's script already exports.

    python3 tools/gen_export_supp.py --dry /a /b
    python3 tools/gen_export_supp.py --all           # every page in docs/export-mismatch.json

The scan in docs/export-mismatch.json lists, per page, the names the page
script publishes through ctx.exportValue() that the definition does not
declare. Most of those pages compute the answer correctly and then drop it.
A supplement with an `outputs` list gives every one of them a row; no
arithmetic is written here, and no existing supplement is touched.
"""
from __future__ import annotations

import json
import os
import re
import sys

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
SUPP = os.path.join(ROOT, 'php-clone', 'data', 'calc', 'supplement')

ACRONYM = {
    'rgb': 'RGB', 'rgba': 'RGBA', 'hsl': 'HSL', 'hex': 'hex', 'irr': 'IRR',
    'hhi': 'HHI', 'dcf': 'DCF', 'ma': 'MA', 'kw': 'kW', 'kwh': 'kWh',
    'w': 'W', 'kwp': 'kWp', 'm2': 'm²', 'm3': 'm³', 'ft2': 'ft²',
    'ft3': 'ft³', 'cm2': 'cm²', 'mm2': 'mm²', 'kva': 'kVA', 'va': 'VA',
    'ac': 'AC', 'dc': 'DC', 'ppf': 'PPF', 'emi': 'EMI', 'apr': 'APR',
    'apy': 'APY', 'hh': 'HH', 'nf': 'NF', 'eu': 'EU', 'us': 'US', 'uk': 'UK',
    'dna': 'DNA', 'mrna': 'mRNA', 'rna': 'RNA', 'nato': 'NATO', 'ttl': 'TTL',
    'gmol': 'g/mol', 'mol': 'mol', 'n': 'n', 'r': 'r', 'p': 'p', 'pct': '%',
    'p1': 'p1', 'kg': 'kg', 'g': 'g', 'mm': 'mm', 'cm': 'cm', 'km': 'km',
    'lb': 'lb', 'lbs': 'lb', 'oz': 'oz', 'ml': 'ml', 'l': 'l', 'ft': 'ft',
    'in': 'in', 'yd': 'yd', 'mi': 'mi', 'hr': 'hr', 'hrs': 'hrs',
}

WORDS = {
    'out': '', 'result': '', 'output': '', 'res': '',
}

# labels that a plain humanisation gets wrong
OVERRIDE = {
    'uppercase_text': 'Uppercase text',
    'lowercase_text': 'Lowercase text',
    'finalEquation': 'Balanced equation',
    'chemicalFormulaPretty': 'Chemical formula',
    'encoded_out': 'Encoded text',
    'decoded_out': 'Decoded text',
    'result_Hex': 'Hex colour',
    'result_rgb_R': 'Red',
    'result_rgb_G': 'Green',
    'result_rgb_B': 'Blue',
    'result_color_name': 'Colour name',
    'working_days': 'Business days',
    'days_count': 'Working days',
    'encodedMessage': 'Pig Latin text',
    'outputMessage': 'Upside-down text',
}


def split_name(name: str) -> list[str]:
    name = re.sub(r'([a-z0-9])([A-Z])', r'\1 \2', name)
    return [t for t in re.split(r'[_\s]+', name) if t]


def humanise(name: str) -> str:
    if name in OVERRIDE:
        return OVERRIDE[name]
    tokens = []
    for tok in split_name(name):
        low = tok.lower()
        if low in WORDS and len(split_name(name)) > 1:
            continue
        tokens.append(ACRONYM.get(low, low))
    if not tokens:
        tokens = split_name(name)
    text = ' '.join(tokens)
    return text[:1].upper() + text[1:]


def php_str(text: str) -> str:
    return "'" + text.replace('\\', '\\\\').replace("'", "\\'") + "'"


def supplement_source(path: str, missing: list[str]) -> str:
    names = '[\n    ' + ',\n    '.join(php_str(n) for n in missing) + '\n  ]'
    body = [
        '<?php',
        '/**',
        f' * {path} — the rows its script already publishes.',
        ' *',
        ' * The scan in docs/export-mismatch.json found the page script calling',
        ' * ctx.exportValue() for these names and the definition declaring none of',
        ' * them: the answer was computed correctly and then dropped, so the panel',
        ' * stayed empty. This supplement declares the rows and tidies the text the',
        " * page publishes — the arithmetic is the page's own.",
        ' */',
        "require_once __DIR__ . '/_builder.php';",
        '',
        'return [',
        "    'hideTexts' => true,",
        "    'outputs' => [",
    ]
    for name in missing:
        body.append(f'        {php_str(name)} => {php_str(humanise(name))},')
    body.extend([
        '    ],',
        "    'js' => <<<'JS'",
        '/* The page hook has already run by the time this one does, so the values',
        '   below are its results: tidy the reference site\'s markup out of them',
        '   before they reach the panel. */',
        'omni.onResult([], function (ctx, values) {',
        '  var rows = ' + names + ';',
        '  rows.forEach(function (name) {',
        "    var v = values[name];",
        "    if (typeof v !== 'string' || v.trim() === '') { return; }",
        "    var text = sclean(sdelabel(v));",
        "    ctx.exportValue(name, text === '' ? null : text);",
        '  });',
        '});',
        'JS,',
        '];',
        '',
    ])
    return '\n'.join(body)


def main() -> int:
    args = sys.argv[1:]
    dry = '--dry' in args
    every = '--all' in args
    paths = [a for a in args if not a.startswith('--')]
    data = json.load(open(os.path.join(ROOT, 'docs', 'export-mismatch.json')))
    if not every and not paths:
        print('nothing to do: pass paths or --all')
        return 1
    made, skipped = 0, 0
    for entry in data:
        if not every and entry['path'] not in paths:
            continue
        if not entry['missing']:
            continue
        key = entry['path'].strip('/').replace('/', '-')
        target = os.path.join(SUPP, key + '.php')
        if os.path.exists(target):
            skipped += 1
            continue
        src = supplement_source(entry['path'], entry['missing'])
        if dry:
            print('---', target)
            print(src)
        else:
            with open(target, 'w') as fh:
                fh.write(src)
            made += 1
    print(f'written {made}, kept existing {skipped}')
    return 0


if __name__ == '__main__':
    raise SystemExit(main())
