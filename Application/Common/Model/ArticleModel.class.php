<?php
namespace Common\Model;
use Think\Model;

class ArticleModel extends Model{
    protected $_map = array(
            'title' => 'article_title',
            'url' => 'article_url',
            'isshow' => 'article_show',
            'sort' => 'article_sort',
            'content' => 'article_content',
    );
    
    protected $_validate = array(
            array('ac_id', 'require', '分类名称必须', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
            array('article_title', 'require', '文章标题必须', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    
    protected $_auto = array(
            array('article_time', NOW_TIME, self::MODEL_INSERT),
    );
}