<?php /** @noinspection PhpUndefinedVariableInspection */

/***************************************************************
 * Extension Manager/Repository config file for ext: "adminpanel_int"
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Boilerplate Extension',
    'description' => 'Extend the adminpanel by showing the actual info for each USER_INT object on the page.',
    'category' => 'misc',
    'author' => 'Christian Eßl',
    'author_email' => 'indy.essl@gmail.com',
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-9.5.99',
            'adminpanel' => '9.5.0-9.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
