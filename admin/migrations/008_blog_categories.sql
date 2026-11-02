-- 008 — the blog learns to file itself
--
-- The blog had tags: a free-for-all where every post could carry any number of
-- labels and the index offered a row of chips whose counts mostly said "1".
-- A blog with one post per label cannot be browsed, and the tag screen asked an
-- editor to invent taxonomy on the way past.
--
-- Categories replace them: one per post, ordered, with a description, a real
-- page at /category/<slug> and a filter on the index. Existing tags are carried
-- over rather than dropped — each tag becomes a category and each post takes its
-- first tag's category — so nothing an editor wrote is lost. The tags tables
-- stay in place, unread, in case anyone wants the old labels back.
--
-- The five seeded posts below are real articles for the seeded calculators, so
-- the redesigned index has something to lay out: one post per category, each
-- linking to a calculator that exists.

CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` varchar(320) NOT NULL DEFAULT '',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_post_categories_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `posts`
  ADD COLUMN `category_id` int(10) unsigned DEFAULT NULL AFTER `author_id`,
  ADD KEY `idx_posts_category` (`category_id`);

INSERT INTO `post_categories` (`slug`, `name`, `description`, `sort_order`) VALUES
  ('guides', 'Guides', 'How to read, check and trust a number before you act on it.', 10),
  ('money', 'Money', 'Loans, savings and the arithmetic behind everyday financial decisions.', 20),
  ('health', 'Health', 'Body measurements, doses and the numbers a clinic actually uses.', 30),
  ('math', 'Math', 'Percentages, geometry and the arithmetic that trips people up.', 40),
  ('home-diy', 'Home & DIY', 'Quantities, coverage and the shopping list for a room you are changing.', 50)
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`), `description` = VALUES(`description`), `sort_order` = VALUES(`sort_order`);

-- every tag that survived from the old system becomes a category too
INSERT INTO `post_categories` (`slug`, `name`, `description`, `sort_order`)
SELECT `slug`, `name`, `description`, 100 FROM `tags`
ON DUPLICATE KEY UPDATE `name` = `post_categories`.`name`;

-- a post takes the category of its first tag, if it has one and no category yet
UPDATE `posts` p
SET p.`category_id` = (
    SELECT c.`id` FROM `post_categories` c
    JOIN `tags` t ON t.`slug` = c.`slug`
    JOIN `post_tags` pt ON pt.`tag_id` = t.`id`
    WHERE pt.`post_id` = p.`id`
    ORDER BY c.`id` LIMIT 1
)
WHERE p.`category_id` IS NULL
  AND EXISTS (SELECT 1 FROM `post_tags` pt WHERE pt.`post_id` = p.`id`);

-- the seeded guide, filed under Guides
UPDATE `posts` SET `category_id` = (SELECT `id` FROM `post_categories` WHERE `slug` = 'guides')
WHERE `slug` = 'how-to-read-a-calculator-result';

INSERT INTO `posts`
  (`slug`, `title`, `excerpt`, `content`, `status`, `published_at`, `category_id`,
   `meta_title`, `meta_description`, `created_at`, `updated_at`)
SELECT v.`slug`, v.`title`, v.`excerpt`, v.`content`, v.`status`, v.`published_at`, v.`category_id`,
       v.`title`, LEFT(v.`excerpt`, 300), NOW(), NOW()
FROM (

  SELECT 'compound-interest-in-one-table' AS `slug`, 'Compound interest, in one table' AS `title`, 'The formula is a single line. What it does to your money over thirty years is easier to see in a table than in algebra — and the table is the part that changes decisions.' AS `excerpt`,
    '<p>Compound interest has a reputation for being complicated. It is not. It is the same percentage applied to a number that already includes last year''s interest, which means the amount added each year gets slightly bigger every time. The difficulty is not the arithmetic — it is believing the arithmetic once it has run for thirty years.</p>
<h2>The one-liner</h2>
<p>End balance equals the starting balance multiplied by one plus the rate, raised to the number of periods: <em>A = P(1 + r)<sup>n</sup></em>. That is the whole formula. Everything people find surprising about compounding is already inside the exponent.</p>
<h2>The same £1,000, three ways</h2>
<p>Take £1,000 and three rates, over thirty years, with nothing added and nothing withdrawn:</p>
<ul>
<li><strong>3%</strong> — the balance multiplies by about 2.4, ending near £2,430.</li>
<li><strong>5%</strong> — it multiplies by about 4.3, ending near £4,320.</li>
<li><strong>7%</strong> — it multiplies by about 7.6, ending near £7,610.</li>
</ul>
<p>Two percentage points look small next to a rate of 3% or 5%. Over thirty years they are the difference between a deposit and a deposit plus a used car, because the exponent does not care that the change felt small.</p>
<h2>The rule of 72</h2>
<p>Divide 72 by the annual rate and you get the number of years the balance needs to double. At 6% that is twelve years; at 9%, eight. The rule is approximate, drifts slightly at high rates, and is accurate enough to do in your head while someone is quoting you a rate — which is exactly when you need it.</p>
<h2>Why the order of the years matters</h2>
<p>The last years add far more money than the first ones, because they are applied to a larger balance. Ten thousand pounds invested at 5% earns about £500 in year one and about £2,000 in year twenty-five. This is the argument for starting early, and it is also the reason a calculator that shows only the final total hides the most useful part of the answer.</p>
<h2>Where it goes wrong</h2>
<p>Two traps are common. The first is monthly compounding quoted as an annual rate: 12% a year compounded monthly is not the same as an annual 12% paid once — the effective rate is about 12.68%. The second is inflation, which compounds too, against you. A balance that triples over thirty years while prices double has grown in real terms, but not by as much as it looks.</p>
<h2>Use the calculator</h2>
<p>The compound interest calculator takes a starting amount, a rate, a term and an optional monthly contribution, and prints the balance year by year. Read the table rather than only the total: the year the contributions stop mattering is the year compounding took over, and that is the number worth remembering.</p>' AS `content`,
    'published' AS `status`, '2026-10-30 09:12:00' AS `published_at`,
    (SELECT `id` FROM `post_categories` WHERE `slug` = 'money') AS `category_id`
  UNION ALL SELECT 'percentage-change-vs-percentage-points' AS `slug`, 'Percentage change and percentage points are not the same thing' AS `title`, 'A rate that moves from 4% to 6% has risen by two percentage points and by fifty per cent. Both sentences are true, and only one of them belongs in your report.' AS `excerpt`,
    '<p>Every year a handful of headlines confuse two different measurements, and every year the correction arrives a day later and reaches a tenth of the audience. The confusion is not stupidity; the two quantities genuinely sit next to each other and both are called "per cent".</p>
<h2>One change, two sentences</h2>
<p>A rate moves from 4% to 6%.</p>
<ul>
<li>It rose by <strong>2 percentage points</strong> — the arithmetic difference between the two rates.</li>
<li>It rose by <strong>50%</strong> — the change divided by the starting value, 2 ÷ 4.</li>
</ul>
<p>If the thing being measured is itself a percentage — an interest rate, an unemployment rate, a conversion rate, a tax rate — then the first sentence is the one that describes the policy, and the second is the one that describes the relative size of the change.</p>
<h2>Why the second sentence is dangerous on its own</h2>
<p>A rise from 0.2% to 0.4% is a 100% increase and a rounding error in practice. A rise from 40% to 42% is a 5% increase and a large change in the world. Quoting only the relative figure lets the first story sound like the second, and it is almost always the first story that gets the dramatic headline.</p>
<h2>How to phrase it so nobody is misled</h2>
<p>Say both, in the order that matches the question being asked. "The fee rose from 4% to 6% — two percentage points, a fifty per cent increase in what you pay." The reader now has the size of the change and the size of the change relative to the old value, and can decide which one matters to them.</p>
<h2>Where the calculator helps</h2>
<p>The percentage change calculator returns both numbers from the same two inputs, which is the reason it has two output lines rather than one. If you are writing the sentence rather than reading it, take both lines: the one you leave out is the one someone will accuse you of hiding.</p>' AS `content`,
    'published' AS `status`, '2026-10-31 11:05:00' AS `published_at`,
    (SELECT `id` FROM `post_categories` WHERE `slug` = 'math') AS `category_id`
  UNION ALL SELECT 'bmi-right-but-unhelpful' AS `slug`, 'Your BMI is probably right. It may still be the wrong number.' AS `title`, 'Body mass index is a height-to-weight ratio, not a measurement of body fat. Here is what it does well, what it cannot see, and the two extra measurements worth having instead.' AS `excerpt`,
    '<p>Body mass index is weight in kilograms divided by height in metres squared. It is cheap, it needs no equipment beyond a scale and a tape measure, and it was designed in the 1830s for describing populations rather than individuals. Those three facts explain almost everything about when it is useful and when it is not.</p>
<h2>What it measures</h2>
<p>BMI measures how heavy you are for your height. That is all. It correlates with body fat across large groups, which is why insurers and public-health agencies still use it: cheap and roughly right beats expensive and precise when you are screening millions of people.</p>
<h2>What it cannot see</h2>
<ul>
<li><strong>Muscle.</strong> A trained athlete and a sedentary person of the same height can share a BMI and have very different body composition.</li>
<li><strong>Where the fat is.</strong> Fat around the organs behaves differently from fat under the skin, and BMI has no idea which one you have.</li>
<li><strong>Age and sex.</strong> The same BMI means different things at 25 and at 70, and the thresholds were derived largely from data on men.</li>
<li><strong>Frame.</strong> Height enters the formula squared, which flatters short people and penalises tall ones by a small but real amount.</li>
</ul>
<h2>Two numbers worth having alongside it</h2>
<p><strong>Waist circumference</strong>, measured at the narrowest point between the lowest rib and the hip bone, is a better single indicator of the fat that carries metabolic risk. <strong>Waist-to-height ratio</strong> — waist divided by height, kept under about 0.5 for most adults — is cruder still and surprisingly robust.</p>
<h2>How to use the calculator honestly</h2>
<p>Treat the BMI number as a screening signal, not a diagnosis. If it lands in a band that worries you, the useful next step is a conversation with someone who can measure more than two things, not a stricter diet invented in response to a ratio. If it lands in the "normal" band while your waist measurement is rising, the ratio is the wrong instrument and the waist is the right one.</p>
<p>What BMI is genuinely good at is tracking one person over time. Your own number, measured the same way at the same time of day, is a decent trend line — and a trend line is what most people actually want.</p>' AS `content`,
    'published' AS `status`, '2026-11-01 08:40:00' AS `published_at`,
    (SELECT `id` FROM `post_categories` WHERE `slug` = 'health') AS `category_id`
  UNION ALL SELECT 'how-many-tiles-to-buy' AS `slug`, 'How many tiles to buy — and why the answer is never the floor area' AS `title`, 'Divide the room by the tile and you will run short. Wastage from cuts, pattern direction and a discontinued batch are what turn a tidy calculation into a second trip to the shop.' AS `excerpt`,
    '<p>The floor is 4.2 by 3.6 metres and the tiles are 60 by 60 centimetres. The arithmetic says 42 tiles. Buy 46 and you will probably still be short, because the arithmetic measured a rectangle and you are tiling a room.</p>
<h2>Measure the room, not the wall</h2>
<p>Rooms are not rectangles. Measure the widest point in each direction and use those figures, then add any alcove, doorway threshold or cupboard recess you intend to tile. If the room is L-shaped, split it into two rectangles and add them; do the same for any diagonal wall.</p>
<h2>Add wastage before you divide</h2>
<p>Standard guidance is 10% on a straight lay, 15% on a diagonal or herringbone layout, and more if the room has many cuts around fixtures. Wastage covers tiles broken in transit, tiles cut badly, and the spare you will want in two years when one cracks. Order it in the same batch as the rest: dye lots vary, and a tile from a different batch will not match under a window.</p>
<h2>The cuts decide the layout</h2>
<p>Tiles are laid from a centre line, not from a wall, unless you enjoy a row of 2-centimetre slivers along one edge. Find the centre of the room, dry-lay a row each way, and shift the line by half a tile if the edge cuts come out too small. This is also the moment to check that the pattern lines up with the doorway — the first thing anyone sees.</p>
<h2>Buy the box, not the tile</h2>
<p>Tiles are sold by the box and the coverage per box is printed on it. Divide your total including wastage by the coverage, then round up and add one box if you are within 5% of the next whole box. The spare box is cheap insurance and returns are usually easier than a second order for a batch that no longer exists.</p>
<h2>Use the calculator</h2>
<p>The tile calculator takes the room dimensions, the tile size, the grout line and a wastage percentage, and returns boxes rather than tiles. Feed it the widest measurements and the layout you actually intend to use — the number it prints is the number to take to the shop.</p>' AS `content`,
    'published' AS `status`, '2026-10-27 16:20:00' AS `published_at`,
    (SELECT `id` FROM `post_categories` WHERE `slug` = 'home-diy') AS `category_id`
  UNION ALL SELECT 'unit-conversion-mistakes' AS `slug`, 'Unit conversion: three mistakes that survive to the final answer' AS `title`, 'Most conversion errors are caught by a sanity check. These three are the ones that slip through, because the number that comes out still looks like a number you would expect.' AS `excerpt`,
    '<p>A conversion mistake usually announces itself: a weight in the millions, a length in millimetres when you wanted metres, a temperature below absolute zero. The three below are different. They produce answers that look entirely plausible, which is why they reach the final report.</p>
<h2>1. Treating a prefix as a factor of ten</h2>
<p>Kilo is a thousand. Mega is a million. Milli is a thousandth. Micro is a millionth. These are not estimates or approximations — they are exact powers of ten — but they are also not adjacent, and a five-step jump is easy to lose. A microgram is a thousand times smaller than a milligram, not ten times. When a dose or a concentration is involved, that factor of a hundred is the difference between a therapeutic and a dangerous number.</p>
<h2>2. Converting an area with a length factor</h2>
<p>One metre is 100 centimetres. One square metre is 10,000 square centimetres, because both sides scale: 100 × 100. The same trap sits in volumes, where the cube of the factor applies — one cubic metre is a million cubic centimetres. A floor area converted with the length factor comes out a hundred times too large, and a hundred times too large is exactly the kind of error that produces a plausible-looking materials order.</p>
<h2>3. Rounding in the middle</h2>
<p>Convert, round, convert again, and the errors compound. Work in one unit until the end, then round once. A pipeline of "about 4.5 kilos, call it 10 pounds, that is 4.54 kilos" has drifted from the original figure by more than the precision anyone needed.</p>
<h2>The five-second check</h2>
<p>Ask which direction the number should move. Converting to a smaller unit makes the number bigger; converting to a larger unit makes it smaller. If a distance in kilometres produces a smaller number of miles, that part is right — a mile is longer, so there are fewer of them. Checks like this cost seconds and catch most of what the three mistakes above let through.</p>
<h2>Use the calculator</h2>
<p>The unit converters here show the conversion factor they used next to the answer. When a result surprises you, read the factor before you doubt the arithmetic: the factor is where the mistake almost always is.</p>' AS `content`,
    'published' AS `status`, '2026-10-25 10:15:00' AS `published_at`,
    (SELECT `id` FROM `post_categories` WHERE `slug` = 'math') AS `category_id`

) AS v
WHERE NOT EXISTS (SELECT 1 FROM `posts` p WHERE p.`slug` = v.`slug`);

-- a category nobody files anything under is a dead chip on the index; the ones
-- carried over from tags go, hand-made ones (sort_order below 100) stay
DELETE c FROM `post_categories` c
WHERE c.`sort_order` = 100
  AND NOT EXISTS (SELECT 1 FROM `posts` p WHERE p.`category_id` = c.`id`);
