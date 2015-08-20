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
        if($s = I('get.s')){
            switch ($s){
                case 'admin':
                    $condition['style_id'] = 1;
                    break;
                case 'editor':
                    $condition['style_id'] = 2;
                    break;
                case 'finance':
                    $condition['style_id'] = 3;
                    break;
                case 'service':
                    $condition['style_id'] = 4;
                    break;
            }
        }
        $count = $admin_model->field('COUNT(admin_id) as count')->where($condition)->find();
        $pagination['count'] = $count['count'];
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $admin_list = $admin_model->where($condition)->order('admin_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('admin_list'=> $admin_list, 'pagination'=>$pagination));
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
}