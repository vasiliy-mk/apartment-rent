<?php

return [

    'default'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
    ],

    'flat'   => [
        'length'    => 4,
        'width'     => 120,
        'height'    => 35,
        'quality'   => 100,
        'lines'     => 0,
        'bgImage'   => false,
        'bgColor'   => '#fff',
        'fontColors'=> ['#2c3e50','#795548'],
        'contrast'  => -2,
        'angle'     => 5,
        'characters' => '2346789ABCDEFGHMNPQRTUXYZ'
    ],

    'mini'   => [
        'length'    => 3,
        'width'     => 60,
        'height'    => 32,
    ],

    'inverse'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
        'sensitive' => true,
        'angle'     => 12,
        'sharpen'   => 10,
        'blur'      => 2,
        'invert'    => true,
        'contrast'  => -5,
    ]

];
