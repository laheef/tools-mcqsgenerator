#!/usr/bin/env python3
"""
Mirror the images referenced by the extracted article HTML.

Onim serves article figures from uploads-cdn.omnicalculator.com. To keep the
clone self-contained (and identical offline), every referenced image is
downloaded into php-clone/assets/img/article/ and mapped in
php-clone/data/article-images.json, which View::rewriteArticleHtml() uses to
rewrite the <img src> attributes.

Usage: python3 tools/fetch_article_images.py
"""
from __future__ import annotations

import glob
import json
import os
import re
import urllib.parse
import urllib.request

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
DATA = os.path.join(ROOT, "php-clone", "data")
OUT = os.path.join(ROOT, "php-clone", "assets", "img", "article")
UA = {"User-Agent": "Mozilla/5.0 (compatible; OmniCloneBuilder/1.0)"}

IMG_RE = re.compile(r'<img[^>]+src="([^"]+)"', re.I)


def local_name(url: str) -> str:
    path = urllib.parse.urlparse(url).path
    base = path.strip("/").replace("/", "__")
    if not base:
        base = "image"
    return base


def main() -> None:
    os.makedirs(OUT, exist_ok=True)
    urls: set[str] = set()
    for f in glob.glob(os.path.join(DATA, "*--*.json")):
        payload = json.load(open(f, encoding="utf-8"))
        html = "".join(p.get("html", "") for p in payload.get("article", []))
        html += "".join(f.get("a", "") for f in payload.get("faq", []))
        for m in IMG_RE.finditer(html):
            urls.add(m.group(1).replace("&amp;", "&"))

    manifest: dict[str, str] = {}
    ok = failed = 0
    for url in sorted(urls):
        name = local_name(url)
        dest = os.path.join(OUT, name)
        manifest[url] = name
        # also map the bare path, since markup sometimes differs in query string
        manifest[urllib.parse.urlparse(url).path] = name
        if os.path.exists(dest) and os.path.getsize(dest) > 0:
            ok += 1
            continue
        try:
            req = urllib.request.Request(url, headers=UA)
            data = urllib.request.urlopen(req, timeout=30).read()
            if len(data) < 64:
                raise RuntimeError("too small")
            with open(dest, "wb") as fh:
                fh.write(data)
            ok += 1
            print(f"  ok   {name} ({len(data)} bytes)")
        except Exception as exc:  # noqa: BLE001
            failed += 1
            print(f"  FAIL {url[:80]} -> {exc}")

    with open(os.path.join(DATA, "article-images.json"), "w", encoding="utf-8") as fh:
        json.dump(manifest, fh, indent=1, ensure_ascii=False, sort_keys=True)

    print(f"\n{ok} mirrored, {failed} failed, {len(manifest)} manifest entries")


if __name__ == "__main__":
    main()
