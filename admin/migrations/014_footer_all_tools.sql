-- ---------------------------------------------------------------------------
-- Onim — admin panel schema (migration 014)
--
-- The footer learns where the tools are.
--
-- Every band on the home page and every section page ends in a "Browse all 4
-- image tools" button that lands on /all-tools, and the sitemap lists all
-- sixteen of those addresses. The footer was the one navigation surface that
-- did not: its Resources column offered All calculators, Search and Blog, so a
-- visitor who scrolled to the bottom instead of the top had no way through to
-- the tools at all.
--
-- The link goes into the Resources column, right after "All calculators", and
-- only when that column exists and does not already carry it — running this on
-- a site that has the link by hand does nothing. The footer stays editable in
-- the panel: this adds one row to `menu_items`, it does not lock the column.
--
-- The front end does not wait for this file. templates/partials/footer.php adds
-- the same link at render time when the column has no row for it, so the page
-- is right on a database that has not run migrations yet; this migration is
-- what puts it in front of the owner in Header & footer, where it can be
-- renamed, moved or deleted. Deleting it there is respected only together with
-- Settings → Footer → "Link the tools index", which is the switch that decides
-- whether a missing link is restored.
-- ---------------------------------------------------------------------------

SET NAMES utf8mb4;

INSERT INTO `menu_items`
    (`location`, `footer_column_id`, `label`, `url`, `sort_order`, `enabled`, `target`, `created_at`)
SELECT 'footer_column', c.`id`, 'All tools', '/all-tools', 15, 1, '_self', NOW()
FROM `footer_columns` c
WHERE c.`skey` = 'site-resources'
  AND NOT EXISTS (
      SELECT 1 FROM `menu_items` m
      WHERE m.`location` = 'footer_column'
        AND m.`footer_column_id` = c.`id`
        AND m.`url` = '/all-tools'
  )
LIMIT 1;
