-- 003 — review state for panel-written articles
--
-- A custom calculator can now arrive with an article the importer drafted from
-- its own definition. That text is a starting point, so the row remembers that
-- it was machine-written and has not been read by a person: `drafted_at` is the
-- timestamp of the draft, `drafted_words` its length. Saving the calculator in
-- the editor clears both — a human has seen the text and taken ownership of it —
-- and the custom-calculator list can then filter for "needs review".

ALTER TABLE `custom_calculators`
    ADD COLUMN `drafted_at` datetime DEFAULT NULL AFTER `js`,
    ADD COLUMN `drafted_words` int(10) unsigned NOT NULL DEFAULT 0 AFTER `drafted_at`;
