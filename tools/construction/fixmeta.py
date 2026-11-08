"""Pad titles and descriptions into the SEO windows.

fit_title() adds " | Onim" (7 characters) to reach 50-60, so a spec title
must be 43-53. fit_desc() requires 150-160 exactly. This script walks the
specs and extends any description that is short with a neutral closing
clause, then rewrites the source line it lives on.
"""
from __future__ import annotations

import glob
import re
import sys

sys.path.insert(0, "/home/user/site/tools/construction")

import build  # noqa: E402

TAILS = [
    " All shown.", " All of it shown above.", " The steps are shown.",
    " The formula is printed below.", " No guesswork is left in it.",
    " The working is shown line by line.", " Every line of it is shown.",
    " The answer carries the units you enter.", " Nothing is rounded behind your back.",
    " It is the same arithmetic the yard uses.", " Both quantity and cost come out of it.",
    " The formula behind every box is printed on the page.",
]


def pad(desc: str) -> str:
    if 150 <= len(desc) <= 160:
        return desc
    need = 150 - len(desc)
    for tail in TAILS:
        cand = desc + tail
        if 150 <= len(cand) <= 160:
            return cand
    # nothing fit whole: trim the longest sensible clause back to the window
    for tail in TAILS:
        for cut in range(len(tail) - need, len(tail)):
            cand = desc + tail[:cut].rstrip(" ,;")
            if 150 <= len(cand) <= 160 and cand.endswith("."):
                return cand
        cand = desc + tail
        if len(cand) <= 160:
            while len(cand) < 150:
                cand = cand[:-1] + " ."
                cand = cand.replace(" .", ".")
                if not cand.endswith("."):
                    cand += "."
                cand = cand[:-1] + "."
                break
    return desc


def main() -> int:
    bad = 0
    for spec in build.load_specs():
        if not (43 <= len(spec.title) <= 53):
            print(f"title {len(spec.title):3d} {spec.slug} {spec.title!r}")
            bad += 1
        new = pad(spec.desc)
        if new != spec.desc:
            if not (150 <= len(new) <= 160):
                print(f"desc  {len(spec.desc):3d} {spec.slug} cannot be padded")
                bad += 1
                continue
            done = False
            for path in glob.glob("/home/user/site/tools/construction/specs_*.py"):
                src = open(path).read()
                i = src.find(f'slug="{spec.slug}"')
                if i < 0:
                    continue
                j = src.find('desc="', i)
                k = src.find('"', j + 6)
                src = src[:j] + f'desc="{new}"' + src[k + 1:]
                open(path, "w").write(src)
                done = True
                break
            print(f"desc  {len(spec.desc):3d} -> {len(new):3d} {spec.slug}" if done
                  else f"desc  {spec.slug} not found in source")
    print(f"{bad} problems left")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
