<?php
namespace Home\Controller;
use Home\Controller\HomeBaseController;
class GoodsController extends HomeBaseController {
    public function index(){
        $gc_model = D('GoodsClass');
        $list = $gc_model->index('gc_id')->order('gc_id ASC')->select();
        $list_tree = self::treeArray($list);
        
        $goods_model = D('Goods');
        $goods_list = $goods_model->order('goods_add_time DESC')->select();
        
        $this->assign(array('list_tree'=> $list_tree, 'goods_list'=> $goods_list));
        $this->display('index');
    }
    
    public function show(){
        $goods_id = I('id');
        
        $goods_model = D('Goods');
        $goods_info = $goods_model->where(array('goods_id'=>$goods_id))->find();
        $goods_info = $goods_model->where(array('goods_id'=>$goods_id))->find();
         
        $atta_model = D('Attachment');
        $goods_image = $atta_model->where(array('related_id'=>$goods_id))->select();
         
        $avalue_model = D('GoodsAttrValue');
        $goods_avalue = $avalue_model->where(array('goods_id'=>$goods_id))->select();
         
        $svalue_model = D('GoodsSpecValue');
        $goods_svalue = $svalue_model->where(array('goods_id'=>$goods_id))->select();
         
        if($goods_svalue){
            foreach($goods_svalue as $key=>$val){
                $goods_svalue[$key]['spec_goods_seri'] = unserialize($val['spec_goods_seri']);
            }
        }
         
         
        $gc_id = $goods_info['gc_id'];
        $gc_model = D('GoodsClass');
        
        $type_id = $gc_model->where(array('gc_id'=>$gc_id))->getField('type_id');
        if($type_id){
            $type_model = D('GoodsType');
            $type_info = $type_model->where(array('type_id'=>$type_id))->find();
             
            $attr_arr = unserialize($type_info['type_attr']);
            $attr_model = D('GoodsAttr');
            $attr_cond['attr_id'] = array('IN', $attr_arr);
            $attr_info = $attr_model->index('attr_id')->where($attr_cond)->select();
             
            $spec_arr = unserialize($type_info['type_spec']);
            $spec_model = D('GoodsSpec');
            $spec_cond['spec_id'] = array('IN', $spec_arr);
            $spec_info = $spec_model->index('spec_id')->where($spec_cond)->select();
             
            $brand_arr = unserialize($type_info['type_brand']);
            $brand_model = D('GoodsBrand');
            $brand_cond['brand_id'] = array('IN', $brand_arr);
            $brand_info = $brand_model->where($brand_cond)->select();
            $this->assign(array('goods_info'=>$goods_info, 'gc_id'=>$gc_id, 'type_id'=>$type_id, 'attr_info'=>$attr_info, 'spec_info'=>$spec_info, 'brand_info'=>$brand_info, 'goods_avalue'=>$goods_avalue, 'goods_svalue'=>$goods_svalue, 'goods_image'=>$goods_image));
            $this->display();
        }else{
            $this->assign(array('goods_info'=>$goods_info, 'gc_id'=>$gc_id, 'goods_image'=>$goods_image));
            $this->display();
        }
    }
}