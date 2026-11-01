# Installing the calculator site on Hostinger at `mcqsgenerator.com/tool`

Everything in this guide has been tested end-to-end: the zip was extracted into an
empty folder, the SQL file imported into an empty database, the installer run, the
admin panel signed into, and every public URL in the checklist below re-checked on
the extracted copy — served from a `/tool` prefix, exactly like your target URL.

**What you have**

| File | Size | What it is |
|---|---|---|
| `mcqsgenerator-tool.zip` | 25 MB (≈4 800 files, 95 MB unpacked) | The finished site. Extracts to a single `tool/` folder. |
| this document | — | Step-by-step install + checks + troubleshooting. |

**What the site is:** 4 041 working calculators (320 of them biology) across 14
categories, with generated articles, search, blog, contact form, sitemap, robots,
and a full admin panel (pages, posts, calculators, media, menu, SEO, settings,
backups). Plain PHP — no build step, no Node, no composer, no cron required.

---

## 0. Before you start (5-minute checklist)

- [ ] hPanel login for `mcqsgenerator.com`.
- [ ] The domain already points at your Hostinger hosting and shows *something*
      (even the default page) when you open `https://mcqsgenerator.com`.
- [ ] You can open **File Manager** (hPanel → **Websites** → **Manage** → **Files**
      → **File Manager**).
- [ ] You know your **public_html** folder. For the main domain it is
      `/home/uXXXXXXX/domains/mcqsgenerator.com/public_html`.
- [ ] Decide the folder name. This guide uses **`tool`** — the site lives at
      `public_html/tool/`. If you use another name, three lines in `.htaccess`
      must change (see Appendix C).

> **Subdomain vs subfolder.** `mcqsgenerator.com/tool` is a *folder*, not a
> subdomain. If one day you want `tool.mcqsgenerator.com` instead, that is a real
> subdomain: point it at the same `public_html/tool` folder (or a copy) and change
> the same `.htaccess` lines — Appendix C has the exact text. Nothing else in the
> site would need to change.

---

## 1. Set the PHP version and extensions

hPanel → **Websites** → **Manage** → **Advanced** → **PHP Configuration**

1. **PHP version: 8.2** (8.1 and 8.3 are fine; 8.4 also works. Anything below 8.1
   will not run this code.)
2. Make sure these extensions are enabled (they are on by default at Hostinger):
   `pdo_mysql`, `mbstring`, `openssl`, `json`, `fileinfo`, `gd`, `curl`, `zip`.
3. Recommended limits (raise them if the panel offers the option):
   - `memory_limit` = **256M** (the site runs in ~40 MB; 256M is comfortable)
   - `max_execution_time` = **120**
   - `upload_max_filesize` = **32M**, `post_max_size` = **32M**
     (needed if you upload big images through the media library)
4. Save. The settings apply per domain, immediately.

> The installer checks all of this for you in Step 6 and prints a red/green table,
> so you cannot get it subtly wrong — but setting it up front avoids a second pass.

---

## 2. Create the database

hPanel → **Databases** → **MySQL Databases**

1. **Create a new database.** Hostinger prefixes everything with your account
   name, e.g. database `u123456789_tool`.
2. **Create a database user** with a strong password (or reuse an existing user).
   Example user: `u123456789_tool`.
3. Give the user **all privileges on that database** (Hostinger does this when you
   create the user from this screen).

Write these four values down — you need them in Step 6:

```
Host      localhost            ← always this on Hostinger
Database  u123456789_tool
User      u123456789_tool
Password  ____________________
```

> The site does run without a database, but then the admin panel is disabled and
> the About/Privacy/Terms/Blog pages come from the files only. Use the database.

---

## 3. Upload and extract

hPanel → **Websites** → **Manage** → **Files** → **File Manager**

1. Open **`public_html`** (not `public_html/tool` — it does not exist yet).
2. Click **Upload**, choose `mcqsgenerator-tool.zip`, wait for 100 %.
3. Right-click the uploaded `mcqsgenerator-tool.zip` → **Extract**.
   - Destination: the current folder (`public_html`).
   - The archive contains a single top-level folder named **`tool`**, so you get
     `public_html/tool/index.php`, `public_html/tool/admin/…`, and so on.
4. Confirm the layout:

```
public_html/
├── index.php                ← whatever already runs mcqsgenerator.com
└── tool/
    ├── .htaccess            ← very important, must be here
    ├── index.php
    ├── config.php
    ├── config.db.sample.php
    ├── admin/  (index.php, install.php, assets/, lib/, views/)
    ├── assets/ (css/, js/, img/)
    ├── data/   (calc/, content/, pages/, engagement/)
    ├── install/database.sql
    ├── uploads/ (biology/, media/)
    ├── lib/, templates/, modules/
    └── INSTALL.txt, README.md
```

5. **Delete the zip** afterwards (right-click → Delete) to save 25 MB.

### Permissions

The extractor normally sets these correctly. If you upload with SFTP instead, set:

- folders `755`, files `644`
- `public_html/tool/uploads/` and `public_html/tool/data/cache/` must be
  **writable by PHP** (755 is enough on Hostinger; 775 if you run into trouble).

---

## 4. Import the database

hPanel → **Databases** → **phpMyAdmin** → select `u123456789_tool` on the left.

1. Open the **Import** tab.
2. **Choose file** → `public_html/tool/install/database.sql` (you can download it
   from File Manager first and upload it in phpMyAdmin, which is usually faster).
3. Leave everything default (UTF-8, no partial import), click **Import**.
4. You should see *"Import has been successfully finished"* and these tables:
   `pages` (6 rows), `posts`, `custom_calculators` (210), `settings` (72),
   `categories` (15), `menu_items`, `homepage_sections`, `tags`, `redirects`,
   `schema_migrations`, plus empty ones for messages, media, activity.

> The dump contains **no user account**. You create your own administrator in the
> next step — nothing from the build machine ships with it.

**Prefer the command line?** (SFTP/SSH access, much faster for a 3 MB dump)

```bash
mysql -u u123456789_tool -p u123456789_tool < public_html/tool/install/database.sql
```

---

## 5. Run the installer

Open in your browser:

**https://mcqsgenerator.com/tool/admin/install.php**

1. The top of the page is a **server check** — PHP version, extensions, writable
   folders. Everything should be green. A red line tells you exactly what to fix
   (usually an extension in PHP Configuration).
2. Fill in **Database**: host `localhost`, port `3306`, the database name, user
   and password from Step 2.
3. Fill in **Administrator**: your name, your e-mail, a strong password (twice).
   This is the account you will sign in with.
4. Click **Install**.

What happens behind the scenes:

- it writes `public_html/tool/config.db.php` (credentials + a freshly generated
  64-character application key — keep this file private and back it up);
- it applies any database migrations the dump does not already contain;
- it creates your administrator account and makes sure the default settings,
  categories and pages exist.

You land on **`https://mcqsgenerator.com/tool/admin/`** → a sign-in form.

> **If the installer cannot write `config.db.php`** (some hosts block PHP file
> writes): download `config.db.sample.php`, rename it to `config.db.php`, fill in
> the four database values plus a key from
> `php -r "echo bin2hex(random_bytes(32));"`, upload it next to `config.php`, then
> reload the installer page. It will detect the file and continue with the
> migrations and the account.

---

## 6. First sign-in and a look around

1. Sign in at `/tool/admin/` with the account you just created.
2. You should see the dashboard with the catalogue counters.
3. Check these five screens (all read from the database, so they prove the import
   worked): **Pages**, **Blog**, **Calculators**, **Media**, **Settings → General**.
4. Click **View site** (top right) — it must open `https://mcqsgenerator.com/tool/`,
   not the domain root.

---

## 7. Lock the installation

1. In File Manager, delete the folder **`public_html/tool/install/`** (the SQL
   file has done its job; `.htaccess` already blocks it, deleting is belt-and-braces).
2. Delete the file **`public_html/tool/admin/install.php`**.
   After an administrator exists it refuses to run anyway (it redirects to the
   sign-in page), but removing it closes the door completely.
3. Keep **`config.db.php`** — but never share it, and never let it be served:
   `.htaccess` already denies it, which you can confirm in Step 8.

---

## 8. Verify the live site (10 minutes, do not skip)

Open each URL and compare with the **Expected** column. This is the exact matrix
the package was tested against on a fresh extraction.

| # | URL | Expected |
|---|---|---|
| 1 | `https://mcqsgenerator.com/tool/` | Home page, header search, category bar, footer; the counter says **4 041 calculators** |
| 2 | `/tool/calculators` | Full catalogue, paginated, all categories |
| 3 | `/tool/math/percentage` | Calculator page; put **25** in *What is: %* and **200** in *Of*, press **Calculate** → **Y = 50** |
| 4 | `/tool/biology/dog-age` | Biology calculator renders and calculates |
| 5 | `/tool/biology/cephalic-index` | Article image loads (it is in `uploads/biology/`) — proves media URLs survived the `/tool` prefix |
| 6 | `/tool/finance/mortgage` | Long calculator page, formula and worked example visible |
| 7 | `/tool/about`, `/tool/contact`, `/tool/privacy`, `/tool/terms` | CMS pages from the database; the contact form posts and shows the success note |
| 8 | `/tool/blog` | Blog index with the imported post |
| 9 | `/tool/search?q=bmi` | Search results with suggestions while typing |
| 10 | `/tool/sitemap.xml` | XML, **4 065 `<loc>` entries**, every URL starting `https://mcqsgenerator.com/tool/` |
| 11 | `/tool/robots.txt` | `Allow: /tool/`, `Disallow: /tool/admin/`, `Disallow: /tool/uploads/*.php`, `Sitemap: …/tool/sitemap.xml` |
| 12 | `/tool/admin/` | Redirects to the sign-in form; wrong password is refused |
| 13 | `/tool/assets/css/app.css`, `/tool/assets/js/app.js`, `/tool/assets/js/vendor/tailwind.js` | Served (200), not 404 |
| 14 | `/tool/data/calc/math--percentage.json` | **403** — internals are blocked |
| 15 | `/tool/install/database.sql` | **403** (or 404 once you deleted the folder) |
| 16 | `/tool/config.db.php` | **403/404** — never the file contents |
| 17 | `/tool/this-page-does-not-exist` | Branded **404** page, still fully styled |

Then, in the admin panel:

| # | Where | Expected |
|---|---|---|
| 18 | Settings → General | Save a change (e.g. tagline) → the public page shows it immediately |
| 19 | Settings → SEO | The preview of `robots.txt` / `sitemap.xml` opens the live files |
| 20 | Pages → edit *About* → save | The page updates on the site; the change appears in the database |
| 21 | Media → upload an image | Uploads into `uploads/media/`, thumbnail appears, the URL in the panel starts with `/tool/uploads/` |

---

## 9. HTTPS, www and canonical URLs

1. hPanel → **Security** → **SSL** → make sure the free certificate for
   `mcqsgenerator.com` is **active**. If you just added the domain, wait for it.
2. Force HTTPS: hPanel → **Websites** → **Manage** → **Advanced** → **HTTPS
   redirects** (or the "Force HTTPS" switch) → **On**.
3. Choose one hostname — `mcqsgenerator.com` **or** `www.mcqsgenerator.com` — and
   redirect the other to it. hPanel does this with the same switch; the canonical
   tags and the sitemap will then always advertise the host that served the page.
4. Reload `/tool/` over `https://` and confirm there is no mixed-content warning
   (the site loads no third-party resources at all: Tailwind, CSS and JS are local,
   fonts are system fonts).

Optional but useful, if you want an explicit pin (e.g. behind a proxy that hides
the real host), create `public_html/tool/config.local.php`:

```php
<?php
return [
    'site_url'  => 'https://mcqsgenerator.com/tool',
    'base_path' => '/tool',
];
```

The site detects both values by itself; the file only forces them. Add
`'debug' => true,` to it temporarily when you need to see a PHP error instead of a
blank page — and remove it afterwards.

---

## 10. Tell search engines

1. **Google Search Console** → add the property `mcqsgenerator.com`
   (domain or URL-prefix; verify with the DNS/HTML method Hostinger supports).
2. **Sitemaps** → submit `https://mcqsgenerator.com/tool/sitemap.xml`.
3. **Bing Webmaster Tools** → same sitemap URL.
4. Open `/tool/robots.txt` once and check it lists the sitemap with the `/tool`
   prefix. (It does — that is one of the things fixed for this deployment: a bare
   `Disallow: /admin/` would have left `/tool/admin/` crawlable.)
5. Expect the first crawls within a day or two. The site is fast (pages are plain
   PHP + one CSS file, ~130 KB of HTML) and every page carries canonical,
   Open Graph and JSON-LD data.

---

## 11. Optional: cron jobs

The site works without cron. Two jobs are worth adding if you want them:

hPanel → **Advanced** → **Cron Jobs**. The admin panel prints the exact command
under **Settings → System** (it knows its own path); the panel's recommendation is
once a day:

```cron
0 3 * * * php /home/uXXXXXXX/domains/mcqsgenerator.com/public_html/tool/cron.php
```

One run does all of it, idempotently, and prints what it changed: publishes
scheduled posts, deletes expired rate-limit rows and old activity/page-view rows,
prunes old backups, writes a database snapshot into `data/backups/` (switch it off
with **Settings → System → "Write a database snapshot on every cron run"**), and
clears the page cache.

You can run it by hand at any time (`php cron.php` over SSH, or add `--dry-run` to
count without deleting). If you have no SSH access, the same script answers over
HTTP with the token from **Settings → System**:

```
https://mcqsgenerator.com/tool/cron.php?token=THE_TOKEN
```

The **Backups** screen in the panel can also create and download a dump on demand.

---

## 12. Troubleshooting

| Symptom | Cause | Fix |
|---|---|---|
| **500 on every page** | `.htaccess` not allowed to set `Options`, or PHP version too old | PHP Configuration → 8.2. If it persists, temporarily rename `.htaccess` to `.htaccess.off`: if the site then works, your host disallows `Options` — remove the `Options -Indexes` block. |
| **Blank white page** | A PHP error with display off | Add `'debug' => true,` to `config.local.php` (Step 9) and reload; the real message appears. |
| **Home page works, `/tool/math/percentage` 404s** | `mod_rewrite` is not applying the rewrite | Check `.htaccess` exists in `public_html/tool/` (dot-files can be hidden — File Manager → Settings → Show hidden files) and that `RewriteBase /tool/` matches the folder name. |
| **Every asset 404s, page unstyled** | The site is being served from the wrong prefix | Open the page source and look at the `href` of `app.css`. It must start with `/tool/assets/`. If it starts with `/assets/`, the folder is not `/tool` — either rename it or change `RewriteBase`. |
| **Links jump to the domain root** | Same cause as above; the prefix is detected from the request | Fix the folder name / `RewriteBase`, or pin `base_path` in `config.local.php`. |
| **`/tool/admin/` bounces between login and dashboard** | Cookies are blocked for the path, or the site is on http while the panel is on https | Force HTTPS; clear cookies for the domain; check that no other app sets `PHPSESSID` (this site uses `omni_sid`). |
| **"Could not connect: …" in the installer** | Wrong host/user/pass, or the user lacks privileges | Host is `localhost`; re-check the `u123456789_` prefix on both the database and the user name. |
| **Installer is read-only / cannot write `config.db.php`** | PHP cannot write in the folder | Create `config.db.php` by hand from `config.db.sample.php` (Step 5, note). |
| **`/tool/sitemap.xml` 500** | `memory_limit` too low (old builds needed 450 MB; this build needs ~26 MB) | Set `memory_limit` to 256M. If it still fails, delete `data/cache/*` and reload once. |
| **Images in articles are broken** | `uploads/` was not uploaded, or its permissions are wrong | Check `public_html/tool/uploads/biology/` exists and is `755`. |
| **A page shows "not published"** | It is a draft in the CMS | Admin → Calculators/Pages → publish it. |
| **Changes in the panel do not show on the site** | Front-end page cache (300 s by default) | Saving invalidates it via a content stamp; if something looks stale, delete the `*.json` files in `tool/data/cache/` or run `cron.php` (it clears them). |

---

## 13. Maintenance

- **Back up** before and after any change: admin → **Backups** → *Create backup*
  (writes a `.sql` into `data/backups/`, downloadable), plus a download of
  `config.db.php` and any uploaded media. Hostinger also keeps daily backups of
  the account under **Files → Backups**.
- **Update content** — Pages, Posts, Calculators, Media, Menu, Homepage sections,
  SEO and Settings are all editable in the panel; nothing needs to be re-uploaded.
- **Never** edit `data/calc/*.ndjson` by hand — that is the harvested catalogue and
  it is verified per request.
- **Keep** `config.db.php` out of any archive you share.
- **Moving the folder** (e.g. `tool` → `calculators`): rename it, edit the two
  `/tool` paths in `.htaccess`, delete `config.local.php` if you created one, and
  clear `data/cache/`. The site re-detects its prefix on the next request.

---

## 14. Appendix — what is inside

### A. The zip

```
tool/
├── .htaccess               rewrite rules for the /tool prefix, cache headers,
│                           deny rules (config, data, install, uploads/*.php)
├── index.php               front controller: home, category, calculator,
│                           search, all-calculators, blog, tag, page, contact,
│                           sitemap.xml, robots.txt, 404
├── api.php                 JSON endpoints (search suggestions, counts, likes,
│                           reviews, contact form)
├── cron.php                scheduled publishing, cache, backups
├── config.php              site config: name, asset version, base-path detection
├── config.db.sample.php     template for the credentials file
├── admin/                  the panel (its own front controller, assets, lib)
│   └── install.php         first-run installer (delete after use)
├── assets/                 css/app.css, js/app.js, js/calc.js, js/live-counts.js,
│                           js/vendor/tailwind.js (local build), img/
├── data/
│   ├── calc/               the catalogue: sharded NDJSON + manifest + supplements
│   ├── content/            articles, one JSON per calculator
│   ├── pages/              file-based fallback for About/Privacy/Terms/FAQ
│   ├── engagement/         likes/reviews baseline
│   └── cache/              created at runtime (writable)
├── install/database.sql    the database import (Step 4) — delete after use
├── lib/, templates/, modules/
├── uploads/                media (biology figures, uploads/media)
├── INSTALL.txt             the short version of this guide
└── README.md               developer notes
```

### B. Why the prefix "just works"

Three things had to be true for a site that was developed at a domain root:

1. **Links and assets** — every URL is built through `site_base()`, which now
   cross-checks `SCRIPT_NAME` against `REQUEST_URI` (a rewrite can leave the first
   one pointing at `/tool/math`), with `DOCUMENT_ROOT` as a second opinion. Admin
   links, media URLs and the logo/favicon settings follow the same rule.
2. **Content HTML** — article bodies contain `/uploads/…` paths written in the
   editor; they are re-prefixed at render time (and only when needed), so they do
   not escape to the domain root.
3. **`robots.txt` and `sitemap.xml`** — both are generated with the full base path
   (`Allow: /tool/`, `Disallow: /tool/admin/`, every `<loc>` starts with
   `…/tool/`). The sitemap no longer decodes all 4 041 definitions to get a
   `lastmod` (that cost 450 MB and would have 500'd on a shared host); it streams
   the dates and peaks at ~26 MB.

### C. Using a different folder name, or a real subdomain

`public_html/tool/.htaccess`, three paths:

```apache
RewriteBase /tool/            →  RewriteBase /calculators/
ErrorDocument 404 /tool/index.php  →  ErrorDocument 404 /calculators/index.php
```

For a subdomain such as `tool.mcqsgenerator.com` whose document root *is* this
folder:

```apache
RewriteBase /
ErrorDocument 404 /index.php
```

Nothing else changes — the base path is detected as `''` in that setup.

### D. Running it locally first (optional)

```bash
cd tool
php -S 127.0.0.1:8080 router.php      # http://127.0.0.1:8080/
```

`router.php` emulates the `.htaccess` rewrite for the built-in server. A database
is optional locally; create `config.db.php` only if you want the admin panel.

---

## 15. One-page summary

1. PHP 8.2 + `pdo_mysql`/`mbstring`/`openssl`/`fileinfo`/`gd`.
2. Create database + user in hPanel (`localhost`).
3. Upload `mcqsgenerator-tool.zip` to `public_html`, extract → `public_html/tool/`.
4. phpMyAdmin → Import `tool/install/database.sql`.
5. Open `/tool/admin/install.php` → database details + your admin account.
6. Delete `tool/install/` and `tool/admin/install.php`.
7. Force HTTPS, pick www or non-www.
8. Walk the checklist in Step 8.
9. Submit `/tool/sitemap.xml` to Google and Bing.
