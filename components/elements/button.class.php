<?php

class kivviComponentButton extends kivviComponent
{

    public function render()
    {
        $buttonText = $this->componentData['ButtonText'];
        $buttonVariant = $this->componentData['ButtonVariant'];
        if ($this->componentData["ButtonURL"] && $this->componentData["ButtonURL"]["url"]) {
            $buttonHREF = $this->componentData["ButtonURL"]["url"];
        } else {
            $buttonHREF = false;
        }
        $html = '';
        if ($buttonHREF) {
            $html .= '<a class="button button-' . $buttonVariant . '" href="' . $buttonHREF . '">' . $buttonText  . '</a>';
        } else {

            $html .= '<button class="button button--' . $buttonVariant . '">' . $buttonText  . '</button>';
        }

        return $html;
    }
}
