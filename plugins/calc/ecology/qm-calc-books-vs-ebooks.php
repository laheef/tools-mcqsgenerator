<?php

/**
 * Books vs E-books Calculator
 * /ecology/books-vs-ebooks
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Books vs E-books Calculator',
    'meta' => ['title' => 'Books vs E-books Calculator: Reading Carbon Footprint', 'description' => 'Compare a year of printed books with the same reading on an e-reader, and find how many books a year it takes before the device repays its own carbon.', 'h1' => 'Books vs E-books Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'Your reading year',
            'fields' => [
                [
                    'name' => 'books_per_year',
                    'label' => 'Books read per year',
                    'type' => 'number',
                    'default' => '12',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                    'help' => 'Novels, manuals, cookbooks: anything you would otherwise buy in print.',
                ],
                [
                    'name' => 'book_co2',
                    'label' => 'Carbon per printed book',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'default' => '2.7',
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Paper, printing and distribution for a typical paperback.',
                ],
                [
                    'name' => 'reader_co2',
                    'label' => 'Carbon to make the e-reader',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'default' => '120',
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'reader_years',
                    'label' => 'Years the e-reader lasts',
                    'type' => 'number',
                    'default' => '4',
                    'rounding' => ['omni', '0.5'],
                    'min' => '0.5',
                    'help' => 'Manufacturer life is optimistic; a working life of four years is typical.',
                ],
            ],
        ],
        [
            'title' => 'The comparison',
            'fields' => [
                [
                    'name' => 'paper_co2',
                    'label' => 'Print, per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'reader_co2_year',
                    'label' => 'E-reader, per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'The device\'s manufacturing carbon spread across its working life.',
                ],
                [
                    'name' => 'saving',
                    'label' => 'Carbon saved by reading digitally',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'breakeven_books',
                    'label' => 'Books per year to break even',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Read fewer than this and the printed books carry the lighter footprint.',
                ],
                [
                    'name' => 'tree_years',
                    'label' => 'Tree-years of absorption',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'A mature tree takes up roughly 25 kg of CO₂ in a year.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'One year of each',
            'results' => ['paper_co2' => 'books_per_year * book_co2', 'reader_co2_year' => 'reader_co2 / reader_years'],
        ],
        [
            'title' => 'The gap, and the point where it closes',
            'results' => ['saving' => 'paper_co2 - reader_co2_year', 'breakeven_books' => 'reader_co2 / reader_years / book_co2', 'tree_years' => 'paper_co2 / 25'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Twelve printed books a year carry about 32.4 kilograms of carbon dioxide equivalent; the same twelve read on an e-reader carry 30 kilograms, because the device's 120 kilograms of manufacturing carbon is spread across four years. That leaves a 2.4-kilogram saving — thin enough that the answer flips if you read five books instead of twelve. The break-even sits at 11.11 books a year, and that single number is the most useful thing the page prints.</p>
        TXT,
        'sections' => [
            ['title' => 'What this comparison includes and what it leaves out', 'html' => <<<'TXT'
            <p>Two supply chains face each other here. On the print side: pulp, papermaking, printing, binding and delivery to a shop or a doorstep. On the digital side: mining and refining the metals, fabricating the display and the circuit board, assembling the device, shipping it, and then the electricity to charge it for years.</p><p>Deliberately left out: the building the bookshop stands in, the returns that get pulped, the server that delivers the file, and whatever device you already own. Those omissions matter differently in each case. Digital delivery is small — a few hundred watt-hours for a whole library — so leaving it out changes little. Reading on a phone you already own changes everything, and the page has no box for it.</p><p>The comparison also assumes one reader and one device. A household that shares an e-reader divides the 120 kilograms between everybody, and a household that passes paperbacks around does something similar with the print total.</p>
            TXT],
            ['title' => 'The print side of the ledger', 'html' => <<<'TXT'
            <p>A paperback weighs about 300 grams, and paper carries roughly one kilogram of CO₂ per kilogram produced when the mill runs on a mixed grid. Add printing, ink, binding and a road journey, and a single copy lands near 2.7 kilograms — the figure the form opens with. Hardbacks with heavier stock and shorter print runs can pass four.</p><p>Publishers have squeezed this. Recycled stock, lighter paper, printing closer to the market and avoiding air freight all move the number, and a book printed on renewable-powered presses can come in under 1.5 kilograms. The variation is real, so treat 2.7 as a middle rather than a law.</p><p>What print does not spend is electricity per read. A book read twice amortises its carbon over two readers, and a library copy over dozens. That is why the printed word keeps winning in the low-volume cases: the carbon is paid once, at the press.</p>
            TXT],
            ['title' => 'The device side, spread thin', 'html' => <<<'TXT'
            <p>An e-reader of the six-inch kind costs around 120 kilograms of CO₂ equivalent to make. The e-ink panel, the aluminium or plastic shell, the battery and the handful of chips each bring a share, and most of it is spent before the first book is opened. Charging it adds almost nothing: a month of reading uses less electricity than a single hot shower's worth of gas.</p><p>So the device is a fixed cost that has to be divided by use. At four years of life the annual share is 30 kilograms. At two years it is 60. At eight it is 15. Nothing in the manufacture changes; only the divisor does, which is why the durability question is really a carbon question.</p><p>Manufacturers quote battery life and storage rather than working life. In practice these devices last well, and a five- or six-year life is common when the battery is replaceable. The form has a box for it; use your own experience rather than the marketing number.</p>
            TXT],
            ['title' => 'Twelve books a year, worked through', 'html' => <<<'TXT'
            <p>Print: 12 books at 2.7 kilograms each is 32.4 kilograms. Device: 120 kilograms divided by four years is 30 kilograms a year. The gap is 2.4 kilograms, which is about the carbon of a ten-kilometre drive — real, and small enough to be inside the error bars of both estimates.</p><p>Break-even uses the same two numbers the other way up: 120 kilograms divided by four years and then by 2.7 kilograms per book gives 11.11 books a year. Read more than eleven and the device's carbon is paid back; read fewer and it never is. The tree box, 32.4 divided by 25, reads 1.3 tree-years, which is what it would take one mature tree a year and a bit to absorb.</p><p>A heavy reader changes the picture quickly. Thirty books a year is 81 kilograms of print against the same 30 for the device: a 51-kilogram saving, or 1,530 kilograms across a decade. A light reader at four books a year spends 10.8 kilograms on print and 30 on the device, and the printed book wins by 19.2.</p>
            TXT],
            ['title' => 'Why the break-even is the number to keep', 'html' => <<<'TXT'
            <p>Any single answer here rests on two soft figures — the carbon per book and the carbon per device — and both vary by a factor of two depending on who measured them. The break-even holds up better, because it is a ratio of the same two quantities: if both are underestimated by the same factor, the answer does not move.</p><p>That makes it a decision rule rather than a forecast. If you already read more than a dozen books a year, a dedicated e-reader pays back its manufacture within its life. If you read four, it does not, and no amount of careful accounting rescues it — you would be buying 120 kilograms of hardware to avoid 11.</p><p>The rule also tells you what to do with an unwanted device. Giving it to a heavy reader splits the fixed cost the right way; leaving it in a drawer keeps the whole 120 kilograms attached to nothing at all.</p>
            TXT],
            ['title' => 'Where digital wins outright', 'html' => <<<'TXT'
            <p>Newspapers and magazines are the clearest case. A daily paper runs to several hundred kilograms a year in paper alone, and a subscription on a device you already own costs close to nothing beyond the file transfer. Reference works behave the same way: nobody needs a printed encyclopaedia to look up one date.</p><p>Then there is the device you already have. Reading an e-book on a phone or tablet bought for other reasons has a marginal carbon cost near zero, because the manufacturing carbon was going to be spent anyway. The page cannot express that — its 120-kilogram box assumes a device bought for reading — so if that is your situation, set the device carbon to zero and read the print total as the answer.</p><p>Long-distance and small-market books also favour digital. A title that would be flown to a reader in a small market carries a distribution carbon out of all proportion to its text.</p>
            TXT],
            ['title' => 'Where print holds its ground', 'html' => <<<'TXT'
            <p>Light readers, libraries and second-hand copies. A library book divides its carbon across every borrower, and a second-hand copy divides it again by taking the manufacture out of the new-book market entirely. Ten borrowed books a year cost you nothing carbon-wise; they cost the library a share of a purchase it would have made anyway.</p><p>Durability matters too. A cloth-bound book read for decades and then passed on can beat any device on carbon per reading hour, because its manufacture never repeats. The e-reader's advantage comes from volume, not from longevity.</p><p>And print has no upgrade cycle. A paperback from 1995 works as well as it did then, whereas a device with a failed battery and no replacement parts becomes electronic waste with 120 kilograms of carbon already spent on it.</p>
            TXT],
            ['title' => 'Three readers, three different answers', 'html' => <<<'TXT'
            <p>Take three people in the same street. The first reads four books a year, all borrowed from a library. The second reads a dozen and buys them. The third reads thirty, half of them new.</p><p>The borrower's marginal carbon is near zero, and a device would be a large step backwards: 30 kilograms a year to avoid nothing at all. The twelve-book buyer sits at the break-even, where the two options are so close that the honest answer is that it does not matter. The thirty-book reader is where the e-reader earns its keep, saving roughly 51 kilograms a year.</p><p>Notice that reading volume is doing all the work and device carbon is doing very little. That is the general shape of consumption comparisons: the habit dominates, the hardware is a constant. Change the habit and the answer moves; change the hardware and it barely does.</p><p>It follows that the useful question is not which format is greener. It is whether your reading volume clears the break-even, and if it does, how long you will keep the device you are about to buy.</p>
            TXT],
            ['title' => 'What the paper industry has already changed', 'html' => <<<'TXT'
            <p>Papermaking is energy-intensive and has been getting cleaner for thirty years. Mills burn bark and black liquor from their own pulping process, which makes a well-run paper mill close to self-sufficient in heat and power. In countries where the grid is low-carbon and the fibre is certified, a book's carbon can fall by half against the 2.7-kilogram default.</p><p>Recycling helps less than people expect, because a recycled fibre loop still needs energy to repulp and dry. It saves the tree, not the kilowatt-hour. The bigger levers are lighter paper, shorter supply chains and printing closer to the reader, which is why a book printed in the same country it is sold beats one that crossed an ocean by air.</p><p>None of this makes print the low-carbon option at high volume. It does mean that the print figure on the form is a range, and that a reader buying recycled, locally printed editions should move the carbon-per-book box down rather than leave it.
            TXT],
            ['title' => 'The arithmetic, rearranged', 'html' => <<<'TXT'
            <p>Four quantities, one comparison, so the page answers the reverse questions too. Each row below uses only numbers from the form.</p><ul><li><strong>Print, per year</strong> = books × carbon per book</li><li><strong>Device, per year</strong> = device carbon ÷ years of use</li><li><strong>Saving</strong> = print per year − device per year</li><li><strong>Break-even books</strong> = device carbon ÷ years ÷ carbon per book</li><li><strong>Tree-years</strong> = print per year ÷ 25</li><li><strong>Carbon per book</strong> = break-even × years × carbon per book ÷ books</li></ul><p>The last row is the one to play with. It asks what a book's carbon would have to be for print and digital to tie at your reading rate, and the answer is often far below any real printing figure — which is another way of saying the device wins at your volume.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is an e-reader better for the climate than paper books?', 'a' => <<<'TXT'
            It depends on how much you read. Above roughly eleven books a year a dedicated e-reader pays back its manufacturing carbon within a four-year life; below that, printed books carry the lighter total. Reading on a device you already own beats both.
            TXT],
            ['q' => 'How much carbon does one printed book really carry?', 'a' => <<<'TXT'
            Around 2.7 kilograms for a typical paperback on a mixed grid, with published estimates running from under 1.5 to over 4. Paper production dominates; printing, binding and distribution add the rest. A recycled, locally printed edition sits at the low end.
            TXT],
            ['q' => 'Does charging an e-reader matter?', 'a' => <<<'TXT'
            Barely. An e-reader draws a few kilowatt-hours a year, which is under a kilogram of CO₂ on most grids. The manufacturing carbon is a hundred times larger, so the box that matters is the one labelled years of use.
            TXT],
            ['q' => 'What about audiobooks and library apps?', 'a' => <<<'TXT'
            Both are close to free in carbon terms, because they run on hardware you already own and files you stream. If you want the smallest reading footprint available, that combination wins: borrow from a library, play it on a phone.
            TXT],
            ['q' => 'Should I replace a working e-reader with a newer one?', 'a' => <<<'TXT'
            No, not on carbon grounds. Every replacement restarts the 120-kilogram manufacturing debt and discards a device whose carbon is already spent. Keeping a working reader for another three years cuts its annual share by nearly half.
            TXT],
            ['q' => 'Does the page count the trees used for paper?', 'a' => <<<'TXT'
            Only indirectly, through the tree-years box, which converts the print total into the absorption a mature tree provides in a year. Most book paper comes from managed forestry or recycled fibre, so the tree itself is usually regrown; the carbon comes from the energy in the mill.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
