<?php

class kivviComponentButtonset extends kivviComponent
{
    public function render()
    {
        $buttons = array();
        if ($this->componentData["ButtonOne"] && $this->componentData["ButtonOne"]["ButtonText"]) {
            $buttons[] = $this->componentData["ButtonOne"];
        }
        if ($this->componentData["ButtonTwo"] && $this->componentData["ButtonOne"]["ButtonText"]) {
            $buttons[] = $this->componentData["ButtonTwo"];
        }
        if ($this->componentData["variant"] == "three" || $this->componentData["variant"] == "three-alt") {
            if ($this->componentData["ButtonThree"] && $this->componentData["ButtonThree"]["ButtonText"]) {
                $buttons[] = $this->componentData["ButtonThree"];
            }
        }
        $buttonData = array();
        foreach ($buttons as $key => $button) {
            $thisButtonArray = array();
            $thisButtonArray["text"] = $button["ButtonText"];
            if ($button["ButtonURL"] && $button["ButtonURL"]["url"]) {
                $thisButtonArray["href"] = $button["ButtonURL"]["url"];
            } else {
                $thisButtonArray["href"] = '';
            }
            $buttonData[] = $thisButtonArray;
        }
        $this->componentData['buttons'] = $buttonData;
        $buttonsetButtons = $this->componentData['buttons'];
        $buttonsetVariant = $this->componentData['variant'];
        $html = '';
        $html .= '<div class="kh-buttons kh-buttons--' . $buttonsetVariant . '">';
        foreach ($buttons as $button) {
            $buttonClass = new kivviElementButton($button);
            $html .= $buttonClass->render();
        }


        $html .= '</div>';
        return $html;
    }
}
