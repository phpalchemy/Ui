<?php
namespace Alchemy\Component\UI\Element\Form\Widget;

/**
 * Class Textbox
 *
 * @version   1.0
 * @author    Erik Amaru Ortiz <aortiz.erik@gmail.com>
 * @link      https://github.com/eriknyk/phpalchemy
 * @copyright Copyright 2012 Erik Amaru Ortiz
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @package   Alchemy/Component/UI
 */
class Flipswitch extends Widget
{
    public $disabled;
    public $editable;

    protected $items = array();

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->setXtype('flipswitch');

        $this->items = array(
            array('value' => 1, 'label' => 'On'),
            array('value' => 0, 'label' => 'Off')
        );
    }

    public function setValue($value)
    {
        $this->value = $value == "On" ? 1 : 0;
    }
}

