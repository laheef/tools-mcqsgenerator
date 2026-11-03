-- ---------------------------------------------------------------------------
-- Onim — admin panel schema (migration 013)
--
-- The front page stops opening on a wall of tiles.
--
-- Round 55 put sixteen section tiles directly under the hero. They were a third
-- way of saying what the two category grids below already say, and they pushed
-- the actual content two screens down. The tile band is switched off; the panel
-- still offers the section type, so an owner who wants it back can add it in a
-- click.
--
-- Order is the reading order of the page: the hero, then the calculators (the
-- site's centre of gravity), then everything else, then the popular tools and
-- the explanatory bands.
-- ---------------------------------------------------------------------------

SET NAMES utf8mb4;

UPDATE `homepage_sections` SET `enabled` = 0 WHERE `skey` = 'categories';

UPDATE `homepage_sections` SET `sort_order` = 20 WHERE `skey` = 'directory';
UPDATE `homepage_sections` SET `sort_order` = 30 WHERE `skey` = 'tools';
UPDATE `homepage_sections` SET `sort_order` = 40 WHERE `skey` = 'popular';
UPDATE `homepage_sections` SET `sort_order` = 50 WHERE `skey` = 'how';
UPDATE `homepage_sections` SET `sort_order` = 60 WHERE `skey` = 'howitworks';

-- The two category bands now say what they are: one is the calculators, the
-- other is everything else. Matched on the seeded wording, so an edited title
-- is left alone.
UPDATE `homepage_sections`
   SET `title` = 'Calculators, by category'
 WHERE `skey` = 'directory'
   AND `title` IN ('All calculators, by category', 'Calculators, by category', '');

UPDATE `homepage_sections`
   SET `title` = 'Tools, by category',
       `subtitle` = 'Everything on the site that is not a calculator, filed under the section it belongs to.'
 WHERE `skey` = 'tools'
   AND `title` IN ('Tools, by category', 'Tools, by section', '');
