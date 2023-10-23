<?php

use app\models\Bagian;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BagianSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bagian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bagian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_bagian',
            'nama_bagian',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bagian $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_bagian' => $model->id_bagian]);
                 }
            ],
        ],
    ]); ?>


</div>
