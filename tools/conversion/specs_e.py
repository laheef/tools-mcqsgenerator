"""The 23 pages whose working is a script rather than an equation."""

from gen import F, R, T
from make import script_page

SPECS = []

JS_HEAD = '"use strict";\n'

NOTE = ("applies a fixed set of rules to what you type, which is why the formula table is "
        "empty and the script below it is the calculator")


def S(slug, name, what, fields, results, js, prose=None, rules=None, examples=None):
    pre = {"rules": rules or [], "examples": examples or []}
    if prose:
        pre.update(prose)
    SPECS.append(script_page(slug, name, what, fields, results, JS_HEAD + js.strip(), NOTE, pre))


def out(name, label, **kw):
    """An answer box. A text answer is a `result` row: the site gives it a plain
    box that the script can write a string into, which a number box cannot."""
    if kw.get("type") == "text":
        return {"name": name, "label": label, "type": "result"}
    return R(name, label, **kw)


# ---------------------------------------------------------------- number bases
BASES_JS = """
function toBase(n, base) {
  if (!isFinite(n)) return "";
  var neg = n < 0;
  n = Math.abs(Math.trunc(n));
  if (n === 0) return "0";
  var digits = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", s = "";
  while (n > 0) { s = digits.charAt(n % base) + s; n = Math.floor(n / base); }
  return (neg ? "-" : "") + s;
}
"""

S("binary", "Binary Converter",
  "A decimal number written in base two, with base eight and base sixteen beside it so the "
  "same figure can be checked in three bases at once.",
  [F("number", "Decimal number", default="42")],
  [out("binary", "Binary", type="text", readonly=True),
   out("octal", "Octal", type="text", readonly=True),
   out("hex", "Hexadecimal", type="text", readonly=True)],
  BASES_JS + """
omni.onResult(["number"], function (ctx) {
  var n = Number(String(ctx.getRawInput("number")).replace(/[^0-9.\\-]/g, ""));
  ctx.exportValue("binary", isFinite(n) ? toBase(n, 2) : "");
  ctx.exportValue("octal", isFinite(n) ? toBase(n, 8) : "");
  ctx.exportValue("hex", isFinite(n) ? toBase(n, 16) : "");
});
""")

S("binary-to-hexadecimal", "Binary to Hexadecimal Converter",
  "Four binary digits make one hexadecimal digit, so the conversion is a regrouping rather "
  "than an arithmetic step. The page also gives the decimal value.",
  [T("binary", "Binary digits", default="101010")],
  [out("hex", "Hexadecimal", type="text", readonly=True),
   out("decimal", "Decimal", suffix="", readonly=True),
   out("octal", "Octal", type="text", readonly=True)],
  BASES_JS + """
omni.onResult(["binary"], function (ctx) {
  var bits = String(ctx.getRawInput("binary")).replace(/[^01]/g, "");
  var n = bits ? parseInt(bits, 2) : NaN;
  ctx.exportValue("hex", isFinite(n) ? toBase(n, 16) : "");
  ctx.exportValue("decimal", isFinite(n) ? n : "");
  ctx.exportValue("octal", isFinite(n) ? toBase(n, 8) : "");
});
""")

S("binary-to-octal", "Binary to Octal Converter",
  "Three binary digits make one octal digit. Take the bits in threes from the right and the "
  "answer is the digits those groups spell.",
  [T("binary", "Binary digits", default="101010")],
  [out("octal", "Octal", type="text", readonly=True),
   out("decimal", "Decimal", readonly=True),
   out("hex", "Hexadecimal", type="text", readonly=True)],
  BASES_JS + """
omni.onResult(["binary"], function (ctx) {
  var bits = String(ctx.getRawInput("binary")).replace(/[^01]/g, "");
  var n = bits ? parseInt(bits, 2) : NaN;
  ctx.exportValue("octal", isFinite(n) ? toBase(n, 8) : "");
  ctx.exportValue("decimal", isFinite(n) ? n : "");
  ctx.exportValue("hex", isFinite(n) ? toBase(n, 16) : "");
});
""")

S("decimal-to-hexadecimal", "Decimal to Hexadecimal Converter",
  "Hexadecimal is base sixteen: counts run 0 to 9 and then A to F before the next place. The "
  "page divides repeatedly and reports the remainder string.",
  [F("number", "Decimal number", default="255")],
  [out("hex", "Hexadecimal", type="text", readonly=True),
   out("binary", "Binary", type="text", readonly=True),
   out("octal", "Octal", type="text", readonly=True)],
  BASES_JS + """
omni.onResult(["number"], function (ctx) {
  var n = Number(String(ctx.getRawInput("number")).replace(/[^0-9.\\-]/g, ""));
  ctx.exportValue("hex", isFinite(n) ? toBase(n, 16) : "");
  ctx.exportValue("binary", isFinite(n) ? toBase(n, 2) : "");
  ctx.exportValue("octal", isFinite(n) ? toBase(n, 8) : "");
});
""")

S("decimal-to-octal", "Decimal to Octal Converter",
  "Base eight survives in file permissions and in a few old interfaces. The page converts a "
  "decimal count into octal, binary and hexadecimal at once.",
  [F("number", "Decimal number", default="64")],
  [out("octal", "Octal", type="text", readonly=True),
   out("binary", "Binary", type="text", readonly=True),
   out("hex", "Hexadecimal", type="text", readonly=True)],
  BASES_JS + """
omni.onResult(["number"], function (ctx) {
  var n = Number(String(ctx.getRawInput("number")).replace(/[^0-9.\\-]/g, ""));
  ctx.exportValue("octal", isFinite(n) ? toBase(n, 8) : "");
  ctx.exportValue("binary", isFinite(n) ? toBase(n, 2) : "");
  ctx.exportValue("hex", isFinite(n) ? toBase(n, 16) : "");
});
""")

S("hexadecimal", "Hexadecimal Converter",
  "A hexadecimal figure read back into decimal, binary and octal. Letters are case-insensitive, "
  "and a leading 0x is ignored.",
  [T("hex", "Hexadecimal", default="FF")],
  [out("decimal", "Decimal", readonly=True),
   out("binary", "Binary", type="text", readonly=True),
   out("octal", "Octal", type="text", readonly=True)],
  BASES_JS + """
omni.onResult(["hex"], function (ctx) {
  var raw = String(ctx.getRawInput("hex")).replace(/^0x/i, "").replace(/[^0-9a-f]/gi, "");
  var n = raw ? parseInt(raw, 16) : NaN;
  ctx.exportValue("decimal", isFinite(n) ? n : "");
  ctx.exportValue("binary", isFinite(n) ? toBase(n, 2) : "");
  ctx.exportValue("octal", isFinite(n) ? toBase(n, 8) : "");
});
""")

S("roman-numerals", "Roman Numerals Converter",
  "Roman numerals are a subtractive notation: four is IV rather than IIII, and nine is IX "
  "rather than VIIII. The page converts in both directions at once.",
  [T("number", "Number", default="1987"),
   T("roman", "Roman numerals", default="MMXXIV")],
  [out("roman_out", "As Roman numerals", type="text", readonly=True),
   out("arabic_out", "As a number", readonly=True),
   out("length", "Length of the numeral", readonly=True)],
  """
var PAIRS = [[1000,"M"],[900,"CM"],[500,"D"],[400,"CD"],[100,"C"],[90,"XC"],
             [50,"L"],[40,"XL"],[10,"X"],[9,"IX"],[5,"V"],[4,"IV"],[1,"I"]];
function toRoman(n) {
  if (!isFinite(n) || n <= 0 || n >= 4000) return "";
  var s = "";
  for (var i = 0; i < PAIRS.length; i++) {
    while (n >= PAIRS[i][0]) { s += PAIRS[i][1]; n -= PAIRS[i][0]; }
  }
  return s;
}
function fromRoman(text) {
  var map = {I:1,V:5,X:10,L:50,C:100,D:500,M:1000};
  var s = String(text).toUpperCase().replace(/[^IVXLCDM]/g, ""), total = 0;
  for (var i = 0; i < s.length; i++) {
    var v = map[s.charAt(i)], next = map[s.charAt(i + 1)] || 0;
    total += v < next ? -v : v;
  }
  return s ? total : NaN;
}
omni.onResult(["number", "roman"], function (ctx) {
  var n = Number(String(ctx.getRawInput("number")).replace(/[^0-9]/g, ""));
  var r = toRoman(n);
  ctx.exportValue("roman_out", r);
  var arabic = fromRoman(ctx.getRawInput("roman"));
  ctx.exportValue("arabic_out", isFinite(arabic) ? arabic : "");
  ctx.exportValue("length", r ? r.length : "");
});
""")

# --------------------------------------------------------------------- ciphers
S("leet-speak", "Leet Speak Converter",
  "Leet renders letters as digits that look like them: A as 4, E as 3, I as 1, O as 0, S as 5 "
  "and T as 7. The page applies one fixed table to whatever you type.",
  [T("text", "Text", default="Elite hacker")],
  [out("leet", "Leet", type="text", readonly=True),
   out("changed", "Letters replaced", readonly=True),
   out("length", "Characters", readonly=True)],
  """
var MAP = {A:"4",B:"8",E:"3",G:"6",I:"1",L:"1",O:"0",S:"5",T:"7",Z:"2"};
omni.onResult(["text"], function (ctx) {
  var raw = String(ctx.getRawInput("text"));
  var out = "", changed = 0;
  for (var i = 0; i < raw.length; i++) {
    var ch = raw.charAt(i), up = ch.toUpperCase();
    if (MAP[up] && ch !== " ") { out += MAP[up]; changed++; }
    else { out += ch; }
  }
  ctx.exportValue("leet", out);
  ctx.exportValue("changed", changed);
  ctx.exportValue("length", raw.length);
});
""")

S("gematria", "Gematria Calculator",
  "English gematria gives each letter a number from one to twenty-six and adds them. The page "
  "reports the total and the single-digit reduction used in numerology.",
  [T("text", "Text", default="hello")],
  [out("total", "Total", readonly=True),
   out("reduced", "Reduced to one digit", readonly=True),
   out("letters", "Letters counted", readonly=True)],
  """
omni.onResult(["text"], function (ctx) {
  var raw = String(ctx.getRawInput("text")).toUpperCase().replace(/[^A-Z]/g, "");
  var total = 0;
  for (var i = 0; i < raw.length; i++) total += raw.charCodeAt(i) - 64;
  var r = total;
  while (r > 9) { var s = String(r), t = 0; for (var j = 0; j < s.length; j++) t += Number(s.charAt(j)); r = t; }
  ctx.exportValue("total", raw ? total : "");
  ctx.exportValue("reduced", raw ? r : "");
  ctx.exportValue("letters", raw.length);
});
""")

S("greek-gematria", "Greek Gematria Calculator",
  "The Greek alphabet carries the isopsephy values used in Greek gematria: alpha is 1, iota is "
  "10, rho is 100 and omega is 800. The page adds them letter by letter.",
  [T("text", "Greek text", default="λόγος")],
  [out("total", "Total", readonly=True),
   out("letters", "Letters counted", readonly=True),
   out("words", "Words", readonly=True)],
  """
var VALUES = {"Α":1,"Β":2,"Γ":3,"Δ":4,"Ε":5,"Ζ":7,"Η":8,"Θ":9,"Ι":10,"Κ":20,"Λ":30,"Μ":40,
              "Ν":50,"Ξ":60,"Ο":70,"Π":80,"Ρ":100,"Σ":200,"Τ":300,"Υ":400,"Φ":500,"Χ":600,
              "Ψ":700,"Ω":800,"Ϛ":6,"Ͱ":8};
omni.onResult(["text"], function (ctx) {
  var raw = String(ctx.getRawInput("text")).toUpperCase()
    .normalize("NFD").replace(/[\u0300-\u036f]/g, "");
  var total = 0, letters = 0;
  for (var i = 0; i < raw.length; i++) {
    var ch = raw.charAt(i);
    if (VALUES[ch] === undefined) continue;
    total += VALUES[ch]; letters++;
  }
  var words = raw.trim() ? raw.trim().split(/\\s+/).length : 0;
  ctx.exportValue("total", letters ? total : "");
  ctx.exportValue("letters", letters);
  ctx.exportValue("words", words);
});
""")

S("unicode-text", "Unicode Text Converter",
  "Every character has a code point. The page writes each one in the U plus four hex digits "
  "form, and reports how many there are.",
  [T("text", "Text", default="A")],
  [out("codes", "Code points", type="text", readonly=True),
   out("count", "Characters", readonly=True),
   out("bytes", "UTF-8 bytes", readonly=True)],
  """
function pad4(hex) { while (hex.length < 4) hex = "0" + hex; return hex.toUpperCase(); }
omni.onResult(["text"], function (ctx) {
  var raw = String(ctx.getRawInput("text"));
  var parts = [], bytes = 0;
  for (var i = 0; i < raw.length; i++) {
    var code = raw.codePointAt(i);
    parts.push("U+" + pad4(code.toString(16)));
    bytes += code < 0x80 ? 1 : code < 0x800 ? 2 : code < 0x10000 ? 3 : 4;
    if (code > 0xFFFF) i++;
  }
  ctx.exportValue("codes", parts.join(" "));
  ctx.exportValue("count", raw.length);
  ctx.exportValue("bytes", bytes);
});
""")

S("uppercase-to-lowercase-converter", "Uppercase to Lowercase Converter",
  "Case is a property of a character, not of a word, and some letters map to more than one. "
  "The page lowercases the text and counts what changed.",
  [T("text", "Text", default="The Quick Brown Fox")],
  [out("lower", "Lowercase", type="text", readonly=True),
   out("changed", "Characters changed", readonly=True),
   out("length", "Characters", readonly=True)],
  """
omni.onResult(["text"], function (ctx) {
  var raw = String(ctx.getRawInput("text"));
  var lower = raw.toLowerCase(), changed = 0;
  for (var i = 0; i < raw.length; i++) if (raw.charAt(i) !== lower.charAt(i)) changed++;
  ctx.exportValue("lower", lower);
  ctx.exportValue("changed", changed);
  ctx.exportValue("length", raw.length);
});
""")

S("lowercase-to-uppercase-converter", "Lowercase to Uppercase Converter",
  "The other direction, with the same count of changed characters so you can see how much of "
  "the text was already in capitals.",
  [T("text", "Text", default="the quick brown fox")],
  [out("upper", "Uppercase", type="text", readonly=True),
   out("changed", "Characters changed", readonly=True),
   out("length", "Characters", readonly=True)],
  """
omni.onResult(["text"], function (ctx) {
  var raw = String(ctx.getRawInput("text"));
  var upper = raw.toUpperCase(), changed = 0;
  for (var i = 0; i < raw.length; i++) if (raw.charAt(i) !== upper.charAt(i)) changed++;
  ctx.exportValue("upper", upper);
  ctx.exportValue("changed", changed);
  ctx.exportValue("length", raw.length);
});
""")

# ---------------------------------------------------------------------- colour
COLOUR_JS = """
function hexToRgb(hex) {
  var s = String(hex).replace(/^#/, "").trim();
  if (s.length === 3) s = s.charAt(0)+s.charAt(0)+s.charAt(1)+s.charAt(1)+s.charAt(2)+s.charAt(2);
  if (!/^[0-9a-f]{6}$/i.test(s)) return null;
  return {r: parseInt(s.slice(0,2),16), g: parseInt(s.slice(2,4),16), b: parseInt(s.slice(4,6),16)};
}
function pad2(n) { return (n < 16 ? "0" : "") + Math.round(n).toString(16); }
"""

S("color-converter", "Color Converter",
  "A colour can be written as six hex digits, as three 0-255 channels or as hue, saturation and "
  "lightness. The page reports all three from one entry.",
  [T("hex", "Hex colour", default="#3498db")],
  [out("rgb", "RGB", type="text", readonly=True),
   out("hsl", "HSL", type="text", readonly=True),
   out("luminance", "Relative luminance", readonly=True)],
  COLOUR_JS + """
omni.onResult(["hex"], function (ctx) {
  var c = hexToRgb(ctx.getRawInput("hex"));
  if (!c) { ctx.exportValue("rgb", ""); ctx.exportValue("hsl", ""); ctx.exportValue("luminance", ""); return; }
  var r = c.r/255, g = c.g/255, b = c.b/255;
  var max = Math.max(r,g,b), min = Math.min(r,g,b), h = 0, s = 0, l = (max+min)/2;
  if (max !== min) {
    var d = max - min;
    s = l > 0.5 ? d/(2-max-min) : d/(max+min);
    if (max === r) h = (g-b)/d + (g < b ? 6 : 0);
    else if (max === g) h = (b-r)/d + 2;
    else h = (r-g)/d + 4;
    h *= 60;
  }
  ctx.exportValue("rgb", "rgb(" + c.r + ", " + c.g + ", " + c.b + ")");
  ctx.exportValue("hsl", "hsl(" + Math.round(h) + ", " + Math.round(s*100) + "%, " + Math.round(l*100) + "%)");
  ctx.exportValue("luminance", (0.2126*r + 0.7152*g + 0.0722*b).toFixed(4));
});
""")

S("hex-to-rgb", "HEX to RGB Converter",
  "Six hex digits are three pairs of hexadecimal numbers. Each pair is one channel, from 00 to "
  "FF, which is 0 to 255 in decimal.",
  [T("hex", "Hex colour", default="#ff8800")],
  [out("r", "Red", suffix="", readonly=True),
   out("g", "Green", suffix="", readonly=True),
   out("b", "Blue", suffix="", readonly=True)],
  COLOUR_JS + """
omni.onResult(["hex"], function (ctx) {
  var c = hexToRgb(ctx.getRawInput("hex"));
  ctx.exportValue("r", c ? c.r : "");
  ctx.exportValue("g", c ? c.g : "");
  ctx.exportValue("b", c ? c.b : "");
});
""")

S("rgb-to-hex", "RGB to HEX Converter",
  "Three channels from 0 to 255 written as six hex digits, two per channel, with a clamp so a "
  "value typed outside the range cannot produce a broken colour.",
  [F("r", "Red", default="52"),
   F("g", "Green", default="152"),
   F("b", "Blue", default="219")],
  [out("hex", "Hex colour", type="text", readonly=True),
   out("rgb", "RGB", type="text", readonly=True),
   out("total", "Channel sum", readonly=True)],
  COLOUR_JS + """
function clamp(n) { return Math.max(0, Math.min(255, Math.round(n))); }
omni.onResult(["r", "g", "b"], function (ctx) {
  var r = clamp(Number(ctx.getRawInput("r")) || 0);
  var g = clamp(Number(ctx.getRawInput("g")) || 0);
  var b = clamp(Number(ctx.getRawInput("b")) || 0);
  ctx.exportValue("hex", "#" + pad2(r) + pad2(g) + pad2(b));
  ctx.exportValue("rgb", "rgb(" + r + ", " + g + ", " + b + ")");
  ctx.exportValue("total", r + g + b);
});
""")

# ------------------------------------------------------------------------ time
S("military-time", "Military Time Converter",
  "The twenty-four hour clock drops the AM and PM and keeps counting past noon: one in the "
  "afternoon is 13:00. The page reads both directions.",
  [T("time", "Time", default="3:45 PM")],
  [out("military", "24-hour time", type="text", readonly=True),
   out("hours", "Hours", readonly=True),
   out("minutes", "Minutes", readonly=True)],
  """
omni.onResult(["time"], function (ctx) {
  var raw = String(ctx.getRawInput("time")).toUpperCase().replace(/\\s+/g, "");
  var m = raw.match(/^(\\d{1,2})[:.]?(\\d{2})?(AM|PM)?$/);
  if (!m) { ctx.exportValue("military", ""); ctx.exportValue("hours", ""); ctx.exportValue("minutes", ""); return; }
  var h = Number(m[1]), mi = m[2] ? Number(m[2]) : 0, ap = m[3] || "";
  if (ap === "PM" && h < 12) h += 12;
  if (ap === "AM" && h === 12) h = 0;
  if (!ap && h > 23) { ctx.exportValue("military", ""); ctx.exportValue("hours", ""); ctx.exportValue("minutes", ""); return; }
  var hh = (h < 10 ? "0" : "") + h, mm = (mi < 10 ? "0" : "") + mi;
  ctx.exportValue("military", hh + ":" + mm);
  ctx.exportValue("hours", h);
  ctx.exportValue("minutes", mi);
});
""")

S("zulu-time-converter", "Zulu Time Converter",
  "Zulu time is UTC: the clock at zero degrees of longitude, written with a Z after it. The "
  "page converts a local clock time and a UTC offset into it.",
  [T("time", "Local time", default="14:30"),
   T("offset", "UTC offset", default="+5")],
  [out("zulu", "Zulu time", type="text", readonly=True),
   out("hours", "Hour in UTC", readonly=True),
   out("day", "Day shift", readonly=True)],
  """
omni.onResult(["time", "offset"], function (ctx) {
  var raw = String(ctx.getRawInput("time")).replace(/\\s+/g, "");
  var m = raw.match(/^(\\d{1,2})[:.](\\d{2})$/);
  var off = Number(String(ctx.getRawInput("offset")).replace(/[^0-9.\\-]/g, ""));
  if (!m || !isFinite(off)) { ctx.exportValue("zulu", ""); ctx.exportValue("hours", ""); ctx.exportValue("day", ""); return; }
  var total = Number(m[1]) * 60 + Number(m[2]) - Math.round(off * 60);
  total = ((total % 1440) + 1440) % 1440;
  var hh = Math.floor(total / 60), mm = total % 60;
  ctx.exportValue("zulu", (hh < 10 ? "0" : "") + hh + ":" + (mm < 10 ? "0" : "") + mm + "Z");
  ctx.exportValue("hours", hh);
  ctx.exportValue("day", Math.floor((Number(m[1]) * 60 + Number(m[2]) - Math.round(off * 60)) / 1440));
});
""")

S("time-zones", "Time Zones Converter",
  "One clock, two places. Give the time and the offset of each zone from UTC and the page "
  "moves the clock across the world.",
  [T("time", "Time", default="12:00"),
   T("from", "From UTC offset", default="+5"),
   T("to", "To UTC offset", default="-5")],
  [out("converted", "Time in the other zone", type="text", readonly=True),
   out("hours", "Hour there", readonly=True),
   out("minutes", "Minute there", readonly=True)],
  """
omni.onResult(["time", "from", "to"], function (ctx) {
  var raw = String(ctx.getRawInput("time")).replace(/\\s+/g, "");
  var m = raw.match(/^(\\d{1,2})[:.](\\d{2})$/);
  var a = Number(String(ctx.getRawInput("from")).replace(/[^0-9.\\-]/g, ""));
  var b = Number(String(ctx.getRawInput("to")).replace(/[^0-9.\\-]/g, ""));
  if (!m || !isFinite(a) || !isFinite(b)) { ctx.exportValue("converted", ""); ctx.exportValue("hours", ""); ctx.exportValue("minutes", ""); return; }
  var total = Number(m[1]) * 60 + Number(m[2]) + Math.round((b - a) * 60);
  total = ((total % 1440) + 1440) % 1440;
  var hh = Math.floor(total / 60), mm = total % 60;
  ctx.exportValue("converted", (hh < 10 ? "0" : "") + hh + ":" + (mm < 10 ? "0" : "") + mm);
  ctx.exportValue("hours", hh);
  ctx.exportValue("minutes", mm);
});
""")

S("unix-time", "Unix Time Converter",
  "Unix time counts seconds from midnight on 1 January 1970, UTC, and ignores leap seconds. "
  "The page reads a timestamp as a date.",
  [T("timestamp", "Unix timestamp", default="1700000000")],
  [out("date", "Date and time (UTC)", type="text", readonly=True),
   out("year", "Year", readonly=True),
   out("days", "Whole days since the epoch", readonly=True)],
  """
omni.onResult(["timestamp"], function (ctx) {
  var raw = Number(String(ctx.getRawInput("timestamp")).replace(/[^0-9.\\-]/g, ""));
  if (!isFinite(raw)) { ctx.exportValue("date", ""); ctx.exportValue("year", ""); ctx.exportValue("days", ""); return; }
  var d = new Date(raw * 1000);
  if (isNaN(d.getTime())) { ctx.exportValue("date", ""); ctx.exportValue("year", ""); ctx.exportValue("days", ""); return; }
  ctx.exportValue("date", d.toISOString().replace(".000Z", " UTC").replace("T", " "));
  ctx.exportValue("year", d.getUTCFullYear());
  ctx.exportValue("days", Math.floor(raw / 86400));
});
""")

# ---------------------------------------------------------------- coordinates
S("coordinates-converter", "Coordinates Converter",
  "A latitude or longitude can be written as a decimal or as degrees, minutes and seconds. "
  "The page writes each of the two into both forms.",
  [F("latitude", "Latitude (decimal)", default="51.507222"),
   F("longitude", "Longitude (decimal)", default="-0.1275")],
  [out("lat_dms", "Latitude in DMS", type="text", readonly=True),
   out("lon_dms", "Longitude in DMS", type="text", readonly=True),
   out("decimal", "Decimal pair", type="text", readonly=True)],
  """
function dms(value, pos, neg) {
  if (!isFinite(value)) return "";
  var hemi = value < 0 ? neg : pos;
  var a = Math.abs(value);
  var d = Math.floor(a), mFull = (a - d) * 60, m = Math.floor(mFull), s = (mFull - m) * 60;
  return d + "° " + m + "′ " + s.toFixed(1) + "″ " + hemi;
}
omni.onResult(["latitude", "longitude"], function (ctx) {
  var lat = Number(ctx.getRawInput("latitude")), lon = Number(ctx.getRawInput("longitude"));
  ctx.exportValue("lat_dms", dms(lat, "N", "S"));
  ctx.exportValue("lon_dms", dms(lon, "E", "W"));
  ctx.exportValue("decimal", isFinite(lat) && isFinite(lon) ? lat.toFixed(6) + ", " + lon.toFixed(6) : "");
});
""")

S("lat-long-to-utm", "Lat Long to UTM Converter",
  "The Universal Transverse Mercator grid divides the world into sixty zones, each six degrees "
  "of longitude wide, and gives metres east and north inside the zone.",
  [F("latitude", "Latitude", default="-33.8688"),
   F("longitude", "Longitude", default="151.2093")],
  [out("easting", "Easting", suffix="m", readonly=True),
   out("northing", "Northing", suffix="m", readonly=True),
   out("zone", "Zone", readonly=True)],
  """
var A = 6378137.0, F = 1 / 298.257223563, K0 = 0.9996;
function utm(lat, lon) {
  var zone = Math.floor((lon + 180) / 6) + 1;
  var lon0 = (zone - 1) * 6 - 180 + 3;
  var rad = Math.PI / 180;
  var e2 = 2 * F - F * F, ep2 = e2 / (1 - e2);
  var phi = lat * rad, lam = lon * rad, lam0 = lon0 * rad;
  var N = A / Math.sqrt(1 - e2 * Math.sin(phi) * Math.sin(phi));
  var T = Math.tan(phi) * Math.tan(phi);
  var C = ep2 * Math.cos(phi) * Math.cos(phi);
  var Aa = Math.cos(phi) * (lam - lam0);
  var M = A * ((1 - e2/4 - 3*e2*e2/64 - 5*e2*e2*e2/256) * phi
        - (3*e2/8 + 3*e2*e2/32 + 45*e2*e2*e2/1024) * Math.sin(2*phi)
        + (15*e2*e2/256 + 45*e2*e2*e2/1024) * Math.sin(4*phi)
        - (35*e2*e2*e2/3072) * Math.sin(6*phi));
  var easting = K0 * N * (Aa + (1 - T + C) * Math.pow(Aa,3)/6
        + (5 - 18*T + T*T + 72*C - 58*ep2) * Math.pow(Aa,5)/120) + 500000;
  var northing = K0 * (M + N * Math.tan(phi) * (Aa*Aa/2
        + (5 - T + 9*C + 4*C*C) * Math.pow(Aa,4)/24
        + (61 - 58*T + T*T + 600*C - 330*ep2) * Math.pow(Aa,6)/720));
  if (lat < 0) northing += 10000000;
  return {easting: easting, northing: northing, zone: zone + (lat >= 0 ? "N" : "S")};
}
omni.onResult(["latitude", "longitude"], function (ctx) {
  var lat = Number(ctx.getRawInput("latitude")), lon = Number(ctx.getRawInput("longitude"));
  if (!isFinite(lat) || !isFinite(lon) || lat < -80 || lat > 84) {
    ctx.exportValue("easting", ""); ctx.exportValue("northing", ""); ctx.exportValue("zone", ""); return;
  }
  var u = utm(lat, lon);
  ctx.exportValue("easting", u.easting.toFixed(2));
  ctx.exportValue("northing", u.northing.toFixed(2));
  ctx.exportValue("zone", u.zone);
});
""")

S("degrees-minutes-seconds", "Degrees Minutes Seconds Converter",
  "One degree is sixty minutes and one minute is sixty seconds, so the parts are base sixty "
  "even though the degrees themselves are decimal.",
  [F("degrees", "Degrees", default="51"),
   F("minutes", "Minutes", default="30"),
   F("seconds", "Seconds", default="26")],
  [out("decimal", "Decimal degrees", readonly=True),
   out("total_minutes", "Total minutes", readonly=True),
   out("total_seconds", "Total seconds", readonly=True)],
  """
omni.onResult(["degrees", "minutes", "seconds"], function (ctx) {
  var d = Number(ctx.getRawInput("degrees"));
  var m = Number(ctx.getRawInput("minutes"));
  var s = Number(ctx.getRawInput("seconds"));
  if (!isFinite(d) || !isFinite(m) || !isFinite(s)) {
    ctx.exportValue("decimal", ""); ctx.exportValue("total_minutes", ""); ctx.exportValue("total_seconds", ""); return;
  }
  var sign = d < 0 ? -1 : 1;
  var decimal = sign * (Math.abs(d) + m / 60 + s / 3600);
  ctx.exportValue("decimal", decimal.toFixed(6));
  ctx.exportValue("total_minutes", sign * (Math.abs(d) * 60 + m + s / 60));
  ctx.exportValue("total_seconds", sign * (Math.abs(d) * 3600 + m * 60 + s));
});
""")


# ---------------------------------------------------------------- the rules
# What each page does, written the way the script implements it. These carry the
# article: a page with no formula has to explain its rules instead of its algebra.
RULES = {
    "binary": [
        "<strong>Divide by two, keep the remainder.</strong> The remainder is the next digit from the right; the quotient is what is left to convert.",
        "<strong>Stop when the quotient is zero.</strong> The digits are read back in reverse order, which is why the loop builds the string from the front.",
        "<strong>The sign stays outside.</strong> A negative number keeps its minus sign and the magnitude is converted as usual.",
        "<strong>Decimals are dropped.</strong> A fractional part is truncated before the conversion, because the page reports the base conversion of whole numbers.",
        "<strong>Zero is a single zero.</strong> A number that reaches zero on the first division prints one digit rather than an empty string.",
    ],
    "binary-to-hexadecimal": [
        "<strong>Every character that is not a 0 or a 1 is dropped.</strong> Spaces, commas and stray letters never reach the arithmetic.",
        "<strong>Four bits make one hex digit.</strong> The page reads the whole string as one binary number, which gives the same answer as regrouping by hand without the padding rules.",
        "<strong>Leading zeros are lost.</strong> 00101010 and 101010 are the same number, and both print 2A.",
        "<strong>Empty input gives empty output.</strong> A blank box is not read as zero.",
    ],
    "binary-to-octal": [
        "<strong>Three bits make one octal digit.</strong> The same read-it-as-one-number rule, with a group size of three.",
        "<strong>Only 0 and 1 survive the clean-up.</strong> Anything else is treated as a typo and removed before the number is read.",
        "<strong>Leading zeros do not change the value.</strong> 001 010 and 1010 are both twelve in decimal.",
        "<strong>Decimal and hex are printed beside the octal figure</strong>, so a regrouping mistake shows up as a disagreement between the three columns.",
    ],
    "decimal-to-hexadecimal": [
        "<strong>Divide by sixteen and keep the remainder.</strong> Each remainder is one digit of the answer, written from the right.",
        "<strong>Remainders above nine become letters.</strong> Ten is A, eleven is B, and fifteen is F; that is the whole alphabet the base needs.",
        "<strong>The division happens on whole numbers.</strong> A decimal point is truncated before the first step.",
        "<strong>Negative input keeps its sign</strong> and is converted by magnitude.",
    ],
    "decimal-to-octal": [
        "<strong>Divide by eight and keep the remainder.</strong> The remainders, read in reverse, are the octal digits.",
        "<strong>Only 0 to 7 appear in the answer.</strong> An 8 or a 9 in an octal figure is a sign that something else was meant.",
        "<strong>Whole numbers only.</strong> The fractional part is dropped rather than converted.",
        "<strong>The binary and hex columns are the same number</strong>, so a row cannot be right in one base and wrong in the others.",
    ],
    "hexadecimal": [
        "<strong>Letters are case-insensitive.</strong> ff and FF read as the same value.",
        "<strong>A leading 0x is ignored.</strong> Pasting a value from code does not need cleaning first.",
        "<strong>Digits are read left to right, base sixteen.</strong> Each place is sixteen times the one to its right.",
        "<strong>Anything outside 0-9 and A-F is dropped</strong> before the value is read, so a stray space or quote cannot break the page.",
    ],
    "roman-numerals": [
        "<strong>Subtraction, not repetition.</strong> Four is IV and nine is IX; IIII and VIIII are not used in the standard notation.",
        "<strong>Values run from largest to smallest</strong>, with the six subtractive pairs — IV, IX, XL, XC, CD, CM — taking the place of four repeated symbols.",
        "<strong>The range is 1 to 3 999.</strong> Above that the standard form needs an overline, which this page does not print.",
        "<strong>Reading backwards is forgiving.</strong> Any letter that is not I, V, X, L, C, D or M is ignored, so a sentence pasted by accident still converts.",
        "<strong>A smaller symbol before a larger one subtracts.</strong> That single rule is what makes both directions work from one table.",
    ],
    "leet-speak": [
        "<strong>One fixed table, applied letter by letter.</strong> A becomes 4, E becomes 3, G becomes 6, I and L become 1, O becomes 0, S becomes 5, T becomes 7, B becomes 8 and Z becomes 2.",
        "<strong>Case is ignored.</strong> A lower-case a and an upper-case A both become 4.",
        "<strong>Everything else is copied unchanged.</strong> Spaces, punctuation and digits pass through, so an already-leet string survives a second run.",
        "<strong>The count reports substitutions, not characters.</strong> It is the number of letters the table matched.",
        "<strong>There are many leet alphabets.</strong> This one is the common numeric substitution; the page does not attempt the symbol-heavy variants.",
    ],
    "gematria": [
        "<strong>A is 1 and Z is 26.</strong> Every letter takes its position in the alphabet as its value.",
        "<strong>Only letters are counted.</strong> Spaces, punctuation and digits are dropped before the sum.",
        "<strong>Case is ignored.</strong> The text is upper-cased first, so the value does not depend on how it was typed.",
        "<strong>The reduced value is one digit.</strong> The digits of the total are summed and the process repeated until one digit remains.",
        "<strong>The total is a sum, not a cipher.</strong> Different words can share a total, and that is the point of the practice rather than a flaw in it.",
    ],
    "greek-gematria": [
        "<strong>Values follow the Greek place system.</strong> Alpha to theta are 1 to 9, iota to koppa are 10 to 90, and rho to omega are 100 to 800.",
        "<strong>Accents and breathings are removed first.</strong> λόγος and λογος carry the same value, because a diacritic is not a letter.",
        "<strong>The final sigma counts as a sigma.</strong> Both forms are 200.",
        "<strong>Only Greek letters are counted</strong>, so a stray Latin word adds nothing.",
        "<strong>The word count is reported separately</strong>, because gematria is sometimes compared per word rather than per phrase.",
    ],
    "unicode-text": [
        "<strong>Every character becomes U plus four hex digits.</strong> A becomes U+0041; the padding makes the column readable rather than changing the value.",
        "<strong>Characters outside the basic plane take five or six digits.</strong> They are one character even though JavaScript stores them as two units, which is why the loop steps twice.",
        "<strong>The byte count is UTF-8, not characters.</strong> An accented letter is two bytes and an emoji is four.",
        "<strong>Spaces are converted too.</strong> U+0020 is a code point like any other.",
    ],
    "uppercase-to-lowercase-converter": [
        "<strong>Lower-casing is a per-character property, not a word rule.</strong> The page does not try to guess proper nouns and leaves nothing capitalised.",
        "<strong>The count is how many characters changed.</strong> It measures how much of the text was in capitals.",
        "<strong>Accented letters fold with their base letter.</strong> É becomes é, and the character count does not change.",
        "<strong>Lengths can differ across scripts.</strong> A very small number of characters lowercase into more than one unit, and the page reports the length it was given.",
    ],
    "lowercase-to-uppercase-converter": [
        "<strong>Upper-casing every character</strong> is the whole rule; there is no title-case guesswork.",
        "<strong>Digits and punctuation pass through unchanged</strong>, so a URL or a code keeps its shape.",
        "<strong>The count is characters changed</strong>, which is the length minus the number that were already upper-case.",
        "<strong>Case folding is locale-independent.</strong> The page uses the standard mapping rather than a language-specific one.",
    ],
    "color-converter": [
        "<strong>Three-digit hex is expanded first.</strong> #abc means #aabbcc, with each digit doubled.",
        "<strong>Each pair is one channel</strong>, read as a hexadecimal number from 0 to 255.",
        "<strong>Hue is the angle round the colour wheel.</strong> Saturation and lightness are percentages, computed from the largest and smallest channel.",
        "<strong>Luminance is not lightness.</strong> It weights green most heavily, which is why a saturated blue and a saturated yellow of the same lightness have very different luminances.",
        "<strong>An invalid hex leaves the boxes empty</strong> rather than guessing a colour.",
    ],
    "hex-to-rgb": [
        "<strong>Six digits are three pairs.</strong> The first pair is red, the second green, the third blue.",
        "<strong>Each pair is hexadecimal</strong>, so FF is 255 and 80 is 128.",
        "<strong>A three-digit form is expanded</strong> before the split, so #f80 and #ff8800 give the same channels.",
        "<strong>Anything that is not a hex digit is dropped</strong>, including the leading hash.",
    ],
    "rgb-to-hex": [
        "<strong>Each channel is clamped to 0-255</strong> and rounded, so a value typed outside the range cannot produce a colour that does not exist.",
        "<strong>Each channel becomes two hex digits</strong>, padded with a leading zero when it is below sixteen.",
        "<strong>The three pairs are joined behind a hash</strong>, which is the six-digit form CSS expects.",
        "<strong>Blank boxes are read as zero</strong>, not as an error, because a channel of zero is a valid component.",
    ],
    "military-time": [
        "<strong>PM adds twelve to the hour</strong>, except for twelve itself, which stays noon.",
        "<strong>AM takes twelve away</strong>, which is how midnight becomes 00.",
        "<strong>Both parts are padded to two digits</strong>, so nine in the morning is 09:00 rather than 9:0.",
        "<strong>Input with no AM or PM is read as a 24-hour time</strong>, as long as the hour is 23 or less.",
        "<strong>Anything unreadable leaves the boxes empty.</strong> A time the page cannot parse is not quietly replaced by a default.",
    ],
    "zulu-time-converter": [
        "<strong>Zulu time is UTC</strong>, the clock at zero degrees of longitude, written with a Z.",
        "<strong>The offset is subtracted</strong>, because a place ahead of UTC has to have its local time wound back to reach Zulu.",
        "<strong>The day rolls over silently.</strong> 02:00 at +5 becomes 21:00Z on the previous day, and the day column reports the shift.",
        "<strong>Half-hour offsets work</strong>: 5.5 is a real offset, and the arithmetic is done in minutes.",
        "<strong>Daylight saving is not applied.</strong> The offset is a box, so the page uses the number you give it.",
    ],
    "time-zones": [
        "<strong>Convert through UTC.</strong> The first offset takes the local time back to UTC and the second brings it forward.",
        "<strong>Offsets are decimal hours.</strong> Five and a half is written 5.5.",
        "<strong>The clock wraps through midnight.</strong> A result below zero gains a day and a result above 24 loses one, and only the time is printed.",
        "<strong>The page is not a database of cities.</strong> Two numbers, two offsets: it cannot know that a country changed its rules last year.",
        "<strong>Minutes are preserved exactly</strong>, so a half-hour zone shifts the clock by thirty minutes and no more.",
    ],
    "unix-time": [
        "<strong>The epoch is midnight, 1 January 1970, UTC.</strong> Every timestamp is a count of seconds from that point.",
        "<strong>Leap seconds are ignored</strong> by the standard, which is why a timestamp is not a count of SI seconds across a leap.",
        "<strong>The timestamp is read as UTC</strong>, not as local time, so the same number gives the same date everywhere.",
        "<strong>Negative values are dates before the epoch</strong> and are handled rather than rejected.",
        "<strong>The whole-day column is a floor</strong>, so it counts completed days rather than the one in progress.",
    ],
    "coordinates-converter": [
        "<strong>One degree is sixty minutes and one minute is sixty seconds.</strong> The fractional part of a degree is multiplied by sixty for minutes, and the fraction of that by sixty for seconds.",
        "<strong>The hemisphere letter replaces the sign.</strong> A negative latitude is S and a negative longitude is W.",
        "<strong>Seconds are shown to one decimal</strong>, which is about three metres on the ground.",
        "<strong>The decimal pair is printed to six places</strong>, about ten centimetres; more is beyond what a decimal degree figure usually carries.",
        "<strong>Latitude and longitude are handled separately</strong>, because they are different variables with the same conversion.",
    ],
    "lat-long-to-utm": [
        "<strong>Sixty zones of six degrees</strong>, numbered from one at 180° west and lettered by latitude band.",
        "<strong>The projection is transverse Mercator on a WGS 84 ellipsoid</strong>, with a scale factor of 0.9996 and a false easting of 500 000 metres.",
        "<strong>Southern latitudes gain ten million metres</strong> so that the northing is never negative.",
        "<strong>The zone is part of the answer.</strong> A pair of numbers without its zone is not a location.",
        "<strong>The range is 80°S to 84°N.</strong> Outside it the grid is not defined and the page leaves the boxes empty.",
    ],
    "degrees-minutes-seconds": [
        "<strong>Minutes and seconds are base sixty.</strong> A value of 60 in either box is a whole degree or a whole minute, and the arithmetic carries it.",
        "<strong>The sign comes from the degrees.</strong> A negative latitude with positive minutes stays negative rather than flipping at the minute.",
        "<strong>Total minutes and total seconds are also reported</strong>, because some formats want one number rather than three.",
        "<strong>Decimal degrees are printed to six places.</strong> That is the precision most mapping services accept.",
        "<strong>Every part must be a number.</strong> An empty box leaves the row blank rather than being read as zero.",
    ],
}

# ------------------------------------------------------------- the examples
# Inputs whose output the browser QA also checks, so the figures in the article
# are the figures the page produces.
EXAMPLES = {
    "binary": [{"number": "10"}, {"number": "255"}, {"number": "1000"}],
    "binary-to-hexadecimal": [{"binary": "1111"}, {"binary": "101010"}, {"binary": "11111111"}],
    "binary-to-octal": [{"binary": "111"}, {"binary": "101010"}, {"binary": "1000000"}],
    "decimal-to-hexadecimal": [{"number": "16"}, {"number": "255"}, {"number": "4095"}],
    "decimal-to-octal": [{"number": "8"}, {"number": "64"}, {"number": "512"}],
    "hexadecimal": [{"hex": "10"}, {"hex": "FF"}, {"hex": "BEEF"}],
    "roman-numerals": [{"number": "4", "roman": "IX"}, {"number": "1987", "roman": "MMXXIV"},
                       {"number": "3999", "roman": "XLII"}],
    "leet-speak": [{"text": "hello"}, {"text": "Elite hacker"}, {"text": "Onim tools"}],
    "gematria": [{"text": "hello"}, {"text": "world"}, {"text": "Onim"}],
    "greek-gematria": [{"text": "λόγος"}, {"text": "σοφία"}, {"text": "κόσμος"}],
    "unicode-text": [{"text": "A"}, {"text": "é"}, {"text": "Onim"}],
    "uppercase-to-lowercase-converter": [{"text": "HELLO"}, {"text": "The Quick Brown Fox"},
                                         {"text": "already lower"}],
    "lowercase-to-uppercase-converter": [{"text": "hello"}, {"text": "the quick brown fox"},
                                         {"text": "ALREADY UPPER"}],
    "color-converter": [{"hex": "#000000"}, {"hex": "#3498db"}, {"hex": "#fff"}],
    "hex-to-rgb": [{"hex": "#000000"}, {"hex": "#ff8800"}, {"hex": "#3498db"}],
    "rgb-to-hex": [{"r": "0", "g": "0", "b": "0"}, {"r": "52", "g": "152", "b": "219"},
                   {"r": "255", "g": "136", "b": "0"}],
    "military-time": [{"time": "12:00 AM"}, {"time": "3:45 PM"}, {"time": "12:00 PM"}],
    "zulu-time-converter": [{"time": "12:00", "offset": "0"}, {"time": "14:30", "offset": "+5"},
                            {"time": "02:00", "offset": "+5"}],
    "time-zones": [{"time": "12:00", "from": "0", "to": "0"},
                   {"time": "12:00", "from": "5", "to": "-5"},
                   {"time": "23:00", "from": "5", "to": "9"}],
    "unix-time": [{"timestamp": "0"}, {"timestamp": "1700000000"}, {"timestamp": "1000000000"}],
    "coordinates-converter": [{"latitude": "0", "longitude": "0"},
                              {"latitude": "51.507222", "longitude": "-0.1275"},
                              {"latitude": "-33.8688", "longitude": "151.2093"}],
    "lat-long-to-utm": [{"latitude": "0.0001", "longitude": "0.0001"},
                        {"latitude": "-33.8688", "longitude": "151.2093"},
                        {"latitude": "51.5072", "longitude": "-0.1275"}],
    "degrees-minutes-seconds": [{"degrees": "0", "minutes": "0", "seconds": "0"},
                                {"degrees": "51", "minutes": "30", "seconds": "26"},
                                {"degrees": "-33", "minutes": "52", "seconds": "8"}],
}

EXTRA = {'hexadecimal': '<p>The hexadecimal alphabet runs 0 to 9 and then A to F, which is sixteen symbols for a base of sixteen. Two hex digits are one byte, so a colour, a memory address and a machine instruction are all written this way for the same reason: the figure maps onto the hardware in groups of four bits without any conversion in between.</p><p>The reason the page also prints binary is that hex is a shorthand for it. Every hex digit is exactly four binary digits, three hex digits are twelve bits, and so on; once the binary column is beside the hex one, the shorthand is visible rather than remembered.</p>', 'greek-gematria': '<p>The values are not arbitrary. The Greek alphabet was also the numeral system: alpha to theta stood for 1 to 9, iota to koppa for 10 to 90, and rho to omega for 100 to 800, with three obsolete letters filling the places that would otherwise be missing. That is why the values jump in tens and hundreds rather than counting straight through.</p><p>Because the mapping is a numeral system, the total of a word is what the numerals spelled out by its letters would come to if they were read as numbers. Isopsephy is the practice of comparing those totals; this page does the arithmetic and leaves the interpretation alone.</p>', 'rgb-to-hex': '<p>The three channels are additive: red, green and blue light added in those proportions make the colour, and 0, 0, 0 is black because nothing is lit. That is why a channel value of 255 is full brightness rather than a large number, and why the sum of the three channels says almost nothing about how the colour looks.</p><p>Two hex digits hold 256 values, which is why the channel range stops at 255 rather than at a round decimal number. A value typed above that is clamped rather than wrapped: 300 becomes 255, not 44.</p>', 'military-time': '<p>Nothing about the twenty-four hour clock is military. It is the civil convention in most of the world, and the name survives because the armed forces adopted it early to remove the ambiguity of AM and PM from a message read once.</p><p>The one place the two systems genuinely differ is midnight. Twelve AM is 00:00 and twelve PM is 12:00, so a schedule that says "midnight" is ambiguous unless it names the date as well — which is the reason the standard writes 23:59 and 00:01 instead.</p>'}

for _spec in SPECS:
    _spec.prose["rules"] = RULES.get(_spec.slug, [])
    if _spec.slug in EXTRA:
        _spec.prose["extra_title"] = "More on this conversion"
        _spec.prose["extra"] = EXTRA[_spec.slug]
    _spec.prose["examples"] = EXAMPLES.get(_spec.slug, [])
