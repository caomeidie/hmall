<?php
namespace Common\Model;
use Think\Model;

class GoodsTypeModel extends Model{
    protected $_validate = array(
            array('type_name', 'require', '类型名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('type_name', '', '类型名称已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('type_sort', 'number', '索引必须为数字', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    
    protected $_map = array(
            'name' => 'type_name',
            'sort' => 'type_sort',
            'brand' => 'type_brand',
            'attr' => 'type_attr',
            'spec' => 'type_spec',
    );
}