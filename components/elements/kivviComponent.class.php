<?php

class kivviComponent
{

    public function __construct($component, $componentData)
    {
        $this->component = $component;
        $this->componentData = $componentData;
    }

    public function render()
    {
        $componentData = $this->componentData;


        get_template_part('template-parts/components', $this->component, array($componentData));
    }
}
