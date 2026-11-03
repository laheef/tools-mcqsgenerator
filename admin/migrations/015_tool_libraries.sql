-- ---------------------------------------------------------------------------
-- Onim — admin panel schema (migration 015)
--
-- Tool libraries.
--
-- Most of a tool file is PHP that prints a widget; the widget's maths often
-- lives in a third-party script — Chart.js for a chart, KaTeX for typeset
-- formulas, PapaParse for a pasted CSV. Until now the only way to get one onto
-- a page was to paste a <script> into the tool file, which meant the same CDN
-- link was retyped in every file that needed it, could not be audited, and
-- could not be swapped when a library moved.
--
-- `tool_libraries` is the one list of them. A row is a name, the address it is
-- loaded from, and whether it is a script or a stylesheet. A tool page picks the
-- rows it needs (`custom_calculators.libraries`, a comma-separated list of
-- slugs); the public page prints exactly those and nothing else.
--
--   name       what the owner calls it, "Chart.js"
--   slug       the stable key, "chart-js"
--   kind       js | css
--   url        the address, absolute or root-relative
--   integrity  optional SRI hash, printed as integrity="…"
--   crossorigin  optional, printed when integrity is set
--   notes      where it came from / why it is pinned
--   auto       1 when the panel found it in a tool file rather than a person
--
-- Deleting a library row does not touch any page: the page simply stops
-- loading that script.
-- ---------------------------------------------------------------------------

SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS `tool_libraries` (
    `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `slug`        VARCHAR(80)  NOT NULL,
    `name`        VARCHAR(190) NOT NULL,
    `kind`        ENUM('js','css') NOT NULL DEFAULT 'js',
    `url`         VARCHAR(500) NOT NULL,
    `integrity`   VARCHAR(255) NOT NULL DEFAULT '',
    `crossorigin` VARCHAR(40)  NOT NULL DEFAULT '',
    `notes`       VARCHAR(500) NOT NULL DEFAULT '',
    `auto`        TINYINT(1)   NOT NULL DEFAULT 0,
    `created_at`  DATETIME     NOT NULL,
    `updated_at`  DATETIME     NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `slug` (`slug`),
    KEY `kind` (`kind`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Which libraries a page loads. Comma-separated slugs, empty for none — the
   same shape as `tool_shortcode`, so a page row stays readable in phpMyAdmin. */
ALTER TABLE `custom_calculators`
    ADD COLUMN `libraries` VARCHAR(500) NOT NULL DEFAULT '' AFTER `tool_version`;
