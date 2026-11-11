"""

Everyday-life batch H: miles, gallons and the arithmetic of a car.

Fourteen pages that all start from a distance, a volume of fuel and a price.
Some stop there (miles to dollars), some turn the ratio into the other unit
the world uses (miles per gallon against litres per hundred kilometres), and
some go under the bonnet: torque to power, tyre size to diameter, wheel offset
to backspace, engine hours to miles.

The constants are stated on the page and in the article — 5 252 for torque to
horsepower, 235.21 for miles per gallon against litres per hundred kilometres,
231 cubic inches to a gallon — because a constant nobody can check is a guess.

"""

from __future__ import annotations

from lib import F, R, S, SEL

SPECS: list = []
# ---------------------------------------------------------------------- mpg

SPECS.append(S(
    slug="mpg",
    name="MPG Calculator",
    title="MPG Calculator — Miles per Gallon from One Fill",
    desc="Distance on the trip meter and gallons on the pump receipt give miles per gallon, "
         "the cost of a mile, and the same economy in litres per hundred kilometres.",
    what="Miles per gallon for a tank of fuel, what the fuel cost and what each mile cost, "
         "with the same economy expressed as litres per hundred kilometres.",
    fields=[
        F("miles", "Distance covered", "mi", 320),
        F("gallons", "Fuel used", "gal", 10.5,
          help="Refill to the same point both times. A pump that clicks off early can leave "
               "half a gallon in the neck."),
        F("price", "Fuel price", "$/gal", 3.45),
    ],
    results=[
        R("mpg", "Miles per gallon", "mpg"),
        R("l100", "Litres per 100 km", "L/100km"),
        R("cost", "Fuel cost", "$"),
        R("cost_mile", "Cost per mile", "$/mi"),
        R("range", "Range on a 15-gallon tank", "mi"),
    ],
    formula={
        "mpg": "miles / gallons",
        "l100": "235.214583 / (miles / gallons)",
        "cost": "gallons * price",
        "cost_mile": "gallons * price / miles",
        "range": "(miles / gallons) * 15",
    },
    prose={
        "why": "<p>One tank, one division. Three hundred and twenty miles on ten and a half "
               "gallons is 30.5 miles to the gallon, and the receipt says the tank cost 36.23, "
               "so a mile cost 11.3 cents.</p>"
               "<p>Doing it per fill is the only honest version of the number. The trip "
               "computer in the dash resets when it feels like it and reads high on short "
               "runs, and the manufacturer's figure was measured on a rolling road with the "
               "air conditioning off.</p>",
        "formula_note": "Miles over gallons for economy. Litres per hundred kilometres is 235.2 "
                        "divided by miles per gallon — the constant is the number of litres in "
                        "a gallon, 3.785, times the number of kilometres in a mile, 1.609, "
                        "times 100.",
        "reading": "320 miles on 10.5 gallons is 30.5 mpg, which is 7.7 litres per 100 km. The "
                   "tank cost 36.23 and the cost per mile was 11.3 cents.",
        "example_note": "The same miles on 9 gallons would be 35.6 mpg. Economy moves faster "
                        "than people expect at the low end, because the divisor is small.",
        "pitfalls": [
            "<strong>Using the tank size instead of the fuel used.</strong> A 15-gallon tank "
            "that you refill at a quarter full has had 11 gallons through it, not 15.",
            "<strong>Comparing tanks measured differently.</strong> Fill to the first click, "
            "at the same pump if you can. Two fills that stop at different points are not a "
            "controlled test.",
        ],
        "limits": [
            "<li><strong>One tank.</strong> A single fill includes a cold start and whatever "
            "hills the tank covered. Three tanks averaged is a figure worth quoting.</li>",
        ],
        "uses": [
            "<li>Checking the dashboard figure against the receipt.</li>",
            "<li>Measuring what a change — tyres, roof rack, driving style — actually did.</li>",
        ],
        "scenarios": [
            {"inputs": {"miles": 320, "gallons": 8.5, "price": 3.45},
             "note": "The same 320 miles on 8.5 gallons is 37.6 mpg, a 23 per cent "
                     "improvement that no tune-up usually delivers."},
        ],
    },
    faq=[
        ("Why is my calculated mpg lower than the car's?",
         "Because the car's figure is optimistic and because city driving with a cold engine "
         "is the worst case. The receipt does not round in the manufacturer's favour."),
        ("What is a good mpg?",
         "For a petrol car, 30 to 40 mpg is ordinary in mixed driving; 50 is a hybrid. For a "
         "diesel, 45 to 55. The number that matters is your own last three tanks."),
        ("Does the 235.2 constant work for UK gallons?",
         "No. A UK gallon is 4.546 litres, so the constant becomes 282.5. This page uses US "
         "gallons, which is what a US pump delivers."),
    ],
    related=[("/everyday-life/fuel-mileage", "Fuel mileage converter"),
             ("/everyday-life/cost-per-mile", "Cost per mile"),
             ("/everyday-life/miles-to-dollars", "Miles to dollars")],
    checks=[
        ({"miles": 320, "gallons": 10.5, "price": 3.45},
         {"mpg": 30.4762, "l100": 7.7181, "cost": 36.225, "cost_mile": 0.1132,
          "range": 457.1429}, 0.01),
        ({"miles": 320, "gallons": 8.5, "price": 3.45},
         {"mpg": 37.6471, "l100": 6.2479, "cost": 29.325, "cost_mile": 0.0916}, 0.01),
    ],
))

# ------------------------------------------------------------ fuel mileage

SPECS.append(S(
    slug="fuel-mileage",
    name="Fuel Mileage Converter",
    title="Fuel Mileage Converter — MPG and Litres per 100 km",
    desc="The same economy in the unit the other country uses: miles per gallon against "
         "litres per hundred kilometres, with kilometres per litre and imperial gallons too.",
    what="One economy figure in four units — US miles per gallon, litres per hundred "
         "kilometres, kilometres per litre and imperial miles per gallon — so a hire car's "
         "screen and a fuel receipt finally agree.",
    fields=[
        F("mpg", "Miles per US gallon", "mpg", 30),
        F("miles", "Annual distance", "mi", 12000),
    ],
    results=[
        R("l100", "Litres per 100 km", "L/100km"),
        R("km_l", "Kilometres per litre", "km/L"),
        R("mpg_uk", "Miles per imperial gallon", "mpg"),
        R("gal_year", "US gallons a year", "gal"),
    ],
    formula={
        "l100": "235.214583 / mpg",
        "km_l": "mpg * 0.425144",
        "mpg_uk": "mpg * 1.20095",
        "gal_year": "miles / mpg",
    },
    prose={
        "why": "<p>Two countries measure the same thing in opposite directions. Miles per "
               "gallon rises as the car gets better; litres per hundred kilometres falls. "
               "Thirty mpg in the United States is 7.8 L/100km in Europe, and there is no "
               "sense in which the European number is \"worse\" for being smaller.</p>"
               "<p>The conversion is not a multiplication. It is 235.2 divided by the figure, "
               "which is why a car that improves from 20 to 25 mpg improves by five, and one "
               "that goes from 50 to 55 improves by the same five and by a tenth as much in "
               "fuel.</p>",
        "formula_note": "235.214583 divided by miles per gallon gives litres per hundred "
                        "kilometres, because a US gallon is 3.785 litres and a mile is 1.609 "
                        "kilometres. Kilometres per litre is the reciprocal in the other "
                        "direction, and an imperial gallon is 1.20095 US gallons.",
        "reading": "30 mpg is 7.84 litres per 100 km, 12.75 kilometres per litre and 36.0 "
                   "miles per imperial gallon. Twelve thousand miles a year takes 400 US "
                   "gallons.",
        "example_note": "The dash of a European hire car showing 6.0 L/100km is 39.2 mpg, "
                        "which is a modern small diesel doing what it should.",
        "pitfalls": [
            "<strong>Multiplying to swap the units.</strong> 30 mpg is not 30 times 3.785 "
            "divided by 1.609. The relationship is a division, and the two figures move in "
            "opposite directions.",
            "<strong>Confusing US and imperial gallons.</strong> A UK mpg is about twenty per "
            "cent higher for the same car, because the gallon is bigger. Nothing about the "
            "car changed.",
        ],
        "limits": [
            "<li><strong>Steady-state conversion.</strong> The same real driving converted "
            "between units is exact; a manufacturer's test figure converted is still a "
            "manufacturer's test figure.</li>",
        ],
        "uses": [
            "<li>Reading a rental car's economy screen in units you understand.</li>",
            "<li>Comparing a US and a European review of the same model.</li>",
        ],
        "scenarios": [
            {"inputs": {"mpg": 45, "miles": 12000},
             "note": "45 mpg is 5.23 L/100km and 54.0 imperial mpg; the same 12 000 miles now "
                     "takes 267 gallons rather than 400."},
        ],
    },
    faq=[
        ("Why 235.2?",
         "Because litres per 100 km is litres per kilometre times 100, and miles per gallon is "
         "miles per US gallon. The chain works out to 3.785 litres times 100 divided by 1.609 "
         "kilometres, which is 235.2."),
        ("Which unit is better for comparing cars?",
         "Litres per 100 km, because it is proportional to the fuel burned. Going from 20 to 21 "
         "mpg saves more than going from 40 to 41, and the L/100km figure shows that "
         "immediately."),
        ("Is kilometres per litre used anywhere?",
         "In Japan and parts of Latin America, yes, and in India as kilometres per litre. It is "
         "the simplest of the four: distance divided by volume."),
    ],
    related=[("/everyday-life/mpg", "MPG calculator"),
             ("/everyday-life/cost-per-mile", "Cost per mile"),
             ("/conversion/kilometers-to-miles", "Kilometres to miles")],
    checks=[
        ({"mpg": 30, "miles": 12000},
         {"l100": 7.8405, "km_l": 12.7543, "mpg_uk": 36.0285, "gal_year": 400}, 0.01),
        ({"mpg": 45, "miles": 12000},
         {"l100": 5.227, "km_l": 19.1315, "mpg_uk": 54.0428, "gal_year": 266.6667}, 0.01),
    ],
))

# ------------------------------------------------------------- cost per mile

SPECS.append(S(
    slug="cost-per-mile",
    name="Cost per Mile Calculator",
    title="Cost per Mile — Fuel Plus Everything Else",
    desc="Price, economy and the other bills in one figure: fuel per mile, the fixed costs of "
         "a year spread over it, the true cost of a mile and what a year comes to.",
    what="What a mile costs once fuel and the standing costs — insurance, servicing, tax, "
         "tyres — are added, and what that comes to over a year of driving.",
    fields=[
        F("price", "Fuel price", "$/gal", 3.45),
        F("mpg", "Fuel economy", "mpg", 30),
        F("miles_year", "Miles a year", "mi", 12000),
        F("other_year", "Other costs a year", "$", 1200,
          help="Insurance, road tax, servicing, tyres and depreciation, if you count it. "
               "Leave out anything that does not depend on the car moving."),
    ],
    results=[
        R("fuel_mile", "Fuel per mile", "$/mi"),
        R("other_mile", "Other costs per mile", "$/mi"),
        R("total_mile", "Cost per mile", "$/mi"),
        R("fuel_year", "Fuel a year", "$"),
        R("total_year", "Total a year", "$"),
    ],
    formula={
        "fuel_mile": "price / mpg",
        "other_mile": "other_year / miles_year",
        "total_mile": "price / mpg + other_year / miles_year",
        "fuel_year": "price / mpg * miles_year",
        "total_year": "price / mpg * miles_year + other_year",
    },
    prose={
        "why": "<p>The fuel figure is the one people quote and it is never the whole cost. At "
               "3.45 a gallon and 30 mpg a mile costs 11.5 cents in petrol. Spread 1 200 of "
               "insurance, servicing and tyres over 12 000 miles and another 10 cents arrives, "
               "and the true cost of a mile is 21.5.</p>"
               "<p>That number is what a mileage claim is for, and it is also the answer to "
               "whether a second car pays. The standing costs do not fall when the car sits "
               "still: they are per year, and dividing them by a shrinking mileage raises the "
               "cost of every mile you do drive.</p>",
        "formula_note": "Fuel per mile is the price of a gallon over the miles one gallon "
                        "covers. Standing costs per mile are the yearly figure over the yearly "
                        "distance. The total is the sum, and the yearly totals multiply back "
                        "out.",
        "reading": "At 3.45 a gallon and 30 mpg fuel is 11.5 cents a mile; 1 200 a year over "
                   "12 000 miles is 10 cents, so a mile costs 21.5 cents and the year costs "
                   "2 580.",
        "example_note": "Halve the mileage and the standing share doubles. The same 1 200 over "
                        "6 000 miles is 20 cents a mile before a drop of fuel is burned.",
        "pitfalls": [
            "<strong>Counting depreciation twice.</strong> If the car's value falls with age "
            "whether you drive it or not, it is a standing cost. If it falls with miles, it is "
            "already in the per-mile figure and should not be in both.",
            "<strong>Forgetting one-off costs.</strong> An MOT, a set of tyres every three "
            "years, a big service. Divide them into the annual figure rather than pretending "
            "they do not exist.",
        ],
        "limits": [
            "<li><strong>No financing.</strong> A monthly payment is a cost of owning, not of "
            "driving, and it is left out so the figure can be compared between a paid-off car "
            "and a financed one.</li>",
        ],
        "uses": [
            "<li>Setting a mileage rate for a work claim.</li>",
            "<li>Deciding whether a second car is cheaper than taxis.</li>",
        ],
        "scenarios": [
            {"inputs": {"price": 3.45, "mpg": 45, "miles_year": 12000, "other_year": 1200},
             "note": "At 45 mpg fuel falls to 7.7 cents a mile and the total to 17.7, saving "
                     "456 over the year."},
        ],
    },
    faq=[
        ("Should depreciation be in the per-mile cost?",
         "Only the part driven by distance. A car loses value with age regardless, so putting "
         "the whole loss on the miles overstates the cost of a trip."),
        ("What mileage rate does this justify?",
         "Add the two per-mile figures and compare with the published rate for your country. "
         "A car with heavy standing costs and low mileage usually beats it; a cheap high-"
         "mileage car usually does not."),
        ("Does servicing belong in standing costs?",
         "Split it: the annual service is fixed, the tyres and brake pads are per mile. The "
         "page takes one line and lets you decide which way the money is spent."),
    ],
    related=[("/everyday-life/mpg", "MPG calculator"),
             ("/everyday-life/miles-to-dollars", "Miles to dollars"),
             ("/everyday-life/commute", "Commute cost")],
    checks=[
        ({"price": 3.45, "mpg": 30, "miles_year": 12000, "other_year": 1200},
         {"fuel_mile": 0.115, "other_mile": 0.1, "total_mile": 0.215, "fuel_year": 1380,
          "total_year": 2580}, 0.01),
        ({"price": 3.45, "mpg": 45, "miles_year": 12000, "other_year": 1200},
         {"fuel_mile": 0.0767, "total_mile": 0.1767, "fuel_year": 920, "total_year": 2120},
         0.01),
    ],
))

# ------------------------------------------------------------ miles to dollars

SPECS.append(S(
    slug="miles-to-dollars",
    name="Miles to Dollars Calculator",
    title="Miles to Dollars — What a Trip Costs in Fuel",
    desc="Distance, economy and the pump price turned into gallons and money: what a drive "
         "costs before you set off, and what each extra mile of it adds to the bill.",
    what="The fuel a journey needs and what it costs, from the distance, the car's economy "
         "and the price at the pump, with the per-mile rate for a change of plan.",
    fields=[
        F("distance", "Journey distance", "mi", 250),
        F("mpg", "Fuel economy", "mpg", 28),
        F("price", "Fuel price", "$/gal", 3.45),
    ],
    results=[
        R("gallons", "Fuel needed", "gal"),
        R("cost", "Fuel cost", "$"),
        R("cost_mile", "Cost per mile", "$/mi"),
        R("per_100", "Cost per 100 miles", "$"),
        R("return_cost", "There and back", "$"),
    ],
    formula={
        "gallons": "distance / mpg",
        "cost": "distance / mpg * price",
        "cost_mile": "price / mpg",
        "per_100": "price / mpg * 100",
        "return_cost": "distance / mpg * price * 2",
    },
    prose={
        "why": "<p>Two hundred and fifty miles at 28 mpg is 8.93 gallons, which at 3.45 is "
               "30.80. The number is small enough to dismiss and large enough to matter on the "
               "third trip of the month.</p>"
               "<p>The per-mile figure is the useful one because it scales: 12.3 cents a mile "
               "means every extra twenty miles is 2.46, and a change of destination becomes "
               "arithmetic rather than a shrug.</p>",
        "formula_note": "Distance over economy gives gallons; gallons times price gives money. "
                        "The per-mile rate is simply price over miles per gallon, which is why "
                        "it does not depend on the length of the trip at all.",
        "reading": "250 miles at 28 mpg needs 8.93 gallons, costing 30.80, or 12.3 cents a "
                   "mile and 12.32 per hundred. The return trip is 61.61.",
        "example_note": "A car at 40 mpg does the same trip for 21.56. The difference between "
                        "the two cars on this one journey is 9.24, which is a coffee and a "
                        "reminder that economy compounds over a year.",
        "pitfalls": [
            "<strong>Costing the tank instead of the trip.</strong> Filling up costs 60 "
            "whatever the journey; the journey uses part of it. Use the distance, not the "
            "fill.",
            "<strong>Assuming motorway economy.</strong> The car's best figure is at a steady "
            "60. A trip with a cold start, a town and a hill gets less, so add five to ten per "
            "cent for a real journey.",
        ],
        "limits": [
            "<li><strong>Fuel only.</strong> Tolls, parking and the wear the trip puts on tyres "
            "and oil are not in the figure. The cost per mile page has a line for them.</li>",
        ],
        "uses": [
            "<li>Deciding whether a drive or a train is cheaper for one person.</li>",
            "<li>Splitting fuel in a carpool.</li>",
        ],
        "scenarios": [
            {"inputs": {"distance": 250, "mpg": 40, "price": 3.45},
             "note": "At 40 mpg the trip is 6.25 gallons and 21.56, which is nine dollars less "
                     "than the 28 mpg car on the same road."},
        ],
    },
    faq=[
        ("Should I use the car's claimed mpg or my own?",
         "Your own, from the last three fills. The claimed figure is measured without "
         "passengers, wind or a cold morning, and it is usually ten to twenty per cent "
         "better than real driving."),
        ("How do I split fuel between passengers?",
         "Divide the cost by the number of people in the car, which is what the return figure "
         "and a division do. The driver's own share counts like anyone else's."),
        ("Does air conditioning change the answer much?",
         "By five to fifteen per cent on a small engine in town, and very little at a steady "
         "motorway speed. It is worth knowing that the gap is smaller than the gap between two "
         "driving styles."),
    ],
    related=[("/everyday-life/mpg", "MPG calculator"),
             ("/everyday-life/cost-per-mile", "Cost per mile"),
             ("/everyday-life/fuel-distance", "Fuel for a budget")],
    checks=[
        ({"distance": 250, "mpg": 28, "price": 3.45},
         {"gallons": 8.9286, "cost": 30.8036, "cost_mile": 0.1232, "per_100": 12.3214,
          "return_cost": 61.6071}, 0.01),
        ({"distance": 250, "mpg": 40, "price": 3.45},
         {"gallons": 6.25, "cost": 21.5625, "cost_mile": 0.0863, "return_cost": 43.125}, 0.01),
    ],
))

# ----------------------------------------------------------- miles to hours

SPECS.append(S(
    slug="miles-to-hours",
    name="Miles to Hours Calculator",
    title="Miles to Hours — Drive Time with the Stops In",
    desc="Distance over average speed gives the driving time, and a break allowance every "
         "hundred miles gives the arrival time you should plan your journey around.",
    what="How long a drive takes at an average speed, how many breaks the distance earns, and "
         "the total including them, in hours and minutes.",
    fields=[
        F("distance", "Distance", "mi", 250),
        F("speed", "Average speed", "mph", 55,
          help="Average, not the speed limit. Motorway miles at 70 and town miles at 25 "
               "average closer to 50 over a long run."),
        F("break_every", "Break every", "mi", 100),
        F("break_len", "Length of each break", "min", 15),
    ],
    results=[
        R("hours", "Driving time", "h"),
        R("minutes", "Driving time", "min"),
        R("breaks", "Breaks", "stops"),
        R("break_minutes", "Time stopped", "min"),
        R("total_hours", "Total journey", "h"),
    ],
    formula={
        "hours": "distance / speed",
        "minutes": "distance / speed * 60",
        "breaks": "floor(distance / break_every)",
        "break_minutes": "floor(distance / break_every) * break_len",
        "total_hours": "distance / speed + floor(distance / break_every) * break_len / 60",
    },
    prose={
        "why": "<p>Navigation software quotes a time that assumes you drive the limit and do "
               "not stop. Two hundred and fifty miles at 55 is four hours thirty-three "
               "minutes of driving; add two fifteen-minute breaks and the journey is five "
               "hours three.</p>"
               "<p>Breaks are counted per completed block of the interval, not per hour: a "
               "hundred miles earns one, and the last fifty earn none. That matches how a "
               "stop actually happens, which is after the tank or the bladder, not at a "
               "decimal point.</p>",
        "formula_note": "Distance over speed gives hours; times sixty gives minutes. The break "
                        "count is the distance divided by the interval and rounded down, and "
                        "the stopped time is that count times the length of a break.",
        "reading": "250 miles at 55 mph is 4.55 hours, 272.7 minutes. Two breaks of fifteen "
                   "minutes add half an hour, so the journey takes 5.05 hours.",
        "example_note": "At 70 mph the driving time falls to 3.57 hours, but the total only "
                        "falls to 4.07 because the breaks stay. Speed buys less than it looks.",
        "pitfalls": [
            "<strong>Using the speed limit as the average.</strong> A 70 mph motorway run with "
            "a town at each end averages nearer 55 over the whole distance, and the arrival "
            "estimate depends on the average.",
            "<strong>Forgetting the stops that are not breaks.</strong> Fuel, food and a wrong "
            "turn are not in the break field unless you count them, and a long journey usually "
            "has one of each.",
        ],
        "limits": [
            "<li><strong>One average speed.</strong> A route with a mountain pass and a city "
            "ring road has two or three speeds, and the average has to be your estimate of "
            "the whole.</li>",
        ],
        "uses": [
            "<li>Planning a departure time backwards from an appointment.</li>",
            "<li>Deciding whether a drive is a one-day or a two-day trip.</li>",
        ],
        "scenarios": [
            {"inputs": {"distance": 250, "speed": 70, "break_every": 100, "break_len": 15},
             "note": "At 70 mph the driving time is 3.57 hours and the two breaks take the "
                     "total to 4.07, a saving of 59 minutes over the 55 mph run."},
        ],
    },
    faq=[
        ("Why count breaks per hundred miles rather than per hour?",
         "Because the advice is written that way and because it is the distance that wears you "
         "out. A hundred miles is about two hours at a motorway pace, which is the interval "
         "most guidance recommends."),
        ("Should the average speed include stops?",
         "No. Coverage and average speed are different quantities, and mixing them gives a "
         "number that is neither. Put the stops in their own field."),
        ("How many miles a day is reasonable?",
         "For one driver, 500 miles is a long day and 600 is a strain. With a second driver "
         "800 is possible and still tiring."),
    ],
    related=[("/everyday-life/mpg", "MPG calculator"),
             ("/everyday-life/commute", "Commute cost"),
             ("/everyday-life/miles-to-dollars", "Miles to dollars")],
    checks=[
        ({"distance": 250, "speed": 55, "break_every": 100, "break_len": 15},
         {"hours": 4.5455, "minutes": 272.7273, "breaks": 2, "break_minutes": 30,
          "total_hours": 5.0455}, 0.01),
        ({"distance": 250, "speed": 70, "break_every": 100, "break_len": 15},
         {"hours": 3.5714, "minutes": 214.2857, "breaks": 2, "total_hours": 4.0714}, 0.01),
    ],
))
# ---------------------------------------------------------- fuel for a budget

SPECS.append(S(
    slug="fuel-distance",
    name="Fuel for a Budget Calculator",
    title="Fuel for a Budget — How Far Forty Dollars Goes",
    desc="A set amount of money, the pump price and the car's economy: the gallons you can "
         "buy, the miles they cover, and the miles each further ten dollars adds.",
    what="How many gallons a budget buys at the current price, how far the car will go on "
         "them, and the marginal miles that each extra ten dollars of fuel delivers.",
    fields=[
        F("budget", "Money for fuel", "$", 40),
        F("price", "Fuel price", "$/gal", 3.45),
        F("mpg", "Fuel economy", "mpg", 28),
    ],
    results=[
        R("gallons", "Gallons bought", "gal"),
        R("miles", "Miles covered", "mi"),
        R("cost_mile", "Cost per mile", "$/mi"),
        R("per_10", "Miles per $10", "mi"),
        R("empty_tank", "Cost to fill a 13-gallon tank", "$"),
    ],
    formula={
        "gallons": "budget / price",
        "miles": "budget / price * mpg",
        "cost_mile": "price / mpg",
        "per_10": "10 / price * mpg",
        "empty_tank": "13 * price",
    },
    prose={
        "why": "<p>Forty dollars at 3.45 buys 11.59 gallons, and at 28 mpg those gallons cover "
               "324 miles. That is the whole arithmetic of a fuel budget, and it turns an "
               "abstract tank level into a distance you can plot.</p>"
               "<p>The miles-per-ten-dollars line is the one to remember, because it does not "
               "change with the size of the fill: 81 miles. Everything above that is "
               "multiplication.</p>",
        "formula_note": "Money over price gives gallons; gallons times economy gives miles. "
                        "The ten-dollar figure is the same division with ten on top, so it is "
                        "independent of the budget and useful for the next twenty dollars.",
        "reading": "40 dollars at 3.45 is 11.59 gallons, which at 28 mpg is 324.6 miles, at "
                   "12.3 cents a mile. Every further 10 dollars buys 81.2 miles, and filling a "
                   "13-gallon tank from empty costs 44.85.",
        "example_note": "At 45 mpg the same forty dollars covers 521 miles. The budget did not "
                        "change; the car did.",
        "pitfalls": [
            "<strong>Spending the budget and calling it a full tank.</strong> Forty dollars is "
            "rarely a full tank on a large car and always a full tank on a small one. The "
            "gallons line is what the engine gets.",
            "<strong>Assuming the price holds.</strong> The miles figure is priced at today's "
            "pump. A ten per cent rise in price cuts the distance by the same ten per cent.",
        ],
        "limits": [
            "<li><strong>Road miles only.</strong> Idling, a cold start and a traffic jam all "
            "burn fuel without moving, and none of them appear in a distance over economy.</li>",
        ],
        "uses": [
            "<li>Deciding how far a last twenty dollars will take you.</li>",
            "<li>Comparing the cost of a trip in two different cars.</li>",
        ],
        "scenarios": [
            {"inputs": {"budget": 40, "price": 3.45, "mpg": 45},
             "note": "At 45 mpg forty dollars covers 521.7 miles, and each further ten dollars "
                     "buys 130 miles."},
        ],
    },
    faq=[
        ("Does filling up with a set amount rather than a full tank change the mpg?",
         "No. Economy is measured over the miles between fills, and the size of the fill is "
         "irrelevant as long as the tank was filled to the same point both times."),
        ("Why is miles per ten dollars a better rule than miles per tank?",
         "Because a tank is 11 gallons in one car and 18 in another, and ten dollars is ten "
         "dollars. The rule transfers between cars and between countries with a price change."),
        ("Should I round up to the next gallon?",
         "Fuel is sold to the cent, so the exact gallons are fractions. If you are planning a "
         "remote stretch, round the miles down by ten per cent and you will not be walking."),
    ],
    related=[("/everyday-life/mpg", "MPG calculator"),
             ("/everyday-life/miles-to-dollars", "Miles to dollars"),
             ("/everyday-life/cost-per-mile", "Cost per mile")],
    checks=[
        ({"budget": 40, "price": 3.45, "mpg": 28},
         {"gallons": 11.5942, "miles": 324.6377, "cost_mile": 0.1232, "per_10": 81.1594,
          "empty_tank": 44.85}, 0.01),
        ({"budget": 40, "price": 3.45, "mpg": 45},
         {"gallons": 11.5942, "miles": 521.7391, "per_10": 130.4348}, 0.01),
    ],
))

# --------------------------------------------------------- idling fuel use

SPECS.append(S(
    slug="idling-fuel-consumption",
    name="Idling Fuel Consumption Calculator",
    title="Idling Fuel Consumption — What Standing Still Costs",
    desc="Engine size and hours spent idling give the fuel burned standing still, the money "
         "it costs over a year, and the miles of driving that fuel would have bought.",
    what="Fuel burned while the engine idles, from its size and the hours a week it sits "
               "running, and what those hours cost a year — in money and in lost miles.",
    fields=[
        F("displacement", "Engine size", "L", 2,
          help="Two litres is an ordinary four-cylinder, five is a V8. Idle burn follows "
               "engine size more closely than anything else."),
        F("hours_week", "Hours idling a week", "h", 5,
          help="Warming up, waiting at a school, queuing, sitting in a car park with the "
               "heating on."),
        F("price", "Fuel price", "$/gal", 3.45),
        F("mpg", "Fuel economy when moving", "mpg", 30),
    ],
    results=[
        R("gal_hour", "Fuel per hour idling", "gal/h"),
        R("gal_week", "Fuel a week", "gal"),
        R("cost_year", "Cost a year", "$"),
        R("lost_miles", "Miles that fuel would have covered", "mi"),
    ],
    formula={
        "gal_hour": "0.09 * displacement",
        "gal_week": "0.09 * displacement * hours_week",
        "cost_year": "0.09 * displacement * hours_week * 52 * price",
        "lost_miles": "0.09 * displacement * hours_week * 52 * mpg",
    },
    prose={
        "why": "<p>An idling engine burns fuel at a rate set by its size, not by the "
               "thermostat. A two-litre four uses roughly 0.18 gallons an hour at idle — about "
               "a fifth of a gallon — and a five-litre V8 nearer half a gallon.</p>"
               "<p>Five hours a week of two-litre idling is 0.9 gallons, which is 3.11 a week "
               "and 161 a year. The same fuel would have driven 1 404 miles. That is the "
               "sentence the page is for: idling is not free, it is driving without going "
               "anywhere.</p>",
        "formula_note": "The idle rate is taken as 0.09 gallons an hour per litre of "
                        "displacement, a rule of thumb that fits published idle figures for "
                        "engines from 1.5 to 6 litres. Multiply by hours and weeks for the "
                        "year, by price for money and by economy for the miles lost.",
        "reading": "A two-litre engine idles at 0.18 gallons an hour. Five hours a week is 0.9 "
                   "gallons, 3.11 a week, 161.46 a year, and the same fuel would have carried "
                   "the car 1 404 miles.",
        "example_note": "Idling also wears the engine without adding miles to the odometer, so "
                        "the service interval arrives by date rather than by distance — and "
                        "the used-car odometer reads low.",
        "pitfalls": [
            "<strong>Believing a restart costs more than idling.</strong> A warm restart uses "
            "a fraction of a minute's idle. Modern starters are rated for it, and above about "
            "ten seconds of standing the restart wins.",
            "<strong>Assuming idling warms the car faster.</strong> An idling engine warms "
            "slowly and the cabin heater takes heat out of it. Driving gently warms both "
            "sooner.",
        ],
        "limits": [
            "<li><strong>Rule of thumb, not a test.</strong> Idle burn varies with "
            "temperature, load from the alternator and the air conditioning, which can add "
            "half as much again.</li>",
        ],
        "uses": [
            "<li>Working out what a school-run queue costs a term.</li>",
            "<li>Deciding whether a block heater or a remote start is worth fitting.</li>",
        ],
        "scenarios": [
            {"inputs": {"displacement": 2, "hours_week": 10, "price": 3.45, "mpg": 30},
             "note": "Ten hours a week doubles everything: 1.8 gallons a week, 322.92 a year "
                     "and 2 808 miles of driving given away."},
        ],
    },
    faq=[
        ("How much fuel does air conditioning use while idling?",
         "Around a tenth of a gallon an hour on a small engine at idle, and more in a hot "
         "climate where the compressor is working hard. It is not in this figure."),
        ("Is idling bad for the engine?",
         "It is not good for it. Idling burns fuel at low load, dilutes the oil with "
         "condensation and loads the catalytic converter less than it would like. Short "
         "idles are harmless; a habit is not."),
        ("Do stop-start cars idle at all?",
         "Only at rest with the system disabled or the battery low. On a car with the function "
         "working, most of this figure goes away — and that is the point of the function."),
    ],
    related=[("/everyday-life/mpg", "MPG calculator"),
             ("/everyday-life/cost-per-mile", "Cost per mile"),
             ("/everyday-life/engine-hours-to-miles-converter", "Engine hours to miles")],
    checks=[
        ({"displacement": 2, "hours_week": 5, "price": 3.45, "mpg": 30},
         {"gal_hour": 0.18, "gal_week": 0.9, "cost_year": 161.46, "lost_miles": 1404}, 0.01),
        ({"displacement": 2, "hours_week": 10, "price": 3.45, "mpg": 30},
         {"gal_hour": 0.18, "gal_week": 1.8, "cost_year": 322.92, "lost_miles": 2808}, 0.01),
    ],
))

# ---------------------------------------------------------- gas oil ratio

SPECS.append(S(
    slug="gas-oil-ratio",
    name="Gas to Oil Ratio Calculator",
    title="Gas to Oil Ratio — Two-Stroke Mix in Millilitres",
    desc="Litres of petrol and a mix ratio give the oil to add, in millilitres and fluid "
         "ounces, and the total volume in the can, for a saw, strimmer or outboard.",
    what="The oil a two-stroke mix needs for a given amount of petrol at 50:1, 40:1, 32:1 or "
         "16:1, in millilitres and fluid ounces, with the total volume after mixing.",
    fields=[
        F("fuel_l", "Petrol", "L", 5),
        SEL("ratio", "Mix ratio",
            [("50:1 — modern saws and strimmers", 50), ("40:1 — older two-strokes", 40),
             ("32:1 — small outboards and blowers", 32), ("16:1 — very old machines", 16)], 50),
    ],
    results=[
        R("oil_ml", "Oil to add", "ml"),
        R("oil_oz", "Oil to add", "fl oz"),
        R("mix_l", "Total in the can", "L"),
        R("oil_pct", "Oil share", "%"),
    ],
    formula={
        "oil_ml": "fuel_l * 1000 / ratio",
        "oil_oz": "fuel_l * 1000 / ratio / 29.5735",
        "mix_l": "fuel_l + fuel_l / ratio",
        "oil_pct": "100 / (ratio + 1)",
    },
    prose={
        "why": "<p>Two-stroke engines have no sump, so the oil goes in the petrol and the ratio "
               "is the whole lubrication system. Fifty to one means fifty parts petrol to one "
               "part oil, and five litres of petrol needs a hundred millilitres.</p>"
               "<p>The trap is that the ratio is not a percentage. One part in fifty is two "
               "per cent of the total, one in sixteen is nearly six, and pouring \"a bit extra "
               "in for safety\" makes the engine run lean at the top end and foul the plug at "
               "the bottom.</p>",
        "formula_note": "Litres times a thousand gives millilitres of petrol, divided by the "
                        "ratio for the oil. The total volume is the petrol plus the oil, which "
                        "is where the difference between parts and percent shows up.",
        "reading": "Five litres at 50:1 takes 100 millilitres of oil, 3.38 fluid ounces, and "
                   "the can then holds 5.1 litres. The oil is 1.96 per cent of the total.",
        "example_note": "The same five litres at 16:1 takes 312.5 millilitres and the can "
                        "holds 5.31 litres — three times the oil for the same petrol.",
        "pitfalls": [
            "<strong>Mixing by eye.</strong> A splash in a can is anywhere from 30:1 to 100:1, "
            "and both ends are bad. Measure the oil with the bottle's own gauge or a "
            "measuring jug.",
            "<strong>Using four-stroke oil.</strong> It does not stay mixed and does not "
            "lubricate a crankcase-less engine. Two-stroke oil, and preferably the "
            "semi-synthetic that suits the machine.",
        ],
        "limits": [
            "<li><strong>Ratio only.</strong> Fuel going stale in the can matters more than a "
            "few millilitres of oil; mixed fuel is best used within a month or two.</li>",
        ],
        "uses": [
            "<li>Mixing a can for a chainsaw or strimmer.</li>",
            "<li>Checking a ratio after buying a new machine with different instructions.</li>",
        ],
        "scenarios": [
            {"inputs": {"fuel_l": 5, "ratio": 16},
             "note": "At 16:1 or 6.25 per cent, five litres takes 312.5 millilitres of oil, "
                     "which is a third of a small bottle."},
        ],
    },
    faq=[
        ("Is 50:1 the same as 2 per cent?",
         "Roughly: one part in fifty plus the oil is 1.96 per cent of the total. Oil bottles "
         "sometimes label 2 per cent as 50:1, and the difference is within a rounding error "
         "on a five-litre can."),
        ("What happens if I use too much oil?",
         "A smoky exhaust, a fouled plug and carbon on the piston. The engine also runs a "
         "little leaner because oil displaces petrol, and lean is the dangerous direction."),
        ("Can I mix different two-stroke oils?",
         "Within a tank it does no harm if they are the same specification. Mixing mineral and "
         "synthetic of unknown type is how an engine ends up with jelly in the carburettor."),
    ],
    related=[("/everyday-life/fuel-distance", "Fuel for a budget"),
             ("/everyday-life/mpg", "MPG calculator"),
             ("/conversion/gallon", "Gallons and litres")],
    checks=[
        ({"fuel_l": 5, "ratio": 50},
         {"oil_ml": 100, "oil_oz": 3.3814, "mix_l": 5.1, "oil_pct": 1.9608}, 0.01),
        ({"fuel_l": 5, "ratio": 16},
         {"oil_ml": 312.5, "oil_oz": 10.5669, "mix_l": 5.3125, "oil_pct": 5.8824}, 0.01),
    ],
))

# ---------------------------------------------------------------- gvwr

SPECS.append(S(
    slug="gvwr",
    name="GVWR Calculator",
    title="GVWR Calculator — Curb Weight, Payload and What's Left",
    desc="Curb weight plus the payload rating gives the gross weight; load it with cargo and "
         "passengers to see the share used and the margin left before the limit.",
    what="The gross vehicle weight rating from curb weight and payload, how much of it your "
         "load uses once people and cargo are in, and the margin still available.",
    fields=[
        F("curb", "Curb weight", "lb", 4200,
          help="The car with fluids and no people, from the door sticker or the handbook."),
        F("payload", "Payload rating", "lb", 1500),
        F("cargo", "Cargo weight", "lb", 1100),
        F("people", "People and their kit", "lb", 350,
          help="Two adults and a child is nearer 400 than 300 once bags are counted."),
    ],
    results=[
        R("gvwr", "Gross vehicle weight rating", "lb"),
        R("loaded", "Weight with your load", "lb"),
        R("remaining", "Margin left", "lb"),
        R("used_pct", "Payload used", "%"),
    ],
    formula={
        "gvwr": "curb + payload",
        "loaded": "curb + cargo + people",
        "remaining": "curb + payload - curb - cargo - people",
        "used_pct": "(cargo + people) / payload * 100",
    },
    prose={
        "why": "<p>The gross vehicle weight rating is a limit on the whole vehicle, not on "
               "what you put in the boot. It is curb weight plus payload, and payload is "
               "everything you add: people, luggage, a roof box, the dog.</p>"
               "<p>A 4 200-pound car with a 1 500-pound payload has a 5 700-pound rating. Load "
               "1 100 pounds of cargo and 350 pounds of people and you have used 1 450 of the "
               "1 500, leaving 3 850 pounds of headroom against the rating but only 50 pounds "
               "of payload.</p>",
        "formula_note": "Curb plus payload gives the rating; curb plus cargo plus people gives "
                        "the loaded weight; the difference is the margin. Payload used is the "
                        "load over the rating, which is the number that tells you whether you "
                        "are close.",
        "reading": "4 200 curb plus 1 500 payload is a 5 700-pound rating. A 1 100-pound cargo "
                   "and 350 pounds of people leave 4 250 pounds of margin and 96.7 per cent of "
                   "the payload used.",
        "example_note": "Payload is often the first limit you meet, not the rating. A family, "
                        "a dog and a roof box can use 700 pounds before a suitcase is loaded.",
        "pitfalls": [
            "<strong>Reading payload as boot capacity.</strong> It includes the people. Four "
            "adults at 180 pounds are 720 pounds of payload before luggage.",
            "<strong>Forgetting the accessories.</strong> A tow bar, a winch and a set of "
            "all-terrain tyres all come off the payload and none of them feel like cargo.",
        ],
        "limits": [
            "<li><strong>GVWR only.</strong> Axle ratings and the gross trailer weight are "
            "separate limits, and a vehicle can be under its GVWR and over its rear axle "
            "rating.</li>",
        ],
        "uses": [
            "<li>Loading for a move or a holiday with the boot full.</li>",
            "<li>Checking a used car's sticker before adding a tow bar and a family.</li>",
        ],
        "scenarios": [
            {"inputs": {"curb": 4200, "payload": 1500, "cargo": 1600, "people": 400},
             "note": "1 600 pounds of cargo and 400 of people is 2 000 against a 1 500 rating: "
                     "the car is 500 pounds over, which is a handling and braking problem, not "
                     "a paperwork one."},
        ],
    },
    faq=[
        ("Where do I find the payload rating?",
         "On the tyre and loading sticker in the driver's door jamb, usually as \"combined "
         "weight of occupants and cargo should never exceed\". The handbook has it as well."),
        ("Does GVWR include a trailer?",
         "No. A trailer's tongue weight counts against payload, and the trailer's own weight "
         "counts against the gross combined weight rating, which is a third figure."),
        ("Can I increase the payload?",
         "Not legally. The rating is set by the manufacturer from brakes, springs and tyres, "
         "and fitting heavy-duty parts does not change what the sticker says."),
    ],
    related=[("/everyday-life/wheel-offset", "Wheel offset"),
             ("/everyday-life/horsepower", "Horsepower"),
             ("/everyday-life/cost-per-mile", "Cost per mile")],
    checks=[
        ({"curb": 4200, "payload": 1500, "cargo": 1100, "people": 350},
         {"gvwr": 5700, "loaded": 5650, "remaining": 50, "used_pct": 96.6667}, 0.01),
        ({"curb": 4200, "payload": 1500, "cargo": 1600, "people": 400},
         {"gvwr": 5700, "loaded": 6200, "remaining": -500, "used_pct": 133.3333}, 0.01),
    ],
))

# ------------------------------------------------------------- horsepower

SPECS.append(S(
    slug="horsepower",
    name="Horsepower Calculator",
    title="Horsepower — Torque Times RPM over 5,252",
    desc="Torque at a given engine speed gives horsepower and kilowatts, with the same torque "
         "in newton metres and the power per litre that makes engines comparable.",
    what="Horsepower from torque and rpm, the same figure in kilowatts, the torque converted "
         "to newton metres, and the power per litre that makes engines comparable.",
    fields=[
        F("torque", "Torque", "lb-ft", 300),
        F("rpm", "Engine speed", "rpm", 4000),
        F("displacement", "Engine size", "L", 2),
    ],
    results=[
        R("hp", "Horsepower", "hp"),
        R("kw", "Power", "kW"),
        R("torque_nm", "Torque", "Nm"),
        R("hp_litre", "Power per litre", "hp/L"),
    ],
    formula={
        "hp": "torque * rpm / 5252",
        "kw": "torque * rpm / 5252 * 0.7457",
        "torque_nm": "torque * 1.35582",
        "hp_litre": "torque * rpm / 5252 / displacement",
    },
    prose={
        "why": "<p>Horsepower is torque doing work at a speed, and the constant is 5 252 "
               "because one horsepower is 550 foot-pounds a second and a revolution is 2π "
               "radians. Three hundred pound-feet at 4 000 rpm is 228 horsepower.</p>"
               "<p>That is why a diesel and a petrol engine with the same torque make different "
               "power: the diesel peaks at 2 000 rpm, the petrol at 5 000, and the same torque "
               "at more than twice the speed is more than twice the power.</p>",
        "formula_note": "Torque times rpm over 5 252 gives horsepower; times 0.7457 gives "
                        "kilowatts. Newton metres are pound-feet times 1.35582, and specific "
                        "output is the power divided by the displacement, which is how a "
                        "2-litre and a 5-litre engine can be compared at all.",
        "reading": "300 lb-ft at 4 000 rpm is 228.5 hp, 170.4 kW and 406.7 Nm, which in a "
                   "two-litre engine is 114 hp per litre — a modern turbo four.",
        "example_note": "The same torque at 2 000 rpm is 114 hp. Nothing about the engine "
                        "changed except the speed at which the figure is read.",
        "pitfalls": [
            "<strong>Quoting peak torque as if it were constant.</strong> An engine makes that "
            "figure over a band of a few hundred rpm. Horsepower at the redline is lower "
            "because torque has fallen away.",
            "<strong>Converting with 5 252 rounded.</strong> The exact constant is 5 252.11, "
            "which matters only at the fourth digit. Below that, the engine's own tolerances "
            "are wider.",
        ],
        "limits": [
            "<li><strong>Crank figures.</strong> Manufacturer numbers are at the flywheel. A "
            "rolling road measures at the wheels, and the loss through the drivetrain is ten "
            "to twenty per cent.</li>",
        ],
        "uses": [
            "<li>Checking a dyno sheet's arithmetic.</li>",
            "<li>Comparing two engines of different size on power per litre.</li>",
        ],
        "scenarios": [
            {"inputs": {"torque": 300, "rpm": 2000, "displacement": 2},
             "note": "At 2 000 rpm the same torque is 114.2 hp and 85.2 kW: torque is a force, "
                     "power is a rate, and only the second one depends on speed."},
        ],
    },
    faq=[
        ("Why is horsepower torque times rpm divided by 5 252?",
         "Because power is torque times angular speed, and the units — pound-feet, revolutions "
         "a minute, 550 foot-pounds a second — work out to that constant when you convert."),
        ("Which matters more, torque or power?",
         "Torque is what you feel pulling away; power is what keeps you accelerating. A heavy "
         "car with little power but a lot of low torque feels strong and is slow."),
        ("Is hp per litre a fair comparison?",
         "Between engines of the same era and fuel, yes. Between a 1970 V8 and a modern turbo "
         "four it flatters the modern engine, which is the point of quoting it."),
    ],
    related=[("/everyday-life/0-60", "0 to 60 time"),
             ("/everyday-life/gvwr", "GVWR"),
             ("/everyday-life/tire-size", "Tyre size")],
    checks=[
        ({"torque": 300, "rpm": 4000, "displacement": 2},
         {"hp": 228.4844, "kw": 170.3899, "torque_nm": 406.746, "hp_litre": 114.2422}, 0.01),
        ({"torque": 300, "rpm": 2000, "displacement": 2},
         {"hp": 114.2422, "kw": 85.1949, "hp_litre": 57.1211}, 0.01),
    ],
))
# -------------------------------------------------------------------- 0-60

SPECS.append(S(
    slug="0-60",
    name="0 to 60 Calculator",
    title="0 to 60 — Average Acceleration, g Force and Distance",
    desc="A 0-60 time is an average acceleration: this page turns it into feet per second "
         "squared, g force, the distance the car covers doing it, and its power per pound.",
    what="What a 0-60 time means in physics: average acceleration in feet per second squared "
         "and in g, the distance the car covers doing it, and the power-to-weight that "
         "usually explains it.",
    fields=[
        F("seconds", "0-60 time", "s", 6.5),
        F("weight", "Kerb weight", "lb", 3300),
        F("hp", "Power", "hp", 228),
    ],
    results=[
        R("accel", "Average acceleration", "ft/s²"),
        R("g", "In g", "g"),
        R("distance", "Distance covered", "ft"),
        R("avg_mph", "Average speed", "mph"),
        R("hp_lb", "Power to weight", "hp/lb"),
    ],
    formula={
        "accel": "60 * 1.466667 / seconds",
        "g": "60 * 1.466667 / seconds / 32.174",
        "distance": "0.5 * (60 * 1.466667 / seconds) * seconds * seconds",
        "avg_mph": "30",
        "hp_lb": "hp / weight",
    },
    prose={
        "why": "<p>Sixty miles an hour is 88 feet a second exactly, and a car that reaches it in "
               "6.5 seconds has averaged 13.5 feet per second squared — 0.42 g, which is a "
               "third of what the tyres can do in the dry.</p>"
               "<p>That gap is the interesting part. A launch is limited by grip for the first "
               "second, then by power, and the average hides both. It is why two cars with the "
               "same quoted time feel different: one grips, the other pulls.</p>",
        "formula_note": "60 mph is 88 ft/s, so the average acceleration is 88 over the time. "
                        "Distance under constant acceleration is half that rate times the "
                        "square of the time, and dividing the acceleration by 32.17 gives g.",
        "reading": "6.5 seconds to 60 is an average of 13.54 ft/s², 0.42 g, over 286 feet, at "
                   "an average of 30 mph. 228 hp in a 3 300-pound car is 0.069 hp a pound.",
        "example_note": "A four-second car covers 176 feet and pulls 0.68 g average. The "
                        "distance falls faster than the time, because it depends on the square "
                        "of the time.",
        "pitfalls": [
            "<strong>Reading the time as constant acceleration.</strong> A real run is not "
            "uniform: the first foot is a clutch and the last few miles an hour take longer "
            "than the middle of the range.",
            "<strong>Comparing times from different surfaces.</strong> A tenth of a second is "
            "inside the difference between a cold road and a warm one, so two runs are a "
            "comparison and one is an anecdote.",
        ],
        "limits": [
            "<li><strong>Straight line, no loss.</strong> Rolling resistance, wheelspin and "
            "gear changes are averaged into the figure rather than modelled.</li>",
        ],
        "uses": [
            "<li>Understand what a quoted acceleration figure means physically.</li>",
            "<li>Correlating a 0-60 time with the power-to-weight of the car.</li>",
        ],
        "scenarios": [
            {"inputs": {"seconds": 4, "weight": 3300, "hp": 228},
             "note": "Four seconds is 22 ft/s², 0.68 g and 176 feet — 110 feet less than the "
                     "6.5-second run for 2.5 seconds less time."},
        ],
    },
    faq=[
        ("Why does distance depend on the square of the time?",
         "Because the car starts from rest. Distance grows with time squared under constant "
         "acceleration, so halving the time quarters the distance."),
        ("Is 0.42 g a lot?",
         "For an average over a full run, yes — a family car manages 0.3 to 0.4, a fast one "
         "0.6. Tyres can do 1 g in the dry, which is why the launch is limited by grip for "
         "the first moment."),
        ("Does this account for the one-foot rollout?",
         "No. Drag strips measure from a rolling start of about a foot, which flatters a time "
         "by roughly two tenths. Manufacturer figures vary in whether they include it."),
    ],
    related=[("/everyday-life/horsepower", "Horsepower"),
             ("/everyday-life/gvwr", "GVWR"),
             ("/everyday-life/mpg", "MPG calculator")],
    checks=[
        ({"seconds": 6.5, "weight": 3300, "hp": 228},
         {"accel": 13.5385, "g": 0.4208, "distance": 286.0, "avg_mph": 30,
          "hp_lb": 0.0691}, 0.01),
        ({"seconds": 4, "weight": 3300, "hp": 228},
         {"accel": 22.0, "g": 0.6838, "distance": 176.0, "hp_lb": 0.0691}, 0.01),
    ],
))

# --------------------------------------------------------------- tire size

SPECS.append(S(
    slug="tire-size",
    name="Tire Size Calculator",
    title="Tire Size — Sidewall, Diameter and Revs per Mile",
    desc="A 225/45 R17 read out loud: sidewall height, overall diameter, circumference and the "
         "revolutions a mile, which is what the speedometer is calibrated against.",
    what="What the numbers on a tyre sidewall mean in inches: section width, sidewall height, "
         "overall diameter, circumference and revolutions per mile.",
    fields=[
        F("width", "Section width", "mm", 225),
        F("aspect", "Aspect ratio", "%", 45,
          help="The sidewall as a percentage of the width, not a millimetre figure. 45 means "
               "45 per cent of 225 mm."),
        F("rim", "Rim diameter", "in", 17),
    ],
    results=[
        R("sidewall_mm", "Sidewall height", "mm"),
        R("sidewall_in", "Sidewall height", "in"),
        R("diameter", "Overall diameter", "in"),
        R("circumference", "Circumference", "in"),
        R("revs_mile", "Revolutions per mile", "rev/mi"),
    ],
    formula={
        "sidewall_mm": "width * aspect / 100",
        "sidewall_in": "width * aspect / 100 / 25.4",
        "diameter": "rim + 2 * width * aspect / 100 / 25.4",
        "circumference": "pi * (rim + 2 * width * aspect / 100 / 25.4)",
        "revs_mile": "63360 / (pi * (rim + 2 * width * aspect / 100 / 25.4))",
    },
    prose={
        "why": "<p>225/45 R17 is three measurements in one line. 225 millimetres is the width "
               "across the tread, 45 is the sidewall as a percentage of that width, and 17 "
               "inches is the rim. Nothing on the tyre says how tall the whole wheel is, and "
               "that is the number that changes your speedometer.</p>"
               "<p>45 per cent of 225 is 101 millimetres, about four inches. Two sidewalls "
               "plus a 17-inch rim is 24.97 inches tall, and the tyre turns 808 times a mile. "
               "Fit a different overall diameter and the car thinks it is going faster or "
               "slower than it is.</p>",
        "formula_note": "Width times the aspect percentage gives the sidewall in millimetres, "
                        "divided by 25.4 for inches. Diameter is the rim plus two sidewalls; "
                        "circumference is pi times that, and revs per mile is 63 360 inches "
                        "over the circumference.",
        "reading": "225/45 R17 has a 101.25 mm sidewall, 3.99 inches. The wheel is 24.97 inches "
                   "across, 78.45 inches round, and turns 807.6 times a mile.",
        "example_note": "A 225/50 R17 is 25.86 inches tall, which is nearly four per cent more "
                        "than the 45 — and four per cent is the difference between an accurate "
                        "speedometer and one that reads four miles an hour slow at seventy.",
        "pitfalls": [
            "<strong>Reading the aspect as millimetres.</strong> 45 is a percentage. A 45 on a "
            "225 tyre is 101 mm and a 45 on a 275 tyre is 124 mm, and both are called 45.",
            "<strong>Changing width without changing aspect.</strong> Going to 245/45 keeps "
            "the label similar and makes the wheel an inch taller, which costs acceleration "
            "and puts the odometer out.",
        ],
        "limits": [
            "<li><strong>Nominal sizes.</strong> Real tyres vary by a few millimetres between "
            "brands, and a worn tyre is smaller than a new one of the same size.</li>",
        ],
        "uses": [
            "<li>Checking whether a plus-one wheel change keeps the overall diameter.</li>",
            "<li>Working out why the speedometer reads high after a tyre change.</li>",
        ],
        "scenarios": [
            {"inputs": {"width": 225, "aspect": 50, "rim": 17},
             "note": "225/50 R17 is 25.86 inches across, 3.6 per cent larger in diameter than "
                     "the 45 profile, and turns 779.9 times a mile rather than 807.6."},
        ],
    },
    faq=[
        ("What does the R in 225/45 R17 mean?",
         "Radial construction. Almost every car tyre sold today is radial, and the letter has "
         "been on the sidewall since the 1970s as a leftover."),
        ("How much can the overall diameter change?",
         "Within three per cent is the usual rule for keeping the speedometer and the "
         "electronics happy. Above that, ABS and gearbox sensors start to disagree with the "
         "wheels."),
        ("Why does revs per mile matter?",
         "The odometer counts revolutions, so a tyre with the wrong circumference makes every "
         "mile on the dash the wrong length — and resale value follows the odometer."),
    ],
    related=[("/everyday-life/wheel-offset", "Wheel offset"),
             ("/everyday-life/mpg", "MPG calculator"),
             ("/everyday-life/horsepower", "Horsepower")],
    checks=[
        ({"width": 225, "aspect": 45, "rim": 17},
         {"sidewall_mm": 101.25, "sidewall_in": 3.9862, "diameter": 24.9724,
          "circumference": 78.4528, "revs_mile": 807.6217}, 0.01),
        ({"width": 225, "aspect": 50, "rim": 17},
         {"sidewall_mm": 112.5, "diameter": 25.8583, "circumference": 81.2361,
          "revs_mile": 779.9484}, 0.01),
    ],
))

# ------------------------------------------------------------- wheel offset

SPECS.append(S(
    slug="wheel-offset",
    name="Wheel Offset Calculator",
    title="Wheel Offset — Backspace, Front Space and Track",
    desc="Offset and rim width turned into backspace and front space in inches, plus how far "
         "the wheel moves out when you change offset and what that does to track.",
    what="Where the mounting face sits in the rim: the backspace and front space in millimetres "
         "and inches, and how a change of offset moves the wheel in or out.",
    fields=[
        F("rim_width", "Rim width", "in", 8),
        F("offset", "Offset", "mm", 35,
          help="Positive moves the mounting face outwards and tucks the wheel in. A stock wheel "
               "is usually between 30 and 45 mm."),
        F("new_offset", "Offset you are considering", "mm", 20),
    ],
    results=[
        R("half_width", "Half the rim width", "mm"),
        R("backspace", "Backspace", "in"),
        R("frontspace", "Front space", "in"),
        R("move_out", "Change, each side", "mm"),
        R("track_change", "Track change", "in"),
    ],
    formula={
        "half_width": "rim_width * 25.4 / 2",
        "backspace": "(rim_width * 25.4 / 2 + offset) / 25.4",
        "frontspace": "(rim_width * 25.4 / 2 - offset) / 25.4",
        "move_out": "offset - new_offset",
        "track_change": "(offset - new_offset) * 2 / 25.4",
    },
    prose={
        "why": "<p>Offset is the distance from the rim's centre line to the face that bolts to "
               "the hub, in millimetres. Positive offset means the face is outboard of the "
               "centre, which pulls the wheel in towards the suspension.</p>"
               "<p>An eight-inch rim is 203.2 millimetres wide, so half of it is 101.6. At 35 "
               "millimetres of offset the backspace is 136.6 millimetres — 5.38 inches — and "
               "the front space is 2.62 inches. Change to a 20 millimetre offset and the wheel "
               "moves 15 millimetres out on each side, widening the track by 1.18 inches.</p>",
        "formula_note": "Half the rim width plus the offset is the backspace, measured from the "
                        "inner lip to the mounting face. Half minus the offset is the front "
                        "space. A smaller offset moves the wheel outboard by the difference, "
                        "and the track widens by twice that because there are two sides.",
        "reading": "An 8-inch rim at 35 mm offset has a 5.38-inch backspace and 2.62 inches of "
                   "front space; at 20 mm offset it sits 15 mm further out each side and the "
                   "track grows 1.18 inches.",
        "example_note": "Zero offset puts the mounting face on the centre line: 4.00 inches of "
                    "backspace and 4.00 of front space on an 8-inch rim, which is the shape "
                    "most deep-dish wheels are pretending to be.",
        "pitfalls": [
            "<strong>Confusing offset with backspace.</strong> Offset is measured from the "
            "centre line and backspace from the inner lip. They differ by half the rim width, "
            "which is four inches on an 8-inch rim.",
            "<strong>Ignoring the width change.</strong> A wider rim at the same offset adds "
            "half the extra width inside and half outside. It is the width, not the offset, "
            "that usually causes rubbing.",
        ],
        "limits": [
            "<li><strong>Rim measurements only.</strong> Tyre section width is wider than the "
            "rim and is what actually touches a strut or an arch liner.</li>",
        ],
        "uses": [
            "<li>Checking clearance before buying a second-hand set of wheels.</li>",
            "<li>Working out how far a spacer will push the wheels out.</li>",
        ],
        "scenarios": [
            {"inputs": {"rim_width": 8, "offset": 35, "new_offset": 0},
             "note": "At zero offset the wheel moves 35 mm out each side, widening the track "
                     "by 2.76 inches — enough to change the steering feel and to find the "
                     "edge of the arch."},
        ],
    },
    faq=[
        ("Is a lower offset always further out?",
         "Yes. Offset is measured from the centre towards the outside of the wheel, so "
         "reducing it moves the mounting face inboard relative to the rim and the wheel "
         "outboard relative to the car."),
        ("How much does offset affect handling?",
         "Widening the track a little increases cornering grip and steering weight; too much "
         "loads the wheel bearings and changes the scrub radius, which makes the car wander."),
        ("Can I use spacers instead of new wheels?",
         "A thin spacer is equivalent to reducing the offset by its thickness. Beyond about "
         "5 mm the studs are too short, and the fix is longer studs rather than a thicker "
         "spacer."),
    ],
    related=[("/everyday-life/tire-size", "Tyre size"),
             ("/everyday-life/gvwr", "GVWR"),
             ("/everyday-life/0-60", "0 to 60 time")],
    checks=[
        ({"rim_width": 8, "offset": 35, "new_offset": 20},
         {"half_width": 101.6, "backspace": 5.378, "frontspace": 2.622, "move_out": 15,
          "track_change": 1.1811}, 0.01),
        ({"rim_width": 8, "offset": 35, "new_offset": 0},
         {"backspace": 5.378, "move_out": 35, "track_change": 2.7559}, 0.01),
    ],
))

# --------------------------------------------------- engine hours to miles

SPECS.append(S(
    slug="engine-hours-to-miles-converter",
    name="Engine Hours to Miles Converter",
    title="Engine Hours to Miles — Wear the Odometer Missed",
    desc="Hours on the engine clock, an average road speed and the share spent idling give "
         "the miles those hours are worth — the figure an odometer never shows.",
    what="How many miles of ordinary driving a number of engine hours represents, allowing for "
         "the time spent idling, so a machine's condition can be read against its clock.",
    fields=[
        F("hours", "Engine hours", "h", 5000),
        F("speed", "Average speed when moving", "mph", 35),
        F("idle_share", "Share of hours idling", "%", 20),
    ],
    results=[
        R("drive_hours", "Hours actually moving", "h"),
        R("idle_hours", "Hours idling", "h"),
        R("miles", "Equivalent miles", "mi"),
        R("years", "At 12 000 miles a year", "years"),
    ],
    formula={
        "drive_hours": "hours * (1 - idle_share / 100)",
        "idle_hours": "hours * idle_share / 100",
        "miles": "hours * (1 - idle_share / 100) * speed",
        "years": "hours * (1 - idle_share / 100) * speed / 12000",
    },
    prose={
        "why": "<p>An engine hour meter counts time, not distance, and a machine that idles for "
               "half its life has run far more hours than its mileage suggests. Five thousand "
               "hours at 35 mph with a fifth of them spent idling is 140 000 miles.</p>"
               "<p>That is the number to compare a used van or a tractor against. The odometer "
               "says 60 000; the hour meter says the engine has done the work of 140 000, and "
               "the price should reflect the second figure.</p>",
        "formula_note": "The moving share is the hours less the idle share, and miles are those "
                        "hours times the average road speed. The year figure divides by 12 000, "
                        "an ordinary annual distance, to put the total on a familiar scale.",
        "reading": "5 000 hours with 20 per cent idling is 4 000 hours moving at 35 mph, which "
                   "is 140 000 miles — nearly twelve years of ordinary driving.",
        "example_note": "Zero idling gives 175 000 miles for the same clock, which shows how "
                        "much of the answer depends on one estimate nobody records.",
        "pitfalls": [
            "<strong>Treating hours as miles at a fixed rate.</strong> Fifty miles an hour is "
            "a rule that suits a lorry and not a loader. Use the speed the machine actually "
            "averages.",
            "<strong>Ignoring the idle share on plant.</strong> Excavators and generators idle "
            "for most of their hours. Assuming a road average for them overstates the "
            "mileage by a factor of two or three.",
        ],
        "limits": [
            "<li><strong>One average speed.</strong> A machine that does motorway miles and "
            "yard work needs two runs of this page rather than one average.</li>",
        ],
        "uses": [
            "<li>Reading a used van's hour meter against its odometer.</li>",
            "<li>Comparing a generator's hours with a car's mileage for a service interval.</li>",
        ],
        "scenarios": [
            {"inputs": {"hours": 5000, "speed": 35, "idle_share": 40},
             "note": "At 40 per cent idling the same clock is 105 000 miles: the machine has "
                     "done less road work and more of its wearing out standing still."},
        ],
    },
    faq=[
        ("Is there a standard hours-to-miles figure?",
         "Rules of thumb run from 27 to 60 miles an hour depending on the vehicle class. None "
         "of them is a measurement, and the average speed field is the honest version."),
        ("Does idling wear an engine like driving?",
         "It accumulates hours on the oil and the bearings without cooling or loading the "
         "engine properly. Many fleets service on hours for exactly that reason."),
        ("Why do generators have hour meters?",
         "Because they never move and an odometer would be zero forever. The hour meter is the "
         "only record of use, and the service interval is set from it."),
    ],
    related=[("/everyday-life/idling-fuel-consumption", "Idling fuel use"),
             ("/everyday-life/mpg", "MPG calculator"),
             ("/everyday-life/cost-per-mile", "Cost per mile")],
    checks=[
        ({"hours": 5000, "speed": 35, "idle_share": 20},
         {"drive_hours": 4000, "idle_hours": 1000, "miles": 140000, "years": 11.6667}, 0.01),
        ({"hours": 5000, "speed": 35, "idle_share": 40},
         {"drive_hours": 3000, "idle_hours": 2000, "miles": 105000, "years": 8.75}, 0.01),
    ],
))
