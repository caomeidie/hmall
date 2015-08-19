<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class IndexController extends Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        
        $this->display();
    }
    
    public function login(){
        if(IS_POST){
            $verify = new Verify();
            if(!$verify->check(I('post.code'), 1)){
                $this->error("验证码有误");
            }
            $admin_model = D('Admin');
            $data['admin_name'] = I('post.name');
            $data['password'] = md5(I('post.password'));
            $data['status'] = 1;
            if($admin_info = $admin_model->field('admin_id, admin_name')->where($data)->find()){
                session('user_auth', array('info'=>$admin_info, 'time'=>time()));
                $this->success('登录成功', U('admin/index'));
            }else{
                $this->success('登录失败', U('index/login'));
            }
        }else{
            $user = session('user_auth');
            if(!empty($user) && !empty($user['info'])){
                if($user['time'] < time()-24*60){
                    session('user_auth', null);
                    session('[destroy]');
                    $this->error('登录超时！', U('index/login'));
                }else{
                    $this->redirect('admin/index');
                }
            } else {
                $this->display();
            }
        }        
    }
    
    /* 退出登录 */
    public function logout(){
        if(!empty(session('user_auth')) && session('user_auth')['info']){
            session('user_auth', null);
            session('[destroy]');
            $this->success('退出成功！', U('index/login'));
        } else {
            $this->redirect('index/login');
        }
    }
    
    public function verify(){
        $verify = new Verify();
        $verify->entry(1);
    }
}