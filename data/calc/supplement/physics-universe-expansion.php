<?php
/**
 * Universe expansion — Hubble's law, the redshift and the age the expansion implies.
 *
 * The page arrived as an article with no form at all. The repair adds the two
 * numbers Hubble's law needs and the four it gives:
 *
 *   v = H₀ · d                 recession speed from the distance
 *   z ≈ v / c                  the redshift that speed produces (for small z)
 *   t = 1 / H₀                 the Hubble time, the age of a universe that
 *                              expanded at a constant rate
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'hubble_velocity' => sup_dep('0'),
        'hubble_z' => sup_dep('5'),
        'hubble_time' => sup_dep('2'),
        'hubble_ly' => sup_dep('0'),
        'hubble_distance_km' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-hubble-inputs', 'The expansion', [
            sup_field(sup_num('h0', 'Hubble constant (km/s per Mpc)')),
            sup_field(sup_num('distance_mpc', 'Distance to the galaxy (Mpc)')),
        ]),
        sup_group('supp-hubble-results', 'Results', [
            sup_field(sup_out('hubble_velocity', 'Recession speed (km/s)')),
            sup_field(sup_out('hubble_z', 'Redshift z')),
            sup_field(sup_out('hubble_time', 'Hubble time — the age it implies (billion years)')),
            sup_field(sup_out('hubble_ly', 'Distance in light years')),
            sup_field(sup_out('hubble_distance_km', 'Distance in kilometres')),
        ]),
    ],
    'js' => <<<'JS'
var C = 299792.458;                 /* km/s */
var MPC_KM = 3.0856775814913673e19; /* km in a megaparsec */
var LY_KM = 9.4607304725808e12;     /* km in a light year */
var SECONDS_PER_YEAR = 3.15576e7;

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['h0', 'distance_mpc'], function (ctx, v) {
  var h0 = num('h0');
  var d = num('distance_mpc');

  if (h0 === null || h0 <= 0) {
    ctx.addUnmetCondition('Enter the Hubble constant in km/s per megaparsec (about 67 to 73).');
    return;
  }
  if (d === null || d <= 0) {
    ctx.addUnmetCondition('Enter the distance to the galaxy in megaparsecs.');
    return;
  }

  var velocity = h0 * d;                       /* km/s */
  var z = velocity / C;
  /* H₀ in km/s/Mpc, turned into a rate per second: 1/H₀ is then the Hubble time */
  var hubbleTimeGyr = (MPC_KM / h0) / SECONDS_PER_YEAR / 1e9;
  var distanceKm = d * MPC_KM;
  var distanceLy = distanceKm / LY_KM;

  ctx.exportValue('hubble_velocity', sround(velocity, 0));
  ctx.exportValue('hubble_z', sround(z, 5));
  ctx.exportValue('hubble_time', sround(hubbleTimeGyr, 2));
  ctx.exportValue('hubble_ly', sround(distanceLy, 0));
  ctx.exportValue('hubble_distance_km', sround(distanceKm, 0));

  ctx.addHtml('<p><strong>A galaxy ' + snum(d, 2) + ' Mpc away is receding at ' + snum(velocity, 0)
    + ' km/s, which stretches its light by a factor of 1 + z = ' + snum(1 + z, 5)
    + '. At H₀ = ' + snum(h0, 2) + ' km/s/Mpc the expansion has a Hubble time of '
    + snum(hubbleTimeGyr, 2) + ' billion years.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Hubble constant', snum(h0, 3) + ' km/s/Mpc'],
    ['Distance', snum(d, 3) + ' Mpc'],
    ['Distance in light years', snum(distanceLy, 0)],
    ['Distance in kilometres', snum(distanceKm, 0)],
    ['Recession speed', snum(velocity, 1) + ' km/s'],
    ['As a fraction of the speed of light', snum(velocity / C, 5)],
    ['Redshift z', snum(z, 5)],
    ['Wavelength stretch', '×' + snum(1 + z, 5)],
    ['Hubble time', snum(hubbleTimeGyr, 2) + ' billion years'],
    ['A megaparsec in km/s per Mpc', 'H₀ as a rate: ' + snum(h0 / MPC_KM, 4) + ' per second']
  ]));

  /* the same law at a few distances, so the linearity is visible */
  var rows = [1, 10, 100, 1000, 5000].map(function (dd) {
    return [snum(dd, 0) + ' Mpc', snum(h0 * dd, 0) + ' km/s', snum(h0 * dd / C, 5)];
  });
  ctx.addHtml('<p>Hubble’s law at this constant, at other distances:</p>');
  ctx.addHtml(stable(['Distance', 'Recession speed', 'z'], rows));

  if (z > 0.1) {
    ctx.addHtml('<p><strong>Careful with this one: z = ' + snum(z, 3) + ' is large enough that the '
      + 'simple v = cz is no longer the right conversion.</strong> At that distance the expansion '
      + 'stretched the light on its way here, and the proper recession speed needs the cosmological '
      + 'model, not a multiplication.</p>');
  }

  ctx.addHtml('<p class="calc-unmet">Hubble’s law is a straight line only over small distances. At z above '
    + 'about 0.1 the relation bends, and beyond that the answer depends on what the universe is made of: the '
    + 'same H₀ with more dark energy gives different distances. The Hubble time is 1/H₀ — the age the '
    + 'universe would have if it had expanded at a constant rate since a single point. It expands faster '
    + 'now than it did, so the real age is a little less than this: about 13.8 billion years against a '
    + 'Hubble time of roughly 14.4 for H₀ = 67.4. The two big numbers for H₀ in use today, about 67 from '
    + 'the cosmic microwave background and about 73 from nearby stars, disagree by more than their error '
    + 'bars — the "Hubble tension" — so the value you enter decides the answer.</p>');
});
JS,
];
