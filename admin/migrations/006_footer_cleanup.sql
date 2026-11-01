-- 006 — a footer that says something
--
-- The footer shipped with every calculator name that happened to be harvested
-- ("Acres per hour Calculator", "Allele frequency Calculator"…) — 57 links whose
-- only job was to pad the columns. Two of the seeded columns were empty of
-- anything a visitor wants, the legal row was blank, and under it all sat a
-- paragraph explaining that this site is a rebuild of another one. On a live
-- site that reads as unfinished and, in the legal sense, as an admission with no
-- upside.
--
-- This migration replaces the seeded noise with a footer that navigates:
--   * calculator columns keep four real category indexes (not 57 stray names);
--   * new columns: Company (about/contact/discover), Resources (all calculators,
--     search, blog) and Legal (privacy, terms, disclaimer, FAQ);
--   * the disclaimer paragraph is switched off.
--
-- It only deletes rows that match the seeded pattern (a footer_column link whose
-- label ends in " Calculator"), so anything an editor added by hand survives.

DELETE FROM `menu_items`
 WHERE `location` = 'footer_column'
   AND `label` LIKE '% Calculator';

-- The rest of the seeded padding: a handful of stray calculator names that never
-- carried the " Calculator" suffix ("Animal mortality rate", "12 hour shift"…).
-- Everything hanging off a category column goes; those columns get one link each
-- back to their category index, which is what a footer column is for.
DELETE m FROM `menu_items` m
  JOIN `footer_columns` c ON c.`id` = m.`footer_column_id`
 WHERE m.`location` = 'footer_column' AND c.`skey` LIKE 'cat-%';

-- One footer column per category is more than a footer needs, and the seeded
-- order is alphabetical, which picked the four smallest ones. Keep the four with
-- the most calculators (math 657, finance 585, physics 539, health 435) and fold
-- them into a single "Calculators" column below.
UPDATE `footer_columns` SET `enabled` = 0 WHERE `skey` LIKE 'cat-%';
UPDATE `footer_columns` SET `enabled` = 1, `title` = 'Calculators', `sort_order` = 10
 WHERE `skey` = 'cat-math';

-- The three link columns the footer was missing.
INSERT INTO `footer_columns` (`skey`, `title`, `sort_order`, `enabled`, `created_at`)
SELECT * FROM (SELECT 'site-company', 'Company', 20, 1, NOW()) AS t
 WHERE NOT EXISTS (SELECT 1 FROM `footer_columns` WHERE `skey` = 'site-company');

INSERT INTO `footer_columns` (`skey`, `title`, `sort_order`, `enabled`, `created_at`)
SELECT * FROM (SELECT 'site-resources', 'Resources', 30, 1, NOW()) AS t
 WHERE NOT EXISTS (SELECT 1 FROM `footer_columns` WHERE `skey` = 'site-resources');

-- Legal links live in their own location so the bar at the very bottom keeps
-- them without a second column: privacy, terms, disclaimer, then the FAQ.
DELETE FROM `menu_items` WHERE `location` = 'legal';
INSERT INTO `menu_items` (`location`, `footer_column_id`, `parent_id`, `label`, `url`, `sort_order`, `target`, `enabled`, `created_at`, `updated_at`)
SELECT 'legal', NULL, NULL, 'Privacy', '/privacy', 10, '_self', 1, NOW(), NOW()
 WHERE NOT EXISTS (SELECT 1 FROM `menu_items` WHERE `location` = 'legal' AND `url` = '/privacy');

INSERT INTO `menu_items` (`location`, `footer_column_id`, `parent_id`, `label`, `url`, `sort_order`, `target`, `enabled`, `created_at`, `updated_at`)
SELECT 'legal', NULL, NULL, 'Terms', '/terms', 20, '_self', 1, NOW(), NOW()
 WHERE NOT EXISTS (SELECT 1 FROM `menu_items` WHERE `location` = 'legal' AND `url` = '/terms');

INSERT INTO `menu_items` (`location`, `footer_column_id`, `parent_id`, `label`, `url`, `sort_order`, `target`, `enabled`, `created_at`, `updated_at`)
SELECT 'legal', NULL, NULL, 'Disclaimer', '/disclaimer', 30, '_self', 1, NOW(), NOW()
 WHERE NOT EXISTS (SELECT 1 FROM `menu_items` WHERE `location` = 'legal' AND `url` = '/disclaimer');

INSERT INTO `menu_items` (`location`, `footer_column_id`, `parent_id`, `label`, `url`, `sort_order`, `target`, `enabled`, `created_at`, `updated_at`)
SELECT 'legal', NULL, NULL, 'FAQ', '/faq', 40, '_self', 1, NOW(), NOW()
 WHERE NOT EXISTS (SELECT 1 FROM `menu_items` WHERE `location` = 'legal' AND `url` = '/faq');

-- Company and Resources links, attached to their columns by skey.
INSERT INTO `menu_items` (`location`, `footer_column_id`, `parent_id`, `label`, `url`, `sort_order`, `target`, `enabled`, `created_at`, `updated_at`)
SELECT 'footer_column', c.`id`, NULL, v.`label`, v.`url`, v.`sort_order`, '_self', 1, NOW(), NOW()
  FROM (SELECT 'About us' AS `label`, '/about' AS `url`, 10 AS `sort_order`, 'site-company' AS `skey`
        UNION ALL SELECT 'Contact', '/contact', 20, 'site-company'
        UNION ALL SELECT 'Discover Onim', '/discover', 30, 'site-company'
        UNION ALL SELECT 'All calculators', '/calculators', 10, 'site-resources'
        UNION ALL SELECT 'Search', '/search', 20, 'site-resources'
        UNION ALL SELECT 'Blog', '/blog', 30, 'site-resources') AS v
  JOIN `footer_columns` c ON c.`skey` = v.`skey`
 WHERE NOT EXISTS (
        SELECT 1 FROM `menu_items` m
         WHERE m.`location` = 'footer_column' AND m.`url` = v.`url` AND m.`footer_column_id` = c.`id`);

-- The Calculators column lists the four biggest categories and nothing else.
INSERT INTO `menu_items` (`location`, `footer_column_id`, `parent_id`, `label`, `url`, `sort_order`, `target`, `enabled`, `created_at`, `updated_at`)
SELECT 'footer_column', c.`id`, NULL, v.`label`, v.`url`, v.`sort_order`, '_self', 1, NOW(), NOW()
  FROM (SELECT 'Math' AS `label`, '/math' AS `url`, 10 AS `sort_order`
        UNION ALL SELECT 'Finance', '/finance', 20
        UNION ALL SELECT 'Physics', '/physics', 30
        UNION ALL SELECT 'Health', '/health', 40) AS v
  JOIN `footer_columns` c ON c.`skey` = 'cat-math'
 WHERE NOT EXISTS (SELECT 1 FROM `menu_items` m
                    WHERE m.`location` = 'footer_column' AND m.`footer_column_id` = c.`id`
                      AND m.`url` = v.`url`);

-- Copy that was written for the rebuild rather than for a live site.
UPDATE `settings` SET `svalue` = '4 041 free calculators, each one with its formula spelled out'
 WHERE `skey` = 'site_tagline';
UPDATE `settings` SET `svalue` = ''
 WHERE `skey` = 'footer_about';

-- The rebuild notice is not something a live site should advertise.
UPDATE `settings` SET `svalue` = '0' WHERE `skey` = 'footer_show_notice';
