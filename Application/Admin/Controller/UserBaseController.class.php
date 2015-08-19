<?php
namespace Admin\Controller;
use Think\Controller;
class UserBaseController extends Controller{
    public function __construct(){
        parent::__construct();
    }
    /**
     * 信息提醒
     *
     */
    public function message($message, $code=200){
        return json_encode(array("statusCode"=>$code, "message"=>$message));
    }
}