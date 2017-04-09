<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Ui\Test\Unit\Config\Converter;

use Magento\Ui\Config\Converter\AdditionalClasses;

class AdditionalClassesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AdditionalClasses
     */
    private $converter;

    public function setUp()
    {
        $this->converter = new AdditionalClasses();
    }

    public function testConvert()
    {
        $expectedResult = [
            'name' => 'additionalClasses',
            'xsi:type' => 'array',
            'item' => [
                'classNameOne' => [
                    'name' => 'classNameOne',
                    'xsi:type' => 'boolean',
                    'value' => 'true',
                ],
                'classNameTwo' => [
                    'name' => 'classNameTwo',
                    'xsi:type' => 'boolean',
                    'value' => 'false',
                ],
            ],
        ];
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->load(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'testForm.xml');
        $domXpath = new \DOMXPath($dom);
        $classes = $domXpath->query('//form/fieldset/settings/additionalClasses')->item(0);
        $this->assertEquals($expectedResult, $this->converter->convert($classes));
    }
}
