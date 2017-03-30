<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29/029
 * Time: 11:50
 */

namespace backend\controllers;


use backend\models\Article;
use backend\models\ArticleDetail;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Request;

class ArticleController extends Controller
{
     //
    public function actionList()
    {
        $pagetoal = Article::find()->count();
        $pagesize= 3;
        $page =new Pagination([
            'totalCount'=>$pagetoal,
            'pageSize'=>$pagesize
        ]);
        //查出所有的数据
        $articles=Article::find()->limit($page->limit)->offset($page->offset)->all();
        return $this->render('list',['articles'=>$articles,'page'=>$page]);
    }
    /**
     * 添加文章
     */
    public function actionAdd()
    {
        $article=new Article();
        $detail=new ArticleDetail();
        $request =new Request();
        if($request->isPost){
            $detail->load($request->post());
            $article->load($request->post());
            if($detail->validate() && $article->validate()){
                $article->inputtime=time();
                $article->save();
                $detail->article_id=$article->id;
                $detail->save();
                \Yii::$app->session->setFlash('success','添加成功');
                return $this->redirect(['article/list']);
            }
        }
        //展示页面
        return $this->render('add',['article'=>$article,'detail'=>$detail]);
    }
    /**
     * 修改
     */
    public function actionEdit($id)
    {
        $article=Article::findOne(['id'=>$id]);
        $detail=ArticleDetail::findOne(['article_id'=>$id]);
        $request =new Request();
        if($request->isPost){
            $detail->load($request->post());
            $article->load($request->post());
            if($detail->validate() && $article->validate()){
                $article->inputtime=time();
                $article->save();
                $detail->article_id=$article->id;
                $detail->save();
                \Yii::$app->session->setFlash('success','修改成功');
                return $this->redirect(['article/list']);
            }
        }
        //展示页面
        return $this->render('add',['article'=>$article,'detail'=>$detail]);
    }
    /**
     * sc
     */
    public function actionDel($id)
    {
        $article=Article::findOne(['id'=>$id]);
        $detail=ArticleDetail::findOne(['article_id'=>$id]);
        $article->delete();
        $detail->delete();
        echo \Yii::$app->session->setFlash('success','删除成功');
        return $this->redirect(['article/list']);
    }
}