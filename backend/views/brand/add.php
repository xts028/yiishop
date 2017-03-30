<?php
use yii\web\JsExpression;
use yii\bootstrap\Html;
use xj\uploadify\Uploadify;
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($brand,'name');
echo $form->field($brand,'intro')->textarea();
//echo $form->field($brand,'logo_file')->fileInput();
echo $form->field($brand,'logo')->hiddenInput();
echo Html::img($brand->logo,['id'=>'img','style'=>'width:100px']);//把添加的图片显示出来
//外部TAG
echo Html::fileInput('test', NULL, ['id' => 'test']);
echo Uploadify::widget([
    'url' => yii\helpers\Url::to(['s-upload']),
    'id' => 'test',
    'csrf' => true,
    'renderTag' => false,
    'jsOptions' => [
        'width' => 120,
        'height' => 40,
        'onUploadError' => new JsExpression(<<<EOF
function(file, errorCode, errorMsg, errorString) {
    console.log('The file ' + file.name + ' could not be uploaded: ' + errorString + errorCode + errorMsg);
}
EOF
        ),
        'onUploadSuccess' => new JsExpression(<<<EOF
function(file, data, response) {
    data = JSON.parse(data);
    if (data.error) {
        console.log(data.msg);
    } else {
           $("#brand-logo").val(data.fileUrl);
           $("#img").attr("src",data.fileUrl);     
    }
}
EOF
        ),
    ]
]);
echo $form->field($brand,'sort');
echo $form->field($brand,'status',['inline'=>true])->radioList(\backend\models\Brand::$status_options);
echo \yii\bootstrap\Html::submitButton("添加",['class'=>'btn btn-success btn-sm']);
\yii\bootstrap\ActiveForm::end();