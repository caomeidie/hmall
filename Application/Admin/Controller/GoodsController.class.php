<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;
use Think\Upload;

class GoodsController extends UserBaseController{
    public function index(){
        $goods_model = D('Goods');
        $count = $goods_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $goods_list = $goods_model->order('goods_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('goods_list'=> $goods_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){        
        $goods_model=D('Goods');
        if(I('post.goods_name'))
        {
            if($goods_model->create()){
                $max_price = 0.00;
                $min_price = 0.00;
                if(I('post.price_spec')){
                    $price_spec_arr = I('post.price_spec');
                    sort($price_spec_arr);
                    $min_price = $price_spec_arr[0];
                    $max_price = $price_spec_arr[count($price_spec_arr)-1];
                }
                if(I('post.storage_spec')){
                    $storage = array_sum(I('post.storage_spec'));
                }
                $goods_model->goods_price = I('post.goods_price') ? I('post.goods_price') : $min_price;
                $goods_model->goods_max_price = $max_price;
                $goods_model->goods_min_price = $min_price;
                $goods_model->goods_storage = I('post.goods_storage') ? I('post.goods_storage') : $storage;
                $goods_model->goods_content = I('post.content');
                $goods_model->goods_image = I('post.image')[0];
                $goods_model->spec_open = I('post.goods_price') ? 0 : 1;
                $goods_model->attr_open = I('post.goods_attr') ? 1 : 0;
                
                if($goods_model->add()){
                    $goods_id = $goods_model->getLastInsID();
                    /*存储商品图片*/
                    if(I('post.image')){
                        $atta_model = D('Attachment');
                        foreach (I('post.image') as $image){
                            
                            $atta_data['related_id'] = $goods_id;
                            $atta_data['atta_name'] = $image;
                            $atta_data['atta_type'] = 'goods';
                            
                            if($atta_model->create($atta_data)){
                                $atta_model->add();
                            }
                        }
                    }
                    /*存储商品规格*/
                    if(I('post.price_spec')){
                        $svalue_model = D('GoodsSpecValue');
                        foreach ($price_spec_arr as $skey=>$svalue){
                            $seri_arr = explode('-', I('post.specs')[$skey]);
                            $svalue_data['goods_id'] = $goods_id;
                            $svalue_data['spec_goods_seri'] = serialize($seri_arr);
                            $svalue_data['spec_goods_price'] = $svalue;
                            $svalue_data['spec_goods_storage'] = I('post.storage_spec')[$skey];
                
                            if($svalue_model->create($svalue_data)){
                                $svalue_model->add();
                            }
                        }
                    }
                    /*存储商品属性*/
                    if(I('post.goods_attr')){
                        $avalue_model = D('GoodsAttrValue');
                        foreach (I('post.goods_attr') as $avalue){
                            if($avalue != 0){
                                $avalue_arr = explode('_', $avalue);
                                $avalue_data['goods_id'] = $goods_id;
                                $avalue_data['attr_id'] = $avalue_arr[0];
                                $avalue_data['attr_value'] = $avalue_arr[1];
                                
                                if($avalue_model->create($avalue_data)){
                                    $avalue_model->add();
                                }
                            }
                        }
                    }
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", "300");
                }
            }else{
                $result = $this->message("添加失败".$goods_model->getError(), "300");
            }
            
            echo $result;
            exit;
        }
        if(!I('get.step')){
            $gc_model = D('GoodsClass');
            $list = $gc_model->index('gc_id')->order('gc_id ASC')->select();
            $list_tree = self::treeList($list);
            
            $this->assign('list_tree', $list_tree);
            $this->display('add_one');
        }else{
            if(I('post.goodsclass'))
            {
                $gc_id = I('post.goodsclass');
                $gc_model = D('GoodsClass');
                $type_id = $gc_model->where(array('gc_id'=>$gc_id))->getField('type_id');
                if($type_id){
                    $type_model = D('GoodsType');
                    $type_info = $type_model->where(array('type_id'=>$type_id))->find();
                     
                    $attr_arr = unserialize($type_info['type_attr']);                    
                    $attr_model = D('GoodsAttr');
                    $attr_cond['attr_id'] = array('IN', $attr_arr);
                    $attr_info = $attr_model->where($attr_cond)->select();
                     
                    $spec_arr = unserialize($type_info['type_spec']);
                    $spec_model = D('GoodsSpec');
                    $spec_cond['spec_id'] = array('IN', $spec_arr);
                    $spec_info = $spec_model->index('spec_id')->where($spec_cond)->select();
                     
                    $brand_arr = unserialize($type_info['type_brand']);
                    $brand_model = D('GoodsBrand');
                    $brand_cond['brand_id'] = array('IN', $brand_arr);
                    $brand_info = $brand_model->where($brand_cond)->select();
                    
                    $this->assign(array('gc_id'=>$gc_id, 'type_id'=>$type_id, 'attr_info'=>$attr_info, 'spec_info'=>$spec_info, 'brand_info'=>$brand_info));
                    $this->display('add_two');
                }else{
                    $this->assign('gc_id', $gc_id);
                    $this->display('add_two');
                }
            }else{
                $result = $this->message("添加失败", "300");
                echo $result;
            }
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $goods_id = I('get.uid');
        }elseif(I('post.check')){
            $goods_id = I('post.check');
        }else{
            $goods_id = 0;
        }
        if($goods_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $goods_model = D('Goods');
            $count = $goods_model->delete($goods_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else{
                $atta_model = D('Attachment');
                $atta_model->where(array('related_id', $goods_id))->delete();
                $svalue_model = D('GoodsSpecValue');
                $svalue_model->where(array('goods_id', $goods_id))->delete();
                $avalue_model = D('GoodsAttrValue');
                $avalue_model->where(array('goods_id', $goods_id))->delete();
                $result = $this->message("删除".$count."条记录成功", "200");
            }
        }
        echo $result;
    }
    
    public function edit()
    {
        $goods_id = I('get.uid');
        $goods_model = D('Goods');
        
        if(I('post.goods_name'))
        {
            if($goods_model->create(I('post.'),2,array('goods_id'=>$goods_id))){
                $max_price = 0.00;
                $min_price = 0.00;
                if(I('post.price_spec')){
                    $price_spec_arr = I('post.price_spec');
                    sort($price_spec_arr);
                    $min_price = $price_spec_arr[0];
                    $max_price = $price_spec_arr[count($price_spec_arr)-1];
                }
                if(I('post.storage_spec')){
                    $storage = array_sum(I('post.storage_spec'));
                }
                
                $goods_model->goods_price = I('post.goods_price') ? I('post.goods_price') : $min_price;
                $goods_model->goods_max_price = $max_price;
                $goods_model->goods_min_price = $min_price;
                $goods_model->goods_storage = I('post.goods_storage') ? I('post.goods_storage') : $storage;
                $goods_model->goods_image = I('post.image')[0];
                $goods_model->goods_content = I('post.content');
                $goods_model->spec_open = I('post.goods_price') ? 0 : 1;
                $goods_model->attr_open = I('post.goods_attr') ? 1 : 0;
                
                if($goods_model->where(array('goods_id'=>$goods_id))->save()){
                    /*存储商品图片*/
                    if(I('post.image')){
                        $atta_model = D('Attachment');
                        $atta_model->where(array('related_id'=>$goods_id))->delete();
                        foreach (I('post.image') as $image){
                    
                            $atta_data['related_id'] = $goods_id;
                            $atta_data['atta_name'] = $image;
                            $atta_data['atta_type'] = 'goods';
                    
                            if($atta_model->create($atta_data)){
                                $atta_model->add();
                            }
                        }
                    }
                    /*存储商品规格*/
                    if(I('post.price_spec')){
                        $svalue_model = D('GoodsSpecValue');
                        $svalue_model->where(array('goods_id'=>$goods_id))->delete();
                        foreach ($price_spec_arr as $skey=>$svalue){
                            $seri_arr = explode('-', I('post.specs')[$skey]);
                            $svalue_data['goods_id'] = $goods_id;
                            $svalue_data['spec_goods_seri'] = serialize($seri_arr);
                            $svalue_data['spec_goods_price'] = $svalue;
                            $svalue_data['spec_goods_storage'] = I('post.storage_spec')[$skey];
                    
                            if($svalue_model->create($svalue_data)){
                                $svalue_model->add();
                            }
                        }
                    }
                    /*存储商品属性*/
                    if(I('post.goods_attr')){
                        $avalue_model = D('GoodsAttrValue');
                        $avalue_model->where(array('goods_id'=>$goods_id))->delete();
                        foreach (I('post.goods_attr') as $avalue){
                            if($avalue != 0){
                                $avalue_arr = explode('_', $avalue);
                                $avalue_data['goods_id'] = $goods_id;
                                $avalue_data['attr_id'] = $avalue_arr[0];
                                $avalue_data['attr_value'] = $avalue_arr[1];
                    
                                if($avalue_model->create($avalue_data)){
                                    $avalue_model->add();
                                }
                            }
                        }
                    }
                    $result = $this->message("修改成功", "200");
                }else{
                    $result = $this->message("修改失败", "300");
                }
            }else{
                $result = $this->message("修改失败:".$goods_model->getError(), "300");
            }
            
            echo $result;
            exit;
        }else{
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

    public function upload(){
        if(!empty($_FILES)){
            $upload = new Upload();
            $upload->exts = array('jpeg', 'jpg', 'png', 'gif');
            $upload->rootPath = './Public/upload/goods/';
            $result = $upload->uploadOne($_FILES['attach']);
            if($result){
                $result = $this->message($result['savepath'].$result['savename'], "200");
            }else{
                $result = $this->message("上传失败", "300");
            }
            echo $result;
        }
    }
}