<?php

class PHPHtmlElement
{

    /**
     * @var string
     */
    private $tagName;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @var string
     */
    private $innerHTML;

    /**
     * @var PHPHtmlElement[]
     */
    private $body;

    /**
     * @var bool
     */
    private $selfClose;

    /**
     * @var string
     */
    private $insideOf;

    /**
     * @param string $tagName
     * @param array $attrs
     */
    public function __construct($tagName = PHPHtml::MAIN_TAG, $attrs = array())
    {
        $this->tagName = $tagName;
        $this->attributes = $attrs;
        $this->body = array();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $html = "";
        $attrs = "";

        if ($this->insideOf) {
            $html .= "<{$this->insideOf}>";
        }

        $html .= "<%s %s>%s%s</%s>";

        if ($this->insideOf) {
            $html .= "</{$this->insideOf}>";
        }


        // Prepare Attributes
        foreach ($this->attributes as $attr => $val) {
            if (is_array($val)) {
                $val = implode(' ', $val);
            }

            $attrs .= "{$attr}=\"{$val}\"";
        }

        // Prepare Body
        $body = implode("", $this->body);

        return sprintf($html, $this->tagName, trim($attrs), $this->innerHTML, $body, $this->tagName);
    }

    public function _prepareAttrs(&$arr_or_str, $defaults = array())
    {
        if ($arr_or_str && !is_array($arr_or_str)) {
            $arr_or_str = $defaults;
        }

        return $arr_or_str;
    }

    /**
     * @return string
     */
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * @param string $tagName
     * @return $this
     */
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;
        return $this;
    }

    /**
     * @param string $attr
     * @return string
     */
    public function getAttribute($attr)
    {
        return empty($this->attributes[$attr]) ? null : $this->attributes[$attr];
    }

    /**
     * @param array|string $attrs
     * @param string $val
     */
    public function setAttribute($attrs, $val = null)
    {
        if ($val !== null) {
            $attrs = array($attrs => $val);
        }

        $this->attributes = array_merge($this->attributes, $attrs);
    }

    /**
     * @param string $attr
     * @return $this
     */
    public function removeAttribute($attr)
    {
        unset($this->attributes[$attr]);
        return $this;
    }

    /**
     * @return string
     */
    public function getInnerHTML()
    {
        return $this->innerHTML;
    }

    /**
     * @param string $innerHTML
     * @return $this
     */
    public function setInnerHTML($innerHTML)
    {
        $this->innerHTML = $innerHTML;
        return $this;
    }

    /**
     * @param string|PHPHtmlElement
     * @return $this
     */
    public function prepend()
    {
        $this->body = array_merge(func_get_args(), $this->body);
        return $this;
    }

    /**
     * @param string|PHPHtmlElement
     * @return $this
     */
    public function append()
    {
        $this->body = array_merge($this->body, func_get_args());
        return $this;
    }

    /**
     * @param string $tagName
     * @return $this
     */
    public function asChildOf($tagName = PHPHtml::MAIN_TAG)
    {
        $this->insideOf = $tagName;
        return $this;
    }

}