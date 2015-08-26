<?php
namespace Admin\Model;
use Think\Model;

class GoodsBrandModel extends Model{
    protected $_validate = array(
            array('brand_name', 'require', '品牌名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('brand_name', '', '品牌名称已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('brand_type', 'number', '类型名称必须为数字', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
            array('brand_sort', 'number', '索引必须为数字', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    
    protected $_map = array(
            'name' => 'brand_name',
            'type' => 'brand_type',
            'sort' => 'brand_sort',
    );
}