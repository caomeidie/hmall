<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $_validate = array(
            array('admin_name', '', '用户名已经存在', self::MUST_VALIDATE, 'unique', self::MODEL_INSERT),
            array('admin_name', 'require', '用户名不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('password', 'require', '密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('checkpwd', 'require', '确认密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('checkpwd', 'password', '确认密码不一致', self::MUST_VALIDATE, 'confirm', self::MODEL_INSERT),
            array('email', 'email', '邮箱有误', self::VALUE_VALIDATE, 'regex', self::MODEL_INSERT),
            array('email', '', '邮箱已经存在', self::VALUE_VALIDATE, 'unique'),
    );
    
    protected $_auto = array(
            array('password', 'md5', self::MODEL_BOTH, 'function'),
            array('logintimes', 0, self::MODEL_INSERT),
            array('reg_ip', 'get_client_ip', self::MODEL_INSERT, 'function'),
            array('addtime', NOW_TIME, self::MODEL_INSERT),
            array('lastip', 0, self::MODEL_INSERT),
            array('updatetime', NOW_TIME),
            array('status', 1, self::MODEL_INSERT),
    );
}