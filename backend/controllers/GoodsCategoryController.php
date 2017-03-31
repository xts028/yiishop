<?php

namespace backend\controllers;

use backend\models\GoodsCategory;
use yii\db\Exception;
use yii\helpers\Json;
use yii\web\Request;

class GoodsCategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return 'index';
    }
/**
 * 测试
 */
    public function actionTest()
    {
        //添加父级分类
        $countries = new GoodsCategory(['name' => '国家']);
        $countries->parent_id=0;//父级分类的id
        $countries->makeRoot();
        //添加子分类
        $russia1 = new GoodsCategory(['name' => '中国']);
        $russia1->parent_id=1;//子分类的父级
        $russia1->prependTo($countries);//追加到父分类中
        $russia2 = new GoodsCategory(['name' => '美国']);
        $russia2->parent_id=1;
        $russia2->prependTo($countries);


}
/**
 * 测试插件ztree
 */
    public function actionZtree()
    {
        $countries = GoodsCategory::find()->all();
//        var_dump($countries);exit;
        return $this->renderPartial('ztree',['countries'=>$countries]);
}
/**
 * 添加数据
 */
    public function actionAdd()
    {
        $model = new GoodsCategory();
        $request = new Request();
        if($request->isPost){
            $model->load($request->post());
            if($model->validate()){
                if($model->parent_id == 0){
                    $model->makeRoot();
                }else{
                    //找到父级 把子分类添加到父类下面 子类的parent_id= 父级的id
                    $cate=GoodsCategory::findOne(['id'=>$model->parent_id]);
                    $model->prependTo($cate);
                }
                \Yii::$app->session->setFlash('success','添加成功');
//                return $this->refresh();//当页刷新
                return $this->redirect(['goods-category/list']);
            }
        }
        $models=GoodsCategory::find()->all();
        $models[]=['id'=>0,'parent_id'=>0,'name'=>'顶级分类'];//用数组的形式--添加顶级分类
        $models=Json::encode($models);//转换为json格式
        //展示视图;
        return $this->render('add',['model'=>$model,'models'=>$models]);
}
/**
 * 展示所有的分类
 */
    public function actionList()
    {
        $models = GoodsCategory::find()->all();
        return $this->render('list',['models'=>$models]);

}
    /**
     * 修改数据
     */
    public function actionEdit($id)
    {
        $model = GoodsCategory::findOne(['id'=>$id]);
        $request = new Request();
        if($request->isPost){
            $model->load($request->post());
            if($model->validate()){
                try{
                    if($model->parent_id == 0){
                        $model->makeRoot();
                    }else{
                        //找到父级 把子分类添加到父类下面 子类的parent_id= 父级的id
                        $cate=GoodsCategory::findOne(['id'=>$model->parent_id]);
                        $model->prependTo($cate);
                    }
                    \Yii::$app->session->setFlash('success','修改成功');
//                return $this->refresh();//当页刷新
                    return $this->redirect(['goods-category/list']);
                }catch (Exception $e){
//                    \Yii::$app->session->setFlash('danger',$e->getMessage());
                    $model->addError('parent_id',$e->getMessage());
                }

            }
        }
        $models=GoodsCategory::find()->all();
        $models[]=['id'=>0,'parent_id'=>0,'name'=>'顶级分类'];//用数组的形式--添加顶级分类
        $models=Json::encode($models);//转换为json格式
        //展示视图;
        return $this->render('add',['model'=>$model,'models'=>$models]);
    }
    /**
     * 删除
     */
//    public function actionDelete($id)
//    {
//        $model = GoodsCategory::findOne(["id"=>$id]);
////        var_dump($model);
//        $model->delete();
//        return $this->render(['goods-category/list']);
//
//        }

}
