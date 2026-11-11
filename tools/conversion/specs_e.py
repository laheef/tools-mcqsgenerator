"""The 23 pages whose working is a script rather than an equation."""

from gen import R, T
from make import script_page

SPECS = []

JS_HEAD = '"use strict";\n'

NOTE = ("applies a fixed set of rules to what you type, which is why the formula table is "
        "empty and the script below it is the calculator")


def S(slug, name, what, fields, results, js, prose=None):
    SPECS.append(script_page(slug, name, what, fields, results, JS_HEAD + js.strip(), NOTE, prose))


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
  [T("number", "Decimal number", default="42")],
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
  [T("number", "Decimal number", default="255")],
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
  [T("number", "Decimal number", default="64")],
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
  [T("r", "Red", default="52"),
   T("g", "Green", default="152"),
   T("b", "Blue", default="219")],
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
  [T("latitude", "Latitude (decimal)", default="51.507222"),
   T("longitude", "Longitude (decimal)", default="-0.1275")],
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
  [T("latitude", "Latitude", default="-33.8688"),
   T("longitude", "Longitude", default="151.2093")],
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
  [T("degrees", "Degrees", default="51"),
   T("minutes", "Minutes", default="30"),
   T("seconds", "Seconds", default="26")],
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
