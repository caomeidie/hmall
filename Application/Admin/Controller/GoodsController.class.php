<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;
use Think\Upload;

class GoodsController extends UserBaseController{
    public function index(){
        $goods_model = D('Goods');
        $count = $goods_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $goods_list = $goods_model->order('goods_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('goods_list'=> $goods_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        $goods_model=D('Goods');
        if(IS_POST)
        {
            if($goods_model->create())
            {
                if(!empty($_FILES['attach'])){
                    $upload = new Upload();
                    $upload->exts = array('jpeg', 'jpg', 'png', 'gif');
                    $upload->rootPath = './Public/upload/goods/';
                    $result = $upload->uploadOne($_FILES['attach']);
                    if($result){
                        $goods_model->goods_pic = $result['savepath'].$result['savename'];
                    }
                }
                if($goods_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($goods_model->getError(), 300);
            }
            echo $result;
        }else{
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $goods_id = I('get.uid');
        }elseif(I('post.check')){
            $goods_id = I('post.check');
        }else{
            $goods_id = 0;
        }
        if($goods_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $goods_model = D('Goods');
            $count = $goods_model->delete($goods_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
        echo $result;
    }
    
    public function edit()
    {
        $goods_id = I('get.uid');
        $goods_model = D('Goods');
        if(IS_POST)
        {
            if($goods_model->create(I('post.'),2,array('goods_id'=>$goods_id)))
            {
                if(!empty($_FILES['attach'])){
                    $upload = new Upload();
                    $upload->exts = array('jpeg', 'jpg', 'png', 'gif');
                    $upload->rootPath = './Public/upload/goods/';
                    $result = $upload->uploadOne($_FILES['attach']);
                    if($result){
                        $goods_model->goods_pic = $result['savepath'].$result['savename'];
                    }
                }
                if($goods_model->where(array('goods_id'=>$goods_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$goods_model->getError(), 300);
                }
            }else{
                $result = $this->message($goods_model->getError(), 300);
            }
            echo $result;
        }else{
            $goods_info = $goods_model->where(array('goods_id'=>$goods_id))->find();
            $this->assign('goods_info', $goods_info);
            $this->display();
        }
    }
}