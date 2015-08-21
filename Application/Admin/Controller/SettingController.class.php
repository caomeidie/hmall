<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;
use Think\Upload;
class SettingController extends UserBaseController{
    public function index(){
        $setting_model = D('Setting');
        $setting_list = $setting_model->where(array('type_id'=>1))->index('setting_key')->select();
        $this->assign('setting_list',$setting_list);
		$this->display();
    }
    
    public function save()
    {
        $setting_model = D('Setting');
        
        $setting_model->where(array('setting_key' => 'site_name'))->setField('setting_val', I('post.name'));
        $setting_model->where(array('setting_key' => 'site_phone'))->setField('setting_val', I('post.phone'));
        $setting_model->where(array('setting_key' => 'site_email'))->setField('setting_val', I('post.email'));
        $setting_model->where(array('setting_key' => 'icp_number'))->setField('setting_val', I('post.icp'));
        if(!empty($_FILES['attach'])){
            $upload = new Upload();
            $upload->exts = array('jpeg', 'jpg', 'png', 'gif');
            $upload->rootPath = './Public/upload/setting/';
            $result = $upload->uploadOne($_FILES['attach']);
            if($result){
                $setting_model->where(array('setting_key' => 'site_logo'))->setField('setting_val', $result['savepath'].$result['savename']);
            }
        }
        if(!$setting_model->getError()){
            echo $this->message("编辑成功");
        }else{
            echo $this->message("编辑失败", "300");
        }
    }
    
    public function email()
    {
        $setting_model = D('Setting');
        $setting_list = $setting_model->where(array('type_id'=>2))->index('setting_key')->select();
        $this->assign('setting_list',$setting_list);
        $this->display();
    }
    
    public function saveEmail()
    {
        $setting_model = D('Setting');
        
        $setting_model->where(array('setting_key' => 'email_enable'))->setField('setting_val', I('post.open'));
        $setting_model->where(array('setting_key' => 'email_host'))->setField('setting_val', I('post.host'));
        $setting_model->where(array('setting_key' => 'email_port'))->setField('setting_val', I('post.port'));
        $setting_model->where(array('setting_key' => 'email_addr'))->setField('setting_val', I('post.addr'));
        $setting_model->where(array('setting_key' => 'email_user'))->setField('setting_val', I('post.user'));
        $setting_model->where(array('setting_key' => 'email_pass'))->setField('setting_val', md5(I('post.pass')));
        if(!$setting_model->getError()){
            echo $this->message("编辑成功");
        }else{
            echo $this->message("编辑失败", "300");
        }
    }
}