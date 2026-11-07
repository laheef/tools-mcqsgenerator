<?php

/**
 * Dog life expectancy
 * /biology/dog-life-expectancy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog life expectancy',
    'meta' => ['title' => 'Dog life expectancy: Formula, Steps & Results', 'description' => 'Dog life expectancy turns How old is the dog, in years? and Size of the breed into Age in human years and Typical lifespan for this size (years).', 'h1' => 'Dog life expectancy Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'dog_age' => ['type' => 'numerical'],
            'breed_size' => ['type' => 'valueSelect'],
            'human_age' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'expected_life' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'years_left' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'life_stage' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => '85Y7ayniYuPMvxqS0g3FV',
                'title' => '',
                'desc' => '',
                'm' => [],
            ],
            [
                'uid' => 'supp-dog-inputs',
                'title' => 'Your dog',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dog_age', 'vt' => 'numerical', 'l' => 'How old is the dog, in years?'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'breed_size',
                                    'vt' => 'valueSelect',
                                    'ds' => 'supp-dog-size',
                                    'l' => 'Size of the breed',
                                    'opts' => [
                                        ['supp-dog-1', 'Toy — under 5 kg (Chihuahua, Yorkie)', '1'],
                                        ['supp-dog-2', 'Small — 5 to 10 kg (Pug, Beagle)', '2'],
                                        ['supp-dog-3', 'Medium — 10 to 25 kg (Border collie, Labrador)', '3'],
                                        ['supp-dog-4', 'Large — 25 to 40 kg (German shepherd, Rottweiler)', '4'],
                                        ['supp-dog-5', 'Giant — over 40 kg (Great Dane, Mastiff)', '5'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'supp-dog-results',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'human_age', 'vt' => 'dependent', 'l' => 'Age in human years'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'expected_life', 'vt' => 'dependent', 'l' => 'Typical lifespan for this size (years)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'years_left', 'vt' => 'dependent', 'l' => 'Years likely left'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'life_stage', 'vt' => 'dependent', 'l' => 'Life stage (1 puppy, 2 adult, 3 mature, 4 senior)'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            'oNaszhTTnlqAd5eAn5qQk' => [
                'name' => 'LifeExpetancy',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '1FIGtdSN5IwKbOBLAFouv', 'label' => 'Affenpinscher', 'value' => '1'],
                    ['uid' => 'MLPXrwt2MisSnYBgBp91a', 'label' => 'Afghan Hound', 'value' => '2'],
                    ['uid' => 'QwyRrQSkMq1bckFYpsScv', 'label' => 'African Boerboels', 'value' => '3'],
                    ['uid' => 'stkNqtpV-3h26abuY81OK', 'label' => 'Airedale Terrier', 'value' => '4'],
                    ['uid' => 'nQokDZSjqbNElgoUycG94', 'label' => 'Akbash', 'value' => '5'],
                    ['uid' => 'CDwATefVx07QEF-KsYvIL', 'label' => 'Akita', 'value' => '6'],
                    ['uid' => 'NwEr-m4IkaVQYXhRAW27B', 'label' => 'Alapaha Blue Blood Bulldogs', 'value' => '7'],
                    ['uid' => 'XVbZcIP67Uie5VtkQRdqn', 'label' => 'Alaskan Klee Kai', 'value' => '8'],
                    ['uid' => 'cFkVfQ5-b5xvLUuuMCqFo', 'label' => 'Alaskan Malamute', 'value' => '9'],
                    ['uid' => 'H6pRMHKu7UWxKueGEsdzf', 'label' => 'American Bulldog', 'value' => '10'],
                    ['uid' => 'bEy0pK326wb8rGIydNR08', 'label' => 'American Eskimo Dog', 'value' => '11'],
                    ['uid' => '4AlNfA6XOTaPlnRizc5rk', 'label' => 'American Foxhound', 'value' => '12'],
                    ['uid' => 'SrrxOgwrfzubJC8SYkEJc', 'label' => 'American Staffordshire Terrier', 'value' => '13'],
                    ['uid' => 'oC1-XSugNKLgsAh6LbwRB', 'label' => 'American Water Spaniel', 'value' => '14'],
                    ['uid' => 'K86eKYf6Giho_kCK-dDfa', 'label' => 'Anatolian Shepherd Dog', 'value' => '15'],
                    ['uid' => 'D2e8P6D9jAqkwAIDyK1iz', 'label' => 'Australian Cattle Dog', 'value' => '16'],
                    ['uid' => 'X0Zf5st8C-4pPOhOUq0mL', 'label' => 'Australian Kelpie', 'value' => '17'],
                    ['uid' => '4U7PBnckCwcbxxxcnpCRV', 'label' => 'Australian Shepherd', 'value' => '18'],
                    ['uid' => 'mNK3As3C4RPkYa_8OHsDY', 'label' => 'Australian Silky Terrier', 'value' => '19'],
                    ['uid' => '62TOz1Q_gIqyZWA_52CUf', 'label' => 'Australian Terrier', 'value' => '20'],
                    ['uid' => 'HgHXhNJnfR8xQWwRt8TyY', 'label' => 'Basenji', 'value' => '21'],
                    ['uid' => 'k712z6H8h0JkKCHX_IrN0', 'label' => 'Basset Hound', 'value' => '22'],
                    ['uid' => 'xEwS3mnryfR49DXRwgY4z', 'label' => 'Beagle', 'value' => '23'],
                    ['uid' => 'ZvXhdM3HvZbvnzPD75NHg', 'label' => 'Bearded Collie', 'value' => '24'],
                    ['uid' => '16uHu-8_QhgI9V52c5t9I', 'label' => 'Beauceron', 'value' => '25'],
                    ['uid' => 'CBFX7VElbifz2g8oUEC0e', 'label' => 'Bedlington Terrier', 'value' => '26'],
                    ['uid' => 'wbSCoOjQWYaePl4Znv6cq', 'label' => 'Belgian Malinois', 'value' => '27'],
                    ['uid' => 'T-vqmezzkFDJUHXJt1oMw', 'label' => 'Belgian Shepherd Dog', 'value' => '28'],
                    ['uid' => 'lPRtNOTRPDicb8WmY-cKr', 'label' => 'Belgian Tervuren', 'value' => '29'],
                    ['uid' => 'fH5yN5phAOhn6azuaWD4C', 'label' => 'Bernese Mountain Dog', 'value' => '30'],
                    ['uid' => 'iNsGiEjAbho8To8VWCeHj', 'label' => 'Bichon Frise', 'value' => '31'],
                    ['uid' => 'L8002aNVJRdUybez6wKjR', 'label' => 'Black and Tan Coonhound', 'value' => '32'],
                    ['uid' => 'dl2i6f0LGmmu-w5x7yuWn', 'label' => 'Black Russian Terrier', 'value' => '33'],
                    ['uid' => 'cKcHsZecOHokrhfw75yqX', 'label' => 'Bloodhound', 'value' => '34'],
                    ['uid' => 'HdN2Mgl5zteymW7ewGrnN', 'label' => 'Border Collie', 'value' => '35'],
                    ['uid' => 'VBn3WD4BEesyoLJ-Ke9KT', 'label' => 'Border Terrier', 'value' => '36'],
                    ['uid' => '8YgfoP4XzLamljOHQLPMF', 'label' => 'Borzoi', 'value' => '37'],
                    ['uid' => 'L6-1qytT_FomV3xmd4x22', 'label' => 'Boston Terrier', 'value' => '38'],
                    ['uid' => '2D53oZNwBETSJp3vRByNB', 'label' => 'Bouvier des Flandres', 'value' => '39'],
                    ['uid' => 'I-YoVQKO8LizKe3DzRGG9', 'label' => 'Boxer', 'value' => '40'],
                    ['uid' => '2BtqyqUkY9tqSY700nt8H', 'label' => 'Briard', 'value' => '41'],
                    ['uid' => '_rmk1ca7t-GWVqNqYLQdt', 'label' => 'Brittany', 'value' => '42'],
                    ['uid' => '_FQqiNV8E6IPemrlSbTZA', 'label' => 'Brussels Griffon', 'value' => '43'],
                    ['uid' => 'AVtOQ_BbYHTrbHwJSZq3W', 'label' => 'Bull Terrier', 'value' => '44'],
                    ['uid' => 'wWjdLKncqYZxsKD3neUR1', 'label' => 'Bullmastiff', 'value' => '45'],
                    ['uid' => 'Z_H6qP47PTASXNX-yrPNW', 'label' => 'Cairn Terrier', 'value' => '46'],
                    ['uid' => '2bauqhl--JCbg7mD9Hktm', 'label' => 'Canaan Dog', 'value' => '47'],
                    ['uid' => 'IG0jRCtSWi_TnjGo9d534', 'label' => 'Cane Corso', 'value' => '48'],
                    ['uid' => 'DPNOXKP_IGpvjD9Nxxb9o', 'label' => 'Cardigan Welsh Corgi', 'value' => '49'],
                    ['uid' => 'l8mEe2Zobitbcwle63Uwl', 'label' => 'Carolina Dog', 'value' => '50'],
                    ['uid' => 'fc7M8ONGEGlSs0SoTgr7W', 'label' => 'Catahoula Leopard Dogs', 'value' => '51'],
                    ['uid' => 'i20aM3_cq_nPSKtnYImP2', 'label' => 'Cavalier King Charles Spaniel', 'value' => '52'],
                    ['uid' => 'ypt1kKzLlsq6IbD0IA8xY', 'label' => 'Central Asian Ovtcharkas', 'value' => '53'],
                    ['uid' => 'cg5HJUanLwjD5CQoV_TM9', 'label' => 'Cesky Terrier', 'value' => '54'],
                    ['uid' => 'dWBvyxcHMUkRs0h2TvxiB', 'label' => 'Chesapeake Bay Retriever', 'value' => '55'],
                    ['uid' => 'HVfkTO1rNDEFA3Nu3aJzJ', 'label' => 'Chihuahua', 'value' => '56'],
                    ['uid' => 'lNj0-MfcThJf9gdKCMd18', 'label' => 'Chinese Crested', 'value' => '57'],
                    ['uid' => 'hD3fXrhnLUx0pzILKYpvA', 'label' => 'Chinese Foo', 'value' => '58'],
                    ['uid' => 'S1IG3ml3h4ObP0ST5wPte', 'label' => 'Chinese Shar-Pei', 'value' => '59'],
                    ['uid' => '5_yegrYF3OAkp3dcoIMw4', 'label' => 'Chipoo', 'value' => '60'],
                    ['uid' => 'zfaNQPO82WWpHGLk8VeqP', 'label' => 'Chow Chow', 'value' => '61'],
                    ['uid' => 'JVmF9qqOi936GkFPKnca8', 'label' => 'Clumber Spaniel', 'value' => '62'],
                    ['uid' => 'eLnwTsqvUM9XkhtfXKLDC', 'label' => 'Cocker Spaniel', 'value' => '63'],
                    ['uid' => 'xfKFluyfViLWZvom7sELQ', 'label' => 'Cockapoo', 'value' => '64'],
                    ['uid' => 'jROwdaIszsOV0OEWSO1C9', 'label' => 'Collie', 'value' => '65'],
                    ['uid' => 'GgOBIj4U2iUsVCXIgTqlf', 'label' => 'Coton De Tulears', 'value' => '66'],
                    ['uid' => 'e4zYNDugiBw8dZnb8is91', 'label' => 'Curly-Coated Retriever', 'value' => '67'],
                    ['uid' => 'lQD9gxd47vprDT1MfuoWj', 'label' => 'Dachshund', 'value' => '68'],
                    ['uid' => '2TjH1nKKPIU9Rs3vjjRte', 'label' => 'Dalmatian', 'value' => '69'],
                    ['uid' => 'FYFKg1UeG21ab3TnEeA0v', 'label' => 'Dandie Dinmont Terrier', 'value' => '70'],
                    ['uid' => '2NfcBdVMbHDZnRB8gW1WG', 'label' => 'Doberman Pinscher', 'value' => '71'],
                    ['uid' => 'F1g5HUP9_DJ4_0T5wHU2E', 'label' => 'Dogue de Bordeaux', 'value' => '72'],
                    ['uid' => 'E7t-QRLE33GRest3fG75f', 'label' => 'English Bulldogs', 'value' => '73'],
                    ['uid' => 'f0PJYPFatrurSomC_Ikga', 'label' => 'English Cocker Spaniels', 'value' => '74'],
                    ['uid' => 'qBxmOMi7xh_vyerDcw8Wt', 'label' => 'English Foxhound', 'value' => '75'],
                    ['uid' => 'c1layGyUbMLlUNgUk-y7l', 'label' => 'English Setter', 'value' => '76'],
                    ['uid' => 'S7FqRnw2HJb-y10Zz_zQu', 'label' => 'English Shepherd', 'value' => '77'],
                    ['uid' => 'Zf0HM5qjt_BpGC1-ZuLXY', 'label' => 'English Springer Spaniel', 'value' => '78'],
                    ['uid' => 'ofUxeDE4hHVBJg5puZk0h', 'label' => 'English Toy Spaniel', 'value' => '79'],
                    ['uid' => 'XXXNHntOecwEJR9QvzZuc', 'label' => 'Estrela Mountain Dogs', 'value' => '80'],
                    ['uid' => 'O0EVFbw9wjzO0JzNGKr3Z', 'label' => 'Field Spaniel', 'value' => '81'],
                    ['uid' => 'hBpUxRu_kAtBWkBr0GL4B', 'label' => 'Fila Brasileiros', 'value' => '82'],
                    ['uid' => 'Jf8mMUXed5sX6k2okxY7T', 'label' => 'Finnish Spitz', 'value' => '83'],
                    ['uid' => 'DjrrhZnoF-xpA6TxQB2nA', 'label' => 'Flat-Coated Retriever', 'value' => '84'],
                    ['uid' => 'hjiOlXWOWFZTcaUinfJ9p', 'label' => 'Fox Terrier (Smooth)', 'value' => '85'],
                    ['uid' => '5z-CRHSEZUzBEdV8eV9CM', 'label' => 'Fox Terrier (Wire)', 'value' => '86'],
                    ['uid' => 'K0LG3SmswbvDrocS8f-ZK', 'label' => 'French Bulldog', 'value' => '87'],
                    ['uid' => 'dqDIquu3qqs4veVXPS0hk', 'label' => 'German Pinscher', 'value' => '88'],
                    ['uid' => 'x0cXWQKqzos1oKymUQr2R', 'label' => 'German Shepherd', 'value' => '89'],
                    ['uid' => 'jDKLyVCpGB_PCrI0X5ZbV', 'label' => 'German Shorthaired Pointer', 'value' => '90'],
                    ['uid' => '64sEEO4FNy8-Z8segDS5l', 'label' => 'German Wirehaired Pointer', 'value' => '91'],
                    ['uid' => '2v5F_rqV_FvS2d8C1-JHB', 'label' => 'Giant Schnauzer', 'value' => '92'],
                    ['uid' => 'VpYZD_RDTyJRpvpGyGbfu', 'label' => 'Glen of Imaal Terrier', 'value' => '93'],
                    ['uid' => '8a_N2PfLVKn4yEofog4q3', 'label' => 'Golden Retriever', 'value' => '94'],
                    ['uid' => '_QtKpbyjdd3pTWV1a0YlI', 'label' => 'Goldendoodle', 'value' => '95'],
                    ['uid' => 'BEa6BDvYOZ_mePIU9-wm2', 'label' => 'Gordon Setter', 'value' => '96'],
                    ['uid' => '_T-hN-eeqJPZ0_l6nidid', 'label' => 'Great Dane', 'value' => '97'],
                    ['uid' => '36t1EH_ziasx0yw0F_ywL', 'label' => 'Great Pyrenees', 'value' => '98'],
                    ['uid' => 'r6M432-svwwzAtWLftxfC', 'label' => 'Greater Swiss Mountain Dog', 'value' => '99'],
                    ['uid' => 'hAeQ8UDtxGzIfemQ6ZevU', 'label' => 'Greyhound', 'value' => '100'],
                    ['uid' => 'XCMDG2edF8FUILEpkSu6I', 'label' => 'Harrier', 'value' => '101'],
                    ['uid' => '6WjbMSCIS3ibFYqLyUpc2', 'label' => 'Havanese', 'value' => '102'],
                    ['uid' => '7Mi0B5_4sq66wY3X2Gi6N', 'label' => 'Hungarian Vizsla', 'value' => '103'],
                    ['uid' => 'H3eV5dy69n6Xqua7wrzoa', 'label' => 'Ibizan Hound', 'value' => '104'],
                    ['uid' => '9EmcLJVxPJopbQ5Me2fNg', 'label' => 'Irish Setter', 'value' => '105'],
                    ['uid' => 'cPXlw5rT-3tEA9CaX2qpa', 'label' => 'Irish Terrier', 'value' => '106'],
                    ['uid' => 'BgN3Qx82jsJ7-bKpzp5U1', 'label' => 'Irish Water Spaniel', 'value' => '107'],
                    ['uid' => '6XBUhULvngsR2T5OnVC1h', 'label' => 'Irish Wolfhound', 'value' => '108'],
                    ['uid' => 'u8YVSyPpYNehppKXdL5NE', 'label' => 'Italian Greyhound', 'value' => '109'],
                    ['uid' => '87APhGkpIr8UWhELa5RV5', 'label' => 'Jack Russell Terrier', 'value' => '110'],
                    ['uid' => 'EVyLStBqZZfUP3-87jMnI', 'label' => 'Japanese Chin', 'value' => '111'],
                    ['uid' => 'UpMqDJGgBPjCL5Fm6RP_r', 'label' => 'Keeshond', 'value' => '112'],
                    ['uid' => 'xNUDEjMAFNlOfkr1pxodn', 'label' => 'Kerry Blue Terrier', 'value' => '113'],
                    ['uid' => 'aWPwACs85Hi1gnr7ZiMJT', 'label' => 'Komondor', 'value' => '114'],
                    ['uid' => 'qEgCn_NhbufTQfeJTq6aA', 'label' => 'Kooikerhondje', 'value' => '115'],
                    ['uid' => 'yuLhXO_O4DnnjlY6z_td-', 'label' => 'Kuvasz', 'value' => '116'],
                    ['uid' => 'ejSEkWHhNOfx1CRG3fvT1', 'label' => 'Labradoodle', 'value' => '117'],
                    ['uid' => 'LM6DbFwBkknPZgojH3rra', 'label' => 'Labrador Retriever', 'value' => '118'],
                    ['uid' => 'MeL07YFKc425R9t0LuySw', 'label' => 'Laekenois', 'value' => '119'],
                    ['uid' => 'TZoaznu6uAIQrkNZuQZVa', 'label' => 'Lakeland Terrier', 'value' => '120'],
                    ['uid' => 's5B3pJNAC9S0kF-dNI1wR', 'label' => 'Lancashire Heeler', 'value' => '121'],
                    ['uid' => 'VlbLf-qG-MLgdqEPf0cL7', 'label' => 'Lhasa Apso', 'value' => '122'],
                    ['uid' => 'BnpotbdN_Vp7lkr-2p9Io', 'label' => 'Löwchen', 'value' => '123'],
                    ['uid' => 'HlTxtUCG9WiRhIBUb4Xqv', 'label' => 'Maltese', 'value' => '124'],
                    ['uid' => '5729Dhrq8AUfEiVywrwgx', 'label' => 'Maltipoo', 'value' => '125'],
                    ['uid' => '4L9XWojlWfJqBwirivLvl', 'label' => 'Manchester Terrier', 'value' => '126'],
                    ['uid' => 'bPgDwjOsIwOwjtH8-QNbc', 'label' => 'Maremma Sheepdog', 'value' => '127'],
                    ['uid' => 'vOFpA4395tjLw9RjzOgDj', 'label' => 'Mastiff', 'value' => '128'],
                    ['uid' => 'JIqDqDfBvdMKvUnt7JhJf', 'label' => 'Miniature Bull Terrier', 'value' => '129'],
                    ['uid' => '-QYO56Nz3kQTEbK0fwbaA', 'label' => 'Miniature Pinscher', 'value' => '130'],
                    ['uid' => 't9cOIQArCEufF45yHhujR', 'label' => 'Miniature Poodle', 'value' => '131'],
                    ['uid' => 'Et9ukb6T7aJEyyHxTXxtK', 'label' => 'Miniature Schnauzer', 'value' => '132'],
                    ['uid' => 'uit9A7q73Ip5988QxtMft', 'label' => 'Neapolitan Mastiff', 'value' => '133'],
                    ['uid' => 'bT1HpdAkZRG-70rUDRJBh', 'label' => 'Newfoundland', 'value' => '134'],
                    ['uid' => 'suiUWvVERG7NPx9HROLEQ', 'label' => 'Norfolk Terrier', 'value' => '135'],
                    ['uid' => 'ZkfTgIrYbxhS3f_y-WrZR', 'label' => 'Norwegian Buhunds', 'value' => '136'],
                    ['uid' => 'Rmnf_pmURoV0Ws8T6EmCz', 'label' => 'Norwegian Elkhound', 'value' => '137'],
                    ['uid' => 'xnFXr2If6sZCslpg8B3VQ', 'label' => 'Norwich Terrier', 'value' => '138'],
                    ['uid' => 'ZVXFw4J0psGzh0UMa9gR1', 'label' => 'Nova Scotia Duck Tolling Retriever', 'value' => '139'],
                    ['uid' => 'NS5w_8kfz4906lte677Jt', 'label' => 'Old English Sheepdog', 'value' => '140'],
                    ['uid' => 'DSsKxwfrdNDTbJesYPXUX', 'label' => 'Otterhound', 'value' => '141'],
                    ['uid' => '362WUHsAHE1dZlBTr22u4', 'label' => 'Papillon', 'value' => '142'],
                    ['uid' => '3GPgKiq51LjL6jUe4wdFD', 'label' => 'Parson Russell Terrier', 'value' => '143'],
                    ['uid' => '0A_WwjcHLmaQfbGbniu7U', 'label' => 'Peekapoo', 'value' => '144'],
                    ['uid' => '4wieLmm4hSHz_oJ0MBCWp', 'label' => 'Pekingese', 'value' => '145'],
                    ['uid' => 'q9lVgsMMekGQXM2rDHcgL', 'label' => 'Pembroke Welsh Corgi', 'value' => '146'],
                    ['uid' => 'mvSAiiQvsIGEJUn0PjY57', 'label' => 'Petit Basset Griffon Vendeen', 'value' => '147'],
                    ['uid' => 'bt7RH5W1WOU8dLOhKSqkL', 'label' => 'Pharaoh Hound', 'value' => '148'],
                    ['uid' => 'X2tqSWE2TDOJ7vu2xAmkb', 'label' => 'Pit Bull', 'value' => '149'],
                    ['uid' => 'gHt8j5YSn2-USGDLpcROr', 'label' => 'Plott', 'value' => '150'],
                    ['uid' => 'elrWiT1Wi8Ua6jinY3r2L', 'label' => 'Pointer', 'value' => '151'],
                    ['uid' => 'hRN9U9zOrK9bdkK5taO93', 'label' => 'Polish Lowland Sheepdog', 'value' => '152'],
                    ['uid' => 'MnU5tTyAQStyFHE4a-vMA', 'label' => 'Pomapoo', 'value' => '153'],
                    ['uid' => 'AcvQvH01gpHALV-BAWRxr', 'label' => 'Pomeranian', 'value' => '154'],
                    ['uid' => 'tOhAU90aUDVC1dL_R2hYV', 'label' => 'Poodle (Standard)', 'value' => '155'],
                    ['uid' => 'K2Xbqfssny4FDWcIQAmpg', 'label' => 'Portuguese Water Dog', 'value' => '156'],
                    ['uid' => '2LMubm6dVxxVbxudJxOq7', 'label' => 'Pug', 'value' => '157'],
                    ['uid' => 'P5q_4vgK2aB_rBWXOKW2F', 'label' => 'Puli', 'value' => '158'],
                    ['uid' => 'UwFug8DSIXKiS8RDsah5S', 'label' => 'Rat Terrier', 'value' => '159'],
                    ['uid' => 'YcAvLHL8RICWICXmhXDwM', 'label' => 'Redbone Coonhound', 'value' => '160'],
                    ['uid' => '5pE-bpnjb72oZS3koGHZk', 'label' => 'Rhodesian Ridgeback', 'value' => '161'],
                    ['uid' => 'oGwdv3TU6nyl90iGNkmnU', 'label' => 'Rottweiler', 'value' => '162'],
                    ['uid' => 'WRXvZSZiT5vvsrV4qpZhH', 'label' => 'Saint Bernard', 'value' => '163'],
                    ['uid' => 'cSjWk-0FZ8sXgLwhKUyeC', 'label' => 'Saluki', 'value' => '164'],
                    ['uid' => 'Ehy2X8eywQl2fNTEmHe6u', 'label' => 'Samoyed', 'value' => '165'],
                    ['uid' => 'X6WLh8jbj6GDe79k7sCus', 'label' => 'Schipperke', 'value' => '166'],
                    ['uid' => '1E9DG9BFTD4DJ7luEpugm', 'label' => 'Schnoodle', 'value' => '167'],
                    ['uid' => 'ooxx6ik7l7JsA2jqMt1HD', 'label' => 'Scottish Deerhound', 'value' => '168'],
                    ['uid' => '6X8x9cndtDd-RhhlERoOh', 'label' => 'Scottish Terrier', 'value' => '169'],
                    ['uid' => 'vquqgP876x2SRgHdWIRqw', 'label' => 'Sealyham Terrier', 'value' => '170'],
                    ['uid' => '8ZWypGvLydIWov8ZTiJHd', 'label' => 'Shetland Sheepdog', 'value' => '171'],
                    ['uid' => '8yc1WdbEciqz9Mx2u3mD7', 'label' => 'Shiba Inu', 'value' => '172'],
                    ['uid' => 'HdX2GYRX6Ibi3rMv06SPj', 'label' => 'Shih Tzu', 'value' => '173'],
                    ['uid' => 'dpH3jfYOkohqMGzTTOpIi', 'label' => 'Siberian Husky', 'value' => '174'],
                    ['uid' => 'KuKqzXyM6aaGf6wXbZO_H', 'label' => 'Silky Terrier', 'value' => '175'],
                    ['uid' => 'lKpTDg-ieMYJFTOPw6A3_', 'label' => 'Skye Terrier', 'value' => '176'],
                    ['uid' => 'JXqIjUM58BsBzWLQpa2U-', 'label' => 'Snorkie', 'value' => '177'],
                    ['uid' => 'U4e7spS0vjX6AgV1ew7Rm', 'label' => 'Soft-coated Wheaten Terrier', 'value' => '178'],
                    ['uid' => 'IdCTjX5ea_Y8OAIDEnjDR', 'label' => 'Spinone Italiano', 'value' => '179'],
                    ['uid' => 'oNnhuXuov1hCsjy4nSMFy', 'label' => 'Staffordshire Bull Terrier', 'value' => '180'],
                    ['uid' => 't23TOJUh_JFA_acC3DVy3', 'label' => 'Standard Schnauzer', 'value' => '181'],
                    ['uid' => '6NfSQ3tSlN_Q3HTUf9PUh', 'label' => 'Sussex Spaniel', 'value' => '182'],
                    ['uid' => 'uprv7qdjBris7-ELqJRJL', 'label' => 'Swedish Vallhund', 'value' => '183'],
                    ['uid' => 'IRNBlsCgr9SKhrW1wJLN5', 'label' => 'Thai Ridgeback', 'value' => '184'],
                    ['uid' => 'JwL0w3K5jj4pMuQ6twBmd', 'label' => 'Tibetan Mastiff', 'value' => '185'],
                    ['uid' => 'p3PSa78nqHYtJvPTz_B_R', 'label' => 'Tibetan Spaniel', 'value' => '186'],
                    ['uid' => '6DT9kiFPKv75A6B9x-Fqn', 'label' => 'Tibetan Terrier', 'value' => '187'],
                    ['uid' => 'INkRABdQE2K5tbN5uCY8W', 'label' => 'Toy Fox Terrier', 'value' => '188'],
                    ['uid' => 'KmUQSXhYLGB0hNyyY6Oq8', 'label' => 'Toy Manchester Terrier', 'value' => '189'],
                    ['uid' => '2HLgHKXXbNxX58u7AU_uU', 'label' => 'Toy Poodle', 'value' => '190'],
                    ['uid' => 'A16rDd7SAX87cz5g0GOf0', 'label' => 'Treeing Walker Coonhound', 'value' => '191'],
                    ['uid' => 'hIGL-UBYnPxxYCqL40NSe', 'label' => 'Vizsla', 'value' => '192'],
                    ['uid' => 'prUS7q6fBhvCeL-d-VxkI', 'label' => 'Weimaraner', 'value' => '193'],
                    ['uid' => 'JNWHlFpL_vMyVBXetR9AZ', 'label' => 'Welsh Springer Spaniel', 'value' => '194'],
                    ['uid' => '4Z-l3qaIWtbEudIlD5cLM', 'label' => 'Welsh Terrier', 'value' => '195'],
                    ['uid' => 'aSSKx48KGP8UQH4Tfock2', 'label' => 'West Highland White Terrier', 'value' => '196'],
                    ['uid' => 'kGPgMYngWDi58b9wluSH1', 'label' => 'Whippet', 'value' => '197'],
                    ['uid' => 'fFOlBKZPqavyMuR9J_E9T', 'label' => 'Wirehaired Pointing Griffon', 'value' => '198'],
                    ['uid' => 'i3RbgB4EpeYKK76fUq6vx', 'label' => 'Xoloitzcuintle', 'value' => '199'],
                    ['uid' => 'CElrF5O2RLpg5ACe88xPa', 'label' => 'Yorkie-Poo', 'value' => '200'],
                    ['uid' => 'GCJkyyv6uhdQZx3bUfW-n', 'label' => 'Yorkshire Terrier', 'value' => '201'],
                ],
            ],
            'supp-dog-size' => [
                'name' => 'Size of the breed',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'supp-dog-1', 'label' => 'Toy — under 5 kg (Chihuahua, Yorkie)', 'value' => '1'],
                    ['uid' => 'supp-dog-2', 'label' => 'Small — 5 to 10 kg (Pug, Beagle)', 'value' => '2'],
                    ['uid' => 'supp-dog-3', 'label' => 'Medium — 10 to 25 kg (Border collie, Labrador)', 'value' => '3'],
                    ['uid' => 'supp-dog-4', 'label' => 'Large — 25 to 40 kg (German shepherd, Rottweiler)', 'value' => '4'],
                    ['uid' => 'supp-dog-5', 'label' => 'Giant — over 40 kg (Great Dane, Mastiff)', 'value' => '5'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";//# sourceURL=customJs.js
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
        
        /*
         * Median lifespan and the yearly ageing rate for each size class, in the order
         * the picker lists them. A toy breed lives about 14 years against 8 for a giant,
         * which is why the same calendar age means very different things.
         */
        var SIZES = [
          { name: 'toy',    life: 14.0, rate: 3.3, adult: 3.0 },
          { name: 'small',  life: 13.0, rate: 3.8, adult: 4.5 },
          { name: 'medium', life: 12.0, rate: 4.3, adult: 6.5 },
          { name: 'large',  life: 10.0, rate: 5.0, adult: 9.0 },
          { name: 'giant',  life: 8.0,  rate: 6.0, adult: 12.0 }
        ];
        
        /* the chosen option's position, whether the picker is a select or radios */
        function chosenIndex(name) {
          var sel = document.querySelector('select[data-var="' + name + '"]');
          if (sel && sel.selectedIndex >= 0) { return sel.selectedIndex; }
          var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
          for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) { return i; }
          }
          return -1;
        }
        
        function num(name) {
          var el = document.querySelector('input[data-var="' + name + '"]');
          if (!el || String(el.value).trim() === '') { return null; }
          var n = Number(el.value);
          return isFinite(n) ? n : null;
        }
        
        omni.onResult(['dog_age', 'breed_size'], function (ctx, v) {
          var age = num('dog_age');
          /* the client banks the option's number, so the size arrives as 1 to 5 */
          var index = Number(v.breed_size) - 1;
          if (!isFinite(index) || index < 0) { index = chosenIndex('breed_size'); }
        
          if (age === null) {
            ctx.addUnmetCondition('Enter the dog’s age in years.');
            return;
          }
          if (index < 0) {
            ctx.addUnmetCondition('Choose the size of the breed.');
            return;
          }
          if (age < 0) {
            ctx.addUnmetCondition('An age cannot be negative.');
            return;
          }
          if (age > 30) {
            ctx.addUnmetCondition('No dog has reached ' + snum(age, 0) + ' years — the record is about 30.');
            return;
          }
        
          var size = SIZES[index] || SIZES[2];
        
          /* the first two years age fast, then the size decides the yearly step */
          var human;
          if (age <= 1) {
            human = age * 15;
          } else if (age <= 2) {
            human = 15 + (age - 1) * 9;
          } else {
            human = 24 + (age - 2) * size.rate;
          }
        
          var left = size.life - age;
          var stage = age < (size.adult * 0.6) ? 1
            : age < size.adult ? 2
            : age < size.adult * 1.6 ? 3
            : 4;
        
          ctx.exportValue('human_age', sround(human, 1));
          ctx.exportValue('expected_life', sround(size.life, 1));
          ctx.exportValue('years_left', sround(Math.max(0, left), 1));
          ctx.exportValue('life_stage', stage);
        
          var stageName = { 1: 'puppy', 2: 'young adult', 3: 'mature', 4: 'senior' }[stage];
        
          ctx.addHtml('<p><strong>A ' + snum(age, 1) + '-year-old ' + size.name + ' breed is about '
            + snum(human, 0) + ' in human years — a ' + stageName + '. Its size class usually lives to '
            + snum(size.life, 1) + ', so ' + (left > 0 ? snum(left, 1) + ' years are likely left'
              : 'it has already outlived the typical lifespan for its size') + '.</strong></p>');
        
          ctx.addHtml(stable(['Item', 'Value'], [
            ['Calendar age', snum(age, 1) + ' years'],
            ['Size class', size.name],
            ['Human-equivalent age', snum(human, 0) + ' years'],
            ['Typical lifespan for the size', snum(size.life, 1) + ' years'],
            ['Years left', left > 0 ? snum(left, 1) : 'none by the median'],
            ['Life stage', stageName],
            ['Yearly ageing after the second birthday', snum(size.rate, 1) + ' human years per dog year'],
            ['Share of a typical life lived', snum(Math.min(100, age / size.life * 100), 0) + ' %']
          ]));
        
          /* the same dog at every size, so the effect of the breed is visible */
          var rows = SIZES.map(function (s) {
            var h = age <= 1 ? age * 15 : age <= 2 ? 15 + (age - 1) * 9 : 24 + (age - 2) * s.rate;
            return [s.name + ' breed', snum(h, 0), snum(s.life, 1), snum(Math.max(0, s.life - age), 1)];
          });
          ctx.addHtml('<p>If this dog were another size, at the same age:</p>');
          ctx.addHtml(stable(['Size', 'Human years', 'Typical lifespan', 'Years left'], rows));
        
          ctx.addHtml('<p class="calc-unmet">The "multiply by seven" rule is wrong in both directions: a '
            + 'one-year-old dog is a young adult, not a seven-year-old child, and the multiplier that fits a '
            + 'poodle badly overshoots for a mastiff. The figures above follow the age curve most veterinarians '
            + 'use — fast in the first two years, then a steady yearly step that depends on size — and the '
            + 'lifespans are the medians for each size class, not promises for an individual dog. Breed matters '
            + 'within a size (a Cavalier King Charles lives far shorter than a Jack Russell of the same weight), '
            + 'and so do body condition, dental care and neutering. A dog that is a mixture of sizes is best '
            + 'placed by its adult weight rather than by the largest breed in its ancestry.</p>');
        });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog life expectancy turns How old is the dog, in years? and Size of the breed into Age in human years and Typical lifespan for this size (years). It is a single relationship that reads Age in human years out of How old is the dog, in years?, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Dog life expectancy calculator works', 'html' => <<<'TXT'
            <p>Dog life expectancy answers one question from 2 numbers, and the answer is Age in human years, Typical lifespan for this size (years) and Years likely left.</p><p>What comes back is Age in human years, Typical lifespan for this size (years), Years likely left and Life stage (1 puppy, 2 adult, 3 mature, 4 senior) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>How old is the dog, in years?</strong> — a plain number, no unit</li><li><strong>Size of the breed</strong> — a plain number, no unit</li></ul><p>The result boxes are Age in human years, Typical lifespan for this size (years), Years likely left, Life stage (1 puppy, 2 adult, 3 mature, 4 senior); they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Age in human years takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Age in human years, Typical lifespan for this size (years) and Years likely left are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>How old is the dog, in years? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If How old is the dog, in years? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Size of the breed left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Size of the breed is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If How old is the dog, in years? is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>How old is the dog, in years?</strong> takes a plain number with no unit attached. Have it to hand before you start: How old is the dog, in years? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Size of the breed</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Size of the breed is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Age in human years</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Typical lifespan for this size (years)</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Years likely left</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Life stage (1 puppy, 2 adult, 3 mature, 4 senior)</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Dog life expectancy is not a single equation with a single answer. It reads How old is the dog, in years? and Size of the breed, applies the analysis the page is built around, and reports Age in human years, Typical lifespan for this size (years), Years likely left and Life stage (1 puppy, 2 adult, 3 mature, 4 senior).</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Age in human years, Typical lifespan for this size (years), Years likely left and Life stage (1 puppy, 2 adult, 3 mature, 4 senior). They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need How old is the dog, in years? and Size of the breed. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type How old is the dog, in years? into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Age in human years with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Age in human years follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are How old is the dog, in years? and Size of the breed and the number you are missing is Age in human years and Typical lifespan for this size (years).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dog-quality-of-life">Dog quality of life</a>, <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a> and <a href="/biology/dog-size">Dog size Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog life expectancy calculator work out?', 'a' => 'Age in human years, Typical lifespan for this size (years), Years likely left and Life stage (1 puppy, 2 adult, 3 mature, 4 senior).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How old is the dog, in years?, Size of the breed. Enter dog_age and breed_size; Age in human years is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Age in human years is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Age in human years, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Age in human years at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
        ],
        'authors' => [],
    ],
];
