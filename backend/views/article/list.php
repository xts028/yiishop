<?=\yii\bootstrap\Html::a('添加',['article/add'],['class'=>'btn btn-danger btn-sm'])?>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>文章名称</th>
        <th>文章分类</th>
        <th>简介</th>
        <th>状态</th>
        <th>排序</th>
        <th>录入时间</th>
        <th>操作</th>
    </tr>
    <?php foreach ($articles as $article):?>
    <tr>
        <td><?=$article->id?></td>
        <td><?=$article->name?></td>
        <td><?=$article->articleCategory->name?></td>
        <td><?=$article->intro?></td>
        <td><?=\backend\models\Article::$status_options[$article->status]?></td>
        <td><?=$article->sort?></td>
        <td><?=date("Y-m-d H:i:s",$article->inputtime)?></td>
        <td>
            <?=\yii\bootstrap\Html::a('编辑',['article/edit','id'=>$article->id],['class'=>'btn btn-warning btn-sm'])?>
            <?=\yii\bootstrap\Html::a('删除',['article/del','id'=>$article->id],['class'=>'btn btn-danger btn-sm'])?>
        </td>
    </tr>
    <?php endforeach;?>
</table>
<?=
\yii\widgets\LinkPager::widget([
    'pagination'=>$page,
    'nextPageLabel'=>'下一页',
    'prevPageLabel'=>'上一页'
])
?>