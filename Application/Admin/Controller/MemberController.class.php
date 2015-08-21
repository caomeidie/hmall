<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class MemberController extends UserBaseController{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $member_model = D('Member');
        if($s = I('get.s')){
            switch ($s){
                case 'block':
                    $condition['member_state'] = 0;
                    break;
                case 'vip':
                    $condition['member_vip'] = 1;
                    break;
            }
        }
        $count = $member_model->where($condition)->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $member_list = $member_model->where($condition)->order('member_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('member_list'=> $member_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        $member_model=D('Member');
        if(IS_POST)
        {
            if($member_model->create())
            {
                if($member_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($member_model->getError(), 300);
            }
            echo $result;
        }else{
            $this->display();
        }
    }
}