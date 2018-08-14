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
    private $attributes = array();

    /**
     * @var array
     */
    private $styles = array();

    /**
     * @var string
     */
    private $innerHTML;

    /**
     * @var PHPHtmlElement[]
     */
    private $body = array();

    /**
     * @var array
     */
    private $parents;

    /**
     * @param string $tagName
     * @param array $attrs
     */
    public function __construct($tagName = PHPHtml::MAIN_TAG, $attrs = array())
    {
        $this->tagName = $tagName;
        $this->attributes = $attrs;
        $this->body = array();
        $this->_prepareStyles();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $html = "";
        $attrs = "";
        $styles = array();

        if ($this->parents) {
            foreach ($this->parents as $parent) {
                $html .= "<{$parent}>";
            }
        }

        $html .= "<%s%s>%s%s</%s>";

        if ($this->parents) {
            foreach (array_reverse($this->parents) as $parent) {
                $html .= "</{$parent}>";
            }
        }

        // Prepare Attributes
        foreach ($this->attributes as $attr => $val) {
            if (is_array($val)) {
                $val = implode(' ', $val);
            }

            $attrs .= "{$attr}=\"{$val}\" ";
        }

        // Prepare Styles
        if ($this->styles) {
            foreach ($this->styles as $prop => $val) {
                $styles[] = "{$prop}: $val";
            }
            $attrs .= "style=\"" . implode($styles, "; ") . "\"";
        }

        $attrs = $attrs ? " " . rtrim($attrs) : "";

        // Prepare Body
        $body = implode("", $this->body);

        return sprintf($html, $this->tagName, $attrs, $this->innerHTML, $body, $this->tagName);
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
     * @return $this
     */
    public function setAttribute($attrs, $val = null)
    {
        if ($val !== null) {
            $attrs = array($attrs => $val);
        }

        $this->attributes = array_merge($this->attributes, $attrs);
        $this->_prepareStyles();

        return $this;
    }

    /**
     * @param string $prop
     * @return string
     */
    public function getStyle($prop)
    {
        return empty($this->styles[$prop]) ? null : $this->styles[$prop];
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
     * Remove styles from $attributes and set to $styles
     */
    private function _prepareStyles()
    {
        if (!empty($this->attributes['style'])) {
            $styles = explode(';', $this->attributes['style']);
            unset($this->attributes['style']);

            $arr = array();

            foreach ($styles as $style) {
                $split = explode(":", $style);

                if (isset($split[0]) && isset($split[1])) {
                    $prop = trim($split[0]);
                    $val = trim($split[1]);

                    $arr[$prop] = $val;
                }
            }

            $this->styles = $arr;
        }
    }

    /**
     * @param array|string $prop
     * @param string $val
     * @param bool $merge
     * @return $this
     */
    public function setStyle($prop, $val = null, $merge = false)
    {
        if ($val !== null) {
            if ($merge) {
                if (empty($this->styles[$prop])) {
                    $this->styles[$prop] = "";
                }

                $val = trim($this->styles[$prop] . " " . $val);
            }

            $prop = array($prop => $val);
        }

        $this->styles = array_merge($this->styles, $prop);
        return $this;
    }

    /**
     * @param null|string $prop
     * @return $this
     */
    public function removeStyle($prop = null)
    {
        if ($prop) {
            unset($this->styles[$prop]);
        } else {
            $this->styles = null;
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlock()
    {
        $this->setStyle('display', 'block');
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
     * @param PHPHtmlElement $parent
     * @return $this
     */
    public function prependTo(PHPHtmlElement $parent)
    {
        $parent->prepend($this);
        return $this;
    }

    /**
     * @param PHPHtmlElement $parent
     * @return $this
     */
    public function appendTo(PHPHtmlElement $parent)
    {
        $parent->append($this);
        return $this;
    }

}