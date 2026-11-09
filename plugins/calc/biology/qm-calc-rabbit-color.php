<?php

/**
 * Rabbit color
 * /biology/rabbit-color
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rabbit color',
    'meta' => ['title' => 'Rabbit color Calculator: Units and Formulas', 'description' => 'Rabbit color works out whichever of what you want to enter, color family and color is left blank. Every box can be solved for, not only the one in the title.', 'h1' => 'Rabbit color Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'Prepare the inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_or_genes',
                            'label' => 'What you want to enter',
                            'type' => 'select',
                            'options' => ['color' => '1', 'genes' => '0'],
                            'dataset' => 'mode',
                            'default' => 'color',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                    ],
                    'fields' => [
                        [
                            'name' => 'include_steel',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Steel and harlequin — E(s), e(j)' => '1', '' => '0'],
                            'dataset' => 'include steel',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'include_broken',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Broken — E(n), e(n)' => '1', '' => '0'],
                            'dataset' => 'include broken',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'include_vienna',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Vienna — V, v' => '1', '' => '0'],
                            'dataset' => 'include vienna',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'include_dutch',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Dutch — D(u), d(u)' => '1', '' => '0'],
                            'dataset' => 'include dutch',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'include_silvering',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Silvering — S(i), s(i)' => '1', '' => '0'],
                            'dataset' => 'include silvering',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'include_wideband',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Wideband — W, w' => '1', '' => '0'],
                            'dataset' => 'include wideband',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'include_lutino',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Lutino — P, p' => '1', '' => '0'],
                            'dataset' => 'include lutino',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sire',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_family_sire',
                            'label' => 'Color family',
                            'type' => 'select',
                            'options' => [
                                'Full color' => '0',
                                'Chinchilla' => '1',
                                'Seal' => '2',
                                'Sable' => '3',
                                'Himalayan' => '4',
                                'Ruby eyed white' => '5',
                            ],
                            'dataset' => 'color family',
                            'control' => 'DROPDOWN',
                            'default' => 'Full color',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_sire_full',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                'Black [Self]' => '1',
                                'Chocolate [Self]' => '2',
                                'Blue [Self]' => '3',
                                'Lilac [Self]' => '4',
                                'Black Tortoiseshell' => '5',
                                'Chocolate Tortoiseshell' => '6',
                                'Blue Tortoiseshell (Isabel)' => '7',
                                'Lilac Tortoiseshell' => '8',
                                'Black Otter' => '9',
                                'Chocolate Otter' => '10',
                                'Blue Otter' => '11',
                                'Lilac Otter' => '12',
                                'Tort Otter (Orange)' => '13',
                                'Chocolate Orange Otter' => '14',
                                'Fawn Otter' => '15',
                                'Lilac Fawn Otter' => '16',
                                'Chestnut [Agouti]' => '17',
                                'Cinnamon (Chocolate Agouti)' => '18',
                                'Opal (Blue Agouti)' => '19',
                                'Lynx (Lilac Agouti)' => '20',
                                'Orange [Agouti]' => '21',
                                'Chocolate Orange' => '22',
                                'Fawn (Cream)' => '23',
                                'Lilac Fawn' => '24',
                            ],
                            'dataset' => 'FULL COLOR',
                            'control' => 'DROPDOWN',
                            'default' => 'Black [Self]',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_sire_chinchilla',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                '[Black] Self Chinchilla' => '1',
                                'Chocolate Self Chinchilla' => '2',
                                'Blue Self Chinchilla' => '3',
                                'Lilac Self Chinchilla' => '4',
                                'Sallander (Iron Grey)' => '5',
                                'Chocolate Sallander' => '6',
                                'Blue Sallander' => '7',
                                'Lilac Sallander' => '8',
                                'Black Silver Marten' => '9',
                                'Chocolate Silver Marten' => '10',
                                'Blue Silver Marten' => '11',
                                'Lilac Silver Marten' => '12',
                                'Otter Ermine (Otter Frost Point)' => '13',
                                'Chocolate Otter Ermine' => '14',
                                'Blue Otter Ermine' => '15',
                                'Lilac Otter Ermine' => '16',
                                '[Agouti] Chinchilla' => '17',
                                'Chocolate Agouti Chinchilla' => '18',
                                'Squirrel (Blue Chinchilla)' => '19',
                                'Lilac Agouti Chinchilla' => '20',
                                'Ermine (Frost Point, Frosted Pearl or Frosty)' => '21',
                                'Chocolate Ermine (Chocolate Frost Point)' => '22',
                                'Blue Ermine' => '23',
                                'Lilac Ermine' => '24',
                            ],
                            'dataset' => 'CHINCHILLA',
                            'control' => 'DROPDOWN',
                            'default' => '[Black] Self Chinchilla',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_sire_seal',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                '[Black] Seal' => '1',
                                'Chocolate Seal' => '2',
                                'Blue Seal' => '3',
                                'Lilac Seal' => '4',
                                'Seal Point' => '5',
                                'Chocolate Point double c(chl)' => '6',
                                'Blue Point [Siamese] double c(chl)' => '7',
                                'Lilac Point' => '8',
                                '[Black] Seal Marten' => '9',
                                'Chocolate Seal Marten' => '10',
                                'Blue Seal Marten' => '11',
                                'Lilac Seal Marten' => '12',
                                'Otter Seal Point' => '13',
                                'Chocolate Otter Seal Point' => '14',
                                'Blue Otter Seal Point' => '15',
                                'Lilac Otter Seal Point' => '16',
                                'Seal Agouti Siamese' => '17',
                                'Chocolate Seal Agouti Siamese' => '18',
                                'Blue Seal Agouti Siamese' => '19',
                                'Lilac Seal Agouti Siamese' => '20',
                                'Seal Agouti Point' => '21',
                                'Chocolate Seal Agouti Point' => '22',
                                'Blue Seal Agouti Point' => '23',
                                'Lilac Seal Agouti Point' => '24',
                            ],
                            'dataset' => 'SEAL',
                            'control' => 'DROPDOWN',
                            'default' => '[Black] Seal',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_sire_sable',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                '[Black] Sable (Siamese Sable)' => '1',
                                'Chocolate Sable' => '2',
                                'Blue Sable (Smoke Pearl)' => '3',
                                'Lilac Sable' => '4',
                                'Sable Point' => '5',
                                'Chocolate Point single c(chl)' => '6',
                                'Blue Point [Siamese] single c(chl)' => '7',
                                'Lilac Point (Cream)' => '8',
                                '[Black] Sable Marten' => '9',
                                'Chocolate Sable Marten' => '10',
                                'Blue Seal Marten (Smoke Pearl Marten)' => '11',
                                'Lilac Sable Marten' => '12',
                                'Otter Sable Point (Sable Point Marten)' => '13',
                                'Chocolate Otter Sable Point' => '14',
                                'Blue Otter Sable Point' => '15',
                                'Lilac Otter Sable Point' => '16',
                                'Sable Agouti Siamese' => '17',
                                'Chocolate Sable Agouti Siamese' => '18',
                                'Blue Sable Agouti Siamese' => '19',
                                'Lilac Sable Agouti Siamese' => '20',
                                'Sable Agouti Point' => '21',
                                'Chocolate Sable Agouti Point' => '22',
                                'Blue Sable Agouti Point' => '23',
                                'Lilac Sable Agouti Point' => '24',
                            ],
                            'dataset' => 'SABLE',
                            'control' => 'DROPDOWN',
                            'default' => '[Black] Sable (Siamese Sable)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_sire_himalayan',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                '[Black] Himalayan' => '1',
                                'Chocolate Himalayan' => '2',
                                'Blue Himalayan' => '3',
                                'Lilac Himalayan' => '4',
                                '[Black] Himalayan Extended' => '5',
                                'Chocolate Himalayan Extended' => '6',
                                'Blue Himalayan Extended' => '7',
                                'Lilac Himalayan Extended' => '8',
                                'Black Otter Himalayan' => '9',
                                'Chocolate Otter Himalayan' => '10',
                                'Blue Otter Himalayan' => '11',
                                'Lilac Otter Himalayan' => '12',
                                'Black Otter Himalayan Extended' => '13',
                                'Chocolate Otter Himalayan Extended' => '14',
                                'Blue Otter Himalayan Extended' => '15',
                                'Lilac Otter Himalayan Extended' => '16',
                                'Agouti Himalayan' => '17',
                                'Chocolate Agouti Himalayan' => '18',
                                'Blue Agouti Himalayan' => '19',
                                'Lilac Agouti Himalayan' => '20',
                                'Agouti Himalayan Extended' => '21',
                                'Chocolate Agouti Himalayan Extended' => '22',
                                'Blue Agouti Himalayan Extended' => '23',
                                'Lilac Agouti Himalayan Extended' => '24',
                            ],
                            'dataset' => 'HIMALAYAN',
                            'control' => 'DROPDOWN',
                            'default' => '[Black] Himalayan',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'steel_genes_sire',
                            'label' => 'Steel and harlequin genes',
                            'type' => 'select',
                            'options' => ['Double-steel E(s)E(s)' => '1', 'Steel-tipped E(s)_' => '2', 'Harlequin e(j)_' => '3', 'Unknown __' => '4'],
                            'dataset' => 'Steel gene sire',
                            'control' => 'DROPDOWN',
                            'default' => 'Double-steel E(s)E(s)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'En_genes_sire',
                            'label' => 'Broken genes',
                            'type' => 'select',
                            'options' => ['Charlie E(n)E(n)' => '1', 'Broken E(n)e(n)' => '2', 'Solid e(n)e(n)' => '3', 'Unknown' => '4'],
                            'dataset' => 'BROKEN_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Broken E(n)e(n)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vienna_genes_sire',
                            'label' => 'Vienna genes ',
                            'type' => 'select',
                            'options' => ['No vienna V_' => '1', 'Vienna (Blue eyed white) vv' => '3', 'Unknown __' => '4'],
                            'dataset' => 'VIENNA_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Vienna (Blue eyed white) vv',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dutch_genes_sire',
                            'label' => 'Dutch genes',
                            'type' => 'select',
                            'options' => ['No dutch D(u)_' => '1', 'Dutch d(u)d(u)' => '3', 'Unknown __' => '4'],
                            'dataset' => 'DUTCH_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Dutch d(u)d(u)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'silvering_genes_sire',
                            'label' => 'Silvering genes',
                            'type' => 'select',
                            'options' => ['Silver S(i)S(i)' => '1', 'Partial silver S(i)s(i)' => '2', 'No silver s(i)s(i)' => '3', 'Unknown __' => '4'],
                            'dataset' => 'SILVER_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Silver S(i)S(i)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wideband_genes_sire',
                            'label' => 'Wideband genes',
                            'type' => 'select',
                            'options' => ['No wideband W_' => '1', 'Wideband ww' => '3', 'Unknown __' => '4'],
                            'dataset' => 'WIDEBAND_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Wideband ww',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lutino_genes_sire',
                            'label' => 'Lutino genes',
                            'type' => 'select',
                            'options' => ['No lutino P_' => '1', 'Lutino pp' => '3', 'Unknown __' => '4'],
                            'dataset' => 'LUTINO_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Lutino pp',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sire',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A_gene_sire',
                            'label' => 'Color pattern (A locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'A _' => '2',
                                'A A' => '3',
                                'A a(t)' => '4',
                                'A a' => '5',
                                'a(t) _' => '6',
                                'a(t) a(t)' => '7',
                                'a(t) a' => '8',
                                'a a' => '9',
                            ],
                            'dataset' => 'A_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'A a',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'B_gene_sire',
                            'label' => 'Black or brown (B locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'B _' => '2',
                                'B B' => '3',
                                'B b' => '4',
                                'b b' => '5',
                            ],
                            'dataset' => 'B_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'B b',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'C_gene_sire',
                            'label' => 'Color amount and placement (C locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'C _' => '2',
                                'C C' => '3',
                                'C c(chd)' => '4',
                                'C c(chl)' => '5',
                                'C c(h)' => '6',
                                'C c' => '7',
                                'c(chd) _' => '8',
                                'c(chd) c(chd)' => '9',
                                'c(chd) c(chl)' => '10',
                                'c(chd) c(h)' => '11',
                                'c(chd) c' => '12',
                                'c(chl) _' => '13',
                                'c(chl) c(chl)' => '14',
                                'c(chl) c(h)' => '15',
                                'c(chl) c' => '16',
                                'c(h) _' => '17',
                                'c(h) c(h)' => '18',
                                'c(h) c' => '19',
                                'c c' => '20',
                            ],
                            'dataset' => 'C_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'C c',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'D_gene_sire',
                            'label' => 'Dense or dilute (D locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'D _' => '2',
                                'D D' => '3',
                                'D d' => '4',
                                'd d' => '5',
                            ],
                            'dataset' => 'D_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'D d',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'E_gene_sire',
                            'label' => 'Extension (E locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'E _' => '2',
                                'E E' => '3',
                                'E e' => '4',
                                'e e' => '5',
                            ],
                            'dataset' => 'E_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'E e',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'steel_gene_sire',
                            'label' => 'Steel and harlequin genes (E(s), e(j))',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'E(s) _' => '2',
                                'E(s) E(s)' => '3',
                                'E(s) E' => '4',
                                'E(s) e(j)' => '5',
                                'E(s) e' => '6',
                                'E _' => '7',
                                'E E' => '8',
                                'E e(j)' => '9',
                                'E e' => '10',
                                'e(j) _' => '11',
                                'e(j) e(j)' => '12',
                                'e(j) e' => '13',
                                'e e' => '14',
                            ],
                            'dataset' => 'ES_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'E(s) _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'En_gene_sire',
                            'label' => 'Broken genes (En)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'E(n) _' => '2',
                                'E(n) E(n)' => '3',
                                'E(n) e(n)' => '4',
                                'e(n) e(n)' => '5',
                            ],
                            'dataset' => 'EN_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'E(n) _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'V_gene_sire',
                            'label' => 'Vienna genes (V)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'V _' => '2',
                                'V V' => '3',
                                'V v' => '4',
                                'v v' => '5',
                            ],
                            'dataset' => 'V_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'V _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Du_gene_sire',
                            'label' => 'Dutch genes (D(u))',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'D(u) _' => '2',
                                'D(u) D(u)' => '3',
                                'D(u) d(u)' => '4',
                                'd(u) d(u)' => '5',
                            ],
                            'dataset' => 'DU_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'D(u) _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Si_gene_sire',
                            'label' => 'Silvering genes (S(i))',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'S(i) _' => '2',
                                'S(i) S(i)' => '3',
                                'S(i) s(i)' => '4',
                                's(i) s(i)' => '5',
                            ],
                            'dataset' => 'SI_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'S(i) _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'W_gene_sire',
                            'label' => 'Wideband genes (W)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'W _' => '2',
                                'W W' => '3',
                                'W w' => '4',
                                'w w' => '5',
                            ],
                            'dataset' => 'W_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'W _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'P_gene_sire',
                            'label' => 'Lutino genes (P)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'P _' => '2',
                                'P P' => '3',
                                'P p' => '4',
                                'p p' => '5',
                            ],
                            'dataset' => 'P_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'P _',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Dam',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_family_dam',
                            'label' => 'Color family',
                            'type' => 'select',
                            'options' => [
                                'Full color' => '0',
                                'Chinchilla' => '1',
                                'Seal' => '2',
                                'Sable' => '3',
                                'Himalayan' => '4',
                                'Ruby eyed white' => '5',
                            ],
                            'dataset' => 'color family',
                            'control' => 'DROPDOWN',
                            'default' => 'Full color',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_dam_full',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                'Black [Self]' => '1',
                                'Chocolate [Self]' => '2',
                                'Blue [Self]' => '3',
                                'Lilac [Self]' => '4',
                                'Black Tortoiseshell' => '5',
                                'Chocolate Tortoiseshell' => '6',
                                'Blue Tortoiseshell (Isabel)' => '7',
                                'Lilac Tortoiseshell' => '8',
                                'Black Otter' => '9',
                                'Chocolate Otter' => '10',
                                'Blue Otter' => '11',
                                'Lilac Otter' => '12',
                                'Tort Otter (Orange)' => '13',
                                'Chocolate Orange Otter' => '14',
                                'Fawn Otter' => '15',
                                'Lilac Fawn Otter' => '16',
                                'Chestnut [Agouti]' => '17',
                                'Cinnamon (Chocolate Agouti)' => '18',
                                'Opal (Blue Agouti)' => '19',
                                'Lynx (Lilac Agouti)' => '20',
                                'Orange [Agouti]' => '21',
                                'Chocolate Orange' => '22',
                                'Fawn (Cream)' => '23',
                                'Lilac Fawn' => '24',
                            ],
                            'dataset' => 'FULL COLOR',
                            'control' => 'DROPDOWN',
                            'default' => 'Black [Self]',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_dam_chinchilla',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                '[Black] Self Chinchilla' => '1',
                                'Chocolate Self Chinchilla' => '2',
                                'Blue Self Chinchilla' => '3',
                                'Lilac Self Chinchilla' => '4',
                                'Sallander (Iron Grey)' => '5',
                                'Chocolate Sallander' => '6',
                                'Blue Sallander' => '7',
                                'Lilac Sallander' => '8',
                                'Black Silver Marten' => '9',
                                'Chocolate Silver Marten' => '10',
                                'Blue Silver Marten' => '11',
                                'Lilac Silver Marten' => '12',
                                'Otter Ermine (Otter Frost Point)' => '13',
                                'Chocolate Otter Ermine' => '14',
                                'Blue Otter Ermine' => '15',
                                'Lilac Otter Ermine' => '16',
                                '[Agouti] Chinchilla' => '17',
                                'Chocolate Agouti Chinchilla' => '18',
                                'Squirrel (Blue Chinchilla)' => '19',
                                'Lilac Agouti Chinchilla' => '20',
                                'Ermine (Frost Point, Frosted Pearl or Frosty)' => '21',
                                'Chocolate Ermine (Chocolate Frost Point)' => '22',
                                'Blue Ermine' => '23',
                                'Lilac Ermine' => '24',
                            ],
                            'dataset' => 'CHINCHILLA',
                            'control' => 'DROPDOWN',
                            'default' => '[Black] Self Chinchilla',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_dam_seal',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                '[Black] Seal' => '1',
                                'Chocolate Seal' => '2',
                                'Blue Seal' => '3',
                                'Lilac Seal' => '4',
                                'Seal Point' => '5',
                                'Chocolate Point double c(chl)' => '6',
                                'Blue Point [Siamese] double c(chl)' => '7',
                                'Lilac Point' => '8',
                                '[Black] Seal Marten' => '9',
                                'Chocolate Seal Marten' => '10',
                                'Blue Seal Marten' => '11',
                                'Lilac Seal Marten' => '12',
                                'Otter Seal Point' => '13',
                                'Chocolate Otter Seal Point' => '14',
                                'Blue Otter Seal Point' => '15',
                                'Lilac Otter Seal Point' => '16',
                                'Seal Agouti Siamese' => '17',
                                'Chocolate Seal Agouti Siamese' => '18',
                                'Blue Seal Agouti Siamese' => '19',
                                'Lilac Seal Agouti Siamese' => '20',
                                'Seal Agouti Point' => '21',
                                'Chocolate Seal Agouti Point' => '22',
                                'Blue Seal Agouti Point' => '23',
                                'Lilac Seal Agouti Point' => '24',
                            ],
                            'dataset' => 'SEAL',
                            'control' => 'DROPDOWN',
                            'default' => '[Black] Seal',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_dam_sable',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                '[Black] Sable (Siamese Sable)' => '1',
                                'Chocolate Sable' => '2',
                                'Blue Sable (Smoke Pearl)' => '3',
                                'Lilac Sable' => '4',
                                'Sable Point' => '5',
                                'Chocolate Point single c(chl)' => '6',
                                'Blue Point [Siamese] single c(chl)' => '7',
                                'Lilac Point (Cream)' => '8',
                                '[Black] Sable Marten' => '9',
                                'Chocolate Sable Marten' => '10',
                                'Blue Seal Marten (Smoke Pearl Marten)' => '11',
                                'Lilac Sable Marten' => '12',
                                'Otter Sable Point (Sable Point Marten)' => '13',
                                'Chocolate Otter Sable Point' => '14',
                                'Blue Otter Sable Point' => '15',
                                'Lilac Otter Sable Point' => '16',
                                'Sable Agouti Siamese' => '17',
                                'Chocolate Sable Agouti Siamese' => '18',
                                'Blue Sable Agouti Siamese' => '19',
                                'Lilac Sable Agouti Siamese' => '20',
                                'Sable Agouti Point' => '21',
                                'Chocolate Sable Agouti Point' => '22',
                                'Blue Sable Agouti Point' => '23',
                                'Lilac Sable Agouti Point' => '24',
                            ],
                            'dataset' => 'SABLE',
                            'control' => 'DROPDOWN',
                            'default' => '[Black] Sable (Siamese Sable)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_dam_himalayan',
                            'label' => 'Color',
                            'type' => 'select',
                            'options' => [
                                '[Black] Himalayan' => '1',
                                'Chocolate Himalayan' => '2',
                                'Blue Himalayan' => '3',
                                'Lilac Himalayan' => '4',
                                '[Black] Himalayan Extended' => '5',
                                'Chocolate Himalayan Extended' => '6',
                                'Blue Himalayan Extended' => '7',
                                'Lilac Himalayan Extended' => '8',
                                'Black Otter Himalayan' => '9',
                                'Chocolate Otter Himalayan' => '10',
                                'Blue Otter Himalayan' => '11',
                                'Lilac Otter Himalayan' => '12',
                                'Black Otter Himalayan Extended' => '13',
                                'Chocolate Otter Himalayan Extended' => '14',
                                'Blue Otter Himalayan Extended' => '15',
                                'Lilac Otter Himalayan Extended' => '16',
                                'Agouti Himalayan' => '17',
                                'Chocolate Agouti Himalayan' => '18',
                                'Blue Agouti Himalayan' => '19',
                                'Lilac Agouti Himalayan' => '20',
                                'Agouti Himalayan Extended' => '21',
                                'Chocolate Agouti Himalayan Extended' => '22',
                                'Blue Agouti Himalayan Extended' => '23',
                                'Lilac Agouti Himalayan Extended' => '24',
                            ],
                            'dataset' => 'HIMALAYAN',
                            'control' => 'DROPDOWN',
                            'default' => '[Black] Himalayan',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'steel_genes_dam',
                            'label' => 'Steel and harlequin genes',
                            'type' => 'select',
                            'options' => ['Double-steel E(s)E(s)' => '1', 'Steel-tipped E(s)_' => '2', 'Harlequin e(j)_' => '3', 'Unknown __' => '4'],
                            'dataset' => 'Steel gene sire',
                            'control' => 'DROPDOWN',
                            'default' => 'Double-steel E(s)E(s)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'En_genes_dam',
                            'label' => 'Broken genes',
                            'type' => 'select',
                            'options' => ['Charlie E(n)E(n)' => '1', 'Broken E(n)e(n)' => '2', 'Solid e(n)e(n)' => '3', 'Unknown' => '4'],
                            'dataset' => 'BROKEN_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Broken E(n)e(n)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vienna_genes_dam',
                            'label' => 'Vienna genes',
                            'type' => 'select',
                            'options' => ['No vienna V_' => '1', 'Vienna (Blue eyed white) vv' => '3', 'Unknown __' => '4'],
                            'dataset' => 'VIENNA_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Vienna (Blue eyed white) vv',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dutch_genes_dam',
                            'label' => 'Dutch genes',
                            'type' => 'select',
                            'options' => ['No dutch D(u)_' => '1', 'Dutch d(u)d(u)' => '3', 'Unknown __' => '4'],
                            'dataset' => 'DUTCH_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Dutch d(u)d(u)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'silvering_genes_dam',
                            'label' => 'Silvering genes',
                            'type' => 'select',
                            'options' => ['Silver S(i)S(i)' => '1', 'Partial silver S(i)s(i)' => '2', 'No silver s(i)s(i)' => '3', 'Unknown __' => '4'],
                            'dataset' => 'SILVER_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Silver S(i)S(i)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wideband_genes_dam',
                            'label' => 'Wideband genes',
                            'type' => 'select',
                            'options' => ['No wideband W_' => '1', 'Wideband ww' => '3', 'Unknown __' => '4'],
                            'dataset' => 'WIDEBAND_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Wideband ww',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lutino_genes_dam',
                            'label' => 'Lutino genes',
                            'type' => 'select',
                            'options' => ['No lutino P_' => '1', 'Lutino pp' => '3', 'Unknown __' => '4'],
                            'dataset' => 'LUTINO_VS_SIRE_MODE1',
                            'control' => 'DROPDOWN',
                            'default' => 'Lutino pp',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Dam',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A_gene_dam',
                            'label' => 'Color pattern (A locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'A _' => '2',
                                'A A' => '3',
                                'A a(t)' => '4',
                                'A a' => '5',
                                'a(t) _' => '6',
                                'a(t) a(t)' => '7',
                                'a(t) a' => '8',
                                'a a' => '9',
                            ],
                            'dataset' => 'A_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'A a',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'B_gene_dam',
                            'label' => 'Black or brown (B locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'B _' => '2',
                                'B B' => '3',
                                'B b' => '4',
                                'b b' => '5',
                            ],
                            'dataset' => 'B_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'B b',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'C_gene_dam',
                            'label' => 'Color amount and placement (C locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'C _' => '2',
                                'C C' => '3',
                                'C c(chd)' => '4',
                                'C c(chl)' => '5',
                                'C c(h)' => '6',
                                'C c' => '7',
                                'c(chd) _' => '8',
                                'c(chd) c(chd)' => '9',
                                'c(chd) c(chl)' => '10',
                                'c(chd) c(h)' => '11',
                                'c(chd) c' => '12',
                                'c(chl) _' => '13',
                                'c(chl) c(chl)' => '14',
                                'c(chl) c(h)' => '15',
                                'c(chl) c' => '16',
                                'c(h) _' => '17',
                                'c(h) c(h)' => '18',
                                'c(h) c' => '19',
                                'c c' => '20',
                            ],
                            'dataset' => 'C_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'C c',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'D_gene_dam',
                            'label' => 'Dense or dilute (D locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'D _' => '2',
                                'D D' => '3',
                                'D d' => '4',
                                'd d' => '5',
                            ],
                            'dataset' => 'D_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'D d',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'E_gene_dam',
                            'label' => 'Extension (E locus)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'E _' => '2',
                                'E E' => '3',
                                'E e' => '4',
                                'e e' => '5',
                            ],
                            'dataset' => 'E_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'E e',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'steel_gene_dam',
                            'label' => 'Steel and harlequin genes (E(s), e(j))',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'E(s) _' => '2',
                                'E(s) E(s)' => '3',
                                'E(s) E' => '4',
                                'E(s) e(j)' => '5',
                                'E(s) e' => '6',
                                'E _' => '7',
                                'E E' => '8',
                                'E e(j)' => '9',
                                'E e' => '10',
                                'e(j) _' => '11',
                                'e(j) e(j)' => '12',
                                'e(j) e' => '13',
                                'e e' => '14',
                            ],
                            'dataset' => 'ES_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'E(s) _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'En_gene_dam',
                            'label' => 'Broken genes (En)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'E(n) _' => '2',
                                'E(n) E(n)' => '3',
                                'E(n) e(n)' => '4',
                                'e(n) e(n)' => '5',
                            ],
                            'dataset' => 'EN_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'E(n) _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'V_gene_dam',
                            'label' => 'Vienna genes (V)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'V _' => '2',
                                'V V' => '3',
                                'V v' => '4',
                                'v v' => '5',
                            ],
                            'dataset' => 'V_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'V _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Du_gene_dam',
                            'label' => 'Dutch genes (D(u))',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'D(u) _' => '2',
                                'D(u) D(u)' => '3',
                                'D(u) d(u)' => '4',
                                'd(u) d(u)' => '5',
                            ],
                            'dataset' => 'DU_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'D(u) _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Si_gene_dam',
                            'label' => 'Silvering genes (S(i))',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'S(i) _' => '2',
                                'S(i) S(i)' => '3',
                                'S(i) s(i)' => '4',
                                's(i) s(i)' => '5',
                            ],
                            'dataset' => 'SI_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'S(i) _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'W_gene_dam',
                            'label' => 'Wideband genes (W)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'W _' => '2',
                                'W W' => '3',
                                'W w' => '4',
                                'w w' => '5',
                            ],
                            'dataset' => 'W_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'W _',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'P_gene_dam',
                            'label' => 'Lutino genes (P)',
                            'type' => 'select',
                            'options' => [
                                '_ _' => '1',
                                'P _' => '2',
                                'P P' => '3',
                                'P p' => '4',
                                'p p' => '5',
                            ],
                            'dataset' => 'P_GENES',
                            'control' => 'DROPDOWN',
                            'default' => 'P _',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Rabbit colors and genes',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_main_or_additional',
                            'label' => 'Show',
                            'type' => 'select',
                            'options' => ['main colors (chestnut, steel etc.).' => '0', 'additional colors (broken, etc.).' => '1'],
                            'dataset' => 'main or additional',
                            'default' => 'main colors (chestnut, steel etc.).',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sort_VS',
                            'label' => 'Sort by',
                            'type' => 'select',
                            'options' => ['possible colors.' => '1', 'possible genes.' => '0'],
                            'dataset' => 'sort',
                            'default' => 'possible colors.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_threshold',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show all possibilities (instead of 10 most probable).' => '1', '' => '0'],
                            'dataset' => 'show probabilities',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_details',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show more details.' => '1', '' => '0'],
                            'dataset' => 'show details',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_full_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_sire_full_textE1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_chinchilla_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_sire_chinchilla_textE1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_seal_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_sire_seal_textE1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_sable_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_sire_sable_textE1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_himalayan_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_sire_himalayan_textE1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_dam_full_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_full_textE1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_dam_chinchilla_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_chinchilla_textE1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_dam_seal_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_seal_textE1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_dam_sable_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_sable_textE1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_dam_himalayan_text1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_himalayan_textE1',
                            'label' => '',
                            'type' => 'result',
                            'prefix' => 'color_dam_himalayan_text1',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textA2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textA2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textB2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textB2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textC2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textC2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textD2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textD2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textE2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textE2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_textES1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_textES1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_textEn1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_textEn1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_textVienna1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_textVienna1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_textDutch1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_textDutch1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_textSilvering1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_textSilvering1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_textWideband1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_textWideband1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'color_sire_textLutino1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'color_dam_textLutino1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textES2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textES2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textEn2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textEn2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textV2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textV2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textDu2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textDu2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textSi2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textSi2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textW2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textW2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'genes_sire_textP2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'genes_dam_textP2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'additional_genes_color',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'additional_genes_part1',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'additional_genes_part2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_or_genes_num',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'include_additional_color_num',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'color_code',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sort_VS_num',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_threshold_num',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_main_or_additional_num',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_details_num',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sum_additional_colors',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'The sire (father)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_A', 'label' => 'Sire, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_B', 'label' => 'Sire, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_C', 'label' => 'Sire, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_D', 'label' => 'Sire, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sire_E', 'label' => 'Sire, Extension (E dominant over e) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'The dam (mother)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_A', 'label' => 'Dam, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_B', 'label' => 'Dam, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_C', 'label' => 'Dam, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_D', 'label' => 'Dam, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dam_E', 'label' => 'Dam, Extension (E dominant over e) — dominant alleles (0, 1 or 2)', 'type' => 'number'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results — chance of each colour in a kitten',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_albino',
                            'label' => 'Albino (ruby-eyed white) %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_nonext',
                            'label' => 'Non-extension — red, fawn, tortoiseshell %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_chestnut',
                            'label' => 'Agouti, black-based — chestnut %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_agouti_other',
                            'label' => 'Agouti in chocolate, opal, cinnamon or lilac %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_self_black',
                            'label' => 'Self black %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_self_other',
                            'label' => 'Self in chocolate, blue or lilac %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_coloured',
                            'label' => 'Not albino %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rb_top',
                            'label' => 'Most likely colour class — chance %',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.define("writeColor",function(color_family_sire,color_family_dam,color_sire_full,color_dam_full,color_sire_chinchilla,color_dam_chinchilla,color_sire_seal,color_dam_seal,color_sire_sable,color_dam_sable,color_sire_himalayan,color_dam_himalayan){var subcolor_sire=1,subcolor_dam=1;if(color_family_sire==0){subcolor_sire=color_sire_full}else if(color_family_sire==1){subcolor_sire=color_sire_chinchilla}else if(color_family_sire==2){subcolor_sire=color_sire_seal}else if(color_family_sire==3){subcolor_sire=color_sire_sable}else if(color_family_sire==4){subcolor_sire=color_sire_himalayan}if(color_family_dam==0){subcolor_dam=color_dam_full}else if(color_family_dam==1){subcolor_dam=color_dam_chinchilla}else if(color_family_dam==2){subcolor_dam=color_dam_seal}else if(color_family_dam==3){subcolor_dam=color_dam_sable}else if(color_family_dam==4){subcolor_dam=color_dam_himalayan}return Math.round(1+color_family_sire)+Math.round(subcolor_sire*10)+Math.round(subcolor_dam*1e3)+Math.round((1+color_family_dam)*1e5)});omni.define("writeColorCode",function(steel_genes_sire,steel_genes_dam,En_genes_sire,En_genes_dam,vienna_genes_sire,vienna_genes_dam,dutch_genes_sire,dutch_genes_dam,silvering_genes_sire,silvering_genes_dam,wideband_genes_sire,wideband_genes_dam,lutino_genes_sire,lutino_genes_dam,include_steel,include_broken,include_vienna,include_dutch,include_silvering,include_wideband,include_lutino){var code=Math.round(steel_genes_sire*include_steel)+Math.round(steel_genes_dam*10)+Math.round(En_genes_sire*100*include_broken)+Math.round(En_genes_dam*1e3)+Math.round(vienna_genes_sire*1e4*include_vienna)+Math.round(vienna_genes_dam*1e5)+Math.round(dutch_genes_sire*1e6*include_dutch)+Math.round(dutch_genes_dam*1e7)+Math.round(silvering_genes_sire*1e8*include_silvering)+Math.round(silvering_genes_dam*1e9)+Math.round(wideband_genes_sire*1e10*include_wideband)+Math.round(wideband_genes_dam*1e11)+Math.round(lutino_genes_sire*1e12*include_lutino)+Math.round(lutino_genes_dam*1e13);return code});omni.define("writeGenesCodePart1",function(A_gene_sire,A_gene_dam,B_gene_sire,B_gene_dam,C_gene_sire,C_gene_dam,D_gene_sire,D_gene_dam,E_gene_sire,E_gene_dam,steel_gene_sire,steel_gene_dam,include_steel){var code=Math.round(A_gene_sire)+Math.round(A_gene_dam*10)+Math.round(B_gene_sire*100)+Math.round(B_gene_dam*1e3)+Math.round(C_gene_sire*1e4)+Math.round(C_gene_dam*1e6)+Math.round(D_gene_sire*1e8)+Math.round(D_gene_dam*1e9)+Math.round(steel_gene_sire*1e10*include_steel)+Math.round(steel_gene_dam*1e12)+Math.round(E_gene_sire*1e14)+Math.round(E_gene_dam*1e15);return code});omni.define("writeGenesCodePart2",function(En_gene_sire,En_gene_dam,V_gene_sire,V_gene_dam,Du_gene_sire,Du_gene_dam,Si_gene_sire,Si_gene_dam,W_gene_sire,W_gene_dam,P_gene_sire,P_gene_dam,include_broken,include_vienna,include_dutch,include_silvering,include_wideband,include_lutino){var code=Math.round(En_gene_sire*include_broken)+Math.round(En_gene_dam*10)+Math.round(V_gene_sire*100*include_vienna)+Math.round(V_gene_dam*1e3)+Math.round(Du_gene_sire*1e4*include_dutch)+Math.round(Du_gene_dam*1e5)+Math.round(Si_gene_sire*1e6*include_silvering)+Math.round(Si_gene_dam*1e7)+Math.round(W_gene_sire*1e8*include_wideband)+Math.round(W_gene_dam*1e9)+Math.round(P_gene_sire*1e10*include_lutino)+Math.round(P_gene_dam*1e11);return code});omni.define("ifElseCustom",function(sum){if(sum<1){return 0}return 1});//# sourceURL=customJs.js
    /*
     * Shared helpers for the hand-written repairs in data/calc/supplement/.
     *
     * Every supplement script is evaluated in its own closed scope, so anything the
     * repairs have in common has to travel with each one. Supplement::apply()
     * prepends this file to every page script it merges.
     */
    
    /**
     * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
     *
     * A statistics page that asked for fifty separate boxes now asks for one, and
     * the visitor types a list the way they would in a spreadsheet cell. Anything
     * that is not a number is ignored rather than turned into NaN — a stray comma
     * or an accidental letter must not poison the whole set.
     */
    function snumlist(text) {
      if (typeof text !== 'string' || text.trim() === '') return [];
      var out = [];
      text.split(/[\s,;]+/).forEach(function (piece) {
        if (piece === '') return;
        var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
        if (isFinite(n)) out.push(n);
      });
      return out;
    }
    
    /** Median of an already sorted array of numbers. */
    function smedian(sorted) {
      var n = sorted.length;
      if (!n) return NaN;
      var mid = Math.floor(n / 2);
      return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
    }
    
    /** The numbers a visitor actually typed, in field order, skipping blanks. */
    function snumbers(values, pattern, limit) {
      var out = [];
      for (var i = 1; i <= limit; i++) {
        var key = pattern.replace('%d', i);
        var raw = values[key];
        if (raw === undefined || raw === null || raw === '') continue;
        var n = Number(raw);
        if (!isFinite(n)) continue;
        out.push({ key: key, n: n });
      }
      return out;
    }
    
    /** A plain number, no trailing zeros, at most `d` decimals. */
    function snum(n, d) {
      if (!isFinite(n)) return '—';
      var v = Number(n.toFixed(d === undefined ? 4 : d));
      return String(v);
    }
    
    /** Round to `d` decimals but keep it a number. */
    function sround(n, d) {
      var f = Math.pow(10, d === undefined ? 2 : d);
      return Math.round(n * f) / f;
    }
    
    /** Greatest common divisor of two whole numbers. */
    function sgcd(x, y) {
      x = Math.abs(Math.round(x));
      y = Math.abs(Math.round(y));
      return y === 0 ? x : sgcd(y, x % y);
    }
    
    /** "10" / "1/3" — a fraction reduced to lowest terms. */
    function sfrac(part, whole) {
      if (!whole) return '—';
      var a = Math.round(part), b = Math.round(whole);
      var g = sgcd(a, b) || 1;
      if (g > 1) { a = a / g; b = b / g; }
      return b === 1 ? String(a) : a + '/' + b;
    }
    
    /** Minimal escape for text that came out of the definition or a label. */
    function sesc(s) {
      return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }
    
    /**
     * A table from a header list and rows of cells. Cells are printed as they are
     * given, so a caller can pass a pre-formatted string.
     */
    function stable(head, rows, foot) {
      var html = '<table><thead><tr>';
      head.forEach(function (h) { html += '<th>' + h + '</th>'; });
      html += '</tr></thead><tbody>';
      rows.forEach(function (r) {
        html += '<tr>';
        r.forEach(function (c) { html += '<td>' + c + '</td>'; });
        html += '</tr>';
      });
      if (foot) {
        html += '<tr>';
        foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
        html += '</tr>';
      }
      return html + '</tbody></table>';
    }
    
    /** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
    function slist(pairs) {
      return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
    }
    
    /**
     * Tidy a value a page script published.
     *
     * The harvested scripts speak the reference site's front-end dialect: `==2==`
     * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
     * comma or a dangling colon left where a second half of a sentence used to
     * follow. Our panel prints the string as plain text, so those markers would
     * land on screen as punctuation soup. This turns them into something readable
     * without changing the value itself.
     */
    function sclean(value) {
      var s = value === null || value === undefined ? '' : String(value);
      var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
                 '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
      s = s.replace(/==(\d+)==/g, function (all, d) {
        return d.split('').map(function (c) { return sub[c] || c; }).join('');
      });
      /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
      var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
                 '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
                 '+': '⁺', '-': '⁻'};
      s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
        return d.split('').map(function (c) { return sup[c] || c; }).join('');
      });
      s = s.replace(/\*\*(.+?)\*\*/g, '$1');
      s = s.replace(/<br\s*\/?>/gi, ' ');
      s = s.replace(/<\/(p|div|li)>/gi, ' ');
      s = s.replace(/<[^>]+>/g, '');
      s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
      /* invisible characters the reference used as "this line is blank": an Arabic
         letter mark, a zero-width space, a byte-order mark. They render as nothing
         and would otherwise keep an empty row looking filled. */
      s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
      s = s.replace(/\s+/g, ' ').trim();
      s = s.replace(/[,;:\-–—]\s*$/, '').trim();
      return s;
    }
    
    /**
     * Turn a drop-down option's id back into its label.
     *
     * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
     * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
     * picked. The uid is in the page markup as an option value or a radio value,
     * so the label is one lookup away.
     */
    function sdelabel(value) {
      if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
      var one = function (id) {
        if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
        var el = document.querySelector('[value="' + id + '"]');
        if (!el) { return id; }
        if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
        var lab = el.closest ? el.closest('label') : null;
        return lab ? ((lab.textContent || '').trim() || id) : id;
      };
      /* a published value can be several ids joined by commas ("Possibilities,
         MD4, NTLM"), so map each piece rather than the whole string */
      return value.split(/\s*,\s*/).map(one).join(', ');
    }
    
    var LOCI = ['A', 'B', 'C', 'D', 'E'];
    
    function num(name) {
      var el = document.querySelector('input[data-var="' + name + '"]');
      if (!el || String(el.value).trim() === '') { return null; }
      var n = Number(el.value);
      return isFinite(n) ? n : null;
    }
    
    /* offspring dominant-allele count: 0, 1 or 2 with its probability */
    function cross(sire, dam) {
      var qs = sire / 2, qd = dam / 2;
      return [
        { k: 2, p: qs * qd },
        { k: 1, p: qs * (1 - qd) + (1 - qs) * qd },
        { k: 0, p: (1 - qs) * (1 - qd) }
      ];
    }
    
    /* the coat a set of five counts describes */
    function coat(g) {
      if (g.C === 0) { return 'Albino (ruby-eyed white)'; }
      if (g.E === 0) {
        return g.A === 0 ? 'Tortoiseshell (non-extension, self)' : 'Red / fawn (non-extension, agouti)';
      }
      var base = g.B === 0 ? 'chocolate' : 'black';
      var dilute = g.D === 0;
      var agouti = g.A > 0;
      if (agouti) {
        if (base === 'black') { return dilute ? 'Opal (agouti, blue)' : 'Chestnut (agouti, black)'; }
        return dilute ? 'Lilac agouti' : 'Cinnamon (agouti, chocolate)';
      }
      if (base === 'black') { return dilute ? 'Blue (self, dilute black)' : 'Black (self)'; }
      return dilute ? 'Lilac (self, dilute chocolate)' : 'Chocolate (self)';
    }
    
    function group(name) {
      if (name.indexOf('Albino') === 0) { return 'albino'; }
      if (name.indexOf('Tortoiseshell') === 0 || name.indexOf('Red / fawn') === 0) { return 'nonext'; }
      if (name.indexOf('Chestnut') === 0) { return 'chestnut'; }
      if (name.indexOf('Opal') === 0 || name.indexOf('Cinnamon') === 0 || name.indexOf('Lilac agouti') === 0) {
        return 'agoutiOther';
      }
      if (name.indexOf('Black') === 0) { return 'selfBlack'; }
      return 'selfOther';
    }
    
    omni.onResult(['sire_A', 'dam_A'], function (ctx, v) {
      var sire = {}, dam = {}, i, k;
      for (i = 0; i < LOCI.length; i++) {
        var locus = LOCI[i];
        var s = num('sire_' + locus);
        var d = num('dam_' + locus);
        if (s === null || d === null) {
          ctx.addUnmetCondition('Fill in both parents at every locus — A, B, C, D and E.');
          return;
        }
        if (s < 0 || s > 2 || d < 0 || d > 2 || Math.round(s) !== s || Math.round(d) !== d) {
          ctx.addUnmetCondition('Each locus takes 0, 1 or 2 — the number of dominant alleles.');
          return;
        }
        sire[locus] = s;
        dam[locus] = d;
      }
    
      /* every combination of the three possible outcomes at the five loci */
      var dist = {};
      var idx = [0, 0, 0, 0, 0];
      for (var a = 0; a < 3; a++) {
        for (var b = 0; b < 3; b++) {
          for (var c = 0; c < 3; c++) {
            for (var dd = 0; dd < 3; dd++) {
              for (var e = 0; e < 3; e++) {
                var counts = { A: [2, 1, 0][a], B: [2, 1, 0][b], C: [2, 1, 0][c],
                               D: [2, 1, 0][dd], E: [2, 1, 0][e] };
                var p = 1;
                var order = [a, b, c, dd, e];
                for (k = 0; k < 5; k++) {
                  var out = cross(sire[LOCI[k]], dam[LOCI[k]])[order[k]];
                  p *= out.p;
                }
                if (p <= 0) { continue; }
                var name = coat(counts);
                dist[name] = (dist[name] || 0) + p;
              }
            }
          }
        }
      }
    
      var sums = { albino: 0, nonext: 0, chestnut: 0, agoutiOther: 0, selfBlack: 0, selfOther: 0 };
      var names = Object.keys(dist);
      for (i = 0; i < names.length; i++) {
        sums[group(names[i])] += dist[names[i]];
      }
      var coloured = 1 - sums.albino;
    
      var best = names[0];
      for (i = 0; i < names.length; i++) { if (dist[names[i]] > dist[best]) { best = names[i]; } }
    
      ctx.exportValue('rb_albino', sround(sums.albino * 100, 1));
      ctx.exportValue('rb_nonext', sround(sums.nonext * 100, 1));
      ctx.exportValue('rb_chestnut', sround(sums.chestnut * 100, 1));
      ctx.exportValue('rb_agouti_other', sround(sums.agoutiOther * 100, 1));
      ctx.exportValue('rb_self_black', sround(sums.selfBlack * 100, 1));
      ctx.exportValue('rb_self_other', sround(sums.selfOther * 100, 1));
      ctx.exportValue('rb_coloured', sround(coloured * 100, 1));
      ctx.exportValue('rb_top', sround(dist[best] * 100, 1));
    
      ctx.addHtml('<p><strong>The likeliest single colour is ' + best.toLowerCase() + ', at '
        + snum(dist[best] * 100, 1) + ' % of kittens; ' + snum(coloured * 100, 1)
        + ' % of the litter will have some colour and ' + snum(sums.albino * 100, 1)
        + ' % will be ruby-eyed whites.</strong></p>');
    
      /* the full list, biggest first */
      names.sort(function (x, y) { return dist[y] - dist[x]; });
      var rows = names.map(function (nm) {
        return [nm, snum(dist[nm] * 100, 1) + ' %', '1 in ' + (dist[nm] > 0 ? snum(1 / dist[nm], 1) : '—')];
      });
      ctx.addHtml('<p>Every colour the cross can produce:</p>');
      ctx.addHtml(stable(['Colour', 'Chance', 'Odds'], rows));
    
      ctx.addHtml(stable(['Genes', 'Sire', 'Dam'], LOCI.map(function (l) {
        return [l, String(sire[l]) + ' dominant allele' + (sire[l] === 1 ? '' : 's'),
          String(dam[l]) + ' dominant allele' + (dam[l] === 1 ? '' : 's')];
      })));
    
      ctx.addHtml('<p class="calc-unmet">Five loci, two alleles each, is the skeleton of rabbit colour genetics, '
        + 'not the whole animal. The C locus alone has a series — full colour, chinchilla, seal, sable-point, '
        + 'himalayan, albino — and this calculator folds all but albino into "coloured", so a chinchilla × '
        + 'chinchilla cross that should throw chinchillas will come back as chestnut or black. The E locus has '
        + 'the harlequin allele between E and e, the D locus interacts with silvering and the wideband gene, '
        + 'and the B locus with the Vienna blue-eyed-white complex and Dutch markings, none of which is here. '
        + 'Crossing-over, the steel gene and the fact that spotting patterns are polygenic are all ignored. '
        + 'Each locus is treated as independent, which is true of genes on different chromosomes and close '
        + 'enough to true for these five. Use the percentages as the shape of a litter rather than a '
        + 'prediction: a 25 % chance means one kitten in four, and a litter of four can easily be all one '
        + 'colour.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter What you want to enter, Color family and Color into Rabbit color and the answer comes back as Color sire full text 1 and Color sire full text E 1. There is no hidden constant here: change color sire full text 1 and what you want to enter moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Rabbit color calculator works', 'html' => <<<'TXT'
            <p>The Rabbit color calculator applies one relationship to 63 numbers and reports Color sire full text 1, Color sire full text E 1 and Color sire chinchilla text 1.</p><p>The result panel carries Color sire full text 1, Color sire full text E 1, Color sire chinchilla text 1 and Color sire chinchilla text E 1, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 63 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>What you want to enter</strong> — a plain number, no unit</li><li><strong>Color family</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Steel and harlequin genes</strong> — a plain number, no unit</li><li><strong>Broken genes</strong> — a plain number, no unit</li><li><strong>Vienna genes</strong> — a plain number, no unit</li><li><strong>Dutch genes</strong> — a plain number, no unit</li><li><strong>Silvering genes</strong> — a plain number, no unit</li><li><strong>Wideband genes</strong> — a plain number, no unit</li><li><strong>Lutino genes</strong> — a plain number, no unit</li><li><strong>Color pattern (A locus)</strong> — a plain number, no unit</li><li><strong>Black or brown (B locus)</strong> — a plain number, no unit</li><li><strong>Color amount and placement (C locus)</strong> — a plain number, no unit</li><li><strong>Dense or dilute (D locus)</strong> — a plain number, no unit</li><li><strong>Extension (E locus)</strong> — a plain number, no unit</li><li><strong>Steel and harlequin genes (E(s), e(j))</strong> — a plain number, no unit</li><li><strong>Broken genes (En)</strong> — a plain number, no unit</li><li><strong>Vienna genes (V)</strong> — a plain number, no unit</li><li><strong>Dutch genes (D(u))</strong> — a plain number, no unit</li><li><strong>Silvering genes (S(i))</strong> — a plain number, no unit</li><li><strong>Wideband genes (W)</strong> — a plain number, no unit</li><li><strong>Lutino genes (P)</strong> — a plain number, no unit</li><li><strong>Color family</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Color</strong> — a plain number, no unit</li><li><strong>Steel and harlequin genes</strong> — a plain number, no unit</li><li><strong>Broken genes</strong> — a plain number, no unit</li><li><strong>Vienna genes</strong> — a plain number, no unit</li><li><strong>Dutch genes</strong> — a plain number, no unit</li><li><strong>Silvering genes</strong> — a plain number, no unit</li><li><strong>Wideband genes</strong> — a plain number, no unit</li><li><strong>Lutino genes</strong> — a plain number, no unit</li><li><strong>Color pattern (A locus)</strong> — a plain number, no unit</li><li><strong>Black or brown (B locus)</strong> — a plain number, no unit</li><li><strong>Color amount and placement (C locus)</strong> — a plain number, no unit</li><li><strong>Dense or dilute (D locus)</strong> — a plain number, no unit</li><li><strong>Extension (E locus)</strong> — a plain number, no unit</li><li><strong>Steel and harlequin genes (E(s), e(j))</strong> — a plain number, no unit</li><li><strong>Broken genes (En)</strong> — a plain number, no unit</li><li><strong>Vienna genes (V)</strong> — a plain number, no unit</li><li><strong>Dutch genes (D(u))</strong> — a plain number, no unit</li><li><strong>Silvering genes (S(i))</strong> — a plain number, no unit</li><li><strong>Wideband genes (W)</strong> — a plain number, no unit</li><li><strong>Lutino genes (P)</strong> — a plain number, no unit</li><li><strong>Show</strong> — a plain number, no unit</li><li><strong>Sort by</strong> — a plain number, no unit</li><li><strong>Sire, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li><li><strong>Sire, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li><li><strong>Sire, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li><li><strong>Sire, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li><li><strong>Sire, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li><li><strong>Dam, Agouti banding (A dominant over a) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li><li><strong>Dam, Black or chocolate (B dominant over b) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li><li><strong>Dam, Full colour (C dominant over c) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li><li><strong>Dam, Dense colour (D dominant over d) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li><li><strong>Dam, Extension (E dominant over e) — dominant alleles (0, 1 or 2)</strong> — a plain number, no unit</li></ul><p>The answers come back as Color sire full text 1, Color sire full text E 1, Color sire chinchilla text 1, Color sire chinchilla text E 1, Color sire seal text 1, Color sire seal text E 1, Color sire sable text 1, Color sire sable text E 1, Color sire himalayan text 1, Color sire himalayan text E 1, Color dam full text 1, Color dam full text E 1, Color dam chinchilla text 1, Color dam chinchilla text E 1, Color dam seal text 1, Color dam seal text E 1, Color dam sable text 1, Color dam sable text E 1, Color dam himalayan text 1, Color dam himalayan text E 1, Genes sire text A 2, Genes dam text A 2, Genes sire text B 2, Genes dam text B 2, Genes sire text C 2, Genes dam text C 2, Genes sire text D 2, Genes dam text D 2, Genes sire text E 2, Genes dam text E 2, Color sire text ES 1, Color dam text ES 1, Color sire text En 1, Color dam text En 1, Color sire text Vienna 1, Color dam text Vienna 1, Color sire text Dutch 1, Color dam text Dutch 1, Color sire text Silvering 1, Color dam text Silvering 1, Color sire text Wideband 1, Color dam text Wideband 1, Color sire text Lutino 1, Color dam text Lutino 1, Genes sire text ES 2, Genes dam text ES 2, Genes sire text En 2, Genes dam text En 2, Genes sire text V 2, Genes dam text V 2, Genes sire text Du 2, Genes dam text Du 2, Genes sire text Si 2, Genes dam text Si 2, Genes sire text W 2, Genes dam text W 2, Genes sire text P 2, Genes dam text P 2, Albino (ruby-eyed white) %, Non-extension — red, fawn, tortoiseshell %, Agouti, black-based — chestnut %, Agouti in chocolate, opal, cinnamon or lilac %, Self black %, Self in chocolate, blue or lilac %, Not albino %, Most likely colour class — chance %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Color sire full text 1 is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Color sire full text 1, Color sire full text E 1 and Color sire chinchilla text 1 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>What you want to enter left as a guess.</strong> Anything typed into What you want to enter is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Color family left as a guess.</strong> Anything typed into Color family is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Color left as a guess.</strong> Anything typed into Color is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in What you want to enter and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Rabbit color, works through it, and the panel lists What you want to enter, Color family, Color and Color.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Color sire full text 1, Color sire full text E 1, Color sire chinchilla text 1 and Color sire chinchilla text E 1 — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have What you want to enter, Color family, Color and Color ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with What you want to enter — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Color sire full text 1 against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Color sire full text 1 is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are What you want to enter, Color family and Color and the number you are missing is Color sire full text 1 and Color sire full text E 1.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rabbit color calculator work out?', 'a' => 'Color sire full text 1, Color sire full text E 1, Color sire chinchilla text 1 and Color sire chinchilla text E 1.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            What you want to enter, Color family, Color, Color, Color. With what you want to enter, color family and color in place, Color sire full text 1 can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Color sire full text 1 is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Color sire full text 1 is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Color sire full text 1 at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/pet-sitter-rates', 'name' => 'Pet sitter rates Calculator'],
            ['path' => '/biology/phenotypic-ratio', 'name' => 'Phenotypic Ratio Calculator'],
            ['path' => '/biology/photosynthesis-rate', 'name' => 'Photosynthesis Rate Calculator'],
        ],
        'authors' => [],
    ],
];
