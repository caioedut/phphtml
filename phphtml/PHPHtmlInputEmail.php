<?php

class PHPHtmlInputEmail extends PHPHtmlInput
{
    public function __construct($attrs_or_name = null)
    {
        $this->_prepareAttrs($attrs_or_name, array(
            'id' => $attrs_or_name,
            'name' => $attrs_or_name
        ));

        $attrs_or_name['type'] = 'email';

        parent::__construct($attrs_or_name);
    }
}