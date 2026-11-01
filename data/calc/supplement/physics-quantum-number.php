<?php
/**
 * Quantum numbers.
 *
 * For a principal quantum number n the angular momentum number may be anything
 * from 0 to n − 1, a subshell with a given l holds 2l + 1 orbitals, and each
 * orbital holds two electrons. So a shell holds n² orbitals and 2n² electrons,
 * and a subshell holds 2(2l + 1) electrons.
 */
return [
    'vars' => [
        'orbital_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'electron_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'subshell_label' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'orbital_count', 'vt' => 'dependent',
                       'l' => 'Orbitals']]]],
            ['FR1', [[['t' => 'v', 'n' => 'electron_count', 'vt' => 'dependent',
                       'l' => 'Maximum electrons']]]],
            ['FR1', [[['t' => 'v', 'n' => 'subshell_label', 'vt' => 'dependent',
                       'l' => 'Subshell letters available here (count)']]]],
        ],
    ]],
    'js' => <<<'JS'
var SLETTERS = ['s', 'p', 'd', 'f', 'g', 'h', 'i', 'k'];

omni.onResult([], function (ctx, v) {
  var knownPrincipal = Number(v.type) !== 2;
  var n = Number(v.n), l = Number(v.l);

  if (knownPrincipal) {
    if (!isFinite(n) || n < 1) {
      ctx.addUnmetCondition('The principal quantum number n is 1 or more.');
      return;
    }
    n = Math.round(n);
    ctx.exportValue('orbital_count', n * n);
    ctx.exportValue('electron_count', 2 * n * n);
    ctx.exportValue('subshell_label', n);
    var rows = [];
    for (var i = 0; i < n && i < SLETTERS.length; i++) {
      rows.push([String(i), SLETTERS[i], String(2 * i + 1), String(2 * (2 * i + 1))]);
    }
    ctx.addHtml('<p><strong>The shell n = ' + n + ' holds ' + (n * n) + ' orbitals and up to '
      + (2 * n * n) + ' electrons.</strong></p>');
    ctx.addHtml(stable(['l', 'Subshell', 'Orbitals', 'Max electrons'], rows,
      ['Shell', '', String(n * n), String(2 * n * n)]));
    return;
  }

  if (!isFinite(l) || l < 0) {
    ctx.addUnmetCondition('The angular momentum quantum number l is zero or more.');
    return;
  }
  l = Math.round(l);
  var orbitals = 2 * l + 1;
  ctx.exportValue('orbital_count', orbitals);
  ctx.exportValue('electron_count', 2 * orbitals);
  ctx.exportValue('subshell_label', l);
  ctx.addHtml('<p><strong>l = ' + l + ' (the ' + (SLETTERS[l] || '?' + l) + ' subshell) has '
    + orbitals + ' orbitals and holds up to ' + (2 * orbitals) + ' electrons.</strong> '
    + 'The smallest shell it can appear in is n = ' + (l + 1) + ', and the magnetic quantum '
    + 'number m runs from −' + l + ' to +' + l + '.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Subshell', SLETTERS[l] || String(l)],
    ['Orbitals (2l + 1)', String(orbitals)],
    ['Max electrons (2(2l + 1))', String(2 * orbitals)],
    ['Smallest n', String(l + 1)],
  ]));
});
JS,
];
