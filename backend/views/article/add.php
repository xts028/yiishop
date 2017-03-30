<?php
$form =\yii\bootstrap\ActiveForm::begin();
echo $form->field($article,'name');
echo $form->field($article,'article_category_id');
echo $form->field($article,'intro')->textarea();
echo $form->field($article,'status',['inline'=>true])->radioList(\backend\models\Article::$status_options);
echo $form->field($article,'sort');
echo $form->field($detail,'content')->textarea();
echo \yii\bootstrap\Html::submitButton('添加');
\yii\bootstrap\ActiveForm::end();
