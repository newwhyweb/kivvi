<?php

use function PHPSTORM_META\map;

class kivviACFUtils
{
    static function getRowParams($row = 1)
    {
        $kivviRowParams = array(
            'key' => 'kivvi_section_' . $row,
            'title' => 'Section ' . $row,
            'name' => 'Section ' . $row,
            'label' => 'Section ' . $row,
            'layout' => 'block',
            'type' => 'group',
        );
        return $kivviRowParams;
    }
}
