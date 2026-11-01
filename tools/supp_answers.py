#!/usr/bin/env python3
"""supp_answers.py — the arithmetic of the round-33 repairs, asserted.

`supp_check.py` asks whether a repaired page answers at all. This asks whether it
answers *correctly*: each entry names a page, the values to type, and the numbers
the results panel must then hold. Run it after touching any supplement.

    python3 tools/supp_answers.py              # every case
    python3 tools/supp_answers.py math         # only paths containing "math"
"""
from __future__ import annotations

import re
import sys

from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'

# path -> (values to type, expected value per result variable)
CASES: dict[str, tuple[dict[str, str], dict[str, float]]] = {
    '/chemistry/reaction-quotient': (
        {'r1_s': '1', 'r1_c': '1', 'r2_s': '3', 'r2_c': '1', 'p1_s': '2', 'p1_c': '0.5'},
        {'quotient': 0.25, 'log_q': -0.60206, 'reactants_used': 2, 'products_used': 1},
    ),
    '/everyday-life/pregnancy-countdown': (
        {'date': '2026-01-10T09:00', 'final_date': '2026-06-15'},
        {'days_diff': 156, 'hours_diff': 3744, 'minutes_diff': 224640,
         'seconds_diff': 13478400, 'years_diff': 0},
    ),
    '/math/trig-degree': (
        {'angle': '30'},
        {'sin_print': 0.5, 'cos_print': 0.866025, 'tan_print': 0.57735,
         'cot_print': 1.732051, 'sec_print': 1.154701, 'csc_print': 2},
    ),
    '/math/trig-function': (
        {'angle': '135'},
        {'sin_print': 0.707107, 'cos_print': -0.707107, 'tan_print': -1,
         'cot_print': -1, 'sec_print': -1.414214, 'csc_print': 1.414214},
    ),
    '/math/trigonometric-functions': (
        {'angle': '60'},
        {'sin_print': 0.866025, 'cos_print': 0.5, 'tan_print': 1.732051,
         'cot_print': 0.57735, 'sec_print': 2, 'csc_print': 1.154701},
    ),
    '/math/exact-value-of-trig-functions': (
        {'angle': '45'},
        {'sin_print': 0.7071068, 'cos_print': 0.7071068, 'tan_print': 1,
         'cot_print': 1, 'sec_print': 1.4142136, 'csc_print': 1.4142136},
    ),
    '/math/integer': (
        {'a': '12', 'b': '5', 'operation': 'Multiplication'},
        {'res1': 17, 'res2': 7, 'res3': 60, 'res4': 2.4, 'res5': 248832,
         'res6': 1.643752, 'res7': 1.543959},
    ),
    '/finance/savings': (
        {'subject': 'Savings balance', 'subject2': 'Interest rate',
         'FinalBal_adj': '25000', 'InitialDep': '10000', 'r': '5', 'apy': '5.11619',
         't': '10', 'infl': '2', 'PeriodicDep': '200',
         'compound_frequency': 'Monthly', 'q': 'Monthly', 'type': 'End of period',
         'g': '0', 'g_p': '0'},
        {'finalSavings': 47655.95, 'totalPrincipal': 34000,
         'totalInterestGained': 13655.95, 'annualPercentageYield': 5.12},
    ),
    '/finance/investment': (
        {'subject': 'final balance', 'FinalBal_adj': '50000', 'InitialDep': '10000',
         'r': '7', 't': '15', 'compound_frequency': 'Monthly', 'infl': '2',
         'PeriodicDep': '300', 'q': 'Monthly', 'type': 'end of period',
         'g': '0', 'g_p': '0'},
        {'Balance_total': 124391.77, 'Balance_interest': 60391.77,
         'Final_real': 92424.92, 'contributions_total': 54000,
         'total_principal': 64000},
    ),
    '/finance/savings-plan': (
        {'myPlan': 'monthly savings plan', 'Mode': 'fixed or growing deposit',
         'Months': '12', 'PerDep': '250', 'DepAdd': '0'},
        {'finalBalance': 3000, 'periodicDeposit': 250, 'deposit_count': 12,
         'total_deposited': 3000, 'plan_length': 365},
    ),
    '/finance/compound-growth': (
        {'InitialDep': '10000', 'r': '5', 't': '10',
         'compound_frequency': 'Monthly (12/Yr)', 'q': 'Never', 'PeriodicDep': '0',
         'type': 'End of period', 'g': '0', 'infl': '0'},
        {'final_balance': 16470.09, 'interest_earned': 6470.09, 'periods': 120,
         'effective_rate': 5.1162, 'total_deposited': 10000},
    ),
    '/math/gamma-function': (
        {'type': 'Real (x)', 'x': '5'},
        {'res1': 24},
    ),
    '/statistics/pearson-correlation': (
        {'x1': '1', 'y1': '2', 'x2': '2', 'y2': '4', 'x3': '3', 'y3': '7', 'x4': '4', 'y4': '8'},
        {'pearson': 0.984495, 'n': 4, 'xMean': 2.5, 'yMean': 5.25,
         'sumX': 30, 'sumY': 133, 'sumXY': 63, 'r_squared': 0.969231},
    ),
    '/statistics/correlation': (
        {'corr_method': 'Kendall (tau)', 'variant': 'tau-b',
         'x1': '1', 'y1': '2', 'x2': '2', 'y2': '4', 'x3': '3', 'y3': '7', 'x4': '4', 'y4': '8'},
        {'kendall': 1, 'n': 4, 'pairs_concordant': 6, 'pairs_discordant': 0},
    ),
    '/math/binary-fraction': (
        {'convert': 'from decimal to binary', 'deci': '0.375', 'bit_rep': '8 digits'},
        {'decimal_value': 0.375, 'digits_shown': 8, 'truncation_gap': 0},
    ),
    '/math/consecutive-integers': (
        {'operation': 'the sum', 'noOfElements': '5', 'result': '100',
         'oddOrNot': 'any integers'},
        {'first_integer': 18, 'last_integer': 22, 'count_used': 5},
    ),
    '/math/prime-factorization': (
        {'number': '2310'},
        {'distinct_factors': 5, 'largest_factor': 11, 'smallest_factor': 2,
         'prime_below': 2309, 'prime_above': 2311},
    ),
}

FILL = """
(args) => {
  const [values] = args;
  const w = document.querySelector('.calc-widget');
  if (!w) return false;
  const set = (sel, v) => {
    const el = w.querySelector(sel);
    if (!el) return false;
    el.value = v;
    el.dispatchEvent(new Event('input', {bubbles: true}));
    el.dispatchEvent(new Event('change', {bubbles: true}));
    return true;
  };
  Object.keys(values).forEach(name => {
    const box = w.querySelector('input[data-var-check="' + name + '"]');
    if (box) {
      box.checked = values[name] !== '' && values[name] !== 'no';
      box.dispatchEvent(new Event('change', {bubbles: true}));
      return;
    }
    if (set('input[data-var="' + name + '"]', values[name])) return;
    const radios = [...w.querySelectorAll('input[type=radio][name="' + name + '"]')];
    if (radios.length) {
      const norm = t => (t || '').replace(/\\s+/g, ' ').trim();
      const hit = radios.find(r => norm(r.parentNode.innerText) === norm(values[name]))
        || radios.find(r => r.value === values[name]);
      if (hit) {
        hit.checked = true;
        hit.dispatchEvent(new Event('change', {bubbles: true}));
        (hit.closest('label') || hit.parentNode).click();
      }
      return;
    }
    const sel = w.querySelector('select[data-var="' + name + '"]');
    if (!sel) return;
    const opt = [...sel.options].find(o => o.value === values[name])
      || [...sel.options].find(o => o.text.trim() === String(values[name]).trim());
    if (opt) { sel.value = opt.value; sel.dispatchEvent(new Event('change', {bubbles: true})); }
  });
  return true;
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  const out = {};
  [...w.querySelectorAll('[data-result-row] input[data-var]')].forEach(i => {
    if (i.closest('[hidden]')) return;
    if (String(i.value).trim() !== '') out[i.getAttribute('data-var')] = i.value;
  });
  return {
    state: w.getAttribute('data-results'),
    values: out,
    status: (document.querySelector('[data-calc-status]') || {}).innerText || ''
  };
}
"""


def number(text: str) -> float | None:
    """’1 234.5’ / ’1 234,5’ / ’-0.60’ → float."""
    cleaned = re.sub(r'[\s\u00a0\u202f]', '', str(text)).replace(',', '.')
    try:
        return float(cleaned)
    except ValueError:
        return None


def check(pg, path: str, values: dict[str, str], expect: dict[str, float]) -> tuple[bool, str]:
    pg.goto(BASE + path, wait_until='load', timeout=30000)
    pg.evaluate(FILL, [values])
    pg.wait_for_timeout(120)
    pg.evaluate(FILL, [values])
    pg.wait_for_timeout(80)
    button = pg.query_selector('[data-calc-go]')
    if button:
        button.click()
    pg.wait_for_timeout(400)
    rec = pg.evaluate(READ)
    if rec['state'] != 'shown':
        return False, f"not shown ({rec['state']}): {rec['status'].strip()[:110]}"
    problems = []
    for name, want in expect.items():
        got = rec['values'].get(name)
        if got is None:
            problems.append(f'{name}: no value')
            continue
        have = number(got)
        if have is None:
            problems.append(f'{name}: {got!r} is not a number')
            continue
        if abs(have - want) > max(abs(want) * 1e-4, 1e-6):
            problems.append(f'{name}: {have} != {want}')
    return (not problems), '; '.join(problems)


def main() -> int:
    only = sys.argv[1] if len(sys.argv) > 1 else ''
    paths = [p for p in CASES if only in p]
    bad = 0
    with sync_playwright() as p:
        browser = p.chromium.launch()
        page = browser.new_page()
        def route(r):
            if r.request.resource_type in ('font', 'image', 'media'):
                return r.abort()
            return r.continue_()
        page.route('**/*', route)
        for path in paths:
            values, expect = CASES[path]
            ok, note = check(page, path, values, expect)
            print(('ok   ' if ok else 'FAIL ') + path + ('' if ok else ' | ' + note))
            bad += 0 if ok else 1
        browser.close()
    print(f'\n{len(paths) - bad}/{len(paths)} matched')
    return 1 if bad else 0


if __name__ == '__main__':
    raise SystemExit(main())
