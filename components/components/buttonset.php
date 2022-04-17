<?php
// kivvi_pre($thisComponentData);
//prep component data
$buttons = array();
if ($thisComponentData["ButtonOne"] && $thisComponentData["ButtonOne"]["ButtonText"]) {
    $buttons[] = $thisComponentData["ButtonOne"];
}
if ($thisComponentData["ButtonTwo"] && $thisComponentData["ButtonOne"]["ButtonText"]) {
    $buttons[] = $thisComponentData["ButtonTwo"];
}
if ($thisComponentData["variant"] == "three" || $thisComponentData["variant"] == "three-alt") {
    if ($thisComponentData["ButtonThree"] && $thisComponentData["ButtonThree"]["ButtonText"]) {
        $buttons[] = $thisComponentData["ButtonThree"];
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
$thisComponentData['buttons'] = $buttonData;
$context['buttons'] = $thisComponentData['buttons'];
$context['variant'] = $thisComponentData['variant'];
// kivvi_pre($context);
Timber::render('buttonset.twig', $context);
// echo $mustache->render('components/buttonset', $thisComponentData);
