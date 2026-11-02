-- ---------------------------------------------------------------------------
-- Onim — admin panel schema (migration 010)
--
-- Tool groups: the layer above the categories.
--
-- The site has been a calculator site: fourteen categories, one flat list. It
-- is now a tool site, and those fourteen are one group among sixteen — the
-- Calculators group — alongside Audio Tools, Video Tools, Image Tools, PDF
-- Tools and the rest. A group is a page of its own (/audio) and an entry in the
-- secondary header; a subgroup (Image Converters under Image Tools) is a page
-- too, and both can hold tools.
--
-- The list ships in data/groups.json so the site navigates correctly before
-- MySQL exists. This table is the *override* layer, exactly like `categories`:
-- a row here renames, reorders, re-icons, disables or adds to the shipped list.
-- It starts empty on purpose — no row means "whatever the file says", so an
-- upgrade never silently freezes the defaults into the database.
--
-- A tool is filed under a group or a subgroup by giving that slug as its
-- `category_slug`; its address is then /{slug}/{calculator}. Nothing about the
-- 4 041 existing calculator URLs changes: they keep /{category}/{slug} and
-- belong to the Calculators group by virtue of not being filed anywhere else.
-- ---------------------------------------------------------------------------

SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS `tool_groups` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `slug` varchar(80) NOT NULL,
    `parent` varchar(80) NOT NULL DEFAULT '' COMMENT 'empty for a top-level group',
    `name` varchar(120) NOT NULL DEFAULT '',
    `title` varchar(190) NOT NULL DEFAULT '',
    `description` varchar(400) NOT NULL DEFAULT '',
    `icon` varchar(60) NOT NULL DEFAULT 'grid',
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `status` enum('published','hidden') NOT NULL DEFAULT 'published',
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_tool_group_slug` (`slug`),
    KEY `idx_tool_group_parent` (`parent`, `sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- The home page learns a new section: the tool categories, between the
-- calculator tiles and the catalogue directory.
ALTER TABLE `homepage_sections`
    MODIFY COLUMN `stype`
        ENUM('hero','category_grid','tool_groups','popular','latest','search','rich_text','cta','blog','stats','calc_directory','howto')
        NOT NULL DEFAULT 'rich_text';

INSERT IGNORE INTO `homepage_sections`
    (`skey`, `stype`, `title`, `subtitle`, `config`, `sort_order`, `enabled`)
VALUES
    ('tools', 'tool_groups', 'Tools, by category', '', '', 22, 1);
