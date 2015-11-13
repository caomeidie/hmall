<?php
namespace Common\Model;
use Think\Model;

class GoodsClassModel extends Model{
    protected $_validate = array(
            array('gc_name', 'require', '分类名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('gc_name', '', '分类名称已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('type_id', 'require', '类型不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('type_id', 'number', '类型必须为数字', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('gc_parent_id', 'number', '父类必须为数字', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('gc_sort', 'number', '索引必须为数字', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
            array('gc_show', 'number', '是否显示必须为数字', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    
    protected $_map = array(
            'name' => 'gc_name',
            'sort' => 'gc_sort',
            'show' => 'gc_show',
            'type' => 'type_id',
            'gc' => 'gc_parent_id',
    );
}