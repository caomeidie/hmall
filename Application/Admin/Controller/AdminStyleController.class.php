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
            $roles_list = $roles_model->index('role_id')->select();
            $this->assign('roles_list', $roles_list);
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $style_id = I('get.uid');
        }elseif(I('post.check')){
            $style_id = I('post.check');
        }else{
            $style_id = 0;
        }
        if($style_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $style_model = D('AdminStyle');
            $count = $style_model->delete($style_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
    
        echo $result;
    }
    
    public function edit()
    {
        $style_id = I('get.uid');
        $style_model = D('AdminStyle');
        if(IS_POST)
        {
            if($style_model->create(I('post.'),2,array('style_id'=>$style_id)))
            {
                if($style_model->where(array('style_id'=>$style_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$style_model->getError(), 300);
                }
            }else{
                $result = $this->message($style_model->getError(), 300);
            }
            echo $result;
        }else{
            $style_info = $style_model->where(array('style_id'=>$style_id))->find();
            $style_model = D('AdminStyle');
            $style_list = $style_model->index('role_id')->select();
            $this->assign('style_info', $style_info);
            $this->assign('style_list', $style_list);
            $roles_model = D('Roles');
            $roles_list = $roles_model->index('role_id')->select();
            $this->assign('roles_list', $roles_list);
            $this->display();
        }
    }
}
