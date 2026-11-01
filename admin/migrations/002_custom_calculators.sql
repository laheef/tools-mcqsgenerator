-- ---------------------------------------------------------------------------
-- Omni Calculator clone — admin panel schema (migration 002)
--
-- Custom calculators: tools that are NOT in the harvested catalogue.
--
-- Everything else in the catalogue lives in `data/calc/*.ndjson` and the panel
-- only ever writes an override row on top of it. A custom calculator has no
-- harvested record to override, so it is stored here in full: the compiled
-- engine definition (groups / vars / datasets / eq — the same shape the
-- harvester produces), the article prose, and the fields the editor model was
-- built from.
--
-- `definition` is what the public site reads, `fields` and `equations` are what
-- the editor re-opens. Storing both means a page render never has to recompile,
-- while an edit never has to reverse-engineer a definition. A definition is only
-- written after lib/CustomCalc.php has validated it against the real engine.
--
-- Same portability rules as 001: LONGTEXT instead of the JSON type, no triggers
-- or procedures, utf8mb4/InnoDB, varchar(80)/varchar(120) slugs so both MySQL 8
-- and MariaDB 10.x index them without prefix tricks.
-- ---------------------------------------------------------------------------

SET NAMES utf8mb4;


CREATE TABLE IF NOT EXISTS `custom_calculators` (
    `id`               int(10) unsigned NOT NULL AUTO_INCREMENT,
    `slug`             varchar(120) NOT NULL,
    `category_slug`    varchar(80) NOT NULL DEFAULT 'other',
    `name`             varchar(190) NOT NULL,
    `h1`               varchar(190) NOT NULL DEFAULT '',
    `meta_title`       varchar(190) NOT NULL DEFAULT '',
    `meta_description` varchar(320) NOT NULL DEFAULT '',
    `summary`          text DEFAULT NULL,
    `sections`         longtext DEFAULT NULL,
    `faq`              longtext DEFAULT NULL,
    `fields`           longtext DEFAULT NULL,
    `equations`        longtext DEFAULT NULL,
    `definition`       longtext DEFAULT NULL,
    `icon`             varchar(80) NOT NULL DEFAULT '',
    `thumbnail`        varchar(255) NOT NULL DEFAULT '',
    `status`           enum('published','draft','archived') NOT NULL DEFAULT 'draft',
    `is_featured`      tinyint(1) NOT NULL DEFAULT 0,
    `sort_order`       int(11) NOT NULL DEFAULT 0,
    `noindex`          tinyint(1) NOT NULL DEFAULT 0,
    `js`               longtext DEFAULT NULL,
    `created_by`       int(10) unsigned DEFAULT NULL,
    `updated_by`       int(10) unsigned DEFAULT NULL,
    `created_at`       datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at`       datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_custom_slug` (`slug`),
    KEY `idx_custom_cat` (`category_slug`,`status`),
    KEY `idx_custom_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `custom_calculator_versions` (
    `id`            int(10) unsigned NOT NULL AUTO_INCREMENT,
    `calculator_id` int(10) unsigned NOT NULL,
    `version`       int(10) unsigned NOT NULL DEFAULT 1,
    `snapshot`      longtext NOT NULL,
    `note`          varchar(190) NOT NULL DEFAULT '',
    `created_by`    int(10) unsigned DEFAULT NULL,
    `created_at`    datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `idx_ccv_calc` (`calculator_id`,`version`),
    CONSTRAINT `fk_ccv_calc` FOREIGN KEY (`calculator_id`)
        REFERENCES `custom_calculators` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
