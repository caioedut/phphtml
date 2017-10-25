<?php

class PHPHtmlForm extends PHPHtmlElement
{
    public function __construct($attrs_or_method = null)
    {
        $this->_prepareAttrs($attrs_or_method, array(
            'method' => $attrs_or_method
        ));

        $attrs_or_method = array_merge(array(
            'method' => 'get'
        ), $attrs_or_method);

        parent::__construct('form', $attrs_or_method);
    }
}