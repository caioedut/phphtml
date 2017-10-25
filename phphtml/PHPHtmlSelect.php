<?php

class PHPHtmlSelect extends PHPHtmlInput
{

    /**
     * @var array
     */
    private $options;

    /**
     * @var string
     */
    private $selected;

    public function __construct($options = array(), $attrs_or_name = null)
    {
        parent::__construct($attrs_or_name);
        $this->setTagName('select');
        $this->setOptions($options);
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options = array())
    {
        $this->options = $options;
    }

    public function __toString()
    {
        $html = '';

        foreach ($this->options as $val => $label) {
            $attrs = array('value' => $val);

            if ($val == $this->selected) {
                $attrs['selected'] = 'selected';
            }

            $option = new PHPHtmlElement('option', $attrs);
            $html .= $option->append($label);
        }

        $this->setInnerHTML($html);

        return parent::__toString();
    }

    /**
     * @param string $label
     * @param string $val
     * @return $this
     */
    public function addEmptyOption($label = '', $val = '')
    {
        $this->options = array_merge(array($val => $label), $this->options);
        return $this;
    }

    /**
     * @return string
     */
    public function getSelected()
    {
        return $this->selected;
    }

    /**
     * @param $selected
     * @return $this
     */
    public function setSelected($selected)
    {
        $this->selected = $selected;
        return $this;
    }

}