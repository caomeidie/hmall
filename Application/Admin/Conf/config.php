<?php
return array(
    'DEFAULT_THEME'         =>  'default',
    'LAYOUT_ON'             =>  false,
	//'LAYOUT_NAME'           =>  'Layout/layout',
        
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
            '__STATIC__' => __ROOT__ . '/Public/static',
            '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
            '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
            '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
    ),
);