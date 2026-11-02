<?php
/**
 * Unit tests for lib/Toolkit.php — the tool-file registry and shortcode engine.
 *
 *   bash /home/user/tools/php.sh tests/toolkit.php
 *
 * No HTTP and no database: everything here is the logic that decides whether a
 * file is a tool, whether a tag expands, and whether a path is safe. The panel
 * and the public page are exercised separately in tests/e2e_panel.php.
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/config.php';

use Onim\Toolkit;

$GLOBALS['passed'] = 0;
$GLOBALS['failed'] = 0;

function check(string $name, bool $ok, string $detail = ''): void
{
    if ($ok) {
        $GLOBALS['passed']++;
        echo "PASS  {$name}\n";
        return;
    }
    $GLOBALS['failed']++;
    echo "FAIL  {$name}" . ($detail !== '' ? "   [{$detail}]" : '') . "\n";
}

/* ------------------------------------------------------------- the folder */

$tools = Toolkit::scan(true);
check('three tool files ship with the site', count(Toolkit::valid()) >= 3, (string) count($tools));
check('the percentage tool is discovered by its shortcode', Toolkit::has('tool_percentage_of'));
check('the tip tool is discovered by its shortcode', Toolkit::has('tool_tip_split'));
check('the word counter is discovered by its shortcode', Toolkit::has('tool_word_counter'));
check('a tool knows its category from the header', (Toolkit::find('tool_tip_split')['category'] ?? '') === 'finance');
check('a tool knows its version', (Toolkit::find('tool_word_counter')['version'] ?? '') !== '');
check('an unknown shortcode is not a tool', Toolkit::find('tool_does_not_exist') === null);

/* ---------------------------------------------------------- rendering */

$html = Toolkit::render('[tool_percentage_of]');
check('rendering a tool returns HTML', str_contains($html, 'ptool'));
check('the answer is rendered on the server, not left to the script', str_contains($html, '<strong>30</strong>'));
check('the working is printed too', substr_count($html, 'of it') === 3);
check('the tool is scoped to its uid', (bool) preg_match('~id="tool_percentage_of-1"~', $html));
$first  = Toolkit::render('[tool_percentage_of]');
$second = Toolkit::render('[tool_percentage_of]');
check('a second instance gets its own uid',
    (bool) preg_match('~id="tool_percentage_of-\d+"~', $first)
    && (bool) preg_match('~id="tool_percentage_of-\d+"~', $second)
    && $first !== $second);

$euro = Toolkit::render('[tool_tip_split currency="€"]');
check('an attribute reaches the tool', str_contains($euro, '€'));
check('attributes default when missing', str_contains(Toolkit::render('[tool_tip_split]'), '$'));

/* ------------------------------------------------------- shortcode engine */

Toolkit::addShortcode('tt_upper', static fn (array $atts, ?string $inner, array $ctx): string => strtoupper((string) $inner));
Toolkit::addShortcode('tt_atts', static fn (array $atts, ?string $inner, array $ctx): string => json_encode($atts));
Toolkit::addShortcode('tt_throw', static function (array $atts, ?string $inner, array $ctx): string {
    throw new RuntimeException('deliberate');
});

check('an enclosing shortcode receives its inner text',
    Toolkit::doShortcode('[tt_upper]hello[/tt_upper]') === 'HELLO');
check('shortcodes nest', Toolkit::doShortcode('[tt_upper][tt_upper]ab[/tt_upper][/tt_upper]') === 'AB');
check('a self-closing shortcode renders',
    Toolkit::doShortcode('[tt_atts a="1" b=\'2\' c=3 d /]') === json_encode(['a' => '1', 'b' => '2', 'c' => '3', 'd' => '']),
    Toolkit::doShortcode('[tt_atts a="1" b=\'2\' c=3 d /]'));
check('an unknown tag is left exactly as typed',
    Toolkit::doShortcode('[nobody_registered_this]') === '[nobody_registered_this]');
check('a bracket that is not a tag is left alone',
    Toolkit::doShortcode('an array [1, 2, 3] and a note [x + 1]') === 'an array [1, 2, 3] and a note [x + 1]');
check('an escaped tag prints as text',
    Toolkit::doShortcode('[[tt_upper]]') === '[tt_upper]');
check('a throwing tool is contained and explained',
    str_contains(Toolkit::doShortcode('[tt_throw]'), 'could not run'));
check('the rest of the text survives a throwing tool',
    str_contains(Toolkit::doShortcode('before [tt_throw] after'), 'before')
    && str_contains(Toolkit::doShortcode('before [tt_throw] after'), 'after'));
check('hasShortcode finds a tag', Toolkit::hasShortcode('x [tool_tip_split] y', 'tool_tip_split'));
check('stripShortcodes removes them', Toolkit::stripShortcodes('a [tool_tip_split] b') === 'a  b');

/* --------------------------------------------------------------- headers */

$header = <<<'PHP'
<?php
/**
 * Tool Name: Example
 * Shortcode: tool_example_one
 * Category: math
 * Version: 2.1
 */
if (!defined('ONIM_TOOLKIT')) { exit; }
Toolkit::addShortcode('tool_example_one', fn () => '');
PHP;
$lint = Toolkit::lint($header);
check('a well-formed file passes the linter', $lint === null, (string) $lint);
check('a syntax error is caught before it reaches disk',
    Toolkit::lint("<?php\nfunction broken( {\n") !== null);

/* ------------------------------------------------------------- the guard */

check('a path outside plugins/ is refused', !Toolkit::isToolPath('../../config.db.php'));
check('an absolute path is refused', !Toolkit::isToolPath('/etc/passwd.php'));
check('a non-PHP path is refused', !Toolkit::isToolPath('math/notes.txt'));
check('a real tool path is accepted', Toolkit::isToolPath('math/qm-tool-percentage-of.php'));
check('a missing file is refused', !Toolkit::isToolPath('math/qm-tool-nope.php'));

/* ------------------------------------------------------------ translation */

Toolkit::setLocale('de');
check('a key with no translation falls back to the default text', Toolkit::t('Nothing Here', 'Nothing Here') === 'Nothing Here');
check('a key with no default falls back to the key', Toolkit::t('Nothing Here') === 'Nothing Here');
check('a translated key resolves in the current locale', Toolkit::t('Bill', 'Bill') === 'Rechnung');
check('an unknown locale keeps the English default', (static function (): bool {
    Toolkit::setLocale('fr');
    return Toolkit::t('Bill', 'Bill') === 'Bill';
})());
check('a regional locale falls back to its language file', (static function (): bool {
    Toolkit::setLocale('de-de');
    return Toolkit::t('Bill', 'Bill') === 'Rechnung';
})());
check('an underscore locale is normalised like a hyphen one', (static function (): bool {
    Toolkit::setLocale('de_DE');
    return Toolkit::locale() === 'de-de' && Toolkit::t('Bill', 'Bill') === 'Rechnung';
})());
check('locales() lists the translation files that exist', in_array('de', Toolkit::locales(), true));

/* Every string a tool prints must have a row in the German map: a translation
   that silently falls back to English is the failure this test exists for. */
$i18n = require dirname(__DIR__) . '/plugins/i18n/de.php';
$pattern = <<<'RE'
~\$t\('((?:[^'\\]|\\.)*)'~
RE;
$missing = [];
foreach (glob(dirname(__DIR__) . '/plugins/*/qm-tool-*.php') ?: [] as $plugin) {
    $source = (string) file_get_contents($plugin);
    preg_match_all($pattern, $source, $matches);
    foreach (array_unique($matches[1] ?? []) as $key) {
        $key = str_replace(["\\'", '\\\\'], ["'", '\\'], $key);
        if (!array_key_exists($key, $i18n)) {
            $missing[] = basename($plugin) . ': ' . $key;
        }
    }
}
check('every tool string is translated', $missing === [], implode('; ', array_slice($missing, 0, 4)));
Toolkit::setLocale(null);
check('the locale resets', Toolkit::locale() !== '');

printf("\n%d passed, %d failed\n", $GLOBALS['passed'], $GLOBALS['failed']);
exit($GLOBALS['failed'] === 0 ? 0 : 1);
