<?php

class PHPHtmlButton extends PHPHtmlElement
{
    public function __construct($text = 'Submit', $attrs_or_type = null)
    {
        $this->_prepareAttrs($attrs_or_type, array(
            'type' => $attrs_or_type
        ));

        $attrs_or_type = array_merge(array(
            'type' => 'button'
        ), $attrs_or_type);

        parent::__construct('button', $attrs_or_type);

        $this->append($text);
    }
}