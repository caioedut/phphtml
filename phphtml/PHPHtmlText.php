<?php

class PHPHtmlText extends PHPHtmlElement
{
    public function __construct($text = '', $attrs = array())
    {
        parent::__construct('span', $attrs);
        $this->append($text);
    }

    /**
     * @return $this
     */
    public function setBold()
    {
        $this->addParent('b');
        return $this;
    }

    /**
     * @return $this
     */
    public function setItalic()
    {
        $this->addParent('em');
        return $this;
    }

    /**
     * @return $this
     */
    public function setUnderline()
    {
        $this->addParent('u');
        return $this;
    }

    /**
     * @return $this
     */
    public function setStrike()
    {
        $this->addParent('s');
        return $this;
    }

}