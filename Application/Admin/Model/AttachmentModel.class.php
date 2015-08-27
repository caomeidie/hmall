<?php
namespace Admin\Model;
use Think\Model;

class AttachmentModel extends Model{
    protected $_validate = array(
            array('atta_name', 'require', '附件名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('atta_name', '', '附件名称已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
            array('related_id', 'require', '关联ID不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
            array('atta_type', 'require', '文件类型不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    );
    
    protected $_auto = array(
            array('add_time', NOW_TIME, self::MODEL_INSERT),
    );
}