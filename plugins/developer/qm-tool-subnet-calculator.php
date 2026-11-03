<?php
/**
 * Tool Name: Subnet Calculator
 * Shortcode: tool_subnet_calculator
 * Category: networking-tools
 * Version: 1.0.0
 * Description: The network, broadcast, mask and host range of any CIDR block, with the arithmetic shown.
 * Language: en
 */

/*
 * Bit arithmetic on a 32-bit address, which is the one thing every subnet
 * calculator must get right and most get wrong at /31, /32 and /0.
 *
 * The interesting part is not the answer but the working: an address ANDed with
 * the mask is the network, ORed with the inverted mask is the broadcast, and the
 * hosts are what is between them. That is printed row by row, in binary, so the
 * reader can see *why* 192.168.1.130/26 is in 192.168.1.128 and not in .64.
 *
 * PHP's ip2long() returns a signed int on 32-bit builds, so the address is
 * handled as an unsigned 32-bit value throughout and only formatted at the end.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_subnet_calculator', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* What the visitor typed and what the page answers are two different
       things. `$given` keeps the typed text so a bad entry can say so; `$raw`
       is what the arithmetic runs on, which falls back to the example block
       when there is nothing usable to work with. */
    $given = trim((string) ($_GET['t_cidr'] ?? ''));
    $raw   = $given !== '' ? str_replace(' ', '', $given) : '192.168.1.130/26';

    /* ---- parse: address, optional "/bits" -------------------------------- */
    $bits = 24;
    $ipPart = $raw;
    if (str_contains($raw, '/')) {
        [$ipPart, $bitsPart] = explode('/', $raw, 2);
        if ($bitsPart !== '' && ctype_digit($bitsPart)) {
            $bits = max(0, min(32, (int) $bitsPart));
        }
    }
    $long = filter_var($ipPart, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false ? ip2long($ipPart) : false;
    $valid = $long !== false;
    /* A mistyped block used to fall back to the example silently, so the page
       answered a question nobody asked. It still shows the example — a page
       with no answer at all is worse — but it says so, and only when the
       visitor actually typed something. */
    $fellBack = !$valid && $given !== '';
    if (!$valid) {
        $long = ip2long('192.168.1.130');
        $bits = 26;
    }
    $ip = (int) sprintf('%u', $long);

    /* ---- the four lines that answer the question ------------------------- */
    $mask      = $bits === 0 ? 0 : (0xFFFFFFFF << (32 - $bits)) & 0xFFFFFFFF;
    $wildcard  = (~$mask) & 0xFFFFFFFF;
    $network   = $ip & $mask;
    $broadcast = $ip | $wildcard;

    /* /31 and /32 have no network/broadcast pair in the classic sense: both
       addresses are usable, which is what RFC 3021 is about. */
    if ($bits === 32) {
        $first = $last = $network;
        $hosts = 1;
    } elseif ($bits === 31) {
        $first = $network;
        $last  = $broadcast;
        $hosts = 2;
    } else {
        $first = $network + 1;
        $last  = $broadcast - 1;
        $hosts = max(0, (int) (pow(2, 32 - $bits) - 2));
    }
    /* 2^32 does not fit a 32-bit int; the /0 case is the only one that large. */
    $size = (int) pow(2, 32 - $bits);

    $toIp = static fn (int $n): string => long2ip($n & 0xFFFFFFFF);
    $toBin = static fn (int $n): string => implode('.', str_split(str_pad(decbin($n & 0xFFFFFFFF), 32, '0', STR_PAD_LEFT), 8));

    /* One map of words, used by the server render and handed to the script as
       JSON. Recomputing in the browser must not switch the page back to
       English — and a label typed twice is a label that drifts. */
    $w = [
        'network'   => $t('Network', 'Network'),
        'broadcast' => $t('Broadcast', 'Broadcast'),
        'mask'      => $t('Subnet mask', 'Subnet mask'),
        'wildcard'  => $t('Wildcard', 'Wildcard'),
        'first'     => $t('First usable', 'First usable'),
        'last'      => $t('Last usable', 'Last usable'),
        'hosts'     => $t('Usable hosts', 'Usable hosts'),
        'inBlock'   => $t('Addresses in block', 'Addresses in block'),
        'class'     => $t('Address class', 'Address class'),
        'private'   => $t('Private range', 'Private range'),
        'multicast' => $t('Multicast / reserved', 'Multicast / reserved'),
        'classC'    => $t('Class C', 'Class C'),
        'classB'    => $t('Class B', 'Class B'),
        'classA'    => $t('Class A', 'Class A'),
        'yesRfc'    => $t('Yes — RFC 1918', 'Yes — RFC 1918'),
        'no'        => $t('No', 'No'),
        'hostLine'  => $t('{n} hosts', '{n} hosts'),
        'address'   => $t('address', 'address'),
        'maskWord'  => $t('mask', 'mask'),
        'andNet'    => $t('AND → network', 'AND → network'),
        'inverted'  => $t('inverted', 'inverted'),
        'orBcast'   => $t('OR  → broadcast', 'OR  → broadcast'),
    ];

    $classKey = $ip >= 0xE0000000 ? 'multicast' : ($ip >= 0xC0000000 ? 'classC' : ($ip >= 0x80000000 ? 'classB' : 'classA'));
    $isPrivate = ($ip & 0xFF000000) === 0x0A000000
        || (($ip & 0xFFF00000) === 0xAC100000)
        || (($ip & 0xFFFF0000) === 0xC0A80000);

    $rows = [
        [$w['network'], $toIp($network)],
        [$w['broadcast'], $bits >= 31 ? '—' : $toIp($broadcast)],
        [$w['mask'], $toIp($mask) . ' (/' . $bits . ')'],
        [$w['wildcard'], $toIp($wildcard)],
        [$w['first'], $toIp($first)],
        [$w['last'], $toIp($last)],
        [$w['hosts'], number_format($hosts, 0, '.', ' ')],
        [$w['inBlock'], number_format($size, 0, '.', ' ')],
        [$w['class'], $w[$classKey]],
        [$w['private'], $isPrivate ? $w['yesRfc'] : $w['no']],
    ];

    ob_start();
    ?>
    <div class="subnettool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .subnettool-form { display: grid; gap: 8px; }
            #<?= Toolkit::e($uid) ?> .subnettool-form input { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; }
            #<?= Toolkit::e($uid) ?> .subnettool-answer {
                margin: 14px 0 0; padding: 12px 14px; border-radius: 10px;
                background: var(--brand-soft, #EBEFFF); border: 1px solid #D7DEFF; font-size: 13.4px; color: var(--ink-2, #212427);
            }
            #<?= Toolkit::e($uid) ?> .subnettool-answer strong {
                display: block; font-size: 20px; letter-spacing: -.01em; color: var(--brand-ink, #294CC2); line-height: 1.25;
                font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            }
            #<?= Toolkit::e($uid) ?> .subnettool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .subnettool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .subnettool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .subnettool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; }
            #<?= Toolkit::e($uid) ?> .subnettool-work {
                margin: 12px 0 0; padding: 10px 12px; border-radius: 10px; background: #0E1116; color: #D7DEE8;
                font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; font-size: 11.6px; line-height: 1.7;
                overflow-x: auto; white-space: pre;
            }
            #<?= Toolkit::e($uid) ?> .subnettool-work b { color: #8FB0FF; font-weight: 600; }
            #<?= Toolkit::e($uid) ?> .subnettool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); }
            #<?= Toolkit::e($uid) ?> .subnettool-warn { color: #8A5A00; font-weight: 600; }
        </style>

        <form class="subnettool-form" method="get" action="<?= Toolkit::e((string) ($ctx['calc']['path'] ?? '/')) ?>" data-subnet-form>
            <label for="<?= Toolkit::e($uid) ?>-cidr"><?= Toolkit::e($t('Address or CIDR block', 'Address or CIDR block')) ?></label>
            <input type="text" id="<?= Toolkit::e($uid) ?>-cidr" name="t_cidr" value="<?= Toolkit::e($raw !== '' ? $raw : '192.168.1.130/26') ?>"
                   autocomplete="off" spellcheck="false" data-subnet="input">
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Work it out', 'Work it out')) ?></button>
        </form>

        <?php if ($fellBack): ?>
            <p class="subnettool-note subnettool-warn" data-subnet="error">
                <?= Toolkit::e(strtr($t('“{given}” is not an IPv4 address. The numbers below are the example block 192.168.1.130/26, not an answer about what you typed.', '“{given}” is not an IPv4 address. The numbers below are the example block 192.168.1.130/26, not an answer about what you typed.'), ['{given}' => $given])) ?>
            </p>
        <?php endif; ?>

        <p class="subnettool-answer" role="status" aria-live="polite">
            <?= Toolkit::e($t('Network', 'Network')) ?>
            <strong data-subnet="out-network"><?= Toolkit::e($toIp($network)) ?>/<?= Toolkit::e((string) $bits) ?></strong>
            <span data-subnet="out-range"><?= Toolkit::e($toIp($first)) ?> – <?= Toolkit::e($toIp($last)) ?> · <?= Toolkit::e(strtr($w['hostLine'], ['{n}' => number_format($hosts, 0, '.', ' ')])) ?></span>
        </p>

        <ul class="subnettool-facts" data-subnet="facts">
            <?php foreach ($rows as $row): ?>
                <li><span><?= Toolkit::e($row[0]) ?></span><span><?= Toolkit::e($row[1]) ?></span></li>
            <?php endforeach; ?>
        </ul>

        <pre class="subnettool-work" data-subnet="work"><?= Toolkit::e($toBin($ip)) ?>  <b><?= Toolkit::e($w['address']) ?></b>   <?= Toolkit::e($toIp($ip)) ?>

<?= Toolkit::e($toBin($mask)) ?>  <b><?= Toolkit::e($w['maskWord']) ?></b>      /<?= Toolkit::e((string) $bits) ?>

<?= Toolkit::e($toBin($network)) ?>  <b><?= Toolkit::e($w['andNet']) ?></b>

<?= Toolkit::e($toBin($wildcard)) ?>  <b><?= Toolkit::e($w['inverted']) ?></b>

<?= Toolkit::e($toBin($broadcast)) ?>  <b><?= Toolkit::e($w['orBcast']) ?></b></pre>

        <p class="subnettool-note">
            <?= Toolkit::e($isPrivate
                ? $t('This is a private address, so it is not routed on the internet — which is why every home router hands out 192.168.x.x.', 'This is a private address, so it is not routed on the internet — which is why every home router hands out 192.168.x.x.')
                : $t('This is a public address: whoever holds it is reachable from the internet, unless a firewall says otherwise.', 'This is a public address: whoever holds it is reachable from the internet, unless a firewall says otherwise.')) ?>
            <?= Toolkit::e($bits >= 31 ? ' ' . strtr($t('A /{bits} point-to-point block has no network and broadcast pair — both addresses are usable.', 'A /{bits} point-to-point block has no network and broadcast pair — both addresses are usable.'), ['{bits}' => (string) $bits]) : '') ?>
        </p>

        <script>
        (function () {
            var L = <?= json_encode($w, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var input = root.querySelector('[data-subnet="input"]');
            var network = root.querySelector('[data-subnet="out-network"]');
            var range = root.querySelector('[data-subnet="out-range"]');
            var facts = root.querySelector('[data-subnet="facts"]');
            var work = root.querySelector('[data-subnet="work"]');
            var error = root.querySelector('[data-subnet="error"]');

            function parse(text) {
                var match = String(text).trim().replace(/\s/g, '').match(/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})(?:\/(\d{1,2}))?$/);
                if (!match) return null;
                var parts = [Number(match[1]), Number(match[2]), Number(match[3]), Number(match[4])];
                for (var i = 0; i < 4; i++) if (parts[i] > 255) return null;
                var bits = match[5] === undefined ? 24 : Number(match[5]);
                if (bits > 32) return null;
                return { ip: ((parts[0] << 24) | (parts[1] << 16) | (parts[2] << 8) | parts[3]) >>> 0, bits: bits };
            }
            function toIp(n) {
                n = n >>> 0;
                return [(n >>> 24) & 255, (n >>> 16) & 255, (n >>> 8) & 255, n & 255].join('.');
            }
            function toBin(n) {
                var s = (n >>> 0).toString(2);
                while (s.length < 32) s = '0' + s;
                return s.match(/.{8}/g).join('.');
            }
            function group(n) {
                return String(n).replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
            }
            function maskFor(bits) {
                return bits === 0 ? 0 : (0xFFFFFFFF << (32 - bits)) >>> 0;
            }

            function run() {
                var parsed = parse(input.value);
                if (!parsed) {
                    if (!error) {
                        error = document.createElement('p');
                        error.className = 'subnettool-note subnettool-warn';
                        error.setAttribute('data-subnet', 'error');
                        input.parentNode.insertBefore(error, input.nextSibling);
                    }
                    error.textContent = <?= json_encode($t('That is not an IPv4 address, so the numbers below are still the last good block — 192.168.1.130/26. Type four numbers 0–255 and an optional /0–/32.', 'That is not an IPv4 address, so the numbers below are still the last good block — 192.168.1.130/26. Type four numbers 0–255 and an optional /0–/32.'), JSON_UNESCAPED_UNICODE) ?>;
                    return;
                }
                if (error) error.textContent = '';

                var bits = parsed.bits, ip = parsed.ip;
                var mask = maskFor(bits), wild = (~mask) >>> 0;
                var net = (ip & mask) >>> 0, bcast = (ip | wild) >>> 0;
                var first, last, hosts;
                if (bits === 32) { first = last = net; hosts = 1; }
                else if (bits === 31) { first = net; last = bcast; hosts = 2; }
                else { first = (net + 1) >>> 0; last = (bcast - 1) >>> 0; hosts = Math.pow(2, 32 - bits) - 2; }

                network.textContent = toIp(net) + '/' + bits;
                range.textContent = toIp(first) + ' – ' + toIp(last) + ' · ' + L.hostLine.replace('{n}', group(hosts));

                var cls = ip >= 0xE0000000 ? L.multicast : (ip >= 0xC0000000 ? L.classC : (ip >= 0x80000000 ? L.classB : L.classA));
                var priv = ((ip & 0xFF000000) >>> 0) === 0x0A000000
                    || ((ip & 0xFFF00000) >>> 0) === 0xAC100000
                    || ((ip & 0xFFFF0000) >>> 0) === 0xC0A80000;
                var rows = [
                    [L.network, toIp(net)],
                    [L.broadcast, bits >= 31 ? '—' : toIp(bcast)],
                    [L.mask, toIp(mask) + ' (/' + bits + ')'],
                    [L.wildcard, toIp(wild)],
                    [L.first, toIp(first)],
                    [L.last, toIp(last)],
                    [L.hosts, group(hosts)],
                    [L.inBlock, group(Math.pow(2, 32 - bits))],
                    [L.class, cls],
                    [L.private, priv ? L.yesRfc : L.no]
                ];
                facts.innerHTML = rows.map(function (row) {
                    return '<li><span></span><span></span></li>';
                }).join('');
                var items = facts.querySelectorAll('li');
                rows.forEach(function (row, index) {
                    items[index].children[0].textContent = row[0];
                    items[index].children[1].textContent = row[1];
                });

                work.textContent = toBin(ip) + '  ' + L.address + '   ' + toIp(ip) + '\n\n'
                    + toBin(mask) + '  ' + L.maskWord + '      /' + bits + '\n\n'
                    + toBin(net) + '  ' + L.andNet + '\n\n'
                    + toBin(wild) + '  ' + L.inverted + '\n\n'
                    + toBin(bcast) + '  ' + L.orBcast;
            }

            input.addEventListener('input', run);
            root.querySelector('[data-subnet-form]').addEventListener('submit', function (event) {
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
