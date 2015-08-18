<?php
namespace Admin\Controller;
use Think\Controller;

class AdminStyleController extends Controller{
    public function add(){
        if(IS_POST){
            
        }else{
            $roles_model = D('Roles');
            $roles_list = $roles_model->select();
            $this->assign('roles_list', $roles_list);
            $this->display();
        }
    }
}
