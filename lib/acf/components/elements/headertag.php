<?php
$kivvi_custom_fields["kivvi_header_tag"] = array(
    'key' => 'kivvi_header_tag',
    'title' => 'Header Tag',
    'name' => 'kivvi_header_tag',
    'label' => 'Header Tag',
    'type' => 'select',
    'choices' => array(
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
    ),
    'parent' => 'kivvi_standalone_fields'
);

acf_add_local_field(
    $kivvi_custom_fields["kivvi_header_tag"]
);
