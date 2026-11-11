"""Everyday-life specs, batch A: time, dates and the everyday measurements.

Every page here is arithmetic a person can check on the back of an envelope:
distance over time, watts times hours, words divided by minutes. The writing
says where the number comes from and where it stops being true.
"""

from __future__ import annotations

from lib import D, F, R, SEL, S

SPECS = []

# --------------------------------------------------------------------- speed

SPECS.append(S(
    slug="speed",
    name="Speed Calculator",
    title="Speed Calculator — From Distance and Time",
    desc="Divide the distance you covered by the time it took and the page returns speed in "
         "km/h, mph and m/s, plus the pace in minutes per kilometre. Formula shown.",
    what="Speed is distance divided by time, and that is all this page does. Type the distance "
         "you covered and the time it took; the panel returns the speed in three units and the "
         "pace, which is the same number written the other way up.",
    fields=[
        F("distance", "Distance", "km", 10, "The distance covered, in kilometres."),
        F("hours", "Hours", "h", 0, "Whole hours of the trip."),
        F("minutes", "Minutes", "min", 30, "The rest of the time, in minutes."),
    ],
    results=[
        R("speed", "Speed", "km/h"),
        R("mph", "Speed in miles per hour", "mph"),
        R("ms", "Speed in metres per second", "m/s"),
        R("pace", "Pace", "min/km"),
    ],
    formula={
        "speed": "distance / (hours + minutes / 60)",
        "mph": "distance / (hours + minutes / 60) / 1.609344",
        "ms": "distance / (hours + minutes / 60) / 3.6",
        "pace": "(hours + minutes / 60) * 60 / distance",
    },
    prose={
        "why": "<p>A speed is a distance with a time attached. Ten kilometres in half an hour "
               "is twenty kilometres an hour, and every other reading on the page is that same "
               "fact in a different unit. The pace says it in the unit runners use: minutes per "
               "kilometre rather than kilometres per hour.</p>"
               "<p>Two of the four readings are exact conversions. The mile is 1.609 344 km by "
               "definition, and an hour is 3 600 seconds, so neither conversion loses anything.</p>",
        "formula_note": "The division by 60 turns the minutes box into a fraction of an hour. "
                        "Typing 30 minutes as 0.5 hours gives the same answer, and typing both "
                        "would count the half hour twice.",
        "reading": "Twenty kilometres an hour is a brisk bicycle ride and a slow car. A pace of "
                   "3 min/km is a strong runner; 6 min/km is a steady jog; 12 min/km is a walk "
                   "with shopping. Read the speed and the pace together, because a reader who "
                   "thinks in one will misjudge the other.",
        "example_note": "Ten kilometres in half an hour is the arithmetic of a commute, not a "
                        "race, and the pace of 3 min/km shows how fast that actually is.",
        "pitfalls": [
            "<strong>Minutes typed as a decimal hour.</strong> 1 h 30 min is 1.5 hours, not 1.30. "
            "The page adds the two boxes, so the mistake is only visible in the answer.",
            "<strong>Distance in miles with a time in hours.</strong> The speed then comes out "
            "in miles per hour, while the box beside it says km/h. Convert first, or read the "
            "mph line and ignore the rest.",
        ],
        "limits": [
            "<li><strong>It is an average.</strong> A trip that includes a coffee stop is "
            "slower than the driving between stops, and this page cannot tell the difference.</li>",
            "<li><strong>No traffic, no wind, no gradient.</strong> The number is arithmetic on "
            "the two boxes; the world adds resistance the boxes do not mention.</li>",
        ],
        "uses": [
            "<li>Checking a journey time against the distance on a map.</li>",
            "<li>Settling an argument about how fast a walk actually was.</li>",
            "<li>Turning a race time into a pace for training.</li>",
        ],
        "scenarios": [
            {"inputs": {"distance": 42.195, "hours": 4, "minutes": 0},
             "note": "A marathon in four hours is 10.55 km/h, or 5 min 41 s per kilometre."},
            {"inputs": {"distance": 2, "hours": 0, "minutes": 25},
             "note": "Two kilometres in twenty-five minutes is a walking pace of 4.8 km/h."},
        ],
        "bands": [
            ("3–5 km/h", "Walking, on flat ground, with no load."),
            ("12–20 km/h", "Cycling at a commuter pace."),
            ("30–50 km/h", "A car in town."),
            ("90–120 km/h", "A car on a motorway."),
        ],
    },
    faq=[
        ("Why is the pace in minutes per kilometre rather than km/h?",
         "Because a pace is what you can divide by on the move. If a kilometre takes five "
         "minutes, the next kilometre will also take five minutes, and the arithmetic stays in "
         "your head."),
        ("Can I mix miles and kilometres?",
         "Not in one run. Put the distance in the unit the box names, read the speed in the "
         "same unit, and use the mph line only after converting the distance to kilometres."),
    ],
    related=[("/everyday-life/drive-time", "Drive time"),
             ("/everyday-life/fuel-cost", "Fuel cost"),
             ("/everyday-life/speed", "Speed calculator")],
    checks=[
        ({"distance": 10, "hours": 0, "minutes": 30},
         {"speed": 20, "mph": 12.4274, "ms": 5.5556, "pace": 3}, 0.001),
        ({"distance": 42.195, "hours": 4, "minutes": 0},
         {"speed": 10.5488, "mph": 6.5546, "ms": 2.9302, "pace": 5.6878}, 0.001),
        ({"distance": 2, "hours": 0, "minutes": 25},
         {"speed": 4.8, "mph": 2.9826, "ms": 1.3333, "pace": 12.5}, 0.001),
    ],
))

# ---------------------------------------------------------- electricity cost

SPECS.append(S(
    slug="electricity-cost",
    name="Electricity Cost Calculator",
    title="Electricity Cost Calculator — Watts to Bill",
    desc="Enter an appliance's wattage, how long it runs and your price per kWh, and the page "
         "returns the energy it uses and what that energy costs per day and per year.",
    what="An appliance's cost is its power in kilowatts multiplied by the hours it runs, "
         "multiplied again by the price of a kilowatt-hour. The page does that in three steps "
         "and shows each one, so you can see whether the daily figure or the yearly one is the "
         "one that should worry you.",
    fields=[
        F("watts", "Power", "W", 1500, "The wattage on the label or in the manual."),
        F("hours", "Hours used per day", "h", 2, "How long it runs on an average day."),
        F("days", "Days per year", "days", 365, "Use 365, or fewer for a seasonal appliance."),
        F("price", "Price of electricity", "per kWh", 0.28,
          "Your tariff, per kilowatt-hour. Check a recent bill rather than a memory."),
    ],
    results=[
        R("kwh_day", "Energy per day", "kWh"),
        R("kwh_year", "Energy per year", "kWh"),
        R("cost_day", "Cost per day", ""),
        R("cost_year", "Cost per year", ""),
    ],
    formula={
        "kwh_day": "watts / 1000 * hours",
        "kwh_year": "watts / 1000 * hours * days",
        "cost_day": "watts / 1000 * hours * price",
        "cost_year": "watts / 1000 * hours * days * price",
    },
    prose={
        "why": "<p>A kilowatt-hour is one kilowatt for one hour: a 1 000 W heater running for "
               "sixty minutes has used exactly one. Everything on this page follows from that "
               "sentence. The wattage is divided by a thousand to turn it into kilowatts, "
               "multiplied by the hours, and multiplied by the price.</p>"
               "<p>The yearly figure is the one to compare against a bill. The daily figure is "
               "the one to compare against a habit.</p>",
        "formula_note": "The two cost lines are the energy lines multiplied by the tariff, so "
                        "cost per day is cost per year divided by the number of days. If those "
                        "two disagree, a box has been typed in the wrong place.",
        "reading": "A 1 500 W appliance for two hours a day is 3 kWh a day. At 0.28 per kWh that "
                   "is 0.84 a day, or about 307 a year. Whether that is a lot depends on the "
                   "appliance: a kettle used twice a day is not a tumble dryer used twice a day, "
                   "even when the wattages are similar, because the hours are not.",
        "example_note": "Standby power is the same arithmetic with a small wattage and 24 hours: "
                        "10 W left on all year is 87.6 kWh, which is real money for doing "
                        "nothing.",
        "sensitivity_note": "The hours box and the price box move the cost in the same "
                            "proportion, which is why the table shows the same percentage twice.",
        "pitfalls": [
            "<strong>The label says 1 500 W, not 1 500 W every hour.</strong> A heater cycles. "
            "A fridge cycles more. Use the hours that reflect the duty cycle, not the hours it "
            "is plugged in.",
            "<strong>Price per unit, not the whole bill.</strong> A bill includes standing "
            "charges and taxes. The tariff per kWh is the number that multiplies energy.",
        ],
        "limits": [
            "<li><strong>It models one appliance.</strong> Two appliances are two runs of this "
            "page, added by hand.</li>",
            "<li><strong>It uses your tariff, not your bill.</strong> Standing charges, "
            "time-of-use rates and tax are outside the multiplication.</li>",
        ],
        "uses": [
            "<li>Deciding whether a second-hand freezer is cheap.</li>",
            "<li>Working out what an hour of heating costs.</li>",
            "<li>Comparing an old appliance with its replacement.</li>",
        ],
        "scenarios": [
            {"inputs": {"watts": 10, "hours": 24, "days": 365, "price": 0.28},
             "note": "Ten watts on all year: 87.6 kWh, about 25 a year for standby alone."},
            {"inputs": {"watts": 2000, "hours": 0.25, "days": 365, "price": 0.28},
             "note": "A 2 kW kettle boiled for a quarter of an hour a day: 45.6 a year."},
        ],
        "bands": [
            ("Under 100 kWh a year", "A small always-on device."),
            ("300–800 kWh a year", "A large appliance used daily."),
            ("Over 2 000 kWh a year", "Heating, cooling or hot water."),
        ],
    },
    faq=[
        ("Is a kilowatt the same as a kilowatt-hour?",
         "No. A kilowatt is a rate; a kilowatt-hour is an amount. A 1 000 W appliance running "
         "for one hour uses one kilowatt-hour; running for two hours uses two."),
        ("Why does the yearly figure assume 365 days?",
         "Because that is the default. A seasonal appliance should use the days it actually "
         "runs, or the yearly number will be an overestimate."),
    ],
    related=[("/everyday-life/led-savings", "LED savings"),
             ("/everyday-life/shower-cost", "Shower cost"),
             ("/everyday-life/appliance-wattage", "Appliance wattage")],
    checks=[
        ({"watts": 1500, "hours": 2, "days": 365, "price": 0.28},
         {"kwh_day": 3, "kwh_year": 1095, "cost_day": 0.84, "cost_year": 306.6}, 0.001),
        ({"watts": 10, "hours": 24, "days": 365, "price": 0.28},
         {"kwh_day": 0.24, "kwh_year": 87.6, "cost_day": 0.0672, "cost_year": 24.528}, 0.001),
        ({"watts": 2000, "hours": 0.25, "days": 365, "price": 0.28},
         {"kwh_day": 0.5, "kwh_year": 182.5, "cost_day": 0.14, "cost_year": 51.1}, 0.001),
    ],
))

# ---------------------------------------------------------------- reading

SPECS.append(S(
    slug="reading-time",
    name="Reading Time Calculator",
    title="Reading Time Calculator — Minutes to Read",
    desc="Enter a word count and a reading speed and the page returns how long the text takes "
         "to read, in minutes and seconds, with the same answer at three other speeds.",
    what="Reading time is a word count divided by a reading speed. The page returns the time "
         "for the speed you type and shows the same text at a slow, an average and a fast "
         "reader, so a single number does not have to carry the whole answer.",
    fields=[
        F("words", "Words in the text", "words", 1000, "Most editors count this for you."),
        F("wpm", "Reading speed", "wpm", 238,
          "238 is the average for adult silent reading of non-fiction."),
    ],
    results=[
        R("minutes", "Reading time", "min"),
        R("seconds", "Reading time in seconds", "s"),
        R("slow", "At 150 wpm", "min"),
        R("fast", "At 350 wpm", "min"),
    ],
    formula={
        "minutes": "words / wpm",
        "seconds": "words / wpm * 60",
        "slow": "words / 150",
        "fast": "words / 350",
    },
    prose={
        "why": "<p>The arithmetic is one division. What makes the answer useful is knowing "
               "which reading speed to put in the second box. Adults read non-fiction at "
               "around 238 words a minute when they are reading for comprehension; skimming "
               "runs two to three times faster, and reading aloud is slower still.</p>"
               "<p>Read the slow and fast columns as a range rather than alternatives. They "
               "bracket the same text without asking you to guess your own speed.</p>",
        "formula_note": "The 150 and 350 in the last two lines are fixed reference speeds, not "
                        "your input. They are there so the page always shows a range.",
        "reading": "A thousand words at 238 wpm is a little over four minutes. That is a news "
                   "article, a newsletter, or the introduction to a report. Ten thousand words is "
                   "three quarters of an hour, which is a short story or a long chapter.",
        "example_note": "The seconds line exists for short texts: a 200-word email at 238 wpm is "
                        "50 seconds, and rounding that to one minute loses a fifth of the "
                        "answer.",
        "extra_title": "What a minute of reading is worth",
        "extra": "<p>Reading time is a budgeting tool before it is a fact. If a page has to be "
                 "read in four minutes and the draft runs to 1 200 words, the draft is 200 words "
                 "too long at an average speed and 400 too long at a careful one. That is a "
                 "concrete edit, not a vague instruction to tighten it.</p>"
                 "<p>The same arithmetic runs the other way for writing. A writer producing 500 "
                 "words an hour needs two and a half hours for the draft this page describes, "
                 "and that is before anyone reads it back.</p>"
                 "<p>One warning about the averages: they measure words, and words are not the "
                 "same size. A page of short sentences reads faster than the count suggests; a "
                 "page of long technical clauses reads slower. Treat the number as a floor for "
                 "easy prose and a ceiling for hard prose.</p>",
        "pitfalls": [
            "<strong>Word counts that include navigation.</strong> A copy-pasted web page "
            "carries its menus and captions, and they inflate the count.",
            "<strong>A speed that is really a skim.</strong> 600 wpm is possible, but not with "
            "retention. Use it only for triage.",
        ],
        "limits": [
            "<li><strong>It models reading, not understanding.</strong> Dense technical prose "
            "takes longer per word than a novel.</li>",
            "<li><strong>No pictures, no code blocks.</strong> Both slow a reader in ways a word "
            "count does not capture.</li>",
        ],
        "uses": [
            "<li>Setting a length budget for an article.</li>",
            "<li>Deciding whether a document fits in a coffee break.</li>",
            "<li>Estimating a narration or voice-over.</li>",
        ],
        "scenarios": [
            {"inputs": {"words": 200, "wpm": 238},
             "note": "A two-hundred-word email is under a minute at an average pace."},
            {"inputs": {"words": 10000, "wpm": 238},
             "note": "Ten thousand words is forty-two minutes, or fifteen at a fast skim."},
        ],
    },
    faq=[
        ("Where does 238 words a minute come from?",
         "It is the widely cited average for adult silent reading of non-fiction in English. It "
         "is an average, not a target: technical text runs slower and light fiction faster."),
        ("Should I use this for speaking time?",
         "No. Speaking runs at roughly 130 to 150 words a minute, and the page's slow column is "
         "closer to a speaking pace than the average column is."),
    ],
    related=[("/everyday-life/words-per-minute", "Words per minute"),
             ("/everyday-life/speaking-time", "Speaking time"),
             ("/everyday-life/audiobook-speed", "Audiobook speed")],
    checks=[
        ({"words": 1000, "wpm": 238},
         {"minutes": 4.2017, "seconds": 252.1008, "slow": 6.6667, "fast": 2.8571}, 0.001),
        ({"words": 200, "wpm": 238},
         {"minutes": 0.8403, "seconds": 50.4202, "slow": 1.3333, "fast": 0.5714}, 0.001),
    ],
))

# ------------------------------------------------------------ words/minute

SPECS.append(S(
    slug="words-per-minute",
    name="Words per Minute Calculator",
    title="Words per Minute Calculator — Reading and Typing",
    desc="Divide the words you read by the minutes it took and the page returns your reading "
         "speed in words per minute, with the same figure in words per second.",
    what="Words per minute is words divided by minutes. Time a page, type the count and the "
         "clock, and the page returns the speed you actually read at rather than the speed you "
         "assume you read at.",
    fields=[
        F("words", "Words read", "words", 1200, "Use the word count of the text, not a guess."),
        F("minutes", "Minutes taken", "min", 5, "Time a whole section, not one paragraph."),
    ],
    results=[
        R("wpm", "Reading speed", "wpm"),
        R("wps", "Words per second", "words/s"),
        R("hourly", "Words in an hour", "words/h"),
    ],
    formula={
        "wpm": "words / minutes",
        "wps": "words / minutes / 60",
        "hourly": "words / minutes * 60",
    },
    prose={
        "why": "<p>A measured speed is worth more than a claimed one. The published averages "
               "for adult readers sit between 200 and 250 words a minute for non-fiction, but "
               "the spread between people is wide and the spread within one person, across "
               "genres, is wider still.</p>"
               "<p>The hourly line is the same number scaled up, and it is the one to use when "
               "you are planning how much reading fits into a journey.</p>",
        "formula_note": "Dividing by 60 twice would turn words per minute into words per hour; "
                        "the page multiplies in the last line instead, because an hour holds "
                        "sixty minutes.",
        "reading": "Twelve hundred words in five minutes is 240 wpm, which is right on the "
                   "published average for non-fiction. That means the test text was neither "
                   "unusually dense nor unusually light.",
        "example_note": "Time at least five minutes. A single paragraph is over before pacing "
                        "settles, and the answer comes out either flattering or wrong.",
        "extra_title": "Reading speed and speaking speed are different numbers",
        "extra": "<p>Speech runs at roughly 130 to 150 words a minute, and that ceiling is why "
                 "podcasts are transcribed at about a third of the length of the words spoken. "
                 "If you are preparing something to be read aloud, use the speaking figure, not "
                 "the reading one, or it will run long by half.</p>"
                 "<p>Reading speed also varies with format. A printed page allows more regression "
                 "than a phone screen, and a screen with a scrolling feed allows less attention "
                 "than either. Measure on the format you care about, or the number will not "
                 "transfer.</p>"
                 "<p>A final caution about self-tests: the first attempt is usually slower than "
                 "the second, because the text is unfamiliar rather than because you sped up. "
                 "Time a second, different passage and use the lower figure if the two disagree "
                 "by more than a fifth.</p>",
        "pitfalls": [
            "<strong>Timing yourself with a phone in the other hand.</strong> The interruption "
            "lands inside the measurement.",
            "<strong>Reading something too easy.</strong> A children's book will return 400 wpm "
            "and tell you nothing about how fast you read a contract.",
        ],
        "limits": [
            "<li><strong>Speed is not comprehension.</strong> The page cannot tell whether you "
            "remembered any of it.</li>",
            "<li><strong>One measurement is one sample.</strong> Repeat it on a different text "
            "before treating it as your speed.</li>",
        ],
        "uses": [
            "<li>Calibrating the reading-time figure you quote to other people.</li>",
            "<li>Estimating how long a report will take.</li>",
            "<li>Checking whether a speed-reading claim is real.</li>",
        ],
        "scenarios": [
            {"inputs": {"words": 1200, "minutes": 5},
             "note": "The default run: 240 wpm, four words a second, 14 400 words an hour."},
            {"inputs": {"words": 3000, "minutes": 25},
             "note": "A slower, denser text: 120 wpm, half the average."},
        ],
    },
    faq=[
        ("What is a good reading speed?",
         "For non-fiction, 200 to 250 words a minute with good comprehension. Faster is "
         "possible, but at some point the comprehension figure falls and the speed stops "
         "meaning anything."),
        ("Does typing speed use the same formula?",
         "Yes. Typing tests count characters or words against time the same way. This page "
         "assumes reading, so keep the text comparable when you compare results."),
    ],
    related=[("/everyday-life/reading-time", "Reading time"),
             ("/everyday-life/speaking-time", "Speaking time"),
             ("/everyday-life/audiobook-speed", "Audiobook speed")],
    checks=[
        ({"words": 1200, "minutes": 5},
         {"wpm": 240, "wps": 4, "hourly": 14400}, 0.001),
        ({"words": 3000, "minutes": 25},
         {"wpm": 120, "wps": 2, "hourly": 7200}, 0.001),
    ],
))

# --------------------------------------------------------------- unit price

SPECS.append(S(
    slug="unit-price",
    name="Unit Price Calculator",
    title="Unit Price Calculator — Price per Unit",
    desc="Enter the price and the pack size and the page returns the price per unit, so two "
         "packages of different sizes can be compared on one number instead of two labels.",
    what="The price on the shelf is the price of a package, not the price of the thing. Divide "
         "the price by the quantity and the packages can be compared honestly, whatever their "
         "sizes.",
    fields=[
        F("price", "Price of the pack", "", 3.49),
        F("quantity", "Amount in the pack", "", 500, "In whatever unit the pack is sold by."),
        F("compare", "Second pack price", "", 6.99, "Optional: a second package to compare."),
        F("compare_qty", "Amount in the second pack", "", 1000),
    ],
    results=[
        R("unit", "Price per unit", ""),
        R("per100", "Price per 100 units", ""),
        R("compare_unit", "Second pack, price per unit", ""),
        R("saving", "Saving per 1 000 units", ""),
    ],
    formula={
        "unit": "price / quantity",
        "per100": "price / quantity * 100",
        "compare_unit": "compare / compare_qty",
        "saving": "(price / quantity - compare / compare_qty) * 1000",
    },
    prose={
        "why": "<p>Shelf labels are designed around the package, not around the contents. "
               "Dividing the price by the amount is the only way to see which of two packs is "
               "the better buy, and it takes one line of arithmetic that most people skip.</p>"
               "<p>The saving line is the same comparison expressed per hundred units, which "
               "keeps the numbers readable when the packs are large.</p>",
        "formula_note": "The saving is positive when the first pack is dearer per unit, and "
                        "negative when it is cheaper. Read the sign, not just the size, and read "
                        "the units: the line is per thousand units of whatever the packs are "
                        "sold by.",
        "reading": "3.49 for 500 g is 0.698 per 100 g. 6.99 for 1 kg is 0.699 per 100 g. The "
                   "two packs are the same price to the cent, which is common: the larger pack "
                   "is often priced to match, not to undercut.",
        "example_note": "The second pack is optional. Leave both its boxes empty and the two "
                        "comparison lines stay blank rather than inventing a competitor.",
        "pitfalls": [
            "<strong>Different units in one comparison.</strong> 500 g against 1 lb is a "
            "comparison that needs converting first.",
            "<strong>The pack size that is not the product.</strong> A multipack's stated "
            "weight can include packaging on some labels and not on others.",
        ],
        "limits": [
            "<li><strong>Price is not value.</strong> A cheaper unit can be a worse product, and "
            "the page knows nothing about quality.</li>",
            "<li><strong>No waste allowance.</strong> If half a kilo spoils before it is used, "
            "the effective price per usable unit is higher.</li>",
        ],
        "uses": [
            "<li>Comparing two sizes on the same shelf.</li>",
            "<li>Checking whether a bulk pack is really cheaper.</li>",
            "<li>Working out what a portion costs.</li>",
        ],
        "scenarios": [
            {"inputs": {"price": 3.49, "quantity": 500, "compare": 6.99, "compare_qty": 1000},
             "note": "The default pair: effectively the same price per 100 g."},
            {"inputs": {"price": 3.49, "quantity": 500, "compare": 5.99, "compare_qty": 1000},
             "note": "A genuine saving: 0.99 per thousand units, which is a cent a kilogram on "
                     "a pack sold in grams."},
        ],
    },
    faq=[
        ("Why per 100 units rather than per unit?",
         "Because per-unit prices are often tiny numbers with too many decimals to compare by "
         "eye. Per hundred keeps them readable for both grams and millilitres."),
        ("What if the second pack is empty?",
         "The two comparison lines stay blank. The first pack's price per unit is still "
         "computed, and no comparison is invented."),
    ],
    related=[("/everyday-life/price-per-ounce", "Price per ounce"),
             ("/everyday-life/price-per-pound", "Price per pound"),
             ("/everyday-life/grocery", "Grocery cost")],
    checks=[
        ({"price": 3.49, "quantity": 500, "compare": 6.99, "compare_qty": 1000},
         {"unit": 0.00698, "per100": 0.698, "compare_unit": 0.00699, "saving": -0.01}, 0.0001),
        ({"price": 3.49, "quantity": 500, "compare": 5.99, "compare_qty": 1000},
         {"unit": 0.00698, "per100": 0.698, "compare_unit": 0.00599, "saving": 0.99}, 0.0001),
    ],
))

# --------------------------------------------------------------- birth year

SPECS.append(S(
    slug="birth-year",
    name="Birth Year Calculator",
    title="Birth Year Calculator — From Age to Year",
    desc="Turn an age into a birth year. Enter the age and the year you are asking about, and "
         "the page returns the birth year with and without this year's birthday counted.",
    what="Subtract the age from the year being asked about and you have two candidates, because "
         "an age in whole years only pins the birth year once you know whether the birthday has "
         "happened yet. The page returns both, and which one applies.",
    fields=[
        F("age", "Age in whole years", "years", 30),
        F("year", "As of the year", "year", 2026),
        SEL("had_birthday", "Has the birthday happened this year?",
            [("Yes, already had it", 1), ("No, not yet", 0)], 1),
    ],
    results=[
        R("birth_year", "Birth year", ""),
        R("before", "If the birthday has already passed", ""),
        R("after", "If it has not yet", ""),
    ],
    formula={
        "birth_year": "year - age - (1 - had_birthday)",
        "before": "year - age",
        "after": "year - age - 1",
    },
    prose={
        "why": "<p>An age of thirty in 2026 means a birth year of 1995 or 1996, and the choice "
               "between them is the birthday. If it has already happened this year, the person "
               "was born in 1996; if it is still to come, 1995.</p>"
               "<p>This is why ages in old records are so often off by one. A census taken in "
               "spring and a birthday in autumn will disagree with the same person's own "
               "account, and neither one is lying.</p>",
        "formula_note": "The last two lines are the two cases written out; the first line picks "
                        "between them from the birthday answer.",
        "reading": "A birth year from an age is a range of two, never a single number. Treat it "
                   "as a range when it matters: paperwork, genealogy, anything where a year has "
                   "to be right.",
        "example_note": "Thirty in 2026, birthday already passed, gives 1996. Change the answer "
                        "to No and it becomes 1995.",
        "pitfalls": [
            "<strong>Using an age given in months.</strong> Convert to whole years first, "
            "because the birthday question is about whole-year anniversaries.",
            "<strong>Asking about a year in the future.</strong> The arithmetic still works, but "
            "the birthday answer has to be about that year, not this one.",
        ],
        "limits": [
            "<li><strong>It cannot see a birthday.</strong> The page asks you rather than "
            "guessing from a date, because the date is not in the boxes.</li>",
            "<li><strong>No date of birth.</strong> If you have the exact date, use the age "
            "calculator instead: it is exact where this is a range.</li>",
        ],
        "uses": [
            "<li>Reconstructing a year from a form that only asked for an age.</li>",
            "<li>Estimating a birth year in family history.</li>",
            "<li>Checking whether a stated age and year agree.</li>",
        ],
        "scenarios": [
            {"inputs": {"age": 30, "year": 2026, "had_birthday": 0},
             "note": "Birthday still to come: 1995 rather than 1996."},
            {"inputs": {"age": 0, "year": 2026, "had_birthday": 1},
             "note": "A baby aged nought was born in 2026 if this year's birthday has passed."},
        ],
    },
    faq=[
        ("Why two possible years?",
         "Because age in whole years changes on one day a year. Without that day, the year "
         "behind it has two candidates."),
        ("Which year should I use?",
         "The one matching the birthday answer. If you do not know whether the birthday has "
         "passed, quote the range, not a single year."),
    ],
    related=[("/everyday-life/age", "Age calculator"),
             ("/everyday-life/age-in-years", "Age in years"),
             ("/everyday-life/korean-age", "Korean age")],
    checks=[
        ({"age": 30, "year": 2026, "had_birthday": 1},
         {"birth_year": 1996, "before": 1996, "after": 1995}, 1e-9),
        ({"age": 30, "year": 2026, "had_birthday": 0},
         {"birth_year": 1995, "before": 1996, "after": 1995}, 1e-9),
        ({"age": 0, "year": 2026, "had_birthday": 1},
         {"birth_year": 2026, "before": 2026, "after": 2025}, 1e-9),
    ],
))

# ------------------------------------------------------ days between dates

SPECS.append(S(
    slug="days-between-dates",
    name="Days Between Dates",
    title="Days Between Dates — Day Count and Weeks",
    desc="Count the days between two calendar dates, with or without the last day counted, and "
         "read the same span in weeks and in approximate months. Formula shown.",
    what="Two dates are two day numbers, and the count between them is one subtraction. The "
       "page also decides whether the second date counts as a day in the span, which is the "
       "difference between a hotel stay and a deadline.",
    fields=[
        D("date1", "From", "2026-01-01", "The earlier date. The count runs forward from here."),
        D("date2", "To", "2026-12-31", "The later date."),
        SEL("include_end", "Count the second date as a day?",
            [("Yes, include it", 1), ("No, stop the day before", 0)], 1),
    ],
    results=[
        R("days", "Days between", "days"),
        R("weeks", "Weeks", "weeks"),
        R("months", "Months, roughly", "months"),
    ],
    formula={
        "days": "date2 - date1 + include_end",
        "weeks": "(date2 - date1 + include_end) / 7",
        "months": "(date2 - date1 + include_end) / 30.436875",
    },
    prose={
        "why": "<p>A calendar is a count of days, not a count of months. That is why this page "
               "subtracts the two dates instead of comparing months and years, and why the week "
               "figure is exact while the month figure is an average.</p>"
               "<p>The include-the-last-day switch matters more than it looks. From the first to "
               "the third of a month is two days if you subtract, and three if you count both "
               "ends. Both are correct answers to different questions.</p>",
        "formula_note": "30.436 875 is the average length of a calendar month over the 400-year "
                        "Gregorian cycle, so the months line is an estimate and is labelled as "
                        "one.",
        "reading": "A full year from 1 January to 31 December is 365 days including both ends, "
                   "or 364 without the last. The week figure, 52.14, is the reminder that a year "
                   "is not fifty-two weeks exactly.",
        "example_note": "Subtracting two day numbers gives the number of nights between them, "
                        "which is why the hotel version of this question leaves the last date "
                        "out.",
        "extra_title": "Why an off-by-one is the normal mistake",
        "extra": "<p>Almost every argument about a date count is an argument about the two ends. "
                 "A holiday from the fifth to the twelfth is seven nights and eight days. A "
                 "notice period of thirty days starting today ends on the twenty-ninth of next "
                 "month, not the thirtieth. Both readings are defensible; only one is the "
                 "reading the contract uses.</p>"
                 "<p>When a count matters, write the answer as a pair: the number and whether "
                 "both ends are included. Seven nights (eight days) cannot be misread. Seven "
                 "days can.</p>"
                 "<p>Leap years are the second source of disagreement. A span that crosses 29 "
                 "February is one day longer than the same dates in an ordinary year, and the "
                 "day count is the only figure on this page that gets that right without an "
                 "adjustment.</p>",
        "pitfalls": [
            "<strong>Subtracting by hand across a new year.</strong> Day numbers handle it; "
            "months-by-hand rarely do.",
            "<strong>Counting the same day twice.</strong> Two dates a week apart are seven days "
            "or eight, depending on the switch, and both have a use.",
        ],
        "limits": [
            "<li><strong>Calendar days only.</strong> Time zones and daylight saving do not "
            "change a day count.</li>",
            "<li><strong>No working days.</strong> Weekends and holidays are counted here. The "
            "working-days page is the one that skips them.</li>",
        ],
        "uses": [
            "<li>Working out a notice period.</li>",
            "<li>Counting nights for a booking.</li>",
            "<li>Checking a deadline against a calendar.</li>",
        ],
        "scenarios": [
            {"inputs": {"date1": "2026-01-01", "date2": "2026-01-31", "include_end": 0},
             "note": "Thirty days from the first to the last of January, when the last is not "
                     "counted."},
            {"inputs": {"date1": "2026-03-01", "date2": "2026-03-31", "include_end": 1},
             "note": "March 2026 is 31 days including both ends."},
        ],
    },
    faq=[
        ("Is the first date counted?",
         "Yes. The count includes the starting date and adds the last one only if you ask for "
         "it, so the same pair of dates can give two answers a day apart."),
        ("Why are the months approximate?",
         "Because months are not a fixed length. The page divides by the average month length "
         "and labels the result as an estimate; the day count is exact."),
    ],
    related=[("/everyday-life/days-between-dates", "Days between dates"),
             ("/everyday-life/working-days", "Working days"),
             ("/everyday-life/month-counter", "Month counter")],
    checks=[
        ({"date1": "2026-01-01", "date2": "2026-12-31", "include_end": 1},
         {"days": 365, "weeks": 52.1429, "months": 11.9921}, 0.01),
        ({"date1": "2026-01-01", "date2": "2026-01-31", "include_end": 0},
         {"days": 30, "weeks": 4.2857}, 0.01),
        ({"date1": "2026-03-01", "date2": "2026-03-31", "include_end": 1},
         {"days": 31, "weeks": 4.4286}, 0.01),
    ],
))

# ------------------------------------------------------------- age in units

AGE_UNITS = [
    ("days", "days", 1.0,
     "Days are the unit that keeps a birthday count honest. Every fourth year adds one, so a "
     "count in days is the only one that includes the leap years without an adjustment.",
     [("/everyday-life/age", "Age calculator"), ("/everyday-life/age-in-hours", "Age in hours"),
      ("/everyday-life/days-old", "Days old")],
     [("age-in-days", "Age in Days", "Age in Days — Exact Day Count",
       "Turn a date of birth into the exact number of days lived, leap years included, with the "
       "same figure in weeks and in years for scale.")]),
    ("hours", "hours", 24.0,
     "Hours are what a newborn's first weeks are counted in, and what a long shift rota is "
     "planned in. The number is large, and that is the point.",
     [("/everyday-life/age-in-days", "Age in days"), ("/everyday-life/age-in-minutes", "Age in minutes"),
      ("/everyday-life/age", "Age calculator")],
     [("age-in-hours", "Age in Hours", "Age in Hours Calculator — Exact Hours",
       "Convert a date of birth into the hours lived, with the same span shown in days and in "
       "years so the big number can be read against something. Formula shown.")]),
    ("minutes", "minutes", 1440.0,
     "Minutes are a unit for the very young and for the very patient. A million minutes is "
     "about two years, which surprises most people the first time they see it.",
     [("/everyday-life/age-in-hours", "Age in hours"), ("/everyday-life/age-in-seconds", "Age in seconds"),
      ("/everyday-life/age", "Age calculator")],
     [("age-in-minutes", "Age in Minutes", "Age in Minutes Calculator — Exact Minutes",
       "A date of birth becomes a count of minutes, with days and years beside it so the number "
       "can be checked at a glance. Formula shown.")]),
    ("seconds", "seconds", 86400.0,
     "Seconds are the largest count a life produces, and a billion of them is about thirty-two "
     "years. The figure is worth computing once just to see it.",
     [("/everyday-life/age-in-minutes", "Age in minutes"), ("/everyday-life/age-in-hours", "Age in hours"),
      ("/everyday-life/age", "Age calculator")],
     [("age-in-seconds", "Age in Seconds", "Age in Seconds Calculator — Billion Mark",
       "Turn a birth date into seconds lived, and see how far a billion seconds actually gets "
       "you. Leap years are included in the count, and the formula is shown.")]),
    ("weeks", "weeks", 1 / 7,
     "Weeks fit human plans: a pregnancy is forty of them, a school year about thirty-nine, and "
     "a notice period is often written in them. The count between two dates divides cleanly.",
     [("/everyday-life/age-in-days", "Age in days"), ("/everyday-life/age-in-months", "Age in months"),
      ("/everyday-life/pregnancy-countdown", "Pregnancy countdown")],
     [("age-in-weeks", "Age in Weeks", "Age in Weeks Calculator — Weeks Lived",
       "A birth date and a date to count to, returned as weeks lived with the days left over and "
       "the same span in months. Formula shown.")]),
    ("months", "months", 1 / 30.436875,
     "Months are a calendar unit pretending to be a fixed one. The page divides by the average "
     "month, which is the honest way to turn days into months when the calendar will not "
     "cooperate.",
     [("/everyday-life/age-in-years", "Age in years"), ("/everyday-life/age-in-weeks", "Age in weeks"),
      ("/everyday-life/age", "Age calculator")],
     [("age-in-months", "Age in Months", "Age in Months Calculator — Months Lived",
       "Count the months between a birth date and today, with the leftover days and the decimal "
       "year beside it. Formula shown.")]),
    ("years", "years", 1 / 365.2425,
     "Years are the unit birthdays are counted in, and the one that hides the most. A decimal "
     "year count is exact enough to compare two people; the birthday count beside it is the one "
     "to quote.",
     [("/everyday-life/age-in-days", "Age in days"), ("/everyday-life/age-in-months", "Age in months"),
      ("/everyday-life/age", "Age calculator")],
     [("age-in-years", "Age in Years", "Age in Years Calculator — Decimal Age",
       "A decimal age from two dates, with the whole years, months and days beside it for the "
       "answer people actually expect. Formula shown.")]),
]

for key, unit, factor, why, related, extras in AGE_UNITS:
    for slug, name, title, desc in extras:
        results = [R(key, f"Age in {unit}", unit)]
        results.append(R("weeks", "Age in weeks", "weeks") if key == "days"
                       else R("days", "Age in days", "days"))
        results.append(R("years", "Age in years", "years"))
        prose_reading = {
            "days": "Twenty years is 7 305 days, and the leap years are already inside that "
                    "number. Take a day off and the count changes by one, which is the whole "
                    "point of counting in days rather than in years.",
            "hours": "Twenty years is 175 320 hours. A working life of forty hours a week for "
                     "forty years is about 83 000 hours, so half of a twenty-year life is spent "
                     "awake and a quarter of it at work.",
            "minutes": "Twenty years is 10 519 200 minutes. A million minutes is a common gift "
                       "milestone for a child, and it arrives at about one year and eleven "
                       "months.",
            "seconds": "Twenty years is 631 152 000 seconds. A billion seconds is 31.7 years, "
                       "which is why the billion-second birthday is celebrated in the early "
                       "thirties.",
            "weeks": "Twenty years is 1 043 weeks and a few days. Forty weeks is a pregnancy, "
                     "and 1 043 of them is a life that has just left school.",
            "months": "Twenty years is 240 calendar months on average, and 240 is the number "
                      "that matters for a mortgage or a lease.",
            "years": "Twenty decimal years and twenty birthdays are the same thing only on the "
                     "birthday itself. On the day before, the decimal figure reads 19.99.",
        }[key]
        pitfalls = {
            "days": ["<strong>The day of birth is not counted twice.</strong> A baby born on "
                     "Monday is one day old on Tuesday, not two."],
            "hours": ["<strong>Time zones.</strong> A birth recorded in another zone shifts the "
                      "hour count by that offset, and by a day if it crosses midnight."],
            "minutes": ["<strong>Rounding early.</strong> Minutes are computed from days at full "
                        "precision; do not round the days first."],
            "seconds": ["<strong>Leap seconds.</strong> They are not counted. The site works in "
                        "calendar days of 86 400 seconds."],
            "weeks": ["<strong>Weeks do not divide evenly.</strong> The leftover days are shown "
                      "rather than dropped."],
            "months": ["<strong>Months are not a fixed length.</strong> The average is used and "
                       "labelled; the day count beside it is exact."],
            "years": ["<strong>A decimal year is not a birthday.</strong> Read the whole years "
                      "for the answer people expect."],
        }[key]
        # 60 × 60 rather than 8 640: the solver treats a formula that quotes 86 400
        # as doing its own unit conversion and stops turning dates into days.
        step = " * 1440 * 60" if key == "seconds" else (
            "" if factor == 1 else f" * {factor}")
        formula = {key: f"(on - birth){step}",
                   "years": "(on - birth) / 365.2425"}
        if key != "days":
            formula["days"] = "on - birth"
        if key == "days":
            formula["weeks"] = "(on - birth) / 7"
        SPECS.append(S(
            slug=slug,
            name=name,
            title=title,
            desc=desc,
            what=f"The page counts the time between a birth date and a date you choose, in "
                 f"{unit}. The count is calendar days multiplied out, so leap years are "
                 f"included and nothing is estimated.",
            fields=[
                D("birth", "Date of birth", "1990-05-17"),
                D("on", "Count up to", "2026-10-23", "Leave this at today's date or choose "
                                                     "another day."),
            ],
            results=results,
            formula=formula,
            prose={
                "why": f"<p>{why}</p><p>The arithmetic is one subtraction and one multiplication. "
                       f"The subtraction gives whole days between the two dates; the "
                       f"multiplication turns those days into {unit}.</p>",
                "formula_note": "365.242 5 is the mean length of the Gregorian year, and 30.436 875 "
                                "the mean month. Multiplying days by 24, 1 440 or 86 400 assumes "
                                "a day of exactly that many hours, minutes or seconds.",
                "reading": prose_reading,
                "example_note": "The default dates are a birth on 17 May 1990 and a count to 23 "
                                "October 2026, which is a span of 13 308 days.",
                "extra_title": f"Reading a number this large",
                "extra": f"<p>A count in {unit} grows fast enough to stop meaning anything. The "
                         f"cure is the other two boxes: read the {unit} against the day count, "
                         f"which people can picture, and the year count, which is how the same "
                         f"span is usually described.</p>"
                         f"<p>Milestones are where the big number earns its keep. A billion "
                         f"seconds lands at 31.7 years, a million minutes at 1.9 years, and ten "
                         f"thousand days at 27.4. Each is memorable in a way the raw count is "
                         f"not, and each is a single division away from the figures on this "
                         f"page.</p>"
                         f"<p>The default dates are deliberately fixed rather than set to "
                         f"today, so the example above can be reproduced. Change the second box "
                         f"to see the count move by one day for every day you move it.</p>",
                "pitfalls": pitfalls,
                "limits": [
                    "<li><strong>It counts days, not moments.</strong> A birth time would move "
                    "the hour and second counts, and the page does not ask for one.</li>",
                    "<li><strong>The end date is not included.</strong> The count stops at the "
                    "start of the day you choose, so a birthday is not counted until the day "
                    "after.</li>",
                ],
                "uses": [
                    f"<li>Answering the question a child asks about {unit} lived.</li>",
                    "<li>Checking a milestone such as a million minutes.</li>",
                    "<li>Turning a date of birth into a number for a form that demands one.</li>",
                ],
                "scenarios": [
                    {"inputs": {"birth": "2000-01-01", "on": "2001-01-01"},
                     "note": "A leap year included: 366 days, not 365."},
                    {"inputs": {"birth": "1990-05-17", "on": "2026-05-17"},
                     "note": "Exactly thirty-six calendar years, birthdays included."},
                ],
            },
            faq=[
                (f"How is the {unit} count worked out?",
                 "The page subtracts the two dates to get whole days, then multiplies by the "
                 f"number of {unit} in a day. Leap years are already inside the day count."),
                ("Does it include the day of birth?",
                 "No. The count runs from the start of the birth date to the start of the date "
                 "you choose, so a baby is one day old on the day after it was born."),
            ],
            related=related,
            checks=[
                ({"birth": "1990-05-17", "on": "2026-10-23"},
                 {"days": 13308, "years": 36.4367, key: 13308 * factor}, 0.01),
                ({"birth": "2000-01-01", "on": "2001-01-01"},
                 {"days": 366, "years": 1.0021, key: 366 * factor}, 0.01),
            ],
        ))
