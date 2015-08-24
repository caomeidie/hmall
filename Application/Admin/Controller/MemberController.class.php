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
    
    public function del()
    {
        if(I('get.uid')){
            $member_id = I('get.uid');
        }elseif(I('post.check')){
            $member_id = I('post.check');
        }else{
            $member_id = 0;
        }
        if($member_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $member_model = D('Member');
            $count = $member_model->delete($member_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
    
        echo $result;
    }
    
    public function edit()
    {
        $member_id = I('get.uid');
        $member_model = D('Member');
        if(IS_POST)
        {
            if($member_model->create(I('post.'),2,array('member_id'=>$member_id)))
            {
                if($member_model->where(array('member_id'=>$member_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$member_model->getError(), 300);
                }
            }else{
                $result = $this->message($member_model->getError(), 300);
            }
            echo $result;
        }else{
            $member_info = $member_model->where(array('member_id'=>$member_id))->find();
            $this->assign('member_info', $member_info);
            $this->display();
        }
    }
}