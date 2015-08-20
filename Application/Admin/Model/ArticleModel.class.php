<?php
namespace Admin\Model;
use Think\Model;

class ArticleModel extends Model{
    protected $_validate = array(
            array('ac_id', 'require', '分类名称必须', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
            array('article_title', 'require', '文章标题必须', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('article_code', '', '分类代码已存在', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
    );
    
    protected $_auto = array(
            array('article_time', NOW_TIME, self::MODEL_INSERT),
    );
}