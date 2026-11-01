-- ---------------------------------------------------------------------------
-- Onim — admin panel schema (migration 001)
--
-- Target: MySQL 8.0 / MariaDB 10.3+ on ordinary shared hosting (Hostinger).
-- Portable choices, all deliberate:
--   * no JSON column type — JSON is stored in LONGTEXT so MariaDB 10.x and
--     MySQL 8 behave identically and phpMyAdmin can round-trip it
--   * no triggers, stored procedures or views
--   * utf8mb4 / InnoDB everywhere, index prefixes short enough for both engines
--   * tables are created parent-first so the foreign keys below are valid on a
--     brand-new database as well as on an existing one
--
-- The calculator catalogue itself — 3,831 definitions and their articles —
-- stays in the filesystem under data/. These tables are an override layer: a
-- row exists only once an editor touches that record in the panel.
-- ---------------------------------------------------------------------------

SET NAMES utf8mb4;


CREATE TABLE IF NOT EXISTS `schema_migrations` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `filename` varchar(190) NOT NULL,
    `checksum` char(64) NOT NULL DEFAULT '',
    `ran_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_migration` (`filename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(120) NOT NULL,
    `email` varchar(190) NOT NULL,
    `password_hash` varchar(255) NOT NULL,
    `role` enum('administrator','editor','author') NOT NULL DEFAULT 'author',
    `status` enum('active','inactive') NOT NULL DEFAULT 'active',
    `avatar` varchar(255) NOT NULL DEFAULT '',
    `bio` varchar(500) NOT NULL DEFAULT '',
    `last_login_at` datetime DEFAULT NULL,
    `last_login_ip` varchar(45) NOT NULL DEFAULT '',
    `must_change` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_users_email` (`email`),
    KEY `idx_users_role` (`role`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `password_resets` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int(10) unsigned NOT NULL,
    `token_hash` char(64) NOT NULL,
    `expires_at` datetime NOT NULL,
    `used_at` datetime DEFAULT NULL,
    `requested_ip` varchar(45) NOT NULL DEFAULT '',
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_reset_token` (`token_hash`),
    KEY `idx_reset_user` (`user_id`),
    CONSTRAINT `fk_reset_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `settings` (
    `skey` varchar(120) NOT NULL,
    `svalue` mediumtext DEFAULT NULL,
    `sgroup` varchar(40) NOT NULL DEFAULT 'general',
    `is_secret` tinyint(1) NOT NULL DEFAULT 0,
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`skey`),
    KEY `idx_settings_group` (`sgroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `categories` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `slug` varchar(80) NOT NULL,
    `name` varchar(120) NOT NULL,
    `title` varchar(190) NOT NULL DEFAULT '',
    `description` text DEFAULT NULL,
    `icon` varchar(80) NOT NULL DEFAULT '',
    `meta_title` varchar(190) NOT NULL DEFAULT '',
    `meta_description` varchar(320) NOT NULL DEFAULT '',
    `noindex` tinyint(1) NOT NULL DEFAULT 0,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `status` enum('published','draft') NOT NULL DEFAULT 'published',
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_categories_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `calculators` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `source_path` varchar(190) NOT NULL,
    `slug` varchar(190) NOT NULL DEFAULT '',
    `category_slug` varchar(80) NOT NULL DEFAULT '',
    `name` varchar(190) NOT NULL DEFAULT '',
    `h1` varchar(190) NOT NULL DEFAULT '',
    `meta_title` varchar(190) NOT NULL DEFAULT '',
    `meta_description` varchar(320) NOT NULL DEFAULT '',
    `summary` text DEFAULT NULL,
    `sections` longtext DEFAULT NULL,
    `faq` longtext DEFAULT NULL,
    `related` longtext DEFAULT NULL,
    `icon` varchar(80) NOT NULL DEFAULT '',
    `thumbnail` varchar(255) NOT NULL DEFAULT '',
    `status` enum('published','draft','archived') NOT NULL DEFAULT 'published',
    `is_featured` tinyint(1) NOT NULL DEFAULT 0,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `canonical_url` varchar(255) NOT NULL DEFAULT '',
    `noindex` tinyint(1) NOT NULL DEFAULT 0,
    `updated_by` int(10) unsigned DEFAULT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_calc_source` (`source_path`),
    KEY `idx_calc_status` (`status`),
    KEY `idx_calc_cat` (`category_slug`,`status`),
    KEY `idx_calc_featured` (`is_featured`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `calculator_files` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `path` varchar(255) NOT NULL,
    `kind` enum('calculator','template','partial','library','script','style','data','route') NOT NULL DEFAULT 'library',
    `language` varchar(20) NOT NULL DEFAULT 'php',
    `calculator_id` int(10) unsigned DEFAULT NULL,
    `checksum` char(64) NOT NULL DEFAULT '',
    `size` int(10) unsigned NOT NULL DEFAULT 0,
    `status` enum('active','orphan','archived') NOT NULL DEFAULT 'active',
    `is_editable` tinyint(1) NOT NULL DEFAULT 1,
    `note` varchar(255) NOT NULL DEFAULT '',
    `created_by` int(10) unsigned DEFAULT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_files_path` (`path`),
    KEY `idx_files_kind` (`kind`,`status`),
    KEY `idx_files_calc` (`calculator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `calculator_file_versions` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `file_id` int(10) unsigned NOT NULL,
    `version` int(10) unsigned NOT NULL DEFAULT 1,
    `content` longtext DEFAULT NULL,
    `checksum` char(64) NOT NULL DEFAULT '',
    `note` varchar(255) NOT NULL DEFAULT '',
    `size` int(10) unsigned NOT NULL DEFAULT 0,
    `created_by` int(10) unsigned DEFAULT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `idx_versions_file` (`file_id`,`version`),
    CONSTRAINT `fk_versions_file` FOREIGN KEY (`file_id`) REFERENCES `calculator_files` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `homepage_sections` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `skey` varchar(60) NOT NULL,
    `stype` enum('hero','category_grid','popular','latest','search','rich_text','cta','blog','stats') NOT NULL DEFAULT 'rich_text',
    `title` varchar(190) NOT NULL DEFAULT '',
    `subtitle` varchar(320) NOT NULL DEFAULT '',
    `config` longtext DEFAULT NULL,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `enabled` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_home_key` (`skey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `footer_columns` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `skey` varchar(60) NOT NULL,
    `title` varchar(120) NOT NULL,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `enabled` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_footer_key` (`skey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `menu_items` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `location` enum('header','header_actions','footer_column','legal','mobile') NOT NULL DEFAULT 'header',
    `footer_column_id` int(10) unsigned DEFAULT NULL,
    `parent_id` int(10) unsigned DEFAULT NULL,
    `label` varchar(120) NOT NULL,
    `url` varchar(255) NOT NULL DEFAULT '/',
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `target` enum('_self','_blank') NOT NULL DEFAULT '_self',
    `enabled` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `idx_menu_loc` (`location`,`enabled`,`sort_order`),
    KEY `idx_menu_parent` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `pages` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `slug` varchar(190) NOT NULL,
    `title` varchar(190) NOT NULL,
    `excerpt` varchar(320) NOT NULL DEFAULT '',
    `content` longtext DEFAULT NULL,
    `template` enum('default','contact','wide','faq') NOT NULL DEFAULT 'default',
    `status` enum('published','draft') NOT NULL DEFAULT 'draft',
    `meta_title` varchar(190) NOT NULL DEFAULT '',
    `meta_description` varchar(320) NOT NULL DEFAULT '',
    `canonical_url` varchar(255) NOT NULL DEFAULT '',
    `noindex` tinyint(1) NOT NULL DEFAULT 0,
    `show_in_header` tinyint(1) NOT NULL DEFAULT 0,
    `show_in_footer` tinyint(1) NOT NULL DEFAULT 0,
    `author_id` int(10) unsigned DEFAULT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_pages_slug` (`slug`),
    KEY `idx_pages_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `posts` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `slug` varchar(190) NOT NULL,
    `title` varchar(190) NOT NULL,
    `excerpt` varchar(400) NOT NULL DEFAULT '',
    `content` longtext DEFAULT NULL,
    `cover_image` varchar(255) NOT NULL DEFAULT '',
    `cover_alt` varchar(255) NOT NULL DEFAULT '',
    `status` enum('draft','scheduled','published','archived') NOT NULL DEFAULT 'draft',
    `published_at` datetime DEFAULT NULL,
    `author_id` int(10) unsigned DEFAULT NULL,
    `meta_title` varchar(190) NOT NULL DEFAULT '',
    `meta_description` varchar(320) NOT NULL DEFAULT '',
    `canonical_url` varchar(255) NOT NULL DEFAULT '',
    `og_title` varchar(190) NOT NULL DEFAULT '',
    `og_description` varchar(320) NOT NULL DEFAULT '',
    `og_image` varchar(255) NOT NULL DEFAULT '',
    `noindex` tinyint(1) NOT NULL DEFAULT 0,
    `views` int(10) unsigned NOT NULL DEFAULT 0,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_posts_slug` (`slug`),
    KEY `idx_posts_status` (`status`,`published_at`),
    KEY `idx_posts_author` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `tags` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `slug` varchar(80) NOT NULL,
    `name` varchar(80) NOT NULL,
    `description` varchar(320) NOT NULL DEFAULT '',
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_tags_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `post_tags` (
    `post_id` int(10) unsigned NOT NULL,
    `tag_id` int(10) unsigned NOT NULL,
    PRIMARY KEY (`post_id`,`tag_id`),
    KEY `idx_post_tags_tag` (`tag_id`),
    CONSTRAINT `fk_pt_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_pt_tag` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `media` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `filename` varchar(255) NOT NULL,
    `stored_name` varchar(255) NOT NULL,
    `path` varchar(255) NOT NULL,
    `mime` varchar(120) NOT NULL DEFAULT '',
    `size` int(10) unsigned NOT NULL DEFAULT 0,
    `width` int(10) unsigned NOT NULL DEFAULT 0,
    `height` int(10) unsigned NOT NULL DEFAULT 0,
    `alt` varchar(255) NOT NULL DEFAULT '',
    `caption` varchar(255) NOT NULL DEFAULT '',
    `uploaded_by` int(10) unsigned DEFAULT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_media_path` (`path`),
    KEY `idx_media_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `contact_fields` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `fkey` varchar(60) NOT NULL,
    `label` varchar(120) NOT NULL,
    `ftype` enum('text','email','tel','textarea','select','checkbox') NOT NULL DEFAULT 'text',
    `placeholder` varchar(190) NOT NULL DEFAULT '',
    `options` longtext DEFAULT NULL,
    `required` tinyint(1) NOT NULL DEFAULT 0,
    `sort_order` int(11) NOT NULL DEFAULT 0,
    `enabled` tinyint(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_contact_field` (`fkey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `messages` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(190) NOT NULL DEFAULT '',
    `email` varchar(190) NOT NULL DEFAULT '',
    `phone` varchar(60) NOT NULL DEFAULT '',
    `subject` varchar(190) NOT NULL DEFAULT '',
    `body` mediumtext DEFAULT NULL,
    `extra` longtext DEFAULT NULL,
    `status` enum('unread','read','resolved','spam') NOT NULL DEFAULT 'unread',
    `ip` varchar(45) NOT NULL DEFAULT '',
    `user_agent` varchar(255) NOT NULL DEFAULT '',
    `referer` varchar(255) NOT NULL DEFAULT '',
    `mail_status` enum('pending','sent','failed','disabled') NOT NULL DEFAULT 'pending',
    `mail_error` varchar(500) NOT NULL DEFAULT '',
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `read_at` datetime DEFAULT NULL,
    `resolved_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `idx_messages_status` (`status`,`created_at`),
    KEY `idx_messages_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `message_notes` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `message_id` int(10) unsigned NOT NULL,
    `user_id` int(10) unsigned DEFAULT NULL,
    `note` text DEFAULT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `idx_notes_message` (`message_id`),
    CONSTRAINT `fk_notes_message` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `redirects` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `from_path` varchar(255) NOT NULL,
    `to_path` varchar(255) NOT NULL,
    `status_code` smallint(5) unsigned NOT NULL DEFAULT 301,
    `enabled` tinyint(1) NOT NULL DEFAULT 1,
    `hits` int(10) unsigned NOT NULL DEFAULT 0,
    `note` varchar(255) NOT NULL DEFAULT '',
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_redirect_from` (`from_path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `activity_log` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int(10) unsigned DEFAULT NULL,
    `user_name` varchar(120) NOT NULL DEFAULT '',
    `action` varchar(60) NOT NULL,
    `entity` varchar(60) NOT NULL DEFAULT '',
    `entity_id` varchar(60) NOT NULL DEFAULT '',
    `summary` varchar(500) NOT NULL DEFAULT '',
    `ip` varchar(45) NOT NULL DEFAULT '',
    `user_agent` varchar(255) NOT NULL DEFAULT '',
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `idx_activity_created` (`created_at`),
    KEY `idx_activity_user` (`user_id`),
    KEY `idx_activity_entity` (`entity`,`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `rate_limits` (
    `rkey` varchar(190) NOT NULL,
    `hits` int(10) unsigned NOT NULL DEFAULT 0,
    `window_start` datetime NOT NULL DEFAULT current_timestamp(),
    `blocked_until` datetime DEFAULT NULL,
    PRIMARY KEY (`rkey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `backups` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `btype` enum('database','files','content') NOT NULL DEFAULT 'database',
    `filename` varchar(255) NOT NULL,
    `size` bigint(20) unsigned NOT NULL DEFAULT 0,
    `checksum` char(64) NOT NULL DEFAULT '',
    `note` varchar(255) NOT NULL DEFAULT '',
    `created_by` int(10) unsigned DEFAULT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `idx_backups_type` (`btype`,`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `page_views` (
    `path` varchar(190) NOT NULL,
    `day` date NOT NULL,
    `hits` int(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`path`,`day`),
    KEY `idx_views_day` (`day`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
