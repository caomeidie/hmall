<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller{
    public function add(){
        $admin_model=D('Admin');
        if(IS_POST)
        {
            $model->attributes=$_POST['AdminForm'];
            if($model->validate())
            {
                if($model->addAdmin()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", "300");
                }
            }else{
                $result = $this->message("该用户名或手机号或邮箱已存在", "300");
            }
            echo $result;
            exit;
        }
        $style_model = D('AdminStyle');
        $style_list = $style_model->select();
        $this->assign('style_list', $style_list);
        $this->display();
    }
}