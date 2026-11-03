-- ---------------------------------------------------------------------------
-- Onim — admin panel schema (migration 011)
--
-- The short name in the header bar.
--
-- The secondary header carries sixteen entries in one row on a desktop, so each
-- group needs two names: the full one ("Audio Tools") for its page and its
-- breadcrumb, and the short one ("Audio") for the bar. 010 creates the column
-- for a fresh install; this migration adds it to a site that ran the earlier
-- version of 010, where `tool_groups` was created without it. The panel writes
-- `short` on every save, so without the column saving a group fails with
-- "Unknown column 'short'".
--
-- Running it on a database that already has the column is harmless: the panel's
-- migrator reads "Duplicate column" as "the work is already done" and records
-- the file like any other.
-- ---------------------------------------------------------------------------

SET NAMES utf8mb4;

ALTER TABLE `tool_groups`
    ADD COLUMN `short` varchar(60) NOT NULL DEFAULT ''
        COMMENT 'the header bar; empty = use name'
        AFTER `name`;
