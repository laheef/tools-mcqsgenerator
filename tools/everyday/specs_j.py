"""

Everyday-life batch J: what a habit costs and what a bottle holds.

Fourteen pages that price ordinary things: a minute of a professional's time, a
meeting, cigarettes, nappies, sanitary products, toothpaste, sunscreen, the
weekly shop, a bottle of cleaner, a concert ticket, a stack of banknotes, a ream
of paper, a helium tank and the beads for a bean bag.

Most of these are one multiplication and one division, and the reason for the
page is that the multiplication is the step everyone skips. The article states
the constant in words — 1 gram for a US banknote, 0.75 ml of toothpaste per
brush, 2 mg of sunscreen per square centimetre — so the answer can be checked.

"""

from __future__ import annotations

from lib import F, R, S, SEL

SPECS: list = []
# ---------------------------------------------------------- cost per minute

SPECS.append(S(
    slug="cost-per-minute",
    name="Cost per Minute Calculator",
    title="Cost per Minute — What an Hourly Rate Really Buys",
    desc="An hourly rate divided into minutes: the cost of a quarter of an hour, the cost of a "
         "meeting in the calendar, and the annual value of the same minute.",
    what="What a minute of a given hourly rate costs, from a quarter of an hour to a full day, "
         "and what the same rate is worth over a working year.",
    fields=[
        F("rate", "Hourly rate", "$/h", 45),
        F("minutes", "Time to cost", "min", 90),
    ],
    results=[
        R("per_minute", "Cost per minute", "$/min"),
        R("per_second", "Cost per second", "$/s"),
        R("cost", "Cost of the time", "$"),
        R("year", "Working year at 40 h a week", "$"),
    ],
    formula={
        "per_minute": "rate / 60",
        "per_second": "rate / 3600",
        "cost": "rate / 60 * minutes",
        "year": "rate * 40 * 52",
    },
    prose={
        "why": "<p>An hourly rate hides how often the hour is not the unit. Fifteen minutes is a "
               "quarter of it, a four-hour workshop is four of it, and a meeting that runs over "
               "by ten minutes has cost a sixth of an hour at the rate on the invoice.</p>"
               "<p>At 45 an hour a minute is 75 cents. That is the number to hold in mind when "
               "someone asks for \"a quick call\": ten minutes is 7.50, and a fortnight of "
               "quick calls is a day of work.</p>",
        "formula_note": "The rate over sixty gives a minute, over 3 600 a second. Times the "
                        "minutes gives the cost of a slot, and the yearly figure is the rate "
                        "times forty hours times fifty-two weeks.",
        "reading": "45 an hour is 75 cents a minute and 1.25 cents a second. Ninety minutes "
                   "costs 67.50, and the rate is worth 93 600 over a full working year.",
        "example_note": "The yearly figure is gross pay, not take-home: it says what the time "
                        "sells for, and taxes and holidays come out of it afterwards.",
        "pitfalls": [
            "<strong>Comparing a rate with a salary.</strong> Forty-five an hour is 93 600 a "
            "year only if the weeks are all worked. A freelancer with holidays, admin and no "
            "work in January is nearer 70 per cent of that.",
            "<strong>Charging in hours when the work is in minutes.</strong> A fifteen-minute "
            "consultation billed as an hour is a discount nobody records, and a hundred of them "
            "is two weeks of unpaid time.",
        ],
        "limits": [
            "<li><strong>No overhead.</strong> The rate covers the person, not the office, the "
            "software or the time spent finding the next client.</li>",
        ],
        "uses": [
            "<li>Costing a meeting before agreeing to it.</li>",
            "<li>Working out whether a small job is worth taking.</li>",
        ],
        "scenarios": [
            {"inputs": {"rate": 120, "minutes": 45},
             "note": "At 120 an hour a minute is 2 dollars, so a three-quarter-hour call costs "
                     "90 — the same as a fortnight of the 45-dollar rate on the phone."},
        ],
    },
    faq=[
        ("Why divide by 3 600 for a second?",
         "Because an hour has 3 600 seconds. It is a unit that only matters when something is "
         "billed per second — cloud computing, advertising, phone lines."),
        ("Is a minute the right unit for a meeting?",
         "For a meeting that overruns, yes. The overrun is where the cost appears, and ten "
         "minutes at four people's rates is where the money goes."),
        ("Does the yearly figure include holiday?",
         "No. It is fifty-two forty-hour weeks, which nobody works. Multiply by 46 weeks for a "
         "realistic figure with holidays and sick days."),
    ],
    related=[("/everyday-life/meeting-cost", "Meeting cost"),
             ("/everyday-life/every-second", "Every second"),
             ("/everyday-life/30-min", "30-minute blocks")],
    checks=[
        ({"rate": 45, "minutes": 90},
         {"per_minute": 0.75, "per_second": 0.0125, "cost": 67.5, "year": 93600}, 0.01),
        ({"rate": 120, "minutes": 45},
         {"per_minute": 2, "cost": 90, "year": 249600}, 0.01),
    ],
))

# ------------------------------------------------------------- meeting cost

SPECS.append(S(
    slug="meeting-cost",
    name="Meeting Cost Calculator",
    title="Meeting Cost — People, Hours and the Real Bill",
    desc="Six people for ninety minutes at forty-five an hour is 405 dollars before anyone has "
         "decided anything. Add the preparation and see what the meeting costs.",
    what="What a meeting costs in wages once everybody in the room is counted, including the "
         "preparation time, and what that comes to a minute.",
    fields=[
        F("people", "People in the meeting", "people", 6),
        F("hourly", "Average hourly cost", "$/h", 45),
        F("hours", "Meeting length", "h", 1.5),
        F("prep_hours", "Preparation, all of it", "h", 0.5,
          help="Everyone reading the deck, checking figures, writing the agenda. Half an hour "
               "apiece is four hundred pounds in a room of six."),
    ],
    results=[
        R("attendee_cost", "Wages in the room", "$"),
        R("prep_cost", "Preparation", "$"),
        R("total", "Total cost", "$"),
        R("per_minute", "Cost per minute", "$/min"),
    ],
    formula={
        "attendee_cost": "people * hourly * hours",
        "prep_cost": "prep_hours * hourly",
        "total": "people * hourly * hours + prep_hours * hourly",
        "per_minute": "(people * hourly * hours + prep_hours * hourly) / (hours * 60)",
    },
    prose={
        "why": "<p>A meeting is the only purchase an organisation makes without a price on it. "
               "Six people for ninety minutes at 45 an hour is 405, and the half hour each of "
               "preparation is to the organiser's cost, another 22.50 — 427.50 before anybody "
               "has said anything useful.</p>"
               "<p>Set against a decision, that is often cheap. Set against \"we could have "
               "emailed it\", it is 7.11 a minute, and the recurring weekly version is 22 230 a "
               "year.</p>",
        "formula_note": "People times the hourly cost times the length gives the wages in the "
                        "room. Preparation is the hours spent outside the room times one "
                        "person's rate, and the total over the meeting's own minutes gives the "
                        "per-minute figure.",
        "reading": "Six people, ninety minutes, 45 an hour: 405 in the room, 22.50 of "
                   "preparation, 427.50 in total, or 7.11 a minute.",
        "example_note": "The weekly hour with eight people is 360 a session and 18 720 a year, "
                        "which is a salary for a job nobody has been hired to do.",
        "pitfalls": [
            "<strong>Counting only the organiser's time.</strong> The cost is everybody's time, "
            "including the four people who are listening and the one who is answering email.",
            "<strong>Forgetting the preparation.</strong> An hour of meeting usually carries "
            "twenty to forty minutes of somebody's reading. It is the same money and it is "
            "invisible because it happens on the Thursday before.",
        ],
        "limits": [
            "<li><strong>Wages only.</strong> Rooms, travel and the opportunity cost of what "
            "those six people would otherwise have made are not in the figure.</li>",
        ],
        "uses": [
            "<li>Deciding whether a recurring meeting earns its place.</li>",
            "<li>Making the cost of a short meeting visible before calling one.</li>",
        ],
        "scenarios": [
            {"inputs": {"people": 8, "hourly": 45, "hours": 1, "prep_hours": 1},
             "note": "Eight people for one hour is 360 plus 45 of preparation: 405 a week, "
                     "21 060 over a year of 52 meetings."},
        ],
    },
    faq=[
        ("Should I use salary or the fully loaded cost?",
         "The fully loaded cost — salary plus employer taxes, benefits and overhead — is "
         "usually 1.3 to 1.5 times the salary. Using the salary understates the meeting by a "
         "third."),
        ("Is a meeting ever too expensive to hold?",
         "Yes, and the test is not the number but whether the decision is worth more. What the "
         "number does is make the comparison possible."),
        ("Why include preparation if nobody is paid for it separately?",
         "Because the same salary pays for it. The hours exist whether or not they appear in a "
         "calendar."),
    ],
    related=[("/everyday-life/cost-per-minute", "Cost per minute"),
             ("/everyday-life/30-min", "30-minute blocks"),
             ("/everyday-life/every-second", "Every second")],
    checks=[
        ({"people": 6, "hourly": 45, "hours": 1.5, "prep_hours": 0.5},
         {"attendee_cost": 405, "prep_cost": 22.5, "total": 427.5, "per_minute": 4.75},
         0.01),
        ({"people": 8, "hourly": 45, "hours": 1, "prep_hours": 1},
         {"attendee_cost": 360, "prep_cost": 45, "total": 405, "per_minute": 6.75}, 0.01),
    ],
))

# ------------------------------------------------------------ quit smoking

SPECS.append(S(
    slug="quit-smoking",
    name="Quit Smoking Calculator",
    title="Quit Smoking — Cigarettes and Money Not Spent",
    desc="Cigarettes a day and the price of a pack, turned into packs and money a year, a month "
         "and a week: the arithmetic that a quitting app never shows in full.",
    what="How many cigarettes and packs a habit consumes in a year and what they cost a week, "
         "a month and a year, so a quit date has a number attached to it.",
    fields=[
        F("cigs_day", "Cigarettes a day", "cigarettes", 20),
        F("pack_price", "Price of a pack", "$", 9),
        F("per_pack", "Cigarettes a pack", "cigarettes", 20),
        F("days", "Days counted", "days", 365),
    ],
    results=[
        R("cigs_year", "Cigarettes", "cigarettes"),
        R("packs_year", "Packs", "packs"),
        R("cost_week", "Cost a week", "$"),
        R("cost_month", "Cost a month", "$"),
        R("cost_year", "Cost", "$"),
    ],
    formula={
        "cigs_year": "cigs_day * days",
        "packs_year": "cigs_day * days / per_pack",
        "cost_week": "cigs_day * 7 / per_pack * pack_price",
        "cost_month": "cigs_day * days / per_pack * pack_price / 12",
        "cost_year": "cigs_day * days / per_pack * pack_price",
    },
    prose={
        "why": "<p>A pack a day at nine dollars is 63 a week and 3 285 a year. Most smokers know "
               "the weekly figure and not the yearly one, and the yearly one is a used car, a "
               "holiday, or four months of rent.</p>"
               "<p>The page counts cigarettes and packs first and money second, because the "
               "counts are the fact and the money is the consequence. Seven thousand three "
               "hundred cigarettes a year is twenty a day, and no price change makes that small."
               "</p>",
        "formula_note": "Cigarettes a day times days gives the count; divided by the pack size "
                        "gives packs. Money is packs times price, and the week and month "
                        "figures are the same arithmetic at seven days and a twelfth of the "
                        "year.",
        "reading": "Twenty a day is 7 300 cigarettes and 365 packs a year: 63 a week, 273.75 a "
                   "month and 3 285 a year.",
        "example_note": "Halving the habit halves every line, which is why cutting down works "
                        "arithmetically and why the last cigarette is the expensive one to "
                        "keep.",
        "pitfalls": [
            "<strong>Forgetting loose tobacco and the papers.</strong> Roll-your-own changes the "
            "price per cigarette by half, and the count usually rises.",
            "<strong>Pricing the habit at the cheapest pack.</strong> Use what you actually "
            "pay, including the pack from the garage at the weekend that costs a dollar more.",
        ],
        "limits": [
            "<li><strong>Money only.</strong> Health effects, insurance and the cost of smoking "
            "breaks are not in the figure, and none of them can be priced honestly here.</li>",
        ],
        "uses": [
            "<li>Putting a number on a quit date.</li>",
            "<li>Comparing the habit with something the money could buy.</li>",
        ],
        "scenarios": [
            {"inputs": {"cigs_day": 10, "pack_price": 9, "per_pack": 20, "days": 365},
             "note": "Ten a day is 3 650 cigarettes, 182.5 packs and 1 642.50 a year — the same "
                     "arithmetic with everything halved."},
        ],
    },
    faq=[
        ("How many cigarettes are in a pack?",
         "Twenty in most of the world, twenty-five in some markets and eighteen in a few. The "
         "field is there because the answer depends on it."),
        ("Why is a month a twelfth of the year?",
         "Because that is how a budget treats it. A calendar month has 28 to 31 days and the "
         "difference is a day's smoking, which does not change the decision."),
        ("Does vaping cost the same?",
         "Usually a fraction, and the arithmetic is different: liquid is sold by volume and "
         "pods by count. Divide your own weekly spend by seven if you want a comparable figure."),
    ],
    related=[("/everyday-life/diaper", "Nappy cost"),
             ("/everyday-life/period-products-cost", "Period products cost"),
             ("/everyday-life/cost-per-minute", "Cost per minute")],
    checks=[
        ({"cigs_day": 20, "pack_price": 9, "per_pack": 20, "days": 365},
         {"cigs_year": 7300, "packs_year": 365, "cost_week": 63, "cost_month": 273.75,
          "cost_year": 3285}, 0.01),
        ({"cigs_day": 10, "pack_price": 9, "per_pack": 20, "days": 365},
         {"cigs_year": 3650, "packs_year": 182.5, "cost_week": 31.5, "cost_year": 1642.5},
         0.01),
    ],
))

# -------------------------------------------------------------------- diaper

SPECS.append(S(
    slug="diaper",
    name="Diaper Cost Calculator",
    title="Diaper Cost — The First Year, One Change at a Time",
    desc="Eight changes a day at thirty cents is 876 dollars in the first year. This page turns "
         "a nappy habit into boxes, changes and a yearly bill.",
    what="The nappies a child uses in a year and what they cost, from the number of changes a "
         "day and the price of one, with the weekly and monthly figures beside it.",
    fields=[
        F("changes_day", "Changes a day", "changes", 8),
        F("price_each", "Price per nappy", "$", 0.3),
        F("days", "Days counted", "days", 365),
    ],
    results=[
        R("changes_year", "Nappies", "nappies"),
        R("cost_week", "Cost a week", "$"),
        R("cost_month", "Cost a month", "$"),
        R("cost_year", "Cost a year", "$"),
        R("cost_change", "Cost per change", "$"),
    ],
    formula={
        "changes_year": "changes_day * days",
        "cost_week": "changes_day * 7 * price_each",
        "cost_month": "changes_day * 30.4375 * price_each",
        "cost_year": "changes_day * days * price_each",
        "cost_change": "price_each",
    },
    prose={
        "why": "<p>A newborn goes through eight to ten nappies a day and the count falls to five "
               "or six by the first birthday. At eight a day and thirty cents, that is 2 920 "
               "nappies and 876 dollars in the first year.</p>"
               "<p>The boxes on the shelf are priced per pack, and the pack holds 40 to 90. The "
               "per-nappy figure is the only one that compares sizes, and it is the figure that "
               "tells you whether the bulk box is a saving or a bigger box.</p>",
        "formula_note": "Changes a day times days gives the count. Money is that count times the "
                        "price of one nappy, and the week and month figures use seven days and "
                        "the average 30.44-day month.",
        "reading": "Eight changes a day for a year is 2 920 nappies: 16.80 a week, 73.05 a month "
                   "and 876 a year, at thirty cents each.",
        "example_note": "The average over a year is nearer seven changes, because the first "
                        "months are double the second year. Re-run the page for a second child "
                        "and the second year is cheaper.",
        "pitfalls": [
            "<strong>Comparing boxes without the count.</strong> A box of 90 at 27 dollars is "
            "30 cents a nappy; a box of 60 at 20 is 33. The bigger box is cheaper and it is "
            "also more of a commitment if the size is wrong.",
            "<strong>Forgetting wipes and the nappy bin.</strong> Wipes run to about ten per "
            "cent of the nappy bill and the sacks and cream are another line that does not fit "
            "this page.",
        ],
        "limits": [
            "<li><strong>Disposables only.</strong> Reusable nappies have a large upfront cost "
            "and a laundry bill, and the break-even is between one and two children.</li>",
        ],
        "uses": [
            "<li>Budgeting the first year before the baby arrives.</li>",
            "<li>Comparing a bulk box with the usual pack.</li>",
        ],
        "scenarios": [
            {"inputs": {"changes_day": 6, "price_each": 0.3, "days": 365},
             "note": "Six changes a day is 2 190 nappies and 657 a year, which is nearer the "
                     "second year's figure than the first."},
        ],
    },
    faq=[
        ("How many nappies does a baby use in a year?",
         "Around 2 500 to 3 000 for a first child. The first three months are the heaviest at "
         "ten a day, and the count falls as the child grows."),
        ("Is a subscription cheaper?",
         "Often by 10 to 20 per cent on the same brand, and the comparison is the price per "
         "nappy rather than the price of the box. The page's per-change figure is the one to "
         "compare."),
        ("When do children stop needing nappies?",
         "Between two and three years for most, so the total bill is roughly two and a half "
         "years of this arithmetic, front-loaded."),
    ],
    related=[("/everyday-life/period-products-cost", "Period products cost"),
             ("/everyday-life/grocery", "Grocery budget"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"changes_day": 8, "price_each": 0.3, "days": 365},
         {"changes_year": 2920, "cost_week": 16.8, "cost_month": 73.05, "cost_year": 876,
          "cost_change": 0.3}, 0.01),
        ({"changes_day": 6, "price_each": 0.3, "days": 365},
         {"changes_year": 2190, "cost_week": 12.6, "cost_year": 657}, 0.01),
    ],
))
# ---------------------------------------------------- period products cost

SPECS.append(S(
    slug="period-products-cost",
    name="Period Products Cost Calculator",
    title="Period Products — Cost a Cycle and a Year",
    desc="Products a cycle, the price of one and the cycles in a year: the annual cost of "
         "period products, which almost nobody has ever added up.",
    what="The products used in a cycle, the cost of a cycle, and what the same habit costs over "
         "a year and a decade, from two numbers on a supermarket receipt.",
    fields=[
        F("products_cycle", "Products a cycle", "products", 20),
        F("price_each", "Price per product", "$", 0.25),
        F("cycles", "Cycles a year", "cycles", 13),
    ],
    results=[
        R("cost_cycle", "Cost a cycle", "$"),
        R("products_year", "Products a year", "products"),
        R("cost_year", "Cost a year", "$"),
        R("cost_month", "Cost a month", "$"),
        R("cost_decade", "Cost over ten years", "$"),
    ],
    formula={
        "cost_cycle": "products_cycle * price_each",
        "products_year": "products_cycle * cycles",
        "cost_year": "products_cycle * cycles * price_each",
        "cost_month": "products_cycle * cycles * price_each / 12",
        "cost_decade": "products_cycle * cycles * price_each * 10",
    },
    prose={
        "why": "<p>Thirteen cycles a year at twenty products a cycle is 260 products, and at "
               "twenty-five cents each that is 65 a year. It is not a large number and it is a "
               "number that has never appeared on a budget, because the spending arrives in "
               "small amounts four days a month.</p>"
               "<p>The decade figure is the one that changes the argument about a reusable "
               "product. A cup or a pair of period pants costs 25 to 40 and lasts years, which "
               "is the same money in a different shape.</p>",
        "formula_note": "Products a cycle times the price gives a cycle's cost. Times the cycles "
                        "gives the year, a twelfth of that is the month, and ten times it is the "
                        "decade, all with no compounding because the price is assumed steady.",
        "reading": "Twenty products a cycle at 25 cents is 5 a cycle, 260 products a year, 65 a "
                   "year, 5.42 a month and 650 over ten years.",
        "example_note": "At 35 cents a product the year is 91 and the decade 910, which is "
                        "where a reusable product starts to pay for itself inside three years.",
        "pitfalls": [
            "<strong>Counting only tampons or only pads.</strong> Most people use both and the "
            "mix changes with the cycle. The field takes a total, so add them before typing.",
            "<strong>Assuming the price is steady.</strong> Ten years of the same product at a "
            "price that tracks inflation is more than ten times today's figure, and the "
            "difference is exactly the tax a reusable product avoids.",
        ],
        "limits": [
            "<li><strong>Products only.</strong> Pain relief, hot water bottles and the laundry "
            "of an accident all add to the real cost and are not in this figure.</li>",
        ],
        "uses": [
            "<li>Working out whether a reusable product pays for itself.</li>",
            "<li>Putting a line in a household budget that is usually invisible.</li>",
        ],
        "scenarios": [
            {"inputs": {"products_cycle": 20, "price_each": 0.35, "cycles": 13},
             "note": "At 35 cents the year is 91 and the decade 910, so a 30-dollar cup has "
                     "paid for itself in four months of the difference."},
        ],
    },
    faq=[
        ("How many products is a cycle?",
         "Between 15 and 25 for most people, depending on flow and product. Twenty is a "
         "working average, and the page takes your own figure."),
        ("Is the decade figure realistic?",
         "It assumes a steady price and a steady habit. Both change, and the order of magnitude "
         "is right, which is what a decision about a reusable product needs."),
        ("Do tampons cost more than pads?",
         "Usually a little more per unit and fewer are used per cycle. The total is close, "
         "which is why the field asks for the mix rather than the product."),
    ],
    related=[("/everyday-life/diaper", "Nappy cost"),
             ("/everyday-life/grocery", "Grocery budget"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"products_cycle": 20, "price_each": 0.25, "cycles": 13},
         {"cost_cycle": 5, "products_year": 260, "cost_year": 65, "cost_month": 5.4167,
          "cost_decade": 650}, 0.01),
        ({"products_cycle": 20, "price_each": 0.35, "cycles": 13},
         {"cost_cycle": 7, "cost_year": 91, "cost_month": 7.5833, "cost_decade": 910}, 0.01),
    ],
))

# ------------------------------------------------------------- toothpaste

SPECS.append(S(
    slug="toothpaste",
    name="Toothpaste Calculator",
    title="Toothpaste — Brushes a Tube and Cost per Brush",
    desc="A pea of paste is about 0.75 ml, so a 100 ml tube is 133 brushes: the arithmetic of "
         "how long a tube lasts and what a brush actually costs.",
    what="How many brushes a tube of toothpaste contains, what each one costs, how many days "
         "the tube lasts at your brushing habit, and the yearly bill.",
    fields=[
        F("tube_ml", "Tube size", "ml", 100),
        F("use_ml", "Paste per brush", "ml", 0.75,
          help="A pea-sized amount is about 0.75 ml. A full brush-length ribbon is nearer 1.5, "
               "and twice the cost."),
        F("price", "Tube price", "$", 3.5),
        F("brushes_day", "Brushes a day", "brushes", 2),
    ],
    results=[
        R("brushes", "Brushes a tube", "brushes"),
        R("cost_brush", "Cost per brush", "$"),
        R("days", "Days a tube lasts", "days"),
        R("cost_year", "Cost a year", "$"),
    ],
    formula={
        "brushes": "tube_ml / use_ml",
        "cost_brush": "price * use_ml / tube_ml",
        "days": "tube_ml / use_ml / brushes_day",
        "cost_year": "price * 365 / (tube_ml / use_ml / brushes_day)",
    },
    prose={
        "why": "<p>Dentists recommend a pea-sized amount, which is about three-quarters of a "
               "millilitre. A 100 ml tube therefore holds 133 brushes, and at two a day that is "
               "sixty-seven days of brushing for 3.50 — under three cents a brush.</p>"
               "<p>The ribbon along the brush that advertising shows is twice the volume, and it "
               "halves the number of brushes in the tube. Nothing about the cleaning changes; "
               "the paste on the brush is mostly there for the fluoride and the taste.</p>",
        "formula_note": "Tube volume over the amount per brush gives the brushes. The cost per "
                        "brush is the tube price divided by that count, and the year is 365 "
                        "divided by the days a tube lasts.",
        "reading": "100 ml at 0.75 ml a brush is 133 brushes, 2.6 cents each. Two brushes a day "
                   "makes a tube last 66.7 days, and the year costs 19.16.",
        "example_note": "A 1.5 ml ribbon halves the count to 67 brushes and doubles the yearly "
                        "cost to 38.32. The tube is the same size either way.",
        "pitfalls": [
            "<strong>Measuring by the ribbon.</strong> The length of paste in an advert is a "
            "sales device. A pea is the clinical dose and it is what the fluoride calculation "
            "assumes.",
            "<strong>Comparing tubes by price alone.</strong> A 75 ml tube at 2.50 is 3.3 cents "
            "a ml and a 100 ml at 3.50 is 3.5 — the smaller one is slightly cheaper and holds "
            "less, which is exactly the comparison the shelf avoids.",
        ],
        "limits": [
            "<li><strong>Paste only.</strong> Brushes, floss and mouthwash are separate lines, "
            "and a family of four multiplies this figure by whatever each of them uses.</li>",
        ],
        "uses": [
            "<li>Working out how long a tube lasts before a trip.</li>",
            "<li>Comparing two tube sizes honestly.</li>",
        ],
        "scenarios": [
            {"inputs": {"tube_ml": 100, "use_ml": 1.5, "price": 3.5, "brushes_day": 2},
             "note": "At 1.5 ml a brush the tube holds 66 brushes, lasts 33 days and costs "
                     "38.32 a year — twice the paste for the same tube."},
        ],
    },
    faq=[
        ("How much toothpaste should I use?",
         "A pea for an adult and a smear for a child under three. The fluoride matters more "
         "than the volume, and the recommendation is about the dose rather than stinginess."),
        ("How long does a 100 ml tube last?",
         "About two months for one person brushing twice a day at a pea per brush, which is "
         "the figure most dental practices quote."),
        ("Is the cost per brush worth calculating?",
         "At three cents it is not a budget item. The calculation is interesting because it "
         "settles the tube-size argument, not because the money matters."),
    ],
    related=[("/everyday-life/sunscreen-amount", "Sunscreen amount"),
             ("/everyday-life/price-per-ounce", "Price per ounce"),
             ("/everyday-life/cleaning-cost", "Cleaning cost")],
    checks=[
        ({"tube_ml": 100, "use_ml": 0.75, "price": 3.5, "brushes_day": 2},
         {"brushes": 133.3333, "cost_brush": 0.02625, "days": 66.6667,
          "cost_year": 19.1625}, 0.01),
        ({"tube_ml": 100, "use_ml": 1.5, "price": 3.5, "brushes_day": 2},
         {"brushes": 66.6667, "cost_brush": 0.0525, "days": 33.3333,
          "cost_year": 38.325}, 0.01),
    ],
))

# --------------------------------------------------------- sunscreen amount

SPECS.append(S(
    slug="sunscreen-amount",
    name="Sunscreen Amount Calculator",
    title="Sunscreen Amount — 2 mg per Square Centimetre",
    desc="The dose sunscreen is tested at, 2 mg per square centimetre, applied to the body area "
         "you are covering: millilitres per application and bottles a summer.",
    what="How much sunscreen an application takes at the tested dose, how many applications a "
         "bottle gives, and how many bottles a summer of daily use needs.",
    fields=[
        F("area_m2", "Skin area to cover", "m²", 1.8,
          help="An adult body is about 1.8 square metres. Face, neck and arms is nearer 0.5 and "
               "the legs add another 0.6."),
        F("dose", "Dose", "mg/cm²", 2,
          help="Two milligrams per square centimetre is the rate sunscreen is tested at, and "
               "the rate the SPF number refers to."),
        F("bottle_ml", "Bottle size", "ml", 200),
        F("applications_day", "Applications a day", "times", 2),
        F("days", "Days of use", "days", 90),
    ],
    results=[
        R("ml_app", "Sunscreen per application", "ml"),
        R("applications", "Applications per bottle", "times"),
        R("bottle_days", "Days a bottle lasts", "days"),
        R("bottles", "Bottles for the period", "bottles"),
    ],
    formula={
        "ml_app": "area_m2 * 10000 * dose / 1000",
        "applications": "bottle_ml / (area_m2 * 10000 * dose / 1000)",
        "bottle_days": "bottle_ml / (area_m2 * 10000 * dose / 1000) / applications_day",
        "bottles": "days * applications_day / (bottle_ml / (area_m2 * 10000 * dose / 1000))",
    },
    prose={
        "why": "<p>A square metre is 10 000 square centimetres, and testing a sunscreen at two "
               "milligrams on each of them means 20 grams a square metre. For an adult body of "
               "1.8 square metres that is 36 millilitres — a sixth of a 200 ml bottle, per "
               "application.</p>"
               "<p>That is why the bottle in the bathroom cabinet lasts a season and the bottle "
               "in the holiday bag lasts three days. Most people apply a quarter of the tested "
               "dose, which is why they burn with a factor 50 on.</p>",
        "formula_note": "Area in square metres times 10 000 gives square centimetres; times the "
                        "dose and divided by a thousand gives millilitres. A bottle divides by "
                        "that figure for the application count, and the period divides again by "
                        "the applications in a day.",
        "reading": "1.8 square metres at 2 mg per square centimetre is 36 ml an application, so "
                   "a 200 ml bottle gives 5.6 applications and lasts 2.8 days at twice a day. "
                   "A ninety-day summer needs 32.4 bottles.",
        "example_note": "Face, neck and arms at half a square metre is only 10 ml, so the same "
                    "bottle lasts twenty applications — which is why the face bottle is not the "
                    "one that disappears.",
        "pitfalls": [
            "<strong>Applying once.</strong> Sunscreen is tested for two hours of exposure at "
            "that dose. A day at the beach is four to six applications, not one.",
            "<strong>Trusting water resistance.</strong> \"Very water resistant\" means forty "
            "minutes of swimming to the same standard. It is a longer interval, not a licence "
            "to skip the second application.",
        ],
        "limits": [
            "<li><strong>Body surface only.</strong> Hats, shirts and shade do the work this "
            "page cannot price, and covering up is more reliable than any application rate.</li>",
        ],
        "uses": [
            "<li>Buying the right number of bottles for a holiday.</li>",
            "<li>Understanding why a factor 50 fails when people apply it thinly.</li>",
        ],
        "scenarios": [
            {"inputs": {"area_m2": 0.5, "dose": 2, "bottle_ml": 200, "applications_day": 2,
                        "days": 90},
             "note": "Half a square metre — face, neck and arms — takes 10 ml, so the bottle "
                     "gives twenty applications, ten days, and a ninety-day summer needs nine "
                     "bottles."},
        ],
    },
    faq=[
        ("Why 2 mg per square centimetre?",
         "Because that is the application rate the international SPF test uses. Applying less "
         "gives less protection than the number on the bottle, in proportion."),
        ("How much is a teaspoon?",
         "About 5 ml. The old advice of a teaspoon for the face and a shot glass for the body "
         "is roughly 5 and 30 ml, which sits either side of the 36 ml figure for a whole body."),
        ("Does the bottle really not last?",
         "A 200 ml bottle at 36 ml a go is five and a half full-body applications. Nobody uses "
         "that much on a normal day, which is why the number is surprising rather than wrong."),
    ],
    related=[("/everyday-life/toothpaste", "Toothpaste"),
             ("/everyday-life/microwave-wattage", "Microwave wattage"),
             ("/everyday-life/price-per-ounce", "Price per ounce")],
    checks=[
        ({"area_m2": 1.8, "dose": 2, "bottle_ml": 200, "applications_day": 2, "days": 90},
         {"ml_app": 36, "applications": 5.5556, "bottle_days": 2.7778, "bottles": 32.4},
         0.01),
        ({"area_m2": 0.5, "dose": 2, "bottle_ml": 200, "applications_day": 2, "days": 90},
         {"ml_app": 10, "applications": 20, "bottle_days": 10, "bottles": 9}, 0.01),
    ],
))

# ------------------------------------------------------------------ grocery

SPECS.append(S(
    slug="grocery",
    name="Grocery Budget Calculator",
    title="Grocery Budget — Per Person, Per Day and Per Year",
    desc="A weekly shop divided by the people eating it and the days it covers: the cost per "
         "person per day, and what the same basket comes to over a full year.",
    what="What a weekly grocery basket costs per person and per day, what the same basket runs "
         "to over a year, and what a change of shop would save.",
    fields=[
        F("basket", "Weekly grocery spend", "$", 120),
        F("people", "People fed", "people", 4),
        F("weeks", "Weeks a year", "weeks", 52),
        F("alt_basket", "A cheaper basket", "$", 100,
          help="The same shop at a different supermarket, or with three swaps. Compare like for "
               "like before trusting the difference."),
    ],
    results=[
        R("per_person_day", "Per person per day", "$"),
        R("per_person_week", "Per person per week", "$"),
        R("per_year", "A year at this basket", "$"),
        R("saving", "A year on the cheaper basket", "$"),
    ],
    formula={
        "per_person_day": "basket / people / 7",
        "per_person_week": "basket / people",
        "per_year": "basket * weeks",
        "saving": "(basket - alt_basket) * weeks",
    },
    prose={
        "why": "<p>A hundred and twenty a week for four people is 30 each, or 4.29 a person a "
               "day. That last figure is the one that compares with a takeaway, a sandwich or a "
               "school meal, and it is the one nobody knows.</p>"
               "<p>Over a year the basket is 6 240, and a twenty-dollar weekly reduction is "
               "1 040 — a number large enough to be worth three swaps and small enough that "
               "nobody does them, because twenty dollars a week is invisible and a thousand "
               "pounds is not.</p>",
        "formula_note": "The weekly spend over the people and the days gives a person-day. The "
                        "year is the basket times the weeks, and the saving is the difference "
                        "between the two baskets multiplied by the same weeks.",
        "reading": "120 a week for four people is 30 each and 4.29 a person a day. A year is "
                   "6 240, and a basket at 100 saves 1 040 over the same year.",
        "example_note": "Two people eating the same basket spend 8.57 a day each — the basket is "
                        "the same and the household is smaller, which is why cooking for four "
                        "costs less per head than cooking for one.",
        "pitfalls": [
            "<strong>Forgetting the meals out.</strong> This is the shop, not the food. Coffee, "
            "lunches and takeaways are a separate budget and often a third of the total.",
            "<strong>Comparing baskets with different contents.</strong> A cheaper basket is "
            "only cheaper if it feeds the same people the same meals. Count what is in it "
            "before celebrating the difference.",
        ],
        "limits": [
            "<li><strong>A steady basket.</strong> Holiday weeks are double and the week before "
            "payday is not. The yearly figure assumes the average holds.</li>",
        ],
        "uses": [
            "<li>Comparing households or splitting a shared house fairly.</li>",
            "<li>Working out whether a bulk-buy trip is worth the journey.</li>",
        ],
        "scenarios": [
            {"inputs": {"basket": 90, "people": 4, "weeks": 52, "alt_basket": 80},
             "note": "A basket of 90 is 3.21 a person a day and 4 680 a year; ten dollars a "
                     "week off it is 520 over the year."},
        ],
    },
    faq=[
        ("What is a normal grocery spend per person?",
         "Between 4 and 8 dollars a day per person in a rich country, depending on how much "
         "cooking happens at home and how much meat is in the basket."),
        ("Should pet food be in the grocery basket?",
         "If it is bought in the same shop, yes, and the people count does not include the dog. "
         "The per-person figure is then slightly overstated, which is the honest direction."),
        ("Why use a weekly basket rather than a monthly one?",
         "Because shopping is weekly and budgets are monthly, and a month is not four weeks. "
         "Multiplying the weekly figure by 52 is the correction."),
    ],
    related=[("/everyday-life/price-per-unit", "Price per unit"),
             ("/everyday-life/diaper", "Nappy cost"),
             ("/everyday-life/cleaning-cost", "Cleaning cost")],
    checks=[
        ({"basket": 120, "people": 4, "weeks": 52, "alt_basket": 100},
         {"per_person_day": 4.2857, "per_person_week": 30, "per_year": 6240,
          "saving": 1040}, 0.01),
        ({"basket": 90, "people": 4, "weeks": 52, "alt_basket": 80},
         {"per_person_day": 3.2143, "per_person_week": 22.5, "per_year": 4680,
          "saving": 520}, 0.01),
    ],
))
# ------------------------------------------------------------ cleaning cost

SPECS.append(S(
    slug="cleaning-cost",
    name="Cleaning Cost Calculator",
    title="Cleaning Cost — Price of a Bottle, Price of a Clean",
    desc="A 750 ml bottle at 4.50 with 25 ml a clean is thirty cleans at fifteen cents each. The "
         "page that turns a bottle into a cost per use.",
    what="How many cleans a bottle of cleaner contains, what each one costs, how long the bottle "
         "lasts at your routine, and what the year comes to.",
    fields=[
        F("bottle_price", "Bottle price", "$", 4.5),
        F("bottle_ml", "Bottle size", "ml", 750),
        F("use_ml", "Cleaner per clean", "ml", 25,
          help="Twenty-five millilitres is about five sprays of a trigger bottle, or a capful "
               "in a bucket of water."),
        F("cleans_week", "Cleans a week", "cleans", 2),
    ],
    results=[
        R("cleans", "Cleans per bottle", "cleans"),
        R("cost_clean", "Cost per clean", "$"),
        R("weeks", "Weeks a bottle lasts", "weeks"),
        R("cost_year", "Cost a year", "$"),
    ],
    formula={
        "cleans": "bottle_ml / use_ml",
        "cost_clean": "bottle_price * use_ml / bottle_ml",
        "weeks": "bottle_ml / use_ml / cleans_week",
        "cost_year": "cleans_week * 52 * (bottle_price * use_ml / bottle_ml)",
    },
    prose={
        "why": "<p>A bottle of kitchen cleaner is priced as a bottle and used as a spray. Thirty "
               "cleans from 750 millilitres, at fifteen cents each, is a different way to look "
               "at the four dollars on the receipt — and it makes two brands comparable when "
               "one is concentrated and one is not.</p>"
               "<p>The concentrated bottle costs more and uses a quarter of the liquid, which "
               "makes it four times cheaper per clean. That is the comparison the shelf makes "
               "impossible by pricing 750 ml and 500 ml in the same size bottle.</p>",
        "formula_note": "Bottle volume over the amount per clean gives the number of cleans; the "
                        "price over that count gives the cost of one. Weeks divide by the cleans "
                        "a week, and the year is that cost times fifty-two weeks of routine.",
        "reading": "750 ml at 25 ml a clean is 30 cleans at 15 cents each. At two cleans a week "
                   "a bottle lasts 15 weeks and the year costs 15.60.",
        "example_note": "A concentrated cleaner at 6 for 500 ml, diluted at 10 ml a clean, is 50 "
                        "cleans at 12 cents — cheaper per clean and dearer per bottle, which is "
                        "the whole point of the comparison.",
        "pitfalls": [
            "<strong>Comparing bottle prices across sizes.</strong> The 750 ml and the 500 ml "
            "are not the same product and the price per clean is the only fair comparison.",
            "<strong>Using more than the label.</strong> Doubling the dose doubles the cost and "
            "usually leaves a residue that needs a second wipe. The label rate exists for a "
            "reason.",
        ],
        "limits": [
            "<li><strong>One product, one job.</strong> A cleaning cupboard has six bottles and "
            "this is one of them. Run the page for the ones you actually get through.</li>",
        ],
        "uses": [
            "<li>Comparing a concentrate with a ready-to-use bottle.</li>",
            "<li>Working out whether a refill pouch is worth it.</li>",
        ],
        "scenarios": [
            {"inputs": {"bottle_price": 6, "bottle_ml": 500, "use_ml": 10, "cleans_week": 2},
             "note": "Six dollars for 500 ml at 10 ml a clean is 50 cleans at 12 cents, so the "
                     "dearer bottle costs 12.48 a year against 15.60."},
        ],
    },
    faq=[
        ("How many sprays is 25 ml?",
         "About five on a standard trigger, which is a reasonable dose for a worktop. A mist "
         "bottle uses less per press and the field should come down."),
        ("Are refills always cheaper?",
         "Per millilitre usually, per clean only if they are the same concentration. A refill "
         "of a weaker formula can cost more per clean than the original bottle."),
        ("Does homemade cleaner count?",
         "Vinegar and water costs a few cents a litre and works on some surfaces. It is outside "
         "this page's arithmetic because the ingredients are sold in different units."),
    ],
    related=[("/everyday-life/toothpaste", "Toothpaste"),
             ("/everyday-life/sunscreen-amount", "Sunscreen amount"),
             ("/everyday-life/grocery", "Grocery budget")],
    checks=[
        ({"bottle_price": 4.5, "bottle_ml": 750, "use_ml": 25, "cleans_week": 2},
         {"cleans": 30, "cost_clean": 0.15, "weeks": 15, "cost_year": 15.6}, 0.01),
        ({"bottle_price": 6, "bottle_ml": 500, "use_ml": 10, "cleans_week": 2},
         {"cleans": 50, "cost_clean": 0.12, "weeks": 25, "cost_year": 12.48}, 0.01),
    ],
))

# ------------------------------------------------------------------- tickets

SPECS.append(S(
    slug="tickets",
    name="Concert Ticket Calculator",
    title="Concert Tickets — Face Value, Fees and the Real Total",
    desc="Face value plus a percentage fee plus a facility charge, times the seats: what a "
         "concert really costs before the booking fee is added to the booking fee.",
    what="The fees on a ticket, the true price of one, the total for the seats you want and the "
         "share of the bill that is fees rather than the performance.",
    fields=[
        F("face", "Face value per ticket", "$", 80),
        F("fee_pct", "Service fee", "%", 15),
        F("facility", "Facility charge per ticket", "$", 4.5),
        F("quantity", "Tickets", "tickets", 2),
    ],
    results=[
        R("service", "Service fee per ticket", "$"),
        R("per_ticket", "True price per ticket", "$"),
        R("total", "Total for the seats", "$"),
        R("fees_pct", "Fees as a share", "%"),
    ],
    formula={
        "service": "face * fee_pct / 100",
        "per_ticket": "face + face * fee_pct / 100 + facility",
        "total": "(face + face * fee_pct / 100 + facility) * quantity",
        "fees_pct": "(face * fee_pct / 100 + facility) / face * 100",
    },
    prose={
        "why": "<p>A ticket advertised at 80, with a fifteen per cent service fee and a 4.50 "
               "facility charge, is 96.50 by the time the basket opens — 20.6 per cent above the "
               "number that made you click.</p>"
               "<p>Two seats is 193 rather than 160, and the difference is not a rounding error "
               "on a night out. The percentage is the figure worth remembering, because it is "
               "roughly the same at every venue and it is never in the advertisement.</p>",
        "formula_note": "The percentage of the face value gives the service fee; adding it and "
                        "the facility charge gives the true price. Times the quantity is the "
                        "basket, and the share is the fees over the face value.",
        "reading": "80 face plus 12 of service fee and 4.50 of facility is 96.50 a ticket. Two "
                   "seats are 193, and the fees are 20.6 per cent of the face value.",
        "example_note": "A twenty per cent fee with a six-dollar facility brings a 40-dollar "
                        "ticket to 54 — a third again, which is where the cheapest seats stop "
                        "being cheap.",
        "pitfalls": [
            "<strong>Forgetting the parking and the booking fee.</strong> The facility charge, "
            "the delivery fee and the car park are three more lines, and none of them are in "
            "the advertised price either.",
            "<strong>Comparing face values across venues.</strong> The same act at two venues "
            "can have fees that differ by ten per cent, so the true price is what to compare.",
        ],
        "limits": [
            "<li><strong>One price structure.</strong> Fees that scale with the number of "
            "tickets, or a single transaction charge, need their own run of the page.</li>",
        ],
        "uses": [
            "<li>Working out the real cost before a presale.</li>",
            "<li>Splitting a group booking fairly, fees and all.</li>",
        ],
        "scenarios": [
            {"inputs": {"face": 40, "fee_pct": 20, "facility": 6, "quantity": 2},
             "note": "A 40-dollar ticket at a twenty per cent fee and a six-dollar facility is "
                     "54: a third above the face value, and 108 for two."},
        ],
    },
    faq=[
        ("Why are fees a percentage of the face value?",
         "Because the seller takes a share of the sale rather than a fixed amount. It is also "
         "why the fee looks smaller on a cheap ticket and the facility charge looks larger."),
        ("Is the facility charge per ticket or per order?",
         "Per ticket at most venues, per order at some. The field here charges per ticket, so "
         "reduce it to the per-ticket share if your venue charges once."),
        ("Can I avoid the fees by buying at the box office?",
         "Sometimes the facility charge disappears and the service fee does not, which is worth "
         "knowing before queueing for an hour."),
    ],
    related=[("/everyday-life/cost-per-minute", "Cost per minute"),
             ("/everyday-life/grocery", "Grocery budget"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"face": 80, "fee_pct": 15, "facility": 4.5, "quantity": 2},
         {"service": 12, "per_ticket": 96.5, "total": 193, "fees_pct": 20.625}, 0.01),
        ({"face": 40, "fee_pct": 20, "facility": 6, "quantity": 2},
         {"service": 8, "per_ticket": 54, "total": 108, "fees_pct": 35}, 0.01),
    ],
))

# --------------------------------------------------------------- money weight

SPECS.append(S(
    slug="money-weight",
    name="Money Weight Calculator",
    title="Money Weight — What a Stack of Banknotes Weighs",
    desc="A US banknote weighs one gram whatever its value, so a thousand dollars is fifty "
         "grams and a million is ten kilos. The page that makes the weight real.",
    what="The weight of a number of banknotes in grams, kilograms and pounds, and the value "
         "they carry, from the denomination and the count.",
    fields=[
        F("bills", "Banknotes", "bills", 100),
        F("denom", "Value of one", "$", 20),
        F("grams_each", "Weight of one", "g", 1,
          help="Every US note weighs one gram, from the one to the hundred. Euro notes range "
               "from 0.65 to 1.1 grams."),
    ],
    results=[
        R("value", "Value of the stack", "$"),
        R("grams", "Weight", "g"),
        R("kg", "Weight", "kg"),
        R("pounds", "Weight", "lb"),
    ],
    formula={
        "value": "bills * denom",
        "grams": "bills * grams_each",
        "kg": "bills * grams_each / 1000",
        "pounds": "bills * grams_each / 453.592 * 1000 / 1000",
    },
    prose={
        "why": "<p>A US banknote weighs a gram whatever number is printed on it, so the value of "
               "a stack and its weight are two separate multiplications. A hundred twenties is "
               "2 000 and 100 grams; a million dollars in twenties is 50 000 notes and fifty "
               "kilos.</p>"
               "<p>That is why the film briefcase is a lie in both directions: a million in "
               "hundreds is ten kilos, which is a heavy shopping bag, and a million in ones is "
               "a tonne, which is a pallet.</p>",
        "formula_note": "Bills times the denomination gives the value; bills times the weight of "
                        "one gives grams, and the kilogram and pound figures convert from that "
                        "with 453.59 grams to the pound.",
        "reading": "100 twenties is 2 000 and 100 grams — 0.1 kilograms or 0.22 pounds. A "
                   "million in twenties is 50 000 notes and 50 kilograms.",
        "example_note": "A million in hundreds is 10 000 notes and ten kilos, which one person "
                        "can carry. The denomination changes the weight by a factor of five "
                        "without changing the value at all.",
        "pitfalls": [
            "<strong>Assuming the note's value affects its weight.</strong> It does not, in "
            "dollars. In coins it very much does, and a bag of pennies is the classic example.",
            "<strong>Forgetting the wrapping.</strong> A strap of a hundred notes adds a paper "
            "band, and a hundred straps is a box. The arithmetic here is the paper only.",
        ],
        "limits": [
            "<li><strong>Notes, not coins.</strong> A jar of coins follows metal and the weight "
            "varies by denomination, so the gram-a-note rule does not carry over.</li>",
        ],
        "uses": [
            "<li>Settling the film-briefcase argument.</li>",
            "<li>Working out postage on a stack of notes or a collection of coupons.</li>",
        ],
        "scenarios": [
            {"inputs": {"bills": 1000, "denom": 20, "grams_each": 1},
             "note": "A thousand twenties is 20 000 and a kilogram — 2.2 pounds, which is "
                     "about a bag of sugar."},
        ],
    },
    faq=[
        ("Does a 100-dollar bill weigh more than a 1-dollar bill?",
         "No. US currency is printed on the same paper stock and every note is one gram. The "
         "value is ink, not weight."),
        ("How much does a million dollars weigh?",
         "Ten kilos in hundreds, fifty in twenties and a tonne in ones. The note weighs a gram "
         "whatever it says."),
        ("What about coins?",
         "They follow metal, so a dollar of pennies weighs about 250 grams and a dollar of "
         "quarters about 23. That is why coin jars are heavier than they look."),
    ],
    related=[("/everyday-life/paper-weight", "Paper weight"),
             ("/everyday-life/price-per-ounce", "Price per ounce"),
             ("/everyday-life/grocery", "Grocery budget")],
    checks=[
        ({"bills": 100, "denom": 20, "grams_each": 1},
         {"value": 2000, "grams": 100, "kg": 0.1, "pounds": 0.2205}, 0.01),
        ({"bills": 1000, "denom": 20, "grams_each": 1},
         {"value": 20000, "grams": 1000, "kg": 1, "pounds": 2.2046}, 0.01),
    ],
))

# ---------------------------------------------------------------- paper weight

SPECS.append(S(
    slug="paper-weight",
    name="Paper Weight Calculator",
    title="Paper Weight — Reams, Sheets and Grams per Square Metre",
    desc="Grams per square metre, a sheet size and 500 sheets give the weight of a ream in "
         "kilos and pounds, and how many sheets make a kilo.",
    what="The weight of a ream of paper from its grammage and sheet size, in kilograms and "
         "pounds, plus the area of one sheet and the sheets in a kilogram.",
    fields=[
        F("width", "Sheet width", "in", 8.5),
        F("length", "Sheet length", "in", 11),
        F("sheets", "Sheets in a ream", "sheets", 500),
        F("gsm", "Grammage", "g/m²", 80),
    ],
    results=[
        R("area", "Area of one sheet", "m²"),
        R("ream_kg", "Weight of a ream", "kg"),
        R("ream_lb", "Weight of a ream", "lb"),
        R("sheets_kg", "Sheets a kilo", "sheets"),
    ],
    formula={
        "area": "width * length * 0.00064516",
        "ream_kg": "width * length * 0.00064516 * sheets * gsm / 1000",
        "ream_lb": "width * length * 0.00064516 * sheets * gsm / 1000 * 2.20462",
        "sheets_kg": "1000 / (width * length * 0.00064516 * gsm)",
    },
    prose={
        "why": "<p>Paper is sold by weight and printed by size, and the two units meet at grams "
               "per square metre times the sheet area. An A4 sheet is 0.0624 square metres, so "
               "80 gsm paper is 4.99 grams a sheet and a ream is 2.49 kilograms.</p>"
               "<p>US Letter is 0.0603 square metres, which is why an American ream of 80 gsm "
               "weighs 2.41 kilograms and not 2.49. The difference is small until a pallet is "
               "being shipped.</p>",
        "formula_note": "Width times length in inches times 0.00064516 gives square metres. "
                        "Times the grammage gives grams a sheet; times the sheet count and "
                        "divided by a thousand gives kilograms a ream, and 2.20462 converts to "
                        "pounds.",
        "reading": "US Letter at 80 gsm is 0.0603 square metres a sheet, 2.41 kilograms a ream "
                   "and 5.32 pounds. A kilogram holds 207 sheets.",
        "example_note": "At 120 gsm the same ream weighs 3.62 kilograms — half again — which is "
                        "why heavier paper costs more to post and always has.",
        "pitfalls": [
            "<strong>Confusing gsm with pound weight.</strong> A US \"20 lb bond\" is not 20 "
            "grams and not 20 pounds a ream; it is a basis weight from a different sheet size. "
            "Convert to gsm before comparing.",
            "<strong>Forgetting the card stock.</strong> Above 160 gsm a sheet starts to jam a "
            "printer that was designed for 80, and the weight figure is the early warning.",
        ],
        "limits": [
            "<li><strong>Nominal size.</strong> Cut sheets are slightly under size, and the "
            "grammage has a tolerance of about five per cent. A ream's real weight varies "
            "between batches.</li>",
        ],
        "uses": [
            "<li>Working out postage on a mailing.</li>",
            "<li>Comparing a ream in gsm with one in US pounds.</li>",
        ],
        "scenarios": [
            {"inputs": {"width": 8.5, "length": 11, "sheets": 500, "gsm": 120},
             "note": "At 120 gsm the ream is 3.62 kilograms and 7.98 pounds, and a kilogram "
                     "holds 138 sheets."},
        ],
    },
    faq=[
        ("How much does a ream of A4 weigh?",
         "About 2.5 kilograms at 80 gsm, because A4 is 0.0624 square metres. US Letter reams "
         "are slightly lighter at the same grammage."),
        ("What is 80 gsm in pounds?",
         "Roughly 20 lb bond for US Letter, though the basis weights are defined on different "
         "sheets and the conversion is not exact."),
        ("Why does card cost more?",
         "It weighs more, so it uses more pulp and costs more to ship. The price per ream "
         "follows the weight almost exactly."),
    ],
    related=[("/everyday-life/paper-thickness", "Paper thickness"),
             ("/everyday-life/money-weight", "Money weight"),
             ("/everyday-life/roll-length", "Roll length")],
    checks=[
        ({"width": 8.5, "length": 11, "sheets": 500, "gsm": 80},
         {"area": 0.0603226, "ream_kg": 2.4129, "ream_lb": 5.3193,
          "sheets_kg": 207.2198}, 0.01),
        ({"width": 8.5, "length": 11, "sheets": 500, "gsm": 120},
         {"ream_kg": 3.6194, "ream_lb": 7.979, "sheets_kg": 138.1466}, 0.01),
    ],
))
# ----------------------------------------------------------- helium balloons

SPECS.append(S(
    slug="helium-balloons",
    name="Helium Balloons Calculator",
    title="Helium Balloons — How Many an 11-inch Party Gets",
    desc="A tank's capacity in cubic feet, a balloon's volume and an allowance for what is lost "
         "inflating: how many balloons a tank fills and the cost of each one.",
    what="How many balloons a helium tank fills, allowing for what is lost inflating, and the "
         "cost of each balloon once the tank is paid for.",
    fields=[
        F("tank_cuft", "Tank capacity", "cu ft", 14.9,
          help="The small disposable tanks are 8.9 cubic feet, the medium ones 14.9 and a "
               "cylinder nearer 55."),
        F("balloon_cuft", "Gas in one balloon", "cu ft", 0.5,
          help="An 11-inch latex balloon holds about half a cubic foot; a 9-inch one a "
               "quarter."),
        F("waste_pct", "Lost inflating", "%", 10,
          help="Filling, tying and the last balloon that will not float all take gas. Ten per "
               "cent is ordinary."),
        F("tank_price", "Tank price", "$", 40),
    ],
    results=[
        R("usable", "Gas you can use", "cu ft"),
        R("balloons", "Balloons", "balloons"),
        R("cost_balloon", "Cost per balloon", "$"),
        R("per_cuft", "Balloons per cubic foot", "balloons"),
    ],
    formula={
        "usable": "tank_cuft * (1 - waste_pct / 100)",
        "balloons": "tank_cuft * (1 - waste_pct / 100) / balloon_cuft",
        "cost_balloon": "tank_price / (tank_cuft * (1 - waste_pct / 100) / balloon_cuft)",
        "per_cuft": "1 / balloon_cuft",
    },
    prose={
        "why": "<p>A tank is sold in cubic feet and a balloon in inches, and the two never meet "
               "on the label. An 11-inch balloon holds about half a cubic foot, so a 14.9 cubic "
               "foot tank has 29.8 balloons in it before anything is lost.</p>"
               "<p>Ten per cent goes on filling and tying, which leaves 26.8 — the figure to "
               "plan a party with, and one to three balloons short of what people expect.</p>",
        "formula_note": "Tank capacity less the waste share gives usable gas; divided by the "
                        "volume of one balloon gives the count. The cost per balloon is the "
                        "tank price over that count, and the per-cubic-foot figure is the "
                        "reciprocal of the balloon volume.",
        "reading": "14.9 cubic feet less ten per cent is 13.41 usable, which at half a cubic "
                   "foot a balloon is 26.8 balloons and 1.49 each.",
        "example_note": "Nine-inch balloons take a quarter of a cubic foot, so the same tank "
                        "fills 53.6 of them — twice the count and half the presence.",
        "pitfalls": [
            "<strong>Using the tank's nominal capacity.</strong> A tank is filled to a pressure "
            "and the last of the gas comes out slowly. Ten per cent lost is optimistic on a cold "
            "day.",
            "<strong>Forgetting the helium in the balloons you abandon.</strong> Half-inflated "
            "balloons and a knot that slips are waste the percentage absorbs, not the "
            "arithmetic.",
        ],
        "limits": [
            "<li><strong>Latex, room temperature.</strong> Foil balloons hold far more gas for "
            "their size and float for weeks; helium also expands in the sun and contracts in "
            "the cold, so a cold morning shrinks every balloon.</li>",
        ],
        "uses": [
            "<li>Buying the right tank for a party of a known size.</li>",
            "<li>Comparing the cost per balloon with a shop's inflated price.</li>",
        ],
        "scenarios": [
            {"inputs": {"tank_cuft": 14.9, "balloon_cuft": 0.25, "waste_pct": 10,
                        "tank_price": 40},
             "note": "At a quarter of a cubic foot a balloon the same tank fills 53.6 nine-inch "
                     "balloons at 75 cents each."},
        ],
    },
    faq=[
        ("How many balloons does a small tank fill?",
         "The 8.9 cubic foot disposable tanks fill about 30 eleven-inch balloons without an "
         "allowance, and 27 with one. That is a small party."),
        ("How much helium is in an 11-inch balloon?",
         "About 0.5 cubic feet, because a sphere of 11 inches across has a volume of roughly "
         "0.4 cubic feet and the balloon stretches a little beyond round."),
        ("Do foil balloons use more helium?",
         "More per balloon and far less per day of float, because they do not leak through the "
         "material. A foil balloon is the cheaper helium per hour of decoration."),
    ],
    related=[("/everyday-life/balloon-arch", "Balloon arch"),
             ("/everyday-life/bean-bag-filling", "Bean bag filling"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"tank_cuft": 14.9, "balloon_cuft": 0.5, "waste_pct": 10, "tank_price": 40},
         {"usable": 13.41, "balloons": 26.82, "cost_balloon": 1.4914, "per_cuft": 2}, 0.01),
        ({"tank_cuft": 14.9, "balloon_cuft": 0.25, "waste_pct": 10, "tank_price": 40},
         {"usable": 13.41, "balloons": 53.64, "cost_balloon": 0.7457, "per_cuft": 4}, 0.01),
    ],
))

# --------------------------------------------------------- bean bag filling

SPECS.append(S(
    slug="bean-bag-filling",
    name="Bean Bag Filling Calculator",
    title="Bean Bag Filling — Litres of Beads for a Cover",
    desc="Cover dimensions and a fill level give the litres of beads a bean bag needs, the "
         "number of 100-litre bags to order and what the filling costs to buy and top up.",
    what="The volume of a bean bag cover, the beads needed to fill it to the right firmness, "
         "how many bags of filling that is, and the cost at a price per litre.",
    fields=[
        F("length", "Cover length", "cm", 80),
        F("width", "Cover width", "cm", 80),
        F("height", "Cover height", "cm", 40),
        F("fill_pct", "Fill level", "%", 60,
          help="Fifty per cent is a soft bag that sinks, sixty is the usual, seventy is firm "
               "and stays where it is put."),
        F("bag_litres", "Filling per bag", "L", 100),
        F("price_litre", "Price per litre", "$/L", 0.12),
    ],
    results=[
        R("volume", "Cover volume", "L"),
        R("fill", "Beads needed", "L"),
        R("bags", "Bags to order", "bags"),
        R("cost", "Cost of filling", "$"),
    ],
    formula={
        "volume": "length * width * height / 1000",
        "fill": "length * width * height / 1000 * fill_pct / 100",
        "bags": "ceil(length * width * height / 1000 * fill_pct / 100 / bag_litres)",
        "cost": "length * width * height / 1000 * fill_pct / 100 * price_litre",
    },
    prose={
        "why": "<p>A bean bag is a box of air with beads in it, and nobody wants a box of air. "
               "An 80 by 80 by 40 centimetre cover is 256 litres, and at sixty per cent fill it "
               "takes 153.6 litres of beads — a bag and a half of the 100-litre sacks.</p>"
               "<p>Order two and keep the spare for the top-up, because beads compress by ten "
               "to twenty per cent in the first month and every bean bag in a living room is "
               "half a bag short after a year.</p>",
        "formula_note": "Length times width times height in centimetres is cubic centimetres, "
                        "and a thousand of those is a litre. The fill level takes a share of "
                        "that, and the bags figure rounds up because a bag is bought whole.",
        "reading": "80 by 80 by 40 is 256 litres, and at sixty per cent fill that is 153.6 "
                   "litres: two bags of 100, costing 18.43 at 12 cents a litre.",
        "example_note": "At fifty per cent the same cover needs 128 litres and two bags still, "
                        "which is why the fill level changes the comfort more than the order.",
        "pitfalls": [
            "<strong>Filling to capacity.</strong> A bean bag full to the brim is a rock. "
            "Sixty per cent is the figure that lets it mould to a person without collapsing.",
            "<strong>Forgetting the shape is not a box.</strong> Most covers are sewn to a "
            "rounded shape, so the true volume is less than length times width times height. "
            "The beads settle and the spare bag is the answer.",
        ],
        "limits": [
            "<li><strong>Rectangular cover.</strong> A teardrop bag or one with a curved back "
            "has a smaller volume for the same dimensions and needs ten to twenty per cent "
            "less filling.</li>",
        ],
        "uses": [
            "<li>Reordering beads for a flat bean bag.</li>",
            "<li>Sizing a cover before buying filling for it.</li>",
        ],
        "scenarios": [
            {"inputs": {"length": 80, "width": 80, "height": 40, "fill_pct": 50,
                        "bag_litres": 100, "price_litre": 0.12},
             "note": "At fifty per cent the cover takes 128 litres and costs 15.36 — the same "
                     "two bags with 72 litres of spare."},
        ],
    },
    faq=[
        ("How many litres of beads does a bean bag need?",
         "Between 100 and 200 for a full-size adult bag, depending on its dimensions and how "
         "firm you like it. A child's bag is nearer 60."),
        ("Why does a bean bag go flat?",
         "The beads compress under weight and the cover stretches. Topping up ten per cent "
         "every year restores it, which is why the spare bag is not waste."),
        ("Are polystyrene beads sold by weight or volume?",
         "Both, and the density is about 10 to 15 grams a litre. A 100-litre bag is roughly a "
         "kilogram, so a supplier quoting kilos needs the conversion."),
    ],
    related=[("/everyday-life/helium-balloons", "Helium balloons"),
             ("/everyday-life/rug-size", "Rug size"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"length": 80, "width": 80, "height": 40, "fill_pct": 60, "bag_litres": 100,
          "price_litre": 0.12},
         {"volume": 256, "fill": 153.6, "bags": 2, "cost": 18.432}, 0.01),
        ({"length": 80, "width": 80, "height": 40, "fill_pct": 50, "bag_litres": 100,
          "price_litre": 0.12},
         {"fill": 128, "bags": 2, "cost": 15.36}, 0.01),
    ],
))
