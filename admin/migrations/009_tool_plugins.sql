-- ---------------------------------------------------------------------------
-- Onim — admin panel schema (migration 009)
--
-- Tool plugins: a calculator whose widget is a PHP file rather than a formula.
--
-- Until now a custom calculator was always a *definition* — fields, equations
-- and, optionally, a page script. This migration adds the second kind: a page
-- that names a shortcode, where the shortcode is registered by one file in
-- plugins/<category>/. The page keeps everything else it had (article, FAQ,
-- related, ads, reviews); only the widget changes hands.
--
-- `kind` is what the renderer branches on:
--     builder  — the compiled definition in `definition` (the default, so
--                every row that already exists keeps working untouched)
--     tool     — the shortcode in `tool_shortcode`, rendered by lib/Toolkit.php
--
-- `tool_file` is the path *relative to plugins/* that the panel uploaded, so
-- the editor can tell the owner which file backs the page and can refuse to
-- delete a file that a published page still uses. `tool_version` is the header
-- version at the moment the page was last saved: when the file moves on, the
-- panel can say the page is behind.
--
-- No foreign keys: a tool file is not a row, and the column is deliberately
-- allowed to point at a file that has been deleted, so a page degrades to the
-- "tool could not run" note instead of disappearing from the catalogue.
-- ---------------------------------------------------------------------------

SET NAMES utf8mb4;

ALTER TABLE `custom_calculators`
    ADD COLUMN `kind`           varchar(16)  NOT NULL DEFAULT 'builder' AFTER `category_slug`,
    ADD COLUMN `tool_file`      varchar(190) NOT NULL DEFAULT '' AFTER `kind`,
    ADD COLUMN `tool_shortcode` varchar(80)  NOT NULL DEFAULT '' AFTER `tool_file`,
    ADD COLUMN `tool_version`   varchar(20)  NOT NULL DEFAULT '' AFTER `tool_shortcode`,
    ADD KEY `idx_custom_kind` (`kind`, `status`);
