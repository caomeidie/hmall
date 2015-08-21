<?php
namespace Admin\Model;
use Think\Model;
class StoreModel extends Model{
    protected $_validate = array(
            array('store_name', 'require', '店铺名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('store_name', '', '店铺名称已存在', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
            array('store_pass', 'require', '密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('checkpwd', 'require', '确认密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('checkpwd', 'store_pass', '确认密码不一致', self::MUST_VALIDATE, 'confirm', self::MODEL_INSERT),
            array('gd_id', 'require', '店铺等级不能为空', self::VALUE_VALIDATE, 'regex'),
            array('store_state', 'require', '店铺状态不能为空', self::VALUE_VALIDATE, 'regex'),
    );
    
    protected $_auto = array(
            array('store_pass', 'md5', self::MODEL_BOTH, 'function'),
            array('store_time', NOW_TIME, self::MODEL_INSERT),
    );
    
    protected $_map = array(
            'name' => 'store_name',
            'pass' => 'store_pass',
            'storegrade' => 'grade_id',
            'name_auth' => 'store_owner_name',
            'idcard' => 'store_owner_card',
    );
}