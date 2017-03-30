<h1>品牌分页</h1>
<?=\yii\bootstrap\Html::a('添加',['brand/add'],['class'=>'btn btn-success btn-xs'])?>

<?=\yii\bootstrap\Html::a('回收站',['brand/reuse'],['class'=>'btn btn-info btn-xs'])?>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>品牌名称</th>
        <th>LOGO</th>
        <th>排序</th>
        <th>状态</th>
        <th>操作
        </th>
    </tr>
    <?php foreach ($brands as $brand):?>
    <tr>
        <td><?=$brand->id?></td>
        <td><?=$brand->name?></td>
        <td><?=\yii\bootstrap\Html::img('@web'.$brand->logo,['style'=>'width:50px'])?></td>
        <td><?=$brand->sort?></td>
        <td><?=\backend\models\Brand::$status_options[$brand->status]?></td>
        <td>
            <?=\yii\bootstrap\Html::a('编辑',['brand/edit','id'=>$brand->id],['class'=>'btn btn-warning btn-xs'])?>
            <?=\yii\bootstrap\Html::a('删除',['brand/del','id'=>$brand->id],['class'=>'btn btn-danger btn-xs'])?>

        </td>
    </tr>
    <?php endforeach;?>
</table>
<?php
 echo \yii\widgets\LinkPager::widget([
        'pagination'=>$page,
     'nextPageLabel'=>'下一页',
     'prevPageLabel'=>'上一页'
]);
?>
