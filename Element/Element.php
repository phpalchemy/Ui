<?php
namespace Alchemy\Component\UI\Element;

use Alchemy\Component\UI\WidgetCollection;
use Alchemy\Component\UI\Widget\WidgetInterface;

use Alchemy\Component\UI\Engine;

/**
 * Class Element
 *
 * @version   1.0
 * @author    Erik Amaru Ortiz <aortiz.erik@gmail.com>
 * @link      https://github.com/eriknyk/phpalchemy
 * @copyright Copyright 2012 Erik Amaru Ortiz
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @package   Alchemy/Component/Routing
 */
abstract class Element extends \DependencyInjectionContainer
{
    public $id = '';
    public $name = '';

    protected $widgetsIndex = 0;
    protected $widgets      = array();

    protected $templateEngine = 'haanga';

    protected $engine = null;

    public function __construct($id = '')
    {
        $this->id = $id;
        $this->engine = new Engine();
    }

    public function add(WidgetInterface $w)
    {
        $this->widgets[] = $w;

        if (empty($w->id)) {
            $w->id = 'x-uigen-' . $this->widgetsIndex++;
        }

        $this[$w->id] = $w;
    }

    protected function build()
    {
        $o = '';
        foreach ($this->all() as $i => $widget) {
            $widget->prepare();
            $o .= $this->engine->buildWidget($widget);
        }

        return $o;
    }

    abstract public function render();
}

