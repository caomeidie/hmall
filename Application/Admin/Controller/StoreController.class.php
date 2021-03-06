<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;
use Think\Upload;

class StoreController extends UserBaseController{
    public function index(){
        $store_model = D('Store');
        if($s = I('get.s')){
            switch ($s){
                case 'close':
                    $condition['store_state'] = 0;
                    break;
            }
        }
        $count = $store_model->where($condition)->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $store_list = $store_model->where($condition)->order('store_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('store_list'=> $store_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        $store_model=D('Store');
        if(IS_POST)
        {
            if($store_model->create())
            {
                if(!empty($_FILES['attach'])){
                    $upload = new Upload();
                    $upload->exts = array('jpeg', 'jpg', 'png', 'gif');
                    $upload->rootPath = './Public/upload/store/';
                    $result = $upload->uploadOne($_FILES['attach']);
                    if($result){
                        $store_model->store_logo = $result['savepath'].$result['savename'];
                    }
                }
                if($store_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($store_model->getError(), 300);
            }
            echo $result;
        }else{
            $sg_model = D('StoreGrade');
            $sg_list = $sg_model->order('sg_sort DESC')->select();
            $this->assign('sg_list',$sg_list);
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $store_id = I('get.uid');
        }elseif(I('post.check')){
            $store_id = I('post.check');
        }else{
            $store_id = 0;
        }
        if($store_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $store_model = D('Store');
            $count = $store_model->delete($store_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
    
        echo $result;
    }
    
    public function edit()
    {
        $store_id = I('get.uid');
        $store_model = D('Store');
        if(IS_POST)
        {
            if($store_model->create(I('post.'),2,array('store_id'=>$store_id)))
            {
                if(!empty($_FILES['attach'])){
                    $upload = new Upload();
                    $upload->exts = array('jpeg', 'jpg', 'png', 'gif');
                    $upload->rootPath = './Public/upload/store/';
                    $result = $upload->uploadOne($_FILES['attach']);
                    if($result){
                        $store_model->store_logo = $result['savepath'].$result['savename'];
                    }
                }
                if($store_model->where(array('store_id'=>$store_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$store_model->getError(), 300);
                }
            }else{
                $result = $this->message($store_model->getError(), 300);
            }
            echo $result;
        }else{
            $store_info = $store_model->where(array('store_id'=>$store_id))->find();
            $this->assign('store_info', $store_info);
            $sg_model = D('StoreGrade');
            $sg_list = $sg_model->order('sg_sort DESC')->select();
            $this->assign('sg_list', $sg_list);
            $this->display();
        }
    }
}