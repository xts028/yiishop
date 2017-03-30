<h3>分页列表</h3>
<?=\yii\bootstrap\Html::a('添加',['article-category/add'],['class'=>'btn btn-success btn-sm'])?>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>分类名称</th>
        <th>状态</th>
        <th>排序</th>
        <th>简介</th>
        <th>帮助与否</th>
        <th>操作</th>

    </tr>
    <?php foreach ($categorys as $category):?>
    <tr>
        <td><?=$category->id?></td>
        <td><?=$category->name?></td>
        <td><?=\backend\models\ArticleCategory::$status_options[$category->status]?></td>
        <td><?=$category->sort?></td>
        <td><?=$category->intro?></td>
        <td><?=\backend\models\ArticleCategory::$is_helps[$category->is_help]?></td>
        <td><?=\yii\bootstrap\Html::a('修改',['article-category/edit','id'=>$category->id],['class'=>'btn btn-warning btn-sm'])?>
            <?=\yii\bootstrap\Html::a("删除",['article-category/del','id'=>$category->id],['class'=>'btn btn-danger btn-sm'])?>
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