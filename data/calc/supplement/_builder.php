<?php
/**
 * Shared helpers for the repairs.
 *
 * Several of these pages arrived with no form at all: the harvest kept a list of
 * variables and not one group to place them in, so the page rendered "nothing to
 * calculate here". A supplement can add both, but the raw record shape is terse
 * (`['t' => 'v', 'n' => 'x', 'vt' => 'numerical', 'l' => 'Label']`) and writing it
 * out by hand for every page is where typos come from. These helpers produce the
 * same arrays with readable arguments.
 *
 * A choice field needs three things to work, and all three are easy to leave out:
 *
 *   'opts'    the [uid, label, value] triples the server renders as the control
 *   'ds'      the dataset uid the *client* uses to turn the chosen option back
 *             into the number the page script expects
 *   datasets  the same list again, in the record's own dataset shape
 *
 * `sel()` writes all three, so a repaired page behaves the same whether the
 * option list is short (radio buttons) or long (a drop-down).
 */

/** A numeric input box. */
function sup_num(string $name, string $label, array $extra = []): array
{
    return array_merge(['t' => 'v', 'n' => $name, 'vt' => 'numerical', 'l' => $label], $extra);
}

/** A result box. */
function sup_out(string $name, string $label, array $extra = []): array
{
    return array_merge(['t' => 'v', 'n' => $name, 'vt' => 'dependent', 'l' => $label], $extra);
}

/** A date box (the value travels as epoch milliseconds). */
function sup_date(string $name, string $label): array
{
    return ['t' => 'v', 'n' => $name, 'vt' => 'date', 'l' => $label];
}

/**
 * A choice field.
 *
 * @param array<int,array{0:string,1:string,2:string}> $opts [uid, label, value]
 */
function sup_sel(string $name, string $label, array $opts, string $dsName = '', string $uiType = 'DROPDOWN'): array
{
    $ds = 'supp-ds-' . preg_replace('~[^a-z0-9]+~', '-', strtolower($name));
    $options = [];
    foreach ($opts as $o) {
        $options[] = ['uid' => (string) $o[0], 'label' => (string) $o[1], 'value' => (string) $o[2]];
    }
    sup_register_dataset($ds, $dsName !== '' ? $dsName : $label, $uiType, $options);
    return [
        't' => 'v', 'n' => $name, 'vt' => 'valueSelect', 'ds' => $ds, 'l' => $label,
        'opts' => array_map(static fn (array $o): array => [$o['uid'], $o['label'], $o['value']], $options),
    ];
}

/** Datasets built by sup_sel(), collected for the record merge. */
function sup_datasets(?array $set = null): array
{
    static $store = [];
    if ($set !== null) {
        foreach ($set as $uid => $ds) {
            $store[$uid] = $ds;
        }
    }
    return $store;
}

/** @param array<int,array{uid:string,label:string,value:string}> $options */
function sup_register_dataset(string $uid, string $name, string $uiType, array $options): void
{
    sup_datasets([$uid => ['name' => $name, 'uiType' => $uiType, 'options' => $options]]);
}

/** A one-row matrix holding one field. */
function sup_field(array $field): array
{
    return ['FR1', [[$field]]];
}

/** A one-row matrix holding several fields side by side. */
function sup_row(array ...$fields): array
{
    return ['FR1', [$fields]];
}

/** A group of rows. */
function sup_group(string $uid, string $title, array $rows, string $desc = ''): array
{
    return ['uid' => $uid, 'title' => $title, 'desc' => $desc, 'm' => $rows];
}

/** A result var definition. */
function sup_dep(string $precision = '1'): array
{
    return ['type' => 'dependent', 'rnd' => ['standard', $precision]];
}
