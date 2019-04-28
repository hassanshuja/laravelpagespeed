<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'),
        'timeout' => false,
        'options' => array(
            'page-size' => 'A4',
            'margin-top' => 0,
            'margin-right' => 0,
            'margin-left' => 0,
            'margin-bottom' => 0,
            'orientation' => 'Portrait',
            'disable-smart-shrinking'=>true,
            'enable-external-links'=>true
        ),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
