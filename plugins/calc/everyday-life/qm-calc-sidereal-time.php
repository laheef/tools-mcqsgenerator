<?php

/**
 * Sidereal time
 * /everyday-life/sidereal-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sidereal time',
    'meta' => ['title' => 'Sidereal time Calculator — Formula & Results', 'description' => 'Sidereal time takes time, hemisphere and longitude and returns GMST and GAST. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Sidereal time Calculator', 'updated' => '2026-08-26'],
    'raw' => [
        'vars' => [
            'GAST' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'GMST' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'LAST' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'LMST' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'deltaepsi' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'deltapsi' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'eoe' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'epsi' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hemisphere' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'g11xnz1ADgPqk78R_wm5W', 'c' => null],
                ],
                'ds' => 'VpIKxXFRwMOmOjrWHjc7s',
            ],
            'juliantime_user' => [
                'type' => 'numerical',
                'rnd' => ['standard', '6'],
            ],
            'latitude' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time' => ['type' => 'datetime', 'rnd' => null],
        ],
        'groups' => [
            [
                'uid' => 'DnWXUr1-piO4oPsXjNx2g',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'time', 'vt' => 'datetime', 'l' => 'Time'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hemisphere',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hemisphere',
                                    'ds' => 'VpIKxXFRwMOmOjrWHjc7s',
                                    'opts' => [
                                        ['kCWviaCPZt8qBJjE7rTz2', 'East', '1'],
                                        ['g11xnz1ADgPqk78R_wm5W', 'West', '-1'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'latitude',
                                    'vt' => 'numerical',
                                    'l' => 'Longitude',
                                    'us' => '268',
                                    'du' => 'degminsec',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'GMST',
                                    'vt' => 'numerical',
                                    'l' => 'GMST',
                                    'h' => 'Greenwich Mean Sidereal Time',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'GAST',
                                    'vt' => 'numerical',
                                    'l' => 'GAST',
                                    'h' => 'Greenwich Apparent Sidereal Time',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'LMST',
                                    'vt' => 'numerical',
                                    'l' => 'LMST',
                                    'h' => 'Local Mean Sidereal Time',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'LAST',
                                    'vt' => 'numerical',
                                    'l' => 'LAST',
                                    'h' => 'Local Apparent Sidereal Time',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'fzTINkrJZ_Uqkpb9ok13X',
                'title' => 'Additional parameters',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'juliantime_user', 'vt' => 'numerical', 'l' => 'Julian time'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'deltapsi',
                                    'vt' => 'numerical',
                                    'l' => 'ΔΨ',
                                    'us' => '43',
                                    'du' => 'second_of_arc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'epsi',
                                    'vt' => 'numerical',
                                    'l' => 'ε',
                                    'us' => '43',
                                    'du' => 'deg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'deltaepsi',
                                    'vt' => 'numerical',
                                    'l' => 'Δε',
                                    'us' => '43',
                                    'du' => 'second_of_arc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'eoe',
                                    'vt' => 'numerical',
                                    'l' => 'Equations of the equinoxes',
                                    'h' => 'Difference between GMST and GAST.',
                                    'us' => '19',
                                    'du' => 'sec',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'juliantime_user = jd_funkcja(time)',
                'var' => [
                    [
                        'l' => 'juliantime_user',
                        'f' => 'jd_funkcja(time)',
                        'r' => ['time'],
                    ],
                ],
            ],
            [
                'formula' => 'GMST = GMST_funkcja(juliantime_user)',
                'var' => [
                    [
                        'l' => 'GMST',
                        'f' => 'GMST_funkcja(jd_funkcja(time))',
                        'r' => ['time'],
                    ],
                ],
            ],
            [
                'formula' => 'deltapsi = deltapsi_funkcja(juliantime_user)',
                'var' => [
                    [
                        'l' => 'deltapsi',
                        'f' => 'deltapsi_funkcja(jd_funkcja(time))',
                        'r' => ['time'],
                    ],
                ],
            ],
            [
                'formula' => 'deltaepsi = deltaepsi_funkcja(juliantime_user)',
                'var' => [
                    [
                        'l' => 'deltaepsi',
                        'f' => 'deltaepsi_funkcja(jd_funkcja(time))',
                        'r' => ['time'],
                    ],
                ],
            ],
            [
                'formula' => 'epsi = epsi_funkcja(juliantime_user)',
                'var' => [
                    [
                        'l' => 'epsi',
                        'f' => 'epsi_funkcja(jd_funkcja(time))',
                        'r' => ['time'],
                    ],
                ],
            ],
            [
                'formula' => 'eoe = coso(epsi_funkcja(juliantime_user))*240*deltapsi_funkcja(juliantime_user)/3600',
                'var' => [
                    [
                        'l' => 'eoe',
                        'f' => '(1/15)*coso(epsi_funkcja(jd_funkcja(time)))*deltapsi_funkcja(jd_funkcja(time))',
                        'r' => ['time'],
                    ],
                ],
            ],
            [
                'formula' => 'GAST =GAST_funkcja(GMST,eoe)',
                'var' => [
                    [
                        'l' => 'GAST',
                        'f' => 'GAST_funkcja(GMST_funkcja(jd_funkcja(time)), (1/15)*coso(epsi_funkcja(jd_funkcja(time)))*deltapsi_funkcja(jd_funkcja(time)))',
                        'r' => ['time'],
                    ],
                ],
            ],
            [
                'formula' => 'LMST = LMST_funkcja(GMST_funkcja(juliantime_user),latitude,hemisphere)',
                'var' => [
                    [
                        'l' => 'LMST',
                        'f' => 'LMST_funkcja(GMST_funkcja(jd_funkcja(time)), latitude, hemisphere)',
                        'r' => ['hemisphere', 'latitude', 'time'],
                    ],
                ],
            ],
            [
                'formula' => 'LAST = LAST_funkcja(GAST_funkcja(GMST,eoe),latitude,hemisphere)',
                'var' => [
                    [
                        'l' => 'LAST',
                        'f' => 'LAST_funkcja(GAST_funkcja(GMST_funkcja(jd_funkcja(time)), (1/15)*coso(epsi_funkcja(jd_funkcja(time)))*deltapsi_funkcja(jd_funkcja(time))), latitude, hemisphere)',
                        'r' => ['hemisphere', 'latitude', 'time'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'VpIKxXFRwMOmOjrWHjc7s' => [
                'name' => 'VS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'kCWviaCPZt8qBJjE7rTz2', 'label' => 'East', 'value' => '1'],
                    ['uid' => 'g11xnz1ADgPqk78R_wm5W', 'label' => 'West', 'value' => '-1'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";var ai=[0,0,-2,2,-2,1,0,2,0,0,0,0,0,2,0,0,0,0,0,-2,0,2,0,1,2,0,0,0,-1,0,0,1,0,1,1,-1,0,1,-1,-1,1,0,2,1,2,0,-1,-1,1,-1,1,0,0,1,1,2,0,0,1,0,1,2,0,1,0,1,1,1,-1,-2,3,0,1,-1,2,1,3,0,-1,1,-2,-1,2,1,1,-2,-1,1,2,2,1,0,3,1,0,-1,0,0,0,1,0,1,1,2,0,0];var bi=[0,0,0,0,0,-1,-2,0,0,1,1,-1,0,0,0,2,1,2,-1,0,-1,0,1,0,1,0,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,-1,0,0,0,0,0,0,0,-1,0,1,0,0,1,0,-1,-1,0,0,-1,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,-1,0,0,0,0,0,0,1,-1,0,0,1,0,-1,1,0,0,0,1];var ci=[0,0,2,-2,2,0,2,-2,2,0,2,2,2,0,2,0,0,2,0,0,2,0,2,0,0,-2,-2,0,0,2,2,0,2,2,0,2,0,0,0,2,2,2,0,2,2,2,2,0,0,2,0,2,2,2,0,2,0,2,2,0,0,2,0,-2,0,0,2,2,2,0,2,2,2,2,0,0,0,2,0,0,2,2,0,2,2,2,4,0,2,2,0,4,2,2,2,0,-2,2,0,-2,2,0,-2,0,2,0];var di=[0,0,0,0,0,-1,-2,0,-2,0,-2,-2,-2,-2,-2,0,0,-2,0,2,-2,-2,-2,-1,-2,2,2,0,1,-2,2,2,0,1,-2,0,0,0,0,-2,0,2,0,-2,0,0,0,2,-2,2,-2,0,0,2,2,-2,2,2,-2,-2,0,0,-2,0,1,0,0,0,2,0,0,2,0,-2,0,0,0,1,0,-4,-2,4,-4,-2,2,4,0,-2,-2,2,2,-2,-2,-2,0,2,-0,-1,2,-2,0,-2,2,2,4,1];var ei=[1,2,1,0,2,0,1,1,2,0,2,2,1,0,0,0,1,2,1,1,1,1,1,0,0,1,0,2,1,0,2,0,1,2,0,2,0,1,1,2,1,2,0,2,2,0,1,1,1,1,0,2,2,2,0,2,1,1,1,1,0,1,0,0,0,0,0,2,2,1,2,2,2,1,1,2,0,2,2,0,2,2,0,2,1,2,2,0,1,2,1,2,2,0,1,1,1,2,0,0,1,1,0,0,2,0];var upsi=[-171996,2062,46,11,-3,-3,-2,1,-13187,1426,-517,217,129,48,-22,17,-15,-16,-12,-6,-5,4,4,-4,1,1,-1,1,1,-1,-2274,712,-386,-301,-158,123,63,63,-58,-59,-51,-38,29,29,-31,26,21,16,-13,10,-7,7,-7,-8,6,6,-6,-7,6,-5,5,-5,-4,4,-4,-3,3,-3,-3,-2,-3,-3,2,-2,2,-2,2,2,1,-1,1,-2,-1,1,-1,-1,1,1,1,-1,-1,1,1,-1,1,1,-1,-1,-1,-1,-1,-1,-1,1,-1,1];var multiupsi=[-174.2,0.2,0,0,0,0,0,0,-1.6,-3.4,1.2,-0.5,-0.1,0,0,-0.1,0,0.1,0,0,0,0,0,0,0,0,0,0,0,0,-0.2,0.1,-0.4,0,0,0,0,0.1,-0.1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];var upci=[92025,-895,-24,0,1,0,1,0,5736,54,224,-95,-70,1,0,0,9,7,6,3,3,-2,-2,0,0,0,0,0,0,0,977,-7,200,129,-1,-53,-2,-33,32,26,27,16,-1,-12,13,-1,-10,-8,7,5,0,-3,3,3,0,-3,3,3,-3,3,0,3,0,0,0,0,0,1,1,1,1,1,-1,1,-1,1,0,-1,-1,0,-1,1,0,-1,1,1,0,0,-1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];var multiupci=[8.9,0.5,0,0,0,0,0,0,-3.1,-0.1,-0.6,0.3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,-0.5,0,0,-0.1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];function toJT(d,m,y,h,min,s){var jt=Math.trunc(1461*(y+4800+Math.trunc((m-14)/12))/4)+Math.trunc(367*(m-2-12*Math.trunc((m-14)/12))/12)-Math.trunc(3*((y+4900+Math.trunc((m-14)/12))/100)/4)+d-32075;return jt+(h-12)/24+min/1440+s/86400}omni.define("epsi0_funkcja",function epsilon0(jde){var t=(jde-2451545)/36525;var reto=(84381.448+-46.815*t+-0.00059*t*t+0.001813*t*t*t)/3600;return reto});omni.define("deltapsi_funkcja",function(jde){var te=(jde-2451545)/36525;var l=134.962981389+198.867398056*te+477000*te%360+0.008697222222*te*te+te*te*te/56250;var lprime=357.527723333+359.05034*te+35640*te%360-0.0001602777778*te*te+te*te*te/300000;var effe=93.271910277+82.017538055*te+483120*te%360-0.0036825*te*te+te*te*te/327272.7273;var dic=297.850363055+307.11148*te+444960*te%360-0.001914166667*te*te+te*te*te/189473.6842;var omega=125.044522222-134.136260833*te-1800*te%360+0.002070833333*te*te+te*te*te/450000;var psi=0;for(var i=0;i<106;i++){psi=psi+(upsi[i]+te*multiupsi[i])*Math.sin((l*ai[i]+lprime*bi[i]+effe*ci[i]+dic*di[i]+omega*ei[i])*Math.PI/180)}psi=psi/36000000;psi=Math.round(3600000*psi)/1000;return psi});omni.define("deltaepsi_funkcja",function(jde){var te=(jde-2451545)/36525;var l=134.962981389+198.867398056*te+477000*te%360+0.008697222222*te*te+te*te*te/56250;var lprime=357.527723333+359.05034*te+35640*te%360-0.0001602777778*te*te+te*te*te/300000;var effe=93.271910277+82.017538055*te+483120*te%360-0.0036825*te*te+te*te*te/327272.7273;var dic=297.850363055+307.11148*te+444960*te%360-0.001914166667*te*te+te*te*te/189473.6842;var omega=125.044522222-134.136260833*te-1800*te%360+0.002070833333*te*te+te*te*te/450000;var deltaeps=0;for(var i=0;i<106;i++){deltaeps=deltaeps+(upci[i]+te*multiupci[i])*Math.cos((l*ai[i]+lprime*bi[i]+effe*ci[i]+dic*di[i]+omega*ei[i])*Math.PI/180)}deltaeps=deltaeps/36000000;return Math.round(3600000*deltaeps)/1000});omni.define("epsi_funkcja",function(jde){var te=(jde-2451545)/36525;var l=134.962981389+198.867398056*te+477000*te%360+0.008697222222*te*te+te*te*te/56250;var lprime=357.527723333+359.05034*te+35640*te%360-0.0001602777778*te*te+te*te*te/300000;var effe=93.271910277+82.017538055*te+483120*te%360-0.0036825*te*te+te*te*te/327272.7273;var dic=297.850363055+307.11148*te+444960*te%360-0.001914166667*te*te+te*te*te/189473.6842;var omega=125.044522222-134.136260833*te-1800*te%360+0.002070833333*te*te+te*te*te/450000;var deltaeps=0;for(var i=0;i<106;i++){deltaeps=deltaeps+(upci[i]+te*multiupci[i])*Math.cos((l*ai[i]+lprime*bi[i]+effe*ci[i]+dic*di[i]+omega*ei[i])*Math.PI/180)}deltaeps=deltaeps/36000000;var eps0=(84381.448+-46.815*te+-0.00059*te*te+0.001813*te*te*te)/3600;return eps0+deltaeps});omni.define("jd_funkcja",function(time){var date_off=new Date(time*1000);var offset=date_off.getTimezoneOffset();var date=new Date(time*1000+offset*60*1000);var h=date.getUTCHours();var min=date.getUTCMinutes();var sec=date.getUTCSeconds();var y=date.getUTCFullYear();var m=date.getUTCMonth()+1;var d=date.getUTCDate();var jd0=toJT(d,m,y,h,min,sec);return jd0.toFixed(6)});omni.define("GMST_funkcja",function(jdt){var dtt=jdt-2451545;var t=dtt/36525;var GMST2=(280.46061837+360.98564736629*dtt+0.000387933*t*t-t*t*t/38710000)%360/15;return GMST2});omni.define("GAST_funkcja",function(gmst,eoe){var GAST=(gmst+eoe/3600)*15%360/15;return GAST});omni.define("LMST_funkcja",function(gmst,lat,hemi){var lati=hemi===-1?180+(180-lat):lat;var LMST2=(gmst*15+lati)/15%24;return LMST2});omni.define("LAST_funkcja",function(gast,lat,hemi){var lati=hemi===-1?180+(180-lat):lat;var LAST2=(gast*15+lati)/15%24;return LAST2});omni.define("coso",function(argus){return Math.cos(argus*Math.PI/180)});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Sidereal time calculator turns the time and the longitude into <strong>julian time</strong>.

        Nothing repaints underneath you: edit a field, press Calculate, and the new answer appears. That is how you find out which input the result is sensitive to.
        TXT,
        'sections' => [
            ['title' => 'How does the Sidereal time calculator work?', 'html' => <<<'TXT'
            <p>The Sidereal time calculator takes the values in the form, applies the relationship described below and reports <strong>julian time</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the hemisphere); then you give the time; then you type in the longitude.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A date and a time of day. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>Pick the option that matches your case — 2 options, such as east and west. </li><li>A measured quantity, entered by default in degrees / minutes / seconds. The unit chip switches it to any of the 4 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Time</strong></td><td>A calendar date with a time of day.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Hemisphere</strong></td><td>One of 2 options, such as east and west.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Longitude</strong></td><td>A measured quantity, 4 units available.</td><td>degrees / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>GMST</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>Calculated</td></tr><tr><td><strong>GAST</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>Calculated</td></tr><tr><td><strong>LMST</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>Calculated</td></tr><tr><td><strong>LAST</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>Calculated</td></tr><tr><td><strong>Julian time</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Equations of the eeeeequinoxes</strong></td><td>A measured quantity, 27 units available.</td><td>seconds</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Sidereal time calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Julian time</span><span class="formula-eq">=</span><span class="formula-rhs">(time)</span></div><div class="formula-row"><span class="formula-lhs">GMST</span><span class="formula-eq">=</span><span class="formula-rhs">((time))</span></div><div class="formula-row"><span class="formula-lhs">ΔΨ</span><span class="formula-eq">=</span><span class="formula-rhs">((time))</span></div><div class="formula-row"><span class="formula-lhs">Δε</span><span class="formula-eq">=</span><span class="formula-rhs">((time))</span></div><div class="formula-row"><span class="formula-lhs">Ε</span><span class="formula-eq">=</span><span class="formula-rhs">((time))</span></div><div class="formula-row"><span class="formula-lhs">Equations of the eeeeequinoxes</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 15) × (((time))) × ((time))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in hours / minutes / seconds, and convertible to any of the 27 units on that chip.</li><li>Shown in seconds of arc, and convertible to any of the 12 units on that chip.</li><li>Shown in seconds of arc, and convertible to any of the 12 units on that chip.</li><li>Shown in degrees, and convertible to any of the 12 units on that chip.</li><li>Shown in seconds, and convertible to any of the 27 units on that chip.</li><li>Shown in hours / minutes / seconds, and convertible to any of the 27 units on that chip.</li><li>Shown in hours / minutes / seconds, and convertible to any of the 27 units on that chip.</li><li>Shown in hours / minutes / seconds, and convertible to any of the 27 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Coordinates, opening in degrees / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Angle, opening in seconds of arc</li><li>Angle, opening in degrees</li><li>Angle, opening in seconds of arc</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Sidereal time calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 2 figures keep coming back — the time and the longitude — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/elapsed-time">Elapsed time</a>, <a href="/everyday-life/electricity-cost">Electricity cost</a> and <a href="/everyday-life/electricity-cost-single-usage">Electricity cost - single usage</a>.</p>
            TXT],
            ['title' => 'Understanding mean and apparent sidereal time', 'html' => <<<'TXT'
            <p>Sidereal time is a way of describing Earth’s rotation relative to the distant stars, rather than relative to the Sun. Astronomers use it to relate a location on Earth to the part of the sky passing overhead. It is not the same as ordinary clock time, and it is not a time zone or a measure of daylight. This calculator derives several related values—such as Greenwich or local mean and apparent sidereal time—from a date and time, location and correction inputs. Read the label beside each result because the terms are related but not interchangeable.</p>
            <p>Enter the date and time in the basis the form expects. If you use local civil time, account for your time zone and daylight-saving offset before comparing the result with an astronomical reference that uses UTC. A time entered with the wrong offset can shift the sky coordinates substantially. Keep the original date, clock time, time zone and conversion steps in your notes so the calculation can be repeated.</p>
            <p>Longitude determines the difference between Greenwich sidereal time and local sidereal time. Confirm the east/west sign convention shown by the page and enter the longitude in the correct unit. Latitude and hemisphere may be used by additional outputs, but longitude is the key location coordinate for local sidereal time. If you are using a negative longitude for a western location, verify that the form follows that convention rather than assuming all maps label it the same way.</p>
            <p>Mean sidereal time uses a smoothed reference for Earth’s rotation, while apparent sidereal time includes a correction associated with the apparent position of the equinox. The exact corrections depend on the date and the astronomical model in the calculator. The page also exposes intermediate values such as Julian date and nutation-related terms; these are useful for checking the calculation but are not ordinary calendar dates or user-facing clock times.</p>
            <p>To sanity-check a result, compare two nearby clock times while holding the date and location fixed: sidereal time should advance as time passes. Change longitude alone and check that local sidereal time shifts relative to Greenwich time. Do not expect the displayed hours to match a wall clock; sidereal time runs on a different reference cycle. If the result is outside a familiar 0-to-24-hour display, check whether the page normalizes it modulo a full day.</p>
            <p>Use this tool for planning telescope pointing, understanding astronomy references or studying coordinate systems. It does not calculate an object’s altitude or azimuth by itself; those also require sky coordinates and an observing location. For precision observations, check the calculator’s model, time scale, location accuracy and correction conventions against the observatory software or ephemeris you use. The results are only as reliable as the time and coordinate inputs.</p>
            TXT],
            ['title' => 'Using the intermediate outputs as checks', 'html' => <<<'TXT'
            <p>Julian date is a continuous day count used in astronomy; it is not a date in the Gregorian calendar. The calculator may show it as an intermediate value so later relationships can use a consistent time coordinate. Do not copy a Julian date into a field expecting a year-month-day date. When comparing with another program, confirm whether that program uses Julian date, modified Julian date or a different time scale such as UTC, UT1 or TT. These distinctions matter more for precision work than for a general classroom example.</p><p>Local apparent sidereal time can be understood as the Greenwich apparent value adjusted for the observer’s longitude, wrapped to a 24-hour cycle. Local mean sidereal time uses the mean reference instead. A latitude value does not make a local sidereal time calculation interchangeable with a sky-position calculation; latitude is needed for horizon coordinates such as altitude and azimuth. If your goal is to point a telescope at an object, you will also need the object’s right ascension and declination and a coordinate transformation suitable for the date.</p><p>When checking the page, use a trusted astronomy reference with the same timestamp, time scale, longitude convention and epoch. Small differences can come from rounding, nutation corrections or the astronomical model. A discrepancy of many hours is more likely to indicate a time-zone, date or longitude-sign error than a subtle correction. Keep units and coordinate conventions visible in your notes.</p>
            TXT],
            ['title' => 'Time-zone and coordinate checklist', 'html' => <<<'TXT'
            <p>Before comparing output, write down whether the input time is local or UTC, the offset in effect on that date, and the longitude sign convention. Daylight-saving rules can change the local offset during the year. A calculator that receives only a clock reading cannot infer which zone you meant unless the form asks for it. Entering the same wall-clock time under a different offset represents a different instant and therefore a different sidereal time.</p><p>For an observing session, save the observing site’s coordinates and use the same longitude source each time. A rounded city-centre coordinate may be adequate for a broad example, but a precise telescope setup should use the actual observing location and the time scale required by its software.</p>
            TXT],
            ['title' => 'A repeatable observation log', 'html' => <<<'TXT'
            <p>For repeated sessions, keep a short log of the date, UTC conversion, site coordinates and calculated local sidereal time next to the object you observed. The log makes it easier to reproduce a setup and spot an offset error. If you change software or time sources, compare one known case before relying on the new outputs for a precision observation.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What inputs are needed for sidereal time?', 'a' => 'Provide the time value requested by the form, the longitude and the hemisphere or sign convention it offers. Use a consistent time reference and verify whether the input is Julian time or another displayed format.'],
            ['q' => 'What do GMST, GAST, LMST and LAST mean?', 'a' => 'They are Greenwich or local mean/apparent sidereal-time quantities. The local values account for longitude; apparent values also include the relevant equinox correction.'],
            ['q' => 'Why does longitude change local sidereal time?', 'a' => 'Local sidereal time is tied to the observer’s position on Earth. A different longitude shifts the local value relative to Greenwich, so check the longitude’s direction and units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/elapsed-time', 'name' => 'Elapsed time'],
            ['path' => '/everyday-life/electricity-cost', 'name' => 'Electricity cost'],
            ['path' => '/everyday-life/electricity-cost-single-usage', 'name' => 'Electricity cost - single usage'],
        ],
    ],
];
