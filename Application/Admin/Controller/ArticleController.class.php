<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class ArticleController extends UserBaseController{
    public function index(){
        $article_model = D('Article');
        $count = $article_model->count();
        $pagination['count'] = $count;
        $pagination['page'] = is_numeric(I('post.pageNum')) ? I('post.pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(I('post.numPerPage')) ? I('post.numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $article_list = $article_model->order('article_id ASC')->page($pagination['page']+1, $pagination['perpage'])->select();
        $this->assign(array('article_list'=> $article_list, 'pagination'=>$pagination));
        $this->display();
    }
    
    public function add(){
        $article_model = D('Article');
        if(IS_POST){
            if($article_model->create()){
                if($article_model->add()){
                    $result = $this->message("添加成功");
                }else{
                    $result = $this->message("添加失败", 300);
                }
            }else{
                $result = $this->message($article_model->getError(), 300);
            }
            echo $result;
        }else{
            $ac_model = D('ArticleClass');
            $ac_list = $ac_model->select();
            $this->assign('ac_list', $ac_list);
            $this->display();
        }
    }
    
    public function del()
    {
        if(I('get.uid')){
            $article_id = I('get.uid');
        }elseif(I('post.check')){
            $article_id = I('post.check');
        }else{
            $article_id = 0;
        }
        if($article_id == 0){
            $result = $this->message("删除失败", "300");
        }else{
            $article_model = D('Article');
            $count = $article_model->delete($article_id);
            if($count === false)
                $result = $this->message("删除失败", "300");
            else
                $result = $this->message("删除".$count."条记录成功", "200");
        }
    
        echo $result;
    }
    
    public function edit()
    {
        $article_id = I('get.uid');
        $article_model = D('Article');
        if(IS_POST)
        {
            if($article_model->create(I('post.'),2,array('article_id'=>$article_id)))
            {
                if($article_model->where(array('article_id'=>$article_id))->save()){
                    $result = $this->message("修改成功");
                }else{
                    $result = $this->message("修改失败:".$article_model->getError(), 300);
                }
            }else{
                $result = $this->message($article_model->getError(), 300);
            }
            echo $result;
        }else{
            $ac_model = D('ArticleClass');
            $ac_list = $ac_model->index('ac_id')->select();
            $article_info = $article_model->where(array('article_id'=>$article_id))->find();
            $this->assign('article_info', $article_info);
            $this->assign('ac_list', $ac_list);
            $this->display();
        }
    }
}
