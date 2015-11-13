<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $gc_model = D('GoodsClass');
        $list = $gc_model->index('gc_id')->order('gc_id ASC')->select();
        $list_tree = self::treeArray($list);
        
        $goods_model = D('Goods');
        $goods_list = $goods_model->order('goods_add_time DESC')->select();
        
        $this->assign(array('list_tree'=> $list_tree, 'goods_list'=> $goods_list));
        $this->display('index');
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
}