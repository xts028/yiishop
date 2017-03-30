<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/28/028
 * Time: 12:10
 */

namespace backend\controllers;


use backend\models\Brand;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Request;
use yii\web\UploadedFile;
use xj\uploadify\UploadAction;
use crazyfd\qiniu\Qiniu;

class BrandController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        //设置总页数;
        $pagetotal = Brand::find()->where(['!=','status',0])->count();
//        var_dump($pagetotal);
        //设置每页多少条数据;
        $pagesize=3;
        //实例化分页类;
        $page=new Pagination([
            'totalCount'=>$pagetotal,
            'pageSize'=>$pagesize
        ]);
        //查询数据;
        $brands=Brand::find()->where(['!=','status',0])->limit($page->limit)->offset($page->offset)->all();
        //分配数据;
        return $this->render('index',['brands'=>$brands,'page'=>$page]);
    }

    /**
     * 品牌的添加
     */
    public function actionAdd()
    {   //实例化品牌模型;
        $brand = new Brand();
        //实例化请求对象
        $request = new Request();
        //判断请求方式
        if($request->isPost){
            //加载数据
            $brand->load($request->post());
//            $brand->logo_file=UploadedFile::getInstance($brand,'logo_file');
            //验证
            if($brand->validate()){
                //logo名称
//                $logoName='upload/brand'.uniqid().'.'.$brand->logo_file->extension;
//                if($logoName){
//                    //移动上传文件
//                    $brand->logo_file->saveAs($logoName,false);//false不让删除临时文件;
//                    //把上传的文件复制给logo字段;
//                    $brand->logo=$logoName;
//                }
                $brand->save();
                //提示信息
                \Yii::$app->session->setFlash('success','上传成功');
                return $this->redirect(['brand/index']);
            }
        }
        //展示品牌添加视图
        return $this->render('add',['brand'=>$brand]);

    }
    /**
     * 品牌的修改
     */
    public function actionEdit($id)
    {   //实例化品牌模型;
        $brand = Brand::findOne(['id'=>$id]);
        //实例化请求对象
        $request = new Request();
        //判断请求方式
        if($request->isPost){
            //加载数据
            $brand->load($request->post());
//            $brand->logo_file=UploadedFile::getInstance($brand,'logo_file');
            //验证
            if($brand->validate()){
                //logo名称
//                $logoName='upload/brand'.uniqid().'.'.$brand->logo_file->extension;
//                if($logoName){
//                    //移动上传文件
//                    $brand->logo_file->saveAs($logoName,false);//false不让删除临时文件;
//                    //把上传的文件复制给logo字段;
//                    $brand->logo=$logoName;
//                }
                $brand->save();
                //提示信息
                \Yii::$app->session->setFlash('success','上传成功');
                return $this->redirect(['brand/index']);
            }
        }
        //展示品牌添加视图
        return $this->render('add',['brand'=>$brand]);
    }
    /**
     * 逻辑删除 把status=0的数据放到回收站
     */
    public function actionDel($id)
    {
        //找到要删除的数据
        $brand = Brand::findOne(['id'=>$id]);
        $brand->status=0;
        $brand->save();
        echo \Yii::$app->session->setFlash('success','删除成功');
        return $this->redirect(['brand/index']);
    }
    /**
     * 回收站
     */
    public function actionReuse()
    {
        //设置总页数;
        $pagetotal = Brand::find()->where(['=','status',0])->count();
//        var_dump($pagetotal);
        //设置每页多少条数据;
        $pagesize=3;
        //实例化分页类;
        $page=new Pagination([
            'totalCount'=>$pagetotal,
            'pageSize'=>$pagesize
        ]);
        //查询数据;
        $brands=Brand::find()->where(['=','status',0])->limit($page->limit)->offset($page->offset)->all();
        //分配数据;
        return $this->render('reuse',['brands'=>$brands,'page'=>$page]);

    }
    /**
     * 物理删除
     */
    public function actionDelete($id)
    {
        //找到要删除的数据
        $brand = Brand::findOne(['id'=>$id]);
        if($brand->delete()){
            echo \Yii::$app->session->setFlash('success','删除成功');
            return $this->redirect(['brand/reuse']);
        }
    }


    public function actions() {
        return [
            's-upload' => [
                'class' => UploadAction::className(),
                'basePath' => '@webroot/upload/brand',
                'baseUrl' => '@web/upload/brand',
                'enableCsrf' => true, // default
                'postFieldName' => 'Filedata', // default
                //BEGIN METHOD
//                'format' => [$this, 'methodName'],
                //END METHOD
                //BEGIN CLOSURE BY-HASH
                'overwriteIfExist' => true,
//                'format' => function (UploadAction $action) {
//                    $fileext = $action->uploadfile->getExtension();
//                    $filename = sha1_file($action->uploadfile->tempName);
//                    return "{$filename}.{$fileext}";
//                },
                //END CLOSURE BY-HASH
                //BEGIN CLOSURE BY TIME
                'format' => function (UploadAction $action) {
                    $fileext = $action->uploadfile->getExtension();
                    $filehash = sha1(uniqid() . time());
                    $p1 = substr($filehash, 0, 2);
                    $p2 = substr($filehash, 2, 2);
                    return "{$p1}/{$p2}/{$filehash}.{$fileext}";
                },
                //END CLOSURE BY TIME
                'validateOptions' => [
                    'extensions' => ['jpg', 'png','gif'],
                    'maxSize' => 1 * 1024 * 1024, //file size
                ],
                'beforeValidate' => function (UploadAction $action) {
                    //throw new Exception('test error');
                },
                'afterValidate' => function (UploadAction $action) {},
                'beforeSave' => function (UploadAction $action) {},
                'afterSave' => function (UploadAction $action) {
                    $action->output['fileUrl'] = $action->getWebUrl();
//                    $action->getFilename(); // "image/yyyymmddtimerand.jpg"
//                    $action->getWebUrl(); //  "baseUrl + filename, /upload/image/yyyymmddtimerand.jpg"
//                    $action->getSavePath(); // "/var/www/htdocs/upload/image/yyyymmddtimerand.jpg"
                },
            ],
        ];
    }
//测试七牛云上传
    public function actionTest()
    {
//        $ak = '2OwTO4Y31pDRHwa9Ih36zUXK028E9bu1tvsq8SVg';
//        $sk = 'peVmZ2zzGhfZ7T-7wn4JeY-qHxkJJy-XJfPye8zd';
//        $domain = 'http://onkkj6xdz.bkt.clouddn.com/';
//        $bucket = 'yiishop';
//        $qiniu = new Qiniu($ak, $sk,$domain, $bucket);
//        $qiniu=\Yii::$app->qiniu;//qiniu是组件
        $qiniu=\Yii::$app->qiniu;
        $key = time();
        $fileName=\Yii::getAlias('@webroot').'/upload/brand/91/ab/91ab72ae531d9e7eb3b6e4ca85aca98ee70850d5.jpg';
        $qiniu->uploadFile($fileName,$key);
        $url = $qiniu->getLink($key);
        var_dump($url);
    }
}