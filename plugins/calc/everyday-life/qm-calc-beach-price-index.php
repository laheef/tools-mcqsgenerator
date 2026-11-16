<?php

/**
 * Beach price index
 * /everyday-life/beach-price-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beach price index',
    'meta' => ['title' => 'Beach price index: Formula, Steps & Results', 'description' => 'Enter sunscreen and water and get Beach Price Index back. Each box lists the units it accepts, and the answer converts between them. Any box can be the unknown.', 'h1' => 'Beach price index Calculator', 'updated' => '2026-08-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Sunscreen',
                            'label' => 'Sunscreen',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Average cost of a 200ml SPF 30 bottle.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Water',
                            'label' => 'Water',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Average price of a 500ml bottle.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Beer',
                            'label' => 'Beer',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Average price of one beer.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Icecream',
                            'label' => 'Ice cream',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Average pre-packaged ice-cream price.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Lunch',
                            'label' => 'Lunch',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Average full meal cost, including a drink and dessert.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Facility_Fee',
                            'label' => 'Facility fee',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Entrance fee to the beach, renting a sun lounger and an umbrella.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_Price',
                            'label' => 'Beach Price Index',
                            'type' => 'number',
                            'prefix' => '$',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Your beach&nbsp;'],
                                ['when' => 'Total_Price == 15.65', 'text' => 'costs exactly the same as&nbsp;'],
                                ['when' => 'Total_Price > 15.65', 'text' => 'is {{cua.formattedValue}} times more expensive than&nbsp;'],
                                ['when' => 'Total_Price < 15.65', 'text' => 'is {{cua.formattedValue}} times cheaper than&nbsp;'],
                                ['when' => null, 'text' => 'Cua Dai Beach in Hoi An, Vietnam - the cheapest beach in the world. Your beach&nbsp;'],
                                ['when' => 'Total_Price == 91.5', 'text' => 'costs exactly the same as&nbsp;'],
                                ['when' => 'Total_Price > 91.5', 'text' => 'is {{anse.formattedValue}} times more expensive than&nbsp;'],
                                ['when' => 'Total_Price < 91.5', 'text' => 'is {{anse.formattedValue}} times cheaper than&nbsp;'],
                                ['when' => null, 'text' => <<<'TXT'
                                Anse Vata in Noumea, New Caledonia - the most expensive beach in the world. Your beach would be placed at number {{rank.value}} position out of 327 beaches ranked by TravelBird.
                                TXT],
                                ['when' => 'closer_to == 0', 'text' => 'In terms of cost, your beach goes above the&nbsp;'],
                                ['when' => 'closer_to > 0', 'text' => 'In terms of cost, your beach resembles&nbsp;'],
                                ['when' => 'closer_to == 0 or closer_to == 1', 'text' => 'Anse Vata in Noumea, New Caledonia, with a price index of $91.50.&nbsp;'],
                                ['when' => 'closer_to == 2', 'text' => 'Finale Ligure in Liguria, Italy, with a price index of $89.19.&nbsp;'],
                                ['when' => 'closer_to == 3', 'text' => 'Yonaha Maehama Beach in Okinawa, Japan, with a price index of $81.88.&nbsp;'],
                                ['when' => 'closer_to == 4', 'text' => 'Solanas Cagliari in Sardinia, Italy, with a price index of $76.23.&nbsp;'],
                                ['when' => 'closer_to == 5', 'text' => 'Waikiki in Hawaii, United States, with a price index of $75.52.&nbsp;'],
                                ['when' => 'closer_to == 6', 'text' => 'South Beach in Florida, United States, with a price index of $74.79.&nbsp;'],
                                ['when' => 'closer_to == 7', 'text' => 'Main Beach in New York, United States, with a price index of $74.07.&nbsp;'],
                                ['when' => 'closer_to == 8', 'text' => 'Plage de Pampelonne in Cote d’Azur, France, with a price index of $73.89.&nbsp;'],
                                ['when' => 'closer_to == 9', 'text' => 'Manly Beach in Sydney, New South Wales, Australia, with a price index of $72.24.&nbsp;'],
                                ['when' => 'closer_to == 10', 'text' => 'Seljesanden Beach in Selje, Norway, with a price index of $70.52.&nbsp;'],
                                ['when' => 'closer_to == 11', 'text' => 'Paloma Plage in Cote d’Azur, France, with a price index of $70.37.&nbsp;'],
                                ['when' => 'closer_to == 12', 'text' => 'Cottesloe Beach in Perth, Western Australia, Australia, with a price index of $70.23.&nbsp;'],
                                ['when' => 'closer_to == 13', 'text' => 'Kristiansand Beach in Kristiansand, Norway, with a price index of $69.84.&nbsp;'],
                                ['when' => 'closer_to == 14', 'text' => 'Borestranda in Kleppe, Norway, with a price index of $69.44.&nbsp;'],
                                ['when' => 'closer_to == 15', 'text' => 'Huk Beach in Oslo, Norway, with a price index of $69.2.&nbsp;'],
                                ['when' => 'closer_to == 16', 'text' => 'L\'Ecrin in Cote d’Azur, France, with a price index of $67.63.&nbsp;'],
                                ['when' => 'closer_to == 17', 'text' => 'Myrtle Beach in South Carolina, United States, with a price index of $67.51.&nbsp;'],
                                ['when' => 'closer_to == 18', 'text' => 'Santa Monica State Beach in California, United States, with a price index of $67.01.&nbsp;'],
                                ['when' => 'closer_to == 19', 'text' => 'Daytona Beach in Florida, United States, with a price index of $65.27.&nbsp;'],
                                ['when' => 'closer_to == 20', 'text' => 'Solastranda in Sola, Norway, with a price index of $65.18.&nbsp;'],
                                ['when' => 'closer_to == 21', 'text' => 'Sjøsanden in Mandal, Norway, with a price index of $65.06.&nbsp;'],
                                ['when' => 'closer_to == 22', 'text' => 'Belle Mare Plage in Belle Mare, Mauritius, with a price index of $64.99.&nbsp;'],
                                ['when' => 'closer_to == 23', 'text' => 'Le Morne in Le Morne Brabant, Mauritius, with a price index of $64.98.&nbsp;'],
                                ['when' => 'closer_to == 24', 'text' => 'Mareto Plage Publique in Moorea, French Polynesia, with a price index of $64.43.&nbsp;'],
                                ['when' => 'closer_to == 25', 'text' => 'Mission Beach in California, United States, with a price index of $64.03.&nbsp;'],
                                ['when' => 'closer_to == 26', 'text' => 'La Plage de Maui in Tahiti, French Polynesia, with a price index of $63.04.&nbsp;'],
                                ['when' => 'closer_to == 27', 'text' => 'Åkrasanden in Karmøy, Norway, with a price index of $62.71.&nbsp;'],
                                ['when' => 'closer_to == 28', 'text' => 'La Concha Beach Donostia in San Sebastián, Basque Region, Spain, with a price index of $62.48.&nbsp;'],
                                ['when' => 'closer_to == 29', 'text' => 'Coronado Beach in California, United States, with a price index of $62.33.&nbsp;'],
                                ['when' => 'closer_to == 30', 'text' => 'Platja Empuriabrava in Costa Brava, Catalonia, Spain, with a price index of $62.06.&nbsp;'],
                                ['when' => 'closer_to == 31', 'text' => 'Vlieland in Friesland, Netherlands, with a price index of $62.02.&nbsp;'],
                                ['when' => 'closer_to == 32', 'text' => 'Mullins Beach in Mullins, Barbados, with a price index of $62.01.&nbsp;'],
                                ['when' => 'closer_to == 33', 'text' => 'Venice Beach in Los Angeles, United States, with a price index of $61.98.&nbsp;'],
                                ['when' => 'closer_to == 34', 'text' => 'Mjellestranden in Bodø, Norway, with a price index of $61.54.&nbsp;'],
                                ['when' => 'closer_to == 35', 'text' => 'Lannio in Salerno, Italy, with a price index of $60.86.&nbsp;'],
                                ['when' => 'closer_to == 36', 'text' => 'Côte des Basques in Biarritz, France, with a price index of $60.59.&nbsp;'],
                                ['when' => 'closer_to == 37', 'text' => 'Pereybere Beach in Grand Baie, Mauritius, with a price index of $60.31.&nbsp;'],
                                ['when' => 'closer_to == 38', 'text' => 'Hamresanden in Kristiansand, Norway, with a price index of $60.24.&nbsp;'],
                                ['when' => 'closer_to == 39', 'text' => 'Gulf Shores in Alabama, United States, with a price index of $60.11.&nbsp;'],
                                ['when' => 'closer_to == 40', 'text' => 'Plage Saint-Clair in Cote d’Azur, France, with a price index of $59.79.&nbsp;'],
                                ['when' => 'closer_to == 41', 'text' => 'Ribersborg in Malmö, Sweden, with a price index of $59.38.&nbsp;'],
                                ['when' => 'closer_to == 42', 'text' => 'Maria Pia in Sardinia, Italy, with a price index of $59.28.&nbsp;'],
                                ['when' => 'closer_to == 43', 'text' => 'Dueodde Beach in Bornholm, Denmark, with a price index of $59.20.&nbsp;'],
                                ['when' => 'closer_to == 44', 'text' => 'Bloemendaal aan Zee in North Holland, Netherlands, with a price index of $59.06.&nbsp;'],
                                ['when' => 'closer_to == 45', 'text' => 'Anse Soleil Beach in Mahé, Seychelles, with a price index of $58.86.&nbsp;'],
                                ['when' => 'closer_to == 46', 'text' => 'Palm Cove in Cairns, Queensland, Australia, with a price index of $58.84.&nbsp;'],
                                ['when' => 'closer_to == 47', 'text' => 'Böda in Öland, Sweden, with a price index of $58.38.&nbsp;'],
                                ['when' => 'closer_to == 48', 'text' => 'El Cotillo Beach in Fuerteventura, Canary Islands, Spain, with a price index of $58.35.&nbsp;'],
                                ['when' => 'closer_to == 49', 'text' => 'Anse Georgette in Praslin, Seychelles, with a price index of $58.34.&nbsp;'],
                                ['when' => 'closer_to == 50', 'text' => 'Noordwijk in South Holland, Netherlands, with a price index of $58.28.&nbsp;'],
                                ['when' => 'closer_to == 51', 'text' => 'Sudersand in Fårö, Sweden, with a price index of $58.27.&nbsp;'],
                                ['when' => 'closer_to == 52', 'text' => 'Båstad strand in Båstad, Sweden, with a price index of $58.26.&nbsp;'],
                                ['when' => 'closer_to == 53', 'text' => 'Mughsayl in Salalah, Oman, with a price index of $58.23.&nbsp;'],
                                ['when' => 'closer_to == 54', 'text' => 'Blokhus Beach in Jammerbugt, Denmark, with a price index of $57.81.&nbsp;'],
                                ['when' => 'closer_to == 55', 'text' => 'Cala Millor in Mallorca, Balearic Islands, Spain, with a price index of $57.65.&nbsp;'],
                                ['when' => 'closer_to == 56', 'text' => 'Plage de Santa Giulia in Corse-du-Sud, France, with a price index of $57.48.&nbsp;'],
                                ['when' => 'closer_to == 57', 'text' => 'Enterprise (Miami) Beach in Oistins, Barbados, with a price index of $57.42.&nbsp;'],
                                ['when' => 'closer_to == 58', 'text' => 'Smathers Beach in Florida, United States, with a price index of $57.33.&nbsp;'],
                                ['when' => 'closer_to == 59', 'text' => 'Beau Vallon in Mahe, Seychelles, with a price index of $57.18.&nbsp;'],
                                ['when' => 'closer_to == 60', 'text' => 'Velavaru Island in Velavaru Island, Maldives, with a price index of $57.13.&nbsp;'],
                                ['when' => 'closer_to == 61', 'text' => 'Grand Anse Beach in Grenada, Grenada, with a price index of $57.03.&nbsp;'],
                                ['when' => 'closer_to == 62', 'text' => 'Scalea in Calabria, Italy, with a price index of $56.90.&nbsp;'],
                                ['when' => 'closer_to == 63', 'text' => 'Ålö storsand in Stockholm Archipelago, Sweden, with a price index of $56.89.&nbsp;'],
                                ['when' => 'closer_to == 64', 'text' => 'Bergen aan Zee in North Holland, Netherlands, with a price index of $56.82.&nbsp;'],
                                ['when' => 'closer_to == 65', 'text' => 'Äleklinta in Öland, Sweden, with a price index of $56.69.&nbsp;'],
                                ['when' => 'closer_to == 66', 'text' => 'Rømø Beach in Tønder, Denmark, with a price index of $56.49.&nbsp;'],
                                ['when' => 'closer_to == 67', 'text' => 'Crucicchia in Sicily, Italy, with a price index of $56.44.&nbsp;'],
                                ['when' => 'closer_to == 68', 'text' => 'Egmond aan Zee in North Holland, Netherlands, with a price index of $56.42.&nbsp;'],
                                ['when' => 'closer_to == 69', 'text' => 'Playa de Muro in Mallorca, Balearic Islands, Spain, with a price index of $56.29.&nbsp;'],
                                ['when' => 'closer_to == 70', 'text' => 'Poe Beach in South Province, New Caledonia, with a price index of $56.28.&nbsp;'],
                                ['when' => 'closer_to == 71', 'text' => 'Skrea strand in Falkenberg, Sweden, with a price index of $56.22.&nbsp;'],
                                ['when' => 'closer_to == 72', 'text' => 'Pineta di Maria Pia in Sardinia, Italy, with a price index of $56.04.&nbsp;'],
                                ['when' => 'closer_to == 73', 'text' => 'Nishihama Beach in Okinawa, Japan, with a price index of $55.99.&nbsp;'],
                                ['when' => 'closer_to == 74', 'text' => 'Læsø in Læsø, Denmark, with a price index of $55.97.&nbsp;'],
                                ['when' => 'closer_to == 75', 'text' => 'Tylösand in Halmstad, Sweden, with a price index of $55.92.&nbsp;'],
                                ['when' => 'closer_to == 76', 'text' => 'Katwijk aan zee in South Holland, Netherlands, with a price index of $55.91.&nbsp;'],
                                ['when' => 'closer_to == 77', 'text' => 'Cala Seregola in Elba, Italy, with a price index of $55.90.&nbsp;'],
                                ['when' => 'closer_to == 78', 'text' => 'Texel in North Holland, Netherlands, with a price index of $55.86.&nbsp;'],
                                ['when' => 'closer_to == 79', 'text' => 'West Palm Beach in Florida, United States, with a price index of $55.77.&nbsp;'],
                                ['when' => 'closer_to == 80', 'text' => 'Haeundae Beach in Busan, South Korea, with a price index of $55.53.&nbsp;'],
                                ['when' => 'closer_to == 81', 'text' => 'Kijkduin in South Holland, Netherlands, with a price index of $55.47.&nbsp;'],
                                ['when' => 'closer_to == 82', 'text' => 'Marielyst Beach in Væggerløse, Denmark, with a price index of $55.46.&nbsp;'],
                                ['when' => 'closer_to == 83', 'text' => 'Blåvand Beach in Blåvand, Denmark, with a price index of $55.36.&nbsp;'],
                                ['when' => 'closer_to == 84', 'text' => 'Norsta Auren in Fårö, Sweden, with a price index of $55.34.&nbsp;'],
                                ['when' => 'closer_to == 85', 'text' => 'Skanör in Falsterbonäset, Sweden, with a price index of $55.08.&nbsp;'],
                                ['when' => 'closer_to == 86', 'text' => 'Varamon in Motala, Sweden, with a price index of $55.04.&nbsp;'],
                                ['when' => 'closer_to == 87', 'text' => 'Sandhammaren in Ystad, Sweden, with a price index of $54.49.&nbsp;'],
                                ['when' => 'closer_to == 88', 'text' => 'Costa Caleta in Fuerteventura, Canary Islands, Spain, with a price index of $54.42.&nbsp;'],
                                ['when' => 'closer_to == 89', 'text' => 'Zoutelande in Zeeland, Netherlands, with a price index of $54.07.&nbsp;'],
                                ['when' => 'closer_to == 90', 'text' => 'Castricum in North Holland, Netherlands, with a price index of $54.06.&nbsp;'],
                                ['when' => 'closer_to == 91', 'text' => 'Naples Beaches in Florida, United States, with a price index of $53.98.&nbsp;'],
                                ['when' => 'closer_to == 92', 'text' => 'Tofta in Gotland, Sweden, with a price index of $53.71.&nbsp;'],
                                ['when' => 'closer_to == 93', 'text' => 'Praia Grande Lagoa in Algarve, Portugal, with a price index of $53.56.&nbsp;'],
                                ['when' => 'closer_to == 94', 'text' => 'Scheveningen in South Holland, Netherlands, with a price index of $53.52.&nbsp;'],
                                ['when' => 'closer_to == 95', 'text' => 'Puncho Beach in Amsheet, Lebanon, with a price index of $53.50.&nbsp;'],
                                ['when' => 'closer_to == 96', 'text' => 'Kerteminde Nordstranden in Kerteminde, Denmark, with a price index of $53.37.&nbsp;'],
                                ['when' => 'closer_to == 97', 'text' => 'Terschelling in Friesland, Netherlands, with a price index of $52.81.&nbsp;'],
                                ['when' => 'closer_to == 98', 'text' => 'Yyteri Beach in Pori, Finland, with a price index of $52.66.&nbsp;'],
                                ['when' => 'closer_to == 99', 'text' => 'Løkken Beach in Jutland, Denmark, with a price index of $52.65.&nbsp;'],
                                ['when' => 'closer_to == 100', 'text' => 'Wijk aan Zee in North Holland, Netherlands, with a price index of $52.14.&nbsp;'],
                                ['when' => 'closer_to == 101', 'text' => 'Spiaggia Rossa in Sardinia, Italy, with a price index of $52.01.&nbsp;'],
                                ['when' => 'closer_to == 102', 'text' => 'Playa del Carmen in Quintana Roo, Mexico, with a price index of $51.98.&nbsp;'],
                                ['when' => 'closer_to == 103', 'text' => 'Hornbæk Beach in Hornbæk, Denmark, with a price index of $51.91.&nbsp;'],
                                ['when' => 'closer_to == 104', 'text' => 'Half Moon Caye in Lighthouse Reef Atoll, Belize, with a price index of $51.85.&nbsp;'],
                                ['when' => 'closer_to == 105', 'text' => 'Vlissingen in Zeeland, Netherlands, with a price index of $51.59.&nbsp;'],
                                ['when' => 'closer_to == 106', 'text' => 'El Bajondillo in Costa del Sol, Andalusia, Spain, with a price index of $51.40.&nbsp;'],
                                ['when' => 'closer_to == 107', 'text' => 'Nallikari in Oulu, Finland, with a price index of $51.38.&nbsp;'],
                                ['when' => 'closer_to == 108', 'text' => 'Palombaggia Beach in Corsica, France, with a price index of $50.95.&nbsp;'],
                                ['when' => 'closer_to == 109', 'text' => 'Fort Lauderdale Beach in Florida, United States, with a price index of $50.85.&nbsp;'],
                                ['when' => 'closer_to == 110', 'text' => 'Tuomiojärven ranta in Jyväskylä, Finland, with a price index of $50.69.&nbsp;'],
                                ['when' => 'closer_to == 111', 'text' => 'Norrvikarna in Nordkoster, Sweden, with a price index of $50.66.&nbsp;'],
                                ['when' => 'closer_to == 112', 'text' => 'Amager Strandpark in Hovedstaden, Denmark, with a price index of $50.54.&nbsp;'],
                                ['when' => 'closer_to == 113', 'text' => 'Cadzand in Zeeland, Netherlands, with a price index of $50.47.&nbsp;'],
                                ['when' => 'closer_to == 114', 'text' => 'Trunk Bay in St John, United States Virgin Islands, with a price index of $50.45.&nbsp;'],
                                ['when' => 'closer_to == 115', 'text' => 'Playa de ses Illetes in Formentera, Balearic Islands, Spain, with a price index of $50.41.&nbsp;'],
                                ['when' => 'closer_to == 116', 'text' => 'Muchangpo Beach in Boryeong, South Korea, with a price index of $50.37.&nbsp;'],
                                ['when' => 'closer_to == 117', 'text' => 'Pyynikin uimaranta in Tampere, Finland, with a price index of $50.12.&nbsp;'],
                                ['when' => 'closer_to == 118', 'text' => 'Pipa Beach in Rio Grande do Norte, Brazil, with a price index of $49.57.&nbsp;'],
                                ['when' => 'closer_to == 119', 'text' => 'Yasawa Island in Yasawa Island, Fiji, with a price index of $49.56.&nbsp;'],
                                ['when' => 'closer_to == 120', 'text' => 'Copacabana in Rio De Janeiro, Brazil, with a price index of $49.55.&nbsp;'],
                                ['when' => 'closer_to == 121', 'text' => 'Zandvoort aan Zee in North Holland, Netherlands, with a price index of $49.54.&nbsp;'],
                                ['when' => 'closer_to == 122', 'text' => 'Lomma Beach in Lomma, Sweden, with a price index of $49.50.&nbsp;'],
                                ['when' => 'closer_to == 123', 'text' => 'Maspalomas in Gran Canaria, Canary Islands, Spain, with a price index of $49.43.&nbsp;'],
                                ['when' => 'closer_to == 124', 'text' => 'Whitehaven Beach in Whitsunday Islands, Queensland, Australia, with a price index of $49.41.&nbsp;'],
                                ['when' => 'closer_to == 125', 'text' => 'Costa Teguise in Lanzarote, Canary Islands, Spain, with a price index of $49.11.&nbsp;'],
                                ['when' => 'closer_to == 126', 'text' => 'Zlatni Rat in Brac Island, Croatia, with a price index of $49.06.&nbsp;'],
                                ['when' => 'closer_to == 127', 'text' => 'Kokrobite Beach in Greater Accra, Ghana, with a price index of $48.50.&nbsp;'],
                                ['when' => 'closer_to == 128', 'text' => 'Mindil Beach in Darwin, Northern Territory, Australia, with a price index of $48.46.&nbsp;'],
                                ['when' => 'closer_to == 129', 'text' => 'Hietaniemi in Helsinki, Finland, with a price index of $48.27.&nbsp;'],
                                ['when' => 'closer_to == 130', 'text' => 'Søndervig Beach in Midtjylland, Denmark, with a price index of $48.25.&nbsp;'],
                                ['when' => 'closer_to == 131', 'text' => 'Renesse in Zeeland, Netherlands, with a price index of $48.14.&nbsp;'],
                                ['when' => 'closer_to == 132', 'text' => 'Muri Beach in Rarotonga, Cook Islands, with a price index of $47.68.&nbsp;'],
                                ['when' => 'closer_to == 133', 'text' => 'Wasaga Beach in Ontario, Canada, with a price index of $47.56.&nbsp;'],
                                ['when' => 'closer_to == 134', 'text' => '75 Mile Beach in Fraser Island, Queensland, Australia, with a price index of $47.03.&nbsp;'],
                                ['when' => 'closer_to == 135', 'text' => 'Bondi Beach in Sydney, New South Wales, Australia, with a price index of $47.01.&nbsp;'],
                                ['when' => 'closer_to == 136', 'text' => 'Long Beach in Kadavu, Fiji, with a price index of $46.95.&nbsp;'],
                                ['when' => 'closer_to == 137', 'text' => 'Mandalay Beach in Walpole, Western Australia, Australia, with a price index of $46.66.&nbsp;'],
                                ['when' => 'closer_to == 138', 'text' => 'Pite havsbad in Piteå, Sweden, with a price index of $46.62.&nbsp;'],
                                ['when' => 'closer_to == 139', 'text' => 'Lopes Mendes in Ilha Grande, Brazil, with a price index of $46.49.&nbsp;'],
                                ['when' => 'closer_to == 140', 'text' => 'Blinky Beach in Lord Howe Island, New South Wales, Australia, with a price index of $46.44.&nbsp;'],
                                ['when' => 'closer_to == 141', 'text' => 'Point Dume in California, United States, with a price index of $46.13.&nbsp;'],
                                ['when' => 'closer_to == 142', 'text' => 'Male Beach in Male, Maldives, with a price index of $45.91.&nbsp;'],
                                ['when' => 'closer_to == 143', 'text' => 'Mukkulan uimaranta in Lahti, Finland, with a price index of $45.72.&nbsp;'],
                                ['when' => 'closer_to == 144', 'text' => 'Kailua in Hawaii, United States, with a price index of $45.48.&nbsp;'],
                                ['when' => 'closer_to == 145', 'text' => 'Hahei in Waikato, New Zealand, with a price index of $45.46.&nbsp;'],
                                ['when' => 'closer_to == 146', 'text' => 'The Basin in Rottnest Island, Western Australia, Australia, with a price index of $45.30.&nbsp;'],
                                ['when' => 'closer_to == 147', 'text' => 'Domburg in Zeeland, Netherlands, with a price index of $45.10.&nbsp;'],
                                ['when' => 'closer_to == 148', 'text' => 'Karekare in Karekare, New Zealand, with a price index of $45.09.&nbsp;'],
                                ['when' => 'closer_to == 149', 'text' => 'Blankenberge in West Flanders, Belgium, with a price index of $44.72.&nbsp;'],
                                ['when' => 'closer_to == 150', 'text' => 'Amrum in Schleswig-Holstein, Germany, with a price index of $44.64.&nbsp;'],
                                ['when' => 'closer_to == 151', 'text' => 'Orewa in Auckland, New Zealand, with a price index of $44.56.&nbsp;'],
                                ['when' => 'closer_to == 152', 'text' => 'Väinölänniemen uimaranta in Kuopio, Finland, with a price index of $44.54.&nbsp;'],
                                ['when' => 'closer_to == 153', 'text' => 'Itamambuca in Ubatuba, Brazil, with a price index of $44.43.&nbsp;'],
                                ['when' => 'closer_to == 154', 'text' => 'Praia da Roche in Portimao, Algarve, Portugal, with a price index of $44.42.&nbsp;'],
                                ['when' => 'closer_to == 155', 'text' => 'Knokke in West Flanders, Belgium, with a price index of $44.30.&nbsp;'],
                                ['when' => 'closer_to == 156', 'text' => 'Natadola Bay in Natadola, Fiji, with a price index of $44.16.&nbsp;'],
                                ['when' => 'closer_to == 157', 'text' => 'Cala Salada in Ibiza, Balearic Islands, Spain, with a price index of $44.09.&nbsp;'],
                                ['when' => 'closer_to == 158', 'text' => 'Titikaveka Beach in Rarotonga, Cook Islands, with a price index of $44.06.&nbsp;'],
                                ['when' => 'closer_to == 159', 'text' => 'North Kaafu Atoll in Kaashidhoo, Maldives, with a price index of $44.05.&nbsp;'],
                                ['when' => 'closer_to == 160', 'text' => 'Ruissalo in Turku, Finland, with a price index of $44.04.&nbsp;'],
                                ['when' => 'closer_to == 161', 'text' => 'Trancoso in Porto Seguro, Brazil, with a price index of $43.82.&nbsp;'],
                                ['when' => 'closer_to == 162', 'text' => 'Piha in Auckland, New Zealand, with a price index of $43.81.&nbsp;'],
                                ['when' => 'closer_to == 163', 'text' => 'Sandy Neck Beach in Massachusetts, United States, with a price index of $43.79.&nbsp;'],
                                ['when' => 'closer_to == 164', 'text' => 'Schiermonnikoog in Friesland, Netherlands, with a price index of $43.78.&nbsp;'],
                                ['when' => 'closer_to == 165', 'text' => 'Taperapua Beach in Porto Seguro, Brazil, with a price index of $43.72.&nbsp;'],
                                ['when' => 'closer_to == 166', 'text' => 'Gibbes Beach in Gibbes, Barbados, with a price index of $43.57.&nbsp;'],
                                ['when' => 'closer_to == 167', 'text' => 'Port Grimaud in Cote d’Azur, France, with a price index of $43.36.&nbsp;'],
                                ['when' => 'closer_to == 168', 'text' => 'Grand Beach in Manitoba, Canada, with a price index of $42.99.&nbsp;'],
                                ['when' => 'closer_to == 169', 'text' => 'Playa de las Catedrales in Ribadeo, Lugo, Spain, with a price index of $42.91.&nbsp;'],
                                ['when' => 'closer_to == 170', 'text' => 'Brady\'s Beach in British Columbia, Canada, with a price index of $42.52.&nbsp;'],
                                ['when' => 'closer_to == 171', 'text' => 'Camber Sands Beach in East Sussex, United Kingdom, with a price index of $42.04.&nbsp;'],
                                ['when' => 'closer_to == 172', 'text' => 'Playa Brava in Punta del Este, Uruguay, with a price index of $42.03.&nbsp;'],
                                ['when' => 'closer_to == 173', 'text' => 'Elmina Beach in Elmina, Ghana, with a price index of $41.67.&nbsp;'],
                                ['when' => 'closer_to == 174', 'text' => 'Bray Dunes in Hauts-de-France, France, with a price index of $41.50.&nbsp;'],
                                ['when' => 'closer_to == 175', 'text' => 'Silver Beach in Beihai, China, with a price index of $41.38.&nbsp;'],
                                ['when' => 'closer_to == 176', 'text' => 'Priory Bay Beach in Isle of Wight, United Kingdom, with a price index of $41.35.&nbsp;'],
                                ['when' => 'closer_to == 177', 'text' => 'Watergate Bay in Newquay, United Kingdom, with a price index of $41.14.&nbsp;'],
                                ['when' => 'closer_to == 178', 'text' => 'Pentle Bay in Isles of Scilly, United Kingdom, with a price index of $40.97.&nbsp;'],
                                ['when' => 'closer_to == 179', 'text' => 'Portstewart Strand in Northern Ireland, United Kingdom, with a price index of $40.95.&nbsp;'],
                                ['when' => 'closer_to == 180', 'text' => 'Hobie Beach in Port Elizabeth, South Africa, with a price index of $40.81.&nbsp;'],
                                ['when' => 'closer_to == 181', 'text' => 'Petit Anse in Levera, Grenada, with a price index of $40.80.&nbsp;'],
                                ['when' => 'closer_to == 182', 'text' => 'Los Cancajos in La Palma, Canary Islands, Spain, with a price index of $40.78.&nbsp;'],
                                ['when' => 'closer_to == 183', 'text' => 'Étretat in Seine-Maritime, France, with a price index of $40.60.&nbsp;'],
                                ['when' => 'closer_to == 184', 'text' => 'IJmuiden in North Holland, Netherlands, with a price index of $40.50.&nbsp;'],
                                ['when' => 'closer_to == 185', 'text' => 'Port Sudan in Red Sea State, Sudan, with a price index of $40.44.&nbsp;'],
                                ['when' => 'closer_to == 186', 'text' => 'Parlee Beach in New Brunswick, Canada, with a price index of $40.43.&nbsp;'],
                                ['when' => 'closer_to == 187', 'text' => 'Ameland in Friesland, Netherlands, with a price index of $40.06.&nbsp;'],
                                ['when' => 'closer_to == 188', 'text' => 'Praia da Marinha in Carvoeiro, Portugal, with a price index of $39.95.&nbsp;'],
                                ['when' => 'closer_to == 189', 'text' => 'Al Hoceima in Al Hoceima, Morocco, with a price index of $39.47.&nbsp;'],
                                ['when' => 'closer_to == 190', 'text' => 'Plage Notre Dame in Cote d’Azur, France, with a price index of $39.19.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Your beach&nbsp;'],
                                ['when' => 'Total_Price == 15.65', 'text' => 'costs exactly the same as&nbsp;'],
                                ['when' => 'Total_Price > 15.65', 'text' => 'is {{cua.formattedValue}} times more expensive than&nbsp;'],
                                ['when' => 'Total_Price < 15.65', 'text' => 'is {{cua.formattedValue}} times cheaper than&nbsp;'],
                                ['when' => null, 'text' => 'Cua Dai Beach in Hoi An, Vietnam - the cheapest beach in the world. Your beach&nbsp;'],
                                ['when' => 'Total_Price == 91.5', 'text' => 'costs exactly the same as&nbsp;'],
                                ['when' => 'Total_Price > 91.5', 'text' => 'is {{anse.formattedValue}} times more expensive than&nbsp;'],
                                ['when' => 'Total_Price < 91.5', 'text' => 'is {{anse.formattedValue}} times cheaper than&nbsp;'],
                                ['when' => null, 'text' => <<<'TXT'
                                Anse Vata in Noumea, New Caledonia - the most expensive beach in the world. Your beach would be placed at number {{rank.value}} position out of 327 beaches ranked by TravelBird.
                                TXT],
                                ['when' => 'closer_to < 328', 'text' => 'In terms of cost, your beach resembles&nbsp;'],
                                ['when' => 'closer_to == 328', 'text' => 'In terms of cost, your beach is below&nbsp;'],
                                ['when' => 'closer_to == 191', 'text' => 'Navagio in Zakynthos, Greece, with a price index of $39.07.&nbsp;'],
                                ['when' => 'closer_to == 192', 'text' => 'Tamarindo Beach in Guanacaste, Costa Rica, with a price index of $39.05.&nbsp;'],
                                ['when' => 'closer_to == 193', 'text' => 'Essaouira in Essaouira, Morocco, with a price index of $39.02.&nbsp;'],
                                ['when' => 'closer_to == 194', 'text' => 'El Golfo in Lanzarote, Canary Islands, Spain, with a price index of $38.79.&nbsp;'],
                                ['when' => 'closer_to == 195', 'text' => 'Binz in Mecklenburg Vorpommern, Germany, with a price index of $38.74.&nbsp;'],
                                ['when' => 'closer_to == 196', 'text' => 'Playa Maderas in Rivas, Nicaragua, with a price index of $38.58.&nbsp;'],
                                ['when' => 'closer_to == 197', 'text' => 'Uvongo Beach in Hibiscus Coast, South Africa, with a price index of $38.53.&nbsp;'],
                                ['when' => 'closer_to == 198', 'text' => 'Port St Johns in Eastern Cape, South Africa, with a price index of $38.50.&nbsp;'],
                                ['when' => 'closer_to == 199', 'text' => 'Valle Gran Rey in La Gomera, Canary Islands, Spain, with a price index of $38.26.&nbsp;'],
                                ['when' => 'closer_to == 200', 'text' => 'Barafundle Bay in Wales, United Kingdom, with a price index of $38.25.&nbsp;'],
                                ['when' => 'closer_to == 201', 'text' => 'West Bay Beach in Roatan, Honduras, with a price index of $38.24.&nbsp;'],
                                ['when' => 'closer_to == 202', 'text' => 'San Juan Del Sur in Rivas, Nicaragua, with a price index of $38.02.&nbsp;'],
                                ['when' => 'closer_to == 203', 'text' => 'Ballito in KwaDukuza, South Africa, with a price index of $37.79.&nbsp;'],
                                ['when' => 'closer_to == 204', 'text' => 'Punta Carola in San Cristobal, Ecuador, with a price index of $37.75.&nbsp;'],
                                ['when' => 'closer_to == 205', 'text' => 'Weiße Düne in Lower Saxony, Germany, with a price index of $37.74.&nbsp;'],
                                ['when' => 'closer_to == 206', 'text' => 'De Haan in West Flanders, Belgium, with a price index of $37.73.&nbsp;'],
                                ['when' => 'closer_to == 207', 'text' => 'Grömitz in Schleswig-Holstein, Germany, with a price index of $37.72.&nbsp;'],
                                ['when' => 'closer_to == 208', 'text' => 'Hendaye Beach in Pyrénées-Atlantiques, France, with a price index of $37.66.&nbsp;'],
                                ['when' => 'closer_to == 209', 'text' => 'Plage de Cabourg in Normandy, France, with a price index of $37.53.&nbsp;'],
                                ['when' => 'closer_to == 210', 'text' => 'Puerto Villamil in Isla Isabela, Ecuador, with a price index of $37.23.&nbsp;'],
                                ['when' => 'closer_to == 211', 'text' => 'Hendry\'s Beach in California, United States, with a price index of $36.77.&nbsp;'],
                                ['when' => 'closer_to == 212', 'text' => 'Playa Manuel Antonio in Puntarenas Province, Quepos, Costa Rica, with a price index of $36.52.&nbsp;'],
                                ['when' => 'closer_to == 213', 'text' => 'Walvis Bay in Erongo, Namibia, with a price index of $36.49.&nbsp;'],
                                ['when' => 'closer_to == 214', 'text' => 'Tianya Haijiao in Sanya, China, with a price index of $36.48.&nbsp;'],
                                ['when' => 'closer_to == 215', 'text' => 'Barnes Bay in West End, Anguilla, with a price index of $36.32.&nbsp;'],
                                ['when' => 'closer_to == 216', 'text' => 'Hörnumer Nehrung in Schleswig-Holstein, Germany, with a price index of $36.28.&nbsp;'],
                                ['when' => 'closer_to == 217', 'text' => 'Secret Lagoon Beach in El Nido, Philippines, with a price index of $36.19.&nbsp;'],
                                ['when' => 'closer_to == 218', 'text' => 'Coco Beach in Dar es Salaam, Tanzania, with a price index of $36.14.&nbsp;'],
                                ['when' => 'closer_to == 219', 'text' => 'Le Touquet Beach in Pas-de-Calais, France, with a price index of $36.12.&nbsp;'],
                                ['when' => 'closer_to == 220', 'text' => 'Ostende in West Flanders, Belgium, with a price index of $35.99.&nbsp;'],
                                ['when' => 'closer_to == 221', 'text' => 'Timmendorfer Strand in Schleswig-Holstein, Germany, with a price index of $35.93.&nbsp;'],
                                ['when' => 'closer_to == 222', 'text' => 'Negombo in Negombo, Sri Lanka, with a price index of $35.70.&nbsp;'],
                                ['when' => 'closer_to == 223', 'text' => 'Wuzhizou Island in Sanya, China, with a price index of $35.62.&nbsp;'],
                                ['when' => 'closer_to == 224', 'text' => 'Borkum in Lower Saxony, Germany, with a price index of $35.54.&nbsp;'],
                                ['when' => 'closer_to == 225', 'text' => 'White Beach in Boracay, Philippines, with a price index of $35.50.&nbsp;'],
                                ['when' => 'closer_to == 226', 'text' => 'Killiney Beach in Dún Laoghaire–Rathdown, Ireland, with a price index of $35.06.&nbsp;'],
                                ['when' => 'closer_to == 227', 'text' => 'Warnemünde in Mecklenburg Vorpommern, Germany, with a price index of $34.94.&nbsp;'],
                                ['when' => 'closer_to == 228', 'text' => 'Deauville Beach in Normandy, France, with a price index of $34.56.&nbsp;'],
                                ['when' => 'closer_to == 229', 'text' => 'Yalong Bay in Sanya, China, with a price index of $34.54.&nbsp;'],
                                ['when' => 'closer_to == 230', 'text' => 'Gurteen in Connemara, Ireland, with a price index of $34.46.&nbsp;'],
                                ['when' => 'closer_to == 231', 'text' => 'Nungwi in Zanzibar, Tanzania, with a price index of $34.34.&nbsp;'],
                                ['when' => 'closer_to == 232', 'text' => 'Praia da Manta Rota in Algarve, Portugal, with a price index of $34.26.&nbsp;'],
                                ['when' => 'closer_to == 233', 'text' => 'Büsum in Schleswig-Holstein, Germany, with a price index of $34.21.&nbsp;'],
                                ['when' => 'closer_to == 234', 'text' => 'Cap Skirring in Basse Casamance, Senegal, with a price index of $33.91.&nbsp;'],
                                ['when' => 'closer_to == 235', 'text' => 'Botany Bay in Kent, United Kingdom, with a price index of $33.86.&nbsp;'],
                                ['when' => 'closer_to == 236', 'text' => 'Tulum Beach in Quintana Roo, Mexico, with a price index of $33.85.&nbsp;'],
                                ['when' => 'closer_to == 237', 'text' => 'Paleokastritsa in Corfu, Greece, with a price index of $33.74.&nbsp;'],
                                ['when' => 'closer_to == 238', 'text' => 'St. Peter-Ording in Schleswig-Holstein, Germany, with a price index of $33.62.&nbsp;'],
                                ['when' => 'closer_to == 239', 'text' => 'List in Schleswig-Holstein, Germany, with a price index of $33.43.&nbsp;'],
                                ['when' => 'closer_to == 240', 'text' => 'Elafonisi in Crete, Greece, with a price index of $33.41.&nbsp;'],
                                ['when' => 'closer_to == 241', 'text' => 'Sirena Bay in Protaras, Cyprus, with a price index of $33.36.&nbsp;'],
                                ['when' => 'closer_to == 242', 'text' => 'Gili Meno in Gili Islands, Indonesia, with a price index of $33.24.&nbsp;'],
                                ['when' => 'closer_to == 243', 'text' => 'Bansin in Mecklenburg Vorpommern, Germany, with a price index of $33.16.&nbsp;'],
                                ['when' => 'closer_to == 244', 'text' => 'Yoff in Dakar, Senegal, with a price index of $32.99.&nbsp;'],
                                ['when' => 'closer_to == 245', 'text' => 'Praia de Machico in Madeira, Portugal, with a price index of $32.97.&nbsp;'],
                                ['when' => 'closer_to == 246', 'text' => 'Gili Trawangan in Gili Islands, Indonesia, with a price index of $32.96.&nbsp;'],
                                ['when' => 'closer_to == 247', 'text' => 'Gerakini in Chalkidiki, Greece, with a price index of $32.95.&nbsp;'],
                                ['when' => 'closer_to == 248', 'text' => 'Chitimba Beach in Chitimba, Malawi, with a price index of $32.90.&nbsp;'],
                                ['when' => 'closer_to == 249', 'text' => 'Lazy Beach in Koh Rong Saloem, Cambodia, with a price index of $32.57.&nbsp;'],
                                ['when' => 'closer_to == 250', 'text' => 'Kühlungsborn in Mecklenburg Vorpommern, Germany, with a price index of $32.46.&nbsp;'],
                                ['when' => 'closer_to == 251', 'text' => 'Nissi Beach in Ayia Napa, Cyprus, with a price index of $32.29.&nbsp;'],
                                ['when' => 'closer_to == 252', 'text' => 'Sunrise Beach in Ko Lipe, Thailand, with a price index of $32.24.&nbsp;'],
                                ['when' => 'closer_to == 253', 'text' => 'Coral Bay in Pangkor, Malaysia, with a price index of $32.18.&nbsp;'],
                                ['when' => 'closer_to == 254', 'text' => 'Tramore Beach in Munster, Ireland, with a price index of $32.15.&nbsp;'],
                                ['when' => 'closer_to == 255', 'text' => 'Praia da Marinha in Algarve, Portugal, with a price index of $31.76.&nbsp;'],
                                ['when' => 'closer_to == 256', 'text' => 'Yapak (Puka Shell) Beach in Boracay, Philippines, with a price index of $31.74.&nbsp;'],
                                ['when' => 'closer_to == 257', 'text' => 'Red Beach in Santorini, Greece, with a price index of $31.47.&nbsp;'],
                                ['when' => 'closer_to == 258', 'text' => 'Cornwall Beach in Montego Bay, Jamaica, with a price index of $31.41.&nbsp;'],
                                ['when' => 'closer_to == 259', 'text' => 'Silver Sands in Duncans Bay, Jamaica, with a price index of $31.25.&nbsp;'],
                                ['when' => 'closer_to == 260', 'text' => 'Playa de Akumal in Akumal Bay, Mexico, with a price index of $31.24.&nbsp;'],
                                ['when' => 'closer_to == 261', 'text' => 'Playa Jacó in Jacó, Costa Rica, with a price index of $31.20.&nbsp;'],
                                ['when' => 'closer_to == 262', 'text' => 'Sidi Bou Said in Carthage, Tunisia, with a price index of $31.17.&nbsp;'],
                                ['when' => 'closer_to == 263', 'text' => 'Hammamet in Cap Bon, Tunisia, with a price index of $31.08.&nbsp;'],
                                ['when' => 'closer_to == 264', 'text' => 'Westende in West Flanders, Belgium, with a price index of $31.07.&nbsp;'],
                                ['when' => 'closer_to == 265', 'text' => 'Clifton Beach in Karachi, Pakistan, with a price index of $31.00.&nbsp;'],
                                ['when' => 'closer_to == 266', 'text' => 'Monastir in Sahel, Tunisia, with a price index of $30.93.&nbsp;'],
                                ['when' => 'closer_to == 267', 'text' => 'Rodadero in Santa Marta, Colombia, with a price index of $30.92.&nbsp;'],
                                ['when' => 'closer_to == 268', 'text' => 'De Panne in West Flanders, Belgium, with a price index of $30.88.&nbsp;'],
                                ['when' => 'closer_to == 269', 'text' => 'Khalouf Beach in Al Wusta, Oman, with a price index of $30.81.&nbsp;'],
                                ['when' => 'closer_to == 270', 'text' => 'Eckernförder Bay in Schleswig-Holstein, Germany, with a price index of $30.71.&nbsp;'],
                                ['when' => 'closer_to == 271', 'text' => 'Alona Beach in Panglao Island, Philippines, with a price index of $30.61.&nbsp;'],
                                ['when' => 'closer_to == 272', 'text' => 'Ile Sainte Marie in Toamasina, Madagascar, with a price index of $30.52.&nbsp;'],
                                ['when' => 'closer_to == 273', 'text' => 'Astola Beach in Balochistan, Pakistan, with a price index of $30.40.&nbsp;'],
                                ['when' => 'closer_to == 274', 'text' => 'Plaka Beach in Naxos, Greece, with a price index of $30.32.&nbsp;'],
                                ['when' => 'closer_to == 275', 'text' => 'Ngapali Beach in Rakhine, Myanmar, with a price index of $30.17.&nbsp;'],
                                ['when' => 'closer_to == 276', 'text' => 'El Laguito in Cartagena, Colombia, with a price index of $30.13.&nbsp;'],
                                ['when' => 'closer_to == 277', 'text' => 'Ambataloaka in Nosy Be, Madagascar, with a price index of $29.99.&nbsp;'],
                                ['when' => 'closer_to == 278', 'text' => 'Juara Beach in Tioman Island, Malaysia, with a price index of $29.70.&nbsp;'],
                                ['when' => 'closer_to == 279', 'text' => 'Nai Harn Beach in Rawai, Thailand, with a price index of $29.52.&nbsp;'],
                                ['when' => 'closer_to == 280', 'text' => 'Long Set Beach in Koh Rong, Cambodia, with a price index of $29.30.&nbsp;'],
                                ['when' => 'closer_to == 281', 'text' => 'Tela Bay in Atlántida, Honduras, with a price index of $28.79.&nbsp;'],
                                ['when' => 'closer_to == 282', 'text' => 'Playa de Punta Cana in La Altagracia, Dominican Republic, with a price index of $28.44.&nbsp;'],
                                ['when' => 'closer_to == 283', 'text' => 'Kata Noi in Karon, Thailand, with a price index of $28.31.&nbsp;'],
                                ['when' => 'closer_to == 284', 'text' => 'Naama Bay in Sharm el-Sheikh, Egypt, with a price index of $28.13.&nbsp;'],
                                ['when' => 'closer_to == 285', 'text' => 'Playas Las Terrenas in Las Terrenas, Dominican Republic, with a price index of $28.00.&nbsp;'],
                                ['when' => 'closer_to == 286', 'text' => 'Varadero in Varadero, Cuba, with a price index of $27.87.&nbsp;'],
                                ['when' => 'closer_to == 287', 'text' => 'Gulangyu in Xiamen, China, with a price index of $27.49.&nbsp;'],
                                ['when' => 'closer_to == 288', 'text' => 'Thousand Step Beach in Putuoshan, China, with a price index of $27.20.&nbsp;'],
                                ['when' => 'closer_to == 289', 'text' => 'Thong Nai Pan Noi in Surat Thani, Thailand, with a price index of $26.78.&nbsp;'],
                                ['when' => 'closer_to == 290', 'text' => 'Otres Beach in Sihanoukville, Cambodia, with a price index of $26.75.&nbsp;'],
                                ['when' => 'closer_to == 291', 'text' => 'Patong in Phuket, Thailand, with a price index of $26.73.&nbsp;'],
                                ['when' => 'closer_to == 292', 'text' => 'Chaung Tha in Irrawaddy, Myanmar, with a price index of $26.59.&nbsp;'],
                                ['when' => 'closer_to == 293', 'text' => 'Bačvice in Split, Croatia, with a price index of $26.49.&nbsp;'],
                                ['when' => 'closer_to == 294', 'text' => 'Weststrand, Born in Mecklenburg Vorpommern, Germany, with a price index of $26.36.&nbsp;'],
                                ['when' => 'closer_to == 295', 'text' => 'Playa Boca Chica in Boca Chica, Dominican Republic, with a price index of $26.35.&nbsp;'],
                                ['when' => 'closer_to == 296', 'text' => 'Cayo Coco in Ciego de Ávila, Cuba, with a price index of $26.25.&nbsp;'],
                                ['when' => 'closer_to == 297', 'text' => 'Playa Delfines in Cancun, Mexico, with a price index of $26.12.&nbsp;'],
                                ['when' => 'closer_to == 298', 'text' => 'Nusa Dua in Bali, Indonesia, with a price index of $26.05.&nbsp;'],
                                ['when' => 'closer_to == 299', 'text' => 'Nusa Lembongan in Bali, Indonesia, with a price index of $25.92.&nbsp;'],
                                ['when' => 'closer_to == 300', 'text' => 'Uluwatu in Bali, Indonesia, with a price index of $25.90.&nbsp;'],
                                ['when' => 'closer_to == 301', 'text' => 'Nin in Zadar County, Croatia, with a price index of $25.72.&nbsp;'],
                                ['when' => 'closer_to == 302', 'text' => 'Bouna Beach in Annaba, Algeria, with a price index of $25.55.&nbsp;'],
                                ['when' => 'closer_to == 303', 'text' => 'Guardalavaca Beach in Holguín, Cuba, with a price index of $25.43.&nbsp;'],
                                ['when' => 'closer_to == 304', 'text' => 'Porto Pomos in Pomos, Cyprus, with a price index of $25.19.&nbsp;'],
                                ['when' => 'closer_to == 305', 'text' => 'Steilküste Boltenhagen in Mecklenburg Vorpommern, Germany, with a price index of $25.00.&nbsp;'],
                                ['when' => 'closer_to == 306', 'text' => 'Bahia Balandra in La Paz, Mexico, with a price index of $24.72.&nbsp;'],
                                ['when' => 'closer_to == 307', 'text' => 'Hadjadj Plage in Mostaganem, Algeria, with a price index of $24.42.&nbsp;'],
                                ['when' => 'closer_to == 308', 'text' => 'Dhanushkodi Beach in Pamban Island, India, with a price index of $23.59.&nbsp;'],
                                ['when' => 'closer_to == 309', 'text' => 'Zipolite in Oaxaca, Mexico, with a price index of $23.52.&nbsp;'],
                                ['when' => 'closer_to == 310', 'text' => 'Falkensteiner Ufer in Hamburg, Germany, with a price index of $23.06.&nbsp;'],
                                ['when' => 'closer_to == 311', 'text' => 'Varkala Beach in Kerala, India, with a price index of $23.05.&nbsp;'],
                                ['when' => 'closer_to == 312', 'text' => 'Soma Bay in South Hurghada, Egypt, with a price index of $22.71.&nbsp;'],
                                ['when' => 'closer_to == 313', 'text' => 'Phra Nang Beach in Ao Nang, Thailand, with a price index of $22.64.&nbsp;'],
                                ['when' => 'closer_to == 314', 'text' => 'Sharm El-Naga Bay in Safaga, Egypt, with a price index of $22.57.&nbsp;'],
                                ['when' => 'closer_to == 315', 'text' => 'Railay Beach in Krabi/Ao Nang, Thailand, with a price index of $21.64.&nbsp;'],
                                ['when' => 'closer_to == 316', 'text' => 'Marsa Nayzak in Marsa Alam, Egypt, with a price index of $21.49.&nbsp;'],
                                ['when' => 'closer_to == 317', 'text' => 'Radhanagar Beach in Havelock Island, India, with a price index of $21.43.&nbsp;'],
                                ['when' => 'closer_to == 318', 'text' => 'Agonda Beach in Goa, India, with a price index of $21.06.&nbsp;'],
                                ['when' => 'closer_to == 319', 'text' => 'Cavelossim Beach in Goa, India, with a price index of $21.00.&nbsp;'],
                                ['when' => 'closer_to == 320', 'text' => 'Mandrem Beach in Goa, India, with a price index of $20.73.&nbsp;'],
                                ['when' => 'closer_to == 321', 'text' => 'Sunken City in Sahl Hasheesh, Egypt, with a price index of $20.69.&nbsp;'],
                                ['when' => 'closer_to == 322', 'text' => 'Palolem Beach in Goa, India, with a price index of $20.38.&nbsp;'],
                                ['when' => 'closer_to == 323', 'text' => 'El Gouna in North Hurghada, Egypt, with a price index of $20.16.&nbsp;'],
                                ['when' => 'closer_to == 324', 'text' => 'Benaulim Beach in Goa, India, with a price index of $20.09.&nbsp;'],
                                ['when' => 'closer_to == 325', 'text' => 'Long Beach in Phu Quoc, Vietnam, with a price index of $18.67.&nbsp;'],
                                ['when' => 'closer_to == 326', 'text' => 'City Beach in Nha Trang, Vietnam, with a price index of $16.85.&nbsp;'],
                                ['when' => 'closer_to == 327 or closer_to == 328', 'text' => 'Cua Dai Beach in Hoi An, Vietnam, with a price index of $15.65.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        With a beach price index of $0, your beach is way cheaper than Cua Dai Beach in Hoi An, Vietnam - the cheapest beach in the world, with a price index of $15.65. Your beach would be placed at number 328 position out of 327 beaches ranked by TravelBird.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cua',
                            'label' => 'Cua',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'anse',
                            'label' => 'Anse',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rank',
                            'label' => 'Rank',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'higher',
                            'label' => 'Higher',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lower',
                            'label' => 'Lower',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'closer_to',
                            'label' => 'Closer to',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Total_Price = Sunscreen + Water+ Beer + Icecream + Lunch + Facility_Fee',
            'results' => [
                'Sunscreen' => '-Beer - Facility_Fee - Icecream - Lunch + Total_Price - Water',
                'Water' => '-Beer - Facility_Fee - Icecream - Lunch - Sunscreen + Total_Price',
                'Lunch' => '-Beer - Facility_Fee - Icecream - Sunscreen + Total_Price - Water',
                'Total_Price' => 'Beer + Facility_Fee + Icecream + Lunch + Sunscreen + Water',
                'Beer' => '-Facility_Fee - Icecream - Lunch - Sunscreen + Total_Price - Water',
                'Facility_Fee' => '-Beer - Icecream - Lunch - Sunscreen + Total_Price - Water',
                'Icecream' => '-Beer - Facility_Fee - Lunch - Sunscreen + Total_Price - Water',
            ],
        ],
        [
            'title' => 'cua = if_else(Total_Price > 15.65, ceil((Total_Price / 15.65) * 10) / 10, ceil((15.65 / Total_Price) * 10) / 10)',
            'results' => ['cua' => <<<'TXT'
            (((Total_Price > 313/20) ? (
               (1/10)*ceil((200/313)*Total_Price)
            )
            : (
               (1/10)*ceil((313/2)/Total_Price)
            )))
            TXT],
        ],
        [
            'title' => 'anse = if_else(Total_Price > 91.5, ceil((Total_Price / 91.5) * 10) / 10, ceil((91.5 / Total_Price) * 10) / 10)',
            'results' => ['anse' => <<<'TXT'
            (((Total_Price > 183/2) ? (
               (1/10)*ceil((20/183)*Total_Price)
            )
            : (
               (1/10)*ceil(915/Total_Price)
            )))
            TXT],
        ],
        [
            'title' => 'rank = get_rank(Total_Price)',
            'results' => ['rank' => 'get_rank(Total_Price)'],
        ],
        [
            'title' => 'higher = higher_price(rank) - Total_Price',
            'results' => ['Total_Price' => '-higher + higher_price(get_rank(Total_Price))', 'higher' => '-Total_Price + higher_price(get_rank(Total_Price))'],
        ],
        [
            'title' => 'lower = Total_Price - lower_price(rank)',
            'results' => ['Total_Price' => 'lower + lower_price(get_rank(Total_Price))', 'lower' => 'Total_Price - lower_price(get_rank(Total_Price))'],
        ],
        [
            'title' => 'closer_to = if_else(lower < higher, rank, rank-1)',
            'results' => ['closer_to' => <<<'TXT'
            (((higher > lower) ? (
               get_rank(Total_Price)
            )
            : (
               get_rank(Total_Price) - 1
            )))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_rank",function(Total_Price){if(Total_Price>91.5){return 1}else if(Total_Price>89.19){return 2}else if(Total_Price>81.88){return 3}else if(Total_Price>76.23){return 4}else if(Total_Price>75.52){return 5}else if(Total_Price>74.79){return 6}else if(Total_Price>74.07){return 7}else if(Total_Price>73.89){return 8}else if(Total_Price>72.24){return 9}else if(Total_Price>70.52){return 10}else if(Total_Price>70.37){return 11}else if(Total_Price>70.23){return 12}else if(Total_Price>69.84){return 13}else if(Total_Price>69.44){return 14}else if(Total_Price>69.2){return 15}else if(Total_Price>67.63){return 16}else if(Total_Price>67.51){return 17}else if(Total_Price>67.01){return 18}else if(Total_Price>65.27){return 19}else if(Total_Price>65.18){return 20}else if(Total_Price>65.06){return 21}else if(Total_Price>64.99){return 22}else if(Total_Price>64.98){return 23}else if(Total_Price>64.43){return 24}else if(Total_Price>64.03){return 25}else if(Total_Price>63.04){return 26}else if(Total_Price>62.71){return 27}else if(Total_Price>62.48){return 28}else if(Total_Price>62.33){return 29}else if(Total_Price>62.06){return 30}else if(Total_Price>62.02){return 31}else if(Total_Price>62.01){return 32}else if(Total_Price>61.98){return 33}else if(Total_Price>61.54){return 34}else if(Total_Price>60.86){return 35}else if(Total_Price>60.59){return 36}else if(Total_Price>60.31){return 37}else if(Total_Price>60.24){return 38}else if(Total_Price>60.11){return 39}else if(Total_Price>59.79){return 40}else if(Total_Price>59.38){return 41}else if(Total_Price>59.28){return 42}else if(Total_Price>59.2){return 43}else if(Total_Price>59.06){return 44}else if(Total_Price>58.86){return 45}else if(Total_Price>58.84){return 46}else if(Total_Price>58.38){return 47}else if(Total_Price>58.35){return 48}else if(Total_Price>58.34){return 49}else if(Total_Price>58.28){return 50}else if(Total_Price>58.27){return 51}else if(Total_Price>58.26){return 52}else if(Total_Price>58.23){return 53}else if(Total_Price>57.81){return 54}else if(Total_Price>57.65){return 55}else if(Total_Price>57.48){return 56}else if(Total_Price>57.42){return 57}else if(Total_Price>57.33){return 58}else if(Total_Price>57.18){return 59}else if(Total_Price>57.13){return 60}else if(Total_Price>57.03){return 61}else if(Total_Price>56.9){return 62}else if(Total_Price>56.89){return 63}else if(Total_Price>56.82){return 64}else if(Total_Price>56.69){return 65}else if(Total_Price>56.49){return 66}else if(Total_Price>56.44){return 67}else if(Total_Price>56.42){return 68}else if(Total_Price>56.29){return 69}else if(Total_Price>56.28){return 70}else if(Total_Price>56.22){return 71}else if(Total_Price>56.04){return 72}else if(Total_Price>55.99){return 73}else if(Total_Price>55.97){return 74}else if(Total_Price>55.92){return 75}else if(Total_Price>55.91){return 76}else if(Total_Price>55.9){return 77}else if(Total_Price>55.86){return 78}else if(Total_Price>55.77){return 79}else if(Total_Price>55.53){return 80}else if(Total_Price>55.47){return 81}else if(Total_Price>55.46){return 82}else if(Total_Price>55.36){return 83}else if(Total_Price>55.34){return 84}else if(Total_Price>55.08){return 85}else if(Total_Price>55.04){return 86}else if(Total_Price>54.49){return 87}else if(Total_Price>54.42){return 88}else if(Total_Price>54.07){return 89}else if(Total_Price>54.06){return 90}else if(Total_Price>53.98){return 91}else if(Total_Price>53.71){return 92}else if(Total_Price>53.56){return 93}else if(Total_Price>53.52){return 94}else if(Total_Price>53.5){return 95}else if(Total_Price>53.37){return 96}else if(Total_Price>52.81){return 97}else if(Total_Price>52.66){return 98}else if(Total_Price>52.65){return 99}else if(Total_Price>52.14){return 100}else if(Total_Price>52.01){return 101}else if(Total_Price>51.98){return 102}else if(Total_Price>51.91){return 103}else if(Total_Price>51.85){return 104}else if(Total_Price>51.59){return 105}else if(Total_Price>51.4){return 106}else if(Total_Price>51.38){return 107}else if(Total_Price>50.95){return 108}else if(Total_Price>50.85){return 109}else if(Total_Price>50.69){return 110}else if(Total_Price>50.66){return 111}else if(Total_Price>50.54){return 112}else if(Total_Price>50.47){return 113}else if(Total_Price>50.45){return 114}else if(Total_Price>50.41){return 115}else if(Total_Price>50.37){return 116}else if(Total_Price>50.12){return 117}else if(Total_Price>49.57){return 118}else if(Total_Price>49.56){return 119}else if(Total_Price>49.55){return 120}else if(Total_Price>49.54){return 121}else if(Total_Price>49.5){return 122}else if(Total_Price>49.43){return 123}else if(Total_Price>49.41){return 124}else if(Total_Price>49.11){return 125}else if(Total_Price>49.06){return 126}else if(Total_Price>48.5){return 127}else if(Total_Price>48.46){return 128}else if(Total_Price>48.27){return 129}else if(Total_Price>48.25){return 130}else if(Total_Price>48.14){return 131}else if(Total_Price>47.68){return 132}else if(Total_Price>47.56){return 133}else if(Total_Price>47.03){return 134}else if(Total_Price>47.01){return 135}else if(Total_Price>46.95){return 136}else if(Total_Price>46.66){return 137}else if(Total_Price>46.62){return 138}else if(Total_Price>46.49){return 139}else if(Total_Price>46.44){return 140}else if(Total_Price>46.13){return 141}else if(Total_Price>45.91){return 142}else if(Total_Price>45.72){return 143}else if(Total_Price>45.48){return 144}else if(Total_Price>45.46){return 145}else if(Total_Price>45.3){return 146}else if(Total_Price>45.1){return 147}else if(Total_Price>45.09){return 148}else if(Total_Price>44.72){return 149}else if(Total_Price>44.64){return 150}else if(Total_Price>44.56){return 151}else if(Total_Price>44.54){return 152}else if(Total_Price>44.43){return 153}else if(Total_Price>44.42){return 154}else if(Total_Price>44.3){return 155}else if(Total_Price>44.16){return 156}else if(Total_Price>44.09){return 157}else if(Total_Price>44.06){return 158}else if(Total_Price>44.05){return 159}else if(Total_Price>44.04){return 160}else if(Total_Price>43.82){return 161}else if(Total_Price>43.81){return 162}else if(Total_Price>43.79){return 163}else if(Total_Price>43.78){return 164}else if(Total_Price>43.72){return 165}else if(Total_Price>43.57){return 166}else if(Total_Price>43.36){return 167}else if(Total_Price>42.99){return 168}else if(Total_Price>42.91){return 169}else if(Total_Price>42.52){return 170}else if(Total_Price>42.04){return 171}else if(Total_Price>42.03){return 172}else if(Total_Price>41.67){return 173}else if(Total_Price>41.5){return 174}else if(Total_Price>41.38){return 175}else if(Total_Price>41.35){return 176}else if(Total_Price>41.14){return 177}else if(Total_Price>40.97){return 178}else if(Total_Price>40.95){return 179}else if(Total_Price>40.81){return 180}else if(Total_Price>40.8){return 181}else if(Total_Price>40.78){return 182}else if(Total_Price>40.6){return 183}else if(Total_Price>40.5){return 184}else if(Total_Price>40.44){return 185}else if(Total_Price>40.43){return 186}else if(Total_Price>40.06){return 187}else if(Total_Price>39.95){return 188}else if(Total_Price>39.47){return 189}else if(Total_Price>39.19){return 190}else if(Total_Price>39.07){return 191}else if(Total_Price>39.05){return 192}else if(Total_Price>39.02){return 193}else if(Total_Price>38.79){return 194}else if(Total_Price>38.74){return 195}else if(Total_Price>38.58){return 196}else if(Total_Price>38.53){return 197}else if(Total_Price>38.5){return 198}else if(Total_Price>38.26){return 199}else if(Total_Price>38.25){return 200}else if(Total_Price>38.24){return 201}else if(Total_Price>38.02){return 202}else if(Total_Price>37.79){return 203}else if(Total_Price>37.75){return 204}else if(Total_Price>37.74){return 205}else if(Total_Price>37.73){return 206}else if(Total_Price>37.72){return 207}else if(Total_Price>37.66){return 208}else if(Total_Price>37.53){return 209}else if(Total_Price>37.23){return 210}else if(Total_Price>36.77){return 211}else if(Total_Price>36.52){return 212}else if(Total_Price>36.49){return 213}else if(Total_Price>36.48){return 214}else if(Total_Price>36.32){return 215}else if(Total_Price>36.28){return 216}else if(Total_Price>36.19){return 217}else if(Total_Price>36.14){return 218}else if(Total_Price>36.12){return 219}else if(Total_Price>35.99){return 220}else if(Total_Price>35.93){return 221}else if(Total_Price>35.7){return 222}else if(Total_Price>35.62){return 223}else if(Total_Price>35.54){return 224}else if(Total_Price>35.5){return 225}else if(Total_Price>35.06){return 226}else if(Total_Price>34.94){return 227}else if(Total_Price>34.56){return 228}else if(Total_Price>34.54){return 229}else if(Total_Price>34.46){return 230}else if(Total_Price>34.34){return 231}else if(Total_Price>34.26){return 232}else if(Total_Price>34.21){return 233}else if(Total_Price>33.91){return 234}else if(Total_Price>33.86){return 235}else if(Total_Price>33.85){return 236}else if(Total_Price>33.74){return 237}else if(Total_Price>33.62){return 238}else if(Total_Price>33.43){return 239}else if(Total_Price>33.41){return 240}else if(Total_Price>33.36){return 241}else if(Total_Price>33.24){return 242}else if(Total_Price>33.16){return 243}else if(Total_Price>32.99){return 244}else if(Total_Price>32.97){return 245}else if(Total_Price>32.96){return 246}else if(Total_Price>32.95){return 247}else if(Total_Price>32.9){return 248}else if(Total_Price>32.57){return 249}else if(Total_Price>32.46){return 250}else if(Total_Price>32.29){return 251}else if(Total_Price>32.24){return 252}else if(Total_Price>32.18){return 253}else if(Total_Price>32.15){return 254}else if(Total_Price>31.76){return 255}else if(Total_Price>31.74){return 256}else if(Total_Price>31.47){return 257}else if(Total_Price>31.41){return 258}else if(Total_Price>31.25){return 259}else if(Total_Price>31.24){return 260}else if(Total_Price>31.2){return 261}else if(Total_Price>31.17){return 262}else if(Total_Price>31.08){return 263}else if(Total_Price>31.07){return 264}else if(Total_Price>31){return 265}else if(Total_Price>30.93){return 266}else if(Total_Price>30.92){return 267}else if(Total_Price>30.88){return 268}else if(Total_Price>30.81){return 269}else if(Total_Price>30.71){return 270}else if(Total_Price>30.61){return 271}else if(Total_Price>30.52){return 272}else if(Total_Price>30.4){return 273}else if(Total_Price>30.32){return 274}else if(Total_Price>30.17){return 275}else if(Total_Price>30.13){return 276}else if(Total_Price>29.99){return 277}else if(Total_Price>29.7){return 278}else if(Total_Price>29.52){return 279}else if(Total_Price>29.3){return 280}else if(Total_Price>28.79){return 281}else if(Total_Price>28.44){return 282}else if(Total_Price>28.31){return 283}else if(Total_Price>28.13){return 284}else if(Total_Price>28){return 285}else if(Total_Price>27.87){return 286}else if(Total_Price>27.49){return 287}else if(Total_Price>27.2){return 288}else if(Total_Price>26.78){return 289}else if(Total_Price>26.75){return 290}else if(Total_Price>26.73){return 291}else if(Total_Price>26.59){return 292}else if(Total_Price>26.49){return 293}else if(Total_Price>26.36){return 294}else if(Total_Price>26.35){return 295}else if(Total_Price>26.25){return 296}else if(Total_Price>26.12){return 297}else if(Total_Price>26.05){return 298}else if(Total_Price>25.92){return 299}else if(Total_Price>25.9){return 300}else if(Total_Price>25.72){return 301}else if(Total_Price>25.55){return 302}else if(Total_Price>25.43){return 303}else if(Total_Price>25.19){return 304}else if(Total_Price>25){return 305}else if(Total_Price>24.72){return 306}else if(Total_Price>24.42){return 307}else if(Total_Price>23.59){return 308}else if(Total_Price>23.52){return 309}else if(Total_Price>23.06){return 310}else if(Total_Price>23.05){return 311}else if(Total_Price>22.71){return 312}else if(Total_Price>22.64){return 313}else if(Total_Price>22.57){return 314}else if(Total_Price>21.64){return 315}else if(Total_Price>21.49){return 316}else if(Total_Price>21.43){return 317}else if(Total_Price>21.06){return 318}else if(Total_Price>21){return 319}else if(Total_Price>20.73){return 320}else if(Total_Price>20.69){return 321}else if(Total_Price>20.38){return 322}else if(Total_Price>20.16){return 323}else if(Total_Price>20.09){return 324}else if(Total_Price>18.67){return 325}else if(Total_Price>16.85){return 326}else if(Total_Price>15.65){return 327}else if(Total_Price<=15.65){return 328}});omni.define("higher_price",function(rank){if(rank===1){return 100}else if(rank===2){return 91.5}else if(rank===3){return 89.19}else if(rank===4){return 81.88}else if(rank===5){return 76.23}else if(rank===6){return 75.52}else if(rank===7){return 74.79}else if(rank===8){return 74.07}else if(rank===9){return 73.89}else if(rank===10){return 72.24}else if(rank===11){return 70.52}else if(rank===12){return 70.37}else if(rank===13){return 70.23}else if(rank===14){return 69.84}else if(rank===15){return 69.44}else if(rank===16){return 69.2}else if(rank===17){return 67.63}else if(rank===18){return 67.51}else if(rank===19){return 67.01}else if(rank===20){return 65.27}else if(rank===21){return 65.18}else if(rank===22){return 65.06}else if(rank===23){return 64.99}else if(rank===24){return 64.98}else if(rank===25){return 64.43}else if(rank===26){return 64.03}else if(rank===27){return 63.04}else if(rank===28){return 62.71}else if(rank===29){return 62.48}else if(rank===30){return 62.33}else if(rank===31){return 62.06}else if(rank===32){return 62.02}else if(rank===33){return 62.01}else if(rank===34){return 61.98}else if(rank===35){return 61.54}else if(rank===36){return 60.86}else if(rank===37){return 60.59}else if(rank===38){return 60.31}else if(rank===39){return 60.24}else if(rank===40){return 60.11}else if(rank===41){return 59.79}else if(rank===42){return 59.38}else if(rank===43){return 59.28}else if(rank===44){return 59.2}else if(rank===45){return 59.06}else if(rank===46){return 58.86}else if(rank===47){return 58.84}else if(rank===48){return 58.38}else if(rank===49){return 58.35}else if(rank===50){return 58.34}else if(rank===51){return 58.28}else if(rank===52){return 58.27}else if(rank===53){return 58.26}else if(rank===54){return 58.23}else if(rank===55){return 57.81}else if(rank===56){return 57.65}else if(rank===57){return 57.48}else if(rank===58){return 57.42}else if(rank===59){return 57.33}else if(rank===60){return 57.18}else if(rank===61){return 57.13}else if(rank===62){return 57.03}else if(rank===63){return 56.9}else if(rank===64){return 56.89}else if(rank===65){return 56.82}else if(rank===66){return 56.69}else if(rank===67){return 56.49}else if(rank===68){return 56.44}else if(rank===69){return 56.42}else if(rank===70){return 56.29}else if(rank===71){return 56.28}else if(rank===72){return 56.22}else if(rank===73){return 56.04}else if(rank===74){return 55.99}else if(rank===75){return 55.97}else if(rank===76){return 55.92}else if(rank===77){return 55.91}else if(rank===78){return 55.9}else if(rank===79){return 55.86}else if(rank===80){return 55.77}else if(rank===81){return 55.53}else if(rank===82){return 55.47}else if(rank===83){return 55.46}else if(rank===84){return 55.36}else if(rank===85){return 55.34}else if(rank===86){return 55.08}else if(rank===87){return 55.04}else if(rank===88){return 54.49}else if(rank===89){return 54.42}else if(rank===90){return 54.07}else if(rank===91){return 54.06}else if(rank===92){return 53.98}else if(rank===93){return 53.71}else if(rank===94){return 53.56}else if(rank===95){return 53.52}else if(rank===96){return 53.5}else if(rank===97){return 53.37}else if(rank===98){return 52.81}else if(rank===99){return 52.66}else if(rank===100){return 52.65}else if(rank===101){return 52.14}else if(rank===102){return 52.01}else if(rank===103){return 51.98}else if(rank===104){return 51.91}else if(rank===105){return 51.85}else if(rank===106){return 51.59}else if(rank===107){return 51.4}else if(rank===108){return 51.38}else if(rank===109){return 50.95}else if(rank===110){return 50.85}else if(rank===111){return 50.69}else if(rank===112){return 50.66}else if(rank===113){return 50.54}else if(rank===114){return 50.47}else if(rank===115){return 50.45}else if(rank===116){return 50.41}else if(rank===117){return 50.37}else if(rank===118){return 50.12}else if(rank===119){return 49.57}else if(rank===120){return 49.56}else if(rank===121){return 49.55}else if(rank===122){return 49.54}else if(rank===123){return 49.5}else if(rank===124){return 49.43}else if(rank===125){return 49.41}else if(rank===126){return 49.11}else if(rank===127){return 49.06}else if(rank===128){return 48.5}else if(rank===129){return 48.46}else if(rank===130){return 48.27}else if(rank===131){return 48.25}else if(rank===132){return 48.14}else if(rank===133){return 47.68}else if(rank===134){return 47.56}else if(rank===135){return 47.03}else if(rank===136){return 47.01}else if(rank===137){return 46.95}else if(rank===138){return 46.66}else if(rank===139){return 46.62}else if(rank===140){return 46.49}else if(rank===141){return 46.44}else if(rank===142){return 46.13}else if(rank===143){return 45.91}else if(rank===144){return 45.72}else if(rank===145){return 45.48}else if(rank===146){return 45.46}else if(rank===147){return 45.3}else if(rank===148){return 45.1}else if(rank===149){return 45.09}else if(rank===150){return 44.72}else if(rank===151){return 44.64}else if(rank===152){return 44.56}else if(rank===153){return 44.54}else if(rank===154){return 44.43}else if(rank===155){return 44.42}else if(rank===156){return 44.3}else if(rank===157){return 44.16}else if(rank===158){return 44.09}else if(rank===159){return 44.06}else if(rank===160){return 44.05}else if(rank===161){return 44.04}else if(rank===162){return 43.82}else if(rank===163){return 43.81}else if(rank===164){return 43.79}else if(rank===165){return 43.78}else if(rank===166){return 43.72}else if(rank===167){return 43.57}else if(rank===168){return 43.36}else if(rank===169){return 42.99}else if(rank===170){return 42.91}else if(rank===171){return 42.52}else if(rank===172){return 42.04}else if(rank===173){return 42.03}else if(rank===174){return 41.67}else if(rank===175){return 41.5}else if(rank===176){return 41.38}else if(rank===177){return 41.35}else if(rank===178){return 41.14}else if(rank===179){return 40.97}else if(rank===180){return 40.95}else if(rank===181){return 40.81}else if(rank===182){return 40.8}else if(rank===183){return 40.78}else if(rank===184){return 40.6}else if(rank===185){return 40.5}else if(rank===186){return 40.44}else if(rank===187){return 40.43}else if(rank===188){return 40.06}else if(rank===189){return 39.95}else if(rank===190){return 39.47}else if(rank===191){return 39.19}else if(rank===192){return 39.07}else if(rank===193){return 39.05}else if(rank===194){return 39.02}else if(rank===195){return 38.79}else if(rank===196){return 38.74}else if(rank===197){return 38.58}else if(rank===198){return 38.53}else if(rank===199){return 38.5}else if(rank===200){return 38.26}else if(rank===201){return 38.25}else if(rank===202){return 38.24}else if(rank===203){return 38.02}else if(rank===204){return 37.79}else if(rank===205){return 37.75}else if(rank===206){return 37.74}else if(rank===207){return 37.73}else if(rank===208){return 37.72}else if(rank===209){return 37.66}else if(rank===210){return 37.53}else if(rank===211){return 37.23}else if(rank===212){return 36.77}else if(rank===213){return 36.52}else if(rank===214){return 36.49}else if(rank===215){return 36.48}else if(rank===216){return 36.32}else if(rank===217){return 36.28}else if(rank===218){return 36.19}else if(rank===219){return 36.14}else if(rank===220){return 36.12}else if(rank===221){return 35.99}else if(rank===222){return 35.93}else if(rank===223){return 35.7}else if(rank===224){return 35.62}else if(rank===225){return 35.54}else if(rank===226){return 35.5}else if(rank===227){return 35.06}else if(rank===228){return 34.94}else if(rank===229){return 34.56}else if(rank===230){return 34.54}else if(rank===231){return 34.46}else if(rank===232){return 34.34}else if(rank===233){return 34.26}else if(rank===234){return 34.21}else if(rank===235){return 33.91}else if(rank===236){return 33.86}else if(rank===237){return 33.85}else if(rank===238){return 33.74}else if(rank===239){return 33.62}else if(rank===240){return 33.43}else if(rank===241){return 33.41}else if(rank===242){return 33.36}else if(rank===243){return 33.24}else if(rank===244){return 33.16}else if(rank===245){return 32.99}else if(rank===246){return 32.97}else if(rank===247){return 32.96}else if(rank===248){return 32.95}else if(rank===249){return 32.9}else if(rank===250){return 32.57}else if(rank===251){return 32.46}else if(rank===252){return 32.29}else if(rank===253){return 32.24}else if(rank===254){return 32.18}else if(rank===255){return 32.15}else if(rank===256){return 31.76}else if(rank===257){return 31.74}else if(rank===258){return 31.47}else if(rank===259){return 31.41}else if(rank===260){return 31.25}else if(rank===261){return 31.24}else if(rank===262){return 31.2}else if(rank===263){return 31.17}else if(rank===264){return 31.08}else if(rank===265){return 31.07}else if(rank===266){return 31}else if(rank===267){return 30.93}else if(rank===268){return 30.92}else if(rank===269){return 30.88}else if(rank===270){return 30.81}else if(rank===271){return 30.71}else if(rank===272){return 30.61}else if(rank===273){return 30.52}else if(rank===274){return 30.4}else if(rank===275){return 30.32}else if(rank===276){return 30.17}else if(rank===277){return 30.13}else if(rank===278){return 29.99}else if(rank===279){return 29.7}else if(rank===280){return 29.52}else if(rank===281){return 29.3}else if(rank===282){return 28.79}else if(rank===283){return 28.44}else if(rank===284){return 28.31}else if(rank===285){return 28.13}else if(rank===286){return 28}else if(rank===287){return 27.87}else if(rank===288){return 27.49}else if(rank===289){return 27.2}else if(rank===290){return 26.78}else if(rank===291){return 26.75}else if(rank===292){return 26.73}else if(rank===293){return 26.59}else if(rank===294){return 26.49}else if(rank===295){return 26.36}else if(rank===296){return 26.35}else if(rank===297){return 26.25}else if(rank===298){return 26.12}else if(rank===299){return 26.05}else if(rank===300){return 25.92}else if(rank===301){return 25.9}else if(rank===302){return 25.72}else if(rank===303){return 25.55}else if(rank===304){return 25.43}else if(rank===305){return 25.19}else if(rank===306){return 25}else if(rank===307){return 24.72}else if(rank===308){return 24.42}else if(rank===309){return 23.59}else if(rank===310){return 23.52}else if(rank===311){return 23.06}else if(rank===312){return 23.05}else if(rank===313){return 22.71}else if(rank===314){return 22.64}else if(rank===315){return 22.57}else if(rank===316){return 21.64}else if(rank===317){return 21.49}else if(rank===318){return 21.43}else if(rank===319){return 21.06}else if(rank===320){return 21}else if(rank===321){return 20.73}else if(rank===322){return 20.69}else if(rank===323){return 20.38}else if(rank===324){return 20.16}else if(rank===325){return 20.09}else if(rank===326){return 18.67}else if(rank===327){return 16.85}else if(rank===328){return 15.65}});omni.define("lower_price",function(rank){if(rank===1){return 91.5}else if(rank===2){return 89.19}else if(rank===3){return 81.88}else if(rank===4){return 76.23}else if(rank===5){return 75.52}else if(rank===6){return 74.79}else if(rank===7){return 74.07}else if(rank===8){return 73.89}else if(rank===9){return 72.24}else if(rank===10){return 70.52}else if(rank===11){return 70.37}else if(rank===12){return 70.23}else if(rank===13){return 69.84}else if(rank===14){return 69.44}else if(rank===15){return 69.2}else if(rank===16){return 67.63}else if(rank===17){return 67.51}else if(rank===18){return 67.01}else if(rank===19){return 65.27}else if(rank===20){return 65.18}else if(rank===21){return 65.06}else if(rank===22){return 64.99}else if(rank===23){return 64.98}else if(rank===24){return 64.43}else if(rank===25){return 64.03}else if(rank===26){return 63.04}else if(rank===27){return 62.71}else if(rank===28){return 62.48}else if(rank===29){return 62.33}else if(rank===30){return 62.06}else if(rank===31){return 62.02}else if(rank===32){return 62.01}else if(rank===33){return 61.98}else if(rank===34){return 61.54}else if(rank===35){return 60.86}else if(rank===36){return 60.59}else if(rank===37){return 60.31}else if(rank===38){return 60.24}else if(rank===39){return 60.11}else if(rank===40){return 59.79}else if(rank===41){return 59.38}else if(rank===42){return 59.28}else if(rank===43){return 59.2}else if(rank===44){return 59.06}else if(rank===45){return 58.86}else if(rank===46){return 58.84}else if(rank===47){return 58.38}else if(rank===48){return 58.35}else if(rank===49){return 58.34}else if(rank===50){return 58.28}else if(rank===51){return 58.27}else if(rank===52){return 58.26}else if(rank===53){return 58.23}else if(rank===54){return 57.81}else if(rank===55){return 57.65}else if(rank===56){return 57.48}else if(rank===57){return 57.42}else if(rank===58){return 57.33}else if(rank===59){return 57.18}else if(rank===60){return 57.13}else if(rank===61){return 57.03}else if(rank===62){return 56.9}else if(rank===63){return 56.89}else if(rank===64){return 56.82}else if(rank===65){return 56.69}else if(rank===66){return 56.49}else if(rank===67){return 56.44}else if(rank===68){return 56.42}else if(rank===69){return 56.29}else if(rank===70){return 56.28}else if(rank===71){return 56.22}else if(rank===72){return 56.04}else if(rank===73){return 55.99}else if(rank===74){return 55.97}else if(rank===75){return 55.92}else if(rank===76){return 55.91}else if(rank===77){return 55.9}else if(rank===78){return 55.86}else if(rank===79){return 55.77}else if(rank===80){return 55.53}else if(rank===81){return 55.47}else if(rank===82){return 55.46}else if(rank===83){return 55.36}else if(rank===84){return 55.34}else if(rank===85){return 55.08}else if(rank===86){return 55.04}else if(rank===87){return 54.49}else if(rank===88){return 54.42}else if(rank===89){return 54.07}else if(rank===90){return 54.06}else if(rank===91){return 53.98}else if(rank===92){return 53.71}else if(rank===93){return 53.56}else if(rank===94){return 53.52}else if(rank===95){return 53.5}else if(rank===96){return 53.37}else if(rank===97){return 52.81}else if(rank===98){return 52.66}else if(rank===99){return 52.65}else if(rank===100){return 52.14}else if(rank===101){return 52.01}else if(rank===102){return 51.98}else if(rank===103){return 51.91}else if(rank===104){return 51.85}else if(rank===105){return 51.59}else if(rank===106){return 51.4}else if(rank===107){return 51.38}else if(rank===108){return 50.95}else if(rank===109){return 50.85}else if(rank===110){return 50.69}else if(rank===111){return 50.66}else if(rank===112){return 50.54}else if(rank===113){return 50.47}else if(rank===114){return 50.45}else if(rank===115){return 50.41}else if(rank===116){return 50.37}else if(rank===117){return 50.12}else if(rank===118){return 49.57}else if(rank===119){return 49.56}else if(rank===120){return 49.55}else if(rank===121){return 49.54}else if(rank===122){return 49.5}else if(rank===123){return 49.43}else if(rank===124){return 49.41}else if(rank===125){return 49.11}else if(rank===126){return 49.06}else if(rank===127){return 48.5}else if(rank===128){return 48.46}else if(rank===129){return 48.27}else if(rank===130){return 48.25}else if(rank===131){return 48.14}else if(rank===132){return 47.68}else if(rank===133){return 47.56}else if(rank===134){return 47.03}else if(rank===135){return 47.01}else if(rank===136){return 46.95}else if(rank===137){return 46.66}else if(rank===138){return 46.62}else if(rank===139){return 46.49}else if(rank===140){return 46.44}else if(rank===141){return 46.13}else if(rank===142){return 45.91}else if(rank===143){return 45.72}else if(rank===144){return 45.48}else if(rank===145){return 45.46}else if(rank===146){return 45.3}else if(rank===147){return 45.1}else if(rank===148){return 45.09}else if(rank===149){return 44.72}else if(rank===150){return 44.64}else if(rank===151){return 44.56}else if(rank===152){return 44.54}else if(rank===153){return 44.43}else if(rank===154){return 44.42}else if(rank===155){return 44.3}else if(rank===156){return 44.16}else if(rank===157){return 44.09}else if(rank===158){return 44.06}else if(rank===159){return 44.05}else if(rank===160){return 44.04}else if(rank===161){return 43.82}else if(rank===162){return 43.81}else if(rank===163){return 43.79}else if(rank===164){return 43.78}else if(rank===165){return 43.72}else if(rank===166){return 43.57}else if(rank===167){return 43.36}else if(rank===168){return 42.99}else if(rank===169){return 42.91}else if(rank===170){return 42.52}else if(rank===171){return 42.04}else if(rank===172){return 42.03}else if(rank===173){return 41.67}else if(rank===174){return 41.5}else if(rank===175){return 41.38}else if(rank===176){return 41.35}else if(rank===177){return 41.14}else if(rank===178){return 40.97}else if(rank===179){return 40.95}else if(rank===180){return 40.81}else if(rank===181){return 40.8}else if(rank===182){return 40.78}else if(rank===183){return 40.6}else if(rank===184){return 40.5}else if(rank===185){return 40.44}else if(rank===186){return 40.43}else if(rank===187){return 40.06}else if(rank===188){return 39.95}else if(rank===189){return 39.47}else if(rank===190){return 39.19}else if(rank===191){return 39.07}else if(rank===192){return 39.05}else if(rank===193){return 39.02}else if(rank===194){return 38.79}else if(rank===195){return 38.74}else if(rank===196){return 38.58}else if(rank===197){return 38.53}else if(rank===198){return 38.5}else if(rank===199){return 38.26}else if(rank===200){return 38.25}else if(rank===201){return 38.24}else if(rank===202){return 38.02}else if(rank===203){return 37.79}else if(rank===204){return 37.75}else if(rank===205){return 37.74}else if(rank===206){return 37.73}else if(rank===207){return 37.72}else if(rank===208){return 37.66}else if(rank===209){return 37.53}else if(rank===210){return 37.23}else if(rank===211){return 36.77}else if(rank===212){return 36.52}else if(rank===213){return 36.49}else if(rank===214){return 36.48}else if(rank===215){return 36.32}else if(rank===216){return 36.28}else if(rank===217){return 36.19}else if(rank===218){return 36.14}else if(rank===219){return 36.12}else if(rank===220){return 35.99}else if(rank===221){return 35.93}else if(rank===222){return 35.7}else if(rank===223){return 35.62}else if(rank===224){return 35.54}else if(rank===225){return 35.5}else if(rank===226){return 35.06}else if(rank===227){return 34.94}else if(rank===228){return 34.56}else if(rank===229){return 34.54}else if(rank===230){return 34.46}else if(rank===231){return 34.34}else if(rank===232){return 34.26}else if(rank===233){return 34.21}else if(rank===234){return 33.91}else if(rank===235){return 33.86}else if(rank===236){return 33.85}else if(rank===237){return 33.74}else if(rank===238){return 33.62}else if(rank===239){return 33.43}else if(rank===240){return 33.41}else if(rank===241){return 33.36}else if(rank===242){return 33.24}else if(rank===243){return 33.16}else if(rank===244){return 32.99}else if(rank===245){return 32.97}else if(rank===246){return 32.96}else if(rank===247){return 32.95}else if(rank===248){return 32.9}else if(rank===249){return 32.57}else if(rank===250){return 32.46}else if(rank===251){return 32.29}else if(rank===252){return 32.24}else if(rank===253){return 32.18}else if(rank===254){return 32.15}else if(rank===255){return 31.76}else if(rank===256){return 31.74}else if(rank===257){return 31.47}else if(rank===258){return 31.41}else if(rank===259){return 31.25}else if(rank===260){return 31.24}else if(rank===261){return 31.2}else if(rank===262){return 31.17}else if(rank===263){return 31.08}else if(rank===264){return 31.07}else if(rank===265){return 31}else if(rank===266){return 30.93}else if(rank===267){return 30.92}else if(rank===268){return 30.88}else if(rank===269){return 30.81}else if(rank===270){return 30.71}else if(rank===271){return 30.61}else if(rank===272){return 30.52}else if(rank===273){return 30.4}else if(rank===274){return 30.32}else if(rank===275){return 30.17}else if(rank===276){return 30.13}else if(rank===277){return 29.99}else if(rank===278){return 29.7}else if(rank===279){return 29.52}else if(rank===280){return 29.3}else if(rank===281){return 28.79}else if(rank===282){return 28.44}else if(rank===283){return 28.31}else if(rank===284){return 28.13}else if(rank===285){return 28}else if(rank===286){return 27.87}else if(rank===287){return 27.49}else if(rank===288){return 27.2}else if(rank===289){return 26.78}else if(rank===290){return 26.75}else if(rank===291){return 26.73}else if(rank===292){return 26.59}else if(rank===293){return 26.49}else if(rank===294){return 26.36}else if(rank===295){return 26.35}else if(rank===296){return 26.25}else if(rank===297){return 26.12}else if(rank===298){return 26.05}else if(rank===299){return 25.92}else if(rank===300){return 25.9}else if(rank===301){return 25.72}else if(rank===302){return 25.55}else if(rank===303){return 25.43}else if(rank===304){return 25.19}else if(rank===305){return 25}else if(rank===306){return 24.72}else if(rank===307){return 24.42}else if(rank===308){return 23.59}else if(rank===309){return 23.52}else if(rank===310){return 23.06}else if(rank===311){return 23.05}else if(rank===312){return 22.71}else if(rank===313){return 22.64}else if(rank===314){return 22.57}else if(rank===315){return 21.64}else if(rank===316){return 21.49}else if(rank===317){return 21.43}else if(rank===318){return 21.06}else if(rank===319){return 21}else if(rank===320){return 20.73}else if(rank===321){return 20.69}else if(rank===322){return 20.38}else if(rank===323){return 20.16}else if(rank===324){return 20.09}else if(rank===325){return 18.67}else if(rank===326){return 16.85}else if(rank===327){return 15.65}else if(rank===328){return 0}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'Supply the water, the beer, the ice cream and the lunch and the Beach price index calculator solves for <strong>sunscreen</strong>.',
        'sections' => [
            ['title' => 'How does the Beach price index calculator work?', 'html' => <<<'TXT'
            <p>The Beach price index calculator takes the values in the form, applies the relationship described below and reports <strong>sunscreen</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the water, the beer, the ice cream and the lunch.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Sunscreen</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Water</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Beer</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Ice cream</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Lunch</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Facility fee</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Beach Price Index</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Cua</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Anse</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Rank</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Higher</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Lower</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Beach price index calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Sunscreen</span><span class="formula-eq">=</span><span class="formula-rhs">-beer − facility fee − ice cream − lunch + beach Price Index − water</span></div><div class="formula-row"><span class="formula-lhs">Cua</span><span class="formula-eq">=</span><span class="formula-rhs">(((beach Price Index &gt; 313 ÷ 20)? ( (1 ÷ 10) × rounded up, ((200 ÷ 313) × beach Price Index) ): ( (1 ÷ 10) × rounded up, ((313 ÷ 2) ÷ beach Price Index) )))</span></div><div class="formula-row"><span class="formula-lhs">Anse</span><span class="formula-eq">=</span><span class="formula-rhs">(((beach Price Index &gt; 183 ÷ 2)? ( (1 ÷ 10) × rounded up, ((20 ÷ 183) × beach Price Index) ): ( (1 ÷ 10) × rounded up, (915 ÷ beach Price Index) )))</span></div><div class="formula-row"><span class="formula-lhs">Rank</span><span class="formula-eq">=</span><span class="formula-rhs">(beach Price Index)</span></div><div class="formula-row"><span class="formula-lhs">Beach Price Index</span><span class="formula-eq">=</span><span class="formula-rhs">-higher + ((beach Price Index))</span></div><div class="formula-row"><span class="formula-lhs">Beach Price Index</span><span class="formula-eq">=</span><span class="formula-rhs">lower + ((beach Price Index))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Beach price index calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 4 figures keep coming back — the water, the beer and the ice cream — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Beach price index calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — water for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/quilt-binding">Quilt binding</a>, <a href="/everyday-life/quit-smoking">Quit smoking and save</a> and <a href="/everyday-life/reading-speed">Reading speed</a>.</p>
            TXT],
            ['title' => 'A worked example with these formulas', 'html' => <<<'TXT'
            <p> Enter Sunscreen = 10, Water = 100, Beer = 1000, Ice cream = 10, Lunch = 100 and Facility fee = 1000. The calculator returns <strong>Beach Price Index</strong> = 2220.</p><p>The relationship behind those numbers is <strong>Sunscreen</strong> = <code>-Beer - Facility_Fee - Icecream - Lunch + Total_Price - Water</code>. </p>
            TXT],
            ['title' => 'Using a beach basket to compare prices', 'html' => <<<'TXT'
            <p>The Beach price index adds the listed prices for a small basket of beach-day items—sunscreen, water, beer, ice cream, lunch and a facility fee—then provides comparison outputs for the selected location or dataset. Think of it as a snapshot of the basket defined by this page, not an official cost-of-living measure or a complete survey of every beach. The basket is useful only when the items and prices are comparable across the places you are evaluating.</p>
            <p>Enter prices from the same kind of source and date where possible. A convenience stand beside the sand may charge differently from a supermarket several streets away. A facility fee may apply per person, vehicle or visit, so check the basis before entering it. A lunch price can refer to a different portion or menu item in different places. Write down what each input represents so that a comparison does not look more precise than the underlying data.</p>
            <p>Use one currency throughout. If the page offers a currency selector or unit field, confirm the setting before entering values. For international comparisons, exchange rates and payment-card fees can change the practical amount paid; the calculator may not apply those adjustments unless the form explicitly provides them. Currency conversion on a different date can change a ranking even when local prices have not moved.</p>
            <p>The total is the sum of the selected items, so each input contributes directly. To see which item matters most, change one price at a time while keeping the other basket entries fixed. If you have a total but one item price is unknown, the formula can sometimes be rearranged to solve for it; however, the result is only meaningful if the other entries and the total use the same basket definition.</p>
            <p>Do not read a ranking as a judgment of beach quality, safety, accessibility or value for every traveler. The calculator does not measure water quality, shade, transport, services, crowding or whether an item is needed. One visitor may bring water and lunch from home; another may rent facilities or buy different products. A lower basket total may simply reflect a different market or fee structure.</p>
            <p>For a useful comparison, record the location, visit date, item definition, currency and source for each price. Update the values if you compare another season, because menus and access fees can change. You can also run a personal basket by changing which items you include, but then keep that basket consistent across locations. A price index is only comparable when the things being priced are comparable.</p>
            <p>Use the output as a quick budgeting aid for a specific outing or as a transparent comparison of the selected basket. Before making a trip decision, check current prices and local access information directly with the relevant businesses or authorities. The calculation summarizes the numbers you supplied; it does not independently verify them.</p>
            TXT],
            ['title' => 'Be clear about what each item price covers', 'html' => <<<'TXT'
            <p>Before adding a price, decide whether it is per person, per serving, per bottle or per visit. A facility charge for a family car is not directly comparable with an admission charge per adult unless you define how to allocate it. Likewise, “lunch” can mean a takeaway meal, a sit-down menu or a packed lunch valued at home. The calculator will add the numbers as supplied; it cannot standardize the products or billing units for you.</p><p>If an item is unavailable or not purchased at a location, do not silently enter zero unless zero is genuinely the intended comparison. Mark it as not included and use the same basket at the other locations. You can make a second, explicitly different basket if that better reflects your trip, but label it clearly so the total is not mistaken for a like-for-like index.</p>
            TXT],
            ['title' => 'Treat the index as a dated snapshot', 'html' => <<<'TXT'
            <p>Prices can change with season, exchange rates, local events and business hours. Add the date you collected the basket and revisit the entries before using the total for a future trip. If the calculator includes a built-in comparison dataset, check how it defines its locations and basket before treating it as current. A cached or illustrative value is not a live quote.</p><p>Use a consistent source where possible and separate observed prices from estimates. If you cannot verify a fee, mark it as uncertain in your notes rather than presenting a precise total as fact. The calculator summarizes the inputs; it does not browse current menus or confirm beach access costs.</p>
            TXT],
            ['title' => 'Use a like-for-like basket for each place', 'html' => <<<'TXT'
            <p>If you change an item definition between locations—for example, a bottle size or lunch type—note the change and avoid presenting the totals as a direct ranking. A consistent basket makes the calculation easier to explain and lets someone else repeat it from the same sources.</p>
            TXT],
            ['title' => 'Separate estimates from checked prices', 'html' => <<<'TXT'
            <p>If you cannot find a current price for one basket item, label it as an estimate in your notes and consider running a second total without it. That way a guessed input does not appear to have the same certainty as a posted menu or official fee.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Beach price index calculator work out?', 'a' => 'It returns sunscreen, derived from the water, the beer and the ice cream.'],
            ['q' => 'What do I need to enter to use the Beach price index calculator?', 'a' => 'The form asks for the water, the beer, the ice cream and the lunch, which is 6 fields in total.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Beach Price Index = 10.'],
        ],
        'related' => [
            ['path' => '/everyday-life/quilt-binding', 'name' => 'Quilt binding'],
            ['path' => '/everyday-life/quit-smoking', 'name' => 'Quit smoking and save'],
            ['path' => '/everyday-life/reading-speed', 'name' => 'Reading speed'],
        ],
    ],
];
