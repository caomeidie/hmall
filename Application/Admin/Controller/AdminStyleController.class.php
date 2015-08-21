<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class AdminStyleController extends UserBaseController{
    public function index(){
        $style_model = D('AdminStyle');
        $count = $style_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $style_list = $style_model->order('style_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('style_list'=> $style_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        if(IS_POST){
            $style_model = D('AdminStyle');
            if($style_model->create()){
                if($style_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($style_model->getError(), 300);
            }
            echo $result;
        }else{
            $roles_model = D('Roles');
            $roles_list = $roles_model->select();
            $this->assign('roles_list', $roles_list);
            $this->display();
        }
    }
}
