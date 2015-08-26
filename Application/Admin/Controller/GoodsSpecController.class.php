<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class GoodsSpecController extends UserBaseController{
    public function index(){
        $spec_model = D('GoodsSpec');
        $count = $spec_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $spec_list = $spec_model->order('spec_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('spec_list'=> $spec_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        $spec_model=D('GoodsSpec');
        if(IS_POST)
        {
            if($spec_model->create())
            {
                $spec_model->spec_value = serialize(explode(',', $spec_model->spec_value));
                if($spec_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($spec_model->getError(), 300);
            }
            echo $result;
        }else{
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $spec_id = I('get.uid');
        }elseif(I('post.check')){
            $spec_id = I('post.check');
        }else{
            $spec_id = 0;
        }
        if($spec_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $spec_model = D('GoodsSpec');
            $count = $spec_model->delete($spec_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
        echo $result;
    }
    
    public function edit()
    {
        $spec_id = I('get.uid');
        $spec_model = D('GoodsSpec');
        if(IS_POST)
        {
            if($spec_model->create(I('post.'),2,array('spec_id'=>$spec_id)))
            {
                $spec_model->spec_value = serialize(explode(',', $spec_model->spec_value));
                if($spec_model->where(array('spec_id'=>$spec_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$spec_model->getError(), 300);
                }
            }else{
                $result = $this->message($spec_model->getError(), 300);
            }
            echo $result;
        }else{
            $spec_info = $spec_model->where(array('spec_id'=>$spec_id))->find();
            $this->assign('spec_info', $spec_info);
            $this->display();
        }
    }
}