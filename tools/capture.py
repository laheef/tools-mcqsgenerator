#!/usr/bin/env python3
"""
Step 1 of the pipeline — capture the reference site.

Two jobs:
  * save the raw page HTML (which, being Next.js, embeds the whole page model
    in <script id="__NEXT_DATA__">)
  * screenshot the page and record *computed* styles, so the rebuild uses real
    tokens (colours, type scale, radii, breakpoints) instead of guesses

Outputs into recon/: raw html, computed.json, shots/*.png

Requires: playwright (`pip install playwright && playwright install chromium`)

Usage: python3 tools/capture.py [url ...]
"""
from __future__ import annotations

import asyncio
import json
import os
import pathlib
import urllib.request

ROOT = pathlib.Path(__file__).resolve().parent.parent
RECON = ROOT / "recon"
UA = ("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 "
      "(KHTML, like Gecko) Chrome/126 Safari/537.36")

DEFAULT_PAGES = {
    "home": "https://www.omnicalculator.com/",
    "percentage": "https://www.omnicalculator.com/math/percentage",
    "category": "https://www.omnicalculator.com/finance",
}

PROPS = [
    "fontFamily", "fontSize", "fontWeight", "lineHeight", "letterSpacing", "color",
    "backgroundColor", "borderRadius", "border", "boxShadow", "padding", "margin",
    "display", "gap", "maxWidth", "height", "textTransform", "width",
    "justifyContent", "alignItems",
]

PROBE_JS = """(PROPS) => {
  const pick = el => { if(!el) return null; const cs=getComputedStyle(el); const o={};
    for(const p of PROPS) o[p]=cs[p]; const r=el.getBoundingClientRect();
    o.rect={x:Math.round(r.x),y:Math.round(r.y),w:Math.round(r.width),h:Math.round(r.height)};
    o.text=(el.innerText||"").trim().slice(0,90); o.tag=el.tagName.toLowerCase(); return o; };
  const q = s => pick(document.querySelector(s));
  const counts={};
  document.querySelectorAll('*').forEach(el=>{const cs=getComputedStyle(el);
    const c=cs.backgroundColor; if(c&&c!=='rgba(0, 0, 0, 0)') counts[c]=(counts[c]||0)+1;
    const f=cs.color; counts['fg:'+f]=(counts['fg:'+f]||0)+1;});
  const palette=Object.entries(counts).sort((a,b)=>b[1]-a[1]).slice(0,40);
  const fonts={};
  document.querySelectorAll('*').forEach(el=>{const cs=getComputedStyle(el);
    const k=cs.fontFamily.split(',')[0]+'|'+cs.fontSize+'|'+cs.fontWeight; fonts[k]=(fonts[k]||0)+1;});
  const fontStats=Object.entries(fonts).sort((a,b)=>b[1]-a[1]).slice(0,20);
  const heads=[...document.querySelectorAll('h1,h2,h3')].slice(0,12)
      .map(h=>({tag:h.tagName,text:h.innerText.trim().slice(0,70),...pick(h)}));
  return {title:document.title, palette, fontStats, heads,
          body:q('body'), header:q('header'), main:q('main'), h1:q('h1'),
          input:q('input[type=text],input[inputmode],input')};
}"""


def fetch(url: str, dest: pathlib.Path) -> None:
    req = urllib.request.Request(url, headers={"User-Agent": UA})
    data = urllib.request.urlopen(req, timeout=40).read()
    dest.write_bytes(data)
    print(f"  html {dest.name} ({len(data)} bytes)")


async def shoot(pages):
    from playwright.async_api import async_playwright

    (RECON / "shots").mkdir(parents=True, exist_ok=True)
    computed = {}
    async with async_playwright() as p:
        browser = await p.chromium.launch()
        for name, url in pages.items():
            ctx = await browser.new_context(viewport={"width": 1440, "height": 1000}, user_agent=UA)
            page = await ctx.new_page()
            await page.goto(url, wait_until="domcontentloaded", timeout=60000)
            await page.wait_for_timeout(3500)
            await page.screenshot(path=str(RECON / "shots" / f"{name}_fold.png"))
            computed[name] = await page.evaluate(PROBE_JS, PROPS)
            print(f"  shot {name}  title={computed[name]['title']!r}")
            await ctx.close()
        await browser.close()
    (RECON / "computed.json").write_text(json.dumps(computed, indent=1))
    print(f"  wrote computed.json ({len(computed)} pages)")


def main(pages=None):
    pages = pages or DEFAULT_PAGES
    RECON.mkdir(exist_ok=True)
    for name, url in pages.items():
        fetch(url, RECON / f"{name}.html")
    asyncio.run(shoot(pages))


if __name__ == "__main__":
    import sys
    main()
