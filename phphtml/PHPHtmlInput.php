<?php

class PHPHtmlInput extends PHPHtmlElement
{

    public function __construct($attrs_or_name = null)
    {
        $this->_prepareAttrs($attrs_or_name, array(
            'id' => $attrs_or_name,
            'name' => $attrs_or_name
        ));

        $attrs_or_name = array_merge(array(
            'type' => 'text'
        ), $attrs_or_name);

        parent::__construct('input', $attrs_or_name);
    }

    /**
     * @param bool $bool
     * @return $this
     */
    public function setRequired($bool = true)
    {
        if ($bool) {
            $this->setAttribute('required', 'required');
        } else {
            $this->removeAttribute('required');
        }

        return $this;
    }
}