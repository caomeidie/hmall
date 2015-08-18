<?php
namespace Admin\Model;
use Think\Model;

class AdminStyleModel extends Model{
    protected $_validate = array(
            array('style_value', 'require', '类型名称必须', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('roles', 'require', '角色权限必须', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    
    protected $_auto = array(
            array('roles', 'serialize', self::MODEL_BOTH, 'function'),
    );
}