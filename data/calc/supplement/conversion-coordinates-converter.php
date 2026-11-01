<?php
/**
 * Latitude and longitude between DD, DMS and DDM.
 *
 * All three are the same number written three ways: degrees, degrees plus
 * minutes (1/60), degrees plus minutes plus seconds (1/3600). The page asks for
 * one format and prints the other two, so the conversion is done once into
 * decimal degrees and formatted back out, sign carried by the cardinal letter.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'out_lat_dd' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'out_long_dd' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'out_lat_dms' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'out_long_dms' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'out_lat_dd', 'vt' => 'dependent', 'l' => 'Latitude in decimal degrees']]]],
            ['FR1', [[['t' => 'v', 'n' => 'out_long_dd', 'vt' => 'dependent', 'l' => 'Longitude in decimal degrees']]]],
        ],
    ]],
    'showIf' => [
        'lat_dd' => 'what_to_convert == 0', 'long_dd' => 'what_to_convert == 0',
        'latitude' => 'letters == 1', 'longitude' => 'letters == 1',
        'lat_d' => 'what_to_convert >= 1', 'lat_dm' => 'what_to_convert == 2',
        'lat_ds' => 'what_to_convert == 1', 'lat_m' => 'what_to_convert == 1',
        'long_d' => 'what_to_convert >= 1', 'long_dm' => 'what_to_convert == 2',
        'long_ds' => 'what_to_convert == 1', 'long_m' => 'what_to_convert == 1',
    ],
    'js' => <<<'JS'
function readCoord(mode, letters, deg, mins, secs, dir, limit, negName) {
  var d = Number(deg);
  if (deg === '' || deg === undefined || !isFinite(d)) return { error: 'Enter the degrees of the ' + negName + '.' };
  var m = (mins === '' || mins === undefined) ? 0 : Number(mins);
  var s = (secs === '' || secs === undefined) ? 0 : Number(secs);
  if (!isFinite(m) || !isFinite(s)) return { error: 'Minutes and seconds have to be numbers.' };
  if (mode === 0) {
    if (Math.abs(d) > limit) return { error: 'The ' + negName + ' has to be between −' + limit + '° and ' + limit + '°.' };
    return { value: d };
  }
  if (Math.abs(d) > limit || m >= 60 || s >= 60 || m < 0 || s < 0) {
    return { error: 'The ' + negName + ' needs degrees up to ' + limit + ', minutes and seconds below 60.' };
  }
  var magnitude = Math.abs(d) + m / 60 + s / 3600;
  var negative = d < 0;
  if (letters === 1) {
    var westOrSouth = String(dir) === '1';
    if (d < 0) return { error: 'Use either a minus sign or a letter, not both.' };
    negative = westOrSouth;
  }
  return { value: negative ? -magnitude : magnitude, letter: negative };
}

function toDms(value) {
  var sign = value < 0 ? '−' : '';
  var abs = Math.abs(value);
  var d = Math.floor(abs);
  var rest = (abs - d) * 60;
  var m = Math.floor(rest);
  var s = (rest - m) * 60;
  if (s > 59.9995) { s = 0; m += 1; }
  if (m > 59) { m = 0; d += 1; }
  return sign + d + '° ' + (m < 10 ? '0' : '') + m + "' " + snum(s, 2) + '"';
}

function toDdm(value) {
  var sign = value < 0 ? '−' : '';
  var abs = Math.abs(value);
  var d = Math.floor(abs);
  var m = (abs - d) * 60;
  if (m > 59.995) { m = 0; d += 1; }
  return sign + d + '° ' + snum(m, 4) + "'";
}

omni.onResult([], function (ctx, v) {
  var mode = Math.round(Number(v.what_to_convert));
  var letters = Math.round(Number(v.letters));
  if (v.what_to_convert === '' || v.what_to_convert === undefined) {
    ctx.addUnmetCondition('Choose which format your coordinates are in.');
    return;
  }
  var lat = readCoord(mode, letters,
    mode === 0 ? v.lat_dd : v.lat_d,
    mode === 2 ? v.lat_dm : (mode === 1 ? v.lat_m : ''),
    mode === 1 ? v.lat_ds : '', v.latitude, 90, 'latitude');
  if (lat.error) { ctx.addUnmetCondition(lat.error); return; }
  var lon = readCoord(mode, letters,
    mode === 0 ? v.long_dd : v.long_d,
    mode === 2 ? v.long_dm : (mode === 1 ? v.long_m : ''),
    mode === 1 ? v.long_ds : '', v.longitude, 180, 'longitude');
  if (lon.error) { ctx.addUnmetCondition(lon.error); return; }

  ctx.exportValue('out_lat_dd', sround(lat.value, 6));
  ctx.exportValue('out_long_dd', sround(lon.value, 6));

  var latHemi = lat.value < 0 ? 'S' : 'N';
  var lonHemi = lon.value < 0 ? 'E' : 'E';
  lonHemi = lon.value < 0 ? 'W' : 'E';

  var dd = Math.abs(lat.value).toFixed(6) + '° ' + latHemi + ', ' + Math.abs(lon.value).toFixed(6) + '° ' + lonHemi;
  var dms = toDms(Math.abs(lat.value)) + ' ' + latHemi + ', ' + toDms(Math.abs(lon.value)) + ' ' + lonHemi;
  var ddm = toDdm(Math.abs(lat.value)) + ' ' + latHemi + ', ' + toDdm(Math.abs(lon.value)) + ' ' + lonHemi;
  var signed = snum(lat.value, 6) + ', ' + snum(lon.value, 6);

  ctx.addHtml('<p><strong>' + dd + '</strong></p>');
  ctx.addHtml(stable(['Format', 'Latitude, longitude'], [
    ['DD — decimal degrees', dd],
    ['DMS — degrees, minutes, seconds', dms],
    ['DDM — degrees, decimal minutes', ddm],
    ['Signed (for APIs and maps)', signed],
  ]));
  ctx.addHtml('<p class="calc-unmet">Positive latitude is north and positive longitude is east, which is what a '
    + 'map service expects. The two are minutes of arc on the surface: one minute of latitude is about '
    + '1.85 km, and a minute of longitude shrinks with the cosine of the latitude — '
    + snum(1.852 * Math.cos(Math.abs(lat.value) * Math.PI / 180), 3) + ' km at ' + snum(Math.abs(lat.value), 4) + '°.</p>');
});
JS,
];
