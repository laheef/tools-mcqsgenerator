<?php
/**
 * Tool Name: Title & Meta Length Checker
 * Shortcode: tool_serp_preview
 * Category: seo-tools
 * Version: 1.0.0
 * Description: See how a title and description look in a search result, with the character and pixel limits.
 * Language: en
 */

/*
 * Search results are not truncated by character count — they are truncated by
 * pixel width, and a title of W's runs out long before a title of i's. So the
 * tool measures both: characters for the habit, and an estimate in pixels from
 * an average glyph advance, which is what makes the difference between "59
 * characters" and "59 characters that fit".
 *
 * Google's practical limits at the time of writing: about 600 px for a title
 * (~60 characters of normal text) and about 960 px for a description (~155).
 * They are treated as guidance, not as rules, and the tool says so.
 *
 * The URL is shown the way Google shows it — breadcrumb-style, with the last
 * segment bold — because that is what makes a preview recognisable as a preview.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_serp_preview', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* The average advance of 14px Arial-ish text is about 7.4 px; the ratio is
       used in both directions so the server and the script agree. */
    $pxPerChar = 7.4;
    $titleMax  = 600;
    $descMax   = 960;

    $title = trim((string) ($_GET['t_title'] ?? ''));
    $desc  = trim((string) ($_GET['t_desc'] ?? ''));
    $url   = trim((string) ($_GET['t_url'] ?? ''));
    if ($title === '') {
        $title = 'Percentage Calculator — every step shown';
    }
    if ($desc === '') {
        $desc = 'Work out a percentage of a number and see the arithmetic behind the answer, not just the total.';
    }
    if ($url === '') {
        $url = 'mcqsgenerator.com/tool/math/percentage';
    }

    $tChars = mb_strlen($title);
    $dChars = mb_strlen($desc);
    $tPx    = (int) round($tChars * $pxPerChar);
    $dPx    = (int) round($dChars * $pxPerChar);

    /* Verdicts are whole sentences from the locale map, not adjectives
       assembled into a sentence afterwards. */
    $verdict = static function (int $chars, int $maxPx, float $pxPerChar) use ($t): array {
        $px = (int) round($chars * $pxPerChar);
        if ($chars === 0) {
            return [$t('Empty', 'Empty'), $chars, $px];
        }
        if ($px > $maxPx) {
            return [$t('Too long — the end will be cut', 'Too long — the end will be cut'), $chars, $px];
        }
        if ($px > $maxPx * 0.85) {
            return [$t('Full — right at the limit', 'Full — right at the limit'), $chars, $px];
        }
        return [$t('Fits with room to spare', 'Fits with room to spare'), $chars, $px];
    };

    [$titleVerdict] = $verdict($tChars, $titleMax, $pxPerChar);
    [$descVerdict]  = $verdict($dChars, $descMax, $pxPerChar);

    $action = (string) ($ctx['calc']['path'] ?? '/');

    ob_start();
    ?>
    <div class="serptool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .serptool-form { display: grid; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .serptool-form textarea { min-height: 62px; resize: vertical; }
            #<?= Toolkit::e($uid) ?> .serptool-count {
                display: flex; justify-content: space-between; gap: 8px; margin-top: 4px;
                font-size: 12px; color: var(--ink-4, #66717F); font-variant-numeric: tabular-nums;
            }
            #<?= Toolkit::e($uid) ?> .serptool-count b { color: var(--ink-2, #212427); }
            #<?= Toolkit::e($uid) ?> .serptool-count[data-state="over"] b { color: #B3261E; }
            #<?= Toolkit::e($uid) ?> .serptool-count[data-state="good"] b { color: #0F7B4F; }
            #<?= Toolkit::e($uid) ?> .serptool-preview {
                margin-top: 14px; padding: 14px 16px; border: 1px solid var(--border, #DFE2EB);
                border-radius: 10px; background: var(--surface, #fff); font-family: arial, sans-serif;
            }
            #<?= Toolkit::e($uid) ?> .serptool-crumb { font-size: 12.5px; color: #4d5156; line-height: 1.4; }
            #<?= Toolkit::e($uid) ?> .serptool-crumb b { color: #202124; font-weight: 400; }
            #<?= Toolkit::e($uid) ?> .serptool-title {
                margin: 3px 0 2px; color: #1a0dab; font-size: 20px; line-height: 1.3; font-weight: 400;
                overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
            }
            #<?= Toolkit::e($uid) ?> .serptool-desc { margin: 0; color: #4d5156; font-size: 14px; line-height: 1.55; }
            #<?= Toolkit::e($uid) ?> .serptool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .serptool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .serptool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .serptool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .serptool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <form class="serptool-form" method="get" action="<?= Toolkit::e($action) ?>" data-serp-form>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-title"><?= Toolkit::e($t('Page title', 'Page title')) ?></label>
                <input type="text" id="<?= Toolkit::e($uid) ?>-title" name="t_title" value="<?= Toolkit::e($title) ?>" data-serp="title" autocomplete="off">
                <p class="serptool-count" data-serp="title-count" data-state="good">
                    <span><?= Toolkit::e(strtr($t('Google shows about {chars} characters / {px} px', 'Google shows about {chars} characters / {px} px'), ['{chars}' => '60', '{px}' => '600'])) ?></span>
                    <span><?= strtr(Toolkit::e($t('{n} chars · {px} px', '{n} chars · {px} px')), ['{n}' => '<b data-serp="title-chars">' . $tChars . '</b>', '{px}' => (string) $tPx]) ?></span>
                </p>
            </div>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-desc"><?= Toolkit::e($t('Meta description', 'Meta description')) ?></label>
                <textarea id="<?= Toolkit::e($uid) ?>-desc" name="t_desc" data-serp="desc"><?= Toolkit::e($desc) ?></textarea>
                <p class="serptool-count" data-serp="desc-count" data-state="good">
                    <span><?= Toolkit::e(strtr($t('Google shows about {chars} characters / {px} px', 'Google shows about {chars} characters / {px} px'), ['{chars}' => '155', '{px}' => '960'])) ?></span>
                    <span><?= strtr(Toolkit::e($t('{n} chars · {px} px', '{n} chars · {px} px')), ['{n}' => '<b data-serp="desc-chars">' . $dChars . '</b>', '{px}' => (string) $dPx]) ?></span>
                </p>
            </div>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-url"><?= Toolkit::e($t('Address', 'Address')) ?></label>
                <input type="text" id="<?= Toolkit::e($uid) ?>-url" name="t_url" value="<?= Toolkit::e($url) ?>" data-serp="url" autocomplete="off" spellcheck="false">
            </div>
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Check it', 'Check it')) ?></button>
        </form>

        <div class="serptool-preview" aria-hidden="true">
            <div class="serptool-crumb" data-serp="crumb"><?= Toolkit::e($url) ?></div>
            <div class="serptool-title" data-serp="out-title"><?= Toolkit::e($title) ?></div>
            <p class="serptool-desc" data-serp="out-desc"><?= Toolkit::e($desc) ?></p>
        </div>

        <ul class="serptool-facts">
            <li><span><?= Toolkit::e($t('Title', 'Title')) ?></span><span data-serp="title-verdict"><?= Toolkit::e($titleVerdict) ?></span></li>
            <li><span><?= Toolkit::e($t('Description', 'Description')) ?></span><span data-serp="desc-verdict"><?= Toolkit::e($descVerdict) ?></span></li>
            <li><span><?= Toolkit::e($t('Words in the description', 'Words in the description')) ?></span><span data-serp="words"><?= Toolkit::e((string) (str_word_count($desc) ?: 0)) ?></span></li>
        </ul>

        <p class="serptool-note">
            <?= Toolkit::e(strtr(
                $t('Pixels are estimated at {px} px per character — an average, not a measurement. A title of narrow letters fits more, a title in capitals fits less. A search engine may rewrite a title it thinks is padded, so a shorter honest one is the safer bet.',
                   'Pixels are estimated at {px} px per character — an average, not a measurement. A title of narrow letters fits more, a title in capitals fits less. A search engine may rewrite a title it thinks is padded, so a shorter honest one is the safer bet.'),
                ['{px}' => (string) $pxPerChar]
            )) ?>
        </p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var title = root.querySelector('[data-serp="title"]');
            var desc = root.querySelector('[data-serp="desc"]');
            var url = root.querySelector('[data-serp="url"]');
            var outTitle = root.querySelector('[data-serp="out-title"]');
            var outDesc = root.querySelector('[data-serp="out-desc"]');
            var crumb = root.querySelector('[data-serp="crumb"]');
            var tChars = root.querySelector('[data-serp="title-chars"]');
            var dChars = root.querySelector('[data-serp="desc-chars"]');
            var tCount = root.querySelector('[data-serp="title-count"]');
            var dCount = root.querySelector('[data-serp="desc-count"]');
            var tVerdict = root.querySelector('[data-serp="title-verdict"]');
            var dVerdict = root.querySelector('[data-serp="desc-verdict"]');
            var words = root.querySelector('[data-serp="words"]');
            var PX = <?= json_encode($pxPerChar) ?>;
            var V = {
                empty: <?= json_encode($t('Empty', 'Empty'), JSON_UNESCAPED_UNICODE) ?>,
                over:  <?= json_encode($t('Too long — the end will be cut', 'Too long — the end will be cut'), JSON_UNESCAPED_UNICODE) ?>,
                full:  <?= json_encode($t('Full — right at the limit', 'Full — right at the limit'), JSON_UNESCAPED_UNICODE) ?>,
                fits:  <?= json_encode($t('Fits with room to spare', 'Fits with room to spare'), JSON_UNESCAPED_UNICODE) ?>
            };
            var L = {
                count: <?= json_encode($t('{n} chars · {px} px', '{n} chars · {px} px'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
            };

            function verdict(chars, maxPx) {
                var px = Math.round(chars * PX);
                if (chars === 0) return [V.empty, px, 'empty'];
                if (px > maxPx) return [V.over, px, 'over'];
                if (px > maxPx * 0.85) return [V.full, px, 'good'];
                return [V.fits, px, 'good'];
            }

            function keys(text) {
                return Array.from(text).length;
            }

            function run() {
                outTitle.textContent = title.value;
                outDesc.textContent = desc.value;
                crumb.textContent = url.value;

                var tv = verdict(keys(title.value), 600);
                var dv = verdict(keys(desc.value), 960);
                tChars.textContent = String(keys(title.value));
                dChars.textContent = String(keys(desc.value));
                tCount.setAttribute('data-state', tv[2]);
                dCount.setAttribute('data-state', dv[2]);
                /* The number stays bold, so the whole phrase is one translated
                   template with markup dropped into its placeholder. */
                tCount.lastElementChild.innerHTML = L.count
                    .replace('{n}', '<b>' + keys(title.value) + '</b>')
                    .replace('{px}', tv[1]);
                dCount.lastElementChild.innerHTML = L.count
                    .replace('{n}', '<b>' + keys(desc.value) + '</b>')
                    .replace('{px}', dv[1]);
                tVerdict.textContent = tv[0];
                dVerdict.textContent = dv[0];
                words.textContent = String((desc.value.trim().match(/\S+/g) || []).length);
            }

            [title, desc, url].forEach(function (el) {
                el.addEventListener('input', run);
            });
            root.querySelector('[data-serp-form]').addEventListener('submit', function (event) {
                event.preventDefault();
                run();
            });
            run();
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
