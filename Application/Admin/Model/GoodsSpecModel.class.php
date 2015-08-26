<?php
namespace Admin\Model;
use Think\Model;

class GoodsSpecModel extends Model{
    protected $_validate = array(
            array('spec_name', 'require', '规格名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('spec_name', '', '规格名称已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('spec_value', 'require', '规格值不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('spec_sort', 'number', '索引必须为数字', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    
    protected $_map = array(
            'name' => 'spec_name',
            'value' => 'spec_value',
            'sort' => 'spec_sort',
    );
}