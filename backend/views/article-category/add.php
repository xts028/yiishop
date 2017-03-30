<?php
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'name');
echo $form->field($model,'intro')->textarea();
echo $form->field($model,'status',['inline'=>true])->radioList(\backend\models\ArticleCategory::$status_options);
echo $form->field($model,'sort');
echo $form->field($model,'is_help',['inline'=>true])->radioList(\backend\models\ArticleCategory::$is_helps);
echo \yii\bootstrap\Html::submitButton('添加',['class'=>'btn btn-success btn-sm']);
\yii\bootstrap\ActiveForm::end();