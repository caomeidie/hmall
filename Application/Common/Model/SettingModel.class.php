<?php
namespace Common\Model;
use Think\Model;
class SettingModel extends Model{
    protected $_validate = array(
            array('setting_key', 'require', '该设置项不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('setting_key', '', '该设置项已经存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('type_id', 'require', '类型不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
    );
}