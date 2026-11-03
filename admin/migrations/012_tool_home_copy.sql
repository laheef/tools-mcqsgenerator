-- ---------------------------------------------------------------------------
-- Onim — admin panel schema (migration 012)
--
-- The home page learns that it is a tool site.
--
-- Round 54 turned the site into a tool site but left the front page's words as
-- they were: "All calculators, by category", "Most popular calculators", "How
-- these calculators work", "What every calculator on this site actually does".
-- Those headings are what a visitor reads first, and every one of them still
-- says the site only does arithmetic.
--
-- Each UPDATE is guarded by the exact seeded text, so an owner who has already
-- edited a heading keeps their wording: the row no longer matches and is left
-- alone. Re-running is a no-op for the same reason.
--
-- The source of the copy moved too: the home page's own bands now write their
-- defaults, and `lib/Cms.php` / `install/database.sql` carry the new strings, so
-- a fresh install is already a tool site.
-- ---------------------------------------------------------------------------

SET NAMES utf8mb4;

-- The band that lists every section, shelf by shelf.
UPDATE `homepage_sections`
   SET `title` = 'Tools, by section'
 WHERE `skey` = 'tools'
   AND `title` IN ('Tools, by category', '');

-- The calculator directory: still the calculators, but it now says "tools".
UPDATE `homepage_sections`
   SET `title` = 'Calculators, by category'
 WHERE `skey` = 'directory'
   AND `title` IN ('All calculators, by category', '');

UPDATE `homepage_sections`
   SET `subtitle` = 'Every calculator topic on the site, with a few of its tools — or open the full catalogue and filter it.'
 WHERE `skey` = 'directory'
   AND (`subtitle` = 'Every category on the site, with a few of its calculators — or open the full catalogue and filter it.'
        OR `subtitle` = '');

UPDATE `homepage_sections`
   SET `title` = 'Most opened tools',
       `subtitle` = 'The pages people open most often — calculators and file tools together'
 WHERE `skey` = 'popular'
   AND `title` IN ('Most popular calculators', 'Most popular');

UPDATE `homepage_sections`
   SET `title` = 'How these tools work'
 WHERE `skey` = 'how'
   AND `title` IN ('How these calculators work', '');

UPDATE `homepage_sections`
   SET `title` = 'What every tool here actually does',
       `subtitle` = 'Calculators turn an equation around. File tools run on your machine. Both show their working.'
 WHERE `skey` = 'howitworks'
   AND `title` = 'What every calculator on this site actually does';

-- The three steps in the rich-text band, rewritten for a site that also holds
-- file tools. Matched on the first step so an edited list is never overwritten.
UPDATE `homepage_sections`
   SET `config` = '{"html":"<ol class=\\"how-steps\\"><li class=\\"how-step\\"><span class=\\"how-num\\">1</span><h3>Fill the values you know</h3><p>Every calculator is a set of equations rather than a fixed form. Type into any field — the empty ones are solved for you.</p></li><li class=\\"how-step\\"><span class=\\"how-num\\">2</span><h3>Or drop in a file</h3><p>The audio, image and PDF tools work on the file in your browser. Nothing is uploaded, nothing is stored, and no account is made.</p></li><li class=\\"how-step\\"><span class=\\"how-num\\">3</span><h3>Check the working</h3><p>The calculator prints the equation it used with your own numbers in it; a converter shows its factor. Nothing here is a black box.</p></li></ol>"}'
 WHERE `skey` = 'how'
   AND `config` LIKE '%Fill the values you know%';

-- Calculators first, then everything else: the calculator directory moves above
-- the band that lists the other sections, which is the order the home page reads
-- in ("the calculator content stays first, below it the tool categories").
UPDATE `homepage_sections` SET `sort_order` = 22 WHERE `skey` = 'directory' AND `sort_order` = 25;
UPDATE `homepage_sections` SET `sort_order` = 25 WHERE `skey` = 'tools' AND `sort_order` = 22;

-- The tagline under the logo in the footer, and the default <title> suffix. Both
-- said "calculators" while the site was one; an owner who has already written
-- their own keeps it.
UPDATE `settings`
   SET `svalue` = 'Free calculators and file tools — the working shown, nothing uploaded'
 WHERE `skey` = 'site_tagline'
   AND `svalue` IN ('4 041 free calculators, each one with its formula spelled out',
                    'Free online calculators for everyday problems',
                    '');
