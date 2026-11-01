-- 004 — "all calculators, by category" homepage section
--
-- The home page used to show 14 category tiles and a strip of 12 popular
-- calculators, which left the other ~4,000 reachable only by opening a category
-- first. A `calc_directory` section lists every category with the count it holds
-- and the first few calculators in it as real links, so the whole catalogue is
-- one click from the front page. `config.per_category` sets how many links each
-- category shows (3–12, default 6).

ALTER TABLE `homepage_sections`
    MODIFY COLUMN `stype`
        ENUM('hero','category_grid','popular','latest','search','rich_text','cta','blog','stats','calc_directory')
        NOT NULL DEFAULT 'rich_text';
