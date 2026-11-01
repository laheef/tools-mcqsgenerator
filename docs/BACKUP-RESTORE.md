# Backups and restore

Two kinds of data live in this site, and they need two kinds of backup:

| Data | Where | Backed up by |
| --- | --- | --- |
| Calculators, categories, articles, settings, menus, pages, posts, media records, inbox, users | MySQL | **Backups → Dump database** (or the nightly cron) |
| Formulas and harvested content (`data/calc`, `data/content`), uploads, templates | the filesystem | **Backups → File archive**, or your host's file backup |

Neither one is enough on its own: restoring the database without the uploads gives
broken images, and restoring the files without the database loses everything the
panel wrote.

---

## Taking a backup

**Panel → Backups → Dump database now.** You get a `.sql` file in `data/backups/`,
a row in the `backups` table (size, checksum, who, when, note) and a download link.

The dump is a real SQL script: `CREATE TABLE` for every table, then `INSERT` per
row, wrapped in `SET FOREIGN_KEY_CHECKS=0`. It is what `mysqldump` would write for
this schema, minus the locking that shared hosting does not allow.

**File archive** zips `data/` (minus `cache/`), `templates/`, `assets/`, `lib/`,
`uploads/` and `docs/` — everything needed to redeploy the site content beside the
database.

Retention: Settings → System → *Backups to keep* (default 10). Cron prunes the
oldest beyond that on every run.

### Automate it

```
0 3 * * *  /usr/bin/php /home/u123456789/domains/example.com/public_html/cron.php
```

The nightly run writes one database dump and prunes the rest. Keep a copy off the
host: hPanel → File Manager → download the newest `data/backups/db-*.sql`, or point
your own script at the panel's download URL while signed in.

## Restoring

**Panel → Backups → Restore** (POST, confirmation required).

The panel only restores files it wrote itself: it verifies the `-- Onim Calculator
admin panel` signature line and the checksum in the `backups` row. A foreign `.sql`
dropped into `data/backups/` is refused, because restoring an arbitrary script means
running arbitrary SQL as the database user.

Restoring:

1. takes an automatic safety dump of the current state first,
2. wraps the import in a transaction where the engine allows DDL to roll back
   (MariaDB does not for `CREATE TABLE`, so the safety dump is the real net),
3. replays the file statement by statement, reporting the first failure with its
   statement number,
4. clears the settings/content caches and writes an `activity_log` entry.

### Restore by hand (phpMyAdmin)

If the panel is unreachable (a bad source-file edit, a broken login), use hPanel →
**Databases → phpMyAdmin**:

1. Select the database → **Import** → choose `db-*.sql` → **Go**.
2. If the import complains about existing tables, tick *"Allow interruption of the
   import in case the script execution time is reached"* and re-run, or drop the
   tables first (`DROP TABLE` list is printed at the top of the dump file).
3. Open `https://your-domain.com/admin/index.php` and sign in with the credentials
   that existed when the dump was taken.

### Restore the files

Upload the archive contents over the site, keeping `config.db.php` (it holds the
database password and the application key — if the key changed, stored secrets and
preview links stop working). After a file restore, the panel's Source files screen
shows the restored versions, and its version history is intact because it lives in
the database.

## Disaster recovery, end to end

```bash
# 1. fresh host, empty public_html
# 2. upload the code (no config.db.php, no data/cache)
# 3. create the database in hPanel
# 4. run /admin/install.php → it creates the schema and the first admin
# 5. panel → Backups → upload/import the newest db-*.sql, then Restore
# 6. upload the file archive (uploads/, data/content, data/calc, templates/)
# 7. re-check: /, a calculator, /blog, /contact, then send a test email
```

Step 4 is only needed to get a working `config.db.php` and an account to sign in
with; the restore overwrites the seeded rows with your real data.

## What is *not* in a database dump

* `config.db.php` — the credentials and the application key. Keep it in a password
  manager; without the key, the encrypted SMTP password must be re-entered (nothing
  else is affected).
* Uploaded media — see the file archive.
* Anything in `data/` that the panel did not write, i.e. the harvested catalogue. It
  ships with the code and can be regenerated, but back it up if you edited any of it
  by hand.

## Verifying a backup actually works

A backup you have never restored is a hope. Once, right after the first install:

1. Dump the database.
2. Change the site name in Settings.
3. Restore the dump.
4. Reload the homepage: the old name must be back.

The test suite does exactly this on every run
(`/home/user/tools/php.sh tests/e2e_panel.php`, section 21).
