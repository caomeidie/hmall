<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class GoodsAttrController extends UserBaseController{
    public function index(){
        $attr_model = D('GoodsAttr');
        $count = $attr_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $attr_list = $attr_model->order('attr_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('attr_list'=> $attr_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        $attr_model=D('GoodsAttr');
        if(IS_POST)
        {
            if($attr_model->create())
            {
                $attr_model->attr_value = serialize(explode(',', $attr_model->attr_value));
                if($attr_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($attr_model->getError(), 300);
            }
            echo $result;
        }else{
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $attr_id = I('get.uid');
        }elseif(I('post.check')){
            $attr_id = I('post.check');
        }else{
            $attr_id = 0;
        }
        if($attr_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $attr_model = D('GoodsAttr');
            $count = $attr_model->delete($attr_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
    
        echo $result;
    }
    
    public function edit()
    {
        $attr_id = I('get.uid');
        $attr_model = D('GoodsAttr');
        if(IS_POST)
        {
            if($attr_model->create(I('post.'),2,array('attr_id'=>$attr_id)))
            {
                $attr_model->attr_value = serialize(explode(',', $attr_model->attr_value));
                if($attr_model->where(array('attr_id'=>$attr_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$attr_model->getError(), 300);
                }
            }else{
                $result = $this->message($attr_model->getError(), 300);
            }
            echo $result;
        }else{
            $attr_info = $attr_model->where(array('attr_id'=>$attr_id))->find();
            $this->assign('attr_info', $attr_info);
            $this->display();
        }
    }
}