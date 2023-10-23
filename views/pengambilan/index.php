<?php

use app\models\Pengambilan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PengambilanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pengambilans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengambilan-index">


    <p>
        <?= Html::a('Create Pengambilan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama_pengambil',
            [
                'attribute' => 'id_barang',
                'label' => 'Nama Barang',
                'value' => 'barang.nama_barang'
            ],
            'jumlah_pengambilan',
        ],
    ]); ?>


</div>
