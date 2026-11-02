<?php
/**
 * German labels for the tool widgets.
 *
 * A tool never holds its own translations: it prints every visitor-visible
 * string through Toolkit::t('Key', 'Default'), and this map — the one for the
 * site's current locale — supplies the wording. Delete this file and the tools
 * go back to English without a single line of tool code changing.
 *
 * Keys are the English defaults, so a missing row falls back to that default
 * rather than printing an empty box. Add a row per string; there is no order
 * to keep and no need to translate a string twice.
 */

declare(strict_types=1);

return [
    /* Shared */
    'Calculate'     => 'Berechnen',

    /* Percentage of a number */
    'Percentage'    => 'Prozent',
    'Number'        => 'Zahl',
    'of'            => 'von',
    'of it'         => 'davon',
    'Answer'        => 'Ergebnis',
    'Tip: the answer updates as you type.' => 'Tipp: Das Ergebnis aktualisiert sich beim Tippen.',

    /* Tip and bill splitter */
    'Bill'            => 'Rechnung',
    'Tip'             => 'Trinkgeld',
    'Common tip rates' => 'Übliche Trinkgeld-Sätze',
    'Split between'   => 'Aufteilen auf',
    'Total'           => 'Gesamt',
    'Each person pays' => 'Jede Person zahlt',
    'Of which tip, per person' => 'Davon Trinkgeld pro Person',
    'Amounts are rounded to the nearest cent; the total is not re-split to hide the remainder.'
        => 'Beträge sind auf den Cent gerundet; die Summe wird nicht neu aufgeteilt, um den Rest zu verstecken.',

    /* Word and character counter */
    'Your text'      => 'Ihr Text',
    'Paste or type here…' => 'Hier einfügen oder tippen…',
    'Count'          => 'Zählen',
    'Words'          => 'Wörter',
    'Characters'     => 'Zeichen',
    'Without spaces' => 'Ohne Leerzeichen',
    'Sentences'      => 'Sätze',
    'Paragraphs'     => 'Absätze',
    'Minute read'    => 'Min. Lesezeit',
    'Words you lean on' => 'Häufige Wörter',
    'No word is repeated yet.' => 'Noch kein Wort wiederholt.',
];
