<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin();
    $config = ($model->url) ? [ $model->url ] : [];

    ?>


    <!-- Загрузка картинки пользователя-->
    <?=
    $form->field($model, 'url')->widget(FileInput::className(), [
        'language' => 'ru',
        'options' => ['accept' => 'image/*', ],
        'pluginOptions' => [
            'initialPreview'=> $config,
            'initialPreviewConfig' => [
                'url' => '/delete'
            ],
            'initialPreviewAsData'=>true,
            'initialCaption'=>"Image",
            'overwriteInitial'=>false,
            'maxFileSize'=>2800
        ]

    ]) ?>
    <?= $form->field($model, 'url')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->widget(\yii\jui\DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd',]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
