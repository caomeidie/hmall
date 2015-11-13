<?php
namespace Common\Model;
use Think\Model;

class GoodsAttrValueModel extends Model{
    protected $_validate = array(
            array('goods_id', 'require', '商品不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('goods_id', 'number', '关联商品必须为数字', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('attr_id', 'require', '商品属性不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('attr_id', 'number', '关联属性必须为数字', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('attr_value', 'require', '商品属性值不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('attr_value', 'number', '属性值必须为数字', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    );
}