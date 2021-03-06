<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'url',
                'format' => 'raw',
                'value' => function ($user) {

                    return  "<img src='http://petproject.local". $user->url ."' >";
                }
            ],
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            [
                'attribute' => 'created_at',
                'value' => function ($user) {
                    return date('d:m:Y H:i:s', $user->created_at);
                }
            ],

            [
                'attribute' => 'updated_at',
                'value' => function ($user) {
                    return date('d:m:Y H:i:s', $user->updated_at);
                }
            ],
        ],
    ]) ?>

</div>
