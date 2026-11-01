#!/usr/bin/env python3
"""
build_related.py — work out which calculators really are neighbours.

The reader-facing "Related calculators" grid used to fall back to *alphabetical*
neighbours whenever two calculator names shared no useful word: `/math/absolute-value`
was followed by "Matrix determinant", "Diagonal of a rectangle" and "Diameter of a
cone" because those happen to sort next to it. Anyone reading the page can see that
is not a relationship.

Names alone are a thin signal, but the article body is a rich one: two calculators
about the same subject talk about the same things. This script reads all 3,831
articles, builds a TF-IDF matrix over their text and stores the 12 nearest
neighbours of each page in `data/cache/related-index.json`. `Data::related()` reads
that file first and only falls back to the old scoring when a page is missing.

The similarities are computed offline and committed, so every render is
deterministic and costs one JSON read.

Usage:
    python3 tools/build_related.py [--top 12] [--min-df 3]
"""
from __future__ import annotations

import argparse
import json
import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
CONTENT = ROOT / "php-clone" / "data" / "content"
OUT = ROOT / "php-clone" / "data" / "cache" / "related-index.json"
# Calculators created in the panel are not files under data/content — their articles
# live in the database. They are dumped first so the two kinds of page share one
# vector space; otherwise every custom page falls back to alphabetical neighbours.
CUSTOM_DUMP = ROOT / "php-clone" / "data" / "cache" / "custom-articles.json"
PHP_DUMP = r"""
require "php-clone/config.php";
$rows = Onim\Db::all("SELECT slug, category_slug, name, h1, summary, sections, faq FROM custom_calculators WHERE status='published'");
$out = [];
foreach ($rows as $r) {
    $out[] = [
        "path" => "/" . $r["category_slug"] . "/" . $r["slug"],
        "name" => $r["name"],
        "h1" => $r["h1"],
        "summary" => $r["summary"],
        "sections" => json_decode((string) $r["sections"], true) ?: [],
        "faq" => json_decode((string) $r["faq"], true) ?: [],
    ];
}
file_put_contents($argv[1], json_encode($out, JSON_UNESCAPED_UNICODE));
echo count($out), " custom calculators dumped\n";
"""


TAG = re.compile(r"<[^>]+>")
WS = re.compile(r"\s+")
WORD = re.compile(r"[a-z0-9]+")

# Words that appear in hundreds of calculator names and therefore say nothing
# about two pages being neighbours.
NOISE = {
    "calculator", "calculators", "free", "online", "the", "a", "an", "of", "for",
    "and", "to", "in", "how", "what", "is", "my", "your", "with", "by", "from",
    "per", "on", "at", "calculate", "calculation", "converter", "convert",
}


def plain(html: str) -> str:
    return WS.sub(" ", TAG.sub(" ", html or "")).strip()


def article_text(doc: dict) -> str:
    """The prose of one article, without the boilerplate every page shares."""
    parts = [doc.get("h1") or doc.get("name") or "", doc.get("summary") or ""]
    for section in doc.get("sections") or []:
        if isinstance(section, dict):
            parts.append(str(section.get("title") or ""))
            parts.append(plain(str(section.get("html") or "")))
        else:
            parts.append(str(section))
    for item in doc.get("faq") or []:
        if isinstance(item, dict):
            parts.append(str(item.get("q") or ""))
            parts.append(plain(str(item.get("a") or "")))
    return " ".join(p for p in parts if p)


def name_tokens(name: str) -> set[str]:
    stem = lambda w: w[:-1] if len(w) > 4 and w.endswith("s") and not w.endswith("ss") else w  # noqa: E731
    return {stem(w) for w in WORD.findall((name or "").lower()) if w not in NOISE and len(w) > 2}


def first_words(name: str, n: int = 3) -> tuple:
    return tuple(WORD.findall((name or "").lower())[:n])


def dump_custom() -> None:
    """Export the panel's articles so custom pages join the same TF-IDF space."""
    import subprocess  # noqa: PLC0415

    CUSTOM_DUMP.parent.mkdir(parents=True, exist_ok=True)
    try:
        res = subprocess.run(
            ["bash", str(ROOT / "tools" / "php.sh"), "-r", PHP_DUMP, "--", str(CUSTOM_DUMP)],
            capture_output=True, text=True, cwd=ROOT, timeout=180,
        )
        print(res.stdout.strip() or res.stderr.strip()[:300])
    except Exception as exc:                                   # noqa: BLE001
        print(f"could not dump custom calculators: {exc}", file=sys.stderr)


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--top", type=int, default=12)
    ap.add_argument("--min-df", type=int, default=3)
    args = ap.parse_args()

    dump_custom()

    docs, paths, names = [], [], {}
    for file in sorted(CONTENT.glob("*/*.json")):
        try:
            doc = json.loads(file.read_text())
        except Exception:                                         # noqa: BLE001
            continue
        path = doc.get("path") or f"/{doc.get('cat')}/{doc.get('slug')}"
        text = article_text(doc)
        if len(text) < 200:
            continue
        docs.append(text)
        paths.append(path)
        names[path] = str(doc.get("name") or doc.get("h1") or "")

    custom = 0
    if CUSTOM_DUMP.is_file():
        for doc in json.loads(CUSTOM_DUMP.read_text()):
            text = article_text(doc)
            if len(text) < 200:
                continue
            docs.append(text)
            paths.append(doc["path"])
            names[doc["path"]] = str(doc.get("h1") or doc.get("name") or "")
            custom += 1
        print(f"plus {custom} panel-created calculators")

    if len(docs) < 50:
        print(f"only {len(docs)} articles found — is data/content complete?", file=sys.stderr)
        return 1

    from sklearn.feature_extraction.text import TfidfVectorizer  # noqa: PLC0415

    vec = TfidfVectorizer(
        stop_words="english",
        min_df=args.min_df,
        max_df=0.6,          # words in most articles ("calculator", "formula") say nothing
        sublinear_tf=True,
        ngram_range=(1, 2),
        strip_accents="unicode",
    )
    matrix = vec.fit_transform(docs)
    print(f"articles {matrix.shape[0]}  terms {matrix.shape[1]}")

    # Cosine similarity in row blocks: 3,831 x 3,831 is fine to stream, but
    # blocking keeps peak memory small and the progress readable.
    from sklearn.metrics.pairwise import linear_kernel  # noqa: PLC0415
    import numpy as np                                    # noqa: PLC0415

    out: dict[str, list[list]] = {}
    block = 256
    for start in range(0, matrix.shape[0], block):
        stop = min(start + block, matrix.shape[0])
        sims = linear_kernel(matrix[start:stop], matrix)
        for i in range(stop - start):
            row = sims[i]
            row[start + i] = -1.0                        # never its own neighbour
            # top-k without a full sort of 3,831 values
            k = min(args.top * 3, row.size - 1)
            idx = np.argpartition(-row, k)[:k]
            idx = idx[np.argsort(-row[idx])]
            # Text similarity is the main signal; a shared distinctive name word
            # ("mortgage", "bmi") is strong corroboration, so it is worth a small
            # bonus rather than a full second pass.
            self_tokens = name_tokens(names.get(paths[start + i], ""))
            ranked = []
            for j in idx:
                j = int(j)
                sim = float(row[j])
                if sim <= 0.01:
                    continue
                shared = self_tokens & name_tokens(names.get(paths[j], ""))
                ranked.append((sim + min(0.3, 0.15 * len(shared)), paths[j]))

            ranked.sort(key=lambda item: -item[0])

            # Two neighbours whose names are near-synonyms ("least common
            # denominator" / "lowest common denominator") are the same
            # suggestion twice; keep the better one.
            chosen, kept = [], []
            for score, cand in ranked:
                tokens = name_tokens(names.get(cand, ""))
                if any(len(tokens & other) >= 2 for other in kept):
                    continue
                chosen.append([cand, round(score, 4)])
                kept.append(tokens)
            out[paths[start + i]] = chosen[: args.top]
        print(f"  {stop}/{matrix.shape[0]}", flush=True)

    OUT.parent.mkdir(parents=True, exist_ok=True)
    OUT.write_text(json.dumps(out, separators=(",", ":")))
    sizes = [len(v) for v in out.values()]
    print(f"wrote {OUT} — {len(out)} pages, avg {sum(sizes)/len(sizes):.1f} neighbours, "
          f"{OUT.stat().st_size/1024:.0f} KB")
    return 0


if __name__ == "__main__":
    sys.exit(main())
