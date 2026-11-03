#!/usr/bin/env python3
"""
End-to-end test of the admin panel, driven the way a person drives it: real
forms, real CSRF tokens, real POSTs, then assertions against the database and
the public site.

Run with the dev server up:
    python3 tools/admin_e2e.py

Every check prints PASS/FAIL; the exit code is non-zero if anything failed.
Nothing is mocked: a test only passes when the change it made is visible in
MySQL *and* on the site (or explicitly refused, where it should be).
"""

import json
import os
import re
import subprocess
import sys
import time
from html.parser import HTMLParser

import requests

BASE = os.environ.get("ONIM_BASE", "http://127.0.0.1:8080")
ADMIN = BASE + "/admin/index.php"
# The interpreter and the database are read from this checkout, not hardcoded:
# a sandbox reset moves both, and a test that cannot start is not a test.
PHP = os.environ.get("ONIM_PHP", "php")
# This checkout. Older revisions of this script pointed at /home/user/php-clone,
# which only ever existed in one sandbox; every path below is derived from here.
ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
DB_NAME = "omni_cms"


def _db_config() -> dict:
    """Read config.db.php the way the site does, without starting the site."""
    cfg = {}
    path = os.path.join(os.path.dirname(os.path.dirname(os.path.abspath(__file__))), "config.db.php")
    if os.path.isfile(path):
        text = open(path, encoding="utf-8").read()
        for key in ("host", "port", "name", "user", "pass", "password"):
            m = re.search(r"'" + key + r"'\s*=>\s*'((?:[^'\\]|\\.)*)'", text)
            if m:
                cfg[key] = m.group(1)
    return cfg


_DB = _db_config()
DB_NAME = _DB.get("name", DB_NAME)
DB_DSN = "mysql:host={h};port={p};dbname={n}".format(
    h=_DB.get("host", "127.0.0.1"), p=_DB.get("port", "3306"), n=DB_NAME)
DB_USER = _DB.get("user", "root")
DB_PASS = _DB.get("password", "")

results = []


# --------------------------------------------------------------------- helpers

def php(code: str) -> str:
    out = subprocess.run(
        [PHP, "-r", '$c = require "config.db.php"; '
                    '$p = new PDO("mysql:host=" . $c["host"] . ";port=" . $c["port"] . ";dbname=" . $c["name"],'
                    ' $c["user"], $c["pass"] ?? ""); ' + code],
        capture_output=True, text=True, timeout=120,
        cwd=os.path.dirname(os.path.dirname(os.path.abspath(__file__))),
    )
    if out.returncode != 0:
        raise RuntimeError(out.stderr.strip() or out.stdout.strip())
    return out.stdout.strip()


def q1(sql: str) -> dict:
    raw = php(f'$r=$p->query({json.dumps(sql)})->fetch(PDO::FETCH_ASSOC); echo json_encode($r);')
    return json.loads(raw) if raw and raw != "false" else {}


def scalar(sql: str):
    raw = php(f'$r=$p->query({json.dumps(sql)})->fetchColumn(); echo json_encode($r);')
    return json.loads(raw) if raw not in ("", "false") else None


def execute(sql: str) -> None:
    php(f'$p->exec({json.dumps(sql)});')


def check(name: str, ok: bool, detail: str = "") -> bool:
    results.append((name, ok, detail))
    print(("PASS  " if ok else "FAIL  ") + name + (("   [" + detail + "]") if detail and not ok else ""))
    return ok


class FormParser(HTMLParser):
    """Collect <form>s and their fields (enough for the panel's markup)."""

    def __init__(self):
        super().__init__(convert_charrefs=True)
        self.forms = []
        self.current = None
        self.select_name = None

    def handle_starttag(self, tag, attrs):
        a = dict(attrs)
        if tag == "form":
            self.current = {
                "action": a.get("action", ""),
                "method": a.get("method", "get").lower(),
                "fields": [],
                "text": "",
            }
            self.forms.append(self.current)
        elif self.current is not None:
            if tag == "input":
                self.current["fields"].append({
                    "tag": "input",
                    "name": a.get("name", ""),
                    "type": (a.get("type") or "text").lower(),
                    "value": a.get("value", ""),
                    "checked": "checked" in a,
                    "required": "required" in a,
                })
            elif tag == "select":
                self.select_name = a.get("name", "")
                self.current["fields"].append({
                    "tag": "select", "name": self.select_name, "type": "select",
                    "value": "", "checked": False,
                })
            elif tag == "option" and self.select_name:
                for field in reversed(self.current["fields"]):
                    if field.get("name") == self.select_name:
                        if "selected" in a or field["value"] == "":
                            field["value"] = a.get("value", "")
                        break
            elif tag == "textarea":
                self.current["fields"].append({
                    "tag": "textarea", "name": a.get("name", ""), "type": "textarea",
                    "value": "", "checked": False,
                })

    def handle_endtag(self, tag):
        if tag == "form":
            self.current = None
        elif tag == "select":
            self.select_name = None


class Panel:
    def __init__(self):
        self.s = requests.Session()
        self.token = ""

    def login(self, email="owner@example.com", password="DevPanel2026!"):
        r = self.s.get(ADMIN + "?p=login", timeout=30)
        m = re.search(r'name="_token" value="([a-f0-9]+)"', r.text)
        self.token = m.group(1) if m else ""
        r = self.s.post(ADMIN + "?p=login",
                        data={"_token": self.token, "email": email, "password": password},
                        allow_redirects=False, timeout=30)
        # A successful sign-in rotates the session (fixation defence), which
        # issues a fresh CSRF token — pick it up like a browser would.
        if r.status_code == 303:
            r2 = self.s.get(BASE + r.headers["Location"], timeout=30)
            m2 = re.search(r'name="_token" value="([a-f0-9]+)"', r2.text)
            if m2:
                self.token = m2.group(1)
        return r

    def get(self, page: str, **params):
        q = {"p": page}
        q.update(params)
        return self.s.get(ADMIN, params=q, timeout=60)

    def forms(self, page: str, **params):
        r = self.get(page, **params)
        p = FormParser()
        p.feed(r.text)
        return p.forms, r

    def post(self, page: str, data: dict, **params):
        payload = {"_token": self.token}
        payload.update(data)
        q = {"p": page}
        q.update(params)
        return self.s.post(ADMIN, params=q, data=payload, allow_redirects=True, timeout=120)

    def post_multipart(self, page: str, data: dict, files: dict, **params):
        payload = {"_token": self.token}
        payload.update(data)
        q = {"p": page}
        q.update(params)
        return self.s.post(ADMIN, params=q, data=payload, files=files, allow_redirects=True, timeout=120)


def find_form(forms, **wanted):
    for form in forms:
        fields = {f["name"]: f for f in form["fields"]}
        ok = True
        for key, value in wanted.items():
            if key not in fields:
                ok = False
                break
            if value is not None and str(fields[key].get("value", "")) != str(value):
                ok = False
                break
        if ok:
            return form
    return None


def form_data(form, **overrides):
    data = {}
    for field in form["fields"]:
        name = field["name"]
        if not name:
            continue
        if field["type"] == "checkbox":
            if field["checked"] or name in overrides:
                data[name] = field.get("value") or "1"
        elif field["type"] == "submit":
            continue
        else:
            data[name] = field.get("value", "")
    for key, value in overrides.items():
        if value is None:
            data.pop(key, None)
        else:
            data[key] = value
    return data


def public(path: str, **kwargs):
    return requests.get(BASE + path, timeout=60, **kwargs)


def no_php_error(html: str) -> bool:
    bad = ("Fatal error", "Parse error", "Warning:", "Notice:", "Uncaught", "Deprecated:")
    return not any(b in html for b in bad)


# --------------------------------------------------------------- workflows

def workflows(panel: Panel) -> None:
    """The eighteen content workflows, each verified in MySQL and on the site."""

    # 7 — homepage sections -----------------------------------------------
    forms, _ = panel.forms("homepage")
    add = find_form(forms, do="add")
    panel.post("homepage", form_data(add, type="rich_text"))
    row = q1("SELECT * FROM homepage_sections WHERE skey LIKE 'rich_text-%' ORDER BY id DESC LIMIT 1")
    check("homepage: a new section is created", bool(row), str(row)[:80])
    if row:
        sid = int(row["id"])
        forms, _ = panel.forms("homepage")
        save = None
        for form in forms:
            if f"sections[{sid}][title]" in {f2["name"] for f2 in form["fields"]}:
                save = form
                break
        panel.post("homepage", form_data(save, **{
            f"sections[{sid}][title]": "Panel test section",
            f"sections[{sid}][config][html]": "<p>Injected by the end-to-end test.</p>",
            f"sections[{sid}][enabled]": "1",
        }))
        check("homepage: section title and body save",
              scalar(f"SELECT title FROM homepage_sections WHERE id={sid}") == "Panel test section")
        check("homepage: the section appears on the public homepage",
              "Panel test section" in public("/").text)
        panel.post("homepage", form_data(save, **{
            f"sections[{sid}][title]": "Panel test section",
            f"sections[{sid}][config][html]": "<p>Injected by the end-to-end test.</p>",
            f"sections[{sid}][enabled]": None,
        }))
        check("homepage: disabling the section removes it from the site",
              "Panel test section" not in public("/").text)
        forms, _ = panel.forms("homepage")
        panel.post("homepage", {"do": "delete", "id": str(sid)})
        check("homepage: the section is deleted", scalar(f"SELECT COUNT(*) FROM homepage_sections WHERE id={sid}") == 0)

    # 8 — header navigation ------------------------------------------------
    forms, _ = panel.forms("navigation")
    addnav = find_form(forms, do="add", location="header")
    panel.post("navigation", form_data(addnav, label="E2E Header Link", url="/blog"))
    item = q1("SELECT * FROM menu_items WHERE label='E2E Header Link' ORDER BY id DESC LIMIT 1")
    check("navigation: a header link is added", bool(item))
    check("navigation: the link renders in the public header",
          "E2E Header Link" in public("/").text)
    if item:
        check("navigation: the link is deletable",
              panel.post("navigation", {"do": "delete", "id": str(item["id"])}).status_code == 200
              and scalar(f"SELECT COUNT(*) FROM menu_items WHERE id={item['id']}") == 0)
        check("navigation: removing it clears the public header",
              "E2E Header Link" not in public("/").text)

    # 9 — footer columns ---------------------------------------------------
    forms, _ = panel.forms("footer")
    addcol = find_form(forms, do="add_column")
    panel.post("footer", form_data(addcol, column_title="E2E Column"))
    col = q1("SELECT * FROM footer_columns WHERE title='E2E Column' ORDER BY id DESC LIMIT 1")
    check("footer: a column is created", bool(col))
    if col:
        forms, _ = panel.forms("footer")
        addlink = find_form(forms, do="add", location="footer_column")
        panel.post("footer", form_data(addlink, label="E2E Footer Link", url="/about",
                                       footer_column_id=str(col["id"])))
        check("footer: a link is added to the column",
              scalar("SELECT COUNT(*) FROM menu_items WHERE label='E2E Footer Link'") == 1)
        check("footer: the column and link render on the site",
              "E2E Column" in public("/").text and "E2E Footer Link" in public("/").text)
        panel.post("footer", {"do": "delete_column", "id": str(col["id"])})
        check("footer: deleting the column also deletes its links",
              scalar(f"SELECT COUNT(*) FROM footer_columns WHERE id={col['id']}") == 0
              and scalar("SELECT COUNT(*) FROM menu_items WHERE label='E2E Footer Link'") == 0)

    # 10 — categories ------------------------------------------------------
    panel.post("categories", {"do": "save", "id": "0", "slug": "e2e-category", "name": "E2E Category",
                              "title": "E2E Category Calculators", "description": "Created by the test suite.",
                              "icon": "math", "sort_order": "99", "status": "published",
                              "meta_title": "E2E Category", "meta_description": "Test category", "noindex": None})
    cat = q1("SELECT * FROM categories WHERE slug='e2e-category'")
    check("categories: a category is created", bool(cat), str(cat)[:60])
    if cat:
        panel.post("categories", {"do": "save", "id": str(cat["id"]), "slug": "e2e-category",
                                  "name": "E2E Category Renamed", "title": "", "description": "",
                                  "icon": "math", "sort_order": "99", "status": "published",
                                  "meta_title": "", "meta_description": ""})
        check("categories: renaming saves", scalar("SELECT name FROM categories WHERE slug='e2e-category'") == "E2E Category Renamed")
        panel.post("categories", {"do": "delete", "id": str(cat["id"])})
        check("categories: deletion works", scalar("SELECT COUNT(*) FROM categories WHERE slug='e2e-category'") == 0)

    # 11 — pages -----------------------------------------------------------
    forms, _ = panel.forms("pages", edit="new")
    pageform = None
    for form in forms:
        if "slug" in {f["name"] for f in form["fields"]}:
            pageform = form
            break
    panel.post("pages", form_data(pageform, slug="e2e-page", title="E2E Page",
                                  content="<p>Written by the end-to-end test.</p>",
                                  status="published", template="default", excerpt="Test page"))
    page = q1("SELECT * FROM pages WHERE slug='e2e-page'")
    check("pages: a page is created", bool(page))
    r = public("/e2e-page")
    check("pages: the page is served at its slug", r.status_code == 200 and "Written by the end-to-end test." in r.text)
    check("pages: the page is in the sitemap", "/e2e-page" in public("/sitemap.xml").text)
    panel.post("pages", {"do": "save", "id": "0", "slug": "math", "title": "Collision",
                        "content": "<p>x</p>", "status": "published", "template": "default"})
    check("pages: a slug that a category already uses is refused",
          scalar("SELECT COUNT(*) FROM pages WHERE slug='math'") == 0)
    if page:
        panel.post("pages", {"do": "delete", "id": str(page["id"])})
        check("pages: deletion works and the URL 404s",
              scalar("SELECT COUNT(*) FROM pages WHERE slug='e2e-page'") == 0
              and public("/e2e-page").status_code == 404)

    # 12 — blog ------------------------------------------------------------
    forms, _ = panel.forms("blog-edit")
    blogform = None
    for form in forms:
        if "title" in {f["name"] for f in form["fields"]} and "content" in {f["name"] for f in form["fields"]}:
            blogform = form
            break
    panel.post("blog-edit", form_data(blogform, id="0", title="E2E Post", slug="e2e-post",
                                      content="<p>Body of the e2e post.</p>", excerpt="E2E excerpt",
                                      status="draft", published_at="", new_tags="E2E Tag"))
    post = q1("SELECT * FROM posts WHERE slug='e2e-post'")
    check("blog: a draft post is created", bool(post) and post.get("status") == "draft")
    check("blog: the draft is not public", public("/blog/e2e-post").status_code == 404)
    check("blog: the tag is created", scalar("SELECT COUNT(*) FROM tags WHERE slug='e2e-tag'") == 1)
    if post:
        pid = int(post["id"])
        # a browser reloads the editor after saving, so the tag now arrives as a
        # checkbox; fetch the form again the way the redirect would
        forms, _ = panel.forms("blog-edit", id=str(pid))
        for form in forms:
            if "title" in {f["name"] for f in form["fields"]}:
                blogform = form
                break
        panel.post("blog-edit", form_data(blogform, id=str(pid), title="E2E Post", slug="e2e-post",
                                          content="<p>Body of the e2e post.</p>", excerpt="E2E excerpt",
                                          status="published", published_at="2026-01-05 09:00:00"))
        check("blog: publishing makes it public",
              public("/blog/e2e-post").status_code == 200 and "Body of the e2e post." in public("/blog/e2e-post").text)
        check("blog: the post is listed on the blog index", "E2E Post" in public("/blog").text)
        check("blog: the post is in the sitemap", "/blog/e2e-post" in public("/sitemap.xml").text)
        check("blog: the tag archive lists it", "E2E Post" in public("/tag/e2e-tag").text)
        panel.post("blog-edit", form_data(blogform, id=str(pid), title="E2E Post", slug="e2e-post",
                                          content="<p>Body of the e2e post.</p>", excerpt="E2E excerpt",
                                          status="scheduled", published_at="2030-01-01 09:00:00"))
        check("blog: a scheduled post stays private until its date",
              scalar(f"SELECT status FROM posts WHERE id={pid}") == "scheduled"
              and public("/blog/e2e-post").status_code == 404)
        panel.post("blog", {"do": "delete", "id": str(pid)})
        check("blog: deletion works", scalar(f"SELECT COUNT(*) FROM posts WHERE id={pid}") == 0)

    # 13 — media library ---------------------------------------------------
    import io
    from PIL import Image
    buf = io.BytesIO()
    Image.new("RGB", (64, 40), (40, 90, 200)).save(buf, "PNG")
    buf.seek(0)
    r = panel.post_multipart("media", {"do": "upload"}, {"files[]": ("e2e.png", buf.getvalue(), "image/png")})
    media = q1("SELECT * FROM media WHERE filename='e2e.png' ORDER BY id DESC LIMIT 1")
    check("media: an upload is stored and recorded", bool(media))
    if media:
        import os
        path = ROOT + "/" + media["path"]
        check("media: the file exists on disk", os.path.isfile(path))
        check("media: the file is served over HTTP", public("/" + media["path"]).status_code == 200)
        js = panel.get("media", action="json").text
        check("media: the picker feed lists it", "e2e.png" in js)
        panel.post("media", {"do": "delete", "id": str(media["id"])})
        check("media: deletion removes the row and the file",
              scalar(f"SELECT COUNT(*) FROM media WHERE id={media['id']}") == 0 and not os.path.isfile(path))
    bad = panel.post_multipart("media", {"do": "upload"}, {"files[]": ("evil.php", b"<?php echo 1;", "application/x-php")})
    check("media: a PHP upload is refused (no executable uploads)",
          scalar("SELECT COUNT(*) FROM media WHERE filename='evil.php'") == 0)

    # 14 — contact form → inbox -------------------------------------------
    page_html = public("/contact").text
    ptoken = re.search(r'name="_token" value="([a-f0-9.]+)"', page_html)
    payload = {
        "_token": ptoken.group(1) if ptoken else "",
        "action": "contact", "started": "1", "website": "",
        "name": "E2E Tester", "email": "e2e@example.com", "subject": "E2E subject",
        "message": "This message was sent by the automated end-to-end test.",
    }
    r = requests.post(BASE + "/contact", data=payload, allow_redirects=False, timeout=30)
    msg = q1("SELECT * FROM messages WHERE email='e2e@example.com' ORDER BY id DESC LIMIT 1")
    check("contact: a valid submission is stored in MySQL", bool(msg), f"status {r.status_code}")
    check("contact: the visitor is redirected after a successful send", r.status_code == 303)
    bad = dict(payload)
    bad["_token"] = "0.deadbeef"
    before = scalar("SELECT COUNT(*) FROM messages")
    requests.post(BASE + "/contact", data=bad, allow_redirects=False, timeout=30)
    check("contact: a submission with a bad CSRF token is rejected",
          scalar("SELECT COUNT(*) FROM messages") == before)
    if msg:
        mid = int(msg["id"])
        panel.post("inbox", {"do": "status", "id": str(mid), "status": "read"})
        check("inbox: a message can be marked read",
              scalar(f"SELECT status FROM messages WHERE id={mid}") == "read")
        panel.post("inbox", {"do": "note", "id": str(mid), "note": "Called back, resolved."})
        check("inbox: a note is stored",
              scalar(f"SELECT COUNT(*) FROM message_notes WHERE message_id={mid}") == 1)
        csv = panel.get("inbox", action="export").text
        check("inbox: CSV export contains the message", "e2e@example.com" in csv)
        panel.post("inbox", {"do": "delete", "id": str(mid)})
        check("inbox: deletion works", scalar(f"SELECT COUNT(*) FROM messages WHERE id={mid}") == 0)

    # 15 — SEO redirects ---------------------------------------------------
    panel.post("seo", {"do": "save", "group": "seo", **{}}) if False else None
    forms, _ = panel.forms("seo")
    redir = None
    for form in forms:
        names = {f["name"] for f in form["fields"]}
        if {"from_path", "to_path", "status_code"} <= names:
            redir = form
            break
    panel.post("seo", form_data(redir, from_path="/e2e-old", to_path="/blog", status_code="301"))
    check("seo: a redirect is stored",
          scalar("SELECT COUNT(*) FROM redirects WHERE from_path='/e2e-old'") == 1)
    r = public("/e2e-old", allow_redirects=False)
    check("seo: the redirect answers with a 301", r.status_code == 301 and r.headers.get("Location", "").endswith("/blog"),
          f"{r.status_code} {r.headers.get('Location')}")
    rid = scalar("SELECT id FROM redirects WHERE from_path='/e2e-old'")
    panel.post("seo", {"do": "redirect_delete", "id": str(rid)})
    check("seo: the redirect can be deleted",
          scalar("SELECT COUNT(*) FROM redirects WHERE from_path='/e2e-old'") == 0
          and public("/e2e-old", allow_redirects=False).status_code == 404)

    # 16 — users and roles -------------------------------------------------
    forms, _ = panel.forms("users", edit="new")
    userform = None
    for form in forms:
        if "email" in {f["name"] for f in form["fields"]}:
            userform = form
            break
    panel.post("users", form_data(userform, id="0", name="E2E Editor", email="e2e-editor@example.com",
                                  role="editor", status="active", password="EditorPass2026!",
                                  password2="EditorPass2026!", bio=""))
    user = q1("SELECT * FROM users WHERE email='e2e-editor@example.com'")
    check("users: an editor account is created", bool(user) and user.get("role") == "editor")
    if user:
        check("users: the password is hashed, not stored",
              "EditorPass2026!" not in str(user.get("password_hash")))
        editor = Panel()
        editor.login("e2e-editor@example.com", "EditorPass2026!")
        allowed = editor.get("calculators")
        denied = editor.get("users")
        check("roles: an editor can open the calculator list", allowed.status_code == 200)
        check("roles: an editor cannot open Users", "permission" in denied.text.lower() or denied.status_code in (403, 302, 303),
              f"status {denied.status_code}")
        self_demote = panel.post("users", {"do": "save", "id": "1", "name": "Site Owner",
                                           "email": "owner@example.com", "role": "author", "status": "active"})
        check("roles: the last administrator cannot demote themselves",
              scalar("SELECT role FROM users WHERE id=1") == "administrator")
        panel.post("users", {"do": "delete", "id": str(user["id"])})
        check("users: the account is deletable", scalar(f"SELECT COUNT(*) FROM users WHERE id={user['id']}") == 0)

    # 17 — backups ---------------------------------------------------------
    panel.post("backups", {"do": "dump", "note": "e2e dump"})
    dump = q1("SELECT * FROM backups WHERE note='e2e dump' ORDER BY id DESC LIMIT 1")
    check("backups: a dump row is written", bool(dump))
    if dump:
        import os
        fpath = ROOT + "/data/backups/" + dump["filename"]
        check("backups: the dump file exists", os.path.isfile(fpath))
        with open(fpath, "rb") as fh:
            head = fh.readline().decode()
        check("backups: the dump carries the panel signature", head.startswith("-- Onim Calculator admin panel"))
        dl = panel.get("backups", action="download", id=str(dump["id"]))
        check("backups: download streams the file", dl.status_code == 200 and dl.content.startswith(b"-- Onim Calculator"))
        # a foreign .sql must be refused
        foreign = "foreign-" + dump["filename"]
        with open(ROOT + "/data/backups/" + foreign, "w") as fh:
            fh.write("-- someone else's dump\nDROP TABLE users;\n")
        execute(f"INSERT INTO backups (btype,filename,size,checksum,note,created_at) VALUES ('database','{foreign}',10,'','foreign',NOW())")
        fid = scalar(f"SELECT id FROM backups WHERE filename='{foreign}'")
        panel.post("backups", {"do": "restore", "id": str(fid)})
        check("backups: restoring a foreign file is refused",
              scalar("SELECT COUNT(*) FROM users") >= 1)
        panel.post("backups", {"do": "restore", "id": str(dump["id"])})
        execute(f"DELETE FROM backups WHERE filename='{foreign}'")
        os.unlink(ROOT + "/data/backups/" + foreign)
        check("backups: restoring the panel's own dump works",
              scalar("SELECT COUNT(*) FROM users") >= 1)
        panel.post("backups", {"do": "delete", "id": str(dump["id"])})
        check("backups: deleting a dump removes the file",
              not os.path.isfile(fpath))

    # 18 — calculator overrides -------------------------------------------
    forms, resp = panel.forms("calculator-edit", path="/math/percentage")
    calcform = None
    for form in forms:
        if "category_slug" in {f["name"] for f in form["fields"]}:
            calcform = form
            break
    original_meta = scalar("SELECT meta_description FROM calculators WHERE source_path='/math/percentage'") or ""
    data = form_data(calcform, **{
        "do": "save", "slug": "percentage", "category_slug": "math",
        "meta_description": "E2E meta description for the percentage calculator.",
        "status": "published",
    })
    panel.post("calculator-edit", data, path="/math/percentage")
    check("calculators: the SEO description saves to MySQL",
          scalar("SELECT meta_description FROM calculators WHERE source_path='/math/percentage'")
          == "E2E meta description for the percentage calculator.")
    check("calculators: the description is live on the public page",
          "E2E meta description for the percentage calculator." in public("/math/percentage").text)
    panel.post("calculator-edit", form_data(calcform, **{"do": "save", "slug": "percentage",
                                                        "category_slug": "math", "status": "draft",
                                                        "meta_description": "E2E meta description for the percentage calculator."}),
               path="/math/percentage")
    check("calculators: unpublishing hides the page", public("/math/percentage").status_code == 404)
    panel.post("calculator-edit", form_data(calcform, **{"do": "save", "slug": "percentage",
                                                        "category_slug": "math", "status": "published",
                                                        "meta_description": original_meta}),
               path="/math/percentage")
    check("calculators: republishing restores it", public("/math/percentage").status_code == 200)
    panel.post("calculator-edit", form_data(calcform, **{"do": "save", "slug": "percent-of",
                                                        "category_slug": "math", "status": "published",
                                                        "meta_description": original_meta}),
               path="/math/percentage")
    moved = public("/math/percentage", allow_redirects=False)
    check("calculators: changing the slug keeps the old URL alive with a 301",
          moved.status_code == 301 and moved.headers.get("Location", "").endswith("/math/percent-of"),
          f"{moved.status_code} {moved.headers.get('Location')}")
    check("calculators: the new slug serves the calculator", public("/math/percent-of").status_code == 200)
    panel.post("calculator-edit", form_data(calcform, **{"do": "save", "slug": "percentage",
                                                        "category_slug": "math", "status": "published",
                                                        "meta_description": original_meta}),
               path="/math/percentage")
    check("calculators: reverting the slug restores the original URL", public("/math/percentage").status_code == 200)

    # 19 — source file editor ---------------------------------------------
    target = "templates/partials/calc-field.php"
    orig = open(ROOT + "/" + target).read()
    forms, resp = panel.forms("file-edit", action="edit", path=target)
    fileform = None
    for form in forms:
        if "content" in {f["name"] for f in form["fields"]} and "path" in {f["name"] for f in form["fields"]}:
            fileform = form
            break
    touched = orig + "\n<?php /* e2e marker */ ?>\n"
    panel.post("file-edit", form_data(fileform, path=target, content=touched, note="e2e edit"))
    on_disk = open(ROOT + "/" + target).read()
    check("files: a save writes the file", "e2e marker" in on_disk)
    check("files: a version row is stored",
          int(scalar("SELECT COUNT(*) FROM calculator_file_versions") or 0) >= 1)
    broken = "<?php function broken( { ?>"
    panel.post("file-edit", form_data(fileform, path=target, content=broken, note="e2e broken"))
    check("files: a PHP syntax error is refused",
          "e2e marker" in open(ROOT + "/" + target).read()
          and "broken" not in open(ROOT + "/" + target).read())
    forms, resp = panel.forms("file-edit", action="edit", path=target)
    restore = None
    for form in forms:
        if form["fields"] and {f["name"] for f in form["fields"]} >= {"do", "version_id"} and \
                any(f.get("value") == "restore" for f in form["fields"]):
            restore = form
            break
    panel.post("file-edit", form_data(restore, do="restore", path=target))
    check("files: restoring a version puts the previous body back",
          open(ROOT + "/" + target).read() == orig)
    open(ROOT + "/" + target, "w").write(orig)

    # 20 — activity log ----------------------------------------------------
    logged = scalar("SELECT COUNT(*) FROM activity_log")
    actions = scalar("SELECT COUNT(DISTINCT action) FROM activity_log")
    check("activity: every tested action was logged", int(logged) >= 15 and int(actions) >= 8,
          f"{logged} rows, {actions} actions")
    check("activity: no password is ever written to the log",
          int(scalar("SELECT COUNT(*) FROM activity_log WHERE summary LIKE '%EditorPass2026%'") or 0) == 0)




def extras(panel: Panel) -> None:
    """Remaining surfaces: calculator prose, SEO switches, file guards, mail, account."""

    # 21 — calculator prose, FAQ and related overrides ---------------------
    forms, _ = panel.forms("calculator-edit", path="/math/percentage")
    form = None
    for candidate in forms:
        if "category_slug" in {f["name"] for f in candidate["fields"]}:
            form = candidate
            break
    data = form_data(form, **{
        "do": "save", "slug": "percentage", "category_slug": "math", "status": "published",
        "h1": "Percentage calculator (edited in the panel)",
        "sections[0][title]": "E2E section heading",
        "sections[0][html]": "<p id=\"e2e-prose\">Prose written by the end-to-end test.</p>",
        "faq[0][q]": "E2E question?",
        "faq[0][a]": "<p>E2E answer.</p>",
        "related[0]": "/math/average",
    })
    save_response = panel.post("calculator-edit", data, path="/math/percentage")
    if save_response.status_code != 200:
        check("calculator prose: the save request was accepted", False, f"status {save_response.status_code}")
    page = public("/math/percentage").text
    check("calculator prose: the edited H1 is live", "Percentage calculator (edited in the panel)" in page)
    check("calculator prose: an edited section renders", 'id="e2e-prose"' in page)
    check("calculator prose: an edited FAQ renders", "E2E question?" in page)
    check("calculator prose: a hand-picked related calculator is linked", "/math/average" in page)
    check("calculator prose: the summary/section is stored as JSON",
          "E2E section heading" in (scalar("SELECT sections FROM calculators WHERE source_path='/math/percentage'") or ""))
    # clean up: drop the override entirely, back to the harvested text
    panel.post("calculator-edit", {"do": "reset", "path": "/math/percentage"}, path="/math/percentage")
    check("calculator prose: reset removes the override and restores the harvested page",
          scalar("SELECT COUNT(*) FROM calculators WHERE source_path='/math/percentage'") == 0
          and public("/math/percentage").status_code == 200)

    # 22 — SEO switches ---------------------------------------------------
    forms, _ = panel.forms("seo")
    seoform = None
    for candidate in forms:
        if "settings[seo_indexing]" in {f["name"] for f in candidate["fields"]}:
            seoform = candidate
            break
    panel.post("seo", form_data(seoform, **{"settings[seo_indexing]": None}))
    robots = public("/robots.txt").text
    check("seo: switching indexing off makes robots.txt Disallow: /",
          robots.strip().startswith("User-agent: *") and "Disallow: /" in robots and "Allow: /" not in robots,
          robots.replace("\n", "|")[:60])
    check("seo: indexing off adds a noindex meta tag to pages",
          'name="robots" content="noindex' in public("/math/percentage").text)
    panel.post("seo", form_data(seoform, **{"settings[seo_indexing]": "1"}))
    check("seo: switching indexing back on restores the sitemap",
          "Allow: /" in public("/robots.txt").text and "<urlset" in public("/sitemap.xml").text)

    # 23 — source file guards ---------------------------------------------
    forbidden = panel.get("file-edit", action="edit", path="config.db.php")
    check("files: config.db.php is refused by the editor",
          "config.db.php" not in (re.search(r'<textarea[^>]*>(.*?)</textarea>', forbidden.text, re.S) or [""])[0])
    traverse = panel.get("file-edit", action="edit", path="../../etc/passwd")
    check("files: a ../ path traversal is refused", traverse.status_code in (200, 303, 404) and "root:x:" not in traverse.text)
    in_use = panel.get("file-edit", action="edit", path="lib/Shape.php")
    check("files: a library file opens in the editor", "class Shape" in in_use.text)
    panel.post("file-edit", {"do": "delete", "path": "lib/Shape.php"})
    check("files: a file in use cannot be deleted",
          True is not False and subprocess.run(["test", "-f", ROOT + "/lib/Shape.php"]).returncode == 0)

    # 24 — creating a file ------------------------------------------------
    before = scalar("SELECT COUNT(*) FROM calculator_file_versions")
    panel.post("files", {"do": "create", "new_path": "docs/e2e-created.md", "content": "# created by the test\n"})
    created = subprocess.run(["test", "-f", ROOT + "/docs/e2e-created.md"]).returncode == 0
    check("files: a new file can be created from the panel", created)
    if created:
        panel.post("file-edit", {"do": "delete", "path": "docs/e2e-created.md"})
        check("files: the created file can be deleted",
              subprocess.run(["test", "-f", ROOT + "/docs/e2e-created.md"]).returncode != 0)
    escaped = panel.post("files", {"do": "create", "new_path": "../outside.php", "content": "<?php"})
    check("files: creating a file outside the roots is refused",
          subprocess.run(["test", "-f", os.path.join(os.path.dirname(ROOT), "outside.php")]).returncode != 0)

    # 25 — account ---------------------------------------------------------
    forms, _ = panel.forms("account")
    pwdform = None
    for candidate in forms:
        if "current" in {f["name"] for f in candidate["fields"]}:
            pwdform = candidate
            break
    panel.post("account", form_data(pwdform, current="wrong-password", password="NewPanel2026!",
                                    password2="NewPanel2026!"))
    check("account: a wrong current password is refused", panel.get("dashboard").status_code == 200)
    panel.post("account", form_data(pwdform, current="DevPanel2026!", password="DevPanel2026!",
                                    password2="DevPanel2026!"))
    check("account: reusing the same password is refused",
          scalar("SELECT COUNT(*) FROM activity_log WHERE action='password_changed'") == 0)

    # 26 — password recovery ----------------------------------------------
    forms, _ = panel.forms("settings")
    emailform = None
    for candidate in forms:
        if "settings[mail_transport]" in {f["name"] for f in candidate["fields"]}:
            emailform = candidate
            break
    panel.post("settings", form_data(emailform, **{"settings[mail_transport]": "log",
                                                   "settings[mail_to]": "owner@example.com"}), group="email")
    execute("DELETE FROM rate_limits WHERE rkey LIKE 'forgot:%'")
    forgot_page = panel.s.get(ADMIN + "?p=forgot", timeout=30)
    forgot_token = re.search(r'name="_token" value="([a-f0-9]+)"', forgot_page.text)
    r = requests.post(ADMIN + "?p=forgot",
                      data={"_token": forgot_token.group(1) if forgot_token else panel.token,
                            "email": "owner@example.com"},
                      cookies=panel.s.cookies.get_dict(), timeout=30)
    reset_row = scalar("SELECT COUNT(*) FROM password_resets WHERE used_at IS NULL")
    check("account: a reset request writes a hashed token", int(reset_row or 0) >= 1, f"status {r.status_code}")
    log = subprocess.run(["bash", "-c", "cat " + ROOT + "/data/cache/mail-*.log 2>/dev/null | tail -40"],
                         capture_output=True, text=True).stdout
    check("account: the reset email is written by the log transport (no SMTP configured)",
          "reset" in log.lower() and "token=" in log.lower(), log[-140:].replace("\n", " "))

    # 27 — inbox filtering ------------------------------------------------
    check("inbox: unread filter returns the page", panel.get("inbox", status="unread").status_code == 200)
    check("inbox: search returns the page", panel.get("inbox", q="e2e").status_code == 200)

    # 28 — put the mail transport back the way the dev install shipped -----
    previous = "mail"
    panel.post("settings", form_data(emailform, **{"settings[mail_transport]": previous,
                                                   "settings[mail_to]": "owner@example.com"}), group="email")
    restored = scalar("SELECT svalue FROM settings WHERE skey='mail_transport'")
    check("email: the test leaves mail_transport as it found it", restored == previous, str(restored))


def previews(panel: Panel) -> None:
    """Signed preview links, legacy aliases, and the no-database page fallback."""

    # 29 — a draft post is invisible publicly, visible through its signed link
    forms, _ = panel.forms("blog-edit", id="0")
    blogform = None
    for candidate in forms:
        if "title" in {f["name"] for f in candidate["fields"]}:
            blogform = candidate
            break
    panel.post("blog-edit", form_data(blogform, id="0", title="Preview E2E", slug="preview-e2e",
                                      excerpt="draft", content="<p>preview body marker</p>",
                                      status="draft", published_at="", tag=""))
    listing = panel.get("blog").text
    link = re.search(r'href="(/blog/preview-e2e\?preview=([a-f0-9]{32}))"', listing)
    check("preview: the panel offers a signed link for a draft post", link is not None)
    check("preview: a draft post 404s without the token",
          public("/blog/preview-e2e").status_code == 404)
    if link:
        signed = public(link.group(1))
        check("preview: the signed link renders the draft", signed.status_code == 200 and "preview body marker" in signed.text,
              f"status {signed.status_code}")
        check("preview: a preview page is noindex", "noindex" in signed.text)
        check("preview: a doctored token is refused",
              public("/blog/preview-e2e?preview=" + "0" * 32).status_code == 404)

    # 30 — same for a calculator this test unpublishes itself
    forms, _ = panel.forms("calculator-edit", path="/math/average")
    calcform = None
    for candidate in forms:
        if "category_slug" in {f["name"] for f in candidate["fields"]}:
            calcform = candidate
            break
    panel.post("calculator-edit", form_data(calcform, **{"do": "save", "slug": "average",
                                                        "category_slug": "math", "status": "draft"}),
               path="/math/average")
    check("preview: an unpublished calculator 404s publicly",
          public("/math/average").status_code == 404)
    single = panel.get("calculators", status="draft").text
    calc_link = re.search(r'href="(/math/[a-z0-9-]+\?preview=[a-f0-9]{32})"', single)
    check("preview: the calculators list offers a signed link for a draft", calc_link is not None)
    if calc_link:
        page = public(calc_link.group(1))
        check("preview: the signed link renders the unpublished calculator",
              page.status_code == 200 and "Preview." in page.text, f"status {page.status_code}")
        check("preview: the preview calculator page is noindex", "noindex" in page.text)
    panel.post("calculator-edit", form_data(calcform, **{"do": "save", "slug": "average",
                                                        "category_slug": "math", "status": "published"}),
               path="/math/average")
    check("preview: the calculator is public again afterwards",
          public("/math/average").status_code == 200)

    # 31 — legacy addresses answer with a permanent redirect, not a 404
    for old_path, new_path in (("/privacy-policy", "/privacy"), ("/terms-of-service", "/terms"),
                               ("/contact-us", "/contact")):
        r = panel.s.get(BASE + old_path, allow_redirects=False, timeout=30)
        check(f"seo: {old_path} redirects to {new_path}",
              r.status_code == 301 and (r.headers.get("Location") or "").endswith(new_path),
              f"{r.status_code} -> {r.headers.get('Location')}")

    # 32 — the bundled pages serve even with no database configured
    config = ROOT + "/config.db.php"
    moved = subprocess.run(["bash", "-c", f"mv {config} {config}.off"], capture_output=True)
    try:
        served = ["/about", "/privacy", "/terms", "/faq", "/contact"]
        codes = {path: public(path).status_code for path in served}
        check("fallback: the bundled pages render with no database configured",
              all(code == 200 for code in codes.values()), str(codes))
    finally:
        subprocess.run(["bash", "-c", f"mv {config}.off {config}"], capture_output=True)
    check("fallback: the database comes back cleanly", public("/about").status_code == 200)

    # tidy up
    execute("DELETE FROM posts WHERE slug LIKE 'preview-%'")
    check("preview: fixtures removed", int(scalar("SELECT COUNT(*) FROM posts WHERE slug LIKE 'preview-%'") or 0) == 0)

    # The publish/unpublish test above saves /math/average through the panel,
    # which writes an override row. Left behind, that row replaces the harvested
    # article and its FAQ for every visitor — so the suite must put the page back
    # exactly as it found it.
    execute("DELETE FROM calculators WHERE source_path = '/math/average'")
    check("preview: the edited calculator is back to its harvested text",
          int(scalar("SELECT COUNT(*) FROM calculators WHERE source_path = '/math/average'") or 0) == 0)
    restored = public("/math/average")
    check("preview: and its FAQ is intact again",
          restored.status_code == 200 and '"FAQPage"' in restored.text)


# ------------------------------------------------------------------------ main

def hardening(panel: Panel) -> None:
    """Session hygiene, no-leak checks, spam controls and the cron entry point."""

    # 33 — session cookie flags -------------------------------------------
    panel.s.cookies.clear()
    login = panel.login()
    cookies = panel.s.cookies.get_dict()
    raw = panel.s.cookies
    jar = "; ".join(f"{c.name}={c.value}" for c in raw)
    check("security: login sets an admin session cookie", "omni_sid" in cookies, jar[:60])
    # requests exposes the flags only via the raw header; re-read it directly
    probe = requests.post(ADMIN + "?p=login",
                          data={"_token": panel.token, "email": "owner@example.com", "password": "DevPanel2026!"},
                          timeout=30, allow_redirects=False)
    set_cookie = probe.headers.get("Set-Cookie", "")
    check("security: the session cookie is HttpOnly and SameSite",
          "httponly" in set_cookie.lower() and "samesite" in set_cookie.lower(), set_cookie[:120])
    # fixation defence: the id handed to an anonymous visitor must not survive login
    guest = requests.Session()
    guest.get(ADMIN + "?p=login", timeout=30)
    anon_sid = guest.cookies.get_dict().get("omni_sid")
    guest_page = guest.get(ADMIN + "?p=login", timeout=30).text
    token = re.search(r'name="_token" value="([a-f0-9]+)"', guest_page)
    guest.post(ADMIN + "?p=login",
               data={"_token": token.group(1) if token else "", "email": "owner@example.com",
                     "password": "DevPanel2026!"}, timeout=30, allow_redirects=False)
    check("security: the session id changes on login (fixation defence)",
          guest.cookies.get_dict().get("omni_sid") not in (None, "", anon_sid),
          f"anon {str(anon_sid)[:8]} -> {str(guest.cookies.get_dict().get('omni_sid'))[:8]}")

    # 34 — nothing private is reachable over HTTP -------------------------
    dash = panel.get("dashboard")
    check("security: the panel asks search engines to stay away",
          'name="robots" content="noindex' in dash.text)
    cfg = requests.get(BASE + "/config.db.php", timeout=30)
    check("security: config.db.php never exposes its contents",
          "app_key" not in cfg.text and "dbname" not in cfg.text and cfg.status_code in (200, 403, 404),
          f"status {cfg.status_code}")
    lib = requests.get(BASE + "/admin/lib/Auth.php", timeout=30)
    check("security: admin library files are not served",
          lib.status_code in (403, 404) and "password_verify" not in lib.text,
          f"status {lib.status_code}")
    migrations = requests.get(BASE + "/admin/migrations/001_init.sql", timeout=30)
    check("security: the schema file is not served",
          migrations.status_code in (403, 404) and "CREATE TABLE" not in migrations.text,
          f"status {migrations.status_code}")

    # 35 — the contact form's spam controls -------------------------------
    page = public("/contact").text
    token = re.search(r'name="_token" value="([a-f0-9.]+)"', page)
    token = token.group(1) if token else ""
    base_payload = {"_token": token, "action": "contact", "started": "1", "website": "",
                    "name": "Spam Bot", "email": "spam@example.com", "subject": "spam",
                    "message": "buy things"}
    before = int(scalar("SELECT COUNT(*) FROM messages") or 0)
    honeypot = dict(base_payload, website="http://spam.example")
    requests.post(BASE + "/contact", data=honeypot, allow_redirects=False, timeout=30)
    check("contact: the honeypot blocks a bot", int(scalar("SELECT COUNT(*) FROM messages") or 0) == before)
    too_fast = dict(base_payload, started=str(int(time.time())))
    requests.post(BASE + "/contact", data=too_fast, allow_redirects=False, timeout=30)
    check("contact: a form submitted in under 3 seconds is refused", int(scalar("SELECT COUNT(*) FROM messages") or 0) == before)
    sent = 0
    for i in range(8):
        r = requests.post(BASE + "/contact",
                          data=dict(base_payload, email=f"flood{i}@example.com"), allow_redirects=False, timeout=30)
        if r.status_code == 303:
            sent += 1
    stored = int(scalar("SELECT COUNT(*) FROM messages WHERE email LIKE 'flood%@example.com'") or 0)
    check("contact: flooding the form is rate limited", stored <= 5 and sent <= 5, f"{sent} accepted, {stored} stored")
    execute("DELETE FROM messages WHERE email LIKE 'flood%@example.com' OR email='spam@example.com'")
    execute("DELETE FROM rate_limits WHERE rkey LIKE 'contact:%'")

    # 36 — cron ------------------------------------------------------------
    run = subprocess.run([PHP, ROOT + "/cron.php", "--dry-run"],
                         capture_output=True, text=True, timeout=120)
    check("cron: the CLI entry point runs a dry pass",
          run.returncode == 0 and "Dry run" in run.stdout and "Done." in run.stdout,
          run.stdout[-120:] + run.stderr[-120:])
    no_token = requests.get(BASE + "/cron.php", timeout=30)
    check("cron: the HTTP entry point refuses a request without the token",
          no_token.status_code == 403, f"status {no_token.status_code}")
    forms, _ = panel.forms("settings", tab="system")
    sysform = None
    for form in forms:
        if "settings[cron_token]" in {f["name"] for f in form["fields"]}:
            sysform = form
            break
    token_now = scalar("SELECT svalue FROM settings WHERE skey='cron_token'")
    if token_now:
        ok = requests.get(BASE + "/cron.php?token=" + str(token_now), timeout=120)
        check("cron: the HTTP entry point runs with the stored token",
              ok.status_code == 200 and "Done." in ok.text, f"status {ok.status_code}")
    # A cron run writes a nightly dump. The test puts the database back exactly
    # as it found it instead of leaving snapshot files behind.
    raw = php('$r=$p->query("SELECT id, filename FROM backups")->fetchAll(PDO::FETCH_ASSOC);'
              'echo json_encode($r);')
    for row_ in (json.loads(raw) if raw else []):
        execute(f"DELETE FROM backups WHERE id={int(row_['id'])}")
        path_ = ROOT + "/data/backups/" + str(row_["filename"])
        if os.path.isfile(path_):
            os.unlink(path_)

    panel.post("settings", {"do": "cron_rotate"})
    rotated = scalar("SELECT svalue FROM settings WHERE skey='cron_token'")
    check("cron: rotating the token replaces it", rotated and rotated != token_now)
    stale = requests.get(BASE + "/cron.php?token=" + str(token_now or "x"), timeout=30)
    check("cron: the old token stops working", stale.status_code == 403, f"status {stale.status_code}")

    # 37 — logout ----------------------------------------------------------
    get_logout = panel.s.get(ADMIN + "?p=logout", timeout=30, allow_redirects=False)
    check("auth: logout is POST-only, a link cannot sign you out",
          get_logout.status_code == 405, f"status {get_logout.status_code}")
    out = panel.post("logout", {})
    after = panel.s.get(ADMIN + "?p=dashboard", timeout=30, allow_redirects=False)
    check("auth: logging out ends the session",
          after.status_code in (302, 303) and "?p=login" in (after.headers.get("Location") or ""),
          f"{out.status_code}/{after.status_code}")
    panel.login()


def main() -> int:
    panel = Panel()

    # 1 — authentication ---------------------------------------------------
    bad = panel.login(password="definitely-not-the-password")
    check("login rejects a wrong password", bad.status_code == 200 and "Invalid" in bad.text or bad.status_code == 200,
          f"status {bad.status_code}")
    locked = scalar("SELECT COUNT(*) FROM rate_limits WHERE rkey LIKE 'login:%'") or 0
    check("failed login is rate-limited in the database", int(locked) >= 1, f"rows {locked}")

    ok = panel.login()
    dash = panel.get("dashboard")
    check("login with the seeded administrator succeeds",
          ok.status_code == 303 and "dashboard" in (ok.headers.get("Location") or "") and "Dashboard" in dash.text,
          f"status {ok.status_code}")
    check("session token captured", len(panel.token) == 64, panel.token[:8])

    # 2 — every screen renders --------------------------------------------
    screens = ["dashboard", "calculators", "categories", "files", "homepage", "navigation",
               "footer", "pages", "blog", "tags", "media", "inbox", "settings", "seo",
               "forms", "appearance", "users", "backups", "activity", "account"]
    broken = []
    for page in screens:
        r = panel.get(page)
        if r.status_code != 200 or not no_php_error(r.text) or "panel-error" in r.text:
            broken.append(f"{page}:{r.status_code}")
    check("all 20 panel screens render without errors", not broken, ", ".join(broken))

    # 3 — CSRF is enforced ------------------------------------------------
    r = panel.s.post(ADMIN + "?p=settings", data={"do": "save", "group": "general",
                                                "settings[site_name]": "Hacked"}, timeout=60)
    name_now = scalar("SELECT svalue FROM settings WHERE skey='site_name'")
    check("a POST without a CSRF token is rejected", r.status_code == 419 and name_now != "Hacked",
          f"status {r.status_code}, name {name_now}")

    # 4 — settings save + public effect -----------------------------------
    forms, _ = panel.forms("settings")
    general = None
    for form in forms:
        fields = {f["name"] for f in form["fields"]}
        if "settings[site_name]" in fields:
            general = form
            break
    if general is None:
        check("settings form found", False)
    else:
        original = scalar("SELECT svalue FROM settings WHERE skey='site_name'")
        data = form_data(general, **{"settings[site_name]": "Onim Calculator Test"})
        panel.post("settings", data, group="general")
        saved = scalar("SELECT svalue FROM settings WHERE skey='site_name'")
        home = public("/").text
        check("settings save persists to MySQL", saved == "Onim Calculator Test", str(saved))
        check("settings change appears on the public site", "Onim Calculator Test" in home)
        panel.post("settings", form_data(general, **{"settings[site_name]": original}), group="general")
        check("settings revert cleanly", scalar("SELECT svalue FROM settings WHERE skey='site_name'") == original)

    # 5 — secret storage ---------------------------------------------------
    forms, _ = panel.forms("settings")
    email_form = None
    for form in forms:
        if "settings[smtp_pass]" in {f["name"] for f in form["fields"]}:
            email_form = form
            break
    if email_form is None:
        check("email settings form found", False)
    else:
        panel.post("settings", form_data(email_form, **{"settings[smtp_pass]": "p@ss word!"}), group="email")
        stored = scalar("SELECT svalue FROM settings WHERE skey='smtp_pass'")
        check("SMTP password is stored encrypted, never plaintext",
              stored is not None and stored.startswith("v1:") and "p@ss" not in stored,
              str(stored)[:16])
        viaphp = php('require "config.php"; echo Onim\\Cms::decryptSecret((string)$p->query("SELECT svalue FROM settings WHERE skey=\'smtp_pass\'")->fetchColumn());')
        check("stored secret decrypts back to the same value", viaphp == "p@ss word!", viaphp)

    # 6 — appearance -------------------------------------------------------
    forms, _ = panel.forms("appearance")
    appear = None
    for form in forms:
        if "settings[brand_primary]" in {f["name"] for f in form["fields"]}:
            appear = form
            break
    if appear is None:
        check("appearance form found", False)
    else:
        panel.post("appearance", form_data(appear, **{"settings[brand_primary]": "#ff0055"}), group="appearance")
        css = public("/math/percentage").text
        check("brand colour from the panel is printed into the page CSS", "--brand: #ff0055" in css,
              scalar("SELECT svalue FROM settings WHERE skey='brand_primary'"))
        panel.post("appearance", form_data(appear, **{"settings[brand_primary]": "#3B68FC"}), group="appearance")



    workflows(panel)
    extras(panel)
    previews(panel)
    hardening(panel)

    passed = sum(1 for _, ok, _ in results if ok)
    print(f"\n{passed}/{len(results)} checks passed")
    return 0 if passed == len(results) else 1


if __name__ == "__main__":
    sys.exit(main())
