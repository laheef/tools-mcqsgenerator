#!/usr/bin/env python3
"""sweep_retry.py — give a page a second press with fewer boxes filled.

The main sweep fills *every* empty box before pressing Calculate. On a page
whose fields are one equation and two unknowns (a mating date and a due date,
a temperature in °C and in °F) that over-specifies the form, and the page
answers "every field already has a value, so there is nothing left to work
out" — a true statement about a form the sweep itself had over-filled.

This retries each recorded non-ok page three ways, cheapest first:

  1. one box only (the first the visitor would reach)
  2. the first box of every numbered family plus one choice from each group
  3. everything, as before

The first answer wins; the record is replaced in place.

    python3 tools/sweep_retry.py               # every non-ok record
    python3 tools/sweep_retry.py /a /b         # named pages
    python3 tools/sweep_retry.py --buckets overfilled,refused
"""
from __future__ import annotations

import json
import sys
from concurrent.futures import ThreadPoolExecutor

from playwright.sync_api import sync_playwright

OUT = 'docs/silent-sweep.jsonl'
BASE = 'http://127.0.0.1:8080'

FILL_N = """
(n) => {
  /* n is the attempt number: 1..3 few boxes, -1..-3 all but a few, 0 all, and
     4..7 the same ladder with numbers typed into the text boxes, which is what
     a list page wants ("1, 2, 3" in one box instead of fifty slots). */
  const listMode = n >= 4 && n <= 7;
  /* 8..10 are the same few/all-box ladders with small numbers: a page whose
     formula raises a rate to a time (bacteria growth, compound interest) turns
     a box of "20 hours" into 72000 seconds and 1.5 ** 72000 into Infinity, so
     the honest answer is "too large", not an answer. Small values are what a
     real visitor types there. */
  let smallMode = false, tinyMode = false, bigMode = false, senseMode = false, skipMode = -1;
  /* 23..28 fill every box except one, walking through the boxes: on a page of
     five linked formulas the box that must stay empty is not always the last
     one, and leaving the wrong one empty answers nothing. */
  if (n >= 23) { skipMode = n - 23; n = 0; }
  if (n >= 20) { senseMode = true; n = [1, -1, 0][n - 20]; }
  else if (n >= 17) { bigMode = true; n = [1, -1, 0][n - 17]; }
  else if (n >= 14) { bigMode = true; n = [1, -1, 0][n - 14]; }
  else if (n >= 11) { tinyMode = true; n = [1, -1, 0][n - 11]; }
  else if (n >= 8) { smallMode = true; n = [1, -1, 0][n - 8]; }
  else if (listMode) { n = n - 4 === 0 ? 0 : n - 4; }
  const w = document.querySelector('.calc-widget');
  if (!w) return 'nowidget';
  const fire = (el, ev) => el.dispatchEvent(new Event(ev, {bubbles: true}));
  const visible = el => el.getBoundingClientRect().height > 2;
  /* Varied numbers, not the same one everywhere: a page that compares a sample
     with its control (or asks for two concentrations) refuses a form where every
     box holds 30, and that refusal is the filler's fault, not the page's. */
  const VARIANTS = [100, 20, 50, 70, 10, 90, 30, 60, 15, 85, 40, 75, 25, 65, 35, 55];
  const SMALL = [2, 3, 1.5, 4, 2.5, 5, 1.2, 3.5, 0.8, 6, 2.2, 1.8];
  /* A rate raised to a time in seconds overflows long before it looks absurd
     on screen ("growth rate 0.5" over two hours is 1.5 ** 7200). Tiny values
     are the only inputs such a page can actually work with. */
  const TINY = [0.0001, 0.0002, 0.0005, 0.001, 0.002, 0.005, 0.01, 0.02, 0.05];
  /* Pages that only answer in plausible human ranges: SAT modules, ages in
     years, salaries. The middle decade is a better guess than 20. */
  const BIG = [500, 600, 550, 700, 450, 620, 580, 660, 520, 640];
  const numbers = bigMode ? BIG : tinyMode ? TINY : (smallMode ? SMALL : VARIANTS);
  /*
   * Blind filling has a ceiling: a page that asks for "initial bacteria" and a
   * "growth rate per hour" wants 100 and 0.0001, and no single scale supplies
   * both — 100 per hour raises 1.5 to the ten-thousandth power and overflows,
   * 0.0001 bacteria is refused as not a whole number. Read the box's own name
   * and label instead, and give each one a plausible value for what it is.
   */
  const NAME_RULES = [
    [/rate|growth|interest|apr\b|yield|ratio|probab|chance|percent|share|discount|tax\b|inflation|return|slope|coefficient|alpha|beta/i, 0.05, 0.01],
    [/temp|°c|fahrenheit|celsius|kelvin/i, 25, 5],
    [/hour|day|week|month|year|duration|period|term|time|age\b|interval/i, 2, 1],
    [/angle|degree|radian/i, 45, 15],
    [/score|points|sat\b|act\b|grade/i, 500, 50],
    [/percentile/i, 75, 5],
    [/count|number|population|bacteria|amount|quantity|principal|mass|weight|volume|length|width|height|size|total|n0\b|initial/i, 100, 25],
    [/pressure|force|voltage|current|resistance|power|frequency|speed|energy/i, 10, 4]
  ];
  const ruleHits = [];
  const senseValue = (el) => {
    const field = el.closest('.calc-field') || el;
    const label = field.querySelector('label');
    const hay = [el.getAttribute('data-var') || '', label ? label.textContent || '' : '',
                 el.getAttribute('placeholder') || ''].join(' ');
    for (let i = 0; i < NAME_RULES.length; i++) {
      if (!NAME_RULES[i][0].test(hay)) continue;
      /* Two boxes of the same kind must not hold the same number: q10 wants a
         rate at 25 °C and the same rate at 35 °C, and 25/25 divides by zero. */
      ruleHits[i] = (ruleHits[i] || 0) + 1;
      return NAME_RULES[i][1] + (ruleHits[i] - 1) * NAME_RULES[i][2];
    }
    return 20 + (ruleHits[9] = (ruleHits[9] || 0) + 1) * 10;
  };
  let k = 0, dk = 0;
  /* Two date boxes holding the same day describe a zero-length interval, and a
     countdown between them is legitimately 0 — a page that then says "nothing
     to work out" is right about the maths and useless as a check. Give each
     picker its own day. */
  const DATES = ['2024-06-15', '2026-12-25', '2025-01-10', '2023-09-05'];
  const nextDate = () => DATES[dk++ % DATES.length];
  const fill = (i) => {
    if (i.type === 'date') { i.value = nextDate(); }
    else if (i.type === 'datetime-local') { i.value = nextDate() + 'T09:00'; }
    else if (i.type === 'month') { i.value = nextDate().slice(0, 7); }
    else if (i.type === 'week') { i.value = '2024-' + ('0' + (12 + dk++ * 3)).slice(-2); }
    else if (i.type === 'time') { i.value = '09:00'; }
    else if (i.tagName === 'TEXTAREA' || i.getAttribute('data-datetype') === 'text') {
      i.value = listMode ? '100, 20, 50, 70, 10'
        : senseMode ? '100, 20, 50, 70, 10'
        : bigMode ? '500, 600, 550, 700, 450'
        : tinyMode ? '0.001, 0.002, 0.005, 0.01, 0.02'
        : (smallMode ? '2, 3, 4, 5, 6' : 'Hello World');
    }
    else { i.value = String(senseMode ? senseValue(i) : numbers[k++ % numbers.length]); }
    fire(i, 'input'); fire(i, 'change');
  };
  /* Choices first, numbers second.
     A drop-down that names an ingredient redraws the form when it changes: the
     density box is replaced, and a number typed into it a moment earlier is
     gone. Filling the numbers first left those pages "2 fields still need a
     value" with every box looking filled in the trace. */
  const names = new Set([...w.querySelectorAll('input[type=radio][name]')].map(r => r.name));
  names.forEach(nm => {
    const g = [...w.querySelectorAll('input[type=radio][name="' + nm + '"]')];
    if (g.length && !g.some(r => r.checked)) {
      const t = g[0].closest('label') || g[0].parentNode;
      t.click(); g[0].checked = true; fire(g[0], 'change');
    }
  });
  [...w.querySelectorAll('select[data-var]')].forEach(s2 => {
    if (s2.getAttribute('data-unit-select') !== null) return;
    if (s2.value) return;
    const opt = [...s2.options].find(o => o.value !== '' && !o.disabled);
    if (opt) { s2.value = opt.value; fire(s2, 'change'); }
  });
  [...w.querySelectorAll('input[type=checkbox][data-var-check]')].forEach(c => {
    if (c.checked) return;
    c.checked = true; fire(c, 'change');
  });

  const boxes = [...w.querySelectorAll('.calc-input, .calc-textarea')].filter(i => {
    const f = i.closest('.calc-field');
    if (!f || f.hidden || !visible(f) || i.readOnly || i.value) return false;
    if (i.closest('[data-calc-results]')) return false;
    if (i.getAttribute('data-output') === '1') return false;
    return true;
  });
  /* n > 0: fill the first n boxes. n < 0: fill every box but the last |n| —
     which is how a visitor uses a page of five linked formulas: leave the one
     you want worked out empty. n === 0: fill them all. */
  /*
   * 30..39: fill the boxes the page's own equation asks for.
   *
   * On a cyclic page — q10, projectile motion, the g-force family — every value
   * is worked out from the others and there is one equation per unknown. The
   * blind ladder types a number into the first few boxes, which satisfies no
   * equation, so nothing derives and the page (correctly) asks for a pair that
   * fits. Reading the definition and supplying exactly the right-hand side of
   * one formula is how the page is meant to be used, and it turns most of these
   * false negatives into answers.
   */
  if (n >= 30) {
    const def = window.__calc && window.__calc.def;
    const groups = (def && def.eq) || [];
    if (!groups.length) return 'noeq';
    const visibleNames = new Set(boxes.map(b => b.getAttribute('data-var')));
    const pick = (name) => {
      const field = w.querySelector('.calc-field[data-var="' + name + '"]');
      const i = field && field.querySelector('input, select, textarea');
      if (!i) return false;
      if (i.tagName === 'SELECT') {
        const o = [...i.options].find(o => o.value !== '' && !o.disabled);
        if (!o) return false;
        i.value = o.value; fire(i, 'change');
        return true;
      }
      if (i.type === 'date') { i.value = '2026-01-05'; }
      else if (i.type === 'datetime-local') { i.value = '2026-01-05T09:00'; }
      else { i.value = String(senseValue(i)); }
      fire(i, 'input'); fire(i, 'change');
      return true;
    };
    const order = [];
    groups.forEach((g, gi) => { if (g && g.length) order.push(gi); });
    let filled = 0;
    let done = false;
    /* Walk the groups in a rolling order so successive attempts try different
       formulas; each group's variants are tried richest-rhs-first. */
    for (let k = 0; k < order.length && !done; k++) {
      const gi = order[(n - 30 + k) % order.length];
      const variants = groups[gi].slice().sort((a, b) => (b.rhs || []).length - (a.rhs || []).length);
      for (let vi = 0; vi < variants.length && !done; vi++) {
        const rhs = (variants[vi].rhs || []).filter(r => visibleNames.has(r));
        if (!rhs.length || rhs.length !== (variants[vi].rhs || []).length) continue;
        /* clear first: a leftover value from a previous attempt pins the box */
        boxes.forEach(b => {
          const field = b.closest('.calc-field');
          const i = field && field.querySelector('input, select, textarea');
          if (i && i.type !== 'checkbox') { i.value = ''; fire(i, 'input'); fire(i, 'change'); }
        });
        rhs.forEach(name => { if (pick(name)) filled++; });
        done = true;
      }
    }
    return filled ? filled : 'noeq';
  }
  if (skipMode >= 0) {
    const keep = boxes.filter((b, i) => i !== skipMode % Math.max(1, boxes.length));
    keep.forEach(b => {
      const nm = b.getAttribute('data-var');
      const live = nm ? [...w.querySelectorAll('.calc-input, .calc-textarea')]
        .filter(el => el.getAttribute('data-var') === nm && !el.closest('[data-calc-results]')
                       && (el.closest('.calc-field') || el).getBoundingClientRect().height > 2)[0] : b;
      const target = live || b;
      if (!target.value) fill(target);
    });
    return boxes.length;
  }
  const chosen = n > 0 ? boxes.slice(0, n)
    : n < 0 ? boxes.slice(0, Math.max(1, boxes.length + n))
    : boxes;
  chosen.forEach(b => {
    const nm = b.getAttribute('data-var');
    /* Find the box again: filling one field can redraw the form, and a node
       captured before that redraw is no longer on the page. Writing into a
       detached input looks like a filled form in the debugger and like an
       empty one to the calculator. */
    const live = nm ? [...w.querySelectorAll('.calc-input, .calc-textarea')]
      .filter(el => el.getAttribute('data-var') === nm && !el.closest('[data-calc-results]')
                     && (el.closest('.calc-field') || el).getBoundingClientRect().height > 2)[0] : b;
    const target = live || b;
    if (target.value) return;
    fill(target);
  });
  /* a redraw can also unmount the boxes we never reached — refill any visible
     input that is still empty and has a name we meant to fill */
  chosen.forEach(b => {
    const nm = b.getAttribute('data-var');
    if (!nm) return;
    const el = [...w.querySelectorAll('.calc-input, .calc-textarea')]
      .filter(e => e.getAttribute('data-var') === nm && !e.closest('[data-calc-results]')
                   && (e.closest('.calc-field') || e).getBoundingClientRect().height > 2)[0];
    if (el && !el.value && !el.readOnly) fill(el);
  });
  return boxes.length;
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  const vis = el => el.getBoundingClientRect().height > 2;
  const txt = el => (el.innerText || el.textContent || '').replace(/\\s+/g, ' ').trim();
  const rows = [], computed = [], sentences = [];
  w.querySelectorAll('[data-result-row]').forEach(r => {
    if (r.hidden || !vis(r)) return;
    const i = r.querySelector('input[data-var]');
    if (i && String(i.value).trim() !== '') rows.push({name: i.getAttribute('data-var'), value: i.value.slice(0, 80)});
  });
  w.querySelectorAll('.calc-input-wrap.is-computed input').forEach(i => {
    if (String(i.value || '').trim() !== '') computed.push({name: i.getAttribute('data-var'), value: i.value.slice(0, 80)});
  });
  w.querySelectorAll('[data-formula-index]').forEach(t => { if (vis(t)) { const s = txt(t); if (s) sentences.push(s.slice(0, 200)); } });
  const host = w.querySelector('[data-script-output]');
  const out = host ? txt(host) : '';
  return {
    state: w.getAttribute('data-results'),
    status: (document.querySelector('[data-calc-status]') || {}).innerText || '',
    rows: rows.map(r => r.name),
    rowValues: rows,
    computed: computed.map(c => c.name),
    computedValues: computed,
    sentences: sentences,
    scriptLen: out.length,
    unmet: [...w.querySelectorAll('.calc-unmet')].filter(vis).map(txt).slice(0, 3)
  };
}
"""


def classify(rec: dict) -> str:
    if rec.get('error'):
        return 'error'
    content = bool(rec.get('rows') or rec.get('computed') or rec.get('sentences')
                   or (rec.get('scriptLen') or 0) > 0)
    if rec.get('state') == 'shown':
        return 'ok' if content else 'silent'
    if rec.get('state') == 'pending':
        status = rec.get('status') or ''
        if rec.get('unmet') or 'need a value' in status or 'needs a value' in status:
            return 'refused'
        if 'nothing left to work out' in status:
            return 'overfilled'
        if 'Fill in any one of the boxes' in status:
            return 'needs-input'
        return 'stuck'
    return 'other'


def attempt(pg, path: str, n: int) -> dict:
    pg.goto(BASE + path, wait_until='domcontentloaded', timeout=30000)
    try:
        pg.wait_for_selector('[data-calc-go]', state='visible', timeout=4000)
    except Exception:                                             # noqa: BLE001
        pg.wait_for_timeout(400)
    pg.evaluate(FILL_N, n)
    pg.wait_for_timeout(120)
    btn = pg.query_selector('[data-calc-go]')
    if btn:
        btn.evaluate('b => b.click()')
    pg.wait_for_timeout(550)
    rec = pg.evaluate(READ)
    rec['path'] = path
    rec['bucket'] = classify(rec)
    return rec


LADDER = (30, 31, 32, 33, 34, 0, -1, -2, -3, 23, 24, 25, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 26, 27, 28, 29)
SCORE = {'ok': 5, 'refused': 4, 'needs-input': 3, 'stuck': 2, 'overfilled': 1, 'error': 0}


def score(rec: dict) -> int:
    points = SCORE.get(rec.get('bucket'), 0)
    if rec.get('rows') or rec.get('computed') or rec.get('sentences') or rec.get('scriptLen'):
        points += 1
    # an answer made of numbers beats an answer that is a complaint: filling a
    # list box with a word makes the page say "no numbers found in input", which
    # is content but not an answer
    values = [v.get('value', '') for v in (rec.get('rowValues') or rec.get('computedValues') or [])]
    for value in values:
        try:
            float(str(value).replace(',', '').replace(' ', '').replace(' ', ''))
            points += 2
            break
        except (TypeError, ValueError):
            continue
    return points


def work(paths: list[str]) -> dict[str, dict]:
    out: dict[str, dict] = {}
    with sync_playwright() as p:
        b = p.chromium.launch()
        pg = b.new_page()

        def route(r):
            return r.abort() if r.request.resource_type in ('font', 'image', 'media') else r.continue_()

        pg.route('**/*', route)
        for path in paths:
            best = None
            for n in LADDER:
                try:
                    rec = attempt(pg, path, n)
                except Exception as exc:                            # noqa: BLE001
                    rec = {'path': path, 'error': str(exc)[:160], 'bucket': 'error'}
                # the widest fill that still produced an answer wins: a page that
                # refuses for a missing third box has not failed, it has been
                # under-filled — so an equal score keeps the later attempt
                if best is None or score(rec) >= score(best):
                    best = rec
                # Only an answer ends the ladder. A refusal is information —
                # it says this fill was too thin (or its numbers were outside
                # the page's range), not that no fill can work: stopping there
                # recorded 49 pages as refused while the very next attempt on
                # the same form produced results.
                if rec['bucket'] == 'ok':
                    break
            out[path] = best
            print(f"  {path} -> {best.get('bucket')}", flush=True)
    return out


def main() -> int:
    args = [a for a in sys.argv[1:] if not a.startswith('--')]
    buckets = 'overfilled,refused,stuck,needs-input'
    for a in sys.argv[1:]:
        if a.startswith('--buckets'):
            buckets = a.split('=', 1)[1]
    records = [json.loads(l) for l in open(OUT)]
    targets = [r['path'] for r in records if r['bucket'] in buckets.split(',')]
    if args:
        targets = [p for p in targets if p in args] or args
    print(f'retrying {len(targets)} pages')
    if not targets:
        return 0
    step = 40
    changed = 0
    by_path = {r['path']: r for r in records}
    for i in range(0, len(targets), step):
        got = work(targets[i:i + step])
        for path, rec in got.items():
            if rec['bucket'] != 'overfilled':
                by_path[path] = rec
                changed += 1
            elif path in by_path and score(rec) >= score(by_path[path]):
                by_path[path] = rec
        print(f'  {min(i + step, len(targets))}/{len(targets)} — changed {changed}')
    with open(OUT, 'w') as fh:
        for rec in by_path.values():
            fh.write(json.dumps(rec) + '\n')
    return 0


if __name__ == '__main__':
    raise SystemExit(main())
