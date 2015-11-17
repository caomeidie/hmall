<?php
namespace Home\Controller;
use Think\Controller;
class HomeBaseController extends Controller{
    public function __construct(){
        parent::__construct();
        $userinfo = session('member_auth');
        if($userinfo){
            if($userinfo['time'] <= time()-24*60){
                session('member_auth', null);
                session('[destroy]');
                echo "<script>testConfirmMsg('登陆超时，请重新登陆！', '".U('login/index')."');</script>";
                exit;
            }else{
                session('member_auth', array('info'=>$userinfo['info'], 'time'=>time()));
                $this->assign('member_auth', $userinfo['info']);
            }
        }        
    }
    /**
     * 信息提醒
     *
     */
    public function message($message, $code=200){
        return json_encode(array("statusCode"=>$code, "message"=>$message));
    }
}