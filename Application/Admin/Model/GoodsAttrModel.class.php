<?php
namespace Admin\Model;
use Think\Model;

class GoodsAttrModel extends Model{
    protected $_validate = array(
            array('attr_name', 'require', '属性名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('attr_name', '', '属性名称已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('attr_value', 'require', '属性值不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('attr_sort', 'number', '索引必须为数字', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    
    protected $_map = array(
            'name' => 'attr_name',
            'value' => 'attr_value',
            'sort' => 'attr_sort',
    );
}