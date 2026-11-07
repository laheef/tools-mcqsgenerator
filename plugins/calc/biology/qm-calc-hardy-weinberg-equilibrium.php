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
    'meta' => ['title' => 'Hardy-Weinberg equilibrium — Formula & Results', 'description' => <<<'TXT'
    Hardy-Weinberg equilibrium takes What do you want to calculate?, Number of alleles and Enter how many people in the population are affected, expressed as “1…
    TXT, 'h1' => 'Hardy-Weinberg equilibrium Calculator', 'updated' => '2026-07-17'],
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
        'intro' => <<<'TXT'
        Hardy-Weinberg equilibrium takes What do you want to calculate?, Number of alleles and Enter how many people in the population are affected, expressed as “1 in N” and returns Genotypes. Nothing is looked up on this page: Genotypes is computed from What do you want to calculate? and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy-Weinberg equilibrium calculator works', 'html' => <<<'TXT'
            <p>The Hardy-Weinberg equilibrium calculator applies one relationship to 28 numbers and reports Genotypes.</p><p>In the form&#039;s own words, Homozygous AA — p^^2^^ = (p)^(2).</p><p>The result panel carries Genotypes, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 28 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>What do you want to calculate?</strong> — a plain number, no unit</li><li><strong>Number of alleles</strong> — a plain number, no unit</li><li><strong>Enter how many people in the population are affected, expressed as “1 in N”</strong> — in people. Enter how common is the recessive trait.</li><li><strong>p</strong> — a plain number, no unit</li><li><strong>q</strong> — a plain number, no unit</li><li><strong>r</strong> — a plain number, no unit</li><li><strong>s</strong> — a plain number, no unit</li><li><strong>t</strong> — a plain number, no unit</li><li><strong>Homozygous AA — p^^2^^</strong> — a plain number, no unit</li><li><strong>Heterozygous AB — 2pq</strong> — a plain number, no unit</li><li><strong>Homozygous BB — q^^2^^</strong> — a plain number, no unit</li><li><strong>Heterozygous AC — 2pr</strong> — a plain number, no unit</li><li><strong>Heterozygous BC — 2qr</strong> — a plain number, no unit</li><li><strong>Homozygous CC — r^^2^^</strong> — a plain number, no unit</li><li><strong>Heterozygous AD — 2ps</strong> — a plain number, no unit</li><li><strong>Heterozygous BD — 2qs</strong> — a plain number, no unit</li><li><strong>Heterozygous CD — 2rs</strong> — a plain number, no unit</li><li><strong>Homozygous DD — s^^2^^</strong> — a plain number, no unit</li><li><strong>Heterozygous AE — 2pt</strong> — a plain number, no unit</li><li><strong>Heterozygous BE — 2qt</strong> — a plain number, no unit</li><li><strong>Heterozygous CE — 2rt</strong> — a plain number, no unit</li><li><strong>Heterozygous DE — 2st</strong> — a plain number, no unit</li><li><strong>Homozygous EE — t^^2^^</strong> — a plain number, no unit</li><li><strong>Carrier (Aa)</strong> — a plain number, no unit</li><li><strong>Unaffected, non-carrier (AA)</strong> — a plain number, no unit</li><li><strong>p_risk</strong> — a plain number, no unit</li><li><strong>carrier_perc</strong> — a plain number, no unit</li><li><strong>carrier_1_in</strong> — a plain number, no unit</li></ul><p>The answer comes back as Genotypes. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — What do you want to calculate? = 1 — through the same formula and the panel reports &lt;strong&gt;Number of alleles&lt;/strong&gt; = 2 and &lt;strong&gt;Genotypes&lt;/strong&gt; = 3.</p><ul><li><strong>Number of alleles</strong> = 2</li><li><strong>Genotypes</strong> = 3</li></ul><p>That is <strong>Homozygous AA — p^^2^^</strong> = <code>(p)^(2)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Number of alleles&lt;/strong&gt; = 2 and &lt;strong&gt;Genotypes&lt;/strong&gt; = 3 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Genotypes takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Homozygous AA — p^^2^^</strong> = <code>(p)^(2)</code></li><li><strong>p</strong> = <code>√(Homozygous AA — p^^2^^)</code></li><li><strong>q</strong> = <code>(1 ÷ 2) × Heterozygous AB — 2pq ÷ p</code></li><li><strong>Heterozygous AB — 2pq</strong> = <code>2 × p × q</code></li><li><strong>Homozygous BB — q^^2^^</strong> = <code>(q)^(2)</code></li><li><strong>Genotypes</strong> = <code>(1 ÷ 2) × Number of alleles × (Number of alleles + 1)</code></li></ul><p>Any one of Homozygous AA — p^^2^^, p and q can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — What do you want to calculate?, from 1 to 2 — and the answers go from &lt;strong&gt;Number of alleles&lt;/strong&gt; 2 and &lt;strong&gt;Genotypes&lt;/strong&gt; 3 to &lt;strong&gt;Number of alleles&lt;/strong&gt; 2 and &lt;strong&gt;Genotypes&lt;/strong&gt; 3.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Genotypes is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert What do you want to calculate? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: What do you want to calculate?, Number of alleles and Enter how many people in the population are affected, expressed as “1 in N” measured, Genotypes wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/goldfish-years-to-human-years">Goldfish Years to Human Years Calculator</a>, <a href="/biology/ghk-membrane-potential">Goldman–Hodgkin–Katz Membrane Potential Calculator</a> and <a href="/biology/grain-bin">Grain bin Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            What do you want to calculate?, Number of alleles, Enter how many people in the population are affected, expressed as “1 in N” (people), p, q. Enter model, number and q_risk; Genotypes is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Homozygous AA — p^^2^^, p, q and Heterozygous AB — 2pq blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Number of alleles = 2 and Genotypes = 3. That comes from the page's own defaults, entered in What do you want to calculate?; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Genotypes is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With What do you want to calculate? left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Genotypes keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/goldfish-years-to-human-years', 'name' => 'Goldfish Years to Human Years Calculator'],
            ['path' => '/biology/ghk-membrane-potential', 'name' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator'],
            ['path' => '/biology/grain-bin', 'name' => 'Grain bin Calculator'],
        ],
        'authors' => [],
    ],
];
