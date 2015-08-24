<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class ArticleClassController extends UserBaseController{
    public function index(){
        $ac_model = D('ArticleClass');
        $count = $ac_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $ac_list = $ac_model->order('ac_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('ac_list'=> $ac_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        $ac_model = D('ArticleClass');
        if(IS_POST){
            if($ac_model->create()){
                if($ac_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($ac_model->getError(), 300);
            }
            echo $result;
        }else{
            $ac_list = $ac_model->select();
            $this->assign('ac_list', $ac_list);
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $ac_id = I('get.uid');
        }elseif(I('post.check')){
            $ac_id = I('post.check');
        }else{
            $ac_id = 0;
        }
        if($ac_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $ac_model = D('ArticleClass');
            $count = $ac_model->delete($ac_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
    
        echo $result;
    }
    
    public function edit()
    {
        $ac_id = I('get.uid');
        $ac_model = D('ArticleClass');
        if(IS_POST)
        {
            if($ac_model->create(I('post.'),2,array('ac_id'=>$ac_id)))
            {
                if($ac_model->where(array('ac_id'=>$ac_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$ac_model->getError(), 300);
                }
            }else{
                $result = $this->message($ac_model->getError(), 300);
            }
            echo $result;
        }else{
            $ac_info = $ac_model->where(array('ac_id'=>$ac_id))->find();
            $ac_list = $ac_model->select();
            $this->assign('ac_info', $ac_info);
            $this->assign('ac_list', $ac_list);
            $this->display();
        }
    }
}
