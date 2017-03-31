<?php
/**
 * @var $this \yii\web\View
 */
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name');
echo $form->field($model,'parent_id')->hiddenInput();
//添加隐藏域 保存数据拿到隐藏域的id#goodscategory-parent_id
echo '<div><ul id="treeDemo" class="ztree"></ul></div>';
echo $form->field($model,'intro')->textarea();
echo \yii\bootstrap\Html::submitButton('添加');
\yii\bootstrap\ActiveForm::end();
//加载js文件
$this->registerJsFile('/ztree/js/jquery.ztree.core.js',['depends'=>\yii\web\JqueryAsset::className()]);
//加载代码
$js=<<<EOT
     var zTreeObj;
    // zTree 的参数配置，深入使用请参考 API 文档（setting 配置详解）
    var setting = {
        data: {
            simpleData: {
                enable: true,
                idKey: "id",
                pIdKey: "parent_id",
                rootPId: 0
            }
        },
        callback: {
		onClick: function(event, treeId, treeNode){
//		console.log(treeNode.id);
       //点击treenode这个节点时 把值附在隐藏域上
		$("#goodscategory-parent_id").val(treeNode.id);
		}
	}      
    };
    // zTree 的数据属性，深入使用请参考 API 文档（zTreeNode 节点数据详解）
    var zNodes ={$models};
        zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        zTreeObj.expandAll(true);//展开所有的分类 对象的属性
        zTreeObj.selectNode(zTreeObj.getNodeByParam("id", "{$model->parent_id}", null));//选中节点
EOT;
//加载js代码
$this->registerJs($js);
?>
<link rel="stylesheet" href="/ztree/css/zTreeStyle/zTreeStyle.css" type="text/css">



