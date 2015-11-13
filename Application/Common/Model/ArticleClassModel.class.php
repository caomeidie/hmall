<?php
namespace Common\Model;
use Think\Model;

class ArticleClassModel extends Model{
    protected $_validate = array(
            array('ac_code', 'require', '分类代码必须', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('ac_code', '', '分类代码已存在', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
            array('ac_name', 'require', '分类名称必须', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
            array('ac_name', '', '分类名称已存在', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
    );
}