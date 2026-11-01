#!/usr/bin/env python3
"""Classify sitemap URLs that no longer serve a calculator definition.

Some sitemap entries are 301 aliases of a live calculator; others were removed
entirely (they land on the home page). Aliases become redirects in the clone;
removed pages are dropped from the sitemap and 404 like the original.
"""
import json, glob, pathlib, re, urllib.request
from concurrent.futures import ThreadPoolExecutor

ROOT = pathlib.Path(__file__).resolve().parent.parent
UA = ("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 "
      "(KHTML, like Gecko) Chrome/126 Safari/537.36")
BASE = "https://www.omnicalculator.com"


def probe(path):
    try:
        req = urllib.request.Request(BASE + path, headers={"User-Agent": UA})
        r = urllib.request.urlopen(req, timeout=40)
        final = r.geturl()
    except Exception as exc:                      # noqa: BLE001
        return path, None, str(exc)
    if not final.startswith(BASE):
        return path, None, "external"
    tail = final[len(BASE):] or "/"
    return path, tail, None


def main():
    urls = [u["path"] if isinstance(u, dict) else u
            for u in json.loads((ROOT / "tools" / "all-urls.json").read_text())]
    have = set()
    for f in glob.glob(str(ROOT / "php-clone/data/calc/batch-*.ndjson")):
        for line in open(f):
            have.add(json.loads(line)["path"])
    missing = [u for u in urls if u not in have]

    redirects, dead = {}, []
    with ThreadPoolExecutor(8) as pool:
        for path, tail, err in pool.map(probe, missing):
            if tail and tail != path and tail != "/" and tail in have:
                redirects[path] = tail
            elif tail and tail != path and tail != "/" and tail not in have:
                redirects[path] = tail          # chains resolve at render time
            else:
                dead.append(path)
            if err:
                print("  error", path, err)
    out = ROOT / "php-clone" / "data" / "calc"
    (out / "redirects.json").write_text(json.dumps(redirects, indent=1, sort_keys=True))
    (out / "dead.json").write_text(json.dumps(sorted(dead), indent=1))
    print(f"missing {len(missing)} · aliases {len(redirects)} · removed {len(dead)}")
    print(f"live calculators: {len(have)}")


if __name__ == "__main__":
    main()
