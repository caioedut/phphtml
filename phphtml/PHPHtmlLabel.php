<?php

class PHPHtmlLabel extends PHPHtmlElement
{
    public function __construct($attrs_or_for = array())
    {
        $this->_prepareAttrs($attrs_or_for, array(
            'for' => $attrs_or_for
        ));

        parent::__construct('label', $attrs_or_for);
    }
}