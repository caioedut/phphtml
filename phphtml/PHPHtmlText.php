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
        $this->setStyle('font-weight', 'bold');
        return $this;
    }

    /**
     * @return $this
     */
    public function setItalic()
    {
        $this->setStyle('font-style', 'italic');
        return $this;
    }

    /**
     * @return $this
     */
    public function setUnderline()
    {
        $this->setStyle('text-decoration', 'underline', true);
        return $this;
    }

    /**
     * @return $this
     */
    public function setStrike()
    {
        $this->setStyle('text-decoration', 'line-through', true);
        return $this;
    }

}