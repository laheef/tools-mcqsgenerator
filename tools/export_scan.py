#!/usr/bin/env python3
"""export_scan.py — a page script that writes into a variable the page does not have.

`omni.onResult(...)` publishes a result with `ctx.exportValue("name", value)`.
If `name` is not in the definition's `vars`, the value is computed and then
dropped: there is no box to show it in, no sentence that can interpolate it, and
Calculate ends in silence. The full sweep found seventeen pages in that state;
this finds them without a browser, in a couple of minutes.

    python3 tools/export_scan.py            # every calculator
    python3 tools/export_scan.py --json     # write docs/export-mismatch.json
"""
from __future__ import annotations

import argparse
import json
import re
import urllib.request
from concurrent.futures import ThreadPoolExecutor

BASE = 'http://127.0.0.1:8080'
EXPORT = re.compile(r'exportValue\(\s*["\']([A-Za-z_$][\w$]*)["\']')
TEXT_USE = re.compile(r'\{\{([A-Za-z_$][\w$]*)\}\}')


def pages() -> list[str]:
    with urllib.request.urlopen(BASE + '/search-index.json', timeout=120) as r:
        return sorted({e['u'] for e in json.loads(r.read().decode())})


def fetch(path: str) -> str:
    with urllib.request.urlopen(BASE + path, timeout=60) as r:
        return r.read().decode('utf-8', 'replace')


def check(path: str) -> dict | None:
    try:
        html = fetch(path)
    except Exception as exc:                                        # noqa: BLE001
        return {'path': path, 'error': str(exc)[:80]}
    i = html.find('{"vars"')
    if i < 0:
        return None
    try:
        blob, _ = json.JSONDecoder().raw_decode(html[i:])
    except Exception:                                               # noqa: BLE001
        return {'path': path, 'error': 'payload did not parse'}
    js = blob.get('js') or ''
    if 'exportValue' not in js:
        return None
    have = set(blob.get('vars') or {})
    exported = [n for n in dict.fromkeys(EXPORT.findall(js))]
    missing = [n for n in exported if n not in have]
    if not missing:
        return None
    # does any sentence on the page mention the missing name?
    used = set(TEXT_USE.findall(json.dumps(blob.get('texts') or [])))
    fields = set(blob.get('fields') or {})
    return {
        'path': path,
        'missing': missing,
        'exported': exported,
        'in_fields': [n for n in missing if n in fields],
        'in_texts': [n for n in missing if n in used],
    }


def main() -> None:
    ap = argparse.ArgumentParser()
    ap.add_argument('--json', action='store_true')
    args = ap.parse_args()
    paths = pages()
    with ThreadPoolExecutor(8) as pool:
        recs = [r for r in pool.map(check, paths) if r]
    bad = [r for r in recs if r.get('missing')]
    print(f'pages checked : {len(paths)}')
    print(f'pages whose script exports an undeclared variable : {len(bad)}')
    for r in bad:
        print('  ' + r['path'])
        print(f'      missing {r["missing"]}  in_texts {r["in_texts"]}  in_fields {r["in_fields"]}')
    if args.json:
        with open('docs/export-mismatch.json', 'w') as fh:
            json.dump(bad, fh, indent=1)
        print('  -> docs/export-mismatch.json')


if __name__ == '__main__':
    main()
