<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class GoodsTypeController extends UserBaseController{
    public function index(){
        $type_model = D('GoodsType');
        $count = $type_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $type_list = $type_model->order('type_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $spec_model = D('GoodsSpec');
        $spec_list = $spec_model->index("spec_id")->select();
        
        $attr_model = D('GoodsAttr');
        $attr_list = $attr_model->index("attr_id")->select();
        
        $brand_model = D('GoodsBrand');
        $brand_list = $brand_model->index("brand_id")->select();
        $this->assign(array('type_list'=> $type_list, 'pagination'=>$pagination, 'spec_list'=> $spec_list, 'attr_list'=> $attr_list, 'brand_list'=> $brand_list,));
        $this->display();
    }
    
    public function add(){
        $type_model=D('GoodsType');
        if(IS_POST)
        {
            if($type_model->create())
            {
                $type_model->type_brand = $type_model->type_brand ? serialize($type_model->type_brand) : '';
                $type_model->type_attr = $type_model->type_attr ? serialize($type_model->type_attr) : '';
                $type_model->type_spec = $type_model->type_spec ? serialize($type_model->type_spec) : '';
                if($type_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($type_model->getError(), 300);
            }
            echo $result;
        }else{
            $spec_model = D('GoodsSpec');
            $spec_list = $spec_model->index("spec_id")->select();
            
            $attr_model = D('GoodsAttr');
            $attr_list = $attr_model->index("attr_id")->select();
            
            $brand_model = D('GoodsBrand');
            $brand_list = $brand_model->index("brand_id")->select();
            
            $this->assign(array('spec_list'=> $spec_list, 'attr_list'=> $attr_list, 'brand_list'=> $brand_list,));
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $type_id = I('get.uid');
        }elseif(I('post.check')){
            $type_id = I('post.check');
        }else{
            $type_id = 0;
        }
        if($type_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $type_model = D('GoodsType');
            $count = $type_model->delete($type_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
        echo $result;
    }
    
    public function edit()
    {
        $type_id = I('get.uid');
        $type_model = D('GoodsType');
        if(IS_POST)
        {
            if($type_model->create(I('post.'),2,array('type_id'=>$type_id)))
            {
                $type_model->type_brand = $type_model->type_brand ? serialize($type_model->type_brand) : '';
                $type_model->type_attr = $type_model->type_attr ? serialize($type_model->type_attr) : '';
                $type_model->type_spec = $type_model->type_spec ? serialize($type_model->type_spec) : '';
                if($type_model->where(array('type_id'=>$type_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$type_model->getError(), 300);
                }
            }else{
                $result = $this->message($type_model->getError(), 300);
            }
            echo $result;
        }else{
            $type_info = $type_model->where(array('type_id'=>$type_id))->find();
            $spec_model = D('GoodsSpec');
            $spec_list = $spec_model->index("spec_id")->select();
            
            $attr_model = D('GoodsAttr');
            $attr_list = $attr_model->index("attr_id")->select();
            
            $brand_model = D('GoodsBrand');
            $brand_list = $brand_model->index("brand_id")->select();
            
            $this->assign(array('type_info'=> $type_info, 'spec_list'=> $spec_list, 'attr_list'=> $attr_list, 'brand_list'=> $brand_list,));
            $this->display();
        }
    }
}