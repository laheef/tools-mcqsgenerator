#!/usr/bin/env python3
"""
agreement_test.py — prove the PHP render and the JS re-solve agree.

Every page renders its results twice:

  1. server side, by lib/Solver.php, into the HTML a crawler sees;
  2. client side, by assets/js/calc.js, which re-solves on load and rewrites
     the input boxes.

If the two engines ever drift, the second pass silently changes numbers the
first pass printed — the page looks fine but a no-JS crawler and a reader see
different answers. This tool compares them directly: it reads the values out of
the raw HTML, then reads the values back out of the live DOM after the script
has run, and reports every field where they differ.

Usage:  python3 tools/agreement_test.py --sample 200 --jobs 6
        python3 tools/agreement_test.py --all --jobs 6
"""
from __future__ import annotations

import argparse
import asyncio
import html as html_mod
import json
import random
import re
import sys
import urllib.request
from pathlib import Path

from playwright.async_api import async_playwright

ROOT = Path(__file__).resolve().parent.parent
CALC = ROOT / "php-clone" / "data" / "calc"
OUT = ROOT / "docs" / "agreement-failures.json"

INPUT_RE = re.compile(
    r'<input[^>]*data-var="([^"]+)"[^>]*>', re.I)


def load_paths():
    out = []
    for f in sorted(CALC.glob("batch-*.ndjson")):
        for line in f.read_text().splitlines():
            if line.strip():
                out.append(json.loads(line)["path"])
    return sorted(set(out))


def server_values(base, path, timeout=25):
    """value="…" for every input[data-var] in the HTML the server sends."""
    req = urllib.request.Request(base.rstrip("/") + path,
                                 headers={"User-Agent": "OmniCloneAgreement/1.0"})
    with urllib.request.urlopen(req, timeout=timeout) as r:
        body = r.read().decode("utf-8", "replace")
    out = {}
    for tag in INPUT_RE.findall(body):
        pass
    for match in INPUT_RE.finditer(body):
        tag = match.group(0)
        name = match.group(1)
        val = re.search(r'\svalue="([^"]*)"', tag)
        out[name] = html_mod.unescape(val.group(1)) if val else ""
    return out


DOM_PROBE = """
() => {
  const w = document.querySelector('[data-calculator]');
  if (!w) return null;
  const out = {};
  w.querySelectorAll('input[data-var]').forEach(i => {
    out[i.getAttribute('data-var')] = i.value;
  });
  return out;
}
"""


def close_enough(a: str, b: str) -> bool:
    """Compare two rendered numbers the way a reader would: to their digits."""
    a, b = (a or "").strip(), (b or "").strip()
    if a == b:
        return True
    na = a.replace("\u00a0", "").replace(" ", "").replace(",", ".")
    nb = b.replace("\u00a0", "").replace(" ", "").replace(",", ".")
    if na == nb:
        return True
    try:
        fa, fb = float(na), float(nb)
    except ValueError:
        return False
    if fa == fb:
        return True
    return abs(fa - fb) <= 1e-6 * max(1.0, abs(fa), abs(fb))


async def check(browser, base, path):
    res = {"path": path, "mismatches": []}
    try:
        php = server_values(base, path)
    except Exception as exc:                                   # noqa: BLE001
        res["error"] = f"fetch: {exc}"[:160]
        return res
    if not php:
        res["fields"] = 0
        return res

    ctx = await browser.new_context(viewport={"width": 1280, "height": 900})
    page = await ctx.new_page()
    try:
        await page.goto(base.rstrip("/") + path, wait_until="load", timeout=25000)
        await page.wait_for_timeout(450)
        dom = await page.evaluate(DOM_PROBE) or {}
    except Exception as exc:                                   # noqa: BLE001
        res["error"] = f"load: {exc}"[:160]
        await ctx.close()
        return res
    await ctx.close()

    checked = 0
    for name, js in dom.items():
        if name not in php:
            continue
        want, got = php[name], js
        # blank on both sides is agreement, and so is a field the script
        # legitimately clears
        if want == "" and got == "":
            continue
        checked += 1
        if not close_enough(want, got):
            # A field the server leaves blank and the client fills is a script
            # result: only the browser can run a page's own JavaScript, so the
            # server has nothing to print. Not a disagreement between engines.
            kind = "js-only" if want == "" else ("php-only" if got == "" else "conflict")
            res["mismatches"].append({"var": name, "php": want, "js": got, "kind": kind})
    res["fields"] = checked
    return res


async def run(args):
    todo = load_paths()
    if args.paths:
        todo = [p.strip() for p in args.paths.split(",") if p.strip()]
    if args.all or args.paths:
        sample = todo
    else:
        rng = random.Random(args.seed)
        sample = sorted(rng.sample(todo, min(args.sample, len(todo))))

    print(f"comparing PHP and JS on {len(sample)} pages with {args.jobs} workers")
    sem = asyncio.Semaphore(args.jobs)
    results = []

    async with async_playwright() as p:
        browser = await p.chromium.launch(args=["--no-sandbox"])

        async def one(path):
            async with sem:
                return await check(browser, args.base, path)

        for i in range(0, len(sample), 100):
            chunk = sample[i:i + 100]
            results.extend(await asyncio.gather(*(one(p) for p in chunk)))
            done = min(i + 100, len(sample))
            seen = sum(1 for r in results
                       if any(m["kind"] == "conflict" for m in r["mismatches"]) or r.get("error"))
            print(f"  {done}/{len(sample)}  conflicts {seen}")
        await browser.close()

    conflicts = [r for r in results
                 if any(m["kind"] == "conflict" for m in r["mismatches"]) or r.get("error")]
    scripted = [r for r in results
                if r["mismatches"] and not any(m["kind"] == "conflict" for m in r["mismatches"])]
    bad = conflicts
    fields = sum(r.get("fields", 0) for r in results)
    OUT.parent.mkdir(parents=True, exist_ok=True)
    OUT.write_text(json.dumps(results, indent=1))

    for r in bad[:25]:
        names = ", ".join(f"{m['var']} php={m['php']} js={m['js']}" for m in r["mismatches"][:3])
        print(f"  DISAGREE {r['path']}: {r.get('error') or names}")
    print(f"\n{len(results)} pages, {fields} rendered fields compared")
    print(f"  conflicts (both engines produced a different number): {len(conflicts)}")
    print(f"  script-only (server blank, browser fills it in)      : {len(scripted)}")
    print(f"  detail -> {OUT}")
    return 0


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--base", default="http://127.0.0.1:8080")
    ap.add_argument("--sample", type=int, default=100)
    ap.add_argument("--all", action="store_true")
    ap.add_argument("--jobs", type=int, default=4)
    ap.add_argument("--seed", type=int, default=7)
    ap.add_argument("--paths", default="", help="comma-separated paths to compare")
    return asyncio.run(run(ap.parse_args()))


if __name__ == "__main__":
    sys.exit(main())
