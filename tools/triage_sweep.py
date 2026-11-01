#!/usr/bin/env python3
"""triage_sweep.py — group the pages still recorded as non-ok, by cause.

    python3 tools/triage_sweep.py            # prints, and writes docs/sweep-triage.md

The sweep says *that* a page did not answer; it does not say *why*. This opens each
recorded page once and asks three questions:

  * does it have a submit button at all?
  * how many of its fields could the engine work out from the others (a form where
    "fill in any one" is the right instruction)?
  * is its answer a sentence whose value slot was lost — a visible line that ends in
    a dangling word ("is on a", "equals")?

The last is a data fault, not an engine fault: the harvest kept the words and dropped
the value, so the line renders half-finished above a box that does hold the number.
"""
from __future__ import annotations

import json
import re
import sys
from collections import Counter, defaultdict

from playwright.sync_api import sync_playwright

OUT = 'docs/silent-sweep.jsonl'
DOC = 'docs/sweep-triage.md'
BASE = 'http://127.0.0.1:8080'

PROBE = """
() => {
  const w = document.querySelector('.calc-widget');
  if (!w) return {error: 'no widget'};
  const vis = el => el.getBoundingClientRect().height > 2;
  const txt = el => (el.innerText || el.textContent || '').replace(/\\s+/g, ' ').trim();
  const boxes = [...w.querySelectorAll('.calc-input, .calc-textarea')]
      .filter(i => !i.readOnly && !i.closest('[data-calc-results]'));
  const derivable = [...w.querySelectorAll('.calc-input-wrap.is-computed')].length;
  const btn = document.querySelector('[data-calc-go]');
  const sentences = [...w.querySelectorAll('[data-formula-index]')].filter(vis).map(txt).filter(Boolean);
  const host = w.querySelector('[data-script-output]');
  return {
    hasButton: !!btn,
    fields: boxes.length,
    derivable: derivable,
    groups: w.querySelectorAll('.calc-group').length,
    emptyGroups: w.querySelectorAll('.calc-group.is-empty').length,
    sentences: sentences.slice(0, 6),
    scriptLen: host ? txt(host).length : 0,
    state: w.getAttribute('data-results')
  };
}
"""

DANGLING = re.compile(
    r"(\b(is|are|was|were|of|on|at|in|to|by|with|the|a|an|and|or|equals?|gives?|"
    r"will|would|be|about|than|from|into|per|for|it|its|=)\s*[,;:]?)\s*$",
    re.I)


def sentence_fault(lines: list[str]) -> str | None:
    for line in lines:
        tail = line.strip()
        if len(tail) < 4:
            continue
        if DANGLING.search(tail):
            return tail
    return None


def main() -> int:
    only = [a for a in sys.argv[1:] if not a.startswith('--')]
    records = [json.loads(l) for l in open(OUT)]
    todo = [r for r in records if r['bucket'] not in ('ok',)
            and (not only or r['path'] in only)]
    print(f'probing {len(todo)} pages')
    rows = []
    with sync_playwright() as p:
        b = p.chromium.launch()
        pg = b.new_page()

        def route(r):
            return r.abort() if r.request.resource_type in ('font', 'image', 'media') else r.continue_()

        pg.route('**/*', route)
        for rec in todo:
            try:
                pg.goto(BASE + rec['path'], wait_until='domcontentloaded', timeout=25000)
                pg.wait_for_timeout(120)
                info = pg.evaluate(PROBE)
            except Exception as exc:                              # noqa: BLE001
                info = {'error': str(exc)[:120]}
            rows.append({**rec, 'probe': info})
        b.close()

    causes: dict[str, list[str]] = defaultdict(list)
    for row in rows:
        info = row.get('probe') or {}
        if info.get('error'):
            causes['could not load'].append(row['path'])
            continue
        if not info.get('hasButton'):
            causes['no Calculate button'].append(row['path'])
            continue
        fault = sentence_fault(info.get('sentences') or [])
        if fault:
            causes['sentence lost its value slot'].append(row['path'])
        elif info.get('derivable', 0) and info.get('derivable', 0) >= max(1, info.get('fields', 1) - 1):
            causes['every field derivable (needs one input)'].append(row['path'])
        elif not info.get('fields'):
            causes['no fillable box'].append(row['path'])
        else:
            causes['other'].append(row['path'])

    print(Counter({k: len(v) for k, v in causes.items()}))
    with open(DOC, 'w') as fh:
        fh.write('# The pages that still do not answer — grouped by cause\n\n')
        fh.write(f'_{len(rows)} pages, probed {__import__("datetime").date.today()}._\n\n')
        for cause, paths in sorted(causes.items(), key=lambda kv: -len(kv[1])):
            fh.write(f'## {cause} — {len(paths)}\n\n')
            for path in sorted(paths):
                fh.write(f'* `{path}`\n')
            fh.write('\n')
    print(f'wrote {DOC}')
    return 0


if __name__ == '__main__':
    raise SystemExit(main())
