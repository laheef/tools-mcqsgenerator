#!/usr/bin/env python3
"""Answer-engine audit for the biology calculators.

A search engine ranks a page; an *answer* engine quotes it. The two are not the
same test: a page can be perfectly valid HTML, rank for its title and still be
useless to an LLM or a featured snippet, because the answer is buried in the
third paragraph, split across five sentences, or written as a question heading
that never resolves.

This audit checks the shape of every biology page against what answer engines
actually lift:

  * the lead answers the title in one sentence of <= 32 words, then stops —
    a quotable two-sentence answer, not a paragraph of throat-clearing
  * the first sentence defines its subject (a noun and a verb of definition),
    rather than opening with "This calculator …" or "Use this …"
  * headings are questions where a question is the natural shape, so the page
    can be split into extractable question/answer pairs
  * the FAQ has >= 6 pairs, every question ends in "?", every answer leads with
    its answer in the first sentence
  * the FAQPage JSON-LD declares exactly the FAQ a reader can see
  * the body carries at least one <table> and one <ul> (structured, liftable)
  * the page states when it was last updated (a freshness signal)
  * the article is long enough to be worth quoting (>= 700 words)

Usage:
  python3 tools/biology/aeo.py                # report, exit 0
  python3 tools/biology/aeo.py --strict       # exit 1 on any problem
  python3 tools/biology/aeo.py --slug codon-plot --verbose
"""
from __future__ import annotations

import argparse
import json
import re
import subprocess
import sys
import urllib.request
from concurrent.futures import ThreadPoolExecutor
from html.parser import HTMLParser

BASE = "http://127.0.0.1:8080"
ROOT = "/home/user"

STOP_OPENERS = (
    "this calculator", "this tool", "this page", "our ", "use this", "use the",
    "click ", "welcome", "in this article", "below", "here ",
)
STOPWORDS = {
    "calculator", "the", "and", "for", "from", "with", "your", "you", "how",
    "what", "does", "into", "per", "are", "its", "that", "this", "use", "using",
}
STOPWORDS_SPLIT_RE = __import__("re").compile(r"[a-z0-9µ%]+")


def slugs(category: str = "biology", harvested: bool = False) -> list[str]:
    if harvested:
        # the catalogue that came with the site, read from the search index
        with urllib.request.urlopen(f"{BASE}/search-index.json", timeout=30) as r:
            index = json.loads(r.read().decode())
        prefix = f"/{category}/"
        return sorted(e["u"][len(prefix):] for e in index if e["u"].startswith(prefix))
    out = subprocess.run(
        ["bash", f"{ROOT}/tools/php.sh", "-r",
         'require "php-clone/config.php";'
         'foreach (Omni\\Db::all("SELECT slug FROM custom_calculators '
         'WHERE category_slug = \'' + category + '\' AND status = \'published\' ORDER BY slug") as $r)'
         ' echo $r["slug"], "\\n";'],
        capture_output=True, text=True, cwd=ROOT)
    return [line.strip() for line in out.stdout.splitlines() if line.strip()]


class Scan(HTMLParser):
    """Everything the audit needs, pulled out of one page in one pass."""

    def __init__(self) -> None:
        super().__init__()
        self.h1 = 0
        self.h2: list[str] = []
        self.lead: list[str] = []
        self.faq_q: list[str] = []
        self.faq_a: list[str] = []
        self.tables = 0
        self.lists = 0
        self.text: list[str] = []
        self.ld: list[str] = []
        self.updated = ""
        self._capture: str | None = None
        self._buf = ""
        self._depth = 0
        self._faq_answer_depth = 0
        self._skip = 0
        self._in_body = False
        self._lead_armed = False
        self._body_depth = 0

    # -- helpers -------------------------------------------------------
    def _cls(self, attrs: dict) -> str:
        return (attrs.get("class") or "")

    def handle_starttag(self, tag, attrs):
        a = dict(attrs)
        cls = self._cls(a)
        if tag in ("script", "style"):
            self._skip += 1
            if tag == "script" and a.get("type") == "application/ld+json":
                self._capture = "ld"
                self._buf = ""
            return
        if "article-body" in cls:
            self._in_body = True
            self._lead_armed = True
            self._body_depth = self._depth
        elif tag == "h1":
            self.h1 += 1
        elif tag == "h2":
            self._capture = "h2"
            self._buf = ""
        elif tag == "p" and ("lead" in cls or self._lead_armed):
            # The lead is the first paragraph inside .article-body; it carries no
            # class of its own, so position is the marker.
            self._capture = "lead"
            self._buf = ""
            self._lead_armed = False
        elif tag == "summary" and "faq-question" in cls:
            self._capture = "faqq"
            self._buf = ""
        elif "faq-answer" in cls:
            self._capture = "faqa"
            self._buf = ""
            self._faq_answer_depth = self._depth
        elif tag == "table":
            self.tables += 1
        elif tag in ("ul", "ol"):
            self.lists += 1
        self._depth += 1

    def handle_endtag(self, tag):
        if tag in ("script", "style"):
            self._skip = max(0, self._skip - 1)
            if self._capture == "ld" and tag == "script":
                self.ld.append(self._buf)
                self._capture = None
            self._depth = max(0, self._depth - 1)
            return
        self._depth = max(0, self._depth - 1)
        if self._capture and tag in ("h2", "p", "summary", "div"):
            text = re.sub(r"\s+", " ", self._buf).strip()
            if self._capture == "h2" and text:
                self.h2.append(text)
            elif self._capture == "lead" and text:
                self.lead.append(text)
            elif self._capture == "faqq" and text:
                self.faq_q.append(text)
            elif self._capture == "faqa" and text:
                self.faq_a.append(text)
            self._capture = None
            self._buf = ""

    def handle_data(self, data):
        if self._skip and self._capture != "ld":
            return
        if self._capture:
            self._buf += data
        else:
            self.text.append(data)


# Abbreviations that a bare [.!?] splitter mistakes for a sentence end. Without
# this, "the prob. of winning" and "the no. of rows" each counted as two
# sentences, and five pages were reported as having a four-sentence lede.
SENT_RE = re.compile(r"(?<=[.!?])\s+(?=[A-Z\u201c\u2018\"'\[(])")

ABBREVIATIONS = (
    "no", "nos", "prob", "approx", "e.g", "i.e", "etc", "cf", "al", "fig", "figs",
    "eq", "eqs", "ref", "refs", "vol", "dept", "est", "dr", "mr", "mrs", "ms", "st",
    "jr", "inc", "ltd", "co", "scn", "spp", "avg",
)
# "Flat vs. round Earth", "Build vs. Buy": the one abbreviation that is regularly
# followed by a capital, so it is joined regardless of what comes next.
JOIN_ANYWAY = ("vs",)
# What a real sentence start looks like. Anything else after a full stop — a
# lower-case word, a digit, "+ aₖ", a stray ellipsis — is a label or a symbol, not
# a new sentence.
SENTENCE_START_RE = re.compile(r"^[A-Z\u201c\u2018\"'(\[]")


def sentences(text: str) -> list[str]:
    """Split into sentences without breaking on an abbreviation, a symbol or a label.

    The same function body lives in `tools/biology/aeo.py`, so the tool that rewrites
    prose and the audit that grades it agree on what a sentence is. Without that,
    "the no. of rows and the prob. of winning" counted as three sentences, and
    "aj +... + aₖ" as two.
    """
    out: list[str] = []
    for part in SENT_RE.split(" ".join(text.split())):
        if not part.strip():
            continue
        if out:
            prev = out[-1]
            word = re.search(r"([A-Za-z.]+)\.$", prev.rstrip())
            abbr = word.group(1).lower().lstrip(".") if word else ""
            if abbr in JOIN_ANYWAY:
                out[-1] = prev + " " + part
                continue
            if abbr in ABBREVIATIONS and not SENTENCE_START_RE.match(part):
                out[-1] = prev + " " + part
                continue
            if not SENTENCE_START_RE.match(part):
                out[-1] = prev + " " + part
                continue
        out.append(part)
    return out

def words(text: str) -> int:
    return len(re.findall(r"[A-Za-z0-9µ%°][\w\-'/.]*", text))


def audit(args_tuple) -> dict:
    slug, category = args_tuple if isinstance(args_tuple, tuple) else (args_tuple, "biology")
    url = f"{BASE}/{category}/{slug}"
    problems: list[str] = []
    req = urllib.request.Request(url, headers={"User-Agent": "aeo"})
    try:
        with urllib.request.urlopen(req, timeout=30) as r:
            html_text = r.read().decode("utf-8", "replace")
    except Exception as exc:  # noqa: BLE001
        return {"slug": slug, "problems": [f"HTTP {exc}"], "words": 0}

    scan = Scan()
    scan.feed(html_text)

    lead = " ".join(scan.lead)
    lead_sents = sentences(lead)
    body_words = words(" ".join(scan.text))
    first = lead_sents[0] if lead_sents else ""

    # 1. the lead is a quotable answer
    if not scan.lead:
        problems.append("no lead paragraph")
    else:
        if len(lead_sents) != 2:
            problems.append(f"lead has {len(lead_sents)} sentences, want 2")
        if words(lead) > 65:
            problems.append(f"lead is {words(lead)} words, want <= 65")
        if words(first) > 32:
            problems.append(f"first sentence is {words(first)} words, want <= 32")
        low = first.lower()
        if low.startswith(STOP_OPENERS):
            problems.append(f"first sentence opens with filler: “{first[:40]}…”")
        # A snippet has to name the thing that was searched for. Word lists of
        # "definition verbs" cannot judge that (an answer can open with
        # "An arterial blood gas reports …" and never say "is"), so the test is
        # overlap with the page's own <h1>: if the answer sentence shares no
        # content word with the title, it is not answering the title.
        h1_raw = re.search(r"<h1[^>]*>(.*?)</h1>", html_text, re.S)
        h1_text = re.sub(r"<[^>]+>", " ", h1_raw.group(1)) if h1_raw else ""
        title_words = {w for w in STOPWORDS_SPLIT_RE.findall(h1_text.lower())
                       if w not in STOPWORDS and len(w) > 2}
        if title_words and not (title_words & set(STOPWORDS_SPLIT_RE.findall(low))):
            problems.append("first sentence never mentions the subject of the title")

    # 2. headings a machine can split into question/answer pairs
    q_heads = [h for h in scan.h2 if h.rstrip().endswith("?")]
    if len(scan.h2) < 4:
        problems.append(f"only {len(scan.h2)} <h2> sections")
    if len(q_heads) < 2:
        problems.append(f"only {len(q_heads)} question headings")

    # 3. the FAQ
    if len(scan.faq_q) < 6:
        problems.append(f"{len(scan.faq_q)} FAQ pairs, want >= 6")
    for q, a in zip(scan.faq_q, scan.faq_a):
        if not q.rstrip().endswith("?"):
            problems.append(f"FAQ question does not end in “?”: {q[:40]}")
            break
    for a in scan.faq_a:
        s = sentences(a)
        if not s:
            problems.append("empty FAQ answer")
            break
        if words(s[0]) > 34:
            problems.append(f"FAQ answer opens with a {words(s[0])}-word sentence")
            break
        if words(a) > 90:
            problems.append(f"FAQ answer is {words(a)} words, want <= 90")
            break

    # 4. structured data that matches what a reader sees
    faq_ld = None
    for blob in scan.ld:
        try:
            node = json.loads(blob)
        except json.JSONDecodeError:
            problems.append("invalid JSON-LD")
            continue
        if isinstance(node, dict) and node.get("@type") == "FAQPage":
            faq_ld = node
    if faq_ld is None:
        problems.append("no FAQPage JSON-LD")
    else:
        declared = len(((faq_ld.get("mainEntity") or [])))
        if declared != len(scan.faq_q):
            problems.append(f"FAQPage declares {declared} pairs, page shows {len(scan.faq_q)}")

    # 5. liftable structure and freshness
    if scan.tables == 0:
        problems.append("no <table> in the article")
    if scan.lists == 0:
        problems.append("no <ul> in the article")
    if not re.search(r"Last updated:?\s*<time[^>]*>[^<]*\d{4}", html_text):
        problems.append("no visible “last updated” date")
    if body_words < 700:
        problems.append(f"only {body_words} words of body text")

    return {
        "slug": slug,
        "problems": problems,
        "lead_sentences": len(lead_sents),
        "lead_words": words(lead),
        "first_words": words(first) if first else 0,
        "h2": len(scan.h2),
        "question_headings": len(q_heads),
        "faq": len(scan.faq_q),
        "tables": scan.tables,
        "lists": scan.lists,
        "words": body_words,
    }


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--slug", default="", help="substring match on the slug")
    ap.add_argument("--category", default="biology", help="which category to audit")
    ap.add_argument("--harvested", action="store_true",
                    help="audit the harvested catalogue instead of the panel-built one")
    ap.add_argument("--sample", type=int, default=0, help="audit every Nth page")
    ap.add_argument("--strict", action="store_true", help="exit 1 if anything is off")
    ap.add_argument("--verbose", action="store_true")
    ap.add_argument("--json", default="")
    args = ap.parse_args()

    todo = [s for s in slugs(args.category, args.harvested) if not args.slug or args.slug in s]
    if args.sample > 1:
        todo = todo[:: args.sample]
    with ThreadPoolExecutor(max_workers=6) as pool:
        results = list(pool.map(audit, [(s, args.category) for s in todo]))

    failing = [r for r in results if r["problems"]]
    counts: dict[str, int] = {}
    for r in failing:
        for p in r["problems"]:
            key = re.sub(r"\d+", "N", p.split(":")[0])[:60]
            counts[key] = counts.get(key, 0) + 1

    print(f"pages audited         : {len(results)}  ({args.category}"
          f"{', harvested' if args.harvested else ', panel-built'})")
    print(f"pages with problems   : {len(failing)}")
    print(f"distinct problem kinds: {len(counts)}")
    for key, n in sorted(counts.items(), key=lambda kv: -kv[1]):
        print(f"  {n:4d}  {key}")

    if args.verbose:
        for r in results:
            flag = "FAIL" if r["problems"] else "ok  "
            print(f"{flag} {r['slug']:38s} lead={r.get('lead_sentences')}s/"
                  f"{r.get('lead_words')}w faq={r.get('faq')} h2={r.get('h2')} "
                  f"q={r.get('question_headings')} words={r.get('words')}")
            for p in r["problems"]:
                print(f"       - {p}")

    if args.json:
        with open(args.json, "w") as fh:
            json.dump(results, fh, indent=1)
        print(f"wrote {args.json}")

    if args.strict and failing:
        print(f"\n{len(failing)} page(s) need work")
        return 1
    print("\n0 problem(s)" if not failing else f"\n{len(failing)} page(s) flagged")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
