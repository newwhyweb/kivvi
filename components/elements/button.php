<?php

//prep component data
$context['text'] = $thisComponentData['ButtonText'];
$context['variant'] = $thisComponentData['ButtonVariant'];
if ($thisComponentData["ButtonURL"] && $thisComponentData["ButtonURL"]["url"]) {
    $context["href"] = $thisComponentData["ButtonURL"]["url"];
} else {
    $context["href"] = false;
}
// kivvi_pre($context);
Timber::render('button.twig', $context);
