#!/usr/bin/env bash
# Regression: a panel save that does not render the article body or the FAQ
# repeater must not erase them. Before the fix, tools/admin_e2e.py test #30
# saved /math/average with only `status` and the page lost all 6 questions and
# its FAQPage structured data for every visitor.
set -u
cd "$(dirname "$0")/.."
PHP="bash tools/php.sh"
DB='mariadb --protocol=tcp -h 127.0.0.1 -P 3307 -u root omni_cms'
PATH_='/math/average'
fail=0
pass() { printf 'PASS  %s\n' "$1"; }
bad()  { printf 'FAIL  %s\n' "$1"; fail=$((fail+1)); }
counts() { $DB -N -e "SELECT CONCAT(IFNULL(JSON_LENGTH(sections),0),':',IFNULL(JSON_LENGTH(faq),0)) FROM calculators WHERE source_path='$PATH_'" 2>/dev/null; }
reset() { $DB -e "DELETE FROM calculators WHERE source_path='$PATH_'" 2>/dev/null; }

phase() {  # $1 = partial | clear ; writes the override through CalcRepo::save
  $PHP /tmp/_ovr_phase.php "$1" 2>/dev/null | tail -1
}

cat > /tmp/_ovr_phase.php <<'PHP'
<?php
require '/home/user/php-clone/admin/bootstrap.php';
$mode = $argv[1] ?? 'partial';
$row  = \Omni\Data::calculator('/math/average');
$input = [
    'slug' => 'average', 'category_slug' => 'math',
    'name' => $row['name'], 'h1' => $row['h1'] ?? $row['name'],
    'meta_title' => $row['metaTitle'] ?? $row['name'],
    'meta_description' => $row['metaDesc'] ?? '',
    'summary' => $row['summary'] ?? '',
    'status' => 'published',
    // a scripted save renders neither repeater
    'faq' => [], 'sections' => [],
    'faq_submitted' => $mode === 'clear',
    'sections_submitted' => $mode === 'clear',
];
$res = \Omni\Admin\CalcRepo::save('/math/average', $input, 1);
echo empty($res['ok']) ? 'error' : 'ok', "\n";
PHP

reset
out=$(phase partial)
[ "$out" = ok ] && pass "panel: a scripted save goes through" || bad "panel: a scripted save goes through ($out)"
got=$(counts)
[ "$got" = "9:6" ] && pass "panel: the article and its FAQ survive a save that omits them ($got)" \
  || bad "panel: the article and its FAQ survive a save that omits them (got $got, want 9:6)"
body=$(curl -s "http://127.0.0.1:8080$PATH_")
[ "$(printf '%s' "$body" | grep -c 'faq-item')" -eq 6 ] && pass "page: the six questions still render" || bad "page: the six questions still render"
printf '%s' "$body" | grep -q 'FAQPage' && pass "page: FAQPage structured data is still emitted" || bad "page: FAQPage structured data is still emitted"

out=$(phase clear)
[ "$out" = ok ] && pass "panel: an editor can still clear the repeaters on purpose" || bad "panel: an editor can still clear the repeaters on purpose ($out)"
got=$(counts)
[ "$got" = "0:0" ] && pass "panel: posting empty repeaters does clear them ($got)" \
  || bad "panel: posting empty repeaters does clear them (got $got, want 0:0)"

# 3. the header icon and the related-links list are saved by the same form, and
#    a save that omits them must not strip them either
$DB -e "DELETE FROM calculators WHERE source_path='$PATH_'" 2>/dev/null
$DB -e "INSERT INTO calculators (source_path, slug, category_slug, name, status, icon, thumbnail, related, created_at, updated_at)
        VALUES ('$PATH_', 'average', 'math', 'Average calculator', 'published', 'average', 'uploads/media/2026/10/a.jpg',
                JSON_ARRAY('/math/ellipse-area'), NOW(), NOW())" 2>/dev/null
out=$(phase partial | tail -1)
[ "$out" = ok ] && pass "panel: a scripted save goes through (icon case)" || bad "panel: a scripted save goes through (icon case)"
got=$($DB -N -e "SELECT CONCAT(IFNULL(icon,'-'),'|',IFNULL(thumbnail,'-'),'|',IFNULL(JSON_LENGTH(related),0)) FROM calculators WHERE source_path='$PATH_'" 2>/dev/null)
[ "$got" = "average|uploads/media/2026/10/a.jpg|1" ] && pass "panel: icon, thumbnail and related links survive ($got)" \
  || bad "panel: icon, thumbnail and related links survive (got $got)"

reset
[ "$(counts)" = "" ] && pass "cleanup: the override row is removed again" || bad "cleanup: the override row is removed again"
[ "$(curl -s "http://127.0.0.1:8080$PATH_" | grep -c 'faq-item')" -eq 6 ] && pass "cleanup: the harvested page is back" || bad "cleanup: the harvested page is back"

echo
if [ "$fail" -eq 0 ]; then echo "ALL PASSED"; else echo "$fail FAILED"; exit 1; fi
