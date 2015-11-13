<?php
namespace Common\Model;
use Think\Model;

class AdminStyleModel extends Model{
    protected $_validate = array(
            array('style_value', 'require', '类型名称必须', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('style_value', '', '类型名称已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('roles', 'is_array', '角色权限必须', self::MUST_VALIDATE, 'function', self::MODEL_BOTH),
    );
    
    protected $_auto = array(
            array('roles', 'serialize', self::MODEL_BOTH, 'function'),
    );
    
    protected $_map = array(
            'style_name' => 'style_value',
    );
}