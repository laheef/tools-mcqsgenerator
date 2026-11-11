"""Run every script page's JavaScript against fixtures and check the answers."""

from __future__ import annotations

import json
import os
import re
import subprocess
import sys

HERE = os.path.dirname(os.path.abspath(__file__))
OUT = os.path.abspath(os.path.join(HERE, "..", "..", "plugins", "calc", "conversion"))

# slug -> (inputs, {result: expected}), compared as strings so 42 and "42" agree
FIXTURES: dict[str, tuple[dict, dict]] = {
    "binary": ({"number": "42"}, {"binary": "101010", "octal": "52", "hex": "2A"}),
    "binary-to-hexadecimal": ({"binary": "101010"}, {"hex": "2A", "decimal": "42", "octal": "52"}),
    "binary-to-octal": ({"binary": "101010"}, {"octal": "52", "decimal": "42", "hex": "2A"}),
    "decimal-to-hexadecimal": ({"number": "255"}, {"hex": "FF", "binary": "11111111", "octal": "377"}),
    "decimal-to-octal": ({"number": "64"}, {"octal": "100", "binary": "1000000", "hex": "40"}),
    "hexadecimal": ({"hex": "FF"}, {"decimal": "255", "binary": "11111111", "octal": "377"}),
    "roman-numerals": ({"number": "1987", "roman": "MMXXIV"},
                       {"roman_out": "MCMLXXXVII", "arabic_out": "2024", "length": "10"}),
    "leet-speak": ({"text": "Elite hacker"},
                   {"leet": "31173 h4ck3r", "changed": "7", "length": "12"}),
    "gematria": ({"text": "hello"}, {"total": "52", "reduced": "7", "letters": "5"}),
    "greek-gematria": ({"text": "λόγος"}, {"total": "373", "letters": "5", "words": "1"}),
    "unicode-text": ({"text": "A"}, {"codes": "U+0041", "count": "1", "bytes": "1"}),
    "uppercase-to-lowercase-converter": ({"text": "The Quick Brown Fox"},
                                         {"lower": "the quick brown fox", "changed": "4", "length": "19"}),
    "lowercase-to-uppercase-converter": ({"text": "the quick brown fox"},
                                         {"upper": "THE QUICK BROWN FOX", "changed": "16", "length": "19"}),
    "color-converter": ({"hex": "#3498db"},
                        {"rgb": "rgb(52, 152, 219)", "hsl": "hsl(204, 70%, 53%)"}),
    "hex-to-rgb": ({"hex": "#ff8800"}, {"r": "255", "g": "136", "b": "0"}),
    "rgb-to-hex": ({"r": "52", "g": "152", "b": "219"},
                   {"hex": "#3498db", "rgb": "rgb(52, 152, 219)", "total": "423"}),
    "military-time": ({"time": "3:45 PM"}, {"military": "15:45", "hours": "15", "minutes": "45"}),
    "zulu-time-converter": ({"time": "14:30", "offset": "+5"}, {"zulu": "09:30Z", "hours": "9"}),
    "time-zones": ({"time": "12:00", "from": "+5", "to": "-5"},
                   {"converted": "02:00", "hours": "2", "minutes": "0"}),
    "unix-time": ({"timestamp": "1700000000"},
                  {"date": "2023-11-14 22:13:20 UTC", "year": "2023", "days": "19675"}),
    "coordinates-converter": ({"latitude": "51.507222", "longitude": "-0.1275"},
                              {"lat_dms": "51° 30′ 26.0″ N", "lon_dms": "0° 7′ 39.0″ W"}),
    "lat-long-to-utm": ({"latitude": "-33.8688", "longitude": "151.2093"},
                        {"easting": "334368.63", "northing": "6250948.35", "zone": "56S"}),
    "degrees-minutes-seconds": ({"degrees": "51", "minutes": "30", "seconds": "26"},
                                {"decimal": "51.507222", "total_minutes": "3090.433333",
                                 "total_seconds": "185426"}),
}


def script_of(path: str) -> str:
    text = open(path, encoding="utf-8").read()
    m = re.search(r"'js' => <<<'TXT'\n(.*?)\nTXT,", text, re.S)
    return m.group(1) if m else ""


def main() -> int:
    bad = 0
    for slug, (inputs, expected) in FIXTURES.items():
        path = os.path.join(OUT, f"qm-calc-{slug}.php")
        js = script_of(path)
        tmp = f"/tmp/js_{slug}.js"
        open(tmp, "w", encoding="utf-8").write(js)
        proc = subprocess.run(["node", os.path.join(HERE, "js_harness.js"), tmp,
                               json.dumps(inputs)], capture_output=True, text=True)
        try:
            got = json.loads(proc.stdout.strip().splitlines()[-1])
        except Exception:                                          # noqa: BLE001
            print(f"  ! {slug}: harness said {proc.stdout!r} {proc.stderr!r}")
            bad += 1
            continue
        if not got.get("ok"):
            print(f"  ! {slug}: {got.get('error')}")
            bad += 1
            continue
        for key, want in expected.items():
            have = got["out"].get(key)
            if have is None:
                print(f"  ! {slug}: {key} missing, expected {want!r}")
                bad += 1
                continue
            try:
                if abs(float(have) - float(want)) <= 1e-6 * max(1.0, abs(float(want))):
                    continue
            except (TypeError, ValueError):
                pass
            if str(have) != str(want):
                print(f"  ! {slug}: {key} = {have!r}, expected {want!r}")
                bad += 1
    print(f"{len(FIXTURES) - bad}/{len(FIXTURES)} script fixtures pass")
    return 1 if bad else 0


if __name__ == "__main__":
    raise SystemExit(main())
