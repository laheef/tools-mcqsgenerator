"""Drive every conversion page in a real browser: does the panel answer?

For each page the harness opens the URL, waits for the results panel, reads the
result boxes before and after touching an input, and reports a page whose
results never appear or never change.
"""

from __future__ import annotations

import json
import os
import sys

from playwright.sync_api import sync_playwright

import catalog

OUT_DIR = os.path.abspath(os.path.join(os.path.dirname(__file__), "..", "..",
                                       "plugins", "calc", "conversion"))
BASE = "http://127.0.0.1:8099"
ROWS = catalog.inventory()


def _spec_defaults(slug: str) -> dict[str, str]:
    import re
    text = open(os.path.join(OUT_DIR, f"qm-calc-{slug}.php"), encoding="utf-8").read()
    block = text.split("'sections' =>", 1)[1].split("'formula' =>", 1)[0]
    out = {}
    for chunk in block.split("'name' => '")[1:]:
        name = chunk.split("'", 1)[0]
        m = re.search(r"'default' => '([^']*)'", chunk[:600])
        if m:
            out[name] = m.group(1)
    return out


def _spec_results(slug: str) -> list[dict]:
    """The result names a page declares, read out of its own file."""
    import re
    text = open(os.path.join(OUT_DIR, f"qm-calc-{slug}.php"), encoding="utf-8").read()
    block = text.split("'sections' =>", 1)[1].split("'formula' =>", 1)[0]
    names = []
    for m in re.finditer(r"'name' => '([^']+)'.*?'readonly' => true", block, re.S):
        names.append(m.group(1))
    for m in re.finditer(r"'name' => '([^']+)',\s*'label' => '[^']*',\s*'type' => 'result'", block):
        names.append(m.group(1))
    return [{"name": n} for n in dict.fromkeys(names)]


def read_results(page, names: list[str]) -> dict[str, str]:
    return page.evaluate("""(names) => {
        const out = {};
        names.forEach(name => {
            const els = document.querySelectorAll('[data-var="' + name + '"]');
            const box = Array.from(els).filter(e => e.tagName === 'INPUT' || e.tagName === 'TEXTAREA').pop();
            out[name] = box ? String(box.value || '').trim() : '';
        });
        return out;
    }""", names)


def fill_inputs(page, defaults: dict[str, str]) -> int:
    return page.evaluate(r"""(defaults) => {
        let n = 0;
        document.querySelectorAll('.calc-field:not([data-output]) input.calc-input, '
                                 + '.calc-field:not([data-output]) textarea.calc-textarea').forEach(el => {
            if (el.tagName === 'TEXTAREA') {
                el.value = defaults[el.getAttribute('data-var')] || 'Elite hacker';
            } else {
                const cur = parseFloat(String(el.value).replace(/[^0-9.\-]/g, ''));
                el.value = String(isFinite(cur) && cur !== 0 ? cur * 2 : 2);
            }
            el.dispatchEvent(new Event('input', { bubbles: true }));
            el.dispatchEvent(new Event('change', { bubbles: true }));
            n++;
        });
        return n;
    }""", defaults)


def main(limit: int = 0) -> int:
    rows = ROWS[:limit] if limit else ROWS
    bad, checked = [], 0
    with sync_playwright() as pw:
        browser = pw.chromium.launch()
        page = browser.new_page()
        for row in rows:
            slug = row["slug"]
            url = f"{BASE}/conversion/{slug}"
            try:
                page.goto(url, wait_until="domcontentloaded", timeout=30000)
                page.wait_for_timeout(120)
                names = [f["name"] for f in _spec_results(slug)]
                before = read_results(page, names)
                filled = fill_inputs(page, _spec_defaults(slug))
                if not filled:
                    bad.append((slug, "no input on the page"))
                    continue
                try:
                    page.click("button:has-text('Calculate')", timeout=2000)
                except Exception:                                  # noqa: BLE001
                    pass
                page.wait_for_timeout(250)
                after = read_results(page, names)
                checked += 1
                if not after:
                    bad.append((slug, "no result boxes"))
                elif filled and before == after:
                    bad.append((slug, "results did not move when an input changed"))
            except Exception as exc:                               # noqa: BLE001
                bad.append((slug, f"error {str(exc)[:80]}"))
        browser.close()
    print(f"{checked - len(bad)}/{len(rows)} pages answered in the browser")
    for slug, why in bad[:15]:
        print("  !", slug, why)
    return 1 if bad else 0


if __name__ == "__main__":
    n = int(sys.argv[1]) if len(sys.argv) > 1 else 0
    raise SystemExit(main(n))
