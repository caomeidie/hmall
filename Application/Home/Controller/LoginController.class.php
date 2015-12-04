<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller {
    
    //登录
    public function index(){
        if(IS_POST){
            $verify = new Verify();
            if(!$verify->check(I('post.code'), 1)){
                $this->error("验证码有误");
            }
            $member_model = D('Member');
            $data['member_name'] = I('post.name');
            $data['member_passwd'] = md5(I('post.password'));
            $data['member_state'] = 1;
            if($member_info = $member_model->field('member_id, member_name')->where($data)->find()){
                session('member_auth', array('info'=>$member_info, 'time'=>time()));
                $this->success('登录成功', U('member/index'));
            }else{
                $this->success('登录失败', U('login/index'));
            }
        }else{
            $user = session('member_auth');
            if(!empty($user) && !empty($user['info'])){
                if($user['time'] < time()-24*60){
                    session('member_auth', null);
                    session('[destroy]');
                    $this->error('登录超时！', U('login/index'));
                }else{
                    $this->redirect('member/index');
                }
            } else {
                $this->display('index');
            }
        }
    }
    
    //注册
    public function regist(){
        if(IS_POST){
            /* 检测验证码  */
            $verify = new Verify();
            if(!$verify->check(I('post.code'), 1)){
                $this->error("验证码有误");
            }
            
            $password = trim(I('post.password'));
            $repassword = trim(I('post.confirmpwd'));
            /* 检测密码 */
            if($password != $repassword){
                $this->error('密码和重复密码不一致！');
            }
            $member_model = D('Member');
            $data['member_name'] = I('post.name');
            $data['member_mobile'] = I('post.mobile');
            $data['member_email'] = I('post.email');
            $data['member_passwd'] = md5($password);
            $data['member_state'] = 1;
            if($member_info = $member_model->field('member_id, member_name')->where($data)->find()){
                session('member_auth', array('info'=>$member_info, 'time'=>time()));
                $this->success('登录成功', U('member/index'));
            }else{
                $this->success('登录失败', U('login/index'));
            }
        }else{
            //已登录用户先退出
            if(!empty(session('member_auth')) && session('member_auth')['info']){
                session('member_auth', null);
                session('[destroy]');
            }
            $this->display('regist');
        }
    }
    
    /* 退出登录 */
    public function logout(){
        if(!empty(session('member_auth')) && session('member_auth')['info']){
            session('member_auth', null);
            session('[destroy]');
            $this->success('退出成功！', U('login/index'));
        } else {
            $this->redirect('login/index');
        }
    }
    
    //验证码
    public function verify(){
        $verify = new Verify();
        $verify->entry(1);
    }
}