<?php

use app\models\Produksi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProduksiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produksi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_pesanan',
                'label' => 'Pemesan',
                'value' => 'pemesanan.nama_pemesan'
            ],
            [
                'attribute' => 'id_barang',
                'label' => 'Nama Barang',
                'value' => 'barang.nama_barang'
            ],
            'jumlah_produksi',
            'lead_time',
        ],
    ]); ?>


</div>
