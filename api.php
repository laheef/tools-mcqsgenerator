<?php
/**
 * POST /api/like       — add one like to a calculator
 * POST /api/review     — publish a reader review
 * GET  /api/reviews    — the reviews for one calculator (used for live refresh)
 *
 * Everything is validated on the server: the path must exist, the text must be
 * long enough to be a real review, links are rejected, and a visitor may only
 * like a page once and may only post a handful of reviews an hour. The browser
 * never decides anything — it only displays what this returns.
 */

declare(strict_types=1);

use Omni\Data;
use Omni\Engagement;

/** Read a JSON body, falling back to form encoding. */
function api_input(): array
{
    $raw = file_get_contents('php://input');
    if (is_string($raw) && $raw !== '') {
        $json = json_decode($raw, true);
        if (is_array($json)) {
            return $json;
        }
        parse_str($raw, $form);
        return is_array($form) ? $form : [];
    }
    return $_POST;
}

function api_json(array $payload, int $status = 200): never
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store, max-age=0');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

/** Stable, anonymous visitor token kept in a first-party cookie. */
function api_visitor(): string
{
    $name = 'omni_vid';
    $existing = $_COOKIE[$name] ?? '';
    if (is_string($existing) && preg_match('/^[a-f0-9]{16,64}$/', $existing) === 1) {
        return $existing;
    }
    $token = bin2hex(random_bytes(12));
    setcookie($name, $token, [
        'expires'  => time() + 60 * 60 * 24 * 365,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    $_COOKIE[$name] = $token;
    return $token;
}

/** Simple per-visitor action log, used for the like-once and rate-limit rules. */
function api_ledger(string $visitor, ?array $add = null): array
{
    $file = Data::path('engagement/visitors.json');
    $fh = @fopen($file, 'c+');
    if ($fh === false) {
        return ['likes' => [], 'reviews' => []];
    }
    flock($fh, LOCK_EX);
    $raw = stream_get_contents($fh);
    $all = is_string($raw) && $raw !== '' ? json_decode($raw, true) : [];
    if (!is_array($all)) {
        $all = [];
    }
    $mine = $all[$visitor] ?? ['likes' => [], 'reviews' => []];
    $mine['likes']   = is_array($mine['likes'] ?? null) ? $mine['likes'] : [];
    $mine['reviews'] = is_array($mine['reviews'] ?? null) ? $mine['reviews'] : [];

    if ($add !== null) {
        // keep the ledger small: drop review timestamps older than a day
        $mine['reviews'] = array_values(array_filter($mine['reviews'], static fn ($t) => $t > time() - 86400));
        if (($add['like'] ?? null) !== null) {
            $mine['likes'][] = (string) $add['like'];
        }
        if (($add['review'] ?? null) !== null) {
            $mine['reviews'][] = (int) $add['review'];
        }
        $all[$visitor] = $mine;
        // prune visitors that have been idle for a month
        foreach ($all as $k => $v) {
            if (is_array($v) && ($v['reviews'] ?? []) === [] && count($v['likes'] ?? []) > 200) {
                unset($all[$k]);
            }
        }
        ftruncate($fh, 0);
        rewind($fh);
        fwrite($fh, json_encode($all, JSON_UNESCAPED_SLASHES));
        fflush($fh);
    }
    flock($fh, LOCK_UN);
    fclose($fh);
    return $mine;
}

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$action = $segments[1] ?? '';

/* ------------------------------------------------------------------ reviews */
if ($action === 'reviews' && $method === 'GET') {
    $path = (string) ($_GET['path'] ?? '');
    if ($path === '' || Data::calculator($path) === null) {
        api_json(['ok' => false, 'error' => 'Unknown calculator.'], 404);
    }
    $reviews = Engagement::reviews($path);
    [$avg, $count] = Engagement::rating($path);
    api_json([
        'ok'      => true,
        'rating'  => $avg,
        'count'   => $count,
        'likes'   => Engagement::likeCount($path),
        'reviews' => array_map(static fn ($r) => [
            'id'     => $r['id'],
            'name'   => $r['name'],
            'title'  => $r['title'] ?? '',
            'body'   => $r['body'],
            'rating' => (int) $r['rating'],
            'ts'     => (int) $r['ts'],
            'ago'    => \Omni\Format::ago((int) $r['ts']),
            'initials' => Engagement::initials((string) $r['name']),
        ], $reviews),
    ]);
}

/* --------------------------------------------------------------------- like */
if ($action === 'like') {
    if ($method !== 'POST') {
        api_json(['ok' => false, 'error' => 'Use POST.'], 405);
    }
    $in   = api_input();
    $path = (string) ($in['path'] ?? '');
    if ($path === '' || Data::calculator($path) === null) {
        api_json(['ok' => false, 'error' => 'Unknown calculator.'], 404);
    }
    $visitor = api_visitor();
    $ledger  = api_ledger($visitor);
    $already = in_array($path, $ledger['likes'], true);
    $result  = Engagement::like($path, $visitor, $already);
    if ($result['changed']) {
        api_ledger($visitor, ['like' => $path]);
    }
    api_json([
        'ok'      => true,
        'likes'   => $result['count'],
        'liked'   => true,
        'changed' => $result['changed'],
        'message' => $result['changed']
            ? 'Thanks — that is one more vote for this calculator.'
            : 'You have already liked this calculator.',
    ]);
}

/* ------------------------------------------------------------------- review */
if ($action === 'review') {
    if ($method !== 'POST') {
        api_json(['ok' => false, 'error' => 'Use POST.'], 405);
    }
    $in      = api_input();
    $visitor = api_visitor();
    $ledger  = api_ledger($visitor);

    // at most 5 reviews per visitor per hour, and never the identical text twice
    $recent = array_filter($ledger['reviews'], static fn ($t) => $t > time() - 3600);
    if (count($recent) >= 5) {
        api_json([
            'ok'    => false,
            'error' => 'You have posted several reviews in the last hour. Please try again later.',
        ], 429);
    }

    $in['ua'] = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $result = Engagement::addReview($in);
    if (!$result['ok']) {
        api_json(['ok' => false, 'errors' => $result['errors'], 'error' => reset($result['errors'])], 422);
    }

    api_ledger($visitor, ['review' => time()]);
    $row = $result['review'];
    [$avg, $count] = Engagement::rating($row['path']);
    api_json([
        'ok'     => true,
        'rating' => $avg,
        'count'  => $count,
        'review' => [
            'id'       => $row['id'],
            'name'     => $row['name'],
            'title'    => $row['title'] ?? '',
            'body'     => $row['body'],
            'rating'   => (int) $row['rating'],
            'ts'       => (int) $row['ts'],
            'ago'      => \Omni\Format::ago((int) $row['ts']),
            'initials' => Engagement::initials($row['name']),
        ],
    ], 201);
}

api_json(['ok' => false, 'error' => 'Unknown endpoint.'], 404);
