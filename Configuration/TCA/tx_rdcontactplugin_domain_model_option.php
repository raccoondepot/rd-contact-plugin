<?php
$LOCALLANG = 'LLL:EXT:rd_contact_plugin/Resources/Private/Language/locallang.xlf:';

return [
    'ctrl' => [
        'title' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title',
        'iconfile' => 'EXT:rd_contact_plugin/Resources/Public/icons/tx_rdcontactplugin_domain_model_option.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, icon_library',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, icon_library'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_rdcontactplugin_domain_model_option',
                'foreign_table_where' => 'AND {#tx_rdcontactplugin_domain_model_option}.{#pid}=###CURRENT_PID### AND {#tx_rdcontactplugin_domain_model_option}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'icon_library' => [
            'exclude' => 0,
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.icon_library',
            'config' => [
                'type' => 'select',
                'showIconTable' => true,
                'renderType' => 'selectSingle',
                'items' => [
                    [$LOCALLANG . 'mkraina.icon_library.no_icon', ''],
                    [$LOCALLANG . 'mkraina.icon_library.facebook', 'facebook', 'mkraina-facebook'],
                    [$LOCALLANG . 'mkraina.icon_library.image-zoom', 'image-zoom', 'mkraina-image-zoom'],
                    [$LOCALLANG . 'mkraina.icon_library.documents', 'documents', 'mkraina-documents'],
                    [$LOCALLANG . 'mkraina.icon_library.delete', 'delete', 'mkraina-delete'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.shoppingcart',
                        'shoppingcart',
                        'mkraina-shoppingcart',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.direct-order',
                        'direct-order',
                        'mkraina-direct-order',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.filter-grid', 'filter-grid', 'mkraina-filter-grid'],
                    [$LOCALLANG . 'mkraina.icon_library.twitter', 'twitter', 'mkraina-twitter'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.zip-download',
                        'zip-download',
                        'mkraina-zip-download',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.whatsapp', 'whatsapp', 'mkraina-whatsapp'],
                    [$LOCALLANG . 'mkraina.icon_library.instagram', 'instagram', 'mkraina-instagram'],
                    [$LOCALLANG . 'mkraina.icon_library.youtube', 'youtube', 'mkraina-youtube'],
                    [$LOCALLANG . 'mkraina.icon_library.filter-list', 'filter-list', 'mkraina-filter-list'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-random',
                        'document-random',
                        'mkraina-document-random',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.sitemap', 'sitemap', 'mkraina-sitemap'],
                    [$LOCALLANG . 'mkraina.icon_library.document', 'document', 'mkraina-document'],
                    [$LOCALLANG . 'mkraina.icon_library.share', 'share', 'mkraina-share'],
                    [$LOCALLANG . 'mkraina.icon_library.xing', 'xing', 'mkraina-xing'],
                    [$LOCALLANG . 'mkraina.icon_library.linkedin', 'linkedin', 'mkraina-linkedin'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.arrow-dropdown',
                        'arrow-dropdown',
                        'mkraina-arrow-dropdown',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.filter', 'filter', 'mkraina-filter'],
                    [$LOCALLANG . 'mkraina.icon_library.creditcard', 'creditcard', 'mkraina-creditcard'],
                    [$LOCALLANG . 'mkraina.icon_library.language', 'language', 'mkraina-language'],
                    [$LOCALLANG . 'mkraina.icon_library.contact', 'contact', 'mkraina-contact'],
                    [$LOCALLANG . 'mkraina.icon_library.slider-back', 'slider-back', 'mkraina-slider-back'],
                    [$LOCALLANG . 'mkraina.icon_library.error', 'error', 'mkraina-error'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.slider-forward',
                        'slider-forward',
                        'mkraina-slider-forward',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-pdf',
                        'document-pdf',
                        'mkraina-document-pdf',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-jpg',
                        'document-jpg',
                        'mkraina-document-jpg',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-xls',
                        'document-xls',
                        'mkraina-document-xls',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-doc',
                        'document-doc',
                        'mkraina-document-doc',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.overview', 'overview', 'mkraina-overview'],
                    [$LOCALLANG . 'mkraina.icon_library.menu-sub', 'menu-sub', 'mkraina-menu-sub'],
                    [$LOCALLANG . 'mkraina.icon_library.user', 'user', 'mkraina-user'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.gallery-small',
                        'gallery-small',
                        'mkraina-gallery-small',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.arrow-left', 'arrow-left', 'mkraina-arrow-left'],
                    [$LOCALLANG . 'mkraina.icon_library.arrow-right', 'arrow-right', 'mkraina-arrow-right'],
                    [$LOCALLANG . 'mkraina.icon_library.menu-main', 'menu-main', 'mkraina-menu-main'],
                    [$LOCALLANG . 'mkraina.icon_library.mail', 'mail', 'mkraina-mail'],
                    [$LOCALLANG . 'mkraina.icon_library.folder', 'folder', 'mkraina-folder'],
                    [$LOCALLANG . 'mkraina.icon_library.check', 'check', 'mkraina-check'],
                    [$LOCALLANG . 'mkraina.icon_library.arrow-link', 'arrow-link', 'mkraina-arrow-link'],
                    [$LOCALLANG . 'mkraina.icon_library.calendar', 'calendar', 'mkraina-calendar'],
                    [$LOCALLANG . 'mkraina.icon_library.gallery-big', 'gallery-big', 'mkraina-gallery-big'],
                    [$LOCALLANG . 'mkraina.icon_library.search', 'search', 'mkraina-search'],
                ],
            ],
        ],
        // end
    ],
];
