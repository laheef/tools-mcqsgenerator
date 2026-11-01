<?php

declare(strict_types=1);

namespace Onim;

/**
 * Hand-written repairs for harvested calculators that came back without a
 * formula.
 *
 * The harvest lost the equation list on a couple of hundred pages, which left
 * forms that could be filled in but never answered: empty boxes above a
 * Calculate button that did nothing. A supplement is the missing half of such a
 * page, kept in its own file so the harvested NDJSON stays untouched and every
 * repair is reviewable on its own:
 *
 *   data/calc/supplement/<category>-<slug>.php
 *
 * returning
 *
 *   [
 *     'vars'   => ['total' => ['type' => 'dependent', 'rnd' => ['standard', '0']]],
 *     'groups' => [ ... extra group rows, usually the results panel ... ],
 *     'eq'     => [ ... equation entries, when an expression is enough ... ],
 *     'js'     => '...',   // appended to the page script (omni.define/onResult)
 *     'outputs' => ['total' => 'Total'],   // results with no box of their own
 *     'remove' => ['group_A', ...],  // variables to drop from the form
 *     'hideTexts' => true,           // drop the harvested step explanations
 *   ]
 *
 * Anything a supplement adds is merged before Widget builds the markup, so the
 * new outputs land in the results panel like any harvested one.
 */
final class Supplement
{
    /** @var array<string,array|null> */
    private static array $cache = [];

    public static function dir(): string
    {
        return __DIR__ . '/../data/calc/supplement';
    }

    public static function key(string $path): string
    {
        $path = '/' . trim($path, '/');
        $parts = explode('/', trim($path, '/'));
        $slug = array_pop($parts) ?? '';
        $cat = array_pop($parts) ?? '';
        return $cat === '' ? $slug : $cat . '-' . $slug;
    }

    public static function get(string $path): ?array
    {
        $key = self::key($path);
        if (array_key_exists($key, self::$cache)) {
            return self::$cache[$key];
        }
        $file = self::dir() . '/' . $key . '.php';
        if (!is_file($file)) {
            return self::$cache[$key] = null;
        }
        $data = include $file;
        return self::$cache[$key] = is_array($data) ? $data : null;
    }

    /**
     * Merge a supplement into a harvested record.
     *
     * @param  array<string,mixed> $record
     * @return array<string,mixed>
     */
    public static function apply(string $path, array $record): array
    {
        $sup = self::get($path);
        if ($sup === null) {
            return $record;
        }
        if (!empty($sup['remove']) && is_array($sup['remove'])) {
            $drop = array_flip($sup['remove']);
            foreach (['vars', 'datasets'] as $bucket) {
                if (!empty($record[$bucket]) && is_array($record[$bucket])) {
                    foreach (array_keys($record[$bucket]) as $name) {
                        if (isset($drop[$name])) {
                            unset($record[$bucket][$name]);
                        }
                    }
                }
            }
            if (!empty($record['groups']) && is_array($record['groups'])) {
                foreach ($record['groups'] as &$group) {
                    if (!isset($group['m']) || !is_array($group['m'])) {
                        continue;
                    }
                    $rows = [];
                    foreach ($group['m'] as $row) {
                        if (self::rowUsesAny($row, $drop)) {
                            continue;
                        }
                        $rows[] = $row;
                    }
                    $group['m'] = $rows;
                }
                unset($group);
            }
        }
        /*
         * A harvested step explanation is a list of [condition, fragment] pairs.
         * When the harvest also lost the values inside those fragments the line
         * renders as "we divide the equation by , so that …" — half a sentence
         * with a hole in it. A supplement that explains the working itself can
         * retire the broken text outright.
         */
        if (!empty($sup['hideTexts']) && !empty($record['groups']) && is_array($record['groups'])) {
            foreach ($record['groups'] as &$group) {
                if (!isset($group['m']) || !is_array($group['m'])) {
                    continue;
                }
                $rows = [];
                foreach ($group['m'] as $row) {
                    $keep = [];
                    foreach ($row[1] ?? [] as $col) {
                        $fields = [];
                        foreach ((array) $col as $field) {
                            if (($field['t'] ?? '') !== 'x') {
                                $fields[] = $field;
                            }
                        }
                        if ($fields !== []) {
                            $keep[] = $fields;
                        }
                    }
                    if ($keep !== []) {
                        $rows[] = [$row[0] ?? '', $keep];
                    }
                }
                $group['m'] = $rows;
            }
            unset($group);
        }
        if (!empty($sup['vars']) && is_array($sup['vars'])) {
            $record['vars'] = array_merge($record['vars'] ?? [], $sup['vars']);
        }
        if (!empty($sup['datasets']) && is_array($sup['datasets'])) {
            $record['datasets'] = array_merge($record['datasets'] ?? [], $sup['datasets']);
        }
        /*
         * `replaceGroups` retires the harvested form. Some statistics pages put
         * fifty numbered boxes on screen (course_1 … course_50) and compute the
         * answer from whichever ones are filled: a wall of empty inputs above a
         * Calculate button, which is exactly what the brief forbids. A
         * supplement that asks for one list box instead cannot be appended to
         * that form — it has to take it away.
         */
        /*
         * `hideVars` takes individual boxes off the form without touching the
         * rest of it. The density converters harvest a row of ingredient
         * drop-downs plus an integer index (`more`) that the reference site's
         * own UI fills in; here they render as controls that do nothing, and
         * the index decides which of five density boxes the formula reads — the
         * visitor sees "more: 30" and no answer. The formula still needs the
         * index, so it stays in the definition with a fixed value; only its
         * useless boxes go.
         */
        if (!empty($sup['hideVars']) && is_array($sup['hideVars'])) {
            $hide = array_flip(array_map('strval', $sup['hideVars']));
            foreach ($record['groups'] ?? [] as $gi => $group) {
                $rows = [];
                foreach ($group['m'] ?? [] as $row) {
                    $cols = [];
                    foreach ($row[1] ?? [] as $col) {
                        $fields = [];
                        foreach ((array) $col as $field) {
                            $name = is_array($field) ? (string) ($field['n'] ?? '') : '';
                            if (($field['t'] ?? '') === 'v' && isset($hide[$name])) {
                                continue;
                            }
                            $fields[] = $field;
                        }
                        if ($fields !== []) {
                            $cols[] = $fields;
                        }
                    }
                    if ($cols !== []) {
                        $rows[] = [$row[0] ?? 'FR1', $cols];
                    }
                }
                $record['groups'][$gi]['m'] = $rows;
            }
            unset($group, $row, $col, $field);
        }
        if (!empty($sup['replaceGroups'])) {
            $record['groups'] = [];
            if (!empty($record['fields']) && is_array($record['fields'])) {
                $record['fields'] = [];
            }
        }
        if (!empty($sup['outputs']) && is_array($sup['outputs'])) {
            $rows = [];
            foreach ($sup['outputs'] as $name => $spec) {
                $name  = (string) $name;
                $label = is_array($spec) ? (string) ($spec['label'] ?? $name) : (string) $spec;
                $prec  = is_array($spec) ? (string) ($spec['precision'] ?? '') : '';
                $def   = $record['vars'][$name] ?? null;
                /*
                 * A variable with a box but no place in the form is a value the
                 * page works out: it is printed in the results panel and never
                 * asked for. The definition keeps its own type (`numerical` for
                 * one an equation derives, `dependent` for one a page script
                 * publishes) — forcing `dependent` here would seed it with a
                 * zero and stop the equation from ever running.
                 */
                if ($def === null) {
                    $record['vars'][$name] = ['type' => 'numerical'];
                    $def = $record['vars'][$name];
                }
                if ($prec !== '') {
                    $record['vars'][$name]['rnd'] = ['standard', $prec];
                }
                $field = [
                    't' => 'v', 'n' => $name, 'vt' => (string) ($def['type'] ?? 'numerical'),
                    'l' => $label, 'oo' => 1,
                ];
                $rows[] = ['FR1', [[$field]]];
            }
            if ($rows !== []) {
                $record['groups'][] = [
                    'uid' => 'supp-outputs', 'title' => 'Results', 'desc' => '', 'm' => $rows,
                ];
            }
        }
        if (!empty($sup['groups']) && is_array($sup['groups'])) {
            $record['groups'] = array_merge($record['groups'] ?? [], $sup['groups']);
        }
        /*
         * `replaceEq` retires the harvested formulas outright.
         *
         * Several pages arrived with a chain of equations that cannot be run in
         * any order: every step needs the step before it, and the two values
         * that could start the chain are marked as equation subjects — so they
         * render in the results panel as empty boxes the visitor can never fill,
         * and Calculate can only say the numbers do not settle. A repair that
         * does the arithmetic in its own script does not want those formulas
         * back: they would keep claiming subjects in the results panel and keep
         * the visitor's own boxes out of the form.
         */
        if (!empty($sup['replaceEq'])) {
            $record['eq'] = [];
        }
        if (!empty($sup['eq']) && is_array($sup['eq'])) {
            $record['eq'] = array_merge($record['eq'] ?? [], $sup['eq']);
        }
        if (!empty($sup['showIf']) && is_array($sup['showIf'])) {
            $record['showIf'] = array_merge($record['showIf'] ?? [], $sup['showIf']);
        }
        if (!empty($sup['js'])) {
            /*
             * `replaceJs` retires the harvested script instead of appending to
             * it. It is for the pages whose own hook is worse than absent: the
             * business-days script walks a millisecond range one millisecond at
             * a time, so a visitor who fills both dates hangs the tab. A repair
             * that appends cannot stop the old hook from running — only taking
             * the script away can.
             */
            $base = !empty($sup['replaceJs']) ? '' : trim((string) ($record['js'] ?? ''));
            $record['js'] = trim(($base !== '' ? $base . "\n" : '')
                . self::prelude() . "\n" . (string) $sup['js']);
        }
        return $record;
    }

    /**
     * Helpers every repair script shares. They are copied into each page script
     * because each one is evaluated in its own closed scope.
     */
    private static function prelude(): string
    {
        static $js = null;
        if ($js === null) {
            $file = self::dir() . '/_prelude.js';
            $js = is_file($file) ? (string) file_get_contents($file) : '';
        }
        return $js;
    }

    /** @param array<int,string> $drop */
    private static function rowUsesAny(mixed $row, array $drop): bool
    {
        if (!is_array($row)) {
            return false;
        }
        if (isset($row['n']) && is_string($row['n']) && isset($drop[$row['n']])) {
            return true;
        }
        foreach ($row as $cell) {
            if (is_array($cell) && self::rowUsesAny($cell, $drop)) {
                return true;
            }
        }
        return false;
    }
}
