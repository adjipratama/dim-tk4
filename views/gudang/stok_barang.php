<?php

use app\models\Barang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BarangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Barangs';   
?>
<div class="barang-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama_barang',
            [
                'attribute' => 'Jumlah Produksi',
                'value' => 'total_produksi'
            ],
            [
                'attribute' => 'Jumlah Pengambilan',
                'value' => 'total_pengambilan'
            ],
            [
                'attribute' => 'Stok Barang',
                'value' => 'stok_barang'
            ],
        ]
    ]); ?>


</div>
