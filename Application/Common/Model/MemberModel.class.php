<?php
namespace Common\Model;
use Think\Model;

class MemberModel extends Model{
    protected $_validate = array(
            array('member_name', 'require', '用户名不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('member_name', '', '用户名已经存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('member_password', 'require', '密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('checkpwd', 'require', '确认密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('checkpwd', 'member_password', '确认密码不一致', self::MUST_VALIDATE, 'confirm', self::MODEL_INSERT),
            array('member_email', 'email', '邮箱有误', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
            array('member_email', '', '邮箱已经存在', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
            array('member_mobile', 'require', '手机不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('member_mobile', '', '该手机已经注册', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('member_idcard', '', '该身份信息已经注册', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
    );
    
    protected $_auto = array(
            array('member_passwd', 'md5', self::MODEL_INSERT, 'function'),
            array('member_addtime', NOW_TIME, self::MODEL_INSERT),
            array('member_logintime', NOW_TIME, self::MODEL_INSERT),
            array('member_loginip', 0, self::MODEL_INSERT),
            array('member_state', 1, self::MODEL_INSERT),
    );
}