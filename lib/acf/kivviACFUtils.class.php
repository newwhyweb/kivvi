<?php

use function PHPSTORM_META\map;

class kivviACFUtils
{
    static function getRowParams($row = 1)
    {
        $kivviRowParams = array(
            'key' => 'kivvi_row_' . $row,
            'title' => 'Row ' . $row,
            'name' => 'Row ' . $row,
            'label' => 'Row ' . $row,
            'layout' => 'block',
            'type' => 'group',
        );
        return $kivviRowParams;
    }
}
