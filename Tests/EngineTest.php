<?php

use Alchemy\Component\UI\Engine;

/**
 * Alchemy\Component\UI\Engine - Unit Test File
 *
 * @version   1.0
 * @author    Erik Amaru Ortiz <aortiz.erik@gmail.com>
 * @link      https://github.com/eriknyk/phpalchemy
 * @copyright Copyright 2012 Erik Amaru Ortiz
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @package   Alchemy/Component/UI
 */
class EngineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Engine
     */
    protected $engine;

    /**
     * @covers Alchemy\Component\UI\Engine::__construct()
     */
    public function testConstructorWithHtml()
    {
        $this->engine = new Engine('html', __DIR__ . '/Fixtures/meta-wui/form1.xml');
    }

    /**
     * @covers Alchemy\Component\UI\Parser::generate
     * @depends testConstructorWithHtml
     */
    public function testSingle(Engine $engine)
    {
        $result = $parser->getIterators();
        $this->assertCount(3, $result);
    }
}
