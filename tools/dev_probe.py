#!/usr/bin/env python3
"""dev_probe.py — fill one calculator, press Calculate, print what came back.

    python3 tools/dev_probe.py /health/tylenol-dosage '{"usage":"Child 6-11 years"}'

Used while writing a repair: it is the same drive the acceptance sweep uses, run
against a single page so the answer can be read straight away.
"""
import json
import sys

from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'

FILL = """
(values) => {
  const w = document.querySelector('.calc-widget');
  if (!w) return false;
  const fire = el => {
    el.dispatchEvent(new Event('input', {bubbles: true}));
    el.dispatchEvent(new Event('change', {bubbles: true}));
  };
  const norm = t => (t || '').replace(/\\s+/g, ' ').trim();
  Object.keys(values).forEach(name => {
    const box = w.querySelector('input[data-var-check="' + name + '"]');
    if (box) { box.checked = values[name] !== '' && values[name] !== 'no'; fire(box); return; }
    const inp = w.querySelector('input[data-var="' + name + '"]');
    if (inp) { inp.value = values[name]; fire(inp); return; }
    const radios = [...w.querySelectorAll('input[type=radio][name="' + name + '"]')];
    if (radios.length) {
      const hit = radios.find(r => norm(r.parentNode.innerText) === norm(values[name]))
        || radios.find(r => r.value === values[name])
        || (/^\\d+$/.test(values[name]) ? radios[Number(values[name])] : null);
      if (hit) { hit.checked = true; fire(hit); }
      return;
    }
    const sel = w.querySelector('select[data-var="' + name + '"]');
    if (!sel) return;
    const opt = [...sel.options].find(o => o.value === values[name])
      || [...sel.options].find(o => o.text.trim() === String(values[name]).trim());
    if (opt) { sel.value = opt.value; fire(sel); }
  });
  return true;
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  return {
    state: w.getAttribute('data-results'),
    rows: [...w.querySelectorAll('[data-result-row]')].map(r =>
      r.innerText.replace(/\\s+/g, ' ').trim() + ' => ' +
      [...r.querySelectorAll('input')].map(i => i.value).join(',')),
    html: [...w.querySelectorAll('.calc-script-output')].map(e =>
      e.innerText.replace(/\\s+/g, ' ').trim())[0]?.slice(0, 900),
    errors: [...w.querySelectorAll('.calc-error')].map(e => e.innerText.trim()),
    unmet: [...w.querySelectorAll('.calc-unmet')].filter(e => e.offsetHeight > 0)
      .map(e => e.innerText.trim().slice(0, 120))
  };
}
"""


def main():
    path = sys.argv[1]
    values = json.loads(sys.argv[2]) if len(sys.argv) > 2 else {}
    with sync_playwright() as p:
        browser = p.chromium.launch()
        pg = browser.new_page()
        pg.on('pageerror', lambda e: print('PAGEERROR', str(e)[:300]))
        pg.goto(BASE + path, wait_until='load', timeout=30000)
        pg.evaluate(FILL, values)
        pg.wait_for_timeout(120)
        pg.evaluate(FILL, values)
        pg.eval_on_selector('.calc-go', 'e => e.click()')
        pg.wait_for_timeout(400)
        print(json.dumps(pg.evaluate(READ), indent=1))
        browser.close()


if __name__ == '__main__':
    main()
