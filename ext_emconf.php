<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "rd_contact_plugin"
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
  'title' => 'Contact Plugin',
  'description' => 'Use it to run embed contact form on your website',
  'category' => 'plugin',
  'author' => 'Rostyslav Matviyiv, Yaroslav Trach, Andrii Pozdieiev',
  'author_email' => 'depot@raccoondepot.com',
  'state' => 'stable',
  'internal' => '',
  'uploadfolder' => '1',
  'createDirs' => '',
  'clearCacheOnLoad' => 0,
  'version' => '1.0.0',
  'constraints' => [
      'depends' => [
          'typo3' => '9.0.0-9.5.99',
      ],
      'conflicts' => [],
      'suggests' => [],
  ],
];