-- 007 — the brand in the database, not just in the code
--
-- The site was renamed from Omni to Onim in the code, but three settings live in
-- the database and win over the code: site_name, seo_title_suffix and
-- mail_from_name (Cms::setting() prefers the row). On a database installed before
-- the rename the tab title, the OG site name and every outgoing email still said
-- "Omni Calculator" no matter what the templates said. This migration moves them.
--
-- It is deliberately narrow: it only touches the three keys the brand lives in,
-- and only when the stored value still contains the old name, so a site that was
-- already renamed — or an operator who chose their own site name — is left alone.
-- Content an editor wrote (pages, posts) is not rewritten: a bulk REPLACE over
-- prose would corrupt words like "Omnicef" and "Omnibus".

-- A previous partial rename left "Onim Calculator" in some databases, and a
-- fresh install of the old release wrote "Omni Calculator". Both are the same
-- mistake: the brand carrying the other site's descriptor.
UPDATE `settings`
   SET `svalue` = 'Onim', `updated_at` = NOW()
 WHERE `skey` = 'site_name'
   AND (`svalue` LIKE '%Omni%' OR `svalue` LIKE 'Onim Calculator%');

UPDATE `settings`
   SET `svalue` = '| Onim', `updated_at` = NOW()
 WHERE `skey` = 'seo_title_suffix'
   AND (`svalue` LIKE '%Omni%' OR `svalue` LIKE '%Onim Calculator%');

UPDATE `settings`
   SET `svalue` = 'Onim', `updated_at` = NOW()
 WHERE `skey` = 'mail_from_name'
   AND (`svalue` LIKE '%Omni%' OR `svalue` LIKE 'Onim Calculator%');

-- The copyright sentence, wherever an editor typed the old name into it.
UPDATE `settings`
   SET `svalue` = REPLACE(REPLACE(`svalue`, 'Omni Calculator', 'Onim'), 'Onim Calculator', 'Onim'), `updated_at` = NOW()
 WHERE `skey` = 'footer_copyright'
   AND (`svalue` LIKE '%Omni Calculator%' OR `svalue` LIKE '%Onim Calculator%');

-- The same three keys, but as the installer seeds them when the rows are absent
-- altogether (a database restored from an older dump may be missing one).
INSERT INTO `settings` (`skey`, `svalue`, `sgroup`, `updated_at`)
SELECT 'site_name', 'Onim', 'general', NOW()
  FROM DUAL
 WHERE NOT EXISTS (SELECT 1 FROM `settings` WHERE `skey` = 'site_name');

INSERT INTO `settings` (`skey`, `svalue`, `sgroup`, `updated_at`)
SELECT 'seo_title_suffix', '| Onim', 'seo', NOW()
  FROM DUAL
 WHERE NOT EXISTS (SELECT 1 FROM `settings` WHERE `skey` = 'seo_title_suffix');

INSERT INTO `settings` (`skey`, `svalue`, `sgroup`, `updated_at`)
SELECT 'mail_from_name', 'Onim', 'email', NOW()
  FROM DUAL
 WHERE NOT EXISTS (SELECT 1 FROM `settings` WHERE `skey` = 'mail_from_name');

-- The footer's brand line, if the footer was given one during the old naming.
UPDATE `settings`
   SET `svalue` = REPLACE(`svalue`, 'Omni Calculator', 'Onim'), `updated_at` = NOW()
 WHERE `skey` IN ('site_tagline', 'footer_about')
   AND `svalue` LIKE '%Omni Calculator%';
