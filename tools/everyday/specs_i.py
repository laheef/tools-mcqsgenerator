"""

Everyday-life batch I: the time it all takes.

Ten pages about hours — reading, listening, speaking, watching, and what a rate
per second becomes over a year — and four about a roll of something: paper
thickness, the length wound on a roll, and what a sheet of toilet paper costs
when the pack is priced by count instead of by size.

The arithmetic here is almost all multiplication, which is exactly why it gets
done in the head and comes out wrong: 45 minutes of podcast a day is 195 hours
a year, and nobody estimates that from the armchair.

"""

from __future__ import annotations

from lib import F, R, S, SEL

SPECS: list = []
# ---------------------------------------------------------- reading speed

SPECS.append(S(
    slug="reading-speed",
    name="Reading Speed Calculator",
    title="Reading Speed — Words a Minute from Pages and Time",
    desc="Pages read and the minutes they took give words per minute, pages an hour, and how "
         "long a full-length book will take you at that pace.",
    what="Reading speed in words a minute and pages an hour, from a timed session, and the "
         "number of hours a book of a given length will cost at that speed.",
    fields=[
        F("pages", "Pages read", "pages", 20),
        F("minutes", "Time taken", "min", 25),
        F("words_page", "Words on a page", "words", 300,
          help="A trade paperback sets about 300 words a page; a hardback with wide margins "
               "is nearer 250, a technical book less."),
        F("book_words", "Length of the book", "words", 80000,
          help="Eighty thousand words is an average novel. Genre fiction runs to 100 000 and "
               "non-fiction 70 000."),
    ],
    results=[
        R("wpm", "Words a minute", "wpm"),
        R("pages_hour", "Pages an hour", "pages/h"),
        R("hours_book", "Hours for the book", "h"),
        R("days_30", "At 30 minutes a day", "days"),
    ],
    formula={
        "wpm": "pages * words_page / minutes",
        "pages_hour": "pages / minutes * 60",
        "hours_book": "book_words / (pages * words_page / minutes) / 60",
        "days_30": "book_words / (pages * words_page / minutes) / 30",
    },
    prose={
        "why": "<p>Twenty pages in twenty-five minutes with 300 words on a page is 240 words a "
               "minute, which is a brisk but ordinary adult pace. Slow readers sit near 150 and "
               "people who skim claim 500 without noticing what they missed.</p>"
               "<p>The useful figure is the book. Eighty thousand words at 240 a minute is five "
               "and a half hours, or eleven days at half an hour a night. That is the answer to "
               "\"I never have time to read\" — it is the same half hour, spent elsewhere.</p>",
        "formula_note": "Pages times words a page gives the words in the session; divided by "
                        "the minutes it gives words a minute. Pages an hour is the same "
                        "division multiplied by sixty, and the book is its length divided by "
                        "the rate and then by sixty.",
        "reading": "20 pages of 300 words in 25 minutes is 240 words a minute and 48 pages an "
                   "hour. An 80 000-word novel takes 5.56 hours, or eleven days at thirty "
                   "minutes a night.",
        "example_note": "The same twenty pages in forty minutes is 150 words a minute, and the "
                        "novel becomes nine hours — nearly four more evenings for the same "
                        "book.",
        "pitfalls": [
            "<strong>Timing a page of dialogue.</strong> Dialogue goes faster than description, "
            "so one fast chapter inflates the rate by a third. Time a whole sitting.",
            "<strong>Assuming the rate is constant.</strong> A technical book at 240 words a "
            "minute is skimmed, not read. Narrative and argument are different speeds.",
        ],
        "limits": [
            "<li><strong>Silent reading.</strong> Reading aloud is about 130 words a minute, "
            "and the speaking-time page measures that direction.</li>",
        ],
        "uses": [
            "<li>Working out whether a book club book fits before Thursday.</li>",
            "<li>Estimating how long a manuscript will take to read.</li>",
        ],
        "scenarios": [
            {"inputs": {"pages": 20, "minutes": 40, "words_page": 300, "book_words": 80000},
             "note": "At 150 words a minute the novel takes nine hours and twenty-two "
                     "half-hour evenings, which is why holiday reading feels different from "
                     "commuting reading."},
        ],
    },
    faq=[
        ("What is an average reading speed?",
         "Between 200 and 250 words a minute for adult fiction. University students reading "
         "for study slower, and people reading on a phone faster because the lines are short."),
        ("Does speed reading actually work?",
         "The eye can take in more words per stop, and comprehension falls with it. Most "
         "claims above 500 words a minute are skimming with the plot filled in from memory."),
        ("Why is my speed different for screen and paper?",
         "Line length and font size. A 90-character line on paper is easier to track than a "
         "wide paragraph on a monitor, and eye strain shows up as a slower rate."),
    ],
    related=[("/everyday-life/speaking-time", "Speaking time"),
             ("/everyday-life/audiobook-speed", "Audiobook speed"),
             ("/everyday-life/reading-time", "Reading time")],
    checks=[
        ({"pages": 20, "minutes": 25, "words_page": 300, "book_words": 80000},
         {"wpm": 240, "pages_hour": 48, "hours_book": 5.5556, "days_30": 11.1111}, 0.01),
        ({"pages": 20, "minutes": 40, "words_page": 300, "book_words": 80000},
         {"wpm": 150, "pages_hour": 30, "hours_book": 8.8889, "days_30": 17.7778}, 0.01),
    ],
))

# --------------------------------------------------------- audiobook speed

SPECS.append(S(
    slug="audiobook-speed",
    name="Audiobook Speed Calculator",
    title="Audiobook Speed — Hours at 1.25x, 1.5x and 2x",
    desc="A twelve-hour book is eight hours at 1.5x, not six, because the saved hours are the "
         "difference and not the quotient. The page that shows both numbers.",
    what="How long an audiobook takes at a playback speed, the hours it saves, and how many "
         "days it takes to finish at a fixed daily listening time.",
    fields=[
        F("hours", "Length at normal speed", "h", 12),
        F("speed", "Playback speed", "x", 1.5,
          help="1.25x is the setting most listeners settle on; 2x is a comprehension test."),
        F("hours_day", "Listening a day", "h", 1),
    ],
    results=[
        R("fast", "Length at speed", "h"),
        R("saved", "Hours saved", "h"),
        R("pct", "Time saved", "%"),
        R("days", "Days to finish", "days"),
    ],
    formula={
        "fast": "hours / speed",
        "saved": "hours - hours / speed",
        "pct": "(1 - 1 / speed) * 100",
        "days": "hours / speed / hours_day",
    },
    prose={
        "why": "<p>Playback speed divides the time, and because it is a divisor the savings are "
               "not proportional: 1.5x turns twelve hours into eight and saves four, while 2x "
               "turns the same twelve into six and saves six.</p>"
               "<p>At an hour a day, the 1.5x listener finishes in eight days and the 1x "
               "listener in twelve. Over a year of commuting that is the difference between "
               "about 45 books and 30, from exactly the same half hour in the car.</p>",
        "formula_note": "Length divided by speed gives the new duration, and the difference "
                        "from the original is what was saved. The percentage is that difference "
                        "over the original, which for any speed is one minus the reciprocal.",
        "reading": "A twelve-hour book at 1.5x takes eight hours and saves four — a third of "
                   "the time. An hour a day finishes it in eight days.",
        "example_note": "At 2x the same book is six hours and the saving is half. What is not "
                        "the same is how much of it survives: comprehension falls fastest "
                        "above about 1.75x for most listeners.",
        "pitfalls": [
            "<strong>Assuming the speed applies to everything.</strong> Some players adjust "
            "music and intro stings as well, and some titles are recorded slowly to begin "
            "with, so 1.5x on one is 1.2x on another.",
            "<strong>Counting the saved hours as free.</strong> They are only free if the "
            "listening time is fixed. A faster speed usually means you finish and start "
            "another book, not that you spend less time.",
        ],
        "limits": [
            "<li><strong>One speed throughout.</strong> Most people listen to fiction faster "
            "than to a technical book, and the honest figure is two runs of this page.</li>",
        ],
        "uses": [
            "<li>Working out whether a library loan will finish before it expires.</li>",
            "<li>Deciding between 1.25x and 1.5x for a book you have to remember.</li>",
        ],
        "scenarios": [
            {"inputs": {"hours": 12, "speed": 2, "hours_day": 1},
             "note": "At 2x the book is six hours and six evenings, and the saving is the same "
                     "six hours the new duration costs — a coincidence of this particular "
                     "number."},
        ],
    },
    faq=[
        ("Why is 1.5x not a third faster in listening effort?",
         "Because effort rises with speed. The time saved is a third, and the concentration "
         "needed is more, which is the trade most listeners make knowingly."),
        ("Does the narrator matter?",
         "A great deal. A slow narrator with pauses is a natural 1.5x; a fast one at 1.5x can "
         "be unintelligible, and the same setting is two different experiences."),
        ("Can I count an audiobook as reading?",
         "For plot, yes. For anything you intend to quote or use, no: the eye re-reads a "
         "sentence, the ear cannot."),
    ],
    related=[("/everyday-life/audiobooks", "Audiobooks in a year"),
             ("/everyday-life/reading-speed", "Reading speed"),
             ("/everyday-life/podcasts", "Podcast time")],
    checks=[
        ({"hours": 12, "speed": 1.5, "hours_day": 1},
         {"fast": 8, "saved": 4, "pct": 33.3333, "days": 8}, 0.01),
        ({"hours": 12, "speed": 2, "hours_day": 1},
         {"fast": 6, "saved": 6, "pct": 50, "days": 6}, 0.01),
    ],
))

# ------------------------------------------------------------- audiobooks

SPECS.append(S(
    slug="audiobooks",
    name="Audiobooks in a Year Calculator",
    title="Audiobooks — How Many Hours a Shelf Really Is",
    desc="Books, average length and daily listening give total hours, calendar days and the "
         "pace in books a month — the arithmetic behind a realistic reading challenge.",
    what="The hours a pile of audiobooks represents, how many calendar days of listening that "
         "is, how long it takes at your daily pace, and the books a month that pace delivers.",
    fields=[
        F("books", "Books", "books", 12),
        F("hours_book", "Average length", "h", 9),
        F("hours_day", "Listening a day", "h", 1.5),
    ],
    results=[
        R("total_hours", "Total listening", "h"),
        R("days", "Days to finish the pile", "days"),
        R("weeks", "Weeks", "weeks"),
        R("per_month", "Books a month", "books"),
    ],
    formula={
        "total_hours": "books * hours_book",
        "days": "books * hours_book / hours_day",
        "weeks": "books * hours_book / hours_day / 7",
        "per_month": "books / (books * hours_book / hours_day / 30.4375)",
    },
    prose={
        "why": "<p>Twelve books at nine hours is 108 hours, which sounds like a lot until it "
               "is divided by 1.5 hours a day: seventy-two days, or ten and a bit weeks. A "
               "reading challenge of twelve books a year is a commute and a walk.</p>"
        "<p>The books-a-month figure is the pace the pile implies at your listening time, "
               "and it is the number that makes a target realistic or not. At 1.5 hours a day "
               "the pace is about five books a month.</p>",
        "formula_note": "Books times average length gives total hours; divided by the daily "
                        "listening gives days, and by seven gives weeks. The monthly rate is "
                        "the pile over the days and then over 30.44, the average month.",
        "reading": "Twelve books of nine hours is 108 hours: 72 days at 1.5 hours a day, ten "
                   "weeks, and a pace of five books a month.",
        "example_note": "Longer books change the count but not the hours. Twelve books of "
                        "fifteen hours is 180 hours — five months of the same habit.",
        "pitfalls": [
            "<strong>Counting a book as one unit.</strong> A 40-hour history and a 4-hour "
            "novella are both one book on a reading app. Hours are the comparable figure.",
            "<strong>Assuming the pace holds.</strong> Holiday weeks are three times the "
            "commute and working weeks are one. The annual total rarely matches either.",
        ],
        "limits": [
            "<li><strong>Listening only.</strong> A book that needs diagrams — a manual, a "
            "map-heavy history — is not the same book in audio, and this page counts time "
            "rather than comprehension.</li>",
        ],
        "uses": [
            "<li>Judging whether a reading challenge is realistic.</li>",
            "<li>Estimating a value for money subscription.</li>",
        ],
        "scenarios": [
            {"inputs": {"books": 12, "hours_book": 9, "hours_day": 3},
             "note": "At three hours a day the same twelve books take 36 days and the pace "
                     "doubles to ten books a month."},
        ],
    },
    faq=[
        ("How many hours is an audiobook per 100 pages?",
         "Roughly two and a half hours. A 300-page novel is about 8 to 10 hours at normal "
         "speed, and the narrator's pace matters more than the page count."),
        ("Is 1.5 hours a day a lot?",
         "It is a commute each way plus a dog walk. Most people who listen to twelve books a "
         "year are not doing anything unusual — they are driving."),
        ("Why does the pace come out in books a month rather than a year?",
         "Because a month is the unit reading apps use for a challenge, and because the "
         "arithmetic of a year is easier to disagree with than the arithmetic of a month."),
    ],
    related=[("/everyday-life/audiobook-speed", "Audiobook speed"),
             ("/everyday-life/podcasts", "Podcast time"),
             ("/everyday-life/reading-speed", "Reading speed")],
    checks=[
        ({"books": 12, "hours_book": 9, "hours_day": 1.5},
         {"total_hours": 108, "days": 72, "weeks": 10.2857, "per_month": 5.0729}, 0.01),
        ({"books": 12, "hours_book": 9, "hours_day": 3},
         {"days": 36, "weeks": 5.1429, "per_month": 10.1458}, 0.01),
    ],
))

# ----------------------------------------------------------- speaking time

SPECS.append(S(
    slug="speaking-time",
    name="Speaking Time Calculator",
    title="Speaking Time — Words into Minutes out Loud",
    desc="A script, a speech or a lecture in words, turned into the minutes it takes to say "
         "at 130 words a minute, with seconds, pages and a longer talk in the same shape.",
    what="How long a piece of text takes to speak at an ordinary pace, in minutes and seconds, "
         "and what that pace implies for a longer talk.",
    fields=[
        F("words", "Word count", "words", 1500),
        F("wpm", "Speaking pace", "wpm", 130,
          help="Conversation runs at 150 to 160. A speech is slower, 120 to 140, because of "
               "pauses that do not appear in the word count."),
    ],
    results=[
        R("minutes", "Speaking time", "min"),
        R("seconds", "In seconds", "s"),
        R("pages", "Pages at 250 words", "pages"),
        R("tenk", "Hours per 10 000 words", "h"),
    ],
    formula={
        "minutes": "words / wpm",
        "seconds": "words / wpm * 60",
        "pages": "words / 250",
        "tenk": "10000 / wpm / 60",
    },
    prose={
        "why": "<p>A thousand five hundred words is eleven and a half minutes at 130 words a "
               "minute, which is a conference talk, a wedding speech and one side of a "
               "lecture. Read it at 160 and the same words finish two and a half minutes "
               "early, and the room notices.</p>"
               "<p>Speakers consistently under-estimate by a fifth. The text takes longer to "
               "say than to read, because breath, emphasis and the pause after a point all "
               "consume time that the word count does not contain.</p>",
        "formula_note": "Words over pace gives minutes; times sixty gives seconds. The page "
                        "count uses 250 words a page, a manuscript convention, and the "
                        "ten-thousand-word figure shows how the pace scales to a long talk.",
        "reading": "1 500 words at 130 a minute is 11.5 minutes or 692 seconds — six pages of "
                   "manuscript, and a pace of 1.28 hours per ten thousand words.",
        "example_note": "A forty-minute lecture is about 5 200 words at 130, and 6 400 at "
                        "160. The same slot needs different scripts depending on how fast you "
                        "actually speak.",
        "pitfalls": [
            "<strong>Timing by reading.</strong> Silent reading runs two to three times faster "
            "than speech. Timing a script means saying it out loud, with a clock.",
            "<strong>Forgetting the pauses.</strong> A five-second pause after each of six "
            "points is half a minute, and most scripts have no allowance for it.",
        ],
        "limits": [
            "<li><strong>One pace.</strong> A talk with questions, laughter or a demonstration "
            "runs long regardless of the word count. Leave a tenth of the slot free.</li>",
        ],
        "uses": [
            "<li>Cutting a script to fit a slot before the day.</li>",
            "<li>Estimating a narration job for a client.</li>",
        ],
        "scenarios": [
            {"inputs": {"words": 1500, "wpm": 160},
             "note": "At 160 words a minute the same 1 500 words are 9.4 minutes, which is why "
                     "a nervous speaker finishes early and has nothing left to say."},
        ],
    },
    faq=[
        ("How many words is a five-minute speech?",
         "About 650 at an ordinary pace of 130, or 800 if you speak quickly. The safe figure "
         "for a timed slot is 600."),
        ("Is 130 words a minute slow?",
         "For conversation, yes. For a speech it is the pace an audience can follow, and the "
         "slowest sentences are usually the ones people remember."),
        ("Does an autocue change the timing?",
         "It removes the pauses for thought and adds some for reading, and the two roughly "
         "cancel. What it does not remove is the need to run the clock once."),
    ],
    related=[("/everyday-life/reading-speed", "Reading speed"),
             ("/everyday-life/words-per-minute", "Words per minute"),
             ("/everyday-life/reading-time", "Reading time")],
    checks=[
        ({"words": 1500, "wpm": 130},
         {"minutes": 11.5385, "seconds": 692.3077, "pages": 6, "tenk": 1.2821}, 0.01),
        ({"words": 1500, "wpm": 160},
         {"minutes": 9.375, "seconds": 562.5, "pages": 6, "tenk": 1.0417}, 0.01),
    ],
))
# ---------------------------------------------------------------- podcasts

SPECS.append(S(
    slug="podcasts",
    name="Podcast Time Calculator",
    title="Podcast Time — What a Week of Shows Costs a Year",
    desc="Five episodes a week at forty-five minutes is 195 hours a year, or eight whole days. "
         "The page turns a weekly listening habit into the number it really is.",
    what="The hours a week of podcast episodes takes, what that becomes over a month and a "
         "year, and how many whole days of the year it adds up to.",
    fields=[
        F("episodes", "Episodes a week", "episodes", 5),
        F("minutes", "Average episode", "min", 45),
    ],
    results=[
        R("hours_week", "Hours a week", "h"),
        R("hours_month", "Hours a month", "h"),
        R("hours_year", "Hours a year", "h"),
        R("days_year", "Whole days a year", "days"),
    ],
    formula={
        "hours_week": "episodes * minutes / 60",
        "hours_month": "episodes * minutes / 60 * 30.4375 / 7",
        "hours_year": "episodes * minutes / 60 * 52",
        "days_year": "episodes * minutes / 60 * 52 / 24",
    },
    prose={
        "why": "<p>Five shows a week at forty-five minutes is under four hours, which fits in a "
               "commute and feels like nothing. Over a year it is 195 hours, or eight days of "
               "the year spent listening.</p>"
               "<p>That is not an argument against podcasts; it is the number you need to "
               "decide whether the queue is a habit or a backlog. Eight days is also roughly "
               "twenty-four books at the audiobook pace, which is a fair comparison of two ways "
               "to fill the same commute.</p>",
        "formula_note": "Episodes times minutes over sixty gives hours a week. The month uses "
                        "the average 30.44-day month, the year uses 52 weeks, and the day count "
                        "is the year divided by 24.",
        "reading": "Five episodes of 45 minutes is 3.75 hours a week, 16.3 hours a month and "
                   "195 hours a year — eight days.",
        "example_note": "Two episodes is 78 hours a year and three days. The habit scales "
                        "linearly, which makes it easy to cut by a fixed amount rather than "
                        "guessing.",
        "pitfalls": [
            "<strong>Counting the queue as consumption.</strong> A saved episode is a "
            "resolution. The figure is what you actually listen to, not what you subscribe to.",
            "<strong>Ignoring the playback speed.</strong> Half the people listening to five "
            "hours a week are doing it at 1.5x, which is really three hours of attention and "
            "the audiobook-speed page has the correction.",
        ],
        "limits": [
            "<li><strong>Episodes, not attention.</strong> A podcast with the radio on in the "
            "background costs the hour and buys less than the hour of a show you follow.</li>",
        ],
        "uses": [
            "<li>Deciding whether to unsubscribe from a weekly show.</li>",
            "<li>Comparing a podcast habit with an audiobook habit on the same commute.</li>",
        ],
        "scenarios": [
            {"inputs": {"episodes": 7, "minutes": 45},
             "note": "Seven episodes a week is 5.25 hours, 273 hours a year and eleven and a "
                     "half whole days."},
        ],
    },
    faq=[
        ("How many hours a year is an hour a day?",
         "365, which is fifteen days. The arithmetic is trivial and the answer still surprises "
         "people, which is why it is worth doing once."),
        ("Does listening at 1.5x reduce the time?",
         "Yes, by a third. The same five episodes take 2.5 hours a week instead of 3.75, and "
         "the yearly figure falls from 195 to 130."),
        ("Should I count the commute twice?",
         "No. The commute is a fixed slot; the interesting figure is what fills it and what it "
         "costs in attention, not whether it happens."),
    ],
    related=[("/everyday-life/audiobooks", "Audiobooks in a year"),
             ("/everyday-life/audiobook-speed", "Audiobook speed"),
             ("/everyday-life/tv-alternatives", "TV alternatives")],
    checks=[
        ({"episodes": 5, "minutes": 45},
         {"hours_week": 3.75, "hours_month": 16.3058, "hours_year": 195,
          "days_year": 8.125}, 0.01),
        ({"episodes": 7, "minutes": 45},
         {"hours_week": 5.25, "hours_year": 273, "days_year": 11.375}, 0.01),
    ],
))

# ------------------------------------------------------ tv series duration

SPECS.append(S(
    slug="tv-series-duration",
    name="TV Series Duration Calculator",
    title="TV Series Duration — Seasons, Episodes and Hours",
    desc="Seasons, episodes per season and an average runtime give the total episodes and the "
         "hours they take, plus the nights it costs at two hours an evening.",
    what="The total episodes and viewing hours in a series, from its season count, and how many "
         "evenings it takes at a fixed amount of watching a night.",
    fields=[
        F("seasons", "Seasons", "seasons", 6),
        F("episodes", "Episodes a season", "episodes", 10),
        F("minutes", "Average episode", "min", 50),
        F("hours_night", "Watching a night", "h", 2),
    ],
    results=[
        R("total_episodes", "Total episodes", "episodes"),
        R("total_hours", "Total viewing", "h"),
        R("nights", "Nights to finish", "nights"),
        R("weeks", "Weeks at 5 nights", "weeks"),
    ],
    formula={
        "total_episodes": "seasons * episodes",
        "total_hours": "seasons * episodes * minutes / 60",
        "nights": "seasons * episodes * minutes / 60 / hours_night",
        "weeks": "seasons * episodes * minutes / 60 / hours_night / 5",
    },
    prose={
        "why": "<p>Six seasons of ten fifty-minute episodes is sixty episodes and fifty hours. "
               "At two hours a night that is twenty-five evenings, or five weeks if you watch "
               "five nights a week.</p>"
               "<p>That is the number a recommendation means. \"You should watch it\" costs "
               "twenty-five evenings of your year, and comparing it with the eight days of "
               "podcasts or the five hours of a novel is a fair way to choose.</p>",
        "formula_note": "Seasons times episodes gives the count; times the runtime and divided "
                        "by sixty gives hours. Nights and weeks divide that by the hours you "
                        "watch a night and by the number of nights in a week.",
        "reading": "Six seasons of ten episodes at 50 minutes is 60 episodes, 50 hours, 25 "
                   "nights at two hours and five weeks at five nights a week.",
        "example_note": "A show with twenty episode seasons is twice as long for the same "
                        "number of seasons — which is why the episode count, not the season "
                        "count, is the figure to compare.",
        "pitfalls": [
            "<strong>Counting seasons instead of episodes.</strong> A British six-episode "
            "season and a US twenty-two episode season are not the same unit and are both "
            "called a season.",
            "<strong>Forgetting the pilot and finale.</strong> Premieres and finales often run "
            "long. On a sixty-episode series that is an hour or two the average hides.",
        ],
        "limits": [
            "<li><strong>No rewatching.</strong> The figure is one pass, and a show you have "
            "seen twice has cost twice. The arithmetic is honest about that even if the habit "
            "is not.</li>",
        ],
        "uses": [
            "<li>Deciding whether to start a long series before a holiday.</li>",
            "<li>Comparing the commitment of two recommendations.</li>",
        ],
        "scenarios": [
            {"inputs": {"seasons": 6, "episodes": 10, "minutes": 60, "hours_night": 2},
             "note": "At sixty minutes an episode the same series is 60 hours and 30 nights — "
                     "five more evenings for a ten-minute runtime difference."},
        ],
    },
    faq=[
        ("How long does it take to watch a typical series?",
         "A modern ten-episode drama is about 8 to 10 hours, which is four or five evenings. "
         "A network series with 22 episodes is 16 hours and a fortnight."),
        ("Should I use the runtime or the slot length?",
         "The runtime. A 50-minute episode in a one-hour slot is 50 minutes of show and ten of "
         "adverts, and the adverts are not the part you are choosing."),
        ("Does this include the recap?",
         "No. Recaps and titles are a minute or two an episode, which on sixty episodes is an "
         "hour — worth knowing, not worth modelling."),
    ],
    related=[("/everyday-life/binge-watching", "Binge-watching"),
             ("/everyday-life/star-wars-marathon", "Film marathon"),
             ("/everyday-life/tv-alternatives", "TV alternatives")],
    checks=[
        ({"seasons": 6, "episodes": 10, "minutes": 50, "hours_night": 2},
         {"total_episodes": 60, "total_hours": 50, "nights": 25, "weeks": 5}, 0.01),
        ({"seasons": 6, "episodes": 10, "minutes": 60, "hours_night": 2},
         {"total_hours": 60, "nights": 30, "weeks": 6}, 0.01),
    ],
))

# ----------------------------------------------------------- binge-watching

SPECS.append(S(
    slug="binge-watching",
    name="Binge-Watching Calculator",
    title="Binge-Watching — Episodes a Night and When It Ends",
    desc="A season, a nightly episode count and a runtime: hours a night, nights to the end, "
         "and what the whole sitting costs in weeks of evenings.",
    what="How long a nightly sitting runs, how many nights a season takes at that pace, and "
         "what the whole run costs in weeks of evenings.",
    fields=[
        F("episodes", "Episodes in the season", "episodes", 24),
        F("minutes", "Episode runtime", "min", 42),
        F("per_night", "Episodes a night", "episodes", 4),
        F("nights_week", "Nights a week", "nights", 5),
    ],
    results=[
        R("hours_night", "Sitting length", "h"),
        R("hours_total", "Total viewing", "h"),
        R("nights", "Nights to finish", "nights"),
        R("weeks", "Calendar weeks", "weeks"),
    ],
    formula={
        "hours_night": "per_night * minutes / 60",
        "hours_total": "episodes * minutes / 60",
        "nights": "episodes / per_night",
        "weeks": "episodes / per_night / nights_week",
    },
    prose={
        "why": "<p>Four episodes of forty-two minutes is two hours and forty-eight minutes, not "
               "\"a couple of episodes\". Twenty-four of them at that pace is six nights, or "
               "just over a week if you watch five nights out of seven.</p>"
               "<p>The sitting length is the number worth seeing. The decision is made one "
               "episode at a time and the cost is paid in whole evenings, and those two facts "
               "do not meet unless somebody multiplies them.</p>",
        "formula_note": "Episodes a night times the runtime gives the sitting; the season is "
                        "the episode count times the runtime. Nights are episodes over the "
                        "nightly count, and weeks divide that by the nights you watch.",
        "reading": "Four episodes of 42 minutes is 2.8 hours a night. The 24-episode season is "
                   "16.8 hours, six nights, and 1.2 weeks at five nights a week.",
        "example_note": "Two episodes a night is 1.4 hours and twelve nights — the same season, "
                        "and twice the calendar time. Autoplay is what moves the first number.",
        "pitfalls": [
            "<strong>Believing \"one more\".</strong> The average adult episode is 42 minutes, "
            "and \"one more\" three times is two hours. At the level of a season, autoplay is "
            "the whole difference between a fortnight and a weekend.",
            "<strong>Comparing a 24-episode season with a 6-episode one.</strong> Both are a "
            "season. The hours are the only comparable figure.",
        ],
        "limits": [
            "<li><strong>No adverts, no credits.</strong> A streaming runtime is clean; a "
            "broadcast episode with adverts is twelve minutes longer and the arithmetic "
            "changes by a fifth.</li>",
        ],
        "uses": [
            "<li>Deciding whether to start a season at ten at night.</li>",
            "<li>Working out what a weekly watching habit costs in a year.</li>",
        ],
        "scenarios": [
            {"inputs": {"episodes": 24, "minutes": 42, "per_night": 2, "nights_week": 5},
             "note": "Two episodes a night is 1.4 hours, twelve nights and 2.4 weeks — the same "
                     "season spread over twice the calendar."},
        ],
    },
    faq=[
        ("How long is a binge-watch?",
         "A whole season in one sitting is typically 8 to 10 hours, which is most of a day. "
         "People usually mean three or four episodes, which is two to three hours."),
        ("Does autoplay make a difference?",
         "To the calendar, everything. The sitting starts at one episode and the next begins "
         "before anybody decides. Turning it off is the only control that works."),
        ("Is watching four episodes a night a lot?",
         "It is two and a half hours of a four-hour evening, every night. The page exists to "
         "make that visible rather than to judge it."),
    ],
    related=[("/everyday-life/tv-series-duration", "Series duration"),
             ("/everyday-life/star-wars-marathon", "Film marathon"),
             ("/everyday-life/tv-alternatives", "TV alternatives")],
    checks=[
        ({"episodes": 24, "minutes": 42, "per_night": 4, "nights_week": 5},
         {"hours_night": 2.8, "hours_total": 16.8, "nights": 6, "weeks": 1.2}, 0.01),
        ({"episodes": 24, "minutes": 42, "per_night": 2, "nights_week": 5},
         {"hours_night": 1.4, "nights": 12, "weeks": 2.4}, 0.01),
    ],
))

# ------------------------------------------------------- film marathon

SPECS.append(S(
    slug="star-wars-marathon",
    name="Film Marathon Calculator",
    title="Film Marathon — Every Film, Breaks and Bedtime",
    desc="Eleven films at about two hours twenty each is nearly 27 hours with breaks: the "
         "scale of a full marathon, in evenings and in days of continuous viewing.",
    what="The running time of a whole film series with breaks between the discs, the days of "
         "continuous viewing it represents, and the number of evenings it really takes.",
    fields=[
        F("films", "Films", "films", 11,
          help="Nine saga episodes plus two stand-alone films is eleven. Count only the ones "
               "you intend to watch."),
        F("minutes", "Average runtime", "min", 140),
        F("break_every", "A break every", "films", 3),
        F("break_len", "Length of the break", "min", 15),
    ],
    results=[
        R("hours", "Running time", "h"),
        R("breaks", "Breaks", "breaks"),
        R("total_hours", "With breaks", "h"),
        R("days", "Continuous days", "days"),
        R("evenings", "Evenings at 3 hours", "evenings"),
    ],
    formula={
        "hours": "films * minutes / 60",
        "breaks": "floor(films / break_every)",
        "total_hours": "films * minutes / 60 + floor(films / break_every) * break_len / 60",
        "days": "films * minutes / 60 / 24",
        "evenings": "(films * minutes / 60 + floor(films / break_every) * break_len / 60) / 3",
    },
    prose={
        "why": "<p>Eleven films at two hours twenty is 25.7 hours of film, and the breaks "
               "between them add another 45 minutes, because a marathon is three films and a "
               "cup of tea rather than one continuous screening.</p>"
               "<p>Just over 26 hours is a day and a bit of continuous viewing, or nine "
               "evenings of three hours. The marathon is not one night; it is a week of nights "
               "and a weekend.</p>",
        "formula_note": "Films times runtime gives the running time. The break count is the "
                        "films divided by the interval and rounded down, so three breaks for "
                        "eleven films at every three. Everything else is that total divided by "
                        "24 or by three.",
        "reading": "Eleven films of 140 minutes is 25.67 hours, plus three breaks of fifteen "
                   "minutes: 26.42 hours, one and a tenth days, or 8.8 evenings of three hours.",
        "example_note": "Nine films is 21 hours and 21.75 with breaks — the difference between "
                        "a weekend and a week, which is why the stand-alone films get left out "
                        "of most marathons.",
        "pitfalls": [
            "<strong>Using the shortest runtime.</strong> Film lengths in a series run from 105 "
            "to 160 minutes. Averaging the actual runtimes is closer than picking one.",
            "<strong>Forgetting that the credits count.</strong> Eight minutes of credits "
            "eleven times is an hour and a half, and nobody watches them.",
        ],
        "limits": [
            "<li><strong>Films only.</strong> Series, animated spin-offs and a documentary "
            "would each add their own hours if you count them, and the count is a choice.</li>",
        ],
        "uses": [
            "<li>Planning a marathon weekend with friends.</li>",
            "<li>Deciding whether the whole series is a week or a month.</li>",
        ],
        "scenarios": [
            {"inputs": {"films": 9, "minutes": 140, "break_every": 3, "break_len": 15},
             "note": "Nine films is 21 hours and 21.75 with breaks, 7.25 evenings — three "
                     "fewer than the eleven-film count."},
        ],
    },
    faq=[
        ("How long is the full Star Wars marathon?",
         "The nine saga films are about 21 hours of running time; the two stand-alone films "
         "add another 4.5. With breaks, the eleven-film version is a little over 26 hours."),
        ("Should I watch in release order or chronological order?",
         "Release order for a first viewing, because the films were made to reveal things in "
         "that sequence. The order does not change the running time."),
        ("How many days does a marathon take?",
         "At three hours an evening, nine nights. One continuous sitting is a day and a bit, "
         "and most people find the fourth film is where the plan fails."),
    ],
    related=[("/everyday-life/tv-series-duration", "Series duration"),
             ("/everyday-life/binge-watching", "Binge-watching"),
             ("/everyday-life/tv-alternatives", "TV alternatives")],
    checks=[
        ({"films": 11, "minutes": 140, "break_every": 3, "break_len": 15},
         {"hours": 25.6667, "breaks": 3, "total_hours": 26.4167, "days": 1.0694,
          "evenings": 8.8056}, 0.01),
        ({"films": 9, "minutes": 140, "break_every": 3, "break_len": 15},
         {"hours": 21, "breaks": 3, "total_hours": 21.75, "days": 0.875,
          "evenings": 7.25}, 0.01),
    ],
))
# ---------------------------------------------------------- thirty-minute blocks

SPECS.append(S(
    slug="30-min",
    name="30 Minute Blocks Calculator",
    title="30 Minute Blocks — How Many Fit in a Day and a Year",
    desc="Time in half-hour chunks: how many blocks a working day holds, how many a week, and "
         "what the same habit is worth over a year of them.",
    what="The number of thirty-minute blocks in a day, a week and a year of a given schedule, "
         "which is how a plan in half hours is actually costed.",
    fields=[
        F("hours_day", "Hours a day", "h", 6),
        F("block_min", "Block length", "min", 30),
        F("days_week", "Days a week", "days", 5),
    ],
    results=[
        R("blocks_day", "Blocks a day", "blocks"),
        R("blocks_week", "Blocks a week", "blocks"),
        R("hours_year", "Hours a year", "h"),
        R("days_year", "Whole days a year", "days"),
    ],
    formula={
        "blocks_day": "hours_day * 60 / block_min",
        "blocks_week": "hours_day * 60 / block_min * days_week",
        "hours_year": "hours_day * days_week * 52",
        "days_year": "hours_day * days_week * 52 / 24",
    },
    prose={
        "why": "<p>Half hours are how people plan and corners are how they live. Six hours a "
               "day is twelve blocks of thirty minutes, sixty blocks in a five-day week and "
               "1 560 hours in a year — sixty-five whole days.</p>"
               "<p>The block count is the useful part of this: a plan that says \"two hours of "
               "study\" is four blocks, and four blocks is a thing you can see in a calendar "
               "rather than a thing you hope for after dinner.</p>",
        "formula_note": "Hours times sixty over the block length gives blocks; the year is "
                        "hours a day times days a week times 52, and the day count divides the "
                        "year by 24.",
        "reading": "Six hours a day in half-hour blocks is twelve blocks a day, sixty a week, "
                   "1 560 hours a year and sixty-five whole days.",
        "example_note": "Drop to four hours a day and the year is 1 040 hours — still forty-"
                        "three days, which is most of a working month of attention spent on "
                        "one thing.",
        "pitfalls": [
            "<strong>Planning in hours and living in blocks.</strong> A two-hour task does not "
            "fit a gap of an hour and forty minutes, and four blocks that do fit are worth more "
            "than a perfect two-hour plan that never starts.",
            "<strong>Counting a whole year of a new habit.</strong> Fifty-two weeks assumes no "
            "holidays, no illness and no forgotten Sundays. Multiply by 48 for a realistic "
            "figure.",
        ],
        "limits": [
            "<li><strong>Fixed blocks.</strong> Some work does not divide into half hours — a "
            "meeting that overruns takes the block after it. This page counts capacity, not "
            "adherence.</li>",
        ],
        "uses": [
            "<li>Turning a study plan into blocks you can put in a calendar.</li>",
            "<li>Checking whether a weekly commitment fits the time you actually have.</li>",
        ],
        "scenarios": [
            {"inputs": {"hours_day": 4, "block_min": 30, "days_week": 5},
             "note": "Four hours a day is eight blocks, forty a week and 1 040 hours a year — "
                     "forty-three days rather than sixty-five."},
        ],
    },
    faq=[
        ("Why thirty minutes rather than an hour?",
         "Because half an hour is short enough to start on a bad day and long enough to finish "
         "something. An hour is the unit of optimism; half an hour is the unit of habit."),
        ("How many blocks are in a working week?",
         "A forty-hour week is eighty blocks of thirty minutes. Most calendars hold fewer "
         "because meetings and travel do not respect the grid."),
        ("Does the year figure include weekends?",
         "Only if the days-a-week field says seven. At five days the answer is a working-year "
         "figure, which is the honest one for anything tied to a schedule."),
    ],
    related=[("/everyday-life/every-second", "Every second"),
             ("/everyday-life/tv-alternatives", "TV alternatives"),
             ("/everyday-life/podcasts", "Podcast time")],
    checks=[
        ({"hours_day": 6, "block_min": 30, "days_week": 5},
         {"blocks_day": 12, "blocks_week": 60, "hours_year": 1560, "days_year": 65}, 0.01),
        ({"hours_day": 4, "block_min": 30, "days_week": 5},
         {"blocks_day": 8, "blocks_week": 40, "hours_year": 1040, "days_year": 43.3333}, 0.01),
    ],
))

# ------------------------------------------------------------- every second

SPECS.append(S(
    slug="every-second",
    name="Every Second Calculator",
    title="Every Second — What a Rate per Second Becomes",
    desc="One thing a second is 3 600 an hour and 7.5 million in a working year. This page "
         "multiplies any rate per second out to a working day, a month and a year.",
    what="A rate per second multiplied out to a minute, an hour, a working day, a month and a "
         "year, so a small-sounding figure can be judged at the size it actually reaches.",
    fields=[
        F("rate", "Rate per second", "per s", 1),
        F("hours_day", "Hours a day", "h", 8),
    ],
    results=[
        R("per_minute", "Per minute", "units"),
        R("per_hour", "Per hour", "units"),
        R("per_day", "Per working day", "units"),
        R("per_month", "Per month", "units"),
        R("per_year", "Per working year", "units"),
    ],
    formula={
        "per_minute": "rate * 60",
        "per_hour": "rate * 3600",
        "per_day": "rate * 3600 * hours_day",
        "per_month": "rate * 3600 * hours_day * 21.7",
        "per_year": "rate * 3600 * hours_day * 260",
    },
    prose={
        "why": "<p>A second is the unit that hides scale. A cent a second sounds like nothing "
               "and is 36 an hour — a wage. One click a second is 28 800 in an eight-hour day "
               "and 7.5 million in a working year of 260 days.</p>"
               "<p>The page multiplies by the number of seconds in an hour, a working day, an "
               "average working month of 21.7 days and a working year of 260, which are the "
               "figures payroll and performance work in.</p>",
        "formula_note": "The rate times sixty, then 3 600 for an hour. The day multiplies by the "
                        "hours worked; the month uses 21.7 working days and the year 260, which "
                        "are the averages of a five-day week with public holidays removed.",
        "reading": "One unit a second for eight hours a day is 60 a minute, 3 600 an hour, "
                   "28 800 a day, 624 960 a month and 7 488 000 in a working year.",
        "example_note": "A cent a second is 28.80 an hour and 59 904 a year in the same eight-"
                    "hour day, which is a job rather than a rounding error.",
        "pitfalls": [
            "<strong>Scaling a second to a year with 365 days.</strong> Nobody works every day. "
            "The 260-day year is the one that matches a salary, and using 365 flatters the "
            "figure by forty per cent.",
            "<strong>Assuming the rate holds.</strong> A rate per second is an average. A "
            "traffic figure that peaks at 1 000 a second does not average 1 000, and the page "
            "is for averages.",
        ],
        "limits": [
            "<li><strong>One rate, no ramp.</strong> Startup, teardown and the hour after lunch "
            "are not modelled. The figure is a capacity, not a guarantee.</li>",
        ],
        "uses": [
            "<li>Judging a per-second billing rate against a salary.</li>",
            "<li>Turning a impressive-sounding throughput into a day's work.</li>",
        ],
        "scenarios": [
            {"inputs": {"rate": 0.01, "hours_day": 8},
             "note": "A cent a second is 28.80 an hour and 59 904 a working year — the same "
                     "order as a salary, which is exactly the trap."},
        ],
    },
    faq=[
        ("How many seconds are in a working year?",
         "7.5 million at eight hours a day over 260 days. A calendar year of 365 days is 31.5 "
         "million, and the difference is the point of the page."),
        ("Why 21.7 days in a month?",
         "Because 260 working days divided by twelve is 21.67. A month with 22 working days is "
         "the ordinary case and the average is what a yearly figure divides by."),
        ("What if the rate is a fraction of a unit?",
         "Type it as a decimal. A cent a second is 0.01 in the rate box, and every answer "
         "comes out in the same unit you typed."),
    ],
    related=[("/everyday-life/30-min", "30-minute blocks"),
             ("/everyday-life/cost-per-minute", "Cost per minute"),
             ("/everyday-life/tv-alternatives", "TV alternatives")],
    checks=[
        ({"rate": 1, "hours_day": 8},
         {"per_minute": 60, "per_hour": 3600, "per_day": 28800, "per_month": 624960,
          "per_year": 7488000}, 0.01),
        ({"rate": 0.01, "hours_day": 8},
         {"per_hour": 36, "per_day": 288, "per_month": 6249.6, "per_year": 74880}, 0.01),
    ],
))

# ------------------------------------------------------------ tv alternatives

SPECS.append(S(
    slug="tv-alternatives",
    name="TV Alternatives Calculator",
    title="TV Alternatives — What Three Hours a Night Buys",
    desc="Three hours of television a night is 45 days a year. This page turns the habit into "
         "books, working weeks and whole days, without telling you what to do about it.",
    what="The hours a television habit takes in a year, and the same hours stated as books at "
         "an average length, as forty-hour working weeks, and as whole days.",
    fields=[
        F("hours_day", "Television a day", "h", 3),
        F("days_week", "Days a week", "days", 7),
        F("hours_book", "Hours for one book", "h", 8),
        F("hours_week_work", "Length of a working week", "h", 40),
    ],
    results=[
        R("hours_year", "Hours a year", "h"),
        R("days", "Whole days", "days"),
        R("books", "Books not read", "books"),
        R("working_weeks", "Working weeks", "weeks"),
    ],
    formula={
        "hours_year": "hours_day * days_week * 52",
        "days": "hours_day * days_week * 52 / 24",
        "books": "hours_day * days_week * 52 / hours_book",
        "working_weeks": "hours_day * days_week * 52 / hours_week_work",
    },
    prose={
        "why": "<p>Three hours a night is not an outrageous amount and it is 1 092 hours a "
               "year: forty-five and a half whole days, 136 books at eight hours each, or "
               "twenty-seven working weeks.</p>"
               "<p>Those four figures are the same number in different units, and the page "
               "does not rank them. Television is rest for a lot of people and the eight-hour "
               "book is not the only alternative; the point is that the choice is being made "
               "every night without the arithmetic attached.</p>",
        "formula_note": "Hours a day times days a week times 52 gives the year. Dividing by 24 "
                        "gives whole days, by the length of a book gives books, and by the "
                        "working week gives the weeks of work it equals.",
        "reading": "Three hours a night, seven nights a week, is 1 092 hours: 45.5 days, 136.5 "
                   "books and 27.3 working weeks.",
        "example_note": "Two hours a night is 728 hours — 30 days and 91 books. Half an hour "
                        "less a night is fifteen whole days a year.",
        "pitfalls": [
            "<strong>Treating the figure as a target.</strong> The hours are not spare capacity "
            "waiting to be used productively; some of them are how people recover from a day "
            "that is already full.",
            "<strong>Assuming every hour is displaced.</strong> Watching while cooking or "
            "ironing is not three hours of lost time, and a fair comparison would account for "
            "the overlap.",
        ],
        "limits": [
            "<li><strong>One habit, one year.</strong> Seasonality is real — winter viewing is "
            "double summer in most households — and the average hides it.</li>",
        ],
        "uses": [
            "<li>Deciding whether to cancel a subscription that fills the habit.</li>",
            "<li>Comparing a nightly routine with a different one on the same hours.</li>",
        ],
        "scenarios": [
            {"inputs": {"hours_day": 2, "days_week": 7, "hours_book": 8, "hours_week_work": 40},
             "note": "Two hours a night is 728 hours, 30.3 days, 91 books and 18.2 working "
                     "weeks — fifteen days less than the three-hour habit."},
        ],
    },
    faq=[
        ("Is three hours a night normal?",
         "It is close to the average for adults in countries that measure it, and averages "
         "hide a lot: many people watch one hour and a minority watch six."),
        ("Is reading really the alternative?",
         "For some people, and not as a moral claim. The page uses a book because it is a unit "
         "everyone recognises, in the same way a salary is quoted per year."),
        ("Why 52 weeks rather than 48?",
         "Because a habit with a holiday in it is still a habit for most of the year. Use the "
         "days-a-week field down to five if weekends genuinely look different."),
    ],
    related=[("/everyday-life/binge-watching", "Binge-watching"),
             ("/everyday-life/podcasts", "Podcast time"),
             ("/everyday-life/30-min", "30-minute blocks")],
    checks=[
        ({"hours_day": 3, "days_week": 7, "hours_book": 8, "hours_week_work": 40},
         {"hours_year": 1092, "days": 45.5, "books": 136.5, "working_weeks": 27.3}, 0.01),
        ({"hours_day": 2, "days_week": 7, "hours_book": 8, "hours_week_work": 40},
         {"hours_year": 728, "days": 30.3333, "books": 91, "working_weeks": 18.2}, 0.01),
    ],
))

# ----------------------------------------------------- toilet paper tariff

SPECS.append(S(
    slug="toilet-paper-tariff",
    name="Toilet Paper Price Calculator",
    title="Toilet Paper Price — Cost per 100 Sheets",
    desc="Two packs, two roll counts and two sheet counts reduced to one number: the cost of "
         "a hundred sheets, which is the only comparison the shelf label never gives.",
    what="The cost of a hundred sheets in each of two packs, the difference, and the percentage "
         "the dearer pack costs more, once rolls and sheets are multiplied out.",
    fields=[
        F("price_a", "Pack A price", "$", 8.99),
        F("rolls_a", "Pack A rolls", "rolls", 12),
        F("sheets_a", "Sheets a roll", "sheets", 200),
        F("price_b", "Pack B price", "$", 6.49),
        F("rolls_b", "Pack B rolls", "rolls", 12),
        F("sheets_b", "Sheets a roll", "sheets", 150),
    ],
    results=[
        R("sheets_total_a", "Pack A sheets", "sheets"),
        R("sheets_total_b", "Pack B sheets", "sheets"),
        R("per100_a", "Pack A, per 100 sheets", "$"),
        R("per100_b", "Pack B, per 100 sheets", "$"),
        R("diff", "A costs more, per 100", "$"),
        R("pct", "A is dearer", "%"),
    ],
    formula={
        "sheets_total_a": "rolls_a * sheets_a",
        "sheets_total_b": "rolls_b * sheets_b",
        "per100_a": "price_a / (rolls_a * sheets_a) * 100",
        "per100_b": "price_b / (rolls_b * sheets_b) * 100",
        "diff": "price_a / (rolls_a * sheets_a) * 100 - price_b / (rolls_b * sheets_b) * 100",
        "pct": "(price_a / (rolls_a * sheets_a) - price_b / (rolls_b * sheets_b)) / "
               "(price_a / (rolls_a * sheets_a)) * 100",
    },
    prose={
        "why": "<p>Toilet paper is sold by the pack and used by the sheet, and the two pack "
               "sizes on a shelf are almost never the same in both. Twelve rolls of two hundred "
               "sheets is 2 400; twelve rolls of a hundred and fifty is 1 800 — a quarter less "
               "paper in an identical-looking pack.</p>"
               "<p>Cost per hundred sheets is 37.5 cents against 36.1, so the pack that looks "
               "the same and costs 2.50 more is only four per cent dearer rather than "
               "thirty-nine. That is the comparison the label avoids.</p>",
        "formula_note": "Rolls times sheets gives the paper in a pack; the price over that, "
                        "times a hundred, gives the unit price. The percentage is the "
                        "difference over A's own unit price, so it reads as how much dearer A "
                        "is than B.",
        "reading": "12 rolls of 200 is 2 400 sheets for 8.99, which is 37.5 cents a hundred. 12 "
                   "rolls of 150 is 1 800 sheets for 6.49, which is 36.1 cents — so the dearer "
                   "pack is only 3.7 per cent dearer per sheet.",
        "example_note": "The roll count is the marketing and the sheet count is the product. A "
                    "pack of \"double rolls\" with the same total sheets is a repackaging, not "
                    "a saving.",
        "pitfalls": [
            "<strong>Comparing by roll count.</strong> A jumbo roll can hold twice the sheets "
            "of a standard one, and two packs of twelve can differ by 600 sheets.",
            "<strong>Ignoring the sheet size.</strong> A sheet is about 10 by 10 centimetres "
            "and the plies differ. Two hundred large three-ply sheets and two hundred small "
            "two-ply ones are not the same paper.",
        ],
        "limits": [
            "<li><strong>Count, not quality.</strong> Sheets differ in size, ply and strength, "
            "and the arithmetic cannot see any of it. It answers the pack question, not the "
            "product question.</li>",
        ],
        "uses": [
            "<li>Choosing between two packs on the same shelf.</li>",
            "<li>Checking whether a bulk pack is a discount or a repackaging.</li>",
        ],
        "scenarios": [
            {"inputs": {"price_a": 8.99, "rolls_a": 12, "sheets_a": 200, "price_b": 5.99,
                        "rolls_b": 12, "sheets_b": 150},
             "note": "At 5.99 the smaller pack is 33.3 cents a hundred, so the difference "
                     "widens to 4.2 cents and A is eleven per cent dearer."},
        ],
    },
    faq=[
        ("What is a good price per 100 sheets?",
         "Around 30 to 45 cents in a US supermarket at ordinary prices and under 30 on a good "
         "promotion. The absolute number moves with the brand more than with the maths."),
        ("Do double rolls count as two rolls?",
         "No. A double roll is a longer roll, and the pack still says twelve. Only the sheet "
         "count per roll tells you what is inside."),
        ("Should I compare by weight?",
         "If the pack gives a weight, yes — it captures size and ply. Most packs do not, which "
         "is why the sheet count is the fallback."),
    ],
    related=[("/everyday-life/price-per-ounce", "Price per ounce"),
             ("/everyday-life/price-per-unit", "Price per unit"),
             ("/everyday-life/paper-thickness", "Paper thickness")],
    checks=[
        ({"price_a": 8.99, "rolls_a": 12, "sheets_a": 200, "price_b": 6.49, "rolls_b": 12,
          "sheets_b": 150},
         {"sheets_total_a": 2400, "sheets_total_b": 1800, "per100_a": 0.3746,
          "per100_b": 0.3606, "diff": 0.014, "pct": 3.7449}, 0.01),
        ({"price_a": 8.99, "rolls_a": 12, "sheets_a": 200, "price_b": 5.99, "rolls_b": 12,
          "sheets_b": 150},
         {"per100_b": 0.3328, "diff": 0.0418, "pct": 11.1612}, 0.01),
    ],
))
# --------------------------------------------------------------- roll length

SPECS.append(S(
    slug="roll-length",
    name="Roll Length Calculator",
    title="Roll Length — How Much Is Wound on the Roll",
    desc="Outer diameter, core diameter and thickness give the length wound on a roll: the "
         "spiral arithmetic behind tape, paper, fabric and cling film on a roll.",
    what="The length of material wound on a roll from its outer diameter, core diameter and "
         "thickness, with the number of turns and the same length in feet and yards.",
    fields=[
        F("outer_mm", "Outer diameter", "mm", 200),
        F("core_mm", "Core diameter", "mm", 40),
        F("thickness", "Material thickness", "mm", 0.3,
          help="A sheet of paper is about 0.1 mm, card 0.3, and tape on a roll is measured on "
               "the backing rather than the adhesive."),
    ],
    results=[
        R("turns", "Turns on the roll", "turns"),
        R("length_m", "Length", "m"),
        R("length_ft", "Length", "ft"),
        R("length_yd", "Length", "yd"),
    ],
    formula={
        "turns": "(outer_mm / 2 - core_mm / 2) / thickness",
        "length_m": "pi * ((outer_mm / 2) * (outer_mm / 2) - (core_mm / 2) * (core_mm / 2)) "
                    "/ thickness / 1000",
        "length_ft": "pi * ((outer_mm / 2) * (outer_mm / 2) - (core_mm / 2) * (core_mm / 2)) "
                     "/ thickness / 304.8",
        "length_yd": "pi * ((outer_mm / 2) * (outer_mm / 2) - (core_mm / 2) * (core_mm / 2)) "
                     "/ thickness / 914.4",
    },
    prose={
        "why": "<p>A roll is a spiral, and the length is the area of the annulus divided by the "
               "thickness. The outer radius squared minus the core radius squared, times π, over "
               "the thickness — which is exact if the material has no air in it.</p>"
               "<p>A 200-millimetre roll on a 40-millimetre core of 0.3-millimetre paper has a "
               "radius of 80 millimetres of winding, 267 turns, and 100.5 metres of paper. "
               "That is the figure the box does not give and the one you need to know whether "
               "you have enough.</p>",
        "formula_note": "Half the outer diameter minus half the core diameter, divided by the "
                        "thickness, gives the number of turns. The length is π times the "
                        "difference of the squared radii over the thickness, converted from "
                        "millimetres to metres, feet or yards.",
        "reading": "A 200 mm roll on a 40 mm core of 0.3 mm material has 266.7 turns and 100.53 "
                   "metres — 329.8 feet or 109.9 yards.",
        "example_note": "Halve the thickness and the roll holds twice the length, because the "
                        "same annulus is filled with twice as many turns. The diameter tells "
                        "you nothing without the thickness.",
        "pitfalls": [
            "<strong>Measuring the core from outside.</strong> The core's outside diameter is "
            "where the winding starts, which is what the formula wants; its inside diameter is "
            "the tube you can see through.",
            "<strong>Assuming the length varies with the diameter.</strong> Doubling the "
            "diameter quadruples the area, so a roll twice as thick across has four times the "
            "material minus the core. Length follows area, not diameter.",
        ],
        "limits": [
            "<li><strong>No air, no stretch.</strong> Fabric, foam and anything that compresses "
            "winds with air in it, and the real length is longer than the geometry says. Tape "
            "and paper come out close.</li>",
        ],
        "uses": [
            "<li>Estimating how much tape or paper is left on a partly used roll.</li>",
            "<li>Working out the length on a label roll before pricing a print job.</li>",
        ],
        "scenarios": [
            {"inputs": {"outer_mm": 200, "core_mm": 40, "thickness": 0.2},
             "note": "At 0.2 mm the same roll has 400 turns and 150.8 metres — half the "
                     "thickness, a third more length than 0.3 to 0.2 suggests, because the "
                     "arithmetic is a division."},
        ],
    },
    faq=[
        ("Why divide the area by the thickness?",
         "Because the material is a long rectangle of width times length rolled into a spiral. "
         "Seen end-on, that rectangle is the area of the annulus, and length is area over "
         "thickness."),
        ("Does the number of turns multiply the length?",
         "The average turn is the circumference at the mid-radius, so length is that times the "
         "turns. It gives the same answer as the area method and less elegantly."),
        ("Why is the answer wrong for cling film?",
         "Because the film stretches and traps air between layers. The geometry gives the "
         "volume of the roll, and the real length on it is thirty to fifty per cent more."),
    ],
    related=[("/everyday-life/paper-thickness", "Paper thickness"),
             ("/everyday-life/toilet-paper-tariff", "Toilet paper price"),
             ("/everyday-life/price-per-linear-foot", "Price per linear foot")],
    checks=[
        ({"outer_mm": 200, "core_mm": 40, "thickness": 0.3},
         {"turns": 266.6667, "length_m": 100.531, "length_ft": 329.8268,
          "length_yd": 109.9423}, 0.01),
        ({"outer_mm": 200, "core_mm": 40, "thickness": 0.2},
         {"turns": 400, "length_m": 150.7964, "length_ft": 494.7402}, 0.01),
    ],
))

# ----------------------------------------------------------- paper thickness

SPECS.append(S(
    slug="paper-thickness",
    name="Paper Thickness Calculator",
    title="Paper Thickness — Caliper from a Measured Stack",
    desc="A ream and a ruler give the caliper of one sheet: thickness in millimetres and thou, "
         "and how many sheets make an inch of stack.",
    what="The thickness of one sheet from the height of a measured stack, in millimetres and "
         "thousandths of an inch, and the number of sheets in an inch of the same paper.",
    fields=[
        F("sheets", "Sheets in the stack", "sheets", 500),
        F("stack_mm", "Height of the stack", "mm", 50),
    ],
    results=[
        R("per_mm", "One sheet", "mm"),
        R("per_in", "One sheet", "in"),
        R("thou", "One sheet", "thou"),
        R("sheets_inch", "Sheets an inch", "sheets"),
    ],
    formula={
        "per_mm": "stack_mm / sheets",
        "per_in": "stack_mm / sheets / 25.4",
        "thou": "stack_mm / sheets / 25.4 * 1000",
        "sheets_inch": "sheets / (stack_mm / 25.4)",
    },
    prose={
        "why": "<p>Paper is sold by weight and printed by feel, and the thickness is the number "
               "that decides whether a card goes through a printer. Five hundred sheets measuring "
               "fifty millimetres is 0.1 millimetres a sheet, or four thousandths of an inch.</p>"
               "<p>Caliper is measured on a stack precisely because one sheet is too thin to "
               "measure with a ruler, and the stack averages out the variation between sheets "
               "as well.</p>",
        "formula_note": "Stack height over sheet count gives one sheet. Dividing by 25.4 gives "
                        "inches, and multiplying that by a thousand gives thou, the "
                        "thousandths printers use. Sheets per inch is the sheet count over the "
                        "stack in inches.",
        "reading": "500 sheets at 50 mm is 0.1 mm a sheet, 0.00394 inches, 3.94 thou, and 254 "
                   "sheets to the inch.",
        "example_note": "A ream of 38 mm is 0.076 mm — 3 thou — which is ordinary copier paper. "
                    "Anything above 5 thou starts to need a printer with a straight paper path.",
        "pitfalls": [
            "<strong>Measuring one sheet.</strong> A ruler cannot resolve 0.1 mm, and the "
            "paper's own variation is larger than the error you are trying to avoid. Measure a "
            "hundred or more.",
            "<strong>Forgetting the compression.</strong> A stack pressed by a weight measures "
            "thinner than a loose one. Measure with the paper as it sits, and accept the "
            "variation.",
        ],
        "limits": [
            "<li><strong>Average thickness.</strong> A coated sheet is thicker than its base "
            "paper, and two papers of the same weight can differ by two thou. The stack is the "
            "honest measurement.</li>",
        ],
        "uses": [
            "<li>Deciding whether a card stock will feed through a printer.</li>",
            "<li>Working out how thick a bound document will be before ordering a cover.</li>",
        ],
        "scenarios": [
            {"inputs": {"sheets": 500, "stack_mm": 38},
             "note": "38 mm is 0.076 mm a sheet, 2.99 thou, and 334 sheets an inch — thinner "
                     "than ordinary copier paper and near the limit for a laser."},
        ],
    },
    faq=[
        ("What is a thou?",
         "A thousandth of an inch, 0.0254 mm. Paper is quoted in it because the printing "
         "industry's machines were built in inches and the habit survived."),
        ("How thick is normal printer paper?",
         "About 0.1 mm, or four thou, for 80 gsm. Card starts at 160 gsm and about 0.2 mm."),
        ("Does gsm tell me the thickness?",
         "Only roughly. Grams per square metre is weight, and a coated or bulky sheet is "
         "thicker for the same weight. The caliper has to be measured."),
    ],
    related=[("/everyday-life/roll-length", "Roll length"),
             ("/everyday-life/toilet-paper-tariff", "Toilet paper price"),
             ("/everyday-life/price-per-square-inch", "Price per square inch")],
    checks=[
        ({"sheets": 500, "stack_mm": 50},
         {"per_mm": 0.1, "per_in": 0.003937, "thou": 3.937, "sheets_inch": 254}, 0.01),
        ({"sheets": 500, "stack_mm": 38},
         {"per_mm": 0.076, "per_in": 0.0029921, "thou": 2.9921,
          "sheets_inch": 334.2105}, 0.01),
    ],
))
