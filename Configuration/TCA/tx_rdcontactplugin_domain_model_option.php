<?php
$LOCALLANG = 'LLL:EXT:rd_contact_plugin/Resources/Private/Language/locallang.xlf:';

return [
    'ctrl' => [
        'title' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option',
        'hideTable' => true,
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
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, option_type, title, icon_library, link, custom_link, embed, restrictions, process_all_restrictions',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, option_type, title, icon_library, link, custom_link, embed, restrictions, process_all_restrictions'],
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

        /**
         * Custom fields
         */
        'option_type' => [
            'exclude' => true,
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.option_type',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [$LOCALLANG . 'tx_rdcontactplugin_domain_model_option.option_type.0', 0, 'mkraina-gallery-big'],
                    [$LOCALLANG . 'tx_rdcontactplugin_domain_model_option.option_type.1', 1, 'apps-pagetree-page-shortcut'],
                    [$LOCALLANG . 'tx_rdcontactplugin_domain_model_option.option_type.2', 2, 'apps-pagetree-page-backend-users'],
                    [$LOCALLANG . 'tx_rdcontactplugin_domain_model_option.option_type.3', 3, 'apps-pagetree-page-shortcut-external'],
                ],
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.title',
            'description' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.title.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'icon_library' => [
            'exclude' => true,
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.icon_library',
            'config' => [
                'type' => 'select',
                'showIconTable' => true,
                'renderType' => 'selectSingle',
                'items' => [
                    [$LOCALLANG . 'mkraina.icon_library.no_icon', ''],
                    [$LOCALLANG . 'mkraina.icon_library.facebook', 'mkraina-facebook', 'mkraina-facebook'],
                    [$LOCALLANG . 'mkraina.icon_library.image-zoom', 'mkraina-image-zoom', 'mkraina-image-zoom'],
                    [$LOCALLANG . 'mkraina.icon_library.documents', 'mkraina-documents', 'mkraina-documents'],
                    [$LOCALLANG . 'mkraina.icon_library.delete', 'mkraina-delete', 'mkraina-delete'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.shoppingcart',
                        'mkraina-shoppingcart',
                        'mkraina-shoppingcart',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.direct-order',
                        'mkraina-direct-order',
                        'mkraina-direct-order',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.filter-grid', 'mkraina-filter-grid', 'mkraina-filter-grid'],
                    [$LOCALLANG . 'mkraina.icon_library.twitter', 'mkraina-twitter', 'mkraina-twitter'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.zip-download',
                        'mkraina-zip-download',
                        'mkraina-zip-download',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.whatsapp', 'mkraina-whatsapp', 'mkraina-whatsapp'],
                    [$LOCALLANG . 'mkraina.icon_library.instagram', 'mkraina-instagram', 'mkraina-instagram'],
                    [$LOCALLANG . 'mkraina.icon_library.youtube', 'mkraina-youtube', 'mkraina-youtube'],
                    [$LOCALLANG . 'mkraina.icon_library.filter-list', 'mkraina-filter-list', 'mkraina-filter-list'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-random',
                        'mkraina-document-random',
                        'mkraina-document-random',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.sitemap', 'mkraina-sitemap', 'mkraina-sitemap'],
                    [$LOCALLANG . 'mkraina.icon_library.document', 'mkraina-document', 'mkraina-document'],
                    [$LOCALLANG . 'mkraina.icon_library.share', 'mkraina-share', 'mkraina-share'],
                    [$LOCALLANG . 'mkraina.icon_library.xing', 'mkraina-xing', 'mkraina-xing'],
                    [$LOCALLANG . 'mkraina.icon_library.linkedin', 'mkraina-linkedin', 'mkraina-linkedin'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.arrow-dropdown',
                        'mkraina-arrow-dropdown',
                        'mkraina-arrow-dropdown',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.filter', 'mkraina-filter', 'mkraina-filter'],
                    [$LOCALLANG . 'mkraina.icon_library.creditcard', 'mkraina-creditcard', 'mkraina-creditcard'],
                    [$LOCALLANG . 'mkraina.icon_library.language', 'mkraina-language', 'mkraina-language'],
                    [$LOCALLANG . 'mkraina.icon_library.contact', 'mkraina-contact', 'mkraina-contact'],
                    [$LOCALLANG . 'mkraina.icon_library.slider-back', 'mkraina-slider-back', 'mkraina-slider-back'],
                    [$LOCALLANG . 'mkraina.icon_library.error', 'mkraina-error', 'mkraina-error'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.slider-forward',
                        'mkraina-slider-forward',
                        'mkraina-slider-forward',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-pdf',
                        'mkraina-document-pdf',
                        'mkraina-document-pdf',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-jpg',
                        'mkraina-document-jpg',
                        'mkraina-document-jpg',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-xls',
                        'mkraina-document-xls',
                        'mkraina-document-xls',
                    ],
                    [
                        $LOCALLANG . 'mkraina.icon_library.document-doc',
                        'mkraina-document-doc',
                        'mkraina-document-doc',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.overview', 'mkraina-overview', 'mkraina-overview'],
                    [$LOCALLANG . 'mkraina.icon_library.menu-sub', 'mkraina-menu-sub', 'mkraina-menu-sub'],
                    [$LOCALLANG . 'mkraina.icon_library.user', 'mkraina-user', 'mkraina-user'],
                    [
                        $LOCALLANG . 'mkraina.icon_library.gallery-small',
                        'mkraina-gallery-small',
                        'mkraina-gallery-small',
                    ],
                    [$LOCALLANG . 'mkraina.icon_library.arrow-left', 'mkraina-arrow-left', 'mkraina-arrow-left'],
                    [$LOCALLANG . 'mkraina.icon_library.arrow-right', 'mkraina-arrow-right', 'mkraina-arrow-right'],
                    [$LOCALLANG . 'mkraina.icon_library.menu-main', 'mkraina-menu-main', 'mkraina-menu-main'],
                    [$LOCALLANG . 'mkraina.icon_library.mail', 'mkraina-mail', 'mkraina-mail'],
                    [$LOCALLANG . 'mkraina.icon_library.folder', 'mkraina-folder', 'mkraina-folder'],
                    [$LOCALLANG . 'mkraina.icon_library.check', 'mkraina-check', 'mkraina-check'],
                    [$LOCALLANG . 'mkraina.icon_library.arrow-link', 'mkraina-arrow-link', 'mkraina-arrow-link'],
                    [$LOCALLANG . 'mkraina.icon_library.calendar', 'mkraina-calendar', 'mkraina-calendar'],
                    [$LOCALLANG . 'mkraina.icon_library.gallery-big', 'mkraina-gallery-big', 'mkraina-gallery-big'],
                    [$LOCALLANG . 'mkraina.icon_library.search', 'mkraina-search', 'mkraina-search'],

                    // old
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-calendar', 'mkraina-old-calendar', 'mkraina-old-calendar'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-call-center-worker-with-headset', 'mkraina-old-call-center-worker-with-headset', 'mkraina-old-call-center-worker-with-headset'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-christmas-day_2', 'mkraina-old-christmas-day_2', 'mkraina-old-christmas-day_2'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-christmas-day', 'mkraina-old-christmas-day', 'mkraina-old-christmas-day'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-christmas', 'mkraina-old-christmas', 'mkraina-old-christmas'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-close', 'mkraina-old-close', 'mkraina-old-close'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-earphones', 'mkraina-old-earphones', 'mkraina-old-earphones'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-facebook', 'mkraina-old-facebook', 'mkraina-old-facebook'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-hand-holding-up-a-clock', 'mkraina-old-hand-holding-up-a-clock', 'mkraina-old-hand-holding-up-a-clock'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-icon', 'mkraina-old-icon', 'mkraina-old-icon'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-old-telephone-ringing', 'mkraina-old-old-telephone-ringing', 'mkraina-old-old-telephone-ringing'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-passage-of-time', 'mkraina-old-passage-of-time', 'mkraina-old-passage-of-time'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-phone-receiver', 'mkraina-old-phone-receiver', 'mkraina-old-phone-receiver'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-sms-bubble-speech', 'mkraina-old-sms-bubble-speech', 'mkraina-old-sms-bubble-speech'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-support', 'mkraina-old-support', 'mkraina-old-support'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-support2', 'mkraina-old-support2', 'mkraina-old-support2'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-telephone', 'mkraina-old-telephone', 'mkraina-old-telephone'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-time', 'mkraina-old-time', 'mkraina-old-time'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-viber', 'mkraina-old-viber', 'mkraina-old-viber'],
                    [$LOCALLANG . 'mkraina.icon_library.mkraina-old-viber2', 'mkraina-old-viber2', 'mkraina-old-viber2'],
                ],
            ],
        ],
        'link' => [
            'exclude' => true,
            'displayCond' => 'FIELD:option_type:=:1',
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'eval' => 'trim',
            ],
        ],
        'custom_link' => [
            'exclude' => true,
            'displayCond' => 'FIELD:option_type:=:3',
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.link',
            'description' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.link.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'embed' => [
            'exclude' => true,
            'displayCond' => 'FIELD:option_type:=:2',
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.embed',
            'config' => [
                'type' => 'text',
                'cols' => '80',
                'rows' => '15',
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'restrictions' => [
            'exclude' => true,
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.restrictions',
            'description' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.restrictions.description',
            'config' => [
                'type' => 'inline',
                'allowed' => 'tx_rdcontactplugin_domain_model_restriction',
                'foreign_table' => 'tx_rdcontactplugin_domain_model_restriction',
                'foreign_sortby' => 'sorting',
                'foreign_field' => 'plugin',
                'minitems' => 0,
                'maxitems' => 99,
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                    'enabledControls' => [
                        'info' => false,
                    ]
                ]
            ]
        ],
        'process_all_restrictions' => [
            'exclude' => true,
            'label' => $LOCALLANG . 'tx_rdcontactplugin_domain_model_option.process_all_restrictions',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
    ],
];
