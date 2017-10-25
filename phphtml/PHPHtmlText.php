<?php

class PHPHtmlText extends PHPHtmlElement
{
    public function __construct($text = '', $attrs = array())
    {
        parent::__construct('span', $attrs);
        $this->append($text);
    }

    public function setBold()
    {
        $this->setTagName('b');
        return $this;
    }

    public function setItalic()
    {
        $this->setTagName('em');
        return $this;
    }

    public function setUnderline()
    {
        $this->setTagName('u');
        return $this;
    }

}