<?php

/**
 * Hardy-Weinberg equilibrium
 * /biology/hardy-weinberg-equilibrium
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy-Weinberg equilibrium',
    'meta' => ['title' => 'Hardy-Weinberg equilibrium — Formula & Results', 'description' => 'The Hardy-Weinberg equilibrium calculator turns the heterozygous AB — 2pq, the heterozygous AC — 2pr and more into <strong>homozygous AA — p^2</strong>.', 'h1' => 'Hardy-Weinberg equilibrium Calculator', 'updated' => '2026-07-17'],
    'raw' => [
        'vars' => [
            'carrier_1_in' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'carrier_perc' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'genotypes' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'model' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'utrZMwzy0-vfQWUoZwxE3', 'c' => null],
                ],
                'ds' => 'SMSPuEkBbZ9Ay_ZSmDLT9',
            ],
            'number' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'nTCK7Ah9dOyRLTHRkzbmm', 'c' => null],
                ],
                'ds' => '972',
            ],
            'p' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'p_risk' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'p_risk2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pp' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'pq' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'pq_risk' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pr' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'ps' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'pt' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'q' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'q_risk' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'qq' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'qr' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'qs' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'qt' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'r' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rr' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'rs' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'rt' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            's' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ss' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'st' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            't' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'tt' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Z15VgId2-NgsvVTDfWYEj',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'model',
                                    'vt' => 'valueSelect',
                                    'l' => 'What do you want to calculate?',
                                    'ds' => 'SMSPuEkBbZ9Ay_ZSmDLT9',
                                    'opts' => [
                                        ['utrZMwzy0-vfQWUoZwxE3', 'Genotype frequencies', '1'],
                                        ['VWX-bMabSmE4szPIJDsXy', 'Carrier frequency and disease risk', '2'],
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
                                    'n' => 'number',
                                    'vt' => 'valueSelect',
                                    'l' => 'Number of alleles',
                                    'ds' => '972',
                                    'opts' => [
                                        ['nTCK7Ah9dOyRLTHRkzbmm', '2 alleles (p, q)', '2'],
                                        ['n6MTrzVY5CkEKD2i6TlUS', '3 alleles (p, q, r)', '3'],
                                        ['eYK3MC2czftLaY_WDuG3N', '4 alleles (p, q, r, s)', '4'],
                                        ['jHg-4vp4eIjzANiSdKooK', '5 alleles (p, q, r, s, t)', '5'],
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
                                    'n' => 'q_risk',
                                    'vt' => 'numerical',
                                    'l' => 'Enter how many people in the population are affected, expressed as “1 in N”',
                                    'pre' => '1 in',
                                    'suf' => 'people',
                                    'h' => 'Enter how common is the recessive trait.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ZOv_CSbnIZr3QeQU2JdjL',
                'title' => 'Allele frequencies',
                'desc' => 'The allele frequencies need to add up to 1 for the calculation to be correct!',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'p', 'vt' => 'numerical', 'l' => 'p'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'q', 'vt' => 'numerical', 'l' => 'q'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'r', 'vt' => 'numerical', 'l' => 'r'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 's', 'vt' => 'numerical', 'l' => 's'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 't', 'vt' => 'numerical', 'l' => 't'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'The above frequencies don\'t add up to 1. Try reloading the calculator and trying again.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'QohhRK8g1ke_P_C-Ub9iq',
                'title' => 'Genotype frequencies',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'genotypes',
                                    'vt' => 'numerical',
                                    'l' => 'Genotypes',
                                    'h' => 'Number of genotypes for a given number of alleles.',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pp', 'vt' => 'numerical', 'l' => 'Homozygous AA — p^^2^^'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pq', 'vt' => 'numerical', 'l' => 'Heterozygous AB — 2pq'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'qq', 'vt' => 'numerical', 'l' => 'Homozygous BB — q^^2^^'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pr', 'vt' => 'numerical', 'l' => 'Heterozygous AC — 2pr'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'qr', 'vt' => 'numerical', 'l' => 'Heterozygous BC — 2qr'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rr', 'vt' => 'numerical', 'l' => 'Homozygous CC — r^^2^^'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'ps', 'vt' => 'numerical', 'l' => 'Heterozygous AD — 2ps'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'qs', 'vt' => 'numerical', 'l' => 'Heterozygous BD — 2qs'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rs', 'vt' => 'numerical', 'l' => 'Heterozygous CD — 2rs'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'ss', 'vt' => 'numerical', 'l' => 'Homozygous DD — s^^2^^'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pt', 'vt' => 'numerical', 'l' => 'Heterozygous AE — 2pt'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'qt', 'vt' => 'numerical', 'l' => 'Heterozygous BE — 2qt'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rt', 'vt' => 'numerical', 'l' => 'Heterozygous CE — 2rt'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'st', 'vt' => 'numerical', 'l' => 'Heterozygous DE — 2st'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'tt', 'vt' => 'numerical', 'l' => 'Homozygous EE — t^^2^^'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ErkU8pnxnvJv4g9Ji0wrD',
                'title' => 'Carrier frequency',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pq_risk', 'vt' => 'numerical', 'l' => 'Carrier (Aa)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'p_risk2', 'vt' => 'numerical', 'l' => 'Unaffected, non-carrier (AA)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Carrier frequency in population: {{carrier_perc.value}}% This means that approximately 1 in {{carrier_1_in.value}} people carry this trait without knowing it.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'oE6ldGeYiShpHA6U1Gf5P',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'p_risk', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'carrier_perc', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'carrier_1_in', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'pp= p*p',
                'var' => [
                    [
                        'l' => 'pp',
                        'f' => 'pow(p, 2)',
                        'r' => ['p'],
                    ],
                    [
                        'l' => 'p',
                        'f' => 'sqrt(pp)',
                        'r' => ['pp'],
                    ],
                ],
            ],
            [
                'formula' => 'pq= 2*p*q',
                'var' => [
                    [
                        'l' => 'q',
                        'f' => '(1/2)*pq/p',
                        'r' => ['pq', 'p'],
                    ],
                    [
                        'l' => 'pq',
                        'f' => '2*p*q',
                        'r' => ['q', 'p'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '(1/2)*pq/q',
                        'r' => ['q', 'pq'],
                    ],
                ],
            ],
            [
                'formula' => 'qq=q*q',
                'var' => [
                    [
                        'l' => 'q',
                        'f' => 'sqrt(qq)',
                        'r' => ['qq'],
                    ],
                    [
                        'l' => 'qq',
                        'f' => 'pow(q, 2)',
                        'r' => ['q'],
                    ],
                ],
            ],
            [
                'formula' => 'genotypes=(number*(number+1))/2',
                'var' => [
                    [
                        'l' => 'genotypes',
                        'f' => '(1/2)*number*(number + 1)',
                        'r' => ['number'],
                    ],
                    [
                        'l' => 'number',
                        'f' => '(1/2)*sqrt(8*genotypes + 1) - 1/2',
                        'r' => ['genotypes'],
                    ],
                ],
            ],
            [
                'formula' => 'pr = 2*p*r',
                'var' => [
                    [
                        'l' => 'r',
                        'f' => '(1/2)*pr/p',
                        'r' => ['p', 'pr'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '(1/2)*pr/r',
                        'r' => ['r', 'pr'],
                    ],
                    [
                        'l' => 'pr',
                        'f' => '2*p*r',
                        'r' => ['r', 'p'],
                    ],
                ],
            ],
            [
                'formula' => 'qr = 2*q*r',
                'var' => [
                    [
                        'l' => 'q',
                        'f' => '(1/2)*qr/r',
                        'r' => ['r', 'qr'],
                    ],
                    [
                        'l' => 'r',
                        'f' => '(1/2)*qr/q',
                        'r' => ['q', 'qr'],
                    ],
                    [
                        'l' => 'qr',
                        'f' => '2*q*r',
                        'r' => ['q', 'r'],
                    ],
                ],
            ],
            [
                'formula' => 'rr= r*r',
                'var' => [
                    [
                        'l' => 'r',
                        'f' => 'sqrt(rr)',
                        'r' => ['rr'],
                    ],
                    [
                        'l' => 'rr',
                        'f' => 'pow(r, 2)',
                        'r' => ['r'],
                    ],
                ],
            ],
            [
                'formula' => 'ps=2*p*s',
                'var' => [
                    [
                        'l' => 'ps',
                        'f' => '2*p*s',
                        'r' => ['s', 'p'],
                    ],
                    [
                        'l' => 's',
                        'f' => '(1/2)*ps/p',
                        'r' => ['ps', 'p'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '(1/2)*ps/s',
                        'r' => ['ps', 's'],
                    ],
                ],
            ],
            [
                'formula' => 'qs=2*q*s',
                'var' => [
                    [
                        'l' => 'q',
                        'f' => '(1/2)*qs/s',
                        'r' => ['s', 'qs'],
                    ],
                    [
                        'l' => 's',
                        'f' => '(1/2)*qs/q',
                        'r' => ['q', 'qs'],
                    ],
                    [
                        'l' => 'qs',
                        'f' => '2*q*s',
                        'r' => ['q', 's'],
                    ],
                ],
            ],
            [
                'formula' => 'rs=2*r*s',
                'var' => [
                    [
                        'l' => 's',
                        'f' => '(1/2)*rs/r',
                        'r' => ['rs', 'r'],
                    ],
                    [
                        'l' => 'rs',
                        'f' => '2*r*s',
                        'r' => ['s', 'r'],
                    ],
                    [
                        'l' => 'r',
                        'f' => '(1/2)*rs/s',
                        'r' => ['s', 'rs'],
                    ],
                ],
            ],
            [
                'formula' => 'ss=s*s',
                'var' => [
                    [
                        'l' => 'ss',
                        'f' => 'pow(s, 2)',
                        'r' => ['s'],
                    ],
                    [
                        'l' => 's',
                        'f' => 'sqrt(ss)',
                        'r' => ['ss'],
                    ],
                ],
            ],
            [
                'formula' => 'pt=2*p*t',
                'var' => [
                    [
                        'l' => 't',
                        'f' => '(1/2)*pt/p',
                        'r' => ['p', 'pt'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '(1/2)*pt/t',
                        'r' => ['t', 'pt'],
                    ],
                    [
                        'l' => 'pt',
                        'f' => '2*p*t',
                        'r' => ['t', 'p'],
                    ],
                ],
            ],
            [
                'formula' => 'qt=2*q*t',
                'var' => [
                    [
                        'l' => 'q',
                        'f' => '(1/2)*qt/t',
                        'r' => ['t', 'qt'],
                    ],
                    [
                        'l' => 't',
                        'f' => '(1/2)*qt/q',
                        'r' => ['q', 'qt'],
                    ],
                    [
                        'l' => 'qt',
                        'f' => '2*q*t',
                        'r' => ['q', 't'],
                    ],
                ],
            ],
            [
                'formula' => 'rt=2*r*t',
                'var' => [
                    [
                        'l' => 't',
                        'f' => '(1/2)*rt/r',
                        'r' => ['rt', 'r'],
                    ],
                    [
                        'l' => 'rt',
                        'f' => '2*r*t',
                        'r' => ['t', 'r'],
                    ],
                    [
                        'l' => 'r',
                        'f' => '(1/2)*rt/t',
                        'r' => ['t', 'rt'],
                    ],
                ],
            ],
            [
                'formula' => 'st=2*s*t',
                'var' => [
                    [
                        'l' => 's',
                        'f' => '(1/2)*st/t',
                        'r' => ['t', 'st'],
                    ],
                    [
                        'l' => 't',
                        'f' => '(1/2)*st/s',
                        'r' => ['s', 'st'],
                    ],
                    [
                        'l' => 'st',
                        'f' => '2*s*t',
                        'r' => ['s', 't'],
                    ],
                ],
            ],
            [
                'formula' => 'tt=t*t',
                'var' => [
                    [
                        'l' => 't',
                        'f' => 'sqrt(tt)',
                        'r' => ['tt'],
                    ],
                    [
                        'l' => 'tt',
                        'f' => 'pow(t, 2)',
                        'r' => ['t'],
                    ],
                ],
            ],
            [
                'formula' => 'p + q = 1',
                'var' => [
                    [
                        'l' => 'q',
                        'f' => '1 - p',
                        'r' => ['p'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '1 - q',
                        'r' => ['q'],
                    ],
                ],
            ],
            [
                'formula' => 'p + q + r = 1',
                'var' => [
                    [
                        'l' => 'q',
                        'f' => '-p - r + 1',
                        'r' => ['r', 'p'],
                    ],
                    [
                        'l' => 'r',
                        'f' => '-p - q + 1',
                        'r' => ['q', 'p'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '-q - r + 1',
                        'r' => ['q', 'r'],
                    ],
                ],
            ],
            [
                'formula' => 'p + q + r + s = 1',
                'var' => [
                    [
                        'l' => 's',
                        'f' => '-p - q - r + 1',
                        'r' => ['r', 'p', 'q'],
                    ],
                    [
                        'l' => 'r',
                        'f' => '-p - q - s + 1',
                        'r' => ['s', 'p', 'q'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '-q - r - s + 1',
                        'r' => ['s', 'r', 'q'],
                    ],
                    [
                        'l' => 'q',
                        'f' => '-p - r - s + 1',
                        'r' => ['s', 'r', 'p'],
                    ],
                ],
            ],
            [
                'formula' => 'p + q + r + s + t = 1',
                'var' => [
                    [
                        'l' => 's',
                        'f' => '-p - q - r - t + 1',
                        'r' => ['p', 'q', 't', 'r'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '-q - r - s - t + 1',
                        'r' => ['s', 'q', 't', 'r'],
                    ],
                    [
                        'l' => 'q',
                        'f' => '-p - r - s - t + 1',
                        'r' => ['s', 'p', 't', 'r'],
                    ],
                    [
                        'l' => 't',
                        'f' => '-p - q - r - s + 1',
                        'r' => ['s', 'p', 'q', 'r'],
                    ],
                    [
                        'l' => 'r',
                        'f' => '-p - q - s - t + 1',
                        'r' => ['s', 'p', 'q', 't'],
                    ],
                ],
            ],
            [
                'formula' => 'p_risk2 = p_risk *p_risk',
                'var' => [
                    [
                        'l' => 'p_risk2',
                        'f' => 'pow(((1 - sqrt(1/q_risk))), 2)',
                        'r' => ['q_risk'],
                    ],
                ],
            ],
            [
                'formula' => 'pq_risk = 2 * p_risk * sqrt(1/q_risk)',
                'var' => [
                    [
                        'l' => 'pq_risk',
                        'f' => '2*sqrt(1/q_risk)*((1 - sqrt(1/q_risk)))',
                        'r' => ['q_risk', 'q_risk'],
                    ],
                    [
                        'l' => 'q_risk',
                        'f' => '4*pow(((1 - sqrt(1/q_risk))), 2)/pow(pq_risk, 2)',
                        'r' => ['pq_risk', 'q_risk'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '972' => [
                'name' => 'Number of alleles',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'nTCK7Ah9dOyRLTHRkzbmm', 'label' => '2 alleles (p, q)', 'value' => '2'],
                    ['uid' => 'n6MTrzVY5CkEKD2i6TlUS', 'label' => '3 alleles (p, q, r)', 'value' => '3'],
                    ['uid' => 'eYK3MC2czftLaY_WDuG3N', 'label' => '4 alleles (p, q, r, s)', 'value' => '4'],
                    ['uid' => 'jHg-4vp4eIjzANiSdKooK', 'label' => '5 alleles (p, q, r, s, t)', 'value' => '5'],
                ],
            ],
            'SMSPuEkBbZ9Ay_ZSmDLT9' => [
                'name' => 'mode',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'utrZMwzy0-vfQWUoZwxE3', 'label' => 'Genotype frequencies', 'value' => '1'],
                    ['uid' => 'VWX-bMabSmE4szPIJDsXy', 'label' => 'Carrier frequency and disease risk', 'value' => '2'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => 'The Hardy-Weinberg equilibrium calculator turns the heterozygous AB — 2pq, the heterozygous AC — 2pr and more into <strong>homozygous AA — p^2</strong>.',
        'sections' => [
            ['title' => 'How does the Hardy-Weinberg equilibrium calculator work?', 'html' => <<<'TXT'
            <p>The Hardy-Weinberg equilibrium calculator takes the values in the form, applies the relationship described below and reports <strong>homozygous AA — p^2</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (number of alleles); then you type in the heterozygous AB — 2pq, the heterozygous AC — 2pr, the heterozygous BD — 2qs and the heterozygous AE — 2pt.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as genotype frequencies and carrier frequency and disease risk. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 4 options, such as 2 alleles (p, q), 3 alleles (p, q, r) and 4 alleles (p, q, r, s). The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A number, expressed in people.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Number of alleles</strong></td><td>One of 4 options, such as 2 alleles (p, q), 3 alleles (p, q, r) and 4 alleles (p, q, r, s).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Genotypes</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Homozygous AA — p^2</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Heterozygous AB — 2pq</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Homozygous BB — q^2</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Heterozygous AC — 2pr</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Heterozygous BC — 2qr</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Homozygous CC — r^2</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Heterozygous AD — 2ps</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Heterozygous BD — 2qs</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Heterozygous CD — 2rs</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Homozygous DD — s^2</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Heterozygous AE — 2pt</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Heterozygous BE — 2qt</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Heterozygous CE — 2rt</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Heterozygous DE — 2st</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Homozygous EE — t^2</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Carrier (Aa)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Unaffected, non-carrier (AA)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Hardy-Weinberg equilibrium calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Homozygous AA — p^2</span><span class="formula-eq">=</span><span class="formula-rhs">(P ^ 2)</span></div><div class="formula-row"><span class="formula-lhs">Q</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 2) × heterozygous AB — 2pq ÷ P</span></div><div class="formula-row"><span class="formula-lhs">Q</span><span class="formula-eq">=</span><span class="formula-rhs">the square root of (homozygous BB — q^2)</span></div><div class="formula-row"><span class="formula-lhs">Genotypes</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 2) × number of alleles × (number of alleles + 1)</span></div><div class="formula-row"><span class="formula-lhs">R</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 2) × heterozygous AC — 2pr ÷ P</span></div><div class="formula-row"><span class="formula-lhs">Q</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 2) × heterozygous BC — 2qr ÷ R</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Open the page and it is already filled in. With the values it starts from — <strong>What do you want to calculate?</strong> set to Genotype frequencies and <strong>Number of alleles</strong> set to 2 alleles (p, q) — it reports <strong>Genotypes</strong> = 3.</p><p>Those are real numbers produced by the same engine that runs when you press Calculate, so you can change any single box afterwards and watch the answer move from this starting point.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Genotypes</strong> = 3 should be roughly the size you expected from <strong>What do you want to calculate?</strong> set to Genotype frequencies and <strong>Number of alleles</strong> set to 2 alleles (p, q).</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Hardy-Weinberg equilibrium calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the heterozygous AB — 2pq, the heterozygous AC — 2pr and the heterozygous BD — 2qs — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>Write the answer down with its unit. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/horse-gestation">Horse gestation</a>, <a href="/biology/horse-weight">Horse weight</a> and <a href="/biology/how-big-will-my-cat-get">How big will my cat get</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy-Weinberg equilibrium calculator work out?', 'a' => <<<'TXT'
            It returns homozygous AA — p^2, derived from the heterozygous AB — 2pq, the heterozygous AC — 2pr and the heterozygous BD — 2qs. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Hardy-Weinberg equilibrium calculator?', 'a' => <<<'TXT'
            The form asks for the heterozygous AB — 2pq, the heterozygous AC — 2pr, the heterozygous BD — 2qs and the heterozygous AE — 2pt, which is 7 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Genotypes = 3. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Hardy-Weinberg equilibrium calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/horse-gestation', 'name' => 'Horse gestation'],
            ['path' => '/biology/horse-weight', 'name' => 'Horse weight'],
            ['path' => '/biology/how-big-will-my-cat-get', 'name' => 'How big will my cat get'],
        ],
    ],
];
