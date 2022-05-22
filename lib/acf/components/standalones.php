<?php

$kivvi_custom_fields["kivvi_standalones"] = array(
    'key' => 'kivvi_standalone_fields',
    'title' => 'Standalone Fields Group',
    'label' => 'Standalones',
    'name' => 'kivvi_standalone_fields',


);



$standalones = new kivviACFGroup($kivvi_custom_fields["kivvi_standalones"]);
$standalones->registerFieldGroup();
