<?php

$palette     = '{sasswatch_legend},useSassWatch';
$basePalette = $GLOBALS['TL_DCA']['tl_settings']['palettes']['default'];

$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace('liveUpdateBase', 'liveUpdateBase;useSassWatch', $basePalette);

$GLOBALS['TL_DCA']['tl_settings']['palettes']['__selector__'][] = 'useSassWatch';

$GLOBALS['TL_DCA']['tl_settings']['subpalettes'] += [
    'useSassWatch' => 'inputFile,outputFolder',
];

$GLOBALS['TL_DCA']['tl_settings']['fields'] += [
    'inputFile' => [
        'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['inputFile'],
        'inputType'               => 'text',
        'eval'                    => array('tl_class'=>'clr'),
    ],
    'outputFolder' => [
        'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['outputFolder'],
        'inputType'               => 'text',
        'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr'),
    ],
    'useSassWatch' => [
        'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['useSassWatch'],
        'inputType'               => 'checkbox',
        'eval'                    => array('submitOnChange'=>true)
    ],
];
