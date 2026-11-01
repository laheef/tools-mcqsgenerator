#!/usr/bin/env python3
"""gen_text_inputs.py — retype the boxes that want text, and declare the rows.

A large family of harvested pages takes its data as *text*: a list of numbers
typed as "1, 2, 3", a DNA strand, a chemical equation, a fraction. The harvest
typed every one of them `numerical`, so the box refuses anything with a comma, a
letter or a slash — and the page's own script, which splits the string on
commas, can then never run.

For every page still recorded as non-ok by the sweep, this looks at the page's
own script: a `numerical` variable that the script reads with `getRawInput` and
then treats as a string (split, includes, toUpperCase, replace, charAt) is a
text box, whatever the harvest said. The supplement retypes it and declares the
rows the script publishes.

    python3 tools/gen_text_inputs.py --dry /statistics/median
    python3 tools/gen_text_inputs.py            # every non-ok page

Nothing is written for a page that already has a supplement.
"""
from __future__ import annotations

import json
import os
import re
import sys
import urllib.request

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
SUPP = os.path.join(ROOT, 'php-clone', 'data', 'calc', 'supplement')
SWEEP = os.path.join(ROOT, 'docs', 'silent-sweep.jsonl')
BASE = 'http://127.0.0.1:8080'

STRINGY = ('split(', '.includes(', 'toUpperCase(', '.replace(', 'charAt(', '.trim(', 'parseInt(')


def definition(path: str) -> dict:
    html = urllib.request.urlopen(BASE + path, timeout=120).read().decode()
    i = html.find('{"vars"')
    if i < 0:
        return {}
    return json.JSONDecoder().raw_decode(html[i:])[0]


def stringy_vars(defn: dict) -> list[str]:
    js = defn.get('js') or ''
    if not js:
        return []
    out = []
    for name, v in (defn.get('vars') or {}).items():
        if v.get('type') != 'numerical':
            continue
        needle = 'getRawInput("%s")' % name
        idx = js.find(needle)
        if idx < 0:
            continue
        window = js[max(0, idx - 300): idx + 500]
        if any(mark in window for mark in STRINGY):
            out.append(name)
    return out


def exports_of(defn: dict) -> list[str]:
    js = defn.get('js') or ''
    return sorted(set(re.findall(r'exportValue\(\s*["\']([A-Za-z0-9_]+)["\']', js)))


def main() -> int:
    dry = '--dry' in sys.argv
    paths = [a for a in sys.argv[1:] if not a.startswith('--')]
    if not paths:
        recs = [json.loads(l) for l in open(SWEEP)]
        paths = [r['path'] for r in recs if r['bucket'] != 'ok']
    import importlib.util
    spec = importlib.util.spec_from_file_location('ges', os.path.join(ROOT, 'tools', 'gen_export_supp.py'))
    ges = importlib.util.module_from_spec(spec)
    spec.loader.exec_module(ges)

    made = 0
    for path in paths:
        key = path.strip('/').replace('/', '-')
        target = os.path.join(SUPP, key + '.php')
        if os.path.exists(target):
            continue
        try:
            defn = definition(path)
        except Exception as exc:                                  # noqa: BLE001
            print('skip', path, exc)
            continue
        if not defn:
            continue
        flip = stringy_vars(defn)
        exports = exports_of(defn)
        declared = set((defn.get('vars') or {}).keys())
        # a box only needs a row if the page has no field for it
        missing = [n for n in exports if n not in declared]
        if not flip and not missing:
            continue
        src = ges.supplement_source(path, missing) if missing else None
        if src is None:
            src = ('<?php\n/**\n * %s — the rows its script publishes.\n */\n'
                   "require_once __DIR__ . '/_builder.php';\n\nreturn [\n"
                   "    'hideTexts' => true,\n    'outputs' => [],\n];\n" % path)
        if flip:
            block = "    'vars' => [\n" + ''.join(
                f"        '{n}' => ['type' => 'text'],\n" for n in flip) + "    ],\n"
            src = src.replace("    'hideTexts' => true,\n", "    'hideTexts' => true,\n" + block, 1)
        if dry:
            print('---', target)
            print(src)
        else:
            with open(target, 'w') as fh:
                fh.write(src)
            made += 1
            print('wrote', key, '| text:', flip, '| rows:', missing)
    print('written', made)
    return 0


if __name__ == '__main__':
    raise SystemExit(main())
