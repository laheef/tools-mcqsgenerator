#!/usr/bin/env python3
"""Second and third case for a repaired page: the ones the main check skips.

`tools/supp_check.py` proves a page answers; this proves the *other* branch of a
page also answers, and that a known-wrong input is refused instead of answered.
Each entry is (path, values, expected substring in the visible result).
"""
import sys
from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'

FILL = """
(args) => {
  const [values] = args;
  const w = document.querySelector('.calc-widget');
  const fire = el => { el.dispatchEvent(new Event('input', {bubbles: true}));
                       el.dispatchEvent(new Event('change', {bubbles: true})); };
  Object.keys(values).forEach(name => {
    const v = values[name];
    const box = w.querySelector('input[data-var-check="' + name + '"]');
    if (box) { box.checked = (v === 'yes'); fire(box); return; }
    const inp = w.querySelector('input[data-var="' + name + '"]');
    if (inp) { inp.value = v; fire(inp); return; }
    const radios = [...w.querySelectorAll('input[type=radio][name="' + name + '"]')];
    if (radios.length) {
      const norm = t => String(t).toLowerCase().replace(/[\u00b2\u00b3\s]/g, '');
      const hit = radios.find(r => (r.parentNode.innerText || '').trim() === v)
               || radios.find(r => r.value === v)
               || radios.find(r => norm(r.parentNode.innerText).indexOf(norm(v)) >= 0);
      if (hit) { hit.checked = true; fire(hit); }
      return;
    }
    const sel = w.querySelector('select[data-var="' + name + '"]');
    if (!sel) return;
    const opt = [...sel.options].find(o => o.text.trim() === v) || [...sel.options].find(o => o.value === v);
    if (opt) { sel.value = opt.value; fire(sel); }
  });
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  return {
    state: w.getAttribute('data-results'),
    // the answer may be painted into a box rather than printed as text
    text: (w.innerText + ' ' + [...w.querySelectorAll('[data-result-row] input')]
      .map(i => i.value).join(' ')).replace(/\\s+/g, ' ')
  };
}
"""

CASES = [
    # the other direction of the key signature page: a named key -> its accidentals
    ('/other/key-signature', {'option': 'no', 'key_quality': 'Major', 'major_keys': 'E♭'},
     '3 flats'),
    ('/other/key-signature', {'option': 'no', 'key_quality': 'Minor', 'minor_keys': 'F♯'},
     '3 sharps'),
    # a cubic with one real root, so the conjugate pair is the answer
    ('/math/cubic-equation', {'a3': '1', 'a2': '0', 'a1': '0', 'a0': '-2', 'precision': '4'},
     '1.2599'),
    # like radicals add, unlike radicals are refused
    ('/math/simplify-radicals', {'option': 'Sum', 'a_var': '2', 'b_var': '3', 'n_var': '2',
                                 'c_var': '5', 'd_var': '3', 'm_var': '2'}, '7'),
    ('/math/simplify-radicals', {'option': 'Sum', 'a_var': '2', 'b_var': '3', 'n_var': '2',
                                 'c_var': '5', 'd_var': '7', 'm_var': '2'},
     'cannot be combined'),
    # vertex form taken the other way
    ('/math/vertex-form', {'options_VS': 'Use vertex form', 'a_vertex': '2', 'h': '3', 'k': '1'},
     '2x² − 12x + 19'),
    # a three-congruence CRT and a three-root cubic
    ('/math/chinese-remainder', {'noOfEqs': '3', 'a1': '1', 'n1': '2', 'a2': '2', 'n2': '3',
                                 'a3': '3', 'n3': '5'}, 'x = 23 (mod 30)'),
    ('/math/polynomial-graphing', {'degP': '3', 'a0': '0', 'a1': '-1', 'a2': '0', 'a3': '1'},
     'Root 3'),
    # the other three distributions on the critical-value page
    ('/statistics/critical-value', {'which_test': 't-Student', 'alt': 'Two-tailed', 'alpha': '0.05',
                                    'tdf': '10'}, '2.228139'),
    ('/statistics/critical-value', {'which_test': 'chi-square', 'alt': 'Right-tailed',
                                    'alpha': '0.05', 'chidf': '5'}, '11.070498'),
    ('/statistics/critical-value', {'which_test': 'F (Fisher-Snedecor)', 'alt': 'Right-tailed',
                                    'alpha': '0.05', 'Fdf1': '2', 'Fdf2': '10'}, '4.102821'),
    # nothing typed: the page must ask for the values, not answer
    ('/math/systems-of-equations', {'noOfVars': '2'}, 'every coefficient'),
]

def run(cases):
    bad = 0
    with sync_playwright() as p:
        b = p.chromium.launch()
        pg = b.new_page()
        for path, values, expect in cases:
            pg.goto(BASE + path, wait_until='load', timeout=30000)
            pg.evaluate(FILL, [values])
            pg.wait_for_timeout(120)
            pg.evaluate(FILL, [values])
            pg.eval_on_selector('.calc-go', 'e => e.click()')
            pg.wait_for_timeout(250)
            rec = pg.evaluate(READ)
            hay = rec['text'].lower()
            ok = expect.lower() in hay
            print(('ok   ' if ok else 'FAIL ') + path + ' | expected "' + expect + '"')
            if not ok:
                bad += 1
                print('      saw: ' + rec['text'][:220])
        b.close()
    print('\n%d/%d matched' % (len(cases) - bad, len(cases)))
    return bad

if __name__ == '__main__':
    sys.exit(1 if run(CASES) else 0)
