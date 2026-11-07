<?php
/**
 * Turns a calculator definition + solver state into a simple view model that
 * the templates can loop over without knowing anything about Onim's schema.
 */

declare(strict_types=1);

namespace Onim;

final class Widget
{
    private array $calc;
    private Units $units;
    private Solver $solver;
    /** @var array<string,string> var => selected unit slug */
    private array $unitChoice;
    /** @var array<string,float|null> var => value in display units */
    public array $shown = [];
    /** @var array<string,string> var => formatted, grouped display string */
    public array $pretty = [];
    /** var => the label of the option it currently holds (for {{x.uiValue}}) */
    public array $choiceLabels = [];
    /** @var array<string,string> var => plain string for an <input value> */
    public array $plain = [];
    /** @var array<int,array{variants:array}> formula lines, for client re-render */
    public array $texts = [];
    /**
     * Variables the calculator presents as its answers: the left-hand side of
     * each equation's headline form ("time = area / (area_per_hour/3600)").
     *
     * Every variable in these specs is solvable from the others, so "is this a
     * result?" cannot be answered by arithmetic alone — but the equation's own
     * subject is exactly the number the page means to hand you. Those live in
     * the results panel and never take up a box in the form.
     *
     * @var array<string,bool>
     */
    private array $declaredOutputs = [];

    public function __construct(array $calc, Units $units, Solver $solver, array $unitChoice = [])
    {
        $this->calc   = $calc;
        $this->units  = $units;
        $this->solver = $solver;
        $this->unitChoice = $unitChoice;
        $this->declaredOutputs = self::declaredOutputs($calc['equations'] ?? []);
        $this->computeDisplay();
    }

    /** Display-unit values and their formatted forms for every known variable. */
    private function computeDisplay(): void
    {
        foreach ($this->calc['variables'] as $name => $def) {
            if (!isset($this->solver->values[$name])) {
                continue;
            }
            if (isset($this->solver->known) && !isset($this->solver->known[$name])) {
                continue;   // an unset variable renders as blank, not as zero
            }
            if (!empty($this->solver->placeholder[$name])) {
                continue;   // seeded for the solver, never shown
            }
            $base = (float) $this->solver->values[$name];
            $key  = $this->unitKey($name);
            // the field's own opening unit wins over the switcher-wide default
            // (a converter shares one switcher but opens in different units)
            $unit = $this->unitChoice[$name]
                ?? ($def['defaultUnit'] ?? null)
                ?? ($key ? $this->units->defaultUnit($key) : null);
            if ($key !== null && $unit !== null && !$this->units->offers($key, $unit)) {
                if (($def['defaultUnit'] ?? null) !== null) {
                    $unit = null;      // compound default: the stored number is the display
                } else {
                    $unit = $this->units->defaultUnit($key);
                }
            }
            $shown = $unit ? $this->units->toDisplay($base, $key, $unit) : $base;
            $this->shown[$name] = $shown;

            $rounding = $def['rounding'] ?? null;
            $precision = $rounding['precision'] ?? null;
            $algo = $rounding['algorithm'] ?? 'omni';
            $minDigits = $def['minDigits'] ?? null;

            $this->pretty[$name] = Format::number($shown, $precision, $algo, $minDigits);
            // a solved value is shown grouped (1 600 000); a value the visitor
            // will type into stays ungrouped so the caret never sits between digits
            $isComputed = isset($this->solver->computed[$name]) && !$this->isUserInput($name);
            $this->plain[$name]  = $this->plainNumber($shown, $precision, $algo, $isComputed);
        }
    }

    /**
     * The number as it is written inside an input box. Must match
     * plainNumber() in assets/js/calc.js exactly, including the two rounding
     * conventions: "standard" reads precision as a decimal count, "omni" as a
     * step. Reading a standard precision of 2 as a step rounded 204,978.4 to
     * 204,978 in the box while the result line showed .4.
     */
    /**
     * Group the integer part of a finished string with no-break spaces, so a
     * result of 1 600 000 reads at a glance. Only used for read-only boxes:
     * Format::parse() strips these separators again, so a copied value still
     * round-trips into the solver.
     */
    private static function groupDigits(string $s): string
    {
        $neg = str_starts_with($s, '-');
        if ($neg) {
            $s = substr($s, 1);
        }
        $parts = explode('.', $s, 2);
        $parts[0] = preg_replace('/\B(?=(\d{3})+(?!\d))/', "\u{00A0}", $parts[0]) ?? $parts[0];
        return ($neg ? '-' : '') . implode('.', $parts);
    }

    private function plainNumber(float $v, ?string $precision, string $algo, bool $group = false): string
    {
        if (!is_finite($v)) {
            return '';
        }
        $decimals = 0;
        if ($algo === 'standard') {
            $decimals = (int) round((float) ($precision ?? 0));
        } else {
            $step = $precision !== null ? (float) $precision : 0.0;
            if ($step > 0) {
                $decimals = (int) ceil(-log10($step) - 1e-9);
            }
        }
        $decimals = (int) max(0, min(12, $decimals));
        if ($algo === 'standard') {
            $v = round($v, $decimals);
        }
        $s = number_format($v, $decimals, '.', '');
        if ($decimals > 0) {
            $s = rtrim(rtrim($s, '0'), '.');
        }
        if ($s === '-0') {
            $s = '0';
        }
        return $group ? self::groupDigits($s) : $s;
    }

    private function unitKey(string $name): ?string
    {
        foreach ($this->fieldsOf($name) as $f) {
            if (!empty($f['unitSwitcher']) && !empty($f['unitSwitcherSecond'])) {
                // percentage-style double switcher: the value chip is the main one
                return $f['unitSwitcher'];
            }
            if (!empty($f['unitSwitcher'])) {
                return $f['unitSwitcher'];
            }
        }
        return null;
    }

    /** All variable fields referencing $name (a variable can appear once). */
    private function fieldsOf(string $name): array
    {
        $out = [];
        foreach ($this->calc['groups'] as $g) {
            foreach ($g['matrices'] as $m) {
                foreach ($m['columns'] as $col) {
                    foreach ($col as $f) {
                        if (($f['type'] ?? '') === 'variable' && ($f['var'] ?? null) === $name) {
                            $out[] = $f;
                        }
                    }
                }
            }
        }
        return $out;
    }

    /** @return array<int,array> */
    public function groups(): array
    {
        $out = [];
        /*
         * A harvested definition may name the same variable in two places (the
         * desk-height page renders `height` twice, with the same element id).
         * Only the first occurrence becomes a control: a second copy of a box is
         * a second answer to the same question, and a duplicate id besides.
         */
        $seen = [];
        foreach ($this->calc['groups'] as $g) {
            if (!empty($g['hidden'])) {
                continue;
            }
            $matrices = [];
            foreach ($g['matrices'] as $m) {
                $columns = [];
                foreach ($m['columns'] as $col) {
                    $fields = [];
                    foreach ($col as $raw) {
                        $field = $this->field($raw);
                        if ($field === null) {
                            continue;
                        }
                        if (isset($field['name']) && $field['name'] !== '') {
                            $key = ($field['kind'] ?? '') . ':' . $field['name'];
                            if (isset($seen[$key])) {
                                continue;
                            }
                            $seen[$key] = true;
                        }
                        $fields[] = $field;
                    }
                    if ($fields !== []) {
                        $columns[] = $fields;
                    }
                }
                if ($columns !== []) {
                    $matrices[] = ['grid' => $m['grid'] ?? 'FR1', 'columns' => $columns];
                }
            }
            if ($matrices === []) {
                continue;
            }
            $out[] = [
                'uid' => $g['uid'] ?? '',
                'title' => self::heading((string) ($g['title'] ?? '')),
                'description' => self::heading((string) ($g['description'] ?? '')),
                'collapsable' => $g['collapsable'] ?? 'defaultExpanded',
                'matrices' => $matrices,
            ];
        }
        return $out;
    }

    /**
     * The label to print for a control.
     *
     * Harvested definitions sometimes leave a field with no label at all. An
     * empty label over an empty box is the blank row the brief calls out, so the
     * variable's own name is used instead, spaced out for reading
     * ("cationNameFromSymbol" -> "Cation name from symbol").
     */
    private static function fieldLabel(array $raw, array $def, string $name): string
    {
        $label = self::cleanLabel((string) ($raw['label'] ?? ''));
        if (trim($label) !== '') {
            return $label;
        }
        $fallback = trim((string) ($def['name'] ?? ''));
        if ($fallback === '') {
            $fallback = $name;
        }
        $spaced = (string) preg_replace('/(?<=[a-z0-9])(?=[A-Z])/', ' ', $fallback);
        $spaced = str_replace('_', ' ', $spaced);
        $spaced = trim((string) preg_replace('/\s+/', ' ', $spaced));
        if ($spaced === '') {
            return $label;
        }
        return self::cleanLabel(mb_strtoupper(mb_substr($spaced, 0, 1)) . mb_substr($spaced, 1));
    }

    private function field(array $raw): ?array
    {
        $type = $raw['type'] ?? '';

        if ($type === 'variable') {
            return $this->variableField($raw);
        }

        if ($type === 'text') {
            /*
             * A text line is assembled from fragments: each chunk is shown only
             * when its own condition holds, and the fragments are concatenated.
             * Keeping them separate is what turns a set of one-line conditions
             * into the reference site's single sentence ("= 34 years, 2 months
             * and 3 days").
             */
            $groups = [];
            $pieces = [];   // one entry per chunk actually shown, so an
                            // incomplete tail can be dropped again
            $block = false;
            /*
             * Does this line depend on a condition at all? A line that only
             * prints when a value falls in a range is feedback about the
             * visitor's own numbers, and is drawn differently from a written
             * explanation that is always there.
             */
            $hasCondition = false;
            foreach ($raw['chunks'] ?? [] as $chunk) {
                foreach ($chunk['variants'] ?? [] as $v) {
                    if (trim((string) ($v['condition'] ?? '')) !== '') {
                        $hasCondition = true;
                        break 2;
                    }
                }
            }
            foreach ($raw['chunks'] ?? [] as $chunk) {
                $variants = [];
                foreach ($chunk['variants'] ?? [] as $v) {
                    if (trim((string) ($v['html'] ?? '')) !== '') {
                        $variants[] = $v;
                    }
                }
                if ($variants === []) {
                    continue;
                }
                $groups[] = array_map(
                    static fn (array $v): array => [
                        'condition' => $v['condition'] ?? null,
                        'html' => View::rewriteArticleHtml(
                            (string) ($v['html'] ?? ''),
                            '',
                            \Onim\InternalLinks::MAX_PER_PAGE,
                            true            // keep {{x.value}} slots: they are live
                        ),
                    ],
                    $variants
                );
                $picked = Conditions::pick($variants, $this->solver->known, $this->solver->values);
                if ($picked !== null) {
                    $picked = self::cleanText($picked);
                }
                if ($picked === null || trim($picked) === '') {
                    continue;
                }
                if (preg_match('~<(ul|ol|li|table|h\d)\b~i', $picked)) {
                    $block = true;
                }
                $pieces[] = $picked;
            }
            if ($groups === []) {
                return null;
            }
            // register the line first: an empty one still needs its index, because
            // calc.js re-renders it once the visitor supplies the missing value
            $index = count($this->texts);
            $this->texts[] = $groups;
            /*
             * These lines are assembled from separately-conditioned fragments.
             * When a lead-in is unconditional ("That's exactly the density of")
             * but the fragment that finishes the sentence depends on a value the
             * visitor has not entered, the line would end mid-sentence. Drop such
             * a tail rather than showing a hanging clause.
             */
            $html = '';
            $connector = '/(?:\b(?:of|and|the|a|an|to|in|into|between|than|is|are|or|with|from|as|at|by|for|that|per|about|over|under|equal)\b)[\s\x{00a0},;:\-—–]*$/iu';
            for ($i = count($pieces) - 1; $i >= 0; $i--) {
                $candidate = implode('', array_slice($pieces, 0, $i + 1));
                // interpolate first: a fragment can end with a hanging word only
                // after its {{value}} slot resolves to nothing
                $resolved = Conditions::interpolate($candidate, $this->pretty, $this->choiceLabels);
                $plain = str_replace(['&nbsp;', "\u{00a0}"], ' ', strip_tags($resolved));
                if ($i === count($pieces) - 1 && preg_match($connector, trim($plain)) === 1) {
                    continue;   // hanging tail: try without it
                }
                $html = $candidate;
                break;
            }
            // A single fragment can be truncated mid-sentence by the harvest
            // ("2. Square the results and sum them up: ("). It carries no markup,
            // so it can be cut back to its last complete, balanced sentence.
            $tail = Conditions::interpolate($html, $this->pretty, $this->choiceLabels);
            $tailPlain = trim(str_replace(['&nbsp;', "\u{00a0}"], ' ', strip_tags($tail)));
            if (strpos($tail, '<') === false && self::looksCutOff($tailPlain)) {
                $html = self::cutToLastSentence($tailPlain);
            }
            // a malformed slot ("{{ip_firIP: ...") has no closing braces to match
            $html = (string) preg_replace('~\{\{[^{}]{0,60}~u', '', $html);
            $plainHtml = trim(str_replace(['&nbsp;', "\u{00a0}"], ' ', strip_tags($html)));
            // An empty slot ("(x2 − x1) = 4 − 1 =  (y2 − y1) =") means the line
            // quotes a value this build cannot compute. Showing the sentence
            // with holes in it is worse than showing no line at all.
            $rawHtml = str_replace(['&nbsp;', "\u{00a0}"], ' ', strip_tags($html));
            if (preg_match('~=\s{2,}|=\s*$|=\s*[(\[]\s*[)\]]|\(\s*\)~u', $rawHtml) === 1) {
                $plainHtml = '';
            }
            if ($plainHtml === '') {
                // nothing but a lead-in: ship an empty line. The element stays in
                // the DOM because calc.js re-renders it once the value exists.
                return [
                    'kind' => 'text', 'index' => $index, 'html' => '', 'class' => $raw['formatType'] ?? '', 'block' => false,
                    /* empty for now, but calc.js will fill it: it still needs to
                       know whether the line will be a conditional response */
                    'feedback' => $hasCondition,
                ];
            }
            // A question whose answer fragment needs a value the visitor has not
            // entered is just a dangling question, so it waits for the value too.
            if (count($pieces) === 1 && count($groups) > 1 && mb_substr($plainHtml, -1) === '?') {
                return [
                    'kind' => 'text', 'index' => $index, 'html' => '', 'class' => $raw['formatType'] ?? '', 'block' => false,
                    /* empty for now, but calc.js will fill it: it still needs to
                       know whether the line will be a conditional response */
                    'feedback' => $hasCondition,
                ];
            }
            /*
             * Prose is not a formula.
             *
             * A conditional line used to be a formula line unless it held a list
             * or a table, and formula lines are set in monospace, on one line,
             * scrolling sideways. That is right for "BMI = mass / height²" and
             * wrong for "This height is very tall for women. It is more
             * appropriate to use the Ponderal Index." — a sentence rendered in a
             * monospace no-wrap box is clipped on a phone and reads like code.
             * A line that is a sentence (long, or ending in punctuation) is drawn
             * as the prose block it is; a short expression keeps the code style.
             */
            if (!$block) {
                $prose = trim(str_replace(['&nbsp;', "\u{00a0}"], ' ', strip_tags(
                    Conditions::interpolate((string) $html, $this->pretty, $this->choiceLabels)
                )));
                if (mb_strlen($prose) > 60 || preg_match('~[.!?]\s*$~u', $prose) === 1) {
                    $block = true;
                }
            }
            return [
                'kind' => 'text',
                'index' => $index,
                'html' => Conditions::interpolate(View::rewriteArticleHtml($html), $this->pretty,
                                                 $this->choiceLabels),
                'class' => $raw['formatType'] ?? '',
                'block' => $block,
                /* true whenever the line only appears because a value fell in a
                   range — the client uses it when it re-classifies the line */
                'feedback' => $hasCondition,
            ];
        }

        if ($type === 'image') {
            $url = null;
            foreach ($raw['urls'] ?? [] as $u) {
                if (!empty($u['value'])) {
                    $url = $u['value'];
                    break;
                }
            }
            if ($url === null) {
                return null;
            }
            $local = __DIR__ . '/../assets/img/figures/' . str_replace('/', '__', $url);
            if (!is_file($local)) {
                return null; // figure not mirrored: omit rather than show a broken image
            }
            $caption = $raw['caption'] ?? '';
            $alt = $caption !== ''
                ? $caption
                : 'Diagram for ' . ($this->calc['name'] ?? 'this calculator');
            return [
                'kind' => 'image',
                'src' => View::asset('img/figures/' . str_replace('/', '__', $url)),
                'caption' => $caption,
                'alt' => $alt,
            ];
        }

        // tables and charts are driven by per-calculator custom JS in the
        // original; they are omitted here (see SPEC.md §8) rather than faked.
        return null;
    }

    /**
     * Clean a field label for display.
     *
     * The harvested reference definitions carry two kinds of noise that a reader
     * must not see: emphasis markers left in the text ("Current salary
     * ^^ (required) ^^") and question-style labels ("What would you like to
     * know?"), which read badly as the label above an input box.
     */
    public static function cleanLabel(string $label): string
    {
        $label = html_entity_decode(html_entity_decode($label, ENT_QUOTES | ENT_HTML5, 'UTF-8'), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $label = str_replace("\u{00a0}", ' ', $label);
        $label = (string) preg_replace('~\{\{[^{}]{0,60}\}\}~u', '', $label);
        $label = str_replace(['^^', '**', '__'], '', $label);
        $label = (string) preg_replace('~==(.+?)==~u', '$1', $label);
        $label = (string) preg_replace('~\(\s*required\s*\)~i', '', $label);
        // a token that was the only thing inside the brackets leaves an empty pair:
        // the currency converter used to read "From currency ()"
        $label = (string) preg_replace('~\(\s*[)\-–]*\s*\)~u', '', $label);
        $label = (string) preg_replace('~\s+~', ' ', trim($label));
        // a leading tree marker on a sub-field ("↳ Clamp fill volume allowance")
        $label = (string) preg_replace('~^[\s\x{21b3}\x{2192}>»]+~u', '', $label);
        $label = trim($label, " ?:.,;");

        // "What would you like to know?" -> "Solve for"
        if (preg_match('~^what .*(like to know|do you want to (find|calculate|know|solve))~i', $label) === 1) {
            return 'Solve for';
        }
        // trailing question mark on an otherwise normal label
        $label = rtrim($label, '?');
        if ($label !== '') {
            $label = mb_strtoupper(mb_substr($label, 0, 1)) . mb_substr($label, 1);
        }
        // A label that stops on a preposition or article was a prompt in the source —
        // "I want to...", "Calculate using...", "Sort by..." — where the dots were an
        // affordance meaning "choose from the list". The dots are trimmed above, so the
        // marker has to come back, or the reader is left with half a sentence.
        if (preg_match('~\b(to|by|using|the|of|in|from|with|for|on|at|is|that|this|your|my|and|or|include|per|between)$~iu', $label) === 1
            && str_contains($label, ' ')) {
            $label .= ':';
        }
        return $label;
    }

    /**
     * Clean a heading or description that came straight from the reference.
     *
     * Group titles carry their own markup: a hard "&amp;nbsp;" at the end of a
     * question, superscript carets ("b^^x^^") and bold markers. None of it
     * belongs in a heading, so it is decoded and stripped here.
     */
    public static function cleanText(string $text): string
    {
        // the reference double-escapes hard spaces ("&amp;nbsp;"), so decode twice
        $text = html_entity_decode(html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8'), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = (string) preg_replace('~\{\{[^{}]{0,60}\}\}~u', '', $text);
        $text = str_replace(["\u{00a0}", '&nbsp;'], ' ', $text);
        $text = (string) preg_replace('~\^\^(.+?)\^\^~u', '^$1', $text);
        $text = (string) preg_replace('~==(.+?)==~u', '$1', $text);
        $text = (string) preg_replace('~\*\*(.+?)\*\*~us', '$1', $text);
        $text = str_replace(['**', '^^'], '', $text);
        $text = (string) preg_replace('~\s+~', ' ', $text);
        return trim($text);
    }

    /** Does this line end mid-thought (open bracket, dangling operator, connector)? */
    public static function looksCutOff(string $text): bool
    {
        $t = rtrim($text);
        if ($t === '') {
            return false;
        }
        if (preg_match('~(?:\b(?:of|and|the|a|an|to|in|into|between|than|is|are|or|with|from|as|at|by|for|that|per|about|over|under|equal))$~iu', $t) === 1) {
            return true;
        }
        if (preg_match('~[(\[=+\-*/×·,:;]$~u', $t) === 1) {
            return true;
        }
        return substr_count($t, '(') !== substr_count($t, ')')
            || substr_count($t, '[') !== substr_count($t, ']');
    }

    /** Cut plain text back to its last complete sentence. */
    public static function cutToLastSentence(string $text): string
    {
        $text = rtrim($text);
        for ($i = mb_strlen($text); $i > 0; $i--) {
            $head = mb_substr($text, 0, $i);
            if (!self::looksCutOff($head)) {
                return rtrim($head, " ,;:—-·");
            }
        }
        return '';
    }

    /** A heading: cleaned of reference markup, with {{value}} slots filled in. */
    private function heading(string $text): string
    {
        $text = self::cleanText($text);
        $text = Conditions::interpolate($text, $this->pretty, $this->choiceLabels);
        // drop any slot this build cannot fill, braces and all
        $text = (string) preg_replace('~\{\{[^{}]{0,60}\}\}~u', '', $text);
        return trim((string) preg_replace('~\s{2,}~u', ' ', $text), " ,;:-—");
    }

    private function variableField(array $raw): ?array
    {
        $name = $raw['var'] ?? $raw['name'] ?? null;
        if ($name === null) {
            return null;
        }
        $def = $this->calc['variables'][$name] ?? [];
        $type = $def['type'] ?? ($raw['variableType'] ?? 'numerical');
        if ($type === 'presentation') {
            return null;
        }

        /*
         * A sequence box. The value is text, so it never goes through the solver:
         * the definition's default is the fallback and ?<field>= prefills it (a
         * shared link with a sequence in it, which is how somebody passes a
         * result to a colleague).
         */
        if ($type === 'text') {
            $default = '';
            foreach (($this->calc['variables'][$name]['defaults'] ?? []) as $d) {
                if (($d['value'] ?? '') !== '' && $d['value'] !== null) {
                    $default = (string) $d['value'];
                    break;
                }
            }
            /*
             * The sequence box starts empty. A prefilled sample is a value the
             * visitor did not enter, and every field on every page now opens
             * blank; the placeholder carries the hint instead. A shared link
             * still prefills, because then the visitor did ask for it.
             */
            $value = '';
            if (isset($_GET[$name]) && is_string($_GET[$name])) {
                $value = self::cleanSequence((string) $_GET[$name]);
            }
            return [
                'kind'      => 'textbox',
                'name'      => $name,
                'label'     => self::cleanLabel((string) ($raw['label'] ?? ($def['name'] ?? $name))),
                'help'      => self::cleanText((string) ($raw['help'] ?? '')),
                'value'     => $value,
                'known'     => $value !== '',
                'computed'  => false,
                'unitKey'   => null,
                'units'     => [],
                'unit'      => null,
                'unitLabel' => '',
            ];
        }

        $unitKey = !empty($raw['unitSwitcher']) ? $raw['unitSwitcher'] : null;
        $unitOptions = [];
        $selectedUnit = null;
        $compoundLabel = null;
        if ($unitKey !== null && $this->units->supported($unitKey)) {
            $wanted = $this->calc['variables'][$name]['defaultUnit'] ?? null;
            if ($wanted !== null && !$this->units->offers($unitKey, $wanted)) {
                // a compound unit ("weeks / days") holds two numbers; there is no
                // single-value conversion for it, so the box stays plain
                $compoundLabel = $this->units->name($unitKey, $wanted);
                $unitKey = null;
            }
        }
        if ($unitKey !== null && $this->units->supported($unitKey)) {
            $selectedUnit = $this->unitChoice[$name]
                ?? ($this->calc['variables'][$name]['defaultUnit'] ?? null)
                ?? $this->units->defaultUnit($unitKey);
            if (!$this->units->offers($unitKey, $selectedUnit)) {
                $selectedUnit = $this->units->defaultUnit($unitKey);
            }
            foreach ($this->units->options($unitKey) as $slug => $u) {
                $unitOptions[] = [
                    'slug' => $slug,
                    'label' => $u['name'],
                    'title' => $u['full'],
                ];
            }
        }

        // valueSelect -> rendered as a radio group / select
        if (!empty($raw['options'])) {
            /*
             * Which option is "current" decides what the page opens on. The
             * solver stores a harvested calculator's choice as the option's
             * *number*, but a calculator built in the panel stores the option's
             * uid as a string ("sali"). Matching only numerically meant every
             * panel select fell through to the first option — a page whose
             * second enzyme should open on SalI opened on BamHI, and the script
             * then computed with the wrong enzyme while showing the right
             * default two lines below.
             */
            $stateValue = $this->solver->values[$name] ?? null;
            if ($stateValue === null) {
                $stateValue = $this->calc['variables'][$name]['defaults'][0]['value'] ?? null;
            }
            $current = null;
            if (is_string($stateValue) && $stateValue !== '') {
                foreach ($raw['options'] as $o) {
                    if ((string) $o['uid'] === $stateValue || (string) $o['value'] === $stateValue) {
                        $current = $o['uid'];
                        break;
                    }
                }
            }
            if ($current === null) {
                foreach ($raw['options'] as $o) {
                    $num = Format::parse($o['value']);
                    if ($num !== null && $stateValue !== null
                        && abs($num - (float) $stateValue) < 1e-12) {
                        $current = $o['uid'];
                        break;
                    }
                }
            }
            /*
             * No fallback to the first option. The brief is that nothing is
             * pre-filled: a harvest with no stored default opened on whichever
             * option happened to be listed first, which both put a value in a
             * field the visitor had not touched and made "required" impossible
             * to trigger. A default the author actually set still applies — the
             * lookup above has already found it.
             */
            foreach ($raw['options'] as $o) {
                if ($o['uid'] === $current) {
                    $this->choiceLabels[$name] = self::cleanLabel((string) $o['label']);
                    break;
                }
            }

            // A CHECKBOX dataset in the reference is one real option plus a
            // blank "off" entry. Rendering both as radios puts an unlabelled
            // bullet on the page (388 calculators did exactly that), so the
            // pair becomes a single, properly labelled checkbox.
            $dsUid = $this->calc['variables'][$name]['datasetUid'] ?? null;
            $uiType = $dsUid !== null ? ($this->calc['datasets'][$dsUid]['uiType'] ?? '') : '';
            if ($uiType === 'CHECKBOX') {
                $labelled = [];
                $blank    = [];
                foreach ($raw['options'] as $o) {
                    if (trim((string) $o['label']) === '') {
                        $blank[] = $o;
                    } else {
                        $labelled[] = $o;
                    }
                }
                if (count($labelled) === 1 && count($blank) === 1) {
                    $on  = $labelled[0];
                    $off = $blank[0];
                    /*
                     * The tick starts empty, for the same reason every other
                     * control does. A two-state choice whose definition opens on
                     * the "on" option put a value in a form nobody had touched:
                     * /ecology/wind-turbine-profit answered "Results updated."
                     * with a daily-hours figure pressed out of the default and a
                     * hidden constant. A shared link that carries the field
                     * still restores it, because then the visitor did choose.
                     */
                    $linked = (isset($_GET[$name]) && is_string($_GET[$name]))
                        || !empty($this->calc['cmsId']) || !empty($this->calc['authored']);
                    return [
                        'kind'        => 'checkbox',
                        'name'        => $name,
                        'label'       => self::cleanLabel((string) ($raw['label'] ?? '')),
                        'optionLabel' => self::cleanLabel((string) $on['label']),
                        'onUid'       => (string) $on['uid'],
                        'offUid'      => (string) $off['uid'],
                        'checked'     => $linked && $current === $on['uid'],
                        'help'        => self::cleanText((string) ($raw['help'] ?? '')),
                    ];
                }
            }

            // Blank-labelled options that are not the CHECKBOX pair are
            // leftovers from the reference's payload (a single hidden constant,
            // for instance). Rendering them gives a bullet with no text; drop
            // them, and drop the whole control when nothing labelable is left.
            $options = [];
            foreach ($raw['options'] as $o) {
                if (self::cleanLabel((string) $o['label']) !== '') {
                    $options[] = $o;
                }
            }
            if ($options === []) {
                return null;
            }

            /*
             * Nothing is ticked until the visitor ticks it — the same rule the
             * number boxes and the two-state checkbox already follow. The
             * definition's stored default used to arrive pre-selected, which is
             * a value nobody entered (/finance/prorated-rent opened on "Moving
             * in"). A shared link that carries the field still restores it.
             */
            /*
             * A custom calculator is authored here, and a default the author
             * typed in the admin form is a decision, not a harvest artefact —
             * those keep it. A harvested page's stored default is the reference
             * site's prefill, which the brief rules out: /finance/prorated-rent
             * opened with "Moving in" already ticked and answered nothing when
             * Calculate was pressed, because a value nobody chose is not a
             * value the solver can use.
             */
            $authored = !empty($this->calc['cmsId']) || !empty($this->calc['authored']);
            $linked = isset($_GET[$name]) && is_string($_GET[$name]);
            return [
                'kind' => 'select',
                'name' => $name,
                'label' => self::cleanLabel((string) ($raw['label'] ?? '')),
                'options' => $options,
                'value' => ($linked || $authored) ? $current : null,
                'help' => self::cleanText((string) ($raw['help'] ?? '')),
            ];
        }

        $known = isset($this->solver->known[$name]) && empty($this->solver->placeholder[$name]);
        $computed = isset($this->solver->computed[$name]) && !$this->isUserInput($name);
        /* an answer by default: it belongs in the results panel from the first
           paint, whether or not a number has been solved for it yet */
        $declaredOutput = (isset($this->declaredOutputs[$name]) || !empty($raw['outputOnly']))
            && !$this->isUserInput($name);
        /*
         * A `dependent` row the page gives no label to is not a box to fill in:
         * it is a value the page works out (a chemical name built from a symbol,
         * a probability the script composes). Left in the form it is an
         * unlabelled blank box above the Calculate button — exactly the
         * meaningless row the brief calls out. It goes in the results panel,
         * where it belongs.
         */
        if (trim((string) ($raw['label'] ?? '')) === ''
            && (($def['type'] ?? '') === 'dependent')) {
            $declaredOutput = $declaredOutput || !$this->isUserInput($name);
        }

        // date / time variables hold epoch milliseconds; they are edited with a
        // native picker instead of a number box (a raw 1737656580000 is not a
        // date anybody can read or correct)
        if (in_array($type, ['date', 'datetime', 'time'], true)) {
            $value = '';
            if ($this->isUserInput($name) && $known && isset($this->solver->values[$name])) {
                $value = self::dateInputValue((float) $this->solver->values[$name], $type);
            }
            return [
                'kind'      => $type,
                'name'      => $name,
                'label'     => self::fieldLabel($raw, $def, $name),
                'help'      => self::cleanText((string) ($raw['help'] ?? '')),
                'value'     => $value,
                'known'     => $known,
                'computed'  => $computed,
                'declaredOutput' => $declaredOutput,
                'unitKey'   => null,
                'units'     => [],
                'unit'      => null,
                'unitLabel' => '',
            ];
        }

        return [
            'kind' => 'number',
            'name' => $name,
            'label' => self::fieldLabel($raw, $def, $name),
            'prefix' => self::cleanText((string) ($raw['prefix'] ?? '')),
            'suffix' => ($raw['suffix'] ?? '') !== ''
                ? self::cleanText((string) $raw['suffix'])
                : ($compoundLabel !== null ? ' ' . $compoundLabel : ''),
            'help' => self::cleanText((string) ($raw['help'] ?? '')),
            // no default value: a box the visitor has not filled in is empty
            'value' => $this->isUserInput($name) && $known ? ($this->plain[$name] ?? '') : '',
            'known' => $known,
            /*
             * A count is a whole number. The harvested rounding says so: a step
             * of 1 (omni) or zero decimals (standard) means the reference only
             * ever prints integers there, so the box takes integers only.
             */
            'integer' => self::isCount($def),
            'computed' => $computed,
            'declaredOutput' => $declaredOutput,
            'outputOnly' => (bool) ($raw['outputOnly'] ?? false),
            'unitKey' => $unitKey,
            'units' => $unitOptions,
            'unit' => $selectedUnit,
            'unitLabel' => $selectedUnit ? $this->units->label($unitKey, $selectedUnit) : '',
        ];
    }

    /**
     * Sequence text is user input that goes into a textarea and into a page
     * script, so it is kept to letters, digits, whitespace and the handful of
     * symbols a pasted FASTA or alignment really contains.
     */
    public static function cleanSequence(string $text): string
    {
        $text = str_replace(["\r\n", "\r"], "\n", $text);
        $text = (string) preg_replace('~[^A-Za-z0-9\s\-.*_>|:]~u', '', $text);
        return trim($text);
    }

    /** Format an epoch-ms value for an <input type="date|time"> control. */
    public static function dateInputValue(float $ms, string $type): string
    {
        $t = (int) round($ms / 1000);
        return match ($type) {
            'time' => gmdate('H:i', $t),
            'datetime' => gmdate('Y-m-d\TH:i', $t),
            default => gmdate('Y-m-d', $t),
        };
    }

    /**
     * The variables named on the left of each equation's headline form.
     *
     * @param  array<int,array{formula?:string}> $equations
     * @return array<string,bool>
     */
    private static function declaredOutputs(array $equations): array
    {
        $out = [];
        foreach ($equations as $eq) {
            $formula = trim((string) ($eq['formula'] ?? ''));
            if (preg_match('/^([A-Za-z_][A-Za-z0-9_]*)\s*=/', $formula, $m) === 1) {
                $out[$m[1]] = true;
                continue;
            }
            /*
             * Half the harvested equations are written with the subject on the
             * right ("(chocolateType * amount)/weight = methyl"). Reading only
             * the left-hand side left those answers in the form as blank boxes
             * the visitor was invited to fill in.
             */
            if (preg_match('/=\s*([A-Za-z_][A-Za-z0-9_]*)\s*$/', $formula, $m) === 1) {
                $out[$m[1]] = true;
            }
        }
        return $out;
    }

    /**
     * Does this variable hold a whole number?
     *
     * The definition's rounding is the evidence: precision `1` with the omni
     * algorithm is a step of one, and standard precision `0` is no decimals at
     * all. Both mean the reference prints integers in that box.
     */
    private static function isCount(array $def): bool
    {
        $algo = (string) ($def['rounding']['algorithm'] ?? '');
        $prec = $def['rounding']['precision'] ?? '';
        if ($prec === '' || $prec === null) {
            return false;
        }
        $num = (float) $prec;
        if ($algo === 'standard') {
            return $num <= 0.0001;
        }
        return $num >= 0.999 && $num <= 1.0001;
    }

    private function isUserInput(string $name): bool
    {
        return isset($_GET[$name]) && $_GET[$name] !== '';
    }
}
