<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserShow */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'url',
            [
                'attribute' => 'username',
                'format' => 'raw',
                'value' => function ($user, $b, $c) {

                    return  "<a href='/user/update/". $user->id ."' >" .  $user->username .  "</a>";
                }
            ],
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            [
                'attribute' => 'created_at',
                'value' => function ($user) {
                    return date('m:d:Y H:i:s', $user->created_at);
                }
            ],

            [
                'attribute' => 'updated_at',
                'value' => function ($user) {
                    return date('m:d:Y H:i:s', $user->updated_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
