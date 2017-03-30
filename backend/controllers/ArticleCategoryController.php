<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29/029
 * Time: 13:00
 */

namespace backend\controllers;


use backend\models\ArticleCategory;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Request;

class ArticleCategoryController extends Controller
{
       /**
        * 添加文章分类
        */
    public function actionAdd()
    {
        //实例化模型
        $model= new ArticleCategory();
        //实例化请求方式
        $request= new Request();
        //判断请求方式
        if($request->isPost){
            //加载数据
            $model->load($request->post());
            //验证
            if($model->validate()){
                $model->save();
                //提示
                \Yii::$app->session->setFlash('success','添加成功');
                //跳转
                return $this->redirect(['article-category/index']);
            }
        }
        return $this->render('add',['model'=>$model]);
    }
    /**
     * 展示分类列表页
     */
    public function actionIndex()
    {
        //查询出所有的数据
        $pagetotal = ArticleCategory::find()->count();
        //设置每页条数;
        $pagesize = 3;
        //实例化分页类;
        $page = new Pagination([
            'totalCount'=>$pagetotal,
            'pageSize'=>$pagesize
        ]);
        //查询出所有的数据;
        $categorys = ArticleCategory::find()->limit($page->limit)->offset($page->offset)->all();
        //分配数据
        return $this->render('index',['page'=>$page,'categorys'=>$categorys]);
    }
    /**
     * 修改文章分类
     */
    public function actionEdit($id)
    {
        //实例化模型
        $model= ArticleCategory::findOne(['id'=>$id]);
        //实例化请求方式
        $request= new Request();
        //判断请求方式
        if($request->isPost){
            //加载数据
            $model->load($request->post());
            //验证
            if($model->validate()){
                $model->save();
                //提示
                \Yii::$app->session->setFlash('success','修改成功');
                //跳转
                return $this->redirect(['article-category/index']);
            }
        }
        return $this->render('add',['model'=>$model]);
    }
    /**
     * 删除
     */
    public function actionDel($id)
    {
        //实例化模型
        $model= ArticleCategory::findOne(['id'=>$id]);
        //删除
        if($model->delete()){
            //提示信息
            \Yii::$app->session->setFlash('success','删除成功');
            //跳转;
            return $this->redirect(['article-category/index']);
        }
    }
}