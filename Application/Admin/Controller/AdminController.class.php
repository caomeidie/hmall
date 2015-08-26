<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class AdminController extends UserBaseController{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->display();
    }
    public function lists(){
        $admin_model = D('Admin');
        if(I('post.admin_name') && I('post.admin_name') != ''){
            $condition['admin_name'] = array('LIKE', '%'.I('post.admin_name').'%');
            $this->assign('admin_name', I('post.admin_name'));
        }
        if(I('post.add_time') && I('post.add_time') != ''){
            $condition['addtime'] = array('EGT', strtotime(I('post.add_time')));
            $this->assign('add_time', I('post.add_time'));
        }
        if(I('post.style') && I('post.style') != ''){
            $condition['style_id'] = I('post.style');
            $this->assign('style', I('post.style'));
        }
        $count = $admin_model->where($condition)->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $admin_list = $admin_model->where($condition)->order('admin_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('admin_list'=> $admin_list, 'pagination'=>$pagination));
        $style_model = D('AdminStyle');
        $style_list = $style_model->index('style_id')->select();
        $this->assign('style_list', $style_list);
        $this->display();
    }
    
    public function add(){
        $admin_model=D('Admin');
        if(IS_POST)
        {
            if($admin_model->create())
            {
                if($admin_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($admin_model->getError(), 300);
            }
            echo $result;
        }else{
            $style_model = D('AdminStyle');
            $style_list = $style_model->select();
            $this->assign('style_list', $style_list);
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $admin_id = I('get.uid');
        }elseif(I('post.check')){
            $admin_id = I('post.check');
        }else{
            $admin_id = 0;
        }
        if($admin_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $admin_model = D('Admin');
            $count = $admin_model->delete($admin_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
        
        echo $result;
    }
    
    public function edit()
    {
        $admin_id = I('get.uid');
        $admin_model = D('Admin');
        if(IS_POST)
        {
            if($admin_model->create(I('post.'),2,array('admin_id'=>$admin_id)))
            {
                if($admin_model->where(array('admin_id'=>$admin_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$admin_model->getError(), 300);
                }
            }else{
                $result = $this->message($admin_model->getError(), 300);
            }
            echo $result;
        }else{
            $admin_info = $admin_model->where(array('admin_id'=>$admin_id))->find();
            $style_model = D('AdminStyle');
            $style_list = $style_model->select();
            $this->assign('admin_info', $admin_info);
            $this->assign('style_list', $style_list);
            $this->display();
        }
    }
}