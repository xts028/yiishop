<?php
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($countries,'name');
echo $form->field($countries,'parent_id');
echo $form->field($countries,'intro')->textarea();
echo \yii\bootstrap\Html::submitButton('添加');
\yii\bootstrap\ActiveForm::end();