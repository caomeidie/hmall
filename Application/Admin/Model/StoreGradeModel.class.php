<?php
namespace Admin\Model;
use Think\Model;
class StoreGradeModel extends Model{
    protected $_validate = array(
            array('sg_name', 'require', '分类名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('sg_name', '', '分类名称已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
    );
}