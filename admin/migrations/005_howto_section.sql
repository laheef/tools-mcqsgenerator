-- 005 — the "how it works" homepage section
--
-- Four short panels saying what a calculator on this site does (solve in any
-- direction, show the formula with your own values, state and swap units, free
-- and citable). The home page had categories, a catalogue listing and a strip of
-- popular cards, which is a directory rather than a reason to trust the numbers.
-- Panel copy is in templates/home.php; the section itself is editable and can be
-- switched off like any other row.

ALTER TABLE `homepage_sections`
    MODIFY COLUMN `stype`
        ENUM('hero','category_grid','popular','latest','search','rich_text','cta','blog','stats','calc_directory','howto')
        NOT NULL DEFAULT 'rich_text';
