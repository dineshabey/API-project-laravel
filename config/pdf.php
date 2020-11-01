<?php

return [
    'custom_font_dir' => base_path('resources/fonts/'), // don't forget the trailing slash!
    'custom_font_data' => [
        'malithiunicode' => [
            'R'  => 'FM-MalithiUW46.ttf', /* Sinhala  */
            'useOTL' => 0xFF,
        ],
        'freesans' => [
            'R' => 'FreeSans.ttf', /* English  */
            'B' => 'FreeSansBold.ttf',
            'I' => 'FreeSansOblique.ttf',
            'BI' => 'FreeSansBoldOblique.ttf',
            'useOTL' => 0xFF,
        ],
        'lathaunicode' => [
            'R'  => 'Latha.ttf', /* Tamil  */
            'useOTL' => 0xFF,
        ],
    ],
    'watermark'            => 'ATL',
    'watermark_text_alpha' => 0.1,
	'show_watermark'       => true,
];