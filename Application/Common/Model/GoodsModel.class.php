<?php
namespace Common\Model;
use Think\Model;

class GoodsModel extends Model{
    protected $_validate = array(
            array('goods_name', 'require', '商品名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('goods_name', '', '商品名称已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('gc_id', 'require', '商品分类不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('gc_id', 'number', '商品分类必须为数字', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    
    protected $_auto = array(
            array('goods_status', 1, self::MODEL_INSERT),
            array('goods_add_time', NOW_TIME, self::MODEL_INSERT),
            array('goods_starttime', NOW_TIME, self::MODEL_INSERT),
    );
}