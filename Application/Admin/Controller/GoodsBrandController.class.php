<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;
use Think\Upload;

class GoodsBrandController extends UserBaseController{
    public function index(){
        $brand_model = D('GoodsBrand');
        $count = $brand_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $brand_list = $brand_model->order('brand_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('brand_list'=> $brand_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        $brand_model=D('GoodsBrand');
        if(IS_POST)
        {
            if($brand_model->create())
            {
                if(!empty($_FILES['attach'])){
                    $upload = new Upload();
                    $upload->exts = array('jpeg', 'jpg', 'png', 'gif');
                    $upload->rootPath = './Public/upload/brand/';
                    $result = $upload->uploadOne($_FILES['attach']);
                    if($result){
                        $brand_model->brand_pic = $result['savepath'].$result['savename'];
                    }
                }
                if($brand_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($brand_model->getError(), 300);
            }
            echo $result;
        }else{
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $brand_id = I('get.uid');
        }elseif(I('post.check')){
            $brand_id = I('post.check');
        }else{
            $brand_id = 0;
        }
        if($brand_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $brand_model = D('GoodsBrand');
            $count = $brand_model->delete($brand_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
        echo $result;
    }
    
    public function edit()
    {
        $brand_id = I('get.uid');
        $brand_model = D('GoodsBrand');
        if(IS_POST)
        {
            if($brand_model->create(I('post.'),2,array('brand_id'=>$brand_id)))
            {
                if(!empty($_FILES['attach'])){
                    $upload = new Upload();
                    $upload->exts = array('jpeg', 'jpg', 'png', 'gif');
                    $upload->rootPath = './Public/upload/brand/';
                    $result = $upload->uploadOne($_FILES['attach']);
                    if($result){
                        $brand_model->brand_pic = $result['savepath'].$result['savename'];
                    }
                }
                if($brand_model->where(array('brand_id'=>$brand_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$brand_model->getError(), 300);
                }
            }else{
                $result = $this->message($brand_model->getError(), 300);
            }
            echo $result;
        }else{
            $brand_info = $brand_model->where(array('brand_id'=>$brand_id))->find();
            $this->assign('brand_info', $brand_info);
            $this->display();
        }
    }
}