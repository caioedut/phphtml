<?php

class PHPHtmlImage extends PHPHtmlElement
{
    public function __construct($url, $attrs_or_alt = null)
    {
        $this->_prepareAttrs($attrs_or_alt, array(
            'alt' => $attrs_or_alt
        ));

        $attrs_or_alt['src'] = $url;

        parent::__construct('img', $attrs_or_alt);
    }
}