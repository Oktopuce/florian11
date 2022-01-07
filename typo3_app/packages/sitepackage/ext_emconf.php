<?php

    $EM_CONF[$_EXTKEY] = [
        'title' => 'Sitepackage',
        'description' => 'Base extension of this website',
        'category' => 'templates',
        'constraints' => [
            'depends' => [
                'typo3' => '10.4',
                'fluid_styled_content' => '10.4',
            ]
        ],
        'state' => 'stable',
        'uploadfolder' => 1,
        'createDirs' => '',
        'clearCacheOnLoad' => 1,
        'author' => 'Patrick crausaz',
        'author_email' => 'info@its-crausaz.ch',
        'author_company' => 'ITS Crausaz',
        'version' => '1.0.1',
    ];
