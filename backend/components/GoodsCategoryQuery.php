<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/30/030
 * Time: 14:20
 */

namespace backend\components;


use creocoder\nestedsets\NestedSetsQueryBehavior;
use yii\db\ActiveQuery;

class GoodsCategoryQuery extends ActiveQuery
{
    /**
     * @return array
     * NestedSetsQueryBehavior
     */
    public function behaviors() {
        return [
           NestedSetsQueryBehavior::className(),
        ];
    }
}