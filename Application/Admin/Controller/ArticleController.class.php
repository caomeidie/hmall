<?php
namespace Admin\Controller;
use Admin\Controller\UserBaseController;

class ArticleController extends UserBaseController{
    public function index(){
        $article_model = D('Article');
        $count = $article_model->field('COUNT(article_id) as count')->find();
        $pagination['count'] = $count['count'];
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
}
