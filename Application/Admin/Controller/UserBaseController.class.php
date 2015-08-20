<?php
namespace Admin\Controller;
use Think\Controller;
class UserBaseController extends Controller{
    public function __construct(){
        parent::__construct();
        // 获取当前用户ID
        if(self::is_login() == 0){// 还没登录 跳转到登录页面
            //echo "<script>testConfirmMsg('还未登录，请登陆！', '".U('index/login')."');</script>";
            //exit;
            $this->error('还未登录，请登陆！', U('index/login'));
        }
        $userinfo = session('user_auth');
        if($userinfo['time'] <= time()-24*60){
            session('user_auth', null);
            session('[destroy]');
            echo "<script>testConfirmMsg('登陆超时，请重新登陆！', '".U('index/login')."');</script>";
            exit;
        }else{
            session('user_auth', array('info'=>$userinfo['info'], 'time'=>time()));
            $this->assign('user_auth', $userinfo['info']);
        }
        
        //判断用户是否有权限操作当前action
        /*$admin_model = D('Admin');
        $style_id = $admin_model->field('style_id')->where(array('admin_id'=>$userinfo['info']['admin_id']))->find();
        
        $style_model = D('AdminStyle');
        $roles = $style_model->field('roles')->where(array('style_id'=>$style_id['style_id']))->find();
        
        $roles_arr = unserialize($roles['roles']);
                
        $roles_model = new Roles();
        $role = $roles_model->getRole(ACTION_NAME,'NAME',CONTROLLER_NAME);
        
        if(!$this->checkRole($role, $roles_arr)){
            echo "<script>alertMsg.error('您没有权限访问此模块，请与管理员联系！')</script>";
            exit;
        }
        */
    }
    /**
     * 信息提醒
     *
     */
    public function message($message, $code=200){
        return json_encode(array("statusCode"=>$code, "message"=>$message));
    }
    
    //检测用户是否登录
    private function is_login(){
        $user = session('user_auth');
        if (empty($user)) {
            return 0;
        } else {
            return $user_id = $user['info']['admin_id'] ? $user['info']['admin_id'] : 0;
        }
    }
    
    /**
     * 数据签名认证
     * @param  array  $data 被认证的数据
     * @return string       签名
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    private function data_auth_sign($data) {
        //数据类型检测
        if(!is_array($data)){
            $data = (array)$data;
        }
        ksort($data); //排序
        $code = http_build_query($data); //url编码并生成query字符串
        $sign = sha1($code); //生成签名
        return $sign;
    }
}