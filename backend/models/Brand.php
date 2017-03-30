<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property integer $id
 * @property string $name
 * @property string $intro
 * @property string $logo
 * @property integer $sort
 * @property integer $status
 */
class Brand extends \yii\db\ActiveRecord
{
    //自定义logo上传的字段
//    public $logo_file;
    public static $status_options=['-1'=>'隐藏',0=>'删除',1=>'正常'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status','logo'], 'required'],
            [['intro'], 'string'],
            [['sort', 'status'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['logo'], 'string', 'max' => 255],
//            ['logo_file','file','extensions'=>['gif','png','jpg','bmp']],//文件上传的后缀
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '品牌名称',
            'intro' => '品牌简介',
            'logo' => 'LOGO',
            'sort' => '排序',
            'status' => '状态',
        ];
    }

}
