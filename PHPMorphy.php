<?php

namespace aface\morphy;

use phpMorphy as Morphy;

/**
 * Class PHPMorphy
 * @package aface\morphy
 */
class PHPMorphy
{
    /**
     * @var Morphy
     */
    public $morphy;

    /**
     * @var string
     */
    private $language = 'ru';

    /**
     * @var array
     */
    private $dictionaries = [
        'ru' => 'ru_RU',
        'en' => 'en_EN'
    ];

    /**
     * PHPMorphy constructor.
     * @param string $language
     * @throws \Exception
     */
    public function __construct($language = 'ru')
    {
        if (!empty($this->dictionaries[$language])) {
            $this->language = $language;
        } else{
            throw new \Exception('No such dictionary');
        }
        require_once(__DIR__ . '/phpmorphy/src/common.php');
        $this->morphy = new Morphy(
            __DIR__ . '/phpmorphy/dicts',
            $this->dictionaries[$this->language],
            [
                'storage' => PHPMORPHY_STORAGE_FILE
            ]
        );
    }
}