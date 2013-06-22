<?php

require_once '../vendor/phptal/phptal/classes/PHPTAL.php';

// create a new template object
$template = new PHPTAL();

$source = <<<EOS
<div class="controls">
  <select tal:attributes="id id; @@attributes1">
    <option tal:attributes="name item/value" tal:content="item/label" tal:repeat="item items"></option>
  </select>
</div>
EOS;

$data['attributes1'] = array(
    'width' => 120,
    'required' => 'required',
    'class' => 'some-class'
);

$pattern = '/@@(?<varname>\w+)/';
$source  = preg_replace_callback(
    $pattern,
    function ($matches) use ($data) {
    	$res = '';
        $var = $matches['varname'];

        if (array_key_exists($var, $data)) {
            $res = array();
            foreach ($data[$var] as $k => $v) {
                $res[] = $k.' '.$var.'/'.$k;
            }

            $res = implode('; ', $res);
        }

        return $res;
    },
    $source
);

echo '---------------------------------------'.PHP_EOL;
print_r($source);
echo PHP_EOL.'---------------------------------------'.PHP_EOL;

$template->setSource($source);

$template->id = 'some id';
$template->items = array(
    array('value' => 'one', 'label'=>'label one'),
    array('value' => 'two', 'label'=>'label two'),
    array('value' => 'three', 'label'=>'label three')
);
$attributes1 = $data['attributes1'];

$template->attributes1 = $attributes1;

//print_r($template);



// execute the template
try {
    echo $template->execute();
}
catch (Exception $e){
    echo $e;
}
