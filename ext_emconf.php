<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Contact Plugin',
    'version' => '1.1.0',
    'description' => 'Flexible frontend contact plugin for TYPO3 CMS',
    'category' => 'fe',
    'author' => 'Rostyslav Matviiv, Yaroslav Trach',
    'author_email' => 'depot@raccoondepot.com',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'createDirs' => '',
    'constraints' => [
        'depends' => [
            'typo3' => '9.0.0-9.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
