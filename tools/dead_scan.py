#!/usr/bin/env python3
"""Classify the pages that still answer nothing.

For every path in docs/no-formula-pages.txt that has no supplement yet, report
what the served page does (a form or the article-only note) and what survived of
the page script: nothing, `omni.define` helpers nobody calls, or an `onResult`
hook that should be running.
"""
import glob, json, os, re, sys, urllib.request

LIST = 'docs/no-formula-pages.txt'
SUPP = 'php-clone/data/calc/supplement'


def key(path):
    parts = [p for p in path.strip('/').split('/') if p]
    return parts[-2] + '-' + parts[-1]


def records():
    out = {}
    for f in glob.glob('php-clone/data/calc/batch-*.ndjson'):
        for line in open(f, encoding='utf-8'):
            try:
                r = json.loads(line)
            except json.JSONDecodeError:
                continue
            out[r.get('path')] = r
    return out


def served(path):
    try:
        html = urllib.request.urlopen('http://127.0.0.1:8080' + path, timeout=25).read().decode('utf8', 'ignore')
    except Exception:
        return 'error'
    if 'calc-go' in html:
        return 'form'
    if 'Nothing to calculate here' in html or 'written up, not wired up' in html:
        return 'note'
    return 'plain'


def main():
    recs = records()
    have = {os.path.basename(f)[:-4] for f in glob.glob(SUPP + '/*.php')}
    rows = []
    for path in [l.strip() for l in open(LIST) if l.strip()]:
        if key(path) in have:
            continue
        rec = recs.get(path) or {}
        js = rec.get('js') or ''
        fns = re.findall(r'omni\.define\(\s*"([^"]+)"\s*,\s*function\s*\(([^)]*)\)', js)
        rows.append({
            'path': path,
            'state': served(path),
            'js': len(js),
            'defines': [[n, [a.strip() for a in args.split(',') if a.strip()]] for n, args in fns],
            'onResult': 'omni.onResult(' in js,
            'eq': len(rec.get('eq') or []),
            'vars': sorted((rec.get('vars') or {}).keys()),
        })
    with open('docs/dead-scan.json', 'w') as fh:
        json.dump(rows, fh, indent=1)
    buckets = {}
    for r in rows:
        if r['state'] == 'note':
            b = 'article-only'
        elif r['defines']:
            b = 'define-unused'
        elif r['js'] > 200:
            b = 'other-js'
        else:
            b = 'no-js'
        buckets.setdefault(b, []).append(r)
    for b, rs in sorted(buckets.items()):
        print(f'--- {b}: {len(rs)}')
        for r in rs:
            print('   ', r['path'], '| defines', len(r['defines']), '| js', r['js'])
    print('total', len(rows))


if __name__ == '__main__':
    main()
