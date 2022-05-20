<?php
$kivvi_custom_fields["kivvi_modal_video"] = array(
    'key' => 'kivvi_modal_video',
    'title' => 'Modal Video',
    'label' => 'Modal Video',
    'name' => 'kivvi_modal_video',
    'layout' => 'block',
    'fields' => array(

        array(
            'key' => 'kivvi_modal_video_image',
            'title' => 'Still Image',
            'name' => 'kivvi_modal_video_image',
            'label' => 'Still Image',
            'type' => 'image',

        ),


        array(
            'key' => 'kivvi_modal_video_text',
            'label' => 'Overlay Text',
            'name' => 'kivvi_modal_video_text',
            'type' => 'text',
            'default' => 'Watch video'

        ),
        array(
            'key' => 'kivvi_modal_video_embed_url',
            'label' => 'Video URL (not full embed code)',
            'name' => 'kivvi_modal_video_embed_url',
            'type' => 'oembed',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'width' => '',
            'height' => '',
        ),
    )

);

$modalVideo = new kivviACFGroup($kivvi_custom_fields["kivvi_modal_video"]);
$modalVideo->registerFieldGroup();
