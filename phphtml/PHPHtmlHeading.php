<?php

class PHPHtmlHeading extends PHPHtmlText
{
    public function __construct($text = '', $level = 1, $attrs = array())
    {
        parent::__construct($text, $attrs);

        $level = min($level, 6);
        $level = max(1, $level);

        $this->setTagName("h{$level}");
    }
}