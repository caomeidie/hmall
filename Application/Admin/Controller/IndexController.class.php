<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class IndexController extends Controller {
    public function index(){
        
        $this->display();
    }
    
    public function login(){
        if(IS_POST){
            var_dump(I('post.'));exit;
        }else{
            $this->display();
        }        
    }
    
    public function verify(){
        $verify = new Verify();
        $verify->entry(1);
    }
}