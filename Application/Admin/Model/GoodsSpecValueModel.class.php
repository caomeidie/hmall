<?php
namespace Admin\Model;
use Think\Model;

class GoodsSpecValueModel extends Model{
    protected $_validate = array(
            array('goods_id', 'require', '商品不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('goods_id', 'number', '关联商品必须为数字', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('spec_goods_seri', 'require', '商品规格不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('spec_goods_price', 'require', '商品价格不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    );
}