# Deploying on Hostinger with Git — `mcqsgenerator.com/tool`

This guide is for the **Git deployment** route: Hostinger connects to
`github.com/laheef/tools-mcqsgenerator`, pulls `main` into `public_html/tool`, and
from then on **redeploys automatically every time you push**. You keep working in
Git; the server follows.

There is also a one-time zip route (Appendix A) if you ever need to install without
Git. Everything else — PHP settings, database, installer, checks — is identical.

> **One rule that decides whether the first deploy works:** Hostinger deploys into a
> folder that must be **empty or nonexistent**. So do **not** unzip the package into
> `public_html/tool` first. Let Git create that folder.
> If you already extracted something there: delete `public_html/tool` completely
> (it holds no user data yet), then continue.

---

## 1. What the Git workflow changes about this site

Five things behave differently from a folder you unpack once. The package was
adjusted for all of them, so you do not have to do anything — but you should know
why the guide says what it says.

| Topic | Zip route | Git route (this guide) |
|---|---|---|
| **`config.db.php`** | You upload it or the installer writes it | Installer writes it; it is **git-ignored**, so a redeploy does not overwrite it. **Back it up once** anyway (Step 7). |
| **`install/` and `admin/install.php`** | Delete after setup | **Do not delete** — a redeploy would bring them back. They are already blocked: `.htaccess` answers 403 for `install/`, and `admin/install.php` refuses to run once an administrator exists (it redirects to the login page). |
| **`.git` directory** | Does not exist | Hostinger leaves it in `public_html/tool/.git`. It is **denied by `.htaccess`** (`RewriteRule (^|/)\.git(/|$) - [F,L]`); without that rule your whole history — including any old credentials — would be downloadable. |
| **Empty runtime folders** | Created by the zip | A fresh clone has no `data/cache/`, `data/backups/`, `uploads/media/`. Those folders now **ship with a tracked `.gitkeep`**, and the code also creates them on demand. |
| **Developer files (`tools/`, `docs/`, `tests/`)** | Not shipped | They are in the repository, so they land on the server. Each of those folders ships a deny-all `.htaccess`; the root `.htaccess` also answers 403 for them. |

---

## 2. PHP settings (once)

hPanel → **Websites** → **Manage** → **Advanced** → **PHP Configuration**

1. **PHP 8.2** (8.1–8.4 all work; nothing below 8.1).
2. Extensions on: `pdo_mysql`, `mbstring`, `openssl`, `json`, `fileinfo`, `gd`,
   `curl`, `zip`.
3. Limits: `memory_limit` **256M**, `max_execution_time` **120**,
   `upload_max_filesize` / `post_max_size` **32M**.
4. Save.

---

## 3. Database (once)

hPanel → **Databases** → **MySQL Databases**

1. Create a database — Hostinger prefixes it, e.g. `u123456789_tool`.
2. Create a user with a strong password, all privileges on that database.
3. Note the four values:

```
Host      localhost
Database  u123456789_tool
User      u123456789_tool
Password  ____________________
```

You do **not** import SQL here — that comes in Step 6, after the files exist.

---

## 4. Connect the repository (once)

hPanel → **Websites** → **Manage** → **Advanced** → **Git**

1. Click **Connect with GitHub** and authorise the Hostinger app. Give it access to
   the `laheef/tools-mcqsgenerator` repository (public repository, so no deploy key
   or token is needed).
2. Pick the repository from the list → **Next**.
3. Deployment settings:
   - **Repository**: `laheef/tools-mcqsgenerator`
   - **Branch**: `main`
   - **Root directory**: `public_html/tool` ← the folder that becomes
     `https://mcqsgenerator.com/tool`. It must not exist yet, or must be empty.
4. Click **Deploy** and wait for the confirmation (a 100 MB tree over Hostinger's
   connection: expect 1–3 minutes on the first deploy).

Auto-deployment is **on** by default after the first deploy — every push to `main`
redeploys. You can pause it from the **Auto-deployment** dropdown, and
**Redeploy** pulls the latest commit on demand. **All deployments** lists every run
with its commit id and status.

### Check the files landed

hPanel → **Files** → **File Manager** → `public_html/tool` should now contain:

```
.htaccess   index.php   config.php   config.db.sample.php
admin/  assets/  data/  install/  lib/  templates/  uploads/
HOSTINGER-GUIDE.md  INSTALL.txt  README.md
```

The site will not work yet — there is no database connection. That is Step 6.

---

## 5. Files that stay out of Git (and why)

`.gitignore` in the repository root enforces this; nothing below is ever pushed.

| Path | Why | What it means on the server |
|---|---|---|
| `config.db.php` | Database password + 64-char application key | Written by the installer, survives redeploys |
| `config.local.php` | Optional per-install overrides | Created by hand if you need them |
| `data/cache/*` | Regenerated caches (only `.gitkeep` is tracked) | Recreated on demand |
| `data/backups/*` | SQL dumps contain password hashes (only `.gitkeep` is tracked) | Cron/panel backups stay on the server |
| `uploads/media/*` | Images you upload in the panel (only `.gitkeep` is tracked) | Stay on the server |

**Consequence to remember:** anything in that table exists *only* on the server.
A redeploy normally leaves untracked files alone, but if you ever
**disconnect/reconnect the repository**, Hostinger warns that the target directory
is overwritten — treat `config.db.php` and `uploads/media/` as something to back up
before doing that (Step 7 and Step 11).

---

## 6. Import the database and run the installer (once)

**a. Import**

hPanel → **Databases** → **phpMyAdmin** → select `u123456789_tool` → **Import** →
choose `public_html/tool/install/database.sql` (download it from File Manager first
if the upload picker is easier) → **Import**.

Expected: 26 tables, `custom_calculators` 210 rows, `pages` 6, `settings` 72,
`categories` 15, and `users` **empty** — you create your own account next.

**b. Installer**

Open **https://mcqsgenerator.com/tool/admin/install.php**

1. Server-check table at the top — everything green.
2. Database: host `localhost`, port `3306`, name/user/password from Step 3.
3. Administrator: your name, e-mail, password (twice).
4. **Install**.

It writes `config.db.php`, applies any missing migrations and creates your account.
Afterwards the installer is locked: visiting it again redirects to the login page.

> If the installer cannot write `config.db.php`, copy `config.db.sample.php` to
> `config.db.php`, fill in the four values plus a key from
> `php -r "echo bin2hex(random_bytes(32));"`, upload it, and reload the installer.

---

## 7. Back up the one file Git cannot restore

Download `public_html/tool/config.db.php` to your computer now, and keep it
somewhere safe with the database password. If it is ever lost, the panel goes dark
until it is restored or the installer is run again.

Also click **admin → Backups → Create backup** once you are signed in, so there is a
known-good dump in `data/backups/` before you publish anything.

---

## 8. HTTPS and hostname

1. hPanel → **Security** → **SSL** → the free certificate for `mcqsgenerator.com`
   must be **active**.
2. hPanel → **Advanced** → **HTTPS redirects** (or the *Force HTTPS* switch) → **On**.
3. Pick one host — `mcqsgenerator.com` **or** `www.mcqsgenerator.com` — and redirect
   the other to it.

The site loads no third-party resources: Tailwind, CSS, JS and fonts are all local,
so there is nothing to break under HTTPS.

---

## 9. Verify the deployment (10 minutes, do not skip)

Run this **after** Step 6 (import + installer). A file-only install answers most of
it too, but with 3 831 calculators instead of 4 041 and without the CMS pages,
because those rows come from `install/database.sql`.

| # | URL | Expected |
|---|---|---|
| 1 | `https://mcqsgenerator.com/tool/` | Home page, counter reads **4 041 calculators** (before the database import it reads **3 831** — the 210 panel-authored calculators live in MySQL, so this number is your proof the import worked) |
| 2 | `/tool/calculators` | Full catalogue, paginated |
| 3 | `/tool/math/percentage` | Put **25** in *What is: %*, **200** in *Of*, press Calculate → **Y = 50** |
| 4 | `/tool/biology/dog-age` | Biology calculator renders and calculates |
| 5 | `/tool/biology/cephalic-index` | A **database-authored** calculator: the page and its figure come from the CMS rows you imported. If it 404s, the import did not run. The image must load from `/tool/uploads/biology/…` |
| 6 | `/tool/about` · `/tool/contact` · `/tool/privacy` · `/tool/terms` | CMS pages; the contact form posts and shows the success note |
| 7 | `/tool/blog` | Blog index with the imported post |
| 8 | `/tool/search?q=bmi` | Results with live suggestions |
| 9 | `/tool/sitemap.xml` | XML, **4 065 `<loc>`**, every URL starting `https://mcqsgenerator.com/tool/` |
| 10 | `/tool/robots.txt` | `Allow: /tool/`, `Disallow: /tool/admin/`, `Sitemap: …/tool/sitemap.xml` |
| 11 | `/tool/admin/` | Sign-in form; wrong password refused; your account works |
| 12 | `/tool/assets/css/app.css` · `/tool/assets/js/vendor/tailwind.js` | 200, not 404 |
| 13 | `/tool/data/calc/math--percentage.json` | **403** |
| 14 | `/tool/install/database.sql` | **403** |
| 15 | `/tool/config.db.php` | **403/404** — never the contents |
| 16 | `/tool/.git/config` | **403** — this is the Git-specific check |
| 17 | `/tool/tools/` · `/tool/docs/` · `/tool/tests/` | **403** |
| 18 | `/tool/this-page-does-not-exist` | Branded 404, still styled |

In the panel: **Settings → General** save a change and see it on the site;
**Settings → SEO** open the live `robots.txt` / `sitemap.xml`; **Media → upload** an
image and confirm the URL starts with `/tool/uploads/media/`.

---

## 10. The update workflow (this is the point of all this)

### Every change from now on

```bash
git clone https://github.com/laheef/tools-mcqsgenerator.git
cd tools-mcqsgenerator

# ...edit lib/, templates/, assets/, data/ ...

git add -A
git commit -m "Explain what changed"
git push origin main
```

Hostinger picks the push up automatically (usually within a minute). Watch it under
hPanel → **Advanced** → **Git** → **All deployments**: the run shows the branch, the
**commit id** and the status.

No build step, no cache to clear by hand, no file uploads.

### After a deploy that touches the database

If the new code expects a column or table the database does not have yet, the
**admin dashboard shows a pending-migration banner with an Upgrade button** — click
it once. The site keeps working meanwhile (new queries are guarded), but the upgrade
is what finishes the job. Nothing else on the site needs a "run this script" step.

### If something looks stale

- PHP page cache: **admin → Settings → System** → save, or run `cron.php`
  (it clears `data/cache/*`). Saving any content also invalidates it by stamp.
- Browser: assets are cache-busted with `ASSET_VERSION`; if you changed CSS/JS,
  bump `ASSET_VERSION` in `config.php` in the same commit.

### Rolling back

hPanel → **Git** → **All deployments** shows previous commit ids, or from your
machine:

```bash
git revert <bad-commit>     # makes a new commit that undoes it
git push origin main        # deploys the revert
```

`git revert` (not `reset --force`) is the safe choice: the server only ever
fast-forwards.

### Optional: a release gate

If you do not want every push to go live, deploy from a `production` branch instead
of `main`:

```bash
git push origin main                 # normal work, not deployed
git push origin main:production      # publish: this is what Hostinger pulls
```

Set **Branch** to `production` in the hPanel Git screen once. Everything else is
unchanged.

---

## 11. Rules that keep Git deploys boring

1. **Never edit tracked files on the server** (File Manager / FTP). The next deploy
   overwrites them and the change is gone. Content belongs in the admin panel;
   code belongs in a commit.
2. **Do not delete `install/` or `admin/install.php`** — they come back on the next
   deploy. They are blocked and self-locking; that is enough.
3. **Keep your copy of `config.db.php`.** Back it up before disconnecting or
   changing the repository in hPanel.
4. **Do not commit `config.db.php`**, dumps from `data/backups/`, or anything under
   `uploads/media/`. `.gitignore` already stops you; if one ever gets in, rotate the
   application key *and* the database password, and treat the preview-link signing
   key as compromised.
5. **Watch for secrets in `data/`.** The catalogue is tracked; page-view, message
   and backup data are not.
6. **Commit `install/database.sql` only when you mean to.** It is the seed for a
   fresh install; a stale copy will restore stale content on a new server.

---

## 12. Troubleshooting — Git specific

| Symptom | Cause | Fix |
|---|---|---|
| Deploy fails with a message about the target directory | `public_html/tool` already contains files (for example an earlier zip extraction) | Delete the folder (or move it aside), then **Deploy** again. |
| Deploy succeeds, site 500s | `config.db.php` missing or unreadable | Re-run `/tool/admin/install.php` or restore the file from your backup; check `PHP Configuration` for `pdo_mysql`. |
| Site shows the old version after a push | Auto-deployment paused, or the push landed on another branch | hPanel → Git → check the branch and the Auto-deployment toggle; press **Redeploy**. |
| `403` on every page | `.htaccess` can't set `Options` on this host | PHP Configuration → LiteSpeed/Apache switch, or rename `.htaccess` to test; if that is it, remove the `Options -Indexes` block. |
| Images uploaded in the panel disappear after a deploy | `uploads/media/` was not preserved (only happens after a disconnect/reconnect) | Restore from your backup; in future back up that folder before touching the Git settings. |
| `/tool/.git/config` returns 200 | `.htaccess` not applied | Make sure `.htaccess` is in `public_html/tool/` (dot-files are hidden in File Manager → Settings → *Show hidden files*) and that mod_rewrite is on. Treat the history as exposed: rotate keys. |
| Memory error on `/tool/sitemap.xml` | `memory_limit` below ~64M | Set 256M. The sitemap needs ~26 MB. |
| Contact form says mail could not be sent | No SMTP configured | Settings → Email → SMTP host/user/password; or accept the *log* transport during testing. |

---

## 13. Optional: cron

hPanel → **Advanced** → **Cron Jobs**. The panel prints the exact command under
**Settings → System**; it recommends once a day:

```cron
0 3 * * * php /home/uXXXXXXX/domains/mcqsgenerator.com/public_html/tool/cron.php
```

One run publishes scheduled posts, prunes old rows and backups, writes a snapshot
into `data/backups/` (switchable off in Settings → System) and clears the page cache.
Without SSH, the same script answers over HTTP with the token from that screen:
`https://mcqsgenerator.com/tool/cron.php?token=THE_TOKEN`.

---

## Appendices

### A. One-time install without Git (zip)

1. Upload `mcqsgenerator-tool.zip` to `public_html`, **Extract** → creates `public_html/tool`.
2. Continue from Step 6 (database import → installer).
3. Then either leave it unmanaged, or connect it to Git later — but only after
   clearing the folder, as in Step 4, which means re-importing and re-running the
   installer. In practice: choose Git from the start, or stay with zip.

### B. A different folder name, or a real subdomain

`public_html/tool/.htaccess` — two paths:

```apache
RewriteBase /tool/                  →  RewriteBase /calculators/
ErrorDocument 404 /tool/index.php   →  ErrorDocument 404 /calculators/index.php
```

For a subdomain (`tool.mcqsgenerator.com`) whose document root **is** this folder:

```apache
RewriteBase /
ErrorDocument 404 /index.php
```

The base path is detected automatically as `''` in that setup. In hPanel, set
**Root directory** to the subdomain's folder instead of `public_html/tool`.

### C. Running it locally first

```bash
git clone https://github.com/laheef/tools-mcqsgenerator.git
cd tools-mcqsgenerator
php -S 127.0.0.1:8080 router.php      # http://127.0.0.1:8080/
```

A database is optional locally; the catalogue, articles and pages come from `data/`.
Create `config.db.php` only if you want the admin panel.

### D. What is in the repository

```
index.php  api.php  cron.php     front controller, JSON endpoints, scheduled jobs
admin/                           panel (own front controller + assets)
lib/  templates/  modules/       engine, views, page modules
assets/                          css, js (incl. vendored Tailwind), images
data/calc/                       catalogue: sharded NDJSON + manifest + supplements
data/content/                    one article per calculator
install/database.sql             schema + content for a fresh install
uploads/                         media (biology figures, uploads/media)
tools/  docs/  tests/            dev toolchain, docs, test suites (denied on the server)
.htaccess                        rewrites for /tool + the deny rules above
HOSTINGER-GUIDE.md               this file
```

### E. One-page summary

1. PHP 8.2 + `pdo_mysql`/`mbstring`/`openssl`/`fileinfo`/`gd`, memory 256M.
2. Create the database and its user in hPanel.
3. Git → Connect with GitHub → repo `laheef/tools-mcqsgenerator`, branch `main`,
   root `public_html/tool` (empty!) → **Deploy**.
4. phpMyAdmin → import `tool/install/database.sql`.
5. Open `/tool/admin/install.php` → database + your admin account.
6. Download `config.db.php` somewhere safe.
7. Force HTTPS, choose www or non-www.
8. Walk the 18-row check in Step 9 — including `/tool/.git/config` → 403.
9. Submit `/tool/sitemap.xml` to Google and Bing.
10. From now on: `git push origin main` and the site updates itself.
