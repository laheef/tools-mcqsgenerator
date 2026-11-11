"""

Everyday-life batch F: what things cost to run.

Fourteen pages about electricity, heat and the kilowatt-hour. The arithmetic is
the same in most of them — watts to kilowatts, hours to kilowatt-hours, and the
kilowatt-hour to money — and each page exists because the question around that
arithmetic is different: a bulb, a shower, a hot tub, a car.

A select that stands for a physical quantity (a room's lux target, an
appliance's life in years) carries the number as its option value, so the
formula reads a value the page also shows in words.

"""

from __future__ import annotations

from lib import F, R, S, SEL

SPECS: list = []


# ------------------------------------------------------- appliance wattage

SPECS.append(S(
    slug="appliance-wattage",
    name="Appliance Wattage Calculator",
    title="Appliance Wattage — Daily and Monthly Running Cost",
    desc="What one appliance costs to run: its wattage and the hours it runs turned into "
         "kilowatt-hours a day, a month and a year, and the money each of those costs.",
    what="Watts and hours converted into kilowatt-hours, then into money. The unit on the bill "
         "is the kilowatt-hour, and an appliance rating is in watts, so a conversion always "
         "stands between the label and the cost.",
    fields=[
        F("watts", "Appliance rating", "W", 2000, "The figure on the label or the plug. A "
                                                "kettle is about 2 000 W, a fridge compressor 150 W."),
        F("hours", "Hours used each day", "h", 2, "Two hours a day for a heater, ten minutes "
                                                   "for a kettle."),
        F("days", "Days used each month", "days", 30),
        F("price", "Electricity price", "$/kWh", 0.15, "From the bill: the total divided by the "
                                                      "kilowatt-hours."),
    ],
    results=[
        R("kwh_day", "Energy a day", "kWh"),
        R("kwh_month", "Energy a month", "kWh"),
        R("cost_day", "Cost a day", "$"),
        R("cost_year", "Cost a year", "$"),
    ],
    formula={
        "kwh_day": "watts * hours / 1000",
        "kwh_month": "watts * hours * days / 1000",
        "cost_day": "watts * hours / 1000 * price",
        "cost_year": "watts * hours * days * 12 / 1000 * price",
    },
    prose={
        "why": "<p>The number on the appliance is watts. The number on the bill is kilowatt-hours. "
               "The gap between them is where most estimates go wrong, because a two-kilowatt "
               "heater run for one hour uses two kilowatt-hours and a two-kilowatt heater run "
               "for a quarter of an hour uses half of one.</p>"
               "<p>This page does the conversion and puts a price on it. Two thousand watts for "
               "two hours is four kilowatt-hours a day, which is a hundred and twenty a month, "
               "which at fifteen cents is eighteen dollars.</p>",
        "formula_note": "Watts times hours divided by a thousand gives kilowatt-hours, because "
                        "a kilowatt is a thousand watts and an hour is the unit of time the "
                        "energy is counted over. The yearly line multiplies the month by "
                        "twelve rather than by 365, so it matches the day count in the form.",
        "reading": "2 000 W for 2 hours a day is 4 kWh a day and 120 kWh a month. At 15 cents a "
                   "kilowatt-hour that is 60 cents a day and 216 dollars a year: the same "
                   "appliance, three very different numbers.",
        "example_note": "Change the hours box to a quarter of an hour and watch the day figure "
                        "fall to a kilowatt-hour while the yearly figure stays worth knowing.",
        "pitfalls": [
            "<strong>Using the wattage on the box as a running figure.</strong> An oven rated "
            "at 2 400 W cycles on and off; the energy used is lower than the rating suggests.",
            "<strong>Forgetting standby.</strong> A television that draws 12 W in standby for "
            "twenty-two hours a day uses more than it does while it is on.",
        ],
        "limits": [
            "<li><strong>One appliance.</strong> A whole house is the sum of these lines, one "
            "pass per appliance.</li>",
        ],
        "uses": [
            "<li>Deciding whether a second-hand freezer is worth running.</li>",
            "<li>Working out what an electric heater costs over a winter.</li>",
        ],
        "scenarios": [
            {"inputs": {"watts": 150, "hours": 24, "days": 30, "price": 0.15},
             "note": "A fridge compressor at 150 W that runs all day costs about 54 cents a "
                     "day: the hours matter more than the watts."},
        ],
    },
    faq=[
        ("Why divide by 1 000?",
         "Because a kilowatt is a thousand watts and the bill counts kilowatts. Two thousand "
         "watts is two kilowatts, not two hundred."),
        ("Does the page know that appliances cycle?",
         "No. It assumes the appliance draws its rating for the hours you give. For anything "
         "with a thermostat, use the average draw rather than the peak."),
        ("What about a 12-volt appliance?",
         "The same arithmetic applies once the wattage is known. Amps times volts gives watts, "
         "and the page takes it from there."),
    ],
    related=[("/everyday-life/electricity-cost-single-usage", "Electricity cost, single use"),
             ("/everyday-life/electricity-cost", "Electricity cost"),
             ("/everyday-life/led-savings", "LED savings")],
    checks=[
        ({"watts": 2000, "hours": 2, "days": 30, "price": 0.15},
         {"kwh_day": 4, "kwh_month": 120, "cost_day": 0.6, "cost_year": 216}, 0.01),
        ({"watts": 150, "hours": 24, "days": 30, "price": 0.15},
         {"kwh_day": 3.6, "kwh_month": 108, "cost_day": 0.54, "cost_year": 194.4}, 0.01),
    ],
))

# ------------------------------------------- electricity cost, single usage

SPECS.append(S(
    slug="electricity-cost-single-usage",
    name="Electricity Cost — Single Use Calculator",
    title="Electricity Cost of One Use — Watts, Hours, Money",
    desc="What a single use of a device costs: its wattage and the time it runs turned into "
         "kilowatt-hours and into money at your own rate, with the rate per use and per hour.",
    what="One run of one device, priced. The kettle, the iron, the tumble dryer: things that "
         "run for minutes and cost pennies, which is exactly why nobody estimates them well.",
    fields=[
        F("watts", "Power", "W", 1500),
        F("hours", "Time it runs for", "h", 3),
        F("price", "Price per kilowatt-hour", "$/kWh", 0.15),
    ],
    results=[
        R("kwh", "Energy used", "kWh"),
        R("cost", "Cost of this use", "$"),
        R("cost_hour", "Cost per hour of running", "$"),
    ],
    formula={
        "kwh": "watts * hours / 1000",
        "cost": "watts * hours / 1000 * price",
        "cost_hour": "watts / 1000 * price",
    },
    prose={
        "why": "<p>One use is the honest unit for most appliances. A kettle runs for four "
               "minutes, an iron for twenty, a dryer for ninety, and none of them is best "
               "described by a monthly figure that assumes a pattern the household does not "
               "have.</p>"
               "<p>The cost-per-hour line is the one to carry away. Once you know a device "
               "costs fifteen cents an hour to run, every other duration is a multiplication "
               "you can do in your head.</p>",
        "formula_note": "Watts times hours over a thousand is the energy in kilowatt-hours; "
                        "multiplied by the price it is the money. The per-hour line drops the "
                        "hours box entirely, which is why it stays the same whatever duration "
                        "you type.",
        "reading": "A 1 500 W appliance for three hours uses 4.5 kWh and costs 67.5 cents at 15 "
                   "cents a unit. The per-hour line says 22.5 cents, and three hours of it is "
                   "the same 67.5.",
        "example_note": "For a kettle, put 0.07 in the hours box: four minutes is seven "
                        "hundredths of an hour, and the answer is about a cent and a half.",
        "pitfalls": [
            "<strong>Typing minutes into the hours box.</strong> Twenty minutes is 0.33, not "
            "20. The result is otherwise sixty times too large.",
            "<strong>Using the peak rating for a cycling appliance.</strong> An oven that "
            "cycles at half duty uses half the energy its rating implies.",
        ],
        "limits": [
            "<li><strong>No standing charge.</strong> The page prices the energy, not the daily "
            "connection fee on the bill.</li>",
        ],
        "uses": [
            "<li>Costing a single wash or a single bake.</li>",
            "<li>Comparing two appliances at the same task.</li>",
        ],
        "scenarios": [
            {"inputs": {"watts": 3000, "hours": 0.07, "price": 0.15},
             "note": "A three-kilowatt kettle for four minutes is 0.21 kWh, about three cents: "
                     "the reason kettles are not the problem."},
        ],
    },
    faq=[
        ("How do I put minutes into the hours box?",
         "Divide by sixty. Ten minutes is 0.1667, half an hour is 0.5, and a quarter of an hour "
         "is 0.25."),
        ("Does this include tax and standing charges?",
         "No. Put the all-in price per kilowatt-hour from the bill in the price box and the "
         "answer carries the tax."),
        ("Why does the per-hour figure not change?",
         "Because it does not depend on the duration. It is the price of an hour of running, "
         "which is a property of the device and the tariff."),
    ],
    related=[("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/electricity-cost", "Electricity cost"),
             ("/everyday-life/hot-tub-cost", "Hot tub cost")],
    checks=[
        ({"watts": 1500, "hours": 3, "price": 0.15},
         {"kwh": 4.5, "cost": 0.675, "cost_hour": 0.225}, 0.01),
        ({"watts": 3000, "hours": 0.07, "price": 0.15},
         {"kwh": 0.21, "cost": 0.0315, "cost_hour": 0.45}, 0.01),
    ],
))

# ------------------------------------------------------------ led savings

SPECS.append(S(
    slug="led-savings",
    name="LED Savings Calculator",
    title="LED Savings — What Switching Bulbs Actually Saves",
    desc="The yearly cost of a filament bulb against an LED at the same brightness, including "
         "the bulbs you have to buy, with the saving and the payback period in years.",
    what="Two bulbs, one socket, a year of running. Energy, replacement bulbs, the total, the "
         "difference, and how long the LED takes to pay for itself.",
    fields=[
        F("old_watts", "Old bulb power", "W", 60),
        F("new_watts", "LED power for the same light", "W", 9),
        F("hours", "Hours lit each day", "h", 5),
        F("price", "Electricity price", "$/kWh", 0.15),
        F("old_bulb_price", "Price of an old bulb", "$", 1),
        F("old_bulb_life", "Life of an old bulb", "h", 1000),
        F("led_price", "Price of the LED", "$", 4),
        F("led_life", "Life of the LED", "h", 15000),
    ],
    results=[
        R("old_year", "Old bulb, cost a year", "$"),
        R("led_year", "LED, cost a year", "$"),
        R("saving", "Saved a year", "$"),
        R("payback", "Payback", "years"),
    ],
    formula={
        "old_year": "old_watts * hours * 365 / 1000 * price + old_bulb_price * hours * 365 / old_bulb_life",
        "led_year": "new_watts * hours * 365 / 1000 * price + led_price * hours * 365 / led_life",
        "saving": ("(old_watts * hours * 365 / 1000 * price + old_bulb_price * hours * 365 / old_bulb_life)"
                   " - (new_watts * hours * 365 / 1000 * price + led_price * hours * 365 / led_life)"),
        "payback": ("led_price / ((old_watts * hours * 365 / 1000 * price + old_bulb_price * hours * 365 / old_bulb_life)"
                    " - (new_watts * hours * 365 / 1000 * price + led_price * hours * 365 / led_life))"),
    },
    prose={
        "why": "<p>The energy saving is the easy half and it is real: sixty watts against nine, "
               "at the same brightness, is eighty-five per cent less. The half people forget is "
               "the bulbs. A filament bulb is cheap and dies every thousand hours; an LED costs "
               "several times as much and lasts ten or fifteen times longer, and in a year of "
               "evening use you buy one or two of the first and a fraction of the second.</p>"
               "<p>This page adds both halves and divides the price of the LED by the yearly "
               "difference. That quotient is the payback: the number of years before the saving "
               "has paid for the bulb.</p>",
        "formula_note": "Both yearly lines are energy plus bulbs: watts times hours over a "
                        "thousand times the price, plus the bulb price times the hours in a "
                        "year divided by the bulb's life. The payback divides the LED price by "
                        "the difference between the two lines.",
        "reading": "A 60 W bulb for five hours a day is 109.5 kWh a year, which is 16.43 dollars "
                   "at 15 cents, plus 1.83 bulbs at a dollar. The LED uses 16.4 kWh, 2.46 "
                   "dollars, plus a twelfth of a bulb. The saving is 15.30 a year and the "
                   "four-dollar LED pays for itself in a quarter of a year.",
        "example_note": "Halve the hours and the saving halves with them, but the payback "
                        "doubles: the bulb price is fixed and the energy saving is not.",
        "pitfalls": [
            "<strong>Comparing watts without comparing light.</strong> A 9 W LED is not "
            "equivalent to a 60 W bulb by accident; the lumens are what match.",
            "<strong>Ignoring the bulbs.</strong> In a hallway used ten minutes a day, the "
            "energy saving is small and most of the LED's advantage is the bulb you do not "
            "replace.",
        ],
        "limits": [
            "<li><strong>One socket.</strong> A house is this multiplied by the number of "
            "sockets on the same pattern.</li>",
        ],
        "uses": [
            "<li>Deciding whether to replace working bulbs or wait for them to fail.</li>",
            "<li>Costing a whole-floor switch to LED.</li>",
        ],
        "scenarios": [
            {"inputs": {"old_watts": 60, "new_watts": 9, "hours": 10, "price": 0.15,
                        "old_bulb_price": 1, "old_bulb_life": 1000,
                        "led_price": 4, "led_life": 15000},
             "note": "Doubling the hours doubles the yearly saving and halves the payback to "
                     "about six weeks."},
        ],
    },
    faq=[
        ("Is the payback really under a year?",
         "For a bulb that runs several hours a day, yes. The payback is the LED's price divided "
         "by the yearly saving, and both numbers are small."),
        ("What about the heat a filament bulb gives off?",
         "In winter it is not entirely wasted and in summer it is. The page counts energy, "
         "which is the figure on the meter either way."),
        ("Do I need to know lumens?",
         "Not for this page. Put the LED wattage that matches the old bulb's light output; a "
         "9 W LED typically replaces a 60 W filament."),
    ],
    related=[("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/lighting", "Lighting calculator"),
             ("/everyday-life/electricity-cost", "Electricity cost")],
    checks=[
        ({"old_watts": 60, "new_watts": 9, "hours": 5, "price": 0.15,
          "old_bulb_price": 1, "old_bulb_life": 1000, "led_price": 4, "led_life": 15000},
         {"old_year": 18.25, "led_year": 2.9507, "saving": 15.2993, "payback": 0.2614}, 0.01),
        ({"old_watts": 60, "new_watts": 9, "hours": 10, "price": 0.15,
          "old_bulb_price": 1, "old_bulb_life": 1000, "led_price": 4, "led_life": 15000},
         {"old_year": 36.5, "led_year": 5.9008, "saving": 30.5992, "payback": 0.1307}, 0.01),
    ],
))

# ---------------------------------------------------------------- lighting

SPECS.append(S(
    slug="lighting",
    name="Lighting Calculator",
    title="Lighting Calculator — How Many Bulbs a Room Needs",
    desc="How much light a room needs, from its floor area and the job done in it, and how many "
         "bulbs of a given output it takes to deliver it.",
    what="Area times the illumination a room type needs, divided by the output of one bulb. The "
         "answer is a count of bulbs, rounded up, with the total light in lumens.",
    fields=[
        F("length", "Room length", "m", 5),
        F("width", "Room width", "m", 4),
        SEL("lux", "What the room is used for",
            [("Living room, 150 lux", 150), ("Kitchen worktop, 300 lux", 300),
             ("Bedroom, 100 lux", 100), ("Bathroom, 200 lux", 200),
             ("Study or desk, 400 lux", 400)], 150),
        F("lumens", "Light output of one bulb", "lm", 800),
    ],
    results=[
        R("area", "Floor area", "m²"),
        R("lumens_needed", "Light needed in total", "lm"),
        R("bulbs", "Bulbs needed", "bulbs"),
        R("lumens_fitted", "Light the bulbs deliver", "lm"),
    ],
    formula={
        "area": "length * width",
        "lumens_needed": "length * width * lux",
        "bulbs": "ceil(length * width * lux / lumens)",
        "lumens_fitted": "ceil(length * width * lux / lumens) * lumens",
    },
    prose={
        "why": "<p>Lighting a room is a multiplication and a division. Illuminance is measured in "
               "lux, which is lumens per square metre, so a room of twenty square metres at a "
               "hundred and fifty lux wants three thousand lumens in it.</p>"
               "<p>Bulbs are sold in lumens and households still talk in watts, which is the "
               "confusion this page is built around. An old 60 W bulb made about 800 lumens; a "
               "9 W LED makes the same. Put the lumen figure in and the count comes out.</p>",
        "formula_note": "Area times lux is the light the room needs, in lumens. Dividing by the "
                        "lumens of one bulb gives a fraction of a bulb, and the ceiling of that "
                        "fraction is how many you have to buy, since half a bulb lights "
                        "nothing.",
        "reading": "A room 5 m by 4 m is 20 m². At 150 lux it needs 3 000 lumens; at 800 lumens "
                   "a bulb that is 3.75 bulbs, so four, which deliver 3 200 lumens between them.",
        "example_note": "Switch the room to a kitchen worktop and the same room needs six "
                        "bulbs, because 300 lux is twice the light.",
        "pitfalls": [
            "<strong>Counting watts instead of lumens.</strong> Two 60 W bulbs are 1 600 "
            "lumens; two 9 W LEDs are also 1 600, and only the second pair is cheap to run.",
            "<strong>Forgetting the ceiling.</strong> The ceiling of the fraction matters: 3.75 "
            "bulbs means four, and the extra light is not wasted.</li>",
        ],
        "limits": [
            "<li><strong>Average illumination.</strong> A single lamp in a dark corner is not "
            "the same as four spread out, even when the lumens match.</li>",
        ],
        "uses": [
            "<li>Planning the bulbs for a room before buying a fitting.</li>",
            "<li>Checking whether a dim reading room is under-lit.</li>",
        ],
        "scenarios": [
            {"inputs": {"length": 5, "width": 4, "lux": 300, "lumens": 800},
             "note": "A kitchen needs twice the light of a living room, so the same floor "
                     "wants eight bulbs rather than four."},
        ],
    },
    faq=[
        ("Why round up?",
         "Because bulbs come whole. Three and three-quarter bulbs of light needs four bulbs "
         "bought, and the extra quarter is margin rather than waste."),
        ("Is 150 lux enough to read by?",
         "For a living room, yes; for a desk, no. The study setting is 400 lux, which is the "
         "level a task light is meant to reach."),
        ("Do dark walls change the answer?",
         "They do: a dark room absorbs light and needs more of it. The page gives the average "
         "illumination and not the reflection."),
    ],
    related=[("/everyday-life/lumens-to-watts", "Lumens to watts"),
             ("/everyday-life/recessed-lighting", "Recessed lighting"),
             ("/everyday-life/led-savings", "LED savings")],
    checks=[
        ({"length": 5, "width": 4, "lux": 150, "lumens": 800},
         {"area": 20, "lumens_needed": 3000, "bulbs": 4, "lumens_fitted": 3200}, 0.01),
        ({"length": 5, "width": 4, "lux": 300, "lumens": 800},
         {"area": 20, "lumens_needed": 6000, "bulbs": 8, "lumens_fitted": 6400}, 0.01),
    ],
))

# ------------------------------------------------------- recessed lighting

SPECS.append(S(
    slug="recessed-lighting",
    name="Recessed Lighting Calculator",
    title="Recessed Lighting — Downlight Spacing and Count",
    desc="How many recessed lights fit a rectangular ceiling at a given spacing, and how far "
         "apart they end up when the rows divide the room instead of the other way round.",
    what="Rows and columns of ceiling lights from the room's dimensions and the spacing you "
         "want, with the spacing you actually get once the count is rounded to whole lights.",
    fields=[
        F("length", "Ceiling length", "m", 5),
        F("width", "Ceiling width", "m", 4),
        F("spacing", "Spacing you want", "m", 1.5),
        F("edge", "Distance from the wall to the first light", "m", 0.75),
    ],
    results=[
        R("columns", "Lights along the length", "lights"),
        R("rows", "Lights across the width", "lights"),
        R("total", "Lights in all", "lights"),
        R("actual_spacing", "Spacing you end up with", "m"),
    ],
    formula={
        "columns": "ceil((length - 2 * edge) / spacing) + 1",
        "rows": "ceil((width - 2 * edge) / spacing) + 1",
        "total": "(ceil((length - 2 * edge) / spacing) + 1) * (ceil((width - 2 * edge) / spacing) + 1)",
        "actual_spacing": "(length - 2 * edge) / (ceil((length - 2 * edge) / spacing))",
    },
    prose={
        "why": "<p>Downlights are laid out as a grid, and the grid is what decides whether a "
               "ceiling looks planned or improvised. The usual rule is a gap between lights of "
               "about half the ceiling height, and half that gap again from the wall, which is "
               "why the edge distance is a box of its own.</p>"
               "<p>The count is a division rounded up, then one more, because a run of lights "
               "needs a light at each end. The spacing line is the same division the other way "
               "round: it reports the gap you get once the lights are at whole positions.</p>",
        "formula_note": "The distance between the first and last light is the room minus two "
                        "edge gaps. Dividing it by the spacing gives the number of gaps, which "
                        "is rounded up to whole gaps and then one light more. The actual "
                        "spacing is that distance divided by the rounded gap count.",
        "reading": "A 5 m ceiling with 0.75 m edges leaves 3.5 m between the end lights. At 1.5 m "
                   "spacing that is 2.33 gaps, so three gaps and four lights, giving 1.167 m "
                   "between them.",
        "example_note": "The actual spacing line is the useful one: it is what the fitter will "
                        "measure, and it is never quite the number you asked for.",
        "pitfalls": [
            "<strong>Forgetting the plus one.</strong> Three gaps need four lights; counting "
            "gaps gives one light short every time.",
            "<strong>Starting at the wall.</strong> The edge distance is there so the first "
            "light is not in the corner, where it lights the wall and not the room.",
        ],
        "limits": [
            "<li><strong>Rectangular ceilings only.</strong> A room with a chimney breast or an "
            "L-shape is two rectangles and two passes.</li>",
        ],
        "uses": [
            "<li>Marking out a ceiling before the plasterboard goes up.</li>",
            "<li>Checking a electrician's proposed layout against the room's proportions.</li>",
        ],
        "scenarios": [
            {"inputs": {"length": 5, "width": 4, "spacing": 2, "edge": 1},
             "note": "A wider spacing with a bigger edge margin gives three lights by two: six "
                     "in all, and 1.5 m apart."},
        ],
    },
    faq=[
        ("What spacing should I use?",
         "Half the ceiling height is the common rule, so a 2.4 m ceiling wants about 1.2 m. "
         "Brighter rooms can go wider and dimmer ones need it tighter."),
        ("Why is the edge distance half the spacing?",
         "Because a light close to a wall throws a bright scallop up it. Half the spacing keeps "
         "the wall evenly lit."),
        ("Does the count include the lights at the ends?",
         "Yes. The plus one in the formula is the far end, and the first light is already at the "
         "edge distance."),
    ],
    related=[("/everyday-life/lighting", "Lighting calculator"),
             ("/everyday-life/lumens-to-watts", "Lumens to watts"),
             ("/everyday-life/led-savings", "LED savings")],
    checks=[
        ({"length": 5, "width": 4, "spacing": 1.5, "edge": 0.75},
         {"columns": 4, "rows": 3, "total": 12, "actual_spacing": 1.1667}, 0.01),
        ({"length": 5, "width": 4, "spacing": 2, "edge": 1},
         {"columns": 3, "rows": 2, "total": 6, "actual_spacing": 1.5}, 0.01),
    ],
))

# ------------------------------------------------------ microwave wattage

SPECS.append(S(
    slug="microwave-wattage",
    name="Microwave Wattage Converter",
    title="Microwave Wattage — Convert a Cooking Time in Watts",
    desc="Cook the same food in a microwave of a different power: the time at your oven's "
         "wattage turned into the time at another, with the minutes and seconds written out.",
    what="A cooking time at one power converted to another. Lower power needs longer, and the "
         "conversion is inverse: a 700 W oven takes half again as long as a 1 000 W one.",
    fields=[
        F("minutes", "Time on the packet", "min", 8),
        F("packet_watts", "Wattage the packet assumes", "W", 700,
          "Packets usually assume 700 W or 800 W; the small print on the back says which."),
        F("your_watts", "Your microwave's wattage", "W", 1000,
          "The rating plate inside the door, or the model number's first digits."),
    ],
    results=[
        R("new_minutes", "Time in your microwave", "min"),
        R("new_seconds", "In seconds", "s"),
        R("whole_minutes", "Minutes and seconds, whole minutes", "min"),
        R("left_seconds", "Minutes and seconds, seconds over", "s"),
    ],
    formula={
        "new_minutes": "minutes * packet_watts / your_watts",
        "new_seconds": "minutes * packet_watts / your_watts * 60",
        "whole_minutes": "floor(minutes * packet_watts / your_watts)",
        "left_seconds": "round((minutes * packet_watts / your_watts - floor(minutes * packet_watts / your_watts)) * 60)",
    },
    prose={
        "why": "<p>A microwave recipe is written for a power the packet does not always name. "
               "Eight minutes at 700 watts is 5 600 watt-minutes of energy, and the same energy "
               "at 1 000 watts takes 5.6 minutes. That is the whole conversion, and it is the "
               "reason two people following the same packet get different results.</p>"
               "<p>The page gives the answer in decimal minutes and in minutes and seconds, "
               "because a microwave dial takes seconds and a recipe book talks in minutes.</p>",
        "formula_note": "Time is inversely proportional to power when the energy is fixed: "
                        "minutes times the packet's watts divided by your watts. The seconds "
                        "lines multiply out and split the decimal part at sixty.",
        "reading": "Eight minutes at 700 W becomes 5.6 minutes at 1 000 W, which is 5 minutes 36 "
                   "seconds: a quarter shorter, not a fifth, because the power is a third "
                   "higher.",
        "example_note": "Round up rather than down. Food is safe at a minute over and not at a "
                        "minute under, particularly with poultry.",
        "pitfalls": [
            "<strong>Scaling the time the wrong way round.</strong> A more powerful oven "
            "needs less time; putting your wattage on top of the fraction gives a longer one.",
            "<strong>Trusting the dial's numbers.</strong> A 10-setting dial is not linear, and "
            "the setting names a percentage of full power rather than a wattage.",
        ],
        "limits": [
            "<li><strong>One power level.</strong> A recipe that switches power halfway needs "
            "two passes, one per stage.</li>",
        ],
        "uses": [
            "<li>Cooking a packet meal in a microwave that is not the one the packet assumes.</li>",
            "<li>Converting an American recipe written for an 1 100 W oven.</li>",
        ],
        "scenarios": [
            {"inputs": {"minutes": 8, "packet_watts": 1000, "your_watts": 700},
             "note": "The same food in a weaker oven takes 11.43 minutes, which is 11 minutes "
                     "26 seconds: the conversion works in both directions."},
        ],
    },
    faq=[
        ("Where do I find my microwave's wattage?",
         "On the rating plate, usually inside the door or on the back, and often in the model "
         "number: the first two digits of a Panasonic model are its wattage."),
        ("Why do packets say 700 W?",
         "Because that was the common European power when the conventions were set. American "
         "packets often assume 1 100 W."),
        ("Does the conversion hold for defrosting?",
         "No. Defrost runs at a fraction of full power and relies on the food resting between "
         "cycles, so the ratio is not the same."),
    ],
    related=[("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/electricity-cost-single-usage", "Electricity cost, single use"),
             ("/conversion/celsius-to-fahrenheit", "Celsius to Fahrenheit")],
    checks=[
        ({"minutes": 8, "packet_watts": 700, "your_watts": 1000},
         {"new_minutes": 5.6, "new_seconds": 336, "whole_minutes": 5, "left_seconds": 36}, 0.01),
        ({"minutes": 8, "packet_watts": 1000, "your_watts": 700},
         {"new_minutes": 11.4286, "new_seconds": 685.7143, "whole_minutes": 11,
          "left_seconds": 26}, 0.01),
    ],
))

# -------------------------------------------------------- generator wattage

SPECS.append(S(
    slug="generator-wattage",
    name="Generator Wattage Calculator",
    title="Generator Wattage — Running Load, Surge and Headroom",
    desc="The generator size a set of appliances needs: running watts, the starting surge of "
         "the largest motor, and the headroom rule applied to both, with the peak as the floor.",
    what="Running watts plus the biggest starting surge, and the rating a generator needs once "
         "a margin is added. Surge is the number that catches people out: a fridge that runs at "
         "150 W can draw 600 W for a second.",
    fields=[
        F("running", "Everything running at once", "W", 2000,
          "Add the running watts of every appliance you want on at the same time."),
        F("surge", "Starting watts of the largest motor", "W", 1500,
          "A fridge, a pump or an air conditioner: three to five times its running watts for "
          "a second or two."),
        SEL("headroom", "Headroom to add",
            [("10 %, tight", 10), ("20 %, sensible", 20), ("30 %, generous", 30)], 20),
    ],
    results=[
        R("continuous", "Continuous rating needed", "W"),
        R("peak", "Peak it must survive", "W"),
        R("generator", "Generator size to buy", "W"),
    ],
    formula={
        "continuous": "running * (1 + headroom / 100)",
        "peak": "running + surge",
        "generator": "max(running * (1 + headroom / 100), running + surge)",
    },
    prose={
        "why": "<p>A generator is sold on two numbers and only one of them is on the box in "
               "large type. The running rating is what it can deliver all day; the surge rating "
               "is what it can deliver for the second a motor takes to start. A fridge, a "
               "freezer, a well pump and an air conditioner all draw several times their running "
               "power for that second.</p>"
               "<p>This page works out both. The answer is the larger of the continuous figure "
               "with headroom and the peak figure, because a generator that trips on start-up "
               "is no use however well it runs afterwards.</p>",
        "formula_note": "Continuous is the running load with the chosen headroom added. Peak is "
                        "the running load plus the starting surge of the largest motor. The "
                        "size to buy is the larger of the two, since the generator has to "
                        "satisfy whichever is harder.",
        "reading": "2 000 W of running load plus a 1 500 W surge peaks at 3 500 W. With twenty "
                   "per cent headroom the continuous figure is 2 400 W, so the peak governs and "
                   "3 500 W is the size to buy.",
        "example_note": "The surge figure is per motor: two fridges starting together are two "
                        "surges, and only the largest is in this formula. Stagger the starts.",
        "pitfalls": [
            "<strong>Adding every surge together.</strong> Motors rarely start at the same "
            "instant, and a generator sized for all of them at once is twice the price.",
            "<strong>Buying to the running total.</strong> The generator will run everything "
            "and then trip the moment the fridge cycles on.",
        ],
        "limits": [
            "<li><strong>Appliance wattages are estimates.</strong> The label gives the maximum "
            "and the real draw is usually lower; use the label for headroom.</li>",
        ],
        "uses": [
            "<li>Sizing a standby generator for a power cut.</li>",
            "<li>Checking whether a site generator can start a pump.</li>",
        ],
        "scenarios": [
            {"inputs": {"running": 800, "surge": 2000, "headroom": 20},
             "note": "A small load with a big motor: the peak of 2 800 W decides, not the "
                     "continuous 960 W."},
        ],
    },
    faq=[
        ("What is a surge rating?",
         "The power a generator can deliver for a few seconds while a motor starts. It is "
         "usually about 1.2 to 1.5 times the running rating on the generator's own label."),
        ("Why not just buy the biggest one?",
         "Because generators are inefficient at low load, and an oversized one burns more fuel "
         "and wears faster for the same output."),
        ("Does the power factor matter?",
         "For a household load of resistive appliances it is close to one. Motors and "
         "electronics give a figure below that, and the generator's kVA rating already "
         "accounts for it."),
    ],
    related=[("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/battery-charge-time", "Battery charge time"),
             ("/everyday-life/lighting", "Lighting calculator")],
    checks=[
        ({"running": 2000, "surge": 1500, "headroom": 20},
         {"continuous": 2400, "peak": 3500, "generator": 3500}, 0.01),
        ({"running": 800, "surge": 2000, "headroom": 20},
         {"continuous": 960, "peak": 2800, "generator": 2800}, 0.01),
    ],
))

# ------------------------------------------------------ battery charge time

SPECS.append(S(
    slug="battery-charge-time",
    name="Battery Charge Time Calculator",
    title="Battery Charge Time — Hours to Fill a Battery",
    desc="How long a battery takes to charge from a given depth of discharge, with the charger's "
         "current and the losses of the charging itself taken into account.",
    what="Capacity, current, how empty the battery is and how efficient the charger is, turned "
         "into hours on charge. The efficiency is the part that makes the answer realistic.",
    fields=[
        F("capacity", "Battery capacity", "Ah", 100),
        F("current", "Charger current", "A", 10),
        F("depth", "How empty it is", "%", 50,
          "Half empty is 50. A battery discharged to 20 % remaining needs 80."),
        SEL("efficiency", "Charging efficiency",
            [("90 %, lead acid", 90), ("95 %, AGM", 95), ("99 %, lithium", 99)], 90),
    ],
    results=[
        R("hours", "Time on charge", "h"),
        R("ah_needed", "Charge to put back", "Ah"),
        R("hours_flat", "Time from completely flat", "h"),
    ],
    formula={
        "ah_needed": "capacity * depth / 100",
        "hours": "capacity * depth / 100 / (current * efficiency / 100)",
        "hours_flat": "capacity / (current * efficiency / 100)",
    },
    prose={
        "why": "<p>A hundred-amp-hour battery and a ten-amp charger is ten hours, except that it "
               "is not. Two things lengthen it: the battery is rarely empty, and the charging "
               "itself loses energy to heat. A lead-acid battery loses about a tenth, an AGM "
               "rather less, lithium very little.</p>"
               "<p>The page takes the depth you actually discharged to, so a battery at half "
               "gives five hours rather than ten, and divides by the efficiency as well. The "
               "flat line is there for the case where the battery is new and the question is "
               "the charger's real capacity.</p>",
        "formula_note": "Charge to put back is capacity times depth over a hundred. Time is that "
                        "figure divided by the charger's current and by the efficiency, since "
                        "only that fraction of the current ends up stored.",
        "reading": "A 100 Ah battery half empty, charged at 10 A at 90 per cent efficiency, "
                   "takes 5.56 hours and puts back 50 Ah. From flat it would take 11.1 hours.",
        "example_note": "The last ten per cent takes as long as the first thirty on lead-acid, "
                        "which is why the calculated figure is a floor rather than a promise.",
        "pitfalls": [
            "<strong>Charging too fast.</strong> Lead-acid wants about a tenth of capacity in "
            "amps, so 10 A for 100 Ah; lithium tolerates more and needs a different profile.",
            "<strong>Ignoring the tail.</strong> A charger's bulk phase ends at about eighty "
            "per cent and the rest is slow, so add time rather than trusting the division.",
        ],
        "limits": [
            "<li><strong>Constant current assumed.</strong> Real chargers taper, and the last "
            "part of the charge takes longer than the arithmetic says.</li>",
        ],
        "uses": [
            "<li>Timing a charge from a solar panel or a boat charger.</li>",
            "<li>Checking whether an overnight charge is enough.</li>",
        ],
        "scenarios": [
            {"inputs": {"capacity": 100, "current": 20, "depth": 50, "efficiency": 99},
             "note": "Doubling the current halves the time on a lithium battery: 2.53 hours, "
                     "which is what makes fast charging possible."},
        ],
    },
    faq=[
        ("Why does efficiency lengthen the time?",
         "Because some of the current becomes heat rather than stored charge. Dividing by the "
         "efficiency is the same as saying you need more amp-hours in than come out."),
        ("Can I charge a 100 Ah battery at 50 A?",
         "On lead-acid, no: half the capacity in amps is too fast for the chemistry. Lithium "
         "handles it and specifies its own maximum."),
        ("Does the depth of discharge mean what is left or what is gone?",
         "What is gone. A battery at 50 per cent depth has half its capacity to put back."),
    ],
    related=[("/everyday-life/generator-wattage", "Generator wattage"),
             ("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/tesla-charging-cost", "EV charging cost")],
    checks=[
        ({"capacity": 100, "current": 10, "depth": 50, "efficiency": 90},
         {"hours": 5.5556, "ah_needed": 50, "hours_flat": 11.1111}, 0.01),
        ({"capacity": 100, "current": 20, "depth": 50, "efficiency": 99},
         {"hours": 2.5253, "ah_needed": 50, "hours_flat": 5.0505}, 0.01),
    ],
))

# ------------------------------------------------------------ hot tub cost

SPECS.append(S(
    slug="hot-tub-cost",
    name="Hot Tub Cost Calculator",
    title="Hot Tub Cost — Electricity a Month and a Year",
    desc="What a hot tub costs to run: its heater's power, the hours it runs a day and the "
         "price of a unit, as a daily, monthly and yearly figure.",
    what="A hot tub's electricity, three ways. The heater is the load, the hours are what the "
         "thermostat decides, and the monthly figure is the one that surprises people.",
    fields=[
        F("power", "Heater power", "kW", 2.5, "A 2.5 kW heater is typical for a four-person "
                                             "tub; check the plate on the control box."),
        F("hours", "Hours the heater runs a day", "h", 3,
          "Not the hours the tub is on: the hours the heater is actually heating."),
        F("price", "Electricity price", "$/kWh", 0.15),
        F("days", "Days a month", "days", 30),
    ],
    results=[
        R("kwh_day", "Energy a day", "kWh"),
        R("cost_month", "Cost a month", "$"),
        R("cost_year", "Cost a year", "$"),
    ],
    formula={
        "kwh_day": "power * hours",
        "cost_month": "power * hours * days * price",
        "cost_year": "power * hours * days * 12 * price",
    },
    prose={
        "why": "<p>A hot tub is a heater in a bucket, and a heater in a bucket runs more than "
               "people expect. The pump is a few hundred watts; the heater is two or three "
               "kilowatts, and it holds the water at thirty-eight degrees whether anybody is in "
               "it or not.</p>"
               "<p>The hours box is the honest input and the hard one. A covered tub in a warm "
               "month might heat for an hour a day and an uncovered one in January for six. "
               "The page does the multiplication once you have the figure.</p>",
        "formula_note": "Kilowatts times hours is kilowatt-hours, which is the unit the bill "
                        "counts. The month is that times the days and the price; the year is "
                        "the month times twelve.",
        "reading": "2.5 kW for three hours a day is 7.5 kWh a day, which at fifteen cents is "
                   "33.75 a month and 405 a year. The heater is the whole cost; the pump adds "
                   "a few dollars.",
        "example_note": "Halve the hours and the yearly cost halves with them. A cover is "
                        "cheaper than a tariff change.",
        "pitfalls": [
            "<strong>Using the tub's total rating.</strong> Heater, pump and blower together "
            "are not all running at once; only the heater matters for the bill.",
            "<strong>Forgetting the winter.</strong> The average hides a winter of six hours a "
            "day behind a summer of one.",
        ],
        "limits": [
            "<li><strong>Heater only.</strong> The circulating pump adds a small continuous load "
            "that this page does not count.</li>",
        ],
        "uses": [
            "<li>Deciding whether to run a tub through winter.</li>",
            "<li>Comparing a cover's effect on a bill.</li>",
        ],
        "scenarios": [
            {"inputs": {"power": 2.5, "hours": 6, "price": 0.15, "days": 30},
             "note": "A winter month at six hours a day doubles the bill to 67.50, which is the "
                     "figure people actually meet."},
        ],
    },
    faq=[
        ("Why is the heater on when nobody is in the tub?",
         "Because the thermostat holds the temperature. Some owners schedule lower "
         "temperatures for the working week, which cuts the hours box."),
        ("Does a cover make a difference?",
         "A large one: an uncovered tub loses heat from the surface and the heater runs far "
         "more hours to hold the same temperature."),
        ("Is this the whole bill?",
         "No. It is the heater. The pump, the light and the ozone generator are separate small "
         "loads."),
    ],
    related=[("/everyday-life/electricity-cost-single-usage", "Electricity cost, single use"),
             ("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/shower-cost", "Shower cost")],
    checks=[
        ({"power": 2.5, "hours": 3, "price": 0.15, "days": 30},
         {"kwh_day": 7.5, "cost_month": 33.75, "cost_year": 405}, 0.01),
        ({"power": 2.5, "hours": 6, "price": 0.15, "days": 30},
         {"kwh_day": 15, "cost_month": 67.5, "cost_year": 810}, 0.01),
    ],
))

# ------------------------------------------------------------ shower cost

SPECS.append(S(
    slug="shower-cost",
    name="Shower Cost Calculator",
    title="Shower Cost — Heating Water, per Shower and a Year",
    desc="What a shower costs in energy: flow rate, duration and the rise from cold to hot, "
         "turned into kilowatt-hours and money for one shower and for a household year.",
    what="The physics of heating water, priced. Litres a minute times minutes gives litres; "
         "litres times degrees of rise times 4.186 gives kilojoules; and the answer needs a "
         "boiler efficiency and a tariff.",
    fields=[
        F("flow", "Shower flow rate", "L/min", 9, "A modern head is 8 to 10; an old one is 15 "
                                                  "or more."),
        F("minutes", "Shower length", "min", 8),
        F("people", "People showering a day", "people", 2),
        F("rise", "Temperature rise", "°C", 30,
          "Mains comes in at about 10 to 15 degrees and a shower runs at 38 to 40."),
        SEL("heater", "Water heating",
            [("Electric immersion, 100 %", 100), ("Gas boiler, 90 %", 90),
             ("Heat pump, 300 %", 300)], 100),
        F("price", "Price of a unit", "$/kWh", 0.15),
    ],
    results=[
        R("litres", "Litres a shower", "L"),
        R("kwh", "Energy a shower", "kWh"),
        R("cost_shower", "Cost of one shower", "$"),
        R("cost_year", "Household, a year", "$"),
    ],
    formula={
        "litres": "flow * minutes",
        "kwh": "flow * minutes * 4.186 * rise / (3600 * heater / 100)",
        "cost_shower": "flow * minutes * 4.186 * rise / (3600 * heater / 100) * price",
        "cost_year": "flow * minutes * people * 4.186 * rise / (3600 * heater / 100) * price * 365",
    },
    prose={
        "why": "<p>A shower costs almost nothing but the water heating, and the water heating is "
               "a real amount of energy. Raising a litre of water by one degree takes 4.186 "
               "kilojoules, which is why a kilogram of water is the definition the calorie was "
               "built on.</p>"
               "<p>Nine litres a minute for eight minutes is seventy-two litres. Thirty degrees "
               "of rise on seventy-two litres is about nine megajoules, which is 2.5 "
               "kilowatt-hours, which is about 37 cents. The rest of the page is that "
               "multiplication at other durations and other boiler efficiencies.</p>",
        "formula_note": "Litres times 4.186 kilojoules per kilogram-degree times the rise gives "
                        "kilojoules; dividing by 3 600 gives kilowatt-hours. The boiler "
                        "efficiency divides in, because a heat pump moves more heat than the "
                        "electricity it uses and a gas boiler loses some up the flue.",
        "reading": "Nine litres a minute for eight minutes is 72 litres at 38 per cent of the "
                   "energy of a kilogram each. Thirty degrees of rise and an immersion heater "
                   "gives 2.51 kWh and 37.7 cents a shower; two people daily is 275 dollars a "
                   "year.",
        "example_note": "Cutting the shower to five minutes saves the household about a third "
                        "of that yearly figure, which is more than most tariff switching.",
        "pitfalls": [
            "<strong>Ignoring the rise.</strong> Adding three litres a minute of cold water to "
            "make the shower comfortable does not remove the energy needed to heat the rest.",
            "<strong>Assuming the boiler is 100 per cent.</strong> A condensing gas boiler is "
            "about 90 and a heat pump about 300, and the tariff is per kilowatt-hour either "
            "way, so the two give very different bills.",
        ],
        "limits": [
            "<li><strong>Heating energy only.</strong> The water itself, the sewerage and the "
            "standing charge are not in the price box.</li>",
        ],
        "uses": [
            "<li>Deciding whether a lower-flow head is worth fitting.</li>",
            "<li>Working out what a long shower costs the household over a year.</li>",
        ],
        "scenarios": [
            {"inputs": {"flow": 9, "minutes": 5, "people": 2, "rise": 30, "heater": 100,
                        "price": 0.15},
             "note": "Five minutes instead of eight is 1.57 kWh and 23.6 cents a shower: a "
                     "third off for three minutes of the day."},
        ],
    },
    faq=[
        ("Why 4.186?",
         "Because it takes 4.186 kilojoules to raise one kilogram of water by one degree "
         "Celsius. A litre of water is a kilogram, near enough."),
        ("What temperature does mains water come in at?",
         "About 10 to 15 degrees in a temperate climate and colder in winter, which is why the "
         "rise box is worth changing with the season."),
        ("Is a heat pump really 300 per cent?",
         "It moves heat rather than making it, so a kilowatt-hour of electricity delivers about "
         "three kilowatt-hours of heat to the water. The tariff is per unit of electricity, "
         "which is why the answer falls."),
    ],
    related=[("/everyday-life/hot-tub-cost", "Hot tub cost"),
             ("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/electricity-cost", "Electricity cost")],
    checks=[
        ({"flow": 9, "minutes": 8, "people": 2, "rise": 30, "heater": 100, "price": 0.15},
         {"litres": 72, "kwh": 2.5116, "cost_shower": 0.3767, "cost_year": 274.99}, 0.05),
        ({"flow": 9, "minutes": 5, "people": 2, "rise": 30, "heater": 100, "price": 0.15},
         {"litres": 45, "kwh": 1.5698, "cost_shower": 0.2355, "cost_year": 171.87}, 0.05),
    ],
))

# ------------------------------------------------------- EV charging cost

SPECS.append(S(
    slug="tesla-charging-cost",
    name="EV Charging Cost Calculator",
    title="EV Charging Cost — Cost to Charge and Cost per Kilometre",
    desc="What charging an electric car costs for a distance, from its consumption, the price "
         "of a unit and the losses of charging, with the cost per kilometre beside it.",
    what="Distance, consumption in kilowatt-hours per hundred kilometres, and the tariff, "
         "turned into the cost of the drive. Charging losses are a box of their own because they "
         "are real and easily forgotten.",
    fields=[
        F("distance", "Distance", "km", 1000),
        F("consumption", "Consumption", "kWh/100 km", 15,
          "A compact EV is about 15; a large one 20 to 25."),
        F("price", "Price of electricity", "$/kWh", 0.15),
        SEL("efficiency", "Charging losses",
            [("10 % lost, home AC", 90), ("5 % lost, modern AC", 95), ("2 % lost, DC fast", 98)],
            90),
    ],
    results=[
        R("kwh", "Energy needed", "kWh"),
        R("kwh_charged", "Energy to buy", "kWh"),
        R("cost", "Cost of the distance", "$"),
        R("cost_km", "Cost per kilometre", "$"),
    ],
    formula={
        "kwh": "distance * consumption / 100",
        "kwh_charged": "distance * consumption / 100 / (efficiency / 100)",
        "cost": "distance * consumption / 100 / (efficiency / 100) * price",
        "cost_km": "consumption / 100 / (efficiency / 100) * price",
    },
    prose={
        "why": "<p>An electric car's running cost is a multiplication and a division. Consumption "
               "in kilowatt-hours per hundred kilometres says how much energy the car takes from "
               "the battery to go a hundred; the tariff says what a unit costs; and charging "
               "efficiency says how many units have to come out of the wall to put those into "
               "the battery.</p>"
               "<p>The cost-per-kilometre line is the one that compares with a petrol car, and "
               "it is the figure that stays right whatever distance you type.</p>",
        "formula_note": "Distance times consumption over a hundred gives the energy the car "
                        "uses. Dividing by the charging efficiency adds the losses, and "
                        "multiplying by the price gives the money. The per-kilometre line drops "
                        "the distance entirely.",
        "reading": "A thousand kilometres at 15 kWh per hundred is 150 kWh from the battery, or "
                   "166.7 kWh bought at 90 per cent efficiency, which at fifteen cents is 25 "
                   "dollars, or 2.5 cents a kilometre.",
        "example_note": "Public rapid charging costs two to three times a home tariff, so put "
                        "the public price in the same box to see the difference.",
        "pitfalls": [
            "<strong>Ignoring charging losses.</strong> A tenth of the energy is lost as heat "
            "in the charger and the battery, and it is paid for at the meter.",
            "<strong>Mixing units.</strong> Consumption is per hundred kilometres and distance "
            "is in kilometres; per mile figures need the distance converted first.",
        ],
        "limits": [
            "<li><strong>No idle fees or connection charges.</strong> The page prices energy, "
            "not the parking.</li>",
        ],
        "uses": [
            "<li>Comparing an electric commute with a petrol one.</li>",
            "<li>Costing a long drive on public rapid chargers.</li>",
        ],
        "scenarios": [
            {"inputs": {"distance": 1000, "consumption": 15, "price": 0.15, "efficiency": 98},
             "note": "A DC fast charger loses less, so the same drive costs 22.96 rather than "
                     "25: a small difference that compounds over a year."},
        ],
    },
    faq=[
        ("Why is the energy to buy more than the energy used?",
         "Because charging is not free of losses. About a tenth goes as heat in an AC charge, "
         "and it is measured at the meter rather than at the battery."),
        ("What consumption should I use?",
         "The car's own figure for mixed driving, or the winter figure if the question is about "
         "the worst month. Cold weather adds twenty per cent or more."),
        ("Does this work for a plug-in hybrid?",
         "For the electric part of its driving, yes. The petrol side needs its own arithmetic."),
    ],
    related=[("/everyday-life/battery-charge-time", "Battery charge time"),
             ("/everyday-life/fuel-cost", "Fuel cost"),
             ("/everyday-life/gas-vs-electric-dryer", "Gas vs electric dryer")],
    checks=[
        ({"distance": 1000, "consumption": 15, "price": 0.15, "efficiency": 90},
         {"kwh": 150, "kwh_charged": 166.6667, "cost": 25, "cost_km": 0.025}, 0.01),
        ({"distance": 1000, "consumption": 15, "price": 0.15, "efficiency": 98},
         {"kwh": 150, "kwh_charged": 153.0612, "cost": 22.9592, "cost_km": 0.02296}, 0.01),
    ],
))

# --------------------------------------------------- gas vs electric dryer

SPECS.append(S(
    slug="gas-vs-electric-dryer",
    name="Gas vs Electric Dryer Calculator",
    title="Gas vs Electric Dryer — Running Cost a Year",
    desc="The yearly running cost of a gas dryer against an electric one, from loads a week, "
         "the energy each uses per load and the two tariffs.",
    what="Two dryers, one household, a year each. Electric in kilowatt-hours, gas in therms, "
         "and the two priced so the comparison is honest.",
    fields=[
        F("loads", "Loads a week", "loads", 4),
        F("electric_kwh", "Electric dryer, energy a load", "kWh", 3.3,
          "A vented electric dryer is 3 to 4 kWh a load; a heat-pump dryer about 1.5."),
        F("gas_therms", "Gas dryer, energy a load", "therms", 0.16,
          "About 0.15 to 0.2 therms a load for a standard gas dryer."),
        F("electric_price", "Electricity price", "$/kWh", 0.15),
        F("gas_price", "Gas price", "$/therm", 1.1),
    ],
    results=[
        R("electric_year", "Electric, a year", "$"),
        R("gas_year", "Gas, a year", "$"),
        R("cheaper", "Yearly saving of the cheaper one", "$"),
        R("per_load", "Difference per load", "$"),
    ],
    formula={
        "electric_year": "loads * 52 * electric_kwh * electric_price",
        "gas_year": "loads * 52 * gas_therms * gas_price",
        "cheaper": "abs(loads * 52 * electric_kwh * electric_price - loads * 52 * gas_therms * gas_price)",
        "per_load": "abs(loads * 52 * electric_kwh * electric_price - loads * 52 * gas_therms * gas_price) / (loads * 52)",
    },
    prose={
        "why": "<p>A tumble dryer is one of the few appliances still sold in two fuels, and the "
               "comparison is not obvious. Electricity is the more expensive unit but an "
               "electric dryer uses it efficiently; gas is cheaper per unit and comes out of a "
               "different meter, and the pipe, the vent and the price all vary.</p>"
               "<p>This page puts both on the same footing: a year of the household's actual "
               "loads, each dryer's energy per load, and each fuel's own tariff. The answer is "
               "two yearly costs and the difference between them.</p>",
        "formula_note": "Loads a week times fifty-two gives the yearly count, which multiplies "
                        "each dryer's energy a load and its price. The saving is the absolute "
                        "difference, and the per-load figure divides it back down.",
        "reading": "Four loads a week at 3.3 kWh is 686 kWh a year, which at fifteen cents is "
                   "102.96. The gas dryer uses 33.3 therms, which at 1.10 is 36.61. Gas is 66 "
                   "dollars a year cheaper, or 32 cents a load.",
        "example_note": "The per-load figure is the one that survives a change in laundry "
                        "habits: 32 cents is 64 dollars over two hundred loads.",
        "pitfalls": [
            "<strong>Comparing a heat-pump dryer with a gas one.</strong> A heat pump uses about "
            "1.5 kWh a load and beats gas on running cost in most markets.",
            "<strong>Ignoring the connection.</strong> A gas dryer needs a gas point and a vent, "
            "and the installation can cost more than years of the difference.",
        ],
        "limits": [
            "<li><strong>Running cost only.</strong> The purchase price, the installation and "
            "the venting are separate decisions.</li>",
        ],
        "uses": [
            "<li>Choosing between two dryers in a new kitchen.</li>",
            "<li>Checking whether a heat-pump dryer is worth the extra cost.</li>",
        ],
        "scenarios": [
            {"inputs": {"loads": 7, "electric_kwh": 3.3, "gas_therms": 0.16,
                        "electric_price": 0.25, "gas_price": 1.1},
             "note": "At an expensive electricity tariff and seven loads a week the gap widens "
                     "to about 207 dollars a year."},
        ],
    },
    faq=[
        ("Is gas always cheaper to run?",
         "Not always. A heat-pump dryer on a cheap overnight tariff can beat gas, and gas prices "
         "vary more than electricity between markets."),
        ("What is a therm?",
         "A hundred thousand British thermal units, or about 29.3 kilowatt-hours. Gas is billed "
         "in therms in the United States and in cubic metres in most of Europe."),
        ("Does a gas dryer vent differently?",
         "Yes: it needs its own vent for the products of combustion, which is a separate duct "
         "from the moist air one."),
    ],
    related=[("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/tesla-charging-cost", "EV charging cost"),
             ("/everyday-life/electricity-cost", "Electricity cost")],
    checks=[
        ({"loads": 4, "electric_kwh": 3.3, "gas_therms": 0.16,
          "electric_price": 0.15, "gas_price": 1.1},
         {"electric_year": 102.96, "gas_year": 36.608, "cheaper": 66.352, "per_load": 0.319}, 0.01),
        ({"loads": 7, "electric_kwh": 3.3, "gas_therms": 0.16,
          "electric_price": 0.25, "gas_price": 1.1},
         {"electric_year": 300.3, "gas_year": 64.064, "cheaper": 236.236, "per_load": 0.649}, 0.01),
    ],
))

# ------------------------------------------------------ appliance depreciation

SPECS.append(S(
    slug="appliance-depreciation",
    name="Appliance Depreciation Calculator",
    title="Appliance Depreciation — What It Is Worth Now",
    desc="What a household appliance is worth after a few years, by straight-line depreciation "
         "over the life its type normally lasts, with the yearly loss alongside.",
    what="Replacement cost, age and an expected life, turned into today's value. Straight line: "
         "the same amount lost every year, which is how insurers and second-hand buyers think.",
    fields=[
        F("cost", "What it cost to replace", "$", 800,
          "A new one of the same size and class, not what you paid for it."),
        F("age", "Age in years", "years", 3),
        SEL("life", "How long this type normally lasts",
            [("Washing machine, 10 years", 10), ("Dishwasher, 9 years", 9),
             ("Fridge freezer, 14 years", 14), ("Oven, 15 years", 15),
             ("Boiler, 12 years", 12), ("TV, 7 years", 7)], 10),
    ],
    results=[
        R("value", "Worth now", "$"),
        R("lost", "Value used up", "$"),
        R("per_year", "Lost each year", "$"),
    ],
    formula={
        "value": "max(cost * (1 - age / life), 0)",
        "lost": "cost - max(cost * (1 - age / life), 0)",
        "per_year": "cost / life",
    },
    prose={
        "why": "<p>An appliance loses value on a straight line: a tenth a year for a washers "
               "that lasts ten years, whether or not it got much use in the second. That is not "
               "how a shop prices a trade-in, but it is how an insurer settles a claim and how a "
               "buyer of second-hand white goods thinks.</p>"
               "<p>The page takes the cost of replacing the item, its age, and the life its type "
               "normally gives, and returns the value left. Past the expected life the value is "
               "capped at zero rather than going negative, because an old machine is not a debt.</p>",
        "formula_note": "Cost times one minus the fraction of life used gives the value, floored "
                        "at zero. The used-up figure is the same subtraction the other way "
                        "round, and the yearly line is the cost divided by the life.",
        "reading": "An 800 dollar washing machine at three years old with a ten-year life is "
                   "worth 560: 240 used up, at 80 a year.",
        "example_note": "Age past the life gives zero, which is the honest answer and the one an "
                        "insurer gives a machine that has outlived its class.",
        "pitfalls": [
            "<strong>Using the purchase price.</strong> A replacement of the same size today is "
            "the figure that matters, and it may be higher or lower.",
            "<strong>Assuming appliances last their nominal life.</strong> A cheap machine "
            "often lasts half as long, and a good one twice.",
        ],
        "limits": [
            "<li><strong>Straight line only.</strong> Real second-hand prices fall faster in the "
            "first year, so the value here is generous at the start.</li>",
        ],
        "uses": [
            "<li>Deciding whether a repair is worth it.</li>",
            "<li>Settling a claim on a damaged appliance.</li>",
        ],
        "scenarios": [
            {"inputs": {"cost": 800, "age": 12, "life": 10},
             "note": "A machine older than its expected life is worth nothing on this method, "
                     "which is the case that catches people out."},
        ],
    },
    faq=[
        ("Why straight line rather than declining balance?",
         "Because it is the method a claim and a second-hand price both approximate, and it is "
         "the one a person can check in their head."),
        ("Does a repair reset the clock?",
         "No, but it can extend the practical life. Keep the nominal life and note the repair "
         "separately."),
        ("What about a very new appliance?",
         "Straight line overstates its value: the first year is the steepest fall in the "
         "market, whatever the arithmetic says."),
    ],
    related=[("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/electricity-cost", "Electricity cost"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"cost": 800, "age": 3, "life": 10}, {"value": 560, "lost": 240, "per_year": 80}, 0.01),
        ({"cost": 800, "age": 12, "life": 10}, {"value": 0, "lost": 800, "per_year": 80}, 0.01),
    ],
))

# -------------------------------------------------------------------- EUI

SPECS.append(S(
    slug="eui",
    name="Energy Use Intensity Calculator",
    title="Energy Use Intensity — kWh a Square Metre a Year",
    desc="A building's energy use intensity: yearly consumption divided by floor area, set "
         "against a benchmark for its type, with the difference as a percentage.",
    what="Energy use intensity, which is the number energy certificates are built on: "
         "kilowatt-hours a year for every square metre of floor.",
    fields=[
        F("kwh", "Energy used a year", "kWh", 15000),
        F("area", "Floor area", "m²", 120),
        SEL("benchmark", "Typical for this kind of building",
            [("Detached house, 110", 110), ("Flat, 70", 70), ("Terraced house, 95", 95),
             ("Office, 130", 130), ("School, 105", 105)], 110),
    ],
    results=[
        R("eui", "Energy use intensity", "kWh/m²"),
        R("difference", "Against the benchmark", "%"),
        R("kwh_gap", "Yearly energy above or below", "kWh"),
    ],
    formula={
        "eui": "kwh / area",
        "difference": "(kwh / area - benchmark) / benchmark * 100",
        "kwh_gap": "kwh - benchmark * area",
    },
    prose={
        "why": "<p>Energy use intensity is the only fair way to compare two homes. A large "
               "house always uses more than a small one, so the meter reading says nothing about "
               "whether it is efficient; the same reading divided by floor area says everything.</p>"
               "<p>The benchmark line is the number to look at. A house at 125 against a typical "
               "110 is fourteen per cent above the norm, which is a draught, a boiler or a "
               "habit, and each of them is findable.</p>",
        "formula_note": "Annual kilowatt-hours divided by floor area gives the intensity. The "
                        "difference is the same figure against the benchmark as a percentage, "
                        "and the energy line is the gap multiplied back by the area.",
        "reading": "15 000 kWh a year in 120 square metres is 125 kWh per square metre. Against "
                   "a 110 benchmark that is 13.6 per cent above, which is 1 800 kWh a year, "
                   "or about 270 dollars.",
        "example_note": "The energy-gap line is the one that turns a percentage into a bill: "
                        "1 800 kWh is what the difference costs at your tariff.",
        "pitfalls": [
            "<strong>Comparing houses of different sizes.</strong> Two meters is all this "
            "figure is for; raw consumption only compares similar homes.",
            "<strong>Forgetting what is counted.</strong> The figure depends on whether the "
            "number is electricity only or all fuels, and the two are not interchangeable.",
        ],
        "limits": [
            "<li><strong>One fuel or all.</strong> The box takes whatever total you type, so "
            "put every fuel in the same unit before dividing.</li>",
        ],
        "uses": [
            "<li>Comparing a house with the norm for its type.</li>",
            "<li>Tracking a building's consumption after a retrofit.</li>",
        ],
        "scenarios": [
            {"inputs": {"kwh": 8400, "area": 120, "benchmark": 70},
             "note": "A flat's consumption in a house's floor area reads 70 against a flat "
                     "benchmark of 70: the type has to match the building."},
        ],
    },
    faq=[
        ("What counts as floor area?",
         "Heated floor area, measured inside the walls, is the usual convention. Garages and "
         "outbuildings are excluded."),
        ("Why is a flat's benchmark lower?",
         "Because a flat has neighbours on two sides and a roof above somebody else's ceiling, "
         "so it loses less heat."),
        ("Does this replace an energy certificate?",
         "No. A certificate models the building; this measures what it actually used, and the "
         "two often disagree."),
    ],
    related=[("/everyday-life/appliance-wattage", "Appliance wattage"),
             ("/everyday-life/electricity-cost", "Electricity cost"),
             ("/everyday-life/led-savings", "LED savings")],
    checks=[
        ({"kwh": 15000, "area": 120, "benchmark": 110},
         {"eui": 125, "difference": 13.6364, "kwh_gap": 1800}, 0.01),
        ({"kwh": 8400, "area": 120, "benchmark": 70},
         {"eui": 70, "difference": 0, "kwh_gap": 0}, 0.01),
    ],
))
