<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class GoodsClassController extends UserBaseController{
    public function index(){
        $gc_model = D('GoodsClass');
        $list = $gc_model->index('gc_id')->order('gc_id ASC')->select();
        $list_tree = self::treeList($list);
        
        $this->assign('list_tree', $list_tree);
        $this->display();
    }
    
    public function add(){
        $gc_model=D('GoodsClass');
        if(IS_POST)
        {
            if($gc_model->create())
            {
                if($gc_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($gc_model->getError(), 300);
            }
            echo $result;
        }else{
            $type_model = D('GoodsType');
            $type_list = $type_model->index("type_id")->select();
            $gc_model = D('GoodsClass');
            $gc_list = $gc_model->index('gc_id')->order('gc_id ASC')->select();
            $list_tree = self::treeList($gc_list);
            
            $this->assign(array('list_tree'=> $list_tree, 'type_list'=> $type_list));
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $gc_id = I('get.uid');
        }elseif(I('post.check')){
            $gc_id = I('post.check');
        }else{
            $gc_id = 0;
        }
        if($gc_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $gc_model = D('GoodsClass');
            $count = $gc_model->delete($gc_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
        echo $result;
    }
    
    public function edit()
    {
        $gc_id = I('get.uid');
        $gc_model = D('GoodsClass');
        if(IS_POST)
        {
            if($gc_model->create(I('post.'),2,array('gc_id'=>$gc_id)))
            {
                if($gc_model->where(array('gc_id'=>$gc_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$gc_model->getError(), 300);
                }
            }else{
                $result = $this->message($gc_model->getError(), 300);
            }
            echo $result;
        }else{
            $gc_info = $gc_model->where(array('gc_id'=>$gc_id))->find();
            $type_model = D('GoodsType');
            $type_list = $type_model->index("type_id")->select();
            $gc_list = $gc_model->index('gc_id')->order('gc_id ASC')->select();
            $list_tree = self::treeList($gc_list);
            
            $this->assign(array('gc_info'=> $gc_info, 'list_tree'=> $list_tree, 'type_list'=> $type_list,));            
            $this->display();
        }
    }
    

    private function treeArray($lists){
        $tree = array();
         
        foreach($lists as $list){
            if(isset($lists[$list['gc_parent_id']])){
                $lists[$list['gc_parent_id']]['son'][] = &$lists[$list['gc_id']];
            }else{
                $tree[] = &$lists[$list['gc_id']];
            }
        }
        return $tree;
    }
    
    private function treeList($lists, $pid=0, $level=0, $html='--'){
        static $tree = array();
        foreach($lists as $list){
            if($list['gc_parent_id'] == $pid){
                $t['html'] = str_repeat($html, $level);
                $t['val'] = $list;
                $tree[] = $t;
                self::treeList($lists, $list['gc_id'], $level+1);
            }
        }
        return $tree;
    }
}