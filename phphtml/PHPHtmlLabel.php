<?php

class PHPHtmlLabel extends PHPHtmlText
{
    public function __construct($text = '', $attrs_or_for = array())
    {
        $this->_prepareAttrs($attrs_or_for, array(
            'for' => $attrs_or_for
        ));

        parent::__construct($text, $attrs_or_for);
        $this->setTagName('label');
    }
}