<?php
return [
    [
        'section' => 'Media Settings',
        'functions' => [
            [
                'title' => 'General Settings',
                'des' => 'This function provides all Media Settings',
                'params' => 'NONE',
                'return' => 'All Media Related Settings',
                'code_snap' => 'BBMediaSettings()'
            ]
        ]
    ],
    [
        'section' => 'Media Albums',
        'functions' => [
            [
                'title' => 'Media Albums List',
                'des' => 'This function provides all Albums list',
                'params' => 'NONE',
                'return' => 'All Media Albums listing information',
                'code_snap' => 'BBAlbums()'
            ],
            [
                'title' => 'Album',
                'des' => 'This function provides Album details',
                'params' => 'id of Album',
                'return' => 'All Album Details As collection',
                'code_snap' => 'BBAlbum($id)'
            ]
        ]
    ],
    [
        'section' => 'Media Listing',
        'functions' => [
            [
                'title' => 'Media List',
                'des' => 'This function provides all Media list according to its type',
                'params' => 'media type, documents,images,music,videos || Response style ',
                'return' => 'All Media  listing information in shape of Collection | Array',
                'code_snap' => 'BBMediaLists($type)'
            ],
            [
                'title' => 'Media',
                'des' => 'This function provides Media details',
                'params' => 'id of Media || Response style',
                'return' => 'All Media Details collection || Array',
                'code_snap' => 'BBMedia($id)'
            ]
        ]
    ]
];